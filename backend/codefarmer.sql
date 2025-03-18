-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 mars 2025 à 05:58
-- Version du serveur : 8.0.31
-- Version de PHP : 8.3.9

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
  `name_auteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_coment` int NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enterprise`
--

DROP TABLE IF EXISTS `enterprise`;
CREATE TABLE IF NOT EXISTS `enterprise` (
  `id_enterprise` int NOT NULL,
  `enterprise_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_leader` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  UNIQUE KEY `enterprise_name` (`enterprise_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `msgprive`
--

DROP TABLE IF EXISTS `msgprive`;
CREATE TABLE IF NOT EXISTS `msgprive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_destinataire` int NOT NULL,
  `id_expediteur` int NOT NULL,
  `msg_date` datetime NOT NULL,
  `statut` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cd_html` text COLLATE utf8mb4_general_ci,
  `cd_css` text COLLATE utf8mb4_general_ci,
  `cd_js` text COLLATE utf8mb4_general_ci,
  `id_auteur` int NOT NULL,
  `nom_auteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_publication` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_publication` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `statut` int DEFAULT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `skill` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lien_github` text COLLATE utf8mb4_general_ci,
  `lien_web` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `youtube` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `confirmkey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `userName`, `mail`, `userPassword`, `date_naissance`, `ville`, `genre`, `date_inscription`, `statut`, `avatar`, `skill`, `lien_github`, `lien_web`, `youtube`, `confirmkey`, `confirm`) VALUES
(72, 'jerem', 'j.hiroux456@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NWZRUVBZVkRhS3dOT0ZUMQ$1o0+K5SLcX4DDyi2nxrVNAS+nj2UGcbK+PexAIRL+wM', '1989-01-04', 'Bruxelles', 'Homme', '2025-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '5923292', 1);

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

DROP TABLE IF EXISTS `visites`;
CREATE TABLE IF NOT EXISTS `visites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL,
  `consulted_profile_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visites`
--

INSERT INTO `visites` (`id`, `date`, `consulted_profile_id`) VALUES
(99, '2025-03-03 18:40:13', 72),
(100, '2025-03-03 20:40:42', 72),
(101, '2025-03-18 02:22:50', 72);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
