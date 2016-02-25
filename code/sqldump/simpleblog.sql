-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 172.17.0.3:3306
-- Generation Time: Feb 25, 2016 at 06:45 AM
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
(18, 20, 48, 'cdsmclscdmlscdm', '2016-02-25 06:32:32'),
(19, 20, 48, 'Sangat imba komputernya', '2016-02-25 06:32:42'),
(20, 21, 49, 'Beuhh', '2016-02-25 06:34:03'),
(21, 20, 49, 'Mantap Gan!', '2016-02-25 06:34:20');

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
(48, 20, 'Komputer', '2016-02-26 00:00:00', 'Komputer adalah alat yang dipakai untuk mengolah data menurut prosedur yang telah dirumuskan. Kata computer pada awalnya dipergunakan untuk menggambarkan orang yang perkerjaannya melakukan perhitungan aritmatika, dengan atau tanpa alat bantu, tetapi arti kata ini kemudian dipindahkan kepada mesin itu sendiri. Asal mulanya, pengolahan informasi hampir eksklusif berhubungan dengan masalah aritmatika, tetapi komputer modern dipakai untuk banyak tugas yang tidak berhubungan dengan matematika.\r\nDalam arti seperti itu terdapat alat seperti slide rule, jenis kalkulator mekanik mulai dari abakus dan seterusnya, sampai semua komputer elektronik yang kontemporer. Istilah lebih baik yang cocok untuk arti luas seperti "komputer" adalah "yang mengolah informasi" atau "sistem pengolah informasi." Selama bertahun-tahun sudah ada beberapa arti yang berbeda dalam kata "komputer", dan beberapa kata yang berbeda tersebut sekarang disebut sebagai komputer.\r\nKata computer secara umum pernah dipergunakan untuk mendefiniskan orang yang melakukan perhitungan aritmatika, dengan atau tanpa mesin pembantu. Menurut Barnhart Concise Dictionary of Etymology, kata tersebut digunakan dalam bahasa Inggris pada tahun 1646 sebagai kata untuk "orang yang menghitung" kemudian menjelang 1897 juga digunakan sebagai "alat hitung mekanis". Selama Perang Dunia II kata tersebut menunjuk kepada para pekerja wanita Amerika Serikat dan Inggris yang pekerjaannya menghitung jalan artileri perang dengan mesin hitung.\r\nCharles Babbage mendesain salah satu mesin hitung pertama yang disebut mesin analitikal. Selain itu, berbagai alat mesin sederhana seperti slide rule juga sudah dapat dikatakan sebagai komputer.', 'uploads/ccc.png'),
(49, 21, 'Unit aritmatika dan logika', '2016-02-27 00:00:00', 'ALU, singkatan dari Arithmetic And Logic Unit (bahasa Indonesia: unit aritmatika dan logika), adalah salah satu bagian dalam dari sebuah mikroprosesor yang berfungsi untuk melakukan operasi hitungan aritmatika dan logika. Contoh operasi aritmatika adalah operasi penjumlahan dan pengurangan, sedangkan contoh operasi logika adalah logika AND dan OR. tugas utama dari ALU (Arithmetic And Logic Unit)adalah melakukan semua perhitungan aritmatika atau matematika yang terjadi sesuai dengan instruksi program. ALU melakukan operasi arithmatika dengan dasar pertambahan, sedang operasi arithmatika yang lainnya, seperti pengurangan, perkalian, dan pembagian dilakukan dengan dasar penjumlahan. sehingga sirkuit elektronik di ALU yang digunakan untuk melaksanakan operasi arithmatika ini disebut adder. Tugas lalin dari ALU adalah melakukan keputusan dari operasi logika sesuai dengan instruksi program. Operasi logika (logical operation) meliputi perbandingan dua buah elemen logika dengan menggunakan operator logika, yaitu:\r\na. sama dengan (=)\r\nb. tidak sama dengan (<>)\r\nc. kurang dari (<)\r\nd. kurang atau sama dengan dari (<=)\r\ne. lebih besar dari (>)\r\n', 'uploads/330px-ALU_symbol.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `base2` int(11) DEFAULT '0',
  `random` int(11) DEFAULT '0',
  `shared_key` int(11) DEFAULT '0',
  `Identifier` varchar(255) DEFAULT '0',
  `Token` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Nama`, `Email`, `Password`, `base2`, `random`, `shared_key`, `Identifier`, `Token`) VALUES
(20, 'Daniar Kurniawan', 'daniar.h.k@gmail.com', 'da', 0, 0, 0, '34ca3e624e28ec0922e357effdfc5d6729bd03c49f9fd471612da6235b2e7ec7', 'd1d9f7894bfc3f71b08e40ea3b09bff5f7d19259e1305d62e6912e4708f83289'),
(21, 'Fandi Azam Wiranata', 'fandi@gmail.com', 'fa', 0, 0, 0, '0', 'b168127390adb3f03215edc972a61687c637fedc0c200413086ac931971bf541');

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
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
