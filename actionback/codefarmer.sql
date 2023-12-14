-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 déc. 2023 à 09:45
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
  `name_auteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_coment` int NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comentaire`
--

INSERT INTO `comentaire` (`id`, `id_auteur`, `name_auteur`, `id_coment`, `contenu`) VALUES
(30, 38, 'Serious', 99, 'no wordpress'),
(31, 37, 'Apex', 100, 'no Word press '),
(32, 38, 'Serious', 101, 'css de ses mort mon copain');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `msgprive`
--

INSERT INTO `msgprive` (`id`, `message`, `id_destinataire`, `id_expediteur`, `msg_date`) VALUES
(79, 'dddddddddddddd', 38, 37, '2023-12-06 00:00:00'),
(80, 'yooooooooooooooooooloooooooooo', 37, 38, '2023-12-09 00:00:00'),
(81, 'v                 vvvvxx', 38, 37, '2023-12-10 00:00:00'),
(82, 'hi', 38, 37, '2023-12-13 00:00:00'),
(83, 'ouai ouai bro on est la', 37, 38, '2023-12-13 00:00:00');

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
  `date_publication` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_publication` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id`, `titre`, `contenu`, `cd_html`, `cd_css`, `cd_js`, `id_auteur`, `nom_auteur`, `date_publication`, `img_publication`) VALUES
(100, 'Salut les noobs!!!', 'Vous pouvez m\'aider svp urgent!!!', '      &lt;div class=&quot;mb-3&quot;&gt;                 &lt;label for=&quot;exampleInputEmail1&quot; class=&quot;form-label&quot;&gt;Titre de la publication&lt;/label&gt;                 &lt;input type=&quot;text&quot; class=&quot;form-control&quot; name=&quot;titlePubli&quot; maxlength=&quot;25&quot; required&gt;             &lt;/div&gt;             &lt;div class=&quot;mb-3&quot;&gt;                 &lt;label for=&quot;exampleInputPassword1&quot; class=&quot;form-label&quot;&gt;Contenu de la publication&lt;/label&gt;                 &lt;textarea class=&quot;form-control&quot; name=&quot;containPubli&quot; required&gt;&lt;/textarea&gt;             &lt;/div&gt;             &lt;div class=&quot;mb-3&quot;&gt;                 &lt;label for=&quot;exampleInputPassword1&quot; class=&quot;form-label&quot;&gt;Code-HTML&lt;/label&gt;                 &lt;input type=&quot;text&quot; class=&quot;form-control&quot; name=&quot;cdhtml&quot;&gt;&lt;/input&gt;             &lt;/div&gt;', '.codeContainer {   margin: 2px;   height: 30vh;   width: 100%;   display: block;   border: 1px solid #000;   background-color: #333; } .codeContainer_code {   margin: 2px;   height: 30vh;   width: 100%;   display: block;   border: 1px solid #000;   background-color: #333;   overflow: scroll; } .codeContainer &gt; img {   height: 30vh;   width: 100%; }', 'const gltc = document.querySelector(&quot;.gltch&quot;); const titregltc = document.querySelector(&quot;.sub_title&quot;); const cubegltc = document.querySelector(&quot;.glitch__layers&quot;);  const x = gltc.addEventListener(&quot;mouseover&quot;, () =&gt; {   titregltc.style.display = &quot;flex&quot;;   titregltc.style.fontSize = &quot;2.3rem&quot;;   cubegltc.style.display = &quot;flex&quot;; });  const y = gltc.addEventListener(&quot;mouseout&quot;, () =&gt; {   titregltc.style.display = &quot;none&quot;;   cubegltc.style.display = &quot;none&quot;; });  const gltc2 = document.querySelector(&quot;.gltch2&quot;); const titregltc2 = document.querySelector(&quot;.sub_title2&quot;); const cubegltc2 = document.querySelector(&quot;.glitch__layers2&quot;);', 38, 'Serious', '13/12/2023', 'farce.jpg'),
(101, 'upload non effectué', 'Bonjour je viens de codé ceci et l\'upload de fichier ne s\'effectue pas correctement quelq\'un aurait une solution svp ?', '&lt;!DOCTYPE html&gt; &lt;html lang=&quot;fr&quot;&gt;  &lt;head&gt;     &lt;meta charset=&quot;UTF-8&quot;&gt;     &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;     &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;     &lt;link href=&quot;https://unpkg.com/aos@2.3.1/dist/aos.css&quot; rel=&quot;stylesheet&quot;&gt;     &lt;link rel=&quot;stylesheet&quot; href=&quot;style.css&quot;&gt;     &lt;link rel=&quot;stylesheet&quot; href=&quot;responsive.css&quot;&gt;     &lt;link rel=&quot;icon&quot; type=&quot;image/x-icon&quot; href=&quot;&quot;&gt;     &lt;title&gt;Starter-Pack&lt;/title&gt; &lt;/head&gt;  &lt;body&gt;     &lt;header&gt;         &lt;nav&gt;             &lt;ul&gt;                 &lt;li&gt;&lt;/li&gt;                 &lt;li&gt;&lt;/li&gt;                 &lt;li&gt;&lt;/li&gt;             &lt;/ul&gt;         &lt;/nav&gt;     &lt;/header&gt;     &lt;main&gt;         &lt;section&gt;          &lt;/section&gt;          &lt;section&gt;          &lt;/section&gt;     &lt;/main&gt;     &lt;footer&gt;      &lt;/footer&gt;     &lt;!-- ↓↓↓ Toggle &amp; burger ↓↓↓ --&gt;     &lt;script src=&quot;asset/toggle.js&quot;&gt;&lt;/script&gt;     &lt;script src=&quot;asset/burger.js&quot;&gt;&lt;/script&gt;     &lt;!-- ↓↓↓ Font awesome ↓↓↓ --&gt;     &lt;script src=&quot;https://kit.fontawesome.com/268e7a0888.js&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;     &lt;!-- ↓↓↓ LettreAniméJS ↓↓↓ --&gt;     &lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js&quot;&gt;&lt;/script&gt;     &lt;script src=&quot;node_modules/animejs/lib/anime.min.js&quot;&gt;&lt;/script&gt;     &lt;!-- ↓↓↓ AOS Library ↓↓↓ --&gt;     &lt;script src=&quot;https://unpkg.com/aos@2.3.1/dist/aos.js&quot;&gt;&lt;/script&gt;     &lt;script src=&quot;asset/aosinit.js&quot;&gt;&lt;/script&gt;     &lt;!-- ↓↓↓ Rellax Parallax↓↓↓ --&gt;     &lt;script src=&quot;node_modules/rellax/rellax.min.js&quot;&gt;&lt;/script&gt;     &lt;script src=&quot;asset/apprellax.js&quot;&gt;&lt;/script&gt; &lt;/body&gt;  &lt;/html&gt;', 'body {   margin: 0;   padding: 0;   box-sizing: border-box;   overflow-x: hidden; } /**************alpha******************/ .alpha_container {   position: relative;   height: 100vh;   width: 100%; } #canvas1 {   position: absolute;   top: 50%;   left: 50%;   translate: -50% -50%;   overflow: visible; }  #projectImage {   display: none; } /**************beta******************/ .beta_container {   position: relative;   height: 100vh;   width: 100%;   overflow: hidden; } /**************SVG******************/ .line-drawing {   border: 1px solid red;   position: absolute;   height: 100vh;   width: 100%;   overflow: hidden; } svg {   margin-top: 26vh;   margin-left: 11.5vw;   height: 62.8vh;   width: 99%; } path {   color: #fff; } /**********************SVG FIN******************/', '//Sélectionne l&#039;élément a récuperer// const btn = document.querySelector(&quot;.burgerContainer&quot;); const text = document.querySelector(&quot;.myLinks&quot;);  //Permet d&#039;ajouter l&#039;évènement pour le boutons toggle au click// btn.addEventListener(&quot;click&quot;, () =&gt; {   text.classList.toggle(&quot;show&quot;); });', 37, 'Apex', '13/12/2023', 'LogoApexrecord.png');

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
  `role` int DEFAULT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `skill` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lien_github` text COLLATE utf8mb4_general_ci,
  `lien_web` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `youtube` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `confirmkey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `userName`, `mail`, `userPassword`, `date_naissance`, `ville`, `genre`, `date_inscription`, `statut`, `role`, `avatar`, `skill`, `lien_github`, `lien_web`, `youtube`, `confirmkey`, `confirm`) VALUES
(37, 'Apex', 'j.hiroux456@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MXRoeUE0aGYyZXJVWWpzLg$tRldZHXsfFUsn4SHLckvLt7kUwUCGWAVQqnRwdWYm5A', '1989-01-13', 'Bruxelles', 'Homme', '2023-11-19 00:00:00', NULL, NULL, '37.jpg', 'html5 css3 javascript php mysql bootstrap github', 'https://github.com/apexdevweb', 'https://apexdevweb.github.io/apexdev.github.io/?fbclid=IwAR1rGIpUKX-wc9C6WFVAK04YXYaGOT470nW3yC-pv6Ykcd8yD5dTCbueHA4', 'https://www.youtube.com/channel/UC_923NI-pI8Eu4chL1_tAhg', '9622900', 1),
(38, 'Serious', 'constelium9@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZXF5R1MvVnJVNUx6WlJVSQ$19Cu7lvDw0bBCw29S+Un4Eov9Afrnkvq5XFoXttNMU8', '1987-10-23', 'Luxembourg', 'Homme', '2023-11-19 00:00:00', NULL, NULL, '38.jpg', 'html5 css3 javascript nodejs bootstrap react vueJs github', NULL, '', '', '9307880', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
