-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2023 at 01:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `adm_id` int NOT NULL,
  `adm_mail` varchar(50) NOT NULL,
  `adm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adm_id`, `adm_mail`, `adm_password`) VALUES
(1, 'admin@admin.fr', '$2y$10$QudcUAMK3LX8KUCz1MVz5ej68VRLT1m8EgvF9BbMnC7egwtuR3SES');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int NOT NULL,
  `emp_lastname` varchar(50) NOT NULL,
  `emp_firstname` varchar(50) NOT NULL,
  `emp_phonenumber` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `emp_mail` varchar(50) NOT NULL,
  `emp_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `expense_report`
--

CREATE TABLE `expense_report` (
  `exp_id` int NOT NULL,
  `exp_date` date NOT NULL,
  `exp_amount_ttc` decimal(15,3) NOT NULL,
  `exp_amount_ht` decimal(15,3) NOT NULL,
  `exp_description` text NOT NULL,
  `exp_proof` varchar(50) NOT NULL,
  `exp_cancel_reason` text,
  `exp_decision_date` date DEFAULT NULL,
  `typ_id` int NOT NULL,
  `sta_id` int NOT NULL DEFAULT '1',
  `emp_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sta_id` int NOT NULL,
  `sta_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`sta_id`, `sta_name`) VALUES
(1, 'en cours'),
(2, 'validée'),
(3, 'refusée');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `typ_id` int NOT NULL,
  `typ_name` varchar(50) NOT NULL,
  `typ_tva` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typ_id`, `typ_name`, `typ_tva`) VALUES
(1, 'habillage', 20),
(2, 'hébergement', 20),
(3, 'kilométrique', 20),
(4, 'repas', 10),
(5, 'déplacement', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `expense_report`
--
ALTER TABLE `expense_report`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `EXPENSE_REPORT_TYPE_FK` (`typ_id`),
  ADD KEY `EXPENSE_REPORT_STATUS0_FK` (`sta_id`),
  ADD KEY `EXPENSE_REPORT_EMPLOYEES1_FK` (`emp_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typ_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `adm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_report`
--
ALTER TABLE `expense_report`
  MODIFY `exp_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sta_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typ_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense_report`
--
ALTER TABLE `expense_report`
  ADD CONSTRAINT `EXPENSE_REPORT_EMPLOYEES1_FK` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `EXPENSE_REPORT_STATUS0_FK` FOREIGN KEY (`sta_id`) REFERENCES `status` (`sta_id`),
  ADD CONSTRAINT `EXPENSE_REPORT_TYPE_FK` FOREIGN KEY (`typ_id`) REFERENCES `type` (`typ_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
