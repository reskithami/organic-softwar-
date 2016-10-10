-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 18 Août 2016 à 09:13
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ci_gael`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_type` varchar(45) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `foreign_type` varchar(45) NOT NULL,
  `address` varchar(500) NOT NULL,
  `address2` varchar(500) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `phone2` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `zip` varchar(45) NOT NULL,
  `lat` varchar(45) NOT NULL,
  `lon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `init_date` datetime NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `session_id` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cart`
--

INSERT INTO `cart` (`cart_id`, `init_date`, `customer_id`, `session_id`, `status`) VALUES
(1, '2016-05-22 11:55:11', 17, '17', 'open');

-- --------------------------------------------------------

--
-- Structure de la table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type_product` varchar(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `date_added` datetime NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cart_item`
--

INSERT INTO `cart_item` (`cart_item_id`, `cart_id`, `product_id`, `type_product`, `quantity`, `price`, `total`, `start_date`, `end_date`, `date_added`, `teacher`) VALUES
(1, 1, 1, 'vente', 1, 10, 10, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '2016-05-22 11:55:20', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('14cdb4b548f647641fad3efe63ea116b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0', 1457554405, '');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'customer', 'Client'),
(4, 'prof', ''),
(5, 'vendeur', '');

-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `name`, `logo`) VALUES
(1, 'constructeur de plache', ''),
(2, 'constructeur de pagais', ''),
(4, 'constructeur de voile', '');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL DEFAULT '0',
  `invoice_prefix` varchar(26) NOT NULL,
  `order_status_array_id` smallint(3) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `saller_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `payment_firstname` varchar(32) NOT NULL,
  `payment_lastname` varchar(32) NOT NULL,
  `payment_company` varchar(40) NOT NULL,
  `payment_address_1` varchar(128) NOT NULL,
  `payment_address_2` varchar(128) NOT NULL,
  `payment_city` varchar(128) NOT NULL,
  `payment_zip` varchar(10) NOT NULL,
  `payment_country` varchar(128) NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `payment_code` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `affiliate_id` int(11) NOT NULL,
  `commission` decimal(15,4) NOT NULL,
  `tracking` varchar(64) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `currency_value` decimal(15,8) NOT NULL DEFAULT '1.00000000',
  `ip` varchar(40) NOT NULL,
  `forwarded_ip` varchar(40) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `accept_language` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `order`
--

INSERT INTO `order` (`order_id`, `invoice_no`, `invoice_prefix`, `order_status_array_id`, `customer_id`, `saller_id`, `firstname`, `lastname`, `email`, `phone`, `payment_firstname`, `payment_lastname`, `payment_company`, `payment_address_1`, `payment_address_2`, `payment_city`, `payment_zip`, `payment_country`, `payment_method`, `payment_code`, `comment`, `total`, `affiliate_id`, `commission`, `tracking`, `language_code`, `currency_id`, `currency_code`, `currency_value`, `ip`, `forwarded_ip`, `user_agent`, `accept_language`, `date_added`, `date_modified`) VALUES
(3, 0, '123', 1, 2, 1, 'tralala', 'tralalal', '', '', 'tralala', 'tralalal', '', '', '', '', '', '', '', '', '', '100.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-08 23:46:59', '2016-05-10 10:52:52'),
(5, 0, '', 1, 10, 1, 'et houps', 'voilavoila', '', '', 'et houps', 'voilavoila', '', '', '', '', '', '', '', '', '', '257.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 22:31:48', '0000-00-00 00:00:00'),
(6, 0, '', 1, 17, 1, 'mimi', 'vuillemin', 'info@', '', 'mimi', 'vuillemin', 's', '', '', '', '', '', '', '', '', '20.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 22:33:59', '0000-00-00 00:00:00'),
(7, 0, '', 1, 16, 1, 'utilisateur', 'avec groupe', '', '', 'utilisateur', 'avec groupe', '', '', '', '', '', '', '', '', '', '137.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 22:35:26', '0000-00-00 00:00:00'),
(8, 0, '', 1, 2, 1, 'test', 'Test', 'test@test.com', '123456789', 'test', 'Test', 'une', '', '', '', '', '', '', '', '', '20.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:16:44', '0000-00-00 00:00:00'),
(9, 0, '', 1, 3, 1, '2', 'Test 2', '', '', '2', 'Test 2', '', '', '', '', '', '', '', '', '', '30.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:16:58', '0000-00-00 00:00:00'),
(10, 0, '', 1, 4, 1, 'nouveeau', 'client', '', 'none', 'nouveeau', 'client', 'none', '', '', '', '', '', '', '', '', '20.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:17:15', '0000-00-00 00:00:00'),
(11, 0, '', 1, 5, 1, 'salut', 'salut', '', '', 'salut', 'salut', '', '', '', '', '', '', '', '', '', '20.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:17:56', '0000-00-00 00:00:00'),
(12, 0, '', 1, 5, 1, 'salut', 'salut', '', '', 'salut', 'salut', '', '', '', '', '', '', '', '', '', '10.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:18:14', '0000-00-00 00:00:00'),
(13, 0, '', 1, 3, 1, '2', 'Test 2', '', '', '2', 'Test 2', '', '', '', '', '', '', '', '', '', '20.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:18:47', '0000-00-00 00:00:00'),
(14, 0, '', 1, 4, 1, 'nouveeau', 'client', '', 'none', 'nouveeau', 'client', 'none', '', '', '', '', '', '', '', '', '20.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:19:01', '0000-00-00 00:00:00'),
(15, 0, '', 1, 17, 1, 'mimi', 'vuillemin', 'info@', '', 'mimi', 'vuillemin', 's', '', '', '', '', '', '', '', '', '40.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:19:17', '0000-00-00 00:00:00'),
(16, 0, '', 1, 4, 1, 'nouveeau', 'client', '', 'none', 'nouveeau', 'client', 'none', '', '', '', '', '', '', '', '', '10.0000', 0, '0.0000', '', 'fr', 0, '', '0.00000000', '127.0.0.1', '', 'Firefox', 'fr,fr-fr,en-us,en', '2016-05-19 23:20:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type_product` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `tax` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `reward` int(8) NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_id`, `type_product`, `name`, `model`, `quantity`, `price`, `total`, `tax`, `start_date`, `end_date`, `reward`, `teacher`) VALUES
(6, 3, 2, 'cours', 'cours individuel', 'cours individuel', 1, '100.0000', '100.0000', '0.0000', '2016-05-08 22:50:00', '2016-05-08 23:50:00', 0, 1),
(8, 5, 2, 'cours', 'cours individuel', 'cours individuel', 2, '100.0000', '200.0000', '0.0000', '2016-05-11 21:20:00', '2016-05-11 22:20:00', 0, 1),
(9, 5, 5, 'cours', 'cours du dimanche', 'Order_model', 1, '20.0000', '20.0000', '0.0000', '2016-05-10 19:20:00', '2016-05-10 20:20:00', 0, 1),
(10, 5, 6, 'location', 'planche gonflable', '', 1, '15.0000', '15.0000', '0.0000', '2016-05-19 22:30:00', '2016-05-19 23:30:00', 0, 0),
(11, 5, 3, 'location', 'stimer v3 integral', 'stimer v3 ', 1, '10.0000', '2.0000', '0.0000', '2016-05-10 23:20:00', '2016-05-10 23:30:00', 0, 0),
(12, 5, 6, 'location', 'planche gonflable', '', 1, '20.0000', '20.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(13, 6, 5, 'cours', 'cours du dimanche', 'Order_model', 1, '20.0000', '20.0000', '0.0000', '2016-05-19 22:30:00', '2016-05-19 23:30:00', 0, 1),
(14, 7, 2, 'cours', 'cours individuel', 'cours individuel', 1, '100.0000', '100.0000', '0.0000', '2016-05-19 20:50:00', '2016-05-19 21:50:00', 0, 1),
(15, 7, 4, 'location', 'belle et sebastien le livre', '', 1, '25.0000', '4.0000', '0.0000', '2016-05-19 22:20:00', '2016-05-19 22:30:00', 0, 0),
(16, 7, 4, 'location', 'belle et sebastien le livre', '', 1, '25.0000', '33.0000', '0.0000', '2016-05-19 21:00:00', '2016-05-19 22:20:00', 0, 0),
(17, 8, 1, 'vente', 'Plache v4 stimer', '', 2, '10.0000', '20.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(18, 9, 1, 'vente', 'Plache v4 stimer', '', 3, '10.0000', '30.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(19, 10, 1, 'vente', 'Plache v4 stimer', '', 2, '10.0000', '20.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(20, 11, 1, 'vente', 'Plache v4 stimer', '', 2, '10.0000', '20.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(21, 12, 1, 'vente', 'Plache v4 stimer', '', 1, '10.0000', '10.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(22, 13, 1, 'vente', 'Plache v4 stimer', '', 2, '10.0000', '20.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(23, 14, 1, 'vente', 'Plache v4 stimer', '', 2, '10.0000', '20.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(24, 15, 1, 'vente', 'Plache v4 stimer', '', 4, '10.0000', '40.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0),
(25, 16, 1, 'vente', 'Plache v4 stimer', '', 1, '10.0000', '10.0000', '0.0000', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `model` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `sku` varchar(64) NOT NULL,
  `upc` varchar(12) NOT NULL,
  `ean` varchar(14) NOT NULL,
  `jan` varchar(13) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `mpn` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `shipping` tinyint(1) NOT NULL DEFAULT '1',
  `sale_price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `suggested_price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `buy_price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `special_price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `points` int(8) NOT NULL DEFAULT '0',
  `date_available` date NOT NULL,
  `weight` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `length` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `width` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `height` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `subtract` tinyint(1) NOT NULL DEFAULT '1',
  `minimum` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `buyed` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `special_price_date_start` datetime NOT NULL,
  `special_price_date_end` datetime NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `ingroup` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `tax_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`product_id`, `model`, `name`, `type`, `sku`, `upc`, `ean`, `jan`, `isbn`, `mpn`, `quantity`, `shipping`, `sale_price`, `suggested_price`, `buy_price`, `special_price`, `points`, `date_available`, `weight`, `length`, `width`, `height`, `subtract`, `minimum`, `status`, `buyed`, `date_added`, `special_price_date_start`, `special_price_date_end`, `manufacturer_id`, `ingroup`, `parent_id`, `tax_class_id`) VALUES
(1, '', 'Plache v4 stimer', 'vente', '', '', '', '', '', '', 0, 1, '10.0000', '12.0000', '9.0000', '0.0000', 2, '2016-04-01', '10.00000000', '5.00000000', '0.20000000', '0.01000000', 1, 1, 1, 0, '2016-04-01 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, 1),
(2, 'cours individuel', 'cours individuel', 'cours', '', '', '', '', '', '', 0, 1, '100.0000', '0.0000', '0.0000', '0.0000', 0, '2016-04-01', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 1, 1, 0, 0, '2016-04-01 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 1),
(3, 'stimer v3 ', 'stimer v3 integral', 'location', '', '', '', '', '', '', 0, 1, '10.0000', '0.0000', '0.0000', '0.0000', 1, '2016-04-01', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 1, 1, 0, 0, '2016-04-01 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, 0, 1),
(4, '', 'belle et sebastien le livre', 'location', '', '', '', '', '', '', 0, 0, '25.0000', '0.0000', '0.0000', '0.0000', 0, '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, 1),
(5, 'Order_model', 'cours du dimanche', 'cours', '', '', '', '', '', '', 0, 0, '20.0000', '0.0000', '0.0000', '0.0000', 0, '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, 0, 0, '2016-05-09 23:17:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 1),
(6, '', 'planche gonflable', 'location', '', '', '', '', '', '', 0, 0, '15.0000', '0.0000', '0.0000', '0.0000', 0, '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, 0, 0, '2016-05-19 22:28:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tax`
--

CREATE TABLE `tax` (
  `tax_class_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `ratio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tax`
--

INSERT INTO `tax` (`tax_class_id`, `name`, `ratio`) VALUES
(1, 'test', 8.6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `code_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `code_id`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, '/S3sJUJZ..4zFPFZ/H81Iu', 1268889823, 1464253308, 1, 'Gael', 'le beau', 'ADMIN', '', ''),
(2, '127.0.0.1', 'test test', '$2y$08$yQwM7NgJeMiklQBY.HKw/eXpRyfK9bm6W/VSbw.nXuFnP/rOsarl6', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1459314645, 1463003230, 1, 'test', 'Test', 'une', '123456789', ''),
(3, '', '', '', '', '', '', '', 0, '', 0, 0, 0, '2', 'Test 2', '', '', ''),
(4, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'nouveeau', 'client', 'none', 'none', ''),
(5, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'salut', 'salut', '', '', ''),
(6, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'test', 'client', '', '', ''),
(7, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'tralala', 'tralalal', '', '', ''),
(8, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'flaga', 'dada', '', '', ''),
(9, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'tirel', 'tireli', '', '', ''),
(10, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'et houps', 'voilavoila', '', '', ''),
(11, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'et voila', 'le travail', '', '', ''),
(12, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'heu', 'revoila le travail', '', '', ''),
(13, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'heu', 'revoila le travlalaail', '', '', ''),
(14, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'bon', 'bien', '', '', ''),
(15, '', '', '', '', '', '1cf5c43f18472a29257db1624922f71478844264', '', 0, '', 0, 0, 0, 'nouveau', 'avec groupe', '', '', ''),
(16, '', '', '', '', '', '', '', 0, '', 0, 0, 0, 'utilisateur', 'avec groupe', '', '', ''),
(17, '', '', '', '', 'info@', '', '', 0, '', 0, 0, 0, 'mimi', 'vuillemin', 's', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(8, 1, 1),
(9, 1, 2),
(10, 1, 4),
(11, 1, 5),
(15, 2, 2),
(16, 2, 3),
(17, 2, 5),
(12, 4, 3),
(13, 15, 3),
(14, 16, 3),
(18, 17, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `foreign` (`foreign_key`,`foreign_type`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cart_customer1_idx` (`customer_id`);

--
-- Index pour la table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`,`cart_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `fk_cart_product1_idx` (`product_id`),
  ADD KEY `fk_cart_item_cart1_idx` (`cart_id`);

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_oc_currency1_idx` (`currency_id`);

--
-- Index pour la table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`,`order_id`,`product_id`),
  ADD KEY `fk_order_product_product1_idx` (`product_id`),
  ADD KEY `fk_order_product_order1_idx` (`order_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_manufacturer1_idx` (`manufacturer_id`),
  ADD KEY `fk_product_tax_class1_idx` (`tax_class_id`);

--
-- Index pour la table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_class_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
