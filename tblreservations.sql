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
-- Table structure for table `tblreservations`
--

CREATE TABLE `tblreservations` (
  `trxnid` int(11) NOT NULL,
  `facid` int(11) NOT NULL,
  `facname` varchar(100) NOT NULL,
  `roomnum` varchar(20) NOT NULL,
  `typeofuse` varchar(20) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `numpax` int(11) NOT NULL,
  `xcs` int(11) NOT NULL,
  `per` decimal(10,2) NOT NULL,
  `xcsamt` decimal(10,2) NOT NULL,
  `cin` varchar(20) NOT NULL,
  `cout` varchar(20) NOT NULL,
  `tin` varchar(20) NOT NULL,
  `tout` varchar(20) NOT NULL,
  `totime` decimal(10,2) NOT NULL,
  `addhrs` decimal(10,2) NOT NULL,
  `addhrsamt` decimal(10,2) NOT NULL,
  `occasion` varchar(50) NOT NULL,
  `cater` varchar(10) NOT NULL,
  `xbed` varchar(10) NOT NULL,
  `numdays` decimal(10,2) NOT NULL,
  `totamt` decimal(10,2) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ornum` varchar(10) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `date_` varchar(20) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreservations`
--

INSERT INTO `tblreservations` (`trxnid`, `facid`, `facname`, `roomnum`, `typeofuse`, `rate`, `numpax`, `xcs`, `per`, `xcsamt`, `cin`, `cout`, `tin`, `tout`, `totime`, `addhrs`, `addhrsamt`, `occasion`, `cater`, `xbed`, `numdays`, `totamt`, `mode`, `status`, `email`, `ornum`, `remarks`, `date_`, `reason`, `image`) VALUES
(221, 1, 'Casa Leona 1', '', 'Day use', '1550.00', 4, 2, '200.00', '400.00', '11/09/2016', '11/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '0.00', '1950.00', 'cashdp', 'pending-cd', 'alison@gmail.com', '', '', '', '', ''),
(222, 1, 'Casa Leona 1', '', 'Day use', '1550.00', 2, 0, '200.00', '0.00', '11/09/2016', '11/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '0.00', '1550.00', 'paypal', 'reserved', 'drake@yahoo.com', '', '', '', '', ''),
(223, 1, 'Casa Leona 1', '', 'Day use', '1550.00', 2, 0, '200.00', '0.00', '11/09/2016', '11/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '0.00', '1550.00', 'cashdp', 'reserved', 'sample@yahoo.com', '', '', '', '', 'images/BDO Cash Deposit Slip.jpg'),
(224, 1, 'Casa Leona 1', '', 'Overnight', '2150.00', 2, 0, '200.00', '0.00', '11/10/2016', '11/11/2016', '0', '0', '0.00', '0.00', '0.00', 'none', 'none', '0', '1.00', '2150.00', 'cash', 'checkedin', 'try@yahoo.com', '', '', '', '', ''),
(226, 2, 'Mushroom', '', 'Day Use', '250.00', 3, 3, '80.00', '240.00', '11/18/2016', '11/18/2016', '0', '0', '0.00', '0.00', '0.00', 'none', 'none', '0', '1.00', '490.00', 'cash', 'pending', 'jansp@yahoo.com', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblreservations`
--
ALTER TABLE `tblreservations`
  ADD PRIMARY KEY (`trxnid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblreservations`
--
ALTER TABLE `tblreservations`
  MODIFY `trxnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
