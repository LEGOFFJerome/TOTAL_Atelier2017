-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Février 2017 à 18:10
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `anim-total`
--

-- --------------------------------------------------------

--
-- Structure de la table `etapes_states_total`
--

CREATE TABLE `etapes_states_total` (
  `id` int(12) NOT NULL,
  `state` int(12) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etapes_states_total`
--

INSERT INTO `etapes_states_total` (`id`, `state`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponses_total`
--

CREATE TABLE `reponses_total` (
  `id` int(10) UNSIGNED NOT NULL,
  `groupe` int(11) NOT NULL,
  `etape` int(11) NOT NULL,
  `valeur` longtext NOT NULL,
  `last_edit` int(12) DEFAULT '0',
  `is_sel` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reponses_total`
--

INSERT INTO `reponses_total` (`id`, `groupe`, `etape`, `valeur`, `last_edit`, `is_sel`) VALUES
(1, 1, 1, 'phrase 1', 1488202767, 0),
(2, 1, 1, 'phrase 2 qui est joli tout plein', 1488210070, 0),
(3, 1, 1, 'la quintessence de la phrase qui déboîte ', 1488210072, 1),
(4, 1, 1, 'si tu veux de la phrase qui poutre alors la ... on est au taquet ', 1488210073, 1),
(5, 1, 1, 'dans le cadre de cette démonstration il est nécessaire d\'avoir une phrase conséquente, il s\'agit donc d\'écrire un truc pour ne rien dire mais qui est assez long pour tester si cela passe dans l\'écran  ', 1488210075, 1),
(6, 1, 1, 'la table qui n\'a rien a dire ... ou peu à dire !', 1488210107, 1),
(7, 1, 1, 'arrête de jouer avec l\'IPAD !', 1488210108, 0),
(8, 2, 1, 'oops on test en temps r&eacute;el ....', 1488215314, 1),
(9, 2, 1, 'encore car ca fait plaisir !!!', 1488215337, 0),
(10, 3, 1, 'pour continuer a jouer une phrase avec des <br />\r\nretours <br />\r\n&agrave; <br />\r\nla <br />\r\nligne', 1488216099, 0),
(11, 3, 1, 'oops lalala ', 1488216240, 0),
(12, 8, 1, 'attention c&#039;est la phrase de la table 8 ... enfin ils &eacute;taient &agrave; la bourre !', 1488216524, 0),
(13, 8, 1, 'elle s&#039;&eacute;nerve bien la table 8', 1488216924, 1),
(14, 11, 1, 'table 11 me voila ', 1488216960, 1),
(15, 11, 1, 'oops la table 11 arrive ', 1488216977, 0),
(16, 11, 1, 'et elle n&#039;est pas contente ', 1488216989, 0),
(17, 11, 1, 'on va tenter une nouvelle approche avec plein de texte et pleins de phrases pour tester l&#039;application !', 1488217055, 0),
(18, 11, 1, 'On recommence avec encore plus d&#039;enthousiasme pour tester les param&egrave;tres !!!!', 1488217088, 0),
(19, 11, 1, 'On recommence avec encore plus d&#039;enthousiasme pour tester les param&egrave;tres !!!!', 1488217093, 0),
(20, 11, 1, 'On recommence avec encore plus d&#039;enthousiasme pour tester les param&egrave;tres !!!!', 1488217095, 0),
(21, 3, 1, 'On recommence avec encore plus d&#039;enthousiasme pour tester les param&egrave;tres !!!!', 1488217117, 0),
(22, 3, 1, 'On recommence avec encore plus d&#039;enthousiasme pour tester les param&egrave;tres et on met encore plus de texcte !!!&ugrave;!', 1488217128, 1),
(23, 3, 1, 'On recommence avec encore plus d&#039;enthousiasme pour tester les param&egrave;tres !!!!', 1488217133, 0),
(24, 3, 1, 'On recommence avec encore plus d&#039;enthousiasme pour tester les param&egrave;tres !!!!', 1488217134, 1),
(25, 3, 1, 'Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! Et on va aller jusqu&#039;&agrave; la fin du texte !!!! Et on continue !!!! ', 1488217162, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `etapes_states_total`
--
ALTER TABLE `etapes_states_total`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponses_total`
--
ALTER TABLE `reponses_total`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `reponses_total`
--
ALTER TABLE `reponses_total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
