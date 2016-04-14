-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 14 Avril 2016 à 04:27
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `intensive-week`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last` varchar(64) NOT NULL,
  `first` varchar(64) NOT NULL,
  `email_signin` varchar(64) NOT NULL,
  `password_signin` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `last`, `first`, `email_signin`, `password_signin`) VALUES
(2, 'ClÃ©ment', 'Saulnier', 'clement.saulnier@hetic.net', 'e53c14fb8a16ee8d03d646260d3f72fd132a21a24f37868925f658004ced9e09'),
(3, 'Michay', 'Robin', 'robin@gmail.com', '3fe9eab7e1aeeccf5d2e5bb6d5bb80d60e79a4606796266b6276c1f01a0830a8'),
(4, 'Test', 'Test', 'test@test.test', 'cd5ace636d58230d3ec3a82c46dc577ff901d0b302b2ad60fa8a249e5d69e846');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `movie_id` varchar(64) NOT NULL,
  `url` varchar(120) NOT NULL,
  `song` varchar(120) NOT NULL,
  `artist` varchar(120) NOT NULL,
  `empty` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `videos`
--

INSERT INTO `videos` (`id`, `movie_id`, `url`, `song`, `artist`, `empty`) VALUES
(24, '329', '7ghcHgL-FMk', 'Ipsum', 'Loremp', 'NOT NULL'),
(32, '315024', 'zcQmM0HjMH8', 'Pirates des CaraÃ¯bes', 'Musique complÃ¨te', 'NOT NULL');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
