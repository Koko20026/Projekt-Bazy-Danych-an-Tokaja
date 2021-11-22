-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Lis 2021, 17:34
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.1

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
-- Struktura tabeli dla tabeli `Dane_Logowania`
--

CREATE TABLE `Dane_Logowania` (
  `id_konta` int(11) NOT NULL,
  `haslo` varchar(32) NOT NULL,
  `adres` varchar(64) DEFAULT NULL,
  `e-mail` varchar(45) NOT NULL,
  `id_pracownik` int(11),
  `login` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Pracownicy`
--

CREATE TABLE `Pracownicy` (
  `id_pracownik` int(11) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `nazwisko` varchar(45) NOT NULL, 
  `telefon` varchar(45) NOT NULL,
  `Adres` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeria_zdjec`
--

CREATE TABLE `galeria_zdjec` (
  `id_zdjecia` int(11) NOT NULL,
  `nazwa_jpg` varchar(45) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `fotografia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategoria` int(11) NOT NULL,
  `kategoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `id_producenci` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL,
  `adres` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_producenci` int(11) NOT NULL,
  `nazwa_produktu` varchar(45) NOT NULL,
  `id_produktu` varchar(45) NOT NULL,
  `opis` varchar(45) NOT NULL,
  `fotografia` varchar(45) NOT NULL,
  `cena_netto` varchar(45) NOT NULL,
  `cena_brutto` varchar(45) NOT NULL,
  `kategoria` varchar(45) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie_produkty`
--

CREATE TABLE `zamowienie_produkty` (
  `id_produktu` int(11) NOT NULL,
  `id_sprzedazy` int(11) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id_sprzedazy` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `Imie` varchar(45) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `Nazwisko` varchar(45) NOT NULL,
  `Adres` varchar(45) NOT NULL,
  `NIP` int(10) NOT NULL,
  `id_sprzedazy` varchar(45) NOT NULL,
  `login` varchar(45)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowione_produkty`
--

CREATE TABLE `zamowione_produkty` (
  `id_zamowione_produkty` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Produkty`
--
ALTER TABLE `Produkty`
  ADD PRIMARY KEY (`id_produktu`);

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
ALTER TABLE `kategorie``
  ADD PRIMARY KEY (`id_kategoria`);

--
-- Indeksy dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`id_producenci`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_sprzedazy`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `Klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownik`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `producenci`
--
ALTER TABLE `producenci`
  MODIFY `id_producenci` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `galeria_zdjec`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `galeria_zdjec`
--
ALTER TABLE `galeria_zdjec`
  MODIFY `id_zdjecia` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_sprzedazy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  MODIFY `id_konta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownik` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
