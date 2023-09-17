-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 17 sep. 2023 à 16:18
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetpoo`
--
CREATE DATABASE IF NOT EXISTS `projetpoo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projetpoo`;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `priority`
--

INSERT INTO `priority` (`id`, `name`) VALUES
(1, 'Prioritaire'),
(2, 'Urgent'),
(3, 'Important');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_At` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `content`, `id_user`, `created_At`) VALUES
(3, 'Projet Ange 1', 'Description du Projet Ange 1\n', 2, '2023-09-08 23:41:02'),
(4, 'Projet Ange 2', 'Description du Projet Ange 2\n', 2, '2023-09-08 23:43:43'),
(6, 'Projet Lana', 'Description du Projet lana\n', 5, '2023-09-09 14:16:23'),
(7, 'Projet de Maky', 'Description du Projet Maky', 22, '2023-09-09 15:55:57'),
(9, 'Projet 2', 'Description du Projet 2', 5, '2023-09-11 14:12:39'),
(10, 'Projet 3', 'Description Projet 3\r\n', 5, '2023-09-11 14:14:23'),
(11, 'Projet 36', 'Description projet 36\r\n\r\n', 1, '2023-09-11 16:03:13'),
(13, 'Projet 18', 'Description Projet 18', 1, '2023-09-17 15:53:17'),
(14, 'Projet 20', 'Description 20', 1, '2023-09-17 15:53:38'),
(15, 'Projet 5', 'Description Projet 5', 17, '2023-09-17 16:00:30'),
(16, 'Projet 28', 'Description Projet 28', 25, '2023-09-17 16:02:17'),
(17, 'Projet 42', 'Description Projet 42', 27, '2023-09-17 16:03:31');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Non Débuté'),
(2, 'En Cours'),
(3, 'Terminé');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `id_priority` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `created_At` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `content`, `id_status`, `id_priority`, `id_user`, `id_project`, `created_At`) VALUES
(5, 'Tâche n°1 - Maky', 'Description de la Tâche n°1 -Maky', 2, 1, 1, 7, '2023-09-09 15:56:59'),
(6, 'Tâche n° 2 -Maky', 'Description de la Tâche n° 2 -Maky', 2, 2, 2, 7, '2023-09-09 15:58:14'),
(7, 'Tâche n° 3 -Maky', 'Description de la Tâche n° 3 -Maky', 3, 3, 4, 7, '2023-09-09 15:59:08'),
(26, 'Tâche n°1 - Lana ', 'Tâche n°1 - Lana ', 2, 1, 2, 6, '2023-09-11 13:59:42'),
(28, 'Tâche n°2 ', 'Description Tâche n°2 du projet 36', 2, 2, 5, 11, '2023-09-11 16:29:31'),
(30, 'Tâche 1 Projet 36', 'Description Tâche 1 Projet 36', 1, 1, 2, 11, '2023-09-17 15:55:06'),
(31, 'Tâche 3 Projet 36', 'Description Tâche 3 Projet 36', 3, 3, 5, 11, '2023-09-17 15:56:10'),
(32, 'Tâche 1 Projet 18', 'Description Tâche 1 Projet 18', 1, 1, 24, 13, '2023-09-17 15:56:44'),
(33, 'Tâche 2 Projet 18', 'Description Tâche 2 Projet 18', 3, 1, 41, 13, '2023-09-17 15:57:06'),
(34, 'Tâche 1 Projet 5', 'Description Tâche 1 Projet 5', 1, 1, 1, 15, '2023-09-17 16:01:05'),
(35, 'Tâche 2 Projet 5', 'Description Tâche 2 Projet 5', 2, 2, 8, 15, '2023-09-17 16:01:38'),
(36, 'Tâche 1 Projet 28', 'Description Tâche 1 Projet 28', 1, 1, 1, 16, '2023-09-17 16:02:39'),
(37, 'Tâche 1 Projet 42', 'Description Tâche 1 Projet 42', 3, 2, 1, 17, '2023-09-17 16:03:54');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `created_At` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_At`) VALUES
(1, 'Vivi', 'vivi@exemple.fr', '$2y$10$JGWOPMbexjKkbnbokJ0MkuXieVNs3FAG1iGMnenxiK7DJKVRjba9a', '2023-09-06 14:39:56'),
(2, 'Ange', 'ange@exemple.fr', '$2y$10$lPswzyvE4.6PVL5nKLqPKOzXXj.hHaBrCgvIGQBx/e..yJPi39h6i', '2023-09-06 23:29:55'),
(4, 'Vivi2', 'vivi2@exemple.fr', '$2y$10$EXjrWGVUJvTb6Or./L9BuOw4rHrKmIQwm6ve7vQWdS67SfZFpLiTa', '2023-09-06 23:38:29'),
(5, 'Lana', 'lana.12@exemple.fr', '$2y$10$gI/rmzRLFJ4k3Z.KVitwS.t0bXNRaGDlFuk4YmdoALBthCpgFNRWa', '2023-09-07 17:05:42'),
(8, 'Richard', 'richard@richard.fr', '$2y$10$kdCPK5IA0dSl0DyEIFGjnOTRrhPPq.Fc5HTSKsNuYzwUiZEXAsnXK', '2023-09-07 17:18:40'),
(17, 'Mael', 'mael@exemple.fr', '$2y$10$9iVatYF4fROvZd5i/u2MZOizCpboYl/lk1SinLJTuejge2Irapf7q', '2023-09-08 23:28:33'),
(18, 'Jupiter', 'jupiter@exemple.fr', '$2y$10$BK8fVRSLPX57oWzk9ETJuecWcmDo5InBK0qva1GOiF2pA/FwjYCjy', '2023-09-08 23:29:22'),
(22, 'Maky', 'maky@exemple.fr', '$2y$10$TxPnfFkwdrZcpfhxWffyve0LC2a19jmVhtgPmc2JxJN.C/e17K7sy', '2023-09-09 00:14:37'),
(24, 'Seb', 'seb@exemple.fr', '$2y$10$/8GFmYUpMa68JVSTCXqnCO6gRllCT0RH6sscWRq4/pRvOtIj/gpMu', '2023-09-09 17:03:09'),
(25, 'Esmé', 'esme@exemple.fr', '$2y$10$VrBygEV0NCkLlj.8Olyx/O0LLjCcTnYSLIPXn0bnHXeGnc5TgRNwq', '2023-09-10 12:37:32'),
(27, 'René', 'rene@exemple.fr', '$2y$10$ocMKR5OZrQr23Ozyn9Lm4OKhqOvNYa3w0BSJq9udZThgwpA9CMCG.', '2023-09-11 16:37:56'),
(28, 'Adeline', 'adeline@exemple.fr', '$2y$10$qItQQmZ0JKP8ntw1GhFe/OObQksUv4w6cwLCV1oZfyNfCew7fbWla', '2023-09-11 16:42:14'),
(30, 'Sam', 'sam@exemple.fr', '$2y$10$gfV/xTcbjDUxr.ccpg48z.RCcPEarTMU8u4iEvOq4k5XEoUcOkIBK', '2023-09-11 16:43:38'),
(31, 'Machin', 'machin@exemple.fr', '$2y$10$5ZP7VbmsA.AbH/IT31AstewZeBvBc/Y3Ir56zQZCvFE/3hZznz1XS', '2023-09-11 22:58:35'),
(40, 'Démo', 'demo@exemple.fr', '$2y$10$bZSSfKFaZA/wRcW6cMvJuO9jjFl6Sylsfd5VNGN42/8.NsfoQKDwm', '2023-09-12 14:22:48'),
(41, 'Victoire', 'victoire@exemple.fr', '$2y$10$omzVEsVxMAHMm7OF/6DPZ.0WzQJQFtjZfmPMI8.PHgtKqbb8F2zKy', '2023-09-16 14:31:58'),
(47, 'Beber', 'bebe@exemple.fr', '$2y$10$7ZMFfARgkraT0GNAc4f7MerwvPFCp8BosO5YLBLWxcc/6swseqd8e', '2023-09-16 15:09:14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_user`,`id_project`),
  ADD KEY `id_project` (`id_project`);

--
-- Index pour la table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_priority` (`id_priority`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `tasks_ibfk_4` (`id_project`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `participer`
--
ALTER TABLE `participer`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`id_priority`) REFERENCES `priority` (`id`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
