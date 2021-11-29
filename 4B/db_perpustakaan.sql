-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2021 pada 12.50
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `category_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `name`, `stok`, `image`, `deskripsi`, `category_id`) VALUES
('AP344', 'Algoritma &amp; Pemrograman', '35', 'alpro.jpg', 'Buku ini merupakan buku edisi keenam dari buku sebelumnya yaitu Algoritma dan Pemrograman dalam Bahasa Pascal dan C. Buku ini diperuntukkan bagi siapa saja yang ingin mempelajari bidang pemrograman.', 'PRGM'),
('BRT333', 'Boruto', '50', '61a4ba732c703.jpg', 'Boruto adalah serial komik lanjutan dari naruto', 'KMK'),
('LP312', 'Laskar Pelangi ', '12', 'lp.jpg', 'Novel yang bercerita tentang kehidupan enam remaja yang berasal dari daerah berbeda menimba ilmu di Pondok Madani Ponorogo, Jawa Timur', 'NVL'),
('N55', ' Negeri 5 Menara', '20', '5m.jpg', 'Negeri 5 Menara adalah roman karya Ahmad Fuadi yang diterbitkan oleh Gramedia pada tahun 2009. Novel ini bercerita tentang kehidupan 6 santri dari 6 daerah yang berbeda menuntut ilmu di Pondok Madani ', 'NVL'),
('NRT236', 'Naruto', '15', 'naruto.jpg', 'Serial ini didasarkan pada komik one-shot oleh Kishimoto yang diterbitkan dalam edisi Akamaru Jump pada Agustus 1997. ', 'KMK'),
('OP123', 'One Piece', '10', 'onepiece.jpg', 'sebuah seri manga Jepang yang ditulis dan diilustrasikan oleh Eiichiro Oda. Manga ini telah dimuat di majalah Weekly Shōnen Jump milik Shueisha sejak tanggal 22 Juli 1997,', 'KMK'),
('PW67', 'Pemrograman Web', '5', 'web.jpg', 'Buku ini membahas mengenai dasar-dasar bahasa pemrograman web antara lain : HyperText Markup Language (HTML), Cascading Style Sheets. (CSS)', 'PRGM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
('AGM', 'Agama'),
('KMK', 'Komik'),
('NVL', 'Novel'),
('PRGM', 'Programming');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
