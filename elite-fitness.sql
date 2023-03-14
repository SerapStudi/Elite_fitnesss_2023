-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Hôte : db5012281103.hosting-data.io
-- Généré le : mar. 14 mars 2023 à 16:38
-- Version du serveur : 5.7.38-log
-- Version de PHP : 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs10331785`
--

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `structure_id` int(11) DEFAULT NULL,
  `vendre_boissons` tinyint(1) NOT NULL,
  `vendre_equipements` tinyint(1) NOT NULL,
  `gerer_planning` tinyint(1) NOT NULL,
  `envoyer_newsletter` tinyint(1) NOT NULL,
  `modifier_paiement` tinyint(1) NOT NULL,
  `gerer_factures` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `structure_id`, `vendre_boissons`, `vendre_equipements`, `gerer_planning`, `envoyer_newsletter`, `modifier_paiement`, `gerer_factures`) VALUES
(1, 1, 0, 1, 0, 1, 1, 0),
(2, 2, 0, 0, 0, 0, 0, 1),
(3, 3, 1, 1, 0, 0, 1, 0),
(4, 4, 1, 1, 0, 1, 0, 0),
(5, 5, 1, 0, 0, 1, 1, 0),
(6, 6, 1, 0, 0, 1, 0, 0),
(7, 7, 1, 1, 1, 1, 0, 1),
(8, 8, 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctechnique` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccommercial` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom`, `descrip`, `ctechnique`, `ccommercial`, `statut`, `image`) VALUES
(1, 'ELITE FITNESS PARIS', 'Salle de sport', 'paris.service.technique@gmail.com', 'contact.commercial.paris@gmail.com', '1', 'logo1.png'),
(2, 'ELITE FITNESS ABLIS', 'Salle de sport', 'ablis.service.technique@gmail.com', 'contact.commercial.ablis@gmail.com', '1', 'logo2.png'),
(3, 'ELITE FITNESS SAINT TROPEZ', 'Salle de sport', 'st_tropez.service.technique@gmail.com', 'contact.commercial.st_tropez@gmail.com', '1', 'logo3.png'),
(4, 'ELITE FITNESS CACHY', 'Salle de sport', 'cachy.service.technique@gmail.com', 'contact.commercial.cachy@gmail.com', 'Inactif', 'logo4.png'),
(5, 'ELITE FITNESS CHALAIS', 'Salle de sport', 'chalais.service.technique@gmail.com', 'contact.commercial.chalais@gmail.com', 'Inactif', 'logo5.png'),
(6, 'ELITE FITNESS DIENNE', 'Salle de sport', 'dienne.service.technique@gmail.com', 'contact.commercial.dienne@gmail.com', '1', 'logo6.png'),
(7, 'ELITE FITNESS SABLET', 'Salle de sport', 'sablet.service.technique@gmail.com', 'contact.commercial.sablet@gmail.com', '1', 'logo7.png'),
(8, 'ELITE FITNESS UPIE', 'Salle de sport', 'upie.service.technique@gmail.com', 'contact.commercial.upie@gmail.com', 'Inactif', 'logo8.png'),
(41, 'ABO TECH', 'DD', 'abaocmr@gmail.com', 'abdoullahi_o@yahoo.fr', '1', 'arma.jpg'),
(43, 'ABO TECH', 'ABO TECH', 'abaocmr@gmail.com', 'abdoullahi_o@yahoo.fr', '1', 'WhatsApp Image 2023-02-23 at 17.04.14.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `partner_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_actif` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partners`
--

INSERT INTO `partners` (`id`, `partner_name`, `partner_email`, `partner_password`, `partner_actif`) VALUES
(1, 'Elite Fitness Paris', 'elite.service.technique@gmail.com', 'EliteFitnessParis67874522@*', 'Actif'),
(2, 'Elite Fitness Ablis', 'elite.fitness.ablis@gmail.com', 'eliteFitnessAblis@2058*', 'Inactif'),
(3, 'Elite Fitness Saint Tropez', 'elite.fitness.st.tropez@gmail.com', 'eliteFitnessStTropez@2069*', 'Actif'),
(4, 'Elite Fitness Cachy', 'elite.fitness.cachy@gmail.com', 'EliteFitnessCachy5975@*', 'Inactif'),
(5, 'Elite Fitness Chalais', 'elite.fitness.chalais@gmail.com', 'EliteFitnessChalais54516@*', 'Inactif'),
(6, 'Elite Fitness Dienne', 'elite.fitness.dienne@gmail.com', 'ElitFitnessDienne214887@*', 'Actif'),
(7, 'Elite Fitness Sablet', 'elite.fitness.sablet@gmail.com', 'Elite.Fitness.Sablet7165804*@', 'Actif'),
(8, 'Elite Fitness Upie', 'elite.fitness.upie@gmail.com', 'EliteFitnessUpie568421@*', 'Inactif');

-- --------------------------------------------------------

--
-- Structure de la table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `partners_id` int(11) DEFAULT NULL,
  `relation_id` int(11) DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `structure`
--

INSERT INTO `structure` (`id`, `partners_id`, `relation_id`, `nom`, `adresse`, `email`, `statut`, `image`) VALUES
(1, NULL, NULL, 'ELITE FITNESS PARIS', '50 allée Galilée - 75010 PARIS', 'structure_paris@gmail.com', '1', '1.jpg'),
(2, NULL, NULL, 'ELITE FITNESS ABLIS', '43 allée de jardin - 78660 ABLIS', 'structure_ablis@gmail.com', '1', '9.jpg'),
(3, NULL, NULL, 'ELITE FITNESS ST TROPEZ', '12 allée du bureau - 83990 ST TROPEZ', 'structure_st_tropez@gmail.com', '1', '11.jpg'),
(4, NULL, NULL, 'ELITE FITNESS CACHY', '24 rue du bac - 80800 CACHY', 'structure_cachy@gmail.com', '0', '4.jpg'),
(5, NULL, NULL, 'ELITE FITNESS CHALAIS', '82 rue de Rivoli - 16210 CHALAIS', 'structure_chalais@gmail.com', '0', '5.jpg'),
(6, NULL, NULL, 'ELITE FITNESS DIENNE', '11 allée de garage - 86410 DIENNE', 'structure_dienne@gmail.com', '1', '12.jpg'),
(7, NULL, NULL, 'ELITE FITNESS SABLET', '68 rue du commerce - 84110 SABLET', 'structure_sablet@gmail.com', '1', '13.jpg'),
(8, NULL, NULL, 'ELITE FITNESS UPIE', '7 allée maison - 26120 UPIE', 'structure_upie@gmail.com', '1', '8.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL COMMENT 'role_id',
  `roles` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'role_text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `roles`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleid` tinyint(4) DEFAULT NULL,
  `isActive` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `resetpwd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `roleid`, `isActive`, `resetpwd`) VALUES
(1, 'Serap', 'Dev', 'elite.service.technique@gmail.com', '$2y$10$WyBvUuvXavjTyK81WWTovumcoYcvL/Q99Os9y/QZFx6dIfUI8jfde', 1, '1', 1),
(2, 'Laurent', 'Novial', 'elite.fitness.paris@gmail.com', '$2y$10$blXIhCYmz42GIlfjs0f2HO10ryuk06XKfhv551ynvnhal1/3NdLta', 2, '1', 1),
(3, 'Eliane', 'Chevalier', 'structure_paris@gmail.com', '$2y$10$2r24353sh5oSskRcM9LEJO5G2Q61DNwoC20tEw4yJK37hRiNBPPN6', 2, '1', 1),
(4, 'Yvan', 'Roche', 'elite.fitness.ablis@gmail.com', '$2y$10$wSDg4vVX1leSiCLtcrkONeHv0th9oFz2LdYocfVPitxJY68HorHNi', 2, '0', 1),
(5, 'Jean', 'Morisque', 'structure_ablis@gmail.com', '$2y$10$NaNWwoZoFcHKR/ChUTy5WOrLEa1Xi/5gDAh1H2Oypy1fqeK7yfKM6', 2, '0', NULL),
(6, 'Fabienne', 'Laurent', 'elite.fitness.st.tropez@gmail.com', '$2y$10$g70fHI3QoWrtTOII10DTROczPMYfkMVebcIYh4D6GFI3sUI8Ep1fq', 2, '1', NULL),
(7, 'Cedric', 'Cayolle', 'structure_st_tropez@gmail.com', '$2y$10$iyjQ1F3uhWIx3E1JanPJ8OilKrZvQefDndW5DSs6w5wuZqx81QbiS', 2, '1', NULL),
(8, 'Sabrina', 'Tarcy', 'elite.fitness.cachy@gmail.com', '$2y$10$x0QyielBZDOblGj4Cppq2ud3rQwe8sO/QneDtGF1z64gB54lIw4pW', 2, '0', NULL),
(9, 'Norbert', 'Morondais', 'structure_cachy@gmail.com', '$2y$10$szZo6NyyDKRObc9d..g0V.qlu5PwWdDs9knt7CPzoeO/dNXzEe38O', 2, '0', NULL),
(10, 'Jean', 'Khiat', 'elite.fitness.chalais@gmail.com', '$2y$10$WOXbRQMXCG6EYrs.xU.lC.zSEVMjLYqqDVPZ7RAM/PtwJh7s.UR72', 2, '0', NULL),
(11, 'Yael', 'Dray', 'structure_chalais@gmail.com', '$2y$10$gtVei7LAVyGFGPACelCGgeQDkNvJB1sQctXSPN2UmMZwvfL8EmZ5e', 2, '0', NULL),
(12, 'Celine', 'Faure', 'elite.fitness.dienne@gmail.com', '$2y$10$eEA53pK8Op7/U7nJWDjwsO7IT0ZBh4qcQOk7GQBAfS0m0y8f/HBdu', 2, '1', NULL),
(13, 'Denis', 'Rodin', 'structure_dienne@gmail.com', '$2y$10$RnjZYY9RRZ9VHCDpYhoixemTrxvOnNJhKN9fQ2AaRGbHj5toii3NG', 2, '1', NULL),
(14, 'Ariane', 'Faure', 'elite.fitness.sablet@gmail.com', '$2y$10$8DoZLgmKVWagdlSM9hf5LOEYOCGaZKu4nj9MeXjY8ciBjVeZSKC9m', 2, '1', NULL),
(15, 'Stephane', 'Philippe', 'structure_sablet@gmail.com', '$2y$10$/BuYvSw7tehyl1L/VzIGAu/2szi5P5s7hBCx/w1OfY2oloHPHFX2i', 2, '1', NULL),
(16, 'David', 'Jaffroy', 'elite.fitness.upie@gmail.com', '$2y$10$vlK3DF7kD4vvdqwEXs5vT.USb90o3oDwG/QHZSZA.8Nf3I0k5AS8S', 2, '0', NULL),
(17, 'Claude', 'Roman', 'structure_upie@gmail.com', '$2y$10$KlAlkxU5N1ONTRV08sWM5uUAWqsxvmoQdVhQ42jcdVanny.3xFpgm', 2, '1', NULL),
(22, 'test', 'test', 'test1@test.com', 'test1@test.com', 1, '2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_active` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `user_active`) VALUES
(1, 'elite.service.technique@gmail.com', '[\"ROLE_ADMIN\"]', 'ServiceTechnique2022*356897@', '1'),
(2, 'elite.fitness.paris@gmail.com', '[\"ROLE_USER\"]', 'EliteFitnessParis67874522@*', '1'),
(3, 'structure_paris@gmail.com', '[\"ROLE_USER\"]', 'StructureEliteParis500892@*', '1'),
(4, 'elite.fitness.ablis@gmail.com', '[\"ROLE_USER\"]', 'eliteFitnessAblis@2058*', '0'),
(5, 'structure_ablis@gmail.com', '[\"ROLE_USER\"]', 'StructureAblisElite20898*@', '0'),
(6, 'elite.fitness.st.tropez@gmail.com', '[\"ROLE_USER\"]', 'eliteFitnessStTropez@2069*', '1'),
(7, 'structure_st_tropez@gmail.com', '[\"ROLE_USER\"]', 'Structure_StTropez@9726*', '1'),
(8, 'elite.fitness.cachy@gmail.com', '[\"ROLE_USER\"]', 'EliteFitnessCachy5975@*', '0'),
(9, 'structure_cachy@gmail.com', '[\"ROLE_USER\"]', 'StructureCachyElite56489*@', '0'),
(10, 'elite.fitness.chalais@gmail.com', '[\"ROLE_USER\"]', 'EliteFitnessChalais54516@*', '0'),
(11, 'structure_chalais@gmail.com', '[\"ROLE_USER\"]', 'StuctureChalais558901@*', '0'),
(12, 'elite.fitness.dienne@gmail.com', '[\"ROLE_USER\"]', 'ElitFitnessDienne214887@*', '1'),
(13, 'structure_dienne@gmail.com', '[\"ROLE_USER\"]', 'StructureDienne58940@*', '1'),
(14, 'elite.fitness.sablet@gmail.com', '[\"ROLE_USER\"]', 'Elite.Fitness.Sablet7165804*@', '1'),
(15, 'structure_sablet@gmail.com', '[\"ROLE_USER\"]', 'StructureSabletElite6874*@', '1'),
(16, 'elite.fitness.upie@gmail.com', '[\"ROLE_USER\"]', 'EliteFitnessUpie568421@*', '0'),
(17, 'structure_upie@gmail.com', '[\"ROLE_USER\"]', 'StructureUpieElite54792@*', '0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D035FA872534008B` (`structure_id`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6F0137EABDE7F1C6` (`partners_id`),
  ADD KEY `IDX_6F0137EA3256915B` (`relation_id`);

--
-- Index pour la table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'role_id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `FK_D035FA872534008B` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`);

--
-- Contraintes pour la table `structure`
--
ALTER TABLE `structure`
  ADD CONSTRAINT `FK_6F0137EA3256915B` FOREIGN KEY (`relation_id`) REFERENCES `partners` (`id`),
  ADD CONSTRAINT `FK_6F0137EABDE7F1C6` FOREIGN KEY (`partners_id`) REFERENCES `partners` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
