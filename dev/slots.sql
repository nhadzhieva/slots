-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 08:08 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `time` varchar(128) NOT NULL,
  `place` varchar(128) NOT NULL,
  `speaker` varchar(128) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `title`, `description`, `time`, `place`, `speaker`, `created`, `modified`) VALUES
(3, 'BlockChain', 'The blockchain is an undeniably ingenious invention â€“ the brainchild of a person or group of people known by the pseudonym,  Satoshi Nakamoto. But since then, it has evolved into something greater, and the main question every single person is asking is: What is Blockchain?\r\n\r\nBy allowing digital information to be distributed but not copied, blockchain technology created the backbone of a new type of internet. Originally devised for the digital currency, Bitcoin,  (Buy Bitcoin) the tech community is now finding other potential uses for the technology.', '14:00 - 14:20', 'HALL 325', 'A. Stoilov', '2015-08-02 12:04:03', '2018-06-30 16:29:32'),
(11, 'Why Math is useful', 'Tips and tricks why math is useful. Math is a subject that makes students either jump for joy or rip their hair out. However, math is inescapable as you become an adult in the real world. From calculating complicated algorithms to counting down the days till the next Game of Thrones episode, math is versatile and important, no matter how hard it is to admit. Before you decide to doze off in math class, consider this list of reasons why learning math is important to you and the world.', '15:00-15:30', 'HALL 013', 'Hristo Aleksandrov', '2018-06-30 17:13:55', '2018-06-30 16:58:51'),
(12, 'Big Data', 'To really understand big data, itâ€™s helpful to have some historical background. Hereâ€™s Gartnerâ€™s definition, circa 2001 (which is still the go-to definition): Big data is data that contains greater variety arriving in increasing volumes and with ever-higher velocity. This is known as the three Vs.\r\n\r\nPut simply, big data is larger, more complex data sets, especially from new data sources. These data sets are so voluminous that traditional data processing software just canâ€™t manage them. But these massive volumes of data can be used to address business problems you wouldnâ€™t have been able to tackle before.', '15:30 - 16:00', 'HALL 210', 'Dimitar Ivanov', '2018-06-30 19:00:50', '2018-06-30 17:00:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
