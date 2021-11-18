    CREATE TABLE if not EXISTS `pracownicy` (
  `id_pracownik` int NOT NULL AUTO_INCREMENT,
  `imie` char(15),
  `nazwisko` char(20),
  `telefon` varchar(11),
  `kod` varchar (6),
  `poczta` char(15),
  `ulica` char(30),
  PRIMARY KEY (`id_pracownik`),  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pracownicy` (`imie`, `nazwisko`, `telefon`, `kod`, `poczta`, 'ulica' ) VALUES 
("Marek", "Mostowiak",  "782 123 412", "08-110", "Siedlce", "Starowiejska" );


    CREATE TABLE if not EXISTS `dane_logowania` (
  `id_konta` int NOT NULL AUTO_INCREMENT,
  `login` char(20),
  `haslo` char(15),
  `email` char(40),
  `id_pracownik` int,
  PRIMARY KEY (`id_konta`), 
  KEY `id_pracownik`(`id_pracownik`), 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    

INSERT INTO `dane_logowania` (`login`, `haslo`, `email`, `id_pracownik`) VALUES 
("admin", "admin", "Mmostowiak@gamil.com", 1),
("seba123", "haslo123", "seba123@gmail.com",);