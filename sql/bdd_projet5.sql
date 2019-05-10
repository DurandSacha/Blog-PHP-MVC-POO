-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 mai 2019 à 00:00
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
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `id_author` int(100) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_author` (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `id_author`, `date_added`) VALUES
(1, 'Voici mon premier article', 'Mon super blog est en construction.', 5, '2018-01-01'),
(2, 'Un deuxième article', '<p>Ceci est l\'article 2</p>', 5, '2019-04-19'),
(3, 'Mon troisième article', 'Mon blog est génial !!!', 5, '2018-01-10');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date_added` date NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` enum('Accepted','declined','waiting') NOT NULL DEFAULT 'waiting',
  PRIMARY KEY (`id`),
  KEY `fk_article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `date_added`, `article_id`, `status`) VALUES
(1, 'Jean', 'Génial, hâte de voir ce que ça donne !', '2018-01-10', 1, 'declined'),
(2, 'Nina', 'Trop cool ! depuis le temps', '2018-01-11', 1, 'Accepted'),
(3, 'Rodrigo', 'Great ! ', '2018-01-12', 1, 'waiting'),
(4, 'Hélène', 'je suis heureuse de découvrir un super site ! Continuez comme ça ', '2018-01-06', 2, 'Accepted'),
(5, 'Moussa', 'Un peu déçu par le contenu pour le moment...', '2018-01-07', 2, 'declined'),
(6, 'Barbara', 'pressée de voir la suite', '2018-01-08', 2, 'waiting'),
(7, 'Guillaume', 'Je viens ici pour troller !', '2018-01-11', 3, 'Accepted'),
(8, 'Aurore', 'Enfin un blog tranquille, où on ne nous casse pas les pieds !', '2018-01-12', 3, 'declined'),
(9, 'Jordane', 'Je suis vendéen ! Amateur de mojettes !', '2018-01-13', 3, 'waiting'),
(10, 'michel', '<p>sssss</p>', '2019-04-23', 3, 'declined'),
(11, 'michel', '<p>Bonjour Test 2&nbsp;</p>', '2019-04-23', 2, 'declined'),
(12, 'Array', '<p>Je suis sacha&nbsp;</p>', '2019-04-23', 1, 'Accepted'),
(13, 'Array', '<p>Je suis sacha&nbsp;</p>', '2019-04-23', 1, 'declined'),
(14, 'Array', '<p>hey</p>', '2019-04-23', 1, 'declined'),
(15, 'sacha', '<p>hey2</p>', '2019-04-23', 1, 'waiting');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `content` varchar(20000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('administrator','member') NOT NULL DEFAULT 'member',
  `privilege` enum('None','In progress','Done') DEFAULT 'None',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `privilege`) VALUES
(5, 'sacha', 'sacha6623@gmail.com', '$2y$10$wnOJ./veTWujKHnzMHm0yePy328bQk6z9D6Fc2q4zzJO34GHgWt3C', 'administrator', 'None'),
(4, 'john Doe', '1111@gmail.com', '$2y$10$iTLMNP6LAPIV0dH7acFNCuE7Wi.wrazQNYHR0YKB1IIhvYSDRN3cC', 'member', 'In progress');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
