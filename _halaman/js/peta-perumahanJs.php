	<style>
		/* CSS untuk gaya legenda */
	.leaflet-control.legend {
	background-color: #fff;
	padding: 5px;
	border: 1px solid #ccc;
  	border-radius: 5px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	margin-bottom: 3px;
	margin-right: 5px;
	width: 160px;
	}

	.leaflet-control.legend h4 {
	margin: 0 0 5px;
	font-size: 20px;
	font-weight: bold;
	}

	.leaflet-control.legend .legend-item {
	display: flex;
	align-items: center;
	margin-bottom: 2px;
	font-size: 15px;
	color: black;
	}
	/* Tambahkan gaya lain sesuai kebutuhan Anda */

	</style>
	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" 
		integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   		crossorigin="">
	</script>
	<script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
	<script src="assets/js/leaflet.ajax.js"></script>
	<script src="assets/js/Leaflet.GoogleMutant.js"></script>
	<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
	<script src="assets/js/leaflet.browser.print-master/dist/leaflet.browser.print.min.js"></script>

	<script type="text/javascript">

		var map = L.map('mapid').setView([-6.983360, 107.775467], 14);
		

		var openstreetmap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18
        });

        var satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri',
            maxZoom: 18
        });

        var terrain = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.png', {
            maxZoom: 18,
            attribution: 'Map tiles by <a href="https://stamen.com/">Stamen Design</a>, ' +
                '<a href="https://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a> &mdash; ' +
                'Map data &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        });

        var opentopomap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data &copy; <a href="https://www.opentopomap.org/">OpenTopoMap</a> contributors'
        });

		map.addLayer(openstreetmap);

		var myStyle2 = {
	    "color": "#ffff00",
	    "weight": 1,
	    "opacity": 0.9
		};

		function popUp(f, l) {
			var out = [];
			if (f.properties) {
				var imageUrl = 'assets/images/icons/logo_kab_bandung.png';
				var imageWidth = 100; // Adjust the width as desired
				var imageHeight = 100; // Adjust the height as desired

				out.push("<div style='display: flex; justify-content: center; align-items: center;'><img src='" + imageUrl + "' alt='Image' style='width:" + imageWidth + "px;height:" + imageHeight + "px;'></div>");
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Kode Provinsi:</span> " + f.properties['KDPPUM']);
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Provinsi:</span> " + f.properties['WADMPR']);
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Kode Kabupaten:</span> " + f.properties['KDPKAB']);
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Kabupaten:</span> " + f.properties['WADMKK']);
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Kode Kecamatan:</span> " + f.properties['KDCPUM']);
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Kecamatan:</span> " + f.properties['WADMKC']);
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Kode Desa:</span> " + f.properties['KDEPUM']);
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Desa:</span> " + f.properties['NAMOBJ']);
				out.push("<span style='font-family: Arial, sans-serif; font-size: 16px; color: #333; font-weight: bold;'>Luas:</span> " + f.properties['LUASWH'] + " km²");
			}
			l.bindPopup(out.join("<br />"));
		}

		//Tampilan legenda

		var perumahanIcon = '<i class="icon" style="background-color:your_color_here;border-radius:50%"></i>';
		var perumahanLegend = 'Perumahan';
		//baseLayers
		var baseLayers = [
			{
				group: "Tampilan Peta",
				collapsed: false,
				layers: [
					{
						name: "OpenStreetMap",
						layer: openstreetmap
					},
					{	
						name: "Satellite",
						layer: satellite
					},
					{
						name: "Terrain",
						layer: terrain
					},
					{
						name: "OpenTopoMap",
						layer: opentopomap
					}
				]
			}
		];

		//overLayersDes
		function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
		}

		function featureToMarker(feature, latlng) {
			return L.marker(latlng, {
				icon: L.divIcon({
					className: 'marker-'+feature.properties.amenity,
					html: iconByName(feature.properties.amenity),
					iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
					iconSize: [25, 41],
					iconAnchor: [12, 41],
					popupAnchor: [1, -34],
					shadowSize: [41, 41]
				})
			});
		}

		<?php
			$getDesa=$db->ObjectBuilder()->get('m_desa');
			foreach ($getDesa as $row) {
				?>

				var myStyle<?=$row->id_desa?> = {
					"color": "<?=$row->warna_desa?>",
					"weight": 2,
					"opacity": 1
				};

				<?php
				$arrayDes[]='{
				name: "'.$row->nm_desa.'",
				icon: iconByName("'.$row->warna_desa.'"),
				layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/'.$row->geojson_desa.'"],{onEachFeature:popUp,style: myStyle'.$row->id_desa.',pointToLayer: featureToMarker }).addTo(map)
				}';
			}
		?>

		var overLayers = [
			{
				group: "Layers Desa",
				collapsed: false,
				layers: [
					<?=implode(',', $arrayDes);?>	
				]
			}
		];

		// Tambahkan fungsi untuk membuat legenda
		function createLegend() {
		var legendControl = L.control({ position: "bottomright" });

		legendControl.onAdd = function (map) {
			var div = L.DomUtil.create("div", "leaflet-control legend");
			div.innerHTML = `
			<h4>Legenda</h4>
			<div class="legend-item">
					<img src="assets/images/marker/marker.png" alt="Perumahan" style="width: 30px; height: 30px; margin-right: 5px;">
				: Perumahan
			</div>
			<div class="legend-item">
				<i class="icon" style="background-color: black; border-radius: 50%; width: 15px; height: 15px; margin-left: 8px; margin-right: 12px;"></i>
				 : Luas Area
			</div>
			`;
			return div;
		};

		legendControl.addTo(map);
		}

		var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,  {
			collapsibleGroups: true,
		});

		map.addControl(panelLayers);
		createLegend();

		L.control.scale().addTo(map);

		// Membuat MarkerClusterGroup
		var markers = L.markerClusterGroup();

		// Fungsi untuk menampilkan data dari m_lokasi pada peta
		function displayDataOnMap() {
			<?php
			// Memanggil data dari m_lokasi (seperti yang telah Anda lakukan)
			$db->join('m_perumahan b', 'a.id_perumahan = b.id_perumahan', 'LEFT');
			$getlokasi = $db->ObjectBuilder()->get('m_lokasi a');
			foreach ($getlokasi as $lokasi) {
				$imageURL = ($lokasi->gambar == '') ? 'assets/images/real_estate.png' : 'assets/unggah/gambar/' . $lokasi->gambar;
				$customMarker = 'assets/images/marker/marker.png';
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
				echo "var customIcon" . $lokasi->id_lokasi . " = L.icon({
				iconUrl: '" . $customMarker . "',
				iconSize: [50, 60], // Sesuaikan ukuran icon jika diperlukan
				iconAnchor: [25, 60], // Sesuaikan anchor icon jika diperlukan
				popupAnchor: [0, -60] // Sesuaikan popup anchor jika diperlukan
			});";

				// Menambahkan GeoJSON feature beserta custom icon marker ke MarkerClusterGroup
				echo "var marker" . $lokasi->id_lokasi . " = L.geoJSON(" . $lokasi->geojson . ", {
				pointToLayer: function (feature, latlng) {
					return L.marker(latlng, { icon: customIcon" . $lokasi->id_lokasi . " });
				},
				style: function (feature) {
					return {
						fillColor: 'black',
						fillOpacity: 0.5,
						color: 'black',
						weight: 2
					};
				},
				onEachFeature: function (feature, layer) {
					var popupContent = " . json_encode($popupContent) . ";
					layer.bindPopup(popupContent);
				}
			});";

				// Tambahkan marker ke MarkerClusterGroup
				echo "markers.addLayer(marker" . $lokasi->id_lokasi . ");";
			}
			?>

			// Tambahkan MarkerClusterGroup ke peta
			map.addLayer(markers);
		}

		// Panggil fungsi untuk menampilkan data dari m_lokasi pada peta
		displayDataOnMap();

		// Fungsi untuk mengaktifkan mode fullscreen
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
		var fullscreenBtn = document.getElementById("fullscreen-btn");
		fullscreenBtn.addEventListener("click", enterFullscreen);

		L.control.browserPrint().addTo(map);
   </script>