-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 11 mars 2019 à 07:18
-- Version du serveur :  10.3.13-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `id4255145_dev_social`
--

-- --------------------------------------------------------

--
-- Structure de la table `info_users`
--

DROP TABLE IF EXISTS `info_users`;
CREATE TABLE `info_users` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `profil` varchar(55) DEFAULT NULL,
  `sexe` enum('H','F') DEFAULT NULL,
  `facebook` varchar(55) DEFAULT NULL,
  `twitter` varchar(55) DEFAULT NULL,
  `biographie` text DEFAULT NULL,
  `github` varchar(55) DEFAULT NULL,
  `emploi` enum('0','1') DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `info_users`
--

INSERT INTO `info_users` (`id`, `users_id`, `ville`, `pays`, `profil`, `sexe`, `facebook`, `twitter`, `biographie`, `github`, `emploi`) VALUES
(3, 9, 'sfsdfsdsdf', 'dsfsdsdf', 'dev-web', 'H', 'sdf', '123456', 'sdfsdfsdfsd', 'xcvxc', '1'),
(2, 8, '', 'xcvwxcvw', 'dev-web', 'H', 'xcvwxcvw', 'xcvwxcvw', 'xcvwxcvw', 'xcvwxcvw', '0'),
(4, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(5, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(6, 15, 'dreux', 'france', 'dev-web', 'H', '', '', 'hello\r\n', 'http://github.com/kam3leon', '1');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `email_token` varchar(255) DEFAULT NULL,
  `pass_token` varchar(255) DEFAULT NULL,
  `remembe_me` varchar(255) DEFAULT NULL,
  `activation_account` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tokens`
--

INSERT INTO `tokens` (`id`, `users_id`, `email_token`, `pass_token`, `remembe_me`, `activation_account`) VALUES
(10, 10, NULL, NULL, NULL, '2017-12-18 09:36:58'),
(9, 9, NULL, NULL, NULL, '2017-12-18 08:21:42'),
(8, 8, NULL, NULL, NULL, '2017-12-17 19:57:41'),
(11, 11, 'c7fd32872457f5b6d956dd78dbec9ca54734740f', NULL, NULL, NULL),
(12, 12, 'a8bccc1587cb573d32bcce766515993bc3b5b046', NULL, NULL, NULL),
(13, 13, NULL, NULL, NULL, '2018-10-23 14:58:06'),
(14, 14, '1ce975eaf1e6b28304a9eb0a514e5832ae5ed609', NULL, NULL, NULL),
(15, 15, NULL, NULL, NULL, '2019-02-11 10:23:45');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(55) DEFAULT NULL,
  `pseudo` varchar(55) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `grade` enum('user','modera','admin','superadmin') DEFAULT 'user',
  `active` enum('0','1') DEFAULT '0',
  `date_inscrip` datetime DEFAULT current_timestamp(),
  `password` varchar(255) DEFAULT NULL,
  `etats` enum('0','1') DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `pseudo`, `email`, `grade`, `active`, `date_inscrip`, `password`, `etats`) VALUES
(10, 'stephane', 'stephane', 'stephane@gmail.com', 'user', '1', '2017-12-18 09:36:39', '$2y$10$vaNja7ixmFcuw4GKqvqJXeLh.LuHrrCmfxyH/qUIRID3jP7/b/GyW', '0'),
(9, 'frediddfsd', 'fredisdf', 'fredi@gmail.com', 'user', '1', '2017-12-18 08:16:41', '$2y$10$r8qSsBcRlRKle5isw9O04OIHuPx6k4R5zTnWsbLlRs995fB51f5eS', '1'),
(8, 'azerty', 'azerty', 'prenom@gmail.com', 'user', '1', '2017-12-17 19:56:34', '$2y$10$SxBAvqKBURv83trmpCxaPehMKp3Ixi38LNEJS0qDaM5Aasdkyfc0i', '1'),
(11, 'fredi', 'fredile pro', 'fredicm25@gmail.com', 'user', '0', '2018-01-11 21:19:34', '$2y$10$39W8BqsR7NWDo4oiP0GQD.dzoZfWASeaHSKdedPYG0Lr770bLooHS', '0'),
(12, 'sqdfqsdf', '123654', 'llldsfsdlkk@gmm.com', 'user', '0', '2018-01-11 21:56:03', '$2y$10$kdjZdZCymG3vHGev/AKCkuC9M/kSxmjAdxZjM.0k3iZdKhImrEr3a', '0'),
(13, 'ben', 'benito', 'benwaffo@yahoo.fr', 'user', '1', '2018-10-23 14:56:06', '$2y$10$B.gqBAcM1Lkqh4EcVABf6.c11nj7RfJftpjWI9QBJzZq3u6ozd.1y', '0'),
(14, 'Azertyaz', 'Azertyaz', 'philippesteve2.ps@gmail.com', 'user', '0', '2019-01-14 08:42:51', '$2y$10$GiwmmDbUagfAyDurjQHikuvxDw5cyUN8idQEcy8vh27HoU0bG67Tm', '0'),
(15, 'malzat', 'Kam3leoN', 'cedric.malzat@gmail.com', 'user', '1', '2019-02-11 10:22:32', '$2y$10$gcVr7j84PmyNepsSbr6QtumEx4sI./VURa/H8l0W0JrfpVjAqH9OK', '1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `info_users`
--
ALTER TABLE `info_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `info_users`
--
ALTER TABLE `info_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
