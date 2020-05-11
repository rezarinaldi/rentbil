<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Rental</h2>
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
                    <?php foreach ($mobil as $rt) : ?>
                        <h2><?= $rt->merk ?><span class="price" style="color: #014782">Harga: <b><?= format_rupiah($rt->harga) ?> / Hari</b></span></h2>
                        <img src="<?= base_url() . 'assets/upload/mobil/' . $rt->gambar ?>" alt="" style="width: 730px; height: 450px">
                </div>
            </div>
            <!-- Car List Content End -->

            <?php $today = date('Y-m-d') ?>

            <!-- Sidebar Area Start -->
            <div class="col-lg-4">
                <form action="<?= base_url('customer/rental/tambah_rental_ready_simpan') ?>" method="POST" autocomplete="off">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>PILIH TANGGAL RENTAL</h3>

                            <div class="sidebar-body">
                                <div class="form-group">
                                    <label>Tanggal Sewa</label>
                                    <input type="date" name="tgl_sewa" class="form-control" min="<?= $today ?>" required>
                                    <div class="text-small text-danger font-weight-bold" style="font-size: 12px">*Minimal pilih tanggal sewa dibesok harinya.</div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="date" name="tgl_kembali" class="form-control" min="<?= $today ?>" required>
                                </div>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->

                        <input type="hidden" name="id_mobil" value="<?= $rt->id_mobil ?>">

                        <div class="input-submit float-left">
                            <button class="bg-warning" type="submit"><i class="fa fa-car"></i> Sewa</button>
                        </div>
                        <div class="input-submit float-left">
                            <button class="bg-warning" type="reset"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach ?>
        <!-- Sidebar Area End -->
        </div>
    </div>
</section>
<!--== Car List Area End ==-->