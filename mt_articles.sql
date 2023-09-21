-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 13 août 2023 à 00:01
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_mt`
--

-- --------------------------------------------------------

--
-- Structure de la table `mt_articles`
--

DROP TABLE IF EXISTS `mt_articles`;
CREATE TABLE IF NOT EXISTS `mt_articles` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT 'Sweat à capuche',
  `price` tinyint NOT NULL DEFAULT '80',
  `description` text NOT NULL,
  `view_img` varchar(50) NOT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mt_articles`
--

INSERT INTO `mt_articles` (`id_article`, `name`, `price`, `description`, `view_img`, `color`) VALUES
(1, 'Sweat à capuche', 80, 'Le Sweat à capuche de PogoMode convient à toute les tailles avec plusieurs couleurs disponibles', 'Catalogue_PogoMode/Sweat_Bleu.png', 'Bleu'),
(2, 'Sweat à  capuche', 80, 'Le Sweat à capuche de PogoMode convient à toute les tailles avec plusieurs couleurs disponibles', 'Catalogue_PogoMode/Sweat_Jaune.png', 'Jaune'),
(3, 'Sweat à  capuche', 80, 'Le Sweat à capuche de PogoMode convient à toute les tailles avec plusieurs couleurs disponibles', 'Catalogue_PogoMode/Sweat_Orange.png', 'Orange'),
(4, 'Sweat à  capuche', 80, 'Le Sweat à capuche de PogoMode convient à toute les tailles avec plusieurs couleurs disponibles', 'Catalogue_PogoMode/Sweat_Vert.png', 'Vert');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
