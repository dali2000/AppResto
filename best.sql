-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 09 jan. 2021 à 16:15
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `best`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `mdp` varchar(125) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `email`, `mdp`, `nom`) VALUES
(1, 'admin@gmail.com', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `idUser` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idProduit`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`idUser`, `idProduit`) VALUES
(3, 1),
(3, 36),
(3, 38),
(3, 56);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `mdp`, `phone`) VALUES
(3, 'kbaier', 'Mohamed Ali', 'medalikebair@gmail.com', '12345', '55454881'),
(4, 'chouikh', 'Assia', 'assiachouik@gmail.com', '123', '55454881'),
(5, 'Stambouli', 'Ahmed', 'ahmed.stanbouli9@gmail.com', '1234', '23555777'),
(9, 'Tlich', 'jamila', 'tlichjamila@gmail.com', '123', '24169135');

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `nom` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `cat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`id`, `img`, `nom`, `price`, `cat`) VALUES
(1, '1', '1', 0, 'diet'),
(36, '640x335_bucket_20t-6s-270x180.png', 'BUCKET TENDERS', 32, 'diet'),
(37, '640x335_hotwings_8-270x180.png', 'HOT WINGS', 20, 'diet'),
(38, '640x335_tenders_5.png', 'Tenders ', 15.5, 'diet'),
(40, '640x335_cat_burgers-wraps-salades.png', 'BURGERS WRAPS & SALADES', 40, 'diet'),
(41, '640x335_boxmaster_maxx-1-270x180.png', 'BOXMASTER MAXX ORIGINAL', 26, 'diet'),
(42, '640x335_salade_caesar_tenders-270x180.png', 'SALADE CAESAR PARMIGIANO®', 19, 'diet'),
(43, '640x335_tower-1-270x180.png', 'TOWER® ZINGER', 26, 'diet'),
(44, '640x335_kentuckyfries-270x180.png', 'THE KENTUCKY® FRIES', 28, 'diet'),
(45, '640x335_frites_moyennes-270x180.png', 'FRITES', 10, 'diet'),
(46, '640x335_onionringsx10-270x180.png', 'THE ORIGINAL ONION RINGS', 15.5, 'diet'),
(47, '640x335_krunchy-270x180.png', 'KRUNCHY®', 25, 'diet'),
(48, '640x335_f9_ecm_produit_theoriginalwrapper-270x180.png', 'THE ORIGINAL WRAPPER', 39, 'diet'),
(49, '640x335_croustifromage-270x180.png', 'CROUSTI’RACLETTE', 19, 'diet'),
(50, '640x335_f9_ecm_produit_towerraclette-270x180.png', 'TOWER® RACLETTE', 29, 'diet'),
(54, '640x335_kremball_croustifraise-270x180.png', 'KREAM BALL® : CROUSTI’FRAISE', 20, 'desert'),
(55, '640x335_ultimate_speculoos-270x180.png', 'ULTIMATE : SPÉCULOOS', 21, 'desert'),
(56, '640x335_cookie-270x180.png', 'COOKIE PÉPITES DE CHOCOLAT', 19, 'desert'),
(59, '640x335_muffin_nutella-270x180.png', 'MUFFIN AU NUTELLA®', 8, 'desert'),
(60, '640x335_pommes-270x180.png', 'P’TITE POMME À CROQUER', 3, 'desert'),
(61, '640x335_moelleux_chocolat-270x180.png', 'MOELLEUX CHOCOLAT', 12, 'desert'),
(62, '640x335_5sundaes-270x180.png', 'SUNDAES', 12, 'desert'),
(63, '640x335_kremball_nutella-270x180.png', 'KREAM BALL® : NUTELLA®', 14, 'desert'),
(64, '640x335_ultimate_cookie_peanutbutter-270x180.png', 'ULTIMATE : COOKIE & PEANUT BUTTER', 19, 'desert'),
(65, '640x335_ultimatechocobrownie-270x180.png', 'ULTIMATE : CHOCO BROWNIE', 18, 'desert');

-- --------------------------------------------------------

--
-- Structure de la table `messag`
--

DROP TABLE IF EXISTS `messag`;
CREATE TABLE IF NOT EXISTS `messag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mess` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messag`
--

INSERT INTO `messag` (`id`, `email`, `nom`, `phone`, `mess`) VALUES
(0, '0', '0', '0', '0'),
(5, 'medalikebair@gmail.com', 'kbaier', '55454881', 'Hello ');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nomProduit` varchar(255) NOT NULL,
  `imgProduit` varchar(255) NOT NULL,
  `idProduit` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
