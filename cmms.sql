-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 10:30 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `password`, `type`, `user_id`) VALUES
(1, 'markmayalla5991', NULL, 5),
(2, 'gadson', NULL, 6),
(3, 'password@123', NULL, 7),
(4, NULL, 'organization', 1),
(5, 'markmayalla', NULL, 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `district`, `region`, `country`, `box`) VALUES
(1, 'K/koo machinga Complex, Posta / Mkwepu Street', 'Kinondoni', 'Dar es Salaam', 'Tanzania', '5081'),
(2, 'K/koo machinga Complex, Posta / Mkwepu Street', 'Kinondoni', 'Dar es Salaam', 'Tanzania', '5081'),
(3, 'K/koo machinga Complex, Posta / Mkwepu Street', 'Kinondoni', 'Dar es Salaam', 'Tanzania', '5081'),
(4, 'K/koo machinga Complex', 'Dar', 'Kinondoni', 'Tanzania', '5081'),
(5, 'K/koo machinga Complex', 'dar es salaam', 'Kinondoni', 'Tanzania', '5081'),
(6, 'K/koo machinga Complex', 'dar es salaam', 'Kinondoni', 'Tanzania', '5081'),
(7, 'K/koo machinga Complex', 'dar es salaam', 'Kinondoni', 'Tanzania', '5081'),
(8, 'K/koo machinga Complex', 'Dar', 'Kinondoni', 'Tanzania', '5081');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `model_number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `model_number`) VALUES
(11, 'HP Printer', '800800'),
(12, 'Hp Laptop', '876594'),
(13, 'Hp Desktop', '8988992');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`) VALUES
(1, 'markmayalla@gmail.com'),
(2, 'dan@gmail.com'),
(3, 'din@gmail.com'),
(4, 'markmayalla@gmail.coms'),
(5, 'marc@gmail.com'),
(6, 'marc@gmail.com'),
(7, 'marc@gmail.com'),
(8, 'marc@gmail.com'),
(9, 'marc@gmail.com'),
(10, 'marc@gmail.com'),
(11, 'marc@gmail.com'),
(12, 'samiet@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`) VALUES
(1, 'Pepsi'),
(2, 'Coke'),
(3, 'Coke'),
(4, 'Coke'),
(5, 'Coke'),
(6, 'Coke'),
(7, 'Coke'),
(8, 'Coke');

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
(1, 4),
(7, 6),
(8, 7);

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
(1, 4),
(2, 5),
(3, 6),
(4, 7),
(5, 8),
(6, 9),
(7, 10),
(8, 11);

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
(1, 5),
(2, 6),
(3, 7),
(4, 8),
(5, 9),
(6, 10),
(7, 11),
(8, 12);

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
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `title`, `number`) VALUES
(1, 'home', '0654303353'),
(2, 'mob', '0654303354'),
(3, 'mob', '0888999999'),
(4, 'tel', '0888999991'),
(5, 'mob', '0654303355'),
(6, 'mob', '0555555555'),
(7, 'mob', '0555555555'),
(8, 'mob', '0555555555'),
(9, 'mob', '0555555555'),
(10, 'mob', '0555555555'),
(11, 'mob', '0555555555'),
(12, 'mob', '0555555555'),
(13, 'mob', '0655445544');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `gender`) VALUES
(1, 'mark', 'pascal', 'mayalla', 'male'),
(2, 'mark', 'pascal', 'mayalla', 'male'),
(3, 'mark', 'pascal', 'mayalla', 'male'),
(4, 'mark', 'pascal', 'mayalla', 'male'),
(5, 'mark', 'pascal', 'mayalla', 'male'),
(6, 'danny', 'paul', 'Gadson', 'male'),
(7, 'dan', 'den', 'din', 'male'),
(8, 'Samiet', 'Alal', 'Atieno', 'male');

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
(5, 1),
(6, 2),
(7, 3),
(8, 8);

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
(5, 1),
(7, 2),
(7, 3),
(8, 12);

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
(5, 1),
(6, 2),
(7, 3),
(7, 4),
(8, 13);

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
  ADD KEY `fk_organizations_has_phones_phones1_idx` (`phones_id`),
  ADD KEY `fk_organizations_has_phones_organizations1_idx` (`organizations_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
  ADD CONSTRAINT `fk_accounts_people` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_organizations_has_emails_emails1` FOREIGN KEY (`emails_id`) REFERENCES `emails` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_emails_organizations1` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organizations_has_phones`
--
ALTER TABLE `organizations_has_phones`
  ADD CONSTRAINT `fk_organizations_has_phones_organizations1` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizations_has_phones_phones1` FOREIGN KEY (`phones_id`) REFERENCES `phones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_people_has_addresses_addresses1` FOREIGN KEY (`addresses_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_people_has_addresses_people1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_emails`
--
ALTER TABLE `users_has_emails`
  ADD CONSTRAINT `fk_people_has_emails_emails1` FOREIGN KEY (`emails_id`) REFERENCES `emails` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_people_has_emails_people1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_phones`
--
ALTER TABLE `users_has_phones`
  ADD CONSTRAINT `fk_people_has_phones_people1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_people_has_phones_phones1` FOREIGN KEY (`phones_id`) REFERENCES `phones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `fk_workers_accounts1` FOREIGN KEY (`accounts_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
