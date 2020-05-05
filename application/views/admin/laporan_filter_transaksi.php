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
								<th>No</th>
								<th>User</th>
								<th>Mobil</th>
								<th>Tgl Sewa</th>
								<th>Tgl Kembali</th>
								<th>Tgl Pengembalian</th>
								<th>Total Sewa</th>
								<th>Total Denda</th>
								<th>Status</th>
								<th>Status Pembayaran</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($laporan as $l) : ?>
								<tr align="center">
									<td><?= $no++ ?></td>
									<td><?= $l->nama ?></td>
									<td><?= $l->merk ?></td>
									<td><?= IndonesiaTgl($l->tanggal_sewa) ?></td>
									<td><?= IndonesiaTgl($l->tanggal_kembali) ?></td>
									<td>
										<?php if (IndonesiaTgl($l->tanggal_pengembalian) == "00-00-0000") { ?>
											-
										<?php } else { ?>
											<?= IndonesiaTgl($l->tanggal_pengembalian) ?>
										<?php } ?>
									</td>
									<td><?= format_rupiah($l->total_sewa) ?></td>
									<td><?= format_rupiah($l->total_denda) ?></td>
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