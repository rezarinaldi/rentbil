<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
	<div class="container">
		<div class="row">
			<!-- Page Title Start -->
			<div class="col-lg-12">
				<div class="section-title  text-center">
					<h2>Konfirmasi Pembayaran</h2>
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
				<div class="card shadow" style="width: 400px; margin: auto;">

					<div class="card-body">
						<form action="<?= base_url('customer/rental/konfirmasi_pembayaran_simpan') ?>" enctype="multipart/form-data" method="POST">

							<div class="form-group">
								<h5 class="mb-3">Upload Bukti Pembayaran</h5>
								<input type="file" name="bukti_pembayaran" class="form-control">
								<input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
							</div>

							<button type="submit" class="btn btn-sm btn-warning mt-3 ml-2 float-right"><i class="fa fa-upload"></i>
								Upload</button>

							<a href="<?= base_url('customer/rental/riwayat_sewa') ?>" class="btn btn-sm btn-dark mt-3 float-right"><i class="fa fa-reply"></i>
								Kembali</a>

						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!--== Contact Page Area End ==-->