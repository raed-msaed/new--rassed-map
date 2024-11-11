<x-filament::page>

  <head>
    <!-- Other head content -->
    <link rel="stylesheet" href="{{ asset('bootstrapleaflet/css/leaflet.css') }}" /> <!-- Your main CSS -->
    <script src="{{ asset('bootstrapleaflet/js/leaflet.js') }}"></script> <!-- Your main JS file -->
  </head>
  <div id="map" style="width: 100%; height: 100vh;"></div>
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

      // Function to select icon based on point type
      function getIcon(type) {
        // Construct the path to the icon in the public storage directory
        let iconUrl = `/storage/icons/${type}.png`; // e.g., /storage/icons/type1.png

        return L.icon({
          iconUrl: iconUrl,
          iconSize: [32, 32],
          iconAnchor: [16, 32],
          popupAnchor: [0, -32]
        });
      }
      // Fetch points from the API and add them as markers
      fetch('/api/points')
        .then(response => response.json())
        .then(data => {
          data.forEach(point => {
          
            // Use getIcon function to choose the correct icon for each point
            var markerIcon = getIcon(point.iconType);  
            // Create a marker for each point
            var marker = L.marker([point.latitude, point.longitude], { icon: markerIcon }).addTo(map);

            // Optional: Add a popup with point details
            marker.bindPopup(`
              <strong>الرمز:</strong> ${point.message}<br>
              <strong>Latitude:</strong> ${point.latitude}<br>
              <strong>Longitude:</strong> ${point.longitude}<br>
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
        var lat = e.latlng.lat.toFixed(5);
        var lng = e.latlng.lng.toFixed(5);

        // Construct a URL for your Point resource
        var createUrl = `/admin/points/create?latitude=${lat}&longitude=${lng}`;

        // Create popup content with a link to the Filament resource
        var popupContent = `
                    <strong>الإحداثيات:</strong> ${lat}, ${lng}<br>
                    <a href="${createUrl}">إضافة نقطة دالة</a>
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
