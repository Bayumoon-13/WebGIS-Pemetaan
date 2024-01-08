
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/images/icons/logo_admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$session->get("nm_pengguna")?> (<?=$session->get("level")?>)</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=url('beranda')?>">
            <i class="fa fa-home" aria-hidden="true"></i> <span>Beranda</span>
          </a>
        </li>
        <?php if ($session->get('level')=='Petugas'): ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=url('data-kecamatan')?>"><i class="fa fa-circle-o"></i> Kecamatan</a></li>
            <li><a href="<?=url('data-desa')?>"><i class="fa fa-circle-o"></i> Desa</a></li>
            <li><a href="<?=url('data-perumahan')?>"><i class="fa fa-circle-o"></i> Detail Perumahan</a></li>
            <li><a href="<?=url('data-risiko')?>"><i class="fa fa-circle-o"></i> Risiko</a></li>
          </ul> 
        </li>
        <li>
          <a href="<?=url('cetak-petugas')?>">
            <i class="fa fa-print" aria-hidden="true"></i> <span>Cetak Laporan</span>
          </a>
        </li> 
        <?php endif ?>
        <?php if ($session->get('level')=='Teknisi'): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Mapping Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?=url('data-lokasi')?>"><i class="fa fa-circle-o"></i> Lokasi Perumahan</a></li>
            </ul>
          </li>
          <li>
          <a href="<?=url('cetak-teknisi')?>">
            <i class="fa fa-print" aria-hidden="true"></i> <span>Cetak Laporan</span>
          </a>
        </li> 
        <?php endif ?>
        
        <li>
          <a href="<?=url('logout')?>">
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
