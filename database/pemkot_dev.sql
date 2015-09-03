-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Sep 2015 pada 06.52
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pemkot_dev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE IF NOT EXISTS `dana` (
  `id` int(10) unsigned NOT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uraian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilai` bigint(20) NOT NULL DEFAULT '0',
  `tahun` int(10) unsigned NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '1',
  `lembaga_id` int(11) DEFAULT NULL,
  `dana_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id`, `kode`, `uraian`, `nilai`, `tahun`, `level`, `lembaga_id`, `dana_id`, `created_at`, `updated_at`) VALUES
(1, '1.02 . 1.02.01 . 00 . 00 . 4 . 1 . 2 . 01 . 01', 'Retribusi Pelayanan Kesehatan - Puskesmas', 18200000000, 2015, 5, 2, NULL, '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(2, '1.01 . 1.01.01 . 00 . 00 . 5 . 1 . 1 . 01 . 01', 'Gaji Pokok PNS/Uang Representasi', 18273922, 2015, 5, 1, NULL, '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(3, '1.02 . 1.02.02 . 00.00 . 5.1.1.01', 'Gaji dan Tunjangan', 16141217307, 2014, 4, 4, NULL, '2015-09-02 17:55:57', '2015-09-02 17:55:57'),
(4, '1.02 . 1.02.02 . 00.00 . 5.1.1', 'Belanja Pegawai', 22382059029, 2014, 3, 4, NULL, '2015-09-02 18:02:14', '2015-09-02 18:02:14'),
(5, '1.10 . 1.10.01 . 01.02 . 5.2.2.03.06', 'Belanja kawat/faksimili/internet', 18000000, 2014, 5, 14, NULL, '2015-09-02 20:33:20', '2015-09-02 20:33:20'),
(6, '1.20 . 1.20.26 . 01.13 . 5.2.2.01', 'Belanja Bahan Pakai Habis Kantor', 5655000, 2014, 4, 48, NULL, '2015-09-02 21:07:48', '2015-09-02 21:07:48'),
(7, '1.20 . 1.20.26 . 05 . 04 . 5 . 2 . 2 . 01', 'Belanja Bahan Pakai Habis', 3000000, 2015, 4, 48, NULL, '2015-09-02 21:10:29', '2015-09-02 21:10:29'),
(8, '1.02 . 1.02.02 . 21 . 06 . 5 . 2 . 2 . 11', 'Belanja Makanan dan  Minuman', 500000, 2015, 4, 4, NULL, '2015-09-02 21:14:46', '2015-09-02 21:14:46'),
(9, '1.19 . 1.19.02 . 00 . 00 . 5 . 1 . 1 . 01 . 06', 'Tunjangan Beras', 2170000000, 2015, 5, 22, NULL, '2015-09-02 21:16:41', '2015-09-02 21:16:41'),
(10, '1.20 . 1.20.01 . 00.00 . 5.1.1.01.09', 'Iuran Asuransi Kesehatan', 0, 2014, 5, 23, NULL, '2015-09-02 21:17:48', '2015-09-02 21:17:48');

-- --------------------------------------------------------

--
-- Stand-in structure for view `dana_lengkap`
--
CREATE TABLE IF NOT EXISTS `dana_lengkap` (
`dana_id` int(10) unsigned
,`uraian` varchar(255)
,`nilai` bigint(20)
,`tahun` int(10) unsigned
,`level` int(10) unsigned
,`tipe` varchar(255)
,`nama_lembaga` varchar(255)
,`golongan` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana_tag`
--

CREATE TABLE IF NOT EXISTS `dana_tag` (
  `dana_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `dana_tag`
--

INSERT INTO `dana_tag` (`dana_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 5),
(6, 1),
(6, 5),
(7, 1),
(7, 5),
(8, 1),
(8, 5),
(9, 1),
(9, 4),
(10, 1),
(10, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga`
--

CREATE TABLE IF NOT EXISTS `lembaga` (
  `id` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `golongan` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'lain-lain',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `lembaga`
--

INSERT INTO `lembaga` (`id`, `nama`, `golongan`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Pendidikan', 'dinas', '2015-09-02 17:52:23', '2015-09-02 17:52:23'),
(2, 'Dinas Kesehatan', 'dinas', '2015-09-02 17:52:23', '2015-09-02 17:52:23'),
(3, 'RSUD BLUD', 'bumd', '2015-09-02 17:52:23', '2015-09-02 17:52:23'),
(4, 'RSUDD', 'bumd', '2015-09-02 17:52:23', '2015-09-02 17:52:23'),
(5, 'RSKIA', 'bumd', '2015-09-02 17:52:23', '2015-09-02 17:52:23'),
(6, 'RSKIA BLUD', 'bumd', '2015-09-02 17:52:23', '2015-09-02 17:52:23'),
(7, 'RSKGM', 'bumd', '2015-09-02 17:52:23', '2015-09-02 17:52:23'),
(8, 'RSKGM BLUD', 'bumd', '2015-09-02 17:52:23', '2015-09-02 17:52:23'),
(9, 'Dinas Bina Marga', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(10, 'Dinas Kebakaran', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(11, 'BAPPEDA', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(12, 'Dinas Perhubungan', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(13, 'BPLH', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(14, 'Dinas Kependudukan', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(15, 'BPPKB', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(16, 'Dinas Sosial', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(17, 'Dinas Tenaga Kerja', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(18, 'Dinas Koperasi', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(19, 'BPPT', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(20, 'Dinas Pemuda dan Olah Raga', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(21, 'BKBPM', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(22, 'Satpol PP', 'lain-lain', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(23, 'DPRD', 'lain-lain', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(24, 'Kepala Daerah', 'lain-lain', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(25, 'Sekretariat Daerah', 'lain-lain', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(26, 'Sekretariat Dewan', 'lain-lain', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(27, 'DPKAD SKPD', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(28, 'DPKAD PPKD', 'dinas', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(29, 'Inspektorat Kota', 'lain-lain', '2015-09-02 17:52:24', '2015-09-02 17:52:24'),
(30, 'Dinas Pelayanan Pajak', 'dinas', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(31, 'Badan Kepegawaian Daerah', 'dinas', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(32, 'Kecamatan Sukasari', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(33, 'Kecamatan Cidadap', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(34, 'Kecamatan Sukajadi', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(35, 'Kecamatan Cicendo', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(36, 'Kecamatan Andir', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(37, 'Kecamatan Coblong', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(38, 'Kecamatan Bandung Wetan', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(39, 'Kecamatan Sumur Bandung', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(40, 'Kecamatan Cibeunying Kidul', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(41, 'Kecamatan Cibeunying Kaler', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(42, 'Kecamatan Astanaanyar', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(43, 'Kecamatan Bojongloa Kaler', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(44, 'Kecamatan Bojongloa Kidul', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(45, 'Kecamatan Babakan Ciparay', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(46, 'Kecamatan Bandung Kulon', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(47, 'Kecamatan Regol', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(48, 'Kecamatan Lengkong', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(49, 'Kecamatan Batununggal', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(50, 'Kecamatan Ujungberung', 'kecamatan', '2015-09-02 17:52:25', '2015-09-02 17:52:25'),
(51, 'Kecamatan Kiaracondong', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(52, 'Kecamatan Arcamanik', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(53, 'Kecamatan Cibiru', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(54, 'Kecamatan Antapani', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(55, 'Kecamatan Rancasari', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(56, 'Kecamatan Buahbatu', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(57, 'Kecamatan Bandung Kidul', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(58, 'Kecamatan Gedebage', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(59, 'Kecamatan Panyileukan', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(60, 'Kecamatan Cinambo', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(61, 'Kecamatan Mandalajati', 'kecamatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(62, 'Kantor Perpustakaan', 'bumd', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(63, 'Dinas Komunikasi', 'dinas', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(64, 'Dinas Pertanian', 'dinas', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(65, 'Dinas Pariwisata', 'dinas', '2015-09-02 17:52:26', '2015-09-02 17:52:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_09_02_202330_create_dana_table', 1),
('2015_09_02_202851_create_lembagas_table', 1),
('2015_09_02_202937_create_tags_table', 1),
('2015_09_02_203315_create_dana_tag_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tag`
--

INSERT INTO `tag` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Belanja', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(2, 'Pendapatan', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(3, 'Pendapatan Asli Daerah', '2015-09-02 17:52:26', '2015-09-02 17:52:26'),
(4, 'Belanja Tidak Langsung', '2015-09-02 17:52:27', '2015-09-02 17:52:27'),
(5, 'Belanja Langsung', '2015-09-02 17:52:27', '2015-09-02 17:52:27');

-- --------------------------------------------------------

--
-- Struktur untuk view `dana_lengkap`
--
DROP TABLE IF EXISTS `dana_lengkap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dana_lengkap` AS select `d`.`id` AS `dana_id`,`d`.`uraian` AS `uraian`,`d`.`nilai` AS `nilai`,`d`.`tahun` AS `tahun`,`d`.`level` AS `level`,`t`.`nama` AS `tipe`,`l`.`nama` AS `nama_lembaga`,`l`.`golongan` AS `golongan` from (((`dana` `d` left join `dana_tag` `dt` on((`d`.`id` = `dt`.`dana_id`))) left join `tag` `t` on((`dt`.`tag_id` = `t`.`id`))) left join `lembaga` `l` on((`d`.`lembaga_id` = `l`.`id`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dana`
--
ALTER TABLE `dana`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
