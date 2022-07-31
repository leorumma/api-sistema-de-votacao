-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: urna-mysql: 3306
-- Generation Time: Jul 27, 2022 at 11:01 AM
-- Server version: 5.7.38
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urna_db`
--
CREATE DATABASE IF NOT EXISTS `heroku_d93ba097fb66e79` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `heroku_d93ba097fb66e79`;

-- --------------------------------------------------------

--
-- Table structure for table `candidato`
--

DROP TABLE IF EXISTS `candidato`;
CREATE TABLE `candidato` (
                             `idx` int(11) NOT NULL,
                             `numero` varchar(11) COLLATE latin1_general_ci DEFAULT NULL,
                             `nome` varchar(256) COLLATE latin1_general_ci NOT NULL,
                             `partido` varchar(256) COLLATE latin1_general_ci NOT NULL,
                             `foto` text COLLATE latin1_general_ci NOT NULL,
                             `nome_vice` varchar(256) COLLATE latin1_general_ci DEFAULT NULL,
                             `partido_vice` varchar(256) COLLATE latin1_general_ci DEFAULT NULL,
                             `foto_vice` text COLLATE latin1_general_ci,
                             `votos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `candidato`
--

INSERT INTO `candidato` (`idx`, `numero`, `nome`, `partido`, `foto`, `nome_vice`, `partido_vice`, `foto_vice`, `votos`) VALUES
                                                                                                                            (1, '12', 'Chiquinho do Adbon', 'PDT', 'cp3.jpg', 'Arão', 'PRP', 'v3.jpg', 0),
                                                                                                                            (2, '15', 'Malrinete Gralhada', 'MDB', 'cp2.jpg', 'Biga', 'MDB', 'v2.jpg', 0),
                                                                                                                            (3, '45', 'Dr. Francisco', 'PSC', 'cp1.jpg', 'João Rodrigues', 'PV', 'v1.jpg', 0),
                                                                                                                            (4, '54', 'Zé Lopes', 'PPL', 'cp4.jpg', 'Francisca Ferreira Ramos', 'PPL', 'v4.jpg', 0),
                                                                                                                            (5, '65', 'Lindomar Pescador', 'PC do B', 'cp5.jpg', 'Malú', 'PC do B', 'v5.jpg', 0),
                                                                                                                            (6, '15123', 'Filho', 'MDB', 'cv4.jpg', NULL, NULL, NULL, 0),
                                                                                                                            (7, '27222', 'Joel Varão', 'PSDC', 'cv5.jpg', NULL, NULL, NULL, 0),
                                                                                                                            (8, '43333', 'Joel VarãoDandor', 'PV', 'cv3.jpg', NULL, NULL, NULL, 0),
                                                                                                                            (9, '45000', 'Professor Clebson Almeida', 'PSDB', 'cv6.jpg', NULL, NULL, NULL, 0),
                                                                                                                            (10, '51222', 'Christianne Varão', 'PEN', 'cv1.jpg', NULL, NULL, NULL, 0),
                                                                                                                            (11, '55555', 'Homero do Zé Filho', 'PSL', 'cv2.jpg', NULL, NULL, NULL, 0)

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidato`
--
ALTER TABLE `candidato`
    ADD PRIMARY KEY (`idx`),
  ADD KEY `idx` (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidato`
--
ALTER TABLE `candidato`
    MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
