-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2022 pada 03.32
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(70) NOT NULL,
  `id_produk` int(70) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `gambar_barang` varchar(250) NOT NULL,
  `date_barang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_produk`, `nama_barang`, `gambar_barang`, `date_barang`) VALUES
(30, 27, 'ss', 'ss-14.11.2022-1893.png', '14.11.2022'),
(31, 28, 'f', 'f-14.11.2022-3296.jpeg', '14.11.2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `harga_barang` int(150) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `nama_user` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `nama_barang`, `harga_barang`, `gambar_barang`, `nama_user`) VALUES
(17, 's', 0, 's.png', 'user'),
(18, 'Kursi Lebar', 320000, 'Kursi Lebar-13.11.2022-4642.png', 'user'),
(19, 'ak', 0, 'ak.png', '<br />\r\n<b>Notice</b>:  Undefined variable: nama1 in <b>E:AplikasiXAMPPhtdocsPAlihat_data.php</b> on line <b>112</b><br '),
(20, 'e', 0, 'e.png', '<br />\r\n<b>Notice</b>:  Undefined variable: nama1 in <b>E:AplikasiXAMPPhtdocsPAlihat_data.php</b> on line <b>112</b><br '),
(21, 'e', 0, 'e.png', 'user'),
(22, 'ak', 0, 'ak.png', 'user'),
(23, '', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loginn`
--

CREATE TABLE `loginn` (
  `id_login` int(70) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `loginn`
--

INSERT INTO `loginn` (`id_login`, `email`, `username`, `psw`) VALUES
(1, 'muh.hafizz80@gmail.com', 'Hafiz', '$2y$10$/dxYRW6ml/w070j8Oj0m3OAKcEd/GjC9YxzbKz6NmbSWt27BqqOaq'),
(2, 'uzumaki.kaneki27@gmail.com', 'user', '$2y$10$noFWz32TDbS0pZV1jNKSuuc8N13otnurH2RZE9oBtJZklI/NW9PL.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_admin`
--

CREATE TABLE `login_admin` (
  `id_admin` int(70) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `psw_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_admin`
--

INSERT INTO `login_admin` (`id_admin`, `email_admin`, `username_admin`, `psw_admin`) VALUES
(3, 'admin@admin.com', 'admin', '$2y$10$14KPguTi5QXb36kJqDQEq.RAC2eXrUo62xgcxiJ5w9bR15mDd/5Gm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(70) NOT NULL,
  `jenis_produk` varchar(150) NOT NULL,
  `harga_produk` int(70) NOT NULL,
  `jumlah_produk` int(70) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `jenis_produk`, `harga_produk`, `jumlah_produk`, `deskripsi_produk`) VALUES
(20, '', 120000, 0, 'ssssss'),
(21, '', 0, 0, ''),
(22, '', 0, 0, 'aku bukan'),
(23, 'Kursi', 320000, 21, 'Kursi lipat ini bagus dan bisa di lipat'),
(24, 'Meja Bundar', 12000, 0, ''),
(25, '', 0, 0, ''),
(26, '', 0, 0, ''),
(27, '', 0, 0, ''),
(28, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review_barang`
--

CREATE TABLE `review_barang` (
  `id_review` int(70) NOT NULL,
  `nama_review` varchar(255) NOT NULL,
  `komentar_review` varchar(255) NOT NULL,
  `id_barang` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `review_barang`
--

INSERT INTO `review_barang` (`id_review`, `nama_review`, `komentar_review`, `id_barang`) VALUES
(1, 'Hafiz', 'Bagus Barang Nya Recomended', 1),
(2, 'Kevin', 'Ahh burung jelek kotor', 2),
(3, 'Hafiz', 'Barang nya bagus, recomended parahh', 9),
(4, 'Riski', 'Lemari nya bagus tapi sayang terlalu mahal', 5),
(5, 'Irsyad', 'Sofanya gabus tapi jelek', 7),
(6, 'Hafiz', 'Ahh burung jelek kotor', 5),
(7, 'Hafiz', '2', 5),
(8, 'Kevin', '1', 5),
(9, 'Hafiz', 'Bagus sih', 8),
(10, 'user', 'HAfizz', 8),
(11, 'Hiek', '22', 8),
(12, 'Riski', 'a', 10),
(13, 'Hafiz', 'ha', 11),
(14, 'ss', 's', 11),
(15, 'Muh. Hafiz', 'Bagus', 13),
(16, 'Hafiz', 'Bagus', 13),
(17, 'Hafiz', 'Bagusa', 21),
(18, 'Hafiz', 'Bagus', 21),
(19, '', '', 22);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `loginn`
--
ALTER TABLE `loginn`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `review_barang`
--
ALTER TABLE `review_barang`
  ADD PRIMARY KEY (`id_review`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `loginn`
--
ALTER TABLE `loginn`
  MODIFY `id_login` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id_admin` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `review_barang`
--
ALTER TABLE `review_barang`
  MODIFY `id_review` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
