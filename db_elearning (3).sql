-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 11:28 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'Pengendali Program', '2019-02-12 11:45:45', '2019-02-12 11:45:45', NULL),
(2, 'Customer Services', 'Di bawah Admin', '2019-02-12 11:46:08', '2019-02-12 11:46:08', NULL),
(3, 'Dosen', 'Pengajar Mahasiswa', '2019-02-12 11:46:27', '2019-02-12 11:46:27', NULL),
(4, 'Mahasiswa', 'Pelajar yang budiman', '2019-02-12 11:46:42', '2019-02-24 02:08:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_grub_kelas`
--

CREATE TABLE `tb_grub_kelas` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `grupkelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_grub_kelas`
--

INSERT INTO `tb_grub_kelas` (`id`, `id_user`, `id_kelas`, `grupkelas_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 40, 1, 1, '2019-02-25 14:00:05', '2019-02-25 14:00:05', NULL),
(2, 37, 1, 1, '2019-02-25 14:00:05', '2019-02-25 14:00:05', NULL),
(3, 35, 1, 1, '2019-02-25 14:00:05', '2019-02-25 14:00:05', NULL),
(4, 34, 1, 1, '2019-02-25 14:00:05', '2019-02-25 14:00:05', NULL),
(5, 38, 1, 2, '2019-02-26 18:41:58', '2019-02-26 18:41:58', NULL),
(6, 36, 1, 2, '2019-02-26 18:41:58', '2019-02-26 18:41:58', NULL),
(7, 37, 1, 3, '2019-02-27 14:15:02', '2019-02-27 14:15:02', NULL),
(8, 35, 1, 3, '2019-02-27 14:15:02', '2019-02-27 14:15:02', NULL),
(9, 38, 1, 4, '2019-02-27 14:21:42', '2019-02-27 14:21:42', NULL),
(10, 36, 1, 4, '2019-02-27 14:21:42', '2019-02-27 14:21:42', NULL),
(11, 38, 1, 5, '2019-02-27 14:22:48', '2019-02-27 14:22:48', NULL),
(12, 36, 1, 5, '2019-02-27 14:22:48', '2019-02-27 14:22:48', NULL),
(13, 36, 1, 6, '2019-02-27 14:23:14', '2019-02-27 14:23:14', NULL),
(14, 34, 1, 6, '2019-02-27 14:23:14', '2019-02-27 14:23:14', NULL),
(15, 38, 1, 7, '2019-02-27 14:23:32', '2019-02-27 14:23:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_grub_soal`
--

CREATE TABLE `tb_grub_soal` (
  `id` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_grub_soal`
--

INSERT INTO `tb_grub_soal` (`id`, `id_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 1, '2019-02-25 12:55:41', '2019-02-25 12:55:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawab_kuis`
--

CREATE TABLE `tb_jawab_kuis` (
  `id` int(10) NOT NULL,
  `id_soal` int(10) DEFAULT NULL,
  `jawaban` text,
  `id_user` int(10) DEFAULT NULL,
  `jawabkuis_id` int(10) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jawab_kuis`
--

INSERT INTO `tb_jawab_kuis` (`id`, `id_soal`, `jawaban`, `id_user`, `jawabkuis_id`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 8, '<p>wegwergwrwrhrw</p>', 5, 1, NULL, '2019-03-02 08:41:22', '2019-03-02 08:41:22', NULL),
(9, 9, '<p>egwegwegg</p>', 5, 2, NULL, '2019-03-02 08:42:36', '2019-03-02 08:42:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(10) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Teknik Informatika', '2019-09-13 16:00:00', '2019-02-11 17:14:03', '2019-02-11 17:14:03'),
(2, 'Teknik Elektro', '2019-02-09 16:00:00', '2019-02-11 17:14:27', '2019-02-11 17:14:27'),
(23, 'vve', '2019-02-11 17:11:00', '2019-02-11 17:11:13', '2019-02-11 17:11:13'),
(24, 'Teknik Informatika ferdinan', '2019-02-11 17:14:46', '2019-02-11 17:18:51', '2019-02-11 17:18:51'),
(25, 'ferdinan', '2019-02-11 17:16:25', '2019-02-11 17:17:36', '2019-02-11 17:17:36'),
(26, 'fsfsf', '2019-02-11 17:17:22', '2019-02-11 17:17:29', '2019-02-11 17:17:29'),
(27, 'Teknik  Informatika', '2019-02-11 17:19:29', '2019-02-15 17:16:12', NULL),
(28, 'Teknik Elektro', '2019-02-11 17:20:10', '2019-02-24 02:06:13', NULL),
(29, '<script>alert(\'sukses\')</script>', '2019-02-11 17:21:18', '2019-02-11 17:21:26', '2019-02-11 17:21:26'),
(30, 'fwfwfw', '2019-02-12 06:18:20', '2019-02-12 06:18:32', '2019-02-12 06:18:32'),
(31, 'Teknik Pertambangang', '2019-02-12 16:17:00', '2019-02-12 16:17:15', '2019-02-12 16:17:15'),
(32, 'ferdinan', '2019-02-13 13:51:53', '2019-02-13 13:52:03', '2019-02-13 13:52:03'),
(33, '<script>location=\"index.php\"</script>', '2019-02-13 14:05:14', '2019-02-13 16:23:39', '2019-02-13 16:23:39'),
(34, '<script>alert(\"8\")</script>', '2019-02-13 14:05:54', '2019-02-13 16:23:45', '2019-02-13 16:23:45'),
(35, 'echo \'test\';', '2019-02-13 14:06:11', '2019-02-13 16:23:52', '2019-02-13 16:23:52'),
(36, 'Bahasa Indonesia', '2019-02-15 12:34:08', '2019-02-15 12:34:17', '2019-02-15 12:34:17'),
(37, 'wrwr', '2019-02-19 11:52:07', '2019-02-19 11:52:12', '2019-02-19 11:52:12'),
(38, 'Teknik Pertambangan', '2019-02-22 00:51:27', '2019-02-23 00:04:40', '2019-02-23 00:04:40'),
(39, 'Teknik Pertambangan', '2019-02-24 02:06:22', '2019-02-25 15:19:43', '2019-02-25 15:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(10) NOT NULL,
  `id_matkul` int(10) NOT NULL,
  `jml_max` int(10) NOT NULL,
  `id_user` int(10) NOT NULL COMMENT 'Dosen',
  `jadwal` enum('01','02') NOT NULL,
  `semester` int(5) NOT NULL,
  `Token` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `id_matkul`, `jml_max`, `id_user`, `jadwal`, `semester`, `Token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 20, 26, '02', 3, 'WG1W7M', '2019-02-25 12:55:41', '2019-02-26 18:41:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `nama_file` varchar(225) NOT NULL,
  `ukuran_file` varchar(255) NOT NULL,
  `url` varchar(225) DEFAULT NULL,
  `thn_materi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id` int(10) NOT NULL,
  `kode_matkul` char(13) DEFAULT NULL,
  `nama_matkul` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id`, `kode_matkul`, `nama_matkul`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0001', 'bahasa Indonesia', 'Matakuliah Umum', '2019-02-13 16:23:09', '2019-02-13 16:23:09', NULL),
(2, '0002', 'Bahasa Inggris', 'Matakuliah Umum', '2019-09-13 16:00:00', '2019-02-09 16:00:00', NULL),
(3, '00010', 'Matematika', 'Matakuliah Umum', '2019-09-13 16:00:00', '2019-02-14 16:49:37', NULL),
(4, '0004', 'MPPL', 'Matakuliah Umum', '2019-02-09 16:00:00', '2019-02-24 02:08:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `jawabkuis_id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(10) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `no_induk` varchar(25) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `kelas` enum('1','2') DEFAULT NULL,
  `id_jurusan` int(10) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `semester` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama`, `no_induk`, `no_tlp`, `email`, `kelas`, `id_jurusan`, `id_user`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'ferdinan', '201512040', '0895364491686', 'zulfikar@gmail.com', NULL, NULL, 5, NULL, '2019-02-13 14:23:47', '2019-02-13 14:23:47', NULL),
(5, 'Zulfikar Hemansyah', '201512044', '0895364491686', 'email@gmail.com', NULL, NULL, 6, NULL, '2019-02-13 14:24:59', '2019-02-17 13:29:12', NULL),
(11, 'Zulkifikar', '201512040', '0895364491686', 'zul@gmail.com', '1', 28, 17, 1, '2019-02-15 17:52:10', '2019-02-17 06:00:16', NULL),
(12, 'sidar', '201512040', '0895364491686', 'gg@gmail.com', NULL, NULL, 19, NULL, '2019-02-16 01:26:35', '2019-02-16 02:30:09', NULL),
(13, 'ferdinan', '201512030', '081349373642', 'sfdsfsf@gmail.com', NULL, NULL, 20, NULL, '2019-02-16 01:27:23', '2019-02-17 04:29:24', NULL),
(14, 'ferdinandd', '20151270', '0895364491686', 'admin1234@gmail.com', NULL, NULL, 21, NULL, '2019-02-17 04:15:50', '2019-02-17 04:28:50', NULL),
(15, 'Zulkifli', '201512030', '0895364491686', 'zulfikar@gmail.com1', '2', 28, 22, 3, '2019-02-17 05:56:31', '2019-02-17 05:56:31', NULL),
(16, 'ferdinan', '13131663', '0895364491686', 'zulfikar2@gmail.com', '2', 27, 23, 6, '2019-02-17 06:01:12', '2019-02-17 06:01:12', NULL),
(17, 'Budi', '13131663', '0895364491686', 'zulfikar5gmail.com', '2', 28, 24, 3, '2019-02-17 06:02:03', '2019-02-17 06:02:03', NULL),
(18, 'Hermansyah', '22232353546467', '0895364491686', 'email@gmail.com1', NULL, NULL, 25, NULL, '2019-02-17 13:20:46', '2019-02-17 13:20:46', NULL),
(19, 'Budianto', '1234562424244', '0895364491686', 'email@gmail.com2', NULL, NULL, 26, NULL, '2019-02-17 13:29:58', '2019-02-22 12:05:34', NULL),
(20, 'Siti Rizqa', '1234562424', '0895364491686', 'verdi@nirv.com', NULL, NULL, 27, NULL, '2019-02-17 13:34:12', '2019-02-17 13:39:46', NULL),
(21, 'ferdinan', '67472', '0895364491686', 's@gmail.com', NULL, NULL, 28, NULL, '2019-02-18 14:12:03', '2019-02-18 14:12:03', NULL),
(22, 'gunawan', '12345624242', '08755757', 'gunawan@gmail.com', NULL, NULL, 29, NULL, '2019-02-21 04:55:20', '2019-02-21 04:55:20', NULL),
(23, 'siti budiman', '201512040', '085651', 'siti@gmail.com', '2', 27, 30, 5, '2019-02-22 00:28:56', '2019-02-22 00:28:56', NULL),
(24, 'budianto roto', '824267428', '4284628642', 'budiantotoro@gmail.com', '2', 27, 31, 7, '2019-02-22 00:32:10', '2019-02-22 00:32:10', NULL),
(25, 'ardiansyah', '20182424', '2402840824', 'tt3@gmail.com', '1', 27, 32, 6, '2019-02-22 00:39:18', '2019-02-22 00:39:18', NULL),
(26, 'giranda', '242424', '24242', 'giranda', '2', 28, 33, 3, '2019-02-22 00:41:30', '2019-02-22 00:41:30', NULL),
(27, 'testing', '6756357', '535863563', 'testing@gmail.com', '2', 27, 34, 1, '2019-02-22 00:42:45', '2019-02-22 00:42:56', NULL),
(28, 'girard', '7247824', '462746724', 'girad@gmail.com', '2', 38, 35, 6, '2019-02-22 00:53:44', '2019-02-22 00:53:44', NULL),
(29, 'wfwfwfw', '2018836173', '53', 'dd@gmail.com', '2', 28, 36, 3, '2019-02-22 00:56:58', '2019-02-22 00:56:58', NULL),
(30, 'fsfsf', '35353', '35646', 'fff@gamil.com', '2', 28, 37, 2, '2019-02-22 00:58:09', '2019-02-22 00:58:09', NULL),
(31, 'hhhbdfbf', '8585445', '684654654', 'hh@gmail.com', '2', 28, 38, 1, '2019-02-22 00:59:58', '2019-02-22 06:27:54', NULL),
(32, 'ferdinan', '22232353546467', '0895364491686', 'dddd@gmail.com', NULL, NULL, 39, NULL, '2019-02-22 06:25:02', '2019-02-22 06:25:02', NULL),
(33, 'mobil', '13131663', '0895364491686', 'b@gmail.com', '2', 38, 40, 7, '2019-02-22 06:28:32', '2019-02-22 06:28:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_quote`
--

CREATE TABLE `tb_quote` (
  `id` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `text_quote` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_quote`
--

INSERT INTO `tb_quote` (`id`, `foto`, `nama`, `text_quote`, `created_at`, `updated_at`) VALUES
(1, '1550822247.jpg', 'ferdinan', 'uubjbhvh', '2019-02-22 06:57:27', '2019-02-22 06:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(10) NOT NULL,
  `id_grub_soal` int(10) NOT NULL,
  `soal_id` int(10) NOT NULL,
  `ket_soal` text,
  `file_soal` varchar(500) DEFAULT NULL,
  `waktu` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id`, `id_grub_soal`, `soal_id`, `ket_soal`, `file_soal`, `waktu`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 9, 4, 'apa itu negara amaerika', '64985866.jpg', 30, '2', '2019-02-26 17:40:17', '2019-03-02 08:41:22', NULL),
(9, 9, 4, 'Apa itu negara indonesia', '262392583.jpg', 30, '2', '2019-02-26 17:40:17', '2019-03-02 08:42:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(10) NOT NULL,
  `color` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `id_role`, `color`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'ferdinan', 'zulfikar@gmail.com', '$2y$10$vnUYSDOULwy7JZBrV/m2N.UlCnAGdYSuydoArL3plhGLlE/XTDLl.', 2, 'bg-secondary', '2hIQWrbU6LtwMXih93rogeSszSQpEFtQtwbY7hX9l90okaWEMIF8Vgl7FZOW', '2019-02-13 14:23:47', '2019-02-27 10:43:49'),
(6, 'Zulfikar', 'email@gmail.com', '$2y$10$HU8ccP2M0FRVXphXMZBgs.A.QL8OXQplSd.QXLsmQ.RxOvlb74XEi', 3, 'bg-success', NULL, '2019-02-13 14:24:59', '2019-02-13 14:24:59'),
(17, 'Zulkifli', 'zul@gmail.com', '$2y$10$lnwlFV64x8HTOIAhNM2LdeMNQ48d0Mvbq9ZiXbaohg7roO7VwCZeG', 4, 'bg-primary', NULL, '2019-02-15 17:52:10', '2019-02-15 17:52:10'),
(19, 'sidar', 'gg@gmail.com', '$2y$10$DK.0nkUvuKOqra55LdIPXe.Ay5HZE264HVgjAQLw4nwXmepWUD5fi', 2, 'bg-success', NULL, '2019-02-16 01:26:35', '2019-02-16 01:26:35'),
(20, 'ferdinan', 'sfdsfsf@gmail.com', '$2y$10$LyFn4kG3Q5EnneoM5KsXt...5kS8L6RukxuLnQFqZ6YItdht9IyEO', 2, 'bg-primary', NULL, '2019-02-16 01:27:23', '2019-02-16 01:27:23'),
(21, 'ferdinan', 'admin1234@gmail.com', '$2y$10$8n/wMafJsyF5ek/ASVbtQepvtWEiXK6fqkIIMRgK8shzgdKNJT7we', 1, 'bg-success', '5VIUAs7LCtoECiYoqQEo33VekloKRixyGM8MMB3BXeIWN4W7aKhJfjjJynp4', '2019-02-17 04:15:50', '2019-02-17 04:15:50'),
(22, 'Zulkifli', 'zulfikar@gmail.com1', '$2y$10$i3VuA8gVTra/VGlCZ6gOIuZx04dyNLvuPtqEnsViSy1MC8iktzoqG', 4, 'bg-primary', NULL, '2019-02-17 05:56:30', '2019-02-17 05:56:30'),
(23, 'ferdinan', 'zulfikar2@gmail.com', '$2y$10$HL1JtHm4OQ5hnESlJkAcJOom1PxyBZpUsDIgFxtsVEvrtxFCo67Zu', 4, 'bg-secondary', NULL, '2019-02-17 06:01:12', '2019-02-17 06:01:12'),
(24, 'Budi', 'zulfikar5gmail.com', '$2y$10$nF7E30Nbtdjhg9UVQMFocOeX57EVotNGbPtxKtTKC5R675mRCgP4a', 4, 'bg-success', NULL, '2019-02-17 06:02:03', '2019-02-17 06:02:03'),
(25, 'Hermansyah', 'email@gmail.com1', '$2y$10$Zyznd5W6xNnw5ETTJMArP.iQMVAdxicxp6AvyrzbnGONdN/l2.zlS', 1, 'bg-danger', 'Mti9YfxeJwqMprSBqW2nszr1xQgXuAE5xXMTY94HqsqDCybWECQpkweQaqpQ', '2019-02-17 13:20:46', '2019-02-17 13:20:46'),
(26, 'Budianto', 'email@gmail.com2', '$2y$10$06PjuMIypPMR2zvCdeTNFu/CXNWytoraEzcvsJysRMpPZvleYJZzC', 3, 'bg-dark', NULL, '2019-02-17 13:29:58', '2019-02-17 13:29:58'),
(27, 'Siti Rizqa', 'ferdian1_verdi@nirvanafans.com', '$2y$10$zNT.z94Bl0JsdCWpxtJd3OIeyeItgrnqX.RAOK76s24K9dg8wa94.', 1, 'bg-dark', NULL, '2019-02-17 13:34:11', '2019-02-17 13:34:11'),
(28, 'ferdinan', 's@gmail.com', '$2y$10$vTkVZuWaAJEzA52tF9Rc7u94bhtrYVapCjSl4ZToX2Hw97oYqH9we', 3, 'bg-secondary', NULL, '2019-02-18 14:12:02', '2019-02-18 14:12:02'),
(29, 'gunawan', 'gunawan@gmail.com', '$2y$10$LdAfqk3zwYTU7hbxC4bvyunCsGO3OyWoi9ZHucYun9QCc6KRNatt2', 1, 'bg-primary', 'qHPuwVYohmaUR7IcyNnsUae66rNEiy5T1anRska6qkb7hKSkHAWneqHkDRLN', '2019-02-21 04:55:20', '2019-02-21 04:55:20'),
(30, 'siti budiman', 'siti@gmail.com', '$2y$10$vVO8knUNFjpRu8GL3FLKKubNuNjYmY.ZWGcMjbap/NdjnAIkb/f0a', 4, 'bg-secondary', NULL, '2019-02-22 00:28:56', '2019-02-22 00:28:56'),
(31, 'budianto roto', 'budiantotoro@gmail.com', '$2y$10$bb6VF6ReuJcnkHOIE7Ca3eAqWtelCkUlCEZlHXj.AaIg88iDWTf1K', 4, 'bg-info', NULL, '2019-02-22 00:32:10', '2019-02-22 00:32:10'),
(32, 'ardiansyah', 'tt3@gmail.com', '$2y$10$jRBfFIMOczReczK3.E40uOmHnCvQszXP9pjev0g7uXx20eeTYwjlq', 4, 'bg-secondary', NULL, '2019-02-22 00:39:18', '2019-02-22 00:39:18'),
(33, 'giranda', 'giranda', '$2y$10$Flle6Ayq77c69MO/ANYqd.16cVGFMOjWoaIx4DVxJj2W313yrCQhy', 4, 'bg-danger', NULL, '2019-02-22 00:41:29', '2019-02-22 00:41:29'),
(34, 'testing', 'testing@gmail.com', '$2y$10$B9U3QZMptoBW2btmr4DuN.JZycftjp/gkdTPkAcX98Rm25dAJJVJm', 4, 'bg-info', NULL, '2019-02-22 00:42:45', '2019-02-22 00:42:45'),
(35, 'girard', 'girad@gmail.com', '$2y$10$9gv7x6xg/a/RMNq2ja1/f.T9LZGixBJczO8nasoGUBsnpiK7sulSe', 4, 'bg-primary', NULL, '2019-02-22 00:53:44', '2019-02-22 00:53:44'),
(36, 'wfwfwfw', 'dd@gmail.com', '$2y$10$yDRaEiiZ1JLig2H0v2oYtu3b6SNjj2fpDFhxJy0lfgGmlP7XpNY8m', 4, 'bg-danger', NULL, '2019-02-22 00:56:58', '2019-02-22 00:56:58'),
(37, 'fsfsf', 'fff@gamil.com', '$2y$10$dc1WLcQbOOrbFZBWrPUze.qDNhL3ne5RM6OyOAQOS3lcoi.S4COg.', 4, 'bg-info', NULL, '2019-02-22 00:58:09', '2019-02-22 00:58:09'),
(38, 'hhh', 'hh@gmail.com', '$2y$10$R7TYOykE20Ayny.NURMaoO2OjzPGAiy6e1OzKxb1sEUlTKrI2lmBy', 4, 'bg-info', NULL, '2019-02-22 00:59:57', '2019-02-22 00:59:57'),
(39, 'ferdinan', 'dddd@gmail.com', '$2y$10$HC8OT74feTOn34/RkOE6buultrDqYjqqvVluJmfoSmSkol2uIMWhe', 3, 'bg-primary', NULL, '2019-02-22 06:25:01', '2019-02-22 06:25:01'),
(40, 'mobil', 'b@gmail.com', '$2y$10$edAySStyx7gfZZsLsLKobe1gfm8HVYW0YcQjtAvLUU.0nTqXJK8bq', 4, 'bg-success', NULL, '2019-02-22 06:28:32', '2019-02-22 06:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 2, 5, '2019-02-13 14:23:47', '2019-02-13 14:23:47'),
(5, 3, 6, '2019-02-13 14:24:59', '2019-02-13 14:24:59'),
(11, 4, 17, '2019-02-15 17:52:10', '2019-02-15 17:52:10'),
(12, 2, 19, '2019-02-16 01:26:35', '2019-02-16 01:26:35'),
(13, 2, 20, '2019-02-16 01:27:23', '2019-02-16 01:27:23'),
(14, 1, 21, '2019-02-17 04:15:50', '2019-02-17 04:15:50'),
(15, 4, 22, '2019-02-17 05:56:31', '2019-02-17 05:56:31'),
(16, 4, 23, '2019-02-17 06:01:12', '2019-02-17 06:01:12'),
(17, 4, 24, '2019-02-17 06:02:03', '2019-02-17 06:02:03'),
(18, 1, 25, '2019-02-17 13:20:46', '2019-02-17 13:20:46'),
(19, 3, 26, '2019-02-17 13:29:58', '2019-02-17 13:29:58'),
(20, 1, 27, '2019-02-17 13:34:12', '2019-02-17 13:34:12'),
(21, 3, 28, '2019-02-18 14:12:03', '2019-02-18 14:12:03'),
(22, 1, 29, '2019-02-21 04:55:20', '2019-02-21 04:55:20'),
(23, 4, 30, '2019-02-22 00:28:56', '2019-02-22 00:28:56'),
(24, 4, 31, '2019-02-22 00:32:10', '2019-02-22 00:32:10'),
(25, 4, 32, '2019-02-22 00:39:18', '2019-02-22 00:39:18'),
(26, 4, 33, '2019-02-22 00:41:30', '2019-02-22 00:41:30'),
(27, 4, 34, '2019-02-22 00:42:45', '2019-02-22 00:42:45'),
(28, 4, 35, '2019-02-22 00:53:44', '2019-02-22 00:53:44'),
(29, 4, 36, '2019-02-22 00:56:58', '2019-02-22 00:56:58'),
(30, 4, 37, '2019-02-22 00:58:09', '2019-02-22 00:58:09'),
(31, 4, 38, '2019-02-22 00:59:58', '2019-02-22 00:59:58'),
(32, 3, 39, '2019-02-22 06:25:02', '2019-02-22 06:25:02'),
(33, 4, 40, '2019-02-22 06:28:32', '2019-02-22 06:28:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_grub_kelas`
--
ALTER TABLE `tb_grub_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_grub_kelas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `tb_grub_kelas_id_user_foreign` (`id_user`);

--
-- Indexes for table `tb_grub_soal`
--
ALTER TABLE `tb_grub_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_grub_soal_id_kelasl_foreign` (`id_kelas`);

--
-- Indexes for table `tb_jawab_kuis`
--
ALTER TABLE `tb_jawab_kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_jawab_kuis_id_soal_foreign_key` (`id_soal`),
  ADD KEY `tb_jawab_kuis_id_user_foreign_key` (`id_user`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_kelas_id_matkul_foreign` (`id_matkul`),
  ADD KEY `tb_kelas_id_user_foreign` (`id_user`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_materi_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD KEY `tb_nilai_id_jawab_kuis_foreign` (`jawabkuis_id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pengguna_id_jurusan_foreign` (`id_jurusan`),
  ADD KEY `tb_pengguna_id_user_foreign` (`id_user`);

--
-- Indexes for table `tb_quote`
--
ALTER TABLE `tb_quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_soal_id_grub_soal_foreign` (`id_grub_soal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_grub_kelas`
--
ALTER TABLE `tb_grub_kelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_grub_soal`
--
ALTER TABLE `tb_grub_soal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jawab_kuis`
--
ALTER TABLE `tb_jawab_kuis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_quote`
--
ALTER TABLE `tb_quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_grub_kelas`
--
ALTER TABLE `tb_grub_kelas`
  ADD CONSTRAINT `tb_grub_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_grub_kelas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_grub_soal`
--
ALTER TABLE `tb_grub_soal`
  ADD CONSTRAINT `tb_grub_soal_id_kelasl_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_jawab_kuis`
--
ALTER TABLE `tb_jawab_kuis`
  ADD CONSTRAINT `tb_jawab_kuis_id_soal_foreign_key` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_jawab_kuis_id_user_foreign_key` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_id_matkul_foreign` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_kelas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_id_jawab_kuis_foreign` FOREIGN KEY (`jawabkuis_id`) REFERENCES `tb_jawab_kuis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_pengguna_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_id_grub_soal_foreign` FOREIGN KEY (`id_grub_soal`) REFERENCES `tb_grub_soal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
