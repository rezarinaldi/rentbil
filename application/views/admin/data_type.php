<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Type</h1>
        </div>

        <a href="<?= base_url('admin/data_type/tambah_type') ?>" class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah Data</a>
        <?= $this->session->flashdata('pesan') ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="data_table">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Kode Type</th>
                            <th>Nama Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($type as $tp) : ?>
                            <tr align="center">
                                <td><?= $no++ ?></td>
                                <td><?= $tp->kode_type ?></td>
                                <td><?= $tp->nama_type ?></td>
                                <td>
                                    <a href="<?= base_url('admin/data_type/delete_type/') . $tp->id_type ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a>
                                    <a href="<?= base_url('admin/data_type/edit_type/') . $tp->id_type ?>" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>