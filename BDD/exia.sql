-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 01 fév. 2019 à 21:11
-- Version du serveur :  5.7.23
-- Version de PHP :  7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exia`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Cloth Brand');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(3, 1, '::1', 1, 1),
(4, 37, '::1', 3, 1),
(5, 39, '::1', 3, 1),
(6, 36, '::1', 3, 1),
(7, 4, '::1', 4, 1),
(8, 48, '::1', 4, 1),
(10, 24, '::1', 22, 1),
(11, 25, '::1', 22, 1),
(14, 3, '::1', 22, 1),
(15, 4, '::1', 22, 1),
(16, 5, '::1', 22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronics'),
(2, 'Ladies Wears'),
(3, 'Mens Wear'),
(4, 'Kids Wear'),
(5, 'Furnitures'),
(6, 'Home Appliances'),
(7, 'Electronics Gadgets');

-- --------------------------------------------------------

--
-- Structure de la table `commentlikes`
--

CREATE TABLE `commentlikes` (
  `commentlikeID` int(11) NOT NULL,
  `commentlikeUserID` int(11) NOT NULL,
  `commentlikeCommentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentlikes`
--

INSERT INTO `commentlikes` (`commentlikeID`, `commentlikeUserID`, `commentlikeCommentID`) VALUES
(1, 22, 15),
(2, 15, 15),
(3, 22, 6),
(4, 22, 16),
(5, 22, 1),
(6, 22, 8),
(7, 15, 8),
(8, 15, 7),
(9, 15, 1),
(10, 15, 16),
(11, 22, 21),
(12, 15, 21),
(13, 28, 22),
(14, 4, 27),
(15, 4, 28),
(16, 22, 30),
(17, 22, 31),
(18, 22, 32),
(19, 22, 34);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `commentUserID` int(11) NOT NULL,
  `commentpostID` int(11) NOT NULL,
  `commentUserName` text NOT NULL,
  `commentText` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`commentID`, `commentUserID`, `commentpostID`, `commentUserName`, `commentText`, `timestamp`, `status`) VALUES
(17, 22, 19, 'abdelhamid', 'fqsfqsf', '2019-01-27 15:14:48', 1),
(20, 22, 17, 'abdelhamid', 'fsqlÃ¹fnqsÃ¹fg', '2019-01-27 15:14:51', 1),
(23, 22, 33, 'Abdelhamid', 'test', '2019-01-29 10:53:59', 0),
(24, 22, 33, 'Abdelhamid', 'fsqffqs', '2019-01-29 11:18:49', 0),
(25, 22, 17, 'Abdelhamid', 'hlv', '2019-01-29 12:37:59', 0),
(26, 22, 32, 'Abdelhamid', 'fqsfqsjfmqsbfhkmqs', '2019-01-29 13:03:53', 0),
(30, 22, 39, 'Abdelhamid', 'gsdrgrdshgs', '2019-01-30 09:05:11', 0),
(33, 22, 27, 'Abdelhamid', 'fqsMBFlqkghbkSMFHQB mglhqs', '2019-02-01 19:46:13', 1),
(34, 22, 42, 'Abdelhamid', 'fqSFq', '2019-02-01 19:48:05', 0);

-- --------------------------------------------------------

--
-- Structure de la table `idea`
--

CREATE TABLE `idea` (
  `ideaID` smallint(5) UNSIGNED NOT NULL,
  `ideaHeadline` text NOT NULL,
  `ideaStory` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT '2019-01-01 00:00:01',
  `meetingTime` datetime NOT NULL,
  `ideaStyle` text NOT NULL,
  `ideaFee` text NOT NULL,
  `ideaUserID` int(11) NOT NULL,
  `ideaUserName` varchar(50) NOT NULL,
  `ideaUserCampus` text NOT NULL,
  `ideaUserEmail` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `idea`
--

INSERT INTO `idea` (`ideaID`, `ideaHeadline`, `ideaStory`, `timestamp`, `meetingTime`, `ideaStyle`, `ideaFee`, `ideaUserID`, `ideaUserName`, `ideaUserCampus`, `ideaUserEmail`, `status`, `approved`) VALUES
(25, 'LOREM ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '2019-01-28 09:55:41', '2018-06-12 19:30:00', '---', '---', 22, 'abdelhamid', 'Alger', 'abdelhamid@gmail.com', 0, 1),
(26, 'why do we use it ?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', '2019-01-28 09:55:54', '2018-06-12 19:30:00', '---', '---', 22, 'abdelhamid', 'Alger', 'abdelhamid@gmail.com', 0, 1),
(27, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2019-01-28 09:56:08', '2018-06-12 19:30:00', '---', '---', 22, 'abdelhamid', 'Alger', 'abdelhamid@gmail.com', 0, 1),
(42, 'test report for salaried', 'dqksjFBqksbfqksHBFQpkshbgqphBIPShgb', '2019-02-01 20:45:43', '2018-06-12 19:30:00', '---', '---', 22, 'Abdelhamid', '', 'abdelhamid@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `imagelikes`
--

CREATE TABLE `imagelikes` (
  `imagelikeID` int(11) NOT NULL,
  `imagelikeUserID` int(11) NOT NULL,
  `imagelikeImageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imagelikes`
--

INSERT INTO `imagelikes` (`imagelikeID`, `imagelikeUserID`, `imagelikeImageID`) VALUES
(1, 22, 107),
(2, 22, 108),
(3, 15, 108),
(4, 15, 107),
(5, 22, 111),
(6, 15, 111),
(7, 4, 122),
(8, 22, 123),
(9, 22, 125),
(10, 22, 129);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `imagePostID` int(11) NOT NULL,
  `imageUserName` text NOT NULL,
  `imageUserID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `image_text`, `image`, `imagePostID`, `imageUserName`, `imageUserID`, `status`) VALUES
(107, 'hhhh', '6.jpg', 16, 'abdelhamid', 22, 0),
(108, 'jjj', '4.jpg', 16, 'abdelhamid', 22, 0),
(110, 'DELL XPS', '4.jpg', 17, 'abdelhamid', 22, 1),
(112, 'say something about this pic', '3.jpg', 29, 'soltanee', 28, 0),
(120, 'fff', '5.jpg', 33, 'Abdelhamid', 22, 1),
(121, 'sqfqsf', '3.jpg', 34, 'Abdelhamid', 22, 1),
(124, 'hdshdsh', '4.jpg', 26, 'Abdelhamid', 22, 1),
(126, 'jglk', '4.jpg', 39, 'Abdelhamid', 22, 0),
(130, 'Fqsfq', '4.jpg', 27, 'Abdelhamid', 22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `likePostID` int(11) NOT NULL,
  `likeUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`likeID`, `likePostID`, `likeUserID`) VALUES
(1, 20, 22),
(2, 20, 15),
(3, 24, 22),
(4, 19, 22),
(5, 28, 22),
(6, 28, 15),
(7, 29, 28),
(8, 28, 28),
(9, 36, 4),
(10, 35, 4),
(11, 37, 22),
(12, 39, 22),
(13, 26, 22),
(14, 41, 22),
(15, 25, 22),
(16, 27, 22);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 7, 1, '07M47684BS5725041', 'Completed'),
(2, 2, 2, 1, '07M47684BS5725041', 'Completed');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_commande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `product_commande`) VALUES
(3, 1, 3, 'iPad', 30000, 'ipad apple brand', 'ipad.jpg', 'apple ipad tablet', NULL),
(4, 1, 3, 'iPhone 6s', 32000, 'Apple iPhone ', 'iphone.jpg', 'iphone apple mobile', NULL),
(5, 1, 2, 'iPad 2', 10000, 'samsung ipad', 'ipad 2.jpg', 'ipad tablet samsung', NULL),
(6, 1, 1, 'Hp Laptop r series', 35000, 'Hp Red and Black combination Laptop', 'k2-_ed8b8f8d-e696-4a96-8ce9-d78246f10ed1.v1.jpg-bc204bdaebb10e709a997a8bb4518156dfa6e3ed-optim-450x450.jpg', 'hp laptop ', NULL),
(7, 1, 1, 'Laptop Pavillion', 50000, 'Laptop Hp Pavillion', '12039452_525963140912391_6353341236808813360_n.png', 'Laptop Hp Pavillion', NULL),
(8, 1, 4, 'Sony', 40000, 'Sony Mobile', 'sony mobile.jpg', 'sony mobile', NULL),
(9, 1, 3, 'iPhone New', 12000, 'iphone', 'white iphone.png', 'iphone apple mobile', NULL),
(10, 2, 6, 'Red Ladies dress', 1000, 'red dress for girls', 'red dress.jpg', 'red dress ', NULL),
(11, 2, 6, 'Blue Heave dress', 1200, 'Blue dress', 'images.jpg', 'blue dress cloths', NULL),
(12, 2, 6, 'Ladies Casual Cloths', 1500, 'ladies casual summer two colors pleted', '7475-ladies-casual-dresses-summer-two-colors-pleated.jpg', 'girl dress cloths casual', NULL),
(13, 2, 6, 'SpringAutumnDress', 1200, 'girls dress', 'Spring-Autumn-Winter-Young-Ladies-Casual-Wool-Dress-Women-s-One-Piece-Dresse-Dating-Clothes-Medium.jpg_640x640.jpg', 'girl dress', NULL),
(14, 2, 6, 'Casual Dress', 1400, 'girl dress', 'download.jpg', 'ladies cloths girl', NULL),
(15, 2, 6, 'Formal Look', 1500, 'girl dress', 'shutterstock_203611819.jpg', 'ladies wears dress girl', NULL),
(17, 3, 6, 'Gents formal', 1000, 'gents formal look', 'gents-formal-250x250.jpg', 'gents wear cloths', NULL),
(19, 3, 6, 'Formal Coat', 3000, 'ad', 'images (1).jpg', 'coat blazer gents', NULL),
(20, 3, 6, 'Mens Sweeter', 1600, 'jg', 'Winter-fashion-men-burst-sweater.png', 'sweeter gents ', NULL),
(26, 4, 6, 'Skyblue dress', 650, 'nbk', 'kids-wear-121.jpg', 'skyblue kids dress', NULL),
(27, 4, 6, 'Formal look', 690, 'sd', 'image28.jpg', 'formal kids dress', NULL),
(32, 5, 0, 'Book Shelf', 2500, 'book shelf', 'furniture-book-shelf-250x250.jpg', 'book shelf furniture', NULL),
(33, 6, 2, 'Refrigerator', 35000, 'Refrigerator', 'CT_WM_BTS-BTC-AppliancesHome_20150723.jpg', 'refrigerator samsung', NULL),
(34, 6, 4, 'Emergency Light', 1000, 'Emergency Light', 'emergency light.JPG', 'emergency light', NULL),
(35, 6, 0, 'Vaccum Cleaner', 6000, 'Vaccum Cleaner', 'images (2).jpg', 'Vaccum Cleaner', NULL),
(36, 6, 5, 'Iron', 1500, 'gj', 'iron.JPG', 'iron', NULL),
(37, 6, 5, 'LED TV', 20000, 'LED TV', 'images (4).jpg', 'led tv lg', NULL),
(38, 6, 4, 'Microwave Oven', 3500, 'Microwave Oven', 'images.jpg', 'Microwave Oven', NULL),
(39, 6, 5, 'Mixer Grinder', 2500, 'Mixer Grinder', 'singer-mixer-grinder-mg-46-medium_4bfa018096c25dec7ba0af40662856ef.jpg', 'Mixer Grinder', NULL),
(40, 2, 6, 'Formal girls dress', 3000, 'Formal girls dress', 'girl-walking.jpg', 'ladies', NULL),
(45, 1, 2, 'Samsung Galaxy Note 3', 10000, '0', 'samsung_galaxy_note3_note3neo.JPG', 'samsung galaxy Note 3 neo', NULL),
(46, 1, 2, 'Samsung Galaxy Note 3', 10000, '', 'samsung_galaxy_note3_note3neo.JPG', 'samsung galxaxy note 3 neo', NULL),
(52, 1, 1, 'yrdgqrdg', 444, 'mac', '', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `role`) VALUES
(4, 'zizou', 'ait rabah', 'zizou@gmail.com', 'ae81d380d610814c52858e7fdc81cff0', '0665278843', 'france', 'paris', 2),
(5, 'soltane', 'benghazal', 'soltane@gmail.com', 'ae81d380d610814c52858e7fdc81cff0', '0667884312', 'usa', 'Alger', 1),
(22, 'Abdelhamid', 'Larachi', 'abdelhamid@gmail.com', 'ae81d380d610814c52858e7fdc81cff0', '0665278843', 'algeria', 'alger', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `voteUserID` int(11) NOT NULL,
  `voteUserName` varchar(50) NOT NULL,
  `voteUserEmail` varchar(50) NOT NULL,
  `voteUserCampus` text NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`voteUserID`, `voteUserName`, `voteUserEmail`, `voteUserCampus`, `postID`) VALUES
(22, 'Abdelhamid', 'abdelhamid@gmail.com', 'alger', 36),
(4, 'zizou', 'zizou@gmail.com', 'paris', 36),
(4, 'zizou', 'zizou@gmail.com', '', 34),
(4, 'zizou', 'zizou@gmail.com', 'paris', 35),
(22, 'Abdelhamid', 'abdelhamid@gmail.com', 'alger', 37),
(22, 'Abdelhamid', 'abdelhamid@gmail.com', 'alger', 39),
(22, 'Abdelhamid', 'abdelhamid@gmail.com', 'alger', 26),
(22, 'Abdelhamid', 'abdelhamid@gmail.com', 'alger', 41),
(22, 'Abdelhamid', 'abdelhamid@gmail.com', 'alger', 27),
(22, 'Abdelhamid', 'abdelhamid@gmail.com', 'alger', 42);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `commentlikes`
--
ALTER TABLE `commentlikes`
  ADD PRIMARY KEY (`commentlikeID`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Index pour la table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`ideaID`);

--
-- Index pour la table `imagelikes`
--
ALTER TABLE `imagelikes`
  ADD PRIMARY KEY (`imagelikeID`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commentlikes`
--
ALTER TABLE `commentlikes`
  MODIFY `commentlikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `idea`
--
ALTER TABLE `idea`
  MODIFY `ideaID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `imagelikes`
--
ALTER TABLE `imagelikes`
  MODIFY `imagelikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
