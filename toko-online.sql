-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 06:38 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko-online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Dilan Allya Barqi');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 20000),
(2, 'Bandung', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'dilan@gmail.com', 'dilan', 'Dilan Allya Barqi', '08988154880', ''),
(2, 'rishma@gmail.com', 'rishma', 'Rishmawati Rahma Putri', '082211211311', ''),
(5, 'laras@gmail.com', 'laras', 'Laras Nur Dwi Utami', '08988154551', 'Subang'),
(6, 'naruto@gmail.com', 'a', 'Naruto', '0970', 'konoha'),
(7, 'sasuke@gmail.com', 'a', 'Sasuke Uchiha', '088123098762', 'Blok Konohagakure');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(9, 56, 'Dilan Allya Barqi', 'Mandiri', 20020000, '2019-12-27', '20191227121015bajugucci.jpg'),
(10, 56, 'Laras', 'BCA', 20020000, '2019-12-27', '20191227125046A.png'),
(11, 57, 'Tarisma Indri Ardianti', 'BNI', 48620000, '2019-12-27', '20191227132941disel.jpg'),
(12, 58, 'Rishma', 'BCA', 25020000, '2019-12-27', '20191227135406orang.jpg'),
(13, 54, 'Naruto Uzumaki', 'BRI', 3915000, '2019-12-28', '20191228001106disel.jpg'),
(14, 60, 'Rishmawati Rahma Putri', 'MEGA', 32420000, '2019-12-31', '20191231065303lnovo aio.jfif'),
(15, 61, 'Sarada Uchiha', 'Suna Bank', 16200000, '2020-01-05', '20200105134854bluetooth_PNG43.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(52, 1, 2, '2019-12-27', 12015000, 'Bandung', 15000, ' Bandung Lautan Api', 'pending', ''),
(53, 1, 1, '2019-12-27', 16220000, 'Jakarta', 20000, ' Jakarta Kebanjiran', 'pending', ''),
(54, 6, 2, '2019-12-27', 3915000, 'Bandung', 15000, ' Konohagakure', 'barang dikirim', '89182211929281'),
(55, 6, 1, '2019-12-27', 20020000, 'Jakarta', 20000, ' wefsdfsd', 'pending', ''),
(56, 1, 1, '2019-12-27', 20020000, 'Jakarta', 20000, ' Karanganyar ', 'Sudah Kirim Pembayaran', ''),
(57, 1, 1, '2019-12-27', 48620000, 'Jakarta', 20000, ' Bondowoso', 'barang dikirim', 'ABC1234512345'),
(58, 1, 1, '2019-12-27', 25020000, 'Jakarta', 20000, ' Jakarta Utara', 'barang dikirim', '1234567812'),
(59, 6, 1, '2019-12-28', 7220000, 'Jakarta', 20000, ' Konoha Kirigakure', 'pending', ''),
(60, 2, 1, '2019-12-31', 32420000, 'Jakarta', 20000, ' Jalan Merak Raya No 123', 'barang dikirim', 'XX00XX123'),
(61, 7, 0, '2020-01-05', 16200000, '', 0, ' Desa Konohagakure, Rt00/Rw01', 'barang dikirim', 'abc1212312'),
(62, 7, 1, '2020-01-05', 3920000, 'Jakarta', 20000, ' SS', 'pending', ''),
(63, 7, 1, '2020-01-06', 21019999, 'Jakarta', 20000, ' Konoha', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(61, 52, 30, 3, 'LENOVO  330 ', 4000000, 1900, 5700, 12000000),
(62, 53, 25, 1, 'MACBOOK PRO', 16200000, 2100, 2100, 16200000),
(63, 54, 26, 1, 'ASUS A49UA', 3900000, 1900, 1900, 3900000),
(64, 55, 27, 1, 'ASUS ROG', 20000000, 2300, 2300, 20000000),
(65, 56, 27, 1, 'ASUS ROG', 20000000, 2300, 2300, 20000000),
(66, 57, 25, 3, 'MACBOOK PRO', 16200000, 2100, 6300, 48600000),
(67, 58, 31, 1, 'ACER PREDATOR', 25000000, 2400, 2400, 25000000),
(68, 59, 32, 1, 'ACER SWIFT', 7200000, 2000, 2000, 7200000),
(69, 60, 25, 2, 'MACBOOK PRO', 16200000, 2100, 4200, 32400000),
(70, 61, 25, 1, 'MACBOOK PRO', 16200000, 2100, 2100, 16200000),
(71, 62, 26, 1, 'ASUS A49UA', 3900000, 1900, 1900, 3900000),
(72, 63, 28, 1, 'HP ENVY ', 20999999, 2000, 2000, 20999999);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(25, 'MACBOOK PRO', 16200000, 2100, 'H.png', 'MACBOOK', 10),
(26, 'ASUS A49UA', 3900000, 1900, 'acera49u20x20.jpg', 'LAPTOP', 10),
(27, 'ASUS ROG', 20000000, 2300, 'rog20x20.jpg', 'GAMER BUNG', 10),
(28, 'HP ENVY ', 20999999, 2000, 'envy20x20.jpg', 'LAPTOP PREMIUM', 9),
(29, 'LENOVO  S145', 3900999, 1900, 'envy20x20.jpg', 'LAPTOP MURAH', 10),
(30, 'LENOVO  330 ', 4000000, 1900, 'F.png', 'Laptop Anak Kuliah', 10),
(31, 'ACER PREDATOR', 25000000, 2400, 'ACER PREDATOR.png', 'GAMER', 10),
(32, 'ACER SWIFT', 7200000, 2000, 'acerswift.jpg', 'Laptop Slim', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
