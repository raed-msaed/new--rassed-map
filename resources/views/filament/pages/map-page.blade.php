<x-filament::page>

  <head>
    <!-- Other head content -->
    <link rel="stylesheet" href="{{ asset('bootstrapleaflet/css/leaflet.css') }}" /> <!-- Your main CSS -->
    <script src="{{ asset('bootstrapleaflet/js/leaflet.js') }}"></script> <!-- Your main JS file -->
  </head>
  <style>
    #map>div.leaflet-control-container>div.leaflet-bottom.leaflet-right>div {
      display: none;
    }


    .leaflet-popup-content {
      direction: ltr;
      /* Ensures content is left-to-right */
      text-align: left;
      /* Aligns text to the left */
    }

    .responsive-div {
      /*position: fixed;*/
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: stretch;
      padding: 5px;
      background-color: lightgray;
      /*  width: 100%;
      height: 100%;*/
      padding-left: 5px;
      height: 800px;
      /* Takes up full available width */
      max-width: 100%;
      max-height: 100%;


      /* Ensures it does not stretch beyond 100% of its container */
      box-sizing: border-box;
      /* Prevents padding from affecting width */
      z-index: 1;
      /* Ensure it's behind the content */
    }

    #searchContainer {
      margin: 3px;
      position: absolute;
      top: 5px;
      right: 10px;
      background: rgba(71, 63, 63, 0.7);
      padding: 3px;
      border-radius: 5px;
      font-size: 14px;
      z-index: 1000;
    }
  </style>
  <!--style="width: 80%;
    height: 88vh;
    position: fixed;
    bottom:5px"-->
  <div id="map" class="responsive-div">

    <div id="searchContainer">
      <button onclick="searchCoordinates()">بحث</button>
      <input type="text" id="coordInput" placeholder="أدخل الإحدثيات (lat,lng)">
    </div>

    <div id="coordinates"
      style="position: absolute;top: 10px;left: 100px;background: rgba(71, 63, 63, 0.7);padding: 5px;border-radius: 5px;font-size: 14px;z-index: 1000;">
      <strong>Coordinates:</strong><span id="lat"></span>,
      <span id="lng"></span>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize your Leaflet map here
      var map = L.map('map').setView([36.8065, 10.1815], 13); // Coordonnées de Tunis
      // Add your tile layer
      L.tileLayer('http://localhost:8080/styles/test-style/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);

      // Convert decimal degrees to DMS format
      function decimalToDMS(degrees) {
        var d = Math.floor(degrees); // Degrees
        var minFloat = (degrees - d) * 60; // Minutes as float
        var m = Math.floor(minFloat); // Minutes
        var s = ((minFloat - m) * 60).toFixed(2); // Seconds (2 decimals)

        return d + "° " + m + "' " + s + "\""; // Return DMS string
      }

      // Convert decimal degrees to DMS format
      // function toDMS(lat, lng) {
      //   function convertToDMS(value) {
      //     const degrees = Math.floor(value);
      //     const minutes = Math.floor((value - degrees) * 60);
      //     const seconds = ((value - degrees - minutes / 60) * 3600).toFixed(2);
      //     return `${degrees}° ${minutes}' ${seconds}"`;
      //   }

      //   return {
      //     latitude: convertToDMS(Math.abs(lat)) + (lat >= 0 ? ' N' : ' S'),
      //     longitude: convertToDMS(Math.abs(lng)) + (lng >= 0 ? ' E' : ' W'),
      //   };
      // }

      // Convert DMS to decimal degrees format
      // function toDecimal(degrees, minutes, seconds, direction) {
      //   let decimal = degrees + minutes / 60 + seconds / 3600;
      //   if (direction === 'S' || direction === 'W') {
      //     decimal = -decimal;
      //   }
      //   return decimal;
      // }

      // Fetch points from the API and add them as markers
      fetch('/api/points')
        .then(response => response.json())
        .then(data => {
          data.forEach(point => {
            // Convert the latitude and longitude to DMS format
            // const dms = toDMS(point.latitude, point.longitude);

            var latDMS = decimalToDMS(point.latitude);
            var lngDMS = decimalToDMS(point.longitude);

            var iconUrl = `${window.location.origin}/storage/${point.icon.path}`;
            var customIcon = L.icon({
              iconUrl: iconUrl, // Use the iconPath from the API response
              iconSize: [32, 32],
              iconAnchor: [16, 32],
              popupAnchor: [0, -32]
            });      // Function to search for coordinates
      function searchCoordinates() {
        const input = document.getElementById('coordInput').value.trim();
        const [lat, lng] = input.split(',').map(coord => parseFloat(coord));

        if (isNaN(lat) || isNaN(lng)) {
          alert("Please enter valid coordinates in the format 'lat,lng'.");
          return;
        }

        if (lat < -90 || lat > 90 || lng < -180 || lng > 180) {
          alert(
            "Coordinates out of bounds. Latitude must be between -90 and 90, and longitude between -180 and 180.");
          return;
        }

        // Set map view to the entered coordinates
        map.setView([lat, lng], 13);

        // Add or update marker
        if (marker) {
          marker.setLatLng([lat, lng]);
        } else {
          marker = L.marker([lat, lng]).addTo(map);
        }
      }

      document.getElementById('coordInput').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') searchCoordinates();
      });

            // Create a marker for each point
            var marker = L.marker([point.latitude, point.longitude], {
              icon: customIcon
            }).addTo(map);

            // Optional: Add a popup with point details
            marker.bindPopup(`<br>
             <strong> الإسم: </strong>  ${point.title} <br>
             ${point.latitude} <strong> :خط العرض </strong> <br>
             ${point.longitude} <strong> :خط الطول </strong> <br>
              <a href="/admin/points/${point.id}">عرض جميع المهمات المنفذة</a>
           
            `);
          });
        })
        .catch(error => console.error('لا يمكن تحديد النقطة الدالة:', error));

      // Event listener for mouse movement on the map
      map.on('mousemove', function(e) {
        document.getElementById('lat').innerText = e.latlng.lat.toFixed(5); // Latitude
        document.getElementById('lng').innerText = e.latlng.lng.toFixed(5); // Longitude
      });

      // Add a click event listener to the map
      map.on('click', function(e) {
        // Get the clicked coordinates
        // const latDD = e.latlng.lat;
        // const lngDD = e.latlng.lng;

        // const latDMS = toDMS(Math.abs(latDD)) + (latDD >= 0 ? ' N' : ' S');
        // const lngDMS = toDMS(Math.abs(lngDD)) + (lngDD >= 0 ? ' E' : ' W');
        var latDD = e.latlng.lat.toFixed(5);
        var lngDD = e.latlng.lng.toFixed(5);
        //  var latDMS = decimalToDMS(latDD);
        //  var lngDMS = decimalToDMS(lngDD);

        // Assuming `lat` and `lng` contain the DMS formatted latitude and longitude as strings
        //  var encodedLatitude = encodeURIComponent(latDMS);
        //  var encodedLongitude = encodeURIComponent(lngDMS);
        // Construct a URL for your Point resource
        var createUrl = `/admin/points/create?latitude=${latDD}&longitude=${lngDD}`;

        // Create popup content with a link to the Filament resource
        var popupContent = `
              <strong> :الإحداثيات</strong><br>
              ${latDD} <strong> :خط العرض </strong> <br>
              ${lngDD} <strong> :خط الطول </strong> <br>
              <a href="${createUrl}">إضافة نقطة دالة</a>
                `;
        // Display the coordinates in a popup
        // var popupContent = `
      //         <strong>Coordinates:</strong><br>
      //         Decimal Degrees:<br>
      //         Latitude: ${latDD.toFixed(8)}, Longitude: ${lngDD.toFixed(8)}<br>
      //         DMS:<br>
      //         Latitude: ${latDMS}, Longitude: ${lngDMS}<br>
      //         <button onclick="savePoint(${latDD}, ${lngDD}, '${latDMS}', '${lngDMS}')">Save Point</button>
      //     `;
        L.popup()
          .setLatLng(e.latlng)
          .setContent(popupContent)
          .openOn(map);
      });

      let marker;

      // Function to search for coordinates
      function searchCoordinates() {
        const input = document.getElementById('coordInput').value.trim();
        const [lat, lng] = input.split(',').map(coord => parseFloat(coord));

        if (isNaN(lat) || isNaN(lng)) {
          alert("Please enter valid coordinates in the format 'lat,lng'.");
          return;
        }

        if (lat < -90 || lat > 90 || lng < -180 || lng > 180) {
          alert(
            "Coordinates out of bounds. Latitude must be between -90 and 90, and longitude between -180 and 180.");
          return;
        }

        // Set map view to the entered coordinates
        map.setView([lat, lng], 13);

        // Add or update marker
        if (marker) {
          marker.setLatLng([lat, lng]);
        } else {
          marker = L.marker([lat, lng]).addTo(map);
        }
      }

      document.getElementById('coordInput').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') searchCoordinates();
      });
    });
  </script>
</x-filament::page>
