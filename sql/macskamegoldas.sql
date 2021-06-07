CREATE DATABASE macskaorokbeadas2
	CHARACTER SET utf8
	COLLATE utf8_hungarian_ci;
--macskak
CREATE TABLE macskaorokbeadas2.macskak (
  macskaId INT(11) NOT NULL AUTO_INCREMENT,
  nev VARCHAR(50) DEFAULT NULL,
  ivartalanitott TINYINT(4) NOT NULL,
  fajtaId INT(11) NOT NULL,
  orokbeAdoId INT(11) NOT NULL,
  Orogbefogadott TINYINT(4) NOT NULL,
  neme TINYINT(4) NOT NULL,
  szuletesiDatum DATE DEFAULT NULL,
  kep VARCHAR(50) DEFAULT 'logo.png',
  PRIMARY KEY (macskaId)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

ALTER TABLE macskaorokbeadas2.macskak 
  ADD INDEX UK_macskak_orokbeAdoId(orokbeAdoId);



--orokbeAdok
  CREATE TABLE macskaorokbeadas2.orokbeadok (
  orokbeAdoId INT(11) NOT NULL AUTO_INCREMENT,
  Onev VARCHAR(50) DEFAULT NULL,
  telefon VARBINARY(15) DEFAULT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(60) NOT NULL,
    jogosultsag VARCHAR(60) DEFAULT '0',
  PRIMARY KEY (orokbeAdoId)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

--macskaoltasai
CREATE TABLE macskaorokbeadas2.macskaoltasai (
  macskaOltasaId INT(11) NOT NULL AUTO_INCREMENT,
  macskaId INT(11) DEFAULT NULL,
  oltasId INT(11) DEFAULT NULL,
  PRIMARY KEY (macskaOltasaId)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

--fajtak
CREATE TABLE macskaorokbeadas2.fajtak (
  fajtaId INT(11) NOT NULL AUTO_INCREMENT,
  fajtaNev VARCHAR(60) DEFAULT NULL,
  PRIMARY KEY (fajtaId)
)
ENGINE = INNODB,
AUTO_INCREMENT = 11,
AVG_ROW_LENGTH = 1638,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

--oltasok
CREATE TABLE macskaorokbeadas2.oltasok (
  oltasokId INT(11) NOT NULL AUTO_INCREMENT,
  oltasNev VARCHAR(60) DEFAULT NULL,
  PRIMARY KEY (oltasokId)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

ALTER TABLE macskaorokbeadas2.macskak 
  ADD CONSTRAINT FK_macskak_fajtak_fajtaId FOREIGN KEY (fajtaId)
    REFERENCES macskaorokbeadas2.fajtak(fajtaId) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE macskaorokbeadas2.macskak 
  ADD CONSTRAINT FK_macskak_orokbeadok_orokbeAdoId FOREIGN KEY (orokbeAdoId)
    REFERENCES macskaorokbeadas2.orokbeadok(orokbeAdoId) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE macskaorokbeadas2.macskaoltasai 
  ADD CONSTRAINT FK_macskaoltasai_macskak_macskaId FOREIGN KEY (macskaId)
    REFERENCES macskaorokbeadas2.macskak(macskaId) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE macskaorokbeadas2.macskaoltasai 
  ADD CONSTRAINT FK_macskaoltasai_oltasok_oltasokId FOREIGN KEY (oltasId)
    REFERENCES macskaorokbeadas2.oltasok(oltasokId) ON DELETE NO ACTION ON UPDATE NO ACTION;


USE macskaorokbeadas2;

DELETE FROM macskak;
DELETE FROM fajtak;
DELETE FROM orokbeadok;
DELETE FROM macskaoltasai;
DELETE FROM oltasok;


INSERT INTO fajtak
  (fajtaId, fajtaNev)
  VALUES 
  (1,'Balin�z macska'), 
  (2,'Abesszin macska'),
  (3,'Beng�li macska'),
  (4,'Burmai szent templommacska'),
  (5,'Maine Coon'),
  (6, 'Munchkin'),
  (7,'Orosz k�k macska'),
  (8,'Norv�g Erdei Macska'),
  (9,'Perzsa macska'),
  (10,'Sk�t l�g�f�l� macska');

SELECT * FROM fajtak;



INSERT INTO orokbeadok
  (orokbeAdoId, Onev, telefon, email, password)
  VALUES 
  (1, 'Fa P�l','0630356793','FaP�l@gmail.com','$2y$10$GdZw4NFcJv8.No3TQ2Oqje02S.UGinIS0Zp44GvaSrkrMId41VTYe'),
  (2, 'D�l Katalin','06703564987','Katalinka@gmail.com','$2y$10$iXTNCzli2t2yHE1wsKEMMeIfmXlHgyEIGcBdlsYxhzgxaALt9Slh2'),
  (3, 'Alm�s Kriszti�n','06306549651','Almafa@gmail.com','$2y$10$U8CARIjPMrbYVni4jeTx/.VU90SakRL3iaEEJaHUQAEUr40tyQY/.'),
  (4, 'D�r F�bi�n','06205671294','Deres@gmail.com','$2y$10$/xf9zhF23CqjItsppK9tl.XVssym9k/QKsRRxG1lCmfdJ/W9d5BFu'),
  (5, 'Feket J�zmin','06305623891','J�zminka23@gmail.com','$2y$10$atuSPMnK4..v16FpBbsh3.f5reNfZMUCSjZS2ilvbZiXbHvJ3GIEm'),
  (6, 'Dobos Hajnalka','06207826341','DobosH@gmail.com','$2y$10$h8Q8vA8/5iadrCDaTZb/neKAr2nHobnZLSV8b7YA7exD7YlZA/c.6'),
  (7, 'Edresi D�niel','06307634916','EDaniel@gmail.com','$2y$10$I1Koge/v6QdANqz04i4p2.nNjQCiZWNGsWb9ute4E5WWQlVKVkeUy'),
  (8, 'Fak� �d�m','06705823673','F�d�m@gmail.com','$2y$10$QGWKguT9N.Ncxz9PdD7Tf.LeTAmSRKugfpV9iqpGj5m0rGKM4c7j.'),
  (9, 'Kov�cs J�zsef','06703972563','KOv�csJ25@gmail.com','$2y$10$z9Khe1G1oTQDEYcLpoeEPOFavynSeJWe9QAPX1i4c0qmNe4enMuiC'),
  (10, 'Kock�s Edina','06202398563','KOCKASEDINA@gmail.com','$2y$10$ZzGE7O5vw341SwX2jB2aru83EdpoFgaYvCdbaFLcfsxQOmEwc1Asa'),
  (11, 'Nagy Istv�n','06305623497','NagyI67@gmail.com','$2y$10$TN.rhiPlV7pjNul3dpgDDeMAgTeC8yj.ogbki2sVRUzEthaVn.NuO'),
  (12, 'Kis Vikt�ria','06704592576','KisViki@gmail.com','$2y$10$rgqnKJDYHbwCkK9d1APc2esSatjvp8xPs.NCaaGRKXIp3M3dmQlmC');

SELECT * FROM orokbeadok;

INSERT INTO orokbeadok 
  (Onev, telefon, email, password, jogosultsag)
  VALUE 
('Farkas Cintia','0630356784','anyamTyukja','$2y$10$PhBhDf7ncfXpr1Ay7mszr..tnp7l4OzjRibPexY4SOpow3GWbBmIe', 2);


  -- (0 = nem, fi�)(1 = igen,l�ny)
INSERT INTO macskak
  (macskaId, nev, ivartalanitott, fajtaId, orokbeAdoId, neme, szuletesiDatum,kep)
  VALUES 
  (1, 'Hapci', 0, 1, 10, 0, '2020-07-16','Hapci.jpg'),
  (2, 'Alma', 1, 2, 9, 0, '2020-05-30','Alma.jpg'),
  (3, 'Cirmi', 1, 3, 8, 1, '2021-02-25','Cirmi.jpg'),
  (4, 'Kajla', 0, 4, 7, 0, '2020-08-23','Kajla.jpg'),
  (5, 'M�csing', 0, 5, 6, 1, '2019-07-27','Mocsing.jpg'),
  (6, 'Kerge', 1, 6, 5, 0, '2021-10-16','Kerge.jpg'),
  (7, 'Marci', 0, 7, 4, 0, '2019-02-28','Marci.jpg'),
  (8, 'Fifi', 1, 8, 3, 1, '2021-01-08','Fifi.jpg'),
  (9, 'Cirmi', 1, 9, 2, 1, '2020-12-12','Cirmi2.jpg'),
  (10, 'Kormi', 0, 10, 1, 0, '2020-11-26','Kormi.jpg'),
  (11, 'Cili', 0, 7, 11, 0, '2021-01-01','Cili.jpg'),
  (12, 'Picur', 0, 5, 12, 1, '2020-09-30','Picur.jpg');
 
SELECT * FROM macskak;



INSERT INTO oltasok
  (oltasokId, oltasNev)
  VALUES 
  (1, 'Macska-leuk�mia'),
  (2, 'FIP-feline infektional peritonitis'),
  (3, 'Chlamydia n�tha-chlamydiose ill. chlamydophila felis');

SELECT * FROM oltasok;

INSERT INTO macskaoltasai
  (macskaOltasaId, macskaId, oltasId)
  VALUES 
   (1, 1, 1),
   (2, 1, 2),
   (3, 1, 3),
   (4, 2, 1),
   (5, 2, 2),
   (6, 3, 2),
   (7, 4, 1),
   (8, 5, 1),
   (9, 5, 3),
   (10, 6, 1),
   (11, 6, 2),
   (12, 6, 3),
   (13, 9, 2),
   (14, 10, 1),
   (15, 10, 3),
   (16, 12, 3);

SELECT * FROM macskaoltasai;





--MacskakTabla = macskak
--FajtakTabla = fajtak
--MacskaOltasaiTabla = macskaoltasai
--OltasokTabla = oltasok
--OrokbeAdokTabla = orokbeadok 


INSERT INTO macskak(
                nev, 
                ivartalanitott, 
                fajtaId,
                orokbeAdoId,
                neme,
                szuletesiDatum
            )
        VALUES(
            'Macskanev',
            0,
            3,
            1,
            0,
            '2021-01-01'
        );

  select * from macskak;

SELECT fajtaNev, macskak.nev, macskak.macskaId, ivartalanitott, Orogbefogadott, neme, szuletesiDatum, oltasNev, orokbeadok.Onev, telefon, email,  FROM macskak
  INNER JOIN fajtak on fajtak.fajtaId = macskak.fajtaId
  INNER JOIN orokbeadok on orokbeadok.orokbeAdoId = macskak.orokbeAdoId
  INNER JOIN macskaoltasai on macskaoltasai.macskaId = macskak.macskaId
  INNER JOIN oltasok on oltasok.oltasokId = macskaoltasai.oltasId;

SELECT * FROM macskaoltasai;

SELECT *  FROM macskak
  LEFT JOIN fajtak on fajtak.fajtaId = macskak.fajtaId;



  SELECT * FROM macskak 
    INNER JOIN fajtak on fajtak.fajtaId = macskak.fajtaId
  INNER JOIN orokbeadok on orokbeadok.orokbeAdoId = macskak.orokbeAdoId
    WHERE macskaId = ?;


  SELECT *  FROM macskak
        INNER JOIN fajtak on fajtak.fajtaId = macskak.fajtaId
    WHERE fajtaNev LIKE ? or nev LIKE ?;
    
  SELECT * FROM macskaoltasai
    INNER JOIN oltasok on oltasokId = oltasId
    WHERE macskaId = ?