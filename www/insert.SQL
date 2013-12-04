insert into Udaje (username,hash_hesla,role) values ('Meldor','69c3179e99f27853b132cd17068718f92e871d6d','admin');
insert into Udaje (username,hash_hesla,role) values ('Nerso','016ccee7270f95800300a9a535a5e3f1ccc89936','admin');

insert into Udaje (username,hash_hesla,role) values ('Lopatak','be50f1b69b3b97af34a2f47d319e4a727dc2fdbc','autor');
insert into Udaje (username,hash_hesla,role) values ('Luke','bd27a3ef4befe56b1ecd5becf576140f5981c576','autor');
insert into Udaje (username,hash_hesla,role) values ('R2D2','8cb972de07f252a72246b999ff94c19af2baa883','autor');

insert into Udaje (username,hash_hesla,role) values ('HonzaK','5c4c257d4a1a09108f1963be422860f1b8914bce','uzivatel');
insert into Udaje (username,hash_hesla,role) values ('Raketak','c391500d2e315090cba7f97c245d09f66fe849a1','uzivatel');
insert into Udaje (username,hash_hesla,role) values ('DavidLok','38aa53de31c04bcfae9163cc23b7963ed9cf90f7','uzivatel');
insert into Udaje (username,hash_hesla,role) values ('Houdini','44297ac58c749b0aba6e6e8da90ace0c2ebf3d35','uzivatel');
insert into Udaje (username,hash_hesla,role) values ('KubaT','e5bab9ebdc71185f29bb0e771d76660ed0ebcb52','uzivatel');

insert into Autor (FK_username,email,jmeno,schvalen) values ('Lopatak','lopatak@seznam.cz','Petr Novotný',TRUE);
insert into Autor (FK_username,email,jmeno,schvalen) values ('Luke','luke@centrum.cz','Lukáš Peřina',TRUE);
insert into Autor (FK_username,email,jmeno,schvalen) values ('R2D2','r2d2@google.com','Jiří Pěnkava',FALSE);

insert into Uzivatel (FK_username,jmeno,kontrolni_otazka,kontrolni_odpoved,email) 
	values ('HonzaK',null,'Datum narození.','8.6.1989','honzak@seznam.cz');
insert into Uzivatel (FK_username,jmeno,kontrolni_otazka,kontrolni_odpoved,email) 
	values ('Raketak',null,'Místo narození.','Brno','raketak@seznam.cz');
insert into Uzivatel (FK_username,jmeno,kontrolni_otazka,kontrolni_odpoved,email) 
	values ('DavidLok','David Lokomotiva','Oblíbená barva.','hnědá','davidlok@google.com');
insert into Uzivatel (FK_username,jmeno,kontrolni_otazka,kontrolni_odpoved,email) 
	values ('Houdini','Michal Houba','Datum narozeni.','17.2.1995','houdini@centrum.cz');
insert into Uzivatel (FK_username,jmeno,kontrolni_otazka,kontrolni_odpoved,email) 
	values ('KubaT',null,'Jméno matky.','Božena','kubat@seznam.cz');

insert into Aplikace (nazev,popis,ikona,datum_pridani,verze,FK_Autor,schvalena,velikost,OS) 
	values ('Kalkulačka','Vylepšená klasická kalkulačka.',null,'2012-12-05 02:22:10','1.0','Lopatak',TRUE,4378,'Windows');
insert into Aplikace (nazev,popis,ikona,datum_pridani,verze,FK_Autor,schvalena,velikost,OS) 
	values ('Malování','Vylepšené klasické malování.',null,'2012-11-04 08:22:10','1.0','Lopatak',TRUE,26836,'Solaris');
insert into Aplikace (nazev,popis,ikona,datum_pridani,verze,FK_Autor,schvalena,velikost,OS) 
	values ('Mario','Klasická hopsačka.',null,'2011-08-30 07:45:10','1.4','Luke',TRUE,7896,'BSD');
insert into Aplikace (nazev,popis,ikona,datum_pridani,verze,FK_Autor,schvalena,velikost,OS) 
	values ('Counter Strike','Oblíbené FPS.',null,'2010-05-01 10:30:05','1.0','Lopatak',FALSE,34536,'OS X');
insert into Aplikace (nazev,popis,ikona,datum_pridani,verze,FK_Autor,schvalena,velikost,OS) 
	values ('Encyklopedie','Vzdělávací program.',null,'2013-10-09 11:48:10','1.0','Luke',TRUE,8374,'Linux');

insert into Obrazek (url,popis,aplikace) values ('../../images/example.jpg','popis1',1);
insert into Obrazek (url,popis,aplikace) values ('../../images/example.jpg','popis2',1);
insert into Obrazek (url,popis,aplikace) values ('../../images/example.jpg','popis3',2);
insert into Obrazek (url,popis,aplikace) values ('../../images/example.jpg','popis4',3);
insert into Obrazek (url,popis,aplikace) values ('../../images/example.jpg','popis5',3);
insert into Obrazek (url,popis,aplikace) values ('../../images/example.jpg','popis6',4);
insert into Obrazek (url,popis,aplikace) values ('../../images/example.jpg','popis7',4);
insert into Obrazek (url,popis,aplikace) values ('../../images/example.jpg','popis8',5);

insert into Licence (doba_platnosti,nazev,aplikace,cena) values (30,'Kalk',1,30);
insert into Licence (doba_platnosti,nazev,aplikace,cena) values (null,'Malování',2,200);
insert into Licence (doba_platnosti,nazev,aplikace,cena) values (null,'Mario',3,0);
insert into Licence (doba_platnosti,nazev,aplikace,cena) values (365,'CS',4,100);
insert into Licence (doba_platnosti,nazev,aplikace,cena) values (10,'Enc',5,500);

insert into Komentar (nadpis,obsah,aplikace,FK_Uzivatel) values ('Pochvala','Chválím autora za skvělou funkcionalitu.',1,'DavidLok');
insert into Komentar (nadpis,obsah,aplikace,FK_Uzivatel) values ('Bug','Chyba při dělení nulou.',1,'Raketak');
insert into Komentar (nadpis,obsah,aplikace,FK_Uzivatel) values ('Bug','Nejde se dostat přes 3. úroveň, pokaždé to spadne.',3,'KubaT');
insert into Komentar (nadpis,obsah,aplikace,FK_Uzivatel) values ('Dotaz na autora','Kdy přiděláte sekci biologie?',5,'Houdini');
insert into Komentar (nadpis,obsah,aplikace,FK_Uzivatel) values ('Pochvala','Výborný program.',5,'KubaT');

insert into Nakup (datum_nakupu,datum_vyprseni_licence,licence,FK_Uzivatel) values ('2012-12-06 02:22:10','2013-01-23 02:22:10',1,'DavidLok');
insert into Nakup (datum_nakupu,datum_vyprseni_licence,licence,FK_Uzivatel) values ('2011-09-01 07:45:10',null,3,'KubaT');
insert into Nakup (datum_nakupu,datum_vyprseni_licence,licence,FK_Uzivatel) values ('2013-10-10 11:48:10','2013-10-20 11:48:10',5,'Houdini');
insert into Nakup (datum_nakupu,datum_vyprseni_licence,licence,FK_Uzivatel) values ('2013-10-11 11:48:10','2013-10-21 11:48:10',5,'KubaT');