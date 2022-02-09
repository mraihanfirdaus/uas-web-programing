-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2022 pada 13.12
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `Nama` int(15) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `Agama` varchar(15) NOT NULL,
  `Jenis Kelamin` varchar(10) NOT NULL,
  `Mata Pelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_siswi`
--

CREATE TABLE `siswa_siswi` (
  `Nisn` int(10) NOT NULL,
  `Nama_Siswa` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(50) NOT NULL,
  `Jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_siswi`
--

INSERT INTO `siswa_siswi` (`Nisn`, `Nama_Siswa`, `Jenis_Kelamin`, `Jurusan`) VALUES
(19875736, 'Herni irma', 'Perempuan', 'Teknik Jaringan Komputer'),
(190403076, 'Muhamad Raihan Firdaus', 'Laki-Laki', 'Airframe & Powerplant'),
(190403503, 'Suhendrik lillahi', 'Laki-Laki', 'Tata Boga'),
(193082536, 'Agung Maulana', 'Perempuan', 'Tata Boga'),
(196502859, 'Ahmad Sodrul Tamam', 'Laki-Laki', 'Akutansi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`Nama`);

--
-- Indeks untuk tabel `siswa_siswi`
--
ALTER TABLE `siswa_siswi`
  ADD PRIMARY KEY (`Nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
