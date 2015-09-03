-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Sep 2015 pada 11.56
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id`, `kode`, `uraian`, `nilai`, `tahun`, `level`, `lembaga_id`, `dana_id`, `created_at`, `updated_at`) VALUES
(1, '1.01 . 1.01.01 . 00.00 . 5', 'Belanja', 1875954198733, 2014, 1, 1, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(2, '1.01 . 1.01.01 . 00.00 . 5.1', 'Belanja Tidak Langsung', 1572323694464, 2014, 2, 1, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(3, '1.01 . 1.01.01 . 00.00 . 5.1.1', 'Belanja Pegawai', 1572323694464, 2014, 3, 1, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(4, '1.01 . 1.01.01 . 01.01 . 5.2', 'Belanja Langsung', 303630504269, 2014, 2, 1, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(5, '1.01 . 1.01.01 . 00.00 . 5', 'Belanja', 1913422711986, 2015, 1, 1, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(6, '1.01 . 1.01.01 . 00.00 . 5.1', 'Belanja Tidak Langsung', 1698923319688, 2015, 2, 1, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(7, '1.01 . 1.01.01 . 00.00 . 5.1.1', 'Belanja Pegawai', 1698923319688, 2015, 3, 1, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(8, '1.01 . 1.01.01 . 01.01 . 5.2', 'Belanja Langsung', 214499392297, 2014, 2, 1, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(9, '1.02 . 1.02.01 . 00.00 . 5', 'Belanja', 280751952803, 2014, 1, 2, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(10, '1.02 . 1.02.01 . 00.00 . 5.1', 'Belanja Tidak Langsung', 90030560100, 2014, 2, 2, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(11, '1.02 . 1.02.01 . 00.00 . 5.1.1', 'Belanja Pegawai', 90030560100, 2014, 3, 2, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(12, '1.02 . 1.02.01 . 01.02 . 5.2', 'Belanja Langsung', 190721392703, 2014, 2, 2, NULL, '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(13, '1.02 . 1.02.01 . 00.00 . 5', 'Belanja', 333472104941, 2015, 1, 2, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(14, '1.02 . 1.02.01 . 00.00 . 5.1', 'Belanja Tidak Langsung', 95963468447, 2015, 2, 2, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(15, '1.02 . 1.02.01 . 00.00 . 5.1.1', 'Belanja Pegawai', 95963468447, 2015, 3, 2, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(16, '1.02 . 1.02.01 . 01.02 . 5.2', 'Belanja Langsung', 237508636494, 2015, 2, 2, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(17, '1.02 . 1.02.01 . 00.00 . 4', 'Pendapatan', 50341575500, 2014, 1, 2, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(18, '1.02 . 1.02.01 . 00.00 . 4.1', 'Pendapatan Asli Daerah', 50341575500, 2014, 2, 2, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(19, '1.02 . 1.02.01 . 00.00 . 4', 'Pendapatan', 63200000000, 2015, 1, 2, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(20, '1.02 . 1.02.01 . 00.00 . 4.1', 'Pendapatan Asli Daerah', 63200000000, 2015, 2, 2, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(21, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 10702645000, 2014, 1, 55, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(22, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4753445000, 2014, 2, 55, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(23, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4753445000, 2014, 3, 55, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(24, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 5949200000, 2014, 2, 55, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(25, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 17306288343, 2015, 1, 55, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(26, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4953336772, 2015, 2, 55, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(27, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4953336772, 2015, 3, 55, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(28, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 12352951571, 2015, 2, 55, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(29, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 10702645000, 2014, 1, 56, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(30, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4753445000, 2014, 2, 56, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(31, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4753445000, 2014, 3, 56, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(32, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 5949200000, 2014, 2, 56, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(33, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 17306288343, 2015, 1, 56, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(34, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4953336772, 2015, 2, 56, NULL, '2015-09-03 02:48:18', '2015-09-03 02:48:18'),
(35, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4953336772, 2015, 3, 56, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(36, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 12352951571, 2015, 2, 56, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(37, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 10702645000, 2014, 1, 5, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(38, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4753445000, 2014, 2, 5, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(39, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4753445000, 2014, 3, 5, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(40, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 5949200000, 2014, 2, 5, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(41, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 17306288343, 2015, 1, 5, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(42, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4953336772, 2015, 2, 5, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(43, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4953336772, 2015, 3, 5, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(44, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 12352951571, 2015, 2, 5, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(45, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 10702645000, 2014, 1, 6, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(46, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4753445000, 2014, 2, 6, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(47, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4753445000, 2014, 3, 6, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(48, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 5949200000, 2014, 2, 6, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(49, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 17306288343, 2015, 1, 6, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(50, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4953336772, 2015, 2, 6, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(51, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4953336772, 2015, 3, 6, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(52, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 12352951571, 2015, 2, 6, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(53, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 10702645000, 2014, 1, 24, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(54, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4753445000, 2014, 2, 24, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(55, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4753445000, 2014, 3, 24, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(56, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 5949200000, 2014, 2, 24, NULL, '2015-09-03 02:48:19', '2015-09-03 02:48:19'),
(57, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 17306288343, 2015, 1, 24, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(58, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4953336772, 2015, 2, 24, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(59, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4953336772, 2015, 3, 24, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(60, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 12352951571, 2015, 2, 24, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(61, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 10702645000, 2014, 1, 25, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(62, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4753445000, 2014, 2, 25, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(63, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4753445000, 2014, 3, 25, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(64, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 5949200000, 2014, 2, 25, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(65, '1.20 . 1.20.34 . 00.00 . 5', 'Belanja', 17306288343, 2015, 1, 25, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(66, '1.20 . 1.20.34 . 00.00 . 5.1', 'Belanja Tidak Langsung', 4953336772, 2015, 2, 25, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(67, '1.20 . 1.20.34 . 00.00 . 5.1.1', 'Belanja Pegawai', 4953336772, 2015, 3, 25, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(68, '1.20 . 1.20.34 . 01.02 . 5.2', 'Belanja Langsung', 12352951571, 2015, 2, 25, NULL, '2015-09-03 02:48:20', '2015-09-03 02:48:20');

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
(2, 1),
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(4, 5),
(5, 1),
(6, 1),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 5),
(9, 1),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 5),
(13, 1),
(14, 1),
(14, 4),
(15, 1),
(15, 4),
(16, 1),
(16, 5),
(17, 2),
(18, 2),
(18, 3),
(19, 2),
(20, 2),
(20, 3),
(21, 1),
(22, 1),
(22, 4),
(23, 1),
(23, 4),
(24, 1),
(24, 5),
(25, 1),
(26, 1),
(26, 4),
(27, 1),
(27, 4),
(28, 1),
(28, 5),
(29, 1),
(30, 1),
(30, 4),
(31, 1),
(31, 4),
(32, 1),
(32, 5),
(33, 1),
(34, 1),
(34, 4),
(35, 1),
(35, 4),
(36, 1),
(36, 5),
(37, 1),
(38, 1),
(38, 4),
(39, 1),
(39, 4),
(40, 1),
(40, 5),
(41, 1),
(42, 1),
(42, 4),
(43, 1),
(43, 4),
(44, 1),
(44, 5),
(45, 1),
(46, 1),
(46, 4),
(47, 1),
(47, 4),
(48, 1),
(48, 5),
(49, 1),
(50, 1),
(50, 4),
(51, 1),
(51, 4),
(52, 1),
(52, 5),
(53, 1),
(54, 1),
(54, 4),
(55, 1),
(55, 4),
(56, 1),
(56, 5),
(57, 1),
(58, 1),
(58, 4),
(59, 1),
(59, 4),
(60, 1),
(60, 5),
(61, 1),
(62, 1),
(62, 4),
(63, 1),
(63, 4),
(64, 1),
(64, 5),
(65, 1),
(66, 1),
(66, 4),
(67, 1),
(67, 4),
(68, 1),
(68, 5);

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
(1, 'Dinas Pendidikan', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(2, 'Dinas Kesehatan', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(3, 'RSUD BLUD', 'bumd', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(4, 'RSUDD', 'bumd', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(5, 'RSKIA', 'bumd', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(6, 'RSKIA BLUD', 'bumd', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(7, 'RSKGM', 'bumd', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(8, 'RSKGM BLUD', 'bumd', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(9, 'Dinas Bina Marga', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(10, 'Dinas Kebakaran', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(11, 'BAPPEDA', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(12, 'Dinas Perhubungan', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(13, 'BPLH', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(14, 'Dinas Kependudukan', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(15, 'BPPKB', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(16, 'Dinas Sosial', 'dinas', '2015-09-03 02:48:14', '2015-09-03 02:48:14'),
(17, 'Dinas Tenaga Kerja', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(18, 'Dinas Koperasi', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(19, 'BPPT', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(20, 'Dinas Pemuda dan Olah Raga', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(21, 'BKBPM', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(22, 'Satpol PP', 'lain-lain', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(23, 'DPRD', 'lain-lain', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(24, 'Kepala Daerah', 'lain-lain', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(25, 'Sekretariat Daerah', 'lain-lain', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(26, 'Sekretariat Dewan', 'lain-lain', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(27, 'DPKAD SKPD', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(28, 'DPKAD PPKD', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(29, 'Inspektorat Kota', 'lain-lain', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(30, 'Dinas Pelayanan Pajak', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(31, 'Badan Kepegawaian Daerah', 'dinas', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(32, 'Kecamatan Sukasari', 'kecamatan', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(33, 'Kecamatan Cidadap', 'kecamatan', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(34, 'Kecamatan Sukajadi', 'kecamatan', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(35, 'Kecamatan Cicendo', 'kecamatan', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(36, 'Kecamatan Andir', 'kecamatan', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(37, 'Kecamatan Coblong', 'kecamatan', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(38, 'Kecamatan Bandung Wetan', 'kecamatan', '2015-09-03 02:48:15', '2015-09-03 02:48:15'),
(39, 'Kecamatan Sumur Bandung', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(40, 'Kecamatan Cibeunying Kidul', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(41, 'Kecamatan Cibeunying Kaler', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(42, 'Kecamatan Astanaanyar', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(43, 'Kecamatan Bojongloa Kaler', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(44, 'Kecamatan Bojongloa Kidul', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(45, 'Kecamatan Babakan Ciparay', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(46, 'Kecamatan Bandung Kulon', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(47, 'Kecamatan Regol', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(48, 'Kecamatan Lengkong', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(49, 'Kecamatan Batununggal', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(50, 'Kecamatan Ujungberung', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(51, 'Kecamatan Kiaracondong', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(52, 'Kecamatan Arcamanik', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(53, 'Kecamatan Cibiru', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(54, 'Kecamatan Antapani', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(55, 'Kecamatan Rancasari', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(56, 'Kecamatan Buahbatu', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(57, 'Kecamatan Bandung Kidul', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(58, 'Kecamatan Gedebage', 'kecamatan', '2015-09-03 02:48:16', '2015-09-03 02:48:16'),
(59, 'Kecamatan Panyileukan', 'kecamatan', '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(60, 'Kecamatan Cinambo', 'kecamatan', '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(61, 'Kecamatan Mandalajati', 'kecamatan', '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(62, 'Kantor Perpustakaan', 'bumd', '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(63, 'Dinas Komunikasi', 'dinas', '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(64, 'Dinas Pertanian', 'dinas', '2015-09-03 02:48:17', '2015-09-03 02:48:17'),
(65, 'Dinas Pariwisata', 'dinas', '2015-09-03 02:48:17', '2015-09-03 02:48:17');

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
(1, 'Belanja', '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(2, 'Pendapatan', '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(3, 'Pendapatan Asli Daerah', '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(4, 'Belanja Tidak Langsung', '2015-09-03 02:48:20', '2015-09-03 02:48:20'),
(5, 'Belanja Langsung', '2015-09-03 02:48:20', '2015-09-03 02:48:20');

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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
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
