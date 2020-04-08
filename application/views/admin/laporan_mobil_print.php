<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
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
	<h3>Laporan Mobil yang Tersedia</h3>
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
					<td><?= indo_currency($mb->harga) ?></td>
					<td><?= $mb->status == 0 ? "<span class='badge badge-danger'>Kosong</span>" : "<span class='badge badge-primary'>Tersedia</span>" ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<script type="text/javascript">
		window.print();
	</script>
</body>

</html>