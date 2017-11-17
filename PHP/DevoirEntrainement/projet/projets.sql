-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Octobre 2017 à 17:14
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projets`
--

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(11) NOT NULL,
  `description` varchar(180) CHARACTER SET utf8 NOT NULL,
  `url` varchar(128) CHARACTER SET utf8 NOT NULL,
  `adresseMiniature` varchar(128) CHARACTER SET utf8 NOT NULL,
  `numSujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`id`, `description`, `url`, `adresseMiniature`, `numSujet`) VALUES
(1, 'Pandacadao de Natal Nagem', 'http://www.yahoo.fr', 'images/01.jpg', 1),
(2, 'Nagem X-mas', 'http://www.google.fr', 'images/02.jpg', 1),
(3, 'Brasil, Curta pernambuco', 'https://www.facebook.com/curtapernambuco', 'images/03.jpg', 1),
(4, 'Autonunes', 'http://www.autonunes.com.br/', 'images/04.jpg', 2),
(5, 'Eduardo Feitosa', 'http://www.eduardofeitosa.com.br/index.php', 'images/05.jpg', 2),
(6, 'ITC Natal', 'http://www.itcvertebral.com.br/natal-unidade', 'images/06.jpg', 3),
(11, 'projet num', 'http://www.google.com', 'images/google.png', 3),
(12, 'projet test', 'http://wwww.test.com', 'images/test.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE `sujets` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sujets`
--

INSERT INTO `sujets` (`id`, `nom`) VALUES
(1, 'Facebook'),
(2, 'Institutional Website'),
(3, 'Promotional Microsite');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `sujets`
--
ALTER TABLE `sujets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
