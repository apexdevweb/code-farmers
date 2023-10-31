-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 oct. 2023 à 23:26
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `codefarmer`
--

-- --------------------------------------------------------

--
-- Structure de la table `comentaire`
--

DROP TABLE IF EXISTS `comentaire`;
CREATE TABLE IF NOT EXISTS `comentaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_auteur` int NOT NULL,
  `name_auteur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_coment` int NOT NULL,
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comentaire`
--

INSERT INTO `comentaire` (`id`, `id_auteur`, `name_auteur`, `id_coment`, `contenu`) VALUES
(16, 5, 'Apex', 31, 'Bienvenue Sylvie!!!'),
(19, 10, 'sylvie', 30, 'Merci apex super site web');

-- --------------------------------------------------------

--
-- Structure de la table `msgprive`
--

DROP TABLE IF EXISTS `msgprive`;
CREATE TABLE IF NOT EXISTS `msgprive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_destinataire` int NOT NULL,
  `id_expediteur` int NOT NULL,
  `msg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `msgprive`
--

INSERT INTO `msgprive` (`id`, `message`, `id_destinataire`, `id_expediteur`, `msg_date`) VALUES
(61, 'bonjour apex comment ca vas ?', 5, 10, '2023-10-30 00:00:00'),
(62, 'je vais très biens merci et toi ?', 10, 5, '2023-10-30 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` text COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_auteur` int NOT NULL,
  `nom_auteur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_publication` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_publication` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id`, `titre`, `contenu`, `id_auteur`, `nom_auteur`, `date_publication`, `img_publication`) VALUES
(30, 'Welcom', 'Bienvenue sur mon nouveau site web!!!', 5, 'Apex', '27/10/2023', NULL),
(31, 'Je suis nouvelle', 'Bonjour je m\'appel sylvie et je suis nouvelle sur le site.', 10, 'sylvie', '30/10/2023', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `userPassword` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `genre` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `date-connexion` datetime NOT NULL,
  `statut` int DEFAULT NULL,
  `role` int DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_general_ci,
  `skill` text COLLATE utf8mb4_general_ci,
  `lien_web` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `userName`, `mail`, `userPassword`, `date_naissance`, `ville`, `genre`, `date_inscription`, `date-connexion`, `statut`, `role`, `avatar`, `skill`, `lien_web`) VALUES
(5, 'Apex', 'j.hiroux456@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$d3NrRjNwaFdTbDVRSFJOdQ$gv8BxK7Zw3EpeYgn2HOBCHOT7n0gpBg/+PRkZra0FxA', '1989-01-13', 'Bruxelles', 'Homme', '2023-10-22 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '5.jpg', 'html5 css3 javascript php mysql bootstrap github', 'https://apexdevweb.github.io/apexdev.github.io/'),
(10, 'sylvie', 'sylvie123@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$SXRHOUp1U3NjNlFKTnlMVg$K3Zb7H5ULwwTo42pfExx422LvZ78E5x9tiJxzrklAb0', '1991-08-10', 'Namur', 'Femme', '2023-10-30 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '10.jpg', 'html5 css3 javascript nodejs react vueJs github', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
