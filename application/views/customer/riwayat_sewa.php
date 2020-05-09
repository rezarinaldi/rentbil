<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Riwayat Sewa</h2>
                    <span class="title-line"><i class="fa fa-car"></i></span>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Contact Page Area Start ==-->
<div class="contact-page-wrao section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <h3 class="mb-4">Riwayat Sewa</h3>
                <?= $this->session->flashdata('pesan') ?>
                <div class="card shadow mt-4 mb-4">

                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered" id="data_table">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Merk Mobil</th>
                                    <th>Total Sewa</th>
                                    <th>Total Denda</th>
                                    <th>Status Pembayaran</th>
                                    <th>Pengembalian Mobil</th>
                                    <th>Batal Sewa</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Cetak</th>
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
                                        <td><?= format_rupiah($ts->total_sewa) ?></td>
                                        <td><?= format_rupiah($ts->total_denda) ?></td>
                                        <td>
                                            <?php if ($ts->status_pembayaran == 0) { ?>
                                                <span class='btn btn-sm btn-danger'><i class="fa fa-times"></i> Belum Dibayar</span>
                                            <?php } elseif ($ts->status_pembayaran == 1) { ?>
                                                <span class='btn btn-sm btn-info'><i class="fa fa-info"></i> Menunggu Konfirmasi</span>
                                            <?php } elseif ($ts->status_pembayaran == 2) { ?>
                                                <span class='btn btn-sm btn-success'><i class="fa fa-check"></i> Sudah Dibayar</span>
                                            <?php } else { ?>
                                                <span class='btn btn-sm btn-dark'><i class="fa fa-times"></i> Batal</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($ts->status == 0 || $ts->status_pembayaran == 0 || $ts->status_pembayaran == 1) { ?>
                                                -
                                            <?php } elseif ($ts->status == 1) { ?>
                                                <a class="btn btn-sm btn-primary" href="<?= base_url('customer/rental/pengembalian_mobil/') . $ts->id_transaksi ?>"><i class="fa fa-flag"></i> Pengembalian
                                                </a>
                                            <?php  } else { ?>
                                                <span class='btn btn-sm btn-success'><i class="fa fa-check"></i> Mobil Telah Dikembalikan</span>
                                            <?php  } ?>
                                        </td>
                                        <td>
                                            <?php if ($ts->status == 1) { ?>
                                                <a href="<?= base_url('customer/rental/batal_sewa/') . $ts->id_transaksi ?>" onclick="return confirm('Yakin ingin membatalkan sewa?')" class="btn btn-sm btn-dark"><i class="fa fa-times"></i> Batal Sewa</a>
                                            <?php } elseif ($ts->status == 2 || $ts->status == 0) { ?>
                                                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#batal">
                                                    <i class="fa fa-times"></i> Batal Sewa
                                                </button>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($ts->status_pembayaran == 0) { ?>
                                                <a class="btn btn-sm btn-warning" href="<?= base_url('customer/rental/konfirmasi_pembayaran/') . $ts->id_transaksi ?>">
                                                    <i class="fa fa-credit-card"></i> Konfirmasi
                                                </a>
                                            <?php } elseif ($ts->status_pembayaran == 1 || $ts->status_pembayaran == 2) { ?>
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>">
                                                        <img width="100px" height="60px" src="<?= base_url() . 'assets/upload/bukti_pembayaran/' . $ts->bukti_pembayaran ?>">
                                                    </a>
                                                </div>
                                            <?php } else { ?>
                                                <span>-</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('customer/rental/cetak_sewa/') . $ts->id_transaksi ?>" class="btn btn-light"><i class="fa fa-file"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--== Contact Page Area End ==-->

<!--== Modal Batal Penyewaan Start ==-->

<div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informasi Batal Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Maaf, transaksi ini telah selesai atau telah dibatalkan :)
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">
                    <i class="fa fa-check"></i> Oke
                </button>
            </div>
        </div>
    </div>
</div>

<!--== Modal Batal Penyewaan End ==-->