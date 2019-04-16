-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2019 at 01:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delta_scout`
--

-- --------------------------------------------------------

--
-- Table structure for table `management_companies`
--

CREATE TABLE `management_companies` (
  `management_id` int(11) NOT NULL,
  `management_phone` int(10) NOT NULL,
  `management_email` varchar(45) NOT NULL,
  `management_name` varchar(45) NOT NULL,
  `management_address` varchar(95) NOT NULL,
  `management_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

CREATE TABLE `property_amenities` (
  `amentites_id` int(11) NOT NULL,
  `parking` int(1) NOT NULL,
  `gated` int(1) NOT NULL,
  `furnished` int(1) NOT NULL,
  `laundry` int(1) NOT NULL,
  `wifi_cable` int(1) NOT NULL,
  `gym` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `property_listings`
--

CREATE TABLE `property_listings` (
  `listing_id` int(11) NOT NULL,
  `property_name` varchar(45) NOT NULL,
  `property_management_id` int(11) NOT NULL,
  `property_price` varchar(45) NOT NULL,
  `property_space_type_id` int(11) NOT NULL,
  `property_address` varchar(95) NOT NULL,
  `property_rating` int(1) DEFAULT NULL,
  `property_lease_duration` int(11) NOT NULL,
  `property_amenities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `property_space_types`
--

CREATE TABLE `property_space_types` (
  `space_type_id` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `management_companies`
--
ALTER TABLE `management_companies`
  ADD PRIMARY KEY (`management_id`);

--
-- Indexes for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD PRIMARY KEY (`amentites_id`);

--
-- Indexes for table `property_listings`
--
ALTER TABLE `property_listings`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `fk_property_listings_management_companies_idx` (`property_management_id`),
  ADD KEY `fk_property_listings_property_space_types1_idx` (`property_space_type_id`),
  ADD KEY `fk_property_listings_property_amenities1_idx` (`property_amenities_id`);

--
-- Indexes for table `property_space_types`
--
ALTER TABLE `property_space_types`
  ADD PRIMARY KEY (`space_type_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_listings`
--
ALTER TABLE `property_listings`
  ADD CONSTRAINT `fk_property_listings_management_companies0` FOREIGN KEY (`property_management_id`) REFERENCES `management_companies` (`management_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_property_listings_property_amenities10` FOREIGN KEY (`property_amenities_id`) REFERENCES `property_amenities` (`amentites_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_property_listings_property_space_types10` FOREIGN KEY (`property_space_type_id`) REFERENCES `property_space_types` (`space_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
