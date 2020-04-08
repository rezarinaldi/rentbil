<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Transaksi</h1>
		</div>

		<?= $this->session->flashdata('pesan') ?>
		<div class="card shadow mb-4">
			<div class="card-body">
				<form method="post" action="<?= base_url(); ?>admin/transaksi/laporan">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Dari Tanggal</label>
								<input type="date" name="dari" class="form-control">
								<?= form_error('dari'); ?>
							</div>
							<div class="form-group">
								<label>Sampai Tanggal</label>
								<input type="date" name="sampai" class="form-control">
								<?= form_error('sampai'); ?>
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
					<a class="btn btn-warning btn-sm" href="<?= base_url() . 'admin/transaksi/laporan_pdf/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai'); ?>">
						<i class="fas fa-file-pdf"></i> Cetak PDF
					</a>
					<a class="btn btn-default btn-sm" href="<?= base_url() . 'admin/transaksi/laporan_print/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai'); ?>" target="blank">
						<i class="fas fa-print"></i> Print
					</a>
				</div>

				<div class="table-responsive">
					<table border="1" class="table table-striped table-hover table-bordered" id="data_table">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Kostumer</th>
								<th>Mobil</th>
								<th>Tgl. Pinjam</th>
								<th>Tgl. Kembali</th>
								<th>Harga</th>
								<th>Denda / Hari</th>
								<th>Tgl. Dikembalikan</th>
								<th>Total Denda</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody> <?php $no = 1;
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
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>

	</section>
</div>