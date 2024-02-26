-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2024 at 11:01 PM
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
-- Database: `ensahservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id_absence` int NOT NULL,
  `nombre_absence` int DEFAULT NULL,
  `nbre_abs_justifiee` int DEFAULT NULL,
  `id_etudiant` int DEFAULT NULL,
  `id_prof` int DEFAULT NULL,
  `id_module` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`id_absence`, `nombre_absence`, `nbre_abs_justifiee`, `id_etudiant`, `id_prof`, `id_module`) VALUES
(1, 3, 1, 1, 7, 1),
(2, 5, 0, 2, 7, 1),
(3, 2, 2, 3, 7, 1),
(4, 7, 3, 4, 7, 1),
(5, 1, 0, 5, 7, 1),
(6, 4, 2, 6, 7, 1),
(7, 2, 1, 7, 7, 1),
(8, 6, 0, 8, 7, 1),
(9, 3, 1, 9, 7, 1),
(10, 8, 4, 10, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int NOT NULL,
  `nom_classe` varchar(255) DEFAULT NULL,
  `id_filiere` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`, `id_filiere`) VALUES
(1, 'AP1', 1),
(2, 'AP2', 2),
(3, 'GI1', 3),
(4, 'GI2', 3),
(5, 'GI3', 3),
(6, 'ID1', 4),
(7, 'ID2', 4),
(8, 'ID3', 4),
(9, 'GC1', 5),
(10, 'GC2', 5),
(11, 'GC3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `emploi`
--

CREATE TABLE `emploi` (
  `id_prof` int DEFAULT NULL,
  `valeur_1` varchar(50) DEFAULT NULL,
  `valeur_2` varchar(50) DEFAULT NULL,
  `valeur_3` varchar(50) DEFAULT NULL,
  `valeur_4` varchar(50) DEFAULT NULL,
  `valeur_5` varchar(50) DEFAULT NULL,
  `valeur_6` varchar(50) DEFAULT NULL,
  `valeur_7` varchar(50) DEFAULT NULL,
  `valeur_8` varchar(50) DEFAULT NULL,
  `valeur_9` varchar(50) DEFAULT NULL,
  `valeur_10` varchar(50) DEFAULT NULL,
  `valeur_11` varchar(50) DEFAULT NULL,
  `valeur_12` varchar(50) DEFAULT NULL,
  `valeur_13` varchar(50) DEFAULT NULL,
  `valeur_14` varchar(50) DEFAULT NULL,
  `valeur_15` varchar(50) DEFAULT NULL,
  `valeur_16` varchar(50) DEFAULT NULL,
  `valeur_17` varchar(50) DEFAULT NULL,
  `valeur_18` varchar(50) DEFAULT NULL,
  `valeur_19` varchar(50) DEFAULT NULL,
  `valeur_20` varchar(50) DEFAULT NULL,
  `valeur_21` varchar(50) DEFAULT NULL,
  `valeur_22` varchar(50) DEFAULT NULL,
  `valeur_23` varchar(50) DEFAULT NULL,
  `valeur_24` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emploi`
--

INSERT INTO `emploi` (`id_prof`, `valeur_1`, `valeur_2`, `valeur_3`, `valeur_4`, `valeur_5`, `valeur_6`, `valeur_7`, `valeur_8`, `valeur_9`, `valeur_10`, `valeur_11`, `valeur_12`, `valeur_13`, `valeur_14`, `valeur_15`, `valeur_16`, `valeur_17`, `valeur_18`, `valeur_19`, `valeur_20`, `valeur_21`, `valeur_22`, `valeur_23`, `valeur_24`) VALUES
(1, '6', NULL, '66', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '4', NULL, NULL, '33', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', '11', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emploi_class`
--

CREATE TABLE `emploi_class` (
  `id_class` int DEFAULT NULL,
  `valeur_1` varchar(50) DEFAULT NULL,
  `valeur_2` varchar(50) DEFAULT NULL,
  `valeur_3` varchar(50) DEFAULT NULL,
  `valeur_4` varchar(50) DEFAULT NULL,
  `valeur_5` varchar(50) DEFAULT NULL,
  `valeur_6` varchar(50) DEFAULT NULL,
  `valeur_7` varchar(50) DEFAULT NULL,
  `valeur_8` varchar(50) DEFAULT NULL,
  `valeur_9` varchar(50) DEFAULT NULL,
  `valeur_10` varchar(50) DEFAULT NULL,
  `valeur_11` varchar(50) DEFAULT NULL,
  `valeur_12` varchar(50) DEFAULT NULL,
  `valeur_13` varchar(50) DEFAULT NULL,
  `valeur_14` varchar(50) DEFAULT NULL,
  `valeur_15` varchar(50) DEFAULT NULL,
  `valeur_16` varchar(50) DEFAULT NULL,
  `valeur_17` varchar(50) DEFAULT NULL,
  `valeur_18` varchar(50) DEFAULT NULL,
  `valeur_19` varchar(50) DEFAULT NULL,
  `valeur_20` varchar(50) DEFAULT NULL,
  `valeur_21` varchar(50) DEFAULT NULL,
  `valeur_22` varchar(50) DEFAULT NULL,
  `valeur_23` varchar(50) DEFAULT NULL,
  `valeur_24` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emploi_class`
--

INSERT INTO `emploi_class` (`id_class`, `valeur_1`, `valeur_2`, `valeur_3`, `valeur_4`, `valeur_5`, `valeur_6`, `valeur_7`, `valeur_8`, `valeur_9`, `valeur_10`, `valeur_11`, `valeur_12`, `valeur_13`, `valeur_14`, `valeur_15`, `valeur_16`, `valeur_17`, `valeur_18`, `valeur_19`, `valeur_20`, `valeur_21`, `valeur_22`, `valeur_23`, `valeur_24`) VALUES
(1, '1', NULL, NULL, NULL, NULL, '2', NULL, NULL, '11', '11', NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int NOT NULL,
  `nom_etudiant` varchar(255) DEFAULT NULL,
  `prenom_etudiant` varchar(255) DEFAULT NULL,
  `email_etudiant` varchar(255) DEFAULT NULL,
  `id_classe` int DEFAULT NULL,
  `id_filiere` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `email_etudiant`, `id_classe`, `id_filiere`) VALUES
(1, 'etud1', 'etud1', 'etud1@gmail.com', 1, 1),
(2, 'etud2', 'etud2', 'etud2@gmail.com', 1, 1),
(3, 'etud3', 'etud3', 'etud3@gmail.com', 1, 1),
(4, 'etud4', 'etud4', 'etud4@gmail.com', 1, 1),
(5, 'etud5', 'etud5', 'etud5@gmail.com', 1, 1),
(6, 'etud6', 'etud6', 'etud6@gmail.com', 1, 1),
(7, 'etud7', 'etud7', 'etud7@gmail.com', 1, 1),
(8, 'etud8', 'etud8', 'etud8@gmail.com', 1, 1),
(9, 'etud9', 'etud9', 'etud9@gmail.com', 1, 1),
(10, 'etud10', 'etud10', 'etud10@gmail.com', 1, 1),
(11, 'etud11', 'etud11', 'etud11@gmail.com', 2, 2),
(12, 'etud12', 'etud12', 'etud12@gmail.com', 2, 2),
(13, 'etud13', 'etud13', 'etud13@gmail.com', 2, 2),
(14, 'etud14', 'etud14', 'etud14@gmail.com', 2, 2),
(15, 'etud15', 'etud15', 'etud15@gmail.com', 2, 2),
(16, 'etud16', 'etud16', 'etud16@gmail.com', 2, 2),
(17, 'etud17', 'etud17', 'etud17@gmail.com', 2, 2),
(18, 'etud18', 'etud18', 'etud18@gmail.com', 2, 2),
(19, 'etud19', 'etud19', 'etud19@gmail.com', 2, 2),
(20, 'etud20', 'etud20', 'etud20@gmail.com', 2, 2),
(21, 'etud21', 'etud21', 'etud21@gmail.com', 3, 3),
(22, 'etud22', 'etud22', 'etud22@gmail.com', 3, 3),
(23, 'etud23', 'etud23', 'etud23@gmail.com', 3, 3),
(24, 'etud24', 'etud24', 'etud24@gmail.com', 3, 3),
(25, 'etud25', 'etud25', 'etud25@gmail.com', 3, 3),
(26, 'etud26', 'etud26', 'etud26@gmail.com', 3, 3),
(27, 'etud27', 'etud27', 'etud27@gmail.com', 3, 3),
(28, 'etud28', 'etud28', 'etud28@gmail.com', 3, 3),
(29, 'etud29', 'etud29', 'etud29@gmail.com', 3, 3),
(30, 'etud30', 'etud30', 'etud30@gmail.com', 3, 3),
(31, 'etud31', 'etud31', 'etud31@gmail.com', 4, 3),
(32, 'etud32', 'etud32', 'etud32@gmail.com', 4, 3),
(33, 'etud33', 'etud33', 'etud33@gmail.com', 4, 3),
(34, 'etud34', 'etud34', 'etud34@gmail.com', 4, 3),
(35, 'etud35', 'etud35', 'etud35@gmail.com', 4, 3),
(36, 'etud36', 'etud36', 'etud36@gmail.com', 4, 3),
(37, 'etud37', 'etud37', 'etud37@gmail.com', 4, 3),
(38, 'etud38', 'etud38', 'etud38@gmail.com', 4, 3),
(39, 'etud39', 'etud39', 'etud39@gmail.com', 4, 3),
(40, 'etud40', 'etud40', 'etud40@gmail.com', 4, 3),
(41, 'etud41', 'etud41', 'etud41@gmail.com', 5, 3),
(42, 'etud42', 'etud42', 'etud42@gmail.com', 5, 3),
(43, 'etud43', 'etud43', 'etud43@gmail.com', 5, 3),
(44, 'etud44', 'etud44', 'etud44@gmail.com', 5, 3),
(45, 'etud45', 'etud45', 'etud45@gmail.com', 5, 3),
(46, 'etud46', 'etud46', 'etud46@gmail.com', 5, 3),
(47, 'etud47', 'etud47', 'etud47@gmail.com', 5, 3),
(48, 'etud48', 'etud48', 'etud48@gmail.com', 5, 3),
(49, 'etud49', 'etud49', 'etud49@gmail.com', 5, 3),
(50, 'etud50', 'etud50', 'etud50@gmail.com', 5, 3),
(51, 'etud51', 'etud51', 'etud51@gmail.com', 6, 4),
(52, 'etud52', 'etud52', 'etud52@gmail.com', 6, 4),
(53, 'etud53', 'etud53', 'etud53@gmail.com', 6, 4),
(54, 'etud54', 'etud54', 'etud54@gmail.com', 6, 4),
(55, 'etud55', 'etud55', 'etud55@gmail.com', 6, 4),
(56, 'etud56', 'etud56', 'etud56@gmail.com', 6, 4),
(57, 'etud57', 'etud57', 'etud57@gmail.com', 6, 4),
(58, 'etud58', 'etud58', 'etud58@gmail.com', 6, 4),
(59, 'etud59', 'etud59', 'etud59@gmail.com', 6, 4),
(60, 'etud60', 'etud60', 'etud60@gmail.com', 6, 4),
(61, 'etud61', 'etud61', 'etud61@gmail.com', 7, 4),
(62, 'etud62', 'etud62', 'etud62@gmail.com', 7, 4),
(63, 'etud63', 'etud63', 'etud63@gmail.com', 7, 4),
(64, 'etud64', 'etud64', 'etud64@gmail.com', 7, 4),
(65, 'etud65', 'etud65', 'etud65@gmail.com', 7, 4),
(66, 'etud66', 'etud66', 'etud66@gmail.com', 7, 4),
(67, 'etud67', 'etud67', 'etud67@gmail.com', 7, 4),
(68, 'etud68', 'etud68', 'etud68@gmail.com', 7, 4),
(69, 'etud69', 'etud69', 'etud69@gmail.com', 7, 4),
(70, 'etud70', 'etud70', 'etud70@gmail.com', 7, 4),
(71, 'etud71', 'etud71', 'etud71@gmail.com', 8, 4),
(72, 'etud72', 'etud72', 'etud72@gmail.com', 8, 4),
(73, 'etud73', 'etud73', 'etud73@gmail.com', 8, 4),
(74, 'etud74', 'etud74', 'etud74@gmail.com', 8, 4),
(75, 'etud75', 'etud75', 'etud75@gmail.com', 8, 4),
(76, 'etud76', 'etud76', 'etud76@gmail.com', 8, 4),
(77, 'etud77', 'etud77', 'etud77@gmail.com', 8, 4),
(78, 'etud78', 'etud78', 'etud78@gmail.com', 8, 4),
(79, 'etud79', 'etud79', 'etud79@gmail.com', 8, 4),
(80, 'etud80', 'etud80', 'etud80@gmail.com', 8, 4),
(81, 'etud81', 'etud81', 'etud81@gmail.com', 9, 5),
(82, 'etud82', 'etud82', 'etud82@gmail.com', 9, 5),
(83, 'etud83', 'etud83', 'etud83@gmail.com', 9, 5),
(84, 'etud84', 'etud84', 'etud84@gmail.com', 9, 5),
(85, 'etud85', 'etud85', 'etud85@gmail.com', 9, 5),
(86, 'etud86', 'etud86', 'etud86@gmail.com', 9, 5),
(87, 'etud87', 'etud87', 'etud87@gmail.com', 9, 5),
(88, 'etud88', 'etud88', 'etud88@gmail.com', 9, 5),
(89, 'etud89', 'etud89', 'etud89@gmail.com', 9, 5),
(90, 'etud90', 'etud90', 'etud90@gmail.com', 9, 5),
(91, 'etud91', 'etud91', 'etud91@gmail.com', 10, 5),
(92, 'etud92', 'etud92', 'etud92@gmail.com', 10, 5),
(93, 'etud93', 'etud93', 'etud93@gmail.com', 10, 5),
(94, 'etud94', 'etud94', 'etud94@gmail.com', 10, 5),
(95, 'etud95', 'etud95', 'etud95@gmail.com', 10, 5),
(96, 'etud96', 'etud96', 'etud96@gmail.com', 10, 5),
(97, 'etud97', 'etud97', 'etud97@gmail.com', 10, 5),
(98, 'etud98', 'etud98', 'etud98@gmail.com', 10, 5),
(99, 'etud99', 'etud99', 'etud99@gmail.com', 10, 5),
(100, 'etud100', 'etud100', 'etud100@gmail.com', 10, 5),
(101, 'etud101', 'etud101', 'etud101@gmail.com', 11, 5),
(102, 'etud102', 'etud102', 'etud102@gmail.com', 11, 5),
(103, 'etud103', 'etud103', 'etud103@gmail.com', 11, 5),
(104, 'etud104', 'etud104', 'etud104@gmail.com', 11, 5),
(105, 'etud105', 'etud105', 'etud105@gmail.com', 11, 5),
(106, 'etud106', 'etud106', 'etud106@gmail.com', 11, 5),
(107, 'etud107', 'etud107', 'etud107@gmail.com', 11, 5),
(108, 'etud108', 'etud108', 'etud108@gmail.com', 11, 5),
(109, 'etud109', 'etud109', 'etud109@gmail.com', 11, 5),
(110, 'etud110', 'etud110', 'etud110@gmail.com', 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int NOT NULL,
  `nom_filiere` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`) VALUES
(1, 'AP1'),
(2, 'AP2'),
(3, 'GI'),
(4, 'ID'),
(5, 'GC');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` int NOT NULL,
  `nom_module` varchar(255) DEFAULT NULL,
  `type_module` varchar(100) DEFAULT NULL,
  `Specialite` varchar(100) DEFAULT NULL,
  `nombre_heur` int DEFAULT NULL,
  `id_CP1` int DEFAULT NULL,
  `id_CP2` int DEFAULT NULL,
  `id_GI` int DEFAULT NULL,
  `id_ID` int DEFAULT NULL,
  `id_GC` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `nom_module`, `type_module`, `Specialite`, `nombre_heur`, `id_CP1`, `id_CP2`, `id_GI`, `id_ID`, `id_GC`) VALUES
(1, 'module1', 'Cour', 'Informatique', 2, 1, NULL, 3, 4, NULL),
(2, 'Module2', 'Cour', 'Mathematique', 2, 1, 2, NULL, NULL, NULL),
(3, 'Module3', 'Cour', 'Physique', 2, NULL, NULL, 3, NULL, 5),
(4, 'Module4', 'Cour', 'Languge', 2, NULL, NULL, 3, NULL, NULL),
(5, 'Module5', 'Cour', 'Economique', 2, NULL, 2, NULL, 4, NULL),
(6, 'Module6', 'Cour', 'Informatique', 2, NULL, NULL, 3, 4, NULL),
(7, 'Module7', 'Cour', 'Informatique', 2, 1, NULL, 3, 4, NULL),
(8, 'Module8', 'Cour', 'Mathematique', 2, NULL, 2, NULL, NULL, 5),
(9, 'Module9', 'Cour', 'Physique', 2, NULL, NULL, 3, 4, NULL),
(11, 'Module1', 'TD', 'Informatique', 4, 1, NULL, NULL, NULL, 5),
(22, 'Module2', 'TP', 'Mathematique', 4, NULL, 2, NULL, 4, NULL),
(33, 'Module3', 'TD', 'Physique', 4, NULL, NULL, 3, NULL, 5),
(66, 'Module6', 'TD', 'Informatique', 4, NULL, NULL, 3, NULL, NULL),
(77, 'Module7', 'TP', 'Informatique', 4, NULL, NULL, 3, 4, NULL),
(88, 'Module8', 'TD', 'Mathematique', 4, NULL, 2, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `module_classe_professeur_filiere`
--

CREATE TABLE `module_classe_professeur_filiere` (
  `id_module` int DEFAULT NULL,
  `id_classe` int DEFAULT NULL,
  `id_prof` int DEFAULT NULL,
  `id_filiere` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `module_classe_professeur_filiere`
--

INSERT INTO `module_classe_professeur_filiere` (`id_module`, `id_classe`, `id_prof`, `id_filiere`) VALUES
(6, 1, 1, 3),
(66, 1, 1, 3),
(3, 1, 5, 3),
(33, 1, 5, 3),
(4, 1, 5, 3),
(1, 1, 2, 1),
(1, 1, 7, 1),
(2, 1, 7, 1),
(11, 1, 16, 1),
(7, 1, 8, 1),
(2, 1, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int NOT NULL,
  `address_pdf` varchar(255) DEFAULT NULL,
  `type_note` varchar(100) DEFAULT NULL,
  `id_prof` int DEFAULT NULL,
  `id_module` int DEFAULT NULL,
  `id_classe` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id_premiere_notification` int NOT NULL,
  `message` text,
  `date_notification` date DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id_premiere_notification`, `message`, `date_notification`, `description`) VALUES
(1, 'First notification message', '2024-02-25', 'Description of the first notification'),
(2, 'Second notification message', '2024-02-26', 'Description of the second notification'),
(3, 'Third notification message', '2024-02-27', 'Description of the third notification'),
(4, 'Fourth notification message', '2024-02-28', 'Description of the fourth notification');

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

CREATE TABLE `professeur` (
  `id_prof` int NOT NULL,
  `nom_prof` varchar(255) DEFAULT NULL,
  `prenom_prof` varchar(255) DEFAULT NULL,
  `email_prof` varchar(255) DEFAULT NULL,
  `modepass_prof` varchar(255) DEFAULT NULL,
  `etat_prof` varchar(50) DEFAULT NULL,
  `decriptif_prof` text,
  `image_prof` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `addresse_prof` varchar(255) DEFAULT NULL,
  `specialite` varchar(100) DEFAULT NULL,
  `id_CP1` int DEFAULT NULL,
  `id_CP2` int DEFAULT NULL,
  `id_GI` int DEFAULT NULL,
  `id_ID` int DEFAULT NULL,
  `id_GC` int DEFAULT NULL,
  `filiere_ensg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`id_prof`, `nom_prof`, `prenom_prof`, `email_prof`, `modepass_prof`, `etat_prof`, `decriptif_prof`, `image_prof`, `city`, `addresse_prof`, `specialite`, `id_CP1`, `id_CP2`, `id_GI`, `id_ID`, `id_GC`, `filiere_ensg`) VALUES
(1, 'prof1', 'prof1', 'prof1@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'Chefdepart', '', NULL, '', '', 'informatique', 1, NULL, 3, NULL, NULL, NULL),
(2, 'prof2', 'prof2', 'prof2@gmail.com', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'Respfiliere', NULL, NULL, NULL, NULL, 'informatique', 1, NULL, NULL, 4, NULL, '1'),
(3, 'prof3', 'prof3', 'prof3@gmail.com', '77de68daecd823babbb58edb1c8e14d7106e83bb', 'Respfiliere', NULL, NULL, NULL, NULL, 'Economique', NULL, NULL, NULL, 4, 5, '2'),
(4, 'prof4', 'prof4', 'prof4@gmail.com', '1b6453892473a467d07372d45eb05abc2031647a', 'Respfiliere', NULL, NULL, NULL, NULL, 'Mathematique', NULL, 2, NULL, NULL, NULL, '3'),
(5, 'prof5', 'prof5', 'prof5@gmail.com', 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'Respfiliere', NULL, NULL, NULL, NULL, 'informatique', NULL, NULL, 3, NULL, NULL, '4'),
(6, 'prof6', 'prof6', 'prof6@gmail.com', 'c1dfd96eea8cc2b62785275bca38ac261256e278', 'Respfiliere', NULL, NULL, NULL, NULL, 'Mathematique', NULL, 2, NULL, 4, 5, '5'),
(7, 'prof7', 'prof7', 'prof7@gmail.com', '902ba3cda1883801594b6e1b452790cc53948fda', 'Professeur', NULL, NULL, NULL, NULL, 'informatique', 1, NULL, NULL, NULL, NULL, NULL),
(8, 'prof8', 'prof8', 'prof8@gmail.com', 'fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 'Professeur', NULL, NULL, NULL, NULL, 'Economique', 1, NULL, 3, NULL, NULL, NULL),
(9, 'prof9', 'prof9', 'prof9@gmail.com', '0ade7c2cf97f75d009975f4d720d1fa6c19f4897', 'Professeur', NULL, NULL, NULL, NULL, 'Mathematique', NULL, 2, NULL, 4, NULL, NULL),
(10, 'prof10', 'prof10', 'prof10@gmail.com', 'b1d5781111d84f7b3fe45a0852e59758cd7a87e5', 'Vacataire', NULL, NULL, NULL, NULL, 'Economique', NULL, 2, NULL, NULL, 5, NULL),
(11, 'prof11', 'prof11', 'prof11@gmail.com', '17ba0791499db908433b80f37c5fbc89b870084b', 'Professeur', NULL, NULL, NULL, NULL, 'informatique', NULL, NULL, 3, NULL, NULL, NULL),
(12, 'prof12', 'prof12', 'prof12@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'Professeur', NULL, NULL, NULL, NULL, 'Mathematique', NULL, NULL, 3, NULL, NULL, NULL),
(13, 'prof13', 'prof13', 'prof13@gmail.com', 'bd307a3ec329e10a2cff8fb87480823da114f8f4', 'Professeur', NULL, NULL, NULL, NULL, 'informatique', NULL, NULL, NULL, 4, NULL, NULL),
(14, 'prof14', 'prof14', 'prof14@gmail.com', 'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b', 'Vacataire', NULL, NULL, NULL, NULL, 'Mathematique', NULL, NULL, 3, 4, NULL, NULL),
(15, 'prof15', 'prof15', 'prof15@gmail.com', 'f1abd670358e036c31296e66b3b66c382ac00812', 'Professeur', NULL, NULL, NULL, NULL, 'Economique', NULL, 2, NULL, NULL, 5, NULL),
(16, 'prof16', 'prof16', 'prof16@gmail.com', '1574bddb75c78a6fd2251d61e2993b5146201319', 'Professeur', NULL, NULL, NULL, NULL, 'Mathematique', 1, NULL, 3, NULL, 5, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `emploi`
--
ALTER TABLE `emploi`
  ADD KEY `id_prof` (`id_prof`);

--
-- Indexes for table `emploi_class`
--
ALTER TABLE `emploi_class`
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Indexes for table `module_classe_professeur_filiere`
--
ALTER TABLE `module_classe_professeur_filiere`
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_premiere_notification`);

--
-- Indexes for table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_prof`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_absence` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_premiere_notification` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_prof` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `absence_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`),
  ADD CONSTRAINT `absence_ibfk_3` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Constraints for table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`);

--
-- Constraints for table `emploi_class`
--
ALTER TABLE `emploi_class`
  ADD CONSTRAINT `emploi_class_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `classe` (`id_classe`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Constraints for table `module_classe_professeur_filiere`
--
ALTER TABLE `module_classe_professeur_filiere`
  ADD CONSTRAINT `module_classe_professeur_filiere_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `module_classe_professeur_filiere_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `module_classe_professeur_filiere_ibfk_3` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`),
  ADD CONSTRAINT `module_classe_professeur_filiere_ibfk_4` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
