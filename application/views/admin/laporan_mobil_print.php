<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
	<link rel="shortcut icon" href="<?= base_url() ?>assets/assets_shop/img/logo.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>

	<style type="text/css">
		.table-data {
			width: 100%;
			border-collapse: collapse;
		}

		.table-data tr th,
		.table-data tr td {
			border: 1px solid black;
			font-size: 10pt;
		}
	</style>

	<section id="header-kop">
		<div class="container-fluid mt-4">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td rowspan="3" width="16%" class="text-center">
							<img src="<?= base_url('assets/assets_stisla') ?>/assets/img/logo.png" alt="logo" width="80" />
						</td>
						<td class="text-center">
							<h3>Rental Mobil</h3>
						</td>
						<td rowspan="3" width="16%">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-center">Jl. Soekarno Hatta No.19, RT.04, RW.13, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142, SMS/No. Telp. +62 85877990684, No. WA. +62 85334424941, https://www.rentbilmlg.com/</td>
					</tr>
				</tbody>
			</table>
			<hr style="height: 2px" color="#0F0E20">
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center mt-4 mb-4">Laporan Mobil yang Tersedia</h4>
			<table class="table-data">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>Gambar</th>
						<th>Type</th>
						<th>Merk</th>
						<th>No. Plat</th>
						<th>Harga Sewa</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($mobil as $mb) : ?>
						<tr align="center">
							<td><?= $no++ ?></td>
							<td>
								<img width="100px" height="60px" src="<?= base_url() . 'assets/upload/mobil/' . $mb->gambar ?>">
							</td>
							<td><?= $mb->kode_type ?></td>
							<td><?= $mb->merk ?></td>
							<td><?= $mb->no_plat ?></td>
							<td><?= format_rupiah($mb->harga) ?></td>
							<td><?= $mb->status_mobil == 0 ? "<span class='badge badge-danger'>Kosong</span>" : "<span class='badge badge-primary'>Tersedia</span>" ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>

	<script type="text/javascript">
		window.print();
	</script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>