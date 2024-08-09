-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 04:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi-rio`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `satuan_obat` varchar(50) DEFAULT NULL,
  `harga_obat` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `stok_akhir` int(11) DEFAULT NULL,
  `id_supplier` int(11) NOT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `history` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `satuan_obat`, `harga_obat`, `stok`, `stok_akhir`, `id_supplier`, `supplier`, `history`) VALUES
(42, '1', 'box', 12500, 0, 30, 2, 'PERDANA', '2024-08-08'),
(43, '2', 'box', 4000, 0, 20, 2, 'PERDANA', '2024-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar`
--

CREATE TABLE `obat_keluar` (
  `id_obat_keluar` int(11) NOT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat_keluar`
--

INSERT INTO `obat_keluar` (`id_obat_keluar`, `id_obat`, `nama_obat`, `jumlah_keluar`, `tanggal`) VALUES
(39, 42, '1', 30, '2024-08-08'),
(40, 42, '1', 20, '2024-08-09'),
(41, 43, '2', 50, '2024-08-08'),
(42, 43, '2', 30, '2024-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `id_obat_masuk` int(11) NOT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `biaya_pemesanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat_masuk`
--

INSERT INTO `obat_masuk` (`id_obat_masuk`, `id_obat`, `nama_obat`, `jumlah_masuk`, `tanggal`, `biaya_pemesanan`) VALUES
(46, 42, '1', 80, '2024-08-08', 8000),
(47, 43, '2', 100, '2024-08-08', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rio@email.com', '$2y$10$CXRemKVYv4iamO6iB9LAkO51.gQ4OA9D.FC6l623oyG3l3e1P9lY2', '2024-07-01 01:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rop_eoq`
--

CREATE TABLE `rop_eoq` (
  `id_rop_eoq` int(11) NOT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `rip` int(11) DEFAULT NULL,
  `eoq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok_obat`
--

CREATE TABLE `stok_obat` (
  `id_stok_obat` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `satuan` varchar(256) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_obat`
--

INSERT INTO `stok_obat` (`id_stok_obat`, `nama`, `satuan`, `stok_awal`, `stok_akhir`) VALUES
(8, 'as', 'BOX', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(2, 'PERDANA', 'JL. ABC No.3', '081234567789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `bagian`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rio franata', 'rio', 'rio@email.com', 'Apoteker', NULL, '$2y$10$NDhlntwIU1oFlkzaIIZfvurCTTNsoX4W13n/22UnmUZeAoU66p0Se', NULL, '2024-06-29 11:33:05', '2024-07-11 04:46:08'),
(24, 'admin', 'admin', 'admin@email.com', 'Administrator', NULL, '$2y$10$2XAYWTP89E2.6ROYSEI2EOwp7JHrpyeSrFyyAoNr9eYWBYPHq8sXS', NULL, '2024-07-11 05:46:32', '2024-07-11 05:46:32'),
(28, 'test yudha', 'testyudha', 'testyudha@email.com', 'Apoteker', NULL, '$2y$10$bICBAei8Q/gphZW37hwNfu7z0DLuKRgqqLz00xlNFUv9rHK1OqQCa', NULL, '2024-07-31 07:13:09', '2024-07-31 07:14:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD PRIMARY KEY (`id_obat_keluar`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`id_obat_masuk`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rop_eoq`
--
ALTER TABLE `rop_eoq`
  ADD PRIMARY KEY (`id_rop_eoq`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD PRIMARY KEY (`id_stok_obat`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  MODIFY `id_obat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  MODIFY `id_obat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rop_eoq`
--
ALTER TABLE `rop_eoq`
  MODIFY `id_rop_eoq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_obat`
--
ALTER TABLE `stok_obat`
  MODIFY `id_stok_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD CONSTRAINT `obat_keluar_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Constraints for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD CONSTRAINT `obat_masuk_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Constraints for table `rop_eoq`
--
ALTER TABLE `rop_eoq`
  ADD CONSTRAINT `rop_eoq_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
