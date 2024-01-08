<?php
$setTemplate=false;
$url='about';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>SIG-Perumahan | About</title>

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
                                <li class="nav-item"><a class="nav-link" href="<?=url('contact')?>">Contact</a></li>
                                <li class="nav-item active"><a class="nav-link" href="<?=url('about')?>">About</a></li>
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
                    <h1>About </h1>
                    <p class="text-justify font-size: 18px;">
                    Selamat datang di halaman "About" kami !!! Website Sistem Informasi Geografis Pemetaan dan Risiko Pembangunan Perumahan di Kecamatan Rancaekek merupakan sebuah 
                    platform yang didedikasikan untuk memberikan informasi yang relevan dan terkini mengenai pemetaan geografis serta risiko pembangunan 
                    perumahan di wilayah kecamatan Rancaekek.</p>
                </div>
            </div>
        </section>
        <!--================Hero Banner SM Area End =================-->

        <!--================Tour section Start =================-->
        <section class="bg-gray section-padding magic-ball magic-ball-about" style="margin-top: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="tour-content">
                                    <h2 class="tour-content-heading">Tujuan</h2>
                                    <p class="tour-content-description" style="text-align: justify; font-size: 18px;">Tujuan utama dari Sistem Informasi Geografis Pemetaan dan Risiko 
                                    Perumahan di Kecamatan Rancaekek adalah untuk memberikan informasi yang lengkap dan terkini mengenai data administrasi, pemetaan, 
                                    serta risiko perumahan di wilayah Kecamatan Rancaekek. Kami berkomitmen untuk menyediakan data yang akurat dan dapat diandalkan kepada 
                                    pengguna sistem ini.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="tour-content ">
                                    <h2 class="tour-content-heading">Visi</h2>
                                    <p class="tour-content-description" style="text-align: justify; font-size: 18px;">Visi kami adalah menyediakan sumber daya yang berharga bagi masyarakat, pengembang perumahan, 
                                    dan pihak terkait lainnya untuk memahami dengan lebih baik aspek geografis dan risiko yang terkait dengan pembangunan perumahan di Kecamatan Rancaekek. Kami 
                                    berusaha untuk menyajikan data dan informasi yang akurat, terpercaya, dan mudah diakses.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tour-content" style="margin-left: 60px; font-size: 18px;">
                        <h2>Fungsi</h2>
                        <p>Sistem Informasi Geografis (SIG) Perumahan Kecamatan Rancaekek memiliki beberapa fungsi utama, antara lain:</p>
                        <ul>
                            <li>1. Menyediakan informasi geografis tentang perumahan di wilayah Kecamatan Rancaekek</li>
                            <li>2. Memetakan lokasi perumahan dengan menggunakan peta interaktif</li>
                            <li>3. Mengidentifikasi dan menganalisis berbagai risiko bencana yang mungkin terjadi</li>
                            <li>4. Menyediakan data administrasi terkait dengan perumahan di Kecamatan Rancaekek</li>
                            <li>5. Memudahkan pengguna dalam mencari informasi dan melakukan analisis geografis</li>
                        </ul>
                    </div>
                </div>
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