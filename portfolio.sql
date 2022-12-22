-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 22 déc. 2022 à 13:02
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id_skill` int NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `texte` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_skill`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
CREATE TABLE IF NOT EXISTS `table_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `table_user`
--

INSERT INTO `table_user` (`id_user`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(15, 'II', 'Ayo', 'ayo@user.org', '$2y$12$MGPIzpxpbvqdNuR10CMcMOqsXjZQPYtDnyWsnYmwrnZk3EFaoiYa6', 0),
(17, 'VALTAT', 'Amandine', 'amandine.valtat@gmail.com', '$2y$12$tG7EGpU39n5SyBLW9E0nceJnGBzIj7PicwXCloedXbtuaJRLJhkRW', 1),
(18, 'VALTAT', 'Zelda', 'zelda.valtat@icloud.com', '$2y$12$6PxIUlwqg9WU1KghpWhfhulee8cNxwj..A.zbfKC0Ukt51QHulq12', 1),
(19, 'Chevalerie', 'Fitz', 'assass1@castlecerf.shh', '$2y$12$M4FveEYV3l.PkdGnhntMIu7RSz7w/EGrT4SVpzm5MAaI6pBoCuCkq', 0),
(20, 'Effacer', 'A', 'nul@nul.nullos', '$2y$12$JYHMdOF7EJN8c75pE6zMPud9v0UF6a0ueUNQMZav74hJo8rCx.Gp6', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
