<?php
    $setTemplate = false;
    $url='detail';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>SIG-Perumahan | Detail Perumahan</title>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="icon" href="assets/images/icons/logo_kab_bandung.png" type="image/png">
        <link rel="stylesheet" href="assets/templates/safario/vendors/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="assets/templates/safario/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="assets/templates/safario/vendors/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="assets/templates/safario/vendors/linericon/style.css">
        <link rel="stylesheet" href="assets/templates/safario/vendors/owl-carousel/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/templates/safario/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/templates/safario/vendors/flat-icon/font/flaticon.css">
        <link rel="stylesheet" href="assets/templates/safario/vendors/nice-select/nice-select.css">
        <link rel="stylesheet" href="assets/templates/safario/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />

        <style>
            #mapid {
                height: 500px;
                width: 100%;
                margin-bottom: 20px;
            }

            #image-container {
                text-align: center;
            }

            #image-container h2 {
                margin-bottom: 10px;
            }

            .tour-content-list li {
                margin-bottom: 20px; /* Menambahkan jarak antara setiap item daftar */
                background-color: #f2f2f2;
                padding: 10px;
                border-radius: 4px;
                display: flex; /* Mengaktifkan flexbox untuk item daftar */
                align-items: center; /* Mengatur item daftar secara vertikal di tengah */
                justify-content: space-between; /* Mengatur jarak antara teks dan tombol */
            }

            .tour-content-list li i {
                margin-right: -80px;
                color: #555555;
            }

            .tour-content-list li a.button {
                font-size: 14px;
                padding: 8px 16px;
                background-color: #337ab7;
                color: #ffffff;
                border-radius: 4px;
                text-decoration: none;
                transition: background-color 0.3s ease;
            }

            .tour-content-list li a.button:hover {
                background-color: #23527c;
            }
            
            #clock,
            #date {
                text-align: center;
                color: black;
            }

            .button{
                background: #007bff
            }
            .hero-banner h1,.header_area .navbar .nav .nav-item:hover .nav-link, .header_area .navbar .nav .nav-item.active .nav-link{
            color: #007bff
            }
            .magic-ball::before{
                border: 15px solid #007bff55 ;
            }
            .magic-ball::after{
                background: #007bff55
            }
            .header_area.navbar_fixed .main_menu .navbar{
                background: #80dbff
            }
            .button:hover {
                background-color: #005bcf;
            }
            
            .section-intro {
                position: relative;
            }

            .section-intro-img {
                max-width: 15%;
                height: auto;
                display: block;
                margin: 0 auto;
            }
        </style>
    </head>

    <?php
    // Ambil parameter id_perumahan dari URL
    $id_lokasi = $_GET['id_lokasi'];

    include '_loader.php';
    // Query untuk mendapatkan data perumahan berdasarkan id_perumahan
    $db->where('id_lokasi', $id_lokasi);
    $db->join('m_desa b', 'a.id_desa = b.id_desa', 'LEFT');
    $db->join('m_kecamatan c', 'a.id_kecamatan = c.id_kecamatan', 'LEFT');
    $db->join('m_perumahan d', 'a.id_perumahan = d.id_perumahan', 'LEFT');
    $perumahan = $db->ObjectBuilder()->getOne('m_lokasi a');
    

    // Jika data perumahan ditemukan, tampilkan detailnya
    if ($perumahan) {
        $kd_perumahan = $perumahan->kd_perumahan;
        $nm_perumahan = $perumahan->nm_perumahan;
        $type = $perumahan->type;
        $developer = $perumahan->developer;
        $kontak = $perumahan->kontak;
        $deskripsi = $perumahan->deskripsi;
        $lokasi = $perumahan->lokasi;
        $nm_desa = $perumahan->nm_desa;
        $nm_kecamatan = $perumahan->nm_kecamatan;
        $lat = $perumahan->lat;
        $lng = $perumahan->lng;
        $luas_area = $perumahan->luas_area;
        $geojson = $perumahan->geojson;
        $gambar = $perumahan->gambar;
    ?>

    
    

    <body class="bg-shape">
        <!-- Konten halaman PHP -->
        <!--================ Header Menu Area start =================-->
        <header class="header_area" style="background-color: rgba(135, 206, 250, 0.7); margin-top: -10px;">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-brand logo_h" href="index.html" style="margin-left: 80px">
                        <img src="<?=assets('images/icons/logo_kab_bandung.png')?>" style="width: 40px;float:left;margin-top:5px;margin-right: 5px">
                        <h1 class="text-danger m-0 p-0" style="font-size: 30px">
                            <a href="<?=url('utama')?>">Sistem Informasi Geografis</a>
                        </h1>
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
                                <li class="nav-item"><a id="date" class="nav-link" href="#"></a></li> 
                                <li class="nav-item"><a id="clock" class="nav-link" href="#"></a></li>
                                <li class="nav-item "><a class="nav-link" href="<?=url('utama')?>">Home</a></li> 
                                <li class="nav-item active submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item "><a class="nav-link" href="<?=url('user-administrasi')?>">Data Administrasi</a> 
                                        <li class="nav-item active"><a class="nav-link" href="<?=url('user-perumahan')?>">Data Perumahan</a>                 
                                    </ul>
                                </li>
                                <li class="nav-item active submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false">Peta</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item active"><a class="nav-link" href="<?=url('peta-perumahan')?>">Perumahan</a>                              
                                        <li class="nav-item"><a class="nav-link" href="<?=url('peta-risiko')?>">Risiko</a>                
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

        <!--================Hero Banner SM Area End =================-->
        <section class="bg-gray section-padding magic-ball magic-ball-about" style="margin-top: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Detail Perumahan</h2>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>Kode Perumahan</td>
                                    <td>
                                        <h5><?=$kd_perumahan?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Perumahan</td>
                                    <td>
                                        <h5><?=$nm_perumahan?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>
                                        <h5><?=$lokasi?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td>
                                        <h5><?=$nm_desa?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>
                                        <h5><?=$nm_kecamatan?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Developer</td>
                                    <td>
                                        <h5><?=$developer?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Type Perumahan</td>
                                    <td>
                                        <h5><?=$type?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td>
                                        <h5><?=$kontak?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Luas Area</td>
                                    <td>
                                        <h5><?=$luas_area?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td>
                                        <h5><?=$lat?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td>
                                        <h5><?=$lng?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>
                                        <h5><?=$deskripsi?></h5>
                                    </td>
                                </tr>       
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Lokasi Perumahan</h2>
                        <div id="mapid"></div>
                    </div>

                    <div class="col-md-12" style="margin-top: 20px;">
                    <h2>Gambar</h2>
                    <div id="image-container">
                        <?php
                        // Cek apakah gambar ada atau tidak
                        if (!empty($gambar)) {
                            // Jika ada, tampilkan gambar dengan menggunakan elemen <img>
                            echo "<img src='assets/unggah/gambar/$gambar' alt='Gambar Perumahan' style='width: 100%; max-height: 600px; object-fit: cover; border-radius: 5px;'>";
                        } else {
                            // Jika tidak ada, tampilkan pesan gambar tidak tersedia
                            echo "<p>Gambar tidak tersedia</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        } else {
            // Jika data perumahan tidak ditemukan
            echo "Data perumahan tidak ditemukan";
        }
        ?>
        
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
        <!-- ================ End footer Area ================= -->
        
        
        <script src="assets/templates/safario/vendors/jquery/jquery-3.2.1.min.js"></script>
        <script src="assets/templates/safario/js/jquery.ajaxchimp.min.js"></script>
        <script src="assets/templates/safario/vendors/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="assets/templates/safario/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/templates/safario/vendors/nice-select/jquery.nice-select.min.js"></script>
        <script src="assets/templates/safario/js/mail-script.js"></script>
        <script src="assets/templates/safario/js/skrollr.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                "ordering": true, // Mengaktifkan pengurutan kolom
                "searching": true // Mengaktifkan fitur pencarian
                });
            });
        </script>
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
            // Get the latitude and longitude values from the PHP variables
            var latitude = <?= $lat ?>;
            var longitude = <?= $lng ?>;
            var perumahanName = "<?= $nm_perumahan ?>";
            var perumahanLocation = "<?= $lokasi ?>";

            // Initialize the map
            var mymap = L.map('mapid').setView([latitude, longitude], 14);

            // Add a tile layer to the map
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

            L.control.layers(baseLayers).addTo(mymap);

            baseLayers.OpenStreetMap.addTo(mymap);

             // Create a custom icon for the marker
            var customIcon = L.icon({
                iconUrl: 'assets/images/marker/marker.png',
                iconSize: [80, 80], // Set the icon size according to the image dimensions
                iconAnchor: [40, 80], // Set the icon anchor point
                popupAnchor: [0, -80] // Set the popup anchor point relative to the icon
            });

            // Parse the GeoJSON data and add it as a layer to the map with custom style and icon
            var geojsonLayer = L.geoJSON(JSON.parse('<?= $geojson ?>'), {
                style: function (feature) {
                    return {
                        color: 'black', // Customize the polygon stroke color
                        fillColor: 'cyan', // Customize the polygon fill color
                        fillOpacity: 0.4, // Set the polygon fill opacity
                        weight: 2 // Set the polygon stroke weight
                    };
                },
                pointToLayer: function (feature, latlng) {
                    var marker = L.marker(latlng, { icon: customIcon });
                    marker.bindPopup('<b>' + perumahanName + '</b><br>' + perumahanLocation);
                    return marker;
                }
            }).addTo(mymap);

            // Fit the map to the bounds of the GeoJSON layer
            mymap.fitBounds(geojsonLayer.getBounds());
        </script>
    </body>
</html>