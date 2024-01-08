<?php
  $setTemplate=false;
  if(isset($_POST['login'])){
    $nm_pengguna=$_POST['nm_pengguna'];
    $kt_sandi=$_POST['kt_sandi'];
    $db->where("nm_pengguna",$nm_pengguna);
    $data=$db->ObjectBuilder()->getOne("pengguna");
    if($db->count>0){
      // jika username ada
      $hash = $data->kt_sandi;
      if (password_verify($kt_sandi, $hash)) {
          $session->set("logged",true);
          $session->set("nm_pengguna",$data->nm_pengguna);
          $session->set("id_pengguna",$data->id_pengguna);
          $session->set("level",$data->level);
          $session->set("info",'<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Selamat Datang <b>'.$data->nm_pengguna.'</b> di Halaman Utama Aplikasi
                  </div>');
          redirect(url("beranda"));
      } else {
         $session->set("logged",false);
         $session->set("info",'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Nama Pengguna atau Kata Sandi Salah
              </div>');
        redirect(url("login"));
      }
    }
    else{
      $session->set("logged",false);
      $session->set("info",'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Nama Pengguna atau Kata Sandi Salah
              </div>');
      redirect(url("login"));
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>SIG-Perumahan | Form Login </title>
    <link rel="icon" href="<?=assets('images/icons/logo_kab_bandung.png')?>" type="image/png">
    <!-- Bootstrap -->
    <link href="<?=assets('templates/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=assets('templates/gentelella/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=assets('templates/gentelella/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=assets('templates/gentelella/vendors/animate.css/animate.min.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=assets('templates/gentelella/build/css/custom.min.css')?>" rel="stylesheet">
    <style type="text/css">
      body{
        background-image: url('assets/images/background.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        width: 100%;
        top: 0
      }
      .login_wrapper{
        margin-top: 0
      }
      .form-login{
        background: #fffe;
        margin: 30px;
        padding: 30px
      }
    </style>
  </head>

  <body class="d-flex align-items-center">
    <div class="col-md-6 col-sm-6 col-12">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="animate form-login">
            <section class="">
            <?=$session->pull("info")?>
              <form method="POST">
                <div class="navbar-brand logo_h" href="index.html" style="margin-left: 80px">
                    <img src="<?=assets('images/icons/logo_kab_bandung.png')?>" style="width: 40px;float:left;margin-top:5px;margin-right: 5px">
                    <h1 class="text-danger m-0 p-0" style="font-size: 30px; color: black;"><a href="<?=url('utama')?>">Sistem Informasi Geografis</a></h1>
                    <p class="m-0 p-0" style="color: black; font-size: 14px;margin-top:-5px !important">Perumahan | Kecamatan Rancaekek</p>
                </div>
                <h2>Login Form</h2>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Username" name="nm_pengguna" required="" />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="kt_sandi" required="" />
                </div>
                <div>
                  <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Log in</button>
                  <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                </div>

                <div class="clearfix"></div>
                <div>
                  <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |
                    <a href="https://www.kecamatanrancaekek.bandungkab.go.id/" target="_BLANK">
                    <i class="fa fa-university" aria-hidden="true"></i>
                    </a> 
                    <a href="https://www.kecamatanrancaekek.bandungkab.go.id/" target="_BLANK">
                      Kecamatan Rancaekek
                    </a>
                  </p>
                </div>
                <hr>
                <div>
                  <a href="<?=url('utama')?>"><p class="text-center">Beranda</p></a>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
      
    </div>
    <div class="col-md-6 d-xs-none">
      <img src="<?=assets('images/orang.png')?>" width="80%">
    </div>
  </body>
</html>
