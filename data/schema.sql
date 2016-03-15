create database kochtopf;

use kochtopf;

CREATE TABLE  kategorie (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  kategorie varchar(64) not null,
  PRIMARY KEY  (id)
);


CREATE TABLE  benutzer (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  benutzername VARCHAR(128)  NOT NULL,
  vorname  VARCHAR(64)  NOT NULL,
  nachname     VARCHAR(128) NOT NULL,
  email  VARCHAR(128)  NOT NULL,
  jahre_alt  int,
  geschlecht varchar(1),
  passwort varchar(40) Not null,
  PRIMARY KEY  (id)
);


CREATE TABLE  rezept (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  titel VARCHAR(64)  NOT NULL,
  rezept  VARCHAR(5000)  NOT NULL,
  bewertung   float(5,4),
  anzahl_bewertung int,
  erfasst_am TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  kategorie_id int unsigned not null,
  benutzer_id int unsigned not null,
  PRIMARY KEY  (id)
  );
  Alter table rezept add foreign key fk_kategorie (kategorie_id) REFERENCES kategorie(id);
  Alter table rezept add foreign key fk_benutzer (benutzer_id) REFERENCES benutzer(id);



CREATE TABLE  kommentar (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  kommentar varchar(1000) not null,
  rezept_id int unsigned,
  PRIMARY KEY  (id)
  );
  Alter table kommentar add foreign key fk_rezept (rezept_id) REFERENCES rezept(id);


create user koch@localhost IDENTIFIED by 'gibbiX12345';

grant select,update,delete,insert on kochtopf.benuter , kochtopf.kommentar , kochtopf.rezept to koch@localhost;

