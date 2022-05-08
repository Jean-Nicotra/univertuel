-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage des données de la table univertuel.campaign : ~0 rows (environ)
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;

-- Listage des données de la table univertuel.doctrine_migration_versions : ~0 rows (environ)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20220507144527', '2022-05-07 14:45:48', 18779),
	('DoctrineMigrations\\Version20220508150805', '2022-05-08 15:08:12', 899),
	('DoctrineMigrations\\Version20220508151610', '2022-05-08 15:16:20', 227);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage des données de la table univertuel.figure : ~0 rows (environ)
/*!40000 ALTER TABLE `figure` DISABLE KEYS */;
/*!40000 ALTER TABLE `figure` ENABLE KEYS */;

-- Listage des données de la table univertuel.game : ~0 rows (environ)
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` (`id`, `code`, `name`, `description`) VALUES
	(1, 'Prophecy', 'prophecy 1ère et 2ème édition', 'lll');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;

-- Listage des données de la table univertuel.message : ~0 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_advantage : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_advantage` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_advantage` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_advantage_category : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_advantage_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_advantage_category` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_age : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_age` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_age` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_armor : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_armor` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_armor` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_armor_category : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_armor_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_armor_category` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_benefit : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_benefit` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_benefit` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_caracteristic : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_caracteristic` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_caracteristic` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_carrier : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_carrier` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_carrier` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_caste : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_caste` DISABLE KEYS */;
INSERT INTO `prophecy_caste` (`id`, `campaign_id`, `name`, `description`) VALUES
	(1, NULL, 'artisans', 'description de la caste des artisans'),
	(2, NULL, 'commercants', 'description'),
	(3, NULL, 'combattants', 'description'),
	(4, NULL, 'erudits', 'description'),
	(5, NULL, 'mages', 'description'),
	(6, NULL, 'prodiges', 'description'),
	(7, NULL, 'protecteurs', 'description'),
	(9, NULL, 'voyageurs', 'description');
/*!40000 ALTER TABLE `prophecy_caste` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_currency : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_currency` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_currency` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_disadvantage : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_disadvantage` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_disadvantage` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_discipline : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_discipline` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_discipline` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_favour : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_favour` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_favour` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_advantages : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_advantages` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_advantages` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_armors : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_armors` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_armors` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_benefits : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_benefits` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_benefits` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_disadvantages : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_disadvantages` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_disadvantages` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_favours : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_favours` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_favours` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_prohibiteds : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_prohibiteds` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_prohibiteds` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_shields : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_shields` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_shields` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_spells : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_spells` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_spells` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_technics : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_technics` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_technics` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figures_weapons : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figures_weapons` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figures_weapons` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_caracteristic : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_caracteristic` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_caracteristic` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_currency : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_currency` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_currency` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_discipline : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_discipline` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_discipline` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_major_attribute : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_major_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_major_attribute` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_minor_attribute : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_minor_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_minor_attribute` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_skill : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_skill` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_spell : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_spell` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_spell` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_sphere : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_sphere` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_sphere` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_tendency : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_tendency` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_tendency` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_figure_wound : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_figure_wound` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_figure_wound` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_major_attribute : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_major_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_major_attribute` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_minor_attribute : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_minor_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_minor_attribute` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_nation : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_nation` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_nation` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_omen : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_omen` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_omen` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_prohibited : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_prohibited` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_prohibited` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_shield : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_shield` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_shield` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_skill : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_skill` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_skill_category : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_skill_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_skill_category` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_spell : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_spell` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_spell` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_sphere : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_sphere` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_sphere` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_start_caracteristic : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_start_caracteristic` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_start_caracteristic` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_start_major_attribute : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_start_major_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_start_major_attribute` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_start_skill : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_start_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_start_skill` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_status : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_status` DISABLE KEYS */;
INSERT INTO `prophecy_status` (`id`, `caste_id`, `campaign_id`, `name`, `level`, `description`) VALUES
	(1, 1, NULL, 'apprenti', 1, 'description'),
	(2, 1, NULL, 'compagnon', 2, 'description'),
	(3, 1, NULL, 'artisan', 3, 'description'),
	(4, 1, NULL, 'maitre artisan', 4, 'description'),
	(5, 1, NULL, 'maitre d art', 5, 'description'),
	(6, 3, NULL, 'apprenti', 1, 'description'),
	(7, 3, NULL, 'spadassin', 2, 'description'),
	(8, 3, NULL, 'combattant', 3, 'description'),
	(9, 3, NULL, 'maitre d armes', 4, 'description'),
	(10, 3, NULL, 'grand maitre d armes', 5, 'description'),
	(11, 2, NULL, 'marchand', 1, 'description'),
	(12, 2, NULL, 'commercant', 2, 'description'),
	(13, 2, NULL, 'negociant', 3, 'description'),
	(14, 2, NULL, 'dignitaire', 4, 'description'),
	(15, 2, NULL, 'prince marchand', 5, 'description'),
	(16, 4, NULL, 'apprenti', 1, 'description'),
	(17, 4, NULL, 'initie', 2, 'description'),
	(18, 4, NULL, 'erudit', 3, 'description'),
	(19, 4, NULL, 'sage', 4, 'description'),
	(20, 4, NULL, 'prophete', 5, 'description'),
	(21, 5, NULL, 'apprenti', 1, 'description'),
	(22, 5, NULL, 'initie', 2, 'description'),
	(23, 5, NULL, 'mage', 3, 'description'),
	(24, 5, NULL, 'grand mage', 4, 'description'),
	(25, 5, NULL, 'grand maitre', 5, 'description'),
	(26, 6, NULL, 'prodige', 1, 'description'),
	(27, 6, NULL, 'prodige', 2, 'description'),
	(28, 6, NULL, 'prodige', 3, 'description'),
	(29, 6, NULL, 'prodige', 4, 'description'),
	(30, 6, NULL, 'prodige', 5, 'description'),
	(31, 7, NULL, 'soldat', 1, 'description'),
	(32, 7, NULL, 'lieutenant', 2, 'description'),
	(33, 7, NULL, 'capitaine', 3, 'description'),
	(34, 7, NULL, 'commandeur', 4, 'description'),
	(35, 7, NULL, 'commandeur-dragon', 5, 'description'),
	(36, 9, NULL, 'marcheur', 1, 'description'),
	(37, 9, NULL, 'pisteur', 2, 'description'),
	(38, 9, NULL, 'voyageur', 3, 'description'),
	(39, 9, NULL, 'solitaire', 4, 'description'),
	(40, 9, NULL, 'orphelin', 5, 'description');
/*!40000 ALTER TABLE `prophecy_status` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_technic : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_technic` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_technic` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_tendency : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_tendency` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_tendency` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_weapon : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_weapon` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_weapon` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_weapon_category : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_weapon_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_weapon_category` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_wound : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_wound` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_wound` ENABLE KEYS */;

-- Listage des données de la table univertuel.prophecy_xpincrease : ~0 rows (environ)
/*!40000 ALTER TABLE `prophecy_xpincrease` DISABLE KEYS */;
/*!40000 ALTER TABLE `prophecy_xpincrease` ENABLE KEYS */;

-- Listage des données de la table univertuel.thread : ~0 rows (environ)
/*!40000 ALTER TABLE `thread` DISABLE KEYS */;
/*!40000 ALTER TABLE `thread` ENABLE KEYS */;

-- Listage des données de la table univertuel.user : ~0 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_active`, `username`) VALUES
	(1, 'phoenix@gmail.com', '["ROLE_MEMBER"]', '$2y$13$cHhUW1gzdwl.kW1gQ8qdS.pTNFBOB27UeC4yYcRy3SImvlxnwQvgC', 1, 'phoenix'),
	(2, 'clement@gmail.com', '["ROLE_MEMBER"]', '$2y$13$Ct2F1VV/NfS7iFPVHpXehOwDDt2yJrVZCs2KQUbVz/5k7nrabyYwi', 1, 'clement'),
	(3, 'eric@gmail.com', '["ROLE_MEMBER"]', '$2y$13$/Lde3hXnJhMcjl6zYtvdEexB0hI0CXnNsLsrLHlam9FuNzSrCLMci', 1, 'eric'),
	(4, 'toto@gmail.com', '["ROLE_MEMBER"]', '$2y$13$zYT6EfiftAaDqP5rT8qLDOMK2pkXZcDlDDLlPqYDjLZ1YA0URddb6', 1, 'toto'),
	(5, 'writer@gmail.com', '["ROLE_WRITER"]', '$2y$13$yaAWgdsbIpdW8Rda.DcVse6WQZBr.ekHaYHdUIfzsqBkALXxXH.qG', 1, 'writer'),
	(6, 'admin@gmail.com', '["ROLE_ADMIN"]', '$2y$13$aH1XDOQv90K923X1mUaWV.J8yO1W2R/jAv91N/5Nv2ozTBmpX5mnm', 1, 'admin'),
	(7, 'sadmin@gmail.com', '["ROLE_SADMIN"]', '$2y$13$argOjscOwiSBPdJEUcviTOPW2QA.m55XAkfsDkFYXlnp6C0MIbZFu', 1, 'sadmin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
