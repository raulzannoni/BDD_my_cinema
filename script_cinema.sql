-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour my_cinema
CREATE DATABASE IF NOT EXISTS `my_cinema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `my_cinema`;

-- Listage de la structure de la table my_cinema. actor
CREATE TABLE IF NOT EXISTS `actor` (
  `id_actor` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  PRIMARY KEY (`id_actor`),
  KEY `id_person` (`id_person`),
  CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

-- Listage des données de la table my_cinema.actor : ~79 rows (environ)
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

-- Listage de la structure de la table my_cinema. casting
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

-- Listage des données de la table my_cinema.casting : ~0 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table my_cinema. director
CREATE TABLE IF NOT EXISTS `director` (
  `id_director` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  PRIMARY KEY (`id_director`),
  KEY `id_personne` (`id_person`),
  CONSTRAINT `FK_director_person` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table my_cinema.director : ~5 rows (environ)
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` (`id_director`, `id_person`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5);
/*!40000 ALTER TABLE `director` ENABLE KEYS */;

-- Listage de la structure de la table my_cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `title_film` varchar(50) NOT NULL,
  `id_director` int(11) NOT NULL DEFAULT '0',
  `year_film` date NOT NULL,
  `duration_film` time NOT NULL,
  `plot_film` text,
  `star_film` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `FK_film_director` (`id_director`),
  CONSTRAINT `FK_film_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

-- Listage des données de la table my_cinema.film : ~20 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `title_film`, `id_director`, `year_film`, `duration_film`, `plot_film`, `star_film`) VALUES
	(1, 'Pulp Fiction', 1, '1994-01-01', '02:25:00', NULL, NULL),
	(2, 'Inglourious Basterds', 1, '2009-01-01', '02:33:00', NULL, NULL),
	(3, 'Django Unchained', 1, '2012-01-01', '02:45:00', NULL, NULL),
	(4, 'Once Upon a Time… in Hollywood', 1, '2019-01-01', '02:41:00', NULL, NULL),
	(5, 'Alien', 2, '1979-01-01', '01:57:00', NULL, NULL),
	(6, 'Blade Runner', 2, '1982-01-01', '01:51:00', NULL, NULL),
	(7, 'Gladiator', 2, '2000-01-01', '02:35:00', NULL, NULL),
	(8, 'Robin des Bois', 2, '2010-01-01', '02:20:00', NULL, NULL),
	(9, 'E.T., l\'extra-terrestre', 3, '1982-01-01', '01:55:00', NULL, NULL),
	(10, 'Jurassic Park', 3, '1993-01-01', '02:08:00', NULL, NULL),
	(11, 'Il faut sauver le soldat Ryan', 3, '1998-01-01', '02:43:00', NULL, NULL),
	(12, 'Minority Report', 3, '2002-01-01', '02:25:00', NULL, NULL),
	(13, 'Ready Player One', 3, '2018-01-01', '02:20:00', NULL, NULL),
	(14, 'Terminator 2 : Le Jugement dernier', 4, '1991-01-01', '02:17:00', NULL, NULL),
	(15, 'Titanic', 4, '1997-01-01', '03:15:00', NULL, NULL),
	(16, 'Avatar', 4, '2009-01-01', '02:42:00', NULL, NULL),
	(17, 'Avatar : La Voie de l\'eau', 4, '2022-01-01', '03:12:00', NULL, NULL),
	(18, 'Retour vers le futur', 5, '1985-01-01', '01:52:00', NULL, NULL),
	(19, 'Forrest Gump', 5, '1994-01-01', '02:22:00', NULL, NULL),
	(20, 'Seul au monde', 5, '2000-01-01', '02:23:00', NULL, NULL);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table my_cinema. person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int(11) NOT NULL AUTO_INCREMENT,
  `first_name_person` varchar(50) NOT NULL,
  `name_person` varchar(50) NOT NULL,
  `sex_person` varchar(50) NOT NULL,
  `birth_person` date NOT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- Listage des données de la table my_cinema.person : ~84 rows (environ)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id_person`, `first_name_person`, `name_person`, `sex_person`, `birth_person`) VALUES
	(1, 'Quentin', 'Tarantino', 'Masculin', '1963-03-27'),
	(2, 'Ridley', 'Scott', 'Masculin', '1937-11-30'),
	(3, 'Steven', 'Spielberg', 'Masculin', '1946-12-18'),
	(4, 'James', 'Cameron', 'Masculin', '1954-08-16'),
	(5, 'Robert', 'Zemeckis', 'Masculin', '1952-05-14'),
	(6, 'John', 'Travolta', 'Masculin', '1954-02-18'),
	(7, 'Samuel L.', 'Jackson', 'Masculin', '1948-12-21'),
	(8, 'Bruce', 'Willis', 'Masculin', '1955-03-19'),
	(9, 'Samuel L.', 'Jackson', 'Masculin', '1970-04-29'),
	(10, 'Uma', 'Thurman', 'Feminin', '1970-04-29'),
	(11, 'Brad', 'Pitt', 'Masculin', '1963-12-18'),
	(12, 'Christoph', 'Waltz', 'Masculin', '1956-10-04'),
	(13, 'Mélanie', 'Laurent', 'Feminin', '1983-02-21'),
	(14, 'Eli', 'Roth', 'Masculin', '1972-04-18'),
	(15, 'Til', 'Schweiger', 'Masculin', '1963-12-19'),
	(16, 'Daniel', 'Bruhl', 'Masculin', '1978-06-18'),
	(17, 'Diane', 'Kruger', 'Feminin', '1976-07-15'),
	(18, 'Jamie', 'Foxx', 'Masculin', '1967-12-13'),
	(19, 'Leonardo', 'DiCaprio', 'Masculin', '1974-11-11'),
	(20, 'Kerry', 'Washington', 'Feminin', '1977-01-31'),
	(21, 'Margot', 'Robbie', 'Feminin', '1990-07-02'),
	(22, 'Sigourney', 'Weaver', 'Feminin', '1949-10-08'),
	(23, 'Tom', 'Skerritt', 'Masculin', '1933-08-05'),
	(24, 'Veronica', 'Cartwright', 'Feminin', '1949-04-20'),
	(25, 'John', 'Hurt', 'Masculin', '1940-01-22'),
	(26, 'Ian', 'Holm', 'Masculin', '1931-09-12'),
	(32, 'Russell', 'Crowe', 'Masculin', '1964-04-07'),
	(33, 'Cate', 'Blanchett', 'Feminin', '1969-05-14'),
	(34, 'Joaquin', 'Phoenix', 'Masculin', '1974-10-28'),
	(35, 'Connie', 'Nielsen', 'Feminin', '1965-07-03'),
	(36, 'Oliver', 'Reed', 'Masculin', '1938-02-13'),
	(37, 'Derek', 'Jacobi', 'Masculin', '1938-10-22'),
	(38, 'Harrison', 'Ford', 'Masculin', '1942-07-13'),
	(39, 'Sean', 'Young', 'Feminin', '1959-11-20'),
	(40, 'Rutger', 'Hauer', 'Masculin', '1944-01-23'),
	(41, 'Daryl', 'Hannah', 'Feminin', '1960-12-03'),
	(42, 'Edward James', 'Olmos', 'Masculin', '1947-02-24'),
	(43, 'Henry', 'Thomas', 'Masculin', '1971-09-09'),
	(44, 'Robert', 'MacNaughton', 'Masculin', '1966-12-19'),
	(45, 'Pat', 'Welsh', 'Feminin', '1915-02-11'),
	(46, 'Dee', 'Wallace', 'Feminin', '1948-12-14'),
	(47, 'Drew', 'Barrimore', 'Feminin', '1975-02-22'),
	(48, 'Sam', 'Neill', 'Masculin', '1947-09-14'),
	(49, 'Jeff', 'Goldblum', 'Masculin', '1952-10-22'),
	(50, 'Laura', 'Dern', 'Feminin', '1967-02-10'),
	(51, 'Richard', 'Attenborough', 'Masculin', '1923-08-29'),
	(52, 'Bob', 'Peck', 'Masculin', '1945-08-23'),
	(53, 'Tom', 'Hanks', 'Masculin', '1956-07-09'),
	(54, 'Edward', 'Burns', 'Masculin', '1968-01-29'),
	(55, 'Tom', 'Sizemore', 'Masculin', '1961-11-29'),
	(56, 'Barry', 'Pepper', 'Masculin', '1970-04-04'),
	(57, 'Matt', 'Damon', 'Masculin', '1970-10-08'),
	(58, 'Tom', 'Cruise', 'Masculin', '1962-07-03'),
	(59, 'Colin', 'Farrell', 'Masculin', '1976-05-31'),
	(60, 'Max', 'von Sidow', 'Masculin', '1929-04-10'),
	(61, 'Samantha', 'Morton', 'Feminin', '1977-05-13'),
	(62, 'Kathryn', 'Morris', 'Feminin', '1969-01-28'),
	(63, 'Tye', 'Sheridan', 'Masculin', '1996-11-11'),
	(64, 'Olivia', 'Cooke', 'Feminin', '1993-12-27'),
	(65, 'Ben', 'Mendelsohn', 'Masculin', '1969-04-03'),
	(66, 'Tod Joseph', 'Miller', 'Masculin', '1981-06-04'),
	(67, 'Simon', 'Pegg', 'Masculin', '1970-02-14'),
	(68, 'Mark', 'Rylance', 'Masculin', '1960-01-18'),
	(69, 'Arnold', 'Schwarzenegger', 'Masculin', '1947-07-30'),
	(70, 'Linda', 'Hamilton', 'Feminin', '1956-09-26'),
	(71, 'Edward', 'Furlong', 'Masculin', '1977-08-02'),
	(72, 'Robert', 'Patrick', 'Masculin', '1958-11-05'),
	(73, 'Kate', 'Winslet', 'Feminin', '1975-10-05'),
	(74, 'Billy', 'Zane', 'Masculin', '1966-02-24'),
	(75, 'Sam', 'WWorthington', 'Masculin', '1976-08-02'),
	(76, 'Zoe', 'Saldana', 'Feminin', '1978-06-19'),
	(77, 'Stephen', 'Lang', 'Masculin', '1952-07-11'),
	(78, 'Giovanni', 'Ribisi', 'Masculin', '1974-12-17'),
	(79, 'Michelle', 'Rodriguez', 'Feminin', '1978-07-12'),
	(80, 'Michael J.', 'Fox', 'Masculin', '1961-06-09'),
	(81, 'Christopher', 'Lloyd', 'Feminin', '1938-10-22'),
	(82, 'Crispin', 'Glover', 'Masculin', '1964-04-20'),
	(83, 'Lea', 'Thompson', 'Feminin', '1961-05-31'),
	(84, 'Thomas F.', 'Wilson', 'Masculin', '1959-04-15'),
	(85, 'Robin', 'Wright', 'Feminin', '1966-04-08'),
	(86, 'Gary Sinise', 'Lang', 'Masculin', '1955-03-17'),
	(87, 'Mikelty', 'Williamson', 'Masculin', '1957-03-04'),
	(88, 'Sally', 'Field', 'Feminin', '1946-11-06'),
	(89, 'Helen', 'Hunt', 'Feminin', '1963-06-15');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;

-- Listage de la structure de la table my_cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Listage des données de la table my_cinema.role : ~53 rows (environ)
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
	(33, 'Caledon \'Cal\' Hockley'),
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
	(54, 'le lieutenant Aldo Raine»'),
	(55, 'Shosanna Dreyfus'),
	(56, 'le colonel SS Hans Landa'),
	(57, 'le sergent Donny Donowitz'),
	(58, 'Bridget von Hammersmark'),
	(59, 'le soldat Frederick Zoller'),
	(60, 'le sergent Hugo Stiglitz');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Listage de la structure de la table my_cinema. talk
CREATE TABLE IF NOT EXISTS `talk` (
  `id_film` int(11) NOT NULL,
  `id_type_film` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_type_film`),
  KEY `id_type_film` (`id_type_film`),
  CONSTRAINT `talk_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `talk_ibfk_2` FOREIGN KEY (`id_type_film`) REFERENCES `type_film` (`id_type_film`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table my_cinema.talk : ~0 rows (environ)
/*!40000 ALTER TABLE `talk` DISABLE KEYS */;
/*!40000 ALTER TABLE `talk` ENABLE KEYS */;

-- Listage de la structure de la table my_cinema. type_film
CREATE TABLE IF NOT EXISTS `type_film` (
  `id_type_film` int(11) NOT NULL AUTO_INCREMENT,
  `name_type_film` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type_film`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Listage des données de la table my_cinema.type_film : ~12 rows (environ)
/*!40000 ALTER TABLE `type_film` DISABLE KEYS */;
INSERT INTO `type_film` (`id_type_film`, `name_type_film`) VALUES
	(1, 'Science-fiction'),
	(2, 'Comédie dramatique'),
	(3, 'Drame'),
	(4, 'Aventure'),
	(5, 'Guerre'),
	(6, 'Policier'),
	(7, 'Action'),
	(8, 'Romantique'),
	(9, 'Film de gangster'),
	(10, 'Comédie noire'),
	(11, 'Western'),
	(12, 'Historique');
/*!40000 ALTER TABLE `type_film` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
