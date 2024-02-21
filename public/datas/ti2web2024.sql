-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mer. 14 fév. 2024 à 10:18
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.2.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `ti2web2024`
--
DROP DATABASE IF EXISTS `ti2web2024`;
CREATE DATABASE IF NOT EXISTS `ti2web2024` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ti2web2024`;

-- --------------------------------------------------------

--
-- Structure de la table `livreor`
--

DROP TABLE IF EXISTS `livreor`;
CREATE TABLE IF NOT EXISTS `livreor` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `firstname` varchar(100) NOT NULL,
    `lastname` varchar(100) DEFAULT NULL,
    `usermail` varchar(200) NOT NULL,
    `message` varchar(600) NOT NULL,
    `datemessage` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livreor`
--

INSERT INTO `livreor` (`id`, `firstname`, `lastname`, `usermail`, `message`, `datemessage`) VALUES
                                                                                                (1, 'Mike', 'Pitz', 'mike@cf2m.be', 'Cum crebris vero idque potentissimorumque clarissimorum tuis quam nostrorum magnitudine sed sunt citius populorum nec.', '2024-02-14 10:09:56'),
                                                                                                (2, 'Pierre', 'Sandron', 'pierre@cf2m.be', 'Et quavis Gallus et saluti viri armatos iussit telo vobiscum vobiscum fortes stridens stridens telo.', '2024-02-14 10:10:43'),
                                                                                                (3, 'Magib', 'Saal', 'magib@gmail.com', 'Fruticeta ponderum necessitate discursatore sublimes ex rupium sublimes abscisa abscisa valido nostri plantis firmare discedunt.', '2024-02-14 10:14:45'),
                                                                                                (4, 'André', 'Palmisano', 'andre@cf2m.be', 'Per mare obsidionale nunc nunc latus militibus gravi ullum gravi obsidionale nomine quoniam latus obsidionale.', '2024-02-14 10:16:58');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
