<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pesan</h1>
        </div>

        <?= $this->session->flashdata('pesan') ?>

        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="data_table">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Subjek</th>
                            <th>Isi Pesan</th>
                            <th>Tgl Posting</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pesan as $psn) : ?>
                            <tr align="center">
                                <td><?= $no++ ?></td>
                                <td><?= $psn->nama ?></td>
                                <td><?= $psn->email ?></td>
                                <td><?= $psn->no_telp ?></td>
                                <td><?= $psn->subjek ?></td>
                                <td><?= $psn->isi_pesan ?></td>
                                <td><?= $psn->tgl_posting ?></td>
                                <td>
                                    <?php if ($psn->status == 1) { ?>
                                        <span class="badge badge-success">Sudah Dibaca</span>
                                    <?php } else { ?>
                                        <span><a class="btn btn-sm btn-dark tombol-baca" href="<?= base_url('admin/data_pesan/baca_pesan/') . $psn->id_pesan ?>">Belum Dibaca</a></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/data_pesan/delete_pesan/') . $psn->id_pesan ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>