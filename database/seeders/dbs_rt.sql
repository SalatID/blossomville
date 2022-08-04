-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Agu 2022 pada 15.32
-- Versi server: 10.2.44-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garc4939_blossomville`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbs_rt`
--

CREATE TABLE `dbs_rt` (
  `id` int(10) UNSIGNED NOT NULL,
  `rt_no` int(15) UNSIGNED NOT NULL,
  `rt_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_whatsapp` bigint(10) UNSIGNED NOT NULL,
  `rt_foto_src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user` int(10) UNSIGNED NOT NULL,
  `updated_user` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dbs_rt`
--

INSERT INTO `dbs_rt` (`id`, `rt_no`, `rt_name`, `rt_whatsapp`, `rt_foto_src`, `created_user`, `updated_user`, `created_at`, `updated_at`) VALUES
(1, 1, 'ADI SARWONO', 8161191943, 'pengurus/fIX49vVd99Sdg7r.jpeg', 0, 0, '2022-01-21 09:12:34', '2022-02-26 19:45:52'),
(2, 2, 'DERRY SUSANTO', 818846060, 'pengurus/K6ifWc8PcwJwXKz.jpg', 0, 0, '2022-01-21 09:12:34', '2022-02-11 00:30:50'),
(3, 3, 'DANIEL TANTO BUN', 81310542388, 'pengurus/mzmNDF9baLmaioA.jpeg', 0, 0, '2022-01-21 09:12:34', '2022-02-25 23:40:15'),
(4, 4, 'NANANG SUPRIYADI', 6287780015512, 'guest/assets/images/rt04-2.jpeg', 0, 0, '2022-01-21 09:12:34', '2022-01-21 09:12:34'),
(6, 16, 'AJI KUSNORO', 81389612344, 'pengurus/elQwcGylvyT1ygB.jpeg', 0, 0, '2022-01-21 08:30:09', '2022-02-11 00:31:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dbs_rt`
--
ALTER TABLE `dbs_rt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dbs_rt`
--
ALTER TABLE `dbs_rt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
