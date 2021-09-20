-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 08:23 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projectfs`
--
CREATE DATABASE IF NOT EXISTS `projectfs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projectfs`;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `idjawaban` int(11) NOT NULL AUTO_INCREMENT,
  `idsoal` int(11) NOT NULL,
  `isi_jawaban` varchar(45) DEFAULT NULL,
  `benarkah` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idjawaban`),
  KEY `fk_jawaban_soal_idx` (`idsoal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`idjawaban`, `idsoal`, `isi_jawaban`, `benarkah`) VALUES
(7, 15, 'Unyil', 0),
(8, 15, 'Jarjit', 1),
(9, 15, 'Android', 0),
(10, 15, 'Kak Ros', 0),
(11, 1, 'Ipin', 1),
(12, 1, 'Ehsan', 0),
(13, 1, 'Ijat', 0),
(14, 1, 'Fizi', 0),
(17, 2, 'Opah', 1),
(18, 2, 'Mail', 0),
(19, 2, 'Tok Dalang', 0),
(20, 2, 'Paman Muhto', 0);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `idsoal` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` int(11) DEFAULT NULL,
  `pertanyaan` varchar(100) DEFAULT NULL,
  `halaman_ke` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsoal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`idsoal`, `nomor`, `pertanyaan`, `halaman_ke`) VALUES
(1, 1, 'Siapa nama saudara Upin?', 1),
(2, 2, 'Siapa nama nenek Upin?', 1),
(15, 3, 'Berikut ini adalah nama teman Upin, kecuali', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `fk_jawaban_soal` FOREIGN KEY (`idsoal`) REFERENCES `soal` (`idsoal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
