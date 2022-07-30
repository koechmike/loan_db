-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.28 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for loan
DROP DATABASE IF EXISTS `loan`;
CREATE DATABASE IF NOT EXISTS `loan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `loan`;

-- Dumping structure for table loan.aboutus
DROP TABLE IF EXISTS `aboutus`;
CREATE TABLE IF NOT EXISTS `aboutus` (
  `abid` int NOT NULL AUTO_INCREMENT,
  `about` text NOT NULL,
  PRIMARY KEY (`abid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table loan.aboutus: ~0 rows (approximately)

-- Dumping structure for table loan.additional_fees
DROP TABLE IF EXISTS `additional_fees`;
CREATE TABLE IF NOT EXISTS `additional_fees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `fee` varchar(200) NOT NULL,
  `Amount` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.additional_fees: ~6 rows (approximately)
INSERT INTO `additional_fees` (`id`, `get_id`, `tid`, `fee`, `Amount`) VALUES
	(20, '1', 'Loan=1907598678', 'dddd', '7888'),
	(21, '2', 'Loan=21319580', 'Late Payment', '4000'),
	(22, '3', 'Loan=21319580', '', ''),
	(23, '5', 'Loan=21319580', 'Late Payment', '2000'),
	(26, '6', 'Loan=21319580', 'Late Payment', '200'),
	(27, '6', 'Loan=21319580', 'Fine', '128');

-- Dumping structure for table loan.attachment
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `attached_file` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.attachment: ~3 rows (approximately)
INSERT INTO `attachment` (`id`, `get_id`, `tid`, `attached_file`, `date_time`) VALUES
	(1, '1', 'Loan=1907598678', 'document/4887_File_cryptos documentation.docx', '2017-05-01 12:11:34'),
	(2, '2', 'Loan=21319580', 'document/2782_File_Email.docx', '2017-05-10 16:56:55'),
	(3, '5', 'Loan=21319580', 'document/2045_File_Marksheet Management System.docx', '2017-05-13 13:45:57');

-- Dumping structure for table loan.backup
DROP TABLE IF EXISTS `backup`;
CREATE TABLE IF NOT EXISTS `backup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tracking_id` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.backup: ~4 rows (approximately)
INSERT INTO `backup` (`id`, `tracking_id`, `amount`, `address`, `date_time`) VALUES
	(10, 'Cryptos?rid=782752', '0.1', '134N7BmQZHSj2WU7kUaN8fFada32GpBXbg', '2017-04-03 14:37:40'),
	(11, 'Cryptos?rid=782752', '0.1', '134N7BmQZHSj2WU7kUaN8fFada32GpBXbg', '2017-04-03 15:14:12'),
	(15, 'Cryptos?rid=782752', '0.1', '134N7BmQZHSj2WU7kUaN8fFada32GpBXbg', '2017-04-03 16:30:28'),
	(18, 'Cryptos?rid=782752', '0.15', '134N7BmQZHSj2WU7kUaN8fFada32GpBXbg', '2017-04-03 17:59:36');

-- Dumping structure for table loan.banner
DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `banaid` int NOT NULL AUTO_INCREMENT,
  `bannar` text NOT NULL,
  PRIMARY KEY (`banaid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.banner: ~1 rows (approximately)
INSERT INTO `banner` (`banaid`, `bannar`) VALUES
	(3, 'bannar/sld2.jpg');

-- Dumping structure for table loan.battachment
DROP TABLE IF EXISTS `battachment`;
CREATE TABLE IF NOT EXISTS `battachment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `attached_file` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.battachment: ~5 rows (approximately)
INSERT INTO `battachment` (`id`, `get_id`, `tid`, `attached_file`, `date_time`) VALUES
	(1, '1', 'Loan=1907598678', 'bdocument/5605_File_Below is the screenshot of the welcome mail sent to me when I registered with namecheap.docx', '2017-05-01 17:30:28'),
	(2, '1', 'Loan=1907598678', 'bdocument/2630_File_Below is the screenshot of the welcome mail sent to me when I registered with namecheap.docx', '2017-05-01 17:32:52'),
	(3, '2', 'Loan=1907598678', 'bdocument/6815_File_cryptos documentation.docx', '2017-05-01 17:38:20'),
	(4, '3', 'Loan=21319580', 'bdocument/2739_File_INTRODUCTION TO NIGERIA SOCIAL LIFE AND EARLY CIVILIZATION.docx', '2017-05-01 19:35:25'),
	(5, '4', 'Loan=21319580', 'bdocument/4525_File_ESTHER.docx', '2017-05-13 13:32:51');

-- Dumping structure for table loan.borrowers
DROP TABLE IF EXISTS `borrowers`;
CREATE TABLE IF NOT EXISTS `borrowers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `addrs1` text NOT NULL,
  `addrs2` text NOT NULL,
  `comment` text NOT NULL,
  `account` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL,
  `idNumber` varchar(45) DEFAULT NULL,
  `maritalStatus` varchar(45) DEFAULT NULL,
  `powName` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `powAddress` varchar(45) DEFAULT NULL,
  `powTown` varchar(45) DEFAULT NULL,
  `powContact` int DEFAULT NULL,
  `powEmail` varchar(45) DEFAULT NULL,
  `nokName` varchar(45) DEFAULT NULL,
  `nokEmail` varchar(45) DEFAULT NULL,
  `nokContact` int DEFAULT NULL,
  `nokRelationship` varchar(45) DEFAULT NULL,
  `nokResidence` varchar(45) DEFAULT NULL,
  `nokIdNumber` varchar(45) DEFAULT NULL,
  `iName` varchar(45) DEFAULT NULL,
  `iDob` date DEFAULT NULL,
  `iContact` int DEFAULT NULL,
  `iResidence` varchar(45) DEFAULT NULL,
  `iIdNumber` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.borrowers: ~15 rows (approximately)
INSERT INTO `borrowers` (`id`, `fname`, `lname`, `email`, `phone`, `addrs1`, `addrs2`, `comment`, `account`, `balance`, `image`, `date_time`, `status`, `idNumber`, `maritalStatus`, `powName`, `position`, `powAddress`, `powTown`, `powContact`, `powEmail`, `nokName`, `nokEmail`, `nokContact`, `nokRelationship`, `nokResidence`, `nokIdNumber`, `iName`, `iDob`, `iContact`, `iResidence`, `iIdNumber`) VALUES
	(17, 'Ayanna', 'Brielle', 'sizomokyx@mailinator.com', 'Hedda', 'Fritz', 'Deanna', '', '', '0', NULL, '2022-07-25 21:07:52', 'Pending', '658', '2', 'Nadine', 'Hadassah', 'Neve', 'Ira', 590, 'kyfenyqax@mailinator.com', 'Flavia', 'turojo@mailinator.com', 742, '2', 'Cherokee', '129', 'Xander', '1981-07-30', 420, 'Chadwick', '131'),
	(18, 'Kameko', 'Joan', 'xodamefohi@mailinator.com', 'Dai', 'Cassady', 'Leandra', '', '', '0', NULL, '2022-07-25 21:17:09', 'Pending', '349', '1', 'Octavius', 'Kuame', 'Sylvia', 'Derek', 389, 'sovebol@mailinator.com', 'Willa', 'rowizilyh@mailinator.com', 230, '4', 'Marah', '296', 'Joy', '2021-06-30', 139, 'Lila', '367'),
	(19, 'Kameko', 'Joan', 'xodamefohi@mailinator.com', 'Dai', 'Cassady', 'Leandra', '', '', '0', NULL, '2022-07-25 21:18:50', 'Pending', '349', '1', 'Octavius', 'Kuame', 'Sylvia', 'Derek', 389, 'sovebol@mailinator.com', 'Willa', 'rowizilyh@mailinator.com', 230, '4', 'Marah', '296', 'Joy', '2021-06-30', 139, 'Lila', '367'),
	(20, 'Kameko', 'Joan', 'xodamefohi@mailinator.com', 'Dai', 'Cassady', 'Leandra', '', '', '0', NULL, '2022-07-25 21:20:10', 'Pending', '349', '1', 'Octavius', 'Kuame', 'Sylvia', 'Derek', 389, 'sovebol@mailinator.com', 'Willa', 'rowizilyh@mailinator.com', 230, '4', 'Marah', '296', 'Joy', '2021-06-30', 139, 'Lila', '367'),
	(21, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:20:31', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(22, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:29:45', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(23, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:31:39', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(24, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:35:03', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(25, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:36:25', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(26, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:37:16', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(27, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:37:30', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(28, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:37:43', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(29, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:38:33', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(30, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:38:57', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90'),
	(31, 'Ann', 'Olga', 'viqygok@mailinator.com', 'Heidi', 'Cassidy', 'Amery', '', '', '0', NULL, '2022-07-25 21:39:08', 'Pending', '231', '2', 'Latifah', 'Karleigh', 'Clayton', 'Octavia', 669, 'zymapapek@mailinator.com', 'Amena', 'kuka@mailinator.com', 433, '4', 'Buffy', '670', 'Allen', '2022-04-05', 119, 'Samantha', '90');

-- Dumping structure for table loan.calculation_method
DROP TABLE IF EXISTS `calculation_method`;
CREATE TABLE IF NOT EXISTS `calculation_method` (
  `methodId` int NOT NULL,
  `methodName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`methodId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table loan.calculation_method: ~3 rows (approximately)
INSERT INTO `calculation_method` (`methodId`, `methodName`) VALUES
	(1, 'Reducing Balance'),
	(2, 'Straight Line'),
	(3, 'Armotized');

-- Dumping structure for table loan.collateral
DROP TABLE IF EXISTS `collateral`;
CREATE TABLE IF NOT EXISTS `collateral` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idm` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type_of_collateral` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `make` varchar(200) NOT NULL,
  `serial_number` varchar(200) NOT NULL,
  `estimated_price` varchar(200) NOT NULL,
  `proof_of_ownership` text NOT NULL,
  `cimage` text NOT NULL,
  `observation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.collateral: ~3 rows (approximately)
INSERT INTO `collateral` (`id`, `idm`, `tid`, `name`, `type_of_collateral`, `model`, `make`, `serial_number`, `estimated_price`, `proof_of_ownership`, `cimage`, `observation`) VALUES
	(1, '1', 'Loan=1907598678', 'bhhh', 'jhhhjk', 'hhh', 'hkkhkk', '87877878', '78787', '', 'cimage/9fdfcacaa4d943e0328bd32e35a40035ebdc7a9b.png', 'hkjkl'),
	(2, '2', 'Loan=21319580', 'Mr Segun O', 'New', 'LOAN2011', 'NEWLOAN', 'LOANS20166', '40000', '', 'cimage/OPTIMUM LOGO FINAL .png', 'This is just testing'),
	(3, '5', 'Loan=21319580', 'Plot of Land', 'Land', 'Land', 'Land', 'Receipt', '20000', '', 'cimage/fair.png', 'Good for the application of the loan');

-- Dumping structure for table loan.countries
DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `alpha_2` varchar(200) NOT NULL DEFAULT '',
  `alpha_3` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=250 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table loan.countries: 249 rows
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `name`, `alpha_2`, `alpha_3`) VALUES
	(1, 'Afghanistan', 'fl', 'afg'),
	(2, 'Aland Islands', 'ax', 'ala'),
	(3, 'Albania', 'al', 'alb'),
	(4, 'Algeria', 'dz', 'dza'),
	(5, 'American Samoa', 'as', 'asm'),
	(6, 'Andorra', 'ad', 'and'),
	(7, 'Angola', 'ao', 'ago'),
	(8, 'Anguilla', 'ai', 'aia'),
	(9, 'Antarctica', 'aq', 'ata'),
	(10, 'Antigua and Barbuda', 'ag', 'atg'),
	(11, 'Argentina', 'ar', 'arg'),
	(12, 'Armenia', 'am', 'arm'),
	(13, 'Aruba', 'aw', 'abw'),
	(14, 'Australia', 'au', 'aus'),
	(15, 'Austria', 'at', 'aut'),
	(16, 'Azerbaijan', 'az', 'aze'),
	(17, 'Bahamas', 'bs', 'bhs'),
	(18, 'Bahrain', 'bh', 'bhr'),
	(19, 'Bangladesh', 'bd', 'bgd'),
	(20, 'Barbados', 'bb', 'brb'),
	(21, 'Belarus', 'by', 'blr'),
	(22, 'Belgium', 'be', 'bel'),
	(23, 'Belize', 'bz', 'blz'),
	(24, 'Benin', 'bj', 'ben'),
	(25, 'Bermuda', 'bm', 'bmu'),
	(26, 'Bhutan', 'bt', 'btn'),
	(27, 'Bolivia, Plurinational State of', 'bo', 'bol'),
	(28, 'Bonaire, Sint Eustatius and Saba', 'bq', 'bes'),
	(29, 'Bosnia and Herzegovina', 'ba', 'bih'),
	(30, 'Botswana', 'bw', 'bwa'),
	(31, 'Bouvet Island', 'bv', 'bvt'),
	(32, 'Brazil', 'br', 'bra'),
	(33, 'British Indian Ocean Territory', 'io', 'iot'),
	(34, 'Brunei Darussalam', 'bn', 'brn'),
	(35, 'Bulgaria', 'bg', 'bgr'),
	(36, 'Burkina Faso', 'bf', 'bfa'),
	(37, 'Burundi', 'bi', 'bdi'),
	(38, 'Cambodia', 'kh', 'khm'),
	(39, 'Cameroon', 'cm', 'cmr'),
	(40, 'Canada', 'ca', 'can'),
	(41, 'Cape Verde', 'cv', 'cpv'),
	(42, 'Cayman Islands', 'ky', 'cym'),
	(43, 'Central African Republic', 'cf', 'caf'),
	(44, 'Chad', 'td', 'tcd'),
	(45, 'Chile', 'cl', 'chl'),
	(46, 'China', 'cn', 'chn'),
	(47, 'Christmas Island', 'cx', 'cxr'),
	(48, 'Cocos (Keeling) Islands', 'cc', 'cck'),
	(49, 'Colombia', 'co', 'col'),
	(50, 'Comoros', 'km', 'com'),
	(51, 'Congo', 'cg', 'cog'),
	(52, 'Congo, The Democratic Republic of the', 'cd', 'cod'),
	(53, 'Cook Islands', 'ck', 'cok'),
	(54, 'Costa Rica', 'cr', 'cri'),
	(55, 'Cote d\'Ivoire', 'ci', 'civ'),
	(56, 'Croatia', 'hr', 'hrv'),
	(57, 'Cuba', 'cu', 'cub'),
	(58, 'Curacao', 'cw', 'cuw'),
	(59, 'Cyprus', 'cy', 'cyp'),
	(60, 'Czech Republic', 'cz', 'cze'),
	(61, 'Denmark', 'dk', 'dnk'),
	(62, 'Djibouti', 'dj', 'dji'),
	(63, 'Dominica', 'dm', 'dma'),
	(64, 'Dominican Republic', 'do', 'dom'),
	(65, 'Ecuador', 'ec', 'ecu'),
	(66, 'Egypt', 'eg', 'egy'),
	(67, 'El Salvador', 'sv', 'slv'),
	(68, 'Equatorial Guinea', 'gq', 'gnq'),
	(69, 'Eritrea', 'er', 'eri'),
	(70, 'Estonia', 'ee', 'est'),
	(71, 'Ethiopia', 'et', 'eth'),
	(72, 'Falkland Islands (Malvinas)', 'fk', 'flk'),
	(73, 'Faroe Islands', 'fo', 'fro'),
	(74, 'Fiji', 'fj', 'fji'),
	(75, 'Finland', 'fi', 'fin'),
	(76, 'France', 'fr', 'fra'),
	(77, 'French Guiana', 'gf', 'guf'),
	(78, 'French Polynesia', 'pf', 'pyf'),
	(79, 'French Southern Territories', 'tf', 'atf'),
	(80, 'Gabon', 'ga', 'gab'),
	(81, 'Gambia', 'gm', 'gmb'),
	(82, 'Georgia', 'ge', 'geo'),
	(83, 'Germany', 'de', 'deu'),
	(84, 'Ghana', 'gh', 'gha'),
	(85, 'Gibraltar', 'gi', 'gib'),
	(86, 'Greece', 'gr', 'grc'),
	(87, 'Greenland', 'gl', 'grl'),
	(88, 'Grenada', 'gd', 'grd'),
	(89, 'Guadeloupe', 'gp', 'glp'),
	(90, 'Guam', 'gu', 'gum'),
	(91, 'Guatemala', 'gt', 'gtm'),
	(92, 'Guernsey', 'gg', 'ggy'),
	(93, 'Guinea', 'gn', 'gin'),
	(94, 'Guinea-Bissau', 'gw', 'gnb'),
	(95, 'Guyana', 'gy', 'guy'),
	(96, 'Haiti', 'ht', 'hti'),
	(97, 'Heard Island and McDonald Islands', 'hm', 'hmd'),
	(98, 'Holy See (Vatican City State)', 'va', 'vat'),
	(99, 'Honduras', 'hn', 'hnd'),
	(100, 'Hong Kong', 'hk', 'hkg'),
	(101, 'Hungary', 'hu', 'hun'),
	(102, 'Iceland', 'is', 'isl'),
	(103, 'India', 'in', 'ind'),
	(104, 'Indonesia', 'id', 'idn'),
	(105, 'Iran, Islamic Republic of', 'ir', 'irn'),
	(106, 'Iraq', 'iq', 'irq'),
	(107, 'Ireland', 'ie', 'irl'),
	(108, 'Isle of Man', 'im', 'imn'),
	(109, 'Israel', 'il', 'isr'),
	(110, 'Italy', 'it', 'ita'),
	(111, 'Jamaica', 'jm', 'jam'),
	(112, 'Japan', 'jp', 'jpn'),
	(113, 'Jersey', 'je', 'jey'),
	(114, 'Jordan', 'jo', 'jor'),
	(115, 'Kazakhstan', 'kz', 'kaz'),
	(116, 'Kenya', 'ke', 'ken'),
	(117, 'Kiribati', 'ki', 'kir'),
	(118, 'Korea, Democratic People\'s Republic of', 'kp', 'prk'),
	(119, 'Korea, Republic of', 'kr', 'kor'),
	(120, 'Kuwait', 'kw', 'kwt'),
	(121, 'Kyrgyzstan', 'kg', 'kgz'),
	(122, 'Lao People\'s Democratic Republic', 'la', 'lao'),
	(123, 'Latvia', 'lv', 'lva'),
	(124, 'Lebanon', 'lb', 'lbn'),
	(125, 'Lesotho', 'ls', 'lso'),
	(126, 'Liberia', 'lr', 'lbr'),
	(127, 'Libyan Arab Jamahiriya', 'ly', 'lby'),
	(128, 'Liechtenstein', 'li', 'lie'),
	(129, 'Lithuania', 'lt', 'ltu'),
	(130, 'Luxembourg', 'lu', 'lux'),
	(131, 'Macao', 'mo', 'mac'),
	(132, 'Macedonia, The former Yugoslav Republic of', 'mk', 'mkd'),
	(133, 'Madagascar', 'mg', 'mdg'),
	(134, 'Malawi', 'mw', 'mwi'),
	(135, 'Malaysia', 'my', 'mys'),
	(136, 'Maldives', 'mv', 'mdv'),
	(137, 'Mali', 'ml', 'mli'),
	(138, 'Malta', 'mt', 'mlt'),
	(139, 'Marshall Islands', 'mh', 'mhl'),
	(140, 'Martinique', 'mq', 'mtq'),
	(141, 'Mauritania', 'mr', 'mrt'),
	(142, 'Mauritius', 'mu', 'mus'),
	(143, 'Mayotte', 'yt', 'myt'),
	(144, 'Mexico', 'mx', 'mex'),
	(145, 'Micronesia, Federated States of', 'fm', 'fsm'),
	(146, 'Moldova, Republic of', 'md', 'mda'),
	(147, 'Monaco', 'mc', 'mco'),
	(148, 'Mongolia', 'mn', 'mng'),
	(149, 'Montenegro', 'me', 'mne'),
	(150, 'Montserrat', 'ms', 'msr'),
	(151, 'Morocco', 'ma', 'mar'),
	(152, 'Mozambique', 'mz', 'moz'),
	(153, 'Myanmar', 'mm', 'mmr'),
	(154, 'Namibia', 'na', 'nam'),
	(155, 'Nauru', 'nr', 'nru'),
	(156, 'Nepal', 'np', 'npl'),
	(157, 'Netherlands', 'nl', 'nld'),
	(158, 'New Caledonia', 'nc', 'ncl'),
	(159, 'New Zealand', 'nz', 'nzl'),
	(160, 'Nicaragua', 'ni', 'nic'),
	(161, 'Niger', 'ne', 'ner'),
	(162, 'Nigeria', 'ng', 'nga'),
	(163, 'Niue', 'nu', 'niu'),
	(164, 'Norfolk Island', 'nf', 'nfk'),
	(165, 'Northern Mariana Islands', 'mp', 'mnp'),
	(166, 'Norway', 'no', 'nor'),
	(167, 'Oman', 'om', 'omn'),
	(168, 'Pakistan', 'pk', 'pak'),
	(169, 'Palau', 'pw', 'plw'),
	(170, 'Palestinian Territory, Occupied', 'ps', 'pse'),
	(171, 'Panama', 'pa', 'pan'),
	(172, 'Papua New Guinea', 'pg', 'png'),
	(173, 'Paraguay', 'py', 'pry'),
	(174, 'Peru', 'pe', 'per'),
	(175, 'Philippines', 'ph', 'phl'),
	(176, 'Pitcairn', 'pn', 'pcn'),
	(177, 'Poland', 'pl', 'pol'),
	(178, 'Portugal', 'pt', 'prt'),
	(179, 'Puerto Rico', 'pr', 'pri'),
	(180, 'Qatar', 'qa', 'qat'),
	(181, 'Reunion', 're', 'reu'),
	(182, 'Romania', 'ro', 'rou'),
	(183, 'Russian Federation', 'ru', 'rus'),
	(184, 'Rwanda', 'rw', 'rwa'),
	(185, 'Saint Barthelemy', 'bl', 'blm'),
	(186, 'Saint Helena, Ascension and Tristan Da Cunha', 'sh', 'shn'),
	(187, 'Saint Kitts and Nevis', 'kn', 'kna'),
	(188, 'Saint Lucia', 'lc', 'lca'),
	(189, 'Saint Martin (French Part)', 'mf', 'maf'),
	(190, 'Saint Pierre and Miquelon', 'pm', 'spm'),
	(191, 'Saint Vincent and The Grenadines', 'vc', 'vct'),
	(192, 'Samoa', 'ws', 'wsm'),
	(193, 'San Marino', 'sm', 'smr'),
	(194, 'Sao Tome and Principe', 'st', 'stp'),
	(195, 'Saudi Arabia', 'sa', 'sau'),
	(196, 'Senegal', 'sn', 'sen'),
	(197, 'Serbia', 'rs', 'srb'),
	(198, 'Seychelles', 'sc', 'syc'),
	(199, 'Sierra Leone', 'sl', 'sle'),
	(200, 'Singapore', 'sg', 'sgp'),
	(201, 'Sint Maarten (Dutch Part)', 'sx', 'sxm'),
	(202, 'Slovakia', 'sk', 'svk'),
	(203, 'Slovenia', 'si', 'svn'),
	(204, 'Solomon Islands', 'sb', 'slb'),
	(205, 'Somalia', 'so', 'som'),
	(206, 'South Africa', 'za', 'zaf'),
	(207, 'South Georgia and The South Sandwich Islands', 'gs', 'sgs'),
	(208, 'South Sudan', 'ss', 'ssd'),
	(209, 'Spain', 'es', 'esp'),
	(210, 'Sri Lanka', 'lk', 'lka'),
	(211, 'Sudan', 'sd', 'sdn'),
	(212, 'Suriname', 'sr', 'sur'),
	(213, 'Svalbard and Jan Mayen', 'sj', 'sjm'),
	(214, 'Swaziland', 'sz', 'swz'),
	(215, 'Sweden', 'se', 'swe'),
	(216, 'Switzerland', 'ch', 'che'),
	(217, 'Syrian Arab Republic', 'sy', 'syr'),
	(218, 'Taiwan, Province of China', 'tw', 'twn'),
	(219, 'Tajikistan', 'tj', 'tjk'),
	(220, 'Tanzania, United Republic of', 'tz', 'tza'),
	(221, 'Thailand', 'th', 'tha'),
	(222, 'Timor-Leste', 'tl', 'tls'),
	(223, 'Togo', 'tg', 'tgo'),
	(224, 'Tokelau', 'tk', 'tkl'),
	(225, 'Tonga', 'to', 'ton'),
	(226, 'Trinidad and Tobago', 'tt', 'tto'),
	(227, 'Tunisia', 'tn', 'tun'),
	(228, 'Turkey', 'tr', 'tur'),
	(229, 'Turkmenistan', 'tm', 'tkm'),
	(230, 'Turks and Caicos Islands', 'tc', 'tca'),
	(231, 'Tuvalu', 'tv', 'tuv'),
	(232, 'Uganda', 'ug', 'uga'),
	(233, 'Ukraine', 'ua', 'ukr'),
	(234, 'United Arab Emirates', 'ae', 'are'),
	(235, 'United Kingdom', 'gb', 'gbr'),
	(236, 'United States', 'us', 'usa'),
	(237, 'United States Minor Outlying Islands', 'um', 'umi'),
	(238, 'Uruguay', 'uy', 'ury'),
	(239, 'Uzbekistan', 'uz', 'uzb'),
	(240, 'Vanuatu', 'vu', 'vut'),
	(241, 'Venezuela, Bolivarian Republic of', 've', 'ven'),
	(242, 'Viet Nam', 'vn', 'vnm'),
	(243, 'Virgin Islands, British', 'vg', 'vgb'),
	(244, 'Virgin Islands, U.S.', 'vi', 'vir'),
	(245, 'Wallis and Futuna', 'wf', 'wlf'),
	(246, 'Western Sahara', 'eh', 'esh'),
	(247, 'Yemen', 'ye', 'yem'),
	(248, 'Zambia', 'zm', 'zmb'),
	(249, 'Zimbabwe', 'zw', 'zwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

-- Dumping structure for table loan.emp_permission
DROP TABLE IF EXISTS `emp_permission`;
CREATE TABLE IF NOT EXISTS `emp_permission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tid` varchar(200) NOT NULL,
  `module_name` varchar(350) NOT NULL,
  `pcreate` varchar(20) NOT NULL,
  `pread` varchar(20) NOT NULL,
  `pupdate` varchar(20) NOT NULL,
  `pdelete` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.emp_permission: ~24 rows (approximately)
INSERT INTO `emp_permission` (`id`, `tid`, `module_name`, `pcreate`, `pread`, `pupdate`, `pdelete`) VALUES
	(34, 'Cryptos?rid=782752', 'Email Panel', '0', '0', '0', '0'),
	(35, 'Cryptos?rid=782752', 'Borrower Details', '1', '0', '0', '0'),
	(36, 'Cryptos?rid=782752', 'Employee Wallet', '1', '1', '0', '0'),
	(37, 'Cryptos?rid=782752', 'Loan Details', '0', '0', '0', '0'),
	(38, 'Cryptos?rid=782752', 'Internal Message', '1', '1', '0', '0'),
	(39, 'Cryptos?rid=782752', 'Missed Payment', '0', '0', '0', '0'),
	(40, 'Cryptos?rid=782752', 'Payment', '1', '0', '0', '0'),
	(41, 'Cryptos?rid=782752', 'Employee Details', '0', '0', '0', '0'),
	(42, 'Cryptos?rid=782752', 'Module Permission', '0', '0', '0', '0'),
	(43, 'Cryptos?rid=782752', 'Savings Account', '1', '1', '0', '0'),
	(44, 'Cryptos?rid=782752', 'General Settings', '0', '0', '0', '0'),
	(45, 'Loan=21319580', 'Email Panel', '1', '1', '1', '1'),
	(46, 'Loan=21319580', 'Borrower Details', '1', '1', '1', '1'),
	(47, 'Loan=21319580', 'Employee Wallet', '1', '1', '1', '1'),
	(48, 'Loan=21319580', 'Loan Details', '1', '1', '1', '1'),
	(49, 'Loan=21319580', 'Internal Message', '1', '1', '0', '0'),
	(50, 'Loan=21319580', 'Missed Payment', '1', '1', '1', '1'),
	(51, 'Loan=21319580', 'Payment', '1', '1', '1', '1'),
	(52, 'Loan=21319580', 'Employee Details', '1', '1', '1', '1'),
	(53, 'Loan=21319580', 'Module Permission', '1', '1', '1', '1'),
	(54, 'Loan=21319580', 'Savings Account', '1', '1', '1', '1'),
	(55, 'Loan=21319580', 'General Settings', '1', '1', '1', '0'),
	(56, 'Loan=21319580', 'Loan Approval', '1', '1', '1', '1'),
	(57, 'Loan=21319580', 'Loan Disbursement', '1', '1', '1', '1');

-- Dumping structure for table loan.emp_role
DROP TABLE IF EXISTS `emp_role`;
CREATE TABLE IF NOT EXISTS `emp_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table loan.emp_role: ~0 rows (approximately)

-- Dumping structure for table loan.etemplates
DROP TABLE IF EXISTS `etemplates`;
CREATE TABLE IF NOT EXISTS `etemplates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(200) NOT NULL,
  `receiver_email` varchar(350) NOT NULL,
  `subject` varchar(350) NOT NULL,
  `msg` text NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table loan.etemplates: ~0 rows (approximately)

-- Dumping structure for table loan.faqs
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.faqs: ~1 rows (approximately)
INSERT INTO `faqs` (`id`, `topic`, `content`) VALUES
	(1, 'Please type the subject here', '<p>Please Update Faqs Here</p>\r\n');

-- Dumping structure for table loan.fin_info
DROP TABLE IF EXISTS `fin_info`;
CREATE TABLE IF NOT EXISTS `fin_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `occupation` text NOT NULL,
  `mincome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.fin_info: ~6 rows (approximately)
INSERT INTO `fin_info` (`id`, `get_id`, `tid`, `occupation`, `mincome`) VALUES
	(3, '1', 'Loan=1907598678', '', ''),
	(5, '2', 'Loan=1907598678', 'Teacher', '40000'),
	(6, '3', 'Loan=21319580', 'Banker', '500000'),
	(7, '5', 'Loan=21319580', 'Teacher', '87000'),
	(8, '5', 'Loan=21319580', 'Computer Operator', '15000'),
	(9, '5', 'Loan=21319580', 'Trader', '72500');

-- Dumping structure for table loan.footer
DROP TABLE IF EXISTS `footer`;
CREATE TABLE IF NOT EXISTS `footer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `pho` varchar(200) NOT NULL,
  `face` varchar(200) NOT NULL,
  `webs` varchar(200) NOT NULL,
  `conh` varchar(200) NOT NULL,
  `twi` varchar(200) NOT NULL,
  `gplus` varchar(200) NOT NULL,
  `ins` varchar(200) NOT NULL,
  `yous` varchar(200) NOT NULL,
  `about` text NOT NULL,
  `apply` text NOT NULL,
  `mission` text NOT NULL,
  `objective` text NOT NULL,
  `map` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.footer: ~1 rows (approximately)
INSERT INTO `footer` (`id`, `email`, `pho`, `face`, `webs`, `conh`, `twi`, `gplus`, `ins`, `yous`, `about`, `apply`, `mission`, `objective`, `map`) VALUES
	(2, 'info@bequesters.com', '+233808883675466', 'www.facebook.com/info@bequesters', 'www.bequesters.com', 'Lasvegas USA', 'www.twitter.com/info@bequesters', 'www.googleplus.com/oinfo@bequesters', 'www.in.com/info@bequesters', 'www.youtube.com/info@bequesters', 'About the system here. Thanks, We are just testing the software and we discover that the software is errors free. Thanks once again.', 'Who may apply here. Thabnks', 'Mission here. Thanks', 'System OBJECTIVE HERE. Thanks', '');

-- Dumping structure for table loan.hiw
DROP TABLE IF EXISTS `hiw`;
CREATE TABLE IF NOT EXISTS `hiw` (
  `hid` int NOT NULL AUTO_INCREMENT,
  `hiw` text NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.hiw: ~1 rows (approximately)
INSERT INTO `hiw` (`hid`, `hiw`) VALUES
	(1, '<p>We Provide Loans For Individual, Coperate and Many</p>\r\n');

-- Dumping structure for table loan.loans
DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `loanId` int NOT NULL AUTO_INCREMENT,
  `borrowerId` int DEFAULT NULL,
  `loanType` int DEFAULT NULL,
  `loanPeriod` int DEFAULT NULL,
  `calculationMethod` int DEFAULT NULL,
  `loanAmount` int DEFAULT NULL,
  `gName` varchar(45) DEFAULT NULL,
  `gAddress` varchar(45) DEFAULT NULL,
  `gContact` varchar(45) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `interest` int DEFAULT NULL,
  PRIMARY KEY (`loanId`),
  KEY `loans_loanType_idx` (`loanType`),
  KEY `loans_calculationMethod_idx` (`calculationMethod`),
  KEY `loans_borrowerId_idx` (`borrowerId`),
  CONSTRAINT `loans_borrowerId` FOREIGN KEY (`borrowerId`) REFERENCES `borrowers` (`id`),
  CONSTRAINT `loans_calculationMethod` FOREIGN KEY (`calculationMethod`) REFERENCES `calculation_method` (`methodId`),
  CONSTRAINT `loans_loanType` FOREIGN KEY (`loanType`) REFERENCES `loan_types` (`loanCode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table loan.loans: ~1 rows (approximately)
INSERT INTO `loans` (`loanId`, `borrowerId`, `loanType`, `loanPeriod`, `calculationMethod`, `loanAmount`, `gName`, `gAddress`, `gContact`, `status`, `interest`) VALUES
	(5, 21, 4, 1, 1, 1, '', '', '', 0, 1);

-- Dumping structure for table loan.loan_info
DROP TABLE IF EXISTS `loan_info`;
CREATE TABLE IF NOT EXISTS `loan_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `borrower` varchar(200) NOT NULL,
  `baccount` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `amount` varchar(200) NOT NULL,
  `date_release` varchar(200) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `g_name` varchar(200) NOT NULL,
  `g_phone` varchar(200) NOT NULL,
  `g_address` text NOT NULL,
  `rela` varchar(200) NOT NULL,
  `g_image` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `pay_date` varchar(200) NOT NULL,
  `amount_topay` varchar(200) NOT NULL,
  `teller` varchar(200) NOT NULL,
  `remark` text NOT NULL,
  `upstatus` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.loan_info: ~1 rows (approximately)
INSERT INTO `loan_info` (`id`, `borrower`, `baccount`, `desc`, `amount`, `date_release`, `agent`, `g_name`, `g_phone`, `g_address`, `rela`, `g_image`, `status`, `remarks`, `pay_date`, `amount_topay`, `teller`, `remark`, `upstatus`) VALUES
	(7, '5', '--Select Customer--', 'new loan', '500000', '06/21/2017', 'Admin', 'Mr Segun', '09034543234', '4, ade', 'GFriend', 'img/', 'Approved', 'good', '10/31/2017', '1000000', 'Admin', 'new loan', 'Pending');

-- Dumping structure for table loan.loan_type
DROP TABLE IF EXISTS `loan_type`;
CREATE TABLE IF NOT EXISTS `loan_type` (
  `typeId` int NOT NULL,
  `loanType` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `interestRate` int DEFAULT NULL,
  `period` int DEFAULT NULL,
  `minAmount` int DEFAULT NULL,
  `maxAmount` int DEFAULT NULL,
  `calculationMethod` int DEFAULT NULL,
  `guarantor` int DEFAULT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table loan.loan_type: ~0 rows (approximately)

-- Dumping structure for table loan.loan_types
DROP TABLE IF EXISTS `loan_types`;
CREATE TABLE IF NOT EXISTS `loan_types` (
  `loanCode` int NOT NULL AUTO_INCREMENT,
  `loanName` varchar(45) DEFAULT NULL,
  `repayMethod` varchar(45) DEFAULT NULL,
  `repayPeriod` int DEFAULT NULL,
  `interestRate` int DEFAULT NULL,
  `requireGuarantor` int DEFAULT NULL,
  PRIMARY KEY (`loanCode`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table loan.loan_types: ~2 rows (approximately)
INSERT INTO `loan_types` (`loanCode`, `loanName`, `repayMethod`, `repayPeriod`, `interestRate`, `requireGuarantor`) VALUES
	(4, 'Test', '1', 1, 1, 1),
	(6, 'Security Loan', '1', 1, 1, 0);

-- Dumping structure for table loan.message
DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(200) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `msg_to` varchar(200) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.message: ~3 rows (approximately)
INSERT INTO `message` (`id`, `sender_id`, `sender_name`, `msg_to`, `subject`, `message`, `date_time`) VALUES
	(4, 'Cryptos?rid=782752', 'au JJJ', 'Loan=21319580', 'Hello', '<p>Good to see you</p>\r\n', '2017-05-01 18:46:57'),
	(5, 'Loan=21319580', 'Admin', 'Cryptos?rid=782752', 'RE: Hello', '<p>Thanks<br />\r\n-------------------------</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Good to see you</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2017-05-01 18:48:27'),
	(6, 'Cryptos?rid=782752', 'au JJJ', 'Loan=21319580', 'RE: RE: Hello', '<p>Thanks&nbsp; you<br />\r\n-------------------------</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks<br />\r\n-------------------------</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Good to see you</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2017-05-01 18:49:18');

-- Dumping structure for table loan.mywallet
DROP TABLE IF EXISTS `mywallet`;
CREATE TABLE IF NOT EXISTS `mywallet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tid` varchar(200) NOT NULL,
  `t_to` varchar(200) NOT NULL,
  `Amount` varchar(200) NOT NULL,
  `Desc` varchar(200) NOT NULL,
  `wtype` varchar(200) NOT NULL,
  `tdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.mywallet: ~12 rows (approximately)
INSERT INTO `mywallet` (`id`, `tid`, `t_to`, `Amount`, `Desc`, `wtype`, `tdate`) VALUES
	(39, 'Loan=1907598678', 'NIL', '500', 'hkbvhk', 'credit', '2018-01-03 23:03:23'),
	(55, 'Cryptos?rid=453536', 'NIL', '5000', 'transfer to aa HHJ', 'transfer', '2018-01-03 23:03:19'),
	(57, 'Cryptos?rid=453536', 'NIL', '3000', 'reverse 3k back to you', 'transfer', '2018-01-03 23:03:14'),
	(58, 'Cryptos?rid=453536', 'NIL', '5000', 'add payment', 'debit', '2018-01-03 23:03:08'),
	(59, 'Cryptos?rid=453536', 'NIL', '2000', 'jjjjj', 'debit', '2018-01-03 23:03:02'),
	(60, 'Loan=21319580', 'NIL', '2400', 'Give loan', 'debit', '2018-01-03 23:02:57'),
	(61, 'Loan=21319580', 'NIL', '1350', 'Loan Payment', 'credit', '2018-01-03 23:02:51'),
	(64, 'Loan=21319580', 'Cryptos?rid=782752', '200', 'Transfer to JJJ', 'transfer', '2018-01-03 22:58:16'),
	(65, 'Loan=21319580', 'Cryptos?rid=782752', '150', 'Transfer money', 'transfer', '2018-01-03 22:58:34'),
	(66, 'Loan=21319580', 'NIL', '525', 'Loan due', 'credit', '2018-01-03 23:05:19'),
	(67, 'Loan=21319580', 'NIL', '1050', 'Add Payment', 'debit', '2018-01-03 23:04:46'),
	(68, 'Loan=21319580', 'Cryptos?rid=782752', '200', 'Transfer to Staff JJJ', 'transfer', '2018-01-05 15:39:58');

-- Dumping structure for table loan.payments
DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tid` varchar(200) NOT NULL,
  `account` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `customer` varchar(200) NOT NULL,
  `loan` varchar(200) NOT NULL,
  `pay_date` varchar(200) NOT NULL,
  `amount_to_pay` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.payments: ~1 rows (approximately)
INSERT INTO `payments` (`id`, `tid`, `account`, `account_no`, `customer`, `loan`, `pay_date`, `amount_to_pay`, `remarks`) VALUES
	(5, 'Loan=21319580', '199382731', '5', '5', '1000000', '05/30/2017', '3000000', 'Payment for Doris Micheal');

-- Dumping structure for table loan.payment_method
DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `methodId` int NOT NULL AUTO_INCREMENT,
  `methodName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`methodId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='	';

-- Dumping data for table loan.payment_method: ~2 rows (approximately)
INSERT INTO `payment_method` (`methodId`, `methodName`) VALUES
	(1, 'Mpesa'),
	(5, 'Cash');

-- Dumping structure for table loan.payment_schedule
DROP TABLE IF EXISTS `payment_schedule`;
CREATE TABLE IF NOT EXISTS `payment_schedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idm` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `term` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `schedule` varchar(200) NOT NULL,
  `interest` varchar(200) NOT NULL,
  `penalty` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.payment_schedule: ~1 rows (approximately)
INSERT INTO `payment_schedule` (`id`, `idm`, `tid`, `term`, `day`, `schedule`, `interest`, `penalty`) VALUES
	(10, '11', 'Loan=21319580', 'kjnk', 'Week', 'Daily', '2', '5');

-- Dumping structure for table loan.pay_schedule
DROP TABLE IF EXISTS `pay_schedule`;
CREATE TABLE IF NOT EXISTS `pay_schedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `schedule` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `interest` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.pay_schedule: ~1 rows (approximately)
INSERT INTO `pay_schedule` (`id`, `get_id`, `tid`, `schedule`, `balance`, `interest`, `payment`) VALUES
	(11, '6', 'Loan=21319580', '12/30/2017', '200', '2', '50');

-- Dumping structure for table loan.sms
DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sms_gateway` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `api` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.sms: ~1 rows (approximately)
INSERT INTO `sms` (`id`, `sms_gateway`, `username`, `password`, `api`, `status`) VALUES
	(1, 'SMSTEAMS', 'optimum', 'optimum', 'http://smsteams.com/components/com_spc/smsapi.php?', 'NotActivated');

-- Dumping structure for table loan.systemset
DROP TABLE IF EXISTS `systemset`;
CREATE TABLE IF NOT EXISTS `systemset` (
  `sysid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `footer` text NOT NULL,
  `abb` varchar(200) NOT NULL,
  `fax` text NOT NULL,
  `currency` text NOT NULL,
  `website` text NOT NULL,
  `mobile` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `map` text NOT NULL,
  `stamp` varchar(350) NOT NULL,
  `timezone` text NOT NULL,
  `sms_charges` varchar(200) NOT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.systemset: ~1 rows (approximately)
INSERT INTO `systemset` (`sysid`, `title`, `name`, `footer`, `abb`, `fax`, `currency`, `website`, `mobile`, `image`, `address`, `email`, `map`, `stamp`, `timezone`, `sms_charges`) VALUES
	(1, 'Insight Lending Management System', 'Insight Credit', 'All rights reserved. 2022 (c)', 'ILMS', '23459', '$', 'https://www.lending.insightl.com', '+254788932', '../img/ass.png', '								', 'lending.insight@gmail.com', 'Map Code Here				', 'stamp.jpg', '-12', '25');

-- Dumping structure for table loan.transaction
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `txid` varchar(200) NOT NULL,
  `t_type` varchar(200) NOT NULL COMMENT 'Deposit OR Withdraw',
  `acctno` varchar(200) NOT NULL,
  `fn` varchar(200) NOT NULL,
  `ln` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.transaction: ~19 rows (approximately)
INSERT INTO `transaction` (`id`, `txid`, `t_type`, `acctno`, `fn`, `ln`, `email`, `phone`, `amount`, `date_time`) VALUES
	(1, 'TXID-35663574', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '2000', '2017-12-23 14:57:20'),
	(2, 'TXID-48939392', 'Deposit', '20000', 'Doris', 'Micheal', 'segtism@gmail.com', '+1564783934', '1525', '2017-12-23 14:57:26'),
	(3, 'TXID-73095459', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '250', '2017-12-23 14:57:31'),
	(4, 'TXID-94293702', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '200', '2017-12-23 15:46:34'),
	(5, 'TXID-50934204', 'Withdraw', '20000', 'Doris', 'Micheal', 'segtism@gmail.com', '+1564783934', '20', '2017-12-23 16:02:16'),
	(6, 'TXID-38992248', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '20', '2017-12-23 16:31:34'),
	(7, 'TXID-39031128', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '35', '2018-01-06 17:32:07'),
	(8, 'TXID-84875916', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '25', '2018-01-06 17:35:58'),
	(9, 'TXID-45293701', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '55', '2018-01-06 17:48:19'),
	(10, 'TXID-84558899', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '10', '2018-01-06 17:49:51'),
	(11, 'TXID-99934205', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '33', '2018-01-06 17:50:29'),
	(12, 'TXID-89936219', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '42', '2018-01-06 17:51:15'),
	(13, 'TXID-64374512', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '20', '2018-01-06 17:57:03'),
	(14, 'TXID-87992249', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '39', '2018-01-06 17:58:39'),
	(15, 'TXID-39294311', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '87', '2018-01-06 18:00:23'),
	(16, 'TXID-76812928', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '100', '2018-01-06 18:03:50'),
	(17, 'TXID-12060791', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '250', '2018-01-06 18:21:37'),
	(18, 'TXID-51421692', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '200', '2018-01-06 18:25:02'),
	(19, 'TXID-28228637', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '50', '2018-01-06 18:26:11');

-- Dumping structure for table loan.twallet
DROP TABLE IF EXISTS `twallet`;
CREATE TABLE IF NOT EXISTS `twallet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tid` varchar(200) NOT NULL,
  `Total` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.twallet: ~2 rows (approximately)
INSERT INTO `twallet` (`id`, `tid`, `Total`) VALUES
	(10, 'Loan=21319580', '1025'),
	(12, 'Cryptos?rid=782752', '550');

-- Dumping structure for event loan.update_profit
DROP EVENT IF EXISTS `update_profit`;
DELIMITER //
CREATE EVENT `update_profit` ON SCHEDULE EVERY 1 DAY STARTS '2017-03-08 20:45:36' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE ph_list SET Percentage = '727.2' WHERE tracking_id = 'Cryptos?rid=782752'//
DELIMITER ;

-- Dumping structure for table loan.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `addr1` text NOT NULL,
  `addr2` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=483 DEFAULT CHARSET=latin1;

-- Dumping data for table loan.user: ~2 rows (approximately)
INSERT INTO `user` (`userid`, `name`, `email`, `phone`, `addr1`, `addr2`, `city`, `state`, `zip`, `country`, `comment`, `username`, `password`, `id`, `image`, `role`) VALUES
	(467, 'au JJJ', 'at@g.com', '+2334857757769', 'Ghana                    ', 'Ghana										', 'Acra', 'Acra', '23450', 'US', '  Good Â  Â  Â Â Â  Â Â Â  Â Â Â  Â Â Â  Â  Â  Â Â Â  Â Â Â  Â Â Â  Â Â Â  Â  Â ', 'at', 'YXQ=', 'Cryptos?rid=782752', 'img/ac_logo.png', ''),
	(482, 'Admin', 'admin@admin.com', '08101750845', 'address1', 'address2', 'city', 'state', 'zip', 'US', 'comment', 'admin', 'YWRtaW4=', 'Loan=21319580', 'img/bitcoin_3.png', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
