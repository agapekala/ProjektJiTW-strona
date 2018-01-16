-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 16 Sty 2018, 11:35
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `loginsystem`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `chat`
--

INSERT INTO `chat` (`id`, `nick`, `message`) VALUES
(1, 'karolinka', 'hejka'),
(2, 'Ania', 'Hejcia'),
(34, 'karusia', 'wiadomoÅ›Ä‡ testowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `children`
--

CREATE TABLE `children` (
  `child_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `child_name` varchar(200) NOT NULL,
  `birth_date` date NOT NULL,
  `child_age` int(3) NOT NULL,
  `child_gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `children`
--

INSERT INTO `children` (`child_id`, `parent_id`, `child_name`, `birth_date`, `child_age`, `child_gender`) VALUES
(9, 3, 'Aga', '2004-03-10', 10, 'female'),
(10, 3, 'Zygmunt', '2005-09-02', 10, 'male'),
(11, 3, 'Jola', '2003-05-15', 14, 'female'),
(12, 1, 'Ania', '2011-06-10', 6, 'female');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `med_naz` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roz_ser` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zal_reak` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`id`, `child_id`, `title`, `start`, `end`, `med_naz`, `roz_ser`, `zal_reak`) VALUES
(4, 11, 'Wizyta ortodonta', '2017-12-26 16:00:00', '2017-12-26 17:00:00', '', 'brak', 'zalecenia 2'),
(16, 11, 'Wizyta u lekarza', '2017-12-31 14:00:00', '2017-12-31 15:00:00', 'zalecenie test2', 'Grypa ', 'zalecenia 2\r\n'),
(17, 11, 'testowe wydarzeine', '2017-12-30 00:00:00', '2017-12-31 00:00:00', 'zalecenia test1\r\n', NULL, 'test'),
(18, 11, 'Szczepienie na grypÄ™', '2017-12-06 10:00:00', '2017-12-06 11:00:00', 'nazwa testowa', '654321', 'reakcje testowe'),
(21, 11, 'Wizyta kontrolna pediatra', '2017-12-28 00:00:00', '2017-12-29 00:00:00', 'apap', 'PrzeziÄ™bienie', 'twst'),
(22, 11, 'Szczepienie tÄ™Å¼ec', '2018-01-09 00:00:00', '2018-01-10 00:00:00', 'tÄ™Å¼ec', '12345', NULL),
(23, 11, 'Wizyta kontrolna chirurg', '2018-01-10 00:00:00', '2018-01-11 00:00:00', NULL, NULL, NULL),
(24, 11, 'Wizyta kontrolna pediatra', '2018-01-16 11:00:00', '2018-01-16 11:30:00', NULL, NULL, NULL),
(25, 11, 'Szczepienie grypa', '2018-01-18 08:00:00', '2018-01-18 08:30:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `height`
--

CREATE TABLE `height` (
  `height_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `height` float NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `height`
--

INSERT INTO `height` (`height_id`, `child_id`, `height`, `add_date`) VALUES
(1, 11, 145, '2017-11-04'),
(2, 11, 146, '2017-10-30'),
(3, 11, 147, '2017-11-30'),
(4, 11, 145, '2017-10-02'),
(5, 11, 75, '2004-03-10'),
(6, 11, 86, '2005-08-13'),
(7, 11, 98, '2006-09-25');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ilness`
--

CREATE TABLE `ilness` (
  `ill_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `ill_name` char(30) NOT NULL,
  `add_date` date NOT NULL,
  `length` int(3) NOT NULL,
  `meds` varchar(100) NOT NULL,
  `sympt` varchar(500) NOT NULL,
  `add_inf` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `ilness`
--

INSERT INTO `ilness` (`ill_id`, `child_id`, `ill_name`, `add_date`, `length`, `meds`, `sympt`, `add_inf`) VALUES
(3, 11, 'grypa', '2017-09-08', 5, '', 'gorÄ…czka i kaszel', 'coÅ›tam coÅ›tam'),
(7, 11, 'Ospa', '2016-10-10', 14, 'apap cholinex', 'objawy', 'info'),
(9, 11, 'Odra', '2014-04-23', 17, 'Ibuprom Strepsils Rutinoscorbin', 'BÃ³l gÅ‚owy, katar, gorÄ…czka, osÅ‚abienie, powiÄ™kszone wÄ™zÅ‚y chÅ‚onne ', ''),
(25, 11, 'Åšwinka', '2017-11-17', 20, 'Marsjanki Vibovit Witamina C', 'bÃ³l gardÅ‚a', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meds`
--

CREATE TABLE `meds` (
  `med_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `name` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `add_date` date NOT NULL,
  `use_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dose` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `react` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_inf` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `meds`
--

INSERT INTO `meds` (`med_id`, `child_id`, `name`, `add_date`, `use_time`, `dose`, `react`, `add_inf`) VALUES
(1, 11, 'Polopiryna', '2017-11-18', '4', '10 mg 4 razy na dobÄ', 'wysypka', 'brak'),
(2, 11, 'Ibuprom', '2017-12-17', 'Stosowany na staÅ‚e', '5 mg 3 razy na dobÄ™', 'brak', 'brak'),
(3, 11, 'Apap', '2017-11-19', '3', '15 mg 3 razy na dobÄ', 'brak', 'brak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(1, 'Agnieszka', 'Pekala', 'agapekala1@wp.pl', 'agapekala', '$2y$10$Fs8jqNYiZsAup14FPr7cpe4xL9W/YjY1DkH1hsco5dbWxyuy1wqlq'),
(3, 'Karolina', 'Tytko', 'kartytko@gmail.com', 'karusia', '$2y$10$2b6d5Hz7qqE0P3rdI7JVGurQLx.mkgO3eb7bhhn5t11iCTVuyyJhy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `weight`
--

CREATE TABLE `weight` (
  `weight_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `weight`
--

INSERT INTO `weight` (`weight_id`, `child_id`, `weight`, `add_date`) VALUES
(1, 11, 45, '2017-10-06'),
(2, 11, 46, '2017-10-25'),
(3, 11, 46.5, '2017-11-09'),
(4, 11, 47, '2017-11-30'),
(5, 11, 46, '2017-12-03'),
(6, 11, 45, '2017-12-21'),
(7, 11, 40, '2017-09-19'),
(8, 11, 43, '2017-09-02'),
(9, 11, 46, '2017-12-28'),
(10, 11, 8, '2004-04-09'),
(11, 11, 11, '2005-02-12'),
(12, 11, 46, '2018-01-05');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`child_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `height`
--
ALTER TABLE `height`
  ADD PRIMARY KEY (`height_id`);

--
-- Indexes for table `ilness`
--
ALTER TABLE `ilness`
  ADD PRIMARY KEY (`ill_id`);

--
-- Indexes for table `meds`
--
ALTER TABLE `meds`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`weight_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `children`
--
ALTER TABLE `children`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `height`
--
ALTER TABLE `height`
  MODIFY `height_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `ilness`
--
ALTER TABLE `ilness`
  MODIFY `ill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `meds`
--
ALTER TABLE `meds`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `weight`
--
ALTER TABLE `weight`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
