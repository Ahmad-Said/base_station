-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: db5000049373.hosting-data.io
-- Generation Time: Apr 15, 2019 at 03:25 PM
-- Server version: 5.7.25-log
-- PHP Version: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs44238`
--

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
(1, 'abab asd a d');

-- --------------------------------------------------------

--
-- Table structure for table `antennafamily`
--

CREATE TABLE `antennafamily` (
  `antennaFamilyId` int(11) NOT NULL,
  `antennaFamilyName` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antennafamily`
--

INSERT INTO `antennafamily` (`antennaFamilyId`, `antennaFamilyName`) VALUES
(54, 'Small Size'),
(55, 'High Band'),
(56, 'TDD'),
(57, 'Low Band'),
(58, 'Multi-Beam'),
(59, 'Multi-Band'),
(60, 'Hybrid FDD/TDD');

-- --------------------------------------------------------

--
-- Table structure for table `antennas`
--

CREATE TABLE `antennas` (
  `antennaId` int(11) NOT NULL,
  `xxx` text,
  `Total #RF ports` int,
  `Gain (dBi) (<1GHz)` text,
  `Gain (dBi) (1-3GHz)` text,
  `Gain (dBi) (>3GHz)` text,
  `Product Family` int(11) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `Number of Calibration ports` text,
  `#ports (<1GHz)` int,
  `#ports (1-3GHz)` int,
  `#ports (>3GHz )` int,
  `Internal Diplexing` text,
  `Antenna size category [m]` text,
  `Typical HBW @3dB [deg]` text,
  `Tilt` text,
  `Polarization` text,
  `#columns (<1GHz)` text,
  `#columns (1-3GHz)` text,
  `#columns (>3GHz)` text,
  `Tilt range [deg]` text,
  `RET Position` text,
  `RET family` text,
  `Height (mm)` text,
  `Width (mm)` text,
  `Depth (mm)` text,
  `Antenna Weight [Kg]` text,
  `Connectors type` text,
  `Short description` text,
  `Packing dimentions (HxWxD)[mm]` text,
  `Shipping weight [Kg]` text,
  `Country of Origin` text,
  `Link to product datasheet` text,
  `comments` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antennas`
--

INSERT INTO `antennas` (`antennaId`, `xxx`, `Total #RF ports`, `Gain (dBi) (<1GHz)`, `Gain (dBi) (1-3GHz)`, `Gain (dBi) (>3GHz)`, `Product Family`, `Type`, `Number of Calibration ports`, `#ports (<1GHz)`, `#ports (1-3GHz)`, `#ports (>3GHz )`, `Internal Diplexing`, `Antenna size category [m]`, `Typical HBW @3dB [deg]`, `Tilt`, `Polarization`, `#columns (<1GHz)`, `#columns (1-3GHz)`, `#columns (>3GHz)`, `Tilt range [deg]`, `RET Position`, `RET family`, `Height (mm)`, `Width (mm)`, `Depth (mm)`, `Antenna Weight [Kg]`, `Connectors type`, `Short description`, `Packing dimentions (HxWxD)[mm]`, `Shipping weight [Kg]`, `Country of Origin`, `Link to product datasheet`, `comments`) VALUES
(62, 'APXVL06-C-A20', '2', '', '15.5', '', 54, 54, '', '0', '2', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '', '1', '', '5-18', 'Semi-External', 'A20', '609', '175', '110', '8', '7-16', 'Panel, 2-Ports, High-band, 65deg, 0.6m, 7-16, External RET', '760 x 275 x 275', '9', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVL06-C-A20', ''),
(63, 'APX18-206516S-CT0', '2', '', '18.6', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'FET', 'X-Pol', '', '1', '', 'T0', '', '', '1349', '169', '80', '11.3', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, FET', '1464 x 251 x 203', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX18-206516S-CT0', ''),
(64, 'APX18-206516S-CT6', '2', '', '18.6', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'FET', 'X-Pol', '', '1', '', 'T6', '', '', '1349', '169', '80', '11.3', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, FET', '1464 x 251 x 203', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX18-206516S-CT6', ''),
(66, 'APXV18-209014-C-A20', '2', '', '16.5', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '90', 'VET', 'X-Pol', '', '1', '', '0-10', 'External', 'A20', '1349', '169', '80', '11.3', '7-16', 'Panel, 2-Ports, High-band, 90deg, 1.3m, 7-16, External RET', '1520 x 260 x 200', '15.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-209014-C-A20', ''),
(67, 'APXV18-209015-C-A20', '2', '', '17.9', '', 55, 55, '', '0', '2', '0', 'No', '1.5m - 2.1m', '90', 'VET', 'X-Pol', '', '1', '', '0-10', 'External', 'A20', '1850', '169', '80', '14.3', '7-16', 'Panel, 2-Ports, High-band, 90deg, 1.9m, 7-16, External RET', '2020 x 260 x 200', '17.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-209015-C-A20', ''),
(68, 'APXVR13S-C', '2', '', '18', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', '', '', '1360', '163', '105', '9.5', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, VET', '1460 x 250 x 210', '11.4', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVR13S-C.pdf', ''),
(69, 'APXV18-206513T-C', '2', '', '15.4', '', 54, 54, '', '0', '2', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', '', '', '700', '169', '80', '8.8', '7-16', 'Panel, 2-Ports, High-band, 65deg, 0.7m,7-16, VET', '860 x 260 x 200', '12', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-206513T-C.pdf', ''),
(70, 'APXV18-206513T-C-A20', '2', '', '15.4', '', 54, 54, '', '0', '2', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', 'External', 'A20', '700', '169', '80', '8.8', '7-16', 'Panel, 2-Ports, High-band, 65deg, 0.7m,7-16, External RET', '860 x 260 x 200', '12', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206513T-C-A20', ''),
(71, 'APXV18-206513S-C', '2', '', '15.1', '', 54, 54, '', '0', '2', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '', '1', '', '2-12', '', '', '700', '169', '80', '8.6', '7-16', 'Panel, 2-Ports, High-band, 65deg, 0.7m,7-16, VET', '860 x 260 x 200', '11.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206513S-C', ''),
(72, 'APXV18-203219-C', '2', '', '21', '', 55, 56, '', '0', '2', '0', 'No', '0.9m - 1.5m', '32', 'VET', 'X-Pol', '', '1', '', '0-10', '', '', '1375', '288', '118', '19', '7-16', 'Panel, 2-Ports, High-band, 32deg, 1.3m,7-16, VET', '1485 x 380 x 330', '19.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-203219-C.pdf', ''),
(73, 'APXV18-203219-C-A20', '2', '', '21', '', 55, 56, '', '0', '2', '0', 'No', '0.9m - 1.5m', '32', 'VET', 'X-Pol', '', '1', '', '0-10', 'External', 'A20', '1375', '288', '118', '20', '7-16', 'Panel, 2-Ports, High-band, 32deg, 1.3m,7-16, External RET', '1534 x 364 x 314', '22', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-203219-C-A20', ''),
(74, 'APXV18-206516H-C-A20', '2', '', '18.1', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', 'External', 'A20', '1391', '175', '110', '10.4', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, External RET', '1469 x 267 x 229', '13.1', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206516H-C-A20', ''),
(75, 'APXV18-206516T-C', '2', '', '18', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '4-14', '', '', '1391', '175', '110', '10.4', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, VET', '1469 x 267 x 229', '13.1', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206516T-C', ''),
(76, 'APXV18-206516H-C', '2', '', '18.1', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', '', '', '1391', '175', '110', '10.4', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, VET', '1469 x 267 x 229', '13.1', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-206516H-C.pdf', ''),
(77, 'APXV18-206516S-C-A20', '2', '', '18.4', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', 'External', 'A20', '1349', '169', '80', '12.4', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, External RET', '1450 x 230 x 189', '15', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206516S-C-A20', ''),
(78, 'APXV18-206516S-C', '2', '', '18.4', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', '', '', '1349', '169', '80', '12.4', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.3m, 7-16, VET', '1450 x 230 x 189', '15', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206516S-C', ''),
(79, 'APXV18-206517H-C', '2', '', '19', '', 55, 55, '', '0', '2', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', '', '', '1910', '175', '110', '13.4', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.9m, 7-16, VET', '2059 x 267 x 229', '16', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-206517H-C.pdf', ''),
(80, 'APXV18-206517S-C-A20', '2', '', '18.8', '', 55, 55, '', '0', '2', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', 'External', 'A20', '1953', '169', '80', '14.9', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.9m, 7-16, External RET', '1950 x 230 x 189', '20', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-206517S-C-A20', ''),
(81, 'APXL03S-CT3', '2', '', '11', '', 54, 54, '', '0', '2', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '', '1', '', 'T3', '', '', '270', '158', '100', '1.9', '7-16', 'Panel, 2-Ports, High-band, 65deg, 0.3m,7-16, FET', '370 x 250 x 250', '2.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXL03S-CT3', ''),
(82, 'APXVL13S-C', '2', '', '18.1', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-12', '', '', '1397', '175', '110', '9.1', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.4m, 7-16, VET', '1541 x 270 x 231', '11.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVL13S-C.pdf', ''),
(83, 'APXVL13S-C-A20', '2', '', '18.1', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-12', 'External', 'A20', '1397', '175', '110', '9.1', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.4m, 7-16, External RET', '1541 x 270 x 231', '11.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVL13S-C.pdf', ''),
(84, 'APXV18-276516-C', '2', '', '18.6', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-12', '', '', '1391', '175', '110', '10.4', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.4m, 7-16, VET', '1469 x 267 x 229', '13.1', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV18-276516-C.pdf', ''),
(85, 'APXV18-276516-C-A20', '2', '', '18.6', '', 55, 55, '', '0', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '1', '', '0-12', 'External', 'A20', '1391', '175', '110', '10.4', '7-16', 'Panel, 2-Ports, High-band, 65deg, 1.4m, 7-16, External RET', '1469 x 267 x 229', '13.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV18-276516-C-A20', ''),
(86, 'APXV23-276512-C', '2', '', '14.8', '', 54, 54, '', '0', '2', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', '', '', '560', '175', '110', '6.7', '7-16', 'Panel, 2-Ports, High-band, 60deg, 0.5m,7-16, VET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV23-276512-C', ''),
(87, 'APXV23-276512-C-A20', '2', '', '14.8', '', 54, 54, '', '0', '2', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '', '1', '', '0-10', 'External', 'A20', '560', '175', '110', '6.7', '7-16', 'Panel, 2-Ports, High-band, 60deg, 0.5m,7-16, External RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV23-276512-C', ''),
(88, 'AOXTXY10A_N-CT0', '2', '', '', '11', 56, 57, '', '0', '0', '2', 'No', '0.9m - 1.5m', '360', 'FET', 'X-Pol', '', '', '1', 'T0', '', '', '948', '168', '168', '5', '7-16', 'Omni, 2-Ports, High-band, 360deg, 0.95m,7-16, FET', '1150 x 200 x 200', '6.1', 'China', 'Contact RFS representative', ''),
(89, 'APXVF13-C-A20', '2', '14.7', '', '', 57, 58, '', '2', '0', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '', '', '5-13', 'Semi-External', 'A20', '1363', '368', '174', '18.8', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.3m, 7-16, External RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVF13-C-A20', ''),
(90, 'APXVF18-C-A20', '2', '16.3', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '2-12', 'Semi-External', 'A20', '1828', '368', '174', '21.7', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.8m, 7-16, External RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVF18-C-A20', ''),
(91, 'APXVF24-C-A20', '2', '17', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'Semi-External', 'A20', '2363', '368', '174', '26.4', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 7-16, External RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVF24-C-A20', ''),
(92, 'APXVB15S-C', '2', '15', '', '', 57, 58, '', '2', '0', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '', '', '0-15', '', '', '1450', '315', '145', '20', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.5m, 7-16, VET', '1810 x 415 x 240', '23', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB15S-C', ''),
(93, 'APXVB15S-C-A20', '2', '15', '', '', 57, 58, '', '2', '0', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '', '', '0-15', 'External', 'A20', '1450', '315', '145', '20', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.5m, 7-16, External RET', '1810 x 415 x 240', '23', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB15S-C', ''),
(94, 'APXVB20S-C', '2', '15.5', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '1827', '315', '145', '22.5', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.8m, 7-16, VET', '2180 x 415 x 240', '25.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB20S-C', ''),
(95, 'APXVB20S-C-A20', '2', '15.5', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '1827', '315', '145', '22.5', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.8m, 7-16, External RET', '2180 x 415 x 240', '25.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB20S-C', ''),
(96, 'APXVB26S-C', '2', '17', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '2-10', '', '', '2440', '315', '145', '28.2', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 7-16, VET', '2800 x 415 x 240', '32.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB26S-C', ''),
(97, 'APXVB26S-C-A20', '2', '17', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '2-10', 'External', 'A20', '2440', '315', '145', '28.2', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 7-16, External RET', '2800 x 415 x 240', '32.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB26S-C', ''),
(98, 'APV86-906516-C', '2', '17.5', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'V-Pol', '1', '', '', '0-10', '', '', '2600', '328', '128', '19.1', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, VET', '2700 x 370 x 245', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APV86-906516-C', ''),
(99, 'APXVE20F-C', '2', '16.8', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '2010', '270', '136', '20.3', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, VET', '2335 x 380 x 230', '23.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE20F-C', ''),
(100, 'APXVE26-C', '2', '17.8', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '2570', '270', '136', '25.3', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, VET', '2910 x 380 x 230', '30', 'China', 'http://www.rfsworld.com/dataxpress/Datasheets/?q=APXVE26-C', ''),
(101, 'APXV86-906515-C-A20', '2', '17.5', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '2080', '328', '128', '25.4', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, External RET', '2194 x 391 x 259', '\\', 'China', 'http://www.rfsworld.com/dataxpress/Datasheets/?q=APXV86-906515-C', ''),
(102, 'APXV86-906513L-C', '2', '15.2', '', '', 57, 58, '', '2', '0', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '1350', '328', '128', '17.4', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.3m, 7-16, VET', '1450 x 370 x 245', '19', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906513L-C', ''),
(103, 'APXV86-906513L-C-A20', '2', '15.2', '', '', 57, 58, '', '2', '0', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '1350', '328', '128', '17.4', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.3m, 7-16, External RET', '1450 x 370 x 245', '19', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906513L-C', ''),
(104, 'APXV86-906515-C', '2', '17.5', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '2080', '328', '128', '25.4', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, VET', '2194 x 391 x 259', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906515-C', ''),
(105, 'APXV86-906516-C-A20', '2', '18', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '2600', '328', '128', '\\', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, External RET', '2700 x 370 x 245 ', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906516-C', ''),
(106, 'APXV86-906516-C', '2', '18', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '2600', '328', '128', '\\', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, VET', '2700 x 370 x 245 ', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-906516-C', ''),
(107, 'APXV86-909014-C', '2', '15.3', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '90', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '2080', '328', '128', '25.4', '7-16', 'Panel, 2-Ports, Low-band, 90deg, 2.0m, 7-16, VET', '2320 x 375 x 220', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-909014-C', ''),
(108, 'APXV86-909014-C-A20', '2', '15.3', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '90', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '2080', '328', '128', '25.4', '7-16', 'Panel, 2-Ports, Low-band, 90deg, 2.0m, 7-16, VET', '2320 x 375 x 220', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV86-909014-C', ''),
(109, 'APXVE20-C', '2', '16.8', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '2010', '270', '136', '20.8', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, VET', '2335 x 380 x 230', '24', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE20-C', ''),
(110, 'APXVE20-C-A20', '2', '16.8', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '2010', '270', '136', '20.8', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.0m, 7-16, External RET', '2335 x 380 x 230', '24', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE20-C', ''),
(111, 'APXVE13-C', '2', '15.7', '', '', 57, 58, '', '2', '0', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '1460', '270', '136', '16.3', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.5m, 7-16, VET', '1725x 380 x 230', '18.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE13-C', ''),
(112, 'APXVE13-C-A20', '2', '15.7', '', '', 57, 58, '', '2', '0', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '1460', '270', '136', '16.3', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.5m, 7-16, External RET', '1725x 380 x 230', '18.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE13-C', ''),
(113, 'APXVE26F-C', '2', '17.8', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', '', '', '2570', '270', '136', '25.3', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, VET', '2910 x 380 x 230', '29', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE26F-C', ''),
(114, 'APXVE26F-C-A20', '2', '17.8', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '2570', '270', '136', '25.3', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, External RET', '2910 x 380 x 230', '29', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE26F-C', ''),
(115, 'APXVE26-C-A20', '2', '17.8', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'External', 'A20', '2570', '270', '136', '25.3', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 2.6m, 7-16, External RET', '2910 x 380 x 230', '30', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVE26-C', ''),
(116, 'APX16DWV-16DWVS-E-A20', '4', '', '18', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'A20', '1420', '331', '80', '19', '7-16', 'Panel (2 Xpol antennas side by side in the same radome)l, 4-Ports, High-band, 65deg, 1.4m, 7-16, External RET', '1520 x 408 x 198', '24.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX16DWV-16DWVS-E-A20', ''),
(117, 'APX17DWV-17DWVS-E-A20', '4', '', '19', '', 55, 55, '', '0', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'A20', '1925', '331', '80', '15.5', '7-16', 'Panel (2 Xpol antennas side by side in the same radome)l, 4-Ports, High-band, 65deg, 2.0m, 7-16, External RET', '2015 x 380 x 197', '31', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX17DWV-17DWVS-E-A20', ''),
(118, 'APXVLL06-C-A20', '4', '', '15.3', '', 54, 54, '', '0', '4', '0', 'No', '< 0.9m', '65', 'VET', 'X-POL', '', '1', '', '5-18', 'Semi-External', 'A20', '609', '288', '118', '13', '7-16', 'Panel, 4-Ports, High-band, 65deg, 0.6m,7-16, External RET', '709 x 388 x 318', '15', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLL06-C-A20', ''),
(119, 'APXVRR13-C', '4', '', '18', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', '', '', '1391', '350', '110', '17.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '1492 x 435 x 243', '22.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13-C', ''),
(120, 'APXVRR13-C-A20', '4', '', '18', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'A20', '1391', '350', '110', '17.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '1492 x 435 x 243', '22.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13-C', ''),
(121, 'APXVRR13-C-NA20', '4', '', '18', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'NA20', '1391', '350', '110', '17.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '1492 x 435 x 243', '22.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13-C', ''),
(122, 'APXVRR13T-C', '4', '', '17.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', '', '', '1282', '288', '118', '18', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '1480 x 366 x 274', '22', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13T-C', ''),
(123, 'APXVRR13T-C-A20', '4', '', '17.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'A20', '1282', '288', '118', '19', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, External RET', '1480 x 366 x 274', '23', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13T-C', ''),
(124, 'APXVRR13T2-C', '4', '', '17.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', '', '', '1282', '288', '118', '18', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '1480 x 366 x 274', '22', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13T2-C', ''),
(125, 'APXVRR13T2-C-A20', '4', '', '17.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'A20', '1282', '288', '118', '18', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.3m,7-16, VET', '1480 x 366 x 274', '22', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR13T2-C', ''),
(126, 'APXV9RR13-C-NA20', '4', '', '16.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '90', 'VET', 'X-Pol', '', '2', '', '0-9', 'External', 'NA20', '1349', '356', '80', '23', '7-16', 'Panel, 4-Ports, High-band, 90deg, 1.3m,7-16, External RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9RR13-C-NA20', ''),
(127, 'APXV3RR13A-C', '4', '', '20', '', 58, 59, '', '0', '4', '0', 'No', '0.9m - 1.5m', '32', 'VET', 'X-Pol', '', '2', '', '0-10', '', '', '1360', '400', '160', '29', '7-16', 'Panel, 4-Ports, High-band, 33deg, 1.3m,7-16, VET', '1520 x 520 x 320', '33.7', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3RR13A-C', ''),
(128, 'APXV3RR13A-C-A20', '4', '', '20', '', 58, 59, '', '0', '4', '0', 'No', '0.9m - 1.5m', '32', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'A20', '1360', '400', '160', '30.1', '7-16', 'Panel, 4-Ports, High-band, 33deg, 1.3m,7-16, External RET', '1520 x 520 x 320', '33.7', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3RR13A-C-A20', ''),
(129, 'APXVRR20-C', '4', '', '18.7', '', 55, 55, '', '0', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', '', '', '1911', '350', '110', '23.4', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.9m,7-16, VET', '2059 x 435 x 243', '26', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR20-C', ''),
(130, 'APXVRR20-C-A20', '4', '', '18.7', '', 55, 55, '', '0', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'A20', '1911', '350', '110', '23.4', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.9m,7-16, External RET', '2059 x 435 x 243', '26', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRR20-C-A20', ''),
(131, 'APXV3RR13-C-A20', '4', '', '20.2', '', 58, 60, '', '0', '4', '0', 'No', '0.9m - 1.5m', '32', 'VET', 'X-Pol', '', '2', '', '0-10', 'External', 'A20', '1375', '576', '118', '31.8', '7-16', 'Panel, 4-Ports, High-band, 33deg, 1.3m,7-16, External RET', '\\', '40.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3RR13-C-A20', ''),
(132, 'APXVLL13N-C', '4', '', '18.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-12', '', '', '1375', '288', '118', '16.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, VET', '1489 x 371 x 314', '20.4', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVLL13N-C.pdf', ''),
(133, 'APXVLL13N-C-NA20', '4', '', '18.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-12', 'External', 'NA20', '1375', '288', '118', '16.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '1489 x 371 x 314', '20.4', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVLL13N-C.pdf', ''),
(134, 'APXVLL13N-C-A20', '4', '', '18.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-12', 'External', 'A20', '1375', '288', '118', '16.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '1489 x 371 x 314', '20.4', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVLL13N-C.pdf', ''),
(135, 'APXVLL13N-S', '4', '', '18.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-12', '', '', '1375', '288', '118', '16.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, VET', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', ''),
(136, 'APXVLL13N-S-A20', '4', '', '18.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-12', 'External', 'A20', '1375', '288', '118', '16.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', ''),
(137, 'APXVLL13N-S-NA20', '4', '', '17.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-12', 'External', 'NA20', '1375', '288', '118', '16.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', ''),
(138, 'APXVLL13S-C', '4', '', '17.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '2-12', '', '', '1290', '288', '118', '14.5', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, VET', '1384 x 374 x 266', '17.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLL13S-C', ''),
(139, 'APXVLL13S-C-A20', '4', '', '18.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '2-12', 'External', 'A20', '1290', '288', '118', '14.5', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '1384 x 374 x 266', '17.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLL13S-C', ''),
(140, 'APXVLL13N_43-S', '4', '', '18.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-12', '', '', '1375', '288', '118', '16.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, VET', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', 'Technically approved - under industrialization preparation. Orderalble now'),
(141, 'APXVLL13N_43-S-A20', '4', '', '18.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '0-12', 'External', 'A20', '1375', '288', '118', '16.9', '7-16', 'Panel, 4-Ports, High-band, 65deg, 1.4m,7-16, External RET', '1489 x 371 x 314', '20.4', 'China', 'Contact RFS representative', 'Technically approved - under industrialization preparation. Orderalble now'),
(142, 'APXVWW12-A-I20', '4', '', '16.5', '', 55, 55, '', '0', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '2', '', '-5 to +5', 'Internal', 'I20', '1218', '280', '175', '17', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 1.2m, 7-16, VET', '1315 x 367 x 360', '19.7', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVWW12-A-I20', 'Technically approved - under industrialization preparation. Orderalble now'),
(143, 'APXVWW18-A-I20', '4', '', '17.7', '', 55, 55, '', '0', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '', '2', '', '-5 to +6', 'Internal', 'I20', '1862', '280', '175', '27.4', '4.3-10', 'Panel, 4-Ports, High-band, 65deg, 1.8m,4.3-10, Integrated RET', '2015 x 367 x 360', '27.2', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVWW18-A-I20', ''),
(144, 'APXVAR18_43-C-NA20', '4', '15', '18.9', '', 59, 61, '', '2', '2', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-POL', '1', '1', '', '5-19/2-12', 'Semi-External', 'NA20', '1726', '405', '228', '22', '4.3-10', 'Panel, 4-Ports, Multi-band, 65deg, 1.8m,4.3-10, External RET', '1835 x 485 x 395', '31.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAR18_43-C-NA20', ''),
(145, 'APXVAA18_43-U-A20', '4', '14.5', '', '', 57, 58, '', '4', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-14/0-14', 'Semi-External', 'A20', '1745', '609', '215', '46.0', '4.3-10', 'Panel, 4-Ports, Low-band, 65deg, 1.7m, 4.3-10, External RET', '1875 x 735 x 375', '54.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAA18_43-U-A20', ''),
(146, 'APXVAA24_43-U-A20', '4', '15.6', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-11', 'Semi-External', 'A20', '2435', '609', '215', '56.5', '4.3-10', 'Panel, 4-Ports, Low-band, 65deg, 2.4m, 4.3-10, External RET', '2565 x 735 x 375', '67.0', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAA24_43-U-A20', ''),
(147, 'APXVBL20X_43-C-M20', '4', '15.6', '18.2', '', 59, 61, '', '2', '2', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-POL', '1', '1', '', '0-10 / 2-12', 'Internal', 'M20', '2050', '340', '200', '26.5', '4.3-10', 'Panel, 4-Ports, Multi-band, 65deg, 2.0m,4.3-10, Integrated RET', '2182 x 441 x 411', '29.5', 'China', 'Contact RFS representative', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(148, 'APXVBL26X_43-C-M20', '4', '17', '18.1', '', 59, 61, '', '2', '2', '0', 'No', '>= 2.1m', '65', 'VET', 'X-POL', '1', '1', '', '0-10 / 2-12', 'Internal', 'M20', '2769', '340', '200', '29.5', '4.3-10', 'Panel, 4-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '2872 x 441 x 411', '33.5', 'China', 'Contact RFS representative', ''),
(149, 'APXVBL15S-C-A20', '4', '15', '17.4', '', 59, 61, '', '2', '2', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-POL', '1', '1', '', '2-14/2-12', 'External', 'A20', '1545', '335', '165', '18', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 1.5m,7-16, External RET', '1830 x 435 x 270', '26', 'China', 'Contact RFS representative', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(150, 'APXVBB15X_43-C-I20', '4', '14.5', '', '', 57, 58, '', '4', '0', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '2', '', '', '0-15/0-15', 'Internal', 'I20', '1495', '500', '215', '27.3', '4.3-10', 'Panel, 4-Ports, Low-band, 65deg, 1.5m,4.3-10, Integrated RET', '1620 x 546 x 390', '33.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB15X_43-C-I20', ''),
(151, 'APXVBB20X2-C-I20', '4', '16', '', '', 57, 58, '', '4', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10/0-10', 'Internal', 'I20', '2064', '499', '215', '34.9', '7-16', 'Panel, 4-Ports, Low-band, 65deg, 2.0m,7-16, Integrated RET', '2243 x 564 x 415', '42.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB20X2-C-I20', ''),
(152, 'APXVBB20X2_43-C-I20', '4', '16', '', '', 57, 58, '', '4', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10/0-10', 'Internal', 'I20', '2064', '499', '215', '34.9', '4.3-10', 'Panel, 4-Ports, Low-band, 65deg, 2.0m,4.3-10, Integrated RET', '2243 x 564 x 415', '42.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB20X2_43-C-I20', ''),
(153, 'APXVBB20X3_43-C-I20', '4', '16.5', '', '', 57, 58, '', '4', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10/0-10', 'Internal', 'I20', '2064', '499', '215', '34.9', '4.3-10', 'Panel, 4-Ports, Low-band, 65deg, 2.0m,4.3-10, Integrated RET', '2243 x 564 x 415', '42.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB20X3_43-C-I20', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(154, 'APXVBB26X2-C-I20', '4', '17', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10/0-10', 'Internal', 'I20', '2612', '500', '215', '40.6', '7-16', 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, Integrated RET', '2750 x 560 x 411', '49.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB26X2-C-I20', ''),
(155, 'APXVBB26X2_43-C-I20', '4', '17', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10/0-10', 'Internal', 'I20', '2612', '500', '215', '40.6', '4.3-10', 'Panel, 4-Ports, Low-band, 65deg, 2.6m,4.3-10, Integrated RET', '2750 x 560 x 411', '49.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB26X2_43-C-I20', ''),
(156, 'APXVBB26X3_43-C-I20', '4', '17.1', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10 / 0-10', 'Internal', 'I20', '2612', '500', '215', '40.6', '4.3-10', 'Panel, 4-Ports, Low-band, 65deg, 2.6m,4.3-10, Integrated RET', '2750 x 560 x 411', '49.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB26X3_43-C-I20', ''),
(157, 'APXV9R13B-C', '4', '14', '18', '', 59, 61, '', '2', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', '', '', '1403', '300', '161', '21.4', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 1.4m,7-16, VET', '\\', '\\', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV9R13B-C.pdf', ''),
(158, 'APXV9R13B-C-A20', '4', '14', '18', '', 59, 61, '', '2', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', 'External', 'A20', '1403', '300', '161', '21.4', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 1.4m,7-16, External RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9R13B-C-A20', ''),
(159, 'APXV9R20B-C', '4', '16.2', '19', '', 59, 61, '', '2', '2', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', '', '', '2183', '300', '161', '32.4', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 2.1m,7-16, VET', '2345 x 398 x 330', '36', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV9R20B-C.pdf', ''),
(160, 'APXV9R20-C', '4', '15.6', '18.8', '', 59, 61, '', '2', '2', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', '', '', '2183', '300', '161', '32.4', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 2.1m,7-16, VET', '2345 x 398 x 330', '39', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV9R20-C.pdf', ''),
(161, 'APXV9R20B-C-A20', '4', '16.2', '19', '', 59, 61, '', '2', '2', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', 'External', 'A20', '2183', '300', '161', '32.4', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 2.1m,7-16, External RET', '2345 x 398 x 330', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9R20B-C-A20', ''),
(162, 'APXV9R26B-C', '4', '17', '19.3', '', 59, 61, '', '2', '2', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', '', '', '2703', '300', '161', '40.4', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 2.7m,7-16, VET', '2869 x 398 x 330', '45', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXV9R26B-C.pdf', ''),
(163, 'APXV9R26B-C-A20', '4', '17', '19.3', '', 59, 61, '', '2', '2', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', 'External', 'A20', '2703', '300', '161', '40.4', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 2.7m,7-16, External RET', '2869 x 398 x 330', '45', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9R26B-C-A20', ''),
(164, 'APXVER26-C', '4', '16.2', '18.5', '', 59, 61, '', '2', '2', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', '', '', '2659', '280', '175', '28.9', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 2.7m,7-16, External RET', '2788 x 371 x 338', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVER26-C-NA20', ''),
(165, 'APXVER26-C-NA20', '4', '16.2', '18.5', '', 59, 61, '', '2', '2', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/0-10', 'External', 'NA20', '2659', '280', '175', '28.9', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 2.7m,7-16, External RET', '2788 x 371 x 338', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVER26-C-NA20', ''),
(166, 'APXVEE26-C', '4', '17.4', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10', '', '', '2638', '461', '174', '48', '7-16', 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, VET', '2816 x 565 x 345', '54', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVEE26-C.pdf', ''),
(167, 'APXVEE26-C-NA20', '4', '17.4', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10', 'External', 'NA20', '2638', '461', '174', '48', '7-16', 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, External RET', '2816 x 565 x 345', '54', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVEE26-C', ''),
(168, 'APXVEE26-C-A20', '4', '17.4', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10', 'External', 'A20', '2638', '461', '174', '48', '7-16', 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, External RET', '2816 x 565 x 345', '54', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVEE26-C', ''),
(169, 'APXVEE26S-C-A20', '4', '17.8', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10/0-10', 'External', 'A20', '2565', '530', '130', '51', '7-16', 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, External RET', '2895 x 635 x 280', '57', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVEE26S-C', ''),
(170, 'APXVEE26S-C', '4', '17.8', '', '', 57, 58, '', '4', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '', '', '0-10/0-10', '', '', '2565', '530', '130', '50', '7-16', 'Panel, 4-Ports, Low-band, 65deg, 2.6m,7-16, VET', '2895 x 635 x 280', '56', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVEE26S-C', ''),
(171, 'APXV3EE20A-C', '4', '18', '', '', 58, 59, '', '4', '0', '0', 'No', '1.5m - 2.1m', '32', 'VET', 'X-Pol', '2', '', '', '0-10', '', '', '2100', '600', '150', '45.6', '7-16', 'Panel, 4-Ports, Low-band, 33deg, 2.1m,7-16, VET', '2355 x 740 x 340', '59', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3EE20A-C', ''),
(172, 'APXV3EE20A-C-A20', '4', '18', '', '', 58, 59, '', '4', '0', '0', 'No', '1.5m - 2.1m', '32', 'VET', 'X-Pol', '2', '', '', '0-10', 'External', 'A20', '2100', '600', '150', '45.6', '7-16', 'Panel, 4-Ports, Low-band, 33deg, 2.1m,7-16, External RET', '2355 x 740 x 340', '59', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV3EE20A-C-A20', ''),
(173, 'APX13GV-15DWVB-C', '4', '14.4', '17', '', 59, 61, '', '2', '2', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '1', '', '0-10/2-10', '', '', '1349', '328', '128', '20.8', '7-16', 'Panel, 4-Ports, Multi-band, 65deg, 1.3m,7-16, VET', '1520 x 400 x 260', '26.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APX13GV-15DWVB-C', ''),
(174, 'AOXVBLL06_43-AT0', '6', '6.4', '9.7', '', 54, 62, '', '2', '4', '0', 'No', '< 0.9m', '360', 'VET', 'X-Pol', '1', '2', '', '0/5-18 in high band', '', '', '564', '380', '380', '17.5', '4.3-10', 'Panel, 6-Ports, Multi-band, 360deg, 0.6m,4.3-10, Manual VET', '465 x 470 x 815', '21.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=AOXVBLL06_43-A-A20', ''),
(175, 'AOXVBLL06_43-A-A20', '6', '6.4', '9.7', '', 54, 62, '', '2', '4', '0', 'No', '< 0.9m', '360', 'VET', 'X-Pol', '1', '2', '', '0/5-18 in high band', 'External', 'A20', '564', '380', '380', '19', '4.3-10', 'Panel, 6-Ports, Multi-band, 360deg, 0.6m,4.3-10, External RET', '465 x 470 x 815', '23', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=AOXVBLL06_43-A-A20', ''),
(176, 'APXVRLL13-C', '6', '', '18', '', 55, 55, '', '0', '6', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '3', '', '0-10/0-12', '', '', '1400', '461', '132', '27.4', '7-16', 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, VET', '1516 x 554 x 330', '32', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVRLL13-C.pdf', ''),
(177, 'APXVRLL13-C-A20', '6', '', '18', '', 55, 55, '', '0', '6', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '3', '', '0-10/0-12', 'External', 'A20', '1400', '461', '132', '27.4', '7-16', 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, External RET', '1516 x 554 x 330', '32', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVRLL13-C.pdf', ''),
(178, 'APXVRLL13-C-NA20', '6', '', '18', '', 55, 55, '', '0', '6', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '3', '', '0-10/0-12', 'External', 'NA20', '1400', '461', '132', '27.4', '7-16', 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, External RET', '1516 x 554 x 330', '32', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVRLL13-C.pdf', ''),
(179, 'APXVRLL13K2-C', '6', '', '18', '', 55, 55, '', '0', '6', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '3', '', '0-10/0-12', '', '', '1400', '461', '132', '27.4', '7-16', 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, VET', '1516 x 554 x 330', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRLL13K2-C', ''),
(180, 'APXVRLL13K2-C-A20', '6', '', '18', '', 55, 55, '', '0', '6', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '3', '', '0-10/0-12', 'External', 'A20', '1400', '461', '132', '27.4', '7-16', 'Panel, 6-Ports, High-band, 65deg, 1.4m,7-16, VET', '1516 x 554 x 330', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVRLL13K2-C', ''),
(181, 'APXVLLL15S-C-A20', '6', '', '17.5', '', 55, 55, '', '0', '6', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '3', '', '0-10/0-10/0-10', 'External', 'A20', '1448', '420', '100', '27.1', '7-16', 'Panel, 6-Ports, High-band, 65deg, 1.5m,7-16, VET', '1820 x 530 x 260', '38.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLLL15S-C-A20', ''),
(182, 'APXVARR18_43-C-NA20', '6', '15.3', '18.3', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-12/0-10/0-10', 'Semi-External', 'NA20', '1829', '500', '216', '45', '4.3-10', 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,4.3-10, External RET', '1975 x 560 x 411', '51.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR18_43-C-NA20', ''),
(183, 'APXVARR18-C-NA20', '6', '15.3', '18.3', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-12/0-10/0-10', 'Semi-External', 'NA20', '1829', '500', '216', '45', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, External RET', '1975 x 560 x 411', '51.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR18-C-NA20', ''),
(184, 'APXVARR24_43-C-NA20', '6', '15.7', '18.5', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10/0-10/0-10', 'Semi-External', 'NA20', '2438', '500', '216', '52', '4.3-10', 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,4.3-10, External RET', '2590 x 560 x 411', '60.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR24_43-C-NA20', ''),
(185, 'APXVARR24-C-NA20', '6', '15.7', '18.5', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10/0-10/0-10', 'Semi-External', 'NA20', '2438', '500', '216', '52', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,7-16, External RET', '2590 x 560 x 411', '60.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR24-C-NA20', '');
INSERT INTO `antennas` (`antennaId`, `xxx`, `Total #RF ports`, `Gain (dBi) (<1GHz)`, `Gain (dBi) (1-3GHz)`, `Gain (dBi) (>3GHz)`, `Product Family`, `Type`, `Number of Calibration ports`, `#ports (<1GHz)`, `#ports (1-3GHz)`, `#ports (>3GHz )`, `Internal Diplexing`, `Antenna size category [m]`, `Typical HBW @3dB [deg]`, `Tilt`, `Polarization`, `#columns (<1GHz)`, `#columns (1-3GHz)`, `#columns (>3GHz)`, `Tilt range [deg]`, `RET Position`, `RET family`, `Height (mm)`, `Width (mm)`, `Depth (mm)`, `Antenna Weight [Kg]`, `Connectors type`, `Short description`, `Packing dimentions (HxWxD)[mm]`, `Shipping weight [Kg]`, `Country of Origin`, `Link to product datasheet`, `comments`) VALUES
(186, 'APXVARR15_43-C-NA20', '6', '14.7', '19.1', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-POL', '1', '2', '', '5-20 / 2-12 / 2-12', 'Semi-External', 'NA20', '1524', '500', '216', '31.1', '4.3-10', 'Panel, 6-Ports, Multi-band, 65deg, 1.5m,4.3-10, External RET', '1640 x 560 x 410', '36.8', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVARR15_43-C-NA20', ''),
(187, 'APXVBLL06-C', '6', '10', '14', '', 54, 54, '', '2', '4', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '1', '2', '', '5/5-18', '', '', '609', '340', '200', '11', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 0.6m, 7-16, VET', '809 x 441 x 411', '12', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL06-C-A20', 'Technically approved - under industrialization preparation. Orderalble now'),
(188, 'APXVBLL06-C-A20', '6', '10', '14', '', 54, 54, '', '2', '4', '0', 'No', '< 0.9m', '65', 'VET', 'X-Pol', '1', '2', '', '5/5-18', 'Semi-External', 'A20', '609', '340', '200', '11', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 0.6m, 7-16, VET', '809 x 441 x 411', '12', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL06-C-A20', 'Technically approved - under industrialization preparation. Orderalble now'),
(189, 'APXVBLL15X-C-i20', '6', '14', '18.2', '', 59, 61, '', '2', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '2', '', '2-15/2-12', 'Internal', 'I20', '1390', '340', '200', '26.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.4m,7-16, Integrated RET', '1542 x 444 x 413', '30', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL15X-C-i20', ''),
(190, 'APXVBLL15XT-C-I20', '6', '14', '18.2', '', 59, 61, '', '2', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '2', '', '3-16/5-16', 'Internal', 'I20', '1390', '340', '200', '26.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.4m,7-16, Integrated RET', '1542 x 444 x 413', '30', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL15XT-C-I20', ''),
(191, 'APXVBLL15EX-C-I20', '6', '13', '17.2', '', 59, 61, '', '2', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '2', '', '2-15/2-12', 'Internal', 'I20', '1390', '340', '200', '21.0', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.4m,7-16, Integrated RET', '1542 x 444 x 413', '25', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL15EX-C-I20', ''),
(192, 'APXVBLL15EX_43-C-I20', '6', '13.9', '17.4', '', 59, 61, '', '2', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '2', '', '2-15/2-12/2-12', 'Internal', 'I20', '1390', '340', '200', '21.0', '4.3-10', 'Panel, 6-Ports, Multi-band, 65deg, 1.4m,4.3-10, Integrated RET', '1542 x 444 x 413', '25', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL15EX_43-C-I20', ''),
(193, 'APXVBLL20X2-C-I20', '6', '15.6', '17.9', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10/2-10', 'Internal', 'I20', '2049', '340', '200', '30.7', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '2184 x 444 x 413', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL20X2-C-I20', ''),
(194, 'APXVBLL20EX-C-I20', '6', '15.8', '19', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-POL', '1', '2', '', '0-10 / 2-12 / 2-12', 'Internal', 'I20', '2049', '340', '200', '29', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '2184 x 441 x 411', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL20EX-C-I20', ''),
(195, 'APXVBLL26X-C-I20', '6', '16.9', '17.6', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10/2-12/2-12', 'Internal', 'I20', '2769', '340', '200', '37.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.7m,7-16, Integrated RET', '2903 x 444 x 413', '41', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL26X-C-i20', ''),
(196, 'APXVBLL26X_43-C-I20B', '6', '16.9', '17.6', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10/2-12/2-12', 'Internal', 'I20B', '2769', '340', '200', '37.4', '4.3-10', 'Panel, 6-Ports, Multi-band, 65deg, 2.7m,4.3-10, Integrated RET', '2903 x 444 x 413', '41', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL26X_43-C-I20B', ''),
(197, 'APXVBLL26EX-C-I20', '6', '17', '18.3', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-POL', '1', '2', '', '0-10 / 2-12 / 2-12', 'Internal', 'I20', '2769', '340', '200', '32', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.8m,7-16, Integrated RET', '2874 x 444 x 413', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL26EX-C-I20', ''),
(198, 'APXVBLL26EX_43-C-I20', '6', '17', '18.3', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-POL', '1', '2', '', '0-10 / 2-12 / 2-12', 'Internal', 'I20', '2769', '340', '200', '32', '4.3-10', 'Panel, 6-Ports, Multi-band, 65deg, 2.8m,4.3-10, Integrated RET', '2874 x 444 x 413', '36', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBLL26EX_43-C-I20', ''),
(199, 'APXVFRR12X-C-I20', '6', '13.3', '16.3', '', 59, 61, '', '2', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '2', '', '0-8', 'Internal', 'I20', '1220', '299', '200', '21.3', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.2m,7-16, Integrated RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFRR12X-C-I20', ''),
(200, 'APXVFWW12X-C-NA20', '6', '13.6', '17.2', '', 59, 61, '', '2', '4', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '2', '', '2-10/0-10', 'Semi-External', 'NA20', '1220', '300', '200', '23.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.2m,7-16, External RET', '1410 x 384 x 379', '27', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFWW12X-C-NA20', ''),
(201, 'APXVFWW18X-C-NA20', '6', '15.1', '18.3', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '1-10/0-10', 'Semi-External', 'NA20', '1829', '300', '200', '32.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, External RET', '2020 x 384 x 379', '38', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFWW18X-C-NA20', ''),
(202, 'APXVFWW24X2-C-I20B', '6', '16.5', '18.6', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10', 'Internal', 'I20', '2396', '370', '206', '39.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,7-16, Integrated RET', '2525 x 450 x 400', '45', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFWW24X2-C-I20B', ''),
(203, 'APXVFWW24X-C-NA20', '6', '16', '18.3', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10', 'Semi-External', 'NA20', '2438', '300', '200', '36.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,7-16, External RET', '2438 x 384 x 379', '43', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVFWW24X-C-NA20', ''),
(204, 'AOXVFRR06_43-A-A20', '6', '5.5', '8.4', '', 54, 62, '', '2', '4', '0', 'No', '< 0.9m', '360', 'VET', 'X-Pol', '1', '2', '', '0-16', 'External', 'A20', '532', '442', '442', '17.5', '4.3-10', 'Omni, 6-Ports, Multi-band, 360deg, 0.6m,4.3-10, External RET', '840 x 540 x 520', '21.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=AOXVFRR06_43', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(205, 'AOXVFRR06_43-AT0', '6', '5.5', '8.4', '', 54, 62, '', '2', '4', '0', 'No', '< 0.9m', '360', 'FET', 'X-Pol', '1', '2', '', 'T0', '', '', '532', '442', '442', '16', '4.3-10', 'Omni, 6-Ports, Multi-band, 360deg, 0.6m,4.3-10, FET', '840 x 540 x 520', '20', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=AOXVFRR06_43', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(206, 'APXV4FRR18-C-I20B', '6', '16', '18.6', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '45', 'VET', 'X-Pol', '1', '2', '', '2-14 / 2-12', 'Internal', 'I20B', '1840', '455', '199', '48', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, Integrated RET', '1990 x 560 x 375 ', '56', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV4FRR18-C-I20B', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(207, 'APXV4FRR24-C-I20B', '6', '17.4', '19.3', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '45', 'VET', 'X-Pol', '1', '2', '', '2-12 ', 'Internal', 'I20B', '2405', '455', '199', '56', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.4m,7-16, Integrated RET', '2590 x 560 x 375', '66', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV4FRR24-C-I20B', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(208, 'APXVNGL20D-C-i20', '6', '14.5', '18.1', '', 59, 61, '', '4', '2', '0', 'In Low Band', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '2-12/0-10/2-12', 'Internal', 'I20', '2049', '340', '200', '34.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '2182 x 441 x 411', '44.1', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVNGL20D-C-i20', ''),
(209, 'APXVNGL26D-C-i20', '6', '16', '18.1', '', 59, 61, '', '4', '2', '0', 'In Low Band', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '1', '', '2-12/0-10/2-12', 'Internal', 'I20', '2769', '340', '200', '40.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, Integrated RET', '\\', '48', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVNGL26D-C-i20', ''),
(210, 'APXVERR20X-C', '6', '16', '18.2', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12', '', '', '2020', '303', '203', '31.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, VET', '2196 x 398 x 385', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR20X-C', ''),
(211, 'APXVERR20X-C-NA20', '6', '16', '18.2', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12', 'Semi-External', 'NA20', '2020', '303', '203', '31.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.0m,7-16, External RET', '2196 x 398 x 385', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR20X-C', ''),
(212, 'APXVERR26-C-NA20', '6', '17.3', '17.6', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12', 'External', 'NA20', '2659', '277', '175', '31.7', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, External RET', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26-C', ''),
(213, 'APXVERR26-C-A20', '6', '17.3', '17.6', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12', 'External', 'A20', '2659', '277', '175', '31.7', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, External RET', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26-C', ''),
(214, 'APXVERR26-C', '6', '17.3', '17.6', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12', '', '', '2659', '277', '175', '31.7', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, VET', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26-C', ''),
(215, 'APXVERR26F-C', '6', '17.3', '17.6', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12', '', '', '2659', '277', '175', '31.7', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, VET', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26F-C', ''),
(216, 'APXVERR26F-C-A20', '6', '17.3', '17.6', '', 59, 61, '', '2', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12', 'External', 'A20', '2659', '277', '175', '31.7', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 2.6m,7-16, External RET', '2880 x 365 x 340', '37', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVERR26F-C', ''),
(217, 'APXV9ERR18-C-A20', '6', '14', '17', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '90', 'VET', 'X-Pol', '1', '2', '', '0-10', 'External', 'A20', '1829', '302', '200', '31.6', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, External RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9ERR18-C-A20', ''),
(218, 'APXVSPP18-C-A20', '6', '16', '18', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10', 'External', 'A20', '1829', '302', '200', '31.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.8m,7-16, External RET', '2020 x 384 x 379', '39', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVSPP18-C-A20', ''),
(219, 'APXVSPP19-C-NA20', '6', '16', '19.5', '', 59, 61, '', '2', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10/0-8', 'Semi-External', 'NA20', '1930', '370', '206', '37.4', '7-16', 'Panel, 6-Ports, Multi-band, 65deg, 1.9m,7-16, External RET', '2134 x 457 x 381', '46', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVSPP19-C-NA20', ''),
(220, 'APXVLLLL15S-C', '8', '', '18', '', 55, 55, '', '0', '8', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '4', '', '0-10', '', '', '1450', '574', '105', '34', '7-16', 'Panel, 8-Ports, High-band, 65deg, 1.5m,7-16, VET', '1820 x 695 x 280', '45.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLLLL15S-C-A20', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(221, 'APXVLLLL15S-C-A20', '8', '', '18', '', 55, 55, '', '0', '8', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '4', '', '0-10', 'External', 'A20', '1450', '574', '105', '36', '7-16', 'Panel, 8-Ports, High-band, 65deg, 1.5m,7-16, External RET', '1820 x 695 x 280', '47.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVLLLL15S-C-A20', 'Lead time of the first delivery batch is 8 weeks after PO (TBC at order time)'),
(222, 'APXVAARR18_43-U-NA20', '8', '14.5', '17.5', '', 59, 61, '', '4', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-POL', '2', '2', '', '0-14/0-14/2-12/2-12', 'Semi-External', 'NA20', '1829', '609', '215', '59.5', '4.3-10', 'Panel, 8-Ports, Multi-band, 65deg, 1.8m,4.3-10, External RET', '1980 x 735 x 375', '70', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAARR18_43-U-NA20', ''),
(223, 'APXVAARR24_43-U-NA20', '8', '15', '18', '', 59, 61, '', '4', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-POL', '2', '2', '', '0-12/0-12/2-12/2-12', 'Semi-External', 'NA20', '2436', '609', '222', '69.5', '4.3-10', 'Panel, 8-Ports, Multi-band, 65deg, 2.4m,4.3-10, External RET', '2565x735x390', '80', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVAARR24_43-U-NA20', ''),
(224, 'APXVDGLL26EXD_43-C-I20', '8', '16.6', '19', '', 59, 61, '', '4', '4', '0', 'In Low Band', '>= 2.1m', '65', 'VET', 'X-POL', '1', '2', '', '0-10 / 0-10 / 2-12 / 2-12', 'Internal', 'I20', '2769', '340', '200', '43', '4.3-10', 'Panel, 8-Ports, Multi-band, 65deg, 2.8m,4.3-10, Integrated RET', '2878 x 441 x 411', '47', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVDGLL26EXD_43-C-I20', ''),
(225, 'APXVBRML20XD-C-I20', '8', '14.7', '17.4', '', 59, 61, '', '2', '6', '0', 'In High Band', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', ' 0-10/2-12', 'Internal', 'I20', '2049', '340', '200', '31.4', '4.3-10', 'Panel, 8-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '\\', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBRML20XD-C-I20', ''),
(226, 'APXVBBLL15X_43-C-I20', '8', '14.8', '19.3', '', 59, 61, '', '4', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '2', '2', '', '2-12', 'Internal', 'I20', '1694', '499', '215', '37.4', '4.3-10', 'Panel, 8-Ports, Multi-band, 65deg, 1.7m,4.3-10, Integrated RET', '1830 x 560 x 411', '43.4', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBBLL15X_43-C-I20', ''),
(227, 'APXVBBLL20X_43-C-I20', '8', '15.8', '18.8', '', 59, 61, '', '4', '4', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '2', '2', '', '2-12', 'Internal', 'I20', '2099', '499', '215', '42.1', '4.3-10', 'Panel, 8-Ports, Multi-band, 65deg, 2.0m,4.3-10, Integrated RET', '2240 x 560 x 411', '50.1', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBBLL20X_43-C-I20', ''),
(228, 'APXVBBLL26X_43-C-I20', '8', '16.8', '18.5', '', 59, 61, '', '4', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '2', '', '2-12', 'Internal', 'I20', '2606', '499', '215', '49.1', '4.3-10', 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '2730 x 560 x 411', '59.4', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBBLL26X_43-C-I20', ''),
(229, 'APXVBBLL26X_43-U-I20', '8', '16.8', '18.5', '', 59, 61, '', '4', '4', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '2', '', '2-12', 'Internal', 'I20', '2606', '499', '215', '49.1', '4.3-10', 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '2730 x 560 x 411', '59.4', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBBLL26X_43-C-I20', ''),
(230, 'APXVHCWW18XD-C-I20B', '8', '15.2', '18.6', '', 59, 61, '', '4', '4', '0', 'In Low Band', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-14/0-10', 'Internal', 'I20B', '1831', '370', '209', '41.9', '7-16', 'Panel, 8-Ports, Multi-band, 65deg, 1.8m,7-16, Integrated RET', '1939 x 451 x 394', '46.7', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVHCWW18XD-C-I20B', ''),
(231, 'APXVHCWW24XD-C-I20B', '8', '16.2', '18.6', '', 59, 61, '', '4', '4', '0', 'In Low Band', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10', 'Internal', 'I20B', '2396', '370', '206', '44.4', '7-16', 'Panel, 8-Ports, Multi-band, 65deg, 2.4m,7-16, Integrated RET', '2525 x 450 x 400', '49', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVHCWW24XD-C-I20B', ''),
(232, 'APXVNGLL20XD-C-I20', '8', '14.5', '18.1', '', 59, 61, '', '4', '4', '0', 'In Low Band', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12/0-10/2-12/2-12', 'Internal', 'I20', '2049', '340', '200', '37.6', '7-16', 'Panel, 8-Ports, Multi-band, 65deg, 2.0m,7-16, Integrated RET', '2182 x 441 x 411', '47.3', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVNGLL20XD-C-i20', ''),
(233, 'APXVNGLL26XTD-C', '8', '16', '18.1', '', 59, 61, '', '4', '4', '0', 'In Low Band', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12/0-10/2-12/2-12', '', '', '2769', '340', '200', '43.9', '7-16', 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, Integrated RET', '\\', '51.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVNGLL26XTD-C.pdf', ''),
(234, 'APXVNGLL26XTD-C-I20', '8', '16', '18.1', '', 59, 61, '', '4', '4', '0', 'In Low Band', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-12/0-10/2-12/2-12', 'Internal', 'I20', '2769', '340', '200', '43.9', '7-16', 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, Integrated RET', '\\', '51.5', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVNGLL26XTD-C.pdf', ''),
(235, 'APXVERRL26-C', '8', '17.5', '18.5', '', 59, 61, '', '2', '6', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '3', '', '2-12', '', '', '2660', '330', '185', '39.4', '7-16', 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, VET', '2759 x 426 x 374', '45', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVERRL26-C.pdf', ''),
(236, 'APXVERRL26-C-A20', '8', '17.5', '18.5', '', 59, 61, '', '2', '6', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '3', '', '2-12', 'External', 'A20', '2660', '330', '185', '39.4', '7-16', 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, VET', '2759 x 426 x 374', '45', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVERRL26-C.pdf', ''),
(237, 'APXVERRL26-C-NA20', '8', '17.5', '18.5', '', 59, 61, '', '2', '6', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '3', '', '2-12', 'External', 'NA20', '2660', '330', '185', '39.4', '7-16', 'Panel, 8-Ports, Multi-band, 65deg, 2.6m,7-16, External RET', '2759 x 426 x 374', '45', 'China', 'http://www.rfsworld.com/WebSearchECat/datasheets/pdf/cache/APXVERRL26-C.pdf', ''),
(238, 'APXVB4L26X-C-I20', '10', '16', '18', '', 59, 61, '', '2', '8', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10', 'Internal', 'I20', '2769', '340', '200', '45.4', '7-16', 'Panel, 10-Ports, Multi-band, 65deg, 2.7m,7-16, Integrated RET', '2873 x 444 x 413', '55', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB4L26X-C-I20', ''),
(239, 'APXVB4L26X_43-C-I20B', '10', '16', '18', '', 59, 61, '', '2', '8', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10', 'Internal', 'I20B', '2769', '340', '200', '47.4', '4.3-10', 'Panel, 10-Ports, Multi-band, 65deg, 2.7m,4.3-10, Integrated RET', '2873 x 444 x 413', '55', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB4L26X_43-C-I20B', ''),
(240, 'APXVB4L26X_43-C-I20', '10', '16', '18', '', 59, 61, '', '2', '8', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '0-10', 'Internal', 'I20', '2769', '340', '200', '47.4', '4.3-10', 'Panel, 10-Ports, Multi-band, 65deg, 2.7m,4.3-10, Integrated RET', '2873 x 444 x 413', '55', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB4L26X_43-C-I20', ''),
(241, 'APXVB4L26EX-C-I20', '10', '16.9', '18', '', 59, 61, '', '2', '8', '0', 'No', '>= 2.1m', '65', 'VET', 'X-POL', '1', '2', '', '0-10', 'Internal', 'I20', '2769', '340', '200', '38', '7-16', 'Panel, 10-Ports, Multi-band, 65deg, 2.8m,7-16, Integrated RET', '2903 x 444 x 413', '42', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVB4L26EX-C', ''),
(242, 'APXVBRRMM15EXD_43-C-I20', '10', '13.6', '16.5', '', 59, 61, '', '2', '8', '0', 'In High Band', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '1', '2', '', '2-16/2-12', 'Internal', 'M20', '1497', '370', '206', '23', '4.3-10', 'Panel, 10-Ports, Multi-band, 65deg, 1.5m, 4.3-10, VET', '1625 x 485 x 365', '27', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBRRMM15EXD_43-C-I20', ''),
(243, 'APXVHI4L20EXD_43-C-I20', '12', '14.5', '16.9', '', 59, 61, '', '4', '8', '0', 'In Low Band', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '2', '', '2-14/2-12', 'Internal', 'M20', '2049', '370', '206', '40.5', '4.3-10', 'Panel, 12-Ports, Multi-band, 65deg, 2.0m, 4.3-10, VET', '2165 x 505 x 375', '48.3', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVHI4L20EXD_43-C-I20', ''),
(244, 'APXVBB4L26X_43-U-I20', '12', '16.5', '18.3', '', 59, 61, '', '4', '8', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '2', '', '2-12', 'Internal', 'I20', '2694', '499', '215', '56.7', '4.3-10', 'Panel, 12-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '2835 x 560 x 411', '74', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB4L26X_43-U-I20', ''),
(245, 'APXVBB4L26X_43-C-I20', '12', '16.5', '18.3', '', 59, 61, '', '4', '8', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '2', '2', '', '2-12', 'Internal', 'I20', '2694', '499', '215', '56.7', '4.3-10', 'Panel, 12-Ports, Multi-band, 65deg, 2.6m,4.3-10, Integrated RET', '2835 x 560 x 411', '74', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVBB4L26X_43-C-I20', ''),
(246, 'APXVTSM18-C-I20', '10', '15.1', '23.5', '', 60, 63, '1', '2', '8', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '4', '', '0-10/0-6', 'Internal', 'I20', '1829', '370', '206', '39.7', '7-16', 'Panel, 10+1 Ports, TDD 2.5GHz BF, 65deg, 1.8m,7-16, Integrated RET', '1925 x 430 x 380', '44.4', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVTSM18-C-I20', ''),
(247, 'APXVA18_43-C-A20', '2', '14.7', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-12', 'Semi-External', 'A20', '1726', '406', '228', '24', '4.3-10', 'Panel, 2-Ports, Low-band, 65deg, 1.7m, 4.3-10, External RET', '1850 x 500 x 410', '29.2', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVA18_43-C-A20', ''),
(248, 'APXVA18-C-A20', '2', '14.7', '', '', 57, 58, '', '2', '0', '0', 'No', '1.5m - 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-12', 'Semi-External', 'A20', '1726', '406', '228', '24', '7-16', 'Panel, 2-Ports, Low-band, 65deg, 1.7m, 7-16, External RET', '1850 x 500 x 410', '29.2', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVA18-C-A20', ''),
(249, 'APXVA24_43-C-A20', '2', '16.2', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'Semi-External', 'A20', '2438', '406', '228', '30.9', '4.3-10', 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 4.3-10, External RET', '2550 x 500 x 410', '38', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVA24_43-C-A20', ''),
(250, 'APXVA24-C-A20', '2', '16.2', '', '', 57, 58, '', '2', '0', '0', 'No', '>= 2.1m', '65', 'VET', 'X-Pol', '1', '', '', '0-10', 'Semi-External', 'A20', '2438', '406', '228', '30.9', '4.3-10', 'Panel, 2-Ports, Low-band, 65deg, 2.4m, 7-16, External RET', '2550 x 500 x 410', '38', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVA24-C-A20', ''),
(251, 'APXTM14H-CT0', '8', '', '13.5 / 22.0', '', 56, 64, '1', '0', '8', '0', 'No', '0.9m - 1.5m', '65', 'FET', 'X-Pol', '', '4', '', 'T0', '', '', '1405', '323', '112', '20.2', '7-16', 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, FET', '1525 x 404 x 234', '22.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXTM14H-CT0', ''),
(252, 'APXTM14H-CT3', '8', '', '13.5 / 16.0', '', 56, 64, '1', '0', '8', '0', 'No', '0.9m - 1.5m', '65', 'FET', 'X-Pol', '', '4', '', 'T3', '', '', '1405', '323', '112', '20.2', '7-16', 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, FET', '1525 x 404 x 234', '22.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXTM14H-CT3', ''),
(253, 'APXTM14H-CT6', '8', '', '13.5 / 16.0', '', 56, 64, '1', '0', '8', '0', 'No', '0.9m - 1.5m', '65', 'FET', 'X-Pol', '', '4', '', 'T6', '', '', '1405', '323', '112', '20.2', '7-16', 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, FET', '1525 x 404 x 234', '22.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXTM14H-CT6', ''),
(254, 'APXTM14H-CT9', '8', '', '13.5 / 16.0', '', 56, 64, '1', '0', '8', '0', 'No', '0.9m - 1.5m', '65', 'FET', 'X-Pol', '', '4', '', 'T9', '', '', '1405', '323', '112', '20.2', '7-16', 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, FET', '1525 x 404 x 234', '22.6', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXTM14H-CT9', ''),
(255, 'APXVTM14-C-I20', '8', '', '18.0 / 23.5', '', 56, 64, '1', '0', '8', '0', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '4', '', '0-6', 'Internal', 'I20', '1430', '320', '160', '28.9', '7-16', 'Panel, 8+1 Ports, TDD 2.5GHz BF, 65deg, 1.4m,7-16, Integrated RET', '1550 x 440 x 300', '32.5', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVTM14-C-I20', ''),
(256, 'APXV9TM14-C-I20', '8', '', '16.5 / 22.0', '', 56, 64, '1', '0', '8', '0', 'No', '0.9m - 1.5m', '90', 'VET', 'X-Pol', '', '4', '', '0-6', 'Internal', 'I20', '1430', '320', '160', '28.9', '7-16', 'Panel, 8+1 Ports, TDD 2.5GHz BF, 90deg, 1.4m,7-16, Integrated RET', '1550 x 440 x 300', '32', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXV9TM14-C-I20', ''),
(257, 'APXVTY10A_43-C-I20', '8', '', '', '20.7', 56, 64, '1', '0', '0', '8', 'No', '0.9m - 1.5m', '65', 'VET', 'X-Pol', '', '', '4', '2-10', 'Internal', 'I20', '1025', '326', '100', '19', '4.3-10', 'Panel, 8+1 Ports, TDD 3.5GHz BF, 65deg, 1.0m,4.3-10, VET', '1100 x 380 x 210', '\\', 'China', 'http://products.rfsworld.com/product-solutions-search,562,1.html?search_options=model_number&input_search=APXVTY10A_43-C-I20', '');

-- --------------------------------------------------------

--
-- Table structure for table `antennatypes`
--

CREATE TABLE `antennatypes` (
  `antennaTypeId` int(11) NOT NULL,
  `antennaTypeName` text NOT NULL,
  `antennaFamilyId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antennatypes`
--

INSERT INTO `antennatypes` (`antennaTypeId`, `antennaTypeName`, `antennaFamilyId`) VALUES
(54, 'Panel', 54),
(55, 'Panel', 55),
(56, 'Panel Narrow Beam', 55),
(57, 'Omni', 56),
(58, 'Panel', 57),
(59, 'Split Beam', 58),
(60, 'Dual Beam', 58),
(61, 'Panel', 59),
(62, 'Omni', 54),
(63, 'Beamformer', 60),
(64, 'Beamformer', 56);

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE `bands` (
  `bandId` int(11) NOT NULL,
  `min` text,
  `max` text,
  `color` text,
  `antennaId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`bandId`, `min`, `max`, `color`, `antennaId`) VALUES
(81, '1695', '2690', 'Yellow', 62),
(82, '1710', '2170', 'Blue', 63),
(83, '1710', '2170', 'Blue', 64),
(85, '1710', '2170', 'Blue', 66),
(86, '1710', '2170', 'Blue', 67),
(87, '1710', '2170', 'Blue', 68),
(88, '1710', '2170', 'Blue', 69),
(89, '1710', '2170', 'Blue', 70),
(90, '1710', '2170', 'Blue', 71),
(91, '1710', '2200', 'Blue', 72),
(92, '1710', '2200', 'Blue', 73),
(93, '1710', '2200', 'Blue', 74),
(94, '1710', '2200', 'Blue', 75),
(95, '1710', '2200', 'Blue', 76),
(96, '1710', '2200', 'Blue', 77),
(97, '1710', '2200', 'Blue', 78),
(98, '1710', '2200', 'Blue', 79),
(99, '1710', '2200', 'Blue', 80),
(100, '1710', '2690', 'Yellow', 81),
(101, '1710', '2700', 'Yellow', 82),
(102, '1710', '2700', 'Yellow', 83),
(103, '1710', '2700', 'Yellow', 84),
(104, '1710', '2700', 'Yellow', 85),
(105, '2300', '2700', 'Yellow', 86),
(106, '2300', '2700', 'Yellow', 87),
(107, '3300', '3800', 'Purple', 88),
(108, '698', '894', 'Red', 89),
(109, '698', '894', 'Red', 90),
(110, '698', '894', 'Red', 91),
(111, '698', '960', 'Red', 92),
(112, '698', '960', 'Red', 93),
(113, '698', '960', 'Red', 94),
(114, '698', '960', 'Red', 95),
(115, '698', '960', 'Red', 96),
(116, '698', '960', 'Red', 97),
(117, '790', '960', 'Red', 98),
(118, '790', '960', 'Red', 99),
(119, '790', '960', 'Red', 100),
(120, '790', '960', 'Red', 101),
(121, '790', '960', 'Red', 102),
(122, '790', '960', 'Red', 103),
(123, '790', '960', 'Red', 104),
(124, '790', '960', 'Red', 105),
(125, '790', '960', 'Red', 106),
(126, '790', '960', 'Red', 107),
(127, '790', '960', 'Red', 108),
(128, '790', '960', 'Red', 109),
(129, '790', '960', 'Red', 110),
(130, '790', '960', 'Red', 111),
(131, '790', '960', 'Red', 112),
(132, '790', '960', 'Red', 113),
(133, '790', '960', 'Red', 114),
(134, '790', '960', 'Red', 115),
(135, '1695', '2200', 'Blue', 116),
(136, '1695', '2200', 'Blue', 116),
(137, '1695', '2200', 'Blue', 117),
(138, '1695', '2200', 'Blue', 117),
(139, '1695', '2690', 'Yellow', 118),
(140, '1695', '2690', 'Yellow', 118),
(141, '1710', '2170', 'Blue', 119),
(142, '1710', '2170', 'Blue', 119),
(143, '1710', '2170', 'Blue', 120),
(144, '1710', '2170', 'Blue', 120),
(145, '1710', '2170', 'Blue', 121),
(146, '1710', '2170', 'Blue', 121),
(147, '1710', '2170', 'Blue', 122),
(148, '1710', '2170', 'Blue', 122),
(149, '1710', '2170', 'Blue', 123),
(150, '1710', '2170', 'Blue', 123),
(151, '1710', '2170', 'Blue', 124),
(152, '1710', '2170', 'Blue', 124),
(153, '1710', '2170', 'Blue', 125),
(154, '1710', '2170', 'Blue', 125),
(155, '1710', '2170', 'Blue', 126),
(156, '1710', '2170', 'Blue', 126),
(157, '1710', '2170', 'Blue', 127),
(158, '1710', '2170', 'Blue', 127),
(159, '1710', '2170', 'Blue', 128),
(160, '1710', '2170', 'Blue', 128),
(161, '1710', '2200', 'Blue', 129),
(162, '1710', '2200', 'Blue', 129),
(163, '1710', '2200', 'Blue', 130),
(164, '1710', '2200', 'Blue', 130),
(165, '1710', '2200', 'Blue', 131),
(166, '1710', '2200', 'Blue', 131),
(167, '1710', '2700', 'Yellow', 132),
(168, '1710', '2700', 'Yellow', 132),
(169, '1710', '2700', 'Yellow', 133),
(170, '1710', '2700', 'Yellow', 133),
(171, '1710', '2700', 'Yellow', 134),
(172, '1710', '2700', 'Yellow', 134),
(173, '1710', '2700', 'Yellow', 135),
(174, '1710', '2700', 'Yellow', 135),
(175, '1710', '2700', 'Yellow', 136),
(176, '1710', '2700', 'Yellow', 136),
(177, '1710', '2700', 'Yellow', 137),
(178, '1710', '2700', 'Yellow', 137),
(179, '1710', '2700', 'Yellow', 138),
(180, '1710', '2700', 'Yellow', 138),
(181, '1710', '2700', 'Yellow', 139),
(182, '1710', '2700', 'Yellow', 139),
(183, '1710', '2700', 'Yellow', 140),
(184, '1710', '2700', 'Yellow', 140),
(185, '1710', '2700', 'Yellow', 141),
(186, '1710', '2700', 'Yellow', 141),
(187, '2305', '2360', 'Yellow', 142),
(188, '2305', '2360', 'Yellow', 142),
(189, '2305', '2360', 'Yellow', 143),
(190, '2305', '2360', 'Yellow', 143),
(191, '617', '746', 'Red', 144),
(192, '1695', '2200', 'Blue', 144),
(193, '617', '746', 'Red', 145),
(194, '617', '746', 'Red', 145),
(195, '617', '746', 'Red', 146),
(196, '617', '746', 'Red', 146),
(197, '694', '960', 'Red', 147),
(198, '1695', '2690', 'Yellow', 147),
(199, '694', '960', 'Red', 148),
(200, '1695', '2690', 'Yellow', 148),
(201, '698', '960', 'Red', 149),
(202, '1710', '2690', 'Yellow', 149),
(203, '698', '960', 'Red', 150),
(204, '698', '960', 'Red', 150),
(205, '698', '960', 'Red', 151),
(206, '698', '960', 'Red', 151),
(207, '698', '960', 'Red', 152),
(208, '698', '960', 'Red', 152),
(209, '698', '960', 'Red', 153),
(210, '698', '960', 'Red', 153),
(211, '698', '960', 'Red', 154),
(212, '698', '960', 'Red', 154),
(213, '698', '960', 'Red', 155),
(214, '698', '960', 'Red', 155),
(215, '698', '960', 'Red', 156),
(216, '698', '960', 'Red', 156),
(217, '790', '960', 'Red', 157),
(218, '1710', '2200', 'Blue', 157),
(219, '790', '960', 'Red', 158),
(220, '1710', '2200', 'Blue', 158),
(221, '790', '960', 'Red', 159),
(222, '1710', '2200', 'Blue', 159),
(223, '790', '960', 'Red', 160),
(224, '1710', '2200', 'Blue', 160),
(225, '790', '960', 'Red', 161),
(226, '1710', '2200', 'Blue', 161),
(227, '790', '960', 'Red', 162),
(228, '1710', '2200', 'Blue', 162),
(229, '790', '960', 'Red', 163),
(230, '1710', '2200', 'Blue', 163),
(231, '790', '960', 'Red', 164),
(232, '1710', '2200', 'Blue', 164),
(233, '790', '960', 'Red', 165),
(234, '1710', '2200', 'Blue', 165),
(235, '790', '960', 'Red', 166),
(236, '790', '960', 'Red', 166),
(237, '790', '960', 'Red', 167),
(238, '790', '960', 'Red', 167),
(239, '790', '960', 'Red', 168),
(240, '790', '960', 'Red', 168),
(241, '790', '960', 'Red', 169),
(242, '790', '960', 'Red', 169),
(243, '790', '960', 'Red', 170),
(244, '790', '960', 'Red', 170),
(245, '790', '960', 'Red', 171),
(246, '790', '960', 'Red', 171),
(247, '790', '960', 'Red', 172),
(248, '790', '960', 'Red', 172),
(249, '870', '960', 'Red', 173),
(250, '1710', '2170', 'Blue', 173),
(251, '698', '960', 'Red', 174),
(252, '1695', '2690', 'Yellow', 174),
(253, '1695', '2690', 'Yellow', 174),
(254, '698', '960', 'Red', 175),
(255, '1695', '2690', 'Yellow', 175),
(256, '1695', '2690', 'Yellow', 175),
(257, '1695', '2200', 'Blue', 176),
(258, '1695', '2690', 'Yellow', 176),
(259, '1695', '2690', 'Yellow', 176),
(260, '1695', '2200', 'Blue', 177),
(261, '1695', '2690', 'Yellow', 177),
(262, '1695', '2690', 'Yellow', 177),
(263, '1695', '2200', 'Blue', 178),
(264, '1695', '2690', 'Yellow', 178),
(265, '1695', '2690', 'Yellow', 178),
(266, '1695', '2200', 'Blue', 179),
(267, '1695', '2700', 'Yellow', 179),
(268, '1695', '2700', 'Yellow', 179),
(269, '1695', '2200', 'Blue', 180),
(270, '1695', '2700', 'Yellow', 180),
(271, '1695', '2700', 'Yellow', 180),
(272, '1710', '2690', 'Yellow', 181),
(273, '1710', '2690', 'Yellow', 181),
(274, '1710', '2690', 'Yellow', 181),
(275, '584', '746', 'Red', 182),
(276, '1695', '2200', 'Blue', 182),
(277, '1695', '2200', 'Blue', 182),
(278, '584', '746', 'Red', 183),
(279, '1695', '2200', 'Blue', 183),
(280, '1695', '2200', 'Blue', 183),
(281, '584', '746', 'Red', 184),
(282, '1695', '2200', 'Blue', 184),
(283, '1695', '2200', 'Blue', 184),
(284, '584', '746', 'Red', 185),
(285, '1695', '2200', 'Blue', 185),
(286, '1695', '2200', 'Blue', 185),
(287, '617', '746', 'Red', 186),
(288, '1695', '2200', 'Blue', 186),
(289, '1695', '2200', 'Blue', 186),
(290, '694', '960', 'Red', 187),
(291, '1695', '2690', 'Yellow', 187),
(292, '1695', '2690', 'Yellow', 187),
(293, '694', '960', 'Red', 188),
(294, '1695', '2690', 'Yellow', 188),
(295, '1695', '2690', 'Yellow', 188),
(296, '694', '960', 'Red', 189),
(297, '1695', '2690', 'Yellow', 189),
(298, '1695', '2690', 'Yellow', 189),
(299, '694', '960', 'Red', 190),
(300, '1695', '2690', 'Yellow', 190),
(301, '1695', '2690', 'Yellow', 190),
(302, '694', '960', 'Red', 191),
(303, '1695', '2690', 'Yellow', 191),
(304, '1695', '2690', 'Yellow', 191),
(305, '694', '960', 'Red', 192),
(306, '1695', '2690', 'Yellow', 192),
(307, '1695', '2690', 'Yellow', 192),
(308, '694', '960', 'Red', 193),
(309, '1695', '2690', 'Yellow', 193),
(310, '1695', '2690', 'Yellow', 193),
(311, '694', '960', 'Red', 194),
(312, '1695', '2690', 'Yellow', 194),
(313, '1695', '2690', 'Yellow', 194),
(314, '694', '960', 'Red', 195),
(315, '1710', '2690', 'Yellow', 195),
(316, '1710', '2690', 'Yellow', 195),
(317, '694', '960', 'Red', 196),
(318, '1710', '2690', 'Yellow', 196),
(319, '1710', '2690', 'Yellow', 196),
(320, '694', '960', 'Red', 197),
(321, '1695', '2690', 'Yellow', 197),
(322, '1695', '2690', 'Yellow', 197),
(323, '694', '960', 'Red', 198),
(324, '1695', '2690', 'Yellow', 198),
(325, '1695', '2690', 'Yellow', 198),
(326, '698', '894', 'Red', 199),
(327, '1710', '2170', 'Blue', 199),
(328, '1710', '2170', 'Blue', 199),
(329, '698', '894', 'Red', 200),
(330, '1695', '2360', 'Yellow', 200),
(331, '1695', '2360', 'Yellow', 200),
(332, '698', '894', 'Red', 201),
(333, '1695', '2360', 'Yellow', 201),
(334, '1695', '2360', 'Yellow', 201),
(335, '698', '894', 'Red', 202),
(336, '1695', '2360', 'Yellow', 202),
(337, '1695', '2360', 'Yellow', 202),
(338, '698', '894', 'Red', 203),
(339, '1695', '2360', 'Yellow', 203),
(340, '1695', '2360', 'Yellow', 203),
(341, '698', '906', 'Red', 204),
(342, '1695', '2200', 'Blue', 204),
(343, '1695', '2200', 'Blue', 204),
(344, '698', '906', 'Red', 205),
(345, '1695', '2200', 'Blue', 205),
(346, '1695', '2200', 'Blue', 205),
(347, '698', '906', 'Red', 206),
(348, '1695', '2200', 'Blue', 206),
(349, '1695', '2200', 'Blue', 206),
(350, '698', '906', 'Red', 207),
(351, '1695', '2200', 'Blue', 207),
(352, '1695', '2200', 'Blue', 207),
(353, '790', '862', 'Red', 208),
(354, '876', '960', 'Red', 208),
(355, '1695', '2690', 'Yellow', 208),
(356, '790', '862', 'Red', 209),
(357, '876', '960', 'Red', 209),
(358, '1695', '2690', 'Yellow', 209),
(359, '790', '960', 'Red', 210),
(360, '1710', '2170', 'Blue', 210),
(361, '1710', '2170', 'Blue', 210),
(362, '790', '960', 'Red', 211),
(363, '1710', '2170', 'Blue', 211),
(364, '1710', '2170', 'Blue', 211),
(365, '790', '960', 'Red', 212),
(366, '1710', '2170', 'Blue', 212),
(367, '1710', '2170', 'Blue', 212),
(368, '790', '960', 'Red', 213),
(369, '1710', '2170', 'Blue', 213),
(370, '1710', '2170', 'Blue', 213),
(371, '790', '960', 'Red', 214),
(372, '1710', '2170', 'Blue', 214),
(373, '1710', '2170', 'Blue', 214),
(374, '790', '960', 'Red', 215),
(375, '1710', '2170', 'Blue', 215),
(376, '1710', '2170', 'Blue', 215),
(377, '790', '960', 'Red', 216),
(378, '1710', '2170', 'Blue', 216),
(379, '1710', '2170', 'Blue', 216),
(380, '806', '869', 'Red', 217),
(381, '1850', '1995', 'Blue', 217),
(382, '1850', '1995', 'Blue', 217),
(383, '806', '869', 'Red', 218),
(384, '1850', '1990', 'Blue', 218),
(385, '1850', '1990', 'Blue', 218),
(386, '817', '869', 'Red', 219),
(387, '1850', '1995', 'Blue', 219),
(388, '1850', '1995', 'Blue', 219),
(389, '1710', '2690', 'Yellow', 220),
(390, '1710', '2690', 'Yellow', 220),
(391, '1710', '2690', 'Yellow', 220),
(392, '1710', '2690', 'Yellow', 220),
(393, '1710', '2690', 'Yellow', 221),
(394, '1710', '2690', 'Yellow', 221),
(395, '1710', '2690', 'Yellow', 221),
(396, '1710', '2690', 'Yellow', 221),
(397, '617', '746', 'Red', 222),
(398, '617', '746', 'Red', 222),
(399, '1695', '2200', 'Blue', 222),
(400, '1695', '2200', 'Blue', 222),
(401, '617', '746', 'Red', 223),
(402, '617', '746', 'Red', 223),
(403, '1695', '2200', 'Blue', 223),
(404, '1695', '2200', 'Blue', 223),
(405, '694', '862', 'Red', 224),
(406, '880', '960', 'Red', 224),
(407, '1695', '2690', 'Yellow', 224),
(408, '1695', '2690', 'Yellow', 224),
(409, '694', '960', 'Red', 225),
(410, '1695', '2170', 'Blue', 225),
(411, '2500', '2690', 'Yellow', 225),
(412, '1695', '2690', 'Yellow', 225),
(413, '694', '960', 'Red', 226),
(414, '694', '960', 'Red', 226),
(415, '1695', '2690', 'Yellow', 226),
(416, '1695', '2690', 'Yellow', 226),
(417, '694', '960', 'Red', 227),
(418, '694', '960', 'Red', 227),
(419, '1695', '2690', 'Yellow', 227),
(420, '1695', '2690', 'Yellow', 227),
(421, '694', '960', 'Red', 228),
(422, '694', '960', 'Red', 228),
(423, '1695', '2690', 'Yellow', 228),
(424, '1695', '2690', 'Yellow', 228),
(425, '694', '960', 'Red', 229),
(426, '694', '960', 'Red', 229),
(427, '1695', '2690', 'Yellow', 229),
(428, '1695', '2690', 'Yellow', 229),
(429, '698', '787', 'Red', 230),
(430, '824', '894', 'Red', 230),
(431, '1695', '2360', 'Yellow', 230),
(432, '1695', '2360', 'Yellow', 230),
(433, '698', '787', 'Red', 231),
(434, '824', '894', 'Red', 231),
(435, '1695', '2360', 'Yellow', 231),
(436, '1695', '2360', 'Yellow', 231),
(437, '790', '862', 'Red', 232),
(438, '876', '960', 'Red', 232),
(439, '1695', '2690', 'Yellow', 232),
(440, '1695', '2690', 'Yellow', 232),
(441, '790', '862', 'Red', 233),
(442, '876', '960', 'Red', 233),
(443, '1695', '2690', 'Yellow', 233),
(444, '1695', '2690', 'Yellow', 233),
(445, '790', '862', 'Red', 234),
(446, '876', '960', 'Red', 234),
(447, '1695', '2690', 'Yellow', 234),
(448, '1695', '2690', 'Yellow', 234),
(449, '790', '960', 'Red', 235),
(450, '1710', '2200', 'Blue', 235),
(451, '1710', '2200', 'Blue', 235),
(452, '1710', '2690', 'Yellow', 235),
(453, '790', '960', 'Red', 236),
(454, '1710', '2200', 'Blue', 236),
(455, '1710', '2200', 'Blue', 236),
(456, '1710', '2690', 'Yellow', 236),
(457, '790', '960', 'Red', 237),
(458, '1710', '2200', 'Blue', 237),
(459, '1710', '2200', 'Blue', 237),
(460, '1710', '2690', 'Yellow', 237),
(461, '694', '960', 'Red', 238),
(462, '1695', '2690', 'Yellow', 238),
(463, '1695', '2690', 'Yellow', 238),
(464, '1695', '2690', 'Yellow', 238),
(465, '1695', '2690', 'Yellow', 238),
(466, '694', '960', 'Red', 239),
(467, '1695', '2690', 'Yellow', 239),
(468, '1695', '2690', 'Yellow', 239),
(469, '1695', '2690', 'Yellow', 239),
(470, '1695', '2690', 'Yellow', 239),
(471, '694', '960', 'Red', 240),
(472, '1695', '2690', 'Yellow', 240),
(473, '1695', '2690', 'Yellow', 240),
(474, '1695', '2690', 'Yellow', 240),
(475, '1695', '2690', 'Yellow', 240),
(476, '694', '960', 'Red', 241),
(477, '1695', '2690', 'Yellow', 241),
(478, '1695', '2690', 'Yellow', 241),
(479, '1695', '2690', 'Yellow', 241),
(480, '1695', '2690', 'Yellow', 241),
(481, '694', '960', 'Red', 242),
(482, '1695', '2170', 'Blue', 242),
(483, '1695', '2170', 'Blue', 242),
(484, '2490', '2690', 'Yellow', 242),
(485, '2490', '2690', 'Yellow', 242),
(486, '694', '806', 'Red', 243),
(487, '824', '960', 'Red', 243),
(488, '1695', '2690', 'Yellow', 243),
(489, '1695', '2690', 'Yellow', 243),
(490, '1695', '2690', 'Yellow', 243),
(491, '1695', '2690', 'Yellow', 243),
(492, '694', '960', 'Red', 244),
(493, '694', '960', 'Red', 244),
(494, '1695', '2690', 'Yellow', 244),
(495, '1695', '2690', 'Yellow', 244),
(496, '1695', '2690', 'Yellow', 244),
(497, '1695', '2690', 'Yellow', 244),
(498, '694', '960', 'Red', 245),
(499, '694', '960', 'Red', 245),
(500, '1695', '2690', 'Yellow', 245),
(501, '1695', '2690', 'Yellow', 245),
(502, '1695', '2690', 'Yellow', 245),
(503, '1695', '2690', 'Yellow', 245),
(504, '817', '869', 'Red', 246),
(505, '2490', '2690', 'Yellow', 246),
(506, '2490', '2690', 'Yellow', 246),
(507, '2490', '2690', 'Yellow', 246),
(508, '2490', '2690', 'Yellow', 246),
(509, '584', '746', 'Red', 247),
(510, '584', '746', 'Red', 248),
(511, '584', '746', 'Red', 249),
(512, '584', '746', 'Red', 250),
(513, '1880', '2025', 'Blue', 251),
(514, '1880', '2025', 'Blue', 251),
(515, '2575', '2635', 'Yellow', 251),
(516, '2575', '2635', 'Yellow', 251),
(517, '1880', '2025', 'Blue', 252),
(518, '1880', '2025', 'Blue', 252),
(519, '2575', '2635', 'Yellow', 252),
(520, '2575', '2635', 'Yellow', 252),
(521, '1880', '2025', 'Blue', 253),
(522, '1880', '2025', 'Blue', 253),
(523, '2575', '2635', 'Yellow', 253),
(524, '2575', '2635', 'Yellow', 253),
(525, '1880', '2025', 'Blue', 254),
(526, '1880', '2025', 'Blue', 254),
(527, '2575', '2635', 'Yellow', 254),
(528, '2575', '2635', 'Yellow', 254),
(529, '2496', '2690', 'Yellow', 255),
(530, '2496', '2690', 'Yellow', 255),
(531, '2496', '2690', 'Yellow', 255),
(532, '2496', '2690', 'Yellow', 255),
(533, '2496', '2690', 'Yellow', 256),
(534, '2496', '2690', 'Yellow', 256),
(535, '2496', '2690', 'Yellow', 256),
(536, '2496', '2690', 'Yellow', 256),
(537, '3300', '3800', 'Purple', 257),
(538, '3300', '3800', 'Purple', 257),
(539, '3300', '3800', 'Purple', 257),
(540, '3300', '3800', 'Purple', 257);

-- --------------------------------------------------------

--
-- Table structure for table `Help`
--

CREATE TABLE `Help` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `imagePath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Help`
--

INSERT INTO `Help` (`id`, `body`, `imagePath`) VALUES
(1, 'help help help help help help help help help help help helphelp h', 'http://www.cmgme.com/images/help.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `optionName` text NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `optionName`, `active`) VALUES
(1, 'accessControl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'alimorsel', 'aaa', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `welcome`
--

CREATE TABLE `welcome` (
  `id` int(11) NOT NULL,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `footer` text COLLATE latin1_general_ci NOT NULL,
  `Body` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `welcome`
--

INSERT INTO `welcome` (`id`, `title`, `footer`, `Body`) VALUES
(1, 'title title ', 'footer footer', 'body body');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `About`
--
ALTER TABLE `About`
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
-- Indexes for table `Help`
--
ALTER TABLE `Help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `antennafamily`
--
ALTER TABLE `antennafamily`
  MODIFY `antennaFamilyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `antennas`
--
ALTER TABLE `antennas`
  MODIFY `antennaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT for table `antennatypes`
--
ALTER TABLE `antennatypes`
  MODIFY `antennaTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `bandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=546;
--
-- AUTO_INCREMENT for table `Help`
--
ALTER TABLE `Help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `welcome`
--
ALTER TABLE `welcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
