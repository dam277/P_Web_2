-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 18 mai 2022 à 14:38
-- Version du serveur :  5.7.11
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_web_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_appreciation`
--

CREATE TABLE `t_appreciation` (
  `idAppreciation` bigint(20) NOT NULL,
  `appEvaluation` float NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `idBook` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_appreciation`
--

INSERT INTO `t_appreciation` (`idAppreciation`, `appEvaluation`, `idUser`, `idBook`) VALUES
(1, 5, 1, 1),
(2, 4.5, 2, 1),
(3, 3.5, 3, 2),
(4, 3.5, 3, 3),
(5, 3.5, 3, 4),
(6, 3.5, 3, 5),
(7, 3.5, 3, 6),
(8, 3.5, 3, 7),
(9, 3.5, 3, 8),
(10, 3.5, 3, 9),
(11, 3.5, 3, 10),
(12, 3.5, 3, 11),
(13, 2.5, 2, 12),
(14, 2.5, 2, 13),
(15, 2.5, 2, 14),
(16, 2.5, 2, 15),
(17, 2.5, 2, 16),
(18, 2.5, 2, 17),
(19, 2.5, 2, 18),
(20, 2.5, 2, 19),
(21, 2.5, 2, 20),
(22, 2.5, 2, 21),
(23, 2.5, 2, 22),
(24, 2, 1, 22),
(25, 1, 1, 25),
(26, 2, 1, 26),
(27, 2, 1, 27),
(28, 2, 1, 28),
(29, 2, 1, 29),
(30, 2, 1, 30),
(31, 2, 1, 31),
(32, 2, 1, 32),
(33, 1.5, 1, 33),
(34, 1.5, 1, 34),
(35, 1.5, 1, 35),
(36, 1.5, 1, 36),
(37, 1.5, 1, 37),
(38, 1.5, 1, 38),
(39, 1.5, 1, 39),
(40, 1, 1, 40),
(41, 4, 2, 41),
(42, 4, 2, 42),
(43, 4, 2, 43),
(44, 4, 2, 44),
(45, 4, 2, 45),
(46, 4, 2, 46),
(47, 4, 2, 47),
(48, 4, 2, 48),
(49, 4, 2, 49),
(50, 4, 2, 50),
(51, 5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_book`
--

CREATE TABLE `t_book` (
  `idBook` bigint(20) NOT NULL,
  `booTitle` char(100) NOT NULL,
  `booPageNumber` bigint(20) NOT NULL,
  `booSummary` varchar(750) NOT NULL,
  `booAuthorName` char(100) NOT NULL,
  `booEditorName` char(100) NOT NULL,
  `booEditionYear` int(11) NOT NULL,
  `booExtract` varchar(1000) NOT NULL,
  `idUser` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_book`
--

INSERT INTO `t_book` (`idBook`, `booTitle`, `booPageNumber`, `booSummary`, `booAuthorName`, `booEditorName`, `booEditionYear`, `booExtract`, `idUser`) VALUES
(1, 'Franklin aimait manger ses chaussures', 1222, 'Il aime manger ses chaussures et lasser ses parents', 'Jean Dupont', 'Maison thorey', 2022, 'Il aime manger ses chaussures\r\n- Oh, c\'est trop bon, je peux en ravoir ? sinon je te lasse maman\r\n- Oui bien sur franklin\r\n- Merci, je vais quand même te lasser', 1),
(2, 'toto', 7070, 'toto', 'toto tata', 'toto', 2000, 'toto', 3),
(3, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(4, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(5, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 3),
(6, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(7, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(8, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(9, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(10, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(11, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 3),
(12, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(13, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(14, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(15, 'toto', 7070, 'toto', 'toto tata', 'toto', 2000, 'toto', 3),
(16, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(17, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(18, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 3),
(19, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(20, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(21, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(22, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(23, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(24, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 3),
(25, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(26, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(27, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(28, 'toto', 7070, 'toto', 'toto tata', 'toto', 2000, 'toto', 3),
(29, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(30, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(31, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 3),
(32, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(33, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(34, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(35, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(36, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(37, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 3),
(38, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(39, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(40, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(41, 'toto', 7070, 'toto', 'toto tata', 'toto', 2000, 'toto', 3),
(42, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(43, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(44, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 3),
(45, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(46, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(47, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(48, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 1),
(49, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 2),
(50, 'tata', 1222, 'etetew', 'toto tata', 'ERHERH', 2134, 'HRHWRHA', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_categorize`
--

CREATE TABLE `t_categorize` (
  `idBook` bigint(20) NOT NULL,
  `idCategory` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_categorize`
--

INSERT INTO `t_categorize` (`idBook`, `idCategory`) VALUES
(1, 1),
(1, 4),
(2, 1),
(3, 1),
(4, 2),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_category`
--

CREATE TABLE `t_category` (
  `idCategory` bigint(20) NOT NULL,
  `catName` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_category`
--

INSERT INTO `t_category` (`idCategory`, `catName`) VALUES
(1, 'Manga'),
(2, 'Livre'),
(3, 'Policier'),
(4, 'Roman');

-- --------------------------------------------------------

--
-- Structure de la table `t_session`
--

CREATE TABLE `t_session` (
  `idSession` bigint(20) NOT NULL,
  `idUser` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_session`
--

INSERT INTO `t_session` (`idSession`, `idUser`) VALUES
(9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` bigint(20) NOT NULL,
  `useNickname` char(50) NOT NULL,
  `useEntryDate` date NOT NULL,
  `usePermLevel` int(11) NOT NULL,
  `usePasswordHash` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useNickname`, `useEntryDate`, `usePermLevel`, `usePasswordHash`) VALUES
(1, 'Damien', '2022-05-18', 2, '$2y$10$8uzGFEUFVktqBJbwpbyCWu.5Y7YAbI1TT74sVe2hvin/DznqXtCo.'),
(2, 'Thomas le train', '2022-05-18', 2, '$2y$10$eKth8g0sZcdJ0/NuDPxYiOB4YolfTTRWeKHFs/kJjMQu3gGmsDEb6'),
(3, 'jean-mark', '2022-05-18', 1, '$2y$10$9ZfSmLNZkwqRSykQ/G68VuMHORo3/iFkotebUeQSzERdS.IqnNtfO'),
(4, 'Mathis', '2022-05-18', 2, '$2y$10$Y06XBBfDueeCAGHFr6Zbj.cywPnTaCG3X5FK6e0bB5SlyhFrTLEOK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_appreciation`
--
ALTER TABLE `t_appreciation`
  ADD PRIMARY KEY (`idAppreciation`),
  ADD UNIQUE KEY `ID_t_appreciation_IND` (`idAppreciation`),
  ADD KEY `FKt_rate_IND` (`idUser`),
  ADD KEY `FKt_isAbout_IND` (`idBook`);

--
-- Index pour la table `t_book`
--
ALTER TABLE `t_book`
  ADD PRIMARY KEY (`idBook`),
  ADD UNIQUE KEY `ID_t_book_IND` (`idBook`),
  ADD KEY `FKt_add_IND` (`idUser`);

--
-- Index pour la table `t_categorize`
--
ALTER TABLE `t_categorize`
  ADD PRIMARY KEY (`idCategory`,`idBook`),
  ADD UNIQUE KEY `ID_t_categorize_IND` (`idCategory`,`idBook`),
  ADD KEY `FKt_c_t_b_IND` (`idBook`);

--
-- Index pour la table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`idCategory`),
  ADD UNIQUE KEY `ID_t_category_IND` (`idCategory`);

--
-- Index pour la table `t_session`
--
ALTER TABLE `t_session`
  ADD PRIMARY KEY (`idSession`),
  ADD UNIQUE KEY `FKt_isPartOf_ID` (`idUser`),
  ADD UNIQUE KEY `ID_t_session_IND` (`idSession`),
  ADD UNIQUE KEY `FKt_isPartOf_IND` (`idUser`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `ID_t_user_IND` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_appreciation`
--
ALTER TABLE `t_appreciation`
  MODIFY `idAppreciation` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `t_book`
--
ALTER TABLE `t_book`
  MODIFY `idBook` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `idCategory` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_session`
--
ALTER TABLE `t_session`
  MODIFY `idSession` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_appreciation`
--
ALTER TABLE `t_appreciation`
  ADD CONSTRAINT `FKt_isAbout_FK` FOREIGN KEY (`idBook`) REFERENCES `t_book` (`idBook`),
  ADD CONSTRAINT `FKt_rate_FK` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_book`
--
ALTER TABLE `t_book`
  ADD CONSTRAINT `FKt_add_FK` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_categorize`
--
ALTER TABLE `t_categorize`
  ADD CONSTRAINT `FKt_c_t_b_FK` FOREIGN KEY (`idBook`) REFERENCES `t_book` (`idBook`),
  ADD CONSTRAINT `FKt_c_t_c` FOREIGN KEY (`idCategory`) REFERENCES `t_category` (`idCategory`);

--
-- Contraintes pour la table `t_session`
--
ALTER TABLE `t_session`
  ADD CONSTRAINT `FKt_isPartOf_FK` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
