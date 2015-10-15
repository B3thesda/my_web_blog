-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2014 at 02:32 PM
-- Server version: 5.5.33-MariaDB
-- PHP Version: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `magicarpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `billet`
--

CREATE TABLE IF NOT EXISTS `billet` (
  `id_membre` int(11) NOT NULL,
`id_billet` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `date_last_modif` date DEFAULT NULL,
  `titre` text COLLATE utf8_bin,
  `article` text COLLATE utf8_bin,
  `url` varchar(250) COLLATE utf8_bin NOT NULL,
  `img` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `billet`
--

INSERT INTO `billet` (`id_membre`, `id_billet`, `id_tag`, `date_creation`, `date_last_modif`, `titre`, `article`, `url`, `img`) VALUES
(1, 1, 2, '2014-12-12', NULL, 'MAGICARPOWA', 'Premier article lalalala magicarpe est un poisson lalala ', '', ''),
(1, 2, 1, '2014-12-12', NULL, 'Test', 'test', '', ''),
(1, 3, 4, '2014-12-12', NULL, 'Test', 'test', '', ''),
(0, 4, 0, '2014-12-12', NULL, 'PREMIER ARTICLE', 'Wouhou ça marche enfin', '', ''),
(1, 5, 0, '2014-12-13', NULL, 'Blablabla', 'Magicarpe ', '', ''),
(4, 6, 0, '2014-12-13', NULL, 'Coucou', 'Salut tout le monde lalala', '', ''),
(4, 7, 0, '2014-12-13', NULL, 'HAPPY', '<3', 'https://www.youtube.com/watch?v=y6Sxv-sUYtM', ''),
(4, 8, 0, '2014-12-13', NULL, 'Dailymotion', 'Happy', 'http://www.dailymotion.com/video/x2chd0e_best-cat-vines-the-best-cat-vine-compilation-25-minutes_fun', ''),
(4, 9, 0, '2014-12-13', NULL, 'Image', 'Yeah', '', ''),
(4, 10, 0, '2014-12-13', NULL, 'IMAGE', 'YEAH', '', ''),
(4, 11, 0, '2014-12-13', NULL, 'Image magicarpe', 'fdzcsx', '', ''),
(21, 12, 0, '2014-12-15', NULL, 'Les Minions', 'Wouh enfin un film sur les minions! Trop bien! Regardez la bande annonce!', 'https://www.youtube.com/watch?v=eisKxhjBnZ0', '');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`id_commentaire` int(255) NOT NULL,
  `id_membre` int(255) NOT NULL,
  `commentaire` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_membre`, `commentaire`) VALUES
(1, 3, 'pour une beta DB sa passe !'),
(2, 3, 'RtF3CtX4aODtcTLke2B4XQ/eHa2trJBAI0LBPWSQSiUQS27pklObOxczMzHwK\r\nBoNkp9D2OecuhlrZ4eHhAQzjR/QuAFDA6/WOuN3uNzvm9lAXs9+ibkTY17S0tMTS9vNGmi1wvzH5\r\nA6IYyjBEJzGODGOGyjGnLw4yF1pdTJy+FOEtQZtJBVOgv+FiEpmD5keqZFDE/5mLyZQXc+piUoGS\r\n6SvCXAyDMRiDMRhzMczFMBej28UIgvioprLtdJ6pIbHfC4VHHnuWXkuqqmh1MaJGF0MeVDpaGy5e\r\nuFp87nzi3D799cZ9VeUfepb6droYwI7mYmgpN4jN9qoqsjU7S2S/j+TBYKDNhUt9SaORGxdDSxRB\r\nFpyaIlHv9oZXRRSnBV7uXMysJL2fn54moVA4oWVJIjNSaESPixEPcDHWxcXFXb17urred9dm5UtE\r\nIREgy7Iy9mx981XapjYnLubQkksXk7Gw/2LYfzFsD8JgDMZge8tvAQYA4UyMetJVA'),
(3, 3, 'ok sa marche');

-- --------------------------------------------------------

--
-- Table structure for table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `id_membre` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  `grade` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `droit`
--

INSERT INTO `droit` (`id_membre`, `id_droit`, `grade`) VALUES
(1, 1, 'admin'),
(2, 1, 'admin'),
(3, 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `historique_membre`
--

CREATE TABLE IF NOT EXISTS `historique_membre` (
  `id_membre` int(110) NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  `date_post` date DEFAULT NULL,
  `date_last_modif` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historique_membre`
--

INSERT INTO `historique_membre` (`id_membre`, `id_commentaire`, `date_post`, `date_last_modif`) VALUES
(3, 1, '2014-12-09', '2014-12-09'),
(3, 2, '2014-12-09', '2014-12-09'),
(3, 3, '2014-12-09', '2014-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
`id_membre` int(11) NOT NULL,
  `id_droit` int(11) DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `date_de_naissance` date NOT NULL,
  `date_inscription` date NOT NULL,
  `pwd` varchar(255) COLLATE utf8_bin NOT NULL,
  `login` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `id_droit`, `mail`, `prenom`, `nom`, `date_de_naissance`, `date_inscription`, `pwd`, `login`) VALUES
(1, 2, 'tamaman@pokemon.fr', 'LaFlute', 'Tamere', '1992-08-11', '2014-12-11', '1a1dc91c907325c69271ddf0c944bc72', 'pikachu'),
(2, 2, 'thorna_c@epitech.eu', 'Clémentine', 'Thornary', '1992-08-11', '2014-12-12', '1a1dc91c907325c69271ddf0c944bc72', 'thorna_c'),
(3, 2, 'graul_v@epitech.eu', 'Vincent', 'Graul', '1998-02-12', '2014-12-12', '1a1dc91c907325c69271ddf0c944bc72', 'magicarpe'),
(4, 2, 'hocine.gougam@gmail.com', 'Hocine', 'Gougam', '1993-12-05', '2014-12-13', 'f9a7e67ca5d6790aa30b950a8f870ec0', 'monkey'),
(5, 2, 'hocine.gougam@gmail.com', 'Hocine', 'Gougam', '1993-12-05', '2014-12-13', '92c77b6ca13157c2e448f28cd12a684f', 'monkey'),
(21, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '1a1dc91c907325c69271ddf0c944bc72', 'bouboule'),
(22, 2, 'crash@nav.fr', 'Nav', 'Crash', '2014-12-15', '2014-12-15', 'c4eaac21ee045a2ff0877703a6f3b388', 'Crashnav'),
(23, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(24, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(25, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(26, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(27, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(28, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(29, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(30, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(31, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(32, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(33, 2, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '49c040447d066cb774f12f6134ff0b7d', 'Clem'),
(34, 2, 'tamaman@pokemon.fr', 'toto', 'yoyo', '1995-08-25', '2014-12-15', '1a1dc91c907325c69271ddf0c944bc72', 'pataprout'),
(35, 2, 'beors@epitech.fr', 'Sofiane', 'Beors', '1996-05-11', '2014-12-15', '99ed09726946175c6e7fb5791781e035', 'jedoismetaireplussouvent'),
(36, 2, 'clem@clem.fr', 'Yo', 'Coucou', '1995-08-16', '2014-12-15', '19b19ffc30caef1c9376cd2982992a59', 'ah');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `nom` varchar(25) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `date_envoi` date NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_membre` int(255) DEFAULT NULL,
  `id_lu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`nom`, `prenom`, `date_envoi`, `mail`, `message`, `id_membre`, `id_lu`) VALUES
('la plante a sion', '', '2014-12-09', '', 'coucou tu veut voir mon git', NULL, 0),
('psykokwak', '', '2014-12-09', '', 'bonjour, j''ai un probleme ...', 3, 0),
('Thornary', 'Clémentine', '2014-12-15', 'clem@clem.fr', 'Le site est trop cool maggle!', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`id_tag` int(255) NOT NULL,
  `id_commentaire` int(255) NOT NULL,
  `tag` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `id_commentaire`, `tag`) VALUES
(1, 0, 'magicarpe'),
(2, 0, 'pokemon'),
(3, 0, 'leviator'),
(4, 0, 'n''imp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billet`
--
ALTER TABLE `billet`
 ADD PRIMARY KEY (`id_billet`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
 ADD PRIMARY KEY (`id_commentaire`);

--
-- Indexes for table `historique_membre`
--
ALTER TABLE `historique_membre`
 ADD PRIMARY KEY (`id_commentaire`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
 ADD PRIMARY KEY (`id_membre`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`id_tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billet`
--
ALTER TABLE `billet`
MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id_commentaire` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
MODIFY `id_tag` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
