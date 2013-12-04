-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2013 at 02:48 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idate` date NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(300) NOT NULL,
  `longdesc` varchar(5000) NOT NULL,
  `user` varchar(60) NOT NULL,
  `fk_kategori` int(11) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `cover_folder` char(6) NOT NULL,
  `file` varchar(50) NOT NULL,
  `file_folder` char(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kategori` (`fk_kategori`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `idate`, `title`, `description`, `longdesc`, `user`, `fk_kategori`, `cover`, `cover_folder`, `file`, `file_folder`) VALUES
(19, '2013-11-21', 'OCD Version 3', 'Obsessive Corbuzier''s Diet, its work for him, how about you', 'Semua teori diet tidak ada yang salah atau benar, mereka menggunakan caranya sendiri sendiri dengan kebaikan atau kekurangannya masing-masing. Teori OCD adalah teori yang saya praktek kan dan terapkan untuk diri saya sendiri sebelum saya sebarkan untuk masyarakat dan sangat cocok untuk saya. - Tidak ada satupun teori diet yang menjamin penggunanya mendapatkan hasil maksimal, karena semua tergantung dari pemahaman dan kerja keras serta kesungguhan pelaku dalam melawan genetika pelaku. - Tidak ada bagian dari buku ini dapat digunakan, direproduksi, atau ditransmisikan dalam bentuk apapun atau dengan cara apapun, elektronik atau mekanis, termasuk fax, fotokopi, rekaman, atau penyimpanan informasi dan sistem pencarian oleh siapa pun kecuali untuk penggunaan pribadi sendiri. Panduan ini tidak boleh direproduksi dalam bentuk apapun tanpa izin tertulis dari Deddy corbuzier, kecuali dalam kasus resensi yang ingin mengutip ayat-ayat singkat guna dimasukkan dalam sebuah majalah, koran, atau jurnal, atau memperkenalkan buku ini untuk kepentingan orang banyak atau masyarakat (mengiklankannya) - Informasi dalam buku ini adalah untuk tujuan pendidikan saja. Informasi dalam buku ini didasarkan pada pengalaman pribadi saya sendiri dan interpretasi saya sendiri dari penelitian yang tersedia. Ini bukan nasihat medis dan saya bukan dokter dan saya tidak bertanggung jawab atas hal hal yang merugikan anda dalam bentuk apapun yang di sebabkan oleh isi dari buku ini. - Informasi dalam buku ini dimaksudkan untuk individu dewasa yang sehat. Anda harus berkonsultasi dengan dokter Anda untuk memastikan itu sesuai untuk situasi pribadi Anda. Perlu diingat bahwa kebutuhan gizi bervariasi dari orang ke orang, tergantung pada usia, jenis kelamin, status kesehatan dan diet keseluruhan.- Jika Anda memiliki masalah kesehatan maka berkonsultasi dengan dokter Anda. Selalu berkonsultasi dengan dokter Anda sebelum memulai atau membuat perubahan dalam diet anda atau latihan apapun yang akan anda lakukan.', 'edha', 1, 'ocd v.3 cover.png', 'cover/', 'ocd_3.0.pdf', 'books'),
(23, '2013-11-23', 'Human-Level Artificial Intelligence, Be Serious!', 'I claim that achieving real human-level artificial\r\nintelligence would necessarily imply that most of\r\nthe tasks that humans perform for pay could be au-\r\ntomated.', 'I claim that achieving real human-level artificial intelligence would necessarily imply that most of the tasks that humans perform for pay could be au- tomated. Rather than work toward this goal of au- tomation by building special-purpose systems, I ar- gue for the development of general-purpose, educable systems that can learn and be taught to perform any of the thousands of jobs that humans can perform. Joining others who have made simi- lar proposals, I advocate beginning with a system that has minimal, although extensive, built-in ca- pabilities. These would have to include the ability to improve through learning along with many oth- er abilities.', 'yussan', 2, 'Human lefel - AI.png', 'cover/', 'Human-Level%0AArtificial Intelligence,%0ABe Seriou', 'books');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `category_name`) VALUES
(1, 'All'),
(2, 'journals'),
(3, 'school'),
(4, 'cooking'),
(5, 'sport'),
(6, 'science'),
(7, 'novel');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(500) NOT NULL,
  `pp_files` varchar(60) NOT NULL,
  `pp_folder` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `username`, `password`, `pp_files`, `pp_folder`, `status`) VALUES
(1, 'Ama', 'Tsuba', 'Yogyakarta', '123', '2@3.com', 'Ama', 'ac43724f16e9241d990427ab7c8f4228', '6528590179_47e45b0cf4_b.jpg', 'images/profile/', 1),
(2, 'yusuf akhsan', 'hidayat', 'Indonesia', '6285645777298', '1@2.com', 'yussan', 'ac43724f16e9241d990427ab7c8f4228', 'yussan amigos.jpg', 'images/profile/', 1),
(7, 'Ardian', 'Maedha', 'Indonesia', '123', '1@2.com', 'edha', 'ac43724f16e9241d990427ab7c8f4228', 'CIMG1273.JPG', 'images/profile/', 1),
(9, 'juju', 'markonah', 'ponorogo', 'reog', 'reok.ok', 'juju', '0ce5cabde6351abdf4d334ac77cf4d29', 'twitter_circle.png', 'images/profile/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_self`
--

CREATE TABLE IF NOT EXISTS `user_self` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_user` int(11) NOT NULL,
  `fk_id_book` int(11) NOT NULL,
  `date_borrow` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_user` (`fk_id_user`),
  KEY `fk_id_book` (`fk_id_book`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_self`
--

INSERT INTO `user_self` (`id`, `fk_id_user`, `fk_id_book`, `date_borrow`, `date_end`) VALUES
(6, 2, 23, '2013-12-03', '2013-12-17'),
(7, 2, 19, '2013-12-04', '2013-12-18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`fk_kategori`) REFERENCES `book_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_self`
--
ALTER TABLE `user_self`
  ADD CONSTRAINT `user_self_ibfk_1` FOREIGN KEY (`fk_id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_self_ibfk_2` FOREIGN KEY (`fk_id_book`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
