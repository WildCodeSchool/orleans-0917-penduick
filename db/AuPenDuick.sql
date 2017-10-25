-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 25 oct. 2017 à 12:26
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
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
  `name` varchar(255) NOT NULL,
  `nameShortcut` varchar(25) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `nameShortcut`, `picture`, `type_id`) VALUES
(1, 'Carte de galettes de sarrasin bio (sans gluten)', 'GALETTES BIO SARRASIN', 'menu-aperitif.jpg', 1),
(2, 'Crêpes de froment Bio', 'CRÊPES BIO FROMENT', 'menu-crepes-bretonnes.jpg', 2),
(3, 'Crêpes flambées', 'CRÊPES FLAMBÉES', 'menu-desserts.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `companyPictures`
--

CREATE TABLE `companyPictures` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `extension` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `companyPictures`
--

INSERT INTO `companyPictures` (`id`, `name`, `extension`) VALUES
(1, 'crepe1', '.jpeg'),
(2, 'crepe2', '.jpg'),
(3, 'crepe3', '.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `companyTexts`
--

CREATE TABLE `companyTexts` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `header_2` text NOT NULL,
  `event` text NOT NULL,
  `about_us` text NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `companyTexts`
--

INSERT INTO `companyTexts` (`id`, `header`, `header_2`, `event`, `about_us`, `telephone`) VALUES
(1, 'Dégustez les saveurs<br/>\r\nd\'une crêpe <span class=\"yellow textShadow\">Bio</span>', 'Découvrez nos spécialitées végétariennes<br/> <span class=\"yellow textShadow\">&</span> bio d\'inspiration bretonnes.', 'Texte d\'évènement', 'Un espace chaleureux ou vous pourrez vous détendre<br/><span class=\"yellow textShadow\">&</span> déguster nos spécialités biologiques<br/>d\'inspiration Bretonnes.', '02 38 66 66 66');

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `category_id`) VALUES
(1, 'J.Beyou ', 'Sarrasin, Beurre salé', 4, 1),
(2, 'A.Bombard', 'Sarrasin, Beurre salé, Emmental, ou Œuf, ou Jambon blanc', 4.7, 1),
(3, 'Ph.Poupon', 'Œufs miroir, Emmental, Champignons frais, Jambon blanc', 7.9, 1),
(4, 'E.Tabarly', 'Œufs miroir, Emmental, Jambon blanc', 7.5, 1),
(5, 'O.De.Kersauson', 'Beurre salé, Fondue de pomme, Camembert au lait cru V', 7.5, 1),
(6, 'Surcouf', 'Œufs miroir, Conté, Fondue d’oignons, Lardon fumés', 7.5, 1),
(7, 'I.Autissier', 'Œufs miroir, Conté, Fondue d’oignons, Courgette V', 7.9, 1),
(8, 'F.Artaud ', 'Œufs miroir, Conté, Champignons frais, Fondue de poireaux V', 7.9, 1),
(9, 'M.Desjoyeaux ', 'Œufs miroir, Conté, Champignons frais, Epinard frais V', 7.9, 1),
(10, 'C.Colomb', 'Œufs miroir, Conté, Fondue, d’oignons, pomme de terre, Chèvre en crottin, Salade. V', 7.9, 1),
(11, 'J.Cook', 'Épinards frais, chèvre en crottin, Miel V', 7.9, 1),
(12, 'J.Y.Cousteau', 'Fondue de courgettes, Saumon fumé, Crème fraiche, citron, Ciboulette', 11.5, 1),
(13, 'L.Peyron', 'Conté, Bleu d’auvergne, Chèvre en crottin, crème fraiche,\r\nSalade. V', 7.9, 1),
(14, 'E.Riguidel', 'Pomme de terre, Reblochon, Lardons fumés, Fondue d’oignons, Crème\r\nfraiche, Salade', 10.5, 1),
(15, 'Bougainville', 'Conté, Emincé de poulet, Champignons frais, fondue d’oignons, crème\r\nmoutarde à l’ancienne', 9.9, 1),
(16, 'T.Lamazou', 'Fondue de choux vert, Saucisse de Morteau, crème moutarde à\r\nl’ancienne', 9.8, 1),
(17, 'A.Colas', 'Andouillette de Guémené, fondue d’oignons,\r\nCrème moutarde à l’ancienne', 9.9, 1),
(18, 'F.Joyon', 'Boudin noir, Pomme caramélisée, Fondue d’oignons', 8.9, 1),
(19, 'J.Cartier', 'Noix de st Jacques, fondue de poireaux, Sauce Noilly Prat', 11.9, 1),
(20, 'Ph.Jantot', 'Œuf miroir, Jambon de pays, Fromage à raclette', 9.9, 1),
(21, '', 'Supplément Salade', 1.9, 1),
(22, '', 'Supplément œuf', 1.1, 1),
(25, 'Iles d’Ouessant', 'Beurre salé, sucre', 3, 2),
(26, 'Mont st Michel', 'Chocolat maison', 4.9, 2),
(27, 'Ile aux moines', 'Caramel beurre salé maison', 4.9, 2),
(28, 'Corse', 'Pâte à tartinée (sans huile de palme)', 4.9, 2),
(29, 'Réunion', 'Banane rôtie, Chocolat maison', 5.9, 2),
(30, 'Ile d’Yeu', 'Pomme caramélisée, Caramel beurre salé', 5.9, 2),
(31, 'Saint Hélène', 'Poire au sirop, chocolat chaud, Chantilly maison', 6.5, 2),
(32, 'Martinique', 'Chocolat chaud, Coco râpée, Chantilly maison', 6.2, 2),
(33, 'Barbade', 'Miel, zest de citron Bio', 4.2, 2),
(34, 'Canaries', 'Chocolat chaud, glace vanille ou noisette, Chantilly, Amandes', 6.9, 2),
(35, 'Porto Rico', 'Caramel beurre salé, Glace vanille, Chantilly', 6.9, 2),
(36, 'Gambier', 'Pomme caramélisée, caramel beurre salé, glace vanille', 6.5, 2),
(37, 'Guadeloupe', 'Banane rôtie, Flambée Rhum', 7.9, 3),
(38, 'Bora Bora', 'Beurre salé, zest d’orange Bio, Flambée Grand Marnier', 7, 3),
(39, 'Tatihou', 'Pomme caramélisée, Caramel beurre salé, Flambée Calvados', 7.9, 3),
(40, 'Rangiroa', 'Chocolat Maison, Zest d’orange bio, Flambée Cointreau', 7, 3),
(41, '', 'Supplément Chantilly maison', 2, 3),
(42, '', 'Supplément boule de glace', 1.5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `consistency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `consistency`) VALUES
(1, 'Salée'),
(2, 'Sucrée');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Type_consistance` (`type_id`);

--
-- Index pour la table `companyPictures`
--
ALTER TABLE `companyPictures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `companyTexts`
--
ALTER TABLE `companyTexts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Category` (`category_id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
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
-- AUTO_INCREMENT pour la table `companyPictures`
--
ALTER TABLE `companyPictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `companyTexts`
--
ALTER TABLE `companyTexts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `Type_consistance` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `Category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
