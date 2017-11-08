-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 09:20 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegadaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `kota_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_ibu` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `kota_lahir`, `tanggal_lahir`, `pekerjaan`, `ktp`, `hp`, `agama`, `nama_ibu`, `jenis_kelamin`, `id`) VALUES
(1, 'Sekar Elok Larasati', 'Jember', 'Sragen', '1997-11-18', 'Wirausaha', '1928364519', '089273864', 'Katolik', 'Susan', 'Perempuan', 7),
(2, 'Hipolitus Kresna D', 'Jl. Mastrip IV/63 Jember, 68121', 'Jember', '1994-10-12', 'Masinis', '370002387491287', '081336561206', 'Katholik', 'Dwi Sunaryati', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_pinjaman` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_pinjaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah_pinjaman` double NOT NULL,
  `lama_pinjaman` double NOT NULL,
  `bunga_pinjaman` double NOT NULL,
  `angsuran_pokok` double NOT NULL,
  `angsuran_bunga` double NOT NULL,
  `total_angsuran` double NOT NULL,
  `sisa_pinjaman` double NOT NULL,
  `sisa_cicilan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_pinjaman`, `id_customer`, `tanggal_pinjaman`, `jumlah_pinjaman`, `lama_pinjaman`, `bunga_pinjaman`, `angsuran_pokok`, `angsuran_bunga`, `total_angsuran`, `sisa_pinjaman`, `sisa_cicilan`) VALUES
(1, 1, '2017-11-01 19:15:10', 5000000, 10, 1.5, 500000, 75000, 575000, 0, 0),
(2, 1, '2017-11-01 18:11:46', 1500000, 10, 1.5, 150000, 22500, 172500, 1500000, 10),
(3, 2, '2017-11-01 20:03:12', 2000000, 10, 1.5, 200000, 30000, 230000, 2000000, 10),
(4, 1, '2017-11-01 20:14:21', 200000, 1, 1.5, 200000, 3000, 203000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL,
  `nilai_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_kriteria`) VALUES
(1, 'k1,k1', 1),
(2, 'k1,k2', 2),
(3, 'k1,k3', 3),
(4, 'k1,k4', 4),
(5, 'k1,k5', 5),
(6, 'k1,k6', 6),
(7, 'k2,k1', 0.5),
(8, 'k2,k2', 1),
(9, 'k2,k3', 2),
(10, 'k2,k4', 3),
(11, 'k2,k5', 4),
(12, 'k2,k6', 5),
(13, 'k3,k1', 0.33),
(14, 'k3,k2', 0.5),
(15, 'k3,k3', 1),
(16, 'k3,k4', 2),
(17, 'k3,k5', 3),
(18, 'k3,k6', 4),
(19, 'k4,k1', 0.25),
(20, 'k4,k2', 0.33),
(21, 'k4,k3', 0.5),
(22, 'k4,k4', 1),
(23, 'k4,k5', 2),
(24, 'k4,k6', 3),
(25, 'k5,k1', 0.2),
(26, 'k5,k2', 0.25),
(27, 'k5,k3', 0.33),
(28, 'k5,k4', 0.5),
(29, 'k5,k5', 1),
(30, 'k5,k6', 2),
(31, 'k6,k1', 0.17),
(32, 'k6,k2', 0.2),
(33, 'k6,k3', 0.25),
(34, 'k6,k4', 0.33),
(35, 'k6,k5', 0.5),
(36, 'k6,k6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `k_aset`
--

CREATE TABLE `k_aset` (
  `id_aset` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_aset`
--

INSERT INTO `k_aset` (`id_aset`, `nama`) VALUES
(1, 'Sangat Kurang'),
(2, 'Kurang'),
(3, 'Cukup'),
(4, 'Baik'),
(5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `k_kepemilikanrumah`
--

CREATE TABLE `k_kepemilikanrumah` (
  `id_kepemilikan` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_kepemilikanrumah`
--

INSERT INTO `k_kepemilikanrumah` (`id_kepemilikan`, `nama`) VALUES
(1, 'Sangat Kurang'),
(2, 'Kurang'),
(3, 'Cukup'),
(4, 'Baik'),
(5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `k_kondisiusaha`
--

CREATE TABLE `k_kondisiusaha` (
  `id_kondisiusaha` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_kondisiusaha`
--

INSERT INTO `k_kondisiusaha` (`id_kondisiusaha`, `nama`) VALUES
(1, 'Sangat Kurang'),
(2, 'Kurang'),
(3, 'Cukup'),
(4, 'Baik'),
(5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `k_melunasihutang`
--

CREATE TABLE `k_melunasihutang` (
  `id_melunasi` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_melunasihutang`
--

INSERT INTO `k_melunasihutang` (`id_melunasi`, `nama`) VALUES
(1, 'Sangat Kurang'),
(2, 'Kurang'),
(3, 'Cukup'),
(4, 'Baik'),
(5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `k_penghasilan`
--

CREATE TABLE `k_penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_penghasilan`
--

INSERT INTO `k_penghasilan` (`id_penghasilan`, `nama`) VALUES
(1, 'Sangat Kurang'),
(2, 'Kurang'),
(3, 'Cukup'),
(4, 'Baik'),
(5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `k_tanggunganhidup`
--

CREATE TABLE `k_tanggunganhidup` (
  `id_tanggungan` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_tanggunganhidup`
--

INSERT INTO `k_tanggunganhidup` (`id_tanggungan`, `nama`) VALUES
(1, 'Sangat Kurang'),
(2, 'Kurang'),
(3, 'Cukup'),
(4, 'Baik'),
(5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(2, 'tafsir', 'tafsir', 2),
(4, 'bayar', 'bayar', 3),
(7, 'sekar', 'sekar', 1),
(8, 'kresna', 'kresna', 1),
(9, 'ketua', 'ketua', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_sub` int(5) NOT NULL,
  `nama_sub` varchar(20) NOT NULL,
  `nilai_sub` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_sub`, `nama_sub`, `nilai_sub`) VALUES
(1, 'k1,k1', 1),
(2, 'k1,k2', 2),
(3, 'k1,k3', 3),
(4, 'k1,k4', 4),
(5, 'k1,k5', 5),
(6, 'k2,k1', 0.5),
(7, 'k2,k2', 1),
(8, 'k2,k3', 2),
(9, 'k2,k4', 3),
(10, 'k2,k5', 4),
(11, 'k3,k1', 0.33),
(12, 'k3,k2', 0.5),
(13, 'k3,k3', 1),
(14, 'k3,k4', 2),
(15, 'k3,k5', 3),
(16, 'k4,k1', 0.25),
(17, 'k4,k2', 0.33),
(18, 'k4,k3', 0.5),
(19, 'k4,k4', 1),
(20, 'k4,k5', 2),
(21, 'k5,k1', 0.2),
(22, 'k5,k2', 0.25),
(23, 'k5,k3', 0.33),
(24, 'k5,k4', 0.5),
(25, 'k5,k5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tafsir`
--

CREATE TABLE `tafsir` (
  `id_tafsir` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_penghasilan` int(11) NOT NULL,
  `id_kondisiusaha` int(11) NOT NULL,
  `id_melunasi` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `id_tanggungan` int(11) NOT NULL,
  `id_kepemilikan` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `nilai_barang` double NOT NULL,
  `maks_pinjaman` double NOT NULL,
  `maks_nilai` double NOT NULL,
  `nilai_ahp` double NOT NULL,
  `status` int(2) NOT NULL,
  `tanggal_tafsir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tafsir`
--

INSERT INTO `tafsir` (`id_tafsir`, `id_customer`, `id_penghasilan`, `id_kondisiusaha`, `id_melunasi`, `id_aset`, `id_tanggungan`, `id_kepemilikan`, `nama_barang`, `nilai_barang`, `maks_pinjaman`, `maks_nilai`, `nilai_ahp`, `status`, `tanggal_tafsir`) VALUES
(1, 1, 5, 5, 5, 4, 5, 5, 'BPKB', 7000000, 0.85, 5000000, 0.41, 2, '2017-11-02'),
(2, 1, 2, 3, 2, 2, 5, 4, 'Emas', 2000000, 0.75, 1500000, 0.15, 2, '2017-11-02'),
(3, 2, 1, 2, 3, 2, 4, 3, 'BPKB', 4500000, 0.75, 3375000, 0.11, 9, '2017-11-02'),
(4, 2, 3, 2, 2, 3, 4, 2, 'bpjb', 5000000, 0.75, 3750000, 0.14, 2, '2017-11-02'),
(5, 1, 2, 3, 2, 2, 4, 5, 'emas', 2000000, 0.75, 1500000, 0.15, 2, '2017-11-02'),
(6, 2, 4, 1, 1, 3, 4, 3, 'emas', 1000000, 0.8, 800000, 0.17, 1, '2017-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `angsuran_bunga` double NOT NULL,
  `angsuran_pokok` double NOT NULL,
  `angsuran_total` double NOT NULL,
  `sisa_pinjaman` double NOT NULL,
  `angsuran_ke` double NOT NULL,
  `pembayaran` double NOT NULL,
  `administrasi` double NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pinjaman`, `angsuran_bunga`, `angsuran_pokok`, `angsuran_total`, `sisa_pinjaman`, `angsuran_ke`, `pembayaran`, `administrasi`, `tanggal_transaksi`) VALUES
(1, 1, 75000, 500000, 575000, 4500000, 1, 576500, 1500, '2017-11-01 17:12:23'),
(2, 1, 75000, 500000, 575000, 4000000, 2, 576500, 1500, '2017-11-01 19:14:40'),
(3, 1, 75000, 500000, 575000, 3500000, 3, 576500, 1500, '2017-11-01 19:14:45'),
(4, 1, 75000, 500000, 575000, 3000000, 4, 576500, 1500, '2017-11-01 19:14:49'),
(5, 1, 75000, 500000, 575000, 2500000, 5, 576500, 1500, '2017-11-01 19:14:53'),
(6, 1, 75000, 500000, 575000, 2000000, 6, 576500, 1500, '2017-11-01 19:14:56'),
(7, 1, 75000, 500000, 575000, 1500000, 7, 576500, 1500, '2017-11-01 19:14:59'),
(8, 1, 75000, 500000, 575000, 1000000, 8, 576500, 1500, '2017-11-01 19:15:03'),
(9, 1, 75000, 500000, 575000, 500000, 9, 576500, 1500, '2017-11-01 19:15:06'),
(10, 1, 75000, 500000, 575000, 0, 10, 576500, 1500, '2017-11-01 19:15:10'),
(11, 4, 3000, 200000, 203000, 0, 1, 204500, 1500, '2017-11-01 20:14:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `k_aset`
--
ALTER TABLE `k_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `k_kepemilikanrumah`
--
ALTER TABLE `k_kepemilikanrumah`
  ADD PRIMARY KEY (`id_kepemilikan`);

--
-- Indexes for table `k_kondisiusaha`
--
ALTER TABLE `k_kondisiusaha`
  ADD PRIMARY KEY (`id_kondisiusaha`);

--
-- Indexes for table `k_melunasihutang`
--
ALTER TABLE `k_melunasihutang`
  ADD PRIMARY KEY (`id_melunasi`);

--
-- Indexes for table `k_penghasilan`
--
ALTER TABLE `k_penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `k_tanggunganhidup`
--
ALTER TABLE `k_tanggunganhidup`
  ADD PRIMARY KEY (`id_tanggungan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tafsir`
--
ALTER TABLE `tafsir`
  ADD PRIMARY KEY (`id_tafsir`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_melunasi` (`id_melunasi`),
  ADD KEY `id_kondisiusaha` (`id_kondisiusaha`),
  ADD KEY `id_penghasilan` (`id_penghasilan`),
  ADD KEY `id_aset` (`id_aset`),
  ADD KEY `id_tanggungan` (`id_tanggungan`),
  ADD KEY `id_kepemilikan` (`id_kepemilikan`),
  ADD KEY `id_penghasilan_2` (`id_penghasilan`),
  ADD KEY `id_kondisiusaha_2` (`id_kondisiusaha`),
  ADD KEY `id_melunasi_2` (`id_melunasi`),
  ADD KEY `id_aset_2` (`id_aset`,`id_tanggungan`,`id_kepemilikan`),
  ADD KEY `id_tanggungan_2` (`id_tanggungan`),
  ADD KEY `id_aset_3` (`id_aset`,`id_tanggungan`,`id_kepemilikan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `k_aset`
--
ALTER TABLE `k_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `k_kepemilikanrumah`
--
ALTER TABLE `k_kepemilikanrumah`
  MODIFY `id_kepemilikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `k_kondisiusaha`
--
ALTER TABLE `k_kondisiusaha`
  MODIFY `id_kondisiusaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `k_melunasihutang`
--
ALTER TABLE `k_melunasihutang`
  MODIFY `id_melunasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `k_penghasilan`
--
ALTER TABLE `k_penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `k_tanggunganhidup`
--
ALTER TABLE `k_tanggunganhidup`
  MODIFY `id_tanggungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_sub` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tafsir`
--
ALTER TABLE `tafsir`
  MODIFY `id_tafsir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `hutang_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tafsir`
--
ALTER TABLE `tafsir`
  ADD CONSTRAINT `tafsir_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tafsir_ibfk_2` FOREIGN KEY (`id_penghasilan`) REFERENCES `k_penghasilan` (`id_penghasilan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tafsir_ibfk_3` FOREIGN KEY (`id_tanggungan`) REFERENCES `k_tanggunganhidup` (`id_tanggungan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tafsir_ibfk_4` FOREIGN KEY (`id_melunasi`) REFERENCES `k_melunasihutang` (`id_melunasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tafsir_ibfk_5` FOREIGN KEY (`id_aset`) REFERENCES `k_aset` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tafsir_ibfk_6` FOREIGN KEY (`id_kondisiusaha`) REFERENCES `k_kondisiusaha` (`id_kondisiusaha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tafsir_ibfk_7` FOREIGN KEY (`id_kepemilikan`) REFERENCES `k_kepemilikanrumah` (`id_kepemilikan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
