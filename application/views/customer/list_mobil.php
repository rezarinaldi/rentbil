<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>List Mobil</h2>
                    <span class="title-line"><i class="fa fa-car"></i></span>
                    <p>Daftar List Mobil Pada Rental Kami.</p>
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
            <div class="col-lg-12">
                <div class="car-list-content">
                    <div class="row">
                        <!-- Single Car Start -->
                        <?php foreach ($mobil as $mb) : ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="p-car-thumbnails">
                                        <a class="car-hover" href="<?= base_url() . 'assets/upload/mobil/' . $mb->gambar ?>">
                                            <img src="<?= base_url() . 'assets/upload/mobil/' . $mb->gambar ?>" style="height: 300px; width: 540px">
                                        </a>
                                    </div>
                                    <div class="car-list-info without-bar">
                                        <h2><a href="<?= base_url('customer/dashboard/detail_mobil/') . $mb->id_mobil ?>"><?= $mb->merk ?></a></h2>
                                        <h5 style="color: #014782"><?= format_rupiah($mb->harga) ?> / hari</h5>
                                        <ul class="car-info-list">
                                            <li>
                                                <?php if ($mb->ac == 1) { ?>
                                                    <i class="fa fa-check-square" style="color: #014782"></i> AC
                                                <?php } else { ?>
                                                    <i class="fa fa-times-circle text-danger"></i> AC
                                                <?php } ?>
                                            </li>
                                            <li>
                                                <?php if ($mb->supir == 1) { ?>
                                                    <i class="fa fa-check-square" style="color: #014782"></i> Supir
                                                <?php } else { ?>
                                                    <i class="fa fa-times-circle text-danger"></i> Supir
                                                <?php } ?>
                                            <li>
                                                <?php if ($mb->audio_player == 1) { ?>
                                                    <i class="fa fa-check-square" style="color: #014782"></i> Audio Player
                                                <?php } else { ?>
                                                    <i class="fa fa-times-circle text-danger"></i> Audio Player
                                                <?php } ?>
                                            <li>
                                                <?php if ($mb->central_lock == 1) { ?>
                                                    <i class="fa fa-check-square" style="color: #014782"></i> Central Lock
                                                <?php } else { ?>
                                                    <i class="fa fa-times-circle text-danger"></i> Central Lock
                                                <?php } ?>
                                        </ul>
                                        <?php if ($mb->status_mobil == 1) { ?>
                                            <a href="<?= base_url('customer/rental/tambah_rental/') . $mb->id_mobil ?>" class="rent-btn"><i class="fa fa-car text-warning"></i> Sewa</a>
                                            <a href="<?= base_url('customer/dashboard/detail_mobil/') . $mb->id_mobil ?>" class="rent-btn"><i class="fa fa-search-plus text-success"></i> Detail</a>
                                        <?php } else { ?>
                                            <a href="javascript:;" class="rent-btn"><i class="fa fa-times-circle text-danger"></i> Disewa</a>
                                            <a href="<?= base_url('customer/dashboard/detail_mobil/') . $mb->id_mobil ?>" class="rent-btn"><i class="fa fa-search-plus text-success"></i> Detail</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Single Car End -->
                    </div>
                </div>
            </div>
            <!-- Car List Content End -->
        </div>
    </div>
</section>
<!--== Car List Area End ==-->