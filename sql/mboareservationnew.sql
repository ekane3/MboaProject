-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 30 déc. 2020 à 22:39
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mboareservationnew`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `id_creneau` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `date_cours` date NOT NULL,
  `nom_cours` varchar(50) NOT NULL,
  `nom_prof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `id_creneau`, `id_salle`, `date_cours`, `nom_cours`, `nom_prof`) VALUES
(1, 1, 1, '2020-10-12', 'ATF TP1', 'Mr Frigui'),
(2, 3, 10, '2020-10-21', 'ATF TD', 'M Frigui'),
(3, 5, 4, '2020-10-22', 'Analyse Numérique', 'M Moctar Mohamadou'),
(4, 4, 2, '2020-10-23', 'ATF TP', 'M Frigui'),
(5, 3, 9, '2020-10-21', 'PA MArketing', 'Md Granger'),
(6, 1, 1, '2020-10-23', 'Modelisation des systemes', 'M Mouctar Mohamadou'),
(7, 3, 10, '2020-10-26', 'PA gestion Projet', 'M Michel Esteve'),
(8, 1, 4, '2020-10-17', 'Modelisation des Systemes TD', 'M Moctar Mohamadou'),
(9, 2, 5, '2020-10-18', 'PA Droit', 'M Audrey Lauwers'),
(10, 1, 2, '2020-10-20', 'Modelisation des Systemes TP', 'M Moctar Mohamadou');

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id` int(11) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id`, `heure_debut`, `heure_fin`) VALUES
(1, '08:30:00', '10:00:00'),
(2, '10:30:00', '12:00:00'),
(3, '13:30:00', '15:00:00'),
(4, '15:15:00', '16:45:00'),
(5, '17:00:00', '18:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `id_reservation` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_creneau` int(11) NOT NULL,
  `jour_reservation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`id_reservation`, `login`, `id_salle`, `id_creneau`, `jour_reservation`) VALUES
(22, 'cubilia.Curae@ut.edu', 1, 1, '2020-11-05'),
(23, 'cubilia.Curae@ut.edu', 5, 2, '2020-11-05'),
(26, 'Curabitur.ut@arcu.org', 1, 1, '2020-11-05'),
(27, 'Curabitur.ut@arcu.org', 4, 1, '2020-11-05'),
(41, 'augue.porttitor@ullamcorpernisl.ca', 2, 1, '2020-11-06'),
(42, 'augue.porttitor@ullamcorpernisl.ca', 9, 3, '2020-11-06'),
(46, 'bogni@gmail.fr', 2, 4, '2020-11-06'),
(50, 'Cras.vehicula.aliquet@lobortis.net', 5, 2, '2020-11-07');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `nom_salle` varchar(100) NOT NULL,
  `nbre_place_total` int(11) NOT NULL,
  `nbre_place_occupee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `nom_salle`, `nbre_place_total`, `nbre_place_occupee`) VALUES
(1, '202', 52, 0),
(2, '201', 17, 0),
(3, '203', 10, 0),
(4, '101', 30, 0),
(5, '204', 2, 0),
(6, '104', 50, 0),
(7, '105', 25, 0),
(8, '106', 35, 0),
(9, '107', 23, 0),
(10, '108', 42, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `classe` varchar(25) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `nom`, `password`, `password_hash`, `statut`, `classe`, `date_naissance`, `date_inscription`) VALUES
('ante.Nunc.mauris@sit.ca', 'Scott, Tatyana F.', '23454', '$2y$10$DEphkoYZZALbZeuVT5RaNuXhaIxdI4hyUXgeeLz3H4eJMfxrxg3w2', 'admin', '5', '1998-04-23', '2021-06-18 15:36:38'),
('augue.porttitor@ullamcorpernisl.ca', 'Koch, Jeremy V.', '12345', '$2y$10$tFObWEmDktIFeGrmV7NsdOcFH/UKlkD.lIBO.3TfinaMbodunxata', 'Etudiant', '2', '1998-10-14', '2019-12-03 21:19:25'),
('bibendum.fermentum@quam.org', 'Marsh, Elliott D.', '85858', '$2y$10$Ag6sdazzyQBQbvkDYFtwB.1XYwfe7z6tkytw/5ljK7x6ufiTcCKEm', 'Etudiant', '5', '2000-08-29', '2020-06-21 13:21:00'),
('bogni@gmail.fr', 'Bogni', '12345', '$2y$10$DKRlYAKjgQVlFoc1KiS3QOkW80P5dznqG7rsV0gfjuBMnb3/4so1S', 'admin', '1', NULL, '2020-11-02 00:12:22'),
('Cras.vehicula.aliquet@lobortis.net', 'Booth, Imogene I.', '12030', '$2y$10$lNSAwdlT6DNUeMbPfl.tw.pPxi116cFMPWG/ALmEdFA6.3Y5uYAU.', 'Etudiant', '5', '1999-04-21', '2020-11-15 20:23:44'),
('cubilia.Curae@ut.edu', 'Torres, Jaime F.', '33443', '$2y$10$/LM0YAN6x7hQ5fM9MsApGuehBdLKIrT5zpSbhwjJnIfOOQ/grQd0W', 'Etudiant', '1', '1999-01-29', '2020-09-02 00:37:09'),
('Curabitur.ut@arcu.org', 'Rhodes, Cally T.', '34556', '$2y$10$iSFaKsbcRLVme7VKfzH0Wem0i1shvBpHLWlgPePqWwX6D2cDEBorC', 'Etudiant', '3', '1998-12-20', '2020-09-04 13:59:52'),
('dictum@iaculis.net', 'Boyer, Gannon U.', '12345', '$2y$10$MXwiMPm3BbWIx115mAsAxOUQpNXLuroNGIiAPOuV1.Sb2zRW1hYIa', 'Etudiant', '1', '1998-03-14', '2019-12-15 03:37:40'),
('emile@gmail.com', 'Ekane EMile', '23345', '$2y$10$mDC36XXluL84gQdfmq1o9eSnbTiDTM2MvpcCraSwhHyK4RfZJQq02', 'etudiant', '2', '2000-05-15', '2020-11-06 14:28:59'),
('enim@Maurisvel.org', 'Conley, Azalia A.', '12345', '$2y$10$a5mrohdzVOtRjvgSGtCNdeiq2ipbMmFvsE868joCnzq3qt3TD0M3i', 'Etudiant', '5', '1998-09-17', '2021-05-31 06:11:37'),
('et.lacinia.vitae@mi.org', 'Randolph, Petra H.', '12345', '$2y$10$c28EvIu4l5UKL56kNw/dse5ksRg2N84FfUkVHtxhgalCC.j3iDMIG', 'Etudiant', '2', '2000-12-13', '2020-08-31 13:26:28'),
('eu.ultrices.sit@mus.org', 'Burt, Ezekiel V.', '12345', '$2y$10$jh7yR3T7gB1wj7t0fam0uum2Jh/VJGHe574hdeyeuXespM3crZ/pO', 'Etudiant', '2', '1998-08-14', '2020-07-10 14:43:47'),
('euismod.in.dolor@dapibusligula.org', 'White, Melvin M.', '12345', '$2y$10$TntgtEfKwjnOZ1RYvYXHw.Ycqcx1oXY2cB0kJfAjTY1R5.d/XbtwW', 'Etudiant', '4', '1998-05-04', '2019-11-12 10:27:44'),
('fames@auguemalesuadamalesuada.edu', 'Travis, Moana V.', '12345', '$2y$10$nyglY0G6IGHmin20CCTEi.JtLiYD4gO6qIc9tXYQ8V/p1UuVcmxRW', 'Etudiant', '4', '1998-09-09', '2020-03-15 20:06:41'),
('feugiat.placerat.velit@vitae.org', 'Santos, Doris B.', '12345', '$2y$10$nY5/HDS4vP7iLbASqHTJpOi323wD4q/tEQsUrgc/8JOUzat4KveFG', 'Etudiant', '1', '1998-02-28', '2021-08-03 11:49:38'),
('feugiat.Sed.nec@elitpharetra.net', 'Greene, Elizabeth R.', '12345', '$2y$10$PrTbFptRBNZIY7o38JaKFOO1jRyKMhHnjg65e6Wb9dshm676GHjL2', 'Etudiant', '2', '2000-03-01', '2021-01-22 16:09:26'),
('feugiat.Sed@gravidanunc.net', 'Bentley, Damon B.', '12345', '$2y$10$uO9VVyuaXm7al83B4hICbuI8rAQdtiz0MJF44mo9p5SUZY19GPCe.', 'Etudiant', '1', '1999-06-07', '2020-06-26 19:53:48'),
('fringilla.mi@amet.org', 'Sweet, Brittany A.', '12345', '$2y$10$la.a/2HEVdqDgxHnbhPeyeJsrOqgouaORKqa35FSk/qAKfpYq92N.', 'Etudiant', '4', '2000-05-12', '2021-06-14 04:02:54'),
('Fusce@maurisidsapien.net', 'Clements, Jamalia X.', '12345', '$2y$10$BnFmFFna5xFMQCBfPfrTaebeL2D2lhCu.OpDPA/d/DYEgPvf9h0bW', 'Etudiant', '1', '1999-12-10', '2020-02-17 08:33:19'),
('In.ornare@dolornonummyac.co.uk', 'Warren, Charity Y.', '12345', '$2y$10$kZtTCjy3G.0B5VyyNJw4R.K3DCtReFOLeyiup7ETayukWH6/09xi.', 'Etudiant', '1', '2000-06-21', '2020-09-13 10:31:10'),
('Integer@felis.com', 'Pierce, Grant E.', '12345', '$2y$10$xE1pIBPfHTHfd.mRNUg5guJy8tQecqbfJfUe2EqSq0jUh1H4hPLQS', 'Etudiant', '3', '1999-02-14', '2020-06-23 08:08:58'),
('ipsum.Phasellus.vitae@dolorquamelementum.co.uk', 'Peck, Vanna X.', '12345', '$2y$10$tAvCe8FP5mCDL4Bc3HDrvu30Y96UK26vsQyVpn8OEtGMatDnUGK7i', 'Etudiant', '1', '2000-03-25', '2021-07-06 03:19:30'),
('lacus.varius.et@DuisgravidaPraesent.ca', 'Case, Gisela S.', '12345', '$2y$10$14K51pSIaLIMJBSZd4SY7uhbI.ZeGl12VPPM8WdMEkT0jMiHM8nhe', 'Etudiant', '3', '2000-10-31', '2021-10-18 05:12:59'),
('leo.Cras.vehicula@nullaIntegervulputate.ca', 'Riddle, Jennifer X.', '12345', '$2y$10$BTJZn7qC4BlwAU4lLh.Itur3Q1ispOXTGCuGGG57Xf9A/8F1KOlZ6', 'Etudiant', '5', '1998-03-03', '2021-03-30 10:07:19'),
('ligula.Donec.luctus@volutpatNulla.com', 'Drake, Leo R.', '12345', '$2y$10$m3DVbf5O10vsf6JC1DTHGOrWh6I7bYFKMsTObd2mGN3QLywDMjMGW', 'Etudiant', '4', '1999-04-16', '2021-07-23 15:53:29'),
('ligula.Nullam@enim.co.uk', 'Mcgowan, Cassady Y.', '12345', '$2y$10$RxPliR.FWLciACaryTgSFOL9.xde/l7AtdTiTia8iinzr5Y.i8siq', 'Etudiant', '4', '1999-09-10', '2020-08-14 15:51:40'),
('lobortis.nisi.nibh@scelerisquescelerisquedui.com', 'Perkins, Kadeem G.', '12345', '$2y$10$NrIWNUv4naJjMPVmuUu0PuVi5PzH.YEvvJ7HaiPQSeeqnF4HlWuKe', 'Etudiant', '4', '1999-02-27', '2021-10-02 18:54:27'),
('lobortis.tellus.justo@sodales.edu', 'Lyons, Jin P.', '12345', '$2y$10$.sm5LJR0N1UhrFEMLmNJceFkYa40JV0a8AIqSSDtLItbZnIQrelvu', 'Etudiant', '1', '1999-08-15', '2020-01-11 21:26:50'),
('luctus.aliquet.odio@laciniaorci.com', 'Hayes, Marshall C.', '12345', '$2y$10$676n4ZBItWoc0ScRDbjuee1tYcs32Jup.vYE971ltnUgQXvjRmCiS', 'Etudiant', '4', '1998-12-01', '2021-06-04 08:21:24'),
('Maecenas.libero.est@lectusconvallis.co.uk', 'Salas, Ahmed M.', '12345', '$2y$10$kwzDVbT1wFT7z8t28PX89uAIAoNCx4VFs4Je011AAvkVZ7f.KvVYi', 'Etudiant', '2', '2000-03-31', '2020-01-16 19:13:46'),
('Maecenas@uterosnon.org', 'Farmer, Linda Q.', '12345', '$2y$10$ZXJubVjBrV/D9t01G9X.8.rT6fjJQP0JOQaSzpqS1f01YV5tdS2FC', 'Etudiant', '1', '1999-10-10', '2021-05-13 04:40:00'),
('magna@idliberoDonec.edu', 'King, Wylie Y.', '12345', '$2y$10$Ql50ul79r6tVlVfoQW9zx.EZPqwaBMK.iB58ODoq52puARCmJubuW', 'Etudiant', '1', '1998-03-30', '2021-09-03 15:11:22'),
('malesuada@Maecenasiaculis.net', 'Patterson, Aaron E.', '12345', '$2y$10$hHfItTp520/1bULJLZU.KOizGdpa3fFOk6LcwEQs68YsKcwJsai3a', 'Etudiant', '3', '1998-12-08', '2020-06-02 14:28:38'),
('massa.Mauris.vestibulum@Suspendissealiquetmolestie', 'Case, Scarlett U.', '12345', '$2y$10$MpDgHgiiy12KfvLt6TqvGeR4.ewg7OJlWIZUzXpi2qfHVb/euJxeu', 'Etudiant', '4', '1998-10-12', '2019-12-25 04:48:38'),
('mauris.rhoncus@eu.com', 'Glover, Richard P.', '12345', '$2y$10$.AeQgPgQ7Y2rISlYBnnjqOa97mI6AG0AJSRNB6uo8EUEo1fa1dciu', 'Etudiant', '3', '1998-02-01', '2020-08-24 14:27:44'),
('Morbi.sit@id.co.uk', 'Becker, Evangeline K.', '12345', '$2y$10$Oy6VVGvQE/JRHRqIjnint.SdlUo4AwVk6XwAKlViduzvxHjmAOBm2', 'Etudiant', '5', '1999-10-01', '2019-12-07 00:58:56'),
('nisi.Cum@ornareplacerat.net', 'Vance, Elton J.', '12345', '$2y$10$aQGHBA84dmAzgODfvuqf2e0S0.SgBMXuCvfzPOC2UOPqKjI/7IQsy', 'Etudiant', '2', '1998-05-03', '2020-08-23 09:42:23'),
('non.quam@enim.co.uk', 'Michael, Rafael N.', '12345', '$2y$10$MZmHdpfNK93X/WYpEl3eAu/819Le2PGSpzvqZcPZh9F9Id1O0Te6m', 'Etudiant', '4', '1999-10-26', '2021-05-20 22:16:43'),
('nulla.Cras@sollicitudincommodo.net', 'Strong, Colleen W.', '12345', '$2y$10$3O9LmeSmcXQEvN8Qh0cPPutJvbJkL.h9mgqfQg4A6rs11q4lFQxJG', 'Etudiant', '3', '1998-04-30', '2021-09-26 05:05:30'),
('Nullam.enim@faucibuslectus.ca', 'Marquez, Curran K.', '12345', '$2y$10$vlrMdqO68GbfjynwLBfj3e6DFXL0JZVuWy18.OLYzHmnpGHIf50iq', 'Etudiant', '2', '1998-02-21', '2020-05-03 17:56:57'),
('odio.a@atnisiCum.ca', 'Shelton, Emi Y.', '12345', '$2y$10$sELZfEsdTyb76vKsXjDgo.3fqvHep5HRzZVu18tVzWG64cFuHgQde', 'Etudiant', '1', '1998-08-21', '2021-04-28 14:32:38'),
('parturient@augueid.org', 'Poole, Vance A.', '12345', '$2y$10$wMICQzflOu1xNVhvnLGAfuXUtF2NmTUCRB6R10T0QRXLEjzIai/tW', 'Etudiant', '4', '1999-05-27', '2020-01-15 17:21:46'),
('placerat.augue.Sed@dolor.org', 'Gutierrez, Colby G.', '12345', '$2y$10$AgMPjFYcELfrQATLbxUvEOr2eZE5h2triGa5nGyJ3z1UbDXr90xES', 'Etudiant', '3', '1999-06-22', '2021-07-22 01:02:16'),
('purus.accumsan.interdum@sagittisfelis.edu', 'Griffin, Hayfa Z.', '12345', '$2y$10$oEd2obZ2e1sEHTL6Ken3VO6re79lF2.8YHJDSMgTGvs3BLEFMFsx.', 'Etudiant', '4', '1999-04-27', '2020-03-22 20:24:05'),
('purus.mauris.a@vulputateduinec.ca', 'Sullivan, Mannix M.', '12345', '$2y$10$5uP7hP3G9C3vX42v.oM7o.PDFksn5zjR.WOD/m7JPyf104aEGYugG', 'Etudiant', '5', '1999-04-24', '2020-11-26 02:28:19'),
('quis.massa.Mauris@euduiCum.co.uk', 'Stephens, Plato M.', '12345', '$2y$10$T.9HUJlB7XkR8fyf3PkGIecFru0NuGyaig7VV1FXQdkkBYk43g65m', 'Etudiant', '5', '1998-12-19', '2021-09-02 18:59:42'),
('sapien@duinectempus.ca', 'Golden, Zeph E.', '12345', '$2y$10$1WZlpiA8RXjYgrMRQBs31Oxb.2dniNisAFg2.A73qKuWFHYcvvmu.', 'Etudiant', '4', '1999-01-21', '2020-08-06 20:33:56'),
('senectus.et.netus@Phasellusnulla.edu', 'Day, Cullen N.', '12345', '$2y$10$UAMcqUuGU9Jxl2Z5TWG.6.XJII73pFJtqBJWJUeclI5reIJGFhzgi', 'Etudiant', '5', '1999-01-16', '2020-05-02 21:06:21'),
('sit@nisi.com', 'Brooks, Scott N.', '12345', '$2y$10$0S15TEMIFsJb3BpMwNDB5.vHPvDWIzQET.0i8vjjbuoWPtprkZ/xe', 'Etudiant', '1', '1998-03-13', '2020-11-22 06:09:42'),
('tortor.Integer@faucibus.net', 'Tyler, Galena D.', '12345', '$2y$10$izVXgXcMSe8S1nVLwA7MVuAq6VM5/b1j8lKuwGdjE2fTrXqfp7TCa', 'Etudiant', '1', '1998-04-22', '2020-04-08 08:10:40'),
('varius@fringillaeuismodenim.org', 'Perry, Sloane M.', '12345', '$2y$10$bx2F3JGrIt.e37EzpGOlg.d6XNBDPW076ie/t8lRp3lsrCK.oqFpq', 'Etudiant', '5', '1998-01-08', '2020-01-22 11:42:57'),
('venenatis.lacus@pharetraNam.net', 'Salas, Kendall P.', '12345', '$2y$10$U3.tTc247QEjrDWsYTQqV.zvl81fBLsi2cEdbWnKvbREPgawS0Osu', 'Etudiant', '4', '2000-12-10', '2020-09-13 04:29:42'),
('volutpat@Duisdignissim.ca', 'Santiago, Fallon M.', '12345', '$2y$10$gh1NxmbzlHoZYnR6Lz.lhubw8NnM.aGpy1N5vWw3pfNMR85VAGxAS', 'Etudiant', '2', '1998-12-04', '2021-04-24 08:18:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `idcreneau_fk` (`id_creneau`),
  ADD KEY `idsalle_fk` (`id_salle`);

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `Reserver_salle0_FK` (`id_salle`),
  ADD KEY `Reserver_creneau1_FK` (`id_creneau`),
  ADD KEY `LOGIN_Etudiant_FK` (`login`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `reserver`
--
ALTER TABLE `reserver`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `idcreneau_fk` FOREIGN KEY (`id_creneau`) REFERENCES `creneau` (`id`),
  ADD CONSTRAINT `idsalle_fk` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `LOGIN_Etudiant_FK` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
