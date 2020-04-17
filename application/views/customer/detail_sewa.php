<!-- <div class="container mt-5 mb-5">
	<div class="card bg-light">
		<h3 class="text-center mt-3">Detail Sewa</h3>
		<div class="card-body">
			<div class="form-group">
				<label>Nama Customer</label>
				<input type="text" class="form-control" autocomplete="off" value="<?= $nama ?>">
			</div>
			<div class="form-group">
				<label>Mobil</label>
				<input type="text" class="form-control" autocomplete="off" value="<?= $merk ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Sewa</label>
				<input type="text" class="form-control" autocomplete="off" value="<?= IndonesiaTgl($tanggal_sewa) ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Kembali</label>
				<input type="text" class="form-control" autocomplete="off" value="<?= IndonesiaTgl($tanggal_kembali) ?>">
			</div>
			<div class="form-group">
				<label>Durasi</label>
				<input type="text" class="form-control" autocomplete="off" value="<?= $durasi ?> Hari">
			</div>
			<div class="form-group">
				<label>Total Biaya Sewa</label>
				<input type="text" class="form-control" autocomplete="off" value="<?= format_rupiah($total_sewa) ?>">
			</div>
			<b>*Silahkan transfer Total Biaya Sewa ke 123456789 Bank BNI a/n REZA RINALDI maksimal tanggal <?= $batas_bayar ?>. <br>
			Untuk konfirmasi pesanan silahkan ke halaman Riwayat Sewa</b>
			<br>

			<a href="<?= base_url('customer/rental/riwayat_sewa') ?>" class="rent-btn"><i class="fa fa-shopping-bag"></i> Riwayat Sewa</a>

		</div>
	
	</div>
</div>
 -->

<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
	<div class="container">
		<div class="row">
			<!-- Page Title Start -->
			<div class="col-lg-12">
				<div class="section-title  text-center">
					<h2>Detail Sewa</h2>
					<span class="title-line"><i class="fa fa-car"></i></span>
				</div>
			</div>
			<!-- Page Title End -->
		</div>
	</div>
</section>
<!--== Page Title Area End ==-->

<!--== Contact Page Area Start ==-->
<div class="contact-page-wrao section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 m-auto">
				<div class="contact-form">
					<div class="card shadow mb-4">
						<h3 class="text-center mt-3">Detail Sewa</h3>
						<div class="card-body">
							<div class="form-group">
								<label>Nama Customer</label>
								<input type="text" class="form-control" autocomplete="off" value="<?= $this->session->userdata('nama') ?>">
							</div>
							<div class="form-group">
								<label>Mobil</label>
								<input type="text" class="form-control" autocomplete="off" value="<?= $merk ?>">
							</div>
							<div class="form-group">
								<label>Tanggal Sewa</label>
								<input type="text" class="form-control" autocomplete="off" value="<?= IndonesiaTgl($tanggal_sewa) ?>">
							</div>
							<div class="form-group">
								<label>Tanggal Kembali</label>
								<input type="text" class="form-control" autocomplete="off" value="<?= IndonesiaTgl($tanggal_kembali) ?>">
							</div>
							<div class="form-group">
								<label>Durasi</label>
								<input type="text" class="form-control" autocomplete="off" value="<?= $durasi ?> Hari">
							</div>
							<div class="form-group">
								<label>Total Biaya Sewa</label>
								<input type="text" class="form-control" autocomplete="off" value="<?= format_rupiah($total_sewa) ?>">
							</div>
							<b>*Silahkan transfer Total Biaya Sewa ke 123456789 Bank BNI a/n REZA RINALDI maksimal tanggal <?= $batas_bayar ?>. <br>
								Untuk konfirmasi pesanan silahkan ke halaman Riwayat Sewa</b>
							<br>

							<a href="<?= base_url('customer/rental/riwayat_sewa') ?>" class="rent-btn"><i class="fa fa-shopping-bag"></i> Riwayat Sewa</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>