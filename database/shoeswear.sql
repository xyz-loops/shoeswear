-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 12:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoeswear`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `kuantiti` int(11) NOT NULL,
  `gambar` varchar(191) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_produk`, `nama`, `harga`, `kuantiti`, `gambar`, `kategori`, `total`) VALUES
(1, 1, 64, 'CPU Fan Water Cooler Blue', 1760000, 1, '2121010131311612084289fanwatercooler.jfif', 'Komputer', 1760000),
(14, 1, 76, 'NIKE AIR MAX FLYKNIT RACER-GHOST GREEN/BLACK-PINK ', 2489000, 5, 'nike 4 (4).png', 'Nike', 2489000),
(19, 1, 80, 'ADIDAS YELLOW NEW', 2890000, 1, '2222121212121670816023Untitled.png', 'Adidas', 2890000),
(23, 10, 79, 'PUMA SLIPSTREAM LUX PUMA WHITE-MARSHMALLOW', 1699000, 1, 'puma 3 (4).png', 'Puma', 1699000);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tentang` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `tentang`, `pesan`, `tgl`) VALUES
(1, 'Bayu Pamungkas Ganteng', 'bayu@gmail.com', 'komputer bagus', 'saya membeli komputer bagus tapi kok murah ya', '2021-02-01 06:00:00'),
(2, 'bayu', 'bayhekasiap@gmail.com', 'Ponsel', 'Ponsel yang anda jual kenapa bagus abgus banget terus kenapa murah banget jadi penasaran ponsel asli apa HDC', '2021-02-01 05:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nominal` int(20) NOT NULL,
  `gambar` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesan`, `nama`, `nominal`, `gambar`) VALUES
(3, '1219061106', 'Bayu Pamungkas', 9000000, '1171632372-2021-01-31-09-25-26-lenovoyoga.jpg'),
(4, '184795202', 'Bayu Pamungkas', 6760000, '1044008663-2021-02-01-04-45-52-Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg'),
(5, '1455538211', 'bayu', 62990000, '1688404207-2021-02-01-04-55-04-Bukti-Transfer-BRI-Terbaru-dan-Terlengkap.jpg'),
(6, '396742917', 'v', 1390000, '625628636-2022-12-12-05-42-27-Marcelinus Fajar Cahyadi_2.png'),
(7, '1448482122', 'asd', 2300000, '1133631227-2023-12-18-11-31-20-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_produk`, `jual`) VALUES
(7, 63, 3),
(8, 64, 3),
(9, 59, 3),
(10, 58, 3),
(11, 71, 3),
(12, 76, 3),
(13, 77, 3),
(14, 75, 3),
(15, 79, 1),
(16, 78, 1),
(17, 72, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(191) NOT NULL,
  `kategori` enum('Adidas','Nike','Puma','') NOT NULL,
  `deskripsi` text NOT NULL,
  `createat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updateat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `harga`, `stok`, `gambar`, `kategori`, `deskripsi`, `createat`, `updateat`) VALUES
(71, 'ADIDAS NMD_R1-CORE BLACK/BLK', 2300000, 93, 'adidas 1 (4).png', 'Adidas', 'We made the adidas NMD_R1 shoes to help you tackle your daily challenges and adventures. But this pair is also made to celebrate your love of sport. Bright colours are borrowed from football team colours — a celebration that you can wear on the sidelines or out in the city. BOOST cushioning keeps your feet comfortable, whether you\'re cheering your heart out or going about your day.\r\n\r\nThis shoe\'s upper is made with a high-performance yarn which contains at least 50% Parley Ocean Plastic — reimagined plastic waste, intercepted on remote islands, beaches, coastal communities and shorelines, preventing it from polluting our ocean. The other 50% of the yarn is recycled polyester.\r\n', '2022-12-12 10:53:01', NULL),
(72, 'ADIDAS SUPERSTAR 82-FTWR WHITE-WHT', 2300000, 99, 'adidas 2 (2).png', 'Adidas', 'After it flew across the hardwood, the adidas Superstar shoe became an icon of hip hop. After its time on the stage, it became a favourite on city streets. Even those who don\'t know its story will recognise its famous shell toe. Honouring a version from 1982, these shoes stay true to the retro shape and proportions. The deconstructed upper is the final touch that ties together this clean and classic style.', '2023-12-18 17:30:51', NULL),
(73, 'ADIDAS OZWEEGO-CINDER', 1800000, 100, 'adidas 3 (1).png', 'Adidas', 'The future? Who knows what could happen. One thing is for sure, though. You\'re gonna look fresh no matter what. Inspired by bold running shoe silhouettes of the \'90s and \'00s, these adidas OZWEEGO Shoes stand out with an eye-catching midsole. Adiprene cushioning and a leather and mesh upper combine for sleek style that\'s comfortable too.', '2022-12-12 03:53:29', NULL),
(74, 'NIKE AIR FORCE 1 LOW RETRO-WHITE/PINK-GUM YELLOW-METALLIC GOLD', 2149000, 100, 'nike 1 (2).png', 'Nike', 'No description', '2022-12-12 03:59:25', NULL),
(75, 'NIKE AIR MAX 97 OG-METALLIC SILVER/CHLORINE BLUE', 2849000, 98, 'nike 3 (4).png', 'Nike', 'Push your style full speed ahead with the Nike Air Max 97 OG. Its iconic design takes inspiration from water droplets and Japanese bullet trains. Full-length Nike Air cushioning lets you ride in first-class comfort.', '2022-12-12 10:13:25', NULL),
(76, 'NIKE AIR MAX FLYKNIT RACER-GHOST GREEN/BLACK-PINK BLAST-PHOTO BLUE', 2489000, 99, 'nike 4 (4).png', 'Nike', 'Paying homage to both heritage and innovation, we\'ve blended 2 icons (old and new) to go beyond what\'s expected in the Nike Air Max Flyknit Racer. Incredibly light and airy Flyknit is paired with oh-so-comfy Air Max cushioning. Lace up and let your feet do the talking.\r\n\r\nRetro Super Power\r\nInspired by the 2012 FK Racer, the featherweight, form-fitting Flyknit upper is as revolutionary as it is good looking. Plus, the nearly seamless design adds a sporty edge.\r\n\r\n \r\nBest Made Better\r\nThe modernised look of the Pre-Day tooling fits perfectly with this mash-up of heritage meets innovation. With its chiselled heel and expressive window around the Air Max cushioning (originally designed for performance running), it delivers a fresh take on tried-and-tested comfort.', '2022-12-12 07:21:32', NULL),
(77, 'PUMA RS-Z CORE PUMA WHITE-LAKE BLUE', 1899000, 99, 'puma 1 (4).png', 'Puma', 'Introducing the RS-Z, the latest and greatest addition to the RS family. We\'re reinventing street style this season, with sharp streetwise silhouettes, extreme design language and extra-bold colours for today’s fashion game-changers.\r\n\r\nWelcome the new RS-Z Core to your wardrobe to refresh your style for the new season', '2022-12-12 09:42:26', NULL),
(78, 'SUEDE CLASSIC XXI PUMA BLACK-PUMA WHITE', 1399000, 99, 'puma 2 (2).png', 'Puma', 'The Suede hit the scene in 1968 and has been changing the game ever since. It’s been worn by icons of every generation, and it’s stayed classic through it all. Instantly recognizable and constantly reinvented, Suede’s legacy continues to grow and be legitimized by the authentic and expressive individuals that embrace the iconic shoe. Be apart of the history of Suede, for all time.\r\n\r\nFEATURES & BENEFITS: The leather sourced in this product comes from environmentally responsible leather manufacturing, and is audited and certified via the Leather Working Group protocol', '2022-12-12 11:39:03', NULL),
(79, 'PUMA SLIPSTREAM LUX PUMA WHITE-MARSHMALLOW', 1699000, 99, 'puma 3 (4).png', 'Puma', 'No description', '2022-12-12 11:25:13', NULL),
(81, 'Produk sepatu', 250000, 100, ' 2222121212121670820263nike4(4).png', 'Adidas', 'no description', '2022-12-12 05:44:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(1) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `keterangan`) VALUES
(0, ''),
(1, 'Di proses'),
(2, 'Di kirim'),
(3, 'Di terima');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kuantiti_total` int(11) NOT NULL,
  `total_akhir` int(20) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `pesan_at` datetime NOT NULL,
  `kirim_at` datetime NOT NULL,
  `terima_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pesan`, `id_user`, `pengirim`, `penerima`, `alamat`, `telepon`, `email`, `kuantiti_total`, `total_akhir`, `pembayaran`, `id_status`, `pesan_at`, `kirim_at`, `terima_at`) VALUES
(6, 315285377, 10, 'sekiantest', 'testsekian', 'jsgggergegh', 123456, 'testtest@gmail.com', 6, 13800000, 0, 0, '2022-12-11 10:17:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 396742917, 6, 'v', 'asep', 'Jalan Alogio Barat', 999991, 'v@asd.com', 1, 1399000, 1, 3, '2022-12-12 05:39:03', '2022-12-12 05:46:45', '0000-00-00 00:00:00'),
(15, 408316855, 6, 'ipin', 'upin', 'Jalan Alogio Barat', 999991, 'v@asd.com', 1, 2849000, 0, 0, '2022-12-12 04:13:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 642001270, 6, 'marcel', 'a', 'Jalan Alogio Barat', 999991, 'v@asd.com', 1, 1899000, 0, 0, '2022-12-12 03:42:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 907096235, 6, 'vart', 'in', 'Jalan Alogio Barat', 999978, 'v@asd.com', 1, 2300000, 0, 0, '2022-12-12 04:53:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1098598934, 1, 'Narto Saminto', 'Saskeh ', 'Konoha. rt 02 Rw 03', 2147483647, 'saske@gmail.com', 1, 5000000, 0, 0, '2021-01-31 11:34:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1448482122, 5, 'v', 'vaa', 'Vila Tangerang Elok Blok C3 No 35, Kuta jaya, Pasar Kemis, Kab. Tangerang, 15560', 0, 'marcelinus.fajar@student.pradita.ac.id', 1, 2300000, 1, 2, '2023-12-18 11:30:51', '2023-12-18 12:01:51', '0000-00-00 00:00:00'),
(17, 1929924321, 6, 'aida', 'vincent', 'adada  ', 29129929, 'isadian@gmail.com', 1, 1699000, 0, 0, '2022-12-12 05:25:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2135761473, 6, 'aida', 'vs', 'Jalan Alogio Barat', 999978, 'v@asd.com', 1, 2489000, 0, 0, '2022-12-12 01:21:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantiti` int(11) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi`, `id_pesan`, `id_produk`, `kuantiti`, `total`) VALUES
(1, 1219061106, 61, 1, 9000000),
(9, 1098598934, 63, 1, 5000000),
(10, 184795202, 63, 1, 5000000),
(11, 184795202, 64, 1, 1760000),
(12, 1455538211, 59, 10, 32990000),
(13, 1455538211, 58, 5, 30000000),
(14, 315285377, 71, 6, 13800000),
(15, 2135761473, 76, 1, 2489000),
(16, 642001270, 77, 1, 1899000),
(17, 805615857, 75, 1, 2849000),
(18, 408316855, 75, 1, 2849000),
(19, 907096235, 71, 1, 2300000),
(20, 1929924321, 79, 1, 1699000),
(21, 396742917, 78, 1, 1399000),
(22, 1448482122, 72, 1, 2300000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sandi` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `role` varchar(15) NOT NULL,
  `createat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updateat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `sandi`, `image`, `role`, `createat`, `updateat`) VALUES
(1, 'Bayu Ihsan', 'bayhek335@gmail.com', '$2y$10$JACVc4V32Jp/fpJJNWJc7eOT9F2sBQcYhZraZUWDrPz6W8R7/ElM6', 'default.png', '1', '2022-12-12 10:26:36', NULL),
(5, 'asd', 'asd@email.com', '$2y$10$rPKy68Xe/hfKnh1Zfwey4e9H2gLPzAh8o1n8PpOJfwhNx44e4g49a', 'default.png', '2', '2022-11-28 09:01:26', '0000-00-00 00:00:00'),
(6, 'Vincent Surya Widjaya', 'v@asd.com', '$2y$10$a0p9BMbB0PHNQMf8AicAJuKEfTqVu8Ch1ejPIbzHVpaiWLmOAIq.C', 'default.png', '2', '2022-11-29 02:47:26', '0000-00-00 00:00:00'),
(7, 'Aida Lestari', 'a@asd.com', '$2y$10$wGtIcxVVhOjUkN01Eocwbeu84KhjZP13YJxBekpwmpH5qfJPdvbwS', 'default.png', '2', '2022-11-29 02:52:23', '0000-00-00 00:00:00'),
(10, 'test', 'test@gmail.com', '$2y$10$PjsFFuA4H5rG3bB.MUUhRe.RaUU3e8L6ejztgqttXOqReciqPuaUe', 'default.png', '1', '2023-12-18 17:44:24', '2022-12-08 12:24:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `id_pesan` (`id_pesan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_pesan`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
