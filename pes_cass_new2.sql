-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2017 at 04:56 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pes_cass_new2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `email`, `password`) VALUES
(1, 1, 'markmayalla@gmail.com', '51e2d2ff06b2f8403164bb73d4c4e960');

-- --------------------------------------------------------

--
-- Table structure for table `basin`
--

CREATE TABLE IF NOT EXISTS `basin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conservation_groups`
--

CREATE TABLE IF NOT EXISTS `conservation_groups` (
  `basin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `document_type` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `publish_time` int(11) NOT NULL,
  `edit_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `page` varchar(30) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `page`, `heading`, `body`) VALUES
(1, 'home', 'PES_CASS', 'Payment for Ecosystem Services Collaborative Arrangement Support suite for Water Resources Management In Tanzania'),
(2, 'home', 'What is PES_CASS ?', 'Payment for Environmental Services Collaborative Arrangement Support Suite (PES_CASS) is a technology based instrument that follows studio-based approach integrated with suites to enhance awareness, networking, facilitation and incentives, performance guide and governance monitor for PES activities in Tanzania.  PES_CASS is equipped with guidelines, methods, tools and a technique in an environment that supports collaborative arrangements among PES actors. Collaborative arrangements apply studio based initiatives to bring technology, people and services together in combating unstructured arrangements and decisions (Tumwebaze, 2016; Katumba, 2016; Keen & Sol, 2008). Arrangements and decisions that are unstructured require wide information sharing and special care in integrating technology to facilitate collaboration of actors (OECD, 2015). Therefore PES_CASS is envisaged to increase the collaborative arrangement process agility of the PES actors through a combination of speed, flexibility, coordination, teamwork and innovation; governed with the spirit of coordination, service frameworks, trust and controls.'),
(3, 'home', 'Why PES_CASS!', 'The use of Payment for Ecosystem Services Collaborative Arrangement Support Suite (PES_CASS), considers the strength that PES schemes have collaborative arrangements with clearly define roles and responsibilities of the myriad stakeholders who benefit from ES. Thus PES schemes activities and assignments are collaboratively arranged with integrated and harmonized commands and controls, mandates and authorities, and procedures and conduct of various departments, ministries, authorities, associations, independent organizations and individuals with particular interests to water services and delivery. Further, the exploratory analysis clearly shows that, the poor delivery of ES were a results of these actors failing to seriously consider and undertake their commitments and assignments as collaboratively arranged due to poor services, trainings and experiences on PES collaborative arrangements. PES_CASS focus much on the application of ICT with the aim of taking people out of the loop that degrades collaborative arrangements of PES schemes in Tanzania.'),
(4, 'home', 'Who uses PES_CASS?', 'The Table will be filled in'),
(5, 'home', 'Terms and Conditions of Application of PES_CASS', 'The author examined issues that should be observed while using the PES_CASS for PES collaborative arrangement support.\n\n<ol>\n\n<li>\nPES_CASS participant should have clear terms and conditions for which he/she must assent to prior to admission. These help the PES_CASS actors to understand the intent of the actors’ presence on the PES_CASS as well as giving clear guidance of conduct particularly on what the different players are expected to deliver and the benefits they derive from the PES_CASS.\n</li>\n\n<li>\nMutually beneficial relationships for all actors on the PES_CASS should be a benefit for all participants on the PES_CASS. While all actors provide different input into the PES_CASS, they equally derive various benefits from the suite. PES actors can have their collaboration enhanced; conservators are able to access markets of the farm inputs and build their profiles; buyers get quick access to ES outputs from trusted sources; IGs are able to build their profiles through knowledge sharing and can benefit by selling their consultancy services to other actors; while regulators can use the PES_CASS to communicate and implement government policies.\n</li>\n\n<li>\nAll players on the PES_CASS should be vetted by the administrators to ensure transparency and regulation of the processes. Actors will be admitted to the PES_CASS because of their registration status (e.g. sellers, IGs, buyers and other interested parties) and qualifications (contribution to PES). This will lead to trust, commitment and involvement in the collaboration process and consequently regulation of the process.\n</li>\n\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `sub_village`
--

CREATE TABLE IF NOT EXISTS `sub_village` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `village` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `avatar` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `gender`, `region`, `district`, `village`, `street`, `avatar`) VALUES
(1, 'mark', 'pascal', 'mayalla', 'markmayalla@gmail.com', '0654303353', 'male', 'dar es salaam', 'kinondoni', '', 'elisa', 'C:akepath	anzania_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE IF NOT EXISTS `village` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conservation_groups`
--
ALTER TABLE `conservation_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_village`
--
ALTER TABLE `sub_village`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `conservation_groups`
--
ALTER TABLE `conservation_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sub_village`
--
ALTER TABLE `sub_village`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
