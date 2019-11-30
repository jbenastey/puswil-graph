-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2019 pada 08.01
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
-- Struktur dari tabel `dim_anggota`
--

CREATE TABLE `dim_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `nomor_anggota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_anggota`
--

INSERT INTO `dim_anggota` (`id_anggota`, `nama_anggota`, `nomor_anggota`) VALUES
(1, 'jihad', '14423'),
(2, 'ucok', '131'),
(3, 'usman', '14423'),
(4, 'ujang', '131'),
(5, 'Asep Mahfudz', '10201500183'),
(6, 'Pedro Relian', '03201800075'),
(7, 'Anisa Aulia', '11201700179'),
(8, 'Endar Ernanda', '10201600252'),
(9, 'Irma Yunita', '02201700255');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_buku`
--

CREATE TABLE `dim_buku` (
  `id_buku` varchar(20) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_buku`
--

INSERT INTO `dim_buku` (`id_buku`, `kode_buku`, `judul_buku`) VALUES
('13232', '13232', 'ASDDA'),
('13233', '13232', 'data warehouse'),
('13234', '13232', 'daspro'),
('13235', '13232', 'metnum'),
('13236', '1312', 'daspro'),
('13237', '113', 'fikih'),
('13238', '1321', 'akidah'),
('13239', '13', 'laptop'),
('13240', '13', 'hape');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_peminjam`
--

CREATE TABLE `dim_peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `nomor_anggota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_peminjam`
--

INSERT INTO `dim_peminjam` (`id_peminjam`, `nama_peminjam`, `nomor_anggota`) VALUES
(1, 'jihad', '14423'),
(2, 'ucok', '131'),
(3, 'usman', '14423'),
(4, 'ujang', '131'),
(5, 'Asep Mahfudz', '10201500183'),
(6, 'Pedro Relian', '03201800075'),
(7, 'Anisa Aulia', '11201700179'),
(8, 'Endar Ernanda', '10201600252'),
(9, 'Irma Yunita', '02201700255');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_pengunjung`
--

CREATE TABLE `dim_pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `nik_pengunjung` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_pengunjung`
--

INSERT INTO `dim_pengunjung` (`id_pengunjung`, `nama_pengunjung`, `nik_pengunjung`) VALUES
(1, 'jihad', '14423'),
(2, 'ucok', '131'),
(3, 'usman', '14423'),
(4, 'ujang', '131'),
(5, 'Asep Mahfudz', '10201500183'),
(6, 'Pedro Relian', '03201800075'),
(7, 'Anisa Aulia', '11201700179'),
(8, 'Endar Ernanda', '10201600252'),
(9, 'Irma Yunita', '02201700255');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_waktu`
--

CREATE TABLE `dim_waktu` (
  `id_waktu` int(11) NOT NULL,
  `waktu` text NOT NULL,
  `hari_waktu` text NOT NULL,
  `bulan_waktu` text NOT NULL,
  `tahun_waktu` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_waktu`
--

INSERT INTO `dim_waktu` (`id_waktu`, `waktu`, `hari_waktu`, `bulan_waktu`, `tahun_waktu`) VALUES
(1, '02:26:44', 'Minggu', '11', 2019),
(2, '02:26:44', 'Minggu', '11', 2019),
(3, '02:26:44', 'Minggu', '11', 2019),
(4, '02:26:44', 'Minggu', '11', 2019),
(5, '13:50:29', 'Kamis', '11', 2019),
(6, '13:50:29', 'Kamis', '11', 2019),
(7, '13:50:29', 'Kamis', '11', 2019),
(8, '13:50:29', 'Kamis', '11', 2019),
(9, '13:50:29', 'Kamis', '11', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_anggota`
--

CREATE TABLE `excel_anggota` (
  `anggota_id` int(11) NOT NULL,
  `anggota_nama` varchar(255) NOT NULL,
  `anggota_nomor` varchar(20) NOT NULL,
  `anggota_umum_l` int(11) DEFAULT '0',
  `anggota_umum_p` int(11) DEFAULT '0',
  `anggota_mahasiswa_l` int(11) DEFAULT '0',
  `anggota_mahasiswa_p` int(11) DEFAULT '0',
  `anggota_pelajar_l` int(11) DEFAULT '0',
  `anggota_pelajar_p` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_anggota`
--

INSERT INTO `excel_anggota` (`anggota_id`, `anggota_nama`, `anggota_nomor`, `anggota_umum_l`, `anggota_umum_p`, `anggota_mahasiswa_l`, `anggota_mahasiswa_p`, `anggota_pelajar_l`, `anggota_pelajar_p`) VALUES
(1, 'jihad', '14423', NULL, 1, NULL, NULL, NULL, NULL),
(2, 'ucok', '131', NULL, NULL, 1, NULL, NULL, NULL),
(3, 'usman', '14423', NULL, 1, NULL, NULL, NULL, NULL),
(4, 'ujang', '131', NULL, NULL, NULL, NULL, 1, NULL),
(5, 'Asep Mahfudz', '10201500183', NULL, NULL, 1, NULL, NULL, NULL),
(6, 'Pedro Relian', '03201800075', NULL, NULL, 1, NULL, NULL, NULL),
(7, 'Anisa Aulia', '11201700179', NULL, NULL, NULL, 1, NULL, NULL),
(8, 'Endar Ernanda', '10201600252', NULL, NULL, 1, NULL, NULL, NULL),
(9, 'Irma Yunita', '02201700255', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_buku`
--

CREATE TABLE `excel_buku` (
  `buku_id` int(20) NOT NULL,
  `buku_kode` varchar(10) NOT NULL,
  `buku_judul` varchar(255) NOT NULL,
  `buku_edisi` varchar(255) NOT NULL,
  `buku_penerbit` varchar(255) NOT NULL,
  `buku_fisik` text,
  `buku_subjek` varchar(255) DEFAULT NULL,
  `buku_eksemplar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_buku`
--

INSERT INTO `excel_buku` (`buku_id`, `buku_kode`, `buku_judul`, `buku_edisi`, `buku_penerbit`, `buku_fisik`, `buku_subjek`, `buku_eksemplar`) VALUES
(13232, '13232', 'ASDDA', '13a', 'da', 'ds', 'd', 2),
(13233, '13232', 'data warehouse', '13a', 'da', 'ds', 'd', 3),
(13234, '13232', 'daspro', '13a', 'da', 'ds', 'd', 4),
(13235, '13232', 'metnum', '13a', 'da', 'ds', 'd', 5),
(13236, '1312', 'daspro', 'asda', 'adsda', 'asdsa', 'saddsa', 0),
(13237, '113', 'fikih', 'asdasd', 'asd', 'adssad', 'dsa', 0),
(13238, '1321', 'akidah', 'adsasd', 'das', 'asddas', 'asd', 0),
(13239, '13', 'laptop', 'sadsda', 'sad', 'sa', 'asd', 0),
(13240, '13', 'hape', 'asddsa', 'asdas', 'dsa', 'dsaasd', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_peminjam`
--

CREATE TABLE `excel_peminjam` (
  `peminjam_id` int(11) NOT NULL,
  `peminjam_nama` varchar(255) NOT NULL,
  `peminjam_no_anggota` varchar(255) NOT NULL,
  `peminjam_umum_l` int(11) DEFAULT '0',
  `peminjam_umum_p` int(11) DEFAULT '0',
  `peminjam_mahasiswa_l` int(11) DEFAULT '0',
  `peminjam_mahasiswa_p` int(11) DEFAULT '0',
  `peminjam_pelajar_l` int(11) DEFAULT '0',
  `peminjam_pelajar_p` int(11) DEFAULT '0',
  `peminjam_klas_000` int(11) DEFAULT NULL,
  `peminjam_klas_100` int(11) DEFAULT NULL,
  `peminjam_klas_200` int(11) DEFAULT NULL,
  `peminjam_klas_300` int(11) DEFAULT NULL,
  `peminjam_klas_400` int(11) DEFAULT NULL,
  `peminjam_klas_500` int(11) DEFAULT NULL,
  `peminjam_klas_600` int(11) DEFAULT NULL,
  `peminjam_klas_700` int(11) DEFAULT NULL,
  `peminjam_klas_800` int(11) DEFAULT NULL,
  `peminjam_klas_900` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_peminjam`
--

INSERT INTO `excel_peminjam` (`peminjam_id`, `peminjam_nama`, `peminjam_no_anggota`, `peminjam_umum_l`, `peminjam_umum_p`, `peminjam_mahasiswa_l`, `peminjam_mahasiswa_p`, `peminjam_pelajar_l`, `peminjam_pelajar_p`, `peminjam_klas_000`, `peminjam_klas_100`, `peminjam_klas_200`, `peminjam_klas_300`, `peminjam_klas_400`, `peminjam_klas_500`, `peminjam_klas_600`, `peminjam_klas_700`, `peminjam_klas_800`, `peminjam_klas_900`) VALUES
(1, 'jihad', '14423', NULL, 1, NULL, NULL, NULL, NULL, 1, 2, NULL, 4, 5, NULL, 7, NULL, NULL, NULL),
(2, 'ucok', '131', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, 4, 5, NULL, 7, NULL, NULL, NULL),
(3, 'usman', '14423', NULL, 1, NULL, NULL, NULL, NULL, 1, 2, NULL, 4, 5, NULL, 7, NULL, NULL, NULL),
(4, 'ujang', '131', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, 4, 5, NULL, 7, NULL, NULL, NULL),
(5, 'Asep Mahfudz', '10201500183', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(6, 'Pedro Relian', '03201800075', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Anisa Aulia', '11201700179', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL),
(8, 'Endar Ernanda', '10201600252', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL),
(9, 'Irma Yunita', '02201700255', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_pengunjung`
--

CREATE TABLE `excel_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_nama` varchar(255) NOT NULL,
  `pengunjung_nik` varchar(20) NOT NULL,
  `pengunjung_umum_l` int(11) DEFAULT '0',
  `pengunjung_umum_p` int(11) DEFAULT '0',
  `pengunjung_mahasiswa_l` int(11) DEFAULT '0',
  `pengunjung_mahasiswa_p` int(11) DEFAULT '0',
  `pengunjung_pelajar_l` int(11) DEFAULT '0',
  `pengunjung_pelajar_p` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_pengunjung`
--

INSERT INTO `excel_pengunjung` (`pengunjung_id`, `pengunjung_nama`, `pengunjung_nik`, `pengunjung_umum_l`, `pengunjung_umum_p`, `pengunjung_mahasiswa_l`, `pengunjung_mahasiswa_p`, `pengunjung_pelajar_l`, `pengunjung_pelajar_p`) VALUES
(1, 'jihad', '14423', NULL, 1, NULL, NULL, NULL, NULL),
(2, 'ucok', '131', 1, NULL, NULL, NULL, NULL, NULL),
(3, 'usman', '14423', NULL, 1, NULL, NULL, NULL, NULL),
(4, 'ujang', '131', 1, NULL, NULL, NULL, NULL, NULL),
(5, 'Asep Mahfudz', '10201500183', NULL, NULL, 1, NULL, NULL, NULL),
(6, 'Pedro Relian', '03201800075', NULL, NULL, 1, NULL, NULL, NULL),
(7, 'Anisa Aulia', '11201700179', NULL, NULL, NULL, 1, NULL, NULL),
(8, 'Endar Ernanda', '10201600252', NULL, NULL, 1, NULL, NULL, NULL),
(9, 'Irma Yunita', '02201700255', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fact_peminjaman`
--

CREATE TABLE `fact_peminjaman` (
  `id_fact` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `id_waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fact_peminjaman`
--

INSERT INTO `fact_peminjaman` (`id_fact`, `id_anggota`, `id_peminjam`, `id_pengunjung`, `id_buku`, `id_waktu`) VALUES
(1, 1, 1, 1, '13232', 1),
(2, 2, 2, 2, '13233', 2),
(3, 3, 3, 3, '13234', 3),
(4, 4, 4, 4, '13235', 4),
(5, 1, 1, 1, '13232', 1),
(6, 2, 2, 2, '13233', 2),
(7, 3, 3, 3, '13234', 3),
(8, 4, 4, 4, '13235', 4),
(9, 5, 5, 5, '13236', 5),
(10, 6, 6, 6, '13237', 6),
(11, 7, 7, 7, '13238', 7),
(12, 8, 8, 8, '13239', 8),
(13, 9, 9, 9, '13240', 9);

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-10-09 09:01:40');

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
-- Indeks untuk tabel `dim_anggota`
--
ALTER TABLE `dim_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `dim_buku`
--
ALTER TABLE `dim_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `dim_peminjam`
--
ALTER TABLE `dim_peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indeks untuk tabel `dim_pengunjung`
--
ALTER TABLE `dim_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `dim_waktu`
--
ALTER TABLE `dim_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indeks untuk tabel `excel_anggota`
--
ALTER TABLE `excel_anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indeks untuk tabel `excel_buku`
--
ALTER TABLE `excel_buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indeks untuk tabel `excel_peminjam`
--
ALTER TABLE `excel_peminjam`
  ADD PRIMARY KEY (`peminjam_id`);

--
-- Indeks untuk tabel `excel_pengunjung`
--
ALTER TABLE `excel_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indeks untuk tabel `fact_peminjaman`
--
ALTER TABLE `fact_peminjaman`
  ADD PRIMARY KEY (`id_fact`);

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
-- AUTO_INCREMENT untuk tabel `dim_waktu`
--
ALTER TABLE `dim_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `excel_anggota`
--
ALTER TABLE `excel_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `excel_buku`
--
ALTER TABLE `excel_buku`
  MODIFY `buku_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13241;

--
-- AUTO_INCREMENT untuk tabel `excel_peminjam`
--
ALTER TABLE `excel_peminjam`
  MODIFY `peminjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `excel_pengunjung`
--
ALTER TABLE `excel_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `fact_peminjaman`
--
ALTER TABLE `fact_peminjaman`
  MODIFY `id_fact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
