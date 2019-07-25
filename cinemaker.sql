-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 08:03 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cinemaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE IF NOT EXISTS `cinema` (
  `nome` varchar(64) NOT NULL,
  `sale` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`nome`, `sale`) VALUES
('Il Cinemino', 4);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
`id` int(64) NOT NULL,
  `title` varchar(256) NOT NULL,
  `genre` varchar(256) DEFAULT NULL,
  `cast` varchar(1024) DEFAULT NULL,
  `director` varchar(256) DEFAULT NULL,
  `description` text,
  `duration` int(11) DEFAULT NULL,
  `cover` varchar(256) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `cast`, `director`, `description`, `duration`, `cover`) VALUES
(10, 'SPIDER-MAN: FAR FROM HOME', 'Animazione, Avventura, Fantascienza', 'Tom Holland, Jake Gyllenhaal, Zendaya', 'Jon Watts', 'In seguito agli eventi di Avengers: Endgame, Spider-Man deve rafforzarsi per affrontare nuove minacce in un mondo che non Ã¨ piÃ¹ quello di prima."Il nostro amichevole Spider-Man di quartiere" decide di partire per una vacanza in Europa con i suoi migliori amici Ned, MJ e con il resto del gruppo. I propositi di Peter di non indossare i panni del supereroe per alcune settimane vengono meno quando decide, a malincuore, di aiutare Nick Fury a svelare il mistero degli attacchi di creature elementali che stanno creando scompiglio in tutto il continente.', 124, 'res/5d21b8cf1219espiderman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `screening_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
`id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `seats_no` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `name`, `seats_no`) VALUES
(1, 'Tizio', 120),
(2, 'Caio', 230),
(3, 'Sempronio', 80),
(4, 'Ciccio', 240),
(5, 'Ciccio', 240);

-- --------------------------------------------------------

--
-- Table structure for table `screenings`
--

CREATE TABLE IF NOT EXISTS `screenings` (
`id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  `screening_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `isAdmin`) VALUES
(1, 'test', 'test@email.it', '098f6bcd4621d373cade4e832627b4f6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screenings`
--
ALTER TABLE `screenings`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `Screening_ak_1` (`movie_id`,`sala_id`,`screening_start`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `screenings`
--
ALTER TABLE `screenings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
