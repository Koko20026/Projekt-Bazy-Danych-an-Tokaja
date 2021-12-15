-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Gru 2021, 20:38
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_logowania`
--

CREATE TABLE `dane_logowania` (
  `id_konta` int(11) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `typ` varchar(45) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `telefon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `dane_logowania`
--

INSERT INTO `dane_logowania` (`id_konta`, `haslo`, `email`, `typ`, `imie`, `nazwisko`, `telefon`) VALUES
(3, '$2y$10$jKgi6hOrTK.dcNjkzhvw0OmBv8m8vOdEwGlQWPmANHPiO2IgQ4LN6', 'test@gmail.com', 'admin', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeria_zdjec`
--

CREATE TABLE `galeria_zdjec` (
  `id_zdjecia` int(11) NOT NULL,
  `nazwa_jpg` varchar(45) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `fotografia` varchar(45) NOT NULL,
  `galeria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategoria` int(11) NOT NULL,
  `kategoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategoria`, `kategoria`) VALUES
(7, 'Akcesoria'),
(2, 'Buty'),
(4, 'Kaski'),
(3, 'Kije'),
(1, 'Narty'),
(6, 'Odziez'),
(5, 'Rękawice');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `Imie` varchar(45) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `Nazwisko` varchar(45) NOT NULL,
  `NIP` int(10) NOT NULL,
  `id_sprzedazy` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`Imie`, `id_klienta`, `Nazwisko`, `NIP`, `id_sprzedazy`, `email`) VALUES
('Selena', 3, 'Gomez', 1234567890, '1', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `id_producenci` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL,
  `miasto` varchar(45) NOT NULL,
  `ulica` varchar(45) NOT NULL,
  `numer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `producenci`
--

INSERT INTO `producenci` (`id_producenci`, `nazwa`, `miasto`, `ulica`, `numer`) VALUES
(1, 'Rossignol', 'Siedlce', 'Sokolowska', '12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `id_producenci` int(11) NOT NULL,
  `nazwa_produktu` varchar(45) NOT NULL,
  `opis` varchar(45) NOT NULL,
  `fotografia` varchar(45) NOT NULL,
  `cena_netto` decimal(7,2) NOT NULL,
  `cena_brutto` decimal(7,2) NOT NULL,
  `kategoria` int(11) NOT NULL,
  `galeria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `id_producenci`, `nazwa_produktu`, `opis`, `fotografia`, `cena_netto`, `cena_brutto`, `kategoria`, `galeria`) VALUES
(1, 1, 'Narty', 'Narty do biegania', 'Narty', '499.99', '614.99', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id_sprzedazy` int(11) NOT NULL,
  `id_konta` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamowienie`
--

INSERT INTO `zamowienie` (`id_sprzedazy`, `id_konta`, `ilosc`) VALUES
(1, 1, 2),
(2, 3, 1),
(3, 3, 1),
(4, 3, 1),
(5, 3, 1),
(6, 3, 1),
(7, 3, 1),
(8, 3, 1),
(9, 3, 1),
(10, 3, 1),
(11, 3, 1),
(12, 3, 1),
(13, 3, 1),
(14, 3, 1),
(15, 3, 1),
(16, 3, 1),
(17, 3, 1),
(18, 3, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie_produkty`
--

CREATE TABLE `zamowienie_produkty` (
  `id_produktu` int(11) NOT NULL,
  `id_sprzedazy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamowienie_produkty`
--

INSERT INTO `zamowienie_produkty` (`id_produktu`, `id_sprzedazy`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 17),
(1, 18);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD PRIMARY KEY (`id_konta`);

--
-- Indeksy dla tabeli `galeria_zdjec`
--
ALTER TABLE `galeria_zdjec`
  ADD PRIMARY KEY (`id_zdjecia`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategoria`),
  ADD KEY `kategoria` (`kategoria`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`),
  ADD KEY `email` (`email`);

--
-- Indeksy dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`id_producenci`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`),
  ADD KEY `id_producenci` (`id_producenci`),
  ADD KEY `fotografia` (`fotografia`,`galeria`,`kategoria`),
  ADD KEY `kategoria` (`kategoria`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_sprzedazy`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  MODIFY `id_konta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `galeria_zdjec`
--
ALTER TABLE `galeria_zdjec`
  MODIFY `id_zdjecia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `producenci`
--
ALTER TABLE `producenci`
  MODIFY `id_producenci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_sprzedazy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`id_producenci`) REFERENCES `producenci` (`id_producenci`),
  ADD CONSTRAINT `produkty_ibfk_2` FOREIGN KEY (`kategoria`) REFERENCES `kategorie` (`id_kategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

