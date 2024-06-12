
-- Base de données : `courrier`
--
CREATE DATABASE IF NOT EXISTS courrier ;
Use courrier ;

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `num` varchar(15) NOT NULL,
  `image` text NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `grade` text NOT NULL,
  `dep` varchar(255) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL
) 

--
-- Structure de la table `courrierarrive`
--

CREATE TABLE `courrierarrive` (
  `id` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `naturecour` varchar(15) NOT NULL,
  `confidentiel` varchar(5) NOT NULL,
  `datecourr` varchar(50) NOT NULL,
  `envoyerpar` varchar(50) NOT NULL,
  `distination` varchar(50) NOT NULL,
  `sousdistination` varchar(50) NOT NULL,
  `datetraite` varchar(50) NOT NULL,
  `remarque` text NOT NULL,
  `objet` text NOT NULL,
  `naturedoc` varchar(15) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL
) 

--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courrierarrive`
--
ALTER TABLE `courrierarrive`
  ADD PRIMARY KEY (`id`);


