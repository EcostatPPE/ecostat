-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 05 Mai 2015 à 14:20
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ecostat_req`
--
DROP SCHEMA IF EXISTS ecostat;
CREATE SCHEMA ecostat;
USE ecostat;
-- --------------------------------------------------------

--
-- Structure de la table `q_sondage`
--

CREATE TABLE IF NOT EXISTS `q_sondage` (
  `codeQ_sondage` int(11) NOT NULL,
  `codeSondage` int(11) NOT NULL,
  `libelleQuestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `q_sondage`
--

INSERT INTO `q_sondage` (`codeQ_sondage`, `codeSondage`, `libelleQuestion`) VALUES
(1, 1, 'Aimes-tu les frites ?'),
(2, 1, 'Aimes tu les burgers ?');

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

CREATE TABLE IF NOT EXISTS `sondage` (
  `idSondage` int(11) NOT NULL,
  `libelleSondage` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sondage`
--

INSERT INTO `sondage` (`idSondage`, `libelleSondage`) VALUES
(1, 'PC'),
(2, 'Nutrition');

-- --------------------------------------------------------

--
-- Structure de la table `tb_sondage`
--

CREATE TABLE IF NOT EXISTS `tb_sondage` (
  `id_reponse` tinyint(4) NOT NULL DEFAULT '0',
  `compteur` bigint(20) NOT NULL DEFAULT '0',
  `libelle` varchar(255) NOT NULL DEFAULT '',
  `codeQ_Sondage` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tb_sondage`
--

INSERT INTO `tb_sondage` (`id_reponse`, `compteur`, `libelle`, `codeQ_Sondage`) VALUES
(1, 1, 'Oui', 1),
(2, 0, 'Non', 1),
(3, 0, 'Oui', 2),
(4, 0, 'Non', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
