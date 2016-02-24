-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 172.17.0.3:3306
-- Generation Time: Feb 24, 2016 at 01:16 PM
-- Server version: 5.5.48-log
-- PHP Version: 5.6.9-1+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpleblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_Id` int(11) NOT NULL,
  `Creator_Id` int(11) NOT NULL,
  `Post_Id` int(11) NOT NULL,
  `Contents` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_Id`, `Creator_Id`, `Post_Id`, `Contents`, `Time`) VALUES
(14, 3, 32, 'cdscsdc', '2016-02-23 08:38:35'),
(15, 3, 32, 'cdscsdccsdcsdccdsc', '2016-02-23 08:38:38'),
(16, 18, 39, '-------------------------------------------------------------------------------&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;&#039;', '2016-02-24 10:43:12'),
(17, 18, 39, '&lt;script&gt;&lt;script&gt;', '2016-02-24 10:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_Id` int(100) NOT NULL,
  `Creator_Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Contents` text NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_Id`, `Creator_Id`, `Title`, `Date`, `Contents`, `Image`) VALUES
(32, 3, 'cdscsdcsdc', '2016-02-23 00:00:00', 'Bujangga Manik mangrupa salah sahiji naskah dina basa Sunda anu pohara gedé ajénna. Naskah ieu ditulis dina wangun puisi naratif dina daun nipah anu kiwari disimpen di Pabukon Bodleian di Oxford saprak taun 1627 (MS Jav. b. 3 (R), cf. Noorduyn 1968:469, Ricklefs/Voorhoeve 1977:181). Ieu naskah diwangun ku 29 lambar daun nipah, anu unggal lambarna ngandung kira-kira 56 jajar (rumpaka) anu tiap rumpakana diwangun ku 8 padalisan, bentuk puisi Sunda buhun.\r\n\r\nAnu ngalalakon dina ieu naskah téh nyaéta Prabu Jaya Pakuan nu boga landihan Bujangga Manik, saurang resi Hindu anu, sanajan mangrupa saurang prabu di karaton Pakuan Pajajaran (puseur dayeuh Karajaan Sunda, anu perenahna di wewengkon anu ayeuna jadi dayeuh Bogor), leuwih resep ngalakonan hirup jadi resi. Salaku resi, manéhna ngumbara mapay kabuyutan atawa puseur kaagamaan (Hindu) nu aya di Jawa jeung Bali. Anjeunna nyaritakeun yén pangumbaraanana téh dipaju dua kali. Samulangna ti Jawa, Bujangga Manik tatapa di hiji gunung di Tanah Sunda (bale geusan ngajadina) nepi ka pupusna. Mamam', NULL),
(36, 3, 'Mamam', '2016-12-12 00:00:00', 'Mamam mamam', NULL),
(37, 3, 'Mamam', '2016-12-12 00:00:00', 'mamam', NULL),
(38, 3, 'Mamam', '2016-12-12 00:00:00', 'mamam; CREATE DATABASE Suppliers', NULL),
(39, 18, 'Aing mamam', '2020-12-12 00:00:00', 'Aing juga mamam', NULL),
(40, 18, 'Mamam', '2016-12-12 00:00:00', 'Mamam', NULL),
(41, 18, 'aidjnaijfni', '3242-12-12 00:00:00', 'aksjdnaisjfniajdsfn', NULL),
(42, 18, 'aidjnaijfni', '3242-12-12 00:00:00', 'aksjdnaisjfniajdsfn', NULL),
(43, 18, 'aidjnaijfni', '3242-12-12 00:00:00', 'aksjdnaisjfniajdsfn', NULL),
(44, 18, 'aidjnaijfni', '3242-12-12 00:00:00', 'aksjdnaisjfniajdsfn', NULL),
(45, 18, 'Mamam', '3123-12-12 00:00:00', 'Mamam', NULL),
(46, 18, 'Mamam', '3123-12-12 00:00:00', 'Mamam', NULL),
(47, 18, 'Pake image', '2088-12-12 00:00:00', 'Mamam', 'uploads/Screenshot from 2016-02-05 15:59:15.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Nama`, `Email`, `Password`) VALUES
(3, 'Daniar Heri Kurniawan', 'daniar.h.k@gmail.com', 'da'),
(8, 'Tegar Aji Pangestu', 'tegar@gmail.com', 'te'),
(9, 'Fandi Azam Wiranata', 'fandi@gmail.com', 'fa'),
(10, 'Kurnia Mega', 'kurnia@gmail.com', 'ku'),
(11, 'Subagyo', 'su@gmail.com', 'su'),
(12, 'aa', 'aa@gmail.com', 'aa'),
(13, 'bb', 'bb@gmail.com', 'bb'),
(14, 'rr', 'rr@gmail.com', 'rr'),
(15, 'ww', 'ww@gmail.com', 'ww'),
(16, 'tt', 'tt@gmail.com', 'tt'),
(17, 'qq', 'qq@gmail.com', 'qq'),
(18, 'tegar', 'mamam@gmail.com', 'mamam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_Id`),
  ADD KEY `Post_Id` (`Post_Id`),
  ADD KEY `Creator_id` (`Creator_Id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_Id`),
  ADD UNIQUE KEY `Post_Id` (`Post_Id`),
  ADD KEY `creator_id` (`Creator_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `id` (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Post_Id`) REFERENCES `post` (`Post_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Creator_Id`) REFERENCES `user` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `pembuat_post` FOREIGN KEY (`Creator_Id`) REFERENCES `user` (`User_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
