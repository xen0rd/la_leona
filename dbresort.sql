--TEST
-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 08:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbresort`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trxnid` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `item_number`, `txn_id`, `payment_gross`, `currency_code`, `payment_status`, `email`, `item_name`, `trxnid`) VALUES
(4, '29', '4C666930PY8391738', 1000.00, 'USD', 'Completed', '', '', 0),
(5, '41', '01J01179HU317572W', 1000.00, 'USD', 'Completed', '', '', 0),
(6, '45', '8M197140FP857571U', 1000.00, 'USD', 'Completed', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `status`) VALUES
(1, 'sample', '1.png', 200.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `username` varchar(100) NOT NULL,
  `fldcreated` date NOT NULL,
  `RegNo` varchar(100) NOT NULL,
  `fldarrival` date NOT NULL,
  `flddeparture` date NOT NULL,
  `fldnightstay` varchar(100) NOT NULL,
  `fldadult` varchar(100) NOT NULL,
  `fldchild` varchar(100) NOT NULL,
  `fldroom` varchar(100) NOT NULL,
  `fldcottagesnum` varchar(100) NOT NULL,
  `fldhutnum` varchar(100) NOT NULL,
  `fldroomtype` varchar(100) NOT NULL,
  `fldnumofroom` varchar(100) NOT NULL,
  `fldroomnum` varchar(100) NOT NULL,
  `fldavailability` varchar(100) NOT NULL,
  `fldstaytype` varchar(100) NOT NULL,
  `fldtotal` varchar(100) NOT NULL,
  `fldpaytype` varchar(100) NOT NULL,
  `fldfname` varchar(100) NOT NULL,
  `fldlname` varchar(100) NOT NULL,
  `fldcontact` varchar(100) NOT NULL,
  `fldpayment` varchar(100) NOT NULL,
  `fldpaymenttype` varchar(100) NOT NULL,
  `fldterm` varchar(100) NOT NULL,
  `flddownpayment` varchar(100) NOT NULL,
  `fldbalance` varchar(100) NOT NULL,
  `fldchange` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `flddate` date NOT NULL,
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resort_rooms`
--

CREATE TABLE IF NOT EXISTS `resort_rooms` (
  `fldroomname` text NOT NULL,
  `fldtype` text NOT NULL,
  `flddesc` text NOT NULL,
  `fldday` varchar(100) NOT NULL,
  `fldnight` varchar(100) NOT NULL,
  `fldmaxpax` varchar(100) NOT NULL,
  `fldavailable` varchar(100) NOT NULL,
  `fldpic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resort_rooms`
--

INSERT INTO `resort_rooms` (`fldroomname`, `fldtype`, `flddesc`, `fldday`, `fldnight`, `fldmaxpax`, `fldavailable`, `fldpic`) VALUES
('', 'Cabanas', 'TRY LANG HEHEHE', '34', '43', '43', '43', '12570832_10201441994328426_1681724722_n.jpg'),
('', 'Cabanas', 'TRY LANG HEHEHE', '1550', '2150', '4', '5', '12570832_10201441994328426_1681724722_n.jpg'),
('', 'Cabanas', 'TRY LANG HEHEHE', '2050', '2650', '4', '3', '12570832_10201441994328426_1681724722_n.jpg'),
('', 'Cabanas', 'TRY LANG HEHEHE', '3550', '5150', '10', '6', '12570832_10201441994328426_1681724722_n.jpg'),
('', 'Cabanas', 'TRY LANG HEHEHE', '1500', '2500', '12', '6', '12570832_10201441994328426_1681724722_n.jpg'),
('', 'Cabanas', 'TRY LANG HEHEHE', 'sdsd', 'sds', 'sdsd', '3', '12570832_10201441994328426_1681724722_n.jpg'),
('sdsdd', 'Cabanas', '546ujhgs', 'w455453', '54353', '34535', '345435', '34dfd8f4-2366-4b84-8108-c989de8f250f.jpg'),
('casa', 'Mushroom', 'ufidjf', '2323', '3242', '20', '0', 'uploadedpicturemushroom4.png');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `fldroomname` varchar(100) NOT NULL,
  `fldequipmentcode` text NOT NULL,
  `fldequipname` text NOT NULL,
  `fldequipquantity` text NOT NULL,
  `fldstatuss` text NOT NULL,
  `fldroomnumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`fldroomname`, `fldequipmentcode`, `fldequipname`, `fldequipquantity`, `fldstatuss`, `fldroomnumber`) VALUES
('Casa Leona', 'R109230092', 'Air-Con', '1', 'Damage', ''),
('Casa Leona Deluxe', 'R109230093', 'Electric fan', '1', 'Good', '3'),
('Casa Leona Deluxe', 'R1092300933', 'Air-Con', '1', 'Good', '4'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '4'),
('Casa Leona Deluxe', 'R109230095', 'Electric fan', '1', 'Damage', '4'),
('3', 'R109230094', 'Shampoo', '30', 'Good', 'Casa Leona Deluxe'),
('Casa Leona', 'R109230095', 'Electric fan', '1', 'Damage', '1'),
('Casa Leona', 'R1092300933', 'Air-Con', '1', 'Good', '2'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '3'),
('Casa Leona', 'R109230092', 'Air-Con', '1', 'Damage', ''),
('Casa Leona Deluxe', 'R109230093', 'Electric fan', '1', 'Good', '3'),
('Casa Leona Deluxe', 'R1092300933', 'Air-Con', '1', 'Good', '4'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '4'),
('Casa Leona Deluxe', 'R109230095', 'Electric fan', '1', 'Good', '4'),
('3', 'R109230094', 'Shampoo', '30', 'Good', 'Casa Leona Deluxe'),
('Casa Leona', 'R109230095', 'Electric fan', '1', 'Good', '1'),
('Casa Leona', 'R1092300933', 'Air-Con', '1', 'Good', '2'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '3'),
('New Bldg', 'R109230094', 'Shampoo', '30', 'Good', '123'),
('Casa Leona', 'R109230092', 'Air-Con', '1', 'Damage', ''),
('Casa Leona Deluxe', 'R109230093', 'Electric fan', '1', 'Good', '3'),
('Casa Leona Deluxe', 'R1092300933', 'Air-Con', '1', 'Good', '4'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '4'),
('Casa Leona Deluxe', 'R109230095', 'Electric fan', '1', 'Good', '4'),
('3', 'R109230094', 'Shampoo', '30', 'Good', 'Casa Leona Deluxe'),
('Casa Leona', 'R109230095', 'Electric fan', '1', 'Good', '1'),
('Casa Leona', 'R1092300933', 'Air-Con', '1', 'Good', '2'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '3'),
('Casa Leona', 'R109230092', 'Air-Con', '1', 'Damage', ''),
('Casa Leona Deluxe', 'R109230093', 'Electric fan', '1', 'Good', '3'),
('Casa Leona Deluxe', 'R1092300933', 'Air-Con', '1', 'Good', '4'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '4'),
('Casa Leona Deluxe', 'R109230095', 'Electric fan', '1', 'Good', '4'),
('3', 'R109230094', 'Shampoo', '30', 'Good', 'Casa Leona Deluxe'),
('Casa Leona', 'R109230095', 'Electric fan', '1', 'Good', '1'),
('Casa Leona', 'R1092300933', 'Air-Con', '1', 'Good', '2'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '3'),
('Casa Leona', 'R109230092', 'Air-Con', '1', 'Damage', ''),
('Casa Leona Deluxe', 'R109230093', 'Electric fan', '1', 'Good', '3'),
('Casa Leona Deluxe', 'R1092300933', 'Air-Con', '1', 'Good', '4'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '4'),
('Casa Leona Deluxe', 'R109230095', 'Electric fan', '1', 'Good', '4'),
('3', 'R109230094', 'Shampoo', '30', 'Good', 'Casa Leona Deluxe'),
('Casa Leona', 'R109230095', 'Electric fan', '1', 'Good', '1'),
('Casa Leona', 'R1092300933', 'Air-Con', '1', 'Good', '2'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '3'),
('Casa Leona', 'R109230092', 'Air-Con', '1', 'Damage', ''),
('Casa Leona Deluxe', 'R109230093', 'Electric fan', '1', 'Good', '3'),
('Casa Leona Deluxe', 'R1092300933', 'Air-Con', '1', 'Good', '4'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '4'),
('Casa Leona Deluxe', 'R109230095', 'Electric fan', '1', 'Good', '4'),
('3', 'R109230094', 'Shampoo', '30', 'Good', 'Casa Leona Deluxe'),
('Casa Leona', 'R109230095', 'Electric fan', '1', 'Good', '1'),
('Casa Leona', 'R1092300933', 'Air-Con', '1', 'Good', '2'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '3'),
('Casa Leona', 'R109230092', 'Air-Con', '1', 'Damage', ''),
('Casa Leona Deluxe', 'R109230093', 'Electric fan', '1', 'Good', '3'),
('Casa Leona Deluxe', 'R1092300933', 'Air-Con', '1', 'Good', '4'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '4'),
('Casa Leona Deluxe', 'R109230095', 'Electric fan', '1', 'Good', '4'),
('3', 'R109230094', 'Shampoo', '30', 'Good', 'Casa Leona Deluxe'),
('Casa Leona', 'R109230095', 'Electric fan', '1', 'Good', '1'),
('Casa Leona', 'R1092300933', 'Air-Con', '1', 'Good', '2'),
('Casa Leona Deluxe', 'R1092330935', 'Electric fan', '1', 'Damage', '3');

-- --------------------------------------------------------

--
-- Table structure for table `roominfo`
--

CREATE TABLE IF NOT EXISTS `roominfo` (
  `fldroomnumber` varchar(100) NOT NULL,
  `fldroomname` varchar(100) NOT NULL,
  `fldequipname` varchar(100) NOT NULL,
  `fldequipquantity` varchar(100) NOT NULL,
  `fldstatuss` varchar(100) NOT NULL,
  PRIMARY KEY (`fldroomnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roominfo`
--

INSERT INTO `roominfo` (`fldroomnumber`, `fldroomname`, `fldequipname`, `fldequipquantity`, `fldstatuss`) VALUES
('1', 'Casa Leona', '', '', ''),
('123', 'New Bldg', '', '', ''),
('2', 'Casa Leona', '', '', ''),
('214', 'La Leona Attic', '', '', ''),
('234', 'bahay', '', '', ''),
('3', 'Casa Leona Deluxe', '', '', ''),
('4', 'Casa Leona Deluxe', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbladdons`
--

CREATE TABLE IF NOT EXISTS `tbladdons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trxnid` int(11) NOT NULL,
  `facid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `devcode` varchar(50) NOT NULL,
  `devname` varchar(100) NOT NULL,
  `pieces` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `price1` decimal(10,2) NOT NULL,
  `price2` decimal(10,2) NOT NULL,
  `price3` decimal(10,2) NOT NULL,
  `disc` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbladdons`
--

INSERT INTO `tbladdons` (`id`, `trxnid`, `facid`, `typeid`, `devcode`, `devname`, `pieces`, `remarks`, `status`, `price1`, `price2`, `price3`, `disc`, `image`) VALUES
(16, 49, 1, 0, '', 'Bed', 1, '', '', '14000.00', '0.00', '0.00', 0, ''),
(17, 49, 1, 0, '', 'Air Conditioned Unit(ACU)', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(18, 49, 1, 0, '', 'Flat screen TV', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(19, 49, 1, 0, '', 'Refrigerator', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(20, 49, 1, 0, '', 'Toilet and bathroom', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(21, 49, 1, 0, '', 'Laptop', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(22, 50, 1, 0, '', 'Bed', 1, '', '', '14000.00', '0.00', '0.00', 0, ''),
(23, 50, 1, 0, '', 'Air Conditioned Unit(ACU)', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(24, 50, 1, 0, '', 'Flat screen TV', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(25, 50, 1, 0, '', 'Refrigerator', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(26, 50, 1, 0, '', 'Toilet and bathroom', 0, '', '', '0.00', '0.00', '0.00', 0, ''),
(27, 50, 1, 0, '', 'Laptop', 0, '', '', '0.00', '0.00', '0.00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblamenities`
--

CREATE TABLE IF NOT EXISTS `tblamenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `devcode` varchar(50) NOT NULL,
  `devname` varchar(100) NOT NULL,
  `pieces` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `price1` decimal(10,2) NOT NULL,
  `price2` decimal(10,2) NOT NULL,
  `price3` decimal(10,2) NOT NULL,
  `disc` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblamenities`
--

INSERT INTO `tblamenities` (`id`, `facid`, `typeid`, `devcode`, `devname`, `pieces`, `remarks`, `status`, `price1`, `price2`, `price3`, `disc`, `image`) VALUES
(1, 1, 1, 'BR101', 'Bed', 10, ' ', '1', '14000.00', '0.00', '0.00', 0, ''),
(2, 1, 1, 'AC101', 'Air Conditioned Unit(ACU)', 2, '', '1', '0.00', '0.00', '0.00', 0, ''),
(3, 1, 1, 'TV101', 'Flat screen TV', 1, '', '1', '0.00', '0.00', '0.00', 0, ''),
(4, 1, 1, 'REF101', 'Refrigerator', 1, '', '1', '0.00', '0.00', '0.00', 0, ''),
(5, 1, 1, 'CR101', 'Toilet and bathroom', 2, '', '1', '0.00', '0.00', '0.00', 0, ''),
(7, 3, 0, '123', 'qweqw', 6, 'qweqweq', '1', '567.00', '556.00', '778.00', 100, ''),
(8, 2, 0, 'sample', 'askjasdksafk', 123, 'klajksdkasdlk', '1', '0.00', '0.00', '0.00', 0, ''),
(9, 1, 0, 'xxxx', 'Laptop', 1, 'sample', '1', '0.00', '0.00', '0.00', 0, ''),
(10, 3, 0, '123', 'asdfghjkl', 6, 'asdfghjkl', '1', '123.00', '123.00', '123.00', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcancel`
--

CREATE TABLE IF NOT EXISTS `tblcancel` (
  `username` varchar(100) NOT NULL,
  `fldcreated` date NOT NULL,
  `RegNo` varchar(100) NOT NULL,
  `fldarrival` date NOT NULL,
  `flddeparture` date NOT NULL,
  `fldnightstay` varchar(100) NOT NULL,
  `fldadult` varchar(100) NOT NULL,
  `fldchild` varchar(100) NOT NULL,
  `fldroom` varchar(100) NOT NULL,
  `fldcottagesnum` varchar(100) NOT NULL,
  `fldhut2` varchar(100) NOT NULL,
  `fldh2` varchar(100) NOT NULL,
  `fldhut3` varchar(100) NOT NULL,
  `fldh3` varchar(100) NOT NULL,
  `fldhut4` varchar(100) NOT NULL,
  `fldh4` varchar(100) NOT NULL,
  `fldhut5` varchar(100) NOT NULL,
  `fldh5` varchar(100) NOT NULL,
  `fldhutnum` varchar(100) NOT NULL,
  `fldroom2` varchar(100) NOT NULL,
  `fldnum2` varchar(100) NOT NULL,
  `fldroom4` varchar(100) NOT NULL,
  `fldnum4` varchar(100) NOT NULL,
  `fldroomtype` varchar(100) NOT NULL,
  `fldnumofroom` varchar(100) NOT NULL,
  `fldroomnum` varchar(100) NOT NULL,
  `fldstaytype` varchar(100) NOT NULL,
  `fldtotal` varchar(100) NOT NULL,
  `fldpaytype` varchar(100) NOT NULL,
  `fldfname` varchar(100) NOT NULL,
  `fldlname` varchar(100) NOT NULL,
  `fldcontact` varchar(100) NOT NULL,
  `fldpayment` varchar(100) NOT NULL,
  `fldpaymenttype` varchar(100) NOT NULL,
  `fldterm` varchar(100) NOT NULL,
  `flddownpayment` varchar(100) NOT NULL,
  `fldbalance` varchar(100) NOT NULL,
  `fldchange` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `flddate` date NOT NULL,
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcancel`
--

INSERT INTO `tblcancel` (`username`, `fldcreated`, `RegNo`, `fldarrival`, `flddeparture`, `fldnightstay`, `fldadult`, `fldchild`, `fldroom`, `fldcottagesnum`, `fldhut2`, `fldh2`, `fldhut3`, `fldh3`, `fldhut4`, `fldh4`, `fldhut5`, `fldh5`, `fldhutnum`, `fldroom2`, `fldnum2`, `fldroom4`, `fldnum4`, `fldroomtype`, `fldnumofroom`, `fldroomnum`, `fldstaytype`, `fldtotal`, `fldpaytype`, `fldfname`, `fldlname`, `fldcontact`, `fldpayment`, `fldpaymenttype`, `fldterm`, `flddownpayment`, `fldbalance`, `fldchange`, `status`, `flddate`, `transaction_id`) VALUES
('', '0000-00-00', '', '2016-02-11', '2016-02-13', '', '5', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '', '', 'lkawd', 'ldwka', '', '', '', '', '', '', '', 'Reserved', '0000-00-00', ''),
('jd1122', '2016-02-09', '', '2016-02-11', '2016-02-13', '', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '', '', 'lkawd', 'ldwka', '', '', '', '', '', '', '', 'Reserved', '0000-00-00', ''),
('', '2016-02-09', '', '2016-02-11', '2016-02-12', '', '5', '', '', '', 'Mushroom', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '1800', '', 'lkawd', 'ldwka', '', '2000', '', '', '', '', '', 'Reserved', '0000-00-00', ''),
('jd1122', '2016-02-09', '2', '2016-02-11', '2016-02-13', '', '4', '', '', '', '', '', 'Mez', '1', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '2540', '', 'lkawd', 'ldwka', '', '', '', '', '', '', '', 'Reserved', '0000-00-00', ''),
('jd', '2016-02-09', '1', '2016-02-11', '2016-02-13', '', '5', '2', '', '', '', '', 'Mez', '1', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '3160', '', 'lkawd', 'ldwka', '', '', '', 'Full Payment', '', '', '', 'Reserved', '0000-00-00', ''),
('jd1122', '2016-02-09', '2', '2016-02-11', '2016-02-13', '', '4', '', '', '', '', '', 'Mez', '1', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '2540', '', 'lkawd', 'ldwka', '', '', 'Paypal', 'Full Payment', '', '', '', 'Reserved', '0000-00-00', ''),
('', '2016-02-09', '11', '2016-02-10', '2016-02-10', '', '5', '2', '', '', '', '', '', '', '', '', 'Duplex', '1', '', '', '', '', '', '', '', '', 'Day', '2010', '', 'lkawd', 'ldwka', '', '2010', 'Cash', '', '', '', '', 'Reserved', '0000-00-00', ''),
('jd', '2016-02-09', '14', '2016-02-11', '2016-02-12', '', '5', '', 'Cabana', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '2100', '', 'lkawd', 'ldwka', '', '', 'Paypal', 'Downpayment', '', '', '', 'Reserved', '0000-00-00', ''),
('yeah', '2016-02-09', '4', '2016-01-18', '2016-01-21', '', '13', '', 'Mushroom', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Night', '2690', '', '', '', '', '', 'Paypal', 'Full Payment', '', '', '', 'Reserved', '0000-00-00', ''),
('', '2016-02-10', '5', '2016-02-11', '2016-02-12', '', '5', '', '', '', 'Mushroom', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '1700', '', '', '', '', '1700', 'Cash Deposit', 'Downpayment', '', '', '', 'Reserved', '0000-00-00', ''),
('', '2016-02-10', '2', '2016-02-11', '2016-02-12', '', '2', '', 'Cabana', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Night', '860', '', '', '', '', '860', 'Paypal', 'Downpayment', '', '', '', 'Reserved', '0000-00-00', ''),
('nina', '2016-02-10', '1', '2016-02-12', '2016-02-13', '', '5', '1', 'Cabana', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Night', '2020', '', '', '', '', '', 'Cash Deposit', 'Downpayment', '', '', '', 'Reserved', '0000-00-00', ''),
('nina', '2016-03-03', '3', '2016-02-11', '2016-02-12', '', '15', '', '', '', 'Mushroom', '1', '', '', 'La Leona Cabana', '1', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '6600', '', '', '', '', '', 'Cash Deposit', 'Downpayment', '', '', '', 'Reserved', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcancelevent`
--

CREATE TABLE IF NOT EXISTS `tblcancelevent` (
  `username` varchar(100) NOT NULL,
  `RegNo` varchar(100) NOT NULL,
  `fldfname` varchar(100) NOT NULL,
  `fldlname` varchar(100) NOT NULL,
  `fldcontact` varchar(100) NOT NULL,
  `fldarrival` date NOT NULL,
  `fldtime` varchar(100) NOT NULL,
  `fldhour` varchar(100) NOT NULL,
  `fldhall` varchar(100) NOT NULL,
  `fldnumpax` varchar(100) NOT NULL,
  `fldcater` varchar(100) NOT NULL,
  `fldpaymenttype` varchar(100) NOT NULL,
  `fldterm` varchar(100) NOT NULL,
  `flddownpayment` varchar(100) NOT NULL,
  `fldtotal` varchar(100) NOT NULL,
  `fldpayment` varchar(100) NOT NULL,
  `fldbalance` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `flddate` date NOT NULL,
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcancelevent`
--

INSERT INTO `tblcancelevent` (`username`, `RegNo`, `fldfname`, `fldlname`, `fldcontact`, `fldarrival`, `fldtime`, `fldhour`, `fldhall`, `fldnumpax`, `fldcater`, `fldpaymenttype`, `fldterm`, `flddownpayment`, `fldtotal`, `fldpayment`, `fldbalance`, `status`, `flddate`, `transaction_id`) VALUES
('admin', '102', 'lkawd', 'ldwka', '', '2016-02-05', 'AM-PM', '', 'Alfonso Pavillion', '50', 'Yes', '', '', '', '30000', '', '', 'Cancelled', '0000-00-00', ''),
('admin', '6', '', '', '', '2016-01-21', 'AM', '', 'Alfonso Pavillion', '20', 'Yes', '', '', '', '14500', '0', '', 'Cancelled', '2016-02-09', ''),
('nina', '6', 'nina', 'valle', '', '2016-02-11', 'AM', '', 'Alfonso Pavillion', '50', 'No', '', '', '', '', '0', '', 'Cancelled', '0000-00-00', ''),
('nina', '6', 'nina', 'valle', '', '2016-02-11', 'AM', '', 'Alfonso Pavillion', '50', 'No', '', '', '', '', '0', '', 'Cancelled', '0000-00-00', ''),
('nina', '6', 'nina', 'valle', '', '2016-02-11', 'AM', '', 'Alfonso Pavillion', '50', 'No', '', '', '', '', '0', '', 'Cancelled', '0000-00-00', ''),
('Kevin', '5', '', '', '', '2016-02-12', 'PM', '', 'Kristina Function Hall', '50', 'Yes', '', '', '', '30000', '0', '', 'Cancelled', '2016-03-03', ''),
('daniel', '3', '', '', '', '2016-02-11', 'PM', '', 'Kristina Function Hall', '55', 'No', '', '', '', '13000', '0', '', 'Cancelled', '2016-03-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbldiscount`
--

CREATE TABLE IF NOT EXISTS `tbldiscount` (
  `fldrate30pax` decimal(65,2) NOT NULL,
  `fldrate50pax` decimal(65,2) NOT NULL,
  `fldrate100pax` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldiscount`
--

INSERT INTO `tbldiscount` (`fldrate30pax`, `fldrate50pax`, `fldrate100pax`) VALUES
('0.90', '0.90', '0.85'),
('0.90', '0.90', '0.85');

-- --------------------------------------------------------

--
-- Table structure for table `tblequipmentinventory`
--

CREATE TABLE IF NOT EXISTS `tblequipmentinventory` (
  `flditemcode` int(100) NOT NULL AUTO_INCREMENT,
  `flddate` text NOT NULL,
  `flditemname` varchar(100) NOT NULL,
  `fldprice` decimal(10,2) NOT NULL,
  `fldquantity` int(100) NOT NULL,
  PRIMARY KEY (`flditemcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblequipmentinventory`
--

INSERT INTO `tblequipmentinventory` (`flditemcode`, `flddate`, `flditemname`, `fldprice`, `fldquantity`) VALUES
(1, '2010-10-03', 'Air-Con', '7989.00', 15),
(2, '2010-10-01', 'Electric Fan', '2490.00', 23),
(3, '2010-08-10', 'Refrigerator', '11289.00', 7),
(4, '2011-01-10', 'Table', '2674.00', 50),
(5, '2010-10-20', 'Chair', '1005.00', 70);

-- --------------------------------------------------------

--
-- Table structure for table `tblfacilities`
--

CREATE TABLE IF NOT EXISTS `tblfacilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblfacilities`
--

INSERT INTO `tblfacilities` (`id`, `name`, `description`, `image`) VALUES
(1, 'Casa Leona', 'Take pleasure in La Leona’s airconditioned rooms. You can choose to stay in the contemporary-styled La Leona Attic or in the native-inspired La Leona Loft. Whatever you choose, it will surely bring you that well-deserved La Leona comfort!', 'images/5.png'),
(2, 'Cabanas & Mezaninne', 'The cabanas in La Leona are all personally designed by the owners and are all intended be built with adequate spaces from each other. Large group of guests often prefer renting a cabana because it can accommodate 10 or more persons and they could also have easy access of the pool area.', 'img2/mezaninne1.png'),
(3, 'Function Hall', 'Special occasions can be made even more memorable when held in a comely venue. La Leona Resort can be your next destination for an important event in your life – may it be wedding, birthday party, baptismal party, or family reunion. The Function Hall can also host corporate events such as conference, seminar, training, team-building activities, or company parties.', 'img2/gallery21.png'),
(4, 'sample', 'asdjkkjsadflksadfkjklsadjf\r\nsadlkjlkasdjfa\r\nkasdlfjlkasdjfsad\r\nolajsdfljskadjf', 'images/gallery19.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodinven`
--

CREATE TABLE IF NOT EXISTS `tblfoodinven` (
  `flditemcode` int(100) NOT NULL AUTO_INCREMENT,
  `flditemname` varchar(100) NOT NULL,
  `fldquantity` int(50) NOT NULL,
  `fldstatus` text NOT NULL,
  `fldreorderpoint` text NOT NULL,
  `fldprice` text NOT NULL,
  `fldunit` varchar(100) NOT NULL,
  PRIMARY KEY (`flditemcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblfoodinven`
--

INSERT INTO `tblfoodinven` (`flditemcode`, `flditemname`, `fldquantity`, `fldstatus`, `fldreorderpoint`, `fldprice`, `fldunit`) VALUES
(1, 'hotdog', 20, 'Critical Level', '40', '150', 'per pack'),
(2, 'coke', 50, 'Low Level', '50', '55', '1.5 litre'),
(3, 'Bottled Water', 100, 'High Level', '100', '18', 'per bottle'),
(4, 'egg', 1, 'Critical Level', '50', '12', 'per peice');

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE IF NOT EXISTS `tblgallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `fname`, `description`) VALUES
(1, 'images/1.png', ''),
(2, 'images/uploadedpictureuploadedpicturepool.jpg', ''),
(3, 'images/gallery (3).png', ''),
(4, 'images/gallery (4).png', ''),
(5, 'images/gallery (5).png', ''),
(6, 'images/gallery (6).png', ''),
(7, 'images/gallery (7).png', ''),
(8, 'images/gallery (8).png', ''),
(9, 'images/gallery (9).png', ''),
(10, 'images/gallery (10).png', ''),
(11, 'images/gallery (11).png', ''),
(12, 'images/gallery (12).png', ''),
(13, 'images/gallery (13).png', ''),
(14, 'images/gallery (14).png', ''),
(15, 'images/gallery (15).png', ''),
(16, 'images/gallery (16).png', ''),
(17, 'images/gallery (17).png', ''),
(18, 'images/gallery (18).png', ''),
(19, 'images/gallery (19).png', ''),
(20, 'images/gallery (20).png', ''),
(21, 'images/gallery (21).png', ''),
(22, 'images/gallery (22).png', ''),
(23, 'images/gallery (23).png', ''),
(24, 'images/gallery (24).png', ''),
(25, 'images/gallery (25).png', ''),
(26, 'images/gallery (26).png', ''),
(27, 'images/gallery (27).png', ''),
(28, 'images/gallery (28).png', ''),
(29, 'images/gallery (29).png', ''),
(30, 'images/gallery (30).png', ''),
(31, 'images/gallery (31).png', ''),
(32, 'images/gallery (32).png', ''),
(33, 'images/gallery (33).png', ''),
(34, 'images/gallery (34).png', ''),
(35, 'images/gallery (35).png', ''),
(36, 'images/gallery (36).png', ''),
(37, 'images/gallery (37).png', ''),
(38, 'images/gallery (38).png', ''),
(39, 'images/gallery (39).png', ''),
(40, 'images/gallery (40).png', ''),
(41, 'images/gallery (41).png', ''),
(42, 'images/gallery (42).png', ''),
(43, 'images/thumb-gallery20.png', ''),
(44, 'images/wheel-alignment.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblhall`
--

CREATE TABLE IF NOT EXISTS `tblhall` (
  `fldtype` varchar(100) NOT NULL,
  `fld50pax` varchar(100) NOT NULL,
  `fld100pax` varchar(100) NOT NULL,
  `fldavailable` varchar(100) NOT NULL,
  `fldampm` varchar(100) NOT NULL,
  PRIMARY KEY (`fldtype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhall`
--

INSERT INTO `tblhall` (`fldtype`, `fld50pax`, `fld100pax`, `fldavailable`, `fldampm`) VALUES
('Alfonso Pavillion', '6000', '8000', '1', '12000'),
('Kristina Function Hall', '10000', '12000', '1', '16000');

-- --------------------------------------------------------

--
-- Table structure for table `tblhut`
--

CREATE TABLE IF NOT EXISTS `tblhut` (
  `fldtype` varchar(100) NOT NULL,
  `fldday` varchar(100) NOT NULL,
  `fldnight` varchar(100) NOT NULL,
  `fldovernight` varchar(100) NOT NULL,
  `fldmaxpax` varchar(100) NOT NULL,
  `fldavailable` varchar(100) NOT NULL,
  PRIMARY KEY (`fldtype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhut`
--

INSERT INTO `tblhut` (`fldtype`, `fldday`, `fldnight`, `fldovernight`, `fldmaxpax`, `fldavailable`) VALUES
('Cabana', '400', '500', '800', '10', '9'),
('Duplex', '1250', '1500', '2500', '15', '1'),
('La Leona Cabana', '1200', '1500', '2500', '12', '10'),
('Mez', '1200', '1500', '1500', '12', '2'),
('Mushroom', '250', '350', '500', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tblhut1`
--

CREATE TABLE IF NOT EXISTS `tblhut1` (
  `fldtype` varchar(100) NOT NULL,
  `fldday` varchar(100) NOT NULL,
  `fldnight` varchar(100) NOT NULL,
  `fldovernight` varchar(100) NOT NULL,
  `fldmaxpax` varchar(100) NOT NULL,
  `fldavailable` varchar(100) NOT NULL,
  `fldhutnum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhut1`
--

INSERT INTO `tblhut1` (`fldtype`, `fldday`, `fldnight`, `fldovernight`, `fldmaxpax`, `fldavailable`, `fldhutnum`) VALUES
('Mushroom', '250', '350', '500', '5', '5', '111'),
('Mushroom', '250', '350', '500', '5', '5', '112'),
('Mushroom', '250', '350', '500', '5', '5', '113'),
('Mushroom', '250', '350', '500', '5', '5', '114'),
('Mushroom', '250', '350', '500', '5', '5', '115'),
('La Leona Cabana', '1200', '1500', '2500', '25', '1', '211'),
('Mez', '700', '800', '1500', '10', '2', '311'),
('Mez', '700', '800', '1500', '10', '2', '312'),
('Duplex', '1250', '1500', '2500', '15', '1', '411'),
('Cabana', '400', '500', '800', '10', '13', '511'),
('Cabana', '400', '500', '800', '10', '13', '512'),
('Cabana', '400', '500', '800', '10', '13', '513'),
('Cabana', '400', '500', '800', '10', '13', '514'),
('Cabana', '400', '500', '800', '10', '13', '515'),
('Cabana', '400', '500', '800', '10', '13', '516'),
('Cabana', '400', '500', '800', '10', '13', '517');

-- --------------------------------------------------------

--
-- Table structure for table `tblincre`
--

CREATE TABLE IF NOT EXISTS `tblincre` (
  `fldnum` varchar(100) NOT NULL,
  `fldnet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblincre`
--

INSERT INTO `tblincre` (`fldnum`, `fldnet`) VALUES
('19', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory_cabanas`
--

CREATE TABLE IF NOT EXISTS `tblinventory_cabanas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) NOT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `REMARKS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TOTAL_QUANTITY` int(11) NOT NULL,
  `FEE` int(11) NOT NULL,
  `ORDERED_QUANTITY` int(11) NOT NULL,
  `AVAILABLE_QUANTITY` int(11) NOT NULL,
  `STATUS` enum('AVAILABLE','NOT AVAILABLE','DAMAGED') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblinventory_cabanas`
--

INSERT INTO `tblinventory_cabanas` (`ID`, `CODE`, `NAME`, `REMARKS`, `TOTAL_QUANTITY`, `FEE`, `ORDERED_QUANTITY`, `AVAILABLE_QUANTITY`, `STATUS`) VALUES
(1, 999, 'NINE', 'TEST', 9, 9999, 0, 0, 'AVAILABLE'),
(2, 233, 'threethree', 'test test', 33, 3300, 0, 0, 'AVAILABLE'),
(3, 11, 'test11', 'test11remark', 11, 1111, 0, 0, 'AVAILABLE'),
(4, 0, 'zeroname', 'zeroremarks', 0, 10, 0, 0, 'AVAILABLE'),
(5, 99, 'lasttest', 'lasttest', 12, 12, 0, 0, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory_casa`
--

CREATE TABLE IF NOT EXISTS `tblinventory_casa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) NOT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `REMARKS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TOTAL_QUANTITY` int(11) NOT NULL,
  `FEE` int(11) NOT NULL,
  `ORDERED_QUANTITY` int(11) NOT NULL DEFAULT '0',
  `AVAILABLE_QUANTITY` int(11) NOT NULL,
  `STATUS` enum('AVAILABLE','NOT AVAILABLE','DAMAGED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblinventory_casa`
--

INSERT INTO `tblinventory_casa` (`ID`, `CODE`, `NAME`, `REMARKS`, `TOTAL_QUANTITY`, `FEE`, `ORDERED_QUANTITY`, `AVAILABLE_QUANTITY`, `STATUS`) VALUES
(1, 222, 'Test Item', 'Test Remarks', 5, 200, 0, 5, 'AVAILABLE'),
(2, 333, 'TEST 2', 'TEST 2', 2, 600, 0, 2, 'NOT AVAILABLE'),
(3, 4421, 'test 3', 'test 3', 6, 700, 0, 6, 'DAMAGED'),
(4, 1212, 'namesss', 'remarksss', 80, 800, 0, 0, 'AVAILABLE'),
(5, 0, 'test', 'TEst', 0, 0, 0, 0, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory_function`
--

CREATE TABLE IF NOT EXISTS `tblinventory_function` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) NOT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `REMARKS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TOTAL_QUANTITY` int(11) NOT NULL,
  `FEE` int(11) NOT NULL,
  `ORDERED_QUANTITY` int(11) NOT NULL,
  `AVAILABLE_QUANTITY` int(11) NOT NULL,
  `STATUS` enum('AVAILABLE','NOT AVAILABLE','DAMAGED') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblinventory_function`
--

INSERT INTO `tblinventory_function` (`ID`, `CODE`, `NAME`, `REMARKS`, `TOTAL_QUANTITY`, `FEE`, `ORDERED_QUANTITY`, `AVAILABLE_QUANTITY`, `STATUS`) VALUES
(1, 23, 'two three', 'TEst', 2, 30000, 0, 0, 'AVAILABLE'),
(2, 0, 'one', 'one', 1, 111, 0, 0, 'AVAILABLE'),
(3, 123123123, 'te', 'ewr', 23, 23, 0, 0, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tblitemscategory`
--

CREATE TABLE IF NOT EXISTS `tblitemscategory` (
  `fldcategorycode` int(100) NOT NULL AUTO_INCREMENT,
  `fldproductname` varchar(100) NOT NULL,
  PRIMARY KEY (`fldcategorycode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblitemscategory`
--

INSERT INTO `tblitemscategory` (`fldcategorycode`, `fldproductname`) VALUES
(1, 'Toiletries'),
(2, 'Food Supplies'),
(3, 'Equipment Supplies'),
(4, 'Room Amenities'),
(5, 'Catering Equipments');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`username`, `password`, `type`) VALUES
('admin', '123', 'admin'),
('user', 'user', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE IF NOT EXISTS `tblpayments` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`payid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`payid`, `trxnid`, `email`, `fullname`, `food`, `damage`, `downpayment`, `balance`, `ornum`, `totamt`, `payment_amount`, `payment_status`, `itemid`, `createdtime`, `date_`) VALUES
(5, 2, 'ui', 'iu, y iuy.', '0.00', '0.00', '1000.00', '3950.00', '', '4950.00', '', '', '1', '11:03:28', '05/26/2016'),
(6, 2, 'ui', 'iu, y iuy.', '1200.00', '300.00', '0.00', '0.00', '', '5450.00', '', '', '1', '11:51:34', '05/26/2016'),
(7, 4, 'jerslibera@gmail.com', 'libera, kevin lacad.', '0.00', '0.00', '1000.00', '5000.00', '', '6000.00', '', '', '3', '11:55:34', '05/26/2016'),
(8, 7, '2@2.net', 'SAMPLE, SAMPLE S.', '0.00', '0.00', '1000.00', '200.00', '', '1200.00', '', '', '2', '11:57:55', '05/26/2016'),
(9, 7, '2@2.net', 'SAMPLE, SAMPLE S.', '300.00', '0.00', '0.00', '0.00', 'or12345', '500.00', '500', '', '2', '12:11:08', '05/26/2016'),
(10, 6, 'asdjkashdj_@1ajsd', 'ate, ate ate.', '0.00', '0.00', '1000.00', '5500.00', '', '6500.00', '', '', '1', '08:34:49', '05/29/2016'),
(11, 30, 'xxx@xxx.com', 'x, x x.', '0.00', '0.00', '1000.00', '1150.00', '', '2150.00', '', '', '1', '09:36:11', '06/03/2016'),
(12, 35, 'zxc@zxc.com', 'zxc, zxc c.', '0.00', '0.00', '1000.00', '5000.00', '', '6000.00', '', '', '3', '02:37:20', '06/04/2016');

-- --------------------------------------------------------

--
-- Table structure for table `tblphoto`
--

CREATE TABLE IF NOT EXISTS `tblphoto` (
  `fldtype` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `imagefile` varchar(100) NOT NULL,
  `imagetype` varchar(100) NOT NULL,
  `imagesize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblphoto`
--

INSERT INTO `tblphoto` (`fldtype`, `status`, `imagefile`, `imagetype`, `imagesize`) VALUES
('Casa Leona', '', '5.png', 'image/png', '583644'),
('Casa Leona Deluxe', '', 'uploadedpicturepool.jpg', 'image/jpeg', '10791'),
('Casa Leona Deluxe', '', '4.png', 'image/png', '515434'),
('La Leona Attic', '', '5.png', 'image/png', '583644'),
('La Leona Attic', '', 'uploadedpicturecar.jpg', 'image/jpeg', '15755'),
('Mushroom', '', 'mushroom1.png', 'image/png', '667567'),
('Mez', '', 'mezaninne1.png', 'image/png', '612622'),
('Casa Leona Deluxe', '', 'uploadedpicturepool.jpg', 'image/jpeg', '10791'),
('Casa Leona Deluxe', '', 'mushroom4.png', 'image/png', '665567'),
('Casa Leona', '', 'mushroom2.png', 'image/png', '671600'),
('La Leona Attic', '', '5.png', 'image/png', '583644'),
('Casa Leona', '', 'mushroom2.png', 'image/png', '671600'),
('Casa Leona', '', 'uploadedpicturedrinking.jpg', 'image/jpeg', '10510'),
('Casa Leona Deluxe', '', 'gallery1.png', 'image/png', '562657'),
('Casa Leona', '', 'thumb-5.png', 'image/png', '15814');

-- --------------------------------------------------------

--
-- Table structure for table `tblprice`
--

CREATE TABLE IF NOT EXISTS `tblprice` (
  `fldsession` varchar(100) NOT NULL,
  `fldadult` varchar(100) NOT NULL,
  `fldkid` varchar(100) NOT NULL,
  `flda30pax` varchar(100) NOT NULL,
  `fldk30pax` varchar(100) NOT NULL,
  `flda51pax` varchar(100) NOT NULL,
  `fldk51pax` varchar(100) NOT NULL,
  `flda101pax` varchar(100) NOT NULL,
  `fldk101pax` varchar(100) NOT NULL,
  PRIMARY KEY (`fldsession`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprice`
--

INSERT INTO `tblprice` (`fldsession`, `fldadult`, `fldkid`, `flda30pax`, `fldk30pax`, `flda51pax`, `fldk51pax`, `flda101pax`, `fldk101pax`) VALUES
('Day', '120', '80', '115', '75', '110', '70', '105', '65'),
('Day and Night', '240', '160', '235', '155', '230', '150', '225', '145'),
('Night', '180', '120', '175', '115', '170', '110', '165', '105');

-- --------------------------------------------------------

--
-- Table structure for table `tblregister`
--

CREATE TABLE IF NOT EXISTS `tblregister` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fldfname` varchar(100) NOT NULL,
  `fldmname` varchar(100) NOT NULL,
  `fldlname` varchar(100) NOT NULL,
  `fldaddress` varchar(100) NOT NULL,
  `fldemail` varchar(100) NOT NULL,
  `fldcontact1` varchar(20) NOT NULL,
  `fldcontact2` varchar(20) NOT NULL,
  `fldage` int(100) NOT NULL,
  `fldgender` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`fldemail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblregister`
--

INSERT INTO `tblregister` (`username`, `password`, `fldfname`, `fldmname`, `fldlname`, `fldaddress`, `fldemail`, `fldcontact1`, `fldcontact2`, `fldage`, `fldgender`, `type`) VALUES
('', '12345678', 'SAMPLE', 'S', 'SAMPLE', 'ASDFGHJKLPOIUYTREWQ', '2@2.net', '123456789', '', 18, 'Male', 'customer'),
('', '12345678', 'DESK', '', 'FRONT', 'ALPHABET VILLAGE', 'asd@asd.com', '09876543210', '', 18, 'Male', 'FRONTDESK'),
('mejico', 'mejico', 'jilan', 'h', 'mejico', 'marawoy', 'asdasdasdasd', '2147483647', '', 19, 'Male', 'customer'),
('mejico01', 'mejico', 'jilan', 'h', 'mejico', 'marawoy', 'asdasdasdasd32323', '2147483647', '', 19, 'Male', 'customer'),
('ate', 'ate', 'ate', 'ate', 'ate', 'sampaguita', 'asdjkashdj_@1ajsd', '2147483647', '', 16, 'Female', 'customer'),
('daniel', '123', 'daniel', 'lescano', 'pilapil', 'marawoy', 'danieledward@gmail.com', '2147483647', '', 24, 'Male', 'customer'),
('Kevin', '123', 'kevin', 'lacad', 'libera', 'san guillermo', 'jerslibera@gmail.com', '2147483647', '', 21, 'Male', 'customer'),
('dale', '123', 'dale', 'mejico', 'mendoza', 'lipa', 'jhonnedale@yahoo.com', '923456432', '', 21, 'Male', 'customer'),
('Julius', 'Mejico', 'Julius Mejico', 'H', 'Mejico', 'marawoy', 'juliusdaw309@gmail.com', '2147483647', '', 20, 'Male', 'customer'),
('Camille', '123', 'Camille', 'g', 'hernandez', 'lipa', 'juliusmejico02@gmail.com', '2147483647', '', 16, 'Female', 'customer'),
('ninabelle', '123', 'nina', 'sandoval', 'valle', 'sariaya', 'nina.valle16@yahoo.com', '2147483647', '', 23, 'Female', 'customer'),
('nina', '123', 'nina', 'wala', 'valle', 'lipa', 'ninavalle@yahoo.com', '921345433', '', 19, 'Female', 'customer'),
('', '12345', 'salem', 'm', 'laylo', 'sdjhjhdsfajhdsfjkhjh', 'salemcoe@gmail.com', '98765432111', '', 37, 'Male', 'customer'),
('yeah', 'yeah', 'julius', 'hutalla', 'mejico', 'marawoy', 'silvajenica', '2147483647', '', 12, 'Male', 'customer'),
('t', 't', 't', 't', 't', 't', 't', '2', '', 23, 'Male', 'customer'),
('yui', 'yui', 'y', 'iuy', 'iu', 'yiy', 'ui', '0', '', 0, 'Female', 'customer'),
('', 'xxxxx', 'x', 'x', 'x', 'xxxxxxxxxxxxxxxxxx', 'x@x.com', 'xxxxxxxxxxxx', '', 18, 'Male', 'customer'),
('', '12345', 'x', 'x', 'x', 'xxxxxxxxxxxxxxxxxxxxxxxx', 'xxx@xxx.com', 'xxxxxxxxxxxxxxx', '', 37, 'Male', 'customer'),
('', '12345', 'zxc', 'c', 'zxc', 'zxczxczxczx', 'zxc@zxc.com', 'zxczxczx', '', 37, 'Male', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE IF NOT EXISTS `tblreport` (
  `username` varchar(100) NOT NULL,
  `fldcreated` date NOT NULL,
  `RegNo` varchar(100) NOT NULL,
  `fldarrival` date NOT NULL,
  `flddeparture` date NOT NULL,
  `fldnightstay` varchar(100) NOT NULL,
  `fldadult` varchar(100) NOT NULL,
  `fldchild` varchar(100) NOT NULL,
  `fldroom` varchar(100) NOT NULL,
  `fldcottagesnum` varchar(100) NOT NULL,
  `fldhut2` varchar(100) NOT NULL,
  `fldh2` varchar(100) NOT NULL,
  `fldhut3` varchar(100) NOT NULL,
  `fldh3` varchar(100) NOT NULL,
  `fldhut4` varchar(100) NOT NULL,
  `fldh4` varchar(100) NOT NULL,
  `fldhut5` varchar(100) NOT NULL,
  `fldh5` varchar(100) NOT NULL,
  `fldhutnum` varchar(100) NOT NULL,
  `fldroom2` varchar(100) NOT NULL,
  `fldnum2` varchar(100) NOT NULL,
  `fldroom4` varchar(100) NOT NULL,
  `fldnum4` varchar(100) NOT NULL,
  `fldroomtype` varchar(100) NOT NULL,
  `fldnumofroom` varchar(100) NOT NULL,
  `fldroomnum` varchar(100) NOT NULL,
  `fldstaytype` varchar(100) NOT NULL,
  `fldtotal` varchar(100) NOT NULL,
  `fldpaytype` varchar(100) NOT NULL,
  `fldfname` varchar(100) NOT NULL,
  `fldlname` varchar(100) NOT NULL,
  `fldcontact` varchar(100) NOT NULL,
  `fldpayment` varchar(100) NOT NULL,
  `fldpaymenttype` varchar(100) NOT NULL,
  `fldterm` varchar(100) NOT NULL,
  `flddownpayment` varchar(100) NOT NULL,
  `fldbalance` varchar(100) NOT NULL,
  `fldchange` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `flddate` date NOT NULL,
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreport`
--

INSERT INTO `tblreport` (`username`, `fldcreated`, `RegNo`, `fldarrival`, `flddeparture`, `fldnightstay`, `fldadult`, `fldchild`, `fldroom`, `fldcottagesnum`, `fldhut2`, `fldh2`, `fldhut3`, `fldh3`, `fldhut4`, `fldh4`, `fldhut5`, `fldh5`, `fldhutnum`, `fldroom2`, `fldnum2`, `fldroom4`, `fldnum4`, `fldroomtype`, `fldnumofroom`, `fldroomnum`, `fldstaytype`, `fldtotal`, `fldpaytype`, `fldfname`, `fldlname`, `fldcontact`, `fldpayment`, `fldpaymenttype`, `fldterm`, `flddownpayment`, `fldbalance`, `fldchange`, `status`, `flddate`, `transaction_id`) VALUES
('jd', '0000-00-00', '1', '2016-02-08', '2016-02-08', '0', '10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Day', '2450', '', 'jhonne', 'mendoza', '09262626262', '1395.00', 'Paypal', 'Full Payment', '0', '', '', 'Reserved', '2016-02-08', '9RJ57368WP156862P'),
('jd', '0000-00-00', '1', '2016-02-08', '2016-02-08', '0', '10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Day', '2450', '', 'jhonne', 'mendoza', '09262626262', '1395.00', 'Paypal', 'Full Payment', '0', '', '', 'Reserved', '2016-02-08', '9RJ57368WP156862P'),
('jd', '2016-02-08', '1', '2016-02-10', '2016-02-11', '1', '5', '2', 'Cabana', '1', 'Mushroom', '1', 'Mez', '1', '', '', '', '', '', '', '', '', '', '', '', '', 'Night', '2790', '', 'jhonne', 'mendoza', '09262626262', '1395.00', 'Paypal', 'Downpayment', '', '1395', '', 'Reserved', '2016-02-10', '9RJ57368WP156862P'),
('jd1123', '2016-02-08', '2', '2016-02-10', '2016-02-11', '1', '5', '', '', '', '', '', 'Mez', '1', '', '', '', '', '', '', '', '', '', '', '', '', 'Day and Night', '2800', '', 'jhonne', 'mendoza', '09262626262', '1400.00', 'Paypal', 'Downpayment', '', '1400', '', 'Reserved', '2016-02-10', '82S82656YC4791724');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservations`
--

CREATE TABLE IF NOT EXISTS `tblreservations` (
  `trxnid` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`trxnid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tblreservations`
--

INSERT INTO `tblreservations` (`trxnid`, `facid`, `facname`, `roomnum`, `typeofuse`, `rate`, `numpax`, `xcs`, `per`, `xcsamt`, `cin`, `cout`, `tin`, `tout`, `totime`, `addhrs`, `addhrsamt`, `occasion`, `cater`, `xbed`, `numdays`, `totamt`, `mode`, `status`, `email`, `ornum`, `remarks`, `date_`) VALUES
(2, 1, 'Casa Leona 1', '', 'Day', '1550.00', 3, 1, '200.00', '200.00', '05/28/2016', '05/31/2016', '', '', '0.00', '0.00', '0.00', '', '', '300.00', '3.00', '4.00', 'cash', 'checkedout', 'ui', '', '', ''),
(3, 2, 'Cabanas', '', 'Day', '400.00', 2, 2, '0.00', '0.00', '05/28/2016', '05/29/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '400.00', 'cash', 'for cancellation', 'jerslibera@gmail.com', '', '', ''),
(4, 3, 'Alfonso Pavilion Hall', '', 'Day', '6000.00', 200, 0, '250.00', '0.00', '05/28/2016', '', '10:00', '13:30', '3.00', '0.00', '0.00', 'birthday', 'no', '0', '1.00', '6.00', 'cash', 'checkedin', 'jerslibera@gmail.com', '', '', ''),
(5, 1, 'La Leona Attic', '', 'Day', '3550.00', 10, 0, '180.00', '0.00', '05/28/2016', '05/31/2016', '', '', '0.00', '0.00', '0.00', '', '', '0.00', '3.00', '10.00', 'cash', 'cancelled', 'silvajenica', '', '', ''),
(6, 1, 'Casa Leona 1', '', 'Day', '1550.00', 1, 0, '200.00', '0.00', '06/01/2016', '06/05/2016', '', '', '0.00', '0.00', '0.00', '', '', '300.00', '4.00', '6.00', 'cash', 'checkedin', 'asdjkashdj_@1ajsd', '', '', ''),
(7, 2, 'Duplex', '', 'Day', '1200.00', 2, 2, '0.00', '0.00', '05/28/2016', '05/29/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '1.00', 'cash', 'checkedout', '2@2.net', '', '', ''),
(8, 3, 'Alfonso Pavilion Hall', '', 'Day', '6000.00', 100, 0, '250.00', '0.00', '06/02/2016', '', '12:00', '18:00', '6.00', '1.00', '1200.00', 'baptismal', 'yes', '0', '1.00', '7.00', 'cash', 'pending', 'silvajenica', '', '', ''),
(9, 1, 'La Leona Attic', '', 'Day', '3550.00', 9, 0, '180.00', '0.00', '05/29/2016', '05/31/2016', '', '', '0.00', '0.00', '0.00', '', '', '0.00', '2.00', '7.00', 'cash', 'for cancellation', 'jerslibera@gmail.com', '', '', ''),
(10, 1, 'Casa Leona 1', '', 'Day', '1550.00', 3, 1, '200.00', '200.00', '06/01/2016', '06/02/2016', '', '', '0.00', '0.00', '0.00', '', '', '300.00', '1.00', '1.00', 'cash', 'pending', 'ui', '', '', ''),
(11, 2, 'Mushroom', '', 'Day', '250.00', 1, 1, '0.00', '0.00', '06/01/2016', '06/02/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '250.00', 'paypal', 'pending', 'ui', '', '', ''),
(12, 2, 'Cabanas', '', 'Day', '400.00', 2, 2, '0.00', '0.00', '06/01/2016', '06/02/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '400.00', 'paypal', 'pending', 'ui', '', '', ''),
(13, 2, 'Mushroom', '', 'Day', '250.00', 1, 1, '0.00', '0.00', '06/02/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '2.00', '500.00', 'cash', 'pending', 'juliusmejico02@gmail.com', '', '', ''),
(14, 2, 'Mushroom', '', 'Day', '250.00', 1, 1, '0.00', '0.00', '06/02/2016', '06/03/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '250.00', 'paypal', 'pending', 'ui', '', '', ''),
(21, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 3, 1, '200.00', '200.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'salemcoe@gmail.com', '', '', ''),
(22, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 3, 1, '200.00', '200.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'salemcoe@gmail.com', '', '', ''),
(23, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'ui', '', '', ''),
(24, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'ui', '', '', ''),
(25, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'ui', '', '', ''),
(26, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'ui', '', '', ''),
(27, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'cash', 'pending', '2@2.net', '', '', ''),
(28, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 3, 1, '200.00', '200.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '300.00', '1.00', '2.00', 'cash', 'pending', '2@2.net', '', '', ''),
(29, 1, 'La Leona Attic', '', 'Day and Night', '5150.00', 12, 2, '180.00', '360.00', '06/03/2016', '06/04/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '5.00', 'paypal', 'pending', 'ui', '', '', ''),
(30, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/08/2016', '06/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'cash', 'checkedin', 'xxx@xxx.com', '', '', ''),
(31, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/08/2016', '06/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'cash', 'checkedin', 'xxx@xxx.com', '', '', ''),
(32, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/08/2016', '06/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'cash', 'checkedin', 'xxx@xxx.com', '', '', ''),
(33, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/08/2016', '06/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'cash', 'checkedin', 'xxx@xxx.com', '', '', ''),
(34, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/08/2016', '06/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'cash', 'checkedin', 'xxx@xxx.com', '', '', ''),
(35, 3, 'Alfonso Pavilion Hall', '', 'Day and Night', '6000.00', 200, 0, '250.00', '0.00', '06/07/2016', '', '08:00', '13:00', '5.00', '0.00', '0.00', 'Baptismal', 'No', '0', '1.00', '6.00', 'cash', 'checkedin', 'zxc@zxc.com', '', '', ''),
(36, 3, 'Alfonso Pavilion Hall', '', 'Day and Night', '6000.00', 200, 0, '250.00', '0.00', '06/07/2016', '', '08:00', '13:00', '5.00', '0.00', '0.00', 'Baptismal', 'No', '0', '1.00', '6.00', 'cash', 'checkedin', 'zxc@zxc.com', '', '', ''),
(37, 3, 'Alfonso Pavilion Hall', '', 'Day and Night', '6000.00', 200, 0, '250.00', '0.00', '06/07/2016', '', '08:00', '13:00', '5.00', '0.00', '0.00', 'Baptismal', 'No', '0', '1.00', '6.00', 'cash', 'checkedin', 'zxc@zxc.com', '', '', ''),
(38, 3, 'Alfonso Pavilion Hall', '', 'Day and Night', '6000.00', 200, 0, '250.00', '0.00', '06/07/2016', '', '08:00', '13:00', '5.00', '0.00', '0.00', 'Baptismal', 'No', '0', '1.00', '6.00', 'cash', 'checkedin', 'zxc@zxc.com', '', '', ''),
(39, 3, 'Alfonso Pavilion Hall', '', 'Day and Night', '6000.00', 200, 0, '250.00', '0.00', '06/07/2016', '', '08:00', '13:00', '5.00', '0.00', '0.00', 'Baptismal', 'No', '0', '1.00', '6.00', 'cash', 'checkedin', 'zxc@zxc.com', '', '', ''),
(40, 3, 'Alfonso Pavilion Hall', '', 'Day and Night', '6000.00', 200, 0, '250.00', '0.00', '06/07/2016', '', '08:00', '13:00', '5.00', '0.00', '0.00', 'Baptismal', 'No', '0', '1.00', '6.00', 'cash', 'checkedin', 'zxc@zxc.com', '', '', ''),
(41, 1, 'Casa Leona 2', '', 'Day and Night', '2650.00', 4, 0, '150.00', '0.00', '06/08/2016', '06/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'checkedin', 'x@x.com', '', '', ''),
(42, 1, 'Casa Leona 2', '', 'Day and Night', '2650.00', 4, 0, '150.00', '0.00', '06/08/2016', '06/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'checkedin', 'x@x.com', '', '', ''),
(43, 1, 'Casa Leona 2', '', 'Day and Night', '2650.00', 4, 0, '150.00', '0.00', '06/08/2016', '06/09/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'checkedin', 'x@x.com', '', '', ''),
(44, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/14/2016', '06/15/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'ui', '', '', ''),
(45, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/14/2016', '06/15/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'ui', '', '', ''),
(49, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/15/2016', '06/16/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '2.00', 'paypal', 'pending', 'ui', '', '', ''),
(50, 1, 'Casa Leona 1', '', 'Day and Night', '2150.00', 2, 0, '200.00', '0.00', '06/15/2016', '06/16/2016', '', '', '0.00', '0.00', '0.00', '', '', '0', '1.00', '16150.00', 'paypal', 'pending', 'ui', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblreserve`
--

CREATE TABLE IF NOT EXISTS `tblreserve` (
  `username` varchar(100) NOT NULL,
  `fldcreated` date NOT NULL,
  `RegNo` varchar(100) NOT NULL,
  `fldarrival` date NOT NULL,
  `flddeparture` date NOT NULL,
  `fldnightstay` varchar(100) NOT NULL,
  `fldadult` varchar(100) NOT NULL,
  `fldchild` varchar(100) NOT NULL,
  `fldroom` varchar(100) NOT NULL,
  `fldcottagesnum` varchar(100) NOT NULL,
  `fldhut2` varchar(100) NOT NULL,
  `fldh2` varchar(100) NOT NULL,
  `fldhut3` varchar(100) NOT NULL,
  `fldh3` varchar(100) NOT NULL,
  `fldhut4` varchar(100) NOT NULL,
  `fldh4` varchar(100) NOT NULL,
  `fldhut5` varchar(100) NOT NULL,
  `fldh5` varchar(100) NOT NULL,
  `fldhutnum` varchar(100) NOT NULL,
  `fldroom2` varchar(100) NOT NULL,
  `fldnum2` varchar(100) NOT NULL,
  `fldroom4` varchar(100) NOT NULL,
  `fldnum4` varchar(100) NOT NULL,
  `fldroomtype` varchar(100) NOT NULL,
  `fldnumofroom` varchar(100) NOT NULL,
  `fldroomnum` varchar(100) NOT NULL,
  `fldstaytype` varchar(100) NOT NULL,
  `fldtotal` varchar(100) NOT NULL,
  `fldpaytype` varchar(100) NOT NULL,
  `fldfname` varchar(100) NOT NULL,
  `fldlname` varchar(100) NOT NULL,
  `fldcontact` varchar(100) NOT NULL,
  `fldpayment` varchar(100) NOT NULL,
  `fldpaymenttype` varchar(100) NOT NULL,
  `fldterm` varchar(100) NOT NULL,
  `flddownpayment` varchar(100) NOT NULL,
  `fldbalance` varchar(100) NOT NULL,
  `fldchange` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `flddate` date NOT NULL,
  `fldextra` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreserve`
--

INSERT INTO `tblreserve` (`username`, `fldcreated`, `RegNo`, `fldarrival`, `flddeparture`, `fldnightstay`, `fldadult`, `fldchild`, `fldroom`, `fldcottagesnum`, `fldhut2`, `fldh2`, `fldhut3`, `fldh3`, `fldhut4`, `fldh4`, `fldhut5`, `fldh5`, `fldhutnum`, `fldroom2`, `fldnum2`, `fldroom4`, `fldnum4`, `fldroomtype`, `fldnumofroom`, `fldroomnum`, `fldstaytype`, `fldtotal`, `fldpaytype`, `fldfname`, `fldlname`, `fldcontact`, `fldpayment`, `fldpaymenttype`, `fldterm`, `flddownpayment`, `fldbalance`, `fldchange`, `status`, `flddate`, `fldextra`, `transaction_id`) VALUES
('', '2016-03-02', '26', '2016-03-07', '2016-03-08', '1', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', 'Night', '2975', '', 'Jhonne Dale', 'Mendoza', '09565656565', '2975', 'Cash Deposit', 'Downpayment', '', '0', '', 'Checked in', '2016-03-07', 'No', ''),
('jd', '2016-03-03', '28', '2016-03-07', '2016-03-08', '1', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Night', '825', '', 'Alison', 'Villapando', '09565656565', '', 'Paypal', 'Full Payment', '', '825', '', 'Pending', '2016-03-07', 'No', ''),
('ninabelle', '2016-04-09', '18', '2016-04-13', '2016-04-14', '1', '1', '1', 'Cabana', '3', '', '', '', '', '', '', '', '', '', 'Casa Leona Deluxe', '3', '', '', '', '', '', 'Night', '9795', '', 'nina', 'valle', '09232321312', '', 'Cash Deposit', 'Full Payment', '', '9795', '', 'Pending', '2016-04-13', 'Yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblreserveevent`
--

CREATE TABLE IF NOT EXISTS `tblreserveevent` (
  `username` varchar(100) NOT NULL,
  `RegNo` varchar(100) NOT NULL,
  `fldfname` varchar(100) NOT NULL,
  `fldlname` varchar(100) NOT NULL,
  `fldcontact` varchar(100) NOT NULL,
  `fldarrival` date NOT NULL,
  `fldtime` varchar(100) NOT NULL,
  `fldhour` varchar(100) NOT NULL,
  `fldhall` varchar(100) NOT NULL,
  `fldnumpax` varchar(100) NOT NULL,
  `fldcater` varchar(100) NOT NULL,
  `fldpaymenttype` varchar(100) NOT NULL,
  `fldterm` varchar(100) NOT NULL,
  `flddownpayment` varchar(100) NOT NULL,
  `fldtotal` varchar(100) NOT NULL,
  `fldpayment` varchar(100) NOT NULL,
  `fldbalance` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `flddate` date NOT NULL,
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreserveevent`
--

INSERT INTO `tblreserveevent` (`username`, `RegNo`, `fldfname`, `fldlname`, `fldcontact`, `fldarrival`, `fldtime`, `fldhour`, `fldhall`, `fldnumpax`, `fldcater`, `fldpaymenttype`, `fldterm`, `flddownpayment`, `fldtotal`, `fldpayment`, `fldbalance`, `status`, `flddate`, `transaction_id`) VALUES
('', '18', 'melax', 'cantiveberos', '09837462900', '2016-03-10', 'PM', '', 'Alfonso Pavillion', '50', 'No', 'Cash Deposit', 'Full Payment', '0', '8000', '8000', '0', 'Reserved', '2016-03-01', ''),
('', '19', 'lebron', 'wade', '09163687953', '2016-03-09', 'AM', '', 'Alfonso Pavillion', '50', 'No', 'Paypal', 'Downpayment', '', '8000', '8000', '0', 'Checked in', '2016-03-01', ''),
('ninabelle', '19', 'nina', 'valle', '2147483647', '2016-04-13', 'AM', '1', 'Alfonso Pavillion', '150', 'Yes', 'Paypal', 'Downpayment', '', '68500', '', '34250', 'Pending', '2016-04-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblreserve_temp`
--

CREATE TABLE IF NOT EXISTS `tblreserve_temp` (
  `trxnid` int(11) NOT NULL DEFAULT '0',
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
  `date_` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE IF NOT EXISTS `tblroom` (
  `fldtype` varchar(100) NOT NULL,
  `fldday` varchar(100) NOT NULL,
  `fldnight` varchar(100) NOT NULL,
  `fldmaxpax` varchar(100) NOT NULL,
  `fldavailable` varchar(100) NOT NULL,
  PRIMARY KEY (`fldtype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`fldtype`, `fldday`, `fldnight`, `fldmaxpax`, `fldavailable`) VALUES
('Casa Leona', '1550', '2150', '4', '5'),
('Casa Leona Deluxe', '2050', '2650', '4', '3'),
('La Leona Attic', '3550', '5150', '10', '6'),
('Mushroom', '1500', '2500', '12', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tblroom1`
--

CREATE TABLE IF NOT EXISTS `tblroom1` (
  `fldtype` varchar(100) NOT NULL,
  `fldday` varchar(100) NOT NULL,
  `fldnight` varchar(100) NOT NULL,
  `fldmaxpax` varchar(100) NOT NULL,
  `fldavailable` varchar(100) NOT NULL,
  `fldroomnum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroom1`
--

INSERT INTO `tblroom1` (`fldtype`, `fldday`, `fldnight`, `fldmaxpax`, `fldavailable`, `fldroomnum`) VALUES
('Casa Leona', '1550', '2150', '2', '6', '101'),
('Casa Leona', '1550', '2150', '2', '6', '102'),
('Casa Leona', '1550', '2150', '2', '6', '103'),
('Casa Leona', '1550', '2150', '2', '6', '104'),
('Casa Leona', '1550', '2150', '2', '6', '105'),
('Casa Leona', '1550', '2150', '2', '6', '106'),
('Casa Leona Deluxe', '2050', '2650', '4', '6', '201'),
('Casa Leona Deluxe', '2050', '2650', '4', '6', '202'),
('Casa Leona Deluxe', '2050', '2650', '4', '6', '203'),
('Casa Leona Deluxe', '2050', '2650', '4', '6', '204'),
('Casa Leona Deluxe', '2050', '2650', '4', '6', '205'),
('Casa Leona Deluxe', '2050', '2650', '4', '6', '206'),
('La Leona Attic', '3550', '5150', '10', '1', '301');

-- --------------------------------------------------------

--
-- Table structure for table `tblroom102`
--

CREATE TABLE IF NOT EXISTS `tblroom102` (
  `fldequipname102` varchar(100) NOT NULL,
  `fldequipquantity102` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroom102`
--

INSERT INTO `tblroom102` (`fldequipname102`, `fldequipquantity102`) VALUES
('Television', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblroominven`
--

CREATE TABLE IF NOT EXISTS `tblroominven` (
  `flditemcode` int(100) NOT NULL AUTO_INCREMENT,
  `flditemname` varchar(100) NOT NULL,
  `fldquantity` int(100) NOT NULL,
  PRIMARY KEY (`flditemcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblroominven`
--

INSERT INTO `tblroominven` (`flditemcode`, `flditemname`, `fldquantity`) VALUES
(1, 'towel', 10),
(2, 'bed sheet', 40),
(3, 'pillow', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tblroomnnum`
--

CREATE TABLE IF NOT EXISTS `tblroomnnum` (
  `fldnum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroomnnum`
--

INSERT INTO `tblroomnnum` (`fldnum`) VALUES
('101'),
('102');

-- --------------------------------------------------------

--
-- Table structure for table `tbltoiletries`
--

CREATE TABLE IF NOT EXISTS `tbltoiletries` (
  `flditemcode` int(100) NOT NULL AUTO_INCREMENT,
  `flditemname` varchar(100) NOT NULL,
  `fldquantity` int(100) NOT NULL,
  `fldprice` text NOT NULL,
  `fldunit` varchar(100) NOT NULL,
  PRIMARY KEY (`flditemcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbltoiletries`
--

INSERT INTO `tbltoiletries` (`flditemcode`, `flditemname`, `fldquantity`, `fldprice`, `fldunit`) VALUES
(2, 'shampoo', 24, 'â‚±8', 'per peice'),
(3, 'toothbrush', 50, 'â‚±20', 'per peice'),
(4, 'tissue', 20, 'â‚±20', 'per peice'),
(5, 'soap', 40, 'â‚±30', 'per peice'),
(6, 'toothpaste', 12, '23', 'per peice');

-- --------------------------------------------------------

--
-- Table structure for table `tbltype`
--

CREATE TABLE IF NOT EXISTS `tbltype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facid` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pieces` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `price1` decimal(10,2) NOT NULL,
  `price2` decimal(10,2) NOT NULL,
  `price3` decimal(10,2) NOT NULL,
  `perhead` decimal(10,2) NOT NULL,
  `pax` int(11) NOT NULL,
  `disc` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbltype`
--

INSERT INTO `tbltype` (`id`, `facid`, `code`, `name`, `status`, `pieces`, `remarks`, `price1`, `price2`, `price3`, `perhead`, `pax`, `disc`, `image`) VALUES
(1, 1, 'CLL101', 'Casa Leona 1', '1', 3, 'Good for 2 persons', '1550.00', '2150.00', '300.00', '200.00', 2, 0, 'images/1.png'),
(2, 1, 'CLL102', 'Casa Leona 2', '1', 3, 'Good for 4 persons', '2050.00', '2650.00', '450.00', '150.00', 4, 0, 'images/gallery24.png'),
(3, 1, 'CLL103', 'La Leona Attic', '1', 3, 'Good for 10 persons', '3550.00', '5150.00', '0.00', '180.00', 10, 0, 'images/room1.png'),
(4, 2, 'CBM201', 'Mushroom', '1', 3, 'Good for 10 persons', '250.00', '350.00', '500.00', '0.00', 0, 0, 'images/mushroom2.png'),
(5, 2, 'CBM202', 'Cabanas', '1', 3, 'Good for 10 persons', '400.00', '500.00', '800.00', '0.00', 0, 0, 'img2/mushroom4.png'),
(6, 2, 'CBM203', 'Mezaninne', '1', 3, 'Good for 10 persons', '1200.00', '1500.00', '2500.00', '0.00', 0, 0, 'img2/mezaninne1.png'),
(7, 2, 'CBM204', 'La Leona Cabana', '1', 3, 'Good for 25 persons', '1200.00', '1500.00', '2500.00', '0.00', 0, 0, 'img2/le%20leona%20cabana.png'),
(8, 2, 'CBM205', 'Duplex', '1', 3, 'Good for 15 persons', '1200.00', '1500.00', '2500.00', '0.00', 0, 0, 'img2/mushroom1.png'),
(9, 3, 'CBM301', 'Alfonso Pavilion Hall', '1', 1, '150 - 200 persons (for 5 hours)', '6000.00', '500.00', '5.00', '250.00', 200, 0, 'images/hall2.png'),
(10, 3, 'CBM302', 'Kristina Function Hall', '1', 1, '150 - 200 persons (for 4 hours)', '12000.00', '1000.00', '4.00', '280.00', 200, 0, 'images/hall1.png'),
(11, 4, '1', 'sample1', '1', 1, 'good for twenty', '150.00', '200.00', '0.00', '0.00', 0, 0, 'images/pool.png'),
(12, 4, '12', 'sample2', '1', 1, 'Good for 10 persons', '80.00', '160.00', '0.00', '0.00', 0, 0, 'images/gallery19.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
