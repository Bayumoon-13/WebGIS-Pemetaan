<?php
  $title="SIG-Perumahan | Data Risiko";
  $judul="Risiko";
  $url='data-risiko';
  $fileJs='peta-formrisikoJs';

if(isset($_POST['simpan'])){
	// cek validasi
	$validation=null;

	if($validation!=null){
		$setTemplate=false;
		$session->set('error_validation',$validation);
		$session->set('error_value',$_POST);
		redirect($_SERVER['HTTP_REFERER']);
		return false;
	}
	// cek validasi
    $data['id_perumahan']=$_POST['id_perumahan'];
    $data['risiko_banjir']=$_POST['risiko_banjir'];
    $data['risiko_banjirbandang']=$_POST['risiko_banjirbandang'];
    $data['risiko_gempabumi']=$_POST['risiko_gempabumi'];
    $data['risiko_cuacaekstrim']=$_POST['risiko_cuacaekstrim'];
    $data['risiko_kekeringan']=$_POST['risiko_kekeringan'];
	if($_POST['id_risiko']==""){
		$exec=$db->insert("m_risiko",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	}
	else{
		$db->where('id_risiko',$_POST['id_risiko']);
		$exec=$db->update("m_risiko",$data);
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
	$db->where("id_risiko",$_GET['id']);
	$exec=$db->delete("m_risiko");
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
  $id_risiko="";
  $id_perumahan="";
  $risiko_banjir="";
  $risiko_banjirbandang="";
  $risiko_gempabumi="";
  $risiko_cuacaekstrim="";
  $risiko_kekeringan="";
  if(isset($_GET['ubah']) AND isset($_GET['id'])){
  	$id=$_GET['id'];
  	$db->where('id_risiko',$id);
	$row=$db->ObjectBuilder()->getOne('m_risiko');
	if($db->count>0){
		$id_risiko=$row->id_risiko;
        $id_perumahan=$row->id_perumahan;
		$risiko_banjir=$row->risiko_banjir;
		$risiko_banjirbandang=$row->risiko_banjirbandang;
		$risiko_gempabumi=$row->risiko_gempabumi;
		$risiko_cuacaekstrim=$row->risiko_cuacaekstrim;
		$risiko_kekeringan=$row->risiko_kekeringan;
	}
  }
  // value ketika validasi
  if($session->get('error_value')){
  	extract($session->pull('error_value'));
  }
?>
<?=content_open('Form Risiko')?>
<style>
    /* Gaya peta */
  #map {
    height: 800px;
    width: auto;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    padding: 0;
          margin: 0 auto;
  }

    hr {
        border: none; /* Menghapus garis bawaan */
        border-top: 2px solid #000; /* Menambahkan garis atas dengan ketebalan 2px dan warna hitam (#000) */
        margin: 0; /* Menghapus margin */
        padding: 0; /* Menghapus padding */
        margin-bottom: 20px;
        margin-top: 20px;
        width: 80%;
    }
</style>
<link rel="stylesheet" href="https://js.arcgis.com/4.21/esri/themes/light/main.css">
<link rel="stylesheet" href="<?=assets('templates/safario/vendors/fontawesome/css/all.min.css')?>">
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
            <?=input_hidden('id_risiko',$id_risiko)?>
            <div class="form-group">
                <label for="nama-perumahan">Nama Perumahan</label>
                <div class="row">
                    <div class="col-md-9">
                        <select id="nama-perumahan" name="id_perumahan" class="form-control">
                            <option value="">Pilih Perumahan</option>
                            <?php
                            foreach ($db->ObjectBuilder()->get('m_perumahan') as $row) {
                                $selected = ($row->id_perumahan == $_POST['id_perumahan']) ? 'selected' : ''; // Tambahkan ini
                                echo '<option value="' . $row->id_perumahan . '" ' . $selected . '>' . $row->nm_perumahan . '</option>'; 
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div id="menu" style="margin-bottom: 3px;">
                <label for="tampilan-peta">Tampilan Peta</label>
                <div class="row">
                    <div class="col-md-9">
                        <select id="tampilan-peta" class="form-control">
                            <option value="risk_banjir">Risiko Banjir</option>
                            <option value="risk_banjir_bandang">Risiko Banjir Bandang</option>
                            <option value="risk_gempabumi">Risiko Gempabumi</option>
                            <option value="risk_cuaca_ekstrim">Risiko Cuaca Ekstrim</option>
                            <option value="risk_kekeringan">Risiko Kekeringan</option>
                        </select>
                    </div>
                </div>
            </div>
            <label for="warna-risiko" >Pilih Warna</label>
            <div class="row">
                <div class="col-md-9">
                    <input type="color" id="warna-risiko" name="warna-risiko" value="#ff0000" class="form-control">
                </div>
            </div>
            <p id="kategori-risiko" style="color:gray; font-size:1.2rem;">Silahkan pilih warna risiko pada peta untuk menampilkan tingkat risiko👌</p>
            <hr>
            
            <div class="form-group">
                <label>Risiko Banjir</label> 
                <div class="row">
                    <div class="col-md-9">
                        <select name="risiko_banjir" id="risiko_banjir" class="form-control">
                            <option value="" disabled selected hidden>Tingkat Risiko</option>
                            <option value="Tinggi" <?=($risiko_banjir == 'Tinggi') ? 'selected' : ''?>>Tinggi</option>
                            <option value="Sedang" <?=($risiko_banjir == 'Sedang') ? 'selected' : ''?>>Sedang</option>
                            <option value="Rendah" <?=($risiko_banjir == 'Rendah') ? 'selected' : ''?>>Rendah</option>
                            <option value="Tidak Terdapat Risiko" <?=($risiko_banjir == 'Tidak Terdapat Risiko') ? 'selected' : ''?>>Tidak Terdapat Risiko</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Risiko Banjir Bandang</label> 
                <div class="row">
                    <div class="col-md-9">
                        <select name="risiko_banjirbandang" id="risiko_banjirbandang" class="form-control">
                            <option value="" disabled selected hidden>Tingkat Risiko</option>
                            <option value="Tinggi" <?=($risiko_banjirbandang == 'Tinggi') ? 'selected' : ''?>>Tinggi</option>
                            <option value="Sedang" <?=($risiko_banjirbandang == 'Sedang') ? 'selected' : ''?>>Sedang</option>
                            <option value="Rendah" <?=($risiko_banjirbandang == 'Rendah') ? 'selected' : ''?>>Rendah</option>
                            <option value="Tidak Terdapat Risiko" <?=($risiko_banjir == 'Tidak Terdapat Risiko') ? 'selected' : ''?>>Tidak Terdapat Risiko</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Risiko Gempabumi</label> 
                <div class="row">
                    <div class="col-md-9">
                        <select name="risiko_gempabumi" id="risiko_gempabumi" class="form-control">
                            <option value="" disabled selected hidden>Tingkat Risiko</option>
                            <option value="Tinggi" <?=($risiko_gempabumi == 'Tinggi') ? 'selected' : ''?>>Tinggi</option>
                            <option value="Sedang" <?=($risiko_gempabumi == 'Sedang') ? 'selected' : ''?>>Sedang</option>
                            <option value="Rendah" <?=($risiko_gempabumi == 'Rendah') ? 'selected' : ''?>>Rendah</option>
                            <option value="Tidak Terdapat Risiko" <?=($risiko_banjir == 'Tidak Terdapat Risiko') ? 'selected' : ''?>>Tidak Terdapat Risiko</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Risiko Cuaca Ekstrim</label> 
                <div class="row">
                    <div class="col-md-9">
                        <select name="risiko_cuacaekstrim" id="risiko_cuacaekstrim" class="form-control">
                            <option value="" disabled selected hidden>Tingkat Risiko</option>
                            <option value="Tinggi" <?=($risiko_cuacaekstrim == 'Tinggi') ? 'selected' : ''?>>Tinggi</option>
                            <option value="Sedang" <?=($risiko_cuacaekstrim == 'Sedang') ? 'selected' : ''?>>Sedang</option>
                            <option value="Rendah" <?=($risiko_cuacaekstrim == 'Rendah') ? 'selected' : ''?>>Rendah</option>
                            <option value="Tidak Terdapat Risiko" <?=($risiko_banjir == 'Tidak Terdapat Risiko') ? 'selected' : ''?>>Tidak Terdapat Risiko</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Risiko Kekeringan</label> 
                <div class="row">
                    <div class="col-md-9">
                        <select name="risiko_kekeringan" id="risiko_kekeringan" class="form-control">
                            <option value="" disabled selected hidden>Tingkat Risiko</option>
                            <option value="Tinggi" <?=($risiko_kekeringan == 'Tinggi') ? 'selected' : ''?>>Tinggi</option>
                            <option value="Sedang" <?=($risiko_kekeringan == 'Sedang') ? 'selected' : ''?>>Sedang</option>
                            <option value="Rendah" <?=($risiko_kekeringan == 'Rendah') ? 'selected' : ''?>>Rendah</option>
                            <option value="Tidak Terdapat Risiko" <?=($risiko_banjir == 'Tidak Terdapat Risiko') ? 'selected' : ''?>>Tidak Terdapat Risiko</option>
                        </select>
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
        <div id="map"></div>
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
            <th>Nama Perumahan</th>
            <th>Banjir</th>
            <th>Banjir Bandang</th>
            <th>Gempabumi</th>
            <th>Cuaca Ekstrim</th>
            <th>Kekeringan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
            $db->join('m_perumahan b', 'a.id_perumahan = b.id_perumahan', 'LEFT');
			$getdata=$db->ObjectBuilder()->get('m_risiko a');
			foreach ($getdata as $row) {
				?>
					<tr>
						<td><?=$no?></td>
                        <td><?=$row->nm_perumahan?></td>
                        <td><?=$row->risiko_banjir?></td>
                        <td><?=$row->risiko_banjirbandang?></td>
                        <td><?=$row->risiko_gempabumi?></td>
                        <td><?=$row->risiko_cuacaekstrim?></td>
                        <td><?=$row->risiko_kekeringan?></td>
						<td>
							<a href="<?=url($url.'&ubah&id='.$row->id_risiko)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=url($url.'&hapus&id='.$row->id_risiko)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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