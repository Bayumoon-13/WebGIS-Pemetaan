<?php
$setTemplate=false;
$url='contact';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SIG-Perumahan | Contact</title>
    
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
      .tour-content-list {
          list-style: none;
          padding-left: 0;
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

  <body class="bg-shape">
    <!--================ Header Menu Area start =================-->
    <header class="header_area" style="background-color: rgba(135, 206, 250, 0.7);">
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
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="<?=url('user-administrasi')?>">Data Administrasi</a> 
                        <li class="nav-item"><a class="nav-link" href="<?=url('user-perumahan')?>">Data Perumahan</a>                 
                    </ul>
                </li>
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false">Peta</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="<?=url('peta-perumahan')?>">Perumahan</a>                              
                        <li class="nav-item"><a class="nav-link" href="<?=url('peta-risiko')?>">Risiko</a>                
                    </ul>
                </li>
                <li class="nav-item active"><a class="nav-link" href="<?=url('contact')?>">Contact</a></li>
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

    <!--================Hero Banner SM Area Start =================-->
    <section class="hero-banner-sm magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 200px">
      <div class="container">
          <div class="col-md-6">
              <h1>Contact Us</h1>
              <p class="text-justify">
              Selamat datang di halaman "Contact Us" kami !!! Kami sangat senang mendengar dari Anda dan siap untuk
              menjawab pertanyaan atau menyediakan bantuan yang Anda butuhkan. Silakan hubungi kami menggunakan informasi kontak di bawah ini:</p>
          </div>
      </div>
    </section>
    <!--================Hero Banner SM Area End =================-->


    <!-- ================ contact section start ================= -->
    <section class="bg-gray section-padding magic-ball magic-ball-about">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="contact-title">Maps</h2>
          </div>
          <div class="d-none d-sm-block mb-5 pb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7920.847212428153!2d107.761053!3d-6.959254!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c37e648772f7%3A0x8b78ee862545f8ee!2sJl.%20Raya%20Majalaya%20-%20Rancaekek%20No.89%2C%20Rancaekek%20Wetan%2C%20Kec.%20Rancaekek%2C%20Kabupaten%20Bandung%2C%20Jawa%20Barat%2040394%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1688141431385!5m2!1sen!2sus" 
              width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
                
          <div class="col-lg-4">
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-home"></i></span>
              <div class="media-body">
                <h3>Kantor Kecamatan Rancaekek</h3>
                <p>JL. Rancaekek Majalaya No. 89 Rancaekek</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-tablet"></i></span>
              <div class="media-body">
                <h3><a href="tel:0227798016">(022) 7798016</a></h3>
                <p>Call our contacts any time!</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-email"></i></span>
              <div class="media-body">
                <h3><a href="mailto:kec.rancaekek01@gmail.com">kec.rancaekek01@gmail.com</a></h3>
                <p>Send us your query anytime!</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-instagram"></i></span>
              <div class="media-body">
                <h3><a href="https://www.instagram.com/kec_rancaekekofficial/">kec_rancaekekofficial</a></h3>
                <p>Check out our social media any time!</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-facebook"></i></span>
              <div class="media-body">
                <h3><a href="https://www.facebook.com/pos257x">Adm Kecamatan Rancaekek</a></h3>
                <p>Check out our social media any time!</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-youtube"></i></span>
              <div class="media-body">
                <h3><a href="https://www.youtube.com/@kecamatanrancaekek">Kecamatan Rancaekek</a></h3>
                <p>Check out our youtube channel any time!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ contact section end ================= -->

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
    <!-- ================ end footer Area ================= -->

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