<?php
  $title="SIG-Perumahan | Data Kecamatan ";
  $judul="Master Data";
  $url='data-kecamatan';

if(isset($_POST['simpan'])){
	$file=upload('geojson_kecamatan','geojson');
	if($file!=false){
		$data['geojson_kecamatan']=$file;
		if($_POST['id_kecamatan']!=''){
			// hapus file di dalam folder
			$db->where('id_kecamatan',$_GET['id']);
			$get=$db->ObjectBuilder()->getOne('m_kecamatan');
			$geojson_kecamatan=$get->geojson_kecamatan;
			unlink('assets/unggah/geojson/'.$geojson_kecamatan);
			// end hapus file di dalam folder
		}
	}
	// cek validasi
	$validation=null;
	// cek kode apakah sudah ada
	if($_POST['id_kecamatan']!=""){
		$db->where('id_kecamatan !='.$_POST['id_kecamatan']);
	}
	$db->where('kd_kecamatan',$_POST['kd_kecamatan']);
	$db->get('m_kecamatan');
	if($db->count>0){
		$validation[]='Kode Wilayah Sudah Ada';
	}
	//tidak boleh kosong
	if($_POST['nm_kecamatan']==''){
		$validation[]='Nama Kecamatan Tidak Boleh Kosong';
	}

	if($validation!=null){
		$setTemplate=false;
		$session->set('error_validation',$validation);
		$session->set('error_value',$_POST);
		redirect($_SERVER['HTTP_REFERER']);
		return false;
	}
	// cek validasi

	if($_POST['id_kecamatan']==""){
		$data['nm_provinsi']=$_POST['nm_provinsi'];
		$data['nm_kabupaten']=$_POST['nm_kabupaten'];
		$data['kd_kecamatan']=$_POST['kd_kecamatan'];
		$data['nm_kecamatan']=$_POST['nm_kecamatan'];
		$data['luas_kecamatan']=$_POST['luas_kecamatan'];
		$data['jml_penduduk']=$_POST['jml_penduduk'];
		$data['warna_kecamatan']=$_POST['warna_kecamatan'];
		$exec=$db->insert("m_kecamatan",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambah </div>';
		
	}
	else{
		$data['nm_provinsi']=$_POST['nm_provinsi'];
		$data['nm_kabupaten']=$_POST['nm_kabupaten'];
		$data['kd_kecamatan']=$_POST['kd_kecamatan'];
		$data['nm_kecamatan']=$_POST['nm_kecamatan'];
		$data['luas_kecamatan']=$_POST['luas_kecamatan'];
		$data['jml_penduduk']=$_POST['jml_penduduk'];
		$data['warna_kecamatan']=$_POST['warna_kecamatan'];
		$db->where('id_kecamatan',$_POST['id_kecamatan']);
		$exec=$db->update("m_kecamatan",$data);
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
	$db->where('id_kecamatan',$_GET['id']);
	$get=$db->ObjectBuilder()->getOne('m_kecamatan');
	$geojson_kecamatan=$get->geojson_kecamatan;
	unlink('assets/unggah/geojson/'.$geojson_kecamatan);
	// end hapus file di dalam folder
	$db->where("id_kecamatan",$_GET['id']);
	$exec=$db->delete("m_kecamatan");
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
  $id_kecamatan="";
  $nm_provinsi="";
  $nm_kabupaten="";
  $kd_kecamatan="";
  $nm_kecamatan="";
  $luas_kecamatan="";
  $jml_penduduk="";
  $warna_kecamatan="";
  $geojson_kecamatan="";
  if(isset($_GET['ubah']) AND isset($_GET['id'])){
  	$id=$_GET['id'];
  	$db->where('id_kecamatan',$id);
	$row=$db->ObjectBuilder()->getOne('m_kecamatan');
	if($db->count>0){
		$id_kecamatan=$row->id_kecamatan;
		$nm_provinsi=$row->nm_provinsi;
		$nm_kabupaten=$row->nm_kabupaten;
		$kd_kecamatan=$row->kd_kecamatan;
		$nm_kecamatan=$row->nm_kecamatan;
		$luas_kecamatan=$row->luas_kecamatan;
		$jml_penduduk=$row->jml_penduduk;
		$warna_kecamatan=$row->warna_kecamatan;
        $geojson_kecamatan=$row->geojson_kecamatan;
	}
  }
  // value ketika validasi
  if($session->get('error_value')){
  	extract($session->pull('error_value'));
  }
?>
<?=content_open('Form Kecamatan')?>
    <form method="post" enctype="multipart/form-data">
    	<?php
    		// menampilkan error validasi
  			if($session->get('error_validation')){
  				foreach ($session->pull('error_validation') as $key => $value) {
  					echo '<div class="alert alert-danger">'.$value.'</div>';
  				}
  			}
    	?>
    	<?=input_hidden('id_kecamatan',$id_kecamatan)?>
    	<div class="form-group">
    		<label>Provinsi</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('nm_provinsi',$nm_provinsi)?>
		    	</div>
	    	</div>
    	</div>
		<div class="form-group">
    		<label>Kabupaten</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('nm_kabupaten',$nm_kabupaten)?>
		    	</div>
	    	</div>
    	</div>
		<div class="form-group">
    		<label>Kode Wilayah</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('kd_kecamatan',$kd_kecamatan)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<label>Nama Kecamatan</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('nm_kecamatan',$nm_kecamatan)?>
	    		</div>
    		</div>
    	</div>
		<div class="form-group">
    		<label>Luas Area</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('luas_kecamatan',$luas_kecamatan)?>
	    		</div>
    		</div>
    	</div>
		<div class="form-group">
    		<label>Jumlah Penduduk</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('jml_penduduk',$jml_penduduk)?>
	    		</div>
    		</div>
    	</div>
        <div class="form-group">
    		<label>Warna</label> 
    		<div class="row">
	    		<div class="col-md-3">
	    			<?=input_color('warna_kecamatan',$warna_kecamatan)?>
	    		</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<label>GeoJSON</label>
    		<div class="row">
	    		<div class="col-md-4">
    				<?=input_file('geojson_kecamatan',$geojson_kecamatan)?>
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
<?=content_open('Data Kecamatan')?>

<a href="<?=url($url.'&tambah')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah</a>
<hr>
<?=$session->pull("info")?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Provinsi</th>
			<th>Kabupaten</th>
			<th>Kode Wilayah</th>
			<th>Nama Kecamatan</th>
			<th>Luas Area</th>
			<th>Jumlah Penduduk</th>
			<th>Warna</th>
            <th>GeoJSON</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			$getdata=$db->ObjectBuilder()->get('m_kecamatan');
			foreach ($getdata as $row) {
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row->nm_provinsi?></td>
						<td><?=$row->nm_kabupaten?></td>
						<td><?=$row->kd_kecamatan?></td>
						<td><?=$row->nm_kecamatan?></td>
						<td><?=$row->luas_kecamatan?></td>
						<td><?=$row->jml_penduduk?></td>
                        <td style="background: <?=$row->warna_kecamatan?>"></td>
						<td><a href="<?=assets('unggah/geojson/'.$row->geojson_kecamatan)?>" target="_BLANK"><?=$row->geojson_kecamatan?></a></td>
						<td>
							<a href="<?=url($url.'&ubah&id='.$row->id_kecamatan)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=url($url.'&hapus&id='.$row->id_kecamatan)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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