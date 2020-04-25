<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/assets_shop/img/logo.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>

    <section id="header-kop">
        <div class="container-fluid mt-4">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td rowspan="3" width="16%" class="text-center">
                            <img src="<?= base_url('assets/assets_stisla') ?>/assets/img/logo.png" alt="logo" width="80" />
                        </td>
                        <td class="text-center">
                            <h3>Rental Mobil</h3>
                        </td>
                        <td rowspan="3" width="16%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="text-center">Jl. Soekarno Hatta No.19, RT.04, RW.13, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142, SMS/No. Telp. +62 85877990684, No. WA. +62 85334424941, https://www.rentbilmlg.com/</td>
                    </tr>
                </tbody>
            </table>
            <hr style="height: 2px" color="#0F0E20">
        </div>
    </section>

    <section id="body-of-report">
        <div class="container-fluid">
            <h4 class="text-center mt-4 mb-4">Detail Sewa</h4>
            <table class="table table-borderless">
                <tbody>
                    <?php foreach ($detail as $dt) : ?>
                        <tr>
                            <td width="23%">Penyewa</td>
                            <td width="2%">:</td>
                            <td><?= $dt->nama; ?></td>
                        </tr>
                        <tr>
                            <td>Merk Mobil</td>
                            <td>:</td>
                            <td><?= $dt->merk; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Sewa</td>
                            <td>:</td>
                            <td><?= IndonesiaTgl($dt->tanggal_sewa); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td>:</td>
                            <td><?= IndonesiaTgl($dt->tanggal_kembali); ?></td>
                        </tr>
                        <tr>
                            <td>Metode Pickup</td>
                            <td>:</td>
                            <td>
                                <?php if (($dt->pickup) == 0) {
                                    echo "Ambil Sendiri";
                                } else {
                                    echo "Pickup Sesuai Alamat";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Denda</td>
                            <td>:</td>
                            <td><?= format_rupiah($dt->denda); ?> / Hari</td>
                        </tr>
                        <tr>
                            <?php
                            $durasi = abs(round((strtotime($dt->tanggal_sewa) - strtotime($dt->tanggal_kembali)) / 86400));
                            ?>
                            <td>Durasi</td>
                            <td>:</td>
                            <td><?= $durasi; ?> Hari</td>
                        </tr>
                        <tr>
                            <td>Total Sewa</td>
                            <td>:</td>
                            <td><?= format_rupiah($dt->total_sewa); ?></td>
                        </tr>
                        <tr>
                            <td>Status Pembayaran</td>
                            <td>:</td>
                            <td>
                                <?php if (($dt->status_pembayaran) == 0) {
                                    echo "Belum Dibayar";
                                } elseif (($dt->status_pembayaran) == 1) {
                                    echo "Menunggu Konfirmasi";
                                } elseif (($dt->status_pembayaran) == 2) {
                                    echo "Sudah Dibayar";
                                } else {
                                    echo "Batal";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            $jmlhari  = 86400 * 1;
                            $tgl      = strtotime($dt->tanggal_sewa) - $jmlhari;
                            $batas_bayar = date("d-m-Y", $tgl);
                            ?>
                            <td colspan='3'>
                                <b>*Silahkan transfer Total Biaya Sewa ke 123456789 Bank BNI a/n REZA RINALDI maksimal tanggal <?= $batas_bayar ?>. <br>
                                    Untuk konfirmasi pesanan silahkan ke halaman Riwayat Sewa. Adapun jika status pembayaran 'Batal' maka transaksi tidak perlu dilanjutkan.</b>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <script type="text/javascript">
        window.print();
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>