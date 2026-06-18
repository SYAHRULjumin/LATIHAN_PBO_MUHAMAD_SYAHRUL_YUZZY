-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 06:52 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1d_muhamad_syahrul_yuzzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Andi Wijaya', 'SMAN 1 Jakarta', 85.50, 500000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMKN 2 Bandung', 78.00, 500000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMA Kristen 1', 92.25, 500000.00, 'Reguler', 'Kedokteran', 'Kampus Barat', NULL, NULL, NULL, NULL),
(4, 'Dewi Sartika', 'SMAN 3 Semarang', 88.00, 500000.00, 'Reguler', 'Akuntansi', 'Kampus Selatan', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'MAN 1 Yogyakarta', 81.40, 500000.00, 'Reguler', 'Teknik Sipil', 'Kampus Utama', NULL, NULL, NULL, NULL),
(6, 'Fajar UTomo', 'SMAN 5 Surabaya', 79.90, 500000.00, 'Reguler', 'Ilmu Komunikasi', 'Kampus Barat', NULL, NULL, NULL, NULL),
(7, 'Gita Gutawa', 'SMA Pelita Harapan', 95.00, 500000.00, 'Reguler', 'Psikologi', 'Kampus Selatan', NULL, NULL, NULL, NULL),
(8, 'Hadi Syahputra', 'SMAN 1 Medan', 86.00, 300000.00, 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMAN 2 Padang', 89.50, 300000.00, 'Prestasi', NULL, NULL, 'Futsal Putri', 'Provinsi', NULL, NULL),
(10, 'Joko Widodo', 'SMAN 1 Surakarta', 83.00, 300000.00, 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
(11, 'Kurnia Utama', 'SMKN 1 Malang', 87.20, 300000.00, 'Prestasi', NULL, NULL, 'Lomba Kompetensi Siswa', 'Internasional', NULL, NULL),
(12, 'Laras Ati', 'SMA 4 Denpasar', 91.00, 300000.00, 'Prestasi', NULL, NULL, 'Tari Tradisional', 'Provinsi', NULL, NULL),
(13, 'Muhammad Rizky', 'SMAN 8 Jakarta', 94.10, 300000.00, 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(14, 'Nadia Vega', 'SMAN 3 Makassar', 82.50, 300000.00, 'Prestasi', NULL, NULL, 'Pencak Silat', 'Kabupaten', NULL, NULL),
(15, 'Oki Setiana', 'MAN 2 Samarinda', 88.70, 750000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-990/KEDINASAN/2026', 'Kementerian Keuangan'),
(16, 'Putra Perkasa', 'SMAN 1 Palembang', 85.00, 750000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-112/PERHUBUNGAN/2026', 'Kementerian Perhubungan'),
(17, 'Qori Sandi', 'SMAN 2 Pontianak', 80.10, 750000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-445/BUMN/2026', 'PT Pertamina'),
(18, 'Rian Hidayat', 'SMKN 3 Yogyakarta', 86.90, 750000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-771/KOMINFO/2026', 'Kementerian Kominfo'),
(19, 'Siti Aminah', 'SMAN 1 Banda Aceh', 90.30, 750000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-882/KEDINASAN/2026', 'Kementerian Dalam Negeri'),
(20, 'Taufik Hidayat', 'SMAN 1 Bandung', 84.60, 750000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-334/BUMN/2026', 'PT PLN (Persero)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
