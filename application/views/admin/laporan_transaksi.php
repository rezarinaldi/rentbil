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
									<input type="date" name="dari" class="form-control">
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
									<input type="date" name="sampai" class="form-control">
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
			</div>
		</div>

	</section>
</div>