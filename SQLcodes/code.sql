create table uudised(
    id int primary key auto_increment,
    teema varchar(30),
    kuupaev date,
    kirjeldus text);
INSERT INTO uudised(teema, kuupaev, kirjeldus)
values ('ilm','2022-09-12','Tana on soe ilm');
select * from uudised;

alter table uudised
    add column varv varchar(30);

insert into uudised(teema, kuupaev, kirjeldus,varv)
    value ("Tunnid","2023-12-19","Tana on pikk paev","red");
insert into uudised(teema, kuupaev, kirjeldus,varv)
    value ("Sport","2023-12-19","Tana on pikk paev","green");

CREATE TABLE kalad(
                      id int PRIMARY KEY AUTO_INCREMENT,
                      kalanimi varchar(20),
                      pilt TEXT,
                      varv varchar(10));
INSERT INTO kalad(kalanimi)
VALUES ("forell");
SELECT * FROM kalad;


create table eesti_laul(
                           id int not null auto_increment primary key,
                           laulu_nimi varchar(50) not null,
                           laulja varchar(50),
                           punktid int,
                           kommentaarid text,
                           avalik int default 1
);
insert into eesti_laul
(
    laulu_nimi, laulja, punktid
)
VALUES ('Turju', 'Anna Veski', 60);
select * from eesti_laul;


CREATE TABLE jalgrattaeksam(
                               id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                               eesnimi VARCHAR(30),
                               perekonnanimi VARCHAR(30),
                               teooriatulemus INT DEFAULT -1,
                               slaalom INT DEFAULT -1,
                               ringtee INT DEFAULT -1,
                               t2nav INT DEFAULT -1,
                               luba INT DEFAULT -1
);

INSERT INTO jalgrattaeksam (eesnimi, perekonnanimi)
VALUES ('Juku', 'Juurikas');
INSERT INTO jalgrattaeksam (eesnimi, perekonnanimi)
VALUES ('Kati', 'Tamm');
INSERT INTO jalgrattaeksam (eesnimi, perekonnanimi)
VALUES ('Mati', 'Kask');

/* Teooriaeksamil loetelu eksamineeritavatest, kes pole veel teooriaeksamil tulemust saanud. */

SELECT id, eesnimi, perekonnanimi
FROM jalgrattaeksam
WHERE teooriatulemus=-1;

/* Teooriaeksami tulemuse sisestamine */

UPDATE jalgrattaeksam SET teooriatulemus=9 WHERE id=1;
UPDATE jalgrattaeksam SET teooriatulemus=10 WHERE id=2;
UPDATE jalgrattaeksam SET teooriatulemus=10 WHERE id=3;
/* eksamineeritavatest, kes saavad slaalomipunktis oma oskusi näidata  */

SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam
WHERE teooriatulemus>=9 AND slaalom=-1;
/*  Slaalomipunkti edukalt läbituks märkimine  */

UPDATE jalgrattaeksam SET slaalom=1 WHERE id=2;
/*  Loetelu eksamineeritavatest, kes saavad ringteepunktis oma oskusi näidata  */

SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam
WHERE teooriatulemus>=9 AND ringtee=-1;
/*Ringteepunkti edukalt läbituks märkimine*/


UPDATE jalgrattaeksam SET ringtee=1 WHERE id=2;
/*  Loetelu eksamineeritavatest, kel õigus tänavasõidueksamile minna  */

SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam
WHERE slaalom=1 AND ringtee=1 AND t2nav=-1;


create table Toolivahendus(
                              id int PRIMARY KEY AUTO_INCREMENT,
                              toon varchar(30),
                              tellimiskogus int,
                              valminudkogus int NULL
);

CREATE TABLE SecondTable (
                             id int PRIMARY KEY AUTO_INCREMENT,
                             toon varchar(30),
                             FOREIGN KEY (toon) REFERENCES Toolivahendus(toon)
);