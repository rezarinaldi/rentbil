<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <!-- <title>Login</title> -->
  <title><?= $title ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url('assets/assets_stisla') ?>/assets/img/logo.ico">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/assets_stisla') ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/assets_stisla/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="<?= base_url('assets/assets_stisla'); ?>/assets/img/logo.png" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Ahlan wa sahlan di website kami.</h4>
            <p class="text-muted">Sebelum memulai, Anda harus masuk atau mendaftar jika Anda belum memiliki akun.</p>

            <?= $this->session->flashdata('pesan') ?>

            <form method="POST" action="<?= base_url('auth/process') ?>" id="loginform" autocomplete="off" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Masukkan Email Dengan Benar
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  Password masih kosong
                </div>
              </div>

              <div class="form-group">
                <button name="login" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  Log In
                </button>
              </div>

              <div class="mt-5 text-center">
                Tidak punya akun? <a href="<?= base_url('register'); ?>">Buat akun baru.</a>
              </div>
            </form>

            <div class="text-center mt-5">
              Copyright &copy; Rental Mobil <script>
                document.write(new Date().getFullYear());
              </script><br>Dibuat dengan 💙 oleh <a target="_blank" href="https://github.com/stisla/stisla">Stisla</a>
              <div class="mt-3">
                <a href="#">Ketentuan Layanan</a>
                <div class="bullet"></div>
                <a href="#">Kebijakan Privasi</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('assets/assets_stisla'); ?>/assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Rental Mobil</h1>
                <h5 class="font-weight-normal text-muted-transparent">Malang, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/_TFu0wxWNWE">Josh Hild</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<? base_url() ?>/assets/assets_stisla/assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>/assets/assets_stisla/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>/assets/assets_stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>