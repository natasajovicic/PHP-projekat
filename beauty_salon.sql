-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 05:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `beauty_salon`
--

CREATE TABLE `beauty_salon` (
  `Beauty_salonID` int(10) NOT NULL,
  `Naziv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beauty_salon`
--

INSERT INTO `beauty_salon` (`Beauty_salonID`, `Naziv`) VALUES
(1, 'Pronails salon lepote'),
(2, 'Beauty salon Mara'),
(3, 'Salon lepote Lala');

-- --------------------------------------------------------

--
-- Table structure for table `usluga`
--

CREATE TABLE `usluga` (
  `UslugaID` int(10) NOT NULL,
  `NazivUsluge` varchar(30) NOT NULL,
  `OpisUsluge` varchar(100) NOT NULL,
  `Cena` double NOT NULL,
  `Beauty_salonID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usluga`
--

INSERT INTO `usluga` (`UslugaID`, `NazivUsluge`, `OpisUsluge`, `Cena`, `Beauty_salonID`) VALUES
(1, 'Sisanje', 'Skracivanje vrhova ili osvezavanje vase trenutne frizure', 1000, 2),
(2, 'Feniranje', 'Pranje kose i oblikovanje vase frizure', 1200, 3),
(3, 'Manikir', 'Ulepsavanje vasih ruku i noktiju', 2500, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beauty_salon`
--
ALTER TABLE `beauty_salon`
  ADD PRIMARY KEY (`Beauty_salonID`);

--
-- Indexes for table `usluga`
--
ALTER TABLE `usluga`
  ADD PRIMARY KEY (`UslugaID`),
  ADD KEY `beautySalon_fk1` (`Beauty_salonID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beauty_salon`
--
ALTER TABLE `beauty_salon`
  MODIFY `Beauty_salonID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usluga`
--
ALTER TABLE `usluga`
  MODIFY `UslugaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usluga`
--
ALTER TABLE `usluga`
  ADD CONSTRAINT `beautySalon_fk1` FOREIGN KEY (`Beauty_salonID`) REFERENCES `beauty_salon` (`Beauty_salonID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
