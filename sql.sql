SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `etapes_states_total` (
  `id` int(12) NOT NULL,
  `state` int(12) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `etapes_states_total` (`id`, `state`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0);

CREATE TABLE `reponses_total` (
  `id` int(10) UNSIGNED NOT NULL,
  `groupe` int(11) NOT NULL,
  `etape` int(11) NOT NULL,
  `valeur` longtext NOT NULL,
  `last_edit` int(12) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Index pour la table `etapes_states`
ALTER TABLE `etapes_states_total`
  ADD PRIMARY KEY (`id`);

-- Index pour la table `reponses`
ALTER TABLE `reponses_total`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

-- AUTO_INCREMENT pour la table `reponses`
ALTER TABLE `reponses_total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
