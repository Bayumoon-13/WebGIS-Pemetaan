<script src="https://js.arcgis.com/4.21/"></script>
<script>
    require([
      "esri/Map",
      "esri/views/MapView",
      "esri/Graphic",
      "esri/layers/GraphicsLayer",
      "esri/symbols/PictureMarkerSymbol",
      "esri/PopupTemplate",
      "esri/geometry/Point",
      "esri/geometry/SpatialReference"
    ], function(Map, MapView, Graphic, GraphicsLayer, PictureMarkerSymbol, PopupTemplate, Point, SpatialReference) {
      var map = new Map({
        basemap: "streets" // Sesuaikan basemap dengan kebutuhan Anda
      });

      var view = new MapView({
        container: "map",
        map: map,
        center: [107.775467, -6.983360],
        zoom: 13
      });

      // Membuat GraphicsLayer untuk menampung marker
      var graphicsLayer = new GraphicsLayer();

      // Fungsi untuk menampilkan data dari m_lokasi pada peta
      function displayDataOnMap() {
        <?php
          // Memanggil data dari m_lokasi (seperti yang telah Anda lakukan)
          $db->join('m_perumahan b', 'a.id_perumahan = b.id_perumahan', 'LEFT');
          $getlokasi = $db->ObjectBuilder()->get('m_lokasi a');
          foreach ($getlokasi as $lokasi) {
            $imageURL = ($lokasi->gambar == '') ? 'assets/images/real_estate.png' : 'assets/unggah/gambar/' . $lokasi->gambar;
            $customMarker = ($lokasi->marker == '') ? 'assets/images/marker/marker.png' : 'assets/unggah/marker/' . $lokasi->marker;
            $popupContent = "<div class='popup-content'>" .
              "<div class='popup-title'>" . $lokasi->nm_perumahan . "</div>" .
              "<div class='popup-image'><img src='" . $imageURL . "' alt='Gambar'></div>" .
              "<div class='popup-button-container'>" .
              "<button class='popup-button' onclick=\"window.location.href='detail.php?id_lokasi=" . $lokasi->id_lokasi . "'\">" .
              "<i class='fa fa-paper-plane' aria-hidden='true'></i> Detail dan Lokasi" .
              "</button>" .
              "</div>" .
              "</div>";

            // Buat custom icon untuk marker
            echo "var customIcon" . $lokasi->id_lokasi . " = new PictureMarkerSymbol({
              url: '" . $customMarker . "',
              width: '50px', // Sesuaikan ukuran icon jika diperlukan
              height: '60px', // Sesuaikan ukuran icon jika diperlukan
              xoffset: '25px', // Sesuaikan anchor icon jika diperlukan
              yoffset: '60px' // Sesuaikan anchor icon jika diperlukan
            });";

            // Membuat Point untuk menempatkan marker
            echo "var point" . $lokasi->id_lokasi . " = new Point({
              x: " . $lokasi->lng . ", // Ganti dengan koordinat longitude dari lokasi
              y: " . $lokasi->lat . ", // Ganti dengan koordinat latitude dari lokasi
              spatialReference: new SpatialReference({ wkid: 4326 }) // Ganti dengan WKID yang sesuai untuk sistem koordinat yang digunakan (4326 untuk WGS84)
            });";

            // Membuat Graphic untuk menampilkan marker dan popup
            echo "var graphic" . $lokasi->id_lokasi . " = new Graphic({
              geometry: point" . $lokasi->id_lokasi . ",
              symbol: customIcon" . $lokasi->id_lokasi . ",
              popupTemplate: new PopupTemplate({
                title: '" . $lokasi->nm_perumahan . "',
                content: " . json_encode($popupContent) . "
              })
            });";

            // Menambahkan graphic ke GraphicsLayer
            echo "graphicsLayer.add(graphic" . $lokasi->id_lokasi . ");";
          }
        ?>
      }

      // Panggil fungsi untuk menampilkan data dari m_lokasi pada peta
      displayDataOnMap();

      // Tambahkan GraphicsLayer ke peta
      map.add(graphicsLayer);
    });

    function enterFullscreen() {
			var elem = document.getElementById("mapid");

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
		var fullscreenBtn = document.getElementById("fullscreen-button");
		fullscreenBtn.addEventListener("click", enterFullscreen);
</script>
