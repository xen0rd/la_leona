-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 08:35 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbresort`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `payid` int(11) NOT NULL,
  `trxnid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `food` decimal(10,2) NOT NULL,
  `damage` decimal(10,2) NOT NULL,
  `downpayment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `ornum` varchar(20) NOT NULL,
  `totamt` decimal(10,2) NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `itemid` varchar(100) NOT NULL,
  `createdtime` time NOT NULL,
  `date_` varchar(20) NOT NULL,
  `changes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`payid`, `trxnid`, `email`, `fullname`, `food`, `damage`, `downpayment`, `balance`, `ornum`, `totamt`, `payment_amount`, `payment_status`, `itemid`, `createdtime`, `date_`, `changes`) VALUES
(310, 222, 'drake@yahoo.com', 'vergara, drake mendoza.', '0.00', '0.00', '1100.00', '450.00', '', '1550.00', '', 'reserved', '', '00:00:00', '', ''),
(311, 223, 'sample@yahoo.com', 'sample, sample sample.', '0.00', '0.00', '1000.00', '550.00', '', '1550.00', '', 'reserved', '1', '00:00:00', '11/04/2016', ''),
(312, 224, 'try@yahoo.com', 'ry, try try.', '0.00', '0.00', '1150.00', '1000.00', '', '2150.00', '', 'checkedin', '1', '00:00:00', '11/04/2016', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`payid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
