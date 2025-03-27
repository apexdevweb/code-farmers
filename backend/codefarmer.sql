-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 mars 2025 à 00:24
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
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_mail`, `admin_password`) VALUES
(1, 'scriptenjoyer', 'scriptenjoyer@gmail.com', 'admin2025');

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comentaire`
--

INSERT INTO `comentaire` (`id`, `id_auteur`, `name_auteur`, `id_coment`, `contenu`) VALUES
(49, 73, 'Jerem', 125, 'ok');

-- --------------------------------------------------------

--
-- Structure de la table `enterprise`
--

DROP TABLE IF EXISTS `enterprise`;
CREATE TABLE IF NOT EXISTS `enterprise` (
  `id_enterprise` int NOT NULL AUTO_INCREMENT,
  `enterprise_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_password` text COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_number` int NOT NULL,
  `enterprise_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_banner` int NOT NULL,
  `enterprise_location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `confirmkey` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `confirm` int NOT NULL,
  PRIMARY KEY (`id_enterprise`),
  UNIQUE KEY `enterprise_name` (`enterprise_name`),
  UNIQUE KEY `enterprise_number` (`enterprise_number`),
  UNIQUE KEY `enterprise_mail` (`enterprise_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enterprise`
--

INSERT INTO `enterprise` (`id_enterprise`, `enterprise_name`, `enterprise_mail`, `enterprise_password`, `enterprise_number`, `enterprise_description`, `enterprise_banner`, `enterprise_location`, `date_inscription`, `confirmkey`, `confirm`) VALUES
(3, 'Tryhard studio', 'constelium9@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dFd1MkM4d1EyZ1lMQjJNcg$iaDL+lLeh5DGdvdMJUHOV+QUGWkf3aZ342t40eiimx4', 2147483647, '', 0, 'Luxembourg', '2025-03-26 00:00:00', '4169686', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id`, `titre`, `contenu`, `cd_html`, `cd_css`, `cd_js`, `id_auteur`, `nom_auteur`, `date_publication`, `img_publication`) VALUES
(125, 'My tabs', 'création d\'un menu tabs', '&lt;div class=&quot;tab&quot;&gt;\r\n  &lt;button class=&quot;tablinks&quot; onclick=&quot;openCity(event, &#039;London&#039;)&quot;&gt;London&lt;/button&gt;\r\n  &lt;button class=&quot;tablinks&quot; onclick=&quot;openCity(event, &#039;Paris&#039;)&quot;&gt;Paris&lt;/button&gt;\r\n  &lt;button class=&quot;tablinks&quot; onclick=&quot;openCity(event, &#039;Tokyo&#039;)&quot;&gt;Tokyo&lt;/button&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;!-- Tab content --&gt;\r\n&lt;div id=&quot;London&quot; class=&quot;tabcontent&quot;&gt;\r\n  &lt;h3&gt;London&lt;/h3&gt;\r\n  &lt;p&gt;London is the capital city of England.&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div id=&quot;Paris&quot; class=&quot;tabcontent&quot;&gt;\r\n  &lt;h3&gt;Paris&lt;/h3&gt;\r\n  &lt;p&gt;Paris is the capital of France.&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div id=&quot;Tokyo&quot; class=&quot;tabcontent&quot;&gt;\r\n  &lt;h3&gt;Tokyo&lt;/h3&gt;\r\n  &lt;p&gt;Tokyo is the capital of Japan.&lt;/p&gt;\r\n&lt;/div&gt;', '.tab {\r\n  overflow: hidden;\r\n  border: 1px solid #ccc;\r\n  background-color: #f1f1f1;\r\n}\r\n\r\n/* Style the buttons that are used to open the tab content */\r\n.tab button {\r\n  background-color: inherit;\r\n  float: left;\r\n  border: none;\r\n  outline: none;\r\n  cursor: pointer;\r\n  padding: 14px 16px;\r\n  transition: 0.3s;\r\n}\r\n\r\n/* Change background color of buttons on hover */\r\n.tab button:hover {\r\n  background-color: #ddd;\r\n}\r\n\r\n/* Create an active/current tablink class */\r\n.tab button.active {\r\n  background-color: #ccc;\r\n}\r\n\r\n/* Style the tab content */\r\n.tabcontent {\r\n  display: none;\r\n  padding: 6px 12px;\r\n  border: 1px solid #ccc;\r\n  border-top: none;\r\n}', 'function openCity(evt, cityName) {\r\n  // Declare all variables\r\n  var i, tabcontent, tablinks;\r\n\r\n  // Get all elements with class=&quot;tabcontent&quot; and hide them\r\n  tabcontent = document.getElementsByClassName(&quot;tabcontent&quot;);\r\n  for (i = 0; i &lt; tabcontent.length; i++) {\r\n    tabcontent[i].style.display = &quot;none&quot;;\r\n  }\r\n\r\n  // Get all elements with class=&quot;tablinks&quot; and remove the class &quot;active&quot;\r\n  tablinks = document.getElementsByClassName(&quot;tablinks&quot;);\r\n  for (i = 0; i &lt; tablinks.length; i++) {\r\n    tablinks[i].className = tablinks[i].className.replace(&quot; active&quot;, &quot;&quot;);\r\n  }\r\n\r\n  // Show the current tab, and add an &quot;active&quot; class to the button that opened the tab\r\n  document.getElementById(cityName).style.display = &quot;block&quot;;\r\n  evt.currentTarget.className += &quot; active&quot;;\r\n}', 73, 'Jerem', '20/03/2025', 'portable.webp'),
(126, 'Side barre avec icônes', 'Création d\'une sidebarre avec des icone', '&lt;!-- Load an icon library --&gt;\r\n&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css&quot;&gt;\r\n\r\n&lt;!-- The sidebar --&gt;\r\n&lt;div class=&quot;sidebar&quot;&gt;\r\n  &lt;a href=&quot;#home&quot;&gt;&lt;i class=&quot;fa fa-fw fa-home&quot;&gt;&lt;/i&gt; Home&lt;/a&gt;\r\n  &lt;a href=&quot;#services&quot;&gt;&lt;i class=&quot;fa fa-fw fa-wrench&quot;&gt;&lt;/i&gt; Services&lt;/a&gt;\r\n  &lt;a href=&quot;#clients&quot;&gt;&lt;i class=&quot;fa fa-fw fa-user&quot;&gt;&lt;/i&gt; Clients&lt;/a&gt;\r\n  &lt;a href=&quot;#contact&quot;&gt;&lt;i class=&quot;fa fa-fw fa-envelope&quot;&gt;&lt;/i&gt; Contact&lt;/a&gt;\r\n&lt;/div&gt;', '/* Style the sidebar - fixed full height */\r\n.sidebar {\r\n  height: 100%;\r\n  width: 160px;\r\n  position: fixed;\r\n  z-index: 1;\r\n  top: 0;\r\n  left: 0;\r\n  background-color: #111;\r\n  overflow-x: hidden;\r\n  padding-top: 16px;\r\n}\r\n\r\n/* Style sidebar links */\r\n.sidebar a {\r\n  padding: 6px 8px 6px 16px;\r\n  text-decoration: none;\r\n  font-size: 20px;\r\n  color: #818181;\r\n  display: block;\r\n}\r\n\r\n/* Style links on mouse-over */\r\n.sidebar a:hover {\r\n  color: #f1f1f1;\r\n}\r\n\r\n/* Style the main content */\r\n.main {\r\n  margin-left: 160px; /* Same as the width of the sidenav */\r\n  padding: 0px 10px;\r\n}\r\n\r\n/* Add media queries for small screens (when the height of the screen is less than 450px, add a smaller padding and font-size) */\r\n@media screen and (max-height: 450px) {\r\n  .sidebar {padding-top: 15px;}\r\n  .sidebar a {font-size: 18px;}\r\n}', 'no js!', 73, 'Jerem', '20/03/2025', 'bgone.jpg'),
(128, 'Off canvas', 'Création d\'un menu off canvas', '&lt;div id=&quot;mySidenav&quot; class=&quot;sidenav&quot;&gt;\r\n  &lt;a href=&quot;javascript:void(0)&quot; class=&quot;closebtn&quot; onclick=&quot;closeNav()&quot;&gt;&amp;times;&lt;/a&gt;\r\n  &lt;a href=&quot;#&quot;&gt;About&lt;/a&gt;\r\n  &lt;a href=&quot;#&quot;&gt;Services&lt;/a&gt;\r\n  &lt;a href=&quot;#&quot;&gt;Clients&lt;/a&gt;\r\n  &lt;a href=&quot;#&quot;&gt;Contact&lt;/a&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;!-- Use any element to open the sidenav --&gt;\r\n&lt;span onclick=&quot;openNav()&quot;&gt;open&lt;/span&gt;\r\n\r\n&lt;!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page --&gt;\r\n&lt;div id=&quot;main&quot;&gt;\r\n  ...\r\n&lt;/div&gt;', '/* The side navigation menu */\r\n.sidenav {\r\n  height: 100%; /* 100% Full-height */\r\n  width: 0; /* 0 width - change this with JavaScript */\r\n  position: fixed; /* Stay in place */\r\n  z-index: 1; /* Stay on top */\r\n  top: 0;\r\n  left: 0;\r\n  background-color: #111; /* Black*/\r\n  overflow-x: hidden; /* Disable horizontal scroll */\r\n  padding-top: 60px; /* Place content 60px from the top */\r\n  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */\r\n}\r\n\r\n/* The navigation menu links */\r\n.sidenav a {\r\n  padding: 8px 8px 8px 32px;\r\n  text-decoration: none;\r\n  font-size: 25px;\r\n  color: #818181;\r\n  display: block;\r\n  transition: 0.3s;\r\n}\r\n\r\n/* When you mouse over the navigation links, change their color */\r\n.sidenav a:hover {\r\n  color: #f1f1f1;\r\n}\r\n\r\n/* Position and style the close button (top right corner) */\r\n.sidenav .closebtn {\r\n  position: absolute;\r\n  top: 0;\r\n  right: 25px;\r\n  font-size: 36px;\r\n  margin-left: 50px;\r\n}\r\n\r\n/* Style page content - use this if you want to push the page content to the right when you open the side navigation */\r\n#main {\r\n  transition: margin-left .5s;\r\n  padding: 20px;\r\n}\r\n\r\n/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */\r\n@media screen and (max-height: 450px) {\r\n  .sidenav {padding-top: 15px;}\r\n  .sidenav a {font-size: 18px;}\r\n}\r\n', '/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */\r\nfunction openNav() {\r\n  document.getElementById(&quot;mySidenav&quot;).style.width = &quot;250px&quot;;\r\n  document.getElementById(&quot;main&quot;).style.marginLeft = &quot;250px&quot;;\r\n}\r\n\r\n/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */\r\nfunction closeNav() {\r\n  document.getElementById(&quot;mySidenav&quot;).style.width = &quot;0&quot;;\r\n  document.getElementById(&quot;main&quot;).style.marginLeft = &quot;0&quot;;\r\n}', 73, 'Jerem', '20/03/2025', '76352fb6ecdd259216b4808abb9c40aa.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `userName`, `mail`, `userPassword`, `date_naissance`, `ville`, `genre`, `date_inscription`, `statut`, `avatar`, `skill`, `lien_github`, `lien_web`, `youtube`, `confirmkey`, `confirm`) VALUES
(73, 'Jerem', 'j.hiroux456@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZFBDUDFWQkptTmtVOXVVVA$pG09DYyx+srv4zi+Lzx/7A2mwSVoe5I1mxWaCUB/Mto', '1989-01-13', 'Bruxelles', 'Homme', '2025-03-20 00:00:00', NULL, '73.webp', 'html5 css3 javascript php mysql nodejs bootstrap react github gitkraken', 'https://github.com/apexdevweb', 'https://apexdevweb.github.io/ScriptEnjoyer.github.io/', 'https://www.youtube.com/@ScriptEnjoyer-p4r', '4313849', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visites`
--

INSERT INTO `visites` (`id`, `date`, `consulted_profile_id`) VALUES
(99, '2025-03-03 18:40:13', 72),
(100, '2025-03-03 20:40:42', 72),
(101, '2025-03-18 02:22:50', 72),
(102, '2025-03-19 19:41:54', 72),
(103, '2025-03-19 22:08:18', 72),
(104, '2025-03-19 22:08:27', 72),
(105, '2025-03-19 23:33:39', 72),
(106, '2025-03-20 17:12:03', 72),
(107, '2025-03-20 17:16:36', 72),
(108, '2025-03-20 17:16:44', 72),
(109, '2025-03-20 17:48:15', 72),
(110, '2025-03-20 23:04:34', 73),
(111, '2025-03-20 23:35:03', 73),
(112, '2025-03-20 23:40:45', 73),
(113, '2025-03-22 15:58:33', 73),
(114, '2025-03-22 16:03:33', 73),
(115, '2025-03-22 23:57:01', 73),
(116, '2025-03-22 23:59:47', 73);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
