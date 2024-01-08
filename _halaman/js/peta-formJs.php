	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js" integrity="sha512-ozq8xQKq6urvuU6jNgkfqAmT7jKN2XumbrX1JiB3TnF7tI48DPI4Gy1GXKD/V3EExgAs1V+pRO7vwtS1LHg0Gw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    var map = L.map('map').setView([-6.983360, 107.775467], 14);

    var baseLayers = {
    'OpenStreetMap': L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18
    }),
    'Satellite': L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri',
      maxZoom: 18
    })
  };

  L.control.layers(baseLayers).addTo(map);

  baseLayers.OpenStreetMap.addTo(map);

    // FeatureGroup is to store editable layers
    var drawnItems = new L.FeatureGroup();
      map.addLayer(drawnItems);
      var drawControl = new L.Control.Draw({
            draw: {
            polygon: true,
            marker: true,
            circlemarker: false,
            circle: false,
            rectangle: false,
            polyline: false,
          },
          edit: {
              featureGroup: drawnItems
          }
      });
      map.addControl(drawControl);

      // Create Draw
      map.on('draw:created', function(e) {
        var layer = e.layer;
        var feature = layer.feature = layer.feature || {};
        feature.type =feature.type || "Feature";
        var props = feature.properties = feature.properties || {};
        drawnItems.addLayer(layer);
        $("[name=geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));

            // Get the coordinates of the created draw
          if (layer instanceof L.Marker) {
            var latLng = layer.getLatLng();
            var lat = latLng.lat.toFixed(6);
            var lng = latLng.lng.toFixed(6);
            $("#lat").val(lat);
            $("#lng").val(lng);
          } else if (layer instanceof L.Polygon) {
              var area = L.GeometryUtil.geodesicArea(layer.getLatLngs()[0]);
              var formattedArea = area.toFixed(2) + " m²";
              $("#luas_area").val(formattedArea);
          }
        });

      // Edit Draw
      map.on('draw:edited', function(e) {
        $("[name=geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
      });

      // Delete Draw
      map.on('draw:deleted', function(e) {
        $("[name=geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
      });

    // Fungsi untuk mengaktifkan mode fullscreen
    function enterFullscreen() {
      var elem = document.getElementById("map");

      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.mozRequestFullScreen) {
        elem.mozRequestFullScreen();
      } else if (elem.webkitRequestFullscreen) {
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) {
        elem.msRequestFullscreen();
      }
    }

    // Mengaitkan fungsi dengan tombol fullscreen
    var fullscreenBtn = document.getElementById("fullscreen-btn");
    fullscreenBtn.addEventListener("click", enterFullscreen);
  </script>