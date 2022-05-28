-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220303.d08bbccd72
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 28 mai 2022 à 12:35
-- Version du serveur : 8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `univertuel`
--

-- --------------------------------------------------------



--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `code`, `name`, `image`, `description`) VALUES
(1, 'prophecy', 'Prophecy 2ème edition', NULL, 'description du jeu de prophecy'),
(2, 'cyberpunk', 'Cyberpunk 4ème édition', 'baboon-6291fac0ac8e2.jpeg', 'description de ce magnifique jeu futuriste');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_caracteristic`
--

INSERT INTO `prophecy_caracteristic` (`id`, `campaign_id`, `name`, `code`, `min_value`, `maximum_value`, `xp_increase`, `description`) VALUES
(1, NULL, 'force', 'for', 1, 10, 5, 'description de la force'),
(2, NULL, 'resistance', 'res', 1, 10, 5, 'description de la resistance'),
(3, NULL, 'intelligence', 'int', 1, 10, 5, 'descrfiption de l\'intelligence'),
(4, NULL, 'volonte', 'vol', 1, 10, 5, 'description de la volonte'),
(5, NULL, 'coordination', 'coo', 1, 10, 5, 'description de la coordination'),
(6, NULL, 'perception', 'per', 1, 10, 5, 'description de la perception'),
(7, NULL, 'presence', 'pre', 1, 10, 5, 'description de la presence'),
(8, NULL, 'empathie', 'emp', 1, 10, 5, 'description de l\'empathie');

-- --------------------------------------------------------



--
-- Déchargement des données de la table `prophecy_caste`
--

INSERT INTO `prophecy_caste` (`id`, `campaign_id`, `name`, `description`) VALUES
(1, NULL, 'artisans', 'description de la caste des artisans'),
(2, NULL, 'combattants', 'description de la caste des combattants'),
(3, NULL, 'commercants', 'description de la caste des commercants'),
(4, NULL, 'erudits', 'description de la caste des erudits'),
(5, NULL, 'mages', 'description de la caste des mages'),
(6, NULL, 'prodiges', 'description de la caste des prodiges'),
(7, NULL, 'protecteurs', 'description de la caste des protecteurs'),
(8, NULL, 'voyageurs', 'description de la caste des voyageurs');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_currency`
--

INSERT INTO `prophecy_currency` (`id`, `campaign_id`, `name`, `factor_value`, `available`, `display`, `code`, `description`) VALUES
(1, NULL, 'dracs de fer', 1, 1, 1, 'fer', 'description de la monnaie fer'),
(2, NULL, 'dracs de bronze', 10, 0, 0, 'bronze', 'description des dracs de bronze'),
(3, NULL, 'dracs d\'argent', 100, 1, 1, 'argent', 'description des dracs d\'argent'),
(4, NULL, 'dracs d\'or', 1000, 0, 1, 'or', 'description des dracs d\'or'),
(5, NULL, 'le dragon', 10000, 0, 0, 'dragon', 'description du dragon');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_discipline`
--

INSERT INTO `prophecy_discipline` (`id`, `campaign_id`, `name`, `min_value`, `maximum_value`, `description`) VALUES
(1, NULL, 'magie instinctive', 0, 10, 'description de la magie instinctive'),
(2, NULL, 'magie invocatoire', 0, 10, 'description de la magie invocatoire'),
(3, NULL, 'sorcellerie', 0, 10, 'description de la sorcellerie');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_major_attribute`
--

INSERT INTO `prophecy_major_attribute` (`id`, `campaign_id`, `name`, `min_value`, `maximum_value`, `description`) VALUES
(1, NULL, 'physique', 1, 10, 'description du physique'),
(2, NULL, 'mental', 1, 10, 'description du mental'),
(3, NULL, 'manuel', 1, 10, 'description du manuel'),
(4, NULL, 'social', 1, 10, 'description du social');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_minor_attribute`
--

INSERT INTO `prophecy_minor_attribute` (`id`, `campaign_id`, `name`, `min_value`, `maximum_value`, `description`, `xp_increase`) VALUES
(1, NULL, 'initiative', 1, 5, 'description de l\'initiative', 0),
(2, NULL, 'chance', 0, 10, 'description de la chance', 10),
(3, NULL, 'maitrise', 0, 10, 'description de la maitrise', 10),
(4, NULL, 'renommee', 0, 10, 'description de la renommee', 1);

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_nation`
--

INSERT INTO `prophecy_nation` (`id`, `campaign_id`, `name`, `available`, `display`, `description`) VALUES
(1, NULL, 'archipel de Pyr', 0, 0, 'description de l archipel de Pyr'),
(2, NULL, 'cite de Griff', 1, 1, 'description de la cite de Griff'),
(3, NULL, 'empire de Solyr', 1, 1, 'description de l empire de Solyr'),
(4, NULL, 'empire de Nesora', 1, 1, 'description de l\'empire de Nesora'),
(5, NULL, 'empire Zûl', 0, 0, 'description de l\'empire Zul'),
(6, NULL, 'foret de Solor', 0, 0, 'description de la foret de Solor'),
(7, NULL, 'foret Mere', 1, 1, 'description de la foret Mere'),
(8, NULL, 'Jaspor', 1, 1, 'description de la foret de Jaspor'),
(9, NULL, 'Kali', 0, 0, 'description de Kali'),
(10, NULL, 'Kar', 1, 1, 'description de Kar'),
(11, NULL, 'kern', 1, 1, 'description de Kern'),
(12, NULL, 'les lacs sanglants', 0, 0, 'description des lacs sanglants'),
(13, NULL, 'marches Alyzees', 1, 1, 'description des marches Alyzees'),
(14, NULL, 'la Pomyrie', 1, 1, 'description de la Pomyrie'),
(15, NULL, 'principauté de Marne', 1, 1, 'description de la principaute de Marne'),
(16, NULL, 'Ysmir ', 1, 1, 'description'),
(17, NULL, 'royaule des fleurs', 1, 1, 'description du royaume des fleurs'),
(21, NULL, 'Terres Galyrs', 1, 1, 'description des terres Galyrs');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_omen`
--

INSERT INTO `prophecy_omen` (`id`, `campaign_id`, `name`, `personnality`, `motivation`, `quality`, `fault`) VALUES
(1, NULL, 'le fataliste', 'froid et meprisant', 'modifier', 'prudent', 'implacable'),
(2, NULL, 'le volcan', 'fougueux et passionne', 'reussir', 'franc', 'colerique'),
(3, NULL, 'le metal', 'meticuleurx et taciturne', 'creer', 'precis', 'arrogant'),
(4, NULL, 'la cite', 'curieux et sociable', 'rencontrer', 'sociable', 'manipulateur'),
(5, NULL, 'le vent', 'impulsif et spontane', 'decouvrir', 'motive', 'inconstant'),
(6, NULL, 'l\'ocean', 'calme et pacifique', 'apprendre', 'sage', 'moralisateur'),
(7, NULL, 'la chimere', 'mysterieux et observateur', 'comprendre', 'sensible', 'enigmatique'),
(8, NULL, 'la nature', 'bienveillant et chaleureux', 'fonder', 'convivial', 'mystique'),
(9, NULL, 'la pierre', 'laconique et solitaire', 'survivre', 'engage', 'borne'),
(10, NULL, 'l\'homme', 'inventif et visionnaire', 'inventer', 'imaginatif', 'materialiste');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_skill_category`
--

INSERT INTO `prophecy_skill_category` (`id`, `major_attribute_id`, `campaign_id`, `name`) VALUES
(1, 1, NULL, 'combat'),
(2, 1, NULL, 'mouvement'),
(3, 2, NULL, 'theorie'),
(4, 2, NULL, 'pratique'),
(5, 3, NULL, 'technique'),
(6, 3, NULL, 'manipulation'),
(7, 4, NULL, 'communication'),
(8, 4, NULL, 'influence');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_sphere`
--

INSERT INTO `prophecy_sphere` (`id`, `campaign_id`, `name`, `maximum_value`, `min_value`, `xp_increase`, `description`) VALUES
(1, NULL, 'la pierre', 10, 0, 1, 'description de la pierre'),
(2, NULL, 'le feu', 10, 0, 1, 'description du feu'),
(3, NULL, 'les oceans', 10, 0, 1, 'description des oceans'),
(4, NULL, 'le metal', 10, 0, 1, 'description de la sphere du metal'),
(5, NULL, 'la nature', 10, 0, 1, 'description de la sphere de la nature'),
(6, NULL, 'les reves', 10, 0, 1, 'description de la sphere des reves'),
(7, NULL, 'la cite', 10, 0, 1, 'description de la sphere de la cite'),
(8, NULL, 'les vents', 10, 0, 1, 'description de la sphere des vents'),
(9, NULL, 'l\'ombre', 10, 0, 1, 'description de  l\'ombre');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `prophecy_status`
--

INSERT INTO `prophecy_status` (`id`, `caste_id`, `campaign_id`, `name`, `level`, `description`) VALUES
(1, 1, NULL, 'apprenti', 1, 'description de l\'apprenti artisan'),
(2, 1, NULL, 'compagnon', 2, 'description du compagnon artisan'),
(3, 1, NULL, 'artisan', 3, 'description de l\'artisan'),
(4, 1, NULL, 'maitre artisan', 4, 'description du maitre artisan'),
(5, 1, NULL, 'maitre artisan d\'art', 5, 'description du maitre artisan d\'un art'),
(6, 2, NULL, 'apprenti', 1, 'description de l\'apprenti combattant'),
(7, 2, NULL, 'spadassin', 2, 'description du spadassin'),
(8, 2, NULL, 'combattant', 3, 'description du combattant'),
(9, 2, NULL, 'maitre d\'armes', 4, 'description du maitre d\'armes'),
(10, 2, NULL, 'grand maitre d\'armes', 5, 'description du grand maitre d\'armes'),
(11, 3, NULL, 'marchand', 1, 'description du marchand'),
(12, 3, NULL, 'commercant', 2, 'description du commercant'),
(13, 3, NULL, 'negociant', 3, 'description du negociant'),
(14, 3, NULL, 'dignitaire', 4, 'description du dignitaire'),
(15, 3, NULL, 'prince marchand', 5, 'description du prince marchand'),
(16, 4, NULL, 'apprenti', 1, 'description de l\'apprenti erudit'),
(17, 4, NULL, 'initie', 2, 'description de l\'initie erudit'),
(18, 4, NULL, 'erudit', 3, 'description de l\'erudit'),
(19, 4, NULL, 'sage', 4, 'description du sage'),
(20, 4, NULL, 'prophete', 5, 'description du prophete'),
(21, 5, NULL, 'apprenti', 1, 'description de l\'apprenti mage'),
(22, 5, NULL, 'initie', 2, 'description de l\'initie mage'),
(23, 5, NULL, 'mage', 3, 'description du mage'),
(24, 5, NULL, 'grand mage', 4, 'description du grand mage'),
(25, 5, NULL, 'grand maitre de magie', 5, 'description du grand maitre de magie'),
(26, 6, NULL, 'prodige', 1, 'description du prodige'),
(27, 1, NULL, 'prodige', 2, 'description du prodige'),
(28, 6, NULL, 'prodige', 3, 'description du prodige'),
(29, 6, NULL, 'prodige', 4, 'description du prodige'),
(30, 6, NULL, 'prodige', 5, 'description du prodige'),
(31, 7, NULL, 'soldat', 1, 'description du soldat'),
(32, 7, NULL, 'lieutenant', 2, 'description du lieutenant'),
(33, 7, NULL, 'capitaine', 3, 'description du capitaine'),
(34, 7, NULL, 'commandeur', 4, 'description du commandeur'),
(35, 7, NULL, 'commandeur-dragon', 5, 'description du commandeur dragon'),
(36, 8, NULL, 'marcheur', 1, 'description du marcheur'),
(37, 8, NULL, 'pisteur', 2, 'description du pisteur'),
(38, 8, NULL, 'voyageur', 3, 'description du voyageur'),
(39, 8, NULL, 'solitaire', 4, 'description du solitaire'),
(40, 8, NULL, 'orphelin', 5, 'description de l\'orphelin');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_active`, `username`, `avatar`, `description`) VALUES
(1, 'phoenix@gmail.com', '[\"ROLE_SADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$ZGlQZSMOrGKEnfHJTsQ3pQ$E+jVstkowmEmDgfltBJ86K5L772ytcHLwK6h9RiEW60', 1, 'phoenix', 'avatar-629115f8ebe9d.jpeg', 'je suis passionné de jdr'),
(2, 'jeannicotra@gmail.com', '[\"ROLE_MEMBER\"]', '$argon2id$v=19$m=65536,t=4,p=1$1xsN2dZB+W9CwuN1JElaog$BECnZdtDK5FlqgEoi2kupZf/+9uWbovebGdXmGFmvVQ', 1, 'jean', 'avatar-6291166c6cf09.jpeg', 'je suis sans famille et je m\'appelle jean'),
(3, 'clement@gmail.com', '[\"ROLE_MEMBER\"]', '$argon2id$v=19$m=65536,t=4,p=1$zdUbY4SFGzNGcLwe0k89IA$lTVpDJkHAMBj5rZrJY0an6K05LpO+IJuwnoo3kYWwYU', 1, 'clement', 'avatar-629116a25d0e4.jpeg', 'je m\'appelle clement et j\'ai 13 ans'),
(4, 'eric@gmail.com', '[\"ROLE_MEMBER\"]', '$argon2id$v=19$m=65536,t=4,p=1$HCMuls9gPOPCYtvIWY6SLg$qwAn0gUpOQ+Yrq+JpfGzQcI1O+8MsscRqL8eYi9L2XA', 1, 'eric', 'avatar-629116da737ba.jpeg', 'je suis eric, j\'ai dix ans, et quand je serais grand, je voudrais dormir toute la journée'),
(5, 'clementine@gmail.com', '[\"ROLE_MEMBER\"]', '$argon2id$v=19$m=65536,t=4,p=1$tBgnZ31UK3Qw4xz0mudwOg$6bft2nopvUf3XgPaza0x4bf+/E2Mvytz5tLs/MMBj4o', 1, 'clementine', 'avatar-62911722b8216.jpeg', 'salut, je suis une fille, et je joue aux jdr, na!'),
(6, 'writer@gmail.com', '[\"ROLE_WRITER\"]', '$argon2id$v=19$m=65536,t=4,p=1$5SQO6RU0jgdrKYZ1szKh3g$J+SPmlnV4CqcVbum3qWZ79CeRK7iEHBDcPQ81ZOCrY0', 1, 'writer', 'avatar-62911764c78e5.jpeg', 'je suis writer, et j\'ai un role de writer sur ce site'),
(7, 'member@gmail.com', '[\"ROLE_MEMBER\"]', '$argon2id$v=19$m=65536,t=4,p=1$nS2nQausRVKkLlER74Rx2w$V/3xLkvhPOqd2T4Smgy1c0tGNkVrBRaIeGmo64ZEbks', 1, 'member', 'avatar-62911790532fb.jpeg', 'je suis un simple membre, avec des droits de membre'),
(8, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$dNWGlT99YVxkkkGgEIroTA$eV2e921UtQAfWeWLN7ob9TgdjrOYJf227yXedrpcZSs', 1, 'admin', NULL, 'je suis un admin, avec les super droits de admin je tue presque tout'),
(9, 'sadmin@gmail.com', '[\"ROLE_SADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$HSPYH7sS+2tCLobe0QWu1Q$JGqcaNkdRTWtPfq/jrfneQX4/jPyCcCNDkj4T8goIvU', 1, 'sadmin', NULL, 'je suis un sadmin, j\'ai tous les pouvoirs, fatals!!!!!');

-- --------------------------------------------------------




