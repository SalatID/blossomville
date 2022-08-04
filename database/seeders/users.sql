-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Agu 2022 pada 15.29
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place_birth` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blod_type` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kk` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sts` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_number` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rt` int(10) UNSIGNED DEFAULT NULL,
  `rw` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distric` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '3',
  `verified` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `img_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_kk` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marriage` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `art_parent` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `art_sts` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `place_birth`, `date_birth`, `gender`, `blod_type`, `religion`, `job`, `nik`, `kk`, `sts`, `address`, `block`, `house_number`, `id_rt`, `rw`, `village`, `distric`, `city`, `province`, `level`, `verified`, `img_ktp`, `img_kk`, `marriage`, `phone`, `art_parent`, `art_sts`) VALUES
(2, 'Mursalat', 'root.mursalat@gmail.com', '2022-01-24 02:07:53', '$2y$10$YwyBNs/dnPj1.VFyNQJoveygpEKM6njssOOQioTGHy1uqGPvSBXJ6', NULL, '2022-01-24 01:14:44', '2022-01-24 02:07:53', 'Tangerang', '2022-01-24', 'male', 'o', 'Islam', 'Kuli', '367123457890', '367123457890', 'ayah', 'PT KMK Globa Sports', 'K', '01', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '0', '1', NULL, NULL, 'menikah', '', NULL, NULL),
(4, 'arief nurhadiyat', 'ariefn776@gmail.com', '2022-01-24 18:05:10', '$2y$10$AsRb5cf10Wo66x0vHJ7Lre2YfvwroGE/RnCdKg4B/13/OQeOHYexO', NULL, '2022-01-24 18:04:45', '2022-03-06 18:00:24', 'bandung', '1990-07-15', 'male', 'B', 'ISLAM', 'WIRASWASTA', '3671084212890002', '3671084212890002', 'ayah', 'BLOSSOMVILLE CITRARAYA', 'W08', 'NO 51', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '0', '1', 'attc/ktp_NaFhDZJdC0mGn1L.pdf', 'attc/kk_SFZGBlUqmm2cXsr.png', 'menikah', '087800069996', NULL, NULL),
(5, 'Darojat', 'odj.darojat@gmail.com', '2022-01-26 02:12:59', '$2y$10$BrX0EJ1PrhpD.fDZPMZ.TOfvSaJtmdqRO.oFZQprNMsCpeXNzoTKG', NULL, '2022-01-26 01:51:51', '2022-01-26 02:15:01', 'Pemalang', '1970-04-10', 'male', 'A', 'Islam', 'Karyawan swasta', '3603181004700014', '3603192003120019', 'ayah', 'Cluster Blossomville-Citra Raya', 'W7', '07', 3, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_dZjTtCnyn5PJ8Yf.jpg', 'attc/kk_ecuT461GdmIVAw3.jpg', 'menikah', '082114429359', NULL, NULL),
(6, 'Herman Junius', 'hermanjunius0106@gmail.com', '2022-01-28 08:14:35', '$2y$10$5LhOEXwpfYXoPkSyNj2CnelbXyNET0ZYdp.x1SvxRzIJn9UR6wlaO', NULL, '2022-01-28 07:54:29', '2022-01-28 08:42:02', 'Bandung', '1981-06-01', 'male', 'O', 'Islam', 'Pegawai Swasta', '3603170106810011', '360317010812008', 'ayah', 'Blossomville', 'W09', '43', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_ts7X9u5q8OTCM25.jpg', 'attc/kk_PuIoa5h3OnZ08xZ.jpg', 'menikah', '081573139165', NULL, NULL),
(7, 'aji kusnoro', 'ajisablon@yahoo.com', '2022-01-28 08:12:06', '$2y$10$pt4sqCHya1JW3FQVE3TXZ.jTxlhvBhjZ/26i.TwM9HID42AxzdoZS', NULL, '2022-01-28 08:10:12', '2022-02-10 20:22:31', 'tegal', '1979-05-13', 'male', 'ab+', 'islam', 'wiraswasta', '3603191305790005', '3603190309120166', 'ayah', 'cluster blossomville citra raya', 'W 2', '7', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '1', '1', 'attc/ktp_qLvRVm0hQOq2Yc2.jpg', 'attc/kk_m2I7KJvu8U408iH.jpg', 'menikah', '081389612344', NULL, NULL),
(8, 'Irwan Sugiarto', 'irwan_sugiarto35@yahoo.co.id', '2022-01-28 08:21:59', '$2y$10$mKfAyfNVqA/p41HoHtYIcOpw03YIOCk9S0pAZgy1zYjVJzOC5npjO', NULL, '2022-01-28 08:19:38', '2022-01-28 08:21:59', 'Serabg', '1975-05-03', 'male', 'B', 'B', 'Wiraswata', '34567', '76444', 'ayah', 'Jl. BLOSSOMEVILLE 8', 'W 11', '3', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_lb7Dvw6tSVdGqxs.jpg', 'attc/kk_FaAuQaL3UD553mW.jpeg', 'menikah', '08164810771', NULL, NULL),
(9, 'Daniel Tanto Bun', 'danieltanto123@gmail.com', '2022-01-28 13:12:09', '$2y$10$j40bRp8.6zn1wAIcDKynjuPxYpZfwoYSGIaX67toIdxSaMksh4oXa', NULL, '2022-01-28 08:21:16', '2022-02-24 18:58:32', 'Singkawang', '1972-04-06', 'male', 'B', 'Protestan', 'wiraswasta', '3603190406720006', '3603190701130012', 'ayah', 'Cluster Blossomville Citra Raya Tangerang', 'W7', '05', 3, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '2', '1', 'attc/ktp_EEIL5IMkEJtpQoR.jpg', 'attc/kk_VHSr8OWmLTALGfj.jpg', 'menikah', '081310542388', NULL, NULL),
(10, 'Kikin Nugraha', 'kikin.nugraha@gmail.com', '2022-01-28 11:12:44', '$2y$10$ktzi0KhxHrDvqs9opqfkMe9cIkuQQS0sfoaE1IYyXm8hFSh97zQz2', NULL, '2022-01-28 08:25:51', '2022-01-28 11:12:44', 'Subang', '1989-09-26', 'male', 'O', 'Islam', 'Pegawai Negeri', '3603032609890005', '3603192102200001', 'ayah', 'Citra Raya Blossom Ville', 'W3', '05', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_MGTfSU36RYec7SQ.jpeg', 'attc/kk_cBBdCOJlG9DM06B.jpeg', 'menikah', '081311153331', NULL, NULL),
(11, 'Agus Mulyadi', 'mulyadi.pabrik@gmail.com', '2022-01-30 19:03:32', '$2y$10$D4bJYRnMMpayoY11DR8Rsuo2Mp1Zl8jwm0Ud/FZ5aQIxqbm7Pabke', NULL, '2022-01-28 08:30:30', '2022-01-30 19:03:32', 'Bekasi', '1970-08-19', 'male', 'A', 'Kristen', 'Karyawan', '3215261908700001', '321526120070128', 'ayah', 'Blossomville blok W5 no 5', 'W5', 'No 05', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_AjuWLyHkoYbxisW.jpg', 'attc/kk_kbMyReFcI4sOblC.jpg', 'menikah', '085880199921', NULL, NULL),
(12, 'Ikhsan Senjaya', 'Ikhsan.senjaya@gmail.com', '2022-01-28 09:07:20', '$2y$10$i1aPWPsvNnpTZi9x73.bmeZp7ddLX18zw8j6E3t7TYeVgLtCN5w8.', NULL, '2022-01-28 08:30:31', '2022-01-28 09:07:20', 'Jakarta', '1982-11-06', 'male', 'AB', 'Islam', 'Karyawan Swasta', '3674040611820003', '3674041008100020', 'ayah', 'BlosssomVille Citraraya', 'W10', '20', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_U7YmEhrJGDwC1OQ.jpg', 'attc/kk_rqenyDbaYShNdCV.jpg', 'menikah', '08158739983', NULL, NULL),
(13, 'Derry susanto', 'derry_prm@yahoo.com', '2022-02-10 20:18:18', '$2y$10$umwf5V4kxEFaUk5Q2lBsg.vVZKWt9xucrkIA4zBAjimklTmDDr.8e', NULL, '2022-02-10 20:16:56', '2022-02-10 20:19:48', 'Bungamas', '1977-12-15', 'male', 'O+', 'Islam', 'Karyawan swasta', '3603191512770002', '3603191903110396', 'ayah', 'Blossom ville', 'W 08', 'No 39', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '2', '1', 'attc/ktp_19HlYZhNgVPjyO9.jpg', 'attc/kk_tphcpmoy3GSJlIH.jpg', 'menikah', '0818846060', NULL, NULL),
(14, 'Tresna Satryadi', 'Tresna29091991@gmail.com', '2022-02-17 06:19:14', '$2y$10$o3nmY9IQGXRoHDOdyUFLq.72DYH/Q7JgBf15sxezVRIoGyJDNYHNC', NULL, '2022-02-17 06:14:38', '2022-02-22 06:15:29', 'Tangerang', '1991-09-29', 'male', 'B', 'Islam', 'Wirausaha', '3603122909910003', '3603182103190001', 'ayah', NULL, 'W8', '47', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_I31gnUsGXMMLYNC.jpg', 'attc/kk_Cg7v888mF160aQl.jpg', 'menikah', '82220226072', NULL, NULL),
(15, 'NANANG SUPRIYADI', 'Nanangsupriyadi183@gmail.com', '2022-02-22 05:46:27', '$2y$10$Yr8S1lu54yswgQe.B/gkyulCLv5umV/YwRNQzwBWaaMhB5EFLRo1i', NULL, '2022-02-22 05:39:44', '2022-02-22 06:15:56', 'SUKOHARJO', '1983-05-15', 'male', 'O', 'ISLAM', 'PENGUSAHA', '3172021505830010', '3603190712170010', 'ayah', 'BlossomVille w03/07 Citra Raya', 'W 03', '07', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_rcI9baTKmuIT5Mc.pdf', 'attc/kk_eg1OR1nccteDkMf.pdf', 'menikah', '087780015512', NULL, NULL),
(17, 'Iwan Permana', 'e1.permana@gmail.com', '2022-02-26 00:44:08', '$2y$10$vuLsBF2iIjrRqZUUl8.PCOMJ9B899w58mV0f.nkv1sdhazhsIGxfe', NULL, '2022-02-26 00:43:34', '2022-02-26 08:10:28', 'Bandung', '1976-04-13', 'male', 'B', 'Islam', 'Pegawai Swasta', '3216091304760004', '3603191408180006', 'ayah', 'Perumahan Citra Raya - Blossom Ville W5 no 12', 'W5', '12', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_AufL7ZrFwrGLqlJ.jpg', 'attc/kk_QGqrNB498bUWCwZ.jpg', 'menikah', '081210120160', NULL, NULL),
(18, 'Rika Wijaya', NULL, NULL, NULL, NULL, '2022-02-26 07:48:46', '2022-02-26 07:48:46', 'Cirebon', '1981-02-15', 'female', NULL, 'Islam', 'Ibu Rumah Tangga', '3216095502810007', '3603191408180006', 'ibu', 'Perumahan Citra Raya - Blossom Ville W5 no 12', 'W5', 'W5', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_1TfMdv1bFqiKks4.jpg', '3603191408180006', 'menikah', '081297909197', NULL, NULL),
(19, 'Ilham Raihan Permana', NULL, NULL, NULL, NULL, '2022-02-26 08:01:15', '2022-02-26 08:01:15', 'Bekasi', '2004-06-07', 'male', NULL, 'Islam', 'Pelajar', '3216090706040010', '3603191408180006', 'anak', 'Perumahan Citra Raya - Blossom Ville W5 no 12', 'W5', 'W5', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_Q5h1HWOYfvgW5Bu.jpg', '3603191408180006', 'lajang', '081310271728', NULL, NULL),
(20, 'Fifi Permana Wijaya', NULL, NULL, NULL, NULL, '2022-02-26 08:05:49', '2022-02-26 08:05:49', 'Tangerang', '2009-11-10', 'female', NULL, 'Islam', 'Pelajar', '3216095011090006', '3603191408180006', 'anak', 'Perumahan Citra Raya - Blossom Ville W5 no 12', 'W5', 'W5', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_VvA1AXcFaYxh6ce.jpg', '3603191408180006', 'lajang', '081267777636', NULL, NULL),
(21, 'Githa Permana Wijaya', NULL, NULL, NULL, NULL, '2022-02-26 08:13:11', '2022-02-26 08:13:11', 'Tangerang', '2012-03-19', 'female', NULL, 'Islam', 'Pelajar', '3216095903120002', '3603191408180006', 'anak', 'Perumahan Citra Raya - Blossom Ville W5 no 12', 'W5', 'W5', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_b2N1ZLYJBRjbIwY.jpg', '3603191408180006', 'lajang', '081297909197', NULL, NULL),
(22, 'Diani puspita ningrum', NULL, NULL, NULL, NULL, '2022-02-26 10:41:56', '2022-02-26 10:41:56', 'Tangerang', '1989-12-02', 'female', 'O', 'Islam', 'Ibu rumah tangga', '367108402234776', '3671084212890002', 'ibu', 'BLOSSOMVILLE CITRARAYA', 'W08', 'W08', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_vu3VnCqDeSsVlXU.jpeg', '3671084212890002', 'menikah', '089649570144', NULL, NULL),
(23, 'Adi Sarwono', 'adisrwn@gmail.com', '2022-02-26 18:37:20', '$2y$10$XMuQOFTZ2uny/A4xhHBUYu016AV0pk6CoRRBArcP5C08SbZ73ZhdG', NULL, '2022-02-26 18:35:59', '2022-02-26 18:38:01', 'Purbalingga', '1967-11-21', 'male', 'O', 'Islam', 'Karyawan', '3671092111670001', '3671090209070643', 'ayah', 'Blossomville', 'W 9', '73', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '2', '1', 'attc/ktp_3gPUd8vefvb2Csm.jpg', 'attc/kk_Gx8gOosLbTfTqBw.jpg', 'menikah', '08161191943', NULL, NULL),
(24, 'Saswardi Yudhistira', 'saswardi.yudhistira@gmail.com', '2022-02-26 19:25:25', '$2y$10$cUiW9jUbVD6w8U9NP7BVaeVicKti2wvPBz5ttO5rBA9jhjIYIvYt.', NULL, '2022-02-26 19:21:05', '2022-02-26 19:25:25', 'Surabaya', '1979-06-30', 'male', 'O', 'Islam', 'Karyawan Swasta', '3603193006790001', '3603191904110022', 'ayah', 'Blossomville blok W05 No.15, Citra Raya - Cikupa\r\nPanongan', 'W5', '15', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_jP9sJX0PDJBe7Iz.jpg', 'attc/kk_GNIuspZumpWxZX8.jpg', 'menikah', '0817840201', NULL, NULL),
(25, 'Dwi Agung Kurniasari', NULL, NULL, NULL, NULL, '2022-02-26 19:34:52', '2022-02-26 19:34:52', 'Jakarta', '1984-11-27', 'female', 'A', 'Islam', 'Ibu Rumah Tangga', '360319711840002', '3603191904110022', 'ibu', 'Blossomville blok W05 No.15, Citra Raya - Cikupa\r\nPanongan', 'W5', 'W5', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_OOY1fKJYUPDxaPg.jpg', '3603191904110022', 'menikah', '087771491569', NULL, NULL),
(26, 'Khaerul  uman', 'khaeruluman63@gmail.com', '2022-02-26 19:42:48', '$2y$10$cj8T5VckP9AiKt9WCXK.aONXz2bMhi6x9x9FAss5v/eGAoarVoAkG', NULL, '2022-02-26 19:35:14', '2022-02-26 19:42:48', 'Brebes', '1963-11-06', 'male', 'B', 'Islam', 'PNS', '3603190611630001', '3603192505110037', 'ayah', 'Blossom ville citraraya', 'W09', '51', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_IW5lMvxLrFOY2N1.jpeg', 'attc/kk_4LeOYhBj0jJ5Inz.jpeg', NULL, '081288880863', NULL, NULL),
(27, 'Daffa Abhivandya Yudhistira', NULL, NULL, NULL, NULL, '2022-02-26 19:38:07', '2022-02-26 19:38:07', 'Jakarta', '2011-03-11', 'male', 'O', 'Islam', 'Pelajar', '3603191103110001', '3603191904110022', 'anak', 'Blossomville blok W05 No.15, Citra Raya - Cikupa\r\nPanongan', 'W5', 'W5', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_R60RefVypuyr7Pj.jpg', '3603191904110022', 'lajang', '081319720679', NULL, NULL),
(28, 'Sarjono budi santoso', 'sarjonobudisantoso22@gmail.com', '2022-02-26 19:40:56', '$2y$10$Tb4uurdVHMNG3vRTd/u69e3gHaezOvsvoI.a9wmIrgOy0WaAuUcmm', NULL, '2022-02-26 19:39:35', '2022-02-26 19:52:20', 'Klaten', '1980-04-22', 'male', 'Ab', 'Kristen', 'Wiraswasta', '3603192204800001', '3603190410120025', 'ayah', 'Blossom ville', 'W02', '21', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_9Cw66sNEoUEPtrq.jpeg', 'attc/kk_gUfEEZ2XQ4eOuKo.jpeg', 'menikah', '081383068222', NULL, NULL),
(29, 'Davindra Akhtar Yudhistira', NULL, NULL, NULL, NULL, '2022-02-26 19:40:07', '2022-02-26 19:40:07', 'Tangerang', '2014-07-16', 'male', 'O', 'Islam', 'Pelajar', '3603191607140002', '3603191904110022', 'anak', 'Blossomville blok W05 No.15, Citra Raya - Cikupa\r\nPanongan', 'W5', 'W5', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_7HGP4bg5EaJm5up.jpg', '3603191904110022', 'lajang', '081319720679', NULL, NULL),
(30, 'Etik suryani', NULL, NULL, NULL, NULL, '2022-02-26 19:49:58', '2022-02-26 19:49:58', 'Gunung kidul', '1985-03-31', 'female', '-', 'Kristen', 'Ibu rumah tangga', '3603197103850001', '3603190410120025', 'ibu', 'Blossom ville', 'W02', 'W02', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_T0d4ekZE6pUE78B.jpeg', '3603190410120025', 'menikah', '081294356190', NULL, NULL),
(31, 'Kurniati astuti', NULL, NULL, NULL, NULL, '2022-02-26 19:50:08', '2022-02-26 19:50:08', 'Palu', '1974-08-01', 'female', 'B', 'Islam', 'IRT', '3603194108740004', '3603192505110037', 'ibu', 'Blossom ville citraraya', 'W09', 'W09', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_RfKMYNxWYEH2mX0.jpg', '3603192505110037', 'menikah', '0813244233333', NULL, NULL),
(32, 'Hendry', 'hendryyap3@gmail.com', '2022-02-26 20:07:05', '$2y$10$L3hH9f68c8I0XEAFwuEgUuOC7qK2pvs8w4juu1WDJfnIn7mfUQsca', NULL, '2022-02-26 20:06:22', '2022-02-26 20:51:43', 'Jambi', '1982-03-14', 'male', 'A', 'Kristen', 'Wiraswasta', '3603181403820008', '3603181904100052', 'ayah', 'Blossom ville citra raya', 'W9', '65', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_ldPKcWTJZcFGZZD.jpg', 'attc/kk_AXCMog8KTmAQuVq.jpg', 'menikah', '085694581258', NULL, NULL),
(33, 'Theresia Gloria', NULL, NULL, NULL, NULL, '2022-02-26 20:12:24', '2022-02-26 20:12:24', 'Medan', '1981-12-18', 'female', 'A', 'Kristen', 'Ibu rumah tangga', '3603185812810003', '3603181904100052', 'ibu', 'Blossom ville citra raya', 'W9', 'W9', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_PwtNBxT7CEEkVEj.jpg', '3603181904100052', 'menikah', '085694363056', NULL, NULL),
(34, 'Budhi widiasmoro', 'widiasmorobudhi@gmail.com', '2022-02-26 20:19:30', '$2y$10$pAmJ80CXbiIYyy7iYlfKBubcMrIozbqenHBRLTsOi.pBCCoY6JgN6', NULL, '2022-02-26 20:16:47', '2022-02-27 02:55:18', 'Salatiga', '1969-12-21', 'male', 'A', 'Islam', 'Swasta', '3373012112690002', '3603192509140010', 'ayah', 'Blossomville', 'W8', '11', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_2c7OHkQHLsy3Rc1.jpg', 'attc/kk_yWedC8VeMhvUBGI.jpg', 'menikah', '085640149688', NULL, NULL),
(35, 'Timotius Hubert Yap', NULL, NULL, NULL, NULL, '2022-02-26 20:25:37', '2022-02-26 20:25:37', 'Tangerang', '2007-06-04', 'male', 'A', 'Kristen', 'Pelajar', '3603180406070002', '3603181904100052', 'anak', 'Blossom ville citra raya', 'W9', 'W9', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_4wiulAz2jDjgFLK.jpg', '3603181904100052', 'lajang', '088213969189', NULL, NULL),
(36, 'Odilia Francesca Yap', NULL, NULL, NULL, NULL, '2022-02-26 20:29:41', '2022-02-26 20:29:41', 'Tangerang', '2009-07-11', 'female', 'A', 'Kristen', 'Pelajar', NULL, '3603181904100052', 'anak', 'Blossom ville citra raya', 'W9', 'W9', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_nOIiedJ1o1MZRNy.jpg', '3603181904100052', 'lajang', '081286010863', NULL, NULL),
(37, 'Nicholas Saverio Yap', NULL, NULL, NULL, NULL, '2022-02-26 20:32:32', '2022-02-26 20:32:32', 'Tangerang', '2011-07-28', 'male', 'A', 'Kristen', 'Pelajar', '3603182807110005', '3603181904100052', NULL, 'Blossom ville citra raya', 'W9', 'W9', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_gGQvJoaKBTC7WoV.jpg', '3603181904100052', 'lajang', '081317449379', NULL, NULL),
(38, 'Zulfikar', 'izulfikarhs@gmail.com', NULL, '$2y$10$kyDTGowTX0Z67qcEe7vP0eiigUObbgzsNBl6ZD7X5t5BU94hu6A/G', NULL, '2022-03-05 07:18:13', '2022-03-05 21:16:41', 'Jakarta', '1982-06-01', 'male', NULL, 'Islam', 'ASN', '3173080106820012', '3173083001091848', 'ayah', 'Blossom ville', 'W10', '02', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_orD4GcdMjaSHdwx.JPG', 'attc/kk_MQvqwp2iBdkdpjT.pdf', 'menikah', '081310666586', NULL, NULL),
(39, 'ghaida filzah rifiani', NULL, NULL, NULL, NULL, '2022-03-06 18:04:21', '2022-03-06 18:04:21', 'tangerang', '2016-09-07', 'female', 'b', 'islam', NULL, '367108409160001', '3671084212890002', 'anak', 'BLOSSOMVILLE CITRARAYA', 'W08', 'W08', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_FC5jbZ2vTan8kOp.png', '3671084212890002', 'lajang', '087800069996', NULL, NULL),
(40, 'A Endra Budi Santoso', 'bsendra4@gmail.com', '2022-04-21 23:26:42', '$2y$10$IJStSBg4a/e0m.oXKuFJNuxPTXTTg24LQMrvkKSjmKpOrRAW3zJEC', NULL, '2022-04-21 23:25:15', '2022-04-25 20:44:03', 'Madiun', '1978-03-19', 'male', 'B', 'Katolik', 'Wiraswasta', '3603191903780005', '3603191909110004', 'ayah', 'Blossom Ville', 'W07', '20', 3, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_q5al8bIwL5XHLbJ.jpg', 'attc/kk_SFeKLr6OzurJHHN.jpg', NULL, '081218201287', NULL, NULL),
(41, 'Nanda Maretta Tamba', 'nandatamba3@gmail.com', '2022-04-25 20:15:30', '$2y$10$/1y3s2j1LeKKTOgpBKC9cuDOS6etdxR2AVCXHjCb7fPHJIhQUU1ci', NULL, '2022-04-24 22:27:33', '2022-04-25 20:44:12', 'Jakarta', '2003-03-02', 'female', 'O', 'Kristen Protestan', '-', '1208044203030001', '1208042903080202', 'anak', 'BLOSSOM VILLE CITRA RAYA', 'W09', '79', 1, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_iSbnfp9lm2pHk0u.jpg', 'attc/kk_n5K01hKOvBK6h0U.jpg', 'lajang', '081280188194', NULL, NULL),
(42, 'Bambang Yudo Prihantono', 'yudobam1@gmail.com', '2022-06-16 14:58:33', '$2y$10$Q0Lpg6AVmCkE9bh5xpJluekSrKOm4IfNQK7EzBk9qDmapueagxJLy', NULL, '2022-06-16 07:02:40', '2022-06-16 14:58:33', 'Madiun', '1972-03-25', 'male', 'AB', 'Islam', 'Karyawan Swasta', '3603192503720007', '3603191510120062', NULL, 'Blossom Ville', 'W.08', '49', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_aaqOecuYp7UoMlN.jpeg', 'attc/kk_qYsMjuQ3KZf4UeP.jpeg', 'menikah', '082298239075', NULL, NULL),
(43, 'Fujiana Lestari', NULL, NULL, NULL, NULL, '2022-06-16 07:10:18', '2022-06-16 07:10:36', 'Tangerang', '1980-10-07', 'female', NULL, 'Islam', 'Ibu Rumah Tangga', '3603194710800004', '3603191510120062', 'ibu', 'Blossom Ville', 'W.08', 'W.08', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_FecsSsPE57o7yeb.jpeg', '3603191510120062', 'menikah', NULL, NULL, NULL),
(44, 'Anindya Maharani Prihantono', NULL, NULL, NULL, NULL, '2022-06-16 07:13:30', '2022-06-16 07:13:30', 'Tangerang', '2006-07-04', 'female', NULL, 'Islam', 'Pelajar', '3603194407060003', '3603191510120062', 'anak', 'Blossom Ville', 'W.08', 'W.08', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_luAcLFM6Uo937KE.jpeg', '3603191510120062', 'lajang', NULL, NULL, NULL),
(45, 'Shafira Meidi Prihantono', NULL, NULL, NULL, NULL, '2022-06-16 07:16:19', '2022-06-16 07:16:19', 'Tangerang', '2009-05-31', 'female', NULL, 'Islam', 'Pelajar', '3603197105090001', '3603191510120062', 'anak', 'Blossom Ville', 'W.08', 'W.08', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_x10UG4tt5kEKoTJ.jpeg', '3603191510120062', 'lajang', NULL, NULL, NULL),
(46, 'Budi Santoso', 'busan.dt@gmail.com', '2022-06-17 07:35:56', '$2y$10$2XEBwMMQWoQNibAVbqQUPOUSqeyHDZPHFi9pjgZiqxG5z1n7IEWiG', NULL, '2022-06-17 07:34:27', '2022-06-17 07:35:56', 'Tulungagung', '1978-03-21', 'male', 'O', 'Islam', 'ATC', '3603192103780001', '3603101407110003', 'ayah', 'Blossom ville', 'W 09', '49', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_Fuh3TiHni3sz3Oa.pdf', 'attc/kk_zMYO30qJjfa58oe.pdf', 'menikah', '081380480747', NULL, NULL),
(47, 'Pitris Pristiawati', NULL, NULL, NULL, NULL, '2022-06-17 07:48:27', '2022-06-17 07:48:27', 'Tangerang', '1980-09-25', 'female', 'B', 'Islam', 'ASN', '3603192509800001', '3603101407110003', 'ibu', 'Blossom ville', 'W 09', 'W 09', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_nB7T826jpHqf6Iv.pdf', '3603101407110003', 'menikah', '081380480747', NULL, NULL),
(48, 'Handra', 'handra.xie@gmail.com', '2022-06-21 00:18:16', '$2y$10$DYIDe3/vQ6n.l.X/2i3xlejqgitfI6FyWa.xfp2QhFmpC0yxyZDO.', NULL, '2022-06-20 19:00:02', '2022-06-21 00:18:16', 'Rengat', '1986-09-03', 'male', '0', 'Katolik', 'Karyawan Swasta', '1402010309860003', '3603190102170005', 'ayah', 'Blossom Ville W08 Nomer 09', 'W08', '09', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '1', 'attc/ktp_1amiGVITZZIMkIV.jpg', 'attc/kk_d5XS45uCfJuOty6.jpeg', 'menikah', '08176957310', NULL, NULL),
(49, 'Sriadi', 'sriadi78doank@gmail.com', '2022-06-22 00:20:28', '$2y$10$ul8GolxcekXpaV8yLwUr7uiSHwPDEgU..fx6TGxHZwLZ45FGtYNju', NULL, '2022-06-20 21:01:45', '2022-06-22 00:20:28', 'Manado', '1978-06-28', 'male', 'O', 'Islam', 'PNS', '7103242806780001', '3603191508140008', 'ayah', 'Blossom Ville', 'w2', '17', 2, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_43WcwILFHUdofk8.pdf', 'attc/kk_VXmvqaICYYsO3MD.pdf', 'menikah', '081310169713', NULL, NULL),
(50, 'Anderson', 'pt_abp@yahoo.com', '2022-06-21 01:21:46', '$2y$10$4/uoGyOKL8FMDpqt7dBeVuM.Mc2UXBVDj8PwJymv1RgZ.jCA01Aq2', NULL, '2022-06-21 01:21:33', '2022-06-21 01:21:46', 'Jakarta', '1990-12-27', 'male', '0', 'Kristen', 'Wirausaha', '3271012712900006', '3603192011170010', 'anak', 'Blossomville blok w6 no 1', 'W6', '1', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_sluQIkcs4q96nwc.jpg', 'attc/kk_i0W6sbqvXH8RTkI.jpeg', 'lajang', '081911873727', NULL, NULL),
(51, 'Amran Nangasan', 'amrann1951@gmail.com', '2022-07-27 02:25:22', '$2y$10$HceWywLZFNFqJJXXxwwAzO7voL.WqqOdgel2FbICPvJd/6vkxqJNC', NULL, '2022-07-26 20:54:42', '2022-07-27 02:25:22', 'Bengkulu', '1951-02-22', 'male', 'o', 'Islam', 'Pensiun', '3603192202510001', '3603192905130015', 'ayah', 'Blossom Ville', 'W3', '9', 4, '16', 'Mekar Bakti', 'Panongan', 'Kabupaten Tangerang', 'Banten', '3', '0', 'attc/ktp_wmolTXYjqW4b0Dg.jpeg', 'attc/kk_De8a6iGIlqrKiih.jpeg', 'menikah', '081389230080', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
