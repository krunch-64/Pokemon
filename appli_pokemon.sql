-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 23 nov. 2022 à 08:42
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appli_pokemon`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `joueur_id` int NOT NULL,
  `joueur_name` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `joueur_score` int NOT NULL,
  `date` varchar(45) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `pokemon_id` int NOT NULL,
  `pokemon_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pokemon_element` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pokemon_hp` int NOT NULL,
  `pokemon_attack` int NOT NULL,
  `pokemon_defense` int NOT NULL,
  `pokemon_damage_from` json NOT NULL,
  `pokemon_img_front` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pokemon_img_back` varchar(99) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pokemon`
--

INSERT INTO `pokemon` (`pokemon_id`, `pokemon_name`, `pokemon_element`, `pokemon_hp`, `pokemon_attack`, `pokemon_defense`, `pokemon_damage_from`, `pokemon_img_front`, `pokemon_img_back`) VALUES
(1, 'bulbasaur', 'grass', 45, 49, 49, '[\"flying\", \"poison\", \"bug\", \"fire\", \"ice\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/1.png'),
(2, 'ivysaur', 'grass', 60, 62, 63, '[\"flying\", \"poison\", \"bug\", \"fire\", \"ice\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/2.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/2.png'),
(3, 'venusaur', 'grass', 80, 82, 83, '[\"flying\", \"poison\", \"bug\", \"fire\", \"ice\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/3.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/3.png'),
(4, 'charmander', 'fire', 39, 52, 43, '[\"ground\", \"rock\", \"water\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/4.png'),
(5, 'charmeleon', 'fire', 58, 64, 58, '[\"ground\", \"rock\", \"water\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/5.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/5.png'),
(6, 'charizard', 'fire', 78, 84, 78, '[\"ground\", \"rock\", \"water\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/6.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/6.png'),
(7, 'squirtle', 'water', 44, 48, 65, '[\"grass\", \"electric\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/7.png'),
(8, 'wartortle', 'water', 59, 63, 80, '[\"grass\", \"electric\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/8.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/8.png'),
(9, 'blastoise', 'water', 79, 83, 100, '[\"grass\", \"electric\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/9.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/9.png'),
(10, 'caterpie', 'bug', 45, 30, 35, '[\"flying\", \"rock\", \"fire\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/10.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/10.png'),
(11, 'metapod', 'bug', 50, 20, 55, '[\"flying\", \"rock\", \"fire\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/11.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/11.png'),
(12, 'butterfree', 'bug', 60, 45, 50, '[\"flying\", \"rock\", \"fire\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/12.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/12.png'),
(13, 'weedle', 'bug', 40, 35, 30, '[\"flying\", \"rock\", \"fire\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/13.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/13.png'),
(14, 'kakuna', 'bug', 45, 25, 50, '[\"flying\", \"rock\", \"fire\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/14.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/14.png'),
(15, 'beedrill', 'bug', 65, 90, 40, '[\"flying\", \"rock\", \"fire\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/15.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/15.png'),
(16, 'pidgey', 'normal', 40, 45, 40, '[\"fighting\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/16.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/16.png'),
(17, 'pidgeotto', 'normal', 63, 60, 55, '[\"fighting\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/17.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/17.png'),
(18, 'pidgeot', 'normal', 83, 80, 75, '[\"fighting\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/18.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/18.png'),
(19, 'rattata', 'normal', 30, 56, 35, '[\"fighting\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/19.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/19.png'),
(20, 'raticate', 'normal', 55, 81, 60, '[\"fighting\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/20.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/20.png'),
(21, 'spearow', 'normal', 40, 60, 30, '[\"fighting\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/21.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/21.png'),
(22, 'fearow', 'normal', 65, 90, 65, '[\"fighting\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/22.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/22.png'),
(23, 'ekans', 'poison', 35, 60, 44, '[\"ground\", \"psychic\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/23.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/23.png'),
(24, 'arbok', 'poison', 60, 95, 69, '[\"ground\", \"psychic\"]', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/24.png', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/24.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`joueur_id`);

--
-- Index pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`pokemon_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `joueur_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
