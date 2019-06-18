-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Jún 18. 07:51
-- Kiszolgáló verziója: 10.1.36-MariaDB
-- PHP verzió: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `administration`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `site` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `formname` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `fieldname` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `fieldlabel` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `input_type` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `choices` text COLLATE utf8_hungarian_ci NOT NULL,
  `submit_to` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `forms`
--

INSERT INTO `forms` (`id`, `site`, `formname`, `fieldname`, `fieldlabel`, `sort`, `input_type`, `choices`, `submit_to`) VALUES
(6, 'vehicles', 'add_veh', 'vtype', 'Járműtípus', 1, 'choice', 'Busz,Troli,Villamos', 'submitveh'),
(7, 'vehicles', 'add_veh', 'manufacturer', 'Gyártó', 2, 'text', '', 'submitveh'),
(8, 'vehicles', 'add_veh', 'type', 'Típus', 3, 'text', '', 'submitveh'),
(9, 'vehicles', 'add_veh', 'owner', 'Szolgáltató', 4, 'choice', 'BKV,VT-Arriva,Volánbusz', 'submitveh'),
(10, 'vehicles', 'add_veh', 'registration', 'Rendszám\\nHatósági azonosító', 5, 'text', '', 'submitveh'),
(11, 'vehicles', 'add_veh', 'depot', 'Telephely', 6, 'choice', 'Óbuda,Kelenföld,Délpest,Cinkota,Trolibusz divízió,Bogáncs utca,Andor utca,Fibula utca,Budafok kocsiszín,Kelenföld kocsiszín,Ferencváros kocsiszín,Baross kocsiszín,Hungária kocsiszín,Száva kocsiszín,Angyalföld kocsiszín,Ferencváros kocsiszín', 'submitveh'),
(12, 'vehicles', 'add_veh', 'status', 'Státusz', 7, 'choice', 'Aktív,Ideiglenesen kivonva,Véglegesen kivonva', 'submitveh');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `vtype` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `manufacturer` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `owner` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `registration` varchar(7) COLLATE utf8_hungarian_ci NOT NULL,
  `depot` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `status` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vehicles`
--

INSERT INTO `vehicles` (`id`, `vtype`, `manufacturer`, `type`, `owner`, `registration`, `depot`, `status`) VALUES
(1, 'Busz', 'Mercedes-Benz', 'Citaro C2', 'VT-Arriva', 'MHU-863', 'Bogáncs utca', 'Aktív');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
