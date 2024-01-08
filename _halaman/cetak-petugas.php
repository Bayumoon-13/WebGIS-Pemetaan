<?php
  $setTemplate = false;
  $url='cetak-petugas';
?>
<link rel="icon" href="assets/images/icons/logo_kab_bandung.png" type="image/png">
<!DOCTYPE html>
<html>
	<head>
		<title>SIG-Perumahan | Laporan Petugas</title>

		<style type="text/css">
			body {
				font-family: Arial, sans-serif;
				margin: 0;
				padding: 20px;
			}
			h1 {
				text-align: center;
				margin-bottom: 20px;
				font-size: 22px;
				color: #333;
			}
			.report-header {
				text-align: center;
				margin-bottom: 20px;
			}
			.report-logo {
				margin-bottom: 10px;
			}
			.report-title {
				font-size: 20px;
				font-weight: bold;
				margin-bottom: 5px;
			}
			.report-subtitle {
				font-size: 30px;
				font-weight: bold;
				margin-bottom: 5px;
			}
			.report-address {
				font-size: 14px;
				margin-bottom: 10px;
			}
			@media print {
				hr.report-hr {
					display: block;
					border: none;
					border-top: 3px solid #000;
					margin: 20px auto;
					padding: 0;
					width: 100%;
				}
			}
			table {
				width: 100%;
				border-collapse: collapse;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
				font-family: Arial, sans-serif;
			}

			th, td {
				padding: 10px;
				border: 1px solid #ddd;
				text-align: center;
			}

			thead th {
				background-color: #f2f2f2;
				font-weight: bold;
				color: #333;
			}

			tbody tr:nth-child(even) {
				background-color: #f9f9f9;
			}

			tbody tr:hover {
				background-color: #f5f5f5;
			}

			.table-title {
				font-size: 20px;
				font-weight: bold;
				text-align: center;
				margin-bottom: 20px;
			}

			.table-summary {
				text-align: right;
				font-weight: bold;
			}
		</style>

	</head>
	<body onload="window.print()">
		<?php
			date_default_timezone_set('Asia/Jakarta');
			$currentDateTime = date('d-m-Y H:i:s');
		?>
		<div class="report-header">
			<div class="report-logo">
				<img src="<?=assets('images/icons/logo_kab_bandung.png')?>" alt="Logo" height="80">
			</div>
			<div class="report-title">LAPORAN PETUGAS</div>
			<div class="report-subtitle">KECAMATAN RANCAEKEK</div>
			<div class="report-address">Jl. Raya Rancaekek - Majalaya No. 89 Telepon. 7798016 KodePos 40394</div>
		</div>
		<hr class="report-hr">
		<p class="report-author">Dicetak oleh: <b>PETUGAS</b>, pada <b><?php echo $currentDateTime; ?></b></p>
		<li><b>Data Administrasi</b></li><br>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Desa</th>
					<th>Luas</th>
					<th>Jumlah Penduduk</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$totalPenduduk = 0; // Variabel untuk menyimpan total penduduk
					$getdata = $db->ObjectBuilder()->get('m_desa a');
					foreach ($getdata as $row) {
						$totalPenduduk += $row->jml_penduduk; // Menambahkan nilai jml_penduduk ke totalPenduduk
						?>
							<tr>
								<td><?=$no?></td>
								<td><?=$row->kd_desa?></td>
								<td><?=$row->nm_desa?></td>
								<td><?=$row->luas_desa?></td>
								<td style="text-align: center;"><?=$row->jml_penduduk?></td>
							</tr>
						<?php
						$no++;
					}
				?>
				<tr>
					<td colspan="4" style="text-align: center;"><b>Total Penduduk</b></td>
					<td style="text-align: center;"><b><?= $totalPenduduk ?></b></td>
				</tr>
			</tbody>
		</table>
		<br><br>
		<li><b>Data Perumahan</b></li><br>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama Perumahan</th>
					<th>Type Perumahan</th>
					<th>Developer</th>
					<th>Contact</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$getdata = $db->ObjectBuilder()->get('m_perumahan a');
						foreach ($getdata as $row) {
							?>
								<tr>
									<td><?=$no?></td>
									<td><?=$row->kd_perumahan?></td>
									<td><?=$row->nm_perumahan?></td>
									<td><?=$row->type?></td>
									<td><?=$row->developer?></td>
									<td><?=$row->kontak?></td>
								</tr>
							<?php
							$no++;
						}
				?>
			</tbody>
		</table>
		<br><br>
		<li><b>Data Risiko Bencana pada Perumahan</b></li><br>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Perumahan</th>
					<th>Banjir</th>
					<th>Banjir Bandang</th>
					<th>Gempabumi</th>
					<th>Cuaca Ekstrim</th>
					<th>Kekeringan</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$db->join('m_perumahan b', 'a.id_perumahan = b.id_perumahan', 'LEFT');
					$getdata = $db->ObjectBuilder()->get('m_risiko a');
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
								</tr>
							<?php
							$no++;
						}
				?>
			</tbody>
		</table>
		<?php
			$getdata = $db->ObjectBuilder()->get('m_perumahan');
			$dataArray = json_decode(json_encode($getdata), true);
			$dataCount = count($dataArray);
		?>
		<p>Total Data Perumahan : <?php echo $dataCount; ?></p>
	</body>
</html>
