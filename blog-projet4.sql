-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 11 oct. 2018 à 13:57
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog-projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(250) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `contact_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `lastname`, `firstname`, `email`, `content`, `contact_date`) VALUES
(1, 'kat', 'katou', 'kat@wer.com', 'vdfbfgbv', '2018-09-20 00:00:00'),
(3, 'luc', 'luca', 'luc@wer.xo', 'sfdfgdfgdfg', '2018-09-20 00:00:00'),
(4, 'luc', 'luca', 'luc@wer.xo', 'sfdfgdfgdfg', '2018-09-20 00:00:00'),
(5, 'de', 'de', 'de@fsfd.com', 'de', '2018-09-20 00:00:00'),
(6, 'de', 'de', 'de@fsfd.com', 'de', '2018-09-20 00:00:00'),
(7, 'de', 'de', 'de@fsfd.com', 'de', '2018-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reason` varchar(250) DEFAULT NULL,
  `content` text,
  `email` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'unread',
  `submission_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'draft',
  `creation_date` datetime NOT NULL,
  `publish_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `status`, `creation_date`, `publish_date`) VALUES
(60, 'Test1', '<p>test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1 test1</p>', 'published', '2018-10-11 15:03:36', '0000-00-00 00:00:00'),
(62, 'test', '<p>test</p>', 'draft', '2018-10-11 15:52:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `pseudo`, `email`, `password`, `registration_date`) VALUES
(1, 'ka', 'k', 'kaa', 'k@wer.xd', '$2y$10$2ZvvfkaH0GQZzjg8QId70OR/XtlMA/G1cU/5l4U9b3aH8lXtOMnie', '2018-09-05 00:00:00'),
(2, 'luca', 'luc', 'lu', 'luc@wert.com', '$2y$10$Oma0FTlikF4LDINhYXUQa.CRUgz43M5OXaYCe54mlzW/ukM3UxFNW', '2018-09-06 00:00:00'),
(3, 'matteo', 'mat', 'mat', 'mat@wer.com', '$2y$10$lwbbnf/J/NhIFiRAh3jLaONDeej1mXMNN/WWGsLfJh2hacllFIzw.', '2018-09-06 00:00:00'),
(4, 'sasa', 'sara', 'sasa', 'sara@sdfg.com', '$2y$10$D4adgEFCtWMieLL5fQL6tOP6Pxdm5m2R1iu52gHFx/CMDmcV4rE9i', '2018-09-06 00:00:00'),
(5, 'marie', 'mariec', 'marie', 'marie@qwe.com', '$2y$10$7.RI3tq7EOEaufhDBXYfFuXjU.lOaAoy23CgFdAcsX5cBA4YR9vnW', '2018-09-06 00:00:00'),
(6, 'lola', 'lola', 'lola', 'lola@wert.com', '$2y$10$cfoPaMEHiao9iNkBdRrYJ.iCzH3NZU1/QHLiTN9G982PeRBUvEa9K', '2018-09-06 00:00:00'),
(7, 'jo', 'jo', 'jo', 'jo@asd.com', '$2y$10$KZqcMKGHYQ0TFmlGgKMkT.Zj/8KneWZBjVVPGk0rvM9vGYUXLxOAi', '2018-09-06 00:00:00'),
(8, 'tot', 'tot', 'tot', 'tot@qwe.com', '$2y$10$Z44RI3YfJQSxc1k/5MhsRObaiyR0b8Z2ied.EpqMP3Jh1YgXTXokm', '2018-09-06 00:00:00'),
(9, 'tata', 'tats', 'tata', 'ta@wer.com', '$2y$10$ip1XuaFMtMTmL1dWRZgBP.EaNYbcHRDIG1r419jf3CN4sGJrYJ1Oa', '2018-09-06 00:00:00'),
(10, 'qwe', 'qwe', 'qwe', 'qwe@qwe.com', '$2y$10$hoZectTv4X26IO3p6bWSd.pgkzuQ.jJFGy9RLTnhugjMsAx5sYZe2', '2018-09-06 00:00:00'),
(11, '1234', '1234', '1234', '123@123.com', '$2y$10$slEDVlX8fu5hUkiNXM8ZYeCkuz5HVW/9wpfNcu27sI3zS2CK3ALuq', '2018-09-06 00:00:00'),
(12, 'ert', 'ert', 'ert', 'ert@ert.com', '$2y$10$76hfluqahWY2U6VLbLwbxOGC4QjfndaXMF4QngpAAaBlDigmB5s3C', '2018-09-06 00:00:00'),
(13, 'zxc', 'zxc', 'zxc', 'zxc@qwe.com', '$2y$10$JQGV1Wunud7f/XPWOwt3OO5qvM68E.E0L85fm0YuxzZliRM2HAhcy', '2018-09-06 00:00:00'),
(14, 'na', 'na', 'na', 'na@na.com', '$2y$10$eu.1YaitZY.LEmY7KmNyF.I2.cNmKY25Y6KbqIiTYAr7lEJowBoEe', '2018-09-06 00:00:00'),
(17, 'q', 'q', 'q', 'q@dsad.com', '$2y$10$RlZ5S.vgxhCMa3AGk1Y0QenBbfwpXi8xrr0WUB8nmA8NM0ttqr9em', '2018-09-11 00:00:00'),
(18, '1', '1', '1', '1@gma.com', '$2y$10$/ZwCb.4hXzcFSw1rjkl/OumpRAwrvG2eMipUb6Av0USAzvxMxeFu2', '2018-09-11 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_posts_comments` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_comment_notification` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
