-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 172.17.0.3:3306
-- Generation Time: Feb 23, 2016 at 11:04 AM
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
(16, 3, 34, 'kcnsdknck skdncks ksdncks dksdck sdkc', '2016-02-23 09:51:24'),
(17, 8, 37, 'ini tegar', '2016-02-23 10:09:37'),
(18, 8, 34, 'ini tegar', '2016-02-23 10:09:53'),
(19, 3, 37, 'dcscscd', '2016-02-23 10:12:29'),
(20, 3, 37, 'ini daniar', '2016-02-23 10:12:36'),
(21, 3, 37, 'fvdvdv', '2016-02-23 10:14:44'),
(22, 3, 37, 'cdscscscd', '2016-02-23 10:15:49'),
(23, 3, 37, 'scnkjcdnkscdsdccds', '2016-02-23 10:20:18'),
(24, 3, 37, 'cdscscsdc', '2016-02-23 10:21:08'),
(25, 3, 37, 'cdscscsc', '2016-02-23 10:21:26'),
(26, 19, 34, 'cdflkvnkdfvnkdnv', '2016-02-23 11:01:19'),
(27, 19, 37, 'cdscsdcs', '2016-02-23 11:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_Id` int(100) NOT NULL,
  `Creator_Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_Id`, `Creator_Id`, `Title`, `Date`, `Contents`) VALUES
(34, 3, 'Amerika Serikat ', '2016-02-24 00:00:00', 'Amerika Serikat, disingkat dengan AS (bahasa Inggris: United States of America/U.S.A. disingkat United States/US), atau secara umum dikenal dengan Amerika saja,[catatan 1] adalah sebuah negara republik konstitusional federal yang terdiri dari lima puluh negara bagian dan sebuah distrik federal.[6] Negara ini terletak di bagian tengah Amerika Utara, yang menjadi lokasi dari empat puluh delapan negara bagian yang saling bersebelahan, beserta distrik ibu kota Washington, D.C.. Amerika Serikat diapit oleh Samudra Pasifik dan Atlantik di sebelah barat dan timur, berbatasan dengan Kanada di sebelah utara, dan Meksiko di sebelah selatan. Dua negara bagian lainnya, yaitu Alaska dan Hawaii, terletak terpisah dari dataran utama Amerika Serikat. Negara bagian Alaska terletak di sebelah ujung barat laut Amerika Utara, berbatasan dengan Kanada di sebelah timur dan Rusia di sebelah barat, yang dipisahkan oleh Selat Bering. Sedangkan negara bagian Hawaii adalah sebuah kepulauan yang berlokasi di Samudra Pasifik. Amerika Serikat juga memiliki beberapa teritori di Pasifik dan Karibia. Dengan luas wilayah 3,79  juta mil persegi (9,83 juta km2) dan jumlah penduduk sebanyak 315 juta jiwa, Amerika Serikat merupakan negara terluas ketiga atau keempat di dunia, dan terbesar ketiga menurut jumlah penduduk. Amerika Serikat adalah salah satu negara yang paling multietnik dan paling multikultural di dunia, yang muncul akibat adanya imigrasi besar-besaran dari berbagai penjuru dunia.[7] Iklim dan geografi Amerika Serikat juga sangat beragam dan negara ini menjadi tempat tinggal bagi beragam spesies.'),
(35, 3, 'Dewan Keamanan Perserikatan Bangsa-Bangsa', '2016-02-24 00:00:00', 'Dewan Keamanan PBB adalah salah satu dari enam badan utama PBB. Piagam PBB memberikan mandat kepada Dewan Keamanan untuk menjaga perdamaian dan keamanan internasional. Piagam PBB juga memberikan kewenangan kepada Dewan Kemanan untuk:\r\n1. menginvestigasi situasi apapun yang mengancam perdamaian dunia;\r\n2. merekomendasikan prosedur penyelesaian sengketa secara damai;\r\n3. meminta seluruh negara anggota PBB untuk memutuskan hubungan ekonomi, serta laut, udara, pos, komunikasi radio, atau hubungan diplomatic; dan\r\n4. melaksanakan keputusan Dewan Keamanan secara militer, atau dengan cara-cara lainnya.'),
(37, 8, 'Republik Rakyat Tiongkok', '2016-02-26 00:00:00', 'Sebagai negara dengan penduduk terbanyak di dunia, dengan populasi melebihi 1,363 miliar jiwa (perkiraan 2014), yang mayoritas merupakan bangsa Tionghoa. Untuk menekan jumlah penduduk, pemerintah giat menggalakkan kebijakan satu anak. Tiongkok Daratan merupakan istilah yang digunakan untuk merujuk kepada kawasan di bawah pemerintahan RRT dan tidak termasuk kawasan administrasi khusus Hong Kong dan Makau, sementara nama Republik Tiongkok mengacu pada entitas lain yang dulu pernah menguasai Tiongkok sejak tahun 1912 hingga kekalahannya pada Perang Saudara Tiongkok. Saat ini Republik Tiongkok hanya menguasai pulau Taiwan, dan beribukota di Taipei, oleh karena itu lazim disebut Tionghoa Taipei, terutama dalam even-even olahraga. RRT mengklaim wilayah milik Republik Tiongkok (yang umum dikenal dengan Taiwan) namun tidak memerintahnya, sedangkan Republik Tiongkok mengklaim kedaulatan terhadap seluruh Tiongkok daratan yang saat ini dikuasai RRT. (lihat pula: Status politik Taiwan)[6]');

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
(18, 'Tegar Aji Pangestu', 'tr@gmail.com', 'tr'),
(19, 'Odie Syah', 'odie@gmail.com', 'od');

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
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
