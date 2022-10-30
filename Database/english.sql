-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220905.b20d7f3a04
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 02:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `english`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('Admin', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Ques_ID` int(11) NOT NULL,
  `Question` varchar(2000) NOT NULL,
  `Ques_Read` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Ques_ID`, `Question`, `Ques_Read`) VALUES
(1, '2.mp3', 'Randy was told of a very tall tree on Vancouver Island. The tree was said to be 314 feet tall. That would make it the tallest tree in Canada. Randy set out to find the tree.'),
(2, '3.mp3', 'But someone else found it first. It was found by a logger. Loggers wanted to cut down Canada’s tallest tree and all the trees around it.'),
(3, '4.mp3', 'Randy made a path in the forest so people could see the tall tree. The tree was so big and beautiful it would fill them with awe. More and more people wanted to save that forest. Thanks to these people, that forest is now a park. Canada’s tallest tree is still there.'),
(4, '1.mp3', 'Canada’s tallest tree. A man named Randy liked to hunt trees. He looked for big trees and old trees. He made maps to show where these trees were. He did not want to cut them down. He wanted people to take care of them.'),
(5, '3.mp3', 'But someone else found it first. It was found by a logger. Loggers wanted to cut down Canada’s tallest tree and all the trees around it.');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `type` varchar(50) NOT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `response` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`type`, `rating`, `response`) VALUES
('Grammar', 3.63846, 13),
('Listening', 4.1, 21),
('Reading', 4.12, 8),
('Speaking', 3.94, 5),
('Writing', 4.13333, 3);

-- --------------------------------------------------------

--
-- Table structure for table `table_grammar`
--

CREATE TABLE `table_grammar` (
  `id` int(100) NOT NULL,
  `que` varchar(1000) NOT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `option_4` varchar(100) NOT NULL,
  `userans` text DEFAULT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_grammar`
--

INSERT INTO `table_grammar` (`id`, `que`, `option_1`, `option_2`, `option_3`, `option_4`, `userans`, `ans`) VALUES
(1, 'It took the child a long time to recover __________ the shock', 'over', 'about', 'under', 'from', 'over', 'from'),
(2, 'How much did it __________ to reach Colombo by car?', 'cost', 'price', 'cash', 'charge', 'cash', 'cost'),
(3, 'I will pay you back when I __________ a job.', 'get', 'will get', 'getting', 'gets', 'getting', 'get'),
(4, 'I __________ a terrible experience yesterday.', 'have', 'having', 'has', 'had', 'having', 'had'),
(5, 'Tell me if you __________ any help', 'needing', 'needed', 'need', 'needs', 'needing', 'need');

-- --------------------------------------------------------

--
-- Table structure for table `table_listening`
--

CREATE TABLE `table_listening` (
  `id` int(11) NOT NULL,
  `que` varchar(1000) NOT NULL,
  `option_1` varchar(500) NOT NULL,
  `option_2` varchar(500) NOT NULL,
  `option_3` varchar(500) NOT NULL,
  `option_4` varchar(500) NOT NULL,
  `ans` varchar(100) NOT NULL,
  `userans` varchar(500) DEFAULT NULL,
  `Ques_Read` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_listening`
--

INSERT INTO `table_listening` (`id`, `que`, `option_1`, `option_2`, `option_3`, `option_4`, `ans`, `userans`, `Ques_Read`) VALUES
(1, '1l1l.mp3', '11.45', '11.55', '12.45', '13.45', '11.55', '11.45', 'What time does the last film start'),
(2, '2l2l.mp3', '$78', '$50', '$40', '$30', '$50', '$50', 'Charlie spends about __________ a month on books'),
(3, '3l3l.mp3', '8', '2', '3', '1.5', '2', '2', 'Every year in the USA, __________ billion dollars are spent on wasted light'),
(4, '4l4l.mp3', 'crying', 'eating', 'sleeping', 'writing', 'crying', 'crying', 'She couldn\'t afford to waste any water, even by ________'),
(5, '5l5l.mp3', 'After 6 p.m', 'After 5 p.m', 'After 8.30 p.m', 'After 7 p.m', 'After 7 p.m', 'After 8.30 p.m', 'When can Peter call Anna? ');

-- --------------------------------------------------------

--
-- Table structure for table `table_speaking`
--

CREATE TABLE `table_speaking` (
  `id` int(255) NOT NULL,
  `que` varchar(2000) NOT NULL,
  `option_1` varchar(2000) NOT NULL,
  `option_2` varchar(2000) NOT NULL,
  `ans` varchar(2000) NOT NULL,
  `userans` varchar(2000) DEFAULT NULL,
  `que_read` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_speaking`
--

INSERT INTO `table_speaking` (`id`, `que`, `option_1`, `option_2`, `ans`, `userans`, `que_read`) VALUES
(1, '1t.mp3', 'Hooray !! I did it !', 'I will try next time', 'Hooray !! I did it !', 'Hooray !! I did it !', 'A big black bug bit the big black bear, but the big black bear bit the big black bug back'),
(2, '2t.mp3', 'Hooray !! I did it !', 'I will try next time', 'Hooray !! I did it !', 'I will try next time', 'Can you can a can as a canner can can a can'),
(3, '3t.mp3', 'Hooray !! I did it !', 'I will try next time', 'Hooray !! I did it !', 'Hooray !! I did it !', 'Four furious friends fought for the phone'),
(4, '4t.mp3', 'Hooray !! I did it !', 'I will try next time', 'Hooray !! I did it !', 'Hooray !! I did it !', 'One-one was a race horse. Two-two was one too. One-one won one race. Two-two won one too'),
(5, '5t.mp3', 'Hooray !! I did it !', 'I will try next time', 'Hooray !! I did it !', 'Hooray !! I did it !', 'Hooray !! I did it !');

-- --------------------------------------------------------

--
-- Table structure for table `table_writing`
--

CREATE TABLE `table_writing` (
  `id` int(11) NOT NULL,
  `que` varchar(2000) NOT NULL,
  `ans` varchar(500) NOT NULL,
  `userans` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_writing`
--

INSERT INTO `table_writing` (`id`, `que`, `ans`, `userans`) VALUES
(1, '1lis.mp3', 'come and help us', 'cat'),
(2, '2lis.mp3', 'the history class starts at nine', 'dog'),
(3, '3lis.mp3', 'this is based on fact', 'fill'),
(4, '4lis.mp3', 'she treated him like a king', 'come to our place'),
(5, '5lis.mp3', 'he wrote the report', 'dog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Ques_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `table_grammar`
--
ALTER TABLE `table_grammar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_listening`
--
ALTER TABLE `table_listening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_speaking`
--
ALTER TABLE `table_speaking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_writing`
--
ALTER TABLE `table_writing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Ques_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_grammar`
--
ALTER TABLE `table_grammar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_listening`
--
ALTER TABLE `table_listening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_speaking`
--
ALTER TABLE `table_speaking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `table_writing`
--
ALTER TABLE `table_writing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
