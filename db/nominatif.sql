-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 06:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nominatif`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_nominatif`
--

CREATE TABLE `data_nominatif` (
  `nrp` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pangkat` varchar(25) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `kesatuan` varchar(200) NOT NULL,
  `tmt_awal` varchar(10) NOT NULL,
  `tmt_akhir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nominatif`
--

INSERT INTO `data_nominatif` (`nrp`, `nama`, `pangkat`, `jabatan`, `kesatuan`, `tmt_awal`, `tmt_akhir`) VALUES
(7876491, 'agung kurniawan', 'brigadir', 'bamin sat reskrim', 'Mutasi', '2020-12-28', '2020-12-16'),
(9098390, 'rismawan', 'aipda', 'bamin sat tahti', 'Mutasi', '2019-11-05', '2020-12-08'),
(69020199, 'SLAMET PUDJIONO', 'IPDA', 'KASITIPOL', 'Mutasi', '2018-02-06', '2020-12-01'),
(70020300, 'zainul', 'ipda', 'paurkeseahtan', 'Polres Pasuruan', '2015-10-06', '2020-12-08'),
(75080651, 'SUNARYO', 'AIPTU', 'BANIT  SAT LANTAS', 'Polres Pasuruan', '2015-10-14', '2018-12-11'),
(76993768, 'andhi prabowo', 'bripka', 'bamin urkes', 'Polres Pasuruan', '2020-12-28', '2020-12-24'),
(78912730, 'putri', 'bripda', 'bamin urkes', 'Polres Pasuruan', '2020-12-07', '2019-01-16'),
(81040198, 'WAWAN HARIANTO,SH', 'AIPDA', 'PS. KASUBNIT BINMAS AIR UNIT PATROLI', 'Polres Pasuruan', '2017-02-07', '2020-12-02'),
(81060857, 'ROBBY, S.H', 'AIPDA', 'BANIT SAT LANTAS ', 'Mutasi', '2018-10-03', '2020-12-03'),
(86050877, 'ARIFIAN MIFTAHUL F.SH', 'BRIPKA', 'BANIT SAT LANTAS', 'Polres Pasuruan', '2018-02-06', '2020-12-16'),
(86060936, 'ALI  FAHRI  KHOIRUDIN', 'BRIPKA', 'BANIT SAT LANTAS', 'Polres Pasuruan', '2018-10-10', '2020-11-02'),
(86061202, 'CECEP PRASETYO,SH., M. H.', 'AIPTU', 'PS. KASUBNIT PATWAL', 'Mutasi', '2020-12-08', '2020-12-24'),
(87031782, 'rofiq', 'akbp', 'kapolres pasuruan', 'Mutasi', '2020-12-15', '2020-12-29'),
(94010378, 'REDY FRIYANZAH', 'BRIPTU', 'BANIT SAT TAHTI', 'Polres Pasuruan', '2019-01-01', '2020-11-04'),
(188392638, 'sutrisno', 'iptu', 'kasat tahti', 'Polres Pasuruan', '2020-12-14', '2020-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_nominatif`
--
ALTER TABLE `data_nominatif`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
