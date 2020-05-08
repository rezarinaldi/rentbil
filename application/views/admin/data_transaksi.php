<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>

        <!-- <a href="<?= base_url('admin/transaksi/tambah_transaksi') ?>" class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah Data</a> -->
        <?= $this->session->flashdata('pesan') ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered table-responsive" id="data_table">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>User</th>
                            <th>Mobil</th>
                            <th>Tgl Sewa</th>
                            <th>Tgl Kembali</th>
                            <th>Tgl Pengembalian</th>
                            <th>Metode Pickup</th>
                            <th>Bukti Pembayaran</th>
                            <th>Total Sewa</th>
                            <th>Total Denda</th>
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
                                <td><?= IndonesiaTgl($ts->tanggal_sewa) ?></td>
                                <td><?= IndonesiaTgl($ts->tanggal_kembali) ?></td>
                                <td>
                                    <?php if (IndonesiaTgl($ts->tanggal_pengembalian) == "00-00-0000") { ?>
                                        -
                                    <?php } else { ?>
                                        <?= IndonesiaTgl($ts->tanggal_pengembalian) ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if (($ts->pickup) == 0) {
                                        echo "<span class='badge badge-dark'>Ambil Sendiri</span>";
                                    } else {
                                        echo "<span class='badge badge-primary'>Pickup Sesuai Alamat</span>";
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($ts->status_pembayaran == 0 || $ts->status_pembayaran == 3) { ?>
                                        -
                                    <?php  } elseif ($ts->status_pembayaran == 1 || $ts->status_pembayaran == 2) { ?>
                                        <a href="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>">
                                            <img width="80px" src="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>">
                                        </a>
                                    <?php } ?>
                                </td>
                                <td><?= format_rupiah($ts->total_sewa) ?></td>
                                <td><?= format_rupiah($ts->total_denda) ?></td>
                                <td>
                                    <?php if (($ts->status) == 0) {
                                        echo "<span class='badge badge-dark'>Batal</span>";
                                    } elseif (($ts->status) == 1) {
                                        echo "<span class='badge badge-warning'>Disewa</span>";
                                    } else {
                                        echo "<span class='badge badge-success'>Selesai</span>";
                                    } ?>
                                </td>
                                <td>
                                    <?php if (($ts->status_pembayaran) == 0) {
                                        echo "<span class='badge badge-danger'>Belum Dibayar</span>";
                                    } elseif (($ts->status_pembayaran) == 1) {
                                        echo "<span class='badge badge-info'>Menunggu Konfirmasi</span>";
                                    } elseif (($ts->status_pembayaran) == 2) {
                                        echo "<span class='badge badge-success'>Sudah Dibayar</span>";
                                    } else {
                                        echo "<span class='badge badge-dark'>Batal</span>";
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/transaksi/delete_transaksi/') . $ts->id_transaksi ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>