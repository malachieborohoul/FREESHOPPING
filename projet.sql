-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 mai 2021 à 19:23
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `prix` varchar(11) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `id_img` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `contenu`, `prix`, `etat`, `marque`, `id_img`, `id_type`, `id_genre`, `id`) VALUES
(12, 'ggg', 'yhryr', '4444', 'neuf etiquetté', 'jjj', 19, 1, 1, 0),
(13, 'babouche', 'bien', '1500', 'satisfaisant', 'gucci', 20, 2, 2, 0),
(14, 'pieds-nu', 'rose', '2000', 'bon etat', 'louis viton', 21, 2, 2, 0),
(15, 'balerine', 'jolir', '1500', 'neuf etiquetté', 'gucci', 22, 2, 2, 0),
(16, 'balerine', 'il s\'agit ', '1500', 'neuf etiquetté', 'fendi', 23, 2, 2, 0),
(17, 'sandale', 'sandale de couleur rose ,taille 39', '1000', 'tres bon etat', 'aucun', 24, 2, 2, 0),
(18, 'soutien', 'couleur rose taille 25', '500', 'neuf etiquetté', 'none', 25, 1, 1, 0),
(19, 'telephone', 'bl', '55000', 'neuf etiquetté', 'techno', 26, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_panier`
--

CREATE TABLE `categorie_panier` (
  `id_categorie` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie_panier`
--

INSERT INTO `categorie_panier` (`id_categorie`, `designation`) VALUES
(1, 'dressing en vitrine'),
(2, 'boutique');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
(1, 'Homme'),
(2, 'Femme'),
(3, 'enfant'),
(5, 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_img` int(11) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_img`, `img1`, `img2`, `img3`, `img4`) VALUES
(1, 'svgA5711580197940052.png', 'svgA9874936527393319.png', NULL, NULL),
(2, '20201230_141529.jpg', '20201230_141553.jpg', '20201230_141610.jpg', '20201230_141614.jpg'),
(3, '20201230_141628.jpg', '20201230_141629.jpg', '20201230_141630.jpg', NULL),
(4, '20201230_141628.jpg', '20201230_141629.jpg', '20201230_141630.jpg', NULL),
(5, '20201230_141628.jpg', '20201230_141629.jpg', '20201230_141630.jpg', NULL),
(6, '20201230_141628.jpg', '20201230_141629.jpg', '20201230_141630.jpg', NULL),
(7, '20201230_141628.jpg', '20201230_141629.jpg', '20201230_141630.jpg', NULL),
(8, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(9, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(10, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(11, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(12, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(13, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(14, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(15, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(16, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(17, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(18, '20201230_141630.jpg', '20201230_141634.jpg', '20201230_141635.jpg', NULL),
(19, 'IMG_7539.jpeg', 'IMG_7540.jpeg', 'IMG_7542.jpeg', 'IMG_7544.jpeg'),
(20, '20201230_141529.jpg', NULL, NULL, NULL),
(21, '20201230_141614.jpg', NULL, NULL, NULL),
(22, 'svgA5711580197940052.png', NULL, NULL, NULL),
(23, 'svgA9874936527393319.png', NULL, NULL, NULL),
(24, 'images (1).jpeg', NULL, NULL, NULL),
(25, 'images.jpg', NULL, NULL, NULL),
(26, 'svgA5711580197940052.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `liked`
--

CREATE TABLE `liked` (
  `id_liked` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_article` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier_publ`
--

CREATE TABLE `panier_publ` (
  `id_panier` int(11) NOT NULL,
  `date_panier` date NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier_publ`
--

INSERT INTO `panier_publ` (`id_panier`, `date_panier`, `id_article`, `id_categorie`) VALUES
(1, '2021-05-11', 13, 2);

-- --------------------------------------------------------

--
-- Structure de la table `publier`
--

CREATE TABLE `publier` (
  `idPub` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `id_panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_article`
--

CREATE TABLE `type_article` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_article`
--

INSERT INTO `type_article` (`id_type`, `libelle`) VALUES
(1, 'Vetement'),
(2, 'Chaussure'),
(3, 'scolaire'),
(4, 'maison'),
(5, 'scolaire'),
(6, 'maison'),
(7, 'appareils');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `image`) VALUES
(53, 'Malachie', 'malachie@gmail.com', 'admin', '1234', '916449.jpg'),
(73, 'papa', 'papa@gmail.com', 'user', '1234', '305341.jpg'),
(74, 'meli', 'melissandjibe@gmail.com', 'user', '1234', '196474.jpg'),
(75, 'meli', 'melissandjibe@gmail.com', 'user', '1234', '356986.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_img` (`id_img`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Index pour la table `categorie_panier`
--
ALTER TABLE `categorie_panier`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id_liked`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `panier_publ`
--
ALTER TABLE `panier_publ`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `publier`
--
ALTER TABLE `publier`
  ADD PRIMARY KEY (`idPub`),
  ADD KEY `id_panier` (`id_panier`);

--
-- Index pour la table `type_article`
--
ALTER TABLE `type_article`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `categorie_panier`
--
ALTER TABLE `categorie_panier`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `liked`
--
ALTER TABLE `liked`
  MODIFY `id_liked` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier_publ`
--
ALTER TABLE `panier_publ`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `publier`
--
ALTER TABLE `publier`
  MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_article`
--
ALTER TABLE `type_article`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_img`) REFERENCES `image` (`id_img`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_type`) REFERENCES `type_article` (`id_type`),
  ADD CONSTRAINT `article_ibfk_4` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Contraintes pour la table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `liked_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `liked_ibfk_3` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `panier_publ`
--
ALTER TABLE `panier_publ`
  ADD CONSTRAINT `panier_publ_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `panier_publ_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_panier` (`id_categorie`);

--
-- Contraintes pour la table `publier`
--
ALTER TABLE `publier`
  ADD CONSTRAINT `publier_ibfk_1` FOREIGN KEY (`id_panier`) REFERENCES `panier_publ` (`id_panier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
