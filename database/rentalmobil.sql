-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2020 pada 01.51
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
  `denda` int(11) NOT NULL,
  `ac` int(11) DEFAULT NULL,
  `supir` int(11) DEFAULT NULL,
  `audio_player` int(11) DEFAULT NULL,
  `central_lock` int(11) DEFAULT NULL,
  `status_mobil` int(11) NOT NULL COMMENT '0. kosong, 1. tersedia',
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_type`, `merk`, `no_plat`, `warna`, `tahun`, `harga`, `denda`, `ac`, `supir`, `audio_player`, `central_lock`, `status_mobil`, `gambar`) VALUES
(1, 1, 'Suzuki Ciaz White', 'N 1985 RTF', 'Putih', '2019', 700000, 35000, 1, 1, 1, NULL, 1, 'mobil-suzuki-ciaz1.jpg'),
(2, 1, 'Suzuki Ciaz Brown', 'N 6758 AW', 'Cokelat', '2017', 600000, 30000, 1, NULL, 1, 1, 1, 'Suzuki-Ciaz.jpg'),
(3, 2, 'Suzuki Ertiga', 'N 1985 NK', 'Merah', '2018', 400000, 20000, 1, NULL, NULL, 1, 0, 'Suzuki-All-new-Ertiga-2018-Warna-merah-Pearl-Radiant-Red.jpg'),
(4, 1, 'Honda Civic', 'N 9547 HUY', 'Silver', '2014', 700000, 35000, 1, 1, 1, NULL, 0, 'slider-img-2.jpg'),
(5, 3, 'BMW 1500', 'N 1456 DAG', 'Biru', '2015', 900000, 45000, 1, 1, 1, 1, 1, 'car-3.jpg'),
(6, 3, 'BMW 177', 'N 1234 CAH', 'Biru', '2019', 900000, 45000, 1, 1, 1, 1, 1, 'car-2.jpg'),
(7, 3, 'BMW 577', 'N 4321 DB', 'Kuning', '2018', 600000, 30000, 1, 1, NULL, 1, 1, 'car-6.jpg'),
(8, 3, 'BMW 115', 'N 2707 GG', 'Merah', '2017', 400000, 20000, 1, NULL, 1, NULL, 0, 'car-4.jpg'),
(9, 2, 'Datsun Cross', 'N 5678 CV', 'Emas', '2017', 800000, 40000, 1, 1, 1, 1, 1, 'datsun_go_cross.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `subjek` varchar(30) DEFAULT NULL,
  `isi_pesan` longtext DEFAULT NULL,
  `tgl_posting` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL COMMENT '0. belum dibaca, 1. sudah dibaca'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `subjek`, `isi_pesan`, `tgl_posting`, `status`) VALUES
(1, 2, 'Salam', 'Bismillah.. Assalamu\'alaikum akhy :)', '2020-04-09 11:36:01', 0),
(2, 4, 'Salam', 'Bismillah.. Assalamu\'alaikum, anta sehat? :)', '2020-04-09 12:05:23', 1),
(3, 6, 'Batal Sewa', 'Bismillah.. Assalamu\'alaikum.. Maaf ya kak saya batalkan penyewaannya hihi..', '2020-05-05 02:19:44', 0),
(4, 7, 'Testimoni', 'Bismillah.. MasyaaAllah cepat banget responnya, Barakallahu fiik :)', '2020-05-09 16:54:21', 0);

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
  `tanggal_pengembalian` date DEFAULT NULL,
  `total_sewa` int(11) NOT NULL,
  `total_denda` int(11) NOT NULL,
  `pickup` int(11) NOT NULL COMMENT '0. ambil sendiri, 1. pickup sesuai alamat',
  `status` int(1) NOT NULL COMMENT '0. batal, 1. disewa, 2. selesai',
  `status_pembayaran` int(1) NOT NULL COMMENT '0. belum dibayar, 1. menunggu konfirmasi, 2. sudah dibayar, 3. batal',
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_mobil`, `tanggal_sewa`, `tanggal_kembali`, `tanggal_pengembalian`, `total_sewa`, `total_denda`, `pickup`, `status`, `status_pembayaran`, `bukti_pembayaran`) VALUES
(1, 1, 1, '2020-02-20', '2020-02-22', '2020-02-22', 1400000, 0, 0, 2, 2, 'Screenshot_121.jpg'),
(2, 3, 2, '2020-02-06', '2020-02-08', '2020-02-10', 1200000, 60000, 0, 2, 2, 'IMG-20190914-WA00071.jpeg'),
(3, 3, 3, '2020-02-27', '2020-02-29', '2020-03-03', 800000, 60000, 0, 2, 2, 'Screenshot_12.jpg'),
(4, 4, 2, '2020-03-25', '2020-03-31', '2020-04-02', 3600000, 60000, 1, 2, 2, 'WhatsApp_Image_2020-03-14_at_12_44_18_PM.jpeg'),
(5, 1, 4, '2020-04-01', '2020-04-16', '2020-04-16', 10500000, 0, 1, 2, 2, 'IMG-20190914-WA0007.jpeg'),
(6, 4, 4, '2020-04-01', '2020-04-02', '0000-00-00', 1400000, 0, 1, 1, 2, 'Screenshot_122.jpg'),
(7, 2, 3, '2020-04-17', '2020-04-18', '0000-00-00', 400000, 0, 1, 1, 0, ''),
(8, 6, 5, '2020-05-05', '2020-05-07', NULL, 1800000, 0, 1, 0, 3, ''),
(9, 5, 8, '2020-05-07', '2020-05-09', NULL, 800000, 0, 0, 1, 1, 'photo6167767273113233753.jpg'),
(10, 5, 6, '2020-05-10', '2020-05-13', '2020-05-15', 2700000, 90000, 0, 2, 2, 'Screenshot_1221.jpg'),
(11, 7, 9, '2020-05-09', '2020-05-11', '2020-05-11', 1600000, 0, 1, 2, 2, 'Screenshot_123.jpg');

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
(2, 'HB', 'Hatchback'),
(3, 'SPR', 'Sport');

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
(1, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Malang', 'Laki-laki', '085334424941', '213123123112', 'KTP-1544523262.png', 'KK.PNG', 1),
(2, 'Lathifa Firdauzi', 'lathifa@gmail.com', '401e8eb287e4700453792a5e57490d70', 'Surabaya', 'Perempuan', '085727287289', '123213123', 'KTP-15445232621.png', 'KK1.PNG', 2),
(3, 'Alief Al', 'alief@gmail.com', '22db6b9d4434177a4abd28b0c5781f15', 'Madura', 'Laki-laki', '089217112213', '896786128689', 'KTP-15445232623.png', 'KK3.PNG', 2),
(4, 'Nabila', 'nabila@gmail.com', '652d3266220e0aacb047d3aa6f51f1b0', 'Bandung', 'Perempuan', '089788967123', '275782578222', 'KTP-15445232624.png', 'KK4.PNG', 2),
(5, 'Fulan', 'fulan@gmail.com', '59ee8bd9e54c300ed35f1ead57cfdcf0', 'Bandung', 'Laki-laki', '087789866648', '32400234843', 'KTP-15445232626.png', 'KK41.PNG', 2),
(6, 'Aisyah', 'aisyah@gmail.com', '26bb533df5747c7a3f2a9cc48a8cf3ee', 'Cimahi', 'Perempuan', '081334456723', '12313221489', 'KTP-154452326261.png', 'KK42.PNG', 2),
(7, 'Arra', 'arra@gmail.com', '87da199e93f0644fa7df307c80152afb', 'SulTeng', 'Perempuan', '089654478906', '423513224339', 'KTP-15445232627.png', 'KK11.PNG', 2),
(8, 'Abdullah', 'abdul@gmail.com', '82027888c5bb8fc395411cb6804a066c', 'Riyadh', 'Laki-laki', '081233467893', '334456927048', 'KTP-154452326271.png', 'KK421.PNG', 2);

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
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `fk_id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
