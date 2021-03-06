-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2014 at 10:59 AM
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
  `id_user` int(11) NOT NULL,
`id_billet` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `title` text COLLATE utf8_bin,
  `content` text COLLATE utf8_bin,
  `url` varchar(250) COLLATE utf8_bin NOT NULL,
  `img` varchar(250) COLLATE utf8_bin NOT NULL,
  `tags` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `billet`
--

INSERT INTO `billet` (`id_user`, `id_billet`, `id_tag`, `created`, `updated`, `title`, `content`, `url`, `img`, `tags`) VALUES
(1, 15, 0, '2014-12-18', NULL, 'Magicarpe Power', 'Petite présentation', 'https://www.youtube.com/watch?v=y-PArgnvqQ4', '', ''),
(1, 16, 0, '2014-12-18', NULL, 'Coucou', 'salut', 'https://www.youtube.com/watch?v=y6Sxv-sUYtM', '', ''),
(1, 17, 0, '2014-12-18', NULL, 'Coucou', 'salut', 'https://www.youtube.com/watch?v=y6Sxv-sUYtM', '', ''),
(1, 18, 0, '2014-12-18', NULL, 'dvdvd', ' v bv b\r\n\r\nlil:k;jh,ngbf vdccgbfvfd', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`id_commentaire` int(255) NOT NULL,
  `id_billet` int(25) NOT NULL,
  `date_com` date NOT NULL,
  `commentaire` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_billet`, `date_com`, `commentaire`) VALUES
(22, 15, '2014-12-19', 'Trop badass !');

-- --------------------------------------------------------

--
-- Table structure for table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `id_droit` int(11) NOT NULL,
  `grade` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `droit`
--

INSERT INTO `droit` (`id_droit`, `grade`) VALUES
(1, 'admin'),
(1, 'admin'),
(1, 'admin');

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
(1, 0, 'thorna_c@epitech.eu', 'Clémentine', 'Thornary', '1992-08-11', '2014-12-12', '1a1dc91c907325c69271ddf0c944bc72', 'pikachu'),
(2, 1, 'graul_v@epitech.eu', 'Vincent', 'Graul', '1998-02-12', '2014-12-12', '1a1dc91c907325c69271ddf0c944bc72', 'magicarpe'),
(3, 1, 'didelot_t@epitech.eu', 'Tim', 'Didelot', '1955-07-01', '2014-12-13', '92c77b6ca13157c2e448f28cd12a684f', 'leviator'),
(4, 1, 'bouh.lou@bouboule.fr', 'Lou', 'Bouh', '1995-08-16', '2014-12-15', '1a1dc91c907325c69271ddf0c944bc72', 'bouboule'),
(5, 2, 'crash@nav.fr', 'Nav', 'Crash', '2014-12-15', '2014-12-15', 'c4eaac21ee045a2ff0877703a6f3b388', 'Crashnav'),
(34, 2, 'tamaman@pokemon.fr', 'toto', 'yoyo', '1995-08-25', '2014-12-15', '1a1dc91c907325c69271ddf0c944bc72', 'pataprout'),
(35, 2, 'beors@epitech.fr', 'Sofiane', 'Beors', '1996-05-11', '2014-12-15', '99ed09726946175c6e7fb5791781e035', 'jedoismetaireplussouvent'),
(36, 2, 'clem@clem.fr', 'Yo', 'Coucou', '1995-08-16', '2014-12-15', '19b19ffc30caef1c9376cd2982992a59', 'ah');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id_message` int(25) NOT NULL,
  `nom` varchar(25) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `date_envoi` date NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_membre` int(255) DEFAULT NULL,
  `id_lu` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_message`, `nom`, `prenom`, `date_envoi`, `mail`, `message`, `id_membre`, `id_lu`) VALUES
(1, 'la plante a sion', '', '2014-12-09', '', 'coucou tu veut voir mon git', NULL, 2),
(4, 'THornary', 'Clémentine', '2014-12-18', 'clem@clem.fr', 'Salut', NULL, 2),
(5, 'Graul', 'Vincent', '2014-12-19', 'vingicarpe@pokemon.com', 'BBCODE', NULL, 0),
(6, '45', '454', '2014-12-19', '454', '454', NULL, 0);

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
 ADD PRIMARY KEY (`id_billet`), ADD KEY `tags` (`tags`);

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
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id_message`);

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
MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id_commentaire` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `id_message` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
MODIFY `id_tag` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
