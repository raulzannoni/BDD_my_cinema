-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Giu 21, 2023 alle 16:26
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `script_cinema_rz`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `actor`
--

CREATE TABLE `actor` (
  `id_actor` int(11) NOT NULL,
  `id_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `actor`
--

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
(97, 89),
(98, 90),
(99, 91),
(100, 94);

-- --------------------------------------------------------

--
-- Struttura della tabella `casting`
--

CREATE TABLE `casting` (
  `id_film` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `casting`
--

INSERT INTO `casting` (`id_film`, `id_actor`, `id_role`) VALUES
(0, 41, 97),
(1, 19, 41),
(1, 20, 42),
(1, 21, 43),
(1, 22, 80),
(1, 23, 44),
(2, 24, 54),
(2, 25, 56),
(2, 26, 55),
(2, 27, 57),
(2, 28, 60),
(2, 29, 59),
(2, 30, 58),
(3, 20, 74),
(3, 25, 70),
(3, 31, 69),
(3, 32, 71),
(3, 33, 72),
(4, 24, 67),
(4, 32, 66),
(4, 34, 68),
(5, 35, 81),
(5, 36, 82),
(5, 37, 83),
(5, 38, 84),
(5, 39, 85),
(6, 46, 86),
(6, 47, 88),
(6, 48, 87),
(6, 49, 89),
(6, 50, 90),
(7, 40, 91),
(7, 42, 92),
(7, 43, 93),
(7, 44, 94),
(7, 45, 95),
(8, 40, 96),
(8, 41, 97),
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
(15, 32, 31),
(15, 81, 32),
(15, 82, 33),
(16, 35, 36),
(16, 83, 34),
(16, 84, 35),
(16, 85, 37),
(16, 86, 39),
(16, 87, 38),
(17, 35, 36),
(17, 81, 40),
(17, 83, 34),
(17, 84, 35),
(17, 85, 37),
(18, 88, 61),
(18, 89, 62),
(18, 90, 63),
(18, 91, 64),
(18, 92, 65),
(19, 61, 75),
(19, 93, 76),
(19, 94, 77),
(19, 95, 78),
(19, 96, 79),
(20, 61, 45),
(20, 97, 46);

-- --------------------------------------------------------

--
-- Struttura della tabella `director`
--

CREATE TABLE `director` (
  `id_director` int(11) NOT NULL,
  `id_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `director`
--

INSERT INTO `director` (`id_director`, `id_person`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 92);

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `title_film` varchar(50) NOT NULL,
  `id_director` int(11) NOT NULL DEFAULT 0,
  `year_film` date NOT NULL,
  `duration_film` time NOT NULL,
  `plot_film` text DEFAULT NULL,
  `star_film` smallint(6) DEFAULT NULL,
  `poster_film` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`id_film`, `title_film`, `id_director`, `year_film`, `duration_film`, `plot_film`, `star_film`, `poster_film`) VALUES
(1, 'Pulp Fiction', 1, '1994-01-01', '02:25:00', 'L\\\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\\\'entremêlent. Dans un restaurant, un couple de jeunes braqueurs, Pumpkin et Yolanda, discutent des risques que comporte leur activité. Deux truands, Jules Winnfield et son ami Vincent Vega, qui revient d\\\'Amsterdam, ont pour mission de récupérer une mallette au contenu mystérieux et de la rapporter à Marsellus Wallace.', 5, NULL),
(2, 'Inglourious Basterds', 1, '2009-01-01', '02:33:00', 'Dans la France occupée de 1940, Shosanna Dreyfus assiste à l\\\'exécution de sa famille tombée entre les mains du colonel nazi Hans Landa. Shosanna s\\\'échappe de justesse et s\\\'enfuit à Paris où elle se construit une nouvelle identité en devenant exploitante d\\\'une salle de cinéma. Quelque part ailleurs en Europe, le lieutenant Aldo Raine forme un groupe de soldats juifs américains pour mener des actions punitives particulièrement sanglantes contre les nazis.', 4, NULL),
(3, 'Django Unchained', 1, '2012-01-01', '02:45:00', 'Deux ans avant la Guerre civile, un ancien esclave du nom de Django s\\\'associe avec un chasseur de primes d\\\'origine allemande qui l\\\'a libéré: il accepte de traquer avec lui des criminels recherchés. En échange, il l\\\'aidera à retrouver sa femme perdue depuis longtemps et esclave elle aussi.', 4, NULL),
(4, 'Once Upon a Time… in Hollywood', 1, '2019-01-01', '02:41:00', 'Rick Dalton, un acteur de télévision qui a déjà vécu de meilleures années, et son cascadeur de longue date Cliff Booth s\\\'efforcent d\\\'atteindre la gloire et le succès dans l\\\'industrie cinématographique au cours de l\\\'âge d\\\'OR d\\\'Hollywood en 1969. Ils viennent à la réalisation que l\\\'industrie du spectacle n\\\'est plus ce qu\\\'elle était.', 4, NULL),
(5, 'Alien', 2, '1979-01-01', '01:57:00', 'Durant le voyage de retour d\\\'un immense cargo spatial en mission commerciale de routine, ses passagers, cinq hommes et deux femmes plongés en hibernation, sont tirés de leur léthargie dix mois plus tôt que prévu par Mother, l\\\'ordinateur de bord. Ce dernier a en effet capté dans le silence interplanétaire des signaux sonores, et suivant une certaine clause du contrat de navigation, les astronautes sont chargés de prospecter tout indice de vie dans l\\\'espace.', 3, NULL),
(6, 'Blade Runner', 2, '1982-01-01', '01:51:00', 'En l\\\'an 2019, un ex-policier devenu détective privé, Rick Deckard, est rappelé en service pour faire la chasse à des robots d\\\'apparence humaine appelés \"replicants.\" Deckard doit en éliminer quatre qui se cachent à Los Angeles. La tâche n\\\'est pas facile, mais il arrive à supprimer trois des robots, sans pouvoir empêcher le meurtre d\\\'un important industriel. Le quatrième \"replicant,\" Batty, s\\\'avère particulièrement coriace.', 2, NULL),
(7, 'Gladiator', 2, '2000-01-01', '02:35:00', 'Le g&eacute;n&eacute;ral romain Maximus est le plus fid&egrave;le soutien de l&#039;empereur Marc Aur&egrave;le, qu&#039;il a conduit de victoire en victoire. Jaloux du prestige de Maximus, et plus encore de l&#039;amour que lui voue l&#039;empereur, le fils de Marc Aur&egrave;le, Commode, s&#039;arroge brutalement le pouvoir, puis ordonne l&#039;arrestation du g&eacute;n&eacute;ral et son ex&eacute;cution. Maximus &eacute;chappe &agrave; ses assassins, mais ne peut emp&ecirc;cher le massacre de sa famille. Captur&eacute; par un marchand d&#039;esclaves, il devient gladiateur et pr&eacute;pare sa vengeance.', 4, NULL),
(8, 'Robin des Bois', 2, '2010-01-01', '02:20:00', '&Agrave; l&#039;aube du treizi&egrave;me si&egrave;cle, Richard Coeur de Lion, roi d&#039;Angleterre, meurt. A Nottingham, Robin d&eacute;couvre l&#039;&eacute;tendue de la corruption qui ronge son pays. Il se heurte au despotique sh&eacute;rif du comt&eacute;, mais trouve une alli&eacute;e en la personne de la belle et imp&eacute;tueuse Lady Marianne. Robin entre en r&eacute;sistance et rallie &agrave; sa cause une petite bande de maraudeurs dont les prouesses de combat n&#039;ont d&#039;&eacute;gal que le go&ucirc;t pour les plaisirs de la vie. Ensemble, ils vont s&#039;efforcer de soulager un peuple opprim&eacute;.', 2, NULL),
(9, 'E.T., l&#039;extra-terrestre', 3, '1982-01-01', '01:55:00', 'Une soucoupe volante atterrit en pleine nuit pr&egrave;s de Los Angeles. Quelques extraterrestres, envoy&eacute;s sur Terre en mission d&#039;exploration botanique, sortent de l&#039;engin, mais un des leurs s&#039;aventure au-del&agrave; de la clairi&egrave;re o&ugrave; se trouve la navette. Celui-ci se dirige alors vers la ville. C&#039;est sa premi&egrave;re d&eacute;couverte de la civilisation humaine. Bient&ocirc;t traqu&eacute;e par des militaires et abandonn&eacute;e par les siens, cette petite cr&eacute;ature apeur&eacute;e se nommant E.T. se r&eacute;fugie dans une r&eacute;sidence de banlieue.  Elliot, un gar&ccedil;on de dix ans, le d&eacute;couvre et lui construit un abri dans son armoire. Rapproch&eacute;s par un &eacute;change t&eacute;l&eacute;pathique, les deux &ecirc;tres ne tardent pas &agrave; devenir amis. Aid&eacute; par sa soeur Gertie et son fr&egrave;re a&icirc;n&eacute; Michael, Elliot va alors tenter de garder la pr&eacute;sence d&#039;E.T. secr&egrave;te.', 4, NULL),
(10, 'Jurassic Park', 3, '1993-01-01', '02:08:00', 'John Hammond invite Alan Grant , et Ellie Sattler, deux pal&eacute;ontologues dont il finance les recherches, &agrave; se rendre sur une &icirc;le du Costa Rica. Ils y rejoindront le math&eacute;maticien Ian Malcolm, ainsi que l&rsquo;avocat Donald Gennaro. Tout ce joli petit monde est cens&eacute; donner son avis sur Jurassic Park, une id&eacute;e un peu folle : ramener les dinosaures &agrave; la vie pour les parquer dans un zoo.  La visite commence, en compagnie des petits-enfants du vieux g&acirc;teux. Un d&eacute;sastre. Rien ne se passe comme pr&eacute;vu. Les visiteurs sont bloqu&eacute;s au niveau de l&rsquo;enclos du T-Rex. Pr&eacute;cis&eacute;ment le moment o&ugrave; les &eacute;l&eacute;ments se d&eacute;cha&icirc;nent. Un violent cyclone s&rsquo;abat sur l&rsquo;&icirc;le. Ce &agrave; quoi s&rsquo;ajoute la trahison de Dennis Nedry qui d&eacute;sactive les syst&egrave;mes de s&eacute;curit&eacute;, lib&eacute;rant ainsi les monstres dans la jungle.  Jurassic Park devient une zone de non droit. Grant s&rsquo;improvise en Indiana Jones pour venir au secours des enfants. Il ram&egrave;ne tout le monde au centre d&rsquo;accueil o&ugrave; les rescap&eacute;s se retrouvent coinc&eacute;s par deux v&eacute;lociraptors. Finalement, c&rsquo;est le T-Rex qui croque les deux autres dinosaures, permettant &agrave; Grant, Ellie, Malcolm et les enfants de sauter dans un h&eacute;licopt&egrave;re et quitter une &icirc;le redevenue sauvage &ndash; comme &agrave; la grande &eacute;poque.', 3, NULL),
(11, 'Il faut sauver le soldat Ryan', 3, '1998-01-01', '02:43:00', 'Alors que les forces alli&eacute;es d&eacute;barquent &agrave; Omaha Beach, Miller doit conduire son escouade derri&egrave;re les lignes ennemies pour une mission particuli&egrave;rement dangereuse : trouver et ramener sain et sauf le simple soldat James Ryan, dont les trois fr&egrave;res sont morts au combat en l&#039;espace de trois jours. Pendant que l&#039;escouade progresse en territoire ennemi, les hommes de Miller se posent des questions. Faut-il risquer la vie de huit hommes pour en sauver un seul ?', 4, NULL),
(12, 'Minority Report', 3, '2002-01-01', '02:25:00', 'A Washington, en 2054, la soci&eacute;t&eacute; du futur a &eacute;radiqu&eacute; le meurtre en se dotant du syst&egrave;me de pr&eacute;vention / d&eacute;tection / r&eacute;pression le plus sophistiqu&eacute; du monde. Dissimul&eacute;s au coeur du Minist&egrave;re de la Justice, trois extra-lucides captent les signes pr&eacute;curseurs des violences homicides et en adressent les images &agrave; leur contr&ocirc;leur, John Anderton, le chef de la &quot;Pr&eacute;crime&quot; devenu justicier apr&egrave;s la disparition tragique de son fils. Celui-ci n&#039;a alors plus qu&#039;&agrave; lancer son escouade aux trousses du &quot;coupable&quot;... Mais un jour se produit l&#039;impensable : l&#039;ordinateur lui renvoie sa propre image. D&#039;ici 36 heures, Anderton aura assassin&eacute; un parfait &eacute;tranger. Devenu la cible de ses propres troupes, Anderton prend la fuite. Son seul espoir pour d&eacute;jouer le complot : d&eacute;nicher sa future victime ; sa seule arme : les visions parcellaires, &eacute;nigmatiques, de la plus fragile des Pr&eacute;-Cogs : Agatha.', 3, NULL),
(13, 'Ready Player One', 3, '2018-01-01', '02:20:00', '2045. Le monde est au bord du chaos. Les &ecirc;tres humains se r&eacute;fugient dans l&rsquo;OASIS, univers virtuel mis au point par le brillant et excentrique James Halliday. Avant de dispara&icirc;tre, celui-ci a d&eacute;cid&eacute; de l&eacute;guer son immense fortune &agrave; quiconque d&eacute;couvrira l&rsquo;&oelig;uf de P&acirc;ques num&eacute;rique qu&rsquo;il a pris soin de dissimuler dans l&rsquo;OASIS. L&rsquo;app&acirc;t du gain provoque une comp&eacute;tition plan&eacute;taire. Mais lorsqu&rsquo;un jeune gar&ccedil;on, Wade Watts, qui n&rsquo;a pourtant pas le profil d&rsquo;un h&eacute;ros, d&eacute;cide de participer &agrave; la chasse au tr&eacute;sor, il est plong&eacute; dans un monde parall&egrave;le &agrave; la fois myst&eacute;rieux et inqui&eacute;tant&hellip;', 4, NULL),
(14, 'Terminator 2 : Le Jugement dernier', 4, '1991-01-01', '02:17:00', 'En 2029, apr&egrave;s leur &eacute;chec pour &eacute;liminer Sarah Connor, les robots de Skynet programment un nouveau Terminator, le T-1000, pour retourner dans le pass&eacute; et &eacute;liminer son fils John Connor, futur leader de la r&eacute;sistance humaine. Ce dernier programme un autre cyborg, le T-800, et l&rsquo;envoie &eacute;galement en 1995, pour le prot&eacute;ger. Une seule question d&eacute;terminera le sort de l&rsquo;humanit&eacute; : laquelle des deux machines trouvera John la premi&egrave;re ?', 2, NULL),
(15, 'Titanic', 4, '1997-01-01', '03:15:00', 'Il narre la rencontre de deux jeunes gens de milieux sociaux oppos&eacute;s, Jack et Rose, et leur histoire d&#039;amour &agrave; la fois infinie et &eacute;ph&eacute;m&egrave;re, juste avant que le bateau ne percute un iceberg et entraine la mort de 1500 passagers.', 5, NULL),
(16, 'Avatar', 4, '2009-01-01', '02:42:00', 'Jake Sully, un ancien marine parapl&eacute;gique, est recrut&eacute; pour se rendre sur Pandora, o&ugrave; de puissants groupes industriels exploitent un minerai rarissime. Parce que l&#039;atmosph&egrave;re de Pandora est toxique, les humains ont cr&eacute;&eacute; des doubles d&#039;eux-m&ecirc;mes, des avatars. Sous cette forme, Jake peut de nouveau marcher. On lui confie une mission : infiltrer les Na&#039;vis, les habitants de Pandora, qui sont devenus un obstacle trop cons&eacute;quent &agrave; l&#039;exploitation du pr&eacute;cieux minerai. Mais tout change lorsque Neytiri, une belle Na&#039;vi, sauve la vie de Jake...', 4, NULL),
(17, 'Avatar : La Voie de leau', 4, '2022-01-01', '03:12:00', 'Jake Sully et Neytiri sont devenus parents. L&#039;intrigue se d&eacute;roule une dizaine d&#039;ann&eacute;es apr&egrave;s les &eacute;v&eacute;nements racont&eacute;s dans le long-m&eacute;trage originel. Leur vie idyllique, proche de la nature, est menac&eacute;e lorsque la &laquo; Resources Development Administration &raquo;, dangereuse organisation non-gouvernementale, est de retour sur Pandora. Contraints de quitter leur habitat naturel, Jake et sa famille se rendent sur les r&eacute;cifs, o&ugrave; ils pensent trouver asile. Mais ils tombent sur un clan, les Metkayina, aux m&oelig;urs diff&eacute;rentes des leurs...', 3, NULL),
(18, 'Retour vers le futur', 5, '1985-01-01', '01:52:00', 'Marty McFly, un adolescent typique des ann&eacute;es 1980 m&egrave;ne l&#039;existence d&#039;un gar&ccedil;on de son &acirc;ge, celle d&#039;un lyc&eacute;en fana de musique. Son p&egrave;re, George McFly, timide, couard et ne supportant pas le conflit, s&#039;&eacute;crase sans cesse devant son chef de bureau Biff Tannen qui l&#039;oblige &agrave; r&eacute;diger ses propres comptes rendus.', 4, NULL),
(19, 'Forrest Gump', 5, '1994-01-01', '02:22:00', 'Ce film raconte l&#039;histoire d&#039;un jeune gar&ccedil;on en situation de handicap qui va r&eacute;ussir sa vie. Forrest Gump est un enfant qui a un handicap moteur (ses jambes ne fonctionnent pas correctement, il doit porter des attelles) et qui souffre de troubles autistiques.', 2, NULL),
(20, 'Seul au monde', 5, '2000-01-01', '02:23:00', 'Le film a pour protagoniste un employ&eacute; de FedEx naufrag&eacute; sur une &icirc;le inhabit&eacute;e apr&egrave;s le crash de son avion dans le Pacifique Sud, et relate ses tentatives de survie sur l&#039;&icirc;le en utilisant des restes de la cargaison de son avion.', 4, NULL),
(159, 'Seven', 6, '1995-01-01', '02:07:00', 'Deux policiers, William Somerset et David Mills, sont charg&eacute;s d&#039;une enqu&ecirc;te criminelle concernant un tueur en s&eacute;rie psychopathe, lequel planifie m&eacute;thodiquement ses meurtres en fonction des sept p&eacute;ch&eacute;s capitaux qui sont : la gourmandise, l&#039;avarice, la paresse, la luxure, l&#039;orgueil, l&#039;envie et la col&egrave;re.', 4, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `person`
--

CREATE TABLE `person` (
  `id_person` int(11) NOT NULL,
  `first_name_person` varchar(50) NOT NULL,
  `name_person` varchar(50) NOT NULL,
  `sex_person` varchar(50) NOT NULL,
  `birth_person` date NOT NULL,
  `portrait_person` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `person`
--

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
(75, 'Sam', 'Worthington', 'Masculin', '1976-08-02', NULL),
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
(89, 'Helen', 'Hunt', 'Feminin', '1963-06-15', NULL),
(90, 'Morgan', 'Freeman', 'Masculin', '1937-06-01', NULL),
(91, 'Gwyneth', 'Paltrow', 'Feminin', '1972-09-27', NULL),
(92, 'David', 'Fincher', 'Masculin', '1962-08-28', NULL),
(94, 'Kevin', 'Spacey', 'Masculin', '1959-07-26', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `role`
--

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

-- --------------------------------------------------------

--
-- Struttura della tabella `talk`
--

CREATE TABLE `talk` (
  `id_film` int(11) NOT NULL,
  `id_type_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `talk`
--

INSERT INTO `talk` (`id_film`, `id_type_film`) VALUES
(1, 9),
(1, 10),
(2, 5),
(3, 11),
(4, 10),
(5, 1),
(5, 13),
(6, 1),
(7, 3),
(7, 12),
(8, 4),
(9, 1),
(10, 1),
(10, 4),
(11, 3),
(11, 5),
(12, 1),
(12, 6),
(13, 1),
(14, 1),
(14, 7),
(15, 3),
(15, 8),
(16, 1),
(17, 1),
(18, 1),
(19, 2),
(19, 3),
(20, 3),
(159, 6),
(159, 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `type_film`
--

CREATE TABLE `type_film` (
  `id_type_film` int(11) NOT NULL,
  `name_type_film` varchar(50) NOT NULL,
  `poster_type_film` text DEFAULT NULL,
  `description_type_film` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `type_film`
--

INSERT INTO `type_film` (`id_type_film`, `name_type_film`, `poster_type_film`, `description_type_film`) VALUES
(1, 'Science-fiction', NULL, 'Genre litt&eacute;raire et cin&eacute;matographique qui invente des mondes, des soci&eacute;t&eacute;s et des &ecirc;tres situ&eacute;s dans des espaces-temps fictifs (souvent futurs), impliquant des sciences, des technologies et des situations radicalement diff&eacute;rentes.'),
(2, 'Comédie dramatique', NULL, 'Une com&eacute;die dramatique est un genre cin&eacute;matographique ou t&eacute;l&eacute;visuel qui utilise les caract&eacute;ristiques de la com&eacute;die &agrave; des fins dramatiques. Il ne s&#039;agit donc pas obligatoirement d&#039;une alternance plus ou moins &eacute;quilibr&eacute;e entre des sc&egrave;nes humoristiques et des sc&egrave;nes dramatiques.'),
(3, 'Drame', NULL, 'Pi&egrave;ce, film, etc., d&#039;un caract&egrave;re g&eacute;n&eacute;ral grave, mettant en jeu des sentiments path&eacute;tiques et des conflits sociaux ou psychologiques (par opposition &agrave; la com&eacute;die).'),
(4, 'Aventure', NULL, NULL),
(5, 'Guerre', NULL, NULL),
(6, 'Policier', NULL, NULL),
(7, 'Action', NULL, NULL),
(8, 'Romantique', NULL, NULL),
(9, 'Film de gangster', NULL, NULL),
(10, 'Comédie noire', NULL, NULL),
(11, 'Western', NULL, NULL),
(12, 'Historique', NULL, NULL),
(13, 'Horror', NULL, NULL),
(14, 'Comique', NULL, NULL),
(15, 'Thriller', NULL, 'Film ou roman (policier ou d&#039;&eacute;pouvante) &agrave; suspense, qui procure des sensations fortes.');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id_actor`),
  ADD KEY `id_person` (`id_person`);

--
-- Indici per le tabelle `casting`
--
ALTER TABLE `casting`
  ADD PRIMARY KEY (`id_film`,`id_actor`,`id_role`),
  ADD KEY `id_actor` (`id_actor`),
  ADD KEY `id_role` (`id_role`);

--
-- Indici per le tabelle `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id_director`),
  ADD KEY `id_personne` (`id_person`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `FK_film_director` (`id_director`);

--
-- Indici per le tabelle `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`);

--
-- Indici per le tabelle `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indici per le tabelle `talk`
--
ALTER TABLE `talk`
  ADD PRIMARY KEY (`id_film`,`id_type_film`),
  ADD KEY `id_type_film` (`id_type_film`);

--
-- Indici per le tabelle `type_film`
--
ALTER TABLE `type_film`
  ADD PRIMARY KEY (`id_type_film`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `actor`
--
ALTER TABLE `actor`
  MODIFY `id_actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT per la tabella `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT per la tabella `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT per la tabella `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT per la tabella `type_film`
--
ALTER TABLE `type_film`
  MODIFY `id_type_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);

--
-- Limiti per la tabella `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`),
  ADD CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Limiti per la tabella `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `FK_director_person` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);

--
-- Limiti per la tabella `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `FK_film_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`);

--
-- Limiti per la tabella `talk`
--
ALTER TABLE `talk`
  ADD CONSTRAINT `talk_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `talk_ibfk_2` FOREIGN KEY (`id_type_film`) REFERENCES `type_film` (`id_type_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
