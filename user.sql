-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 31 août 2023 à 18:53
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `articles`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `cin` varchar(20) DEFAULT NULL,
  `num` varchar(20) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `st_prof` varchar(255) DEFAULT NULL,
  `et_civil` varchar(20) DEFAULT NULL,
  `st_medical` varchar(255) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `active`, `cin`, `num`, `admin`, `sexe`, `st_prof`, `et_civil`, `st_medical`, `adresse`, `pays`, `email`, `password`, `role`) VALUES
(1, 'aziz', 'bouzidi', 1, '12345678', '53607790', 0, 'homme', 'homme', 'Patient', 'homme', 'jbk', 'Tunisie', 'aziz.bouzidi@esprit.tn', '$2y$10$Gi8P/0tAqrf5bmhHYQIMuumC5NBDUwpBMGeP323eLziUTdlDkzQXq', 0),
(2, 'Boumelala', 'Khalil', 1, '12345678', '53607790', 0, 'homme', 'homme', 'medecin', 'homme', 'jbk', 'Tunisie', 'khalilboumalala@gmail.com', '$2y$10$w4OtPbr1xjpC2FlGHnMQf.txVwWxtv.B0entc6TJekZh9BnovoZkq', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
