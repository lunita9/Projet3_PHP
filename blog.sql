-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 nov. 2018 à 20:59
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_auteur`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES
(12, 'Episode 1', '<p style=\"text-align: center;\"><strong>2. Premiers pas</strong></p>\r\n<p>Le Youkon arrose tout le pays. Les indiens l\'appellent aussi Kwi-Pak (la grande rivi&egrave;re) et Nakotch&ocirc;titsig. C\'est l\'une des plus puissantes art&egrave;res fluviales de l\'Am&eacute;rique sa longueur atteint 3,390 kilom&egrave;tres, et son bassin, mesure une superficie de 1 million de kilom&egrave;tres carr&eacute;s. Navigabl&euml; &agrave; 3,000 kilom&egrave;tres de ses cinq bouches, il d&eacute;verse dans la baie de Norton, endentation form&eacute;e par la mer de Behring, un tiers de plus d\'eau que le Mississipi n\'en fournit au golfe du Mexique. Son estuaire dessine un grand delta en avant duquel se trouvent des cluses qui rendent l\'approche dangereuse aux b&acirc;timents &agrave; vapeur et obligent ces derniers, arrivant de Victoria (Vancouver), &agrave; jeter Fancre &agrave; Saint-Michel, port situ&eacute; &agrave; 35 milles de l\'embouchure du Youkon. Il n\'y a gu&egrave;re plus d\'une trentaine d\'ann&eacute;es que ce fleuve est connu des g&eacute;ographes, qu\'il a un trac&eacute; &agrave; peu pr&egrave;s correct sur les cartes, et qu\'il a &eacute;t&eacute; explor&eacute; enti&egrave;rement en remontant jusqu\'&agrave; ses deux sources.&nbsp;La population de l\'Alaska &eacute;tait &eacute;valu&eacute;e, en 4890, &agrave; 31,795 habitants, dont 23,274 Indiens, et 2,287 appartenant &agrave; la race mongolique Les Indiens se divisent en Esc jirnaux (Inuits), au nombre de 12,781 Thlinkites {4,790); Athabaskiens (3,444); Al&eacute;outiens \"(968) Tsunps&eacute;ans (952) et. Hydas (392).</p>', '2018-09-20 18:22:38'),
(16, 'Episode 2', '<p style=\"text-align: center;\"><strong>3. Une immense richesse</strong></p>\r\n<p style=\"text-align: left;\">La r&eacute;gion est extraordinairement riche en m&eacute;taux pr&eacute;cieux or et argent,,en fer et cuivre. D\'importants gisements de charbon, mais d\'une qualit&eacute; m&eacute;diocre, s\'offrent &agrave; l\'exploitation principalement au sudest. L&agrave; aussi, dans la vall&eacute;e du Youkon, le sapin, le c&egrave;dre jaune ont de quatre &agrave; six pieds de diam&egrave;tre et jusqu\'&agrave; 50 m&egrave;tres de haut; ailleurs, il est vrai, par exemple au nord, les proportions diminuent beaucoup. Comme dans le pays du Mackenzie, la chasse a &eacute;t&eacute; longtemps la v&eacute;ritable richesse des habitants, qui y ont joint la p&ecirc;che, ou plus exactement la tuerie en masse des phoques.&nbsp;&nbsp;La question des p&ecirc;cheries de phoques dans la mer de Behring a amen&eacute; des difficult&eacute;s entre Anglais et Am&eacute;ricains, aplanies en 1893. Lorsque les Russes poss&eacute;daient l\'Alaska, apr&egrave;s avoir revendiqu&eacute; des droits de juridiction dans la. mer de Behring, ils. consentirent, par les trait&eacute;s de 1824 avec les &Eacute;tats-Unis et&nbsp;que dans certaines parties de l\'Alaska.</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>', '2018-09-29 23:54:45'),
(23, 'Episode 3', '<p style=\"text-align: center;\"><strong>4. Un tr&eacute;sor perdu</strong></p>\r\n<p style=\"text-align: left;\">Au reste le climat y est terrible. La temp&eacute;rature s\'y abaisse jusqu\'&agrave; 50Mdegr&eacute;s? et l&agrave; o&ugrave; les cha&icirc;nes de montagnes servent d\'abri contre les vents polaires, les pluies, presque continuelles et durant au moins les deux tiers de l\'ann&eacute;e, sont glaciales. L\'Alaska, particuli&egrave;rement au sud, r&eacute;serve au voyageur des surprises tout &agrave; fait inattendues et pittoresques, s\'il n\'y s&eacute;journe que pendant la courte saison d\'&eacute;t&eacute;, sur la c&ocirc;te sud-est, o&ugrave; les monts avec. leurs cimes neigeuses s\'empanachent, en leur fi&egrave;re majest&eacute;, de nuages blancs qui paraissent immobiles. Les for&ecirc;ts &eacute;paisses, les &icirc;lots innombrables avec leur verdure qu\'on croirait &eacute;ternelle, les glaciers, refl&eacute;tant les magiques couleurs cristallines du prisme, et retombant, &agrave; intervalles, en avalanches avec un bruit formidable dans la mer o&ugrave; elles, plongent &agrave; cent brasses de profondeur, les banquises, dont on ne fait le tour qu\'en plusieurs milles de navigation, les mirages-merveilleux et inexpliqu&eacute;s qui, au-dessus des nu&eacute;es, dessinent tout &agrave; coup, dans les longues journ&eacute;es, l\'image fictive d\'une ville. avec ses &eacute;glises, ses promenades, et offrent cette illusion aux regards durant une demi-heure, tout concourt &agrave; augmenter l\'&eacute;tonnement et l\'admiration de l\'observateur. Et l\'on comprend l\'orgueil des Indiens disant aux Europ&eacute;ens, en parlant de leur pays &laquo; Nous ne sommes pas des sauvages, nous sommes les gardiens des tr&eacute;sors du Youkon. &raquo; Ces tr&eacute;sors sont aujourd\'hui convoit&eacute;s par des milliers d\'hommes partant de tous les points du globe qui vont, tels les anciens Argonautes, vers cette conqu&ecirc;te de la nouvelle Toison d\'or.</p>', '2018-10-01 23:04:49'),
(31, 'Episode 4', '<p>salut tout le monde</p>', '2018-11-14 21:26:26'),
(32, 'Episode 5', '<p>ffffffffffffffffffff</p>', '2018-11-17 21:57:23');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articleID` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `signaler` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `articleID` (`articleID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `articleID`, `author`, `comment`, `date`, `signaler`) VALUES
(21, 12, 'msn13', 'Je trouve que les épisodes sont très représentatifs de l\'Alaska', '2018-11-11 17:44:02', 0),
(22, 16, 'luna13', 'Même ma fille aime ce livre, ça lui fait penser à l\'histoire de Pocahontas', '2018-11-11 17:48:27', 0),
(23, 23, 'luna13', 'Moi j\'aime la partie historique, c\'est vraiment fascinant!!', '2018-11-11 17:51:16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mdp`) VALUES
(1, 'EchoHash', '2ec09784b6d56530f65b066c7febdfe690f70de3c9f967df1f7f717128350052');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`articleID`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
