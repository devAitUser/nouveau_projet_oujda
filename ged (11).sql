-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 mars 2023 à 16:11
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ged`
--

-- --------------------------------------------------------

--
-- Structure de la table `attributs_dossiers`
--

CREATE TABLE `attributs_dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_champs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_champs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dossier_id` bigint(20) UNSIGNED NOT NULL,
  `champs_id` int(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `attributs_dossiers`
--

INSERT INTO `attributs_dossiers` (`id`, `nom_champs`, `valeur`, `type_champs`, `dossier_id`, `champs_id`, `created_at`, `updated_at`) VALUES
(1090, 'Entité', 'Ressources Humaines', 'select', 154, 225, '2023-02-13 15:50:12', '2023-02-13 15:50:12'),
(1091, 'FOND', 'Dossier Ressources Humaines', 'select', 154, 1960, '2023-02-13 15:50:12', '2023-02-13 15:50:12'),
(1092, 'Dossier Ressources Humaines', 'Dossier Recrutement', 'select', 154, 1961, '2023-02-13 15:50:12', '2023-02-13 15:50:12'),
(1093, 'Nom et prénom', 'BERHIL OMAR', 'text', 154, 2583, '2023-02-13 15:50:12', '2023-02-13 15:50:12'),
(1094, 'Matricule', '7', 'text', 154, 2584, '2023-02-13 15:50:13', '2023-02-13 15:50:13'),
(1095, 'dispose d\'une version physique', 'NON', 'text', 154, NULL, '2023-02-13 15:50:13', '2023-02-13 15:50:13'),
(1096, 'Décision de recrutement', 'files/I3GYNgpy5HZBsmJuOyUbUNO6Typj1L2NfyVNy9lj.pdf', 'Fichier', 154, NULL, '2023-02-13 15:50:14', '2023-02-13 15:50:14'),
(1097, 'Décision de nomination', 'files/MavIPlr9lSfakrqYRvkZaUlQUtPTBJ7U2iIj9Wzg.pdf', 'Fichier', 154, NULL, '2023-02-13 15:50:14', '2023-02-13 15:50:14'),
(1098, 'Décision de titularisation', 'files/2QFOA1SOBJtRiX9ydCzEgTb7kaEEqV92KqPQLlcY.pdf', 'Fichier', 154, NULL, '2023-02-13 15:50:14', '2023-02-13 15:50:14'),
(1099, 'Déclaration sur l\'honneur', 'files/5JiektBDUyU0cK6JTzunnnCvyodZwylqSxx2zRjX.pdf', 'Fichier', 154, NULL, '2023-02-13 15:50:14', '2023-02-13 15:50:14'),
(1100, 'Entité', 'Ressources Humaines', 'select', 155, 225, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1101, 'FOND', 'Dossier Ressources Humaines', 'select', 155, 1960, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1102, 'Dossier Ressources Humaines', 'Dossier Recrutement', 'select', 155, 1961, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1103, 'Nom et prénom', 'BERHIL OMAR', 'text', 155, 2583, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1104, 'Matricule', '7', 'text', 155, 2584, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1105, 'dispose d\'une version physique', 'NON', 'text', 155, NULL, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1106, 'Décision de recrutement', 'files/JeagE8r4Z1Bs8jkbJOJ0azXCNBU585Y2hgtQRDEr.pdf', 'Fichier', 155, NULL, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1107, 'Décision de nomination', 'files/8LD5IfCiPIfTZIS60i2ApM24BwEbdAZ5dhgMjep0.pdf', 'Fichier', 155, NULL, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1108, 'Décision de titularisation', 'files/VovgCcVB61Bg3rFS1DlFohsbzIxAMpPYYDjKnuXN.pdf', 'Fichier', 155, NULL, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1109, 'Déclaration sur l\'honneur', 'files/a7z5EbPzzVI2dYCYPsN98O1k5cFIhyT8snY14dag.pdf', 'Fichier', 155, NULL, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1110, 'Décision de délégation de signature', 'files/d3jdeL0QMVgh0dblnXfA4xulmNPWIcRj2vfXbOVO.pdf', 'Fichier', 155, NULL, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1111, 'Prise de service', 'files/jcXWhQBoK2Nj5UuIGc5hy9PHPvhgaxvBD3gAoOXV.pdf', 'Fichier', 155, NULL, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(1112, 'Entité', 'Ressources Humaines', 'select', 156, 225, '2023-02-14 10:22:27', '2023-02-14 10:22:27'),
(1113, 'FOND', 'Dossier Ressources Humaines', 'select', 156, 1960, '2023-02-14 10:22:27', '2023-02-14 10:22:27'),
(1114, 'Dossier Ressources Humaines', 'Dossier Recrutement', 'select', 156, 1961, '2023-02-14 10:22:27', '2023-02-14 10:22:27'),
(1115, 'Nom et prénom', 'dqs', 'text', 156, 2583, '2023-02-14 10:22:27', '2023-02-14 10:22:27'),
(1116, 'Matricule', 'qsd', 'text', 156, 2584, '2023-02-14 10:22:27', '2023-02-14 10:22:27'),
(1117, 'dispose d\'une version physique', 'NON', 'text', 156, NULL, '2023-02-14 10:22:27', '2023-02-14 10:22:27'),
(1118, 'Décision de recrutement', 'Fichier', 'Fichier', 156, NULL, '2023-02-14 10:22:27', '2023-02-14 10:22:27'),
(1119, 'Décision de nomination', 'Fichier', 'Fichier', 156, NULL, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(1120, 'Décision de titularisation', 'Fichier', 'Fichier', 156, NULL, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(1121, 'Déclaration sur l\'honneur', 'Fichier', 'Fichier', 156, NULL, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(1122, 'Décision de délégation de signature', 'Fichier', 'Fichier', 156, NULL, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(1123, 'Prise de service', 'Fichier', 'Fichier', 156, NULL, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(1124, 'Entité', 'Ressources Humaines', 'select', 157, 225, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1125, 'FOND', 'Dossier Ressources Humaines', 'select', 157, 1960, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1126, 'Dossier Ressources Humaines', 'Dossier Recrutement', 'select', 157, 1961, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1127, 'Nom et prénom', 'zaezer', 'text', 157, 2583, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1128, 'Matricule', 'rzerezrzerze', 'text', 157, 2584, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1129, 'dispose d\'une version physique', 'NON', 'text', 157, NULL, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1130, 'Décision de recrutement', 'Fichier', 'Fichier', 157, NULL, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1131, 'Décision de nomination', 'Fichier', 'Fichier', 157, NULL, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1132, 'Décision de titularisation', 'Fichier', 'Fichier', 157, NULL, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(1133, 'Déclaration sur l\'honneur', 'Fichier', 'Fichier', 157, NULL, '2023-02-14 10:28:10', '2023-02-14 10:28:10'),
(1134, 'Décision de délégation de signature', 'Fichier', 'Fichier', 157, NULL, '2023-02-14 10:28:10', '2023-02-14 10:28:10'),
(1135, 'Prise de service', 'Fichier', 'Fichier', 157, NULL, '2023-02-14 10:28:10', '2023-02-14 10:28:10'),
(1136, 'Entité', 'Ressources Humaines', 'select', 158, 225, '2023-02-20 11:31:25', '2023-02-20 11:31:25'),
(1137, 'FOND', 'Dossier Ressources Humaines', 'select', 158, 1960, '2023-02-20 11:31:26', '2023-02-20 11:31:26'),
(1138, 'Dossier Ressources Humaines', 'Dossier Recrutement', 'select', 158, 1961, '2023-02-20 11:31:26', '2023-02-20 11:31:26'),
(1139, 'Nom et prénom', 'sdbjks²scbcjb', 'text', 158, 2583, '2023-02-20 11:31:26', '2023-02-20 11:31:26'),
(1140, 'Matricule', 'lkdvkj', 'text', 158, 2584, '2023-02-20 11:31:26', '2023-02-20 11:31:26'),
(1141, 'dispose d\'une version physique', 'NON', 'text', 158, NULL, '2023-02-20 11:31:26', '2023-02-20 11:31:26'),
(1142, 'Décision de recrutement', 'Fichier', 'Fichier', 158, NULL, '2023-02-20 11:31:26', '2023-02-20 11:31:26'),
(1143, 'Décision de nomination', 'Fichier', 'Fichier', 158, NULL, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(1144, 'Décision de titularisation', 'Fichier', 'Fichier', 158, NULL, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(1145, 'Déclaration sur l\'honneur', 'Fichier', 'Fichier', 158, NULL, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(1146, 'Décision de délégation de signature', 'Fichier', 'Fichier', 158, NULL, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(1147, 'Prise de service', 'Fichier', 'Fichier', 158, NULL, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(1148, 'Entité', 'Finances et Marchés', 'select', 159, 226, '2023-02-20 12:38:29', '2023-02-20 12:38:29'),
(1149, 'FOND', 'Appel d\'offres', 'select', 159, 1957, '2023-02-20 12:38:29', '2023-02-20 12:38:29'),
(1150, 'Appel d\'offres', 'Dossier de consultation', 'select', 159, 1958, '2023-02-20 12:38:29', '2023-02-20 12:38:29'),
(1151, 'Objet', 'AO 01-2020', 'text', 159, 2569, '2023-02-20 12:38:29', '2023-02-20 12:38:29'),
(1152, 'dispose d\'une version physique', 'NON', 'text', 159, NULL, '2023-02-20 12:38:29', '2023-02-20 12:38:29'),
(1153, 'DECISION DESIGNATION MEMBRE COMMISSION', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:29', '2023-02-20 12:38:29'),
(1154, 'PUBLICATION JOURNAUX FR (1ER AVIS)', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:29', '2023-02-20 12:38:29'),
(1155, 'PUBLICATION JOURNAUX AR (1ER AVIS)', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:30', '2023-02-20 12:38:30'),
(1156, 'Publication portail', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:30', '2023-02-20 12:38:30'),
(1157, 'CPS', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:30', '2023-02-20 12:38:30'),
(1158, 'REEGLEMENT DE COSULTATION', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:30', '2023-02-20 12:38:30'),
(1159, 'ESTIMATION FINANCIERE', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:30', '2023-02-20 12:38:30'),
(1160, 'DEMANDES D\'ECLAIRCISSEMENT', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:30', '2023-02-20 12:38:30'),
(1161, 'REPONSES DDE ECLAIRCISSEMENT', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:30', '2023-02-20 12:38:30'),
(1162, 'Autre', 'Fichier', 'Fichier', 159, NULL, '2023-02-20 12:38:30', '2023-02-20 12:38:30'),
(1163, 'Entité', 'Ressources Humaines', 'select', 160, 225, '2023-03-13 14:39:21', '2023-03-13 14:39:21'),
(1164, 'FOND', 'Dossier Ressources Humaines', 'select', 160, 1960, '2023-03-13 14:39:21', '2023-03-13 14:39:21'),
(1165, 'Dossier Ressources Humaines', 'Dossier Recrutement', 'select', 160, 1961, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1166, 'Nom et prénom', 'ezr', 'text', 160, 2583, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1167, 'Matricule', 'zer', 'text', 160, 2584, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1168, 'dispose d\'une version physique', 'NON', 'text', 160, NULL, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1169, 'Décision de recrutement', 'Fichier', 'Fichier', 160, NULL, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1170, 'Décision de nomination', 'Fichier', 'Fichier', 160, NULL, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1171, 'Décision de titularisation', 'Fichier', 'Fichier', 160, NULL, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1172, 'Déclaration sur l\'honneur', 'Fichier', 'Fichier', 160, NULL, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1173, 'Décision de délégation de signature', 'Fichier', 'Fichier', 160, NULL, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1174, 'Prise de service', 'Fichier', 'Fichier', 160, NULL, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(1175, 'Entité', 'Ressources Humaines', 'select', 161, 225, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1176, 'FOND', 'Dossier Ressources Humaines', 'select', 161, 1960, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1177, 'Dossier Ressources Humaines', 'Dossier Recrutement', 'select', 161, 1961, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1178, 'Nom et prénom', 'ezrze', 'text', 161, 2583, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1179, 'Matricule', 'rzerze', 'text', 161, 2584, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1180, 'dispose d\'une version physique', 'NON', 'text', 161, NULL, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1181, 'Décision de recrutement', 'Fichier', 'Fichier', 161, NULL, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1182, 'Décision de nomination', 'Fichier', 'Fichier', 161, NULL, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1183, 'Décision de titularisation', 'Fichier', 'Fichier', 161, NULL, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1184, 'Déclaration sur l\'honneur', 'Fichier', 'Fichier', 161, NULL, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1185, 'Décision de délégation de signature', 'Fichier', 'Fichier', 161, NULL, '2023-03-13 14:52:55', '2023-03-13 14:52:55'),
(1186, 'Prise de service', 'Fichier', 'Fichier', 161, NULL, '2023-03-13 14:52:55', '2023-03-13 14:52:55');

-- --------------------------------------------------------

--
-- Structure de la table `attribut_champs`
--

CREATE TABLE `attribut_champs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_champs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_champs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dossier_champs_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `attribut_champs`
--

INSERT INTO `attribut_champs` (`id`, `nom_champs`, `type_champs`, `dossier_champs_id`, `created_at`, `updated_at`) VALUES
(2560, 'DECISION DESIGNATION MEMBRE COMMISSION', 'Fichier', 1958, '2023-02-13 15:26:18', '2023-02-13 15:26:18'),
(2561, 'PUBLICATION JOURNAUX FR (1ER AVIS)', 'Fichier', 1958, '2023-02-13 15:26:18', '2023-02-13 15:26:18'),
(2562, 'PUBLICATION JOURNAUX AR (1ER AVIS)', 'Fichier', 1958, '2023-02-13 15:26:19', '2023-02-13 15:26:19'),
(2563, 'Publication portail', 'Fichier', 1958, '2023-02-13 15:26:19', '2023-02-13 15:26:19'),
(2564, 'CPS', 'Fichier', 1958, '2023-02-13 15:26:19', '2023-02-13 15:26:19'),
(2565, 'REEGLEMENT DE COSULTATION', 'Fichier', 1958, '2023-02-13 15:26:19', '2023-02-13 15:26:19'),
(2566, 'ESTIMATION FINANCIERE', 'Fichier', 1958, '2023-02-13 15:26:19', '2023-02-13 15:26:19'),
(2567, 'DEMANDES D\'ECLAIRCISSEMENT', 'Fichier', 1958, '2023-02-13 15:26:19', '2023-02-13 15:26:19'),
(2568, 'REPONSES DDE ECLAIRCISSEMENT', 'Fichier', 1958, '2023-02-13 15:26:19', '2023-02-13 15:26:19'),
(2569, 'Objet', 'Text', 1958, '2023-02-13 15:26:19', '2023-02-13 15:26:19'),
(2570, 'LISTE DE PRESENCE', 'Fichier', 1959, '2023-02-13 15:30:31', '2023-02-13 15:30:31'),
(2571, 'LETTRE COMPLEMENT DOSSIER', 'Fichier', 1959, '2023-02-13 15:30:31', '2023-02-13 15:30:31'),
(2572, 'PV DE L\'APPEL D\'OFFRE', 'Fichier', 1959, '2023-02-13 15:30:31', '2023-02-13 15:30:31'),
(2573, 'EXTRAIT DE PV DE L\'APPEL D\'OFFRE', 'Fichier', 1959, '2023-02-13 15:30:31', '2023-02-13 15:30:31'),
(2574, 'RECLAMATION', 'Fichier', 1959, '2023-02-13 15:30:31', '2023-02-13 15:30:31'),
(2575, 'REPONSES', 'Fichier', 1959, '2023-02-13 15:30:31', '2023-02-13 15:30:31'),
(2576, 'Objet', 'Text', 1959, '2023-02-13 15:30:31', '2023-02-13 15:30:31'),
(2577, 'Décision de recrutement', 'Fichier', 1961, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(2578, 'Décision de nomination', 'Fichier', 1961, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(2579, 'Décision de titularisation', 'Fichier', 1961, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(2580, 'Déclaration sur l\'honneur', 'Fichier', 1961, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(2581, 'Décision de délégation de signature', 'Fichier', 1961, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(2582, 'Prise de service', 'Fichier', 1961, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(2583, 'Nom et prénom', 'Text', 1961, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(2584, 'Matricule', 'Text', 1961, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(2585, 'Autorisation de DBA', 'Fichier', 1964, '2023-02-13 15:42:41', '2023-02-13 15:42:41'),
(2586, 'Décision de classement', 'Fichier', 1964, '2023-02-13 15:42:41', '2023-02-13 15:42:41'),
(2587, 'Licence DBA', 'Fichier', 1964, '2023-02-13 15:42:41', '2023-02-13 15:42:41'),
(2588, 'Dénomination', 'Text', 1964, '2023-02-13 15:42:41', '2023-02-13 15:42:41'),
(2589, 'Etablissement touristique', 'Text', 1964, '2023-02-13 15:42:41', '2023-02-13 15:42:41'),
(2590, 'Nom & Prénom du gérant', 'Text', 1964, '2023-02-13 15:42:41', '2023-02-13 15:42:41'),
(2591, 'CIN', 'Text', 1964, '2023-02-13 15:42:41', '2023-02-13 15:42:41'),
(2592, 'Autre', 'Fichier', 1958, '2023-02-16 08:51:33', '2023-02-16 08:51:33');

-- --------------------------------------------------------

--
-- Structure de la table `boites`
--

CREATE TABLE `boites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `objet` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_boite` int(11) NOT NULL,
  `premier_date` date NOT NULL,
  `dernier_date` date NOT NULL,
  `code_topographe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarque` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE `dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organigramme_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dossiers`
--

INSERT INTO `dossiers` (`id`, `organigramme_id`, `user_id`, `created_at`, `updated_at`) VALUES
(154, 39, 1, '2023-02-13 15:50:12', '2023-02-13 15:50:12'),
(155, 39, 1, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(156, 39, 1, '2023-02-14 10:22:27', '2023-02-14 10:22:27'),
(157, 39, 1, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(158, 39, 1, '2023-02-20 11:31:25', '2023-02-20 11:31:25'),
(159, 39, 1, '2023-02-20 12:38:29', '2023-02-20 12:38:29'),
(160, 39, 1, '2023-03-13 14:39:21', '2023-03-13 14:39:21'),
(161, 39, 1, '2023-03-13 14:52:55', '2023-03-13 14:52:55');

-- --------------------------------------------------------

--
-- Structure de la table `dossier_champs`
--

CREATE TABLE `dossier_champs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `nom_champs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organigramme_id` bigint(20) UNSIGNED NOT NULL,
  `entite_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dossier_champs`
--

INSERT INTO `dossier_champs` (`id`, `parent_id`, `nom_champs`, `organigramme_id`, `entite_id`, `created_at`, `updated_at`) VALUES
(1957, 0, 'Appel d\'offres', 39, 226, '2023-02-13 15:18:03', '2023-02-13 15:18:03'),
(1958, 1957, 'Dossier de consultation', 39, 226, '2023-02-13 15:26:18', '2023-02-13 15:26:18'),
(1959, 1957, 'ADJIDUCATION', 39, 226, '2023-02-13 15:30:31', '2023-02-13 15:30:31'),
(1960, 0, 'Dossier Ressources Humaines', 39, 225, '2023-02-13 15:32:19', '2023-02-13 15:32:19'),
(1961, 1960, 'Dossier Recrutement', 39, 225, '2023-02-13 15:36:56', '2023-02-13 15:36:56'),
(1963, 0, 'DBA', 41, 227, '2023-02-13 15:39:31', '2023-02-13 15:39:31'),
(1964, 1963, 'DBA', 41, 227, '2023-02-13 15:42:40', '2023-02-13 15:42:40');

-- --------------------------------------------------------

--
-- Structure de la table `entites`
--

CREATE TABLE `entites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organigramme_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entites`
--

INSERT INTO `entites` (`id`, `nom`, `organigramme_id`, `created_at`, `updated_at`) VALUES
(225, 'Ressources Humaines', 39, '2023-02-13 15:15:53', '2023-02-13 15:15:53'),
(226, 'Finances et Marchés', 39, '2023-02-13 15:16:36', '2023-02-13 15:16:36'),
(227, 'DBA', 41, '2023-02-13 15:38:49', '2023-02-13 15:38:49');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `field_inventaires`
--

CREATE TABLE `field_inventaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_champs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_champs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventaire_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `field_inventaires`
--

INSERT INTO `field_inventaires` (`id`, `nom_champs`, `type_champs`, `inventaire_id`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'Date', 1, '2023-01-30 19:39:23', '2023-01-30 19:42:29'),
(2, 'test2', 'Text', 1, '2023-01-30 19:39:23', '2023-01-30 19:39:23'),
(3, 'test3', 'Text', 1, '2023-01-30 19:39:23', '2023-01-30 19:39:23'),
(4, 'Date', 'Date', 1, '2023-02-03 09:02:48', '2023-02-03 09:18:09');

-- --------------------------------------------------------

--
-- Structure de la table `field_table_inventaires`
--

CREATE TABLE `field_table_inventaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventaire_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `field_table_inventaires`
--

INSERT INTO `field_table_inventaires` (`id`, `inventaire_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-30 19:42:50', '2023-01-30 19:42:50'),
(2, 1, '2023-01-31 08:12:46', '2023-01-31 08:12:46'),
(3, 1, '2023-01-31 08:16:22', '2023-01-31 08:16:22');

-- --------------------------------------------------------

--
-- Structure de la table `file_champs`
--

CREATE TABLE `file_champs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `champs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `file_champs`
--

INSERT INTO `file_champs` (`id`, `file`, `name_file`, `date`, `champs_id`, `created_at`, `updated_at`) VALUES
(71, 'App_GEDfolder--details (1).pdf', 'files/G7pTLqrzKWXOooj1RxnrAfQKbQdX6f4zewzI8A5Q.pdf', '2023-02-14', 1118, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(72, 'App_GEDfolder--details (1).pdf', 'files/ZqaLcsPeipiOX2LsRNtcoglVF89KwJXwvT5bzYz4.pdf', '2023-02-14', 1119, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(73, 'App_GEDfolder--details (1).pdf', 'files/KyQVEiqFMMDM0nVGseX5cPCtajDXyyuJF79zlnjG.pdf', '2023-02-14', 1120, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(74, 'App_GEDfolder--details (1).pdf', 'files/c9DWENbo3CSdWPdhZtkgDyRCM2LIx1DIGYjJUH4a.pdf', '2023-02-14', 1121, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(75, 'App_GEDfolder--details (1).pdf', 'files/hyFBv7V4ORyktSnuMUue7UEk6VlyUBZineS4ROds.pdf', '2023-02-14', 1122, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(76, 'App_GEDfolder--details (1).pdf', 'files/PsM9M52nZpLAWZNDeydKIeJpqA3lQ8qhrZ1wTMth.pdf', '2023-02-14', 1123, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(77, 'Comment_ocr.pdf', 'files/IUB2DsrY10QkasUOkTdfBTRIZA5RouOA54qgH0mN.pdf', '2023-02-14', 1130, '2023-02-14 10:28:09', '2023-02-14 10:28:09'),
(78, 'Capture1.PNG', 'files/gzBWkt3brfC7jSt7XJ2EBncM4JeOID9zZhnBTcFQ.png', '2023-02-20', 1142, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(79, 'Capture.PNG', 'files/Hcnllk6DAhNYJmBtlY7otoimaAsUsu8bPe1ztYoi.png', '2023-02-20', 1143, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(80, 'Capture.PNG', 'files/rYeWX9CM2sxnULrz5krbXLcM9hikrGFgmO5xPieH.png', '2023-02-20', 1144, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(81, 'Capture.PNG', 'files/aTvMHtxA9ABlcrZnys1eAKxSQLgR2ruFBqbdq5av.png', '2023-02-20', 1145, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(82, 'Capture.PNG', 'files/SG1tkbknvvoZAC4iuPzSICzsnmEVK4XmRMg9fELp.png', '2023-02-20', 1146, '2023-02-20 11:31:29', '2023-02-20 11:31:29'),
(83, 'DECISION DESIGNATION MEMBRE COMMISSION.pdf', 'files/a8iUzG2SI0tX81tr52PSBFz3te5EEsLiZJgFApPp.pdf', '2023-02-20', 1153, '2023-02-20 12:38:29', '2023-02-20 12:38:29');

-- --------------------------------------------------------

--
-- Structure de la table `file_searches`
--

CREATE TABLE `file_searches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dossier_id` bigint(20) UNSIGNED NOT NULL,
  `attributs_dossiers_id` bigint(20) UNSIGNED NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `file_searches`
--

INSERT INTO `file_searches` (`id`, `filename`, `content`, `dossier_id`, `attributs_dossiers_id`, `projet_id`, `created_at`, `updated_at`) VALUES
(70, 'Décision de recrutement', NULL, 154, 1096, 39, '2023-02-13 15:50:14', '2023-02-13 15:50:14'),
(71, 'Décision de nomination', NULL, 154, 1097, 39, '2023-02-13 15:50:14', '2023-02-13 15:50:14'),
(72, 'Décision de titularisation', NULL, 154, 1098, 39, '2023-02-13 15:50:14', '2023-02-13 15:50:14'),
(73, 'Déclaration sur l\'honneur', NULL, 154, 1099, 39, '2023-02-13 15:50:14', '2023-02-13 15:50:14'),
(74, 'Décision de recrutement', NULL, 155, 1106, 39, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(75, 'Décision de nomination', NULL, 155, 1107, 39, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(76, 'Décision de titularisation', NULL, 155, 1108, 39, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(77, 'Déclaration sur l\'honneur', NULL, 155, 1109, 39, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(78, 'Décision de délégation de signature', NULL, 155, 1110, 39, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(79, 'Prise de service', NULL, 155, 1111, 39, '2023-02-13 15:52:02', '2023-02-13 15:52:02');

-- --------------------------------------------------------

--
-- Structure de la table `historique_dossiers`
--

CREATE TABLE `historique_dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dossier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `historique_dossiers`
--

INSERT INTO `historique_dossiers` (`id`, `user`, `action`, `dossier_id`, `created_at`, `updated_at`) VALUES
(762, 'indexeur_jamal', 'Consultation du dossier', 155, '2023-02-13 15:52:02', '2023-02-13 15:52:02'),
(763, 'indexeur_jamal', 'Consultation du dossier', 155, '2023-02-13 15:52:43', '2023-02-13 15:52:43'),
(764, 'indexeur_jamal', 'Consultation du dossier', 155, '2023-02-13 15:54:33', '2023-02-13 15:54:33'),
(765, 'indexeur_jamal', 'Consultation du dossier', 155, '2023-02-14 07:28:55', '2023-02-14 07:28:55'),
(766, 'indexeur_jamal', 'Consultation du dossier', 156, '2023-02-14 10:22:28', '2023-02-14 10:22:28'),
(767, 'indexeur_jamal', 'Consultation du dossier', 157, '2023-02-14 10:28:10', '2023-02-14 10:28:10'),
(768, 'indexeur_jamal', 'Consultation du dossier', 157, '2023-02-14 10:52:22', '2023-02-14 10:52:22'),
(769, 'indexeur_jamal', 'Consultation du dossier', 157, '2023-02-16 08:28:51', '2023-02-16 08:28:51'),
(770, 'indexeur_jamal', 'Consultation du dossier', 158, '2023-02-20 11:31:30', '2023-02-20 11:31:30'),
(771, 'indexeur_jamal', 'Consultation du dossier', 159, '2023-02-20 12:38:31', '2023-02-20 12:38:31'),
(774, 'indexeur_jamal', 'Consultation du dossier', 160, '2023-03-13 14:39:22', '2023-03-13 14:39:22'),
(775, 'indexeur_jamal', 'Consultation du dossier', 161, '2023-03-13 14:52:56', '2023-03-13 14:52:56');

-- --------------------------------------------------------

--
-- Structure de la table `indexes`
--

CREATE TABLE `indexes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_index` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribut_id` bigint(20) UNSIGNED NOT NULL,
  `file_id` bigint(20) UNSIGNED NOT NULL,
  `dossier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventaires`
--

CREATE TABLE `inventaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inventaires`
--

INSERT INTO `inventaires` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'iv1', '2023-01-30 19:38:11', '2023-01-30 19:38:11');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2019_08_19_000000_create_failed_jobs_table', 1),
(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(38, '2022_07_07_151024_create_organigrammes_table', 1),
(39, '2022_07_13_095054_create_boites_table', 1),
(40, '2022_07_14_111225_change_code_topo_type', 1),
(41, '2022_07_14_152159_create_dossier_champs_table', 1),
(42, '2022_07_20_182348_create_attribut_champs_table', 1),
(43, '2022_08_01_114326_create_permission_tables', 1),
(44, '2022_08_01_153153_create_dossiers_table', 1),
(45, '2022_08_01_154726_create_attributs_dossiers_table', 1),
(46, '2022_08_10_100608_create_projets_table', 1),
(47, '2022_08_10_221819_add_projet_users_table', 1),
(48, '2022_09_06_093915_add_user_to_dossiers_table', 1),
(49, '2022_09_06_093916_fill_tables_app', 2),
(52, '2022_09_11_130647_add_entite_to_dossier_champs_table', 4),
(61, '2022_09_29_172257_create_index_table', 6),
(62, '2022_10_04_133229_create_historique_dossiers_table', 7),
(66, '2022_10_19_133709_create_request_delete_dossiers_table', 8),
(68, '2022_09_16_162004_file_search', 9),
(69, '2022_09_11_130646_create_entite_table', 10),
(70, '2022_11_03_201535_create_projet_modifiers_table', 11),
(71, '2022_11_29_151841_create_prets_table', 12),
(72, '2022_12_19_122150_create_file_champs_table', 13),
(73, '2023_01_03_154222_add_date_to_file_champs_table', 14),
(74, '2023_01_04_104438_delete_contrant_to_users_table', 14),
(75, '2023_01_25_112817_create_inventaire_table', 15),
(76, '2023_01_25_113420_create_field_inventaire_table', 15),
(77, '2023_01_27_102450_create_field_inventaires_table', 15),
(78, '2023_01_27_102737_create_value_fields_table', 15),
(79, '2023_02_01_130044_add_id_inventaire_to_users_table', 16),
(80, '2023_02_20_151602_add_status_to_prets_table', 17),
(81, '2023_02_20_160124_add_objet_to_prets_table', 18),
(82, '2023_02_22_124908_add_id_user_to_prets_table', 19);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, '', 0),
(1, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 12),
(8, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Structure de la table `organigrammes`
--

CREATE TABLE `organigrammes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `organigrammes`
--

INSERT INTO `organigrammes` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(39, 'Division Ressources', '2023-02-13 15:15:31', '2023-02-13 15:15:31'),
(41, 'DBA', '2023-02-13 15:38:37', '2023-02-13 15:38:37'),
(42, 'test', '2023-03-13 14:33:24', '2023-03-13 14:33:24');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Créer un dossier', 'web', '2022-10-25 10:50:15', '2022-10-24 23:00:00'),
(3, 'Modifier le plan de classement', 'web', '0000-00-00 00:00:00', NULL),
(4, 'Gestion des utilisateurs', 'web', NULL, NULL),
(5, 'Modifier les dossiers', 'web', NULL, NULL),
(6, 'Modifier les roles', 'web', '2022-10-01 10:59:55', '2022-09-30 23:00:00'),
(7, 'Visualiser le plan de classement', 'web', '2022-10-01 12:12:46', NULL),
(8, 'Gestion des prets', 'web', NULL, NULL),
(9, 'Valider la suppression', 'web', '2022-10-01 12:12:46', NULL),
(10, 'Rechercher un dossier', 'web', NULL, NULL),
(11, 'Validation des prêts', 'web', NULL, NULL),
(12, 'demande des prêts', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prets`
--

CREATE TABLE `prets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prets`
--

INSERT INTO `prets` (`id`, `division`, `user`, `telephone`, `objet`, `email`, `created_at`, `updated_at`, `status`, `id_user`) VALUES
(1, 'Programmation des escales', 'indexeur_jamal', '0697712113', '', 'aitbenhamouelmahdi@gmail.com', '2022-12-01 13:36:31', '2022-12-01 13:36:31', 1, 0),
(2, 'Travaux neufs et maintenance', 'indexeur_jamal', '5506', '', 'N_ETTALOUI@anp.org.ma', '2022-12-02 13:39:52', '2022-12-02 13:39:52', 1, 0),
(3, 'Division Sureté, Sécurité et Environnement', 'indexeur_jamal', '0670944163', '', 'jaafar.kett@gmail.com', '2022-12-13 09:57:01', '2022-12-13 09:57:01', 1, 0),
(4, 'Programmation des escales', 'indexeur_jamal', '0369971211', '', 'webex-jorf@anp.org.ma', '2022-12-15 09:26:20', '2022-12-15 09:26:20', 1, 0),
(5, 'Travaux neufs et maintenance', 'indexeur_jamal', '0670944163', '', 'mehdi@gmail.com', '2023-02-03 09:08:50', '2023-02-03 09:08:50', 1, 0),
(7, 'DBA', 'indexeur_jamal', '06977121113', '', 'test@gmail.com', '2023-02-20 14:25:58', '2023-02-20 14:25:58', 1, 0),
(8, 'DBA', 'indexeur_jamal', '697712113', 'test', 'mehdi@gmail.com', '2023-02-21 08:35:09', '2023-02-22 14:09:30', 2, 0),
(9, 'Division Ressources', 'indexeur_jamal', '697712113', 'test 1', 'mehdi@gmail.com', '2023-02-23 14:01:53', '2023-02-24 14:18:00', 1, 1),
(10, 'Division Ressources', 'indexeur_jamal', '697712113', 'test 1', 'mehdi@gmail.com', '2023-02-23 14:02:04', '2023-02-24 14:18:04', 2, 1),
(11, 'Division Ressources', 'test_cri', '788667733', 'boite archives', 'testcrio@gmail.com', '2023-02-23 14:10:52', '2023-02-24 13:40:21', 3, 11),
(12, 'Division Ressources', 'test_cri', '788667733', 'dossier n°11', 'testcrio@gmail.com', '2023-02-24 13:49:50', '2023-02-24 14:18:10', 1, 11),
(13, 'Division Ressources', 'test_cri', '788667733', 'marché n°112', 'testcrio@gmail.com', '2023-02-24 14:16:29', '2023-02-24 14:18:14', 2, 11),
(14, 'Division Ressources', 'test_cri', '788667733', 'AO 20/2019', 'testcrio@gmail.com', '2023-02-24 14:36:01', '2023-02-24 14:36:27', 1, 11),
(15, 'Division Ressources', 'test_cri', '788667733', 'dossier N°223', 'testcrio@gmail.com', '2023-02-27 12:53:43', '2023-02-27 12:56:39', 2, 11),
(16, 'Division Ressources', 'indexeur_jamal', '697712113', 'objet', 'mehdi@gmail.com', '2023-02-27 13:31:11', '2023-02-27 13:31:11', 0, 1),
(17, 'Division Ressources', 'test_cri', '788667733', 'Dossier n°445', 'testcrio@gmail.com', '2023-02-28 09:57:12', '2023-02-28 09:57:12', 0, 11),
(18, 'Division Ressources', 'test_cri', '788667733', 'dossier n 56', 'testcrio@gmail.com', '2023-03-13 10:38:55', '2023-03-13 10:39:57', 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organigrammes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dossiers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dossiers`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `organigrammes_id`, `user_id`, `dossiers`, `created_at`, `updated_at`) VALUES
(273, 39, 1, '[\"1957\",\"1960\"]', '2023-03-13 14:34:34', '2023-03-13 14:34:34'),
(274, 41, 1, '[\"1963\"]', '2023-03-13 14:34:34', '2023-03-13 14:34:34'),
(275, 42, 1, 'null', '2023-03-13 14:34:34', '2023-03-13 14:34:34'),
(276, 39, 11, '[\"1957\"]', '2023-03-13 14:35:10', '2023-03-13 14:35:10'),
(277, 41, 11, 'null', '2023-03-13 14:35:10', '2023-03-13 14:35:10'),
(278, 42, 11, 'null', '2023-03-13 14:35:10', '2023-03-13 14:35:10');

-- --------------------------------------------------------

--
-- Structure de la table `projet_modifiers`
--

CREATE TABLE `projet_modifiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organigrammes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dossiers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dossiers`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `request_delete_dossiers`
--

CREATE TABLE `request_delete_dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dossier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-09-06 09:09:21', '2022-09-06 09:09:21'),
(5, 'archiviste', 'web', '2022-12-15 08:59:51', '2022-12-15 08:59:51'),
(6, 'Utilisateur', 'web', '2022-12-28 13:03:06', '2022-12-28 13:03:06'),
(7, 'recherche', 'web', '2023-01-10 08:45:15', '2023-01-10 08:45:15'),
(8, 'Utilisateur CRIO', 'web', '2023-02-16 08:27:10', '2023-02-16 08:27:10'),
(9, 'role test', 'web', '2023-02-23 14:57:43', '2023-02-23 14:57:43');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(2, 5),
(2, 6),
(2, 8),
(3, 1),
(3, 7),
(4, 1),
(4, 7),
(5, 1),
(5, 5),
(6, 1),
(7, 1),
(7, 8),
(8, 1),
(8, 9),
(9, 1),
(9, 5),
(9, 7),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(11, 6),
(12, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `projet_select_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `identifiant`, `nom`, `prenom`, `telephone`, `projet_select_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'indexeur_jamal', 'jamal', 'kamal', 697712113, 39, 'mehdi@gmail.com', NULL, '$2y$10$XSY7HLhRstStGxp79WiWDu9UI28fHkXFG2yF4pKjp1zGiumx97lSO', 'D6QWLjpPIgEOhb2oVeQxAeWz6Z6j44Mswg9t56kTs5mYwIppIi3sCKDbvmcd', '2022-09-06 09:09:21', '2023-03-13 14:39:10'),
(11, 'test_cri', 'Test', 'Hicham', 788667733, 0, 'testcrio@gmail.com', NULL, '$2y$10$droOW..tz3jbnX5JkYnupOSdGV6xAMIXISAxRWrTwaim4EuCzlOzK', '59M1I915DqMNGcW2o8W6eyoIl7a0Hjcuv2HNApuEZGs3f0ZD9Eb5dFPSHjaf', '2023-02-16 08:28:35', '2023-03-13 14:35:10'),
(12, 'rachid_test', 'Test', 'Rachid', 788330044, NULL, 'rachid@gmail.com', NULL, '$2y$10$S7QMhgNoSCX66LnOGFQopezk19aHp2jd3Y0wdTS49EifhZ52kATaq', 'nsQfcym63w038RtdqN6BT85prP0FSfrnlPa9twld7k1nw59ZIDMLI1dKs2My', '2023-02-24 14:15:07', '2023-02-24 14:15:07');

-- --------------------------------------------------------

--
-- Structure de la table `value_fields`
--

CREATE TABLE `value_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_field_inventaire` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `value_fields`
--

INSERT INTO `value_fields` (`id`, `value`, `id_field_inventaire`, `created_at`, `updated_at`) VALUES
(1, '2023-01-30', 1, '2023-01-30 19:42:50', '2023-01-30 19:42:50'),
(2, '1', 1, '2023-01-30 19:42:50', '2023-01-30 19:42:50'),
(3, '1', 1, '2023-01-30 19:42:50', '2023-01-30 19:42:50'),
(4, '2023-01-31', 2, '2023-01-31 08:12:46', '2023-01-31 08:12:46'),
(5, '1', 2, '2023-01-31 08:12:47', '2023-01-31 08:12:47'),
(6, '1', 2, '2023-01-31 08:12:47', '2023-01-31 08:12:47'),
(7, '2023-01-31', 3, '2023-01-31 08:16:23', '2023-01-31 08:16:23'),
(8, '2', 3, '2023-01-31 08:16:23', '2023-01-31 08:16:23'),
(9, '3', 3, '2023-01-31 08:16:23', '2023-01-31 08:16:23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attributs_dossiers`
--
ALTER TABLE `attributs_dossiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributs_dossiers_dossier_id_foreign` (`dossier_id`);

--
-- Index pour la table `attribut_champs`
--
ALTER TABLE `attribut_champs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribut_champs_dossier_champs_id_foreign` (`dossier_champs_id`);

--
-- Index pour la table `boites`
--
ALTER TABLE `boites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dossiers_organigramme_id_foreign` (`organigramme_id`),
  ADD KEY `dossiers_user_id_foreign` (`user_id`);

--
-- Index pour la table `dossier_champs`
--
ALTER TABLE `dossier_champs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dossier_champs_organigramme_id_foreign` (`organigramme_id`);

--
-- Index pour la table `entites`
--
ALTER TABLE `entites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entites_organigramme_id_foreign` (`organigramme_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `field_inventaires`
--
ALTER TABLE `field_inventaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_inventaires_inventaire_id_foreign` (`inventaire_id`);

--
-- Index pour la table `field_table_inventaires`
--
ALTER TABLE `field_table_inventaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `file_champs`
--
ALTER TABLE `file_champs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_champs_champs_id_foreign` (`champs_id`);

--
-- Index pour la table `file_searches`
--
ALTER TABLE `file_searches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_searches_dossier_id_foreign` (`dossier_id`),
  ADD KEY `file_searches_attributs_dossiers_id_foreign` (`attributs_dossiers_id`);

--
-- Index pour la table `historique_dossiers`
--
ALTER TABLE `historique_dossiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historique_dossiers_dossier_id_foreign` (`dossier_id`);

--
-- Index pour la table `indexes`
--
ALTER TABLE `indexes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indexes_attribut_id_foreign` (`attribut_id`),
  ADD KEY `indexes_file_id_foreign` (`file_id`),
  ADD KEY `indexes_dossier_id_foreign` (`dossier_id`);

--
-- Index pour la table `inventaires`
--
ALTER TABLE `inventaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `organigrammes`
--
ALTER TABLE `organigrammes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `prets`
--
ALTER TABLE `prets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projets_organigrammes_id_foreign` (`organigrammes_id`),
  ADD KEY `projets_user_id_foreign` (`user_id`);

--
-- Index pour la table `projet_modifiers`
--
ALTER TABLE `projet_modifiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projet_modifiers_organigrammes_id_foreign` (`organigrammes_id`),
  ADD KEY `projet_modifiers_user_id_foreign` (`user_id`);

--
-- Index pour la table `request_delete_dossiers`
--
ALTER TABLE `request_delete_dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `value_fields`
--
ALTER TABLE `value_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `value_fields_id_field_inventaire_foreign` (`id_field_inventaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attributs_dossiers`
--
ALTER TABLE `attributs_dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1187;

--
-- AUTO_INCREMENT pour la table `attribut_champs`
--
ALTER TABLE `attribut_champs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2593;

--
-- AUTO_INCREMENT pour la table `boites`
--
ALTER TABLE `boites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT pour la table `dossier_champs`
--
ALTER TABLE `dossier_champs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1965;

--
-- AUTO_INCREMENT pour la table `entites`
--
ALTER TABLE `entites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `field_inventaires`
--
ALTER TABLE `field_inventaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `field_table_inventaires`
--
ALTER TABLE `field_table_inventaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `file_champs`
--
ALTER TABLE `file_champs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `file_searches`
--
ALTER TABLE `file_searches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `historique_dossiers`
--
ALTER TABLE `historique_dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=776;

--
-- AUTO_INCREMENT pour la table `indexes`
--
ALTER TABLE `indexes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `inventaires`
--
ALTER TABLE `inventaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `organigrammes`
--
ALTER TABLE `organigrammes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prets`
--
ALTER TABLE `prets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT pour la table `projet_modifiers`
--
ALTER TABLE `projet_modifiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `request_delete_dossiers`
--
ALTER TABLE `request_delete_dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `value_fields`
--
ALTER TABLE `value_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attributs_dossiers`
--
ALTER TABLE `attributs_dossiers`
  ADD CONSTRAINT `attributs_dossiers_dossier_id_foreign` FOREIGN KEY (`dossier_id`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `attribut_champs`
--
ALTER TABLE `attribut_champs`
  ADD CONSTRAINT `attribut_champs_dossier_champs_id_foreign` FOREIGN KEY (`dossier_champs_id`) REFERENCES `dossier_champs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD CONSTRAINT `dossiers_organigramme_id_foreign` FOREIGN KEY (`organigramme_id`) REFERENCES `organigrammes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dossiers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `dossier_champs`
--
ALTER TABLE `dossier_champs`
  ADD CONSTRAINT `dossier_champs_organigramme_id_foreign` FOREIGN KEY (`organigramme_id`) REFERENCES `organigrammes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `entites`
--
ALTER TABLE `entites`
  ADD CONSTRAINT `entites_organigramme_id_foreign` FOREIGN KEY (`organigramme_id`) REFERENCES `organigrammes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `field_inventaires`
--
ALTER TABLE `field_inventaires`
  ADD CONSTRAINT `field_inventaires_inventaire_id_foreign` FOREIGN KEY (`inventaire_id`) REFERENCES `inventaires` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `file_champs`
--
ALTER TABLE `file_champs`
  ADD CONSTRAINT `file_champs_champs_id_foreign` FOREIGN KEY (`champs_id`) REFERENCES `attributs_dossiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `file_searches`
--
ALTER TABLE `file_searches`
  ADD CONSTRAINT `file_searches_attributs_dossiers_id_foreign` FOREIGN KEY (`attributs_dossiers_id`) REFERENCES `attributs_dossiers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `file_searches_dossier_id_foreign` FOREIGN KEY (`dossier_id`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `historique_dossiers`
--
ALTER TABLE `historique_dossiers`
  ADD CONSTRAINT `historique_dossiers_dossier_id_foreign` FOREIGN KEY (`dossier_id`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `indexes`
--
ALTER TABLE `indexes`
  ADD CONSTRAINT `indexes_attribut_id_foreign` FOREIGN KEY (`attribut_id`) REFERENCES `attribut_champs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indexes_dossier_id_foreign` FOREIGN KEY (`dossier_id`) REFERENCES `dossier_champs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indexes_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `attribut_champs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_organigrammes_id_foreign` FOREIGN KEY (`organigrammes_id`) REFERENCES `organigrammes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `projet_modifiers`
--
ALTER TABLE `projet_modifiers`
  ADD CONSTRAINT `projet_modifiers_organigrammes_id_foreign` FOREIGN KEY (`organigrammes_id`) REFERENCES `organigrammes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projet_modifiers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `value_fields`
--
ALTER TABLE `value_fields`
  ADD CONSTRAINT `value_fields_id_field_inventaire_foreign` FOREIGN KEY (`id_field_inventaire`) REFERENCES `field_table_inventaires` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
