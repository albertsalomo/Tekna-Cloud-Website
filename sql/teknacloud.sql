-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 10:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teknacloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_content`
--

CREATE TABLE `tb_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_content`
--

INSERT INTO `tb_content` (`id`, `title`, `content`, `image`) VALUES
(26, 'Tekna Cloud is a Premium Cloud Technology', 'Tekna Cloud is a specialist IaaS provider catering for enterprise and government. We specialise in designing, delivering and supporting cloud infrastructure and networks for clients with mission critical applications and requirements.', '631ac7a4104c8.png'),
(31, 'PT TEKNA DIGITAL INFORMATIKA ', 'Alamat: Patra Jasa Office Tower Lt 17 Room 1703 Jl. Jend. Gatot Subroto Kav 32- 34 Rt 001 Rw 003 Kel. Kuningan Timur Kec. Setia Budi Jakarta 12950<br>\r\nTelp: +62-21-52900252<br>\r\nFax : +62-21 52900253<br>\r\nWhatsApp: +62-85220022884<br>\r\nemail: support@teknacloud.id<br>', 'temp.jpg'),
(35, 'What is TeknaCloud?', 'Tekna Cloud is an Privat Company owned Infrastructure as a Service (IaaS) provider with a clear mission to provide the most performant, secure, and reliable cloud infrastructure in the world. We operate one of the world\'s most diverse networks with a presence in 24 datacentres across 10 countries and are the preferred choice for enterprises and government agencies looking to host mission critical applications', '631ae5ab2435a.jpg'),
(36, 'Why 1', 'Performance, Security, Reliability and Affordable', 'temp.jpg'),
(37, 'Why 2', 'Relationships Built on top of Meaningful SLA\'s and Support 24/7', 'temp.jpg'),
(38, 'Why 3', 'Data sovereignty & Transparent Billing Model', 'temp.jpg'),
(39, 'Copyright', 'Copyright © 2022 Tekna Cloud | All Rights Reserved', 'temp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_content`
--
ALTER TABLE `tb_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_content`
--
ALTER TABLE `tb_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
