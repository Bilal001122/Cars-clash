-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2024 at 05:59 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `ID_Admin` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Mot_de_passe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID_Admin`, `Nom`, `Prenom`, `Email`, `Mot_de_passe`) VALUES
(1, 'Arab', 'Bilal', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `ID_Avis` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` int(11) DEFAULT NULL,
  `ID_Vehicule` int(11) DEFAULT NULL,
  `Commentaire` text,
  `Statut` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Avis`),
  KEY `fk_avis_user` (`ID_Utilisateur`),
  KEY `fk_avis_vehicule` (`ID_Vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`ID_Avis`, `ID_Utilisateur`, `ID_Vehicule`, `Commentaire`, `Statut`) VALUES
(1, 21, 92, 'Performance exceptionnelle', 'Valide'),
(3, 21, 86, 'Securite exceptionnelle', 'Valide'),
(5, 21, 91, 'Performance exceptionnelle', 'Valide'),
(6, 6, 91, 'Entretien abordable', 'Valide'),
(7, 8, 92, 'Insonorisation exceptionnelle', 'Valide'),
(8, 8, 91, 'Insonorisation exceptionnelle', 'Valide'),
(9, 22, 91, 'Design bien', 'Valide');

-- --------------------------------------------------------

--
-- Table structure for table `comparaison`
--

DROP TABLE IF EXISTS `comparaison`;
CREATE TABLE IF NOT EXISTS `comparaison` (
  `ID_Comparaison` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Vehicule1` int(11) DEFAULT NULL,
  `ID_Vehicule2` int(11) DEFAULT NULL,
  `ID_Vehicule3` int(11) DEFAULT NULL,
  `ID_Vehicule4` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Comparaison`),
  KEY `fk_comparaison_vehicule1` (`ID_Vehicule1`),
  KEY `fk_comparaison_vehicule2` (`ID_Vehicule2`),
  KEY `fk_comparaison_vehicule3` (`ID_Vehicule3`),
  KEY `fk_comparaison_vehicule4` (`ID_Vehicule4`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comparaison`
--

INSERT INTO `comparaison` (`ID_Comparaison`, `ID_Vehicule1`, `ID_Vehicule2`, `ID_Vehicule3`, `ID_Vehicule4`) VALUES
(215, 91, 93, NULL, NULL),
(216, 91, 93, NULL, NULL),
(217, 91, 93, NULL, NULL),
(218, 102, 97, NULL, NULL),
(219, 102, 97, NULL, NULL),
(220, 102, 97, NULL, NULL),
(221, 99, 98, NULL, NULL),
(222, 93, 93, 102, NULL),
(223, 93, 86, 96, 99),
(224, 93, 86, 96, 99),
(225, 93, 86, 96, 99),
(226, 93, 86, 96, 99),
(227, 93, 86, 96, 99),
(228, 93, 86, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_contact` varchar(100) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nom_contact`, `lien`, `image`) VALUES
(1, 'Facebook', 'https://www.facebook.com', 'facebook.png'),
(2, 'LinkedIn', 'https://www.linkedin.com', 'linkedIn.png'),
(3, 'Twitter', 'https://www.twitter.com', 'twitter.png');

-- --------------------------------------------------------

--
-- Table structure for table `diaporama`
--

DROP TABLE IF EXISTS `diaporama`;
CREATE TABLE IF NOT EXISTS `diaporama` (
  `ID_Image` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Image` varchar(100) DEFAULT NULL,
  `Chemin_Image` varchar(200) DEFAULT NULL,
  `Lien` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_Image`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diaporama`
--

INSERT INTO `diaporama` (`ID_Image`, `Nom_Image`, `Chemin_Image`, `Lien`) VALUES
(4, 'diapo 1', '/diaporama_car', 'https://www.caranddriver.com/news/'),
(5, 'diapo 2', '/diapo2', 'https://www.caranddriver.com/news/'),
(6, 'diapo 3', '/diapo3', 'https://www.caranddriver.com/news/'),
(7, 'diapo 4', '/diapo4', 'https://www.caranddriver.com/news/');

-- --------------------------------------------------------

--
-- Table structure for table `favoris_utilisateur_vehicule`
--

DROP TABLE IF EXISTS `favoris_utilisateur_vehicule`;
CREATE TABLE IF NOT EXISTS `favoris_utilisateur_vehicule` (
  `ID_Favori` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` int(11) DEFAULT NULL,
  `ID_Vehicule` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Favori`),
  KEY `fk_favoris_user` (`ID_Utilisateur`),
  KEY `fk_favoris_vehicule` (`ID_Vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favoris_utilisateur_vehicule`
--

INSERT INTO `favoris_utilisateur_vehicule` (`ID_Favori`, `ID_Utilisateur`, `ID_Vehicule`) VALUES
(1, 21, 86),
(2, 21, 91),
(3, 21, 92);

-- --------------------------------------------------------

--
-- Table structure for table `guide_achat`
--

DROP TABLE IF EXISTS `guide_achat`;
CREATE TABLE IF NOT EXISTS `guide_achat` (
  `ID_Guide` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_guide_achat` varchar(100) DEFAULT NULL,
  `Contenu_guide_achat` text,
  PRIMARY KEY (`ID_Guide`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guide_achat`
--

INSERT INTO `guide_achat` (`ID_Guide`, `Titre_guide_achat`, `Contenu_guide_achat`) VALUES
(13, 'Guide pour l\'entretien regulier de votre vehicule', 'Des conseils pratiques pour entretenir votre voiture et assurer sa longevite sans tracas.'),
(14, 'Comparatif des voitures compactes', '          Un apercu des differentes voitures compactes disponibles, mettant en lumiere leurs performances, economie de carburant et design.        '),
(15, 'Choisir entre la puissance et l\'efficacite energetique', 'Comment naviguer entre les voitures puissantes et celles qui offrent une meilleure economie de carburant ? Ce guide vous aide a decider.');

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `ID_Marque` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_marque` varchar(50) DEFAULT NULL,
  `Pays_origine` varchar(50) DEFAULT NULL,
  `Siege_social` varchar(100) DEFAULT NULL,
  `Annee_de_creation` int(11) DEFAULT NULL,
  `Image_marque` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Marque`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`ID_Marque`, `Nom_marque`, `Pays_origine`, `Siege_social`, `Annee_de_creation`, `Image_marque`) VALUES
(22, 'Volkswagen', 'Allemagne', 'Wolfsburg, Allemagne', 1937, '/volks'),
(25, 'Skoda', 'Republique tcheque', 'Mlada Boleslav,tcheque', 1895, '/skoda'),
(27, 'Peugeot', 'France', 'Sochaux, France', 1810, '/peugeot'),
(29, 'Renault', 'France', 'Boulogne-Billancourt, France', 1899, '/renault'),
(30, 'Land rover', 'Royaume Uni', 'Whitley, Coventry, Royaume Uni', 1948, '/landrover');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `ID_News` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(100) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Contenu` text,
  PRIMARY KEY (`ID_News`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID_News`, `Titre`, `Image`, `Contenu`) VALUES
(1, 'New Electric Vehicle Model Unveiled', '/news1', '                                                                        Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.\r\n\r\n                                                Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.                                        \r\n\r\n                                                Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.  \r\n                                                Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.                                        \r\n                                                Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.                                        \r\n                                                Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.                                        \r\n                                                Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.                                                                              \r\n\r\n                                                Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.                                        \r\n\r\n                                                Tesla Motors has officially unveiled its latest electric vehicle model, promising revolutionary battery technology and extended range.                                                                                                  '),
(3, 'Ford Announces Partnership for Autonomous Vehicles', '/news2', '                        Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions.    \r\n            Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions.          \r\n            Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions.          \r\n            Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions.          \r\n            Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions.          \r\n            Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions.                          '),
(13, 'Ford Announces Partnership for Autonomous Vehicles', '/news3', '        Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions. Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions. Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions. Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions. Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions. Ford Motor Company has partnered with leading tech firms to accelerate the development of autonomous vehicle technology, aiming for safer and efficient transportation solutions.	');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `ID_Note` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Vehicule` int(11) DEFAULT NULL,
  `ID_Utilisateur` int(11) DEFAULT NULL,
  `Note` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Note`),
  KEY `fk_note_user` (`ID_Utilisateur`),
  KEY `fk_note_vehicule` (`ID_Vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`ID_Note`, `ID_Vehicule`, `ID_Utilisateur`, `Note`) VALUES
(1, 92, 21, 8),
(2, 91, 21, 8),
(3, 86, 21, 7),
(4, 91, 6, 7),
(5, 92, 8, 7),
(6, 91, 22, 8);

-- --------------------------------------------------------

--
-- Table structure for table `note_marque`
--

DROP TABLE IF EXISTS `note_marque`;
CREATE TABLE IF NOT EXISTS `note_marque` (
  `ID_Note` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Marque` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  `Note` int(11) NOT NULL,
  PRIMARY KEY (`ID_Note`),
  KEY `ID_Marque` (`ID_Marque`),
  KEY `ID_Utilisateur` (`ID_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note_marque`
--

INSERT INTO `note_marque` (`ID_Note`, `ID_Marque`, `ID_Utilisateur`, `Note`) VALUES
(5, 22, 21, 8),
(6, 22, 22, 8),
(7, 30, 21, 5);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_Utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_utilisateur` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Sexe` varchar(10) DEFAULT NULL,
  `Date_de_naissance` date DEFAULT NULL,
  `Mot_de_passe` varchar(100) DEFAULT NULL,
  `Status_de_validation` varchar(20) DEFAULT NULL,
  `bloque` varchar(20) DEFAULT NULL,
  `email_utilisateur` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_Utilisateur`, `Nom_utilisateur`, `Prenom`, `Sexe`, `Date_de_naissance`, `Mot_de_passe`, `Status_de_validation`, `bloque`, `email_utilisateur`) VALUES
(6, 'Mammeri', 'Emma', 'Femme', '1997-04-02', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Valide', 'Non', 'Emma@gmail.com'),
(8, 'Chabi', 'Sofia', 'Femme', '1999-09-05', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Valide', 'Non', 'Sophia@gmail.com'),
(21, 'Arab', 'Bilal', 'Homme', '2002-03-09', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Valide', 'Non', 'bilal@gmail.com'),
(22, 'Hamoudi', 'Abdesslam', 'Homme', '2003-06-08', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Valide', 'Non', 'abdou@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `ID_Vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Marque` int(11) DEFAULT NULL,
  `Modele` varchar(50) DEFAULT NULL,
  `Version` varchar(50) DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `Image_vehicule` varchar(100) DEFAULT NULL,
  `Dimensions` varchar(100) DEFAULT NULL,
  `Consommation` varchar(50) DEFAULT NULL,
  `Moteur` varchar(50) DEFAULT NULL,
  `Performance` varchar(50) DEFAULT NULL,
  `Prix` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_Vehicule`),
  KEY `fk_vehicule_marque` (`ID_Marque`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`ID_Vehicule`, `ID_Marque`, `Modele`, `Version`, `Annee`, `Image_vehicule`, `Dimensions`, `Consommation`, `Moteur`, `Performance`, `Prix`) VALUES
(86, 22, 'Golf', 'Life 2.0 TDI', 2020, '/golf', '4284x1789x1456', '4.1-4.2L/100km', 'I4 Diesel', '0-100km/h in 8.5s', '32000.00'),
(91, 22, 'Tiguan', 'R-Line', 2015, '/Tiguan', '4800x2100x1600', '4.1-4.2L/100km', 'V6 Hybrid', '0-60mph in 5.5s', '150000.00'),
(92, 22, 'Touareg', 'V8 TDI', 2019, '/touareg', '4800x2100x1600', '4.1-4.2L/100km', 'V6 Hybrid', '0-60mph in 5.5s', '300000.00'),
(93, 25, 'Octavia', 'RS', 2018, '/octavia', '4800x2100x1600', '4.1-4.2L/100km', 'V6 Hybrid', '0-60mph in 5.5s', '120000.00'),
(94, 25, 'Superb', 'SportLine', 2013, '/superb', '4800x2100x1600', '4.1-4.2L/100km', 'I4 Diesel', '0-60mph in 5.5s', '16000.00'),
(95, 25, 'Kodiaq', 'Scout', 2020, '/kodiaq', '4800x2100x1600', '4.1-4.2L/100km', 'I5 Diesel', '0-60mph in 5.5s', '25000.00'),
(96, 27, '208', 'GTi', 2014, '/208', '4800x2100x1600', '4.1-4.2L/100km', 'I4 Diesel', '0-60mph in 5.5s', '11000.00'),
(97, 27, '3008', 'GT', 2011, '/3008', '4800x2100x1600', '4.1-4.2L/100km', 'V6 Hybrid', '0-60mph in 5.5s', '15000.00'),
(98, 27, '508', 'SW', 2021, '/508', '4800x2100x1600', '5-6L/100km', 'V3 Hybrid', '0-60mph in 5.5s', '250000.00'),
(99, 29, 'Clio', 'RS', 2015, '/clio', '4800x2100x1600', '4.1-4.2L/100km', 'I4 Diesel', '0-60mph in 5.5s', '120000.00'),
(100, 29, 'Megane', 'RS', 2017, '/megane', '4800x2100x1600', '4.1-4.2L/100km', 'V6 Hybrid', '0-60mph in 5.5s', '20000.00'),
(101, 29, 'Duster', 'RS', 2015, '/duster', '4800x2100x1600', '4.1-4.2L/100km', 'I4 Diesel', '0-60mph in 5.5s', '20000.00'),
(102, 30, 'Range Rover', ' Sport SVR', 2020, '/range', '4800x2100x1600', '4.1-4.2L/100km', 'V6 Hybrid', '0-60mph in 5.5s', '30000.00'),
(103, 30, 'Discovery', 'Sport', 2022, '/discovery', '4800x2100x1600', '4.1-4.2L/100km', 'V3 Hybrid', '0-60mph in 5.5s', '40000.00'),
(104, 30, 'Defender', '90', 2022, '/defender', '4800x2100x1600', '4.1-4.2L/100km', 'V3 Hybrid', '0-60mph in 5.5s', '40000.00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_user` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_avis_vehicule` FOREIGN KEY (`ID_Vehicule`) REFERENCES `vehicule` (`ID_Vehicule`) ON DELETE CASCADE;

--
-- Constraints for table `comparaison`
--
ALTER TABLE `comparaison`
  ADD CONSTRAINT `fk_comparaison_vehicule1` FOREIGN KEY (`ID_Vehicule1`) REFERENCES `vehicule` (`ID_Vehicule`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comparaison_vehicule2` FOREIGN KEY (`ID_Vehicule2`) REFERENCES `vehicule` (`ID_Vehicule`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comparaison_vehicule3` FOREIGN KEY (`ID_Vehicule3`) REFERENCES `vehicule` (`ID_Vehicule`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comparaison_vehicule4` FOREIGN KEY (`ID_Vehicule4`) REFERENCES `vehicule` (`ID_Vehicule`) ON DELETE CASCADE;

--
-- Constraints for table `favoris_utilisateur_vehicule`
--
ALTER TABLE `favoris_utilisateur_vehicule`
  ADD CONSTRAINT `fk_favoris_user` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_favoris_vehicule` FOREIGN KEY (`ID_Vehicule`) REFERENCES `vehicule` (`ID_Vehicule`) ON DELETE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_note_user` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_note_vehicule` FOREIGN KEY (`ID_Vehicule`) REFERENCES `vehicule` (`ID_Vehicule`) ON DELETE CASCADE;

--
-- Constraints for table `note_marque`
--
ALTER TABLE `note_marque`
  ADD CONSTRAINT `note_marque_ibfk_1` FOREIGN KEY (`ID_Marque`) REFERENCES `marque` (`ID_Marque`) ON DELETE CASCADE,
  ADD CONSTRAINT `note_marque_ibfk_2` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE;

--
-- Constraints for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `fk_vehicule_marque` FOREIGN KEY (`ID_Marque`) REFERENCES `marque` (`ID_Marque`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
