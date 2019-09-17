-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: db5000049373.hosting-data.io
-- Generation Time: Jun 09, 2019 at 08:44 PM
-- Server version: 5.7.25-log
-- PHP Version: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfsantennas`
--
CREATE DATABASE IF NOT EXISTS `rfsantennas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rfsantennas`;

-- --------------------------------------------------------

--
-- Table structure for table `About`
--

CREATE TABLE `About` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `About`
--

INSERT INTO `About` (`id`, `body`) VALUES
(1, 'Radio Frequency Systems, Copyright 2019 (c)');

-- --------------------------------------------------------

--
-- Table structure for table `Help`
--

CREATE TABLE `Help` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `imagePath` text NOT NULL,
  `body1` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Help`
--

INSERT INTO `Help` (`id`, `body`, `imagePath`, `body1`) VALUES
(1, 'For any comments, please contact: rani.makke@rfsworld.com', 'http://cmgme.com/RFS/images/help/1557302343.jpg', 'Search Guidelines:\r\n\r\n1) If the total number of ports is defined, them the search algorithm shows only the antennas with exact number of ports as defined.\r\n\r\n2) If the total number of ports is NOT defined,\r\n    but the numbers of low band (<1GHz) ports\r\n    and other bands (1-3GHz or > 3GHz) ports are defined,\r\n    then the search algorithm will consider the low band ports as an exact requirement, and the other bands ports as the minimum \r\n    requirement (it means the search result may provide results with higher number of ports (in the higher bands) than the defined one.');

-- --------------------------------------------------------

--
-- Table structure for table `antennafamily`
--

CREATE TABLE `antennafamily` (
  `antennaFamilyId` int(11) NOT NULL,
  `antennaFamilyName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antennafamily`
--

INSERT INTO `antennafamily` (`antennaFamilyId`, `antennaFamilyName`) VALUES
(63, 'Small Size'),
(64, 'High Band'),
(65, 'TDD'),
(66, 'Low Band'),
(67, 'Multi-Beam'),
(68, 'Multi-Band'),
(69, 'Hybrid FDD/TDD'),
(71, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `antennas`
--

CREATE TABLE `antennas` (
  `antennaId` int(11) NOT NULL,
  `xxx` text,
  `Total Number of RF ports` text,
  `Number of Ports (<1GHz)` text,
  `Number of Ports (1-3GHz)` text,
  `Number of Ports (>3GHz )` text,
  `Number of Calibration ports` text,
  `Product Family` int(11) DEFAULT NULL,
  `Antenna Type` int(11) DEFAULT NULL,
  `Short description` text,
  `Gain (<1GHz) [dBi]` text,
  `Gain (1-3GHz) [dBi]` text,
  `Gain (>3GHz) [dBi]` text,
  `Typical HBW @3dB [deg]` text,
  `Polarization` text,
  `Internal Diplexing` text,
  `Antenna size category [m]` text,
  `Connectors type` text,
  `Electrical Tilt` text,
  `Tilt range [deg]` text,
  `RET Position` text,
  `RET family` text,
  `Number of Columns (<1GHz)` text,
  `Number of Columns (1-3GHz)` text,
  `Number of Columns (>3GHz)` text,
  `Antenna Height (mm)` text,
  `Antenna Width (mm)` text,
  `Antenna Depth (mm)` text,
  `Antenna Weight [Kg]` text,
  `Packing dimensions (HxWxD) [mm]` text,
  `Shipping weight [Kg]` text,
  `Country of Origin` text,
  `Link to product datasheet` text,
  `Comments` text,
  `Product Status` text,
  `Model Name (model number+specifics)` text,
  `SAP Number` text,
  `DR0 date` date DEFAULT NULL,
  `DR1 date` date DEFAULT NULL,
  `DR2 date` date DEFAULT NULL,
  `DR3 date` date DEFAULT NULL,
  `DR4 date` date DEFAULT NULL,
  `DR5 date` date DEFAULT NULL,
  `DR6 date` date DEFAULT NULL,
  `Standard Cost [RMB]` float DEFAULT NULL,
  `Standard Cost [USD]` float DEFAULT NULL,
  `Standard Cost [EUR]` float DEFAULT NULL,
  `MSP [RMB]` float DEFAULT NULL,
  `MSP [USD]` float DEFAULT NULL,
  `MSP [EUR]` float DEFAULT NULL,
  `SVM [%]` float DEFAULT NULL,
  `Key Changes` text,
  `Date of last update` date DEFAULT NULL,
  `ODM or in-house` text,
  `Internal comments` text,
  `PLM Owner` text,
  `Product Segment` text,
  `Visible to PLM` text,
  `Visible to B&P` text,
  `Visible to Sales` text,
  `Visible to Customer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antennas`
--

INSERT INTO `antennas` (`antennaId`, `xxx`, `Total Number of RF ports`, `Number of Ports (<1GHz)`, `Number of Ports (1-3GHz)`, `Number of Ports (>3GHz )`, `Number of Calibration ports`, `Product Family`, `Antenna Type`, `Short description`, `Gain (<1GHz) [dBi]`, `Gain (1-3GHz) [dBi]`, `Gain (>3GHz) [dBi]`, `Typical HBW @3dB [deg]`, `Polarization`, `Internal Diplexing`, `Antenna size category [m]`, `Connectors type`, `Electrical Tilt`, `Tilt range [deg]`, `RET Position`, `RET family`, `Number of Columns (<1GHz)`, `Number of Columns (1-3GHz)`, `Number of Columns (>3GHz)`, `Antenna Height (mm)`, `Antenna Width (mm)`, `Antenna Depth (mm)`, `Antenna Weight [Kg]`, `Packing dimensions (HxWxD) [mm]`, `Shipping weight [Kg]`, `Country of Origin`, `Link to product datasheet`, `Comments`, `Product Status`, `Model Name (model number+specifics)`, `SAP Number`, `DR0 date`, `DR1 date`, `DR2 date`, `DR3 date`, `DR4 date`, `DR5 date`, `DR6 date`, `Standard Cost [RMB]`, `Standard Cost [USD]`, `Standard Cost [EUR]`, `MSP [RMB]`, `MSP [USD]`, `MSP [EUR]`, `SVM [%]`, `Key Changes`, `Date of last update`, `ODM or in-house`, `Internal comments`, `PLM Owner`, `Product Segment`, `Visible to PLM`, `Visible to B&P`, `Visible to Sales`, `Visible to Customer`) VALUES
(696, 'APXVL06-C-A20', '2', '0', '2', '0', '', 63, 67, 'Panel, 2-Ports, High-band, 65deg, 0.6m, 7-16, External RET', '', '15.5', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', '5-18', 'Semi-External', 'A20', '', '1', '', '609', '175', '110', '8', '760 x 275 x 275', '9', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVL06-C-A20', '', '', '', '3', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', 'jsfh khsf kjhf khasd khs aklkjhad lkhad lj', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'Yes'),
(697, 'APX18-206516S-CT0', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, FET', '', '18.6', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'FET', 'T0', '', '', '', '1', '', '1349', '169', '80', '11.3', '1464 x 251 x 203', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX18-206516S-CT0', '', '', '', '4', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'Yes'),
(698, 'APX18-206516S-CT6', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, FET', '', '18.6', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'FET', 'T6', '', '', '', '1', '', '1349', '169', '80', '11.3', '1464 x 251 x 203', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX18-206516S-CT6', '', '', '', '5', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'Yes'),
(699, 'APXV18-209014-C', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 90deg, 1.3m, 7-16, VET', '', '16.5', '', '90', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '1', '', '1349', '169', '80', '11.3', '1520 x 260 x 200', '15.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-209014-C.pdf', '', '', '', '6', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(700, 'APXV18-209014-C-A20', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 90deg, 1.3m, 7-16, External RET', '', '16.5', '', '90', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '1', '', '1349', '169', '80', '11.3', '1520 x 260 x 200', '15.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-209014-C-A20', '', '', '', '7', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(701, 'APXV18-209015-C-A20', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 90deg, 1.9m, 7-16, External RET', '', '17.9', '', '90', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '', '1', '', '1850', '169', '80', '14.3', '2020 x 260 x 200', '17.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-209015-C-A20', '', '', '', '8', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(702, 'APXVR13S-C', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '1', '', '1360', '163', '105', '9.5', '1460 x 250 x 210', '11.4', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVR13S-C.pdf', '', '', '', '9', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(703, 'APXV18-206513T-C', '2', '0', '2', '0', '', 63, 67, 'Panel, 2-Ports, High-band, 65deg, 0.7m,7-16, VET', '', '15.4', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', '0-10', '', '', '', '1', '', '700', '169', '80', '8.8', '860 x 260 x 200', '12', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-206513T-C.pdf', '', '', '', '10', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(704, 'APXV18-206513T-C-A20', '2', '0', '2', '0', '', 63, 67, 'Panel, 2-Ports, High-band, 65deg, 0.7m,7-16, External RET', '', '15.4', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', '0-10', 'External', 'A20', '', '1', '', '700', '169', '80', '8.8', '860 x 260 x 200', '12', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206513T-C-A20', '', '', '', '11', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(705, 'APXV18-206513S-C', '2', '0', '2', '0', '', 63, 67, 'Panel, 2-Ports, High-band, 65deg, 0.7m,7-16, VET', '', '15.1', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', '2-12', '', '', '', '1', '', '700', '169', '80', '8.6', '860 x 260 x 200', '11.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206513S-C', '', '', '', '12', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(706, 'APXV18-203219-C', '2', '0', '2', '0', '', 64, 69, 'Panel, 2-Ports, High-band, 32deg, 1.3m,7-16, VET', '', '21', '', '32', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '1', '', '1375', '288', '118', '19', '1485 x 380 x 330', '19.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-203219-C.pdf', '', '', '', '13', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(707, 'APXV18-203219-C-A20', '2', '0', '2', '0', '', 64, 69, 'Panel, 2-Ports, High-band, 32deg, 1.3m,7-16, External RET', '', '21', '', '32', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '1', '', '1375', '288', '118', '20', '1534 x 364 x 314', '22', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-203219-C-A20', '', '', '', '14', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(708, 'APXV18-206516H-C-A20', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, External RET', '', '18.1', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '1', '', '1391', '175', '110', '10.4', '1469 x 267 x 229', '13.1', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206516H-C-A20', '', '', '', '15', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(709, 'APXV18-206516T-C', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '4-14', '', '', '', '1', '', '1391', '175', '110', '10.4', '1469 x 267 x 229', '13.1', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206516T-C', '', '', '', '16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(710, 'APXV18-206516H-C', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, VET', '', '18.1', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '1', '', '1391', '175', '110', '10.4', '1469 x 267 x 229', '13.1', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-206516H-C.pdf', '', '', '', '17', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(711, 'APXV18-206516S-C-A20', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, External RET', '', '18.4', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '1', '', '1349', '169', '80', '12.4', '1450 x 230 x 189', '15', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206516S-C-A20', '', '', '', '18', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(712, 'APXV18-206516S-C', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, VET', '', '18.4', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '1', '', '1349', '169', '80', '12.4', '1450 x 230 x 189', '15', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206516S-C', '', '', '', '19', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(713, 'APXV18-206517H-C', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.9m, 7-16, VET', '', '19', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', '', '', '', '1', '', '1910', '175', '110', '13.4', '2059 x 267 x 229', '16', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-206517H-C.pdf', '', '', '', '20', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(714, 'APXV18-206517S-C-A20', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.9m, 7-16, External RET', '', '18.8', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '', '1', '', '1953', '169', '80', '14.9', '1950 x 230 x 189', '20', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206517S-C-A20', '', '', '', '21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(715, 'APXL03S-CT3', '2', '0', '2', '0', '', 63, 67, 'Panel, 2-Ports, High-band, 65deg, 0.3m,7-16, FET', '', '11', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', 'T3', '', '', '', '1', '', '270', '158', '100', '1.9', '370 x 250 x 250', '2.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXL03S-CT3', '', '', '', '22', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(716, 'APXVL13S-C', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.4m, 7-16, VET', '', '18.1', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', '', '', '', '1', '', '1397', '175', '110', '9.1', '1541 x 270 x 231', '11.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVL13S-C.pdf', '', '', '', '23', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(717, 'APXVL13S-C-A20', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.4m, 7-16, External RET', '', '18.1', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', 'External', 'A20', '', '1', '', '1397', '175', '110', '9.1', '1541 x 270 x 231', '11.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVL13S-C.pdf', '', '', '', '24', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(718, 'APXV18-276516-C', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.4m, 7-16, VET', '', '18.6', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', '', '', '', '1', '', '1391', '175', '110', '10.4', '1469 x 267 x 229', '13.1', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-276516-C.pdf', '', '', '', '25', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(719, 'APXV18-276516-C-A20', '2', '0', '2', '0', '', 64, 68, 'Panel, 2-Ports, High-band, 65deg, 1.4m, 7-16, External RET', '', '18.6', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', 'External', 'A20', '', '1', '', '1391', '175', '110', '10.4', '1469 x 267 x 229', '13.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-276516-C-A20', '', '', '', '26', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(720, 'APXV23-276512-C', '2', '0', '2', '0', '', 63, 67, 'Panel, 2-Ports, High-band, 60deg, 0.5m,7-16, VET', '', '14.8', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', '0-10', '', '', '', '1', '', '560', '175', '110', '6.7', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV23-276512-C', '', '', '', '27', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(721, 'APXV23-276512-C-A20', '2', '0', '2', '0', '', 63, 67, 'Panel, 2-Ports, High-band, 60deg, 0.5m,7-16, External RET', '', '14.8', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', '0-10', 'External', 'A20', '', '1', '', '560', '175', '110', '6.7', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV23-276512-C', '', '', '', '28', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(722, 'AOXTXY10A_N-CT0', '2', '0', '0', '2', '', 65, 70, 'Omni, 2-Ports, High-band, 360deg, 0.95m,7-16, FET', '', '', '11', '360', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'FET', 'T0', '', '', '', '', '1', '948', '168', '168', '5', '1150 x 200 x 200', '6.1', 'China', 'Contact RFS representative', '', '', '', '29', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(723, 'APXVF13-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.3m, 7-16, External RET', '14.7', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '5-13', 'Semi-External', 'A20', '1', '', '', '1363', '368', '174', '18.8', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVF13-C-A20', '', '', '', '30', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(724, 'APXVF18-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.8m, 7-16, External RET', '16.3', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '2-12', 'Semi-External', 'A20', '1', '', '', '1828', '368', '174', '21.7', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVF18-C-A20', '', '', '', '31', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(725, 'APXVF24-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 7-16, External RET', '17', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'Semi-External', 'A20', '1', '', '', '2363', '368', '174', '26.4', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVF24-C-A20', '', '', '', '32', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(726, 'APXVB15S-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.5m, 7-16, VET', '15', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-15', '', '', '1', '', '', '1450', '315', '145', '20', '1810 x 415 x 240', '23', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB15S-C', '', '', '', '33', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(727, 'APXVB15S-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.5m, 7-16, External RET', '15', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-15', 'External', 'A20', '1', '', '', '1450', '315', '145', '20', '1810 x 415 x 240', '23', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB15S-C', '', '', '', '34', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(728, 'APXVB20S-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.8m, 7-16, VET', '15.5', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '1827', '315', '145', '22.5', '2180 x 415 x 240', '25.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB20S-C', '', '', '', '35', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(729, 'APXVB20S-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.8m, 7-16, External RET', '15.5', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '1827', '315', '145', '22.5', '2180 x 415 x 240', '25.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB20S-C', '', '', '', '36', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(730, 'APXVB26S-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 7-16, VET', '17', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-10', '', '', '1', '', '', '2440', '315', '145', '28.2', '2800 x 415 x 240', '32.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB26S-C', '', '', '', '37', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(731, 'APXVB26S-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 7-16, External RET', '17', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-10', 'External', 'A20', '1', '', '', '2440', '315', '145', '28.2', '2800 x 415 x 240', '32.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB26S-C', '', '', '', '38', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(732, 'APV86-906516-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, VET', '17.5', '', '', '65', 'V-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '2600', '328', '128', '19.1', '2700 x 370 x 245', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APV86-906516-C', '', '', '', '39', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(733, 'APXVE20F-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, VET', '16.8', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '2010', '270', '136', '20.3', '2335 x 380 x 230', '23.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE20F-C', '', '', '', '40', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(734, 'APXVE26-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, VET', '17.8', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '2570', '270', '136', '25.3', '2910 x 380 x 230', '30', 'China', 'http://www.rfsworld.com/dataxpress/Datasheets/?q=APXVE26-C', '', '', '', '41', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(735, 'APXV86-906515-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, External RET', '17.5', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '2080', '328', '128', '25.4', '2194 x 391 x 259', '\\', 'China', 'http://www.rfsworld.com/dataxpress/Datasheets/?q=APXV86-906515-C', '', '', '', '42', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(736, 'APXV86-906513L-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.3m, 7-16, VET', '15.2', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '1', '', '', '1350', '328', '128', '17.4', '1450 x 370 x 245', '19', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906513L-C', '', '', '', '43', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(737, 'APXV86-906513L-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.3m, 7-16, External RET', '15.2', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '1350', '328', '128', '17.4', '1450 x 370 x 245', '19', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906513L-C', '', '', '', '44', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(738, 'APXV86-906515-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, VET', '17.5', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '2080', '328', '128', '25.4', '2194 x 391 x 259', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906515-C', '', '', '', '45', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(739, 'APXV86-906516-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, External RET', '18', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '2600', '328', '128', '\\', '2700 x 370 x 245', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906516-C', '', '', '', '46', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(740, 'APXV86-906516-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, VET', '18', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '2600', '328', '128', '\\', '2700 x 370 x 245', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906516-C', '', '', '', '47', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(741, 'APXV86-909014-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 90deg, 2.0m, 7-16, VET', '15.3', '', '', '90', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '2080', '328', '128', '25.4', '2320 x 375 x 220', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-909014-C', '', '', '', '48', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(742, 'APXV86-909014-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 90deg, 2.0m, 7-16, VET', '15.3', '', '', '90', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '2080', '328', '128', '25.4', '2320 x 375 x 220', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-909014-C', '', '', '', '49', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(743, 'APXVE20-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, VET', '16.8', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '2010', '270', '136', '20.8', '2335 x 380 x 230', '24', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE20-C', '', '', '', '50', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(744, 'APXVE20-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, External RET', '16.8', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '2010', '270', '136', '20.8', '2335 x 380 x 230', '24', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE20-C', '', '', '', '51', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(745, 'APXVE13-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.5m, 7-16, VET', '15.7', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '1', '', '', '1460', '270', '136', '16.3', '1725x 380 x 230', '18.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE13-C', '', '', '', '52', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(746, 'APXVE13-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.5m, 7-16, External RET', '15.7', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '1460', '270', '136', '16.3', '1725x 380 x 230', '18.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE13-C', '', '', '', '53', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(747, 'APXVE26F-C', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, VET', '17.8', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', '', '', '1', '', '', '2570', '270', '136', '25.3', '2910 x 380 x 230', '29', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE26F-C', '', '', '', '54', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(748, 'APXVE26F-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, External RET', '17.8', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '2570', '270', '136', '25.3', '2910 x 380 x 230', '29', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE26F-C', '', '', '', '55', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(749, 'APXVE26-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, External RET', '17.8', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '', '', '2570', '270', '136', '25.3', '2910 x 380 x 230', '30', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE26-C', '', '', '', '56', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(750, 'APX16DWV-16DWVS-E-A20', '4', '0', '4', '0', '', 64, 68, 'Panel (2 Xpol antennas side by side in the same radome)l, 4-Ports, High-band, 65deg, 1.4m, 7-16, External RET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '2', '', '1420', '331', '80', '19', '1520 x 408 x 198', '24.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX16DWV-16DWVS-E-A20', '', '', '', '57', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(751, 'APX17DWV-17DWVS-E-A20', '4', '0', '4', '0', '', 64, 68, 'Panel (2 Xpol antennas side by side in the same radome)l, 4-Ports, High-band, 65deg, 2.0m, 7-16, External RET', '', '19', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '', '2', '', '1925', '331', '80', '15.5', '2015 x 380 x 197', '31', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX17DWV-17DWVS-E-A20', '', '', '', '58', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(752, 'APXVLL06-C-A20', '4', '0', '4', '0', '', 63, 67, 'Panel, 4-Ports, High-band, 65deg, 0.6m,7-16, External RET', '', '15.3', '', '65', 'X-POL', 'No', '< 0.9m', '7-16', 'VET', '5-18', 'Semi-External', 'A20', '', '1', '', '609', '288', '118', '13', '709 x 388 x 318', '15', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLL06-C-A20', '', '', '', '59', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(753, 'APXVRR13-C', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '2', '', '1391', '350', '110', '17.9', '1492 x 435 x 243', '22.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13-C', '', '', '', '60', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(754, 'APXVRR13-C-A20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '2', '', '1391', '350', '110', '17.9', '1492 x 435 x 243', '22.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13-C', '', '', '', '61', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(755, 'APXVRR13-C-NA20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'NA20', '', '2', '', '1391', '350', '110', '17.9', '1492 x 435 x 243', '22.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13-C', '', '', '', '62', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(756, 'APXVRR13T-C', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '', '17.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '2', '', '1282', '288', '118', '18', '1480 x 366 x 274', '22', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13T-C', '', '', '', '63', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(757, 'APXVRR13T-C-A20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, External RET', '', '17.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '2', '', '1282', '288', '118', '19', '1480 x 366 x 274', '23', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13T-C', '', '', '', '64', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(758, 'APXVRR13T2-C', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '', '17.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '2', '', '1282', '288', '118', '18', '1480 x 366 x 274', '22', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13T2-C', '', '', '', '65', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(759, 'APXVRR13T2-C-A20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '', '17.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '2', '', '1282', '288', '118', '18', '1480 x 366 x 274', '22', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13T2-C', '', '', '', '66', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(760, 'APXV9RR13-C-NA20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 90deg, 1.3m,7-16, External RET', '', '16.5', '', '90', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-9', 'External', 'NA20', '', '2', '', '1349', '356', '80', '23', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9RR13-C-NA20', '', '', '', '67', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(761, 'APXV3RR13A-C', '4', '0', '4', '0', '', 67, 72, 'Panel, 4-Ports, High-band, 33deg, 1.3m,7-16, VET', '', '20', '', '32', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '2', '', '1360', '400', '160', '29', '1520 x 520 x 320', '33.7', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3RR13A-C', '', '', '', '68', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(762, 'APXV3RR13A-C-A20', '4', '0', '4', '0', '', 67, 72, 'Panel, 4-Ports, High-band, 33deg, 1.3m,7-16, External RET', '', '20', '', '32', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '2', '', '1360', '400', '160', '30.1', '1520 x 520 x 320', '33.7', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3RR13A-C-A20', '', '', '', '69', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(763, 'APXVRR20-C', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.9m,7-16, VET', '', '18.7', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', '', '', '', '2', '', '1911', '350', '110', '23.4', '2059 x 435 x 243', '26', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR20-C', '', '', '', '70', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(764, 'APXVRR20-C-A20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.9m,7-16, External RET', '', '18.7', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '', '2', '', '1911', '350', '110', '23.4', '2059 x 435 x 243', '26', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR20-C-A20', '', '', '', '71', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(765, 'APXV3RR13-C-A20', '4', '0', '4', '0', '', 67, 73, 'Panel, 4-Ports, High-band, 33deg, 1.3m,7-16, External RET', '', '20.2', '', '32', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '2', '', '1375', '576', '118', '31.8', '\\', '40.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3RR13-C-A20', '', '', '', '72', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(766, 'APXVLL13N-C', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, VET', '', '18.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', '', '', '', '2', '', '1375', '288', '118', '16.9', '1489 x 371 x 314', '20.4', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVLL13N-C.pdf', '', '', '', '73', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(767, 'APXVLL13N-C-NA20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '', '18.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', 'External', 'NA20', '', '2', '', '1375', '288', '118', '16.9', '1489 x 371 x 314', '20.4', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVLL13N-C.pdf', '', '', '', '74', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(768, 'APXVLL13N-C-A20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '', '18.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', 'External', 'A20', '', '2', '', '1375', '288', '118', '16.9', '1489 x 371 x 314', '20.4', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVLL13N-C.pdf', '', '', '', '75', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(769, 'APXVLL13N-S', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, VET', '', '18.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', '', '', '', '2', '', '1375', '288', '118', '16.9', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', '', '', '', '76', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(770, 'APXVLL13N-S-A20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '', '18.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', 'External', 'A20', '', '2', '', '1375', '288', '118', '16.9', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', '', '', '', '77', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(771, 'APXVLL13N-S-NA20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '', '17.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', 'External', 'NA20', '', '2', '', '1375', '288', '118', '16.9', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', '', '', '', '78', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(772, 'APXVLL13S-C', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, VET', '', '17.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '2-12', '', '', '', '2', '', '1290', '288', '118', '14.5', '1384 x 374 x 266', '17.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLL13S-C', '', '', '', '79', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(773, 'APXVLL13S-C-A20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '', '18.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '2-12', 'External', 'A20', '', '2', '', '1290', '288', '118', '14.5', '1384 x 374 x 266', '17.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLL13S-C', '', '', '', '80', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(774, 'APXVLL13N_43-S', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, VET', '', '18.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', '', '', '', '2', '', '1375', '288', '118', '16.9', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', 'Technically approved - under industrialization preparation. Orderalble now', '', '', '81', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(775, 'APXVLL13N_43-S-A20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '', '18.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-12', 'External', 'A20', '', '2', '', '1375', '288', '118', '16.9', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', 'Technically approved - under industrialization preparation. Orderalble now', '', '', '82', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No');
INSERT INTO `antennas` (`antennaId`, `xxx`, `Total Number of RF ports`, `Number of Ports (<1GHz)`, `Number of Ports (1-3GHz)`, `Number of Ports (>3GHz )`, `Number of Calibration ports`, `Product Family`, `Antenna Type`, `Short description`, `Gain (<1GHz) [dBi]`, `Gain (1-3GHz) [dBi]`, `Gain (>3GHz) [dBi]`, `Typical HBW @3dB [deg]`, `Polarization`, `Internal Diplexing`, `Antenna size category [m]`, `Connectors type`, `Electrical Tilt`, `Tilt range [deg]`, `RET Position`, `RET family`, `Number of Columns (<1GHz)`, `Number of Columns (1-3GHz)`, `Number of Columns (>3GHz)`, `Antenna Height (mm)`, `Antenna Width (mm)`, `Antenna Depth (mm)`, `Antenna Weight [Kg]`, `Packing dimensions (HxWxD) [mm]`, `Shipping weight [Kg]`, `Country of Origin`, `Link to product datasheet`, `Comments`, `Product Status`, `Model Name (model number+specifics)`, `SAP Number`, `DR0 date`, `DR1 date`, `DR2 date`, `DR3 date`, `DR4 date`, `DR5 date`, `DR6 date`, `Standard Cost [RMB]`, `Standard Cost [USD]`, `Standard Cost [EUR]`, `MSP [RMB]`, `MSP [USD]`, `MSP [EUR]`, `SVM [%]`, `Key Changes`, `Date of last update`, `ODM or in-house`, `Internal comments`, `PLM Owner`, `Product Segment`, `Visible to PLM`, `Visible to B&P`, `Visible to Sales`, `Visible to Customer`) VALUES
(776, 'APXVWW12-A-I20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, Multi-band, 65deg, 1.2m, 7-16, VET', '', '16.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '-5 to +5', 'Internal', 'I20', '', '2', '', '1218', '280', '175', '17', '1315 x 367 x 360', '19.7', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVWW12-A-I20', 'Technically approved - under industrialization preparation. Orderalble now', '', '', '83', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(777, 'APXVWW18-A-I20', '4', '0', '4', '0', '', 64, 68, 'Panel, 4-Ports, High-band, 65deg, 1.8m,4.3-10, Integrated RET', '', '17.7', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '-5 to +6', 'Internal', 'I20', '', '2', '', '1862', '280', '175', '27.4', '2015 x 367 x 360', '27.2', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVWW18-A-I20', '', '', '', '84', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(778, 'APXVAR18_43-C-NA20', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 1.8m,4.3-10, External RET', '15', '18.9', '', '65', 'X-POL', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '5-19/2-12', 'Semi-External', 'NA20', '1', '1', '', '1726', '405', '228', '22', '1835 x 485 x 395', '31.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAR18_43-C-NA20', '', '', '', '85', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(779, 'APXVAA18_43-U-A20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 1.7m, 4.3-10, External RET', '14.5', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '0-14/0-14', 'Semi-External', 'A20', '2', '', '', '1745', '609', '215', '46', '1875 x 735 x 375', '54.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAA18_43-U-A20', '', '', '', '86', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(780, 'APXVAA24_43-U-A20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.4m, 4.3-10, External RET', '15.6', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '0-11', 'Semi-External', 'A20', '2', '', '', '2435', '609', '215', '56.5', '2565 x 735 x 375', '67', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAA24_43-U-A20', '', '', '', '87', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(781, 'APXVBL20X_43-C-M20', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.0m,4.3-10, Integrated RET', '15.6', '18.2', '', '65', 'X-POL', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '0-10 / 2-12', 'Internal', 'M20', '1', '1', '', '2050', '340', '200', '26.5', '2182 x 441 x 411', '29.5', 'China', 'Contact RFS representative', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '88', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(782, 'APXVBL26X_43-C-M20', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '17', '18.1', '', '65', 'X-POL', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10 / 2-12', 'Internal', 'M20', '1', '1', '', '2769', '340', '200', '29.5', '2872 x 441 x 411', '33.5', 'China', 'Contact RFS representative', '', '', '', '89', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(783, 'APXVBL15S-C-A20', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 1.5m,7-16, External RET', '15', '17.4', '', '65', 'X-POL', 'No', '1.5m - 2.1m', '7-16', 'VET', '2-14/2-12', 'External', 'A20', '1', '1', '', '1545', '335', '165', '18', '1830 x 435 x 270', '26', 'China', 'Contact RFS representative', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '90', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(784, 'APXVBB15X_43-C-I20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 1.5m,4.3-10, Integrated RET', '14.5', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '4.3-10', 'VET', '0-15/0-15', 'Internal', 'I20', '2', '', '', '1495', '500', '215', '27.3', '1620 x 546 x 390', '33.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB15X_43-C-I20', '', '', '', '91', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(785, 'APXVBB20X2-C-I20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.0m,7-16, Integrated RET', '16', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10/0-10', 'Internal', 'I20', '2', '', '', '2064', '499', '215', '34.9', '2243 x 564 x 415', '42.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB20X2-C-I20', '', '', '', '92', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(786, 'APXVBB20X2_43-C-I20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.0m,4.3-10, Integrated RET', '16', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '0-10/0-10', 'Internal', 'I20', '2', '', '', '2064', '499', '215', '34.9', '2243 x 564 x 415', '42.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB20X2_43-C-I20', '', '', '', '93', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(787, 'APXVBB20X3_43-C-I20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.0m,4.3-10, Integrated RET', '16.5', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '0-10/0-10', 'Internal', 'I20', '2', '', '', '2064', '499', '215', '34.9', '2243 x 564 x 415', '42.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB20X3_43-C-I20', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '94', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(788, 'APXVBB26X2-C-I20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, Integrated RET', '17', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', 'Internal', 'I20', '2', '', '', '2612', '500', '215', '40.6', '2750 x 560 x 411', '49.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB26X2-C-I20', '', '', '', '95', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(789, 'APXVBB26X2_43-C-I20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.6m,4.3-10, Integrated RET', '17', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10/0-10', 'Internal', 'I20', '2', '', '', '2612', '500', '215', '40.6', '2750 x 560 x 411', '49.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB26X2_43-C-I20', '', '', '', '96', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(790, 'APXVBB26X3_43-C-I20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.6m,4.3-10, Integrated RET', '17.1', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10 / 0-10', 'Internal', 'I20', '2', '', '', '2612', '500', '215', '40.6', '2750 x 560 x 411', '49.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB26X3_43-C-I20', '', '', '', '97', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(791, 'APXV9R13B-C', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 1.4m,7-16, VET', '14', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/0-10', '', '', '1', '1', '', '1403', '300', '161', '21.4', '\\', '\\', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV9R13B-C.pdf', '', '', '', '98', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(792, 'APXV9R13B-C-A20', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 1.4m,7-16, External RET', '14', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/0-10', 'External', 'A20', '1', '1', '', '1403', '300', '161', '21.4', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9R13B-C-A20', '', '', '', '99', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(793, 'APXV9R20B-C', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.1m,7-16, VET', '16.2', '19', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', '', '', '1', '1', '', '2183', '300', '161', '32.4', '2345 x 398 x 330', '36', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV9R20B-C.pdf', '', '', '', '100', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(794, 'APXV9R20-C', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.1m,7-16, VET', '15.6', '18.8', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', '', '', '1', '1', '', '2183', '300', '161', '32.4', '2345 x 398 x 330', '39', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV9R20-C.pdf', '', '', '', '101', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(795, 'APXV9R20B-C-A20', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.1m,7-16, External RET', '16.2', '19', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', 'External', 'A20', '1', '1', '', '2183', '300', '161', '32.4', '2345 x 398 x 330', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9R20B-C-A20', '', '', '', '102', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(796, 'APXV9R26B-C', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.7m,7-16, VET', '17', '19.3', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', '', '', '1', '1', '', '2703', '300', '161', '40.4', '2869 x 398 x 330', '45', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV9R26B-C.pdf', '', '', '', '103', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(797, 'APXV9R26B-C-A20', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.7m,7-16, External RET', '17', '19.3', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', 'External', 'A20', '1', '1', '', '2703', '300', '161', '40.4', '2869 x 398 x 330', '45', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9R26B-C-A20', '', '', '', '104', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(798, 'APXVER26-C', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.7m,7-16, External RET', '16.2', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', '', '', '1', '1', '', '2659', '280', '175', '28.9', '2788 x 371 x 338', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVER26-C-NA20', '', '', '', '105', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(799, 'APXVER26-C-NA20', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 2.7m,7-16, External RET', '16.2', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', 'External', 'NA20', '1', '1', '', '2659', '280', '175', '28.9', '2788 x 371 x 338', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVER26-C-NA20', '', '', '', '106', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(800, 'APXVEE26-C', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, VET', '17.4', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', '', '', '2', '', '', '2638', '461', '174', '48', '2816 x 565 x 345', '54', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVEE26-C.pdf', '', '', '', '107', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(801, 'APXVEE26-C-NA20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, External RET', '17.4', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'External', 'NA20', '2', '', '', '2638', '461', '174', '48', '2816 x 565 x 345', '54', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVEE26-C', '', '', '', '108', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(802, 'APXVEE26-C-A20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, External RET', '17.4', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '2', '', '', '2638', '461', '174', '48', '2816 x 565 x 345', '54', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVEE26-C', '', '', '', '109', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(803, 'APXVEE26S-C-A20', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, External RET', '17.8', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', 'External', 'A20', '2', '', '', '2565', '530', '130', '51', '2895 x 635 x 280', '57', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVEE26S-C', '', '', '', '110', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(804, 'APXVEE26S-C', '4', '4', '0', '0', '', 66, 71, 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, VET', '17.8', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10', '', '', '2', '', '', '2565', '530', '130', '50', '2895 x 635 x 280', '56', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVEE26S-C', '', '', '', '111', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(805, 'APXV3EE20A-C', '4', '4', '0', '0', '', 67, 72, 'Panel, 4-Ports, Low-band, 33deg, 2.1m,7-16, VET', '18', '', '', '32', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', '', '', '2', '', '', '2100', '600', '150', '45.6', '2355 x 740 x 340', '59', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3EE20A-C', '', '', '', '112', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(806, 'APXV3EE20A-C-A20', '4', '4', '0', '0', '', 67, 72, 'Panel, 4-Ports, Low-band, 33deg, 2.1m,7-16, External RET', '18', '', '', '32', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '2', '', '', '2100', '600', '150', '45.6', '2355 x 740 x 340', '59', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3EE20A-C-A20', '', '', '', '113', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(807, 'APX13GV-15DWVB-C', '4', '2', '2', '0', '', 68, 74, 'Panel, 4-Ports, Multi-band, 65deg, 1.3m,7-16, VET', '14.4', '17', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/2-10', '', '', '1', '1', '', '1349', '328', '128', '20.8', '1520 x 400 x 260', '26.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX13GV-15DWVB-C', '', '', '', '114', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(808, 'AOXVBLL06_43-AT0', '6', '2', '4', '0', '', 63, 75, 'Panel, 6-Ports, Multi-band, 360deg, 0.6m,4.3-10, Manual VET', '6.4', '9.7', '', '360', 'X-Pol', 'No', '< 0.9m', '4.3-10', 'VET', '0/5-18 in high band', '', '', '1', '2', '', '564', '380', '380', '17.5', '465 x 470 x 815', '21.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=AOXVBLL06_43-A-A20', '', '', '', '115', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(809, 'AOXVBLL06_43-A-A20', '6', '2', '4', '0', '', 63, 75, 'Panel, 6-Ports, Multi-band, 360deg, 0.6m,4.3-10, External RET', '6.4', '9.7', '', '360', 'X-Pol', 'No', '< 0.9m', '4.3-10', 'VET', '0/5-18 in high band', 'External', 'A20', '1', '2', '', '564', '380', '380', '19', '465 x 470 x 815', '23', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=AOXVBLL06_43-A-A20', '', '', '', '116', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(810, 'APXVRLL13-C', '6', '0', '6', '0', '', 64, 68, 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/0-12', '', '', '', '3', '', '1400', '461', '132', '27.4', '1516 x 554 x 330', '32', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVRLL13-C.pdf', '', '', '', '117', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(811, 'APXVRLL13-C-A20', '6', '0', '6', '0', '', 64, 68, 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, External RET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/0-12', 'External', 'A20', '', '3', '', '1400', '461', '132', '27.4', '1516 x 554 x 330', '32', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVRLL13-C.pdf', '', '', '', '118', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(812, 'APXVRLL13-C-NA20', '6', '0', '6', '0', '', 64, 68, 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, External RET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/0-12', 'External', 'NA20', '', '3', '', '1400', '461', '132', '27.4', '1516 x 554 x 330', '32', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVRLL13-C.pdf', '', '', '', '119', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(813, 'APXVRLL13K2-C', '6', '0', '6', '0', '', 64, 68, 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/0-12', '', '', '', '3', '', '1400', '461', '132', '27.4', '1516 x 554 x 330', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRLL13K2-C', '', '', '', '120', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(814, 'APXVRLL13K2-C-A20', '6', '0', '6', '0', '', 64, 68, 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/0-12', 'External', 'A20', '', '3', '', '1400', '461', '132', '27.4', '1516 x 554 x 330', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRLL13K2-C', '', '', '', '121', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(815, 'APXVLLL15S-C-A20', '6', '0', '6', '0', '', 64, 68, 'Panel, 6-Ports, High-band, 65deg, 1.5m,7-16, VET', '', '17.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10/0-10/0-10', 'External', 'A20', '', '3', '', '1448', '420', '100', '27.1', '1820 x 530 x 260', '38.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLLL15S-C-A20', '', '', '', '122', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(816, 'APXVARR18_43-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,4.3-10, External RET', '15.3', '18.3', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '0-12/0-10/0-10', 'Semi-External', 'NA20', '1', '2', '', '1829', '500', '216', '45', '1975 x 560 x 411', '51.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR18_43-C-NA20', '', '', '', '123', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(817, 'APXVARR18-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, External RET', '15.3', '18.3', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-12/0-10/0-10', 'Semi-External', 'NA20', '1', '2', '', '1829', '500', '216', '45', '1975 x 560 x 411', '51.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR18-C-NA20', '', '', '', '124', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(818, 'APXVARR24_43-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,4.3-10, External RET', '15.7', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10/0-10/0-10', 'Semi-External', 'NA20', '1', '2', '', '2438', '500', '216', '52', '2590 x 560 x 411', '60.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR24_43-C-NA20', '', '', '', '125', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(819, 'APXVARR24-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,7-16, External RET', '15.7', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/0-10/0-10', 'Semi-External', 'NA20', '1', '2', '', '2438', '500', '216', '52', '2590 x 560 x 411', '60.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR24-C-NA20', '', '', '', '126', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(820, 'APXVARR15_43-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.5m,4.3-10, External RET', '14.7', '19.1', '', '65', 'X-POL', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '5-20 / 2-12 / 2-12', 'Semi-External', 'NA20', '1', '2', '', '1524', '500', '216', '31.1', '1640 x 560 x 410', '36.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR15_43-C-NA20', '', '', '', '127', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(821, 'APXVBLL06-C', '6', '2', '4', '0', '', 63, 67, 'Panel, 6-Ports, Multi-band, 65deg, 0.6m, 7-16, VET', '10', '14', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', '5/5-18', '', '', '1', '2', '', '609', '340', '200', '11', '809 x 441 x 411', '12', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL06-C-A20', 'Technically approved - under industrialization preparation. Orderalble now', '', '', '128', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(822, 'APXVBLL06-C-A20', '6', '2', '4', '0', '', 63, 67, 'Panel, 6-Ports, Multi-band, 65deg, 0.6m, 7-16, VET', '10', '14', '', '65', 'X-Pol', 'No', '< 0.9m', '7-16', 'VET', '5/5-18', 'Semi-External', 'A20', '1', '2', '', '609', '340', '200', '11', '809 x 441 x 411', '12', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL06-C-A20', 'Technically approved - under industrialization preparation. Orderalble now', '', '', '129', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(823, 'APXVBLL15X-C-i20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.4m,7-16, Integrated RET', '14', '18.2', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '2-15/2-12', 'Internal', 'I20', '1', '2', '', '1390', '340', '200', '26.4', '1542 x 444 x 413', '30', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL15X-C-i20', '', '', '', '130', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(824, 'APXVBLL15XT-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.4m,7-16, Integrated RET', '14', '18.2', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '3-16/5-16', 'Internal', 'I20', '1', '2', '', '1390', '340', '200', '26.4', '1542 x 444 x 413', '30', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL15XT-C-I20', '', '', '', '131', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(825, 'APXVBLL15EX-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.4m,7-16, Integrated RET', '13', '17.2', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '2-15/2-12', 'Internal', 'I20', '1', '2', '', '1390', '340', '200', '21', '1542 x 444 x 413', '25', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL15EX-C-I20', '', '', '', '132', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(826, 'APXVBLL15EX_43-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.4m,4.3-10, Integrated RET', '13.9', '17.4', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '4.3-10', 'VET', '2-15/2-12/2-12', 'Internal', 'I20', '1', '2', '', '1390', '340', '200', '21', '1542 x 444 x 413', '25', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL15EX_43-C-I20', '', '', '', '133', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(827, 'APXVBLL20X2-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '15.6', '17.9', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10/2-10', 'Internal', 'I20', '1', '2', '', '2049', '340', '200', '30.7', '2184 x 444 x 413', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL20X2-C-I20', '', '', '', '134', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(828, 'APXVBLL20EX-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '15.8', '19', '', '65', 'X-POL', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10 / 2-12 / 2-12', 'Internal', 'I20', '1', '2', '', '2049', '340', '200', '29', '2184 x 441 x 411', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL20EX-C-I20', '', '', '', '135', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(829, 'APXVBLL26X-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.7m,7-16, Integrated RET', '16.9', '17.6', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10/2-12/2-12', 'Internal', 'I20', '1', '2', '', '2769', '340', '200', '37.4', '2903 x 444 x 413', '41', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL26X-C-i20', '', '', '', '136', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(830, 'APXVBLL26X_43-C-I20B', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.7m,4.3-10, Integrated RET', '16.9', '17.6', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10/2-12/2-12', 'Internal', 'I20B', '1', '2', '', '2769', '340', '200', '37.4', '2903 x 444 x 413', '41', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL26X_43-C-I20B', '', '', '', '137', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(831, 'APXVBLL26EX-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.8m,7-16, Integrated RET', '17', '18.3', '', '65', 'X-POL', 'No', '>= 2.1m', '7-16', 'VET', '0-10 / 2-12 / 2-12', 'Internal', 'I20', '1', '2', '', '2769', '340', '200', '32', '2874 x 444 x 413', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL26EX-C-I20', '', '', '', '138', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(832, 'APXVBLL26EX_43-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.8m,4.3-10, Integrated RET', '17', '18.3', '', '65', 'X-POL', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10 / 2-12 / 2-12', 'Internal', 'I20', '1', '2', '', '2769', '340', '200', '32', '2874 x 444 x 413', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL26EX_43-C-I20', '', '', '', '139', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(833, 'APXVFRR12X-C-I20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.2m,7-16, Integrated RET', '13.3', '16.3', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-8', 'Internal', 'I20', '1', '2', '', '1220', '299', '200', '21.3', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFRR12X-C-I20', '', '', '', '140', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(834, 'APXVFWW12X-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.2m,7-16, Semi-External RET', '13.6', '17.2', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '2-10/0-10', 'Semi-External', 'NA20', '1', '2', '', '1220', '300', '200', '23.4', '1410 x 384 x 379', '27', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFWW12X-C-NA20', '', '', '', '141', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(835, 'APXVFWW18X-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, Semi-External RET', '15.1', '18.3', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '1-10/0-10', 'Semi-External', 'NA20', '1', '2', '', '1829', '300', '200', '32.4', '2020 x 384 x 379', '38', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFWW18X-C-NA20', '', '', '', '142', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(836, 'APXVFWW24X2-C-I20B', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,7-16, Integrated RET', '16.5', '18.6', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'Internal', 'I20', '1', '2', '', '2396', '370', '206', '39.4', '2525 x 450 x 400', '45', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFWW24X2-C-I20B', '', '', '', '143', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(837, 'APXVFWW24X-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,7-16, External RET', '16', '18.3', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'Semi-External', 'NA20', '1', '2', '', '2438', '300', '200', '36.4', '2438 x 384 x 379', '43', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFWW24X-C-NA20', '', '', '', '144', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(838, 'AOXVFRR06_43-A-A20', '6', '2', '4', '0', '', 63, 75, 'Omni, 6-Ports, Multi-band, 360deg, 0.6m,4.3-10, External RET', '5.5', '8.4', '', '360', 'X-Pol', 'No', '< 0.9m', '4.3-10', 'VET', '0-16', 'External', 'A20', '1', '2', '', '532', '442', '442', '17.5', '840 x 540 x 520', '21.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=AOXVFRR06_43', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '145', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(839, 'AOXVFRR06_43-AT0', '6', '2', '4', '0', '', 63, 75, 'Omni, 6-Ports, Multi-band, 360deg, 0.6m,4.3-10, FET', '5.5', '8.4', '', '360', 'X-Pol', 'No', '< 0.9m', '4.3-10', 'FET', 'T0', '', '', '1', '2', '', '532', '442', '442', '16', '840 x 540 x 520', '20', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=AOXVFRR06_43', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '146', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(840, 'APXV4FRR18-C-I20B', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 45deg, 1.8m,7-16, Integrated RET', '16', '18.6', '', '45', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '2-14 / 2-12', 'Internal', 'I20B', '1', '2', '', '1840', '455', '199', '48', '1990 x 560 x 375', '56', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV4FRR18-C-I20B', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '147', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(841, 'APXV4FRR24-C-I20B', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 45deg, 2.4m,7-16, Integrated RET', '17.4', '19.3', '', '45', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', 'Internal', 'I20B', '1', '2', '', '2405', '455', '199', '56', '2590 x 560 x 375', '66', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV4FRR24-C-I20B', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '148', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(842, 'APXVNGL20D-C-i20', '6', '4', '2', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '14.5', '18.1', '', '65', 'X-Pol', 'In Low Band', '1.5m - 2.1m', '7-16', 'VET', '2-12/0-10/2-12', 'Internal', 'I20', '1', '1', '', '2049', '340', '200', '34.4', '2182 x 441 x 411', '44.1', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVNGL20D-C-i20', '', '', '', '149', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(843, 'APXVNGL26D-C-i20', '6', '4', '2', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, Integrated RET', '16', '18.1', '', '65', 'X-Pol', 'In Low Band', '>= 2.1m', '7-16', 'VET', '2-12/0-10/2-12', 'Internal', 'I20', '1', '1', '', '2769', '340', '200', '40.4', '\\', '48', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVNGL26D-C-i20', '', '', '', '150', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(844, 'APXVERR20X-C', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, VET', '16', '18.2', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '2-12', '', '', '1', '2', '', '2020', '303', '203', '31.4', '2196 x 398 x 385', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR20X-C', '', '', '', '151', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(845, 'APXVERR20X-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, External RET', '16', '18.2', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '2-12', 'Semi-External', 'NA20', '1', '2', '', '2020', '303', '203', '31.4', '2196 x 398 x 385', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR20X-C', '', '', '', '152', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(846, 'APXVERR26-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, External RET', '17.3', '17.6', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', 'External', 'NA20', '1', '2', '', '2659', '277', '175', '31.7', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26-C', '', '', '', '153', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(847, 'APXVERR26-C-A20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, External RET', '17.3', '17.6', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', 'External', 'A20', '1', '2', '', '2659', '277', '175', '31.7', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26-C', '', '', '', '154', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(848, 'APXVERR26-C', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, VET', '17.3', '17.6', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', '', '', '1', '2', '', '2659', '277', '175', '31.7', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26-C', '', '', '', '155', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(849, 'APXVERR26F-C', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, VET', '17.3', '17.6', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', '', '', '1', '2', '', '2659', '277', '175', '31.7', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26F-C', '', '', '', '156', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(850, 'APXVERR26F-C-A20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, External RET', '17.3', '17.6', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', 'External', 'A20', '1', '2', '', '2659', '277', '175', '31.7', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26F-C', '', '', '', '157', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(851, 'APXV9ERR18-C-A20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, External RET', '14', '17', '', '90', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '2', '', '1829', '302', '200', '31.6', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9ERR18-C-A20', '', '', '', '158', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No');
INSERT INTO `antennas` (`antennaId`, `xxx`, `Total Number of RF ports`, `Number of Ports (<1GHz)`, `Number of Ports (1-3GHz)`, `Number of Ports (>3GHz )`, `Number of Calibration ports`, `Product Family`, `Antenna Type`, `Short description`, `Gain (<1GHz) [dBi]`, `Gain (1-3GHz) [dBi]`, `Gain (>3GHz) [dBi]`, `Typical HBW @3dB [deg]`, `Polarization`, `Internal Diplexing`, `Antenna size category [m]`, `Connectors type`, `Electrical Tilt`, `Tilt range [deg]`, `RET Position`, `RET family`, `Number of Columns (<1GHz)`, `Number of Columns (1-3GHz)`, `Number of Columns (>3GHz)`, `Antenna Height (mm)`, `Antenna Width (mm)`, `Antenna Depth (mm)`, `Antenna Weight [Kg]`, `Packing dimensions (HxWxD) [mm]`, `Shipping weight [Kg]`, `Country of Origin`, `Link to product datasheet`, `Comments`, `Product Status`, `Model Name (model number+specifics)`, `SAP Number`, `DR0 date`, `DR1 date`, `DR2 date`, `DR3 date`, `DR4 date`, `DR5 date`, `DR6 date`, `Standard Cost [RMB]`, `Standard Cost [USD]`, `Standard Cost [EUR]`, `MSP [RMB]`, `MSP [USD]`, `MSP [EUR]`, `SVM [%]`, `Key Changes`, `Date of last update`, `ODM or in-house`, `Internal comments`, `PLM Owner`, `Product Segment`, `Visible to PLM`, `Visible to B&P`, `Visible to Sales`, `Visible to Customer`) VALUES
(852, 'APXVSPP18-C-A20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, External RET', '16', '18', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10', 'External', 'A20', '1', '2', '', '1829', '302', '200', '31.4', '2020 x 384 x 379', '39', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVSPP18-C-A20', '', '', '', '159', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(853, 'APXVSPP19-C-NA20', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.9m,7-16, External RET', '16', '19.5', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10/0-8', 'Semi-External', 'NA20', '1', '2', '', '1930', '370', '206', '37.4', '2134 x 457 x 381', '46', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVSPP19-C-NA20', '', '', '', '160', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(854, 'APXVLLLL15S-C', '8', '0', '8', '0', '', 64, 68, 'Panel, 8-Ports, High-band, 65deg, 1.5m,7-16, VET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', '', '', '', '4', '', '1450', '574', '105', '34', '1820 x 695 x 280', '45.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLLLL15S-C-A20', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '161', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(855, 'APXVLLLL15S-C-A20', '8', '0', '8', '0', '', 64, 68, 'Panel, 8-Ports, High-band, 65deg, 1.5m,7-16, External RET', '', '18', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-10', 'External', 'A20', '', '4', '', '1450', '574', '105', '36', '1820 x 695 x 280', '47.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLLLL15S-C-A20', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '162', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(856, 'APXVAARR18_43-U-NA20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 1.8m,4.3-10, External RET', '14.5', '17.5', '', '65', 'X-POL', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '0-14/0-14/2-12/2-12', 'Semi-External', 'NA20', '2', '2', '', '1829', '609', '215', '59.5', '1980 x 735 x 375', '70', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAARR18_43-U-NA20', '', '', '', '163', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(857, 'APXVAARR24_43-U-NA20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.4m,4.3-10, External RET', '15', '18', '', '65', 'X-POL', 'No', '>= 2.1m', '4.3-10', 'VET', '0-12/0-12/2-12/2-12', 'Semi-External', 'NA20', '2', '2', '', '2436', '609', '222', '69.5', '2565x735x390', '80', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAARR24_43-U-NA20', '', '', '', '164', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(858, 'APXVDGLL26EXD_43-C-I20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.8m,4.3-10, Integrated RET', '16.6', '19', '', '65', 'X-POL', 'In Low Band', '>= 2.1m', '4.3-10', 'VET', '0-10 / 0-10 / 2-12 / 2-12', 'Internal', 'I20', '1', '2', '', '2769', '340', '200', '43', '2878 x 441 x 411', '47', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVDGLL26EXD_43-C-I20', '', '', '', '165', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(859, 'APXVBRML20XD-C-I20', '8', '2', '6', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '14.7', '17.4', '', '65', 'X-Pol', 'In High Band', '1.5m - 2.1m', '4.3-10', 'VET', '0-10/2-12', 'Internal', 'I20', '1', '2', '', '2049', '340', '200', '31.4', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBRML20XD-C-I20', '', '', '', '166', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(860, 'APXVBBLL15X_43-C-I20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 1.7m,4.3-10, Integrated RET', '14.8', '19.3', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '2-12', 'Internal', 'I20', '2', '2', '', '1694', '499', '215', '37.4', '1830 x 560 x 411', '43.4', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBBLL15X_43-C-I20', '', '', '', '167', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(861, 'APXVBBLL20X_43-C-I20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.0m,4.3-10, Integrated RET', '15.8', '18.8', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '2-12', 'Internal', 'I20', '2', '2', '', '2099', '499', '215', '42.1', '2240 x 560 x 411', '50.1', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBBLL20X_43-C-I20', '', '', '', '168', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(862, 'APXVBBLL26X_43-C-I20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '16.8', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '2-12', 'Internal', 'I20', '2', '2', '', '2606', '499', '215', '49.1', '2730 x 560 x 411', '59.4', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBBLL26X_43-C-I20', '', '', '', '169', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(863, 'APXVBBLL26X_43-U-I20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '16.8', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '2-12', 'Internal', 'I20', '2', '2', '', '2606', '499', '215', '49.1', '2730 x 560 x 411', '59.4', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBBLL26X_43-C-I20', '', '', '', '170', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(864, 'APXVHCWW18XD-C-I20B', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 1.8m,7-16, Integrated RET', '15.2', '18.6', '', '65', 'X-Pol', 'In Low Band', '1.5m - 2.1m', '7-16', 'VET', '0-14/0-10', 'Internal', 'I20B', '1', '2', '', '1831', '370', '209', '41.9', '1939 x 451 x 394', '46.7', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVHCWW18XD-C-I20B', '', '', '', '171', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(865, 'APXVHCWW24XD-C-I20B', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.4m,7-16, Integrated RET', '16.2', '18.6', '', '65', 'X-Pol', 'In Low Band', '>= 2.1m', '7-16', 'VET', '0-10', 'Internal', 'I20B', '1', '2', '', '2396', '370', '206', '44.4', '2525 x 450 x 400', '49', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVHCWW24XD-C-I20B', '', '', '', '172', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(866, 'APXVNGLL20XD-C-I20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '14.5', '18.1', '', '65', 'X-Pol', 'In Low Band', '1.5m - 2.1m', '7-16', 'VET', '2-12/0-10/2-12/2-12', 'Internal', 'I20', '1', '2', '', '2049', '340', '200', '37.6', '2182 x 441 x 411', '47.3', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVNGLL20XD-C-i20', '', '', '', '173', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(867, 'APXVNGLL26XTD-C', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, Integrated RET', '16', '18.1', '', '65', 'X-Pol', 'In Low Band', '>= 2.1m', '7-16', 'VET', '2-12/0-10/2-12/2-12', '', '', '1', '2', '', '2769', '340', '200', '43.9', '\\', '51.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVNGLL26XTD-C.pdf', '', '', '', '174', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(868, 'APXVNGLL26XTD-C-I20', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, Integrated RET', '16', '18.1', '', '65', 'X-Pol', 'In Low Band', '>= 2.1m', '7-16', 'VET', '2-12/0-10/2-12/2-12', 'Internal', 'I20', '1', '2', '', '2769', '340', '200', '43.9', '\\', '51.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVNGLL26XTD-C.pdf', '', '', '', '175', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(869, 'APXVERRL26-C', '8', '2', '6', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, VET', '17.5', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', '', '', '1', '3', '', '2660', '330', '185', '39.4', '2759 x 426 x 374', '45', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVERRL26-C.pdf', '', '', '', '176', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(870, 'APXVERRL26-C-A20', '8', '2', '6', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, VET', '17.5', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', 'External', 'A20', '1', '3', '', '2660', '330', '185', '39.4', '2759 x 426 x 374', '45', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVERRL26-C.pdf', '', '', '', '177', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(871, 'APXVERRL26-C-NA20', '8', '2', '6', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, External RET', '17.5', '18.5', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '2-12', 'External', 'NA20', '1', '3', '', '2660', '330', '185', '39.4', '2759 x 426 x 374', '45', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVERRL26-C.pdf', '', '', '', '178', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Rani', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(872, 'APXVB4L26X-C-I20', '10', '2', '8', '0', '', 68, 74, 'Panel, 10-Ports, Multi-band, 65deg, 2.7m,7-16, Integrated RET', '16', '18', '', '65', 'X-Pol', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'Internal', 'I20', '1', '2', '', '2769', '340', '200', '45.4', '2873 x 444 x 413', '55', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB4L26X-C-I20', '', '', '', '179', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(873, 'APXVB4L26X_43-C-I20B', '10', '2', '8', '0', '', 68, 74, 'Panel, 10-Ports, Multi-band, 65deg, 2.7m,4.3-10, Integrated RET', '16', '18', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10', 'Internal', 'I20B', '1', '2', '', '2769', '340', '200', '47.4', '2873 x 444 x 413', '55', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB4L26X_43-C-I20B', '', '', '', '180', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(874, 'APXVB4L26X_43-C-I20', '10', '2', '8', '0', '', 68, 74, 'Panel, 10-Ports, Multi-band, 65deg, 2.7m,4.3-10, Integrated RET', '16', '18', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10', 'Internal', 'I20', '1', '2', '', '2769', '340', '200', '47.4', '2873 x 444 x 413', '55', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB4L26X_43-C-I20', '', '', '', '181', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(875, 'APXVB4L26EX-C-I20', '10', '2', '8', '0', '', 68, 74, 'Panel, 10-Ports, Multi-band, 65deg, 2.8m,7-16, Integrated RET', '16.9', '18', '', '65', 'X-POL', 'No', '>= 2.1m', '7-16', 'VET', '0-10', 'Internal', 'I20', '1', '2', '', '2769', '340', '200', '38', '2903 x 444 x 413', '42', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB4L26EX-C', '', '', '', '182', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(876, 'APXVBRRMM15EXD_43-C-I20', '10', '2', '8', '0', '', 68, 74, 'Panel, 10-Ports, Multi-band, 65deg, 1.5m, 4.3-10, VET', '13.6', '16.5', '', '65', 'X-Pol', 'In High Band', '0.9m - 1.5m', '4.3-10', 'VET', '2-16/2-12', 'Internal', 'M20', '1', '2', '', '1497', '370', '206', '23', '1625 x 485 x 365', '27', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBRRMM15EXD_43-C-I20', '', '', '', '183', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(877, 'APXVHI4L20EXD_43-C-I20', '12', '4', '8', '0', '', 68, 74, 'Panel, 12-Ports, Multi-band, 65deg, 2.0m, 4.3-10, VET', '14.5', '16.9', '', '65', 'X-Pol', 'In Low Band', '1.5m - 2.1m', '4.3-10', 'VET', '2-14/2-12', 'Internal', 'M20', '1', '2', '', '2049', '370', '206', '40.5', '2165 x 505 x 375', '48.3', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVHI4L20EXD_43-C-I20', '', '', '', '184', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(878, 'APXVBB4L26X_43-U-I20', '12', '4', '8', '0', '', 68, 74, 'Panel, 12-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '16.5', '18.3', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '2-12', 'Internal', 'I20', '2', '2', '', '2694', '499', '215', '56.7', '2835 x 560 x 411', '74', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB4L26X_43-U-I20', '', '', '', '185', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(879, 'APXVBB4L26X_43-C-I20', '12', '4', '8', '0', '', 68, 74, 'Panel, 12-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '16.5', '18.3', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '2-12', 'Internal', 'I20', '2', '2', '', '2694', '499', '215', '56.7', '2835 x 560 x 411', '74', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB4L26X_43-C-I20', '', '', '', '186', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Carla', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(880, 'APXVTSM18-C-I20', '10', '2', '8', '0', '1', 69, 76, 'Panel, 10+1 Ports, TDD 2.5GHz BF, 65deg, 1.8m,7-16, Integrated RET', '15.1', '23.5', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-10/0-6', 'Internal', 'I20', '1', '4', '', '1829', '370', '206', '39.7', '1925 x 430 x 380', '44.4', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVTSM18-C-I20', '', '', '', '187', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(881, 'APXVA18_43-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.7m, 4.3-10, External RET', '14.7', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '4.3-10', 'VET', '0-12', 'Semi-External', 'A20', '1', '', '', '1726', '406', '228', '24', '1850 x 500 x 410', '29.2', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVA18_43-C-A20', '', '', '', '188', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(882, 'APXVA18-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 1.7m, 7-16, External RET', '14.7', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '0-12', 'Semi-External', 'A20', '1', '', '', '1726', '406', '228', '24', '1850 x 500 x 410', '29.2', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVA18-C-A20', '', '', '', '189', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(883, 'APXVA24_43-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 4.3-10, External RET', '16.2', '', '', '65', 'X-Pol', 'No', '< 0.9m', '4.3-10', 'VET', '0-10', 'Semi-External', 'A20', '1', '', '', '2438', '406', '228', '30.9', '2550 x 500 x 410', '38', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVA24_43-C-A20', '', 'General Availability', '', '190', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(884, 'APXVA24-C-A20', '2', '2', '0', '0', '', 66, 71, 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 7-16, External RET', '16.2', '', '', '65', 'X-Pol', 'No', '>= 2.1m', '4.3-10', 'VET', '0-10', 'Semi-External', 'A20', '1', '', '', '2438', '406', '228', '30.9', '2550 x 500 x 410', '38', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVA24-C-A20', '', '', '', '191', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(885, 'APXTM14H-CT0', '8', '0', '8', '0', '1', 65, 77, 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, FET', '', '13.5 / 22.0', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'FET', 'T0', '', '', '', '4', '', '1405', '323', '112', '20.2', '1525 x 404 x 234', '22.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXTM14H-CT0', '', '', '', '192', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(886, 'APXTM14H-CT3', '8', '0', '8', '0', '1', 65, 77, 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, FET', '', '13.5 / 16.0', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'FET', 'T3', '', '', '', '4', '', '1405', '323', '112', '20.2', '1525 x 404 x 234', '22.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXTM14H-CT3', '', '', '', '193', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(887, 'APXTM14H-CT6', '8', '0', '8', '0', '1', 65, 77, 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, FET', '', '13.5 / 16.0', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'FET', 'T6', '', '', '', '4', '', '1405', '323', '112', '20.2', '1525 x 404 x 234', '22.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXTM14H-CT6', '', '', '', '194', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(888, 'APXTM14H-CT9', '8', '0', '8', '0', '1', 65, 77, 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, FET', '', '13.5 / 16.0', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'FET', 'T9', '', '', '', '4', '', '1405', '323', '112', '20.2', '1525 x 404 x 234', '22.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXTM14H-CT9', '', '', '', '195', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(889, 'APXVTM14-C-I20', '8', '0', '8', '0', '1', 65, 77, 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, Integrated RET', '', '18.0 / 23.5', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-6', 'Internal', 'I20', '', '4', '', '1430', '320', '160', '28.9', '1550 x 440 x 300', '32.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVTM14-C-I20', '', '', '', '196', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(890, 'APXV9TM14-C-I20', '8', '0', '8', '0', '1', 65, 77, 'Panel, 8+1 Ports, TDD 2.5GHz BF, 90deg, 1.4m,7-16, Integrated RET', '', '16.5 / 22.0', '', '90', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '0-6', 'Internal', 'I20', '', '4', '', '1430', '320', '160', '28.9', '1550 x 440 x 300', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9TM14-C-I20', '', '', '', '197', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(891, 'APXVTY10A_43-C-I20', '8', '0', '0', '8', '1', 65, 77, 'Panel, 8+1 Ports, TDD 3.5GHz BF, 65deg, 1.0m,4.3-10, VET', '', '', '20.7', '65', 'X-Pol', 'No', '0.9m - 1.5m', '4.3-10', 'VET', '2-10', 'Internal', 'I20', '', '', '4', '1025', '326', '100', '19', '1100 x 380 x 210', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVTY10A_43-C-I20', '', '', '', '198', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Vincent', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(892, 'APXVFWW18X2-C-I20B', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, Integrated RET, Integrated Bias-T', '', '', '', '65', 'X-Pol', 'No', '1.5m - 2.1m', '7-16', 'VET', '', 'Internal', 'I20B', '1', '2', '', '', '', '', '', '', '', 'China', '', '', '', '', '199', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(893, 'APXVFWW12X2-C-I20B', '6', '2', '4', '0', '', 68, 74, 'Panel, 6-Ports, Multi-band, 65deg, 1.2m,7-16, Integrated RET, Integrated Bias-T', '', '', '', '65', 'X-Pol', 'No', '0.9m - 1.5m', '7-16', 'VET', '', 'Internal', 'I20B', '1', '2', '', '', '', '', '', '', '', 'China', '', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '200', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(894, 'APXVHCWW12XD-C-I20B', '8', '4', '4', '0', '', 68, 74, 'Panel, 8-Ports, Multi-band, 65deg, 1.2m,7-16, Integrated RET, Integrated Bias-T', '', '', '', '65', 'X-Pol', 'In Low Band', '0.9m - 1.5m', '', 'VET', '', 'Internal', 'I20B', '1', '2', '', '', '', '', '', '', '', 'China', '', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)', '', '', '201', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, NULL, '', '0000-00-00', '', '', 'Chuck', 'Segment', 'Yes', 'Yes', 'Yes', 'No'),
(895, 'test product', '2', '2', '0', '0', '', 71, 79, 'ets test tes', '', '', '', '65', 'V-Pol', 'No', '> 2.1m', '4.3-10', 'FET', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Under Development', '', '202', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 10000, 1533.74, 1328.02, 12915, 1980.83, 1715.14, 22.6, '', '2019-05-06', '', '', 'Rani', 'Segment', 'Yes', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `antennatypes`
--

CREATE TABLE `antennatypes` (
  `antennaTypeId` int(11) NOT NULL,
  `antennaTypeName` text NOT NULL,
  `antennaFamilyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antennatypes`
--

INSERT INTO `antennatypes` (`antennaTypeId`, `antennaTypeName`, `antennaFamilyId`) VALUES
(67, 'Panel', 63),
(68, 'Panel', 64),
(69, 'Panel Narrow Beam', 64),
(70, 'Omni', 65),
(71, 'Panel', 66),
(72, 'Split Beam', 67),
(73, 'Dual Beam', 67),
(74, 'Panel', 68),
(75, 'Omni', 63),
(76, 'Beamformer', 69),
(77, 'Beamformer', 65),
(79, 'none', 71);

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE `bands` (
  `bandId` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `color` text,
  `antennaId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`bandId`, `min`, `max`, `color`, `antennaId`) VALUES
(12492, 1695, 2690, 'Yellow', 696),
(12493, 1710, 2170, 'Blue', 697),
(12494, 1710, 2170, 'Blue', 698),
(12495, 1710, 2170, 'Blue', 699),
(12496, 1710, 2170, 'Blue', 700),
(12497, 1710, 2170, 'Blue', 701),
(12498, 1710, 2170, 'Blue', 702),
(12499, 1710, 2170, 'Blue', 703),
(12500, 1710, 2170, 'Blue', 704),
(12501, 1710, 2170, 'Blue', 705),
(12502, 1710, 2200, 'Blue', 706),
(12503, 1710, 2200, 'Blue', 707),
(12504, 1710, 2200, 'Blue', 708),
(12505, 1710, 2200, 'Blue', 709),
(12506, 1710, 2200, 'Blue', 710),
(12507, 1710, 2200, 'Blue', 711),
(12508, 1710, 2200, 'Blue', 712),
(12509, 1710, 2200, 'Blue', 713),
(12510, 1710, 2200, 'Blue', 714),
(12511, 1710, 2690, 'Yellow', 715),
(12512, 1710, 2700, 'Yellow', 716),
(12513, 1710, 2700, 'Yellow', 717),
(12514, 1710, 2700, 'Yellow', 718),
(12515, 1710, 2700, 'Yellow', 719),
(12516, 2300, 2700, 'Yellow', 720),
(12517, 2300, 2700, 'Yellow', 721),
(12518, 3300, 3800, 'Purple', 722),
(12519, 698, 894, 'Red', 723),
(12520, 698, 894, 'Red', 724),
(12521, 698, 894, 'Red', 725),
(12522, 698, 960, 'Red', 726),
(12523, 698, 960, 'Red', 727),
(12524, 698, 960, 'Red', 728),
(12525, 698, 960, 'Red', 729),
(12526, 698, 960, 'Red', 730),
(12527, 698, 960, 'Red', 731),
(12528, 790, 960, 'Red', 732),
(12529, 790, 960, 'Red', 733),
(12530, 790, 960, 'Red', 734),
(12531, 790, 960, 'Red', 735),
(12532, 790, 960, 'Red', 736),
(12533, 790, 960, 'Red', 737),
(12534, 790, 960, 'Red', 738),
(12535, 790, 960, 'Red', 739),
(12536, 790, 960, 'Red', 740),
(12537, 790, 960, 'Red', 741),
(12538, 790, 960, 'Red', 742),
(12539, 790, 960, 'Red', 743),
(12540, 790, 960, 'Red', 744),
(12541, 790, 960, 'Red', 745),
(12542, 790, 960, 'Red', 746),
(12543, 790, 960, 'Red', 747),
(12544, 790, 960, 'Red', 748),
(12545, 790, 960, 'Red', 749),
(12546, 1695, 2200, 'Blue', 750),
(12547, 1695, 2200, 'Blue', 750),
(12548, 1695, 2200, 'Blue', 751),
(12549, 1695, 2200, 'Blue', 751),
(12550, 1695, 2690, 'Yellow', 752),
(12551, 1695, 2690, 'Yellow', 752),
(12552, 1710, 2170, 'Blue', 753),
(12553, 1710, 2170, 'Blue', 753),
(12554, 1710, 2170, 'Blue', 754),
(12555, 1710, 2170, 'Blue', 754),
(12556, 1710, 2170, 'Blue', 755),
(12557, 1710, 2170, 'Blue', 755),
(12558, 1710, 2170, 'Blue', 756),
(12559, 1710, 2170, 'Blue', 756),
(12560, 1710, 2170, 'Blue', 757),
(12561, 1710, 2170, 'Blue', 757),
(12562, 1710, 2170, 'Blue', 758),
(12563, 1710, 2170, 'Blue', 758),
(12564, 1710, 2170, 'Blue', 759),
(12565, 1710, 2170, 'Blue', 759),
(12566, 1710, 2170, 'Blue', 760),
(12567, 1710, 2170, 'Blue', 760),
(12568, 1710, 2170, 'Blue', 761),
(12569, 1710, 2170, 'Blue', 761),
(12570, 1710, 2170, 'Blue', 762),
(12571, 1710, 2170, 'Blue', 762),
(12572, 1710, 2200, 'Blue', 763),
(12573, 1710, 2200, 'Blue', 763),
(12574, 1710, 2200, 'Blue', 764),
(12575, 1710, 2200, 'Blue', 764),
(12576, 1710, 2200, 'Blue', 765),
(12577, 1710, 2200, 'Blue', 765),
(12578, 1710, 2700, 'Yellow', 766),
(12579, 1710, 2700, 'Yellow', 766),
(12580, 1710, 2700, 'Yellow', 767),
(12581, 1710, 2700, 'Yellow', 767),
(12582, 1710, 2700, 'Yellow', 768),
(12583, 1710, 2700, 'Yellow', 768),
(12584, 1710, 2700, 'Yellow', 769),
(12585, 1710, 2700, 'Yellow', 769),
(12586, 1710, 2700, 'Yellow', 770),
(12587, 1710, 2700, 'Yellow', 770),
(12588, 1710, 2700, 'Yellow', 771),
(12589, 1710, 2700, 'Yellow', 771),
(12590, 1710, 2700, 'Yellow', 772),
(12591, 1710, 2700, 'Yellow', 772),
(12592, 1710, 2700, 'Yellow', 773),
(12593, 1710, 2700, 'Yellow', 773),
(12594, 1710, 2700, 'Yellow', 774),
(12595, 1710, 2700, 'Yellow', 774),
(12596, 1710, 2700, 'Yellow', 775),
(12597, 1710, 2700, 'Yellow', 775),
(12598, 2305, 2360, 'Yellow', 776),
(12599, 2305, 2360, 'Yellow', 776),
(12600, 2305, 2360, 'Yellow', 777),
(12601, 2305, 2360, 'Yellow', 777),
(12602, 617, 746, 'Red', 778),
(12603, 1695, 2200, 'Blue', 778),
(12604, 617, 746, 'Red', 779),
(12605, 617, 746, 'Red', 779),
(12606, 617, 746, 'Red', 780),
(12607, 617, 746, 'Red', 780),
(12608, 694, 960, 'Red', 781),
(12609, 1695, 2690, 'Yellow', 781),
(12610, 694, 960, 'Red', 782),
(12611, 1695, 2690, 'Yellow', 782),
(12612, 698, 960, 'Red', 783),
(12613, 1710, 2690, 'Yellow', 783),
(12614, 698, 960, 'Red', 784),
(12615, 698, 960, 'Red', 784),
(12616, 698, 960, 'Red', 785),
(12617, 698, 960, 'Red', 785),
(12618, 698, 960, 'Red', 786),
(12619, 698, 960, 'Red', 786),
(12620, 698, 960, 'Red', 787),
(12621, 698, 960, 'Red', 787),
(12622, 698, 960, 'Red', 788),
(12623, 698, 960, 'Red', 788),
(12624, 698, 960, 'Red', 789),
(12625, 698, 960, 'Red', 789),
(12626, 698, 960, 'Red', 790),
(12627, 698, 960, 'Red', 790),
(12628, 790, 960, 'Red', 791),
(12629, 1710, 2200, 'Blue', 791),
(12630, 790, 960, 'Red', 792),
(12631, 1710, 2200, 'Blue', 792),
(12632, 790, 960, 'Red', 793),
(12633, 1710, 2200, 'Blue', 793),
(12634, 790, 960, 'Red', 794),
(12635, 1710, 2200, 'Blue', 794),
(12636, 790, 960, 'Red', 795),
(12637, 1710, 2200, 'Blue', 795),
(12638, 790, 960, 'Red', 796),
(12639, 1710, 2200, 'Blue', 796),
(12640, 790, 960, 'Red', 797),
(12641, 1710, 2200, 'Blue', 797),
(12642, 790, 960, 'Red', 798),
(12643, 1710, 2200, 'Blue', 798),
(12644, 790, 960, 'Red', 799),
(12645, 1710, 2200, 'Blue', 799),
(12646, 790, 960, 'Red', 800),
(12647, 790, 960, 'Red', 800),
(12648, 790, 960, 'Red', 801),
(12649, 790, 960, 'Red', 801),
(12650, 790, 960, 'Red', 802),
(12651, 790, 960, 'Red', 802),
(12652, 790, 960, 'Red', 803),
(12653, 790, 960, 'Red', 803),
(12654, 790, 960, 'Red', 804),
(12655, 790, 960, 'Red', 804),
(12656, 790, 960, 'Red', 805),
(12657, 790, 960, 'Red', 805),
(12658, 790, 960, 'Red', 806),
(12659, 790, 960, 'Red', 806),
(12660, 870, 960, 'Red', 807),
(12661, 1710, 2170, 'Blue', 807),
(12662, 698, 960, 'Red', 808),
(12663, 1695, 2690, 'Yellow', 808),
(12664, 1695, 2690, 'Yellow', 808),
(12665, 698, 960, 'Red', 809),
(12666, 1695, 2690, 'Yellow', 809),
(12667, 1695, 2690, 'Yellow', 809),
(12668, 1695, 2200, 'Blue', 810),
(12669, 1695, 2690, 'Yellow', 810),
(12670, 1695, 2690, 'Yellow', 810),
(12671, 1695, 2200, 'Blue', 811),
(12672, 1695, 2690, 'Yellow', 811),
(12673, 1695, 2690, 'Yellow', 811),
(12674, 1695, 2200, 'Blue', 812),
(12675, 1695, 2690, 'Yellow', 812),
(12676, 1695, 2690, 'Yellow', 812),
(12677, 1695, 2200, 'Blue', 813),
(12678, 1695, 2700, 'Yellow', 813),
(12679, 1695, 2700, 'Yellow', 813),
(12680, 1695, 2200, 'Blue', 814),
(12681, 1695, 2700, 'Yellow', 814),
(12682, 1695, 2700, 'Yellow', 814),
(12683, 1710, 2690, 'Yellow', 815),
(12684, 1710, 2690, 'Yellow', 815),
(12685, 1710, 2690, 'Yellow', 815),
(12686, 584, 746, 'Red', 816),
(12687, 1695, 2200, 'Blue', 816),
(12688, 1695, 2200, 'Blue', 816),
(12689, 584, 746, 'Red', 817),
(12690, 1695, 2200, 'Blue', 817),
(12691, 1695, 2200, 'Blue', 817),
(12692, 584, 746, 'Red', 818),
(12693, 1695, 2200, 'Blue', 818),
(12694, 1695, 2200, 'Blue', 818),
(12695, 584, 746, 'Red', 819),
(12696, 1695, 2200, 'Blue', 819),
(12697, 1695, 2200, 'Blue', 819),
(12698, 617, 746, 'Red', 820),
(12699, 1695, 2200, 'Blue', 820),
(12700, 1695, 2200, 'Blue', 820),
(12701, 694, 960, 'Red', 821),
(12702, 1695, 2690, 'Yellow', 821),
(12703, 1695, 2690, 'Yellow', 821),
(12704, 694, 960, 'Red', 822),
(12705, 1695, 2690, 'Yellow', 822),
(12706, 1695, 2690, 'Yellow', 822),
(12707, 694, 960, 'Red', 823),
(12708, 1695, 2690, 'Yellow', 823),
(12709, 1695, 2690, 'Yellow', 823),
(12710, 694, 960, 'Red', 824),
(12711, 1695, 2690, 'Yellow', 824),
(12712, 1695, 2690, 'Yellow', 824),
(12713, 694, 960, 'Red', 825),
(12714, 1695, 2690, 'Yellow', 825),
(12715, 1695, 2690, 'Yellow', 825),
(12716, 694, 960, 'Red', 826),
(12717, 1695, 2690, 'Yellow', 826),
(12718, 1695, 2690, 'Yellow', 826),
(12719, 694, 960, 'Red', 827),
(12720, 1695, 2690, 'Yellow', 827),
(12721, 1695, 2690, 'Yellow', 827),
(12722, 694, 960, 'Red', 828),
(12723, 1695, 2690, 'Yellow', 828),
(12724, 1695, 2690, 'Yellow', 828),
(12725, 694, 960, 'Red', 829),
(12726, 1710, 2690, 'Yellow', 829),
(12727, 1710, 2690, 'Yellow', 829),
(12728, 694, 960, 'Red', 830),
(12729, 1710, 2690, 'Yellow', 830),
(12730, 1710, 2690, 'Yellow', 830),
(12731, 694, 960, 'Red', 831),
(12732, 1695, 2690, 'Yellow', 831),
(12733, 1695, 2690, 'Yellow', 831),
(12734, 694, 960, 'Red', 832),
(12735, 1695, 2690, 'Yellow', 832),
(12736, 1695, 2690, 'Yellow', 832),
(12737, 698, 894, 'Red', 833),
(12738, 1710, 2170, 'Blue', 833),
(12739, 1710, 2170, 'Blue', 833),
(12740, 698, 894, 'Red', 834),
(12741, 1695, 2360, 'Yellow', 834),
(12742, 1695, 2360, 'Yellow', 834),
(12743, 698, 894, 'Red', 835),
(12744, 1695, 2360, 'Yellow', 835),
(12745, 1695, 2360, 'Yellow', 835),
(12746, 698, 894, 'Red', 836),
(12747, 1695, 2360, 'Yellow', 836),
(12748, 1695, 2360, 'Yellow', 836),
(12749, 698, 894, 'Red', 837),
(12750, 1695, 2360, 'Yellow', 837),
(12751, 1695, 2360, 'Yellow', 837),
(12752, 698, 906, 'Red', 838),
(12753, 1695, 2200, 'Blue', 838),
(12754, 1695, 2200, 'Blue', 838),
(12755, 698, 906, 'Red', 839),
(12756, 1695, 2200, 'Blue', 839),
(12757, 1695, 2200, 'Blue', 839),
(12758, 698, 906, 'Red', 840),
(12759, 1695, 2200, 'Blue', 840),
(12760, 1695, 2200, 'Blue', 840),
(12761, 698, 906, 'Red', 841),
(12762, 1695, 2200, 'Blue', 841),
(12763, 1695, 2200, 'Blue', 841),
(12764, 790, 862, 'Red', 842),
(12765, 876, 960, 'Red', 842),
(12766, 1695, 2690, 'Yellow', 842),
(12767, 790, 862, 'Red', 843),
(12768, 876, 960, 'Red', 843),
(12769, 1695, 2690, 'Yellow', 843),
(12770, 790, 960, 'Red', 844),
(12771, 1710, 2170, 'Blue', 844),
(12772, 1710, 2170, 'Blue', 844),
(12773, 790, 960, 'Red', 845),
(12774, 1710, 2170, 'Blue', 845),
(12775, 1710, 2170, 'Blue', 845),
(12776, 790, 960, 'Red', 846),
(12777, 1710, 2170, 'Blue', 846),
(12778, 1710, 2170, 'Blue', 846),
(12779, 790, 960, 'Red', 847),
(12780, 1710, 2170, 'Blue', 847),
(12781, 1710, 2170, 'Blue', 847),
(12782, 790, 960, 'Red', 848),
(12783, 1710, 2170, 'Blue', 848),
(12784, 1710, 2170, 'Blue', 848),
(12785, 790, 960, 'Red', 849),
(12786, 1710, 2170, 'Blue', 849),
(12787, 1710, 2170, 'Blue', 849),
(12788, 790, 960, 'Red', 850),
(12789, 1710, 2170, 'Blue', 850),
(12790, 1710, 2170, 'Blue', 850),
(12791, 806, 869, 'Red', 851),
(12792, 1850, 1995, 'Blue', 851),
(12793, 1850, 1995, 'Blue', 851),
(12794, 806, 869, 'Red', 852),
(12795, 1850, 1990, 'Blue', 852),
(12796, 1850, 1990, 'Blue', 852),
(12797, 817, 869, 'Red', 853),
(12798, 1850, 1995, 'Blue', 853),
(12799, 1850, 1995, 'Blue', 853),
(12800, 1710, 2690, 'Yellow', 854),
(12801, 1710, 2690, 'Yellow', 854),
(12802, 1710, 2690, 'Yellow', 854),
(12803, 1710, 2690, 'Yellow', 854),
(12804, 1710, 2690, 'Yellow', 855),
(12805, 1710, 2690, 'Yellow', 855),
(12806, 1710, 2690, 'Yellow', 855),
(12807, 1710, 2690, 'Yellow', 855),
(12808, 617, 746, 'Red', 856),
(12809, 617, 746, 'Red', 856),
(12810, 1695, 2200, 'Blue', 856),
(12811, 1695, 2200, 'Blue', 856),
(12812, 617, 746, 'Red', 857),
(12813, 617, 746, 'Red', 857),
(12814, 1695, 2200, 'Blue', 857),
(12815, 1695, 2200, 'Blue', 857),
(12816, 694, 862, 'Red', 858),
(12817, 880, 960, 'Red', 858),
(12818, 1695, 2690, 'Yellow', 858),
(12819, 1695, 2690, 'Yellow', 858),
(12820, 694, 960, 'Red', 859),
(12821, 1695, 2170, 'Blue', 859),
(12822, 2500, 2690, 'Yellow', 859),
(12823, 1695, 2690, 'Yellow', 859),
(12824, 694, 960, 'Red', 860),
(12825, 694, 960, 'Red', 860),
(12826, 1695, 2690, 'Yellow', 860),
(12827, 1695, 2690, 'Yellow', 860),
(12828, 694, 960, 'Red', 861),
(12829, 694, 960, 'Red', 861),
(12830, 1695, 2690, 'Yellow', 861),
(12831, 1695, 2690, 'Yellow', 861),
(12832, 694, 960, 'Red', 862),
(12833, 694, 960, 'Red', 862),
(12834, 1695, 2690, 'Yellow', 862),
(12835, 1695, 2690, 'Yellow', 862),
(12836, 694, 960, 'Red', 863),
(12837, 694, 960, 'Red', 863),
(12838, 1695, 2690, 'Yellow', 863),
(12839, 1695, 2690, 'Yellow', 863),
(12840, 698, 787, 'Red', 864),
(12841, 824, 894, 'Red', 864),
(12842, 1695, 2360, 'Yellow', 864),
(12843, 1695, 2360, 'Yellow', 864),
(12844, 698, 787, 'Red', 865),
(12845, 824, 894, 'Red', 865),
(12846, 1695, 2360, 'Yellow', 865),
(12847, 1695, 2360, 'Yellow', 865),
(12848, 790, 862, 'Red', 866),
(12849, 876, 960, 'Red', 866),
(12850, 1695, 2690, 'Yellow', 866),
(12851, 1695, 2690, 'Yellow', 866),
(12852, 790, 862, 'Red', 867),
(12853, 876, 960, 'Red', 867),
(12854, 1695, 2690, 'Yellow', 867),
(12855, 1695, 2690, 'Yellow', 867),
(12856, 790, 862, 'Red', 868),
(12857, 876, 960, 'Red', 868),
(12858, 1695, 2690, 'Yellow', 868),
(12859, 1695, 2690, 'Yellow', 868),
(12860, 790, 960, 'Red', 869),
(12861, 1710, 2200, 'Blue', 869),
(12862, 1710, 2200, 'Blue', 869),
(12863, 1710, 2690, 'Yellow', 869),
(12864, 790, 960, 'Red', 870),
(12865, 1710, 2200, 'Blue', 870),
(12866, 1710, 2200, 'Blue', 870),
(12867, 1710, 2690, 'Yellow', 870),
(12868, 790, 960, 'Red', 871),
(12869, 1710, 2200, 'Blue', 871),
(12870, 1710, 2200, 'Blue', 871),
(12871, 1710, 2690, 'Yellow', 871),
(12872, 694, 960, 'Red', 872),
(12873, 1695, 2690, 'Yellow', 872),
(12874, 1695, 2690, 'Yellow', 872),
(12875, 1695, 2690, 'Yellow', 872),
(12876, 1695, 2690, 'Yellow', 872),
(12877, 694, 960, 'Red', 873),
(12878, 1695, 2690, 'Yellow', 873),
(12879, 1695, 2690, 'Yellow', 873),
(12880, 1695, 2690, 'Yellow', 873),
(12881, 1695, 2690, 'Yellow', 873),
(12882, 694, 960, 'Red', 874),
(12883, 1695, 2690, 'Yellow', 874),
(12884, 1695, 2690, 'Yellow', 874),
(12885, 1695, 2690, 'Yellow', 874),
(12886, 1695, 2690, 'Yellow', 874),
(12887, 694, 960, 'Red', 875),
(12888, 1695, 2690, 'Yellow', 875),
(12889, 1695, 2690, 'Yellow', 875),
(12890, 1695, 2690, 'Yellow', 875),
(12891, 1695, 2690, 'Yellow', 875),
(12892, 694, 960, 'Red', 876),
(12893, 1695, 2170, 'Blue', 876),
(12894, 1695, 2170, 'Blue', 876),
(12895, 2490, 2690, 'Yellow', 876),
(12896, 2490, 2690, 'Yellow', 876),
(12897, 694, 806, 'Red', 877),
(12898, 824, 960, 'Red', 877),
(12899, 1695, 2690, 'Yellow', 877),
(12900, 1695, 2690, 'Yellow', 877),
(12901, 1695, 2690, 'Yellow', 877),
(12902, 1695, 2690, 'Yellow', 877),
(12903, 694, 960, 'Red', 878),
(12904, 694, 960, 'Red', 878),
(12905, 1695, 2690, 'Yellow', 878),
(12906, 1695, 2690, 'Yellow', 878),
(12907, 1695, 2690, 'Yellow', 878),
(12908, 1695, 2690, 'Yellow', 878),
(12909, 694, 960, 'Red', 879),
(12910, 694, 960, 'Red', 879),
(12911, 1695, 2690, 'Yellow', 879),
(12912, 1695, 2690, 'Yellow', 879),
(12913, 1695, 2690, 'Yellow', 879),
(12914, 1695, 2690, 'Yellow', 879),
(12915, 817, 869, 'Red', 880),
(12916, 2490, 2690, 'Yellow', 880),
(12917, 2490, 2690, 'Yellow', 880),
(12918, 2490, 2690, 'Yellow', 880),
(12919, 2490, 2690, 'Yellow', 880),
(12920, 584, 746, 'Red', 881),
(12921, 584, 746, 'Red', 882),
(12922, 584, 746, 'Red', 883),
(12923, 584, 746, 'Red', 884),
(12924, 1880, 2025, 'Blue', 885),
(12925, 1880, 2025, 'Blue', 885),
(12926, 2575, 2635, 'Yellow', 885),
(12927, 2575, 2635, 'Yellow', 885),
(12928, 1880, 2025, 'Blue', 886),
(12929, 1880, 2025, 'Blue', 886),
(12930, 2575, 2635, 'Yellow', 886),
(12931, 2575, 2635, 'Yellow', 886),
(12932, 1880, 2025, 'Blue', 887),
(12933, 1880, 2025, 'Blue', 887),
(12934, 2575, 2635, 'Yellow', 887),
(12935, 2575, 2635, 'Yellow', 887),
(12936, 1880, 2025, 'Blue', 888),
(12937, 1880, 2025, 'Blue', 888),
(12938, 2575, 2635, 'Yellow', 888),
(12939, 2575, 2635, 'Yellow', 888),
(12940, 2496, 2690, 'Yellow', 889),
(12941, 2496, 2690, 'Yellow', 889),
(12942, 2496, 2690, 'Yellow', 889),
(12943, 2496, 2690, 'Yellow', 889),
(12944, 2496, 2690, 'Yellow', 890),
(12945, 2496, 2690, 'Yellow', 890),
(12946, 2496, 2690, 'Yellow', 890),
(12947, 2496, 2690, 'Yellow', 890),
(12948, 3300, 3800, 'Purple', 891),
(12949, 3300, 3800, 'Purple', 891),
(12950, 3300, 3800, 'Purple', 891),
(12951, 3300, 3800, 'Purple', 891),
(12952, 698, 894, 'Red', 892),
(12953, 1695, 2360, 'Yellow', 892),
(12954, 1695, 2360, 'Yellow', 892),
(12955, 698, 894, 'Red', 893),
(12956, 1695, 2360, 'Yellow', 893),
(12957, 1695, 2360, 'Yellow', 893),
(12958, 698, 787, 'Red', 894),
(12959, 824, 894, 'Red', 894),
(12960, 1695, 2360, 'Yellow', 894),
(12961, 1695, 2360, 'Yellow', 894),
(12962, 3, 4, 'Red', 895);

-- --------------------------------------------------------

--
-- Table structure for table `convesions`
--

CREATE TABLE `convesions` (
  `cid` int(11) NOT NULL,
  `rmb` float NOT NULL,
  `usd` float NOT NULL,
  `eur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `convesions`
--

INSERT INTO `convesions` (`cid`, `rmb`, `usd`, `eur`) VALUES
(1, 1, 6.52, 7.53);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `optionName` text NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `optionName`, `active`) VALUES
(1, 'accessControl', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusId` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusId`, `status`) VALUES
(1, 'General Availability'),
(3, 'Under Development'),
(4, 'Available with long production lead time'),
(5, 'Phased out');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Carla.Taborda@rfsworld.com', 'rfs2019', 'PLM'),
(9, 'Rani.Makke@rfsworld.com', 'rfs2019', 'PLM'),
(10, 'Chuck.Powell@rfsworld.com', 'rfs2019', 'PLM'),
(11, 'John.Cole@rfsworld.com', 'rfs2019', 'B&P'),
(12, 'Vincent.Lee@rfsworld.com', 'rfs2019', 'PLM'),
(13, 'ranibp', 'rfs2019', 'B&P'),
(14, 'ranisales', 'rfs2019', 'Sales'),
(15, 'ranicustomer', 'rfs2019', 'Customer'),
(16, 'Vincent.Filaudeau@rfsworld.com', 'rfs2019', 'PLM'),
(17, 'Pierre_Louis.LARAVOIRE@rfsworld.com', 'rfs2019', 'PLM'),
(18, 'Bernd.Sperrle@rfsworld.com', 'rfs2019', 'Sales'),
(19, 'laurent.Cruchant@rfsworld.com', 'rfs2019', 'PLM'),
(20, 'Peter.Krause@rfsworld.com', 'rfs2019', 'Sales'),
(21, 'Rick.Wei@rfsworld.com', 'rfs2019', 'Sales'),
(22, 'Phil.Limbacher@rfsworld.com', 'rfs2019', 'Sales'),
(23, 'Peter.Ebersold@rfsworld.com', 'rfs2019', 'Sales'),
(24, 'Kathrin.Borowsky@rfsworld.com', 'rfs2019', 'B&P'),
(25, 'Daniel.Poth@rfsworld.com', 'rfs2019', 'B&P'),
(26, 'Gurgen.Harutyunyan@rfsworld.com', 'rfs2019', 'B&P'),
(27, 'Christopher.Roch@rfsworld.com', 'rfs2019', 'Sales'),
(28, 'Veronica.Cuchnir@rfsworld.com', 'rfs2019', 'Sales'),
(29, 'Cecile.Philippo@rfsworld.com', 'rfs2019', 'Sales'),
(30, 'Veronique.De_Fournoux@rfsworld.com', 'rfs2019', 'Sales'),
(31, 'Benjamin.Gao@rfsworld.com', 'rfs2019', 'PLM'),
(32, 'kyle.malvey@rfsworld.com', 'rfs2019', 'Customer'),
(33, 'maria.belli@rfsworld.com', 'rfs2019', 'Customer'),
(34, 'Rayan.Hamze@rfsworld.com', 'rfs2019', 'Sales'),
(35, 'Hesham.ElNahhas@rfsworld.com', 'rfs2019', 'Sales'),
(36, 'Elmustapha.Morchid@rfsworld.com', 'rfs2019', 'Sales'),
(37, 'Jaco.Oosthuizen@rfsworld.com', 'rfs2019', 'Sales'),
(38, 'Rasim.Kerimov@rfsworld.com', 'rfs2019', 'Sales'),
(39, 'Nemo.Galletti@rfsworld.com', 'rfs2019', 'Sales'),
(40, 'Antonio.Sanchez_Lopez@rfsworld.com', 'rfs2019', 'Sales'),
(41, 'Andrew.Paulley@rfsworld.com', 'rfs2019', 'Sales'),
(42, 'Jacqui.Gallacher@rfsworld.com', 'rfs2019', 'Sales'),
(43, 'Sandrine.Wilhelm@rfsworld.com', 'rfs2019', 'Sales'),
(44, 'Wilson.Conti@rfsworld.com', 'rfs2019', 'Sales'),
(45, 'Tapani.Sairanen@rfsworld.com', 'rfs2019', 'Sales'),
(46, 'Ray.Bibisi@rfsworld.com', 'rfs2019', 'Sales'),
(47, 'Alina.Vershkova@rfsworld.com', 'rfs2019', 'Sales'),
(48, 'susan.wang1@rfsworld.com', 'rfs2019', 'PLM'),
(49, 'Pablo.Dudas@rfsworld.com', 'rfs2019', 'Sales'),
(50, 'Marcos.Wrobel@rfsworld.com', 'rfs2019', 'Sales'),
(51, 'Massimo.Lenzi@rfsworld.com', 'rfs2019', 'Sales'),
(52, 'tomasz.borodo@rfsworld.com', 'rfs2019', 'Sales'),
(53, 'Sanjay.Gupta@rfsworld.com', 'rfs2019', 'Sales'),
(54, 'george.sakai@rfsworld.com', 'rfs2019', 'Sales'),
(55, 'andre.doll@rfsworld.com', 'rfs2019', 'Sales'),
(56, 'Manoj.Gurnani@rfsworld.com', 'rfs2019', 'Sales'),
(57, 'Giuseppe.Gramegna@rfsworld.com', 'rfs2019', 'PLM'),
(58, 'stephane.Dauguet@rfsworld.com', 'rfs2019', 'PLM'),
(59, 'paula.mennone@rfsworld.com', 'rfs2019', 'Sales'),
(60, 'sal.betro@rfsworld.com', 'rfs2019', 'Sales'),
(61, 'john.pinckert@rfsworld.com', 'rfs2019', 'Sales'),
(62, 'Marianne.Mandel@rfsworld.com', 'rfs2019', 'Sales'),
(63, 'plm', 'plm', 'PLM');

-- --------------------------------------------------------

--
-- Table structure for table `welcome`
--

CREATE TABLE `welcome` (
  `id` int(11) NOT NULL,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `footer` text COLLATE latin1_general_ci NOT NULL,
  `Body` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `welcome`
--

INSERT INTO `welcome` (`id`, `title`, `footer`, `Body`) VALUES
(1, 'bla bla bla', 'footer footer', 'body body');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `About`
--
ALTER TABLE `About`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Help`
--
ALTER TABLE `Help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antennafamily`
--
ALTER TABLE `antennafamily`
  ADD PRIMARY KEY (`antennaFamilyId`);

--
-- Indexes for table `antennas`
--
ALTER TABLE `antennas`
  ADD PRIMARY KEY (`antennaId`);

--
-- Indexes for table `antennatypes`
--
ALTER TABLE `antennatypes`
  ADD PRIMARY KEY (`antennaTypeId`);

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`bandId`);

--
-- Indexes for table `convesions`
--
ALTER TABLE `convesions`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `welcome`
--
ALTER TABLE `welcome`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `About`
--
ALTER TABLE `About`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Help`
--
ALTER TABLE `Help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `antennafamily`
--
ALTER TABLE `antennafamily`
  MODIFY `antennaFamilyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `antennas`
--
ALTER TABLE `antennas`
  MODIFY `antennaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=896;
--
-- AUTO_INCREMENT for table `antennatypes`
--
ALTER TABLE `antennatypes`
  MODIFY `antennaTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `bandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12963;
--
-- AUTO_INCREMENT for table `convesions`
--
ALTER TABLE `convesions`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `welcome`
--
ALTER TABLE `welcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
