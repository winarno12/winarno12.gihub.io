-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 08:38 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkn2kra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `no` int(5) NOT NULL,
  `nip` int(18) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no`, `nip`, `username`, `password`) VALUES
(1, 798, 'dwi', '1234'),
(2, 1234, 'dwi', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 7316, 'dwiwijaya', '2c6e16e44891c949cce60de06bcc8720');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `no` int(10) NOT NULL,
  `nisn` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `nim` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`no`, `nisn`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `asal_sekolah`, `jurusan`, `nim`) VALUES
(19, 7339, 'IMAM NUR HASAN', 'Laki-Laki', '2021-01-04', 'JUMANTONO, KARANGANYAR', 'SMP 1 JUMANTONO', 'TPK', 33.65),
(20, 7182, 'ELSA PERMATA', 'Perempuan', '2020-11-05', 'MACANAN, KEBAKRAMAT', 'SMPN 1 KEBAKRAMAT', 'RPL', 33.05),
(21, 7254, 'RATIH WARDANI', 'Perempuan', '2021-04-27', 'NGRINGO, JATEN', 'SMPN 1 JATEN', 'RPL', 34.7),
(22, 7917, 'SALSABILA SAFURA', 'Perempuan', '2020-12-29', 'NAYAN,KEBAKRAMAT', 'SMPN 2 KARANGANYAR', 'TPK', 34.3),
(23, 7865, 'KURNIAWAN ADI', 'Laki-Laki', '2021-09-07', 'KERJO, KARANGANYAR', 'SMPN 1 KERJO', 'T0', 33.4),
(24, 7812, 'ADI NUGROHO', 'Laki-Laki', '2021-08-29', 'BEJEN, KARANGANYAR', 'SMPN 3 KARANGANYAR', 'TM', 36),
(25, 7542, 'KENT ATTHALA', 'Laki-Laki', '2021-06-10', 'SAWAHAN, JATEN', 'SMPN 2 KARANGANYAR', 'TPK', 34.7),
(26, 7245, 'SETYAWAN ALDI', 'Laki-Laki', '2021-06-03', 'MOJOLABAN, SUKOHARJO', 'SMPN 1 MOJOLABAN', 'TM', 34.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(10) NOT NULL,
  `nisn` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `nisn`, `username`, `password`) VALUES
(1, 7316, 'dwiwijaya', '2c6e16e44891c949cce60de06bcc8720'),
(2, 7328, 'Andin', 'd878759040f23a3a9b3b38d287254a6d'),
(3, 541, 'sdasd', 'ff7a53745b30161fe2f27a2a27bee528'),
(4, 1231, 'ads', '2deb000b57bfac9d72c14d4ed967b572'),
(5, 798, 'dwi', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 9807, 'dwek', '7815696ecbf1c96e6894b779456d330e'),
(7, 123, '123', '202cb962ac59075b964b07152d234b70'),
(8, 7317, 'eli', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no`,`nip`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
