-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 05:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `hci_attend`
--

CREATE TABLE `hci_attend` (
  `attend_id` varchar(30) NOT NULL,
  `event_id` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `event_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hci_events`
--

CREATE TABLE `hci_events` (
  `id` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `tagline` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `organizer` varchar(30) NOT NULL,
  `contactname` varchar(30) NOT NULL,
  `contactnum` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `startdate` varchar(30) NOT NULL,
  `enddate` varchar(30) NOT NULL,
  `starttime` varchar(30) NOT NULL,
  `endtime` varchar(30) NOT NULL,
  `image` longblob NOT NULL,
  `seats` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hci_events`
--

INSERT INTO `hci_events` (`id`, `category`, `name`, `description`, `tagline`, `location`, `organizer`, `contactname`, `contactnum`, `status`, `amount`, `startdate`, `enddate`, `starttime`, `endtime`, `image`, `seats`) VALUES
('E1234', 'Exhibition', 'Tech Symposium', 'For over seven years, SWIFT ha', 'A System-Administration Confer', 'Dewan Tunku Mahkota Ismail', 'Cyber UTHM', 'Encik Rizuan', '012-3323213', 'Pay', '20', '2019-03-02', '2019-03-03', '08:01', '12:02', 0x65766f6c7573692e6a7067, 189),
('e14223', 'Exhibition', 'Art Gallaria ', 'Art is a diverse range of huma', 'A hopeful passion', 'Dewan Sultan Ismail', 'FSKTM ', 'Encik Rizuan', '012-3323213', 'Free', '0', '2019-05-06', '2019-05-10', '14:00', '21:00', 0x77616c6c2d6172742d323835323233315f3936305f3732302e6a7067, 57),
('F1234', 'Sport', 'Pesta Futsal', 'Futsal is a variant of associa', 'One team, one dream', 'Court Futsal', 'FSKTM ', 'Harith', '013-2323211', 'Pay', '30', '2019-04-06', '2019-04-08', '09:00', '16:00', 0x46757473616c2d373530783435302e6a7067, 138),
('F1254', 'Festival', 'Gegar Vaganza', 'Konsert Gegar Vaganza 2018 mus', 'their voice your choice', 'Dataran Kawad', 'Cyber UTHM', 'Dr Zikri', '012-3323213', 'Pay', '5', '2019-08-05', '2019-09-07', '21:00', '12:00', 0x566964656f2d4c6976652d4756342d47656761722d566167616e7a612d323031372e6a7067, 313),
('S21312', 'Talk', 'Student and Money', 'lorem ipsum', 'How to handle your moneyhh!', 'Dewan Sultan Ismail', 'FSKTM ', 'Dr Zikri', '012-3323213', 'Pay', '10', '2019-05-05', '2019-05-06', '14:00', '17:00', 0x73747564656e742d66696e616e63652d313534313136323336392e6a7067, -1);

-- --------------------------------------------------------

--
-- Table structure for table `hci_users`
--

CREATE TABLE `hci_users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hci_users`
--

INSERT INTO `hci_users` (`username`, `password`, `type`, `email`) VALUES
('admin', 'admin', 'admin', ''),
('fiy', '12345', 'student', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hci_attend`
--
ALTER TABLE `hci_attend`
  ADD PRIMARY KEY (`attend_id`);

--
-- Indexes for table `hci_events`
--
ALTER TABLE `hci_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hci_users`
--
ALTER TABLE `hci_users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
