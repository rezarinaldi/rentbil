<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
        </div>

        <a href="<?= base_url('admin/data_user/tambah_user') ?>" class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah Data</a>
        <?= $this->session->flashdata('pesan') ?>
        <div class="card shadow mb-4">
            <div class="card-body">
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
                        foreach ($user as $mb) : ?>
                            <tr align="center">
                                <td><?= $no++ ?></td>
                                <td><?= $mb->nama ?></td>
                                <td><?= $mb->email ?></td>
                                <td><?= $mb->alamat ?></td>
                                <td><?= $mb->gender ?></td>
                                <td><?= $mb->no_telp ?></td>
                                <td><?= $mb->no_ktp ?></td>
                                <td>
                                    <?php if ($mb->level == 1) {
                                        echo "Admin";
                                    } else {
                                        echo "Customer";
                                    } ?>
                                </td>
                                <!-- <td>
                                <div class="image-popup">
                                    <a href="<?= base_url() . 'assets/upload/user/' . $mb->scan_ktp ?>"><img width="100px" class="main-popup" height="60px" src="<?= base_url() . 'assets/upload/user/' . $mb->scan_ktp ?>"></a>
                                </div>
                            </!-->
                                <!-- <td>
                                <div class="image-popup">
                                    <a href="<?= base_url() . 'assets/upload/user/' . $mb->scan_kk ?>"><img width="100px" class="main-popup" height="60px" src="<?= base_url() . 'assets/upload/user/' . $mb->scan_kk ?>"></a>
                                </div>
                            </!-->
                                <td>
                                    <a href="<?= base_url('admin/data_user/delete_user/') . $mb->id_user ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a>
                                    <a href="<?= base_url('admin/data_user/edit_user/') . $mb->id_user ?>" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>