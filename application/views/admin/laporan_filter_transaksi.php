<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Transaksi</h1>
		</div>

		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" action="<?= base_url(); ?>admin/transaksi/laporan">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Dari Tanggal</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fas fa-calendar"></i>
										</div>
									</div>
									<input type="date" name="dari" class="form-control" value="<?= $_POST['dari']; ?>">
								</div>
								<?= form_error('dari', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Sampai Tanggal</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fas fa-calendar"></i>
										</div>
									</div>
									<input type="date" name="sampai" class="form-control" value="<?= $_POST['sampai']; ?>">
								</div>
								<?= form_error('sampai', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<button type="submit" name="cari" class="btn btn-primary">
									<i class="fas fa-search"></i> Cari
								</button>
							</div>
						</div>
					</div>
				</form>

				<div class="btn-group mb-4">
					<a class="btn btn-dark btn-sm" href="<?= base_url() . 'admin/transaksi/laporan_print/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai'); ?>" target="blank">
						<i class="fas fa-print"></i> Cetak Laporan
					</a>
				</div>

				<div class="table-responsive">
					<table border="1" class="table table-striped table-hover table-bordered" id="data_table">
						<thead>
							<tr align="center">
								<!-- <th>No</th>
								<th>Tanggal</th>
								<th>Kostumer</th>
								<th>Mobil</th>
								<th>Tgl. Pinjam</th>
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
							<!-- <?php $no = 1;
									foreach ($laporan as $l) { ?>
								<tr>
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
											} ?> </td>
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
									<td>
										<?php if (($l->status) == 0) {
											echo "<span class='badge badge-dark'>Batal</span>";
										} elseif (($l->status) == 1) {
											echo "<span class='badge badge-warning'>Disewa</span>";
										} else {
											echo "<span class='badge badge-success'>Selesai</span>";
										} ?>
									</td>
									<td>
										<?php if (($l->status_pembayaran) == 0) {
											echo "<span class='badge badge-danger'>Belum Dibayar</span>";
										} elseif (($l->status_pembayaran) == 1) {
											echo "<span class='badge badge-info'>Menunggu Konfirmasi</span>";
										} elseif (($l->status_pembayaran) == 2) {
											echo "<span class='badge badge-success'>Sudah Dibayar</span>";
										} else {
											echo "<span class='badge badge-dark'>Batal</span>";
										} ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>

	</section>
</div>