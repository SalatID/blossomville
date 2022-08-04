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
-- Struktur dari tabel `site_config`
--

CREATE TABLE `site_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_icon` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_favicon` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_whatsapp` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_whatsapp_on` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email_on` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_instagram` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_instagram_on` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_twitter` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_twitter_on` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `site_config`
--

INSERT INTO `site_config` (`id`, `site_title`, `site_description`, `site_icon`, `site_favicon`, `site_whatsapp`, `site_whatsapp_on`, `site_email`, `site_email_on`, `site_instagram`, `site_instagram_on`, `site_twitter`, `site_twitter_on`, `created_user`, `updated_user`, `created_at`, `updated_at`) VALUES
(1, 'Blossom Ville', 'Blossom Ville Citra Raya', 'site_assets/WEro5JnMhM0zmAl.png', 'site_assets/9kzkA5ku6lUJzDU.png', '6282113117002', 'Y', NULL, 'N', 'https://www.instagram.com/blossomville.official/', 'Y', NULL, 'N', 2, 4, '2022-01-31 10:47:10', '2022-02-24 18:53:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `site_config`
--
ALTER TABLE `site_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
