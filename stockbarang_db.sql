-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2023 at 01:48 PM
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
  `tglpembelian` date NOT NULL,
  `asal` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nopabrik` varchar(25) NOT NULL,
  `norangka` varchar(25) NOT NULL,
  `nomesin` varchar(25) NOT NULL,
  `nopolisi` varchar(25) NOT NULL,
  `bpkb` varchar(25) NOT NULL,
  `kondisi` varchar(25) NOT NULL,
  `keteranganlainnya` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asetlainlain`
--

CREATE TABLE `asetlainlain` (
  `noall` int(11) NOT NULL,
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
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(1, 1, '2023-06-30 15:39:52', 'adi', 5),
(2, 10, '2023-07-02 03:42:31', 'adi', 10),
(3, 10, '2023-07-02 04:34:48', 'sdf', 20),
(5, 11, '2023-07-02 08:51:06', 'adi', 10),
(7, 11, '2023-07-02 10:52:56', 'ali', 5);

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
-- Table structure for table `konstruksi`
--

CREATE TABLE `konstruksi` (
  `nokonstruksi` int(11) NOT NULL,
  `namalamebaga` varchar(50) NOT NULL,
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
(4, 'im@gmail.com', '1234', 'admin'),
(5, 'as@gmail.com', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(1, 1, '2023-06-30 14:38:21', 'as', 100),
(2, 1, '2023-06-30 14:52:20', 'ali', 9),
(3, 1, '2023-06-30 14:53:04', 'adi', 9),
(5, 3, '2023-06-30 15:11:17', 'adi', 10),
(6, 3, '2023-06-30 15:25:55', '', 5),
(7, 1, '2023-06-30 15:30:47', 'adi', 11),
(8, 1, '2023-06-30 15:33:45', 'popo', 10),
(10, 1, '2023-07-01 12:55:22', 'sdf', 10),
(15, 8, '2023-07-01 14:24:10', 'popo', 10),
(20, 10, '2023-07-02 03:27:21', 'popo', 50),
(22, 11, '2023-07-02 04:38:51', 'adi', 100),
(24, 12, '2023-07-02 09:33:32', 'adi', 10);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(25) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `namalembaga` varchar(50) NOT NULL,
  `namaaset` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`, `image`, `namalembaga`, `namaaset`) VALUES
(11, 'kursi mer', 'bekas', 105, NULL, 'sad', 'cxa'),
(12, 'sofa', 'baru', 10, NULL, '', ''),
(14, 'rak besi', 'baru', 0, NULL, '', ''),
(15, 'rak plastik', 'baru', 0, NULL, '', ''),
(16, 'komputer', 'bekas', 0, NULL, '', ''),
(17, 'karpet', 'baru', 0, NULL, '', ''),
(18, 'pot', 'baru', 0, NULL, '', ''),
(19, 'sandal', 'baru', 0, NULL, '', ''),
(20, 'kipas', 'baru', 0, NULL, '', ''),
(21, 'tv', 'baru', 0, NULL, '', ''),
(22, 'meja', 'baru', 0, NULL, '', ''),
(23, 'jam', 'baru', 0, NULL, '', ''),
(25, 'monyet', 'hewan', 0, NULL, '', ''),
(26, 'wahyu', 'hewan', 10, 'monyet.jpg', '', ''),
(27, 'gajah', 'hewan', 10, '', '', ''),
(28, 'gajah12', 'rusak', 10, 'monyet.jpg', '', ''),
(29, 'qwed', 'baru', 10, 'monyet.jpg', '', ''),
(30, 'kursi merah banget', 'baru', 10, '', '', ''),
(31, 'lok', 'lok', 5, 'monyet.jpg', '', ''),
(32, 'mkl', 'mlk', 1, 'WhatsApp Image 2023-02-15 at 14.39.19.jpeg', '', ''),
(33, 'vee', 'dsv', 10, 'uploads/WhatsApp Image 2023-02-15 at 14.39.19.jpeg', '', ''),
(34, 'fgsd', 'rge', 34, NULL, 'dsv', 'sdvc'),
(35, 'xcasdfv', 'xcv', 324, NULL, '', ''),
(36, '2rw', '', 234, NULL, 'wqe', '');

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
(1, 'colon', 'caszxczx', 'acs', '123', 'asd', '324234      ', 234, 98, '098', '2023-07-12', '098', '90809', '89i98', '9090', '2023-07-13', NULL),
(2, 'sadz', 'jn', 'jhn', '89', '897', '87', 78, 7856, '98', '8997-08-09', 'jb', 'njkug', 'hbh', '897', '2000-08-09', NULL),
(4, 'lolo', 'ahjbc', 'kjb', 'jk', 'njk', 'ih', 9, 67, 'bhjb', '2023-07-13', 'kj', 'jn', 'jnnk', 'lnl', '2023-07-13', NULL);

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
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

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
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

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
  MODIFY `idadm` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `nogb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `idjalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tanah`
--
ALTER TABLE `tanah`
  MODIFY `idtanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
