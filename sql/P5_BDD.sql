-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 mai 2019 à 22:54
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `art_content` tinytext NOT NULL,
  `art_date_added` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_user1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `art_content`, `art_date_added`, `user_id`) VALUES
(2, 'Mon premier Projet : Etude ', '<p>Etude de mon premier projet ainsi que ses caract&eacute;ristiques</p>', '2019-05-10', 1),
(3, 'Mon projet : Analyse Technique', '<p>L\'analyse technique et architecturale de mon premier projet&nbsp;</p>', '2019-05-10', 1),
(4, 'Festival de film : Wordpress', '<p>Comment j\'ai utiliser wordpress pour exposer un festival de film&nbsp;</p>', '2019-05-10', 1),
(5, 'Le blog pour écrivain ', '<p>Le blog pour &eacute;crivain : &eacute;crit lui m&ecirc;me en architecture MVC a l\'aide de PHP</p>', '2019-05-10', 1),
(6, 'Le metier d\'analyste programmeur', '<p>d&eacute;velopper en PHP, c\'est s\'occuper de la partie back-end, de l\'administration d\'un site, a l\'aide d\'algorithme</p>', '2019-05-10', 1),
(11, 'Article sur le PHP', '<p>Regardons de plus pr&egrave;s la fonction PHP mail();</p>', '2019-05-11', 1),
(13, 'Test 5 ', '<p>ddd</p>', '2019-05-11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `date_added` date NOT NULL,
  `status` enum('Accepted','declined','waiting') NOT NULL DEFAULT 'waiting',
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_article_idx` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `date_added`, `status`, `article_id`) VALUES
(4, 'sacha', '<p>Cet article est nul !!!&nbsp;</p>', '2019-05-10', 'waiting', 6),
(5, 'sacha', '<p>Merci beaucoup !!!&nbsp;</p>', '2019-05-10', 'Accepted', 2),
(6, 'sacha', '<p>Projet Tr&egrave;s interessent</p>', '2019-05-10', 'declined', 2),
(7, 'sacha', '<p>J\'adore ce contenu !!!&nbsp;</p>', '2019-05-11', 'waiting', 3),
(10, 'sacha', '<p>Waouuuh</p>', '2019-05-11', 'Accepted', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('administrator','member') NOT NULL,
  `privilege` enum('None','In Progress','Done') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `privilege`) VALUES
(1, 'sacha', 'sacha6623@gmail.com', '$2y$10$kE9frqoDAdq6vsea4bStW.CBN7e6kqYDDOOX8d0BH/lniE3KPDocC', 'administrator', 'None'),
(2, 'john Doe', '1111@gmail.com', '$2y$10$9qQa5erU4Jop1Un953h8S.r8gK/.32bsdIZ545TrAzNzvPS4rQbYa', 'member', 'In Progress'),
(3, 'Nicolas', '2222@gmail.com', '$2y$10$9qQa5erU4Jop1Un953h8S.r8gK/.32bsdIZ545TrAzNzvPS4rQbYa', 'member', 'None'),
(4, 'Charly', '3333@gmail.com', '$2y$10$9qQa5erU4Jop1Un953h8S.r8gK/.32bsdIZ545TrAzNzvPS4rQbYa', 'member', 'In Progress');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
