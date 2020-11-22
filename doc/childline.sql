-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 05:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `childline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(156) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `create_date`, `name`) VALUES
(2, 'sheikh.mchildline1098', 'Saraswatibhopal@1098', 1, '2020-11-21 06:43:11', 'Mohsin Sheikh'),
(3, 'yadav.vchildline1098', '7477054242@1098', 1, '2020-11-21 06:47:20', 'Vijay Yadav'),
(4, 'rashi.childline1098', '9977558000@1098', 1, '2020-11-21 06:47:20', 'Rashi Aswani'),
(5, 'bagul.bchildline1098', '9584671729', 1, '2020-11-21 06:47:20', 'Bhawana Bagul'),
(6, 'bodh.mchildline1098', '6260874083', 1, '2020-11-21 06:47:20', 'Madhu Bodh'),
(7, 'ali.fchildline1098', '8889842989', 1, '2020-11-21 06:47:20', 'Fazan Ali'),
(8, 'mishra.achildline1098', '9479598653', 1, '2020-11-21 06:48:15', 'Anita Mishra'),
(9, 'prakesh.jchildline1098', '8109413758', 1, '2020-11-21 06:49:51', 'Jay Prakesh'),
(10, 'panthi.dchildline1098', '8319481089', 1, '2020-11-21 06:49:51', 'Dinesh Panthi');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `ccc_category` varchar(156) NOT NULL,
  `subcategory` varchar(156) NOT NULL,
  `agent_name` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int(11) NOT NULL,
  `call_number` varchar(156) NOT NULL,
  `case_id` varchar(156) NOT NULL,
  `case_datetime` varchar(156) NOT NULL,
  `agent_name` varchar(256) NOT NULL,
  `ccc_category` varchar(156) DEFAULT NULL,
  `subcategory` varchar(256) DEFAULT NULL,
  `category_reason` varchar(256) DEFAULT NULL,
  `child_name` varchar(256) DEFAULT NULL,
  `child_dob` varchar(256) DEFAULT NULL,
  `father_name` varchar(256) DEFAULT NULL,
  `contact_no` varchar(256) DEFAULT NULL,
  `address` text,
  `fir_logged` varchar(156) NOT NULL,
  `cwc_order` varchar(156) NOT NULL,
  `fir_copy` text,
  `intervation_call` text,
  `image` text,
  `submitted_by` varchar(256) NOT NULL,
  `submitted_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `call_number`, `case_id`, `case_datetime`, `agent_name`, `ccc_category`, `subcategory`, `category_reason`, `child_name`, `child_dob`, `father_name`, `contact_no`, `address`, `fir_logged`, `cwc_order`, `fir_copy`, `intervation_call`, `image`, `submitted_by`, `submitted_datetime`, `status`) VALUES
(2, 'ashish', '123', '2020-11-18', 'ashish', 'asvsv', 'adasdaas', 'asdsad', 'shubham', '2020-11-17', 'ashishs', 'asdsad', 'gh', 'gh', 'adsad', 'asdsa', 'dry', 'childimage/logo.jpg', 'ashish', '2020-11-20 22:12:20', 1),
(3, 'ashish5', '123', '2020-11-17', 'ashish', 'adasd', 'adasdaas', 'asdsad', 'sanjay', '2020-11-11', 'ashishs', 'asdsad', 'aasxa', 'a', 'adsad', 'asdsa', 'axa', 'http://localhost/childline/childimage/logo1.png', 'ashish', '2020-11-21 06:11:46', 0),
(4, 'sourabh123', '126', '2020-11-04', 'sosis', 'adasd', 'adasdaas', 'asdsad', 'amit', '2020-11-18', 'ashishs', 'asdsad', 'adas', 'ASAADDA', 'aa', 'asdsa', 'asad', 'http://localhost/childline/childimage/Penguins.jpg', 'ashish', '2020-11-21 05:54:19', 0),
(5, 'c123', '6789', '2020-11-11T14:17', 'Ajay', 'PFA', 'Child Sexual Abuse', 'Molestation ', 'Anjali', '13 year', 'Rajendra', '9806519832', 'address', 'No', 'No', '', '', '', 'sheikh.mchildline1098', '2020-11-21 07:14:55', 1),
(6, 'sourabh', '262565', '2020-05-05T23:18', 'Anand ', 'PFA', 'Child Sexual Abuse', 'Rape', 'sanjay', '12', 'Rajesh', '', 'bhopal', 'Yes', 'Yes', '', '', '', 'sheikh.mchildline1098', '2020-11-21 07:18:41', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
