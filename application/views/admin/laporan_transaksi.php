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
			</div>
		</div>

	</section>
</div>