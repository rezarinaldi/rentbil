<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Detail Mobil</h2>
                    <span class="title-line"><i class="fa fa-car"></i></span>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Car List Area Start ==-->
<section id="car-list-area" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Car List Content Start -->
            <div class="col-lg-8">
                <div class="car-details-content">
                    <?php foreach ($mobil as $dt) : ?>
                        <h2><?= $dt->merk ?><span class="price" style="color: #014782">Harga: <b><?= format_rupiah($dt->harga) ?> / Hari</b></span></h2>
                        <img src="<?= base_url() . 'assets/upload/mobil/' . $dt->gambar ?>" style="height: 300px; width: 540px">
                        <div class="car-details-info">
                            <h4>Detail Mobil</h4>

                            <div class="technical-info">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tech-info-table">
                                            <table class="table table-bordered">
                                                <tr align="center">
                                                    <th>Type</th>
                                                    <td><?= $dt->nama_type ?></td>
                                                </tr>
                                                <tr align="center">
                                                    <th>Merk</th>
                                                    <td><?= $dt->merk ?></td>
                                                </tr>
                                                <tr align="center">
                                                    <th>No. Plat</th>
                                                    <td><?= $dt->no_plat ?></td>
                                                </tr>
                                                <tr align="center">
                                                    <th>Warna</th>
                                                    <td><?= $dt->warna ?></td>
                                                </tr>
                                                <tr align="center">
                                                    <th>Tahun</th>
                                                    <td><?= $dt->tahun ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tech-info-table">
                                            <table class="table table-bordered">
                                                <tr align="center">
                                                    <th>AC</th>
                                                    <td>
                                                        <?php if ($dt->ac == 1) { ?>
                                                            <i class="fa fa-check-square" style="color: #014782"></i>
                                                        <?php } else { ?>
                                                            <i class="fa fa-times-circle text-danger"></i>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr align="center">
                                                    <th>Supir</th>
                                                    <td>
                                                        <?php if ($dt->supir == 1) { ?>
                                                            <i class="fa fa-check-square" style="color: #014782"></i>
                                                        <?php } else { ?>
                                                            <i class="fa fa-times-circle text-danger"></i>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr align="center">
                                                    <th>Audio Player</th>
                                                    <td>
                                                        <?php if ($dt->audio_player == 1) { ?>
                                                            <i class="fa fa-check-square" style="color: #014782"></i>
                                                        <?php } else { ?>
                                                            <i class="fa fa-times-circle text-danger"></i>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr align="center">
                                                    <th>Central Lock</th>
                                                    <td>
                                                        <?php if ($dt->central_lock == 1) { ?>
                                                            <i class="fa fa-check-square" style="color: #014782"></i>
                                                        <?php } else { ?>
                                                            <i class="fa fa-times-circle text-danger"></i>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
            <!-- Car List Content End -->

            <!-- Sidebar Area Start -->
            <div class="col-lg-4">
                <div class="sidebar-content-wrap m-t-50">
                    <!-- Single Sidebar Start -->
                    <div class="single-sidebar">
                        <h3>Untuk Informasi Lengkapnya</h3>

                        <div class="sidebar-body">
                            <p>Buka:</p>
                            <p class="mb-3"><i class="fa fa-clock-o"></i> Setiap Hari, 09.00 - 17.00</p>
                            <p>Hubungi:</p>
                            <p><i class="fa fa-whatsapp"></i> (0853) 34424941</p>
                            <p><i class="fa fa-mobile"></i> (0858) 77990684</p>
                        </div>
                    </div>
                    <!-- Single Sidebar End -->

                    <!-- Single Sidebar Start -->
                    <div class="single-sidebar">
                        <h3>Sosial Media</h3>

                        <div class="sidebar-body">
                            <div class="social-icons text-center">
                                <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:;"><i class="fa fa-whatsapp"></i></a>
                                <a href="javascript:;"><i class="fa fa-instagram"></i></a>
                                <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Sidebar End -->

                    <?php if ($dt->status_mobil == 0) { ?>
                        <a href="<?= base_url('customer/dashboard/list_mobil') ?>" class="rent-btn"><i class="fa fa-reply"></i> Kembali</a>
                        <a href="javascript:;" class="rent-btn"><i class="fa fa-times-circle text-danger"></i> Disewa</a>
                    <?php } else { ?>
                        <?php if (isset($_SESSION['level']) == 2) { ?>
                            <a href="<?= base_url('customer/dashboard/list_mobil') ?>" class="rent-btn"><i class="fa fa-reply"></i> Kembali</a>
                            <a href="<?= base_url('customer/rental/tambah_rental/') . $dt->id_mobil ?>" class="rent-btn"><i class="fa fa-car text-warning"></i> Sewa</a>
                        <?php } else { ?>
                            <a href="<?= base_url('auth/login') ?>" class="rent-btn"><i class="fa fa-sign-in text-success"></i> Login Untuk Sewa</a>
                    <?php
                            }
                        }
                    ?>

                </div>
            </div>
        <?php endforeach; ?>
        <!-- Sidebar Area End -->
        </div>
    </div>
</section>
<!--== Car List Area End ==-->