-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 18 mei 2016 om 09:53
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `webshop_schema`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `border`
--

CREATE TABLE IF NOT EXISTS `border` (
  `ID` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `border`
--

INSERT INTO `border` (`ID`, `User_id`, `Date`) VALUES
(1, 2, '2016-05-17'),
(2, 2, '2016-05-17'),
(3, 2, '2016-05-17'),
(4, 2, '2016-05-17'),
(5, 1, '2016-05-17'),
(6, 1, '2016-05-17'),
(7, 1, '2016-05-17'),
(8, 1, '2016-05-17'),
(9, 1, '2016-05-17'),
(10, 1, '2016-05-17'),
(11, 1, '2016-05-17'),
(12, 1, '2016-05-17'),
(13, 1, '2016-05-17'),
(14, 1, '2016-05-17'),
(15, 1, '2016-05-17'),
(16, 1, '2016-05-17'),
(17, 1, '2016-05-18'),
(18, 1, '2016-05-18'),
(19, 1, '2016-05-18'),
(20, 1, '2016-05-18'),
(21, 1, '2016-05-18'),
(22, 1, '2016-05-18'),
(23, 1, '2016-05-18'),
(24, 1, '2016-05-18'),
(25, 1, '2016-05-18');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `border_rule`
--

CREATE TABLE IF NOT EXISTS `border_rule` (
  `Border_id` int(11) NOT NULL,
  `Artikel_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `border_rule`
--

INSERT INTO `border_rule` (`Border_id`, `Artikel_id`, `Quantity`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 3),
(2, 1, 1),
(2, 2, 1),
(2, 3, 3),
(3, 1, 1),
(3, 2, 1),
(3, 3, 3),
(4, 1, 1),
(4, 2, 2),
(5, 1, 2),
(5, 2, 3),
(5, 3, 1),
(6, 1, 2),
(6, 2, 3),
(6, 4, 2),
(7, 1, 2),
(7, 2, 3),
(7, 4, 2),
(8, 1, 2),
(8, 2, 3),
(8, 4, 2),
(9, 1, 2),
(9, 2, 3),
(9, 4, 2),
(10, 1, 2),
(10, 2, 3),
(10, 4, 2),
(11, 2, 2),
(11, 3, 4),
(12, 1, 2),
(12, 2, 3),
(12, 3, 4),
(13, 1, 1),
(13, 2, 2),
(13, 3, 2),
(14, 2, 1),
(14, 3, 3),
(15, 2, 1),
(15, 3, 3),
(16, 3, 4),
(17, 1, 2),
(17, 3, 2),
(18, 1, 2),
(18, 3, 2),
(19, 1, 2),
(19, 3, 2),
(20, 1, 2),
(20, 3, 2),
(21, 2, 2),
(21, 3, 2),
(22, 2, 2),
(22, 3, 2),
(23, 1, 32),
(23, 2, 23),
(23, 3, 52),
(23, 4, 34),
(24, 3, 3),
(25, 3, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inlog_gegevens`
--

CREATE TABLE IF NOT EXISTS `inlog_gegevens` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `inlog_gegevens`
--

INSERT INTO `inlog_gegevens` (`id`, `username`, `password`) VALUES
(1, 'sybren', 'bos'),
(2, 'geert', '1234');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `link`) VALUES
(1, 'brood', 2, 'http://i.telegraph.co.uk/multimedia/archive/01807/bread_1807973b.jpg'),
(2, 'zwaard', 80, 'http://www.historic-replicashop.com/images/medium/products/cs88nor_MED.jpg'),
(3, 'deathstar', 700, 'https://upload.wikimedia.org/wikipedia/en/e/ee/DeathStar2.jpg'),
(4, 'Radio', 75, 'http://2.bp.blogspot.com/-Pez94P68KcI/VjICBu_hGBI/AAAAAAAAf8A/UgB_IKonHWk/s1600/old_radio_by_hkgood-d32w52i.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
