DROP TABLE IF EXISTS `dane_logowania`;
CREATE TABLE `dane_logowania` (
  `haslo` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL,
  `id_pracownik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pracownicy`;
CREATE TABLE `Pracownicy` (
  `id_pracownik` int(11) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `nazwisko` varchar(45) NOT NULL, 
  `telefon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `galeria_zdjec`;
CREATE TABLE `galeria_zdjec` (
  `id_zdjecia` int(11) NOT NULL,
  `nazwa_jpg` varchar(45) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `fotografia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `kategorie`;
CREATE TABLE `kategorie` (
  `id_kategoria` int(11) NOT NULL,
  `kategoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `producenci`;
CREATE TABLE `producenci` (
  `id_producenci` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL,
  `miasto` varchar(45) NOT NULL,
  `ulica` varchar(45) NOT NULL,
   `numer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `produkty`;
CREATE TABLE `produkty` (
  `id_produktu` varchar(45) NOT NULL,
  `id_producenci` int(11) NOT NULL,
  `nazwa_produktu` varchar(45) NOT NULL,
  `opis` varchar(45) NOT NULL,
  `fotografia` varchar(45) NOT NULL,
  `cena_netto` decimal(7,2) NOT NULL,
  `cena_brutto` decimal(7,2) NOT NULL,
  `kategoria` varchar(45) NOT NULL,
  `galeria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `zamowienie_produkty`;
CREATE TABLE `zamowienie_produkty` (
  `id_produktu` int(11) NOT NULL,
  `id_sprzedazy` int(11) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `zamowienie`;
CREATE TABLE `zamowienie` (
  `id_sprzedazy` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `data` date NOT NULL,
  `Miasto` varchar(45) NOT NULL,
  `Ulica` varchar(45) NOT NULL,
  `Numer` varchar(45) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `klienci`;
CREATE TABLE `klienci` (
  `Imie` varchar(45) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `Nazwisko` varchar(45) NOT NULL,
  `NIP` int(10) NOT NULL,
  `id_sprzedazy` varchar(45) NOT NULL,
  `email` varchar(45)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `Produkty`
  ADD PRIMARY KEY (`id_produktu`);
  
  ALTER TABLE `Dane_Logowania`
  ADD PRIMARY KEY (`email`);
  
ALTER TABLE `galeria_zdjec`
  ADD PRIMARY KEY (`id_zdjecia`);

ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategoria`);

ALTER TABLE `producenci`
  ADD PRIMARY KEY (`id_producenci`);

ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_sprzedazy`);

ALTER TABLE `Klienci`
  ADD PRIMARY KEY (`id_klienta`);

ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownik`);


ALTER TABLE `producenci`
  MODIFY `id_producenci` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `kategorie`
  MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `galeria_zdjec`
  MODIFY `id_zdjecia` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `zamowienie`
  MODIFY `id_sprzedazy` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `pracownicy`
  MODIFY `id_pracownik` int(11) NOT NULL AUTO_INCREMENT;
  
INSERT INTO `produkty` (`id_producenci`,`nazwa_produktu`,`id_produktu`,`opis`,`fotografia`,`cena_netto`,`cena_brutto`,`kategoria`) VALUES
 (1,'Narty',1,'Narty do biegania','Narty','499.99','614.99','Narty');
 
 INSERT INTO `producenci` (`id_producenci`,`nazwa`,`miasto`,`ulica`,`numer`) VALUES
 (1,'Rossignol','Siedlce','Sokolowska','12');
  
  INSERT INTO `pracownicy` (`id_pracownik`,`imie`,`nazwisko`,`telefon`) VALUES
 (1,'Tadeusz','Norek','800899769');
  
  INSERT INTO `galeria_zdjec` (`id_zdjecia`,`nazwa_jpg`,`id_produktu`,`fotografia`) VALUES
 (1,'narty rossilman.jpg',1,'Narty');
 
   INSERT INTO `kategorie` (`id_kategoria`,`kategoria`) VALUES
 (1,'Narty'),
 (2,'Buty'),
 (3,'Kije'),
 (4,'Kaski'),
 (5,'Rękawice'),
 (6,'Odziez'),
 (7,'Akcesoria');
 
   INSERT INTO `zamowienie_produkty` (`id_produktu`,`id_sprzedazy`) VALUES
 (1,1);
 
 INSERT INTO `zamowienie` (`id_produktu`,`id_sprzedazy`,`miasto`,`ulica`,`numer`,`data`,`id_klienta`,`ilosc`) VALUES
 (1,1,'2021-11-23','Siedlce','Lelewela','18',1,'2');
 
 INSERT INTO `klienci` (`Imie`,`id_klienta`,`Nazwisko`,`NIP`,`id_sprzedazy`,`email`) VALUES
 ('Selena',3,'Gomez','1234567890',1,'');
