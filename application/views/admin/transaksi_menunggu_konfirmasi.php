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
                            <th>Metode Pickup</th>
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
                                    <td><?= IndonesiaTgl($ts->tanggal_sewa) ?></td>
                                    <td><?= IndonesiaTgl($ts->tanggal_kembali) ?></td>
                                    <td>
                                        <?php if (($ts->pickup) == 0) {
                                            echo "<span class='badge badge-dark'>Ambil Sendiri</span>";
                                        } else {
                                            echo "<span class='badge badge-primary'>Pickup Sesuai Alamat</span>";
                                        } ?>
                                    </td>
                                    <td><?= format_rupiah($ts->total_sewa) ?></td>
                                    <td><span class="badge badge-info">Menunggu Konfirmasi</span></td>
                                    <td>
                                        <a href="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>">
                                            <img width="80px" src="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/transaksi/konfirmasi_pembayaran/') . $ts->id_transaksi ?>" class="btn btn-sm btn-light tombol-konfirmasi"><i class="fas fa-check"></i></a>
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