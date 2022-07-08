-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 03:56 AM
-- Server version: 10.4.17-MariaDB-log
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malang`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `id_penulis` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `id_penulis`, `judul`, `isi`, `gambar`, `created_at`, `updated_at`) VALUES
(7, 8, 1, 'Jembatan Lumajang-Malang Putus akibat Erupsi Semeru, PUPR: Pasti Akan Rebuilding', 'Kementerian Pekerjaan Umum dan Perumahan Rakyat (PUPR) memastikan akan kembali membangun jembatan Besuk Kobokan atau Gladak Perak. Jembatan yang menghubungkan Kabupaten Lumajang dan Kabupaten Malang itu putus akibat terjangan material vulkanik Gunung Semeru, Sabtu (4/12/2021). \"Untuk pembangunan jembatan tentunya dari PUPR pasti akan melakukan rebuilding dan memerhatikan jika nanti suatu saat akan terjadi semacam banjir lahar dingin akibat erupsi seperti yang terjadi saat ini,\" kata Kepala Subdirektorat Analisa Data Dan Pengembangan Sistem Kementerian PUPR Nazib Faizal, dalam konferensi pers secara virtual, Senin (6/12/2021). Namun, Nazib mengatakan, pihaknya masih menunggu informasi lebih lanjut terkait kondisi erupsi Gunung Semeru terkait pembangunan kembali jembatan sepanjang 129 meter itu. \"Sambil menunggu erupsi ini berakhir stabil agar teman-teman PUPR yang sedang menganalisis kapan ini didesain dalam kondisi aman,\" ujarnya. Nazib mengatakan, jika dilihat dari morfologi, pembangunan kembali jembatan Besuk Kobokan cukup menantang. Dia belum dapat memastikan apakah akan membangun jembatan sementara terlebih dahulu atau tidak. \"Tentu ini pekerjaan yang sangat menantang kalau kita mau pasang jembatan darurat,\" ucap dia. Gunung Semeru yang berada di dua kabupaten, yakni Malang dan Lumajang, Jawa Timur, mengalami erupsi pada Sabtu (4/12/2021) sekitar pukul 15.20 WIB.', '1639622425.jpg', '2021-12-16 10:40:25', '2021-12-16 10:40:25'),
(8, 1, 2, 'Warga Mengaku Buta Setelah Divaksin, Dinkes Kota Malang Lakukan Pemeriksaan', 'Seorang warga di Kota Malang, Jawa Timur diduga mengalami kebutaan. Hal itu terjadi setelah warga tersebut mendapatkan suntikan vaksin Covid-19. Keluhan warga tersebut diunggah oleh akun Facebook Titik Andayani di grup Komunitas Peduli Malang Raya pada 29 November 2021. Dalam unggahannya, seorang warga mengeluh suaminya mengalami kebutaan setelah mendapat suntikan vaksin AstraZeneca dosis pertama pada 3 September 2021. Meski belum sembuh total, dalam unggahan tersebut disebutkan, kondisi sang suami sudah membaik, namun masih belum bisa bekerja. Pemerintah Kota Malang pun menyelidiki keluhan warga yang mengaku buta setelah disuntik vaksin AstraZeneca. Dinas Kesehatan Kota Malang belum bisa memastikan apakah gangguan penglihatan itu ada kaitannya dengan vaksin Covid-19. \"Masih dalam pemeriksaan,\" kata Kepala Dinas Kesehatan Kota Malang, Husnul Muarif melalui pesan singkat, Kamis (2/11/2021). Meski begitu, Husnul mengatakan, kondisi warga tersebut sudah membaik. Termasuk penglihatannya. Warga yang mengeluhkan gangguan penglihatan itu menjalani perawatan di Rumah Sakit Umum Daerah Saiful Anwar (RSSA) Kota Malang. \"Kondisi yang bersangkutan sekarang sudah lebih baik,\" katanya.', '1639622732.jpg', '2021-12-16 10:45:32', '2021-12-16 10:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Umum', '2021-11-02 19:26:14', '2021-11-02 19:26:14'),
(2, 'Pariwisata', '2021-11-02 19:26:15', '2021-11-02 19:26:15'),
(3, 'Ekonomi dan Bisnis', '2021-11-02 19:26:16', '2021-11-23 11:32:49'),
(8, 'Bencana', '2021-12-16 10:36:32', '2021-12-16 10:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
(2, 'Tentang Malang', 'Kota Malang terletak di dataran tinggi. Kota ini terletak pada ketinggian antara 440—667 meter di atas permukaan air laut. Titik tertinggi kota ini berada di CitraGarden City Malang, sebuah kota mandiri, sedangkan wilayah terendah Kota Malang berada di Kawasan Dieng.', '2021-11-24 06:09:24', '2021-12-16 10:48:00'),
(3, 'Visi Kota Malang', '“Terwujudnya Kabupaten Malang yang Istiqomah dan Memiliki Mental Bekerja Keras Guna Mencapai Kemajuan Pembangunan yang Bermanfaat Nyata untuk Rakyat Berbasis Pedesaan”.', '2021-11-24 06:39:15', '2021-12-16 10:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Instruksi Menteri Dalam Negeri Nomor 62 Tahun 2021', 'Instruksi Menteri Dalam Negeri Nomor 62 Tahun 2021 tentang Pencegahan dan Penanggulangan Covid-19 Pada Saat Natal Tahun 2021 dan Tahun Baru Tahun 2022 Inmendagri_No_62_Tahun_2021 (Libur NaTaru)-dikompresi', '1639622811.png', '2021-12-16 10:46:51', '2021-12-16 10:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` bigint(20) UNSIGNED NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `email_penulis` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `penulis`, `email_penulis`, `created_at`, `updated_at`) VALUES
(1, 'Annisa', 'anissa@gmail.com', '2021-11-02 19:33:23', '2021-12-16 10:37:37'),
(2, 'Sutrisno', 'trisn0@gmail.com', '2021-11-02 19:33:23', '2021-11-02 19:33:23'),
(3, 'Yanto', 'Yanto083@gmail.com', '2021-11-02 19:33:24', '2021-11-02 19:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Covid', '2021-11-02 19:38:40', '2021-11-02 19:38:40'),
(2, 'Cuaca', '2021-11-02 19:38:41', '2021-11-02 19:38:41'),
(3, 'Saham', '2021-11-02 19:38:41', '2021-11-02 19:38:41'),
(4, 'Vaksin', '2021-12-16 10:38:15', '2021-12-16 10:38:15'),
(5, 'Info', '2021-12-16 10:38:27', '2021-12-16 10:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `tag_berita`
--

CREATE TABLE `tag_berita` (
  `id_tag_berita` bigint(20) UNSIGNED NOT NULL,
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `id_tag` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag_berita`
--

INSERT INTO `tag_berita` (`id_tag_berita`, `id_berita`, `id_tag`, `created_at`, `updated_at`) VALUES
(6, 7, 5, '2021-12-16 02:40:25', '2021-12-16 02:40:25'),
(7, 8, 1, '2021-12-16 02:45:32', '2021-12-16 02:45:32'),
(8, 8, 5, '2021-12-16 02:45:32', '2021-12-16 02:45:32'),
(9, 8, 4, '2021-12-16 02:45:32', '2021-12-16 02:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akbar Firman Syah', 'akbarfirman504@gmail.com', NULL, '$2y$10$qunoq2MKd0lHC/DOYnzVPuYQsig6vDFMbv/req.F1FIoqhZ7EfRge', '1637635210.gif', 'Superadmin', 'yobyZeyWbXqOw5dQq0bRPl8aGVhAY9typWSqUSf8U4KjHEDKYzqeIyGmOzm8', '2021-11-02 20:10:07', '2021-11-23 10:40:10'),
(6, 'Superadmin', 'superadmin@xyz.com', NULL, '$2y$10$0lXNQNUahEB84R3LEVTzEeQg3aD1MHhEhDa46QsUMrZcWubX5AhNq', '1639623169.png', 'Superadmin', NULL, '2021-12-16 10:50:13', '2021-12-16 10:52:49'),
(7, 'Admin', 'admin@xyz.com', NULL, '$2y$10$C0T00Q3MaqQQiN5Mo8dpSeU.fV2JzeJ1e9nQ0B1FKM/yVBVP6ehiS', '1639623047.png', 'Admin', NULL, '2021-12-16 10:50:47', '2021-12-16 10:51:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penulis` (`id_penulis`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`),
  ADD KEY `penulis` (`penulis`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tag_berita`
--
ALTER TABLE `tag_berita`
  ADD PRIMARY KEY (`id_tag_berita`),
  ADD KEY `id_berita` (`id_berita`,`id_tag`),
  ADD KEY `id_tag` (`id_tag`);

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
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tag_berita`
--
ALTER TABLE `tag_berita`
  MODIFY `id_tag_berita` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_berita`
--
ALTER TABLE `tag_berita`
  ADD CONSTRAINT `tag_berita_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_berita_ibfk_3` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
