<?php
$setTemplate=false;
$url='disclaimer';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>SIG-Perumahan | Disclaimer</title>

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
                                <li class="nav-item"><a class="nav-link" href="<?=url('about')?>">About</a></li>
                                <li class="nav-item active"><a class="nav-link" href="<?=url('disclaimer')?>">Disclaimer</a></li>
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
        <section class="hero-banner-sm magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1"
        data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 200px">
        <div class="container">
            <h1>Disclaimer</h1><br>
            <h2>Informasi Umum</h2>
            <p style="text-align: justify; font-size: 18px;">
                SIG-Perumahan Kecamatan Rancaekek adalah sebuah platform yang menyediakan informasi geografis tentang persebaran dan risiko pembangunan perumahan di Kecamatan Rancaekek. 
                Informasi yang disajikan dalam SIG ini bersifat umum dan dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya. Meskipun tim kami berusaha untuk menyediakan informasi 
                yang akurat dan terbaru, kami tidak memberikan jaminan atau representasi apapun mengenai kelengkapan, keakuratan, keandalan, ketersediaan, atau kesesuaian informasi yang disajikan.
            </p><br>
            <h2>Keterbatasan Informasi</h2>
            <p style="text-align: justify; font-size: 18px;">
                Informasi yang tersedia dalam SIG Perumahan Kecamatan Rancaekek hanya dimaksudkan sebagai panduan umum dan tidak boleh dianggap sebagai nasihat hukum, finansial, 
                atau profesional lainnya. Pengguna bertanggung jawab atas penilaian, risiko, dan keputusan yang diambil berdasarkan informasi dalam situs web atau aplikasi ini. 
                Kami tidak bertanggung jawab atas konsekuensi apapun yang mungkin timbul dari penggunaan informasi ini.
            </p><br>
            <h2>Ketepatan Data</h2>
            <p style="text-align: justify; font-size: 18px;">
                SIG-Perumahan Kecamatan Rancaekek mengandalkan data yang diterima dan didapatkan dari berbagai pihak yang datang ke kantor Kecamatan Rancaekek. 
                Meskipun kami berusaha untuk menyajikan data yang akurat dan terpercaya, kami tidak dapat menjamin bahwa semua informasi yang diberikan benar-benar 
                tepat pada setiap waktu. Kami tidak bertanggung jawab atas kesalahan atau ketidaktepatan data yang mungkin terjadi.
            </p><br>
            <h2>Persetujuan</h2>
            <p style="text-align: justify; font-size: 18px;">
                Dengan menggunakan situs web kami, Anda dianggap telah membaca, memahami, dan menyetujui semua ketentuan dalam disclaimer ini.
            </p><br>
            <h2>Pembaruan</h2>
            <p style="text-align: justify; font-size: 18px;">
                Jika kami memperbarui, mengubah, atau membuat perubahan apa pun pada data ini, perubahan tersebut akan diposting secara jelas di sini.   
                Jika Anda memiliki pertanyaan atau perlu klarifikasi lebih lanjut tentang disclaimer ini, silakan hubungi kami melalui informasi kontak yang 
                tersedia di situs web atau aplikasi SIG Perumahan Kecamatan Rancaekek.
            </p>     
        </div>
        </section>
        <!--================Hero Banner SM Area End =================-->

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