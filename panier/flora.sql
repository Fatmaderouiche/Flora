-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 10 avr. 2024 à 00:29
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `flora`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

DROP TABLE IF EXISTS `catégorie`;
CREATE TABLE IF NOT EXISTS `catégorie` (
  `id_cat` int NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`id_cat`, `nom_cat`) VALUES
(1, 'bouquet'),
(2, 'fleurs séchés'),
(3, 'box'),
(4, 'plante');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_cmd` int NOT NULL AUTO_INCREMENT,
  `prix` float NOT NULL,
  `Temps_cmd` timestamp NOT NULL,
  `id_client` int NOT NULL,
  `id_produits` int NOT NULL,
  PRIMARY KEY (`id_cmd`),
  KEY `id_client` (`id_client`),
  KEY `id_produits` (`id_produits`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `id_client` int NOT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `occasions`
--

DROP TABLE IF EXISTS `occasions`;
CREATE TABLE IF NOT EXISTS `occasions` (
  `id_occ` int NOT NULL AUTO_INCREMENT,
  `nom_occ` varchar(255) NOT NULL,
  PRIMARY KEY (`id_occ`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `occasions`
--

INSERT INTO `occasions` (`id_occ`, `nom_occ`) VALUES
(1, 'amour'),
(2, 'anniv'),
(3, 'mariage'),
(4, 'naiss');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int NOT NULL AUTO_INCREMENT,
  `date_ajout` datetime NOT NULL,
  `id_client` int NOT NULL,
  `id_prod` int NOT NULL,
  PRIMARY KEY (`id_panier`),
  KEY `id_client` (`id_client`),
  KEY `id_prod` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_prod` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `id_occ` int NOT NULL,
  `id_cat` int NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `quantité` int NOT NULL DEFAULT '50',
  PRIMARY KEY (`id_prod`),
  KEY `id_occ` (`id_occ`) USING BTREE,
  KEY `id_cat` (`id_cat`) USING BTREE,
  KEY `id_occ_2` (`id_occ`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `nom`, `prix`, `id_occ`, `id_cat`, `image`, `description`, `quantité`) VALUES
(1, 'Éternité Élégante', 105, 1, 1, 'Éternité Élégante.jpg', 'bouquet de fleurs séchées blanches, symbolisant l’éternité et l’élégance', 50),
(2, 'Éclat Printanier', 100, 1, 1, 'Éclat Printanier.jpg', 'Un bouquet de fleurs roses\r\ndélicates évoquant une beauté\r\nprintanière douce et\r\nrafraîchissante', 50),
(3, 'Souvenirs Séchés', 50, 1, 1, 'Souvenirs Séchés.jpg', 'bouquet de fleurs séchées qui évoque la nostalgie et les souvenirs', 50),
(4, 'Écho de l’Époque', 85, 1, 1, 'Écho de l’Époque.jpg', 'Un bouquet de fleurs séchées qui évoque le\r\ncharme du passé', 50),
(5, 'Sagesse du Safran\r\n', 100, 1, 1, 'Sagesse du Safran.jpg', 'Un bouquet de fleurs séchées jaunes,\r\nsymbolisant la sagesse et la tranquillité', 50),
(6, 'Murmure de Lavande', 50, 3, 1, 'Murmure de Lavande.jpg', 'Le mélange délicat des nuances de violet et l’agencement doux évoquent une sensation de\r\ntranquillité et d’élégance.', 50),
(7, 'Éclat Céleste', 73, 1, 1, 'Éclat Céleste.jpg', 'Un mélange de fleurs blanches entourées de pétales bleus profonds et de touches de lavande, évoquant l’image d’un ciel\r\nnocturne étoilé.', 50),
(8, 'Pastel', 70, 1, 1, 'Pastel.jpg', 'Un bouquet, avec ses fleurs douces\r\net moelleuses aux teintes pastel, évoque une sensation de douceur et d’élégance.', 50),
(9, 'Écho de l\'Exotisme', 235, 1, 2, 'p1.jpg', 'L’Anthurium andraeanum,symbole de l’hospitalité, l’abondance, l’amour, la chance', 50),
(10, 'Élégance Éternelle', 73, 1, 2, 'p2.jpg', 'Orchidée papillon,une plante exotique qui\r\nsymbolise l’élégance, la féminité et l’attachement.', 50),
(11, 'Écho de l’Éveil', 150, 1, 2, 'p3.jpg', 'Lotus sacré, une plante aquatique qui symbolise la pureté, la beauté, la\r\nrenaissance spirituelle, et l’illumination.', 50),
(12, 'Tulipe', 119.9, 1, 2, 'p4.jpg', 'Fleurs voyantes et colorées en forme de coupe bulbeuse. Symbole d\'amour et de printemps.', 50),
(13, 'Anthurium', 139, 1, 2, 'p5.jpg', 'Feuilles brillantes et coriaces\r\nSymbole d\'amour et de passion.', 50),
(14, 'Orchidée Phalaenopsis', 95.9, 1, 2, 'p6.jpg', 'Feuilles larges et brillantes\r\nqui ymbole de beauté et d\'élégance.', 50),
(15, 'Echeveria', 145.9, 1, 2, 'p7.jpg', 'Feuilles charnues et succulentes disposées en rosette symbole de patience et de persévérance.', 50),
(16, 'Écho de l\'Asie', 40, 1, 2, 'p8.jpg', 'L’Ajania, une plante symbolisant la beauté, la croissance, et la renaissance.', 50),
(17, 'Ballet Floral', 73, 1, 1, 'Ballet Floral.jpg', 'Un ensemble de roses dansantes,créant un\r\nspectacle floral d\'une beauté exquise.', 50),
(18, 'Eternal Bloom', 120, 3, 4, 'mauve.jpg', 'A vibrant mix of colorful\r\nblooms, Lively Blossoms dance with joy.\r\nPerfect for celebrating life’s little moments.', 50),
(19, 'Romantique Opaline', 110, 3, 3, 'Romantique Opaline.jpg', 'Des pivoines blanches se mélangent dans une\r\npalette de tons ,opalins,créant un bouquet romantique et intemporel', 50),
(20, 'Symphonie de Roses', 85, 3, 4, 'Symphonie de Roses.jpg', 'Une composition harmonieuse de roses,\r\ncomme une symphonie visuelle de l\'amour.', 50),
(21, 'Whispering Petals', 100, 3, 3, 'Whispering Petals.jpg', 'Doux et délicat, Les pétales chuchotants portent les secrets de l’amour et de la grâce. Idéal pour exprimer des sentiments sincères.', 50),
(22, 'Rêve en Rose', 105, 3, 4, 'Rêve en Rose.jpg', 'Un bouquet romantique composé de roses pâles et de touches de blanc, semblable à un rêve éveillé.', 50),
(23, 'Lavender Elegance', 100, 3, 4, 'Lavender Elegance.jpg', 'A dance of grace, in every space, Lavender Elegance lights up the place.', 50),
(24, 'Golden Sunrise', 30, 3, 4, 'Golden Sunrise.jpg', 'A “Happy Birthday” card adorned with lifelike white flowers and elegant gold lettering. It’s warmth and personal touch\r\nin one delightful package!', 50),
(25, 'Souffle de l’Amour', 125, 1, 4, '', 'Une box de fleurs rouges qui capture l’essence de l’amour.', 50),
(26, 'Charme Floral Blanc', 80, 2, 4, 'bmariage.jpg', 'Un mélange délicat de camélias,apportant une touche de charme', 50),
(27, 'Bouquet de Joie', 90, 2, 4, 'mar4 (3).jpg', 'ce bouquet évoque la joie et la chaleur\r\nde l’occasion.', 50),
(28, 'Éclat de Pureté', 85, 2, 4, 'marr.jpg', 'Une boquet de fleurs qui symbolise la\r\nsérénité de la lune.', 50),
(29, 'bouquet de tendresse', 75, 2, 4, 'mar.jpg', 'Une boquet de fleurs roses pour une touche\r\nde joie et de bonheur', 50),
(30, 'Éclat de Rouge', 109.9, 2, 4, 'marrr.jpg', 'ce bouquet évoque la passion et la chaleur.', 50),
(31, 'bouquet de Douceur', 69.9, 2, 4, 'mar6.jpg', 'ce bouquet respire la pureté et l’élégance', 50),
(32, 'élégance Florale', 89.9, 2, 4, 'mar5.jpg', 'roses rose fraîches, soigneusement disposées', 50),
(33, 'Bouquet d’Affection', 109.9, 2, 4, 'original bouquet.jpg', 'un bouquet où chaque pétale chante une mélodie d’amour', 50),
(34, 'Éclat de Bleu', 100, 4, 4, 'bnaiss3.jpg', 'Un bouquet comme un trésor naturel à offrir', 50),
(35, 'Bouquet de Joie', 90, 4, 4, 'baniv.jpg', 'ce bouquet évoque la joie et la chaleur\r\nde l’occasion.', 50),
(36, 'bouquet de tendresse', 75, 3, 4, '', 'Une boquet de fleurs roses pour une touche de joie et de bonheur', 50),
(37, 'Éclat de Rouge', 130.9, 1, 4, 'blove.jpg', 'ce bouquet évoque la passion et la chaleur.', 50),
(38, 'élégance Florale', 89.9, 2, 4, 'Floral Fiesta.jpg', 'roses blanches fraîches, soigneusement disposées', 50),
(39, 'Bouquet de Love', 109.9, 1, 4, 'love.jpg', 'un bouquet où chaque pétale chante une mélodie d’amour', 50),
(40, 'Charme Floral', 80, 3, 4, 'bcad.jpg', 'Un mélange délicat de camélias,apportant une touche de charme', 50),
(41, 'Box d’Affection', 109.9, 1, 3, 'box (2).jpg', 'un box où chaque pétale chante une mélodie d’amour', 50),
(42, 'élégance Florale', 89.9, 2, 3, 'box (1).jpg', 'roses fraîches,\r\nsoigneusement disposées', 50),
(43, 'Box de Douceur', 69.9, 3, 3, 'box (4).jpg', 'un box respire la pureté et l’élégance', 50),
(44, 'Passion Écarlate', 80, 1, 4, 'a3.jpg', 'Des roses entourées de feuillage luxuriant,\r\nreprésentant un amour profond et sincère.', 50),
(45, 'Souvenirs Floral', NULL, 1, 4, 'a4.jpg', 'Un bouquet qui symbolise la\r\npureté, la beauté, la\r\nrenaissance spirituelle, et\r\nl’illumination.', 50),
(46, 'Pissenlit', 99, 1, 4, 'a5.jpg', 'Feuilles vertes et dentées,\r\ndisposées en rosette basale.\r\nSymbole de courage\r\net de persévérance.', 50),
(47, 'Fougère arborescente', 129, 1, 4, 'a6.jpg', 'Grandes frondes vert foncé,\r\npennées et coriaces. Symbole de la force et de l\'amour.', 50),
(48, 'Bambou', 145, 1, 3, 'a7.jpg', 'Feuilles lancéolées et persistantes.\r\nSymbole de chance, de prospérité et de longévité.', 50),
(49, 'Orchidée Dendrobium', 160, 1, 4, 'a8.jpg', 'Fleurs grandes et voyantes,\r\nSymbole de beauté, d\'élégance et de raffinement.', 50),
(50, 'Douce Émergence', 40, 4, 4, 'Douce Émergence.jpg', 'Un mélange délicat de roses  symbolisant la douceur et l\'émergence d\'une nouvelle vie', 50),
(51, 'Douce Brise Dorée', 73, 4, 4, 'Douce.jpg', 'Des roses jaunes pâles et des tulipes dans un arrangement aéré, évoquant la douceur d\'une brise printanière.', 50),
(52, 'Fraîcheur Printanière', 150, 4, 4, 'Fraîcheur Printanière.jpg', 'Un mélange de fleurs vertes vives, symbolisant la nouveauté et la vitalité du printemps', 50),
(53, 'Ciel Enchanté', 235, 4, 4, 'Ciel Enchanté.jpg', 'Un bouquet aérien avec des fleurs bleues délicates, évoquant la magie et la romance d\'un ciel étoilé', 50),
(54, 'Élégance Rosée', 149.9, 4, 4, 'Élégance Rosée.jpg', 'roses délicates de couleur rose pâle, entourées de petites fleurs blanches et de feuillage vert sombre,parfait pour célébrer des moments spéciau', 50),
(55, 'Fraîcheur Florale\r\n\r\n', 89.9, 4, 4, 'Fraîcheur Florale.jpg\r\n\r\n', 'un assortiment luxueux de fleurs fraîches', 50),
(56, 'Eclat d\'élégence', 99.9, 4, 4, 'Eclat d\'élégence.jpg', 'roses fraîches, soigneusement disposées', 50),
(57, 'Romance Rosée', 109.9, 4, 4, 'Romance Rosée.jpg', 'une box floral , mélange luxuriant\r\nde fleurs fraîches et colorées', 50),
(58, 'Souffle de l\'amour', 125, 1, 3, 'Souffle de l\'amour.jpg', 'Une box de fleurs rouges qui capture l’essence de l’amour', 50),
(59, 'Arc-en-ciel d\'amour', 80, 3, 3, 'Arc-en-ciel d\'amour.jpg', 'Une box de fleurs colorées\r\nqui symbolise l’amour\r\nuniversel et l’acceptation de la\r\ndiversité.', 50),
(60, 'Lumiére de Lune\r\n\r\n', 96, 2, 3, 'Lumiére de Lune.jpg', 'Une box de fleurs blanches qui symbolise la clarté, la pureté et la sérénité de la lune.', 50),
(61, 'Symphonie de sourire\r\n\r\n', 65, 3, 3, 'Symphonie de sourire.jpg\r\n\r\n', 'Une box de fleurs roses pour une touche de joie, de bonheur et de positivité.', 50),
(62, 'Écrin de Roses Écarlates', 149.9, 1, 3, 'Écrin de Roses Écarlates.jpg', 'roses rouges éclatantes orné d’un ruban rouge vif qui l’enlace avec élégance.', 50),
(63, 'Cœur de Pétales', 69.9, 4, 3, 'Cœur de Pétales.jpg', 'un assortiment luxueux de fleurs fraîches', 50),
(64, 'Harmonie Florale', 89.9, 4, 3, 'Harmonie Florale.jpg\r\n\r\n', 'roses blanches fraîches, soigneusement disposées', 50),
(65, 'Éclat de Printemps', 109.9, 4, 3, 'Éclat de Printemps.jpg', 'une box floral ,mélange luxuriant de fleurs fraîches et colorées', 50),
(66, 'warda', 4, 1, 1, 'warsa.jpg', 'safsoufa ahla warda', 50),
(67, 'wardaaaaaaaaaaaaaaa', 4, 1, 1, 'warsa.jpg', 'safsoufa ahla warda', 50),
(68, 'wardaaaaaaaaaaaaaaa', 4, 1, 1, 'warsa.jpg', 'safsoufa ahla warda', 50),
(69, 'wardaaaaaaaaaaaaaaa', 4, 1, 1, 'warsa.jpg', 'safsoufa ahla warda', 50);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot de passe` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `mot de passe`, `date`, `type`) VALUES
(1, 'admin', 'admin@gmail.com', 'adminadmin', '2024-04-08 10:26:35', 'administrateur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_produits`) REFERENCES `produit` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_occ`) REFERENCES `occasions` (`id_occ`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `catégorie` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
