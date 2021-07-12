-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 juil. 2021 à 19:48
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `georgetp`
--

-- --------------------------------------------------------

--
-- Structure de la table `chantier`
--

CREATE TABLE `chantier` (
  `id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chantier`
--

INSERT INTO `chantier` (`id`, `type`) VALUES
(1, 'Plombiere'),
(2, 'peinture');

-- --------------------------------------------------------

--
-- Structure de la table `interlocuteurs`
--

CREATE TABLE `interlocuteurs` (
  `id` int(11) NOT NULL,
  `chantier_id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `interlocuteurs`
--

INSERT INTO `interlocuteurs` (`id`, `chantier_id`, `nom`, `prenom`, `fonction`, `tel`) VALUES
(1, 1, 'Mrah', 'Amine', 'plombier', '0705050505');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chantier`
--
ALTER TABLE `chantier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `interlocuteurs`
--
ALTER TABLE `interlocuteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_27EED0CED0C0049D` (`chantier_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chantier`
--
ALTER TABLE `chantier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `interlocuteurs`
--
ALTER TABLE `interlocuteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `interlocuteurs`
--
ALTER TABLE `interlocuteurs`
  ADD CONSTRAINT `FK_27EED0CED0C0049D` FOREIGN KEY (`chantier_id`) REFERENCES `chantier` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
