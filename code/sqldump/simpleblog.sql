-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 172.17.0.3:3306
-- Generation Time: Feb 26, 2016 at 02:40 PM
-- Server version: 5.6.29-log
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
(22, 22, 51, 'Woy.. komeeen', '2016-02-26 14:33:50');

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
(51, 22, 'Datalog: Deductive Database Programming', '2016-02-27 00:00:00', 'Datalog is\r\na declarative logic language in which each formula is a function-free Horn clause, and every variable in the head of a clause must appear in the body of the clause.\r\n\r\na lightweight deductive database system where queries and database updates are expressed in the logic language.\r\n\r\nThe use of Datalog syntax and an implementation based on tabling intermediate results ensures that all queries terminate.\r\n\r\n    1 Datalog Module Language\r\n    2 Tutorial\r\n    3 Parenthetical Datalog Module Language\r\n    4 Racket Interoperability\r\n    5 Acknowledgments', 'uploads/b.jpg'),
(52, 22, 'Komputer', '2016-02-27 00:00:00', 'Komputer adalah alat yang dipakai untuk mengolah data menurut prosedur yang telah dirumuskan. Kata computer pada awalnya dipergunakan untuk menggambarkan orang yang perkerjaannya melakukan perhitungan aritmatika, dengan atau tanpa alat bantu, tetapi arti kata ini kemudian dipindahkan kepada mesin itu sendiri. Asal mulanya, pengolahan informasi hampir eksklusif berhubungan dengan masalah aritmatika, tetapi komputer modern dipakai untuk banyak tugas yang tidak berhubungan dengan matematika.\r\nDalam arti seperti itu terdapat alat seperti slide rule, jenis kalkulator mekanik mulai dari abakus dan seterusnya, sampai semua komputer elektronik yang kontemporer. Istilah lebih baik yang cocok untuk arti luas seperti "komputer" adalah "yang mengolah informasi" atau "sistem pengolah informasi." Selama bertahun-tahun sudah ada beberapa arti yang berbeda dalam kata "komputer", dan beberapa kata yang berbeda tersebut sekarang disebut sebagai komputer.\r\nKata computer secara umum pernah dipergunakan untuk mendefiniskan orang yang melakukan perhitungan aritmatika, dengan atau tanpa mesin pembantu. Menurut Barnhart Concise Dictionary of Etymology, kata tersebut digunakan dalam bahasa Inggris pada tahun 1646 sebagai kata untuk "orang yang menghitung" kemudian menjelang 1897 juga digunakan sebagai "alat hitung mekanis". Selama Perang Dunia II kata tersebut menunjuk kepada para pekerja wanita Amerika Serikat dan Inggris yang pekerjaannya menghitung jalan artileri perang dengan mesin hitung.\r\nCharles Babbage mendesain salah satu mesin hitung pertama yang disebut mesin analitikal. Selain itu, berbagai alat mesin sederhana seperti slide rule juga sudah dapat dikatakan sebagai komputer.', 'uploads/b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `base2` int(11) DEFAULT '0',
  `random` int(11) DEFAULT '0',
  `shared_key` int(11) DEFAULT '0',
  `Identifier` varchar(256) DEFAULT '0',
  `Token` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Nama`, `Email`, `Password`, `base2`, `random`, `shared_key`, `Identifier`, `Token`) VALUES
(22, 'Daniar Kurniawan', 'daniar.h.k@gmail.com', 'aa58b21b01d6b8a99c1a5856962dbac36c758a79dc0a77c2e013ce2c39ecdc8a', 54, 24, 27, '0', 'cb29ffc5098b1a59dd9411f9db8f6b50bea330f7f7314ef4aa9646e77adf5de5');

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
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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