-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 24 avr. 2021 à 11:46
-- Version du serveur :  8.0.21
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `autocompletion`
--

-- --------------------------------------------------------

--
-- Structure de la table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `results`
--

INSERT INTO `results` (`id`, `nom`, `description`) VALUES
(1, 'Celldweller', 'Artiste de musique électro'),
(2, 'Youtube', 'Site de partage de vidéos'),
(3, 'Github', 'Site collaboratif pour les développeurs'),
(4, 'Chien', 'Animal de type canidé, meilleur ami de l\'homme'),
(5, 'Nike', 'Marque de vêtements de sport'),
(6, 'Adidas', 'Marque de vêtements de sport'),
(7, 'OnePlus', 'Entreprise chinoise de construction de téléphones'),
(8, 'Couteau', 'Objet tranchant et potentiellement pointu'),
(9, 'Epée', 'Objet tranchant et pointu'),
(10, 'Médicament', 'Permet de guérir certaines maladies et/ou leurs symptômes'),
(11, 'Bocal', 'Conteneur généralement en plastique ou en verre'),
(12, 'Assiette', 'Vaisselle généralement de forme plate ou incurvée'),
(13, 'Câble', 'Cordon servant généralement à relier deux points électriques'),
(14, 'Google', 'Site de recherche'),
(15, 'Lunettes', 'Objet correctif de la vision et/ou protégeant du soleil'),
(16, 'Serviette', 'Permet de sécher un liquide ou d\'essuyer des surfaces'),
(17, 'Eponge', 'Objet mousseux et/ou abrasif permettant de faire la vaisselle'),
(18, 'Perroquet', 'Animal de type oiseau'),
(19, 'Pigeon', 'Animal de type oiseau'),
(20, 'Stylo', 'Objet utilisant de l\'encre pour écrire'),
(21, 'Encre', 'Liquide permettant au stylo d\'écrire'),
(22, 'Tablette', 'Peut être numérique, de dessin ou de chocolat'),
(23, 'Plaquette', 'Peut être de frein ou de beurre'),
(24, 'Mouchoir', 'Objet en papier permettant de se moucher ou de s\'essuyer'),
(25, 'The Honeycombs', 'Groupe britannique de pop des années 60'),
(26, 'Adam & the Ants', 'Groupe britannique de punk rock des années 70'),
(27, 'Adam Ant', 'De son nom Stuart Leslie Goddard, chanteur du groupe Adam & the Ants'),
(28, 'Frank Sinatra', 'Chanteur, acteur et producteur de musique'),
(29, 'Dean Martin', 'Crooner et acteur américain'),
(30, 'Bill Crosby', 'Chanteur et acteur américain'),
(31, 'Bugzy Malone', 'Rappeur et acteur britannique'),
(32, 'Bugsy Malone ', 'En France Du rififi chez les mômes, est un film sorti en 1976'),
(33, 'The Real Mckenzies', 'Groupe de punk rock celtique canadien fondé en 1992'),
(34, 'Leningrad ( musique )', 'Groupe de ska-rock russe fondé en 1997'),
(35, 'Saint-Pétersbourg', 'Aussi connue sous le nom Leningrad ou Petrograd, ville Russe fondée en 1703'),
(36, 'Dion', 'De son nom Dion Francis DiMucci est un chanteur américain de rock'),
(37, 'The High Kings', 'Groupe de musique vocale irlandais '),
(38, 'Svinkels', 'Ne pas confondre avec License IV, groupe de hip-hop français'),
(39, 'License IV', 'Groupe de musique populaire français fin 80 début 90'),
(40, 'Alestorm', 'Groupe de musique de folk metal écossais fondé en 2004'),
(41, 'Cuillère', 'Vaisselle au bout incurvé permettant de manger des désserts'),
(42, 'Tournevis', 'Ça tourne des vis'),
(43, 'Vis', 'Besoin d\'un tournevis pour les tourner'),
(44, 'Lampe', 'Objet lumineux permettant de voir dans l\'obscurité'),
(45, 'Obscurité', 'Absence de lumière'),
(46, 'Les Simpson', 'Aux Etats-Unis The Simpsons est une série d\'animation américaine'),
(47, 'South Park', 'Série d\'animation américaine'),
(48, 'Patrick', 'Personne ne l\'attend jamais'),
(49, 'Joueur du Grenier', 'Youtubeur français axé sur le jeu vidéo'),
(50, 'Cherdleys', 'Chaine comique de youtubeurs américain '),
(51, 'Sanfédisme', 'Mouvement populaire anti-républicain à l\'initiative du cardinal Fabrizio Dionigi Ruffo'),
(52, 'Scandroid', 'Artiste de musique créé par Celldweller'),
(53, 'Filthy Frank', 'Ex-youtubeur américain, maintenant artiste de musique');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
