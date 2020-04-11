<div class="container mt-5 mb-5" style="min-height: 65vh">
    <h3>Riwayat Sewa</h3>
    <div class="card shadow mt-4 mb-4">

        <div class="card-body">
            <table class="table table-hover table-striped table-bordered" id="data_table">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mobil</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal Kembali</th>
                        <th>Total Sewa</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Pembayaran</th>
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
                            <td><?= IndonesiaTgl($ts->tanggal_sewa) ?></td>
                            <td><?= IndonesiaTgl($ts->tanggal_kembali) ?></td>
                            <td><?= format_rupiah($ts->total_sewa) ?></td>
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
                                <?php
                                if ($ts->bukti_pembayaran == '') { ?>
                                    <a href="<?= base_url('customer/rental/konfirmasi_pembayaran/') . $ts->id_transaksi ?>" class="badge badge-dark">Konfirmasi Pembayaran</a>
                                <?php } else { ?>
                                    <a href="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>"><img width="100px" height="60px" src="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>"></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>