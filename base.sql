select p.id as idp,a.id,a.image,a.description,p.nombres,a.prix,a.prix*p.nombres as total from produitsvendus p join utilisateur u on u.id=p.idutilisateur join article a on a.id=p.idproduits where  p.idutilisateur=1 and p.daty=now();

select u.nom,u.prenom,p.daty,p.id as idp,a.id,a.image,a.description,p.nombres,a.prix,a.prix*p.nombres as total from historiqueproduitsvendus p join utilisateur u on u.id=p.idutilisateur join article a on a.id=p.idproduits   where  p.idutilisateur=3

Insert into facture(idutilisateur,prixtotal,modepaiement,numerodecompte,lieu,daty


create table panier(
	    id int unsigned NOT NULL auto_increment, 
		idutilisateur int,
		daty date,
		primary key(id),
	   foreign key(idutilisateur) references utilisateur(id)
	);

	select * from facture f join utilisateur u on u.id=f.idutilisateur join modepaiement m on m.id=f.modepaiement order by f.id desc limit 1;
	
create table pays(
	    id int unsigned NOT NULL auto_increment, 
		nom varchar(50),
		primary key(id)
	
	);
	create table ville(
	    id int unsigned NOT NULL auto_increment, 
		idpays int,
		nom varchar(50),
		montant int,
		  foreign key(idpays) references pays(id),
		primary key(id)
	
	);
	insert into pays(nom) values('France');
	insert into pays(nom) values('Madagascar');
	
		insert into ville(idpays,nom,montant) values(2,'Antananarivo',30);

create table facture(
	    id int unsigned NOT NULL auto_increment, 
		idutilisateur int,
		prixtotal int,
		modepaiement int,
		numerodecompte varchar(50),
		lieu varchar(50),
		daty date,
		contact varchar(100),
		primary key(id),
	   foreign key(idutilisateur) references utilisateur(id)
	);
	
	create table paiement(
	    id int unsigned NOT NULL auto_increment, 
		idfacture int,
		iddetailsmodepaiement int,
		
		primary key(id),
	   foreign key(idfacture) references facture(id),
	   foreign key(iddetailsmodepaiement) references detailsmodepaiement(id)
	);
	create table facture(
	    id int unsigned NOT NULL auto_increment, 
		idpanier int,
		totalHT int,
		TVA int,
		totalTTC int,
		prixdelivraison int,
		totalDU int,
		daty date,
		estvalide int,
		primary key(id),
	   foreign key(idpanier) references panier(id)
	);

ALTER TABLE produitsvendus
ADD  idjoueur INT;
SELECT 
t2.company_name,
t2.expose_new,
t2.expose_used,
t1.title,
t1.status,
 CASE status
   when 'New' and t2.expose_new = 1 then 1
   when 'New' and t2.expose_new = 2 then 2
   when 'New' and t2.expose_new = 3 then 3
   when 'Used' and t2.expose_used = 1 then 1
   when 'Used' and t2.expose_used = 2 then 2
   when 'Used' and t2.expose_used = 3 then 3
END as expose
FROM `products` t1
join manufacturers t2 on t2.id = t1.seller
where t1.seller = 4238

select * from concatenation where  daty>'2017-12-31' and daty <'2018-01-04' and description like 'cu%' and categorie='cuillère' and nom='Inox' and prix>1000 and prix<1200;


create table utilisateur(
	    id int unsigned NOT NULL auto_increment, 
		nom varchar(50),
		prenom varchar(50),
		login varchar(50),
		motdepasse varchar(50),
		typeUtilisateur int,
		contact varchar(50),
		adresse varchar(50),
		primary key(id)
	);
insert into utilisateur(nom,prenom,login,motdepasse,typeUtilisateur,contact,adresse) values('yael','nirinasoa','yael',sha1('yael'),1,'0331234567','ICAndoharanofotsy');
insert into utilisateur(nom,prenom,login,motdepasse,typeUtilisateur,contact,adresse) values('kim','kim','kim',sha1('kim'),0,'0341234567','201-Antanimena');
insert into utilisateur(nom,prenom,login,motdepasse,typeUtilisateur,contact,adresse) values('tae','tae','tae',sha1('tae'),0,'0331234567','34C Andravohangy');

select from historiqueproduitsvendus h;

	create table produitsvendus(
	    id int unsigned NOT NULL auto_increment, 
		idproduits int,
		nombres int,
		idutilisateur int,
		daty date,
		paye int,
		idpanier int,
         primary key(id),
		foreign key(idproduits) references article(id),
		foreign key(idutilisateur) references utilisateur(id),
		foreign key(idpanier) references panier(id)
	);
	create table historiqueproduitsvendus(
	    id int unsigned NOT NULL auto_increment, 
		idproduits int,
		nombres int,
		idutilisateur int,
		daty date,
		paye int,
         primary key(id),
		foreign key(idproduits) references article(id),
		foreign key(idutilisateur) references utilisateur(id)
	);
-- Insert into produitsvendus(idproduits,nombres,idutilisateur, daty) values("

modepaiement

create table modepaiement(
    id int  NOT NULL auto_increment, 
   compte varchar(100),
   primary key(id)
);
insert into modepaiement(compte) values('Espèce');
insert into modepaiement(compte) values('Chèque');
insert into modepaiement(compte) values('Virement');
insert into modepaiement(compte) values('Mobile Money');

create table detailsmodepaiement(
    id int  NOT NULL auto_increment, 
   idmodepaiement int,
   types varchar(50),
   foreign key(idmodepaiement) references modepaiement(id),
   primary key(id)
);
+----+--------------+
| id | compte       |
+----+--------------+
|  3 | Espèce       |
|  4 | Chèque       |
|  5 | Virement     |
|  6 | Mobile Money |
insert into detailsmodepaiement(idmodepaiement,types) values(4,'BMOI');
insert into detailsmodepaiement(idmodepaiement,types) values(4,'BFV');
insert into detailsmodepaiement(idmodepaiement,types) values(4,'BNI');
insert into detailsmodepaiement(idmodepaiement,types) values(6,'MVola');

create table categorie(
    id int  NOT NULL auto_increment, 
   nom varchar(100),
   primary key(id)
);
insert into categorie(nom) values('tous');
insert into categorie(nom) values('cuillère');
insert into categorie(nom) values('verre');
insert into categorie(nom) values('sous-tasse');


insert into categorie(nom) values('Accessoires');
insert into categorie(nom) values('vaisselle');
insert into categorie(nom) values('Art de la table');
insert into categorie(nom) values('couverts');
insert into categorie(nom) values('Verre');

create table tva(
		id int  NOT NULL auto_increment, 
		chiffre int,
	
		primary key(id)
);
insert into tva(chiffre) values(20);
create table souscategorie(
		id int  NOT NULL auto_increment, 
		idcategorie int,
		nom varchar(50),
		foreign key(idcategorie) references categorie(id),
		primary key(id)
);
+----+-------------+
| id | nom         |
+----+-------------+
|  8 | Accessoires |
|  9 | vaisselle   |
+----+-------------+
insert into souscategorie(idcategorie,nom) values(9,'cuillère ');
insert into souscategorie(idcategorie,nom) values(9,'verre ');
insert into souscategorie(idcategorie,nom) values(9,'fourchette');
insert into souscategorie(idcategorie,nom) values(9'tasse');
insert into souscategorie(idcategorie,nom) values(8,'machine à laver');
insert into souscategorie(idcategorie,nom) values(8,'robot');
insert into souscategorie(idcategorie,nom) values(9,'bol');
insert into souscategorie(idcategorie,nom) values(9,'marmite');


create table article(
    id int  NOT NULL auto_increment, 
	idsouscategorie int,
	image varchar(100),
    prix double,
	daty date,
    description varchar(500),
	foreign key(idsouscategorie) references souscategorie(id),
    primary key(id)
);

create view  concatenation as select c.id as idcategorie,sc.id as idscategorie,c.nom as categorie,sc. nom,a.prix,a.description,a.daty,a.image,a.id from article a join souscategorie sc on a.idsouscategorie=sc.id join categorie c on c.id=sc.idcategorie;
--cuillère
Insert into article(idsouscategorie,image,prix,daty,description) values(26,'images/loc/cuillere-a-sauce-inox.jpg',1200,'2018-01-01','cuillère à sauce inox');
Insert into article(idsouscategorie,image,prix,daty,description) values(26,'images/loc/cuisine_5311_cuillere_hetre_25cm.jpg',1100,'2018-01-04','cuillère en bois pour cuisine hetre 25cm');
Insert into article(idsouscategorie,image,prix,daty,description) values(26,'images/loc/multifonction.jpg',1300,'2018-01-03','cuillère multifonction souple et pratique');
Insert into article(idsouscategorie,image,prix,daty,description) values(26,'images/loc/spatule-en-bois-d-olivier-cuisine-spatule-bois-olive-cuillere-ustensile-de-cuisine-naturel-bio-louche-en-bois.jpg',1300,'2018-01-20',' spatule en bois d olivier et ustensile de cuisine naturel bio louche ');
Insert into article(idsouscategorie,image,prix,daty,description) values(29,'images/loc/41unmur9n0L._SX342_.jpg/',2000,'2018-01-20','Machine pour lavage de vaisselle');
Insert into article(idsouscategorie,image,prix,daty,description) values(29,'images/loc/location-lave-vaisselle-846538.jpg/',2100,'2018-01-20','lave vaisselle rapide  samsung');
Insert into article(idsouscategorie,image,prix,daty,description) values(31,'images/loc/blender.jpg',2100,'2018-01-20','blender mutifonction en considérant les glacons');
Insert into article(idsouscategorie,image,prix,daty,description) values(31,'images/loc/E.zicom Robot Extracteur de jus e.zichef vitamin smoothie.jpg',1500,'2018-01-20','E.zicom Robot Extracteur de jus e.zichef vitamin smoothie');
Insert into article(idsouscategorie,image,prix,daty,description) values(31,'images/loc/Avance Collection Masticating juicer.jpg',1550,'2018-01-20','Avance Collection Masticating juicer');
Insert into article(idsouscategorie,image,prix,daty,description) values(31,'images/loc/Mode Midea électrique robot mixeur jus de Fruits en acier Inoxydable 4 lame Traditionnelle alimentaire machine appareils de cuisine dans Mélangeurs de.jpg',1550,'now()','Mode Midea électrique robot mixeur jus de Fruits en acier Inoxydable 4 lame Traditionnelle alimentaire machine appareils de cuisine');
Insert into article(idsouscategorie,image,prix,daty,description) values(31,'images/loc/extracteur_de_jus_KitchenAid_accessoire_robot_5KSM1JA.jpg',1450,'2018-01-20','extracteur de jus KitchenAid accessoire robot 5KSM1JA');
Insert into article(idsouscategorie,image,prix,daty,description) values(32,'images/loc/assiette-25-cm-lumiere.jpg',1450,'2018-01-20','Bol pour les fruits et légumes');
Insert into article(idsouscategorie,image,prix,daty,description) values(32,'images/loc/backig-bol-noir__0496814_PE628818_S4.jpg',1450,'now()','backig bol noir');
Insert into article(idsouscategorie,image,prix,daty,description) values(32,'images/loc/bova01203-5.jpg',1150,'now()','Bol transparent pour les désserts ou autre');
Insert into article(idsouscategorie,image,prix,daty,description) values(33,'images/loc/marmite-a-soupe-bain-marie-8l.jpg',1150,'now()','marmite à soupe bain marie 8l');Insert into article(idsouscategorie,image,prix,daty,description) values(33,'images/loc/marmite-a-soupe-bain-marie-8l.jpg',1150,'now()','marmite à soupe bain marie 8l');
Insert into article(idsouscategorie,image,prix,daty,description) values(33,'images/loc/MELODIA-Marmite-avec-couvercle_product_image_land.jpg',1050,'now()','MELODIA Marmite avec couvercle');
;Insert into article(idsouscategorie,image,prix,daty,description) values(33,'images/loc/tefal-extra-brownie-marmite-30cm-couvercle-b3006.jpg',1130,'now()','tefal extra brownie marmite 30cm et couvercle b3006');
Insert into article(idsouscategorie,image,prix,daty,description) values(33,'images/loc/Repose-cuillère Douglas  2-en-1.jpg',1130,'now()','Repose cuillère Douglas  2-en-1');
Insert into article(idsouscategorie,image,prix,daty,description) values(27,'images/loc/verre-a-vin-en-verre-effet-chrome-harmonie-700-14-29-146112_1.jpg',930,'now()','verre à vin en verre effet chrome harmonie');
Insert into article(idsouscategorie,image,prix,daty,description) values(27,'images/loc/verre-a-vin-ballon-12-cl-vendu-par-48-ref61857--FR_PIM_258855001001_01.jpg',930,'now()','verre à vin ballon 12 cl ');
Insert into article(idsouscategorie,image,prix,daty,description) values(27,'images/loc/verre-plastique-pour-gobelet-25cl-par-50_01.jpg',930,'now()','verre plastique pour gobelet  25cl');
Insert into article(idsouscategorie,image,prix,daty,description) values(27,'images/loc/verre-personnalise.jpg',930,'now()','verre personnalisée');
Insert into article(idsouscategorie,image,prix,daty,description) values(28,'images/loc/fourchette-a-huitres-2-86.jpg',930,'now()','fourchette à huitres');
Insert into article(idsouscategorie,image,prix,daty,description) values(28,'images/loc/fourchette-bois-l-15-5-cm.jpg',800,'now()','fourchette bois 15 cm');
Insert into article(idsouscategorie,image,prix,daty,description) values(28,'images/loc/hapifork-fourchette-publicitairejpg',800,'now()','hapifork fourchette publicitaire');
Insert into article(idsouscategorie,image,prix,daty,description) values(28,'images/loc/163580_ALOA_FOURCHETTE_TABLE_01.jpg',700,now(),'fourchette  de table');