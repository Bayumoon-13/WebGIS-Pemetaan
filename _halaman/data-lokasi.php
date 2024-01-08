<?php
  $title="SIG-Perumahan | Data Lokasi Perumahan";
  $judul="Mapping Data";
  $url='data-lokasi';
  $fileJs='peta-formJs';

if(isset($_POST['simpan'])){
	// cek validasi
	$validation=null;
	// cek kode apakah sudah ada
	if($_POST['id_lokasi']!=""){
		$db->where('id_lokasi !='.$_POST['id_lokasi']);
	}
	$db->where('kd_lokasi',$_POST['kd_lokasi']);
	$db->get('m_lokasi');
	if($db->count>0){
		$validation[]='Kode Lokasi Sudah Ada';
	}
    //tidak boleh kosong
	if($_POST['lokasi']==''){
		$validation[]='Lokasi Tidak Boleh Kosong';
	}

	if($validation!=null){
		$setTemplate=false;
		$session->set('error_validation',$validation);
		$session->set('error_value',$_POST);
		redirect($_SERVER['HTTP_REFERER']);
		return false;
	}
	// cek validasi
    $data['id_perumahan']=$_POST['id_perumahan'];
	$data['id_desa']=$_POST['id_desa'];
    $data['id_kecamatan']=$_POST['id_kecamatan'];
	$data['kd_lokasi']=$_POST['kd_lokasi'];
    $data['lokasi']=$_POST['lokasi'];
	$data['lat']=$_POST['lat'];
	$data['lng']=$_POST['lng'];
    $data['luas_area']=$_POST['luas_area'];
    $data['geojson']=$_POST['geojson'];
	if($_POST['id_lokasi']==""){
		$exec=$db->insert("m_lokasi",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambah </div>';
		
	}
	else{
		$db->where('id_lokasi',$_POST['id_lokasi']);
		$exec=$db->update("m_lokasi",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses diubah </div>';
	}

	if($exec){
		$session->set('info',$info);
	}
	else{
      $session->set("info",'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan <br>'.$db->getLastError().'
              </div>');
	}
	redirect(url($url));
}

if(isset($_GET['hapus'])){
	$setTemplate=false;
	$db->where("id_lokasi",$_GET['id']);
	$exec=$db->delete("m_lokasi");
	$info='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses dihapus </div>';
	if($exec){
		$session->set('info',$info);
	}
	else{
      $session->set("info",'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan
              </div>');
	}
	redirect(url($url));
}

elseif(isset($_GET['tambah']) OR isset($_GET['ubah'])){
  $id_lokasi="";
  $id_perumahan="";
  $id_desa="";
  $id_kecamatan="";
  $kd_lokasi="";
  $lokasi="";
  $lat="";
  $lng="";
  $luas_area="";
  $geojson="";
  if(isset($_GET['ubah']) AND isset($_GET['id'])){
  	$id=$_GET['id'];
  	$db->where('id_lokasi',$id);
	$row=$db->ObjectBuilder()->getOne('m_lokasi');
	if($db->count>0){
		$id_lokasi=$row->id_lokasi;
        $id_perumahan=$row->id_perumahan;
		$id_desa=$row->id_desa;
        $id_kecamatan=$row->id_kecamatan;
		$kd_lokasi=$row->kd_lokasi;
        $lokasi=$row->lokasi;
		$lat=$row->lat;
		$lng=$row->lng;
		$luas_area=$row->luas_area;
        $geojson=$row->geojson;
	}
  }
  // value ketika validasi
  if($session->get('error_value')){
  	extract($session->pull('error_value'));
  }
?>
<?=content_open('Form Lokasi Perumahan')?>
<style>
    /* Gaya peta */
  #map {
    height: 800px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    position: relative; /* Menambahkan posisi relatif untuk mengatur posisi tombol */
  }

  /* Gaya tombol fullscreen */
  #fullscreen-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1000;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 6px 10px;
    cursor: pointer;
  }

    /* Gaya kotak input */
    input[type="text"] {
        padding: 6px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 14px;
        margin-bottom: 10px;
    }

    /* Gaya tombol fullscreen */
    #fullscreen-btn {
        position: absolute;
        top: 80px;
        right: 10px;
        z-index: 1000;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 6px 10px;
        cursor: pointer;
    }
</style>
<div style="display:flex;">
    <div style="width: 50%;">
        <form method="post" enctype="multipart/form-data">
            <?php
                // menampilkan error validasi
                if($session->get('error_validation')){
                    foreach ($session->pull('error_validation') as $key => $value) {
                        echo '<div class="alert alert-danger">'.$value.'</div>';
                    }
                }
            ?>
            <?=input_hidden('id_lokasi',$id_lokasi)?>
            <div class="form-group">
                <label>Kode</label>
                <div class="row">
                    <div class="col-lg-9">
                        <?=input_text('kd_lokasi',$kd_lokasi)?>
                    </div>
                </div>
            </div>
            <div class="form-group">
    		<label>Nama Perumahan</label>
                <div class="row">
                    <div class="col-md-9">
                    <?php
                        $ip['']='Pilih Perumahan';
                        foreach ($db->ObjectBuilder()->get('m_perumahan') as $row) {
                            $ip[$row->id_perumahan]=$row->nm_perumahan;
                        }
                    ?>
                    <?=select('id_perumahan',$ip,$id_perumahan)?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <div class="row">
                    <div class="col-lg-9">
                        <?=input_text('lokasi',$lokasi)?>
                    </div>
                </div>
            </div>
            <div class="form-group">
    		<label>Nama Desa</label>
                <div class="row">
                    <div class="col-md-9">
                    <?php
                        $ap['']='Pilih Desa';
                        foreach ($db->ObjectBuilder()->get('m_desa') as $row) {
                            $ap[$row->id_desa]=$row->nm_desa;
                        }
                    ?>
                    <?=select('id_desa',$ap,$id_desa)?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Nama Kecamatan</label>
                <div class="row">
                    <div class="col-md-9">
                    <?php
                            $op['']='Pilih Kecamatan';
                            foreach ($db->ObjectBuilder()->get('m_kecamatan') as $row) {
                                $op[$row->id_kecamatan]=$row->nm_kecamatan;
                            }
                    ?>
                    <?=select('id_kecamatan',$op,$id_kecamatan)?>	
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="lat">Latitude</label>
                <div class="row">
                    <div class="col-lg-9">
                        <input type="text" id="lat" name="lat" class="form-control" readonly value="<?= $lat ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="lng">Longitude</label>
                <div class="row">
                    <div class="col-lg-9">
                        <input type="text" id="lng" name="lng" class="form-control" readonly value="<?= $lng ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="luas_area">Luas Area</label>
                <div class="row">
                    <div class="col-lg-9">
                        <input type="text" id="luas_area" name="luas_area" class="form-control" readonly value="<?= $luas_area ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Geojson</label>
                <div class="row">
                    <div class="col-lg-9">
                        <textarea name="geojson" rows="10" cols="64" class="form-control" readonly><?= $geojson ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?=url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
            </div>
            
        </form>
    </div>
    <div style="width: 70%;">
        <h1>Pilih Titik</h1>
        <div id="map"></div>
        <button id="fullscreen-btn">Fullscreen</button>
    </div>
</div>
<?=content_close()?>

<?php  } else { ?>
<?=content_open('Data Lokasi Perumahan')?>

<a href="<?=url($url.'&tambah')?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
<hr>
<?=$session->pull("info")?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
            <th>Nama Perumahan</th>
            <th>Lokasi</th>
            <th>Desa</th>
            <th>Kecamatan</th>
			<th>Latitude</th>
            <th>Longitude</th>
            <th>Luas Area</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
		    $db->join('m_desa b', 'a.id_desa = b.id_desa', 'LEFT');
            $db->join('m_kecamatan c', 'a.id_kecamatan = c.id_kecamatan', 'LEFT');
            $db->join('m_perumahan d', 'a.id_perumahan = d.id_perumahan', 'LEFT');
			$getdata=$db->ObjectBuilder()->get('m_lokasi a');
			foreach ($getdata as $row) {
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row->kd_lokasi?></td>
                        <td><?=$row->nm_perumahan?></td>
                        <td><?=$row->lokasi?></td>
                        <td><?=$row->nm_desa?></td>
                        <td><?=$row->nm_kecamatan?></td>
                        <td><?=$row->lat?></td>
                        <td><?=$row->lng?></td>
                        <td><?=$row->luas_area?></td>
						<td>
							<a href="<?=url($url.'&ubah&id='.$row->id_lokasi)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=url($url.'&hapus&id='.$row->id_lokasi)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php
				$no++;
			}

		?>
	</tbody>
</table>
<hr><br>
<table class="table table-bordered" style="width: 100%; border-collapse: collapse;">
<thead>
		<tr>
			<th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: center;">No</th>
			<th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: center;">Kode</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: center;">Geojson</th>
		</tr>
	</thead>
    <tbody>
		<?php
			$no=1;
            $db->join('m_perumahan b', 'a.id_perumahan = b.id_perumahan', 'LEFT');
			$getdata=$db->ObjectBuilder()->get('m_lokasi a');
			foreach ($getdata as $row) {
				?>
					<tr>
						<td style="border: 1px solid #ddd; padding: 8px;"><?=$no?></td>
						<td style="border: 1px solid #ddd; padding: 8px;"><?=$row->kd_lokasi?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?=$row->geojson?></td>
					</tr>
				<?php
				$no++;
			}

		?>
	</tbody>
    </table>
<?=content_close()?>
<?php } ?>