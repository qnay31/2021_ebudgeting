-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2022 pada 11.11
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backup_edaily`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pengurus`
--

CREATE TABLE `akun_pengurus` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `profil` varchar(200) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_pengurus`
--

INSERT INTO `akun_pengurus` (`id`, `id_pengurus`, `nama`, `cabang`, `username`, `password`, `profil`, `posisi`) VALUES
(1, 'kepala_cabang', 'Samsul Bahri', 'Bogor', 'kepala_cabang', '$2y$10$1Xsqtyw79xIEqPvy2jHjg.2F3QPVWP1Ppbp/M.U6ZMrd6hizAXChW', 'profil.png', 'Kepala Cabang'),
(2, 'kepala_program', 'Samsul Bahri', 'Bogor', 'program_bogor', '$2y$10$vkpUGik7T1.tmqy7Me4t4OrnF2b3Gpw.GsFiMCC7IoLbI5g2TFa4S', 'profil.png', 'Kepala Program'),
(3, 'kepala_program', 'Muhammad Rizki', 'Depok', 'program_depok', '$2y$10$hMWZ8m8MD9Le6C/nCssWqOoulFQM1wRUUt/70dC8FVjM4rSu3fAzG', 'profil.png', 'Kepala Program'),
(4, 'kepala_logistik', 'Sahila Ilpah', 'Depok', 'kepala_logistik', '$2y$10$xf9OC7SPCgPn4FDDqsP6/.c5H/7RzmK.BiJdhM8eOGERZP1YHLZ96', 'profil.png', 'Kepala Logistik'),
(5, 'ketua_yayasan', 'Riki Subagja', 'Depok', 'riki1011', '$2y$10$qdAhtVahQOaW7P41Bwk.L.E/kgvAjyur9adeW9juohVZ8FNsPPwYy', 'profil.png', 'Ketua Yayasan'),
(6, 'program_pendidikan', 'Isnia Damayanti', 'Depok', 'pendidikan_depok', '$2y$10$wXuUvnbjUwsk6Z30AcPiYOPBkHTgOYr9KIUrTs5L1sF6qdhmTiBxC', 'profil.png', 'Program Pendidikan'),
(7, 'program_pendidikan', 'Sodrun Sahid', 'Bogor', 'pendidikan_bogor', '$2y$10$6yh5Pr3MBFkzq1gICk03fuTA7mtyuqcGXo1XiDAzdpurM29Ik4cFC', 'profil.png', 'Program Pendidikan'),
(8, 'program_kesehatan', 'Ana Nurjanah', 'Depok', 'kesehatan_depok', '$2y$10$avhgae7XdZl27hKNljlJuOmSXl7tIx1bAwUDWy6dVFuxh9PaEs9Z2', 'profil.png', 'Program Kesehatan'),
(9, 'program_kesehatan', 'titi sugianti', 'Bogor', 'kesehatan_bogor', '$2y$10$kFQaWqBRc1dDvXlROvfdJOgLT1Pox4Gjh7d5fQwOG3/16YJyYkkEK', 'profil.png', 'Program Kesehatan'),
(11, 'logistik', 'Nur Shabrina Hidriani', 'Depok', 'logistik_management', '$2y$10$kFQaWqBRc1dDvXlROvfdJOgLT1Pox4Gjh7d5fQwOG3/16YJyYkkEK', 'profil.png', 'Logistik Gedung Management'),
(12, 'logistik', 'Kamila', 'Bogor', 'logistik_bogor', '$2y$10$pMThZcCnCYhXVp/4FKij1uglIby1MG9Sh8EsBjL/Ylz3xtCJ9aUUe', 'profil.png', 'Logistik Gedung Bogor'),
(13, 'kepala_humas', 'Fauzi Rhamadan', 'Depok', 'kepala_humas', '$2y$10$rWyfhhscraw1rkWPaSgNhu0wEyz86nmIXhKIqYn9SfrB.ndYtb2bO', '6156c542dd338.jpg', 'Kepala Humas'),
(14, 'kepala_sekolah', 'Mulyati', 'Depok', 'kepala_sekolah', '$2y$10$rM2US/LG0VP2MvDAvJS/HuudJ7rPE5gWJmCpnbNFfo8NRXudQfTBG', 'profil.png', 'Kepala Sekolah'),
(15, 'kepala_penjemput', 'Nenih', 'Depok', 'kepala_penjemput', '$2y$10$XdnS1cKGc6/hhESBQnhoseV/J4zdQx.zBpCZPRNuBoEaBgtUAibr6', 'profil.png', 'Kepala Penjemput'),
(16, 'ap_kesehatan', 'Jubaedah', 'Depok', 'ap_kesehatan', '$2y$10$6ux0V27NOamthndmGsTHv.QzQCWfxUI2oqGHXzJmPRrDmihWUu3m6', 'profil.png', 'Asisiten Program Kesehatan'),
(17, 'ap_pendidikan', 'Nurhasanah', 'Depok', 'ap_pendidikan', '$2y$10$beMvG0jy.5CxgN.3seTmFOCDwwXFRvpNs0iNbT3tD5SnmiCLjsvBG', 'profil.png', 'Asisten Program Pendidikan'),
(18, 'humas', 'Bukit Deko Nov', 'Depok', 'humas', '$2y$10$p8YDnsIHtYXNbMMHKv5nsu7ovwPbhbwUDnDXllSx0BYHbei9Pk/OG', 'profil.png', 'Humas'),
(22, 'logistik', 'Muhammad Sauqi Mubarok', 'Depok', 'logistik_c', '$2y$10$woIC3WlkY5BJv8aZqMprwerYwDPNv2EeKmRUoUbFnTEvkqdYHx9gC', 'profil.png', 'Logistik Gedung C'),
(23, 'logistik', 'Pimpi Ayu Nuraini', 'Depok', 'logistik_taman', '$2y$10$GyObTR09hSw5KVUoNuK4z.Mp/rtMtfsg2mT0uM50tJjcpc/HYd/nu', 'profil.png', 'Logistik Gedung Taman'),
(24, 'logistik', 'Mutmainah', 'Depok', 'logistik_a', '$2y$10$xf9OC7SPCgPn4FDDqsP6/.c5H/7RzmK.BiJdhM8eOGERZP1YHLZ96', 'profil.png', 'Logistik Gedung A'),
(25, 'logistik', 'Nur Fauziah', 'Depok', 'instagram_logistik', '$2y$10$ptOJBRhcNgmbyKFm1ODuhOyBzTcXneG99MGYaORH2ivMLBY2MY0Bi', 'profil.png', 'Logistik Gedung Instagram'),
(26, 'logistik', 'Firda Alya', 'Depok', 'gedungb_logistik', '$2y$10$ni.3RlzccvujyYPoybkP8utE72CF0Cp3c.Eb7JIIXnnNImfHQsiba', 'profil.png', 'Logistik Gedung B'),
(27, 'humas', 'Dede Ismail ', 'Depok', 'dedeismail', '$2y$10$oltXflm2k76ECTcxHi5OGeSbXuv2Abk2YWJKPcYEa7WWHhDD/tVhS', 'profil.png', 'Humas'),
(28, 'logistik', 'Winda Fatimah', 'Depok', 'logistik_d', '$2y$10$1CAcU3FkoWnJI9.nz7ui8u9RV/ow/jQN42skxLbJy2Yv.OUSGzJoq', 'profil.png', 'Logistik Gedung D'),
(37, 'kepala_income', 'Sarah Oktaviani', 'Depok', 'kepala_income', '$2y$10$8kSbKtyIbkRT67Vj48b8Z.D7D6Bl9WISmQgLgnbAHsLRIOqNEzmVC', 'profil.png', 'Kepala Income'),
(38, 'kepala_produksi', 'Meylisa Dwi Anggraheni Puspitasari', 'Depok', 'kepala_produksi', '$2y$10$RzWUjovk4gSlB0wGe7FvY.fYKAOTDgipQTbz8cXzxUEcG8WuRSokS', 'profil.png', 'Kepala Produksi'),
(39, 'kepala_admin', 'amin', 'Depok', 'kepala_admin', '$2y$10$RzWUjovk4gSlB0wGe7FvY.fYKAOTDgipQTbz8cXzxUEcG8WuRSokS', 'profil.png', 'Kepala Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran_lain`
--

CREATE TABLE `anggaran_lain` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `deskripsi` text NOT NULL,
  `dana_anggaran` varchar(250) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `pemakaian` text NOT NULL,
  `dana_terpakai` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_yayasan`
--

CREATE TABLE `aset_yayasan` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `deskripsi` text NOT NULL,
  `qty_anggaran` varchar(200) NOT NULL,
  `dana_anggaran` varchar(250) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `pemakaian` text NOT NULL,
  `qty_pembelian` varchar(100) NOT NULL,
  `dana_terpakai` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `backup_income`
--

CREATE TABLE `backup_income` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `gedung` varchar(200) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `income` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `baksos`
--

CREATE TABLE `baksos` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `program` varchar(250) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `dana_anggaran` varchar(200) NOT NULL,
  `tgl_pemakaian` date NOT NULL,
  `deskripsi_pemakaian` varchar(200) NOT NULL,
  `dana_terpakai` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cashback`
--

CREATE TABLE `cashback` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `tgl_cashback` date NOT NULL,
  `deskripsi` text NOT NULL,
  `cashback` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daily_report`
--

CREATE TABLE `daily_report` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `aktivitas` varchar(250) NOT NULL,
  `tgl_aktivitas` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_aset_yayasan`
--

CREATE TABLE `data_aset_yayasan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_aset_yayasan`
--

INSERT INTO `data_aset_yayasan` (`id`, `bulan`, `tahun`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '', ''),
(2, 'Februari', '2021', '', ''),
(3, 'Maret', '2021', '', ''),
(4, 'April', '2021', '', ''),
(5, 'Mei', '2021', '', ''),
(6, 'Juni', '2021', '', ''),
(7, 'Juli', '2021', '', ''),
(8, 'Agustus', '2021', '', ''),
(9, 'September', '2021', '', ''),
(10, 'Oktober', '2021', '', ''),
(11, 'November', '2021', '', ''),
(12, 'Desember', '2021', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_baksos`
--

CREATE TABLE `data_baksos` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_baksos`
--

INSERT INTO `data_baksos` (`id`, `bulan`, `tahun`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '71600000', '66672000'),
(2, 'Februari', '2021', '43515000', '37297000'),
(3, 'Maret', '2021', '156951000', '135055983'),
(4, 'April', '2021', '', ''),
(5, 'Mei', '2021', '359041000', '351422384'),
(6, 'Juni', '2021', '181010000', '109620000'),
(7, 'Juli', '2021', '', ''),
(8, 'Agustus', '2021', '', ''),
(9, 'September', '2021', '30551500', '28450500'),
(10, 'Oktober', '2021', '18517000', '16552000'),
(11, 'November', '2021', '', ''),
(12, 'Desember', '2021', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cashback`
--

CREATE TABLE `data_cashback` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `cashback_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_cashback`
--

INSERT INTO `data_cashback` (`id`, `bulan`, `tahun`, `cashback_global`) VALUES
(1, 'Januari', '2021', ''),
(2, 'Februari', '2021', ''),
(3, 'Maret', '2021', ''),
(4, 'April', '2021', ''),
(5, 'Mei', '2021', ''),
(6, 'Juni', '2021', ''),
(7, 'Juli', '2021', ''),
(8, 'Agustus', '2021', ''),
(9, 'September', '2021', ''),
(10, 'Oktober', '2021', ''),
(11, 'November', '2021', '49061700'),
(12, 'Desember', '2021', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gaji`
--

CREATE TABLE `data_gaji` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_gaji_depok` varchar(100) NOT NULL,
  `terpakai_gaji_depok` varchar(100) NOT NULL,
  `anggaran_gaji_bogor` varchar(100) NOT NULL,
  `terpakai_gaji_bogor` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_gaji`
--

INSERT INTO `data_gaji` (`id`, `bulan`, `tahun`, `anggaran_gaji_depok`, `terpakai_gaji_depok`, `anggaran_gaji_bogor`, `terpakai_gaji_bogor`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '158320000', '158320000', '49212000', '49212000', '207532000', '207532000'),
(2, 'Februari', '2021', '190140000', '190140000', '48455000', '48455000', '238595000', '238595000'),
(3, 'Maret', '2021', '230500000', '230350000', '87820000', '87820000', '318320000', '318170000'),
(4, 'April', '2021', '271493846', '254943271', '73771154', '73771154', '345265000', '328714425'),
(5, 'Mei', '2021', '251964375', '251964375', '77017708', '77017708', '328982083', '328982083'),
(6, 'Juni', '2021', '271173886', '271074655', '85889423', '85889423', '357063309', '356964078'),
(7, 'Juli', '2021', '272613462', '270563461', '78891346', '78891346', '351504808', '349454807'),
(8, 'Agustus', '2021', '240509539', '238319692', '60320769', '60320769', '300830308', '298640461'),
(9, 'September', '2021', '236054807', '235457808', '63036615', '63036615', '299091422', '298494423'),
(10, 'Oktober', '2021', '227712501', '226324809', '63878462', '63878462', '291590963', '290203271'),
(11, 'November', '2021', '', '', '', '', '', ''),
(12, 'Desember', '2021', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_humas`
--

CREATE TABLE `data_humas` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_humas_depok` varchar(100) NOT NULL,
  `terpakai_humas_depok` varchar(100) NOT NULL,
  `anggaran_humas_bogor` varchar(100) NOT NULL,
  `terpakai_humas_bogor` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_humas`
--

INSERT INTO `data_humas` (`id`, `bulan`, `tahun`, `anggaran_humas_depok`, `terpakai_humas_depok`, `anggaran_humas_bogor`, `terpakai_humas_bogor`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '', '', '', '', '', ''),
(2, 'Februari', '2021', '', '', '', '', '', ''),
(3, 'Maret', '2021', '', '', '', '', '', ''),
(4, 'April', '2021', '', '', '', '', '', ''),
(5, 'Mei', '2021', '', '', '', '', '', ''),
(6, 'Juni', '2021', '', '', '', '', '', ''),
(7, 'Juli', '2021', '', '', '', '', '', ''),
(8, 'Agustus', '2021', '', '', '', '', '', ''),
(9, 'September', '2021', '201600', '196000', '', '', '201600', '196000'),
(10, 'Oktober', '2021', '', '', '', '', '', ''),
(11, 'November', '2021', '1880000', '1275000', '', '', '1880000', '1275000'),
(12, 'Desember', '2021', '1500000', '1500000', '', '', '1500000', '1500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_income`
--

CREATE TABLE `data_income` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `income_a` varchar(100) NOT NULL,
  `income_b` varchar(100) NOT NULL,
  `income_c` varchar(100) NOT NULL,
  `income_d` varchar(100) NOT NULL,
  `income_instagram` varchar(100) NOT NULL,
  `income_bogor` varchar(100) NOT NULL,
  `income_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_income`
--

INSERT INTO `data_income` (`id`, `bulan`, `tahun`, `income_a`, `income_b`, `income_c`, `income_d`, `income_instagram`, `income_bogor`, `income_global`) VALUES
(1, 'Januari', '2021', '233507872', '212536526', '163902394', '', '82942745', '241512378', '934401915'),
(2, 'Februari', '2021', '234672921', '209225304', '153520081', '7950225', '99089117', '227630267', '932087915'),
(3, 'Maret', '2021', '215035973', '209600142', '174790357', '42352296', '160759223', '255865936', '1058403927'),
(4, 'April', '2021', '254315140', '234627539', '190139997', '104133273', '227165351', '274840060', '1285221360'),
(5, 'Mei', '2021', '198677433', '236688375', '179797354', '101168574', '201468801', '229212742', '1147013279'),
(6, 'Juni', '2021', '170747346', '163528677', '140225779', '116936219', '217913394', '227318520', '1036669935'),
(7, 'Juli', '2021', '185430734', '205745559', '163890469', '107986762', '196887454', '231181440', '1091122418'),
(8, 'Agustus', '2021', '237698654', '120185015', '181074509', '185633643', '224935150', '241802978', '1191329949'),
(9, 'September', '2021', '178821560', '100897353', '187869535', '163629482', '232807343', '203998786', '1068024059'),
(10, 'Oktober', '2021', '185186862', '127698263', '176116469', '164816108', '233204798', '228331009', '1115353509'),
(11, 'November', '2021', '77434181', '60234518', '82747494', '77433323', '96579767', '166022990', '560452273'),
(12, 'Desember', '2021', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_income_new`
--

CREATE TABLE `data_income_new` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `income_a` varchar(100) NOT NULL,
  `income_b` varchar(100) NOT NULL,
  `income_instagram` varchar(100) NOT NULL,
  `income_bogor` varchar(100) NOT NULL,
  `income_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_income_new`
--

INSERT INTO `data_income_new` (`id`, `bulan`, `tahun`, `income_a`, `income_b`, `income_instagram`, `income_bogor`, `income_global`) VALUES
(1, 'Januari', '2021', '446044398', '163902394', '82942745', '241512378', '934401915'),
(2, 'Februari', '2021', '443898225', '161470306', '99089117', '227630267', '932087915'),
(3, 'Maret', '2021', '424636115', '217142653', '160759223', '255865936', '1058403927'),
(4, 'April', '2021', '488942679', '294273270', '227165351', '274840060', '1285221360'),
(5, 'Mei', '2021', '435365808', '280965928', '201468801', '229212742', '1147013279'),
(6, 'Juni', '2021', '334276023', '257161998', '217913394', '227318520', '1036669935'),
(7, 'Juli', '2021', '391176293', '271877231', '196887454', '231181440', '1091122418'),
(8, 'Agustus', '2021', '357883669', '366708152', '224935150', '241802978', '1191329949'),
(9, 'September', '2021', '279718913', '351499017', '232807343', '203998786', '1068024059'),
(10, 'Oktober', '2021', '312885125', '340932577', '233204798', '228331009', '1115353509'),
(11, 'November', '2021', '255261776', '282797568', '213954609', '252521929', '1004535882'),
(12, 'Desember', '2021', '20127759', '24206874', '21784604', '19720068', '85839305');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_lainnya`
--

CREATE TABLE `data_lainnya` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_lainnya`
--

INSERT INTO `data_lainnya` (`id`, `bulan`, `tahun`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '', ''),
(2, 'Februari', '2021', '', ''),
(3, 'Maret', '2021', '', ''),
(4, 'April', '2021', '', ''),
(5, 'Mei', '2021', '', ''),
(6, 'Juni', '2021', '', ''),
(7, 'Juli', '2021', '15155000', '13880835'),
(8, 'Agustus', '2021', '', ''),
(9, 'September', '2021', '', ''),
(10, 'Oktober', '2021', '', ''),
(11, 'November', '2021', '600000', '600000'),
(12, 'Desember', '2021', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_logistik`
--

CREATE TABLE `data_logistik` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_logistik_depok` varchar(100) NOT NULL,
  `terpakai_logistik_depok` varchar(100) NOT NULL,
  `anggaran_logistik_bogor` varchar(100) NOT NULL,
  `terpakai_logistik_bogor` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_logistik`
--

INSERT INTO `data_logistik` (`id`, `bulan`, `tahun`, `anggaran_logistik_depok`, `terpakai_logistik_depok`, `anggaran_logistik_bogor`, `terpakai_logistik_bogor`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '38327942', '35227026', '9712900', '9254850', '48040842', '44481876'),
(2, 'Februari', '2021', '44041000', '38091237', '4253500', '3715150', '48294500', '41806387'),
(3, 'Maret', '2021', '57149154', '44328454', '1507500', '1350300', '58656654', '45678754'),
(4, 'April', '2021', '40500000', '37275515', '4050000', '4028600', '44550000', '41304115'),
(5, 'Mei', '2021', '44350000', '30229540', '5850000', '4786750', '50200000', '35016290'),
(6, 'Juni', '2021', '64690000', '55716650', '5175000', '4338950', '69865000', '60055600'),
(7, 'Juli', '2021', '73545449', '52067979', '6150000', '5507384', '79695449', '57575363'),
(8, 'Agustus', '2021', '41853814', '34874962', '6815534', '4563034', '48669348', '39437996'),
(9, 'September', '2021', '46058000', '39487720', '4377150', '4377150', '50435150', '43864870'),
(10, 'Oktober', '2021', '61502000', '53276910', '4404600', '4215650', '65906600', '57492560'),
(11, 'November', '2021', '44413300', '40595272', '4512800', '4275250', '48926100', '44870522'),
(12, 'Desember', '2021', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_maintenance`
--

CREATE TABLE `data_maintenance` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_maintenance_aset` varchar(100) NOT NULL,
  `terpakai_maintenance_aset` varchar(100) NOT NULL,
  `anggaran_maintenance_gedung` varchar(100) NOT NULL,
  `terpakai_maintenance_gedung` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_maintenance`
--

INSERT INTO `data_maintenance` (`id`, `bulan`, `tahun`, `anggaran_maintenance_aset`, `terpakai_maintenance_aset`, `anggaran_maintenance_gedung`, `terpakai_maintenance_gedung`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '', '', '', '', '', ''),
(2, 'Februari', '2021', '', '', '', '', '', ''),
(3, 'Maret', '2021', '', '', '', '', '', ''),
(4, 'April', '2021', '', '', '', '', '', ''),
(5, 'Mei', '2021', '3000000', '2400000', '', '', '3000000', '2400000'),
(6, 'Juni', '2021', '', '', '', '', '', ''),
(7, 'Juli', '2021', '52000000', '50000000', '', '', '52000000', '50000000'),
(8, 'Agustus', '2021', '', '', '', '', '', ''),
(9, 'September', '2021', '', '', '2000000', '1500000', '2000000', '1500000'),
(10, 'Oktober', '2021', '', '', '', '', '', ''),
(11, 'November', '2021', '', '', '1000000', '750000', '1000000', '750000'),
(12, 'Desember', '2021', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_operasional_yayasan`
--

CREATE TABLE `data_operasional_yayasan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_operasional_yayasan`
--

INSERT INTO `data_operasional_yayasan` (`id`, `bulan`, `tahun`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '', ''),
(2, 'Februari', '2021', '', ''),
(3, 'Maret', '2021', '', ''),
(4, 'April', '2021', '', ''),
(5, 'Mei', '2021', '', ''),
(6, 'Juni', '2021', '', ''),
(7, 'Juli', '2021', '', ''),
(8, 'Agustus', '2021', '', ''),
(9, 'September', '2021', '', ''),
(10, 'Oktober', '2021', '', ''),
(11, 'November', '2021', '', ''),
(12, 'Desember', '2021', '85100000', '81585000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemasukan`
--

CREATE TABLE `data_pemasukan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `pemasukan_kotak_amal` varchar(100) NOT NULL,
  `pemasukan_celengan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pemasukan`
--

INSERT INTO `data_pemasukan` (`id`, `bulan`, `tahun`, `pemasukan_kotak_amal`, `pemasukan_celengan`) VALUES
(1, 'Januari', '2021', '', ''),
(2, 'Februari', '2021', '7691100', ''),
(3, 'Maret', '2021', '7881100', ''),
(4, 'April', '2021', '7769100', ''),
(5, 'Mei', '2021', '15573600', ''),
(6, 'Juni', '2021', '14409000', ''),
(7, 'Juli', '2021', '17337700', ''),
(8, 'Agustus', '2021', '18942100', ''),
(9, 'September', '2021', '10994100', '9102100'),
(10, 'Oktober', '2021', '5592600', '4660400'),
(11, 'November', '2021', '4459100', '4460300'),
(12, 'Desember', '2021', '100000', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produksi`
--

CREATE TABLE `data_produksi` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_produksi_depok` varchar(100) NOT NULL,
  `terpakai_produksi_depok` varchar(100) NOT NULL,
  `anggaran_produksi_bogor` varchar(100) NOT NULL,
  `terpakai_produksi_bogor` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_produksi`
--

INSERT INTO `data_produksi` (`id`, `bulan`, `tahun`, `anggaran_produksi_depok`, `terpakai_produksi_depok`, `anggaran_produksi_bogor`, `terpakai_produksi_bogor`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '', '', '', '', '', ''),
(2, 'Februari', '2021', '', '', '', '', '', ''),
(3, 'Maret', '2021', '', '', '', '', '', ''),
(4, 'April', '2021', '', '', '', '', '', ''),
(5, 'Mei', '2021', '', '', '', '', '', ''),
(6, 'Juni', '2021', '', '', '', '', '', ''),
(7, 'Juli', '2021', '', '', '', '', '', ''),
(8, 'Agustus', '2021', '', '', '87470000', '84823000', '87470000', '84823000'),
(9, 'September', '2021', '', '', '14562000', '14365400', '14562000', '14365400'),
(10, 'Oktober', '2021', '', '', '6825000', '6620000', '6825000', '6620000'),
(11, 'November', '2021', '', '', '', '', '', ''),
(12, 'Desember', '2021', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_program`
--

CREATE TABLE `data_program` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `anggaran_pendidikan` varchar(100) NOT NULL,
  `terpakai_pendidikan` varchar(100) NOT NULL,
  `anggaran_kesehatan` varchar(100) NOT NULL,
  `terpakai_kesehatan` varchar(100) NOT NULL,
  `anggaran_program_depok` varchar(100) NOT NULL,
  `terpakai_program_depok` varchar(100) NOT NULL,
  `anggaran_kesehatan_bogor` varchar(100) NOT NULL,
  `terpakai_kesehatan_bogor` varchar(100) NOT NULL,
  `anggaran_pendidikan_bogor` varchar(100) NOT NULL,
  `terpakai_pendidikan_bogor` varchar(100) NOT NULL,
  `anggaran_program_bogor` varchar(100) NOT NULL,
  `terpakai_program_bogor` varchar(100) NOT NULL,
  `anggaran_global` varchar(100) NOT NULL,
  `terpakai_global` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_program`
--

INSERT INTO `data_program` (`id`, `bulan`, `tahun`, `anggaran_pendidikan`, `terpakai_pendidikan`, `anggaran_kesehatan`, `terpakai_kesehatan`, `anggaran_program_depok`, `terpakai_program_depok`, `anggaran_kesehatan_bogor`, `terpakai_kesehatan_bogor`, `anggaran_pendidikan_bogor`, `terpakai_pendidikan_bogor`, `anggaran_program_bogor`, `terpakai_program_bogor`, `anggaran_global`, `terpakai_global`) VALUES
(1, 'Januari', '2021', '', '', '', '', '169730000', '129025884', '', '', '', '', '59980000', '49782900', '229710000', '178808784'),
(2, 'Februari', '2021', '', '', '', '', '285297500', '260542110', '', '', '', '', '44370000', '38670000', '329667500', '299212110'),
(3, 'Maret', '2021', '', '', '', '', '261566000', '233246344', '', '', '', '', '37525000', '36425000', '299091000', '269671344'),
(4, 'April', '2021', '', '', '', '', '308212000', '269535400', '', '', '', '', '68700000', '66150400', '376912000', '335685800'),
(5, 'Mei', '2021', '', '', '', '', '327585000', '302025300', '', '', '', '', '93205000', '92228370', '420790000', '394253670'),
(6, 'Juni', '2021', '', '', '', '', '353066500', '314065584', '', '', '', '', '90640000', '85437100', '443706500', '399502684'),
(7, 'Juli', '2021', '', '', '', '', '296109000', '288947745', '', '', '', '', '76230000', '76060100', '372339000', '365007845'),
(8, 'Agustus', '2021', '6407000', '5996200', '3850000', '3739400', '94757000', '94235600', '520000', '352000', '2975000', '2275000', '7895000', '6827000', '102652000', '101062600'),
(9, 'September', '2021', '', '', '3000000', '2760300', '220388000', '201451700', '5033000', '4274000', '2060000', '1700000', '19893000', '17374000', '240281000', '218825700'),
(10, 'Oktober', '2021', '', '', '4900000', '4689300', '262155000', '240646935', '2370000', '1459000', '1850000', '1646000', '48281500', '42520100', '310436500', '283167035'),
(11, 'November', '2021', '', '', '3550000', '3216100', '369280000', '340787500', '2450000', '2298000', '1675000', '1395000', '58345000', '54417360', '427625000', '395204860'),
(12, 'Desember', '2021', '', '', '300000', '300000', '18800000', '16838000', '', '', '150000', '150000', '13178000', '13028000', '31978000', '29866000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gaji_karyawan` varchar(250) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `pemakaian` text NOT NULL,
  `dana_terpakai` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_aset`
--

CREATE TABLE `galeri_aset` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_baksos`
--

CREATE TABLE `galeri_baksos` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_daily`
--

CREATE TABLE `galeri_daily` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_humas`
--

CREATE TABLE `galeri_humas` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_lainnya`
--

CREATE TABLE `galeri_lainnya` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_logistik`
--

CREATE TABLE `galeri_logistik` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri_logistik`
--

INSERT INTO `galeri_logistik` (`id`, `nomor_id`, `id_pengurus`, `program`, `nama`, `dokumentasi`) VALUES
(1, '9', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'kw log.png'),
(2, '9', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'kw log1.png'),
(3, '9', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'kw log2.png'),
(4, '9', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'kw log3.png'),
(5, '10', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'logk.png'),
(6, '10', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'logk1.png'),
(7, '10', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'logk2.png'),
(8, '10', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'logk3.png'),
(9, '10', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'logk4.png'),
(10, '10', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'logk5.png'),
(11, '10', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'logk6.png'),
(12, '10', 'logistik', 'Logistik Gedung A', 'Mutmainah', 'logk7.png'),
(28, '11', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log b.png'),
(29, '11', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log b2.png'),
(30, '11', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log b3.png'),
(31, '11', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log b4.png'),
(32, '11', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log b5.png'),
(33, '11', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log b6.png'),
(34, '12', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log n.png'),
(35, '12', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log n2.png'),
(36, '12', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log n3.png'),
(37, '12', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log n4.png'),
(38, '12', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log n5.png'),
(39, '12', 'logistik', 'Logistik Gedung B', 'Firda Alya', 'kw log n6.png'),
(40, '13', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'log c.png'),
(41, '13', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'log c2.png'),
(42, '13', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'log c3.png'),
(43, '13', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'log c4.png'),
(44, '13', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'log c5.png'),
(45, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c.png'),
(46, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c2.png'),
(47, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c3.png'),
(48, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c4.png'),
(49, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c5.png'),
(50, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c6.png'),
(51, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c7.png'),
(52, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c8.png'),
(53, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c9.png'),
(54, '14', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', 'kw log c10.png'),
(55, '17', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'log d.png'),
(56, '17', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'log d2.png'),
(57, '17', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'log d3.png'),
(58, '17', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'log d4.png'),
(59, '17', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'log d5.png'),
(60, '17', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'log d6.png'),
(61, '17', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'log d7.png'),
(62, '17', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'log d8.png'),
(63, '16', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'kw log d.png'),
(64, '16', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'kw log d2.png'),
(65, '16', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'kw log d3.png'),
(66, '16', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', 'kw log d4.png'),
(67, '19', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'kw log ins.png'),
(68, '19', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'kw log ins2.png'),
(69, '19', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'kw log ins3.png'),
(70, '19', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'kw log ins4.png'),
(71, '19', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'kw log ins5.png'),
(72, '19', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'kw log ins6.png'),
(73, '19', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'kw log ins7.png'),
(74, '19', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'kw log ins8.png'),
(75, '18', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'log ins.png'),
(76, '18', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'log ins2.png'),
(77, '18', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'log ins3.png'),
(78, '18', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'log ins4.png'),
(79, '18', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'log ins5.png'),
(80, '18', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'log ins6.png'),
(81, '18', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', 'log ins7.png'),
(82, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor.png'),
(83, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor2.png'),
(84, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor3.png'),
(85, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor4.png'),
(86, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor5.png'),
(87, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor6.png'),
(88, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor7.png'),
(89, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor8.png'),
(90, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor9.png'),
(91, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor10.png'),
(92, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor11.png'),
(93, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor12.png'),
(94, '21', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log bogor13.png'),
(95, '20', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'kw log bogor.png'),
(96, '20', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'kw log bogor2.png'),
(97, '20', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'kw log bogor3.png'),
(98, '20', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'kw log bogor4.png'),
(99, '20', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'kw log bogor5.png'),
(100, '22', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log baner.png'),
(101, '22', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log baner2.png'),
(102, '22', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'log baner3.png'),
(103, '24', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log op.png'),
(104, '24', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log op2.png'),
(105, '24', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log op3.png'),
(106, '23', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log taman.png'),
(107, '23', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log taman2.png'),
(108, '23', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log taman3.png'),
(109, '23', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log taman4.png'),
(110, '23', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log taman5.png'),
(111, '23', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log taman6.png'),
(112, '23', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', 'log taman7.png'),
(113, '27', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan.png'),
(114, '27', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan2.png'),
(115, '27', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan3.png'),
(116, '27', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan4.png'),
(117, '27', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan5.png'),
(118, '27', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan6.png'),
(119, '27', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan7.png'),
(120, '28', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan m1.png'),
(121, '28', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan m2.png'),
(122, '28', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan m3.png'),
(123, '28', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan m4.png'),
(124, '28', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan m5.png'),
(125, '28', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan m6.png'),
(126, '28', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log makan m7.png'),
(127, '25', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log s.png'),
(128, '25', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log s2.png'),
(129, '25', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log s3.png'),
(130, '25', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log s4.png'),
(131, '25', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log s5.png'),
(132, '25', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log s6.png'),
(133, '25', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log s7.png'),
(134, '26', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log k.png'),
(135, '26', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log k2.png'),
(136, '26', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'log k3.png'),
(137, '34', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-12-46.jpg'),
(138, '34', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-12-48.jpg'),
(139, '34', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-12-54.jpg'),
(140, '34', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-12-57.jpg'),
(141, '34', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-13-00.jpg'),
(142, '35', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-21-00.jpg'),
(143, '35', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-21-03.jpg'),
(144, '35', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-21-05.jpg'),
(145, '35', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-21-06.jpg'),
(146, '35', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-21-08.jpg'),
(147, '35', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', 'photo_2021-08-30_14-21-10.jpg'),
(149, '33', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'WhatsApp Image 2021-08-30 at 14.34.34 (2).jpeg'),
(150, '33', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'WhatsApp Image 2021-08-30 at 14.34.34 (1).jpeg'),
(151, '33', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'WhatsApp Image 2021-08-30 at 14.34.34.jpeg'),
(152, '33', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'WhatsApp Image 2021-08-30 at 14.34.33 (1).jpeg'),
(153, '33', 'logistik', 'Logistik Gedung Bogor', 'Kamila', 'WhatsApp Image 2021-08-30 at 14.34.33.jpeg'),
(159, '7', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '612f52ac055fc.png'),
(164, '3', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6131a26223922.jpg'),
(165, '3', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6131a26223da1.jpg'),
(166, '3', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6131a262240f6.png'),
(167, '3', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6131a262243d2.jpg'),
(168, '3', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6131a26224795.jpg'),
(170, '6', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '6131badde6034.png'),
(171, '2', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6131c4a298f58.jpeg'),
(172, '2', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6131c4a299442.jpeg'),
(173, '2', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6131c4a29974c.jpeg'),
(174, '2', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6131c4a299a70.jpeg'),
(175, '2', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6131c4a299d5a.jpeg'),
(176, '37', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '6135a3d2044a6.jpg'),
(178, '4', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6136d7af715fd.jpg'),
(179, '4', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6136d7af719d1.jpg'),
(180, '4', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6136d7af71c9b.jpg'),
(181, '4', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6136d7af71eed.jpg'),
(182, '4', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6136d7af7219c.jpg'),
(183, '4', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6136d7af7249d.jpg'),
(184, '4', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6136d7af726cd.jpg'),
(185, '4', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6136d7af72996.png'),
(186, '8', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6136ee5381057.png'),
(187, '1', 'logistik', 'Logistik Gedung B', 'Firda Alya', '61371779db888.jpg'),
(188, '1', 'logistik', 'Logistik Gedung B', 'Firda Alya', '61371779dbc7d.jpg'),
(189, '1', 'logistik', 'Logistik Gedung B', 'Firda Alya', '61371779dbfa5.jpg'),
(190, '40', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '61383acd5620d.jpg'),
(191, '40', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '61383acd56627.jpg'),
(192, '40', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '61383acd569d7.jpg'),
(193, '40', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '61383acd56d5c.jpg'),
(194, '40', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '61383acd570ae.jpg'),
(195, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd1d61.png'),
(196, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd2098.png'),
(197, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd2330.jpeg'),
(198, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd2580.jpeg'),
(199, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd2828.jpeg'),
(200, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd2af8.jpeg'),
(201, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd2d11.jpeg'),
(202, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd2fb0.jpeg'),
(203, '31', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383f5bd31d1.jpeg'),
(204, '32', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383fd928032.png'),
(205, '32', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383fd9283a4.jpeg'),
(206, '32', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61383fd9286b7.jpeg'),
(207, '29', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6138887cbed17.jpeg'),
(208, '29', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6138887cbf0c7.jpeg'),
(209, '29', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6138887cbf3e4.jpeg'),
(210, '30', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '613888f23e4dc.jpeg'),
(211, '30', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '613888f23e915.jpeg'),
(212, '30', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '613888f23ecd9.jpeg'),
(213, '30', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '613888f23f105.jpeg'),
(214, '30', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '613888f23f4d1.jpeg'),
(215, '30', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '613888f23f84d.jpeg'),
(216, '30', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '613888f23fbf1.jpeg'),
(217, '30', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '613888f23ff20.jpeg'),
(218, '5', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61388ec7f2fc0.jpeg'),
(219, '5', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61388ec7f33ca.jpeg'),
(220, '5', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61388ec7f3700.jpeg'),
(221, '5', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61388ec7f3952.jpeg'),
(222, '5', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61388ec7f3beb.jpeg'),
(223, '5', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61388ec7f3eae.jpeg'),
(224, '5', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61388ec7f413d.jpeg'),
(225, '5', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61388ec800236.jpeg'),
(226, '36', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613c4b0adb62b.jpg'),
(227, '36', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613c4b0ade63f.jpg'),
(228, '36', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613c4b0ade9fd.jpg'),
(229, '36', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613c4b0adec53.jpg'),
(230, '36', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613c4b0adef65.jpg'),
(231, '41', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '613ebc95b70c5.jpg'),
(232, '41', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '613ebc95b748a.jpg'),
(233, '41', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '613ebc95b7728.jpg'),
(234, '41', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '613ebc95b7a96.jpg'),
(235, '43', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613efb32c5d40.jpg'),
(236, '43', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613efb32c610c.jpg'),
(237, '43', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613efb32c6402.jpg'),
(238, '43', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613efb32c6616.jpg'),
(239, '43', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613efb32c6915.jpg'),
(240, '43', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613efb32c6b98.jpg'),
(241, '43', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '613efb32c6db1.jpg'),
(242, '42', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61401d1c227b0.jpeg'),
(243, '42', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61401d1c27a0a.png'),
(244, '44', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '614803a30ec6c.jpg'),
(245, '44', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '614803a30efe8.jpg'),
(246, '44', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '614803a30f287.jpg'),
(247, '44', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '614803a30f528.jpg'),
(248, '46', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '614d425c519bf.jpg'),
(249, '46', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '614d425c5cc54.jpg'),
(250, '46', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '614d425c650ab.jpg'),
(251, '46', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '614d425c6541c.jpg'),
(252, '47', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '614d4294f246b.jpg'),
(253, '47', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '614d4294f28c5.jpg'),
(254, '47', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '614d4294f2c3b.jpg'),
(255, '48', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '6152950e983ea.jpeg'),
(256, '48', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '6152950e987a5.png'),
(257, '45', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '615532325c194.jpg'),
(258, '45', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '615532325c5f3.jpg'),
(259, '45', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6155323260ba6.jpg'),
(260, '45', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6155323260e95.jpg'),
(261, '45', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61553232611dc.jpg'),
(262, '45', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61553232614f1.jpg'),
(263, '61', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c060b49a9b.jpg'),
(264, '61', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c060b4fdee.jpg'),
(265, '61', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c060b50157.jpg'),
(266, '61', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c060b556ad.jpg'),
(267, '61', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c060b559cc.jpg'),
(268, '61', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c060b55c55.jpg'),
(269, '61', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c060b55ef5.jpg'),
(270, '62', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c1dbccb17c.jpg'),
(271, '62', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '615c1dbccb4e0.jpg'),
(272, '57', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d03d14cdec.jpg'),
(273, '57', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d03d14d219.jpg'),
(274, '57', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d03d14d57b.jpg'),
(275, '58', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d04b5bf47f.jpg'),
(276, '58', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d04b5bf87f.jpg'),
(277, '58', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d04b5bfbc2.jpg'),
(278, '58', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d04b5bfeda.jpg'),
(279, '58', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d04b5c0201.jpg'),
(280, '58', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d04b5c0568.jpg'),
(281, '58', 'logistik', 'Logistik Gedung A', 'Mutmainah', '615d04b5c083e.jpg'),
(282, '53', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '615d0cf33d752.png'),
(283, '53', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '615d0cf33dac9.jpeg'),
(284, '53', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '615d0cf33ddda.jpeg'),
(285, '54', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '615d0e6a64272.png'),
(286, '54', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '615d0e6a64617.jpeg'),
(287, '55', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1730e9d09.jpeg'),
(288, '55', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1730ea0ee.jpeg'),
(289, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e969f8.jpg'),
(290, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e96e80.jpg'),
(291, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e972dc.jpg'),
(292, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e975f2.jpeg'),
(293, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e97913.jpeg'),
(294, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e97bbe.jpeg'),
(295, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e97f1b.jpeg'),
(296, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e9826a.jpeg'),
(297, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e98596.jpeg'),
(298, '56', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '615d1a9e988cd.jpeg'),
(299, '49', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2ee99e578.jpeg'),
(300, '49', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2ee99e97f.jpeg'),
(301, '49', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2ee99ec7e.jpeg'),
(302, '49', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2ee99ef6d.jpeg'),
(303, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd8402.jpeg'),
(304, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd879c.jpeg'),
(305, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd8aa2.jpeg'),
(306, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd8d45.jpeg'),
(307, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd9066.jpeg'),
(308, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd93c1.jpeg'),
(309, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd960f.jpeg'),
(310, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd9926.jpeg'),
(311, '59', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2effd9c25.jpeg'),
(312, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabb8fdb.jpeg'),
(313, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabb940e.jpeg'),
(314, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabb97c8.jpeg'),
(315, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabb9baa.jpeg'),
(316, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabb9ebe.jpeg'),
(317, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabba29a.jpeg'),
(318, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabba669.jpeg'),
(319, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabba9f6.jpeg'),
(320, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabbadc7.jpeg'),
(321, '50', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615d2fabbb1fe.jpeg'),
(322, '60', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2fc2031e9.jpeg'),
(323, '60', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2fc203576.jpeg'),
(324, '60', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2fc203846.jpeg'),
(325, '60', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2fc203eaa.jpeg'),
(326, '60', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2fc20425b.jpeg'),
(327, '60', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2fc204520.jpeg'),
(328, '60', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '615d2fc204797.jpeg'),
(329, '52', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d42f34ba07.jpeg'),
(330, '52', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d42f34be99.jpeg'),
(331, '52', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d42f34c221.jpeg'),
(332, '52', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d42f34c5fa.jpeg'),
(333, '51', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d43e20b292.jpeg'),
(334, '51', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d43e20b79b.jpeg'),
(335, '51', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d43e20bb34.jpeg'),
(336, '51', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d43e20bf14.jpeg'),
(337, '51', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d43e20c1a9.jpeg'),
(338, '51', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d43e20c4ed.jpeg'),
(339, '51', 'logistik', 'Logistik Gedung B', 'Firda Alya', '615d43e20c7c6.jpeg'),
(340, '63', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '615d5ac16f1c1.jpg'),
(341, '63', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '615d5ac16f5b6.jpg'),
(342, '63', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '615d5ac16f8a3.jpg'),
(343, '63', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '615d5ac16fb05.jpg'),
(344, '63', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '615d5ac16fd88.jpg'),
(346, '64', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '615fd5c9532df.jpeg'),
(347, '65', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61664ef659c5a.jpg'),
(348, '65', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61664ef65a01c.jpg'),
(349, '65', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61664ef65a2f7.jpg'),
(350, '65', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61664ef65a5b7.jpg'),
(351, '65', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61664ef65e4e4.jpg'),
(352, '66', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6167ae4366350.jpeg'),
(353, '69', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '616948b183b50.jpg'),
(354, '67', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '616a70144bdea.jpeg'),
(355, '68', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '616a7180855f9.jpeg'),
(356, '70', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '616f9c8be080a.jpeg'),
(363, '72', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6177a0600f0d6.jpeg'),
(364, '75', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '61791dbe1a6db.jpeg'),
(365, '86', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6180ba328108f.jpeg'),
(366, '87', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '61824408a7769.jpg'),
(367, '88', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618244a86b065.jpg'),
(368, '88', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618244a86b456.jpg'),
(369, '88', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618244a86b7d0.jpg'),
(370, '88', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618244a86bacb.jpg'),
(371, '88', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618244a86bda9.jpg'),
(372, '88', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618244a86c00e.jpg'),
(373, '88', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618244a86c2c1.jpg'),
(374, '88', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618244a86c5c0.jpg'),
(375, '83', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '61835fb322411.jpeg'),
(379, '80', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6183961e5bd3a.jpeg'),
(380, '80', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6183961e5c13d.jpeg'),
(381, '80', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6183961e5c432.jpeg'),
(382, '80', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6183961e5c75b.jpeg'),
(383, '80', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6183961e5ca4b.jpeg'),
(384, '80', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6183961e5ccc2.jpeg'),
(385, '80', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6183961e5cf8d.jpeg'),
(386, '80', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6183961e5d259.jpeg'),
(387, '81', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b227811d7.jpg'),
(388, '81', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b227815e4.jpg'),
(389, '81', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b2278195e.jpg'),
(390, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b299066f9.jpg'),
(391, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b29906c23.jpg'),
(392, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b2990703e.jpg'),
(393, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b29907489.jpg'),
(394, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b29907870.jpg'),
(395, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b29907c5c.jpg'),
(396, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b29908050.jpg'),
(397, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b299082f2.jpg'),
(398, '82', 'logistik', 'Logistik Gedung A', 'Mutmainah', '6184b29908607.jpg'),
(411, '84', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '6184e3bd361c2.jpeg'),
(412, '84', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '6184e3bd3660f.jpeg'),
(413, '84', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '6184e3bd36898.png'),
(414, '85', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '6184e5200ba97.png'),
(415, '85', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '6184e5200be03.jpeg'),
(416, '85', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '6184e5200c0b7.jpeg'),
(431, '78', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6188903d51483.jpeg'),
(432, '78', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6188903d51996.jpeg'),
(433, '78', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6188903d51ccf.jpeg'),
(434, '78', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6188903d51f96.jpeg'),
(435, '78', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6188903d522b6.jpeg'),
(436, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '6188914189bc7.jpeg'),
(437, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '618891418a0a2.jpeg'),
(438, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '618891418a398.jpeg'),
(439, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '618891418a6cf.jpeg'),
(440, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '618891418aa23.jpeg'),
(441, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '618891418ad6c.jpeg'),
(442, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '618891418b02e.jpeg'),
(443, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '618891418b371.jpeg'),
(444, '79', 'logistik', 'Logistik Gedung B', 'Firda Alya', '618891418b686.jpeg'),
(445, '73', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '6188970239a0a.jpeg'),
(446, '73', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '6188970239e19.jpeg'),
(447, '74', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61889749e229e.jpeg'),
(448, '74', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61889749e2634.jpeg'),
(449, '74', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61889749e28e5.jpeg'),
(450, '74', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61889749e2b90.jpeg'),
(451, '74', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61889749e2df5.jpeg'),
(452, '74', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61889749e30c9.jpeg'),
(453, '74', 'logistik', 'Logistik Gedung D', 'Winda Fatimah', '61889749e339e.jpeg'),
(454, '90', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6188beb5a2940.jpeg'),
(455, '91', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6188bfc1ccd5a.jpeg'),
(456, '76', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e78163156.jpg'),
(457, '76', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e78163567.jpg'),
(458, '76', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e781638d3.jpg'),
(459, '76', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e78163bd5.jpg'),
(460, '76', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e78163f31.jpg'),
(461, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e8104238b.jpg'),
(462, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e81042717.jpg'),
(463, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e81042a3e.jpg'),
(464, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e81042d6a.jpg'),
(465, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e8104306e.jpg'),
(466, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e81043399.jpg'),
(467, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e81043606.jpg'),
(468, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e81043950.jpg'),
(469, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e81043c76.jpg'),
(470, '77', 'logistik', 'Logistik Gedung C', 'Muhammad Sauqi Mubarok', '6189e81043f66.jpg'),
(471, '93', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6189f83bcd82d.jpg'),
(472, '94', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '618a1adcbc9df.jpeg'),
(473, '94', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '618a1adcbcd7d.jpeg'),
(474, '89', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '618a1c6a27ce6.jpeg'),
(475, '95', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '618a2572ad5a0.jpeg'),
(476, '107', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b7de133ab9.jpeg'),
(477, '96', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b7e6a4ee24.jpeg'),
(478, '108', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b80c631d93.jpeg'),
(479, '97', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b811f69f7e.jpeg'),
(480, '114', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b81d4d2c70.jpeg'),
(481, '109', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b827e09f2e.jpeg'),
(482, '98', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8410a4e45.jpeg'),
(483, '115', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b855202ccd.jpeg'),
(484, '110', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8768441a7.jpeg'),
(485, '99', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b884d6dad4.jpeg'),
(486, '116', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8982374d4.jpeg'),
(487, '111', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8a1865ba2.jpeg'),
(488, '100', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8b3f8ef8d.jpeg'),
(489, '117', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8c0e109a4.jpeg'),
(490, '112', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8c766e030.jpeg'),
(491, '101', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8d41815b3.jpeg'),
(492, '118', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8dbdeea83.jpeg'),
(493, '113', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b8ec19795a.jpeg'),
(494, '102', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b912a95bf0.jpeg'),
(495, '102', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b912a95fe4.jpeg'),
(496, '102', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b912a96340.jpeg'),
(497, '102', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b912a96672.jpeg'),
(498, '102', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b912a969b1.jpeg'),
(499, '102', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618b912a96e57.jpeg'),
(501, '123', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '618cc552e128f.jpg'),
(502, '119', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618cd541a5b16.jpeg'),
(503, '120', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618cd5f54377f.jpeg'),
(504, '121', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618cd6af9a4e6.jpeg'),
(506, '105', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618cd8ef44693.jpeg'),
(507, '105', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618cd8ef44a8e.jpeg'),
(508, '105', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618cd8ef44d8d.jpeg'),
(509, '106', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '618cd9660edba.jpeg'),
(510, '126', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618e05a50706e.jpg'),
(511, '127', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618e05f846395.jpg'),
(512, '128', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618e0660d1eab.jpg'),
(513, '130', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618e07ba265c5.jpg'),
(514, '131', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618e0822f072c.jpg'),
(515, '132', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618e087e81609.jpg'),
(516, '133', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618e08d718c3d.jpg'),
(517, '134', 'logistik', 'Logistik Gedung Bogor', 'Kamila', '618e09382de11.jpg'),
(518, '125', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6191da7ac6228.jpeg'),
(519, '135', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '6191dad5d3852.jpeg'),
(520, '122', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61922fe3e2537.jpeg'),
(521, '136', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '619347d452aea.jpeg'),
(522, '137', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cd6e7d0b3.jpeg'),
(523, '137', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cd6e7d4a4.jpeg'),
(524, '138', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cdeb76def.jpeg'),
(525, '138', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cdeb772a6.jpeg'),
(526, '143', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195ce9980757.jpeg'),
(527, '143', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195ce9980b0a.jpeg'),
(528, '143', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195ce9980e14.jpeg'),
(529, '139', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cefa5cec5.jpeg'),
(530, '139', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cefa5d394.jpeg'),
(531, '140', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cf61af6f0.jpeg'),
(532, '140', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cf61afbf6.jpeg'),
(533, '140', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cf61b000e.jpeg'),
(534, '141', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cffda6ab2.jpeg'),
(535, '141', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cffda6ee0.jpeg'),
(536, '141', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195cffda7276.jpeg'),
(537, '142', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '6195d0b9b1490.jpeg'),
(538, '146', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '619b2e5c40674.jpeg'),
(539, '145', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '619b2ec6685a0.jpeg'),
(541, '147', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '619de9dbd0ea6.jpeg'),
(542, '124', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '61a07346568c4.jpeg'),
(543, '151', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '61a5cd7c3a07b.jpeg'),
(544, '154', 'logistik', 'Logistik Gedung Management', 'Nur Shabrina Hidriani', '61a5e5049f11d.jpeg'),
(545, '159', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61ab0b1f09b89.png'),
(546, '159', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61ab0b1f09f27.jpeg'),
(547, '160', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61ab0e5277f0e.jpeg'),
(548, '160', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61ab0e5278327.jpeg'),
(549, '160', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61ab0e527861a.jpeg'),
(550, '160', 'logistik', 'Logistik Gedung Instagram', 'Nur Fauziah', '61ab0e52788bd.png'),
(551, '152', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '61b6e938ad03f.jpg'),
(552, '152', 'logistik', 'Logistik Gedung Taman', 'Pimpi Ayu Nuraini', '61b6e938ae924.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_maintenance`
--

CREATE TABLE `galeri_maintenance` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_operasional`
--

CREATE TABLE `galeri_operasional` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_pemasukan`
--

CREATE TABLE `galeri_pemasukan` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_produksi`
--

CREATE TABLE `galeri_produksi` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_program`
--

CREATE TABLE `galeri_program` (
  `id` int(11) NOT NULL,
  `nomor_id` varchar(100) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `humas`
--

CREATE TABLE `humas` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `program` varchar(250) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `dana_anggaran` varchar(200) NOT NULL,
  `tgl_pemakaian` date NOT NULL,
  `deskripsi_pemakaian` varchar(200) NOT NULL,
  `dana_terpakai` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_b` varchar(200) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `gedung` varchar(200) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `income` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_divisi`
--

CREATE TABLE `list_divisi` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `akses` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistik`
--

CREATE TABLE `logistik` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `program` varchar(250) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `dana_anggaran` varchar(200) NOT NULL,
  `tgl_pemakaian` date NOT NULL,
  `deskripsi_pemakaian` varchar(200) NOT NULL,
  `dana_terpakai` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_b` varchar(200) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivity`
--

CREATE TABLE `log_aktivity` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `aktivitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `maintenance` varchar(100) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `perencanaan` text NOT NULL,
  `dana_anggaran` varchar(200) NOT NULL,
  `tgl_pemakaian` date NOT NULL,
  `deskripsi_pemakaian` varchar(200) NOT NULL,
  `dana_terpakai` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `operasional_yayasan`
--

CREATE TABLE `operasional_yayasan` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `deskripsi` text NOT NULL,
  `dana_anggaran` varchar(250) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `pemakaian` text NOT NULL,
  `dana_terpakai` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `income` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `produksi` varchar(100) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `jenis` varchar(250) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `perencanaan` text NOT NULL,
  `dana_anggaran` varchar(200) NOT NULL,
  `tgl_pemakaian` date NOT NULL,
  `deskripsi_pemakaian` varchar(200) NOT NULL,
  `dana_terpakai` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `program` varchar(250) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `dana_anggaran` varchar(200) NOT NULL,
  `tgl_pemakaian` date NOT NULL,
  `deskripsi_pemakaian` varchar(200) NOT NULL,
  `dana_terpakai` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_b` varchar(200) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_pengurus`
--
ALTER TABLE `akun_pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggaran_lain`
--
ALTER TABLE `anggaran_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aset_yayasan`
--
ALTER TABLE `aset_yayasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `backup_income`
--
ALTER TABLE `backup_income`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `baksos`
--
ALTER TABLE `baksos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cashback`
--
ALTER TABLE `cashback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_aset_yayasan`
--
ALTER TABLE `data_aset_yayasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_baksos`
--
ALTER TABLE `data_baksos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_cashback`
--
ALTER TABLE `data_cashback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_gaji`
--
ALTER TABLE `data_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_humas`
--
ALTER TABLE `data_humas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_income`
--
ALTER TABLE `data_income`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_income_new`
--
ALTER TABLE `data_income_new`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_lainnya`
--
ALTER TABLE `data_lainnya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_logistik`
--
ALTER TABLE `data_logistik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_maintenance`
--
ALTER TABLE `data_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_operasional_yayasan`
--
ALTER TABLE `data_operasional_yayasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pemasukan`
--
ALTER TABLE `data_pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_produksi`
--
ALTER TABLE `data_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_program`
--
ALTER TABLE `data_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_aset`
--
ALTER TABLE `galeri_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_baksos`
--
ALTER TABLE `galeri_baksos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_daily`
--
ALTER TABLE `galeri_daily`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_humas`
--
ALTER TABLE `galeri_humas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_lainnya`
--
ALTER TABLE `galeri_lainnya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_logistik`
--
ALTER TABLE `galeri_logistik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_maintenance`
--
ALTER TABLE `galeri_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_operasional`
--
ALTER TABLE `galeri_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_pemasukan`
--
ALTER TABLE `galeri_pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_produksi`
--
ALTER TABLE `galeri_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_program`
--
ALTER TABLE `galeri_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `humas`
--
ALTER TABLE `humas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_divisi`
--
ALTER TABLE `list_divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logistik`
--
ALTER TABLE `logistik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_aktivity`
--
ALTER TABLE `log_aktivity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `operasional_yayasan`
--
ALTER TABLE `operasional_yayasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_pengurus`
--
ALTER TABLE `akun_pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `anggaran_lain`
--
ALTER TABLE `anggaran_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aset_yayasan`
--
ALTER TABLE `aset_yayasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `backup_income`
--
ALTER TABLE `backup_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `baksos`
--
ALTER TABLE `baksos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cashback`
--
ALTER TABLE `cashback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_aset_yayasan`
--
ALTER TABLE `data_aset_yayasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_baksos`
--
ALTER TABLE `data_baksos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_cashback`
--
ALTER TABLE `data_cashback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_gaji`
--
ALTER TABLE `data_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_humas`
--
ALTER TABLE `data_humas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_income`
--
ALTER TABLE `data_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_income_new`
--
ALTER TABLE `data_income_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_lainnya`
--
ALTER TABLE `data_lainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_logistik`
--
ALTER TABLE `data_logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_maintenance`
--
ALTER TABLE `data_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_operasional_yayasan`
--
ALTER TABLE `data_operasional_yayasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_pemasukan`
--
ALTER TABLE `data_pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_produksi`
--
ALTER TABLE `data_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_program`
--
ALTER TABLE `data_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_aset`
--
ALTER TABLE `galeri_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_baksos`
--
ALTER TABLE `galeri_baksos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_daily`
--
ALTER TABLE `galeri_daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_humas`
--
ALTER TABLE `galeri_humas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_lainnya`
--
ALTER TABLE `galeri_lainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_logistik`
--
ALTER TABLE `galeri_logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT untuk tabel `galeri_maintenance`
--
ALTER TABLE `galeri_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_operasional`
--
ALTER TABLE `galeri_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_pemasukan`
--
ALTER TABLE `galeri_pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_produksi`
--
ALTER TABLE `galeri_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_program`
--
ALTER TABLE `galeri_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `humas`
--
ALTER TABLE `humas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `list_divisi`
--
ALTER TABLE `list_divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `logistik`
--
ALTER TABLE `logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_aktivity`
--
ALTER TABLE `log_aktivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `operasional_yayasan`
--
ALTER TABLE `operasional_yayasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
