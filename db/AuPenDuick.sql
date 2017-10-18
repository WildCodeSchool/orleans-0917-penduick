-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 18 oct. 2017 à 16:29
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
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `text`) VALUES
(1, 'Carte de galettes de sarrasin bio (sans gluten)'),
(2, 'Crêpes de froment Bio'),
(3, 'Les Crêpes Flambées');

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `description`
--

INSERT INTO `description` (`id`, `text`) VALUES
(1, 'J.Beyou - Sarrasin, Beurre salé'),
(2, 'A.Bombard - Sarrasin, Beurre salé, Emmental, ou Œuf, ou Jambon blanc'),
(3, 'Ph.Poupon – Œufs miroir, Emmental, Champignons frais, Jambon blanc'),
(4, 'E.Tabarly - Œufs miroir, Emmental, Jambon blanc'),
(5, 'O.De.Kersauson- beurre salé, Fondue de pomme, Camembert au lait cru V'),
(6, 'Surcouf – Œufs miroir, Conté, Fondue d’oignons, Lardon fumés'),
(7, 'I.Autissier - Œufs miroir, Conté, Fondue d’oignons, Courgette V'),
(8, 'F.Artaud - Œufs miroir, Conté, Champignons frais, Fondue de poireaux V'),
(9, 'M.Desjoyeaux - Œufs miroir, Conté, Champignons frais, Epinard frais V'),
(10, 'C.Colomb - Œufs miroir, Conté, Fondue, d’oignons, pomme de terre, Chèvre en crottin, Salade. V'),
(11, 'J.Cook – Epinards frais, chèvre en crottin, Miel V'),
(12, 'J.Y.Cousteau – Fondue de courgettes, Saumon fumé, Crème fraiche, citron,\r\nCiboulette'),
(13, 'L.Peyron – Conté, Bleu d’auvergne, Chèvre en crottin, crème fraiche,\r\nSalade. V'),
(14, 'E.Riguidel – Pomme de terre, Reblochon, Lardons fumés, Fondue d’oignons, Crème\r\nfraiche, Salade'),
(15, 'Bougainville – Conté, Emincé de poulet, Champignons frais, fondue d’oignons, crème\r\nmoutarde à l’ancienne'),
(16, 'T.Lamazou – Fondue de choux vert, Saucisse de Morteau, crème moutarde à\r\nl’ancienne'),
(17, 'A.Colas – Andouillette de Guémené, fondue d’oignons,\r\nCrème moutarde à l’ancienne'),
(18, 'F.Joyon – Boudin noir, Pomme caramélisée, Fondue d’oignons'),
(19, 'J.Cartier – Noix de st Jacques, fondue de poireaux, Sauce Noilly Prat'),
(20, 'Ph.Jantot – Œuf miroir, Jambon de pays, Fromage à raclette'),
(21, 'Supplément Salade'),
(22, 'Supplément œuf'),
(23, '<b>Les Classiques</b>'),
(24, '<b>Les Gourmandes</b>'),
(25, 'Iles d’Ouessant – Beurre salé, sucre'),
(26, 'Mont st Michel – Chocolat maison'),
(27, 'Ile aux moines – Caramel beurre salé maison'),
(28, 'Corse – Pâte à tartinée (sans huile de palme)'),
(29, 'Réunion – Banane rôtie, Chocolat maison'),
(30, 'Ile d’Yeu – Pomme caramélisée, Caramel beurre salé'),
(31, 'Saint Hélène – Poire au sirop, chocolat chaud, Chantilly maison'),
(32, 'Martinique – Chocolat chaud, Coco râpée, Chantilly maison'),
(33, 'Barbade – Miel, zest de citron Bio'),
(34, 'Canaries – Chocolat chaud, glace vanille ou noisette, Chantilly, Amandes'),
(35, 'Porto Rico – Caramel beurre salé, Glace vanille, Chantilly'),
(36, 'Gambier – Pomme caramélisée, caramel beurre salé, glace vanille'),
(37, 'Guadeloupe – Banane rôtie, Flambée Rhum'),
(38, 'Bora Bora – Beurre salé, zest d’orange Bio, Flambée Grand Marnier'),
(39, 'Tatihou – Pomme caramélisée, Caramel beurre salé, Flambée Calvados'),
(40, 'Rangiroa – Chocolat Maison, Zest d’orange bio, Flambée Cointreau'),
(41, 'Supplément Chantilly maison'),
(42, 'Supplément boule de glace');

-- --------------------------------------------------------

--
-- Structure de la table `display`
--

CREATE TABLE `display` (
  `id` int(11) NOT NULL,
  `textId` int(11) NOT NULL,
  `picturesId` int(11) DEFAULT NULL
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
(7, 7, NULL),
(8, 8, NULL),
(9, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `displaymenu`
--

CREATE TABLE `displaymenu` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `descriptionId` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `displaymenu`
--

INSERT INTO `displaymenu` (`id`, `categoryId`, `descriptionId`, `price`) VALUES
(1, 1, 23, NULL),
(2, NULL, 1, 4),
(3, NULL, 2, 4.7),
(4, NULL, 3, 7.9),
(5, NULL, 4, 7.5),
(6, NULL, 24, NULL),
(7, NULL, 5, 7.5),
(8, NULL, 6, 7.5),
(9, NULL, 7, 7.9),
(10, NULL, 8, 7.9),
(11, NULL, 9, 7.9),
(12, NULL, 10, 7.9),
(13, NULL, 11, 7.9),
(14, NULL, 12, 11.5),
(15, NULL, 13, 7.9),
(16, NULL, 14, 10.5),
(17, NULL, 15, 9.9),
(18, NULL, 16, 9.8),
(19, NULL, 17, 9.9),
(20, NULL, 18, 8.9),
(21, NULL, 19, 11.9),
(22, NULL, 20, 9.9),
(23, NULL, 21, 1.9),
(24, NULL, 22, 1.1),
(25, 2, 25, 3),
(26, NULL, 26, 4.9),
(27, NULL, 27, 4.9),
(28, NULL, 28, 4.9),
(29, NULL, 29, 5.9),
(30, NULL, 30, 5.9),
(31, NULL, 31, 6.5),
(32, NULL, 32, 6.2),
(33, NULL, 33, 4.2),
(34, NULL, 34, 6.9),
(35, NULL, 35, 6.9),
(36, NULL, 36, 6.5),
(37, 3, 37, 7.9),
(38, NULL, 38, 7),
(39, NULL, 39, 7.9),
(40, NULL, 40, 7),
(41, NULL, 41, 2),
(42, NULL, 42, 1.5);

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
(5, 'menu-desserts', 'menu-desserts.jpg'),
(6, 'menu-aperitif', 'menu-aperitif.jpg'),
(7, 'menu-crepes-bretonnes', 'menu-crepes-bretonnes.jpg'),
(8, 'menu-galettes-bretonnes', 'menu-galettes-bretonnes.jpg'),
(9, 'menu-desserts', 'menu-desserts.jpg'),
(10, 'menu-galettes-bretonnes', 'menu-galettes-bretonnes.jpg'),
(11, 'menu-desserts', 'menu-desserts.jpg');

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
(1, 'Dégustez les saveurs<br/>\r\nd\'une crêpe <span class=\"yellow textShadow\">Bio</span>'),
(2, 'Découvrez nos spécialitées végétariennes<br/>\r\n& bio d\'inspiration bretonnes.'),
(3, 'Un espace chaleureux ou vous pourrez vous détendre<br/>& déguster nos spécialités biologiques<br/>d\'inspiration Bretonnes.'),
(4, 'Découvrez la carte de votre restaurant Au Pen Duick & ses spécialités'),
(5, 'LA CARTE'),
(6, 'LES CLASSIQUES'),
(7, 'LES GOURMANDES'),
(8, 'DESSERTS'),
(9, 'Carte de galettes de sarrasin bio (sans gluten)'),
(10, 'Crêpes de froment Bio'),
(11, 'Les Crêpes Flambées');

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
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Display_Text` (`textId`),
  ADD KEY `Display_Pictures` (`picturesId`);

--
-- Index pour la table `displaymenu`
--
ALTER TABLE `displaymenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Display_Description` (`descriptionId`),
  ADD KEY `Display_Category_Menu` (`categoryId`);

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
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `display`
--
ALTER TABLE `display`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `displaymenu`
--
ALTER TABLE `displaymenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

--
-- Contraintes pour la table `displaymenu`
--
ALTER TABLE `displaymenu`
  ADD CONSTRAINT `Display_Category_Menu` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `Display_Description` FOREIGN KEY (`descriptionId`) REFERENCES `description` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
