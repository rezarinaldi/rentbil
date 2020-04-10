<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Menunggu Konfirmasi</h1>
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
                            <th>Status</th>
                            <th>Bukti Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksi as $ts) :
                            if ($ts->status_pembayaran == 1) :
                        ?>
                                <tr align="center">
                                    <td><?= $no++ ?></td>
                                    <td><?= $ts->nama ?></td>
                                    <td><?= $ts->merk ?></td>
                                    <td><?= $ts->tanggal_sewa ?></td>
                                    <td><?= $ts->tanggal_kembali ?></td>
                                    <td><?= indo_currency($ts->total_sewa) ?></td>
                                    <td><span class="badge badge-info">Menunggu Konfirmasi</span></td>
                                    <td>
                                        <a href="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>"><img width="100px" height="60px" src="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>"></a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/transaksi/konfirmasi_pembayaran/') . $ts->id_transaksi ?>" onclick="return confirm('Yakin Konfirmasi Pembayaran?')" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Confirm</a>
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