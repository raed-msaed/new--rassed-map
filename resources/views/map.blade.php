<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'رصد جيوفضائية')</title>
  <!-- Common CSS -->
  <link rel="stylesheet" href="{{ asset('bootstrapleaflet/css/leaflet.css') }}" /> <!-- Your main CSS -->

  @stack('styles') <!-- For additional styles specific to child views -->
</head>


<body>
  <!-- Header -->

  <!-- Content -->
  <div class="fi-layout flex min-h-screen w-full flex-row-reverse overflow-x-clip">
    @yield('content') <!-- Child views will inject their content here -->
    <div id="map"></div>
  </div>



  <!-- Footer -->


  <!-- Common JavaScript -->
  <script src="{{ asset('bootstrapleaflet/js/leaflet.js') }}"></script> <!-- Your main JS file -->

  <script>
    // Initialiser la carte
    var map = L.map('map').setView([36.8065, 10.1815], 13); // Coordonnées de Tunis

    // Utiliser TileServer via Docker
    L.tileLayer('https://rassed-map.com/styles/klokantech-basic/{z}/{x}/{y}.png', {
      maxZoom: 18,
    }).addTo(map);

    // Ajouter un point sur la carte
    L.marker([36.8065, 10.1815]).addTo(map)
      .bindPopup('Tunis')
      .openPopup();
  </script>


  @stack('scripts') <!-- For additional scripts specific to child views -->
</body>

</html>
