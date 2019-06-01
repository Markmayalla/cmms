-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2018 at 12:00 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `password`, `type`, `user_id`) VALUES
(1, 'mark@123', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL,
  `street` varchar(45) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `box` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `district`, `region`, `country`, `box`) VALUES
(1, 'K/koo machinga Complex, Posta / Mkwepu Street', 'Kinondoni', 'Dar es Salaam', 'Tanzania', '5081'),
(3, 'K/koo machinga Complex', 'Kinondoni', 'Dar es Salaam', 'Tanzania', '5081'),
(4, 'Massana, Mbezi Beach', 'Ilala', 'Dar es Salaam', 'Tanzania', '5081');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `Model Number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assets_has_categories`
--

CREATE TABLE IF NOT EXISTS `assets_has_categories` (
  `assets_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `authorities`
--

CREATE TABLE IF NOT EXISTS `authorities` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`) VALUES
(1, 'markmayalla@gmail.com'),
(2, 'info@cmms.co.tz'),
(3, 'support@cmms.co.tz');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`) VALUES
(2, 'CMMS');

-- --------------------------------------------------------

--
-- Table structure for table `organizations_has_addresses`
--

CREATE TABLE IF NOT EXISTS `organizations_has_addresses` (
  `organizations_id` int(11) NOT NULL,
  `addresses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations_has_addresses`
--

INSERT INTO `organizations_has_addresses` (`organizations_id`, `addresses_id`) VALUES
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `organizations_has_assets`
--

CREATE TABLE IF NOT EXISTS `organizations_has_assets` (
  `organizations_id` int(11) NOT NULL,
  `assets_id` int(11) NOT NULL,
  `serial_no` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `due_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organizations_has_assets_has_addresses`
--

CREATE TABLE IF NOT EXISTS `organizations_has_assets_has_addresses` (
  `organizations_has_assets_organizations_id` int(11) NOT NULL,
  `organizations_has_assets_assets_id` int(11) NOT NULL,
  `addresses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organizations_has_assets_has_services`
--

CREATE TABLE IF NOT EXISTS `organizations_has_assets_has_services` (
  `organizations_has_assets_organizations_id` int(11) NOT NULL,
  `organizations_has_assets_assets_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organizations_has_emails`
--

CREATE TABLE IF NOT EXISTS `organizations_has_emails` (
  `organizations_id` int(11) NOT NULL,
  `emails_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations_has_emails`
--

INSERT INTO `organizations_has_emails` (`organizations_id`, `emails_id`) VALUES
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `organizations_has_phones`
--

CREATE TABLE IF NOT EXISTS `organizations_has_phones` (
  `organizations_id` int(11) NOT NULL,
  `phones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations_has_phones`
--

INSERT INTO `organizations_has_phones` (`organizations_id`, `phones_id`) VALUES
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `organizations_has_users`
--

CREATE TABLE IF NOT EXISTS `organizations_has_users` (
  `organizations_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations_has_users`
--

INSERT INTO `organizations_has_users` (`organizations_id`, `users_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `title`, `number`) VALUES
(1, 'mob', '0654303353'),
(2, 'tel', '0222654356'),
(3, 'fax', '0222654358');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL,
  `request_types_id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `organizations_has_assets_organizations_id` int(11) NOT NULL,
  `organizations_has_assets_assets_id` int(11) NOT NULL,
  `description` longtext,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request_types`
--

CREATE TABLE IF NOT EXISTS `request_types` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL,
  `requests_id` int(11) NOT NULL,
  `workers_id` int(11) NOT NULL,
  `date_start` varchar(45) NOT NULL,
  `date_end` varchar(45) NOT NULL,
  `notes` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `gender`) VALUES
(1, 'mark', 'pascal', 'mayalla', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `users_has_addresses`
--

CREATE TABLE IF NOT EXISTS `users_has_addresses` (
  `users_id` int(11) NOT NULL,
  `addresses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_has_addresses`
--

INSERT INTO `users_has_addresses` (`users_id`, `addresses_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_has_emails`
--

CREATE TABLE IF NOT EXISTS `users_has_emails` (
  `users_id` int(11) NOT NULL,
  `emails_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_has_emails`
--

INSERT INTO `users_has_emails` (`users_id`, `emails_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_has_phones`
--

CREATE TABLE IF NOT EXISTS `users_has_phones` (
  `users_id` int(11) NOT NULL,
  `phones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_has_phones`
--

INSERT INTO `users_has_phones` (`users_id`, `phones_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_accounts_people_idx` (`user_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_has_categories`
--
ALTER TABLE `assets_has_categories`
  ADD PRIMARY KEY (`assets_id`,`categories_id`),
  ADD KEY `fk_assets_has_categories_categories1_idx` (`categories_id`),
  ADD KEY `fk_assets_has_categories_assets1_idx` (`assets_id`);

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations_has_addresses`
--
ALTER TABLE `organizations_has_addresses`
  ADD PRIMARY KEY (`organizations_id`,`addresses_id`),
  ADD KEY `fk_organizations_has_addresses_addresses1_idx` (`addresses_id`),
  ADD KEY `fk_organizations_has_addresses_organizations1_idx` (`organizations_id`);

--
-- Indexes for table `organizations_has_assets`
--
ALTER TABLE `organizations_has_assets`
  ADD PRIMARY KEY (`organizations_id`,`assets_id`),
  ADD KEY `fk_organizations_has_assets_assets1_idx` (`assets_id`),
  ADD KEY `fk_organizations_has_assets_organizations1_idx` (`organizations_id`);

--
-- Indexes for table `organizations_has_assets_has_addresses`
--
ALTER TABLE `organizations_has_assets_has_addresses`
  ADD PRIMARY KEY (`organizations_has_assets_organizations_id`,`organizations_has_assets_assets_id`,`addresses_id`),
  ADD KEY `fk_organizations_has_assets_has_addresses_addresses1_idx` (`addresses_id`),
  ADD KEY `fk_organizations_has_assets_has_addresses_organizations_has_idx` (`organizations_has_assets_organizations_id`,`organizations_has_assets_assets_id`);

--
-- Indexes for table `organizations_has_assets_has_services`
--
ALTER TABLE `organizations_has_assets_has_services`
  ADD PRIMARY KEY (`organizations_has_assets_organizations_id`,`organizations_has_assets_assets_id`,`services_id`),
  ADD KEY `fk_organizations_has_assets_has_services_services1_idx` (`services_id`),
  ADD KEY `fk_organizations_has_assets_has_services_organizations_has__idx` (`organizations_has_assets_organizations_id`,`organizations_has_assets_assets_id`);

--
-- Indexes for table `organizations_has_emails`
--
ALTER TABLE `organizations_has_emails`
  ADD PRIMARY KEY (`organizations_id`,`emails_id`),
  ADD KEY `fk_organizations_has_emails_emails1_idx` (`emails_id`),
  ADD KEY `fk_organizations_has_emails_organizations1_idx` (`organizations_id`);

--
-- Indexes for table `organizations_has_phones`
--
ALTER TABLE `organizations_has_phones`
  ADD PRIMARY KEY (`organizations_id`,`phones_id`),
  ADD KEY `fk_organizations_has_phones_phones1_idx` (`phones_id`);

--
-- Indexes for table `organizations_has_users`
--
ALTER TABLE `organizations_has_users`
  ADD PRIMARY KEY (`organizations_id`,`users_id`),
  ADD KEY `fk_organizations_has_users_users1_idx` (`users_id`),
  ADD KEY `fk_organizations_has_users_organizations1_idx` (`organizations_id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_requests_request_types1_idx` (`request_types_id`),
  ADD KEY `fk_requests_accounts1_idx` (`accounts_id`),
  ADD KEY `fk_requests_organizations_has_assets1_idx` (`organizations_has_assets_organizations_id`,`organizations_has_assets_assets_id`);

--
-- Indexes for table `request_types`
--
ALTER TABLE `request_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_requests1_idx` (`requests_id`),
  ADD KEY `fk_tasks_workers1_idx` (`workers_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_has_addresses`
--
ALTER TABLE `users_has_addresses`
  ADD PRIMARY KEY (`users_id`,`addresses_id`),
  ADD KEY `fk_people_has_addresses_addresses1_idx` (`addresses_id`),
  ADD KEY `fk_people_has_addresses_people1_idx` (`users_id`);

--
-- Indexes for table `users_has_emails`
--
ALTER TABLE `users_has_emails`
  ADD PRIMARY KEY (`users_id`,`emails_id`),
  ADD KEY `fk_people_has_emails_emails1_idx` (`emails_id`),
  ADD KEY `fk_people_has_emails_people1_idx` (`users_id`);

--
-- Indexes for table `users_has_phones`
--
ALTER TABLE `users_has_phones`
  ADD PRIMARY KEY (`users_id`,`phones_id`),
  ADD KEY `fk_people_has_phones_phones1_idx` (`phones_id`),
  ADD KEY `fk_people_has_phones_people1_idx` (`users_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_workers_accounts1_idx` (`accounts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `fk_accounts_people` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assets_has_categories`
--
ALTER TABLE `assets_has_categories`
  ADD CONSTRAINT `fk_assets_has_categories_assets1` FOREIGN KEY (`assets_id`) REFERENCES `assets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_assets_has_categories_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organizations_has_addresses`
--
ALTER TABLE `organizations_has_addresses`
  ADD CONSTRAINT `fk_organizations_has_addresses_addresses1` FOREIGN KEY (`addresses_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_addresses_organizations1` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organizations_has_assets`
--
ALTER TABLE `organizations_has_assets`
  ADD CONSTRAINT `fk_organizations_has_assets_assets1` FOREIGN KEY (`assets_id`) REFERENCES `assets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_assets_organizations1` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organizations_has_assets_has_addresses`
--
ALTER TABLE `organizations_has_assets_has_addresses`
  ADD CONSTRAINT `fk_organizations_has_assets_has_addresses_addresses1` FOREIGN KEY (`addresses_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_assets_has_addresses_organizations_has_a1` FOREIGN KEY (`organizations_has_assets_organizations_id`, `organizations_has_assets_assets_id`) REFERENCES `organizations_has_assets` (`organizations_id`, `assets_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organizations_has_assets_has_services`
--
ALTER TABLE `organizations_has_assets_has_services`
  ADD CONSTRAINT `fk_organizations_has_assets_has_services_organizations_has_as1` FOREIGN KEY (`organizations_has_assets_organizations_id`, `organizations_has_assets_assets_id`) REFERENCES `organizations_has_assets` (`organizations_id`, `assets_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_assets_has_services_services1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organizations_has_emails`
--
ALTER TABLE `organizations_has_emails`
  ADD CONSTRAINT `fk_organizations_has_emails_emails1` FOREIGN KEY (`emails_id`) REFERENCES `emails` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_emails_organizations1` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `organizations_has_phones`
--
ALTER TABLE `organizations_has_phones`
  ADD CONSTRAINT `fk_organizations_has_phones_organizations1` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_phones_phones1` FOREIGN KEY (`phones_id`) REFERENCES `phones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `organizations_has_users`
--
ALTER TABLE `organizations_has_users`
  ADD CONSTRAINT `fk_organizations_has_users_organizations1` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_users_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_requests_accounts1` FOREIGN KEY (`accounts_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_organizations_has_assets1` FOREIGN KEY (`organizations_has_assets_organizations_id`, `organizations_has_assets_assets_id`) REFERENCES `organizations_has_assets` (`organizations_id`, `assets_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_request_types1` FOREIGN KEY (`request_types_id`) REFERENCES `request_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_requests1` FOREIGN KEY (`requests_id`) REFERENCES `requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tasks_workers1` FOREIGN KEY (`workers_id`) REFERENCES `workers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_addresses`
--
ALTER TABLE `users_has_addresses`
  ADD CONSTRAINT `fk_people_has_addresses_addresses1` FOREIGN KEY (`addresses_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_people_has_addresses_people1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_has_emails`
--
ALTER TABLE `users_has_emails`
  ADD CONSTRAINT `fk_people_has_emails_emails1` FOREIGN KEY (`emails_id`) REFERENCES `emails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_people_has_emails_people1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_has_phones`
--
ALTER TABLE `users_has_phones`
  ADD CONSTRAINT `fk_people_has_phones_people1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_people_has_phones_phones1` FOREIGN KEY (`phones_id`) REFERENCES `phones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `fk_workers_accounts1` FOREIGN KEY (`accounts_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
