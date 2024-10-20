-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 05:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php_0023`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nohp` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `nohp`, `foto`, `jenis_kelamin`, `email`) VALUES
(17, 'Ari Putra Wibowo S.Kom', 'Pekalongan', '085742014271', 'aa3a04eb-eb24-4d55-a079-259629d6eea5.jpeg', 'laki-laki', 'aa3a04eb-eb24-4d55-a079-259629d6eea5.jpeg'),
(18, 'Maharani', 'Batang', '085742117502', 'puan.jpg', 'perempuan', 'maharani@gmail.com'),
(19, 'Megantara Wati', 'Wiradaesa', '081322456678', 'mega.jpeg', 'perempuan', 'megantara@gmail.com'),
(20, 'Panji Setya', 'Podosugih Pekalongan', '081322569901', 'e67f1abd-d1a7-4dfa-82a8-5423149f0fc7.jpeg', 'laki-laki', 'panji@gmail.com'),
(21, 'Sulistyawati', 'Kajen Pekalongan', '088211883444', '405ad628-bf2c-418c-ba02-d12aa983978f.jpeg', 'perempuan', 'sulis@gmail.com'),
(22, 'Muhammad Naufan Faikar Kharis', 'Sampangan gang 11 no 25', '085727720648', 'nofan.jpg', 'laki-laki', 'muhammadnaufanfaikar@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
