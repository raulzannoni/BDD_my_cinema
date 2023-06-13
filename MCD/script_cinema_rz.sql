-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour script_cinema_rz
CREATE DATABASE IF NOT EXISTS `script_cinema_rz` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `script_cinema_rz`;

-- Listage de la structure de la table script_cinema_rz. actor
CREATE TABLE IF NOT EXISTS `actor` (
  `id_actor` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  PRIMARY KEY (`id_actor`),
  KEY `id_person` (`id_person`),
  CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

-- Listage des données de la table script_cinema_rz.actor : ~79 rows (environ)
/*!40000 ALTER TABLE `actor` DISABLE KEYS */;
INSERT INTO `actor` (`id_actor`, `id_person`) VALUES
	(19, 6),
	(20, 7),
	(21, 8),
	(22, 9),
	(23, 10),
	(24, 11),
	(25, 12),
	(26, 13),
	(27, 14),
	(28, 15),
	(29, 16),
	(30, 17),
	(31, 18),
	(32, 19),
	(33, 20),
	(34, 21),
	(35, 22),
	(36, 23),
	(37, 24),
	(38, 25),
	(39, 26),
	(40, 32),
	(41, 33),
	(42, 34),
	(43, 35),
	(44, 36),
	(45, 37),
	(46, 38),
	(47, 39),
	(48, 40),
	(49, 41),
	(50, 42),
	(51, 43),
	(52, 44),
	(53, 45),
	(54, 46),
	(55, 47),
	(56, 48),
	(57, 49),
	(58, 50),
	(59, 51),
	(60, 52),
	(61, 53),
	(62, 54),
	(63, 55),
	(64, 56),
	(65, 57),
	(66, 58),
	(67, 59),
	(68, 60),
	(69, 61),
	(70, 62),
	(71, 63),
	(72, 64),
	(73, 65),
	(74, 66),
	(75, 67),
	(76, 68),
	(77, 69),
	(78, 70),
	(79, 71),
	(80, 72),
	(81, 73),
	(82, 74),
	(83, 75),
	(84, 76),
	(85, 77),
	(86, 78),
	(87, 79),
	(88, 80),
	(89, 81),
	(90, 82),
	(91, 83),
	(92, 84),
	(93, 85),
	(94, 86),
	(95, 87),
	(96, 88),
	(97, 89);
/*!40000 ALTER TABLE `actor` ENABLE KEYS */;

-- Listage de la structure de la table script_cinema_rz. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_actor`,`id_role`),
  KEY `id_actor` (`id_actor`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table script_cinema_rz.casting : ~94 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_actor`, `id_role`) VALUES
	(1, 19, 41),
	(1, 20, 42),
	(3, 20, 74),
	(1, 21, 43),
	(1, 22, 80),
	(1, 23, 44),
	(2, 24, 54),
	(4, 24, 67),
	(2, 25, 56),
	(3, 25, 70),
	(2, 26, 55),
	(2, 27, 57),
	(2, 28, 60),
	(2, 29, 59),
	(2, 30, 58),
	(3, 31, 69),
	(3, 32, 71),
	(4, 32, 66),
	(15, 32, 31),
	(3, 33, 72),
	(4, 34, 68),
	(5, 35, 81),
	(16, 35, 36),
	(17, 35, 36),
	(5, 36, 82),
	(5, 37, 83),
	(5, 38, 84),
	(5, 39, 85),
	(7, 40, 91),
	(8, 40, 96),
	(0, 41, 97),
	(8, 41, 97),
	(7, 42, 92),
	(7, 43, 93),
	(7, 44, 94),
	(7, 45, 95),
	(6, 46, 86),
	(6, 47, 88),
	(6, 48, 87),
	(6, 49, 89),
	(6, 50, 90),
	(9, 51, 2),
	(9, 52, 3),
	(9, 53, 1),
	(9, 54, 5),
	(9, 55, 4),
	(10, 56, 6),
	(10, 57, 8),
	(10, 58, 7),
	(10, 59, 9),
	(10, 60, 10),
	(11, 61, 11),
	(19, 61, 75),
	(20, 61, 45),
	(11, 62, 12),
	(11, 63, 13),
	(11, 64, 15),
	(11, 65, 14),
	(12, 66, 16),
	(12, 67, 18),
	(12, 68, 17),
	(12, 69, 19),
	(12, 70, 20),
	(13, 71, 21),
	(13, 72, 22),
	(13, 73, 23),
	(13, 74, 24),
	(13, 75, 25),
	(13, 76, 26),
	(14, 77, 27),
	(14, 78, 29),
	(14, 79, 28),
	(14, 80, 30),
	(15, 81, 32),
	(17, 81, 40),
	(15, 82, 33),
	(16, 83, 34),
	(17, 83, 34),
	(16, 84, 35),
	(17, 84, 35),
	(16, 85, 37),
	(17, 85, 37),
	(16, 86, 39),
	(16, 87, 38),
	(18, 88, 61),
	(18, 89, 62),
	(18, 90, 63),
	(18, 91, 64),
	(18, 92, 65),
	(19, 93, 76),
	(19, 94, 77),
	(19, 95, 78),
	(19, 96, 79),
	(20, 97, 46);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table script_cinema_rz. director
CREATE TABLE IF NOT EXISTS `director` (
  `id_director` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  PRIMARY KEY (`id_director`),
  KEY `id_personne` (`id_person`),
  CONSTRAINT `FK_director_person` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table script_cinema_rz.director : ~5 rows (environ)
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` (`id_director`, `id_person`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5);
/*!40000 ALTER TABLE `director` ENABLE KEYS */;

-- Listage de la structure de la table script_cinema_rz. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `title_film` varchar(50) NOT NULL,
  `id_director` int(11) NOT NULL DEFAULT '0',
  `year_film` date NOT NULL,
  `duration_film` time NOT NULL,
  `plot_film` text,
  `star_film` smallint(6) DEFAULT NULL,
  `poster_film` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `FK_film_director` (`id_director`),
  CONSTRAINT `FK_film_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

-- Listage des données de la table script_cinema_rz.film : ~20 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `title_film`, `id_director`, `year_film`, `duration_film`, `plot_film`, `star_film`, `poster_film`) VALUES
	(1, 'Pulp Fiction', 1, '1994-01-01', '02:25:00', 'L\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\'entremêlent. Dans un restaurant, un couple de jeunes braqueurs, Pumpkin et Yolanda, discutent des risques que comporte leur activité. Deux truands, Jules Winnfield et son ami Vincent Vega, qui revient d\'Amsterdam, ont pour mission de récupérer une mallette au contenu mystérieux et de la rapporter à Marsellus Wallace.', 5, NULL),
	(2, 'Inglourious Basterds', 1, '2009-01-01', '02:33:00', 'Dans la France occupée de 1940, Shosanna Dreyfus assiste à l\'exécution de sa famille tombée entre les mains du colonel nazi Hans Landa. Shosanna s\'échappe de justesse et s\'enfuit à Paris où elle se construit une nouvelle identité en devenant exploitante d\'une salle de cinéma. Quelque part ailleurs en Europe, le lieutenant Aldo Raine forme un groupe de soldats juifs américains pour mener des actions punitives particulièrement sanglantes contre les nazis.', 4, NULL),
	(3, 'Django Unchained', 1, '2012-01-01', '02:45:00', 'Deux ans avant la Guerre civile, un ancien esclave du nom de Django s\'associe avec un chasseur de primes d\'origine allemande qui l\'a libéré: il accepte de traquer avec lui des criminels recherchés. En échange, il l\'aidera à retrouver sa femme perdue depuis longtemps et esclave elle aussi.', 4, NULL),
	(4, 'Once Upon a Time… in Hollywood', 1, '2019-01-01', '02:41:00', 'Rick Dalton, un acteur de télévision qui a déjà vécu de meilleures années, et son cascadeur de longue date Cliff Booth s\'efforcent d\'atteindre la gloire et le succès dans l\'industrie cinématographique au cours de l\'âge d\'OR d\'Hollywood en 1969. Ils viennent à la réalisation que l\'industrie du spectacle n\'est plus ce qu\'elle était.', 4, NULL),
	(5, 'Alien', 2, '1979-01-01', '01:57:00', 'Durant le voyage de retour d\'un immense cargo spatial en mission commerciale de routine, ses passagers, cinq hommes et deux femmes plongés en hibernation, sont tirés de leur léthargie dix mois plus tôt que prévu par Mother, l\'ordinateur de bord. Ce dernier a en effet capté dans le silence interplanétaire des signaux sonores, et suivant une certaine clause du contrat de navigation, les astronautes sont chargés de prospecter tout indice de vie dans l\'espace.', 3, NULL),
	(6, 'Blade Runner', 2, '1982-01-01', '01:51:00', 'En l\'an 2019, un ex-policier devenu détective privé, Rick Deckard, est rappelé en service pour faire la chasse à des robots d\'apparence humaine appelés "replicants." Deckard doit en éliminer quatre qui se cachent à Los Angeles. La tâche n\'est pas facile, mais il arrive à supprimer trois des robots, sans pouvoir empêcher le meurtre d\'un important industriel. Le quatrième "replicant," Batty, s\'avère particulièrement coriace.', 2, NULL),
	(7, 'Gladiator', 2, '2000-01-01', '02:35:00', 'Le général romain Maximus est le plus fidèle soutien de l\'empereur Marc Aurèle, qu\'il a conduit de victoire en victoire. Jaloux du prestige de Maximus, et plus encore de l\'amour que lui voue l\'empereur, le fils de Marc Aurèle, Commode, s\'arroge brutalement le pouvoir, puis ordonne l\'arrestation du général et son exécution. Maximus échappe à ses assassins, mais ne peut empêcher le massacre de sa famille. Capturé par un marchand d\'esclaves, il devient gladiateur et prépare sa vengeance.', 4, NULL),
	(8, 'Robin des Bois', 2, '2010-01-01', '02:20:00', 'À l\'aube du treizième siècle, Richard Coeur de Lion, roi d\'Angleterre, meurt. A Nottingham, Robin découvre l\'étendue de la corruption qui ronge son pays. Il se heurte au despotique shérif du comté, mais trouve une alliée en la personne de la belle et impétueuse Lady Marianne. Robin entre en résistance et rallie à sa cause une petite bande de maraudeurs dont les prouesses de combat n\'ont d\'égal que le goût pour les plaisirs de la vie. Ensemble, ils vont s\'efforcer de soulager un peuple opprimé.', 2, NULL),
	(9, 'E.T., l\'extra-terrestre', 3, '1982-01-01', '01:55:00', 'Une soucoupe volante atterrit en pleine nuit près de Los Angeles. Quelques extraterrestres, envoyés sur Terre en mission d\'exploration botanique, sortent de l\'engin, mais un des leurs s\'aventure au-delà de la clairière où se trouve la navette. Celui-ci se dirige alors vers la ville. C\'est sa première découverte de la civilisation humaine. Bientôt traquée par des militaires et abandonnée par les siens, cette petite créature apeurée se nommant E.T. se réfugie dans une résidence de banlieue.', 4, NULL),
	(10, 'Jurassic Park', 3, '1993-01-01', '02:08:00', 'Ne pas réveiller le chat qui dort -- c\'est ce que le milliardaire John Hammond aurait dû se rappeler avant de se lancer dans le clonage de dinosaures. C\'est à partir d\'une goutte de sang absorbée par un moustique fossilisé que John Hammond et son équipe ont réussi à faire renaître une dizaine d\'espèces de dinosaures. Il s\'apprête maintenant avec la complicité du docteur Alan Grant, paléontologue de renom, et de son amie Ellie, à ouvrir le plus grand parc à thème du monde.', 3, NULL),
	(11, 'Il faut sauver le soldat Ryan', 3, '1998-01-01', '02:43:00', 'Tandis que les forces alliées débarquent à Omaha Beach, Miller doit conduire son escouade derrière les lignes ennemies pour une mission particulièrement dangereuse: trouver et ramener sain et sauf le simple soldat James Ryan, dont les trois frères sont morts au combat en l\'espace de trois jours. Pendant que l\'escouade progresse en territoire ennemi, les hommes de Miller se posent des questions et se demandent s\'il faut vraiment risquer la vie de huit hommes pour en sauver un seul.', 4, NULL),
	(12, 'Minority Report', 3, '2002-01-01', '02:25:00', 'En 2054, la société du futur a éradiqué les crimes en se dotant d\'un système de prévention, détection et répression le plus sophistiqué du monde. Dissimulés de tous, trois extras-lucides transmettent les images des crimes à venir aux policiers de la Précrime. Cependant, un jour, John, le chef de brigade, reçoit l\'impossible : sa propre image assassinant un inconnu. Démarre alors une course contre la montre pour prouver son innocence.', 1, NULL),
	(13, 'Ready Player One', 3, '2018-01-01', '02:20:00', 'En 2045, la planète frôle le chaos et s\'effondre, mais les gens trouvent du réconfort dans l\'OASIS, un monde virtuel créé par James Halliday. Lorsque Halliday meurt, il promet son immense fortune à la première personne qui découvre un oeuf de Pâques numérique caché dans l\'OASIS. Quand le jeune Wade Watts se joint au concours, il devient un héros improbable dans une chasse au trésor qui traverse des mondes fantastiques pleins de mystères, de découvertes et de dangers.', 1, NULL),
	(14, 'Terminator 2 : Le Jugement dernier', 4, '1991-01-01', '02:17:00', 'Après l\'immense embrasement nucléaire du 29 août 1997, les rares humains survivants, menés par John Connor, luttent sans relâche contre l\'armée de robots dirigée par Skynet, un ordinateur surpuissant. Skynet tente d\'abord d\'éliminer Sarah Connor, la mère de John, grâce à un cyborg projeté en 1984, mais en vain. Il transfère alors dans le passé un deuxième robot, T1000, et l\'envoie à l\'époque où John Connor n\'était encore qu\'un enfant.', 3, NULL),
	(15, 'Titanic', 4, '1997-01-01', '03:15:00', 'En 1997, l\'épave du Titanic est l\'objet d\'une exploration fiévreuse, menée par des chercheurs de trésor en quête d\'un diamant bleu qui se trouvait à bord. Frappée par un reportage télévisé, l\'une des rescapées du naufrage, âgée de 102 ans, Rose DeWitt, se rend sur place et évoque ses souvenirs. 1912. Fiancée à un industriel arrogant, Rose croise sur le bateau un artiste sans le sou.', 3, NULL),
	(16, 'Avatar', 4, '2009-01-01', '02:42:00', 'Sur le monde extraterrestre luxuriant de Pandora vivent les Na\'vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à un tel Avatar et tombe amoureux d\'une femme Na\'vi. Alors qu\'un lien avec elle grandit, il est entraîné dans une bataille pour la survie de son monde.', 3, NULL),
	(17, 'Avatar : La Voie de leau', 4, '2022-01-01', '03:12:00', 'Jake Sully et Neytiri ont formé une famille et font tout pour rester aussi soudés que possible. Ils sont cependant contraints de quitter leur foyer et d\'explorer les différentes régions encore mystérieuses de Pandora. Lorsqu\'une ancienne menace refait surface, Jake va devoir mener une guerre difficile contre les humains.', 3, NULL),
	(18, 'Retour vers le futur', 5, '1985-01-01', '01:52:00', 'Le jeune Marty McFly mène une existence anonyme, auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l\'expulser du lycée. Ami de l\'excentrique professeur Emmett Brown, il l\'accompagne tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée. La démonstration tourne mal : des trafiquants d\'armes débarquent et assassinent le scientifique.', 2, NULL),
	(19, 'Forrest Gump', 5, '1994-01-01', '02:22:00', 'Sur un banc, à Savannah, en Géorgie, Forrest Gump attend le bus. Comme celui-ci tarde à venir, le jeune homme raconte sa vie à ses compagnons d\'ennui. A priori, ses capacités intellectuelles plutôt limitées ne le destinaient pas à de grandes choses. Qu\'importe. Forrest Gump, sans jamais rien y comprendre, s\'associa à tous les grands événements de l\'Histoire de son pays.', 4, NULL),
	(20, 'Seul au monde', 5, '2000-01-01', '02:23:00', 'Chuck Noland, un cadre de Fedex, sillonne le monde pour améliorer les performances de son entreprise et la productivité de ses équipes. Il ne trouve la tranquillité qu\'auprès de sa compagne Kelly. Cependant, à la veille de Noël, il reçoit un appel lui annonçant qu\'il doit contrôler la livraison d\'un colis urgent pour la Malaisie.', 5, NULL);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table script_cinema_rz. person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int(11) NOT NULL AUTO_INCREMENT,
  `first_name_person` varchar(50) NOT NULL,
  `name_person` varchar(50) NOT NULL,
  `sex_person` varchar(50) NOT NULL,
  `birth_person` date NOT NULL,
  `portrait_person` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- Listage des données de la table script_cinema_rz.person : ~84 rows (environ)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id_person`, `first_name_person`, `name_person`, `sex_person`, `birth_person`, `portrait_person`) VALUES
	(1, 'Quentin', 'Tarantino', 'Masculin', '1963-03-27', NULL),
	(2, 'Ridley', 'Scott', 'Masculin', '1937-11-30', NULL),
	(3, 'Steven', 'Spielberg', 'Masculin', '1946-12-18', NULL),
	(4, 'James', 'Cameron', 'Masculin', '1954-08-16', NULL),
	(5, 'Robert', 'Zemeckis', 'Masculin', '1952-05-14', NULL),
	(6, 'John', 'Travolta', 'Masculin', '1954-02-18', NULL),
	(7, 'Samuel L.', 'Jackson', 'Masculin', '1948-12-21', NULL),
	(8, 'Bruce', 'Willis', 'Masculin', '1955-03-19', NULL),
	(9, 'Ving', 'Rhames', 'Masculin', '1959-05-12', NULL),
	(10, 'Uma', 'Thurman', 'Feminin', '1970-04-29', NULL),
	(11, 'Brad', 'Pitt', 'Masculin', '1963-12-18', NULL),
	(12, 'Christoph', 'Waltz', 'Masculin', '1956-10-04', NULL),
	(13, 'Mélanie', 'Laurent', 'Feminin', '1983-02-21', NULL),
	(14, 'Eli', 'Roth', 'Masculin', '1972-04-18', NULL),
	(15, 'Til', 'Schweiger', 'Masculin', '1963-12-19', NULL),
	(16, 'Daniel', 'Bruhl', 'Masculin', '1978-06-18', NULL),
	(17, 'Diane', 'Kruger', 'Feminin', '1976-07-15', NULL),
	(18, 'Jamie', 'Foxx', 'Masculin', '1967-12-13', NULL),
	(19, 'Leonardo', 'DiCaprio', 'Masculin', '1974-11-11', NULL),
	(20, 'Kerry', 'Washington', 'Feminin', '1977-01-31', NULL),
	(21, 'Margot', 'Robbie', 'Feminin', '1990-07-02', NULL),
	(22, 'Sigourney', 'Weaver', 'Feminin', '1949-10-08', NULL),
	(23, 'Tom', 'Skerritt', 'Masculin', '1933-08-05', NULL),
	(24, 'Veronica', 'Cartwright', 'Feminin', '1949-04-20', NULL),
	(25, 'John', 'Hurt', 'Masculin', '1940-01-22', NULL),
	(26, 'Ian', 'Holm', 'Masculin', '1931-09-12', NULL),
	(32, 'Russell', 'Crowe', 'Masculin', '1964-04-07', NULL),
	(33, 'Cate', 'Blanchett', 'Feminin', '1969-05-14', NULL),
	(34, 'Joaquin', 'Phoenix', 'Masculin', '1974-10-28', NULL),
	(35, 'Connie', 'Nielsen', 'Feminin', '1965-07-03', NULL),
	(36, 'Oliver', 'Reed', 'Masculin', '1938-02-13', NULL),
	(37, 'Derek', 'Jacobi', 'Masculin', '1938-10-22', NULL),
	(38, 'Harrison', 'Ford', 'Masculin', '1942-07-13', NULL),
	(39, 'Sean', 'Young', 'Feminin', '1959-11-20', NULL),
	(40, 'Rutger', 'Hauer', 'Masculin', '1944-01-23', NULL),
	(41, 'Daryl', 'Hannah', 'Feminin', '1960-12-03', NULL),
	(42, 'Edward James', 'Olmos', 'Masculin', '1947-02-24', NULL),
	(43, 'Henry', 'Thomas', 'Masculin', '1971-09-09', NULL),
	(44, 'Robert', 'MacNaughton', 'Masculin', '1966-12-19', NULL),
	(45, 'Pat', 'Welsh', 'Feminin', '1915-02-11', NULL),
	(46, 'Dee', 'Wallace', 'Feminin', '1948-12-14', NULL),
	(47, 'Drew', 'Barrimore', 'Feminin', '1975-02-22', NULL),
	(48, 'Sam', 'Neill', 'Masculin', '1947-09-14', NULL),
	(49, 'Jeff', 'Goldblum', 'Masculin', '1952-10-22', NULL),
	(50, 'Laura', 'Dern', 'Feminin', '1967-02-10', NULL),
	(51, 'Richard', 'Attenborough', 'Masculin', '1923-08-29', NULL),
	(52, 'Bob', 'Peck', 'Masculin', '1945-08-23', NULL),
	(53, 'Tom', 'Hanks', 'Masculin', '1956-07-09', NULL),
	(54, 'Edward', 'Burns', 'Masculin', '1968-01-29', NULL),
	(55, 'Tom', 'Sizemore', 'Masculin', '1961-11-29', NULL),
	(56, 'Barry', 'Pepper', 'Masculin', '1970-04-04', NULL),
	(57, 'Matt', 'Damon', 'Masculin', '1970-10-08', NULL),
	(58, 'Tom', 'Cruise', 'Masculin', '1962-07-03', NULL),
	(59, 'Colin', 'Farrell', 'Masculin', '1976-05-31', NULL),
	(60, 'Max', 'von Sidow', 'Masculin', '1929-04-10', NULL),
	(61, 'Samantha', 'Morton', 'Feminin', '1977-05-13', NULL),
	(62, 'Kathryn', 'Morris', 'Feminin', '1969-01-28', NULL),
	(63, 'Tye', 'Sheridan', 'Masculin', '1996-11-11', NULL),
	(64, 'Olivia', 'Cooke', 'Feminin', '1993-12-27', NULL),
	(65, 'Ben', 'Mendelsohn', 'Masculin', '1969-04-03', NULL),
	(66, 'Tod Joseph', 'Miller', 'Masculin', '1981-06-04', NULL),
	(67, 'Simon', 'Pegg', 'Masculin', '1970-02-14', NULL),
	(68, 'Mark', 'Rylance', 'Masculin', '1960-01-18', NULL),
	(69, 'Arnold', 'Schwarzenegger', 'Masculin', '1947-07-30', NULL),
	(70, 'Linda', 'Hamilton', 'Feminin', '1956-09-26', NULL),
	(71, 'Edward', 'Furlong', 'Masculin', '1977-08-02', NULL),
	(72, 'Robert', 'Patrick', 'Masculin', '1958-11-05', NULL),
	(73, 'Kate', 'Winslet', 'Feminin', '1975-10-05', NULL),
	(74, 'Billy', 'Zane', 'Masculin', '1966-02-24', NULL),
	(75, 'Sam', 'WWorthington', 'Masculin', '1976-08-02', NULL),
	(76, 'Zoe', 'Saldana', 'Feminin', '1978-06-19', NULL),
	(77, 'Stephen', 'Lang', 'Masculin', '1952-07-11', NULL),
	(78, 'Giovanni', 'Ribisi', 'Masculin', '1974-12-17', NULL),
	(79, 'Michelle', 'Rodriguez', 'Feminin', '1978-07-12', NULL),
	(80, 'Michael J.', 'Fox', 'Masculin', '1961-06-09', NULL),
	(81, 'Christopher', 'Lloyd', 'Feminin', '1938-10-22', NULL),
	(82, 'Crispin', 'Glover', 'Masculin', '1964-04-20', NULL),
	(83, 'Lea', 'Thompson', 'Feminin', '1961-05-31', NULL),
	(84, 'Thomas F.', 'Wilson', 'Masculin', '1959-04-15', NULL),
	(85, 'Robin', 'Wright', 'Feminin', '1966-04-08', NULL),
	(86, 'Gary', 'Sinise', 'Masculin', '1955-03-17', NULL),
	(87, 'Mikelty', 'Williamson', 'Masculin', '1957-03-04', NULL),
	(88, 'Sally', 'Field', 'Feminin', '1946-11-06', NULL),
	(89, 'Helen', 'Hunt', 'Feminin', '1963-06-15', NULL);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;

-- Listage de la structure de la table script_cinema_rz. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

-- Listage des données de la table script_cinema_rz.role : ~89 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `name_role`) VALUES
	(1, 'E.T.'),
	(2, 'Elliot'),
	(3, 'Michael'),
	(4, 'Gertie'),
	(5, 'Mary'),
	(6, 'Alan Grant'),
	(7, 'Ellie Sattler'),
	(8, 'Ian Malcolm'),
	(9, 'John Hammond'),
	(10, 'Robert Muldoon'),
	(11, 'le capitaine John H. Miller'),
	(12, 'le soldat 1re classe Richard Reiben'),
	(13, 'le technical sergeant Michael Horvath'),
	(14, 'le soldat 2e classe James Francis Ryan'),
	(15, 'le soldat 1re classe Daniel Jackson'),
	(16, 'John Anderton'),
	(17, 'Lamar Burgess'),
	(18, 'Danny Witwer'),
	(19, 'Agatha, la précog'),
	(20, 'Lara Clarke Anderton, ex-femme d\'Anderton'),
	(21, 'Wade Owen Watts / Parzival'),
	(22, 'Samantha Evelyn Cook / Art3mis'),
	(23, 'Nolan Sorrento / Sorrento'),
	(24, 'i-R0k'),
	(25, 'Ogden Morrow / le Conservateu'),
	(26, 'James Donovan Halliday / Anorak'),
	(27, 'le Terminator T-800'),
	(28, 'John Connor'),
	(29, 'Sarah Connor'),
	(30, 'le Terminator T-1000'),
	(31, 'Jack Dawson'),
	(32, 'Rose DeWitt Bukater'),
	(33, 'Caledon Cal Hockley'),
	(34, 'Jake Sully'),
	(35, 'Neytiri'),
	(36, 'Dre Grace Augustine'),
	(37, 'colonel Miles Quaritch'),
	(38, 'Trudy Chacon'),
	(39, 'administrateur Parker Selfridge'),
	(40, 'Ronal'),
	(41, 'Vincent Vega'),
	(42, 'Jules Winnfield'),
	(43, 'Butch Coolidge'),
	(44, 'Mia Wallace'),
	(45, 'Chuck Noland'),
	(46, 'Kelly Frears'),
	(54, 'le lieutenant Aldo Raine'),
	(55, 'Shosanna Dreyfus'),
	(56, 'le colonel SS Hans Landa'),
	(57, 'le sergent Donny Donowitz'),
	(58, 'Bridget von Hammersmark'),
	(59, 'le soldat Frederick Zoller'),
	(60, 'le sergent Hugo Stiglitz'),
	(61, 'Marty McFly'),
	(62, 'Emmett Brown'),
	(63, 'George McFly'),
	(64, 'Lorraine Baines-McFly'),
	(65, 'Biff Tannen'),
	(66, 'Rick Dalton'),
	(67, 'Cliff Booth'),
	(68, 'Sharon Tate'),
	(69, 'Django Freeman'),
	(70, 'King Schultz'),
	(71, 'Calvin J. Candie'),
	(72, 'Broomhilda von Shaft'),
	(74, 'Stephen, le majordome'),
	(75, 'Forrest Gump'),
	(76, 'Jennifer Curran'),
	(77, 'le lieutenant Dan Taylor'),
	(78, 'Benjamin Bufford'),
	(79, 'Madame Gump'),
	(80, 'Marsellus Wallace'),
	(81, 'le lieutenant Ellen Louise Ripley'),
	(82, 'le capitaine Arthur Koblenz Dallas'),
	(83, 'la navigatrice Joan Marie Lambert'),
	(84, 'l\'officier en second Gilbert Ward Thomas Kane'),
	(85, 'l\'officier scientifique Ash'),
	(86, 'Rick Deckard'),
	(87, 'Roy Batty'),
	(88, 'Rachel'),
	(89, 'Pris'),
	(90, 'Gaff'),
	(91, 'Maximus Decimus Meridius'),
	(92, 'Commode'),
	(93, 'Lucilla'),
	(94, 'Proximo'),
	(95, 'le sénateur Gracchus'),
	(96, 'Robin des Bois'),
	(97, 'Belle Marianne');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Listage de la structure de la table script_cinema_rz. talk
CREATE TABLE IF NOT EXISTS `talk` (
  `id_film` int(11) NOT NULL,
  `id_type_film` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_type_film`),
  KEY `id_type_film` (`id_type_film`),
  CONSTRAINT `talk_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `talk_ibfk_2` FOREIGN KEY (`id_type_film`) REFERENCES `type_film` (`id_type_film`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table script_cinema_rz.talk : ~29 rows (environ)
/*!40000 ALTER TABLE `talk` DISABLE KEYS */;
INSERT INTO `talk` (`id_film`, `id_type_film`) VALUES
	(5, 1),
	(6, 1),
	(9, 1),
	(10, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 2),
	(7, 3),
	(11, 3),
	(15, 3),
	(19, 3),
	(20, 3),
	(8, 4),
	(10, 4),
	(2, 5),
	(11, 5),
	(12, 6),
	(14, 7),
	(15, 8),
	(1, 9),
	(1, 10),
	(4, 10),
	(3, 11),
	(7, 12),
	(5, 13);
/*!40000 ALTER TABLE `talk` ENABLE KEYS */;

-- Listage de la structure de la table script_cinema_rz. type_film
CREATE TABLE IF NOT EXISTS `type_film` (
  `id_type_film` int(11) NOT NULL AUTO_INCREMENT,
  `name_type_film` varchar(50) NOT NULL,
  `poster_type_film` text,
  `description_type_film` text,
  PRIMARY KEY (`id_type_film`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table script_cinema_rz.type_film : ~13 rows (environ)
/*!40000 ALTER TABLE `type_film` DISABLE KEYS */;
INSERT INTO `type_film` (`id_type_film`, `name_type_film`, `poster_type_film`, `description_type_film`) VALUES
	(1, 'Science-fiction', NULL, NULL),
	(2, 'Comédie dramatique', NULL, NULL),
	(3, 'Drame', NULL, NULL),
	(4, 'Aventure', NULL, NULL),
	(5, 'Guerre', NULL, NULL),
	(6, 'Policier', NULL, NULL),
	(7, 'Action', NULL, NULL),
	(8, 'Romantique', NULL, NULL),
	(9, 'Film de gangster', NULL, NULL),
	(10, 'Comédie noire', NULL, NULL),
	(11, 'Western', NULL, NULL),
	(12, 'Historique', NULL, NULL),
	(13, 'Horror', NULL, NULL);
/*!40000 ALTER TABLE `type_film` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
