-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 mars 2019 à 15:04
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shifumi`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `vic` int(11) DEFAULT NULL,
  `victot` int(11) DEFAULT NULL,
  `vicordi` int(11) NOT NULL,
  `niveau` int(11) DEFAULT NULL,
  `pwd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `vic`, `victot`, `vicordi`, `niveau`, `pwd`) VALUES
(1, 'jonathan', 1, 0, 1, 1, 'jonathan'),
(2, 'claude', 0, 0, 0, 1, 'claude'),
(7, 'joshua', 1, 0, 0, 1, 'joshua'),
(8, 'samuel', 0, 0, 0, 1, 'samuel'),
(9, 'admin', 0, 0, 0, 2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

DROP TABLE IF EXISTS `statistiques`;
CREATE TABLE IF NOT EXISTS `statistiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `choix` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `statistiques`
--

INSERT INTO `statistiques` (`id`, `choix`, `nombre`) VALUES
(1, 'Pierre', 621),
(2, 'Feuille', 643),
(3, 'Ciseaux', 654);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
