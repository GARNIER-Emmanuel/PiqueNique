-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 07 Octobre 2022 à 06:13
-- Version du serveur :  5.6.20-log
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdpiquenique`
--

-- --------------------------------------------------------

--
-- Structure de la table `apport`
--

CREATE TABLE IF NOT EXISTS `apport` (
`idA` int(11) NOT NULL,
  `description` varchar(25) NOT NULL,
  `nbParts` int(11) NOT NULL,
  `idT` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `apport`
--

INSERT INTO `apport` (`idA`, `description`, `nbParts`, `idT`) VALUES
(1, 'Pizza au chèvre', 8, 1),
(2, 'Taboulé', 6, 2),
(3, 'Crêpes', 24, 3),
(4, 'Eau pétillante (1 l)', 3, 4),
(5, 'Assiettes réutilisables', 12, 5),
(10, 'Pizza 4 fromage', 6, 2),
(11, 'fesd', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
`idC` int(11) NOT NULL,
  `libelle` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`idC`, `libelle`) VALUES
(1, 'SIO1'),
(2, 'SIO2'),
(4, 'SIO5'),
(14, 'SIO3');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
`idE` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `idC` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`idE`, `nom`, `prenom`, `idC`) VALUES
(1, 'TOUILLE', 'Sacha', 1),
(2, 'VERSAIRE', 'Annie', 1),
(3, 'TEU', 'Thomas', 2),
(20, 'COVER', 'Harry', 2),
(21, 'a&quot;zer', 'qzers', 2);

-- --------------------------------------------------------

--
-- Structure de la table `faire`
--

CREATE TABLE IF NOT EXISTS `faire` (
  `idE` int(11) NOT NULL,
  `idA` int(11) NOT NULL,
  `qte` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faire`
--

INSERT INTO `faire` (`idE`, `idA`, `qte`) VALUES
(1, 5, '2'),
(2, 1, '5'),
(2, 2, ''),
(3, 3, ''),
(3, 4, '');

-- --------------------------------------------------------

--
-- Structure de la table `typeapport`
--

CREATE TABLE IF NOT EXISTS `typeapport` (
`idT` int(11) NOT NULL,
  `libelle` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `typeapport`
--

INSERT INTO `typeapport` (`idT`, `libelle`) VALUES
(1, '1-Entrée'),
(2, '2-Plat'),
(3, '3-Dessert'),
(4, '4-Boisson'),
(5, '5-Couverts'),
(6, '6-Fruits'),
(8, '6-Fruits');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apport`
--
ALTER TABLE `apport`
 ADD PRIMARY KEY (`idA`), ADD KEY `Apport_TypeApport_FK` (`idT`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
 ADD PRIMARY KEY (`idC`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
 ADD PRIMARY KEY (`idE`), ADD KEY `idC` (`idC`);

--
-- Index pour la table `faire`
--
ALTER TABLE `faire`
 ADD PRIMARY KEY (`idE`,`idA`), ADD KEY `idA` (`idA`);

--
-- Index pour la table `typeapport`
--
ALTER TABLE `typeapport`
 ADD PRIMARY KEY (`idT`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `apport`
--
ALTER TABLE `apport`
MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
MODIFY `idE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `typeapport`
--
ALTER TABLE `typeapport`
MODIFY `idT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apport`
--
ALTER TABLE `apport`
ADD CONSTRAINT `Apport_TypeApport_FK` FOREIGN KEY (`idT`) REFERENCES `typeapport` (`idT`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `classe` (`idC`);

--
-- Contraintes pour la table `faire`
--
ALTER TABLE `faire`
ADD CONSTRAINT `faire_ibfk_1` FOREIGN KEY (`idE`) REFERENCES `etudiant` (`idE`),
ADD CONSTRAINT `faire_ibfk_2` FOREIGN KEY (`idA`) REFERENCES `apport` (`idA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
