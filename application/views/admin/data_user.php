<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
        </div>

        <a href="<?= base_url('admin/data_user/tambah_user') ?>" class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah Data</a>
        <?= $this->session->flashdata('pesan') ?>
        <div class="card shadow mb-4">
            <div class="card-body">
            <h5 class="text-dark">Laporan Daftar Customer</h5>
                <div class="btn-group mb-4">
                    <a class="btn btn-dark btn-sm" href="<?= base_url(); ?>admin/data_user/laporan_print" target="blank">
                        <i class="fas fa-print"></i> Cetak Laporan
                    </a>
                </div>
                <table class="table table table-hover table-striped table-bordered" id="data_table">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>No. Telp</th>
                            <th>No. KTP</th>
                            <th>Level</th>
                            <!-- <th>Scan KTP</th>
                            <th>Scan KK</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $us) : ?>
                            <tr align="center">
                                <td><?= $no++ ?></td>
                                <td><?= $us->nama ?></td>
                                <td><?= $us->email ?></td>
                                <td><?= $us->alamat ?></td>
                                <td><?= $us->gender ?></td>
                                <td><?= $us->no_telp ?></td>
                                <td><?= $us->no_ktp ?></td>
                                <td>
                                    <?php if ($us->level == 1) {
                                        echo "Admin";
                                    } else {
                                        echo "Customer";
                                    } ?>
                                </td>
                                <!-- <td>
                                <div class="image-popup">
                                    <a href="<?= base_url() . 'assets/upload/user/' . $us->scan_ktp ?>"><img width="100px" class="main-popup" height="60px" src="<?= base_url() . 'assets/upload/user/' . $us->scan_ktp ?>"></a>
                                </div>
                            </!-->
                                <!-- <td>
                                <div class="image-popup">
                                    <a href="<?= base_url() . 'assets/upload/user/' . $us->scan_kk ?>"><img width="100px" class="main-popup" height="60px" src="<?= base_url() . 'assets/upload/user/' . $us->scan_kk ?>"></a>
                                </div>
                            </!-->
                                <td>
                                    <a href="<?= base_url('admin/data_user/delete_user/') . $us->id_user ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a>
                                    <a href="<?= base_url('admin/data_user/edit_user/') . $us->id_user ?>" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>