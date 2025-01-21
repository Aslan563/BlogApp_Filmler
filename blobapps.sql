-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 21 Oca 2025, 11:18:23
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blobapps`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shortozet` varchar(100) NOT NULL,
  `resimurl` varchar(100) NOT NULL,
  `begeniimsayisi` int(11) DEFAULT 0,
  `yorumsayisi` int(11) DEFAULT 0,
  `paylasimsayisi` int(11) DEFAULT 0,
  `filmozet` text DEFAULT NULL,
  `isactive` int(11) DEFAULT 0,
  `ishome` tinyint(1) DEFAULT 0,
  `adddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `films`
--

INSERT INTO `films` (`id`, `name`, `shortozet`, `resimurl`, `begeniimsayisi`, `yorumsayisi`, `paylasimsayisi`, `filmozet`, `isactive`, `ishome`, `adddate`) VALUES
(51, 'hızlı ve &ouml;fkeli', ' g&uuml;zel bir film', 'resimler2/a81f9b8f03e8ec1bfe617eabb0eb6236jpg', 0, 0, 0, '&lt;p&gt;&lt;strong&gt;g&amp;uuml;zel&lt;/strong&gt;&lt;/p&gt;', 1, 1, '2024-11-30 20:13:42'),
(52, 'labirent 2', 'heyecanlı', 'resimler2/448324f2e92493dec3c421c8bfee745ajpg', 0, 0, 0, '&lt;p&gt;&lt;strong&gt;heyecanlı&lt;/strong&gt;&lt;/p&gt;', 1, 1, '2024-11-30 20:15:12'),
(54, 'yeşil yol', ' g&uuml;zel', 'resimler2/b39f85031321e69f41eca03cec8fd0fejpg', 0, 0, 0, '&lt;p&gt;&lt;strong&gt;iyi&lt;/strong&gt;&lt;/p&gt;', 1, 1, '2024-12-21 20:49:05'),
(55, 'mumya', ' g&uuml;zel', 'resimler2/ef5b35e7fb5790cda859478abe261b36jpg', 0, 0, 0, '&lt;p&gt;&lt;strong&gt;iyi&lt;/strong&gt;&lt;/p&gt;', 1, 1, '2024-12-23 21:13:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_kategori`
--

CREATE TABLE `film_kategori` (
  `filmid` int(11) NOT NULL,
  `kategoriid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `film_kategori`
--

INSERT INTO `film_kategori` (`filmid`, `kategoriid`) VALUES
(51, 18),
(51, 19),
(51, 20),
(52, 18),
(52, 19),
(52, 20),
(54, 18),
(55, 19),
(55, 20);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `name`) VALUES
(18, 'macera'),
(19, 'romantik'),
(20, 'aksiyon'),
(24, 'jenerik'),
(25, 'animasyon');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `pssword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userid`, `username`, `name`, `email`, `pssword`) VALUES
(1, 'aslangunel', 'Aslan Günel', 'aslan@gmail.com', 'aslan123'),
(2, 'alikaya', 'ALİ KAYA', 'ali@gmail.com', 'ali123'),
(4, 'kaya', 'kaya', 'kayav', '12kaya'),
(5, 'kaan', 'kaan', 'kaanww', '12kaan'),
(6, 'asd', 'labirent', 'kayav3', 'asd'),
(7, 'kasim', 'kasım', 'kasim', 'kasim123'),
(8, 'can', 'can', 'can@gmail.com', 'can123'),
(9, 'kemal', 'kemal', 'kemal@gmail.com', 'kemal123'),
(10, 'Aslan', 'Aslan Günel', 'aslan2@gmail.com', 'aslan123');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `film_kategori`
--
ALTER TABLE `film_kategori`
  ADD PRIMARY KEY (`filmid`,`kategoriid`),
  ADD KEY `kategoriid` (`kategoriid`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `film_kategori`
--
ALTER TABLE `film_kategori`
  ADD CONSTRAINT `film_kategori_ibfk_1` FOREIGN KEY (`filmid`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_kategori_ibfk_2` FOREIGN KEY (`kategoriid`) REFERENCES `kategoriler` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
