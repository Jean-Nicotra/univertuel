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

--
-- Déchargement des données de la table `prophecy_age`
--

INSERT INTO `prophecy_age` (`id`, `campaign_id`, `name`, `start_att_value1`, `start_att_value2`, `start_att_value3`, `start_att_value4`) VALUES
(1, NULL, 'enfant', 4, 4, 4, 3),
(2, NULL, 'adolescent', 5, 4, 4, 3),
(3, NULL, 'adulte', 5, 5, 4, 3),
(4, NULL, 'ancien', 6, 5, 4, 3),
(5, NULL, 'venerable', 6, 6, 4, 3);

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
-- Déchargement des données de la table `prophecy_prohibited`
--

INSERT INTO `prophecy_prohibited` (`id`, `caste_id`, `campaign_id`, `name`, `description`) VALUES
(1, 1, NULL, 'la loi du compagnon', 'Tu transmettra ton savoir. S\'il est bien un point sur lequel artisans et érudits peuvent s\'entendre, c\'est la nécessité de la transmission du savoir et l\'enseignement des techniques qu\'ils utilisent chaque jour. Ainsi, on attend toujours d\'un artisan qu\'il apporte des explications sur ce uq\'il fait et la façon dont il le fait.'),
(2, 1, NULL, 'la loi et la perfection', 'Tu rechercheras toujours l\'oeuvre ultime. Tout artisan ne recherchant pas la perfection dans son oeuvre perd peu à peu son lien avec la matière et ne pourra plus jamais créer d\'oeuvres exceptionnelles et encore moins enchantées.'),
(3, 1, NULL, 'la loi du respect', 'Tu respecteras la matière que tu travailles et les oeuvres d\'autrui. Il est bien entendu essentiel d\'aimer la matière. Au fur et à mesure qu\'\'un artisan se désintéresse du produit qu\'il façonne, la matière devient de plus en plus difficile à travailler et prend des formes d eplus en plus laides. On raconter que certains artisans et sorciers de l\'ombre transgresseraient cette loi volontairement pour donner à leur oeuvres un aspect tourmenté.'),
(4, 2, NULL, 'la loi de l\'arme', 'Tu respecteras ton statut. La plus ancienne des traditions de la caste interdits aux combattants de porter plus d\'armes que ne leur permet leur rang, c\'est à dire une arme par statut obtenu.'),
(5, 2, NULL, 'la loi de l\'honneur', 'Tu honnoreras ton arme. La notion du respect s\'applique autant à l\'arme que manie le combattant qu\'à son adversaire. Il est donc interdit de se mesurer à plus faible que soi et de compromettre son arme dans un combat non équitable.'),
(6, 2, NULL, 'la loi du sang', 'Tu ne chercheras que la victoire. Le code de l\'honneur des combattants interdit aux membres de la caste d\'achever un adversaire qui a dors et déjà perdu un combat, qu\'il s\'agisse d\'un duel comme d\'une véritable bataille.'),
(7, 3, NULL, 'la loi du coeur', 'Tu respecteras la parole donnée. Bien qu\'habitués à mentir, ou tout du moins à présenter certains éléments sous leur jour le plus attrayant, les commerçants ont pour tradition de respecter leursd engagements une fois pris et d\'honnorer la confiance qu\'on leur témoigne.'),
(8, 3, NULL, 'la loi de l\'ordre', 'Tu respecteras l\'ordre établi. Sans ordre, il n\'y a pas de prospérité possible. Il est nécessaire de lutter contre l\'anarchie et donc, tous ceux qui voudraient développer des activités commerciales indépendantes des organisations.'),
(9, 3, NULL, 'la loi du progrès', 'Tu ne manqueras aucune occasion de faire progresser la société. Une société qui stagne est une société mourante. Un commerçant se doit de ne jamais repousser une idée. Il se doit de toujours trouver comment améliorer ses affaires et celles des autres.'),
(10, 4, NULL, 'la loi du savoir', 'Tu partageras tes découvertes. La tradition primordiale de la caste pousse les érudits à mettre leurs connaissances en commun, à comparer leurs découvertes et à aider leurs confrères à évoluer dans la voie qu\'ils ont choisie. De ce fait, un personnage ne peut refuser de révéler ce qu\'il sait à un autre érudit qui lui en fait la demande. Cet interdit ne concerne bien évidemment que les découvertes académiques du personnage et non ses secrets personnels.'),
(11, 4, NULL, 'la loi du collège', 'Tu agiras dans la concertation. L\'habitude qu\'ont les érudits de débattre continuellement avec leurs confrères se traduit, chez ceux qui quittent un jour les académies où ils ont parfait leur éducation, par une incapacité de prendre des initiatives sans demander conseil. Le personnage devra donc référer à ses compagnons des moindres actions qu\'il souhaite entreprendre et, d\'une façon plus générale ne cacher aucune de ses découvertes susceptibles d\'orienter la conduite de son groupe.'),
(12, 4, NULL, 'la loi du secret', 'Tu ne partageras pas l\'art interdit. Si tous les érudits s\'intéressent de près ou de loin au développement des sciences chiffrées qui sont l\'apanage des humanistes, rares sont ceux qui tolèrent leur enseignement au commun des mortels. Cet interdit empêche le personnage de divulguer les secrets des techniques proscrites par les Dragons : sciences, art du mécanisme, conception d\'explosifs...'),
(13, 5, NULL, 'tu n\'abuseras pas de ta force', 'La plus ancienne tradition des mages est de mlouer le don de Nenya, le grand Dragon de la magie en n\'utilisant leurs terribles pouvoirs qu\'en cas de nécessité. De ce fait, un mage qui abuse outrageusement de sa magie risque de s\'attirer les foudres de son collège, ainsi que de tous les autres mages, pour qui la discrétion est mère d\'humilité.'),
(14, 5, NULL, 'la loi du partage', 'Tu dois transmettre ton savoir. La magie est un art demandant une grande coopération entre ceux qui l\'étudient. Les mages se doivent de partager leurs découvertes avec leurs confrères mais aussi de transmettre leurs connaissances à des apprentis. Ceux qui se montrent trop secrèts et trop égoistes, ne recherchant bien souvent que le pouvoir pour servir leurs propres intérêts, sont dangereux pour la société et peuvent être traités comme des criminels.'),
(15, 5, NULL, 'la loi de la prudence', 'Tu te dois d\'être vigilant. La magie est une force dangereuse qui nécessite une très grande prudence pour ne pas mettre en danger des innocents. Ainsi, un mage ne dois pas tenter d\'expériences  dangereuses dans des endroits peuplés et doit assumer toutes les conséquences de ses actes. Ceux qui pratiquent la magie sans se soucier des conséquences que leur art peut entrainer chez les autyres oeuvent être bannis des écoles.'),
(16, 6, NULL, 'la loi de la malédiction', 'Tu te dois de réflechir à ce que tu vois et à ce que tu fais. Le prodige se doit de réflechir à ce que lui ou un autre fait, a fait et fera. Toute action entraine obligatoirement une réaction. Il faut donc penser avant d\'agir mais aussi assumer toutes les conséquences d\'une décision. Les actes irréfléchis rompent le lien qui existe entre un prodige et la nature.'),
(17, 6, NULL, 'la loi de la nature', 'Tu te dois de respecter la nature sous toutes ses formes animées ou inanimées. La nature se comprend dans sa globalité. Montagnes, forêts et plaines sont une partie intégrante au même titre que l\'homme, le Dragon ou l\'animal. Ne voir qu\'un aspect de la nature revient à ne plus percevoir l\'oeuvre d\'Heyra.'),
(18, 6, NULL, 'la loi du sang', 'Tu ne verseras pas le sang. La plus ancienne tradition de Heyra interdit à ses fidèles de souiller la terre du sang de toute forme de vie consciente qu\'il s\'agisse d\'un humain ou d\'un animal. C\'est sans doute pourquoi la majorité dses prodiges manient les armes contondantes et usent de leur force physique pour se défendre des dangers quotidiens.'),
(19, 7, NULL, 'la loi du lien', 'Tu ne trahiras pas les grands Dragons. Fidèles aux lois draconiques, les protecteurs sont soumis à l\'autorité directe des grands Dragons et de leurs représentants. C\'est pourquoi ils ne peuvent ni mentir, ni désobéir, ni cacher des informations ou tenter quelque action néfaste que ce soit à l\'encontre des dragons et de leurs émissaires.'),
(20, 7, NULL, 'la loi du sacrifice', 'Tu ne craindras pas la mort. On ne demande pas aux protecteurs de mourir en lieu et place d\'un autre citoyen de Kor, mais uniquement de se porter au devant d\'un danger le menaçant. Leur rôle de défenseur du royaume et de garant de la bonne marche des cités les contraint effectivement à courir le risque de mourir en combattant un danger qui ne leur était pas initialement destiné.'),
(21, 7, NULL, 'la loi du sang', 'Tu préserveras la vie. Chargés d\'assurer la sécurité des cités, routes et habitants de Kor, les protecteurs ont pour tradition de n\'user de la force qu\'n cas de nécessité absolue et, lorsque cette solution est encore possible, de lui préférer le dialogue et la conciliation. Cet interdit n\'est pas brisé lorsqu\'un protecteur se défend d\'une attaque, mais à chaque fois qu\'il sort son arme avant d\'avoir tenté de raisonner et d\'arrêter officiellement un individu.'),
(22, 8, NULL, 'la loi de l\'amitié', 'Tu ne refuseras pas ton aide. Habitués à la solitude de leurs errances, les voyageurs ont pour tradition de ne jamais refuser leur aide à un compagnon dans le besoin, qu\'il s\'agisse d\'un membre de leur caste, d\'un autre citoyen ou de n\'importe quel humain.'),
(23, 8, NULL, 'la loi de la découverte', 'Tu te dois d\'explorer l\'inconnu. Un voyageur ne peut rester insensible à l\'appel de l\'inconnu. S\'il entend parler d\'un endroit inexploré, d\'un vallon isolé, ou d\'un site légendaire, il se doit de tenter de le découvrir. C\'est sa nature et s\'il n\'y obéit pas, il perdra son statut de voyageur.'),
(24, 8, NULL, 'la loi de la liberté', 'Tu dois refuser d\'être enfermé. Un voyageur contraint à rester dans un même endroit meurt peu à peu. Il a besoin de liberté et de se déplacer. Emprisoné, enchainé, il perd toute raison de vivre et dépérit.');


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
-- Déchargement des données de la table `prophecy_skill`
--

INSERT INTO `prophecy_skill` (`id`, `skill_category_id`, `campaign_id`, `name`, `xp_increase`, `cost`, `reserved`, `free`, `forbidden`, `maximum_value`, `min_value`, `available`, `display`, `description`) VALUES
(1, 1, NULL, 'armes articulées', 5, 1, 1, 0, 0, 10, 0, 1, 1, 'ddd'),
(2, 1, NULL, 'armes contondantes', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'mmmmmmmm'),
(3, 1, NULL, 'armes de choc', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'lk'),
(4, 2, NULL, 'acrobatie', 5, 1, 0, 1, 0, 10, 0, 1, 0, 'zzz'),
(5, 2, NULL, 'athletisme', 5, 1, 0, 1, 0, 10, 0, 1, 0, 'zzzzz'),
(6, 2, NULL, 'equitation', 5, 1, 0, 1, 0, 10, 0, 1, 1, 'zzzzzz'),
(7, 2, NULL, 'escalade', 5, 1, 0, 1, 0, 10, 0, 1, 0, 'zzzzzzzzzzzzzzzz'),
(8, 3, NULL, 'castes', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'mmmmmm'),
(9, 3, NULL, 'connaissance de la magie', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'mmmm'),
(10, 3, NULL, 'connaissance des animaux', 5, 1, 0, 1, 0, 10, 0, 1, 0, 'eeeeeee'),
(11, 4, NULL, 'alchimie', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'zzpopiofjk sdjl'),
(12, 4, NULL, 'astrologie', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'popdifdjskf'),
(13, 5, NULL, 'armes de siege', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'dsnk,fdfnklsklngk'),
(14, 5, NULL, 'artisanat', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'mlldlf lksd k'),
(15, 6, NULL, 'armes a projectile', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'lmdsmlfslflk'),
(16, 6, NULL, 'attelages', 5, 1, 0, 1, 0, 10, 0, 1, 0, ':*ùù***dmlfkj slkfdkl'),
(17, 7, NULL, 'baratin', 5, 1, 0, 1, 0, 10, 0, 1, 0, 'lllldlsfdml'),
(18, 7, NULL, 'conte', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'dsdqd sq'),
(19, 8, NULL, 'art de la scene', 5, 1, 0, 1, 0, 10, 0, 1, 0, 'dsd sds sqd s'),
(20, 8, NULL, 'commandement', 5, 1, 1, 0, 0, 10, 0, 1, 0, 'sqsQQQ sQQ');

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
-- Déchargement des données de la table `prophecy_armor_category`
--

INSERT INTO `prophecy_armor_category` (`id`, `campaign_id`, `name`) VALUES
(1, NULL, 'armure légere'),
(2, NULL, 'armure lourde'),
(3, NULL, 'armure moyenne');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `prophecy_shield`
--

INSERT INTO `prophecy_shield` (`id`, `campaign_id`, `name`, `weight`, `create_difficulty`, `construction_time`, `village_rarety`, `city_rarety`, `village_price`, `city_price`, `protection`, `move_penalty`, `material`, `description`) VALUES
(1, NULL, 'petit bouclier', 1, 15, 2, 'peu commun', 'commun', 60, 65, 2, 0, 'bois', 'description du petit bouclier'),
(2, NULL, 'bouclier renforcé', 2, 15, 4, 'peu commun', 'peu commun', 120, 160, 4, -2, 'bois et metal', 'peut etre utilisé en attaque avec les domages : FOR+2+1D10'),
(3, NULL, 'grand bouclier', 4, 20, 6, 'rare', 'peu commun', 425, 465, 6, -4, 'bois et metal', 'peut etre utilise en attaque avec les domages : FOR+4+D10'),
(4, NULL, 'bouclier dragon', 5, 20, 5, 'N/A', 'N/A', 420, 420, 7, -5, 'metal', 'peut etre utilise en attaque avec les domages : FOR+5+1D10. La construction de ce bouclier ne peut etre realisee que par un artisan specialement mandate par la caste des protecteurs'),
(5, NULL, 'bouclier draconique', 6, 25, 2, 'introuvable', 'tres rare', 2600, 1600, 8, -5, 'ecailles de dragon', 'fabrique par un artisan elementaire a partir d\'une ecaille de dragon. Peut etre utilise en combat avec les domages : FOR+5+1D10');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `prophecy_weapon_category`
--

INSERT INTO `prophecy_weapon_category` (`id`, `campaign_id`, `name`) VALUES
(1, NULL, 'armes tranchantes'),
(2, NULL, 'armes de choc'),
(3, NULL, 'arme contondante'),
(4, NULL, 'arme articulee'),
(5, NULL, 'arme double'),
(6, NULL, 'arme de corps a corps'),
(7, NULL, 'arme d\'hast'),
(8, NULL, 'arme de jet'),
(9, NULL, 'arme a projectile'),
(10, NULL, 'arme mecanique');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `prophecy_armor`
--

INSERT INTO `prophecy_armor` (`id`, `category_id`, `campaign_id`, `name`, `weight`, `create_difficulty`, `construction_time`, `village_rarety`, `city_rarety`, `village_price`, `city_price`, `protection`, `move_penalty`, `material`, `description`) VALUES
	(1, 1, NULL, 'vetements epais', 2, 10, 4, 'peu commun', 'commun', 115, 125, 2, 0, 'tissus', 'vetements souples et legers'),
	(2, 1, NULL, 'fourrures', 4, 10, 5, 'très courant', 'peu courant', 150, 415, 5, 0, 'fourrure', 'vetements de fourrure'),
	(3, 1, NULL, 'cuir souple', 3, 15, 8, 'courant', 'tres courant', 215, 160, 4, 0, 'cuir', 'armure en cuir souple'),
	(4, 1, NULL, 'cuir cloute', 6, 15, 10, 'commun', 'commun', 300, 375, 6, 0, 'cuir', 'du cuir avec des clous'),
	(5, 1, NULL, 'cuir bouilli', 6, 20, 12, 'peu commun', 'commun', 765, 790, 8, -2, 'cuir', 'description'),
	(6, 3, NULL, 'armure d\'os et de corne', 7, 20, 20, 'rare', 'rare', 2400, 3350, 12, -2, 'cuir,os,corne', 'armure avec des os, corne et cuir'),
	(7, 3, NULL, 'cotte légère', 8, 15, 15, 'peu commun', 'commun', 550, 550, 10, 0, 'cuir,metal', 'une armure avec un peu de metal'),
	(8, 3, NULL, 'cotte de mailles', 12, 20, 25, 'introuvable', 'peu commun', 3500, 1900, 15, -2, 'metal', 'armure militaaire'),
	(9, 3, NULL, 'armure d\'anneaux', 14, 15, 30, 'peu commun', 'peu commun', 1900, 1900, 16, -4, 'cuir metal', 'armure d\'anneaux en metal'),
	(10, 3, NULL, 'brigandine', 16, 20, 20, 'rare', 'peu commun', 2300, 1800, 17, -5, 'cuir metal', 'armure brigandine'),
	(11, 2, NULL, 'armure d\'écailles', 17, 20, 30, 'très rare', 'rare', 2800, 2800, 20, -5, 'metal', 'armure en ecailles'),
	(12, 3, NULL, 'armure de bois', 10, 20, 15, 'rare', 'rare', 1200, 1600, 15, -6, 'cuir bois', 'une armure speciale a base de bois'),
	(13, 2, NULL, 'armsure de demi-plaque', 15, 20, 25, 'très rare', 'peu courant', 2400, 1900, 18, -6, 'metal', 'armure avec des plaque de metal'),
	(14, 2, NULL, 'armure de lamelles', 20, 20, 30, 'tres rare', 'rare', 2800, 2800, 22, -8, 'metal', 'armure avec des lamelles de fer'),
	(15, 2, NULL, 'armure de plaques', 25, 25, 40, 'introuvable', 'rare', 11000, 7500, 25, -10, 'metal', 'armure avec des plaques de metal'),
	(16, 2, NULL, 'armure draconique', 30, 25, 10, 'introuvable', 'tres rare', 10000, 7000, 27, -10, 'ecaille de dragon', 'armure a base d ecaille de dragon, modelee par un artisan elementaire');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `prophecy_weapon`
--	
	
INSERT INTO `prophecy_weapon` (`id`, `carac_requirement1_id`, `carac_requirement2_id`, `campaign_id`, `name`, `weight`, `creation_difficulty`, `construction_delay`, `village_rarety`, `city_rarety`, `village_price`, `city_price`, `value_requirement1`, `value_requirement2`, `melee_initiative`, `contact_initiative`, `special`, `damages`, `description`) VALUES
	(1, 1, NULL, NULL, 'epee courte', 1, 15, 3, 'commun', 'tres commun', 60, 55, 3, NULL, 0, 0, 'rien', 'FOR+8+1D10', 'description'),
	(2, 1, NULL, NULL, 'epee vulgaire', 1, 15, 3, 'commun', 'tres commun', 75, 70, 4, NULL, 1, 0, 'N/A', 'FOR+10+1D10', 'description'),
	(3, 1, NULL, NULL, 'epee longue', 1, 15, 4, 'peu commun', 'commun', 120, 115, 5, NULL, 2, -2, 'N/A', 'FOR+12+1D10', 'description'),
	(4, 1, NULL, NULL, 'epee large', 1, 15, 4, 'peu commun', 'commun', 125, 120, 5, NULL, 0, -2, 'N/A', 'FOR+14+1D10', 'description'),
	(5, 1, NULL, NULL, 'epee de duel', 1, 20, 6, 'introuvable', 'peu commun', 600, 325, 4, NULL, 2, 0, 'perforation', 'FOR+8+1D10', 'description'),
	(6, 1, 5, NULL, 'sabre', 1, 15, 5, 'peu commun', 'commun', 125, 125, 3, 4, 1, 0, 'N/A', 'FOR+9+1D10', 'description'),
	(7, 1, 5, NULL, 'fauchard', 1, 15, 5, 'peu commun', 'commun', 140, 135, 4, 4, 1, 0, 'N/A', 'FOR+11+1D10', 'description'),
	(8, 1, 5, NULL, 'cimeterre', 1, 15, 4, 'rare', 'peu commun', 115, 140, 5, 4, 1, -1, 'N/A', 'FOR+13+1D10', 'description'),
	(9, 1, NULL, NULL, 'epee batarde', 1, 15, 5, 'rare', 'peu commun', 145, 175, 5, NULL, 2, 0, 'N/A', 'FOR*2+8+1D10', 'description'),
	(10, 1, NULL, NULL, 'epee a deux mains', 1, 20, 5, 'rare', 'peu commun', 250, 310, 6, NULL, 1, 0, 'N/A', 'FOR*2+11+1D10', 'descripton'),
	(11, 1, 5, NULL, 'cimeterre a deux mains', 2, 20, 5, 'tres rare', 'rare', 410, 320, 7, 5, 1, 0, 'N/A', 'FOR*2+13+1D10', 'description'),
	(12, 1, 5, NULL, 'hachette', 1, 10, 2, 'tres commun', 'commun', 40, 65, 4, 4, -1, 1, 'N/A', 'FOR+10+1D10', 'description hachette'),
	(13, 1, 5, NULL, 'hache', 1, 15, 3, 'tres commun', 'commun', 65, 100, 5, 5, -1, 0, 'N/A', 'FOR+15+1D10', 'description'),
	(14, 1, 5, NULL, 'hache double', 1, 15, 4, 'rare', 'peu commun', 120, 145, 5, 6, 0, 0, 'N/A', 'FOR+15+1D10', 'description'),
	(15, 1, 5, NULL, 'pic de guerre', 1, 10, 3, 'tres rare', 'peu commun', 130, 100, 3, 6, -1, 1, 'armures divisees par 2', 'FOR+6+1D10', 'description'),
	(16, 1, 5, NULL, 'bec de corbin', 1, 10, 4, 'tres rare', 'rare', 190, 145, 5, 7, -1, 0, 'armures divisees par 2', 'FOR+10+1D10', 'description'),
	(17, 1, 5, NULL, 'hache de justice', 2, 20, 4, 'N/A', 'N/A', 500, 500, 6, 4, -2, 0, 'N/A', 'FOR*2+15+1D10', 'description'),
	(18, 1, 5, NULL, 'hache a deux mains', 2, 15, 4, 'peu commun', 'peu commun', 115, 170, 6, 6, -2, 0, 'N/A', 'FOR*2+16+1D10', 'description'),
	(19, 1, 5, NULL, 'hache double a deux mains', 2, 20, 5, 'tres rare', 'rare', 115, 170, 7, 6, -2, 0, 'N/A', 'FOR*2+17+1D10', 'description'),
	(20, 1, 5, NULL, 'pioche de guerre', 2, 15, 5, 'rare', 'rare', 170, 200, 6, 6, -1, 0, 'armures divisees par 2', 'FOR*2+12+1D10', 'description');

--
-- Déchargement des données de la table `prophecy_tendency`
--

INSERT INTO `prophecy_tendency` (`id`, `campaign_id`, `name`, `max_circles`, `min_circles`, `min_value`, `maximum_value`, `description`) VALUES
(1, NULL, 'dragon', 50, 0, 0, 5, 'fff'),
(2, NULL, 'fatalité', 50, 0, 0, 5, 'k'),
(3, NULL, 'homme', 50, 0, 0, 5, 'k');

commit;
	
