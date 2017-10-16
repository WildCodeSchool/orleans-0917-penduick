-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 16 oct. 2017 à 16:22
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `AuPenDuick`
--

-- --------------------------------------------------------

--
-- Structure de la table `display`
--

CREATE TABLE `display` (
  `id` int(11) NOT NULL,
  `textId` int(11) NOT NULL,
  `picturesId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `display`
--

INSERT INTO `display` (`id`, `textId`, `picturesId`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 4),
(5, 5, 2),
(6, 6, 3),
(7, 7, 4),
(8, 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `title`, `description`, `price`) VALUES
(1, 'Crêpe jambon', 'LE bon jambon bien de chez nous', 5.68),
(2, 'Crêpe aux petits pois', 'Original, attention à ne pas renverser', 7.77),
(3, 'Crêpe au sucre', 'A manger sans faim', 6.8),
(4, 'Crêpe au fraises', 'De saison', 9.25);

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `localSrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `localSrc`) VALUES
(1, 'bg-crepe', 'bg-crepe.jpg'),
(2, 'menu-aperitif', 'menu-aperitif.jpg'),
(3, 'menu-crepes-bretonnes', 'menu-crepes-bretonnes.jpg'),
(4, 'menu-galettes-bretonnes', 'menu-galettes-bretonnes.jpg'),
(5, 'menu-desserts', 'menu-desserts.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `texts`
--

CREATE TABLE `texts` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `texts`
--

INSERT INTO `texts` (`id`, `text`) VALUES
(1, 'Dégustez les saveurs<br/>\r\n\r\nd\'une crêpe <span class=\"yellow textShadow\">Bio</span>'),
(2, 'Découvrez nos spécialitées végétariennes<br/>\r\n& bio d\'inspiration bretonnes.'),
(3, 'Un espace chaleureux ou vous pourrez vous détendre<br/>& déguster nos spécialités biologiques<br/>d\'inspiration Bretonnes.'),
(4, 'Découvrez la carte de votre restaurant Au Pen Duick & ses spécialités'),
(5, 'APÉRITIF & ENTRÉE'),
(6, 'GALETTES BRETONNES'),
(7, 'CRÊPES VÉGÉTARIENNES'),
(8, 'DESSERTS');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'philippe-dechaume', 'aupenduick');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Display_Text` (`textId`),
  ADD KEY `Display_Pictures` (`picturesId`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `display`
--
ALTER TABLE `display`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `display`
--
ALTER TABLE `display`
  ADD CONSTRAINT `Display_Pictures` FOREIGN KEY (`picturesId`) REFERENCES `pictures` (`id`),
  ADD CONSTRAINT `Display_Text` FOREIGN KEY (`textId`) REFERENCES `texts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
