-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 09, 2024 at 08:45 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u417506272_dinjit_employe`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignedby`
--

CREATE TABLE `assignedby` (
  `assignedby_id` int(11) NOT NULL,
  `assignedby-nam` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assignedby`
--

INSERT INTO `assignedby` (`assignedby_id`, `assignedby-nam`) VALUES
(1, 'Lokesh Dama'),
(2, 'Durga'),
(3, 'Amulya');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` char(3) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
('ACD', 'Accounting Department'),
('ADM', 'Admin Department'),
('HRD', 'Human Resource Department'),
('ITD', 'Information Technology Department - Updated'),
('PCD', 'Production Controller Department'),
('PLD', 'Planner Department'),
('QCD', 'Quality Control Department'),
('SCD', 'Security Department'),
('STD', 'Store Department');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `employee_surname` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `employee_mobile` varchar(10) NOT NULL,
  `usertype` varchar(99) NOT NULL DEFAULT 'Admin',
  `employee_dateofbirth` text NOT NULL,
  `hire_date` text NOT NULL,
  `department_id` char(99) NOT NULL,
  `shift_id` varchar(99) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT 1,
  `creared_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `username`, `employee_surname`, `email`, `password`, `employee_mobile`, `usertype`, `employee_dateofbirth`, `hire_date`, `department_id`, `shift_id`, `status`, `creared_date`) VALUES
(1, 'Karthik', 'Varanasi', 'karthikvaranasi07@gmail.com', '834', '8179221358', 'Admin', '28-01-2001', '2023-06-15', 'ADM', '', 1, '2024-05-23 07:02:26'),
(2, 'shiva', 'Varanasi', 'karthik@gmail.com', '$2y$10$WH3yfhpjxV7eoOqSRykK3OcU1/hhLk2pc1WzzA49.i0ykAGKloToK', '8179221358', 'Admin', '2024-12-27', '2024-12-31', 'ADM', '1', 1, '2024-07-30 05:09:33'),
(3, 'sdmjcskjdcjhk', 'ksdcjksdjk', 'jsdckjd@gmail.com', '123', '1234567890', 'Employe', '2023-12-30', '2024-12-31', 'ADM', '1', 1, '2024-08-02 12:14:37'),
(4, 'lokesh', 'dama', 'dama@gmail.com', '$2y$10$1ZZHft3nh8lF2jgHRc3/cuHbNzGKcoCXJ.TqOP6H/NU', '1234567890', 'Admin', '2024-12-31', '2024-07-09', 'ADM', '1', 1, '2024-08-02 12:18:33'),
(5, 'karthik', 'varanasi', 'varanasi07@gmail.com', '$2y$10$k5RxTs0OoCIlXKGJxbLyXu4.mW97FN3ISrE.efrxrWI', '1234567890', 'Admin', '2024-12-31', '2024-12-31', 'ADM', '1', 1, '2024-08-02 12:21:01'),
(6, 'Vkarthik', 'vikki', 'vikki@gmail.com', '3fd1157d115a95d58202adb66eb5c397', '1234567890', 'Admin', '2023-12-30', '2024-12-31', 'ADM', '1', 1, '2024-08-02 13:14:48'),
(7, 'durga', 'durga', 'durga@gmail.com', '$2y$10$WH3yfhpjxV7eoOqSRykK3OcU1/hhLk2pc1WzzA49.i0ykAGKloToK', '1234567890', 'Admin', '2024-12-31', '2024-12-31', 'ADM', '1', 1, '2024-08-07 07:35:17'),
(8, 'Amulya', 'Amulya', 'amulya@gmail.com', '$2y$10$WH3yfhpjxV7eoOqSRykK3OcU1/hhLk2pc1WzzA49.i0ykAGKloToK', '1234567899', 'Employe', '2024-12-31', '2024-12-31', 'HRD', '1', 1, '2024-08-07 08:03:17'),
(9, '', '', '', '$2y$10$sAhzTTkLqRyPZMZcRMrjbu1O3L9/SiJn62t86EwTQ3LQhstTIDyke', '', 'SuperAdmin', '2024-12-31', '2024-12-31', 'ADM', '1', 1, '2024-08-07 08:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `inout_time`
--

CREATE TABLE `inout_time` (
  `Edate` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_time_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `In_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inout_time`
--

INSERT INTO `inout_time` (`Edate`, `login_time_id`, `employee_id`, `username`, `In_time`, `out_time`) VALUES
('2024-08-06 18:30:00', 1, 8, 'Amulya', '17:00:18', '17:09:57'),
('2024-08-06 18:30:00', 2, 8, 'Amulya', '17:09:14', '17:09:57'),
('2024-08-09 00:00:00', 3, 8, 'Amulya', '13:51:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `Leaved_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `department_id` char(99) NOT NULL,
  `leave_type` char(99) NOT NULL,
  `leave_reason` char(100) NOT NULL,
  `lstart_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_status` varchar(10) NOT NULL DEFAULT '1',
  `Currenttymstanp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`Leaved_id`, `employee_id`, `username`, `department_id`, `leave_type`, `leave_reason`, `lstart_date`, `end_date`, `leave_status`, `Currenttymstanp`) VALUES
(1, 0, 'Karthik', 'ACD', 'Leave', 'jhdjjs', '2024-01-01', '2024-12-31', '', '2024-07-29 13:08:05'),
(2, 2, 'shiva', 'ADM', 'Leave', 'Kajdnjk', '2024-12-31', '2024-12-31', '1', '2024-07-29 13:11:40'),
(4, 0, 'shiva', 'ADM', 'Leave', '', '0000-00-00', '0000-00-00', '2', '2024-08-06 08:52:35'),
(5, 0, 'sdmjcskjdcjhk', 'ACD', 'Leave', '', '2024-08-06', '2024-08-06', '', '2024-08-06 08:54:42'),
(6, 0, 'sdmjcskjdcjhk', 'ACD', 'Leave', '', '2024-12-31', '2024-12-31', '1', '2024-08-06 08:58:50'),
(7, 3, 'sdmjcskjdcjhk', 'COD', 'Leave', '', '2024-12-31', '2024-12-31', '1', '2024-08-06 09:00:04'),
(9, 8, 'Amulya', 'HRD', 'Leave', '', '2024-12-31', '2024-12-31', '1', '2024-08-07 08:11:48'),
(13, 2, 'shiva', 'HRD', 'Leave', '', '2023-01-30', '2024-08-08', '1', '2024-08-07 10:25:21'),
(10, 8, 'Amulya', 'HRD', 'Leave', '', '2024-12-31', '2024-12-31', '1', '2024-08-07 08:16:09'),
(11, 8, 'Amulya', 'HRD', 'Leave', 'test', '2024-12-31', '2024-12-31', '1', '2024-08-07 08:17:10'),
(12, 8, 'Amulya', 'HRD', 'Half Day', 'test2`', '2023-12-31', '2024-12-31', '2', '2024-08-07 08:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `start`, `end`) VALUES
(1, '08:00:00', '16:00:00'),
(2, '13:00:00', '21:00:00'),
(3, '18:00:00', '02:00:00'),
(4, '03:15:02', '02:05:05'),
(5, '07:00:00', '18:25:00'),
(6, '01:00:00', '12:00:00'),
(7, '09:30:00', '18:30:00'),
(8, '23:23:23', '23:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `timesheet_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `todays_work` varchar(255) NOT NULL,
  `assigned_by` text NOT NULL,
  `work_status` int(11) NOT NULL DEFAULT 1,
  `reasons` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`timesheet_id`, `employee_id`, `username`, `check_in`, `check_out`, `date`, `todays_work`, `assigned_by`, `work_status`, `reasons`) VALUES
(1, 0, '', '00:00:00', '00:00:00', '2024-07-29 11:53:28', '<p>Test</p>', '1', 0, 'Test'),
(2, 0, 'Karthik', '00:00:00', '00:00:00', '2024-07-29 11:55:10', '<p>Test</p>', '1', 0, 'Test'),
(3, 0, 'Karthik', '00:00:00', '00:00:00', '2024-07-29 11:56:08', '<p>ds</p>', '1', 0, 'ssdvcsw'),
(4, 0, 'Vikki', '00:00:00', '00:00:00', '2024-07-29 11:57:08', '<p>sdfsdfds</p>', '3', 1, 'sdfvcs'),
(5, 0, 'Karthik', '00:00:00', '00:00:00', '2024-07-29 11:58:36', '<p>test</p>', '2', 3, 'testg'),
(6, 0, 'Karthik', '00:00:00', '00:00:00', '2024-07-29 12:13:33', '<p>Test</p>', '1', 1, 'Test'),
(7, 0, 'Karthik', '00:00:00', '00:00:00', '2024-07-29 12:43:37', '<p>mdskmsksk</p>', '1', 1, 'skjd,cjs'),
(8, 0, 'Karthik', '00:00:00', '00:00:00', '2024-07-29 13:01:34', '', 'Leave', 0, ''),
(9, 0, 'Karthik', '00:00:00', '00:00:00', '2024-07-29 13:10:30', '<p>xmcjksjd</p>', '1', 1, 'mshdchj'),
(10, 0, 'Karthik', '00:00:00', '00:00:00', '2024-07-29 13:11:14', '<p>Last Test</p>', '1', 1, 'LastTest'),
(11, 1, 'Karthik', '00:00:00', '00:00:00', '2024-07-30 05:34:53', '<p>MANI</p>', '2', 3, 'JSDJJS'),
(12, 1, 'Karthik', '00:00:00', '00:00:00', '2024-07-30 05:42:37', '<p>Final with name</p>', 'Lokesh Dama', 0, 'done'),
(13, 1, 'Karthik', '00:00:00', '00:00:00', '2024-07-30 05:51:01', '<p>kakakakak</p>', 'Lokesh Dama', 0, 'sdjsj'),
(14, 1, 'Karthik', '00:00:00', '00:00:00', '2024-07-30 05:54:44', '<p>jhasdhjajaj</p>', 'Lokesh Dama', 0, 'sjsjsj'),
(15, 2, 'shiva', '00:00:00', '00:00:00', '2024-07-30 05:56:10', '<p>kksksk</p>', 'Durga', 1, 'sjdcj'),
(16, 1, 'Karthik', '10:02:00', '00:00:00', '2024-07-30 06:29:10', '<p>jasjaj</p>', 'Lokesh Dama', 0, 'skdhcsh'),
(17, 1, 'Karthik', '10:10:00', '06:15:00', '2024-07-30 06:40:16', '<p>sdsjjsjs</p>', 'Lokesh Dama', 0, 'skdcjs'),
(18, 2, 'shiva', '17:21:00', '19:22:00', '2024-08-01 09:51:00', '<p>nshdcjsgxcjsdcjksadjcajs</p>', 'Lokesh Dama', 0, 'hzaxhjszxjhasdhjxcs'),
(19, 0, 'dcsdc', '00:00:00', '00:00:00', '2024-08-02 11:47:16', '', '', 0, ''),
(20, 0, 'adhksakdjsak', '00:00:00', '00:00:00', '2024-08-02 11:49:36', '', '', 0, ''),
(21, 2, 'shiva', '03:00:00', '02:02:00', '2024-08-06 11:06:55', '<p>kxjcksjdkjcs</p>', 'Amulya', 0, ''),
(22, 2, 'shiva', '00:00:00', '00:00:00', '2024-08-06 11:07:42', '<p>sdsd</p>', 'Durga', 0, 'dcjsdc'),
(23, 2, 'shiva', '00:00:00', '00:00:00', '2024-08-06 11:10:01', '', '', 1, ''),
(24, 0, 'shiva', '23:59:00', '23:59:00', '2024-08-07 07:53:14', '<p>dfvh</p>', 'Lokesh Dama', 2, 'msdjc'),
(25, 8, 'Amulya', '20:59:00', '23:59:00', '2024-08-07 08:12:35', '<p>jsxks</p>', 'Lokesh Dama', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `userstatus_id` int(11) NOT NULL,
  `user_status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`userstatus_id`, `user_status`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `date_user` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `usertype`, `userid`, `date_user`) VALUES
(1, 'SuperAdmin', 1, '2024-08-09 08:14:21'),
(2, 'Admin', 2, '2024-08-09 08:14:21'),
(3, 'Employe', 3, '2024-08-09 08:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `work_status`
--

CREATE TABLE `work_status` (
  `work_status_id` int(11) NOT NULL,
  `work_status_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_status`
--

INSERT INTO `work_status` (`work_status_id`, `work_status_name`) VALUES
(1, 'Completed'),
(2, 'Incompleted'),
(3, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignedby`
--
ALTER TABLE `assignedby`
  ADD PRIMARY KEY (`assignedby_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `inout_time`
--
ALTER TABLE `inout_time`
  ADD PRIMARY KEY (`login_time_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`Leaved_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`timesheet_id`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`userstatus_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_status`
--
ALTER TABLE `work_status`
  ADD PRIMARY KEY (`work_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignedby`
--
ALTER TABLE `assignedby`
  MODIFY `assignedby_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inout_time`
--
ALTER TABLE `inout_time`
  MODIFY `login_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `Leaved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `timesheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `userstatus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_status`
--
ALTER TABLE `work_status`
  MODIFY `work_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
