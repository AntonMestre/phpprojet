-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 18 nov. 2020 à 14:33
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
  `musiques` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cd`
--

INSERT INTO `cd` (`id`, `titre`, `auteur`, `genre`, `prix`, `src`, `musiques`) VALUES
(1, 'Burryface', 'Twenty One Pilots', 'Pop', '10', 'top.jpg', 'Heavydirtysoul;Stressed Out;Ride;Fairly Local;Tear in My Heart;Lane Boy;The Judge;Polarize;We Don\'t Believe What\'s on TV;Message Man;HometownNot Today;Goner'),
(2, 'After Hours', 'The Weeknd', 'Pop', '18', 'after.jpg', 'Alone Again;Too Late;Hardest To Love;Scared To Live;Snowchild;Escape From LA;Heartless;Faith;Blinding Lights;In Your Eyes;Save Your Tears;Repeat After Me (Interlude);After Hours;Until I Bleed Out'),
(3, 'Scorpion', 'Drake', 'RnB', '20', 'scorpion.jpg', 'Survival;Nonstop;Elevate;Emotionless;God\'s Plan;8 Out Of 10;Mob Ties;Can’t Take A Joke;Sandra’s Rose;Is There More;Peak;Summer Games;Jaded;Nice For What;Finesse'),
(4, 'Vous et moi', 'Julien Doré', 'Pop', '11', 'julien.jpg', 'Le lac;Coco Câline;Porto-Vecchio;Moonlight Serenade;Africa;Eden;Sublime et silence;Romy;Caresse;Magnolia;De mes sombres archives;Aline'),
(5, 'Live At The Regal', 'B.B King', 'Blues', '10', 'live.jpg', 'Live At The Regal;Sweet Little Angel;It\'s My Own Fault;How Blue Can You Get?;Please Love Me;You Upset Me Baby;Worry, Worry;Woke Up This Mornin\';You Done Lost Your Good Thing Now;Help The Poor'),
(6, 'Feu', 'Nekfeu', 'Rap', '11', 'feu.jpg', 'Martin Eden;Mon ame;Le horla;Nique les clones, Pt. II;Rêve d\'avoir des rêves;Tempête;Egérie;Reuf;La moue des morts;Laisse aller;On verra;Ma dope;Jeux d\'ombres;Elle en avait envie;Princesse;Risibles amours;Point d\'interrogation;Etre humain'),
(7, 'The Diary Of Alicia Keys', 'Alicia Keys', 'RnB', '8', 'alicia.jpg', 'Harlem\'s Nocturne;Karma;Heartburn;If I Was Your Woman / Walk On B;You Don\'t Know My Name;If I Ain\'t Got You;Diary;Dragon Days;Wake Up;So Simple;When You Really Love Someone;Feeling U, Feeling Me (Interlude);Slow Down;Samsonite Man;Nobody Not Really (Interlude)'),
(8, 'Nevermind', 'Nirvana', 'Rock', '8', 'nirvana.jpg', 'Smells Like Teen Spirit;In Bloom;Come As You Are;Breed;Lithium;Polly;Territorial Pissings;Drain You;Lounge Act;Stay Away;On A Plain;Something In The Way;Endless, Nameless'),
(9, 'N\'attendons pas', 'Vianney', 'Pop', '11', 'vianney.jpg', 'Merci pour ça;Pour de vrai;Mode;N\'attendons pas;Beau-papa;La fille du sud;Funambule;J\'ai essayé;Les imbéciles;Pardonnez-moi;Tout nu dans la neige'),
(10, 'Dialogue de sourds', 'Danakil', 'Reggae', '22', 'diana.jpg', 'Les champs de roses;Dialogue de sourds;Tant qu\'il y aura;Les vieillards;Woman;Nord-sud;Classical Option;La lettre;Samouraïs de l\'Occident;L\'ère moderne;Marley;Une autre vie;Dub vieillards;Marley (Live 2014)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
