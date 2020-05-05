<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

	<!-- <title>Register</title> -->
	<title><?= $title ?></title>

	<link rel="shortcut icon" href="<?= base_url() ?>assets/assets_shop/img/logo.ico">

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/assets_stisla/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/assets_stisla/assets/css/components.css">
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
						<div class="login-brand">
							<img src="<?= base_url() ?>/assets/assets_stisla/assets/img/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
						</div>

						<div class="card card-primary">
							<div class="card-header">
								<h4>Register</h4>
							</div>

							<div class="card-body">
								<form action="<?= base_url('register/tambah_user_simpan_customer') ?>" autocomplete="off" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate="">
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label>Nama</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="far fa-user"></i>
														</div>
													</div>
													<input type="text" name="nama" class="form-control" required autofocus>
													<div class="invalid-feedback">
														Nama Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label>Email</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fas fa-envelope"></i>
														</div>
													</div>
													<input type="email" name="email" class="form-control" required>
													<div class="invalid-feedback">
														Email Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label>Password</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fas fa-lock"></i>
														</div>
													</div>
													<input type="password" name="password" class="form-control" data-indicator="pwindicator" required>
													<div class="invalid-feedback">
														Password Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label>Confirm Password</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fas fa-lock"></i>
														</div>
													</div>
													<input type="password" name="confirm_password" class="form-control" data-indicator="pwindicator" required>
													<div class="invalid-feedback">
														Password Konfirmasi Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label>Alamat</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fas fa-map-marker-alt"></i>
														</div>
													</div>
													<textarea name="alamat" class="form-control textarea optional" data-height="150" required></textarea>
													<div class="invalid-feedback">
														Alamat Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label>Jenis Kelamin</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="far fa-user"></i>
														</div>
													</div>
													<select name="gender" class="form-control" required>
														<option value="">Pilih Jenis Kelamin</option>
														<option value="Laki-laki">Laki-laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
													<div class="invalid-feedback">
														Jenis Kelamin Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label>No. Telepon</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fas fa-phone"></i>
														</div>
													</div>
													<input type="number" name="no_telp" class="form-control phone-number" required>
													<div class="invalid-feedback">
														No. Telepon Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label>No. KTP</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fas fa-address-card"></i>
														</div>
													</div>
													<input type="number" name="no_ktp" class="form-control" required>
													<div class="invalid-feedback">
														No. KTP Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label>Scan KTP</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fas fa-address-card"></i>
														</div>
													</div>
													<input type="file" name="scan_ktp" class="form-control" required>
													<div class="invalid-feedback">
														Scan KTP Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label>Scan KK</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fas fa-address-card"></i>
														</div>
													</div>
													<input type="file" name="scan_kk" class="form-control" required>
													<div class="invalid-feedback">
														Scan KK Tidak Boleh Kosong
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="confirm" class="custom-control-input" id="confirmAgreement" value="confirm" required="" aria-required="true">
											<label class="custom-control-label" for="confirmAgreement">Saya setuju dengan Ketentuan yang berlaku.</label>
											<div class="invalid-feedback">
												Klik persetujuan jangan lupa ya
											</div>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block">
											Register
										</button>
									</div>

									<div class="mt-2 text-center">
										Sudah punya akun? <a href="<?= base_url('auth/login'); ?>">Silahkan login.</a>
									</div>

								</form>
							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; <a href="https://github.com/stisla/stisla">Stisla </a>
							<script>
								document.write(new Date().getFullYear());
							</script>
						</div>
					</div>
				</div>
			</div>
	</div>
	</section>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url() ?>/assets/assets_stisla/assets/js/stisla.js"></script>

	<!-- Template JS File -->
	<script src="<?= base_url() ?>/assets/assets_stisla/assets/js/scripts.js"></script>
	<script src="<?= base_url() ?>/assets/assets_stisla/assets/js/custom.js"></script>

</body>

</html>