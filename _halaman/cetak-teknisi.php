<?php
  $setTemplate = false;
  $url='cetak-teknisi';
?>

<link rel="icon" href="assets/images/icons/logo_kab_bandung.png" type="image/png">
<!DOCTYPE html>
<html>
	<head>
		<title>SIG-Perumahan | Laporan Teknisi</title>

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
			<div class="report-title">LAPORAN TEKNISI</div>
			<div class="report-subtitle">KECAMATAN RANCAEKEK</div>
			<div class="report-address">Jl. Raya Rancaekek - Majalaya No. 89 Telepon. 7798016 KodePos 40394</div>
		</div>
		<hr class="report-hr">
		<p class="report-author">Dicetak oleh: <b>TEKNISI</b>, pada <b><?php echo $currentDateTime; ?></b></p>
			
		<li><b>Data Lokasi Perumahan</b></li><br>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama Perumahan</th>
					<th>Lokasi</th>
					<th>Desa</th>
					<th>Kecamatan</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$db->join('m_desa b', 'a.id_desa = b.id_desa', 'LEFT');
            		$db->join('m_kecamatan c', 'a.id_kecamatan = c.id_kecamatan', 'LEFT');
					$db->join('m_perumahan d', 'a.id_perumahan = d.id_perumahan', 'LEFT');
					$getdata = $db->ObjectBuilder()->get('m_lokasi a');
					foreach ($getdata as $row) {
						?>
							<tr>
								<td><?=$no?></td>
								<td><?=$row->kd_lokasi?></td>
								<td><?=$row->nm_perumahan?></td>
								<td><?=$row->lokasi?></td>
								<td><?=$row->nm_desa?></td>
								<td><?=$row->nm_kecamatan?></td>
							</tr>
						<?php
						$no++;
					}
				?>
			</tbody>
		</table>
		<br>
		<li><b>Titik Koordinat dan Luas Area Perumahan</b></li><br>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama Perumahan</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Luas Area</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$db->join('m_perumahan b', 'a.id_perumahan = b.id_perumahan', 'LEFT');
					$getdata = $db->ObjectBuilder()->get('m_lokasi a');
					foreach ($getdata as $row) {
						?>
							<tr>
								<td><?=$no?></td>
								<td><?=$row->kd_lokasi?></td>
								<td><?=$row->nm_perumahan?></td>
								<td><?=$row->lat?></td>
								<td><?=$row->lng?></td>
								<td><?=$row->luas_area?></td>
							</tr>
						<?php
						$no++;
					}
				?>
			</tbody>
		</table>
		<?php
			$getdata = $db->ObjectBuilder()->get('m_lokasi');
			$dataArray = json_decode(json_encode($getdata), true);
			$dataCount = count($dataArray);
		?>
		<p>Total Data Perumahan : <?php echo $dataCount; ?></p>
		
	</body>
</html>

