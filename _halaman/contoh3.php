<?php
  $setTemplate = false;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>Deteksi Warna ImageryLayer</title>
  <link rel="stylesheet" href="https://js.arcgis.com/4.21/esri/themes/light/main.css">
  <script src="https://js.arcgis.com/4.21/"></script>
  <style>
    /* CSS untuk kontainer peta */
    #viewDiv {
      height: 100vh;
      width: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <div id="viewDiv"></div>

  <script>
    require([
      "esri/Map",
      "esri/views/MapView",
      "esri/layers/ImageryLayer",
      "esri/widgets/Legend"
    ], function(Map, MapView, ImageryLayer, Legend) {

      // Buat peta
      var map = new Map({
        basemap: "streets"
      });

      // Buat view
      var view = new MapView({
        container: "viewDiv",
        map: map,
        center: [107.775467, -6.983360],
        zoom: 10
      });

      // Ganti URL dengan URL ImageryLayer Anda
	  var imageryLayer = new ImageryLayer({
		url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_banjir/ImageServer",
		opacity: 1,
		pixelFilter: {
			filter: function (pixelData) {
			// Tetapkan warna yang diinginkan
			pixelData[0] = 255; // Komponen merah
			pixelData[1] = 0;   // Komponen hijau
			pixelData[2] = 0;   // Komponen biru
			return pixelData;
			},
		},
		});


      // Tambahkan ImageryLayer ke peta
      map.add(imageryLayer);

    //   // Tambahkan event click untuk menampilkan warna piksel
    //   view.on("click", function(event) {
    //     // Dapatkan koordinat piksel dari event klik
    //     var screenPoint = {
    //       x: event.x,
    //       y: event.y
    //     };

    //     // Gunakan metode hitTest untuk mendapatkan informasi tentang piksel yang diklik
    //     view.hitTest(screenPoint).then(function(response) {
    //       var pixelColor = response.results[0].graphic.attributes.PixelValue;
    //       console.log("Warna piksel (RGB): " + pixelColor);
    //     });
    //   });

      // Tampilkan legenda
      var legend = new Legend({
        view: view,
        layerInfos: [
          {
            layer: imageryLayer,
            title: "Imagery Layer"
          }
        ]
      });

      view.ui.add(legend, "bottom-left");
    });
  </script>
</body>
</html>