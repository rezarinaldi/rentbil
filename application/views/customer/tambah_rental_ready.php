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
                    <form action="<?= base_url('customer/rental/tambah_rental_simpan') ?>" method="POST">
                        <div class="sidebar-content-wrap m-t-50">
                            <!-- Single Sidebar Start -->
                            <div class="single-sidebar">
                                <h3>Detail Rental</h3>

                                <div class="sidebar-body">
                                    <div class="form-group">
                                        <input type="hidden" name="id_mobil" value="<?= $rt->id_mobil ?>">
                                        <label>Tanggal Sewa</label>
                                        <input type="text" name="tanggal_sewa" class="form-control" value="<?= IndonesiaTgl($tgl_sewa) ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Kembali</label>
                                        <input type="text" name="tanggal_kembali" class="form-control" value="<?= IndonesiaTgl($tgl_kembali) ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Durasi</label>
                                        <input type="text" name="durasi" class="form-control" value="<?= $durasi ?> Hari" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Biaya Sewa</label>
                                        <input type="text" name="total_biaya" class="form-control" value="<?= format_rupiah(($rt->harga * $durasi)) ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Denda</label>
                                        <input type="text" name="denda" class="form-control" value="<?= format_rupiah($rt->denda) ?> / Hari" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Metode Pickup</label>
                                        <select name="pickup" class="form-control" required>
                                            <option value="">Pilih Metode Pickup</option>
                                            <option value="0">Ambil Sendiri</option>
                                            <option value="1">Pickup Sesuai Alamat</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <!-- Single Sidebar End -->

                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                            <input type="hidden" name="nama_mobil" value="<?= $rt->merk ?>">
                            <input type="hidden" value="<?= $rt->harga ?>" name="harga" id="harga">
                            <input type="hidden" name="id_mobil" value="<?= $rt->id_mobil ?>">
                            <input type="hidden" name="durasi" value="<?= $durasi ?>">
                            <input type="hidden" name="tanggal_sewa" value="<?= $tgl_sewa ?>">
                            <input type="hidden" name="tanggal_kembali" value="<?= $tgl_kembali ?>">

                            <div class="input-submit float-left">
                                <button class="bg-warning" type="submit"><i class="fa fa-car"></i> Sewa</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
            <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->