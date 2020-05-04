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
                                <th>Type Mobil</th>
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
                            <tr align="center">
                                <th>Harga</th>
                                <td><?= format_rupiah($dt->harga) ?></td>
                            </tr>
                            <tr align="center">
                                <th>Status</th>
                                <th>
                                    <?php
                                    if ($dt->status_mobil == "0") {
                                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                    } else {
                                        echo "<span class='badge badge-primary'>Tersedia</span>";
                                    }
                                    ?>
                                </th>
                            </tr>
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
                        <a class="btn btn-sm btn-dark" href="<?= base_url('admin/data_mobil') ?>"> <i class="fas fa-reply"></i> Kembali</a>
                        <a class="btn btn-sm btn-warning ml-2" href="<?= base_url('admin/data_mobil/edit_mobil/') . $dt->id_mobil; ?>"> <i class="far fa-edit"></i> Ubah</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>