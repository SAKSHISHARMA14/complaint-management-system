-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 02:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `log`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1001, 'Sakshi', 'Sakshi', '14-11-2019 08:29:07 PM');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(7, 5, 'in process', 'Ok we will look after this problem.', '2020-02-27 14:46:00'),
(8, 6, 'in process', 'Ok we will look after this problem.', '2020-02-27 14:47:34'),
(9, 7, 'closed', 'OK i will let this practical issues will be surely informed to the particular department.', '2020-02-27 14:53:57'),
(11, 16, 'in process', 'ok we will look after this.', '2020-02-28 06:11:27'),
(13, 17, 'in process', 'Yes i am agree with u suggestion i will look to this complaint and definitely try to solve it soon.', '2020-03-05 13:22:53'),
(14, 18, 'in process', 'The work is on progress of computer system.soon it will be done.\r\none at a time 45 student can connect for 45 min so each student can connect the range is that much only.', '2020-03-11 12:07:29'),
(15, 5, 'closed', 'your problem is solved.', '2020-03-11 12:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `complaintDetails` mediumtext DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `complaintDetails`, `regDate`, `status`, `lastUpdationDate`) VALUES
(5, 7, 'hello', '2020-01-16 01:56:01', 'closed', '2020-03-11 12:08:56'),
(6, 8, 'internet facility should be fast show that everyone can excess.', '2020-02-27 14:43:40', 'in process', '2020-02-27 14:47:34'),
(7, 9, 'In college  CS Practical timing should be increased.', '2020-02-27 14:51:08', 'closed', '2020-02-27 14:53:57'),
(8, 9, 'Bsc. timing should be changed.\r\n', '2020-02-27 14:51:49', 'closed', '2020-02-28 19:13:18'),
(9, 15, 'Bsc. college timing should be changed.\r\n', '2020-02-27 21:43:01', 'closed', '2020-02-28 20:17:30'),
(16, 16, 'COURSE  SHOULD BE COMPLETE ON TIME SO THAT WE GET TIME OF REVISION.', '2020-02-28 06:06:31', 'in process', '2020-02-28 06:11:27'),
(17, 18, 'Canteen is not having proper food.\r\nit should have a complete meal so that hostelers can get good quality food.', '2020-03-05 13:04:31', 'in process', '2020-03-05 13:22:53'),
(18, 18, 'Most of the system in reading room are not properly working.\r\nWIFI is not working in the mobile phones.  ', '2020-03-05 13:07:05', 'in process', '2020-03-11 12:07:29'),
(19, 19, 'Dress code should be changed of the college. there should be allowed every kind of dress in campus', '2020-03-11 12:15:41', 'closed', '2020-03-11 12:18:07'),
(20, 20, 'Parking should be free of cause and there should be proper place parking.', '2020-03-12 12:16:29', NULL, NULL),
(21, 21, 'Attendence should be online not manually .', '2020-03-12 13:29:22', NULL, NULL),
(22, 22, 'canteen  should be big some more item should be increased in canteen.', '2020-03-12 13:33:12', NULL, NULL),
(23, 23, 'There should be proper sport filed  of our own college.\r\nGYM should be developed or rebuilt.', '2020-03-12 13:37:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` time DEFAULT '00:00:00',
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `regDate`, `updationDate`, `status`) VALUES
(7, 'Rajendra', 'raj@gmail.com', '123', 9009112115, '2020-01-15 23:34:29', '00:00:00', 1),
(8, 'Sakshi Sharma', 'sakshi@gmail.com', '1234', 2356262756, '2020-02-27 13:13:52', '00:00:00', 1),
(9, 'Sheril Thomas', 'sheril@gmail.com', 'abcd', 9898767854, '2020-02-27 14:49:05', '00:00:00', 1),
(10, 'Rashi Sharma', 'rashi@gmail.com', 'rashi', 8989765675, '2020-02-27 17:22:36', '00:00:00', 1),
(11, 'Rashi Sharma', 'rashi@gmail.com', 'rashi', 8989765675, '2020-02-27 17:35:52', '00:00:00', 1),
(13, 'Shivang Ashti', 'shivu@gmail.com', 'shivu', 8978643655, '2020-02-27 17:37:24', '00:00:00', 1),
(14, 'Shivang Ashti', 'shivu@gmail.com', 'shivu', 8978643655, '2020-02-27 18:11:18', '00:00:00', 1),
(15, 'Ansh Sharma', 'ansh@gmail.com', 'ansh', 7896575456, '2020-02-27 21:41:24', '00:00:00', 1),
(16, 'SAMEEKSHA VINODIYA', 'sh@gmail.com', 'sh111', 4325437689, '2020-02-28 05:59:40', '00:00:00', 1),
(18, 'Preeti Sharma', 'preeti@gmail.com', 'preeti', 6262754833, '2020-03-05 12:56:26', '00:00:00', 1),
(19, 'Disha Nayak', 'disha@gmail.com', 'disha', 7864532109, '2020-03-11 12:13:15', '00:00:00', 1),
(20, 'Shailendra  Garg', 'shail@gmail.com', '123', 9864843846, '2020-03-12 12:15:05', '00:00:00', 1),
(21, 'Ratnakar Nayak', 'rk@gmail.com', '2505', 8976799557, '2020-03-12 13:27:20', '00:00:00', 1),
(22, 'Jagadananda Mohanta', 'jd@gmail.com', '1609', 9866557868, '2020-03-12 13:30:44', '00:00:00', 1),
(23, 'Vijeta nand Gautam', 'vj@gmail.com', '1234', 9876567895, '2020-03-12 13:34:52', '00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
