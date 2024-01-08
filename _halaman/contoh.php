<?php
$setTemplate=false;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Simple ArcGIS Map with Marker</title>
    <link rel="stylesheet" href="https://js.arcgis.com/4.19/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.19/"></script>
    <style>
        #viewDiv {
            padding: 0;
            margin: 0;
            height: 500px;
        }
        #removeButton {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 999;
        }
    </style>
</head>
<body>
    <div id="viewDiv"></div>
    <button id="removeButton">Remove Marker</button>
    <script>
        require([
            "esri/Map",
            "esri/views/MapView",
            "esri/Graphic",
            "esri/geometry/Point",
            "esri/symbols/SimpleMarkerSymbol",
            "dojo/domReady!"
        ], function(Map, MapView, Graphic, Point, SimpleMarkerSymbol) {
            var map = new Map({
                basemap: "streets"
            });

            var view = new MapView({
                container: "viewDiv",
                map: map,
                center: [0, 0],
                zoom: 2
            });

            var point = new Point({
                longitude: 0,
                latitude: 0
            });

            var markerSymbol = new SimpleMarkerSymbol({
                color: [226, 119, 40],
                outline: {
                    color: [255, 255, 255],
                    width: 2
                }
            });

            var graphic = new Graphic({
                geometry: point,
                symbol: markerSymbol
            });

            view.graphics.add(graphic);

            // Fungsi untuk menghapus marker dari peta
            function removeMarker() {
                view.graphics.remove(graphic);
            }

            // Menambahkan event listener untuk tombol "Remove Marker"
            var removeButton = document.getElementById("removeButton");
            removeButton.addEventListener("click", removeMarker);
        });
    </script>
</body>
</html>
