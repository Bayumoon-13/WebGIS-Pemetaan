<?php
  $title="Beranda";
  $judul=$title;
  
?>

<?=content_open('Halaman Beranda')?>
<?=$session->pull("info")?>
    <center>
        <img src="<?=assets('images/icons/logo_kab_bandung.png')?>" width="150px">
    </center>
    <br>
    <h2>
        <center>
            <b> SISTEM INFORMASI GEOGRAFIS <br><br>
                PEMETAAN PERSEBARAN DAN RISIKO PEMBANGUNAN PERUMAHAN <br><br>
                DI KECAMATAN RANCAEKEK KABUPATEN BANDUNG <br><br>
                PROVINSI JAWA BARAT <br><br>
            </b>
        </center>
    </h2>
    <br>
    <center>
        <h2>
            <a href="<?=url('utama')?>">
                <button class="btn btn-primary" type="button" href="<?=url('utama')?>">Check Website</button>
            </a>
        </h2>
    </center>       
<?=content_close()?>