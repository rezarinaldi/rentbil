<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Mobil</h1>
        </div>
    </section>

    <?php foreach ($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <img class="mt-3" width="500px" src="<?= base_url() . 'assets/upload/mobil/' . $dt->gambar ?>">
                    </div>
                    <div class="col-md-5">
                        <table class="table table-striped table-bordered">
                            <tr align="center">
                                <td>Type Mobil</td>
                                <td>
                                    <?php
                                    if ($dt->kode_type == "SD") {
                                        echo "Sedan";
                                    } elseif ($dt->kode_type == "HB") {
                                        echo "Hatchback";
                                    } else {
                                        echo "<span class='text-danger'>Type mobil belum terdaftar</span>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr align="center">
                                <td>Merk</td>
                                <td><?= $dt->merk ?></td>
                            </tr>
                            <tr align="center">
                                <td>No. Plat</td>
                                <td><?= $dt->no_plat ?></td>
                            </tr>
                            <tr align="center">
                                <td>Warna</td>
                                <td><?= $dt->warna ?></td>
                            </tr>
                            <tr align="center">
                                <td>Tahun</td>
                                <td><?= $dt->tahun ?></td>
                            </tr>
                            <tr align="center">
                                <td>Status</td>
                                <td>
                                    <?php
                                    if ($dt->status == "0") {
                                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                    } else {
                                        echo "<span class='badge badge-primary'>Tersedia</span>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <a class="btn btn-sm btn-dark" href="<?= base_url('admin/data_mobil') ?>"> <i class="fas fa-reply"></i> Kembali</a>
                        <a class="btn btn-sm btn-warning ml-2" href="<?= base_url('admin/data_mobil/edit_mobil/') . $dt->id_mobil; ?>"> <i class="far fa-edit"></i> Ubah</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>