-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 09 nov. 2023 à 16:21
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_posts`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(2048) NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `author` varchar(256) NOT NULL,
  `statut` varchar(32) NOT NULL DEFAULT 'Pending',
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `date_of_creation`, `author`, `statut`, `id_post`) VALUES
(1, 'C\'est mon premier commentaire', '2023-08-17 00:00:00', 'Sam', 'Validate', 1),
(2, 'Commentaire créé via le formulaire', '2023-08-17 00:00:00', 'Salel', 'Validate', 1),
(3, 'C\'est mon troisième commentaire', '2023-08-17 00:00:00', 'Salel', 'Validate', 1),
(5, 'C\'est un commentaire', '2023-11-09 00:00:00', 'Sam', 'Validate', 9),
(6, 'Nouveau commentaire', '2023-11-09 17:02:39', 'Sam', 'Validate', 8);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(512) NOT NULL,
  `content` varchar(4096) NOT NULL,
  `author` varchar(128) NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `loggedUser` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `author`, `date_of_creation`, `loggedUser`) VALUES
(1, 'Titre', 'Ceci est une description', 'Ici il s\'agit du contenu de l\'article', 'Sam', '2023-08-15 00:00:00', 'sam-77@hotmail.fr'),
(2, 'Titre du post modifié', 'Description du post modifié', 'Contenu du post modifié', 'Sam', '2023-08-16 00:00:00', 'sam-77@hotmail.fr'),
(8, 'Nouveau post 3', 'Nouveau post numéro 3', 'Nouveau post', 'Sam', '2023-09-15 12:24:02', 'sam-77@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `statut` varchar(32) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `statut`) VALUES
(1, 'sam-77@hotmail.fr', '$2y$10$LxyGoG4CQPcbuIzMKmKN9e0xnSqUS5HeBvqCa4mT2HSfovC.S/hmy', 'admin'),
(4, 'user@hotmail.fr', '$2y$10$Xikr0QeM2xGt2RRTQm0l2e.QoqtYWE2yf4nypuA9lYHRG/zQVffpa', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
