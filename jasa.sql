-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 06:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `nama`, `email`, `pesan`) VALUES
(1, 'nunu', 'nunu@gmail.com', 'akun saya tidak bisa login'),
(2, 'ayam', 'ayam2@gmail.com', 'Proklamasi Kemerdekaan Indonesia dilaksanakan pada hari Jumat, 17 Agustus 1945.\r\n'),
(3, 'aku', 'aku@gmail.com', 'ingin turu.');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `nama_jasa` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jadwal` text NOT NULL,
  `informasi` text NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `id_mitra`, `id_kategori`, `nama_usaha`, `nama_jasa`, `harga`, `jadwal`, `informasi`, `keterangan`, `latitude`, `longitude`, `foto`, `status`) VALUES
(1, 3, 1, 'Slyth Services', 'Service AC dan TV', '50000', 'Anytime ', 'Memperbaiki alat elektronik ac dan tv yang sudah lelah tapi ingin bertahan\r\n', 'Dapat dipanggil', '-7.4231158', '109.3391084', 'layanan1574668730(1).jpg-layanan1574668730(2).jpg-layanan1574668730(3).jpeg-layanan1574668730(4).jpg', 1),
(2, 3, 1, 'Slyth Services', 'Service Mesin Cuci', '100000', 'Anytime anywhere', 'Memperbaiki mesin cuci yang ambyar tapi tidak barbar', 'Dapat dipanggil', '-7.4230427', '109.3396663', 'layanan1575866416(1).jpeg-layanan1575866617(2).png-layanan1575866593(3).jpg-layanan1575866578(4).jpg', 1),
(20, 5, 5, 'Nunu Barber ', 'Cukur Rambut', '15000', 'Buka setiap hari', 'Cukur rambut untuk pria dan wanita mulai dari anak-anak sampai dewasa', 'Hanya di tempat', '-7.3058578', '109.42591140000002', 'layanan1576465137(1).png-layanan1576465137(2).png-layanan1576465137(3).png-layanan1576465137(4).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_jasa`
--

CREATE TABLE `kategori_jasa` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_jasa`
--

INSERT INTO `kategori_jasa` (`id_kategori`, `nama_kategori`, `deskripsi`, `foto`) VALUES
(1, 'Perbaikan Elektronik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'alat.png'),
(2, 'Perbaikan Kendaraan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'kendara.png'),
(3, 'Pemeliharaan Rumah', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'imah.jpg'),
(4, 'Pijat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'massage.png'),
(5, 'Cukur & Kecantikan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cukurcakep.jpg'),
(6, 'Laundry', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'laundry.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `fotoktp` varchar(255) NOT NULL,
  `verifikasi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `id_pengguna`, `nama_lengkap`, `no_ktp`, `jk`, `status`, `alamat`, `foto`, `fotoktp`, `verifikasi`) VALUES
(1, 2, 'Nurul Ismailiah', '0987654323546', 'Perempuan', 'Belum Menikah', 'Jalan Pulang', 'profil_1575025613.jpg', 'ktp_1574650670.jpeg', 1),
(3, 37, 'Nurul Ismailiah', '87896615210001', 'Perempuan', 'Sudah Menikah', 'Tepat di hadapanmu ini\r\n', 'profil_1575717428.png', 'ktp_1575717428.jpg', 1),
(4, 49, 'Gaara', '98347108471293', 'Laki-laki', 'Belum Menikah', ' 221B Baker Street', 'profil_1575199300.jpg', 'ktp_1575199300.jpg', 1),
(5, 51, 'Nurul b', '982171918', 'Perempuan', 'Belum Menikah', 'di rumah', 'profil_1576464597.jpg', 'ktp_1576464597.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `no_handphone`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '6298712345678', 'admin@gmail.com', '1'),
(3, 'gira', 'c96c3c9ce398224502bb4ed43a71640b', '6298712345678', 'gira@gmail.com', '2'),
(37, 'nunu', '2f8c3ab806a42e79c774cb09b41a53c8', '6285736687801', 'nunu@gmail.com', '3'),
(48, 'hanipeh', '77df6ecf62932e95517d08cf79af1440', '6298781234432', 'hanipeh@gmail.com', '2'),
(49, 'gara', '04b7aaeab58d4c6507e86a90250694af', '6212356789013', 'gara@gmail.com', '3'),
(51, 'nurul', '6968a2c57c3a4fee8fadc79a80355e4d', '6285736687801', 'nunudegira@gmail.com', '3');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `rating` varchar(10) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_pesanan`, `waktu`, `rating`, `komentar`) VALUES
(1, 3, '2019-11-28 19:37:24', '5', 'layanan baik, pengerjaan baik, hasil memuaskan, cekatan'),
(2, 3, '2019-11-29 21:37:24', '4', 'mantul bos'),
(3, 7, '2019-11-29 23:55:45', '3', 'hasil pengerjaan kurang baik'),
(4, 5, '2019-12-08 18:51:45', '5', 'hasil pengerjaan memuaskan, cekatan, pelayanan baik\r\n'),
(5, 31, '2019-12-09 12:17:50', '4', 'mantul bosssss'),
(6, 33, '2019-12-16 10:13:03', '5', 'mantul bos');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_jasa` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pengguna`, `id_jasa`, `waktu`, `tanggal`, `no_handphone`, `status`) VALUES
(1, 3, 1, '10:00:00', '2019-11-28', '098712345678', 'Selesai'),
(2, 3, 1, '12:30:00', '2019-11-28', '098712345678', 'Ditolak'),
(5, 48, 1, '10:00:00', '2019-11-29', '0987812344321', 'Selesai'),
(7, 3, 2, '17:26:00', '2019-11-29', '098712345678', 'Selesai'),
(29, 3, 1, '09:12:00', '2019-12-07', '6298712345678', 'Dipesan'),
(31, 3, 1, '10:00:00', '2019-12-10', '6298712345678', 'Selesai'),
(32, 3, 1, '09:00:00', '2019-12-09', '6298712345678', 'Dipesan'),
(33, 3, 20, '10:00:00', '2019-12-17', '6298712345678', 'Selesai'),
(34, 3, 20, '04:05:00', '2019-12-16', '6298712345678', 'Selesai'),
(35, 37, 1, '07:33:00', '2020-11-09', '6285736687801', 'Dipesan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `kategori_jasa`
--
ALTER TABLE `kategori_jasa`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori_jasa`
--
ALTER TABLE `kategori_jasa`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
