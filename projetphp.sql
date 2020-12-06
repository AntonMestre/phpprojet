-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 06 déc. 2020 à 20:02
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `cd`
--

DROP TABLE IF EXISTS `cd`;
CREATE TABLE IF NOT EXISTS `cd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `src` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cd`
--

INSERT INTO `cd` (`id`, `titre`, `auteur`, `genre`, `prix`, `src`) VALUES
(1, 'Blurryface', 'Twenty One Pilots', 'Pop', '10', 'top.jpg'),
(2, 'After Hours', 'The Weeknd', 'Pop', '18', 'after.jpg'),
(3, 'Scorpion', 'Drake', 'RnB', '20', 'scorpion.jpg'),
(4, 'Vous et moi', 'Julien Dore', 'Pop', '11', 'julien.jpg'),
(5, 'Live At The Regal', 'B.B King', 'Blues', '10', 'live.jpg'),
(6, 'Feu', 'Nekfeu', 'Rap', '11', 'feu.jpg'),
(7, 'The Diary Of Alicia Keys', 'Alicia Keys', 'RnB', '8', 'alicia.jpg'),
(8, 'Nevermind', 'Nirvana', 'Rock', '8', 'nirvana.jpg'),
(9, 'N\'attendons pas', 'Vianney', 'Pop', '11', 'vianney.jpg'),
(10, 'Dialogue de sourds', 'Danakil', 'Reggae', '22', 'diana.jpg'),
(21, 'Trench', 'Twenty One Pilots', 'Pop', '15', '140319032438582034.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(50) NOT NULL,
  `mdp` char(60) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `statut` text NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`email`, `mdp`, `nom`, `statut`) VALUES
('anton@gmail.com', '$2y$10$weWh3MLI1KPW72xGLPwnwOUDR6H4bGmdWeWqGwmKBSRyFfJC35GMO', 'anton', 'admin'),
('roose@roose.com', '$2y$10$R3uMwUQyBsbTMKlV3eDF5uIJo//gJ.44yCd8wZwgOQ3g4SP77btyu', 'roose', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
