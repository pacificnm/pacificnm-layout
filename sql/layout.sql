-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 01, 2017 at 04:10 AM
-- Server version: 10.0.28-MariaDB-0+deb8u1
-- PHP Version: 5.6.29-0+deb8u1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE IF NOT EXISTS `layout` (
`layout_id` int(20) unsigned NOT NULL,
  `layout_name` varchar(100) NOT NULL,
  `layout_file` varchar(100) NOT NULL,
  `layout_active` int(3) unsigned NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `layout`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layout`
--
ALTER TABLE `layout`
 ADD PRIMARY KEY (`layout_id`), ADD UNIQUE KEY `layout_name` (`layout_name`), ADD UNIQUE KEY `layout_file` (`layout_file`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
MODIFY `layout_id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;SET FOREIGN_KEY_CHECKS=1;

