-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 juil. 2020 à 17:17
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `multicrud`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(160) NOT NULL,
  `resume` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `resume`) VALUES
(1, 'sport', 'c\'est bien pour la santé');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `id` int(11) NOT NULL,
  `titre` varchar(160) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(160) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`id`, `titre`, `description`, `photo`, `id_user`) VALUES
(1, 'titre1625', 'dezcrit1625', '', 123),
(2, 'titre1639', 'ddd1639', '', 1),
(3, 'titre1642', 'ddd1642', '', 7),
(4, 'kfjhdfjka', 'sdhkjsdhk', '', 1),
(5, ',ghjghj', 'ghghjg', '', 8);

-- --------------------------------------------------------

--
-- Structure de la table `contenu_categorie`
--

CREATE TABLE `contenu_categorie` (
  `id` int(11) NOT NULL,
  `id_contenu` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenu_categorie`
--

INSERT INTO `contenu_categorie` (`id`, `id_contenu`, `id_categorie`) VALUES
(1, 123, 456),
(2, 2, 1),
(3, 3, 4),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(160) NOT NULL,
  `password` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'test1620', '1234'),
(7, 'test1610', '1610'),
(8, 'toto', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contenu_categorie`
--
ALTER TABLE `contenu_categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contenu_categorie`
--
ALTER TABLE `contenu_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;