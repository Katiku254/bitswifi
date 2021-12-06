-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 10:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitswifi`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `user` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `name`, `email`, `phone`, `user`, `message`) VALUES
(1, 'Samuel Panda', 'sbrown@gmail.com', '09688684', 1, 'I am contacting y\'all for a purpose which i know.');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `ID` int(11) NOT NULL,
  `bundle` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`ID`, `bundle`, `speed`, `duration`, `price`) VALUES
(1, 1, 4, '30', 70),
(2, 2, 4, '30', 120),
(3, 3, 4, '30', 200),
(4, 10, 4, '30', 850),
(5, -1, 3, '30', 1500),
(6, -1, 5, '30', 2000),
(7, -1, 6, '30', 2700),
(8, -1, 10, '30', 3500),
(9, -1, 1, '7', 500),
(10, -1, 2, '7', 1000),
(11, -1, 1, '-1', 20),
(12, -1, 1, '-1', 40),
(13, -1, 1, '-1', 80);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `packageID` int(11) NOT NULL,
  `transaction_code` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `userID`, `date`, `packageID`, `transaction_code`, `status`, `phone`) VALUES
(1, 1, '4 12 2021 1641 11', 6, 'ngdfeyuf4', 0, '0758591758'),
(16, 1, '6 12 2021 943 40', 11, 'nshdjkdfg', 1, '0758591758'),
(17, 1, '6-12-2021, 14:10:23', 6, 'asdadsdasd', 0, '0758591758'),
(18, 16, '6-12-2021, 22:27:56', 9, 'fsfdffssdf', 0, '0780333333');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `imageName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `fname`, `lname`, `phone`, `email`, `password`, `imageName`) VALUES
(1, 'guest', 'XYZ', '0758591758', 'kb@gmail.com', 'emirates', ''),
(2, 'Ben', 'Katiku', '0758591758', 'katiku@gmail.com', 'emirates', ''),
(3, 'Ben', 'Katikuu', '0708793131', 'katiku@gmail.com', 'emiratesa', ''),
(4, 'Samuel', 'Brown', '098765543', 'sbrown@gmail.com', 'emirates1', ''),
(5, 'Hugh', 'Grant', '09688684', 'sbrown@gmail.com', 'sddadsd', ''),
(6, 'Stevens', 'Spartak', '0799250554', 'katikuben@gmail.com', 'emirates', ''),
(7, 'Zen', 'Davis', '0987654321', 'zeedee@gmail.com', 'emirates', ''),
(8, 'Kim', 'Kardie', '98734534', 'zeedee@gmail.com', 'emirates', ''),
(9, 'Kim', 'Kardies', '98734522', 'zeedee@gmail.com', 'emirates', ''),
(10, 'Kim', 'Kardies', '987345224', 'zeedee@gmail.com', 'emirates', ''),
(11, 'Kim', 'Kardies', '98345224', 'zeedee@gmail.com', 'emirates', ''),
(12, 'Kim', 'Kardies', '98349224', 'zeedee@gmail.com', 'emirates', ''),
(13, 'Simon', 'Jamed', '0720741832', 'simon@gmil.co', 'emirates', ''),
(14, 'Opio', 'Oids', '0720000000', 'opio@id.c', 'emiartes', ''),
(15, 'Stem', 'Cells', '0780454545', 'cells@h.com', 'emirates', ''),
(16, 'Pure', 'Notions', '0780333333', 'notion@h.co', 'emirates', 'png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
