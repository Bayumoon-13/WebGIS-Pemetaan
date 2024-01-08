<?php
  $setTemplate = false;
  $url = 'coba';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>WebGIS Peta Interaktif</title>
        
        <link rel="icon" href="assets/images/icons/logo_kab_bandung.png" type="image/png">
        <link rel="stylesheet" href="<?=assets('templates/safario/vendors/bootstrap/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?=assets('templates/safario/vendors/fontawesome/css/all.min.css')?>">
        <link rel="stylesheet" href="<?=assets('templates/safario/vendors/themify-icons/themify-icons.css')?>">
        <link rel="stylesheet" href="<?=assets('templates/safario/vendors/linericon/style.css')?>">
        <link rel="stylesheet" href="<?=assets('templates/safario/vendors/owl-carousel/owl.theme.default.min.css')?>">
        <link rel="stylesheet" href="<?=assets('templates/safario/vendors/owl-carousel/owl.carousel.min.css')?>">
        <link rel="stylesheet" href="<?=assets('templates/safario/vendors/flat-icon/font/flaticon.css')?>">
        <link rel="stylesheet" href="<?=assets('templates/safario/vendors/nice-select/nice-select.css')?>">
        <link rel="stylesheet" href="<?=assets('templates/safario/css/style.css')?>">
        <link rel="stylesheet" href="https://js.arcgis.com/4.21/esri/themes/light/main.css">
        
        <style>
            #viewDiv {
            padding: 0;
            margin: 0;
            height: 100vh;
            width: 100%;
            }

            #date,
            #clock {
                font-size: 16px; 
                text-align: center;
                margin-left: 10px;
                margin-right: 5px;
                color: black;
            }

            .section-intro-img {
                max-width: 15%;
                height: auto;
                display: block;
                margin: 0 auto;
            }

        </style>
    </head>

    <body class="bg-shape">
        <!--================ Header Menu Area start =================-->
        <header class="header_area" style="background-color: rgba(135, 206, 250, 0.7);">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-brand logo_h" href="index.html" style="margin-left: 80px">
                        <img src="<?=assets('images/icons/logo_kab_bandung.png')?>" style="width: 40px;float:left;margin-top:5px;margin-right: 5px">
                        <h1 class="text-danger m-0 p-0" style="font-size: 30px"><a  href="<?=url('utama')?>">Sistem Informasi Geografis</a></h1>
                        <p class="m-0 p-0" style="font-size: 14px;margin-top:-5px !important">Perumahan | Kecamatan Rancaekek</p>
                    </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    <div class="container box_1620">
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end"> 
                            <li class="nav-item "><a id="date" class="nav-link" href="#"></a></li> 
                            <li class="nav-item "><a id="clock" class="nav-link" href="#"></a></li>
                            <li class="nav-item "><a class="nav-link" href="<?=url('utama')?>">Home</a></li> 
                            <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Data</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="<?=url('user-administrasi')?>">Data Administrasi</a> 
                                <li class="nav-item"><a class="nav-link" href="<?=url('user-perumahan')?>">Data Perumahan</a>                 
                            </ul>
                            </li>
                            <li class="nav-item active submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Peta</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="<?=url('peta-perumahan')?>">Perumahan</a>                              
                                <li class="nav-item active"><a class="nav-link" href="<?=url('peta-risiko')?>">Risiko</a>                
                            </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?=url('contact')?>">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?=url('about')?>">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?=url('disclaimer')?>">Disclaimer</a></li>
                        </ul>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <div class="nav-right text-center text-lg-right py-4 py-lg-0">
                                <a class="button" href="<?=url('login')?>">Log In</a>
                            </div>
                        </div>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>

        <!--================Header Menu Area =================-->
        <section class="bg-gray section-padding magic-ball magic-ball-about">
            <div class="container" style="max-width: 90%;">
                <div class="section-intro text-center pb-90px">
                    <img class="section-intro-img" src="assets/images/globe.png" alt="">
                    <h2>Peta Interaktif Risiko<br>
                        Kecamatan Rancaekek
                    </h2>
                    <p>Sebuah peta yang dirancang untuk memberikan informasi tentang tingkat risiko berbagai bencana alam di Kecamatan Rancaekek. 
                        Peta ini menggunakan teknologi GIS (Geographic Information System) yang memungkinkan pengguna untuk menjelajahi dan memahami 
                        potensi risiko bencana di wilayah tersebut. 
                    </p>
                    <hr>
                </div>
                <div id="menu">
                    <label for="tampilan-peta">Tampilan Peta:</label>
                    <select id="tampilan-peta">
                        <option value="risk_banjir">Risiko Banjir</option>
                        <option value="risk_banjir_bandang">Risiko Banjir Bandang</option>
                        <option value="risk_gempabumi">Risiko Gempabumi</option>
                        <option value="risk_cuaca_ekstrim">Risiko Cuaca Ekstrim</option>
                        <option value="risk_kekeringan">Risiko Kekeringan</option>
                        <option value="risk_likuefaksi">Risiko Likuefaksi</option>
                        <option value="risk_multi_bahaya">Risiko Multi Bahaya</option>
                    </select>
                </div>   
                <div id="viewDiv"></div>
            </div>
        </section>

        <!-- ================ start footer Area ================= -->
        <footer class="w-100 text-dark" style="background-color: #80dbff;">
            <div class="container">
                <div class="footer-bottom" style="height: 100px">
                    <div class="row align-items-center">
                        <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | 
                            </a> Kecamatan Rancaekek
                        </p>
                        <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
                            <a href=" https://www.kecamatanrancaekek.bandungkab.go.id/" target="_BLANK"><i class="fa fa-university text-dark" aria-hidden="true"></i>
                            <a href=" https://www.instagram.com/kec_rancaekekofficial/"><i class="fab fa-instagram text-dark"></i></a>
                            <a href=" https://www.facebook.com/pos257x"><i class="fab fa-facebook text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://js.arcgis.com/4.21/"></script>
        <script src="<?=assets('templates/safario/vendors/jquery/jquery-3.2.1.min.js')?>"></script>
        <script src="<?=assets('templates/safario/vendors/owl-carousel/owl.carousel.min.js')?>"></script>
        <script src="<?=assets('templates/safario/vendors/nice-select/jquery.nice-select.min.js')?>"></script>
        <script src="<?=assets('templates/safario/js/jquery.ajaxchimp.min.js')?>"></script>
        <script src="<?=assets('templates/safario/js/mail-script.js')?>"></script>
        <script>
            $(document).ready(function() {
                function updateClock() {
                    var currentTime = new Date();
                    var hours = currentTime.getHours();
                    var minutes = currentTime.getMinutes();
                    var seconds = currentTime.getSeconds();
                    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                    // Menambahkan angka 0 di depan jika angka < 10
                    hours = (hours < 10 ? "0" : "") + hours;
                    minutes = (minutes < 10 ? "0" : "") + minutes;
                    seconds = (seconds < 10 ? "0" : "") + seconds;

                    // Mendapatkan hari dan tanggal
                    var day = days[currentTime.getDay()];
                    var date = currentTime.getDate();
                    var month = months[currentTime.getMonth()];
                    var year = currentTime.getFullYear();

                    // Memperbarui waktu, hari, dan tanggal pada elemen dengan id "clock"
                    $('#clock').text(hours + ":" + minutes + ":" + seconds);
                    $('#date').text(day + ', ' + date + ' ' + month + ' ' + year);
                }

                // Memanggil fungsi updateClock() setiap 1 detik
                setInterval(updateClock, 1000);
            });
        </script>
        <script>
            require([
            "esri/Map",
            "esri/views/MapView",
            "esri/widgets/BasemapToggle",
            "esri/layers/ImageryLayer",
            "esri/widgets/Legend",
            "esri/widgets/Search",
            "esri/widgets/ScaleBar",
            "esri/widgets/Print",
            "esri/Graphic",
            "esri/symbols/PictureMarkerSymbol",
            "esri/widgets/Home",
            "esri/widgets/Fullscreen",
            "esri/widgets/Compass",
            "esri/widgets/Locate"
            ], function(Map, MapView, BasemapToggle, ImageryLayer, Legend, Search, ScaleBar, Print, Graphic, PictureMarkerSymbol, Home, Fullscreen, Compass, Locate) {
                var map = new Map({
                    basemap: "osm" // Basemap default
                });

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
                        opacity: 0.5
                        });
                    } else if (selectedOption === "risk_banjir_bandang") {
                        imageryLayer = new ImageryLayer({
                        url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_banjir_bandang/ImageServer",
                        opacity: 0.5
                        });
                    } else if (selectedOption === "risk_gempabumi") {
                        imageryLayer = new ImageryLayer({
                        url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_gempabumi/ImageServer",
                        opacity: 0.5
                        });
                    } else if (selectedOption === "risk_cuaca_ekstrim") {
                        imageryLayer = new ImageryLayer({
                        url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_cuaca_ekstrim/ImageServer",
                        opacity: 0.5
                        });
                    } else if (selectedOption === "risk_kekeringan") {
                        imageryLayer = new ImageryLayer({
                        url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_kekeringan/ImageServer",
                        opacity: 0.5
                        });
                    } else if (selectedOption === "risk_likuefaksi") {
                        imageryLayer = new ImageryLayer({
                        url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_likuefaksi/ImageServer",
                        opacity: 0.5
                        });
                    } else if (selectedOption === "risk_multi_bahaya") {
                        imageryLayer = new ImageryLayer({
                        url: "https://inarisk1.bnpb.go.id:6443/arcgis/rest/services/inaRISK/layer_risiko_multi/ImageServer",
                        opacity: 0.5
                        });
                    }

                    // Tambahkan lapisan peta baru ke dalam map
                    if (imageryLayer) {
                        map.add(imageryLayer);
                    }
                }

                var view = new MapView({
                    container: "viewDiv",
                    map: map,
                    center: [107.775467, -6.983360],
                    zoom: 13
                });

                // Create a Search widget
                var searchWidget = new Search({
                    view: view
                });

                // Add the Search widget to the top-right corner of the view
                view.ui.add(searchWidget, {
                    position: "top-right"
                });

                var legend = new Legend({
                view: view
                });
        
                view.ui.add(legend, "bottom-right");

                // Buat BasemapToggle widget
                var basemapToggle = new BasemapToggle({
                    view: view,
                    nextBasemap: "satellite" // Basemap alternatif
                });

                // Tambahkan widget BasemapToggle ke dalam tampilan
                view.ui.add(basemapToggle, "bottom-left");

                // Buat ScaleBar widget
                var scaleBar = new ScaleBar({
                    view: view,
                    unit: "dual" // Anda dapat mengganti unit sesuai kebutuhan, misalnya "metric" atau "imperial"
                });

                // Tambahkan widget ScaleBar ke dalam tampilan
                view.ui.add(scaleBar, {
                    position: "bottom-left"
                });

                var printWidget = new Print({
                    view: view,
                    printServiceUrl: "https://utility.arcgisonline.com/arcgis/rest/services/Utilities/PrintingTools/GPServer/Export%20Web%20Map%20Task"
                });

                view.ui.add(printWidget, "top-right");

                // Buat widget Home
                var homeButton = new Home({
                    view: view
                });

                // Tambahkan widget Home ke dalam tampilan
                view.ui.add(homeButton, "top-left");

                // Buat widget Fullscreen
                var fullscreenButton = new Fullscreen({
                    view: view
                });

                // Tambahkan widget Fullscreen ke dalam tampilan
                view.ui.add(fullscreenButton, "top-left");

                // Buat widget Locate
                var locateWidget = new Locate({
                    view: view
                });

                // Tambahkan widget Locate ke dalam tampilan
                view.ui.add(locateWidget, {
                    position: "top-left"
                });

                // Buat widget Compass
                var compassWidget = new Compass({
                    view: view
                });

                // Tambahkan widget Compass ke dalam tampilan
                view.ui.add(compassWidget, "top-left");

                // Panggil fungsi changeBasemap saat pilihan pada menu berubah
                document.getElementById("tampilan-peta").addEventListener("change", function(event) {
                    var selectedBasemap = event.target.value;
                    changeBasemap(selectedBasemap);
                });

                // Panggil fungsi changeBasemap saat halaman web pertama kali dimuat
                changeBasemap("risk_banjir");

                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "perum11_rck";
                    $table_lokasi = "m_lokasi";
                    $table_perumahan = "m_perumahan";
                    $table_risiko = "m_risiko";

                    // Buat koneksi ke database
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Periksa koneksi
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query untuk mengambil data lat dan lng dari tabel m_lokasi dan informasi perumahan dari tabel m_perumahan dan tabel m_risiko
                    $sql = "SELECT l.lat, l.lng, l.lokasi, p.nm_perumahan, r.risiko_banjir, r.risiko_banjirbandang, r.risiko_gempabumi, r.risiko_cuacaekstrim, r.risiko_kekeringan  
                    FROM $table_lokasi l 
                    INNER JOIN $table_perumahan p ON l.id_perumahan = p.id_perumahan 
                    INNER JOIN $table_risiko r ON p.id_perumahan = r.id_perumahan";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "var locations = [";
                        while ($row = $result->fetch_assoc()) {
                            echo "{
                                lat: " . $row["lat"] . ",
                                lng: " . $row["lng"] . ",
                                lokasi: '" . $row["lokasi"] . "',
                                nm_perumahan: '" . $row["nm_perumahan"] . "',
                                risiko_banjir: '" . $row["risiko_banjir"] . "',
                                risiko_banjirbandang: '" . $row["risiko_banjirbandang"] . "',
                                risiko_gempabumi: '" . $row["risiko_gempabumi"] . "',
                                risiko_cuacaekstrim: '" . $row["risiko_cuacaekstrim"] . "',
                                risiko_kekeringan: '" . $row["risiko_kekeringan"] . "'
                            },";
                        }
                        echo "];";
                    }
                    ?>

                    // Fungsi untuk menambahkan marker perumahan ke peta
                    function addPerumahanMarkers() {
                        for (var i = 0; i < locations.length; i++) {
                            var location = locations[i];
                            var marker = new Graphic({ 
                                geometry: {
                                    type: "point",
                                    longitude: location.lng,
                                    latitude: location.lat
                                },
                                attributes: location,
                                symbol: {
                                    type: "simple-marker",
                                    color: [226, 119, 40],
                                    outline: {
                                        color: [255, 255, 255],
                                        width: 1
                                    }
                                }
                            });

                            view.graphics.add(marker);

                            marker.popupTemplate = {
                                title: "{nm_perumahan}",
                                content: "Lokasi : {lokasi} <br><br> Risiko Bencana <br> Banjir : {risiko_banjir} <br> Banjir Bandang : {risiko_banjirbandang} <br> Gempabumi : {risiko_gempabumi} <br> Cuaca Ekstrim : {risiko_cuacaekstrim} <br> Kekeringan : {risiko_kekeringan} "
                            };

                        }
                    }

                    // Panggil fungsi untuk menambahkan marker perumahan ke peta
                    addPerumahanMarkers();
            });
        </script>    
    </body>
</html>

