-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2018 at 11:34 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wellness_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `user_type_secondary` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `email`, `password`, `user_type`, `user_type_secondary`) VALUES
(1, 1, 'kelvinkavenga@gmail.com', '911f5b6790d42a19970978e701d58240', 'user', 'gym'),
(2, 2, 'markmayalla@gmail.com', '9052d8503f8e9680109fcaa72055d213', 'admin', ''),
(3, 3, 'chriss@parker.com', '8dcf97c07af4313dc7d493fc79e60247', 'trainer', ''),
(4, 4, 'default@gym.com', 'd84d34224176f0f54b8abd65f639a547', 'gym', ''),
(5, 5, 'mike@gmail.com', '4da70ba5ea5b98c6f0b4466677bc4995', 'trainer', 'gym');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_forms`
--

CREATE TABLE IF NOT EXISTS `assessment_forms` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `height` varchar(30) NOT NULL,
  `current_weight` varchar(30) NOT NULL,
  `desired_weight` varchar(30) NOT NULL,
  `care_provider_name` varchar(11) NOT NULL,
  `care_provider_phone` varchar(30) NOT NULL,
  `care_provider_other` varchar(130) NOT NULL,
  `smoking_habbit` varchar(11) NOT NULL,
  `blood_pressure` varchar(11) NOT NULL,
  `diabetes` varchar(11) NOT NULL,
  `cardiovascular` varchar(11) NOT NULL,
  `cholesterol` varchar(11) NOT NULL,
  `athropaedic` varchar(11) NOT NULL,
  `prescribed_medication` varchar(11) NOT NULL,
  `dietary_suppliments` varchar(11) NOT NULL,
  `pregnancy` varchar(11) NOT NULL,
  `last_physical_examination` varchar(11) NOT NULL,
  `other_medical_conditions` varchar(150) NOT NULL,
  `current_exersises` varchar(200) NOT NULL,
  `hobbies` varchar(200) NOT NULL,
  `current_lifestyle` varchar(200) NOT NULL,
  `food_likes` varchar(200) NOT NULL,
  `food_dislike` varchar(200) NOT NULL,
  `fdi_breakfast` varchar(200) NOT NULL,
  `fdi_lunch` varchar(200) NOT NULL,
  `fdi_dinner` varchar(200) NOT NULL,
  `daily_water` varchar(11) NOT NULL,
  `daily_caffein` varchar(11) NOT NULL,
  `alcohol_consuption` varchar(11) NOT NULL,
  `skip_meals` varchar(11) NOT NULL,
  `exersise_likes` varchar(200) NOT NULL,
  `exersise_dislikes` varchar(200) NOT NULL,
  `nutrition_goals` varchar(200) NOT NULL,
  `exersise_goals` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_forms`
--

INSERT INTO `assessment_forms` (`id`, `account_id`, `height`, `current_weight`, `desired_weight`, `care_provider_name`, `care_provider_phone`, `care_provider_other`, `smoking_habbit`, `blood_pressure`, `diabetes`, `cardiovascular`, `cholesterol`, `athropaedic`, `prescribed_medication`, `dietary_suppliments`, `pregnancy`, `last_physical_examination`, `other_medical_conditions`, `current_exersises`, `hobbies`, `current_lifestyle`, `food_likes`, `food_dislike`, `fdi_breakfast`, `fdi_lunch`, `fdi_dinner`, `daily_water`, `daily_caffein`, `alcohol_consuption`, `skip_meals`, `exersise_likes`, `exersise_dislikes`, `nutrition_goals`, `exersise_goals`) VALUES
(1, 1, '', '', '', 'John Rush', '0766565764', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `care_provider`
--

CREATE TABLE IF NOT EXISTS `care_provider` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `others` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diets`
--

CREATE TABLE IF NOT EXISTS `diets` (
  `id` int(11) NOT NULL,
  `diet_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diet_meals`
--

CREATE TABLE IF NOT EXISTS `diet_meals` (
  `id` int(11) NOT NULL,
  `diet_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `si_unit` varchar(30) NOT NULL,
  `default_duration` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `met` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `si_unit`, `default_duration`, `description`, `met`) VALUES
(3, 'squat', 'rep', '0.618', 'Talk about an exercise', '8');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_programs`
--

CREATE TABLE IF NOT EXISTS `exercise_programs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `goal` varchar(30) NOT NULL,
  `workout_type` varchar(30) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `days_weekly` varchar(30) NOT NULL,
  `work_out_time` varchar(30) NOT NULL,
  `equipment_required` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise_programs`
--

INSERT INTO `exercise_programs` (`id`, `name`, `goal`, `workout_type`, `duration`, `days_weekly`, `work_out_time`, `equipment_required`, `description`) VALUES
(1, 'Weight Loss', 'Lose Fat all', 'Split', '1', '', '50', '', 'This is an eight week program. The rest periods change over the course of the eight weeks. This means every time you step in the gym, you’re going to have to bring it because the rest time will gradually decrease.');

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE IF NOT EXISTS `gyms` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `ward` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`id`, `admin_id`, `name`, `logo`, `description`, `phone`, `email`, `country`, `region`, `district`, `ward`, `street`, `lat`, `lng`) VALUES
(2, 1, 'sample', '', 'sample', '', '', 'tanzania', 'dar es salaam', 'kinondoni', 'kawe', 'mbezi beach', -6.812410, 39.294662),
(3, 5, 'collesseum', '', 'sample description', '', '', 'tanzania', 'coast', 'kinondoni', 'ostabey', 'haile selasie', -6.803411, 39.253815),
(4, 1, 'sea cliff', '', 'about sea cliff gym addon', '', '', 'tanzania', 'dar es salaam', 'kinondoni', 'masaki', 'sea cliff', -6.818922, 39.259480),
(5, 1, 'morogoro gym', '', 'about gym addition', '', '', 'tanzania', 'morogoro', 'morogoro town', 'rudewa', 'rudewa', -6.680046, 37.130535);

-- --------------------------------------------------------

--
-- Table structure for table `gym_pictures`
--

CREATE TABLE IF NOT EXISTS `gym_pictures` (
  `id` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(11) NOT NULL,
  `meal_name` varchar(30) NOT NULL,
  `meal_time` varchar(30) NOT NULL,
  `calories` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `meal_name`, `meal_time`, `calories`) VALUES
(4, 'Oatmeal with Fruit & Nuts', 'breakfast', ''),
(6, 'Spanish Chicken', 'lunch', '');

-- --------------------------------------------------------

--
-- Table structure for table `meals_categories`
--

CREATE TABLE IF NOT EXISTS `meals_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals_categories`
--

INSERT INTO `meals_categories` (`id`, `category_id`, `meal_id`) VALUES
(15, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `meals_components`
--

CREATE TABLE IF NOT EXISTS `meals_components` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `meal_element_id` int(11) NOT NULL,
  `meal_element_amount` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals_components`
--

INSERT INTO `meals_components` (`id`, `meal_id`, `meal_element_id`, `meal_element_amount`) VALUES
(18, 4, 8, 0.5),
(21, 4, 12, 1),
(22, 4, 11, 0.5),
(23, 4, 9, 0.5),
(24, 6, 11, 0.5),
(25, 6, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `meals_elements_categories`
--

CREATE TABLE IF NOT EXISTS `meals_elements_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals_elements_categories`
--

INSERT INTO `meals_elements_categories` (`id`, `name`) VALUES
(3, 'fruit'),
(4, 'Veggiee'),
(5, 'meat'),
(6, 'grain'),
(7, 'Liquid');

-- --------------------------------------------------------

--
-- Table structure for table `meal_categories`
--

CREATE TABLE IF NOT EXISTS `meal_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_categories`
--

INSERT INTO `meal_categories` (`id`, `name`) VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Sapper'),
(5, 'Desert');

-- --------------------------------------------------------

--
-- Table structure for table `meal_elements`
--

CREATE TABLE IF NOT EXISTS `meal_elements` (
  `id` int(11) NOT NULL,
  `element_name` varchar(30) NOT NULL,
  `dietary_fiber` varchar(30) NOT NULL,
  `suger` varchar(30) NOT NULL,
  `saturated_fat` varchar(30) NOT NULL,
  `polyunsaturated_fat` varchar(30) NOT NULL,
  `monounsaturated_fat` varchar(30) NOT NULL,
  `proteins` varchar(30) NOT NULL,
  `water` varchar(30) NOT NULL,
  `calories` varchar(30) NOT NULL,
  `si_unit` varchar(30) NOT NULL,
  `default_amount` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_elements`
--

INSERT INTO `meal_elements` (`id`, `element_name`, `dietary_fiber`, `suger`, `saturated_fat`, `polyunsaturated_fat`, `monounsaturated_fat`, `proteins`, `water`, `calories`, `si_unit`, `default_amount`) VALUES
(8, 'Oatmeal', '4', '1', '1', '1', '1', '6', '', '158', 'cup', '234'),
(9, 'Skim Milk', '', '13', '1.5', '0.1', '0.7', '8', '', '103', 'cup', '244'),
(10, 'Water', '', '', '', '', '', '', '', '0', 'cup', '237'),
(11, 'Apple', '4.4', '19', '0.1', '0.1', '', '0.5', '', '95', 'medium', '182'),
(12, 'Chopped walnuts', '0.5', '0.1', '0.3', '2.7', '1.2', '1.9', '', '48', 'tbs', '8');

-- --------------------------------------------------------

--
-- Table structure for table `meal_elements_types`
--

CREATE TABLE IF NOT EXISTS `meal_elements_types` (
  `id` int(11) NOT NULL,
  `meal_element_id` int(11) NOT NULL,
  `meal_element_category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_elements_types`
--

INSERT INTO `meal_elements_types` (`id`, `meal_element_id`, `meal_element_category_id`) VALUES
(15, 9, 7),
(20, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `meal_elements_vitamins`
--

CREATE TABLE IF NOT EXISTS `meal_elements_vitamins` (
  `id` int(11) NOT NULL,
  `meal_element_id` int(11) NOT NULL,
  `vitamins_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_elements_vitamins`
--

INSERT INTO `meal_elements_vitamins` (`id`, `meal_element_id`, `vitamins_id`) VALUES
(57, 8, 1),
(58, 8, 4),
(59, 8, 5),
(60, 8, 6),
(61, 9, 1),
(62, 9, 4),
(63, 9, 5),
(64, 9, 6),
(65, 9, 7),
(71, 12, 1),
(72, 12, 4),
(73, 12, 5),
(74, 12, 6),
(75, 12, 7),
(91, 11, 1),
(92, 11, 4),
(93, 11, 5),
(94, 11, 6),
(95, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `meal_programs`
--

CREATE TABLE IF NOT EXISTS `meal_programs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_programs`
--

INSERT INTO `meal_programs` (`id`, `name`, `description`, `duration`) VALUES
(1, '7 Day Vegetarian Meal Plan', 'Incorporating more plant-based foods into your diet is a great way to boost your health. A vegetarian diet has been shown to reduce your risk of heart disease, type-2 diabetes and even certain types of cancer. Whether you already follow a vegetarian diet or are just looking to go meatless sometimes, this 7-day, 1,200-calorie vegetarian meal plan makes it easy to eat your veggies! The registered dietitians and culinary experts at EatingWell have done the work for you and planned out a week of delicious vegetarian meals and snacks. Since it can be challenging to get certain nutrients when limiting animal products, we made sure to include a variety of healthy foods like nuts, whole grains, plenty of fruits and vegetables, and protein-rich beans and tofu. We also included the calorie totals next to each meal so you can swap things in and out to make this plan work for you. We hope you enjoy this week filled with nourishing and healthy meatless meals.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `program_exercises`
--

CREATE TABLE IF NOT EXISTS `program_exercises` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `exersise_id` int(11) NOT NULL,
  `reps` varchar(30) NOT NULL,
  `sets` varchar(30) NOT NULL,
  `intensity_method` varchar(30) NOT NULL,
  `day` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_meals`
--

CREATE TABLE IF NOT EXISTS `program_meals` (
  `id` int(11) NOT NULL,
  `meal_program_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `section` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_meals`
--

INSERT INTO `program_meals` (`id`, `meal_program_id`, `meal_id`, `day`, `section`) VALUES
(2, 1, 6, 2, 'breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL,
  `rating_category` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating_categories`
--

CREATE TABLE IF NOT EXISTS `rating_categories` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `description`) VALUES
(1, 'Yoga', ''),
(2, 'Zumba', ''),
(3, 'Weight Lifting', ''),
(4, 'Aerobics', ''),
(5, 'Personal Training', ''),
(6, 'Swimming & Aqua ', ''),
(7, 'Cardio Training', ''),
(8, 'Resistance & Strength', ''),
(9, 'Kick Boxing', ''),
(10, 'Nutrition (Fundamentals)', '');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE IF NOT EXISTS `trainers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `experience` int(11) NOT NULL,
  `languages` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `user_id`, `account_id`, `qualification`, `experience`, `languages`, `bio`, `picture`) VALUES
(2, 5, 5, 'certified', 9, '', 'Am a qualified personal trainer that can transform you health desires to archievements', 'chocolate-02.jpg'),
(5, 3, 3, 'certified', 7, 'English, Chinese', 'This is a sample trainer bio (Short description)', 'trainer2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_skills`
--

CREATE TABLE IF NOT EXISTS `trainer_skills` (
  `id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `rating_average` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_skills`
--

INSERT INTO `trainer_skills` (`id`, `skill_id`, `account_id`, `rating_average`) VALUES
(1, 2, 3, 2.5),
(2, 1, 3, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_skill_ratings`
--

CREATE TABLE IF NOT EXISTS `trainer_skill_ratings` (
  `id` int(11) NOT NULL,
  `trainer_skill_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `joining_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `surname`, `phone`, `email`, `gender`, `street`, `region`, `country`, `birth_date`, `avatar`, `joining_date`) VALUES
(1, 'Kelvin', 'Patrick', 'Kavenga', '0714521052', 'kelvinkavenga@gmail.com', 'male', 'K/koo machinga Complex, Posta ', 'Kinondoni', 'Tanzania', '1987-05-27', '', '2017-12-07'),
(2, 'mark', 'pascal', 'mayalla', '0654303353', 'markmayalla@gmail.com', 'male', 'Mbezi Beach', 'Kinondoni', 'Tanzania', '1995-08-19', '', '2017-12-07'),
(3, 'chriss', 'parker', 'D''soul', '+255654303353', 'chriss@parker.com', 'male', 'Halijandro', 'Demiso', 'Ghana', '1989-03-06', '', '2017-12-10'),
(4, 'Jack', 'Piper', 'Ritcher', '0755342345', 'default@gym.com', 'male', 'Masaki', 'Dar es salaam', 'Tanzania', '1990-07-27', '', '2017-12-27'),
(5, 'Mike', 'Geb', 'Yhdego', '0765435443', 'mike@gmail.com', 'male', 'Moi', 'Mombasa', 'Kenya', '1960-07-20', '', '2017-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `vitamins`
--

CREATE TABLE IF NOT EXISTS `vitamins` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vitamins`
--

INSERT INTO `vitamins` (`id`, `name`) VALUES
(1, 'Vitamin A'),
(3, 'Vitamin B'),
(4, 'Vitamin C'),
(5, 'Vitamin D'),
(6, 'Vitamin B-12'),
(7, 'Vitamin B-6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_forms`
--
ALTER TABLE `assessment_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `care_provider`
--
ALTER TABLE `care_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_programs`
--
ALTER TABLE `exercise_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_pictures`
--
ALTER TABLE `gym_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals_categories`
--
ALTER TABLE `meals_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals_components`
--
ALTER TABLE `meals_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals_elements_categories`
--
ALTER TABLE `meals_elements_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_categories`
--
ALTER TABLE `meal_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_elements`
--
ALTER TABLE `meal_elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_elements_types`
--
ALTER TABLE `meal_elements_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_elements_vitamins`
--
ALTER TABLE `meal_elements_vitamins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_programs`
--
ALTER TABLE `meal_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_exercises`
--
ALTER TABLE `program_exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_meals`
--
ALTER TABLE `program_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_skills`
--
ALTER TABLE `trainer_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vitamins`
--
ALTER TABLE `vitamins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `assessment_forms`
--
ALTER TABLE `assessment_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `care_provider`
--
ALTER TABLE `care_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exercise_programs`
--
ALTER TABLE `exercise_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gym_pictures`
--
ALTER TABLE `gym_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `meals_categories`
--
ALTER TABLE `meals_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `meals_components`
--
ALTER TABLE `meals_components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `meals_elements_categories`
--
ALTER TABLE `meals_elements_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `meal_categories`
--
ALTER TABLE `meal_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `meal_elements`
--
ALTER TABLE `meal_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `meal_elements_types`
--
ALTER TABLE `meal_elements_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `meal_elements_vitamins`
--
ALTER TABLE `meal_elements_vitamins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `meal_programs`
--
ALTER TABLE `meal_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program_exercises`
--
ALTER TABLE `program_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program_meals`
--
ALTER TABLE `program_meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trainer_skills`
--
ALTER TABLE `trainer_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vitamins`
--
ALTER TABLE `vitamins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
