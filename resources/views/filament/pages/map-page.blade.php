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
  </style>
  <div id="map" style="width: 80%; height: 90vh;position: fixed;bottom:5px">
  </div>
  <div id="coordinates"
    style="position: fixed; bottom: 10px; left: 10px; background: rgba(255, 255, 255, 0.8); padding: 5px; border-radius: 5px;">
    <strong>Coordinates:</strong> <span id="lat"></span>, <span id="lng"></span>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize your Leaflet map here
      var map = L.map('map').setView([36.8065, 10.1815], 13); // Coordonnées de Tunis
      // Add your tile layer
      L.tileLayer('http://localhost:8080/styles/klokantech-basic/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);


      // Convert decimal degrees to DMS format
      function decimalToDMS(degrees) {
        var d = Math.floor(degrees); // Degrees
        var minFloat = (degrees - d) * 60; // Minutes as float
        var m = Math.floor(minFloat); // Minutes
        var s = ((minFloat - m) * 60).toFixed(2); // Seconds (2 decimals)

        return d + "° " + m + "' " + s + "\""; // Return DMS string
      }

      // Fetch points from the API and add them as markers
      fetch('/api/points')
        .then(response => response.json())
        .then(data => {
          data.forEach(point => {
            // Convert the latitude and longitude to DMS format
            var latDMS = decimalToDMS(point.latitude);
            var lngDMS = decimalToDMS(point.longitude);
            var iconUrl = `${window.location.origin}/storage/${point.icon.path}`;
            var customIcon = L.icon({
              iconUrl: iconUrl, // Use the iconPath from the API response
              iconSize: [32, 32],
              iconAnchor: [16, 32],
              popupAnchor: [0, -32]
            });

            // Create a marker for each point
            var marker = L.marker([point.latitude, point.longitude], {
              icon: customIcon
            }).addTo(map);

            // Optional: Add a popup with point details
            marker.bindPopup(`
              <strong>Title:</strong> ${point.title}<br>
              <strong>Latitude:</strong> ${latDMS}<br>
              <strong>Longitude:</strong> ${lngDMS}<br>
              <a href="/admin/points/${point.id}/edit">تحيين النقطة الدالة</a>
            `);
          });
        })
        .catch(error => console.error('Error fetching points:', error));

      // Event listener for mouse movement on the map
      map.on('mousemove', function(e) {
        document.getElementById('lat').innerText = e.latlng.lat.toFixed(5); // Latitude
        document.getElementById('lng').innerText = e.latlng.lng.toFixed(5); // Longitude
      });

      // Add a click event listener to the map
      map.on('click', function(e) {
        // Get the clicked coordinates
        var latDD = e.latlng.lat.toFixed(5);
        var lngDD = e.latlng.lng.toFixed(5);
        var latDMS = decimalToDMS(latDD);
        var lngDMS = decimalToDMS(lngDD);
        // Assuming `lat` and `lng` contain the DMS formatted latitude and longitude as strings
        var encodedLatitude = encodeURIComponent(latDMS);
        var encodedLongitude = encodeURIComponent(lngDMS);
        // Construct a URL for your Point resource
        var createUrl = `/admin/points/create?latitude=${encodedLatitude}&longitude=${encodedLongitude}`;

        // Create popup content with a link to the Filament resource
        var popupContent = `
                    <strong>coordinates:</strong><br>${latDMS},${lngDMS}<br>
                    <a href="${createUrl}">Add Cordinates</a>
                `;

        // Show popup at the clicked location
        L.popup()
          .setLatLng(e.latlng)
          .setContent(popupContent)
          .openOn(map);
      });

    });
  </script>
</x-filament::page>
