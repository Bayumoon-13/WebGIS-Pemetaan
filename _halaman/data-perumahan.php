<?php
  $title="SIG-Perumahan | Data Detail Perumahan";
  $judul="Master Data";
  $url='data-perumahan';

if(isset($_POST['simpan'])){
	$file=upload('gambar','gambar');
	if($file!=false){
		$data['gambar']=$file;
		if($_POST['id_perumahan']!=''){
			// hapus file di dalam folder
			$db->where('id_perumahan',$_GET['id']);
			$get=$db->ObjectBuilder()->getOne('m_perumahan');
			unlink('assets/unggah/gambar/'.$gambar);
			// end hapus file di dalam folder
		}
	}
	// cek validasi
	$validation=null;
	// cek kode apakah sudah ada
	if($_POST['id_perumahan']!=""){
		$db->where('id_perumahan !='.$_POST['id_perumahan']);
	}
	$db->where('kd_perumahan',$_POST['kd_perumahan']);
	$db->get('m_perumahan');
	if($db->count>0){
		$validation[]='Kode Perumahan Sudah Ada';
	}
	//tidak boleh kosong
	if($_POST['nm_perumahan']==''){
		$validation[]='Nama Perumahan Tidak Boleh Kosong';
	}
	
	if($validation!=null){
		$setTemplate=false;
		$session->set('error_validation',$validation);
		$session->set('error_value',$_POST);
		redirect($_SERVER['HTTP_REFERER']);
		return false;
	}
	// cek validasi
	$data['kd_perumahan']=$_POST['kd_perumahan'];
	$data['nm_perumahan']=$_POST['nm_perumahan'];
	$data['type']=$_POST['type'];
	$data['developer']=$_POST['developer'];
	$data['kontak']=$_POST['kontak'];
	$data['deskripsi']=$_POST['deskripsi'];
	if($_POST['id_perumahan']==""){
		$exec=$db->insert("m_perumahan",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambah </div>';
		
	}
	else{
		$db->where('id_perumahan',$_POST['id_perumahan']);
		$exec=$db->update("m_perumahan",$data);
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
	$db->where('id_perumahan',$_GET['id']);
	$get=$db->ObjectBuilder()->getOne('m_perumahan');
	$gambar=$get->gambar;
	unlink('assets/unggah/gambar/'.$gambar);
	// end hapus file di dalam folder
	$db->where("id_perumahan",$_GET['id']);
	$exec=$db->delete("m_perumahan");
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
  $id_perumahan="";
  $kd_perumahan="";
  $nm_perumahan="";
  $type="";
  $developer="";
  $kontak="";
  $deskripsi="";
  $gambar="";
  if(isset($_GET['ubah']) AND isset($_GET['id'])){
  	$id=$_GET['id'];
  	$db->where('id_perumahan',$id);
	$row=$db->ObjectBuilder()->getOne('m_perumahan');
	if($db->count>0){
		$id_perumahan=$row->id_perumahan;
		$kd_perumahan=$row->kd_perumahan;
		$nm_perumahan=$row->nm_perumahan;
		$type=$row->type;
		$developer=$row->developer;
		$kontak=$row->kontak;
		$deskripsi=$row->deskripsi;
		$gambar=$row->gambar;
	}
  }
  // value ketika validasi
  if($session->get('error_value')){
  	extract($session->pull('error_value'));
  }
?>
<?=content_open('Form Perumahan')?>
    <form method="post" enctype="multipart/form-data">
    	<?php
    		// menampilkan error validasi
  			if($session->get('error_validation')){
  				foreach ($session->pull('error_validation') as $key => $value) {
  					echo '<div class="alert alert-danger">'.$value.'</div>';
  				}
  			}
    	?>
    	<?=input_hidden('id_perumahan',$id_perumahan)?>
		<div class="form-group">
    		<label>Kode</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('kd_perumahan',$kd_perumahan)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<label>Nama Perumahan</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('nm_perumahan',$nm_perumahan)?>
	    		</div>
    		</div>
    	</div>
		<div class="form-group">
    		<label>Type Perumahan</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('type',$type)?>
	    		</div>
    		</div>
    	</div>
		<div class="form-group">
    		<label>Developer</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('developer',$developer)?>
	    		</div>
    		</div>
    	</div>
        <div class="form-group">
    		<label>Contact</label> 
    		<div class="row">
	    		<div class="col-md-3">
	    			<?=input_text('kontak',$kontak)?>
	    		</div>
    		</div>
    	</div>
        <div class="form-group">
    		<label>Deskripsi</label> 
    		<div class="row">
	    		<div class="col-md-3">
	    			<?=textarea('deskripsi',$deskripsi)?>
	    		</div>
    		</div>
    	</div>
		<div class="form-group">
    		<label>Gambar</label>
    		<div class="row">
	    		<div class="col-md-4">
    				<?=input_file('gambar',$gambar)?>
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
<?=content_open('Data Perumahan')?>

<a href="<?=url($url.'&tambah')?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
<hr>
<?=$session->pull("info")?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Nama Perumahan</th>
			<th>Type Perumahan</th>
			<th>Developer</th>
            <th>Contact</th>
            <th>Deskripsi</th>
			<th>Gambar</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			$getdata=$db->ObjectBuilder()->get('m_perumahan a');
			foreach ($getdata as $row) {
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row->kd_perumahan?></td>
						<td><?=$row->nm_perumahan?></td>
						<td><?=$row->type?></td>
						<td><?=$row->developer?></td>
                        <td><?=$row->kontak?></td>
                        <td><?=$row->deskripsi?></td>
						<td class="text-center"><?= ($row->gambar == '' ? '-' : '<img src="' . assets('unggah/gambar/' . $row->gambar) . '" width="100px">') ?></td>
						<td>
							<a href="<?=url($url.'&ubah&id='.$row->id_perumahan)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=url($url.'&hapus&id='.$row->id_perumahan)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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