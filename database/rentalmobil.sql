-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2020 pada 09.43
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_type`, `merk`, `no_plat`, `warna`, `tahun`, `harga`, `status`, `gambar`) VALUES
(6, 1, 'Suzuki Ciaz', 'N 1985 RTF', 'Putih', '2019', 800000, '1', 'mobil-suzuki-ciaz11.jpg'),
(8, 5, 'Suzuki Ciaz', 'N 6758 AW', 'PINK', '2017', 600000, '0', 'Suzuki-Ciaz.jpg'),
(10, 5, 'Suzuki Ertiga', 'N 1985 NK', 'Silver', '2018', 650000, '1', 'Suzuki-All-new-Ertiga-2018-Warna-merah-Pearl-Radiant-Red.jpg'),
(11, 1, 'Honda Civic', 'B 9547 HUY', 'Silver', '2014', 1000000, '0', 'std_in-2499489_300e1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_pesan` longtext DEFAULT NULL,
  `tgl_posting` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `isi_pesan`, `tgl_posting`, `status`) VALUES
(1, 4, 'Bismillah.. Assalamu\'alaikum akhy :)', '2020-04-09 18:36:01', 0),
(2, 7, 'Bismillah.. Assalamu\'alaikum, anta sehat? :)', '2020-04-09 19:05:23', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_sewa` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1. Disewa, 2. Selesai',
  `status_pembayaran` int(1) NOT NULL COMMENT '0.belum dibayar, 1.menunggu konfirmasi, 2.sudah dibayar',
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_mobil`, `tanggal_sewa`, `tanggal_kembali`, `total_sewa`, `status`, `status_pembayaran`, `bukti_pembayaran`) VALUES
(4, 3, 6, '2020-02-20', '2020-02-22', 1600000, 2, 2, ''),
(5, 6, 8, '2020-02-06', '2020-02-08', 1200000, 2, 2, ''),
(6, 6, 10, '2020-02-27', '2020-02-29', 1300000, 2, 2, 'Screenshot_12.jpg'),
(16, 7, 8, '2020-03-25', '2020-03-31', 3600000, 1, 2, 'WhatsApp_Image_2020-03-14_at_12_44_18_PM.jpeg'),
(18, 3, 11, '2020-04-01', '2020-04-16', 15000000, 2, 2, ''),
(22, 7, 11, '2020-04-01', '2020-04-02', 1000000, 1, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `kode_type` varchar(10) NOT NULL,
  `nama_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`id_type`, `kode_type`, `nama_type`) VALUES
(1, 'SD', 'Sedan'),
(5, 'HB', 'Hatchback');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `scan_ktp` varchar(255) NOT NULL,
  `scan_kk` varchar(255) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1. admin, 2. customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `alamat`, `gender`, `no_telp`, `no_ktp`, `scan_ktp`, `scan_kk`, `level`) VALUES
(3, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Malang', 'Laki-Laki', '085334424941', '213123123112', 'KTP-1544523262.png', 'KK.PNG', 1),
(4, 'Lathifa Firdauzi', 'lathifa@gmail.com', '401e8eb287e4700453792a5e57490d70', 'Surabaya', 'Perempuan', '085727287289', '123213123', 'KTP-15445232621.png', 'KK1.PNG', 2),
(6, 'Alief Al', 'alief@gmail.com', '22db6b9d4434177a4abd28b0c5781f15', 'Madura', 'Laki-Laki', '089217112213', '896786128689', 'KTP-15445232623.png', 'KK3.PNG', 2),
(7, 'Nabila', 'nabila@gmail.com', '652d3266220e0aacb047d3aa6f51f1b0', 'Bandung', 'Perempuan', '089788967123', '275782578222', 'KTP-15445232624.png', 'KK4.PNG', 2),
(14, 'Fulan', 'fulan@gmail.com', '59ee8bd9e54c300ed35f1ead57cfdcf0', 'Bandung', 'Laki-Laki', '08778986664', '32400234843', 'KTP-15445232626.png', 'KK41.PNG', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `fk_id_type` (`id_type`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `fk_pesan` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_customer` (`id_user`),
  ADD KEY `fk_mobil` (`id_mobil`);

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `fk_id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
