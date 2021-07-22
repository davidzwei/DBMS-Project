-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 15, 2021 at 01:32 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `name` varchar(15) NOT NULL,
  `floor` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `mgid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`name`, `floor`, `id`, `mgid`) VALUES
('眼科', 3, 1, 1),
('外科', 3, 2, 2),
('內科', 8, 3, 3),
('皮膚科', 3, 4, 4),
('小兒科', 9, 5, 5),
('心臟科', 6, 6, 6),
('大腸科', 3, 7, 7),
('骨科', 3, 8, 8),
('神經科', 2, 9, 9),
('家醫科', 8, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `dname` varchar(10) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `dnum` int(11) DEFAULT NULL,
  `superid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `dname`, `sex`, `age`, `dnum`, `superid`) VALUES
(1, 'Tom', 'm', 30, 1, 2),
(2, 'May', 'f', 35, 2, 3),
(3, 'Jay', 'm', 25, 3, 4),
(4, 'Jim', 'm', 50, 4, 5),
(5, 'Tommy', 'm', 60, 5, 1),
(6, 'Hick', 'm', 38, 6, 2),
(7, 'Dory', 'f', 25, 7, 5),
(8, 'Jenny', 'f', 48, 8, 2),
(9, 'Jeren', 'f', 51, 9, 7),
(10, 'Fan', 'f', 55, 9, 4),
(11, 'Tony', 'm', 45, 3, 2),
(12, 'Gray', 'f', 66, 3, 4),
(13, 'Tim', 'm', 47, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nid` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `nnum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nid`, `name`, `sex`, `nnum`) VALUES
(1, 'Ann', 'f', 2),
(2, 'Ray', 'f', 2),
(3, 'Tina', 'f', 3),
(4, 'Rin', 'f', 4),
(5, 'Ella', 'f', 5),
(6, 'Wendy', 'f', 6),
(7, 'Fan', 'm', 5),
(8, 'Alex', 'm', 7),
(9, 'Emma', 'f', 9),
(10, 'Kin', 'f', 10);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pname` varchar(45) NOT NULL,
  `psex` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `psex`) VALUES
(1, 'zzz', 'm'),
(2, 'Ann', 'f'),
(3, 'rrrr', 'f'),
(5, 'Fumi', 'f'),
(6, 'Weidi', 'm'),
(7, 'Kei', 'm'),
(8, 'ncku', 'f'),
(9, 'Ma', 'm'),
(10, 'Lora', 'f'),
(17, 'Amy', 'm'),
(19, 'Ann', 'f'),
(88, 'rrr', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `pid` int(3) NOT NULL,
  `did` int(3) NOT NULL,
  `id` int(3) NOT NULL,
  `pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`pid`, `did`, `id`, `pay`) VALUES
(1, 1, 4, 200),
(1, 2, 6, 150),
(2, 6, 5, 200),
(2, 8, 5, 350),
(3, 1, 6, 200),
(4, 3, 9, 400),
(4, 8, 9, 300),
(5, 5, 5, 200),
(6, 1, 6, 300),
(6, 8, 6, 200),
(7, 2, 1, 500),
(7, 5, 1, 1000),
(7, 6, 1, 350);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `rid` int(10) NOT NULL,
  `floor` int(10) NOT NULL,
  `pnum` int(10) DEFAULT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `floor`, `pnum`, `phone`) VALUES
(1, 1, 2, 12345),
(2, 2, 3, 43554),
(3, 3, 5, 32545),
(4, 4, 5, 32445),
(5, 5, NULL, 12435),
(6, 6, 8, 67833),
(7, 7, NULL, 43567),
(8, 8, NULL, 32412),
(9, 9, 1, 87906),
(10, 10, NULL, 65864);

-- --------------------------------------------------------

--
-- Table structure for table `treat`
--

CREATE TABLE `treat` (
  `tid` int(3) NOT NULL,
  `name` varchar(10) NOT NULL,
  `pay` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treat`
--

INSERT INTO `treat` (`tid`, `name`, `pay`) VALUES
(1, '抽血', 50),
(2, '擦藥', 50),
(3, '口服藥', 150),
(4, 'X-RAY', 500),
(5, '超音波', 400),
(6, '驗尿', 100),
(7, '打針', 200),
(8, 'MRI', 30000),
(9, '開刀', 20000),
(10, '化療', 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`pid`,`did`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `treat`
--
ALTER TABLE `treat`
  ADD PRIMARY KEY (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
