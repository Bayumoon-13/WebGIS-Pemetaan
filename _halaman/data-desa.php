<?php
  $title="SIG-Perumahan | Data Desa";
  $judul="Master Data";
  $url='data-desa';

if(isset($_POST['simpan'])){
	$file=upload('geojson_desa','geojson');
	if($file!=false){
		$data['geojson_desa']=$file;
		if($_POST['id_desa']!=''){
			// hapus file di dalam folder
			$db->where('id_desa',$_GET['id']);
			$get=$db->ObjectBuilder()->getOne('m_desa');
			$geojson_desa=$get->geojson_desa;
			unlink('assets/unggah/geojson/'.$geojson_desa);
			// end hapus file di dalam folder
		}
	}
	// cek validasi
	$validation=null;
	// cek kode apakah sudah ada
	if($_POST['id_desa']!=""){
		$db->where('id_desa !='.$_POST['id_desa']);
	}
	$db->where('kd_desa',$_POST['kd_desa']);
	$db->get('m_desa');
	if($db->count>0){
		$validation[]='Kode Wilayah Sudah Ada';
	}
	//tidak boleh kosong
	if($_POST['nm_desa']==''){
		$validation[]='Nama Desa/Kelurahan Tidak Boleh Kosong';
	}

	if($validation!=null){
		$setTemplate=false;
		$session->set('error_validation',$validation);
		$session->set('error_value',$_POST);
		redirect($_SERVER['HTTP_REFERER']);
		return false;
	}
	// cek validasi

	if($_POST['id_desa']==""){
		$data['kd_desa']=$_POST['kd_desa'];
		$data['nm_desa']=$_POST['nm_desa'];
		$data['luas_desa']=$_POST['luas_desa'];
		$data['jml_penduduk']=$_POST['jml_penduduk'];
		$data['warna_desa']=$_POST['warna_desa'];
		$exec=$db->insert("m_desa",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambah </div>';
		
	}
	else{
		$data['kd_desa']=$_POST['kd_desa'];
		$data['nm_desa']=$_POST['nm_desa'];
		$data['luas_desa']=$_POST['luas_desa'];
		$data['jml_penduduk']=$_POST['jml_penduduk'];
		$data['warna_desa']=$_POST['warna_desa'];
		$db->where('id_desa',$_POST['id_desa']);
		$exec=$db->update("m_desa",$data);
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
	// hapus file di dalam folder
	$db->where('id_desa',$_GET['id']);
	$get=$db->ObjectBuilder()->getOne('m_desa');
	$geojson_desa=$get->geojson_desa;
	unlink('assets/unggah/geojson/'.$geojson_desa);
	// end hapus file di dalam folder
	$db->where("id_desa",$_GET['id']);
	$exec=$db->delete("m_desa");
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
  $id_desa="";
  $kd_desa="";
  $nm_desa="";
  $luas_desa="";
  $jml_penduduk="";
  $warna_desa="";
  $geojson_desa="";
  if(isset($_GET['ubah']) AND isset($_GET['id'])){
  	$id=$_GET['id'];
  	$db->where('id_desa',$id);
	$row=$db->ObjectBuilder()->getOne('m_desa');
	if($db->count>0){
		$id_desa=$row->id_desa;
		$kd_desa=$row->kd_desa;
		$nm_desa=$row->nm_desa;
		$luas_desa=$row->luas_desa;
		$jml_penduduk=$row->jml_penduduk;
		$warna_desa=$row->warna_desa;
        $geojson_desa=$row->geojson_desa;
	}
  }
  // value ketika validasi
  if($session->get('error_value')){
  	extract($session->pull('error_value'));
  }
?>
<?=content_open('Form Desa')?>
    <form method="post" enctype="multipart/form-data">
    	<?php
    		// menampilkan error validasi
  			if($session->get('error_validation')){
  				foreach ($session->pull('error_validation') as $key => $value) {
  					echo '<div class="alert alert-danger">'.$value.'</div>';
  				}
  			}
    	?>
    	<?=input_hidden('id_desa',$id_desa)?>
    	<div class="form-group">
    		<label>Kode Wilayah</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('kd_desa',$kd_desa)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<label>Nama Desa/Kelurahan</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('nm_desa',$nm_desa)?>
	    		</div>
    		</div>
    	</div>
		<div class="form-group">
    		<label>Luas Desa</label> 
    		<div class="row">
	    		<div class="col-md-3">
	    			<?=input_text('luas_desa',$luas_desa)?>
	    		</div>
    		</div>
    	</div>
		<div class="form-group">
    		<label>Jumlah Penduduk (Jiwa)</label> 
    		<div class="row">
	    		<div class="col-md-3">
	    			<?=input_text('jml_penduduk',$jml_penduduk)?>
	    		</div>
    		</div>
    	</div>
        <div class="form-group">
    		<label>Warna</label> 
    		<div class="row">
	    		<div class="col-md-3">
	    			<?=input_color('warna_desa',$warna_desa)?>
	    		</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<label>GeoJSON</label>
    		<div class="row">
	    		<div class="col-md-4">
    				<?=input_file('geojson_desa',$geojson_desa)?>
    			</div>
    		</div>
    	</div>
    	
    	<div class="form-group">
    		<button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
    </form>
<?=content_close()?>

<?php  } else { ?>
<?=content_open('Data Desa')?>

<a href="<?=url($url.'&tambah')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah</a>
<hr>
<?=$session->pull("info")?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Wilayah</th>
			<th>Nama Desa/Kelurahan</th>
			<th>Luas Desa</th>
			<th>Jumlah Penduduk (Jiwa)</th>
			<th>Warna</th>
            <th>GeoJSON</th>
			<th>Aksi</th>
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
                        <td style="background: <?=$row->warna_desa?>"></td>
						<td><a href="<?=assets('unggah/geojson/'.$row->geojson_desa)?>" target="_BLANK"><?=$row->geojson_desa?></a></td>
						<td>
							<a href="<?=url($url.'&ubah&id='.$row->id_desa)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=url($url.'&hapus&id='.$row->id_desa)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php
				$no++;
			}

		?>
	</tbody>
</table>
<?=content_close()?>
<?php } ?>