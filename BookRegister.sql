-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2019 at 03:19 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BookRegister`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `id` int(11) NOT NULL,
  `Förnamn` varchar(50) NOT NULL,
  `Efternamn` varchar(50) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `APIKey` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`id`, `Förnamn`, `Efternamn`, `Password`, `APIKey`) VALUES
(1, 'Axel', 'Placeholder', 'qwerty', 'qwertyuiop'),
(2, 'Toma', 'Placeholder', 'qwerty', 'qwertyuiop'),
(3, 'Eric', 'Beaussant', 'qwerty', 'qwertyuiop'),
(4, 'Axel', 'Placeholder', 'qwerty', 'qwertyuiop');

-- --------------------------------------------------------

--
-- Table structure for table `AuthorBooks`
--

CREATE TABLE `AuthorBooks` (
  `id` int(11) NOT NULL,
  `Autid` int(11) NOT NULL,
  `Bokid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthorBooks`
--

INSERT INTO `AuthorBooks` (`id`, `Autid`, `Bokid`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 3, 4),
(5, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Authors`
--

CREATE TABLE `Authors` (
  `id` int(11) NOT NULL,
  `Förnamn` varchar(20) NOT NULL,
  `Efternamn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`id`, `Förnamn`, `Efternamn`) VALUES
(1, 'Astrid', 'Lindgren'),
(2, 'JRR', 'Tolkien'),
(3, 'Phillipe', 'Beaussant'),
(4, 'JK', 'Rowling');

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `id` int(11) NOT NULL,
  `Namn` varchar(70) NOT NULL,
  `Beskrivning` varchar(150) DEFAULT NULL,
  `Sidantal` int(4) DEFAULT NULL,
  `Pubid` int(100) NOT NULL,
  `Catid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`id`, `Namn`, `Beskrivning`, `Sidantal`, `Pubid`, `Catid`) VALUES
(1, 'Pipi Långstrump', 'xrdctfyvgbuhinjomkp,lå.wxrydctufvygbhnjmwrxydctfglbhöunzgbfdöf vhjvcnmbjknergbknjbfdmfrv vfdnb nb fdvjhvfjh ', 230, 1, 1),
(2, 'Lord of the Rings', 'zrxetcryvtubyiunoimo pojlihkugjyhgcfxdzs', 666, 2, 2),
(3, 'Bilbo the hobbit', 'zrxetcryvtubyiunoimo pojlihkugjyhgcfxdzs', 666, 2, 2),
(4, 'Le roi soleil se lève aussi', 'zrxetcryvtubyiunoimo pojlihkugjyhgcfxdzs', 354, 3, 3),
(5, 'Harri Potter', 'zrxetcryvtubyiunoimo pojlihkugjyhgcfxdzs', 666, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Categori`
--

CREATE TABLE `Categori` (
  `id` int(11) NOT NULL,
  `Namn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Categori`
--

INSERT INTO `Categori` (`id`, `Namn`) VALUES
(1, 'Barn'),
(2, 'Äventyr'),
(3, 'Historisk Fiktion'),
(4, 'Science Fiction'),
(5, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `Publisher`
--

CREATE TABLE `Publisher` (
  `id` int(11) NOT NULL,
  `Namn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Publisher`
--

INSERT INTO `Publisher` (`id`, `Namn`) VALUES
(1, 'Bonniers'),
(2, 'Tryckeriet'),
(3, 'Galimard'),
(4, 'The printers');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `AuthorBooks`
--
ALTER TABLE `AuthorBooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Categori`
--
ALTER TABLE `Categori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Publisher`
--
ALTER TABLE `Publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `AuthorBooks`
--
ALTER TABLE `AuthorBooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Authors`
--
ALTER TABLE `Authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Categori`
--
ALTER TABLE `Categori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Publisher`
--
ALTER TABLE `Publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
