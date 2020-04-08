<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>

        <a href="<?= base_url('admin/transaksi/tambah_transaksi') ?>" class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah Data</a>
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
                            <th>Status</th>
                            <th>Status Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksi as $ts) : ?>
                            <tr align="center">
                                <td><?= $no++ ?></td>
                                <td><?= $ts->nama ?></td>
                                <td><?= $ts->merk ?></td>
                                <td><?= $ts->tanggal_sewa ?></td>
                                <td><?= $ts->tanggal_kembali ?></td>
                                <td><?= indo_currency($ts->total_sewa) ?></td>
                                <td><?= $ts->status == 1 ? "<span class='badge badge-warning'>Disewa</span>" : "<span class='badge badge-success'>Selesai</span>" ?></td>
                                <td>
                                    <?php if (($ts->status_pembayaran) == 0) {
                                        echo "<span class='badge badge-danger'>Belum Dibayar</span>";
                                    } elseif (($ts->status_pembayaran) == 1) {
                                        echo "<span class='badge badge-info'>Menunggu Konfirmasi</span>";
                                    } else {
                                        echo "<span class='badge badge-success'>Sudah Dibayar</span>";
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/transaksi/delete_transaksi/') . $ts->id_transaksi ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a>
                                    <a href="<?= base_url('admin/transaksi/edit_transaksi/') . $ts->id_transaksi ?>" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>