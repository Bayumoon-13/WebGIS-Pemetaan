<?php
    $setTemplate = false;
    $url='user-administrasi';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>SIG-Perumahan | Data Administrasi</title>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
                                        <li class="nav-item active"><a class="nav-link" href="<?=url('user-administrasi')?>">Data Administrasi</a> 
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
                <h1>Data Administrasi</h1>
                <p class="text-justify">
                Selamat datang di halaman "Data Administrasi" kami !!! Halaman ini dirancang khusus untuk membantu Anda mengakses dan melihat data administratif 
                dengan mudah dan cepat</p>
            </div>
        </div>
        </section>
        <!--================Hero Banner SM Area End =================-->

        <!--================Hero Banner Area Start =================-->
        <section class="hero-banner magic-ball">
            <div class="container">
                <div class="row align-items-center text-center text-md-left">
                    <div class="col-md-7 col-lg-5 mb-5 mb-md-0">
                        <h2>Kecamatan Rancaekek</h2>
                        <p>Detail informasi</p>
                        <div class="panel-body">
                            <table class="table">
                                <?php
                                $no=1;
                                $getdata=$db->ObjectBuilder()->get('m_kecamatan');
                                foreach ($getdata as $row) {
                                    ?>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>
                                            <h5><?=$row->nm_provinsi?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>
                                            <h5><?=$row->nm_kabupaten?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode</td>
                                        <td>
                                            <h5><?=$row->kd_kecamatan?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>
                                            <h5><?=$row->nm_kecamatan?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Luas Area</td>
                                        <td>
                                            <h5><?=$row->luas_kecamatan?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Penduduk</td>
                                        <td>
                                            <h5><?=$row->jml_penduduk?> Jiwa</h5>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-5 col-lg-7 col-xl-6 offset-xl-1">
                        <div class="hero-img">
                            <img class="img-fluid" src="assets/images/kecamatan.png" alt="" style="max-width: 100%; height: 350px; margin-top: 80px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================Hero Banner Area End =================-->
        <hr>
        <section class="hero-banner magic-ball" style="margin-bottom: 600px;">
            <div class="section-intro text-center pb-90px">
                <img class="section-intro-img" src="assets/images/folder.png" alt="">
                <h2>Master Data Desa <br>
                    Kecamatan Rancaekek
                </h2>
                <p>Tabel informasi dari desa-desa yang berada di Kecamatan Rancaekek. </p>
                <hr>
            </div>
            <div class="col-md-8 text-center mx-auto">
                <div class="data-count">
                    <?php
                    $getdata = $db->ObjectBuilder()->get('m_desa');
                    $dataArray = json_decode(json_encode($getdata), true);
                    $dataCount = count($dataArray);
                    ?>
                    <h3>Jumlah Data Desa: <?php echo $dataCount; ?></h3>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Desa</th>
                                <th>Luas Desa</th>
                                <th>Jumlah Penduduk (Jiwa)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                $getdata=$db->ObjectBuilder()->get('m_desa');
                                foreach ($getdata as $row) {
                                    ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$row->kd_desa?></td>
                                            <td><?=$row->nm_desa?></td>
                                            <td><?=$row->luas_desa?></td>
                                            <td><?=$row->jml_penduduk?></td>
                                        </tr>
                                    <?php
                                    $no++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!--================Content Area =================-->

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
        <script src="<?=assets('templates/safario/js/jquery.ajaxchimp.min.js')?>"></script>
        <script src="<?=assets('templates/safario/js/mail-script.js')?>"></script>
        <script src="<?=assets('templates/safario/js/skrollr.min.js')?>"></script>
        <script src="<?=assets('templates/safario/js/jquery.magnific-popup.min.js')?>"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
        
    </body>
</html>