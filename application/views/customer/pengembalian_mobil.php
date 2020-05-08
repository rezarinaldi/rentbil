<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Pengembalian Mobil</h2>
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
                <div class="card bg-light" style="width: 400px; margin: auto;">

                    <div class="card-body">

                        <?php foreach ($transaksi as $ts) : ?>

                            <form action="<?= base_url('customer/rental/pengembalian_mobil_aksi') ?>" enctype="multipart/form-data" method="POST">

                                <div class="form-group">

                                    <input type="hidden" name="id_transaksi" value="<?= $ts->id_transaksi ?>">
                                    <input type="hidden" name="id_mobil" value="<?= $ts->id_mobil ?>">
                                    <input type="hidden" name="tanggal_kembali" value="<?= $ts->tanggal_kembali ?>">
                                    <input type="hidden" name="denda" value="<?= $ts->denda ?>">

                                    <h5 class="mb-3">Form Pengembalian Mobil</h5>
                                    <div class="form-group">
                                        <label>Tanggal Pengembalian</label>
                                        <input type="date" name="tanggal_pengembalian" class="form-control" value="<?= $ts->tanggal_pengembalian ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control" required>
                                            <option <?php if ($ts->status == "1") {
                                                        echo "selected='selected'";
                                                    }
                                                    ?> value="1">Disewa</option>
                                            <option <?php if ($ts->status == "2") {
                                                        echo "selected='selected'";
                                                    }
                                                    ?> value="2">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <a class="btn btn-sm btn-dark float-right ml-2" href="<?= base_url('customer/rental/riwayat_sewa') ?>"><i class="fa fa-reply"></i> Kembali</a>
                                <button type="submit" class="btn btn-sm btn-success float-right">
                                    <i class="fa fa-check"></i> Submit
                                </button>
                            </form>

                        <?php endforeach; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--== Contact Page Area End ==-->