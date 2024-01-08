<?php
  $setTemplate = false;
  $url='peta-risiko';
  $fileJs='peta-risikoJs';
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

          .section-intro {
              position: relative;
          }

          .section-intro-img {
              max-width: 15%;
              height: auto;
              display: block;
              margin: 0 auto;
          }

          .popup-content {
            text-align: center;
            max-width: 250px;
          }

          .popup-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
          }

          .popup-image img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
          }

          .popup-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
          }

          .popup-button:hover {
            background-color: #0056b3;
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
                        <option value="risiko_banjir">Risiko Banjir</option>
                        <option value="risiko_banjir_bandang">Risiko Banjir Bandang</option>
                        <option value="risiko_gempabumi">Risiko Gempabumi</option>
                        <option value="risiko_cuaca_ekstrim">Risiko Cuaca Ekstrim</option>
                        <option value="risiko_kekeringan">Risiko Kekeringan</option>
                    </select>

                    <label for="tingkatan-resiko">Tingkat Risiko:</label>
                    <select id="tingkatan-resiko">
                        <option>Pilih Risiko</option>
                        <option value="Tidak Terdapat Risiko">Tidak Terdapat Risiko</option>
                        <option value="Rendah">Rendah</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                    </select>
                    
                    <label>Nama Perumahan:</label>
                    <select id="nama-perumahan" name="nama_perumahan"> <!-- Tambahkan atribut name untuk dapat mengakses nilai select saat mengirimkan data ke server -->
                    <option value="all">Tampilkan semua</option>
                    <?php
                        $getdata = $db->ObjectBuilder()->get('m_perumahan');
                        $firstData = true; // Tambahkan variabel untuk melacak iterasi pertama

                        foreach ($getdata as $row) {
                            // Periksa apakah ini adalah iterasi pertama
                            // if ($firstData) {
                            //     echo '<option selected="selected" value="' . $row->id_perumahan . '">' . $row->nm_perumahan . '</option>';
                            //     $firstData = false; // Set variabel $firstData menjadi false setelah iterasi pertama
                            // } else {
                            // }
                            echo '<option value="' .$row->id_perumahan. '">' . $row->nm_perumahan . '</option>';
                        }
                    ?>
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
        
    </body>
</html>

