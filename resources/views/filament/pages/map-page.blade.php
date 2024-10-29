<x-filament::page>

  <head>
    <!-- Other head content -->
    <link rel="stylesheet" href="{{ asset('bootstrapleaflet/css/leaflet.css') }}" /> <!-- Your main CSS -->
    <script src="{{ asset('bootstrapleaflet/js/leaflet.js') }}"></script> <!-- Your main JS file -->
  </head>
  <div id="map" style="width: 110%; height: 800px;"></div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize your Leaflet map here
      var map = L.map('map').setView([36.8065, 10.1815], 13); // Coordonnées de Tunis
      // Add your tile layer
      L.tileLayer('http://localhost:8080/styles/klokantech-basic/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);
    });
  </script>
</x-filament::page>
