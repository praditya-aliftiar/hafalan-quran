-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 12:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hafalan_quran`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `username`, `password`, `foto`, `role`) VALUES
(2, '1234', 'Hamid', 'guru1234', '$2y$10$1QOHYEvY4n8uv9w6/ZMZvuZyHMshqn4/8aapZFCzSBecBhqvob/3W', 'default.jpg', 1),
(3, '321', 'Hafiz', 'guru123', '$2y$10$DLXbbqZLeMq3.oheiqG..OfKHx7q8UoTOnMgjbOvkOWyMa2wtXF4.', 'download.png', 1),
(4, '123131313', 'sadasd', 'adasdadsasdad', '$2y$10$NoVOSuV.wzgwRRGsM/3lV.1NAgN.DKF.hhRhb0rjdquuKPn0oA6/u', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hafalan`
--

CREATE TABLE `hafalan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nis` varchar(12) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kelas` int(2) NOT NULL,
  `surah` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hafalan`
--

INSERT INTO `hafalan` (`id`, `tanggal`, `nis`, `nama`, `kelas`, `surah`, `keterangan`) VALUES
(1, '2021-01-25', '1914423393', 'praditya', 12, 'an-nas', 'lancar'),
(4, '2021-02-16', '1914423393', 'praditya', 12, 'Al-baqarah', 'lancar');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `username`, `password`, `foto`, `role`) VALUES
(1, '1914423393', 'Vera Novianti', '12', 'siswa123', '$2y$10$35MdkkS5.cnRMSuSw6yPs.c70An/Lg1t.RggJmzgRggNfeHalKYoG', 'c0998ed9348961af21974e8535d98644.jpg', 2),
(2, '1914423394', 'Desy Novianti', '12', 'siswa1234', '$2y$10$V4c.bLBboyOtIBkE9DQ/v.lF/gKIVzs.35/Wh.0J7rX2rhEmqYVFG', 'FB_IMG_15385389497025380.jpg', 2),
(3, '1914423395', 'Lusiana', 'Pi', 'siswa12345', '$2y$10$m.KYArIhgzBIPtVrj4iPb.f4m9Bj1QNxt978rNtmu77nHmWl8YumK', 'default.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hafalan`
--
ALTER TABLE `hafalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hafalan`
--
ALTER TABLE `hafalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
