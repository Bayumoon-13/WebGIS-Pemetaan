<?php
$setTemplate=false;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content='prkBvepwI3yMmnJAhhKHknvjHIpQw1_YK8uhFwM1v7k' name='google-site-verification'/>
    <title>SIG-Perumahan | Home</title>
    
    <link rel="icon" href="<?=assets('images/icons/logo_kab_bandung.png')?>" type="image/png">
    <link rel="stylesheet" href="<?=assets('templates/safario/vendors/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=assets('templates/safario/vendors/fontawesome/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=assets('templates/safario/vendors/themify-icons/themify-icons.css')?>">
    <link rel="stylesheet" href="<?=assets('templates/safario/vendors/linericon/style.css')?>">
    <link rel="stylesheet" href="<?=assets('templates/safario/vendors/owl-carousel/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?=assets('templates/safario/vendors/owl-carousel/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?=assets('templates/safario/vendors/flat-icon/font/flaticon.css')?>">
    <link rel="stylesheet" href="<?=assets('templates/safario/vendors/nice-select/nice-select.css')?>">
    <link rel="stylesheet" href="<?=assets('templates/safario/css/style.css')?>">

    <style>
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
                <li class="nav-item active"><a id="date" class="nav-link" href="#"></a></li> 
                <li class="nav-item active"><a id="clock" class="nav-link" href="#"></a></li>
                <li class="nav-item active"><a class="nav-link" href="<?=url('utama')?>">Home</a></li> 
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Data</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="<?=url('user-administrasi')?>">Data Administrasi</a> 
                    <li class="nav-item"><a class="nav-link" href="<?=url('user-perumahan')?>">Data Perumahan</a>                 
                  </ul>
                </li>
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Peta</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="<?=url('peta-perumahan')?>">Perumahan</a>                              
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

    <!--================Hero Banner Area Start =================-->
    <section class="hero-banner">
      <div style="background-image: url('assets/images/bg_kecamatan.png'); height: 870px; margin-top: -70px; margin-bottom: -200px;">
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-5 mb-5 mb-md-0 offset-md-6 offset-lg-7">
            <div style="margin: 20px; background-color: rgba(135, 206, 250, 0.7); padding: 5px;">
              <h1 style="font-size: 25px; font-weight: bold; text-align: center;">KECAMATAN RANCAEKEK</h1>
              <h1 style="font-weight: bold; text-align: center;">SISTEM INFORMASI GEOGRAFIS PERUMAHAN</h1>
              <p style="line-height: 1.5; color: black; text-align: justify;">Website Sistem Informasi Geografis (SIG) Perumahan Kecamatan Rancaekek adalah sebuah platform online 
                yang bertujuan untuk menyediakan informasi geografis yang berkaitan dengan perumahan di wilayah Kecamatan Rancaekek.
                Informasi disajikan secara interaktif dalam bentuk peta yang mudah dipahami, sehingga pengguna dapat dengan mudah mengeksplorasi dan menganalisis data 
                geografis yang relevan. 
              </p>
              <a class="button button-hero mt-4" href="#tour" style="text-align: center; display: block; margin: 0 auto;">Let's Explore</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================Hero Banner Area End =================-->

    <!--================Tour section Start =================-->
    <section id="tour" class="bg-gray section-padding magic-ball magic-ball-about" style="margin-top: 200px; margin-bottom: -150px;">
      <div class="container magic-ball ">
        <div class="row">
          <div class="col-md-6">
            <div class="tour-card">
              <img class="card-img rounded-0" src="assets/images/camat.png" alt="" style="max-width: 50%; ">
              <div class="tour-card-overlay">
                <div class="media">
                  <div class="media-body">
                    <h4>Ir. H. DIAR HADI GUSDINAR, M.Si</h4>
                    <p>Camat Rancaekek</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <div class="tour-content">
                  <h2 class="tour-content-heading">Data Informasi</h2>
                  <p class="tour-content-description" style="text-align: justify;">Menu halaman "Data Informasi" merupakan bagian yang menyediakan informasi 
                    terkait dengan data Administrasi dan data Perumahan di wilayah Kecamatan Rancaekek. Pada halaman ini, pengguna dapat mengakses informasi 
                    terperinci tentang administrasi dan perumahan di wilayah tersebut.</p>
                  <ul class="tour-content-list">
                    <li>
                      <i class="fas fa-chevron-right"></i> Data Administrasi 
                      <a class="button button-primary" href="<?=url('user-administrasi')?>">Check Data</a>
                    </li>
                    <li>
                      <i class="fas fa-chevron-right"></i> Data Perumahan 
                      <a class="button button-primary" href="<?=url('user-perumahan')?>">Check Data</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================Tour section End =================-->



    <!--================Service Area Start =================-->
    <section id="service_area" class="section-margin generic-margin">
      <div class="container">
        <div class="section-intro text-center pb-90px">
          <img class="section-intro-img" src="<?=assets('templates/safario/img/home/section-icon.png')?>" alt="">
          <h2>Menu Peta Interaktif</h2>
          <p>Jelajahi sistem informasi kami, Kami juga menyediakan fitur interaktif yang memungkinkan Anda untuk 
            menjelajahi data geografis, dan melakukan analisis mendalam untuk memahami kondisi geografis yang 
            memengaruhi pembangunan perumahan
          </p>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="service-card text-center">
              <div class="service-card-img">
                <img class="img-fluid" src="<?=assets('templates/safario/img/home/service2.png')?>" alt="">
              </div>
              <div class="service-card-body">
              <h3>Peta Lokasi Perumahan <br>
                Kecamatan Rancaekek
              </h3>
                <p>Peta yang menyajikan marker yang digunakan untuk menandai semua lokasi perumahan di peta wilayah Kecamatan Rancaekek </p>
                <a class="button button-hero mt-4" href="<?=url('peta-perumahan')?>" >Check Peta</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="service-card text-center">
              <div class="service-card-img">
                <img class="img-fluid" src="<?=assets('templates/safario/img/home/service3.png')?>" alt="">
              </div>
              <div class="service-card-body">
              <h3>Peta Risiko <br>
                Kecamatan Rancaekek
              </h3>
                <p>Peta yang menyajikan sebuah informasi tentang tingkat risiko atau bahaya banjir yang terkait di wilayah Kecamatan Rancaekek</p>
                <a class="button button-hero mt-4" href="<?=url('peta-risiko')?>">Check Peta</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================Service Area End =================-->

    <section class="bg-gray section-padding magic-ball magic-ball-about">
      <div class="container">
          <div id="mapid"></div>
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
    <!-- ================ End footer Area ================= -->

    <script src="<?=assets('templates/safario/vendors/jquery/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=assets('templates/safario/vendors/bootstrap/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=assets('templates/safario/vendors/owl-carousel/owl.carousel.min.js')?>"></script>
    <script src="<?=assets('templates/safario/vendors/Magnific-Popup/jquery.magnific-popup.min.js')?>"></script>
    <script src="<?=assets('templates/safario/vendors/nice-select/jquery.nice-select.min.js')?>"></script>
    <script src="<?=assets('templates/safario/js/jquery.form.js')?>"></script>
    <script src="<?=assets('templates/safario/js/jquery.validate.min.js')?>"></script>
    <script src="<?=assets('templates/safario/js/contact.js')?>"></script>
    <script src="<?=assets('templates/safario/js/jquery.ajaxchimp.min.js')?>"></script>
    <script src="<?=assets('templates/safario/js/mail-script.js')?>"></script>
    <script src="<?=assets('templates/safario/js/skrollr.min.js')?>"></script>
    <script src="<?=assets('templates/safario/js/jquery.magnific-popup.min.js')?>"></script>	
    <script src="<?=assets('templates/safario/js/main.js')?>"></script>
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
