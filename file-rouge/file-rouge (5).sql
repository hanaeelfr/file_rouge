-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juin 2023 à 17:02
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `file-rouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `ID_Client` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prénom` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`ID_Client`, `Nom`, `Prénom`, `Email`, `Telephone`, `password`) VALUES
(1, 'fraihi', 'hanae', 'hanae.fraihi@gmail.com', '0610320964', ''),
(2, 'fraihi', 'hanae', 'hanae.fraihi@gmail.com', '0610320964', ''),
(3, 'fraihi', 'hanae', 'hanae.fraihi@gmail.com', '0610320964', ''),
(4, 'mouttki', 'dikra', 'dikra.mouttaki@gmail.com', '0615577355', ''),
(5, 'assaid', 'amina', 'amina@gmail.com', '0644234040', ''),
(6, 'assaid', 'amina', 'amina@gmail.com', '0644234040', ''),
(7, 'assaid', 'amina', 'amina@gmail.com', '0644234040', ''),
(8, 'assaid', 'amina', 'amina@gmail.com', '0644234040', ''),
(9, 'assaid', 'amina', 'amina@gmail.com', '0644234040', ''),
(10, 'assaid', 'amina', 'amina@gmail.com', '0644234040', ''),
(19, 'hanae', 'test', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(20, 'hanae', 'test', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(21, 'hanae', 'test', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(22, 'zaineb', 'zaineb', 'zaineb@gmail.com', '0644234040', ''),
(24, 'fraihi', 'hajar', 'hajar@gmail.com', '0644234042', '6334d74e22'),
(25, 'mer', 'zineb', 'zineb@gmail.com', '06456372503b7e1d8adb', 'Zineb@2002'),
(26, 'hanae', 'test', 'hanae.fraihi@gmail.com', '0644234040', '9b6d6321e8dea734dd9dd26611038b1d'),
(27, 'hanae', 'test', 'elfraihi.hanae.solicode@gmail.com', '0644234040', '9b6d6321e8dea734dd9dd26611038b1d'),
(28, 'hanae', 'hanae', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(29, 'hanae', 'hanae', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(30, 'hanae', 'hanae', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(31, 'hanae', 'hanae', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(32, 'hanae', 'hanae', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(33, 'hanae', 'hanae', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(34, 'hanae', 'hanae', 'elfraihi.hanae.solicode@gmail.com', '0644234040', ''),
(35, 'hanae', 'hanae', 'elfraihi.hanae.solicode@gmail.com', '0645637250', '');

-- --------------------------------------------------------

--
-- Structure de la table `professionnels`
--

CREATE TABLE `professionnels` (
  `ID_Professionnel` int(11) NOT NULL,
  `Nom_proffess` varchar(50) DEFAULT NULL,
  `Prénom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `professionnels`
--

INSERT INTO `professionnels` (`ID_Professionnel`, `Nom_proffess`, `Prénom`) VALUES
(1, 'Hayani', 'Hajar'),
(2, 'Bakali', 'Youssra'),
(3, 'Merrah', 'Zineb'),
(4, 'Tabit', 'Somia'),
(5, 'Fraihi', 'lamiae'),
(6, 'Wazani', 'Fatima'),
(7, 'Hassoun', 'Houda'),
(8, 'Mkadem', 'Khadija'),
(9, 'Jbari', 'Alae'),
(10, 'Boughaba', 'Ikram'),
(11, 'Sbaii', 'Hanan'),
(12, 'Amrani', 'Noussaiba'),
(13, 'Bahajin', 'Touaiba'),
(14, 'Zawjal', 'Jihan'),
(15, 'Rifi', 'Iman');

-- --------------------------------------------------------

--
-- Structure de la table `professionnels_service`
--

CREATE TABLE `professionnels_service` (
  `ID_Professionnel` int(11) NOT NULL,
  `ID_Service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `professionnels_service`
--

INSERT INTO `professionnels_service` (`ID_Professionnel`, `ID_Service`) VALUES
(1, 2),
(2, 1),
(3, 3),
(4, 5),
(5, 4),
(6, 2),
(7, 6),
(8, 8),
(9, 7),
(10, 9),
(11, 10),
(12, 11),
(13, 12),
(14, 14),
(15, 13),
(2, 15),
(11, 18),
(6, 16),
(3, 17);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `ID_Reservation` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `ID_Professionnel` int(11) NOT NULL,
  `ID_Service` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Heure` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`ID_Reservation`, `ID_Client`, `ID_Professionnel`, `ID_Service`, `Date`, `Heure`) VALUES
(5, 19, 12, 11, '2023-06-15', '12:40:00'),
(6, 20, 12, 11, '2023-06-15', '12:40:00'),
(7, 21, 12, 11, '2023-06-15', '12:40:00'),
(8, 28, 12, 11, '2033-03-31', '22:22:00'),
(9, 29, 12, 11, '2033-03-31', '22:22:00'),
(10, 30, 12, 11, '2033-03-31', '22:22:00'),
(11, 31, 12, 11, '2033-03-31', '22:22:00'),
(12, 32, 12, 11, '2033-03-31', '22:22:00'),
(13, 33, 12, 11, '2033-03-31', '22:22:00'),
(14, 34, 12, 11, '2033-03-31', '22:22:00'),
(15, 35, 12, 11, '2023-06-09', '13:05:00'),
(19, 27, 1, 2, '2023-06-21', '16:17:00'),
(20, 27, 1, 2, '2023-06-21', '18:19:00'),
(21, 27, 12, 11, '2023-06-22', '14:19:00');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `ID_Service` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Prix` varchar(250) DEFAULT NULL,
  `Durée` varchar(10) NOT NULL DEFAULT '',
  `Catégorie` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`ID_Service`, `image`, `Nom`, `Description`, `Prix`, `Durée`, `Catégorie`) VALUES
(1, 'soin.jpg', 'Masque à l argile rouge', 'Le masque à l argile rouge Argiletz est un soin entièrement naturel idéal pour les peaux sèches. Elle nettoie et purifie la peau en douceur.', '750', '30', 'soin du visage'),
(2, 'Nettoyage.jpg', 'Nettoyage du visage', ' Il s agit de la première étape essentielle pour éliminer les impuretés et la saleté accumulées sur la peau. ', '200', '15', 'soin du visage'),
(3, 'Exfoliation.jpg', 'Exfoliation', 'L exfoliation aide à éliminer les cellules mortes de la peau et à stimuler le renouvellement cellulaire. ', '150', '30', 'soin du visage'),
(4, 'Vapeur.jpg', 'Vapeur faciale', 'La vapeur faciale permet d ouvrir les pores et de faciliter l élimination des impuretés.', '350', '20', 'soin du visage'),
(5, 'carbon.jpg', 'Masque de carbon', 'Ce masque nettoie le peau en profondeur sans l agresser, élimine les impuretés et les toxines, resserre les tissus et affine le grain de peau.', '350', '40', 'soin du visage'),
(7, 'collagen.jpg', 'Soin pur collagne', 'Avec son masque imprégné de collagène natif soluble et lenchainement des manoeuvres ce soin apportera tonus et éclat à votre peau.', '800', '1h 45', 'soin du visage'),
(11, 'massage1.jpg', 'Le massage californien', 'Le massage californien associe des techniques de tapotements, de pétrissage, d effleurement et de frictions.', '200', '30', 'Massage'),
(12, 'ayurvedique.jpg', 'Le massage ayurvédique', 'Originaire de l Ayurveda en Inde, le massage ayurvédique se focalise surtout sur le dos et sur la stimulation des 7 chakras pour répartir l énergie dans le corps du béénficiaire.', '300', '45', 'massage'),
(13, 'sportif.jpg', 'Massage sportif', 'Originaire de l Ayurveda en Inde, le massage ayurvédique se focalise surtout sur le dos et sur la stimulation des 7 chakras pour répartir l énergie dans le corps du béénficiaire.', '300', '45', 'massage'),
(14, 'balinais.jpg', 'Le massage balinais', 'Le massage sportif aide à la récupération musculaire, à une meilleure circulation sanguine et prévient les potentiels accidents.', '400', '45', 'massage'),
(15, 'massagesuedois.jpg', 'Le massage suédois', 'Le massage suédois ou massage sportif est un massage bien-être pratiqué régulièrement. Le massage suédois raffermit les muscles.', '450', '30', 'massage'),
(16, 'tissus.jpg', 'Massage tissus profonds', 'Ce massage a des visées médicales. Il vise les couches profondes des muscles et des tendons.', '200', '30', 'massage'),
(17, 'hamame.jpg', 'hamam', 'hamam marocaine', '100', '1h', 'hamam'),
(18, 'sauna.jpg', 'sauna', 'sauna', '200', '1h', 'sauna');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID_Client`);

--
-- Index pour la table `professionnels`
--
ALTER TABLE `professionnels`
  ADD PRIMARY KEY (`ID_Professionnel`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID_Reservation`),
  ADD KEY `ID_Client` (`ID_Client`),
  ADD KEY `ID_Professionnel` (`ID_Professionnel`),
  ADD KEY `ID_Service` (`ID_Service`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID_Service`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `professionnels`
--
ALTER TABLE `professionnels`
  MODIFY `ID_Professionnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID_Reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `ID_Service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `clients` (`ID_Client`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`ID_Professionnel`) REFERENCES `professionnels` (`ID_Professionnel`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`ID_Service`) REFERENCES `services` (`ID_Service`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
