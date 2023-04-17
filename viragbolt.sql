-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 16. 21:53
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `viragbolt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'dani', 'asdasd@gmail.com', '$2y$10$TgbRKDZ3OVdDXN0Li//G.uyFklvogAwd5r.7kN/6/pc9rQIJ4Gg1a');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `alapanyag`
--

CREATE TABLE `alapanyag` (
  `alapanyag_id` int(11) NOT NULL,
  `alapanyag_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `alapanyag`
--

INSERT INTO `alapanyag` (`alapanyag_id`, `alapanyag_title`) VALUES
(1, 'valami'),
(2, 'alapanyag');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cart_details`
--

CREATE TABLE `cart_details` (
  `termek_id` int(11) NOT NULL,
  `ip_adress` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `esemenyek`
--

CREATE TABLE `esemenyek` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `esemenyek`
--

INSERT INTO `esemenyek` (`event_id`, `event_title`) VALUES
(7, 'Esküvő'),
(8, 'Rendezvény'),
(9, 'Konferencia'),
(10, 'Szülinap'),
(11, 'Lakás díszítés'),
(12, 'Advent');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'dani', 'asdasd@gmail.com', '$2y$10$pfHtT1aAB1tSJx11PrdglOjKImOjr/3FfVrJtSEqeK90TQzcIWUIy', '', '::1', 'asda', '123123');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`category_id`, `category_title`) VALUES
(9, 'Virágtál'),
(10, 'Csokor'),
(11, 'Kopogtató'),
(12, 'Lakás díszítő elemek'),
(14, 'Asztaldísz');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `termek_id` int(11) NOT NULL,
  `termek_title` varchar(100) NOT NULL,
  `termek_description` varchar(255) NOT NULL,
  `termek_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `termek_ar` varchar(100) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termek_id`, `termek_title`, `termek_description`, `termek_keywords`, `category_id`, `event_id`, `product_image1`, `product_image2`, `product_image3`, `termek_ar`, `datum`, `status`) VALUES
(1, 'Virágtál (Rózsaszín,piros)', 'Ennek a virágtálnak a fő színei a piros és rózsaszín keveréke, de található benne narancssárga fehér és zöld díszítő elem is. Maga az alja egy sötét szürke műanyag alapú tál erre van felépítve az egész dísz.', 'virágtál, tál, piros, rózsaszín', 9, 10, 'viragtal.jpg', 'viragtal2.jpg', 'viragtal3.jpg', '12500', '2023-04-16 18:30:36', 'true'),
(2, 'Virágtál (lila,fehér)', 'Ennek a virágtálnak a fő színei a lila és fehér szín keveréke, de található benne szürke, halványsárga és zöld díszítő elem is. Maga az alja egy világosabb fa erezetes műanyag alapú tál erre van felépítve az egész dísz.', 'virágtál, tál, fehér, lila', 9, 10, 'viragtal5.jpeg', 'viragtal4.jpg', 'viragtal6.jpeg', '12500', '2023-04-16 18:35:07', 'true'),
(3, 'Kopogtató (fehér,bézs)', 'Ennek a kopogtatónak a fő színei a fehér és bézs szín keveréke, de található benne fa árnyalatú barna és zöld díszítő elem is.  A felfogató szalag bézs színű és körülbelül 20 centiméter hosszú így kényelmesen elfér mindenhol és könnyű kiakasztani.', 'kopogtató, kopogtato, fehér, bézs', 11, 11, 'kopogtato.jpg', 'kopogtato2.jpg', 'kopogtato3.jpeg', '8250', '2023-04-16 18:51:43', 'true'),
(4, 'Kopogtató (színes)', 'Ennek a kopogtatónak a fő színei a szürke és rózsaszín szín keveréke, de található benne kék és sárga díszítő elem is.  A felfogató szalag rózsaszín színű és körülbelül 20 centiméter hosszú így kényelmesen elfér mindenhol és könnyű kiakasztani.', 'kopogtató, kopogtato, szín, színes', 11, 11, 'kopogtato4.jpeg', 'kopogtato3.jpeg', 'kopogtato5.jpg', '8250', '2023-04-16 18:54:43', 'true'),
(5, 'Adventi koszorú (Rózsaszín, szürke)', 'Ennek az adventi koszorúnak a fő színei a rózsaszín és szürke szín keveréke, de található benne ezüst és fehér színű díszítő elem is.  4 gyertya található a koszorún 3 ezüst és 1 arany színű.', 'advent, adventi koszorú, rózsaszín, szürke', 12, 12, 'adventikoszoru2.jpg', 'adventikoszoru.jpg', 'adventikoszoru3.jpg', '11000', '2023-04-16 19:02:21', 'true'),
(6, 'Adventi koszorú (arany,fehér)', 'Ennek az adventi koszorúnak a fő színei az arany és fehér szín keveréke, de található benne ezüst és bronz színű díszítő elem is. 4 gyertya található a koszorún 3 ezüst és 1 bronz színű.', 'advent, adventi koszorú, fehér, arany', 12, 12, 'adventikoszoru4.jpg', 'adventikoszoru4.jpg', 'adventikoszoru5.jpg', '11000', '2023-04-16 19:06:55', 'true'),
(7, 'Asztaldísz (zöld,rózsaszín)', 'Ennek az asztaldísznek a fő színei a zöld és a rózsaszín szín keveréke, de található benne arany és ezüst díszítő elem is. Ezen az asztaldíszen pontosan 4 fehér színű gyertya található ami 25 centi magas.', 'asztaldísz, zöld, rózsaszín, asztal ', 14, 8, 'asztaldisz.jpg', 'asztaldisz.jpg', 'asztaldisz2.jpg', '7500', '2023-04-16 19:25:51', 'true'),
(8, 'Asztaldísz (fehér,zöld)', 'Ennek az asztaldísznek a fő színei a zöld és az ezüst szín keveréke, de található benne fehér díszítő elem is. Ezen az asztaldíszen 1 fehér színű gyertya található ami 25 centi magas és egy ülő figura.', 'asztaldísz, fehér, zöld, asztal', 14, 0, 'asztaldisz4.jpg', 'asztaldisz3.jpg', 'asztaldisz5.jpg', '7500', '2023-04-16 19:25:20', 'true');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- A tábla indexei `alapanyag`
--
ALTER TABLE `alapanyag`
  ADD PRIMARY KEY (`alapanyag_id`);

--
-- A tábla indexei `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`termek_id`);

--
-- A tábla indexei `esemenyek`
--
ALTER TABLE `esemenyek`
  ADD PRIMARY KEY (`event_id`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`category_id`);

--
-- A tábla indexei `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termek_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `event_id` (`event_id`);

--
-- A tábla indexei `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- A tábla indexei `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `alapanyag`
--
ALTER TABLE `alapanyag`
  MODIFY `alapanyag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
