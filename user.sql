-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 08:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `webproject`

-- Table structure for table `user`

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `gender` VARCHAR(3) NOT NULL,
  `meat_preference` VARCHAR(255) DEFAULT 'default_value',
  `fish_preference` VARCHAR(255),
  `veg_preference` VARCHAR(255),
  `allergies` VARCHAR(255),
  `ability` VARCHAR(255),
  `morning` VARCHAR(255),
  `times` VARCHAR(255),
  `times2` VARCHAR(255),
  `others` VARCHAR(255),
  `date_of_birth` DATE,
  `height` INT,
  `current_weight` INT,
  `target_weight` INT,
  `gain` TINYINT(1),
  `muscle` TINYINT(1),
  `loss` TINYINT(1),
  `stress` TINYINT(1),
  `appearance` TINYINT(1),
  `others_goal` TINYINT(1),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- AUTO_INCREMENT for table `user`
-- ALTER TABLE `user` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;--


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
