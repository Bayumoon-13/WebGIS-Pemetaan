<script src="https://js.arcgis.com/4.21/"></script>
<script>
  require([
      "esri/Map",
      "esri/views/MapView",
      "esri/widgets/BasemapToggle",
      "esri/layers/ImageryLayer",
      "esri/widgets/Legend",
      "esri/Graphic",
      "esri/symbols/PictureMarkerSymbol",
      "esri/geometry/Point",
      "esri/widgets/Popup",
      "esri/widgets/Fullscreen",
      "esri/widgets/Home",
    ], function(Map, MapView, BasemapToggle, ImageryLayer, Legend, Graphic, PictureMarkerSymbol, Point, Popup, Fullscreen, Home) {
      var map = new Map({
        basemap: "osm" // Basemap default
      });

      <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "perum11_rck";
          $table_lokasi = "m_lokasi";
          $table_perumahan = "m_perumahan";

          // Buat koneksi ke database
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Periksa koneksi
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
        ?>

    var imageryLayer;

    function changeBasemap() {
      var selectedOption = document.getElementById("tampilan-peta").value;

      // Hapus lapisan peta sebelumnya
      if (imageryLayer) {
        map.remove(imageryLayer);
      }

      // Tambahkan lapisan peta baru berdasarkan pilihan
      if (selectedOption === "risk_banjir") {
        imageryLayer = new ImageryLayer({
          url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_banjir/ImageServer",
          opacity: 1
        });
      } else if (selectedOption === "risk_banjir_bandang") {
        imageryLayer = new ImageryLayer({
          url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_banjir_bandang/ImageServer",
          opacity: 1
        });
      } else if (selectedOption === "risk_gempabumi") {
        imageryLayer = new ImageryLayer({
          url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_gempabumi/ImageServer",
          opacity: 1
        });
      } else if (selectedOption === "risk_cuaca_ekstrim") {
        imageryLayer = new ImageryLayer({
          url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_cuaca_ekstrim/ImageServer",
          opacity: 1
        });
      } else if (selectedOption === "risk_kekeringan") {
        imageryLayer = new ImageryLayer({
          url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_kekeringan/ImageServer",
          opacity: 1
        });
      } else if (selectedOption === "risk_likuefaksi") {
        imageryLayer = new ImageryLayer({
          url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_likuefaksi/ImageServer",
          opacity: 1
        });
      } else if (selectedOption === "risk_multi_bahaya") {
        imageryLayer = new ImageryLayer({
          url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_multi/ImageServer",
          opacity: 1
        });
      }

      // Tambahkan lapisan peta baru ke dalam map
      if (imageryLayer) {
        map.add(imageryLayer);
      }
    }

    var view = new MapView({
      container: "map",
      map: map,
      center: [107.775467, -6.983360],
      zoom: 13
    });

    var legend = new Legend({
      view: view
    });
 
    view.ui.add(legend, "bottom-right");

    // Buat widget Fullscreen
    var fullscreenButton = new Fullscreen({
        view: view
    });

    // Tambahkan widget Fullscreen ke dalam tampilan
    view.ui.add(fullscreenButton, "top-left");

    // Buat widget Home
    var homeButton = new Home({
        view: view
    });

    // Tambahkan widget Home ke dalam tampilan
    view.ui.add(homeButton, "top-left");

    // Buat BasemapToggle widget
    var basemapToggle = new BasemapToggle({
        view: view,
        nextBasemap: "satellite" // Basemap alternatif
      });

      // Tambahkan widget BasemapToggle ke dalam tampilan
      view.ui.add(basemapToggle, "bottom-left");

    // Panggil fungsi changeBasemap saat pilihan pada menu berubah
    document.getElementById("tampilan-peta").addEventListener("change", function(event) {
        var selectedBasemap = event.target.value;
        changeBasemap(selectedBasemap);
      });

      // Panggil fungsi changeBasemap saat halaman web pertama kali dimuat
      changeBasemap("risk_banjir"); // Ganti dengan basemap default yang Anda inginkan

      <?php
          // Query untuk mengambil data lat dan lng dari tabel m_lokasi dan informasi perumahan dari tabel m_perumahan
          $sql = "SELECT l.id_lokasi, l.lat, l.lng, l.lokasi, p.id_perumahan, p.nm_perumahan 
                  FROM $table_lokasi l 
                  INNER JOIN $table_perumahan p ON l.id_perumahan = p.id_perumahan";

          $result = $conn->query($sql);

          if (!$result) {
              die("Query failed: " . mysqli_error($conn));
          }

          $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "let locations = [";
            while ($row = $result->fetch_assoc()) {
                echo "{
                    id_lokasi: " . $row["id_lokasi"] . ",
                    id_perumahan: " . $row["id_perumahan"] . ",
                    lat: " . $row["lat"] . ",
                    lng: " . $row["lng"] . ",
                    lokasi: '" . $row["lokasi"] . "',
                    nm_perumahan: '" . $row["nm_perumahan"] . "',
                },";
            }
            echo "];";
        }
        ?>

      // Fungsi untuk mengambil data dari database (contoh dengan PHP)
      function addPerumahanMarkers() {

    const markers = ({id_perum, is_reload})=>{   
      if(id_perum === null && is_reload === false){
        for (var i = 0; i < locations.length; i++) {
        var location = locations[i];
        var marker = new Graphic({
          geometry: {
            type: "point",
            longitude: location.lng,
            latitude: location.lat
          },
          attributes: location,
          symbol: new PictureMarkerSymbol({
              url: "assets/images/marker/perum5.png", 
              width: "40px", // Adjust as needed
              height: "40px" // Adjust as needed
          })
        });
        view.graphics.add(marker)
        marker.popupTemplate = {
          title: "{nm_perumahan}",
          content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
        };
      }
    }



    for (var i = 0; i < locations.length; i++) {
        var location = locations[i];
        var marker = new Graphic({
            geometry: {
                type: "point",
                longitude: location.lng,
                latitude: location.lat
            },
            attributes: location,
            symbol: new PictureMarkerSymbol({
                url: "assets/images/marker/perum5.png", 
                width: "40px", // Adjust as needed
                height: "40px" // Adjust as needed
            })
        });
            
        if (location.id_perumahan === id_perum){
            if (is_reload === true){
                view.graphics.removeAll(marker)
                
            }else{
              view.graphics.add(marker)
              marker.popupTemplate = {
                  title: "{nm_perumahan}",
                  content: "Lokasi : {lokasi}"
              };
            }
          }
        }
      }

      let isSelected = false
      document.getElementById("nama-perumahan").addEventListener("change", function(event) {
      var selectedOption = parseInt(event.target.value);
      markers({id_perum:selectedOption, is_reload:true})
      if (selectedOption){
          isSelected = true
          markers({id_perum:selectedOption, is_reload:false})
      }
      })

      if (isSelected === false){markers({id_perum:null, is_reload:false})}
      }


      // Panggil fungsi untuk menambahkan marker perumahan ke peta
      addPerumahanMarkers()

      function warnaTingkatRisiko(content) {
        var tingkatan = document.getElementById("kategori-risiko");
        tingkatan.innerHTML = content;

      }

      document.getElementById("warna-risiko").addEventListener("change", function(event) {
        var color = event.target.value;
        color = color.replace('#', '');

        // Ambil komponen RGB
        var r = parseInt(color.substring(0, 2), 16);
        var g = parseInt(color.substring(2, 4), 16);
        var b = parseInt(color.substring(4, 6), 16);

        const intR =parseInt(r)
        const intG =parseInt(g)
        const intB =parseInt(b)
        // const resultIntRGB = [...intRGB]

        
        if (intR === 255 && intG >= 0 && intG <= 187 && intB >= 0 && intB <= 100){
          warnaTingkatRisiko("Wilayah yang dipilih termasuk dalam tingkat risiko <b style='color:red;'>TINGGI😭</b>")
        } else if (intR >= 187 && intR <= 255 && intG >= 188 && intG <= 255 && intB >= 0 && intB <= 100){
          warnaTingkatRisiko("Wilayah yang dipilih termasuk dalam tingkat risiko <b style='color:orange;'>SEDANG☹️</b>")
        } else if (intR >= 50 && intR <= 174 && intG <= 255 && intG >= 112 && intB === 0) {
          warnaTingkatRisiko("Wilayah yang dipilih termasuk dalam tingkat risiko <b style='color:green;'>RENDAH🧐</b>")
        } else{
          warnaTingkatRisiko("Wilayah yang dipilih <b>Tidak Terdapat Risiko😎</b>")
        }
        });
  });
</script>