-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Okt 2019 pada 06.27
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puswil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `puswil_buku`
--

CREATE TABLE `puswil_buku` (
  `buku_id` int(11) NOT NULL,
  `buku_kategori` varchar(255) NOT NULL,
  `buku_kode_klasifikasi` varchar(3) NOT NULL,
  `buku_jumlah_judul` int(11) NOT NULL,
  `buku_jumlah_eksemplar` int(11) NOT NULL,
  `buku_tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `puswil_buku`
--

INSERT INTO `puswil_buku` (`buku_id`, `buku_kategori`, `buku_kode_klasifikasi`, `buku_jumlah_judul`, `buku_jumlah_eksemplar`, `buku_tgl_dibuat`) VALUES
(2, 'Karya Umum', '000', 3965, 20977, '2019-09-29 17:53:45'),
(3, 'Filsafat', '100', 2940, 11700, '2019-09-29 19:41:48'),
(4, 'Agama', '200', 9198, 40457, '2019-10-04 18:39:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `puswil_laporan`
--

CREATE TABLE `puswil_laporan` (
  `laporan_id` int(11) NOT NULL,
  `laporan_tahun` year(4) NOT NULL,
  `laporan_bahan_pustaka` enum('DIPINJAM','DIKEMBALIKAN','BACA DI TEMPAT') NOT NULL,
  `laporan_karya_umum` int(11) NOT NULL,
  `laporan_filsafat` int(11) NOT NULL,
  `laporan_agama` int(11) NOT NULL,
  `laporan_ilmu_sosial` int(11) NOT NULL,
  `laporan_bahasa` int(11) NOT NULL,
  `laporan_ilmu_murni` int(11) NOT NULL,
  `laporan_ilmu_terapan` int(11) NOT NULL,
  `laporan_kesenian` int(11) NOT NULL,
  `laporan_sastra` int(11) NOT NULL,
  `laporan_geografi` int(11) NOT NULL,
  `laporan_tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `puswil_pengguna`
--

CREATE TABLE `puswil_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `puswil_pengguna`
--

INSERT INTO `puswil_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_tgl_dibuat`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '2019-10-09 09:01:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `puswil_pengunjung`
--

CREATE TABLE `puswil_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tahun` year(4) NOT NULL,
  `pengunjung_tipe` enum('PENGUNJUNG','PEMINJAMAN','PENGEMBALIAN','ANGGOTA') NOT NULL,
  `pengunjung_pelajar_lk` int(11) NOT NULL,
  `pengunjung_pelajar_pr` int(11) NOT NULL,
  `pengunjung_mahasiswa_lk` int(11) NOT NULL,
  `pengunjung_mahasiswa_pr` int(11) NOT NULL,
  `pengunjung_umum_lk` int(11) NOT NULL,
  `pengunjung_umum_pr` int(11) NOT NULL,
  `pengunjung_tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `puswil_pengunjung`
--

INSERT INTO `puswil_pengunjung` (`pengunjung_id`, `pengunjung_tahun`, `pengunjung_tipe`, `pengunjung_pelajar_lk`, `pengunjung_pelajar_pr`, `pengunjung_mahasiswa_lk`, `pengunjung_mahasiswa_pr`, `pengunjung_umum_lk`, `pengunjung_umum_pr`, `pengunjung_tgl_dibuat`) VALUES
(1, 2018, 'PENGUNJUNG', 53393, 64749, 56611, 61093, 47224, 47630, '2019-10-05 11:39:24'),
(2, 2018, 'PEMINJAMAN', 358, 569, 3035, 8692, 1776, 2497, '2019-10-09 08:43:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `puswil_buku`
--
ALTER TABLE `puswil_buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indeks untuk tabel `puswil_laporan`
--
ALTER TABLE `puswil_laporan`
  ADD PRIMARY KEY (`laporan_id`);

--
-- Indeks untuk tabel `puswil_pengguna`
--
ALTER TABLE `puswil_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `puswil_pengunjung`
--
ALTER TABLE `puswil_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `puswil_buku`
--
ALTER TABLE `puswil_buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `puswil_laporan`
--
ALTER TABLE `puswil_laporan`
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `puswil_pengguna`
--
ALTER TABLE `puswil_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `puswil_pengunjung`
--
ALTER TABLE `puswil_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
