<header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIG-Perumahan</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span id="date"></span>
        <span id="clock"></span>
      </a>
        
      <!-- Navbar start -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu"> 
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="assets/images/icons/logo_admin.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?=$session->get("nm_pengguna")?></span>
              </a>
            
            <ul class="dropdown-menu">   
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=url('utama')?>" class="btn btn-default btn-flat">kembali</a>
                </div>
                <div class="pull-right">
                  <a href="<?=url('logout')?>" class="fa fa-sign-out btn btn-default btn-flat ">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
