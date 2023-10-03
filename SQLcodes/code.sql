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
SELECT * FROM kalad


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
