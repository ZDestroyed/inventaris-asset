-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2023 at 06:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alatmesin`
--

CREATE TABLE `alatmesin` (
  `idadm` int(11) NOT NULL,
  `namalembaga` varchar(25) NOT NULL,
  `namaaset` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(25) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `ukuran` varchar(25) NOT NULL,
  `bahan` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `asal` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nopabrik` varchar(25) NOT NULL,
  `norangka` varchar(25) NOT NULL,
  `nomesin` varchar(25) NOT NULL,
  `nopolisi` varchar(25) NOT NULL,
  `bpkb` varchar(25) NOT NULL,
  `kondisi` varchar(25) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `keteranganlainnya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alatmesin`
--

INSERT INTO `alatmesin` (`idadm`, `namalembaga`, `namaaset`, `keterangan`, `kodebarang`, `golongan4`, `merk`, `type`, `ukuran`, `bahan`, `tanggal`, `asal`, `jumlah`, `harga`, `nopabrik`, `norangka`, `nomesin`, `nopolisi`, `bpkb`, `kondisi`, `image`, `keteranganlainnya`) VALUES
(1, 'asc', 'cas', 'acs', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '2023-07-19', 'asd', 234, 234, 'zxc', 'sd', 'xvxc', 'xcv', 'xcv', 'xcv', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `asetlainlain`
--

CREATE TABLE `asetlainlain` (
  `idall` int(11) NOT NULL,
  `namalembaga` varchar(50) NOT NULL,
  `namaaset` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `luas` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `titikkoor` varchar(50) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `keteranganlainnya` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asettetaplain`
--

CREATE TABLE `asettetaplain` (
  `idatl` int(11) NOT NULL,
  `namalembaga` varchar(50) NOT NULL,
  `namaaset` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `penciptabuku` varchar(50) NOT NULL,
  `asalbarang` varchar(50) NOT NULL,
  `penciptabarang` varchar(50) NOT NULL,
  `bahanbarang` varchar(50) NOT NULL,
  `jenishewan` varchar(50) NOT NULL,
  `ukuranhewan` varchar(50) NOT NULL,
  `asetluas` varchar(50) NOT NULL,
  `asetalamat` varchar(50) NOT NULL,
  `asettitik` varchar(50) NOT NULL,
  `asetketerangan` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `keteranganlainnya` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asettidakberwujud`
--

CREATE TABLE `asettidakberwujud` (
  `noatb` int(11) NOT NULL,
  `namalembaga` varchar(50) NOT NULL,
  `namaaset` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `tanggalkontrak` date NOT NULL,
  `tanggalakhirkontrak` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keteranganlainnya` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gedungbangunan`
--

CREATE TABLE `gedungbangunan` (
  `nogb` int(11) NOT NULL,
  `namalembaga` varchar(40) NOT NULL,
  `namaaset` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(25) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `luas` varchar(25) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `titikkoor` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `beton` varchar(20) NOT NULL,
  `keteranganlainnya` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gedungbangunan`
--

INSERT INTO `gedungbangunan` (`nogb`, `namalembaga`, `namaaset`, `keterangan`, `kodebarang`, `golongan4`, `luas`, `alamat`, `titikkoor`, `tanggal`, `asal`, `jumlah`, `harga`, `kondisi`, `tingkat`, `beton`, `keteranganlainnya`, `image`) VALUES
(1, 'zxc', 'cas', 'acs', 'wd', 'sdf', 'sdfg', 'vs', 'sdf', '2023-07-25', 'sdf ', 23, 234, 'sf ', 'sdf', 'sdf', 'sdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE `jalan` (
  `idjalan` int(11) NOT NULL,
  `namalembaga` varchar(50) NOT NULL,
  `namaaset` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `luas` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `keteranganlainnya` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kemitraan`
--

CREATE TABLE `kemitraan` (
  `idkemitraan` int(11) NOT NULL,
  `namalembaga` varchar(50) NOT NULL,
  `namaaset` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `luas` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `titikkoor` varchar(50) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `keteranganlainnya` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kode108`
--

CREATE TABLE `kode108` (
  `id108` int(11) NOT NULL,
  `akun` int(11) NOT NULL,
  `kelompok` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `objek` int(11) NOT NULL,
  `rincian` int(11) NOT NULL,
  `subrincian` int(11) NOT NULL,
  `subsubrincian` int(11) NOT NULL,
  `kode108` int(11) NOT NULL,
  `lv5` varchar(50) NOT NULL,
  `lv4` varchar(50) NOT NULL,
  `lv3` varchar(50) NOT NULL,
  `lv2` varchar(50) NOT NULL,
  `lv1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konstruksi`
--

CREATE TABLE `konstruksi` (
  `nokonstruksi` int(11) NOT NULL,
  `namalembaga` varchar(50) NOT NULL,
  `namaaset` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `luas` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `titikkoor` varchar(50) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `keteranganlainnya` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin'),
(2, 'log@gmail.com', '123', 'user'),
(4, 'im@gmail.com', '12345', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tanah`
--

CREATE TABLE `tanah` (
  `idtanah` int(11) NOT NULL,
  `namalembaga` varchar(25) NOT NULL,
  `namaaset` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `golongan4` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `luas` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `penggunaan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `thak` varchar(25) NOT NULL,
  `tnomor` varchar(11) NOT NULL,
  `tanggalditerbitkan` date NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanah`
--

INSERT INTO `tanah` (`idtanah`, `namalembaga`, `namaaset`, `keterangan`, `kodebarang`, `golongan4`, `asal`, `jumlah`, `harga`, `luas`, `tanggal`, `penggunaan`, `alamat`, `thak`, `tnomor`, `tanggalditerbitkan`, `image`) VALUES
(1, 'colon', 'caszxczx', 'acs', '123', 'asd', '324234       ', 234, 98, '098', '2023-07-12', '098', '90809', '89i98', '9090', '2023-07-20', '930821090fab63a237cd755e6e680ed5.jpg'),
(2, 'zoad', 'jnlkm', 'jhn', '89', '897', '87   ', 78, 7856, '98', '8997-08-09', 'jb', 'njkug', 'hbh', '897', '2023-07-22', '87c62ebfef3ad37ccbcd6cdd3011046a.'),
(4, 'lolo', 'ahjbc', 'kjb', 'jk', 'njk', 'ih', 9, 67, 'bhjb', '2023-07-13', 'kj', 'jn', 'jnnk', 'lnl', '2023-07-13', '87d9d718ef18dc47998128c59c420375.jpg'),
(5, 'zxcvasc', 'jbkjkug', 'as', 'jk', 'n', 'bnkj ', 89, 989, '78', '2023-07-17', 'bhu', 'jbh', 'jkb', '234', '2023-07-17', '28ebe6756128dca71d6080431ad8b2a5.'),
(6, 'ascadsadsa', 'jn', 'assd', '90', 'sdf', 'dsvc', 9, 98000, '345', '2023-07-18', 'bjk', 'ubij', 'jb', '897', '2023-07-20', '400fb6e41332be23c9f48fdd91226ea9.jpg'),
(7, 'lamda', 'asui', 'adis', '97998', 'jkn', 'bnkj', 89, 68888, '786', '2023-07-20', 'jb', 'bjhb', 'jbm', 'lnl', '2023-07-19', '4037ef44e73e3fb73e77c36a49ba52eb.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alatmesin`
--
ALTER TABLE `alatmesin`
  ADD PRIMARY KEY (`idadm`);

--
-- Indexes for table `asettetaplain`
--
ALTER TABLE `asettetaplain`
  ADD PRIMARY KEY (`idatl`);

--
-- Indexes for table `asettidakberwujud`
--
ALTER TABLE `asettidakberwujud`
  ADD PRIMARY KEY (`noatb`);

--
-- Indexes for table `gedungbangunan`
--
ALTER TABLE `gedungbangunan`
  ADD PRIMARY KEY (`nogb`);

--
-- Indexes for table `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`idjalan`);

--
-- Indexes for table `kode108`
--
ALTER TABLE `kode108`
  ADD PRIMARY KEY (`id108`);

--
-- Indexes for table `konstruksi`
--
ALTER TABLE `konstruksi`
  ADD PRIMARY KEY (`nokonstruksi`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`idtanah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alatmesin`
--
ALTER TABLE `alatmesin`
  MODIFY `idadm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asettetaplain`
--
ALTER TABLE `asettetaplain`
  MODIFY `idatl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asettidakberwujud`
--
ALTER TABLE `asettidakberwujud`
  MODIFY `noatb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedungbangunan`
--
ALTER TABLE `gedungbangunan`
  MODIFY `nogb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `idjalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kode108`
--
ALTER TABLE `kode108`
  MODIFY `id108` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konstruksi`
--
ALTER TABLE `konstruksi`
  MODIFY `nokonstruksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tanah`
--
ALTER TABLE `tanah`
  MODIFY `idtanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
