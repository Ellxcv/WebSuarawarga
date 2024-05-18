-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Bulan Mei 2024 pada 14.31
-- Versi server: 8.0.30
-- Versi PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_suarawarga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `input`
--

CREATE TABLE `input` (
  `id_input` int NOT NULL,
  `id_petisi` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petisi`
--

CREATE TABLE `petisi` (
  `id_petisi` int NOT NULL,
  `id_pengaduan` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `judul` (`judul`),
  ADD KEY `id_petisi` (`id_petisi`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `judul` (`judul`);

--
-- Indeks untuk tabel `petisi`
--
ALTER TABLE `petisi`
  ADD PRIMARY KEY (`id_petisi`),
  ADD KEY `judul` (`judul`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `input`
--
ALTER TABLE `input`
  MODIFY `id_input` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petisi`
--
ALTER TABLE `petisi`
  MODIFY `id_petisi` int NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `input`
--
ALTER TABLE `input`
  ADD CONSTRAINT `input_ibfk_1` FOREIGN KEY (`id_petisi`) REFERENCES `petisi` (`id_petisi`);

--
-- Ketidakleluasaan untuk tabel `petisi`
--
ALTER TABLE `petisi`
  ADD CONSTRAINT `petisi_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
