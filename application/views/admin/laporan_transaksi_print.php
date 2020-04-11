<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
	<link rel="shortcut icon" href="<?= base_url('assets/assets_stisla') ?>/assets/img/logo.ico">
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
						<td class="text-center">Jl. Soekarno Hatta No.19, RT.4/RW.13, Malang 65141, Indonesia, No.HP. +62 85877990684</td>
					</tr>
				</tbody>
			</table>
			<hr style="height: 2px" color="#0F0E20">
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center mt-4 mb-2">Laporan Transaksi</h4>
			<h5 class="text-center mb-5">Tanggal: <?= IndonesiaTgl($_GET['dari']) . " s/d " . IndonesiaTgl($_GET['sampai']); ?></h5>
			<table class="table-data">
				<thead>
					<tr align="center">
						<!-- <th>No</th>
						<th>Tanggal</th>
						<th>Kostumer</th>
						<th>Mobil</th>
						<th>Tgl. <RP></RP>ental</th>
						<th>Tgl. Kembali</th>
						<th>Harga</th>
						<th>Denda / Hari</th>
						<th>Tgl. Dikembalikan</th>
						<th>Total Denda</th>
						<th>Status</th> -->
						<th>No</th>
						<th>User</th>
						<th>Mobil</th>
						<th>Tgl Sewa</th>
						<th>Tgl Kembali</th>
						<th>Total Sewa</th>
						<th>Status</th>
						<th>Status Pembayaran</th>
					</tr>
				</thead>
				<tbody>
					<!-- <?php
							$no = 1;
							foreach ($laporan as $l) {
							?>
						<tr align="center">
							<td><?= $no++; ?></td>
							<td><?= date('d/m/Y', strtotime($l->transaksi_tgl)); ?></td>
							<td><?= $l->kostumer_nama; ?></td>
							<td><?= $l->mobil_merk; ?></td>
							<td><?= date('d/m/Y', strtotime($l->transaksi_tgl_pinjam)); ?></td>
							<td><?= date('d/m/Y', strtotime($l->transaksi_tgl_kembali)); ?></td>
							<td><?= "Rp. " . number_format($l->transaksi_harga); ?></td>
							<td><?= "Rp. " . number_format($l->transaksi_denda); ?></td>
							<td> <?php if ($l->transaksi_tgldikembalikan == "0000-00-00") {
										echo "-";
									} else {
										echo date('d/m/Y', strtotime($l->transaksi_tgldikembalikan));
									} ?>
							</td>
							<td><?= "Rp. " . number_format($l->transaksi_totaldenda) . " ,-"; ?></td>
							<td> <?php if ($l->transaksi_status == "1") {
										echo "Selesai";
									} else {
										echo "-";
									} ?>
							</td>
						</tr>
					<?php } ?> -->
					<?php
					$no = 1;
					foreach ($laporan as $l) : ?>
						<tr align="center">
							<td><?= $no++ ?></td>
							<td><?= $l->nama ?></td>
							<td><?= $l->merk ?></td>
							<td><?= IndonesiaTgl($l->tanggal_sewa) ?></td>
							<td><?= IndonesiaTgl($l->tanggal_kembali) ?></td>
							<td><?= format_rupiah($l->total_sewa) ?></td>
							<td><?= $l->status == 1 ? "<span class='badge badge-warning'>Disewa</span>" : "<span class='badge badge-success'>Selesai</span>" ?></td>
							<td>
								<?php if (($l->status_pembayaran) == 0) {
									echo "<span class='badge badge-danger'>Belum Dibayar</span>";
								} elseif (($l->status_pembayaran) == 1) {
									echo "<span class='badge badge-info'>Menunggu Konfirmasi</span>";
								} else {
									echo "<span class='badge badge-success'>Sudah Dibayar</span>";
								} ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>

	<script type="text/javascript">
		window.print();
	</script>

</body>

</html>