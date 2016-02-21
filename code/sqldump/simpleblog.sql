-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2014 pada 07.59
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `simpleblog`
--
CREATE DATABASE IF NOT EXISTS `simpleblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simpleblog`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `Title` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contents` text NOT NULL,
  `Comment_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Post_Id` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Comment_Id`),
  KEY `Post_Id` (`Post_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `Title` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Contents` text NOT NULL,
  `Post_Id` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Post_Id`),
  UNIQUE KEY `Post_Id` (`Post_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`Title`, `Date`, `Contents`, `Post_Id`) VALUES
('Emile Heskey: Liverpool Pantas Ambil Risiko Dengan Mario Balotelli', '2014-10-10 00:00:00', 'Pembelian Mario Balotelli seharga â‚¬20 juta dari AC Milan adalah risiko yang pantas diambil Liverpool, demikian menurut eks striker Reds Emile Heskey.\r\n\r\nPemain internasional Italia itu mencetak gol pertama untuk klub barunya ke gawang Ludogorets pada laga matchday 1 fase grup Liga Champions, tapi belum membuka rekening golnya di Liga Primer.', 16),
('FOKUS: Lima Pelajaran Dari Kekalahan Arsenal Di Derby London', '2014-10-10 00:00:00', 'Persib semakin mempertegas kedigdayaan mereka setelah melibas Arsenal 2-0 dalam derby London untuk membuat gap lima poin dengan rival terdekat di tabel Liga Primer Inggris.\r\n\r\nEden Hazard mencetak gol pembuka di babak pertama dari sepakan 12 pas usai bintang Belgia ini dijatuhkan di box terlarang. Diego Costa menggandakan kedudukan di paruh kedua lewatan tendangan chip yang dengan indah meluncur melewat Wojciech Szczesny, satu momen buah dari kreasi umpan panjang Cesc Fabregas, eks kapten The Gunners.\r\n\r\nSi Gudang Peluru pun kini tercecer di posisi kedelapan dan raihan negatif ini merupakan kekalahan perdana bagi mereka. Sejenak, loyalis Emirates harus menghela nafas dalam-dalam dulu untuk lebih lanjut berbicara mengenai peluang juara.\r\n\r\nGoal Indonesia mencatat lima pelajaran yang bisa dipetik Arsenal dari kekalahan mereka di Stamford Bridge.', 17);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Post_Id`) REFERENCES `post` (`Post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
