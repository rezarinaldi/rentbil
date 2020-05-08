<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sedang Disewa</h1>
        </div>

        <?= $this->session->flashdata('pesan') ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="data_table">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>User</th>
                            <th>Mobil</th>
                            <th>Tgl Sewa</th>
                            <th>Tgl Kembali</th>
                            <th>Total Sewa</th>
                            <th>Denda /Hari</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksi as $ts) :
                            if (($ts->status_pembayaran == 2) && ($ts->status == 1)) :
                        ?>
                                <tr align="center">
                                    <td><?= $no++ ?></td>
                                    <td><?= $ts->nama ?></td>
                                    <td><?= $ts->merk ?></td>
                                    <td><?= IndonesiaTgl($ts->tanggal_sewa) ?></td>
                                    <td><?= IndonesiaTgl($ts->tanggal_kembali) ?></td>
                                    <td><?= format_rupiah($ts->total_sewa) ?></td>
                                    <td><?= format_rupiah($ts->denda) ?></td>
                                    <td><span class="badge badge-warning text-dark">Sedang Disewa</span></td>
                                    <td>
                                        <a href="<?= base_url('admin/transaksi/delete_transaksi/') . $ts->id_transaksi ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a>
                                        <a href="<?= base_url('admin/transaksi/edit_transaksi/') . $ts->id_transaksi ?>" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>