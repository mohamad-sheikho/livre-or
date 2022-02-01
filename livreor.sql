-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 fév. 2022 à 04:25
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(2, 'j&#039;adore le kebab', 27, '2022-02-01 02:36:24'),
(4, 'ketchup svp', 29, '2022-02-01 02:50:05'),
(5, 'zipette', 29, '2022-02-01 02:56:43'),
(6, 'on va a la chicha!', 30, '2022-02-01 03:17:22');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(24, 'moha', '$2y$10$EJZqSlPpMnnv2Qe8EoG0eOojMuop.xzrZFeVumzRrv353PKA0zEQ.'),
(25, 'admin', '$2y$10$FXwVuWNoLpm.Yu9QO7biJOMGgeSiFofHz//cwuHvMlY.EtC2fqYDm'),
(26, 'badr', '$2y$10$Aezk4VUp3dV.CTyFewhNhOuaCO.17WNXSPfP7lTyvO.N28MqIcO9C'),
(27, 'mathieu', '$2y$10$TxXWxZWbQyycqPLNOrBr8.QS5E4xE2Ntr8EF4Xvs.0w8mhrHitOFW'),
(29, 'jasmine', '$2y$10$fw41ijl1gF.e1nI2Mj7qQOCLrbEdZaVuaiED9dRhrdN1cNHDO.Yzq'),
(30, 'lina', '$2y$10$fryBopg5JSgNvQMFq.WNZeBGlJX7uzVHZXLGDrJx3kwmGduMhdpPi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
