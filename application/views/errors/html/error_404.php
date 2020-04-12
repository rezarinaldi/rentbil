<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$CI = new CI_Controller();
$CI = &get_instance();
$CI->load->helper('url');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>404 &mdash; Stisla</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/assets_shop/img/logo.ico">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/assets_stisla'); ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/assets_stisla'); ?>/assets/css/components.css">
</head>

<body class="bg-dark">
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="page-error">
					<div class="page-inner">
						<h2 style="font-size: 70px; color: #fff;"><?= $heading; ?></h2>
						<div class="page-description mt-5 text-light">
							<?= $message; ?>
						</div>
						<div class="page-search">
							<div class="mt-5">
								<a href="<?= base_url('customer/dashboard'); ?>" class="btn btn-dark"><i class="fas fa-meteor"></i> Kembali ke Dashboard</a>
							</div>
						</div>
					</div>
				</div>
				<div class="simple-footer mt-5">
					Copyright &copy; <a href="https://github.com/stisla/stisla">Stisla </a>
					<script>
						document.write(new Date().getFullYear());
					</script>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url('assets/assets_stisla'); ?>/assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Template JS File -->
	<script src="<?= base_url('assets/assets_stisla'); ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/assets_stisla'); ?>/assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
</body>

</html>