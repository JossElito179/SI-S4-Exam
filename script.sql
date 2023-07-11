create table genre(
	idGenre serial primary key,
	genre varchar(35)
);

create table utilisateur(
	id serial primary key,
	nom varchar(35),
	email varchar(35),
	idGenre integer,
	mdp varchar(35),
	dateDeNaissance date,
	isAdmin boolean,
	foreign key(idGenre) references genre(idGenre)
);

create table objectif(
	idObjectif serial primary key,
	option varchar(35)
);

create table infoUtilisateur(
	idInfoUtilisateur serial primary key,
	idutilisateur integer,
	taille double precision,
	idObjectif integer,
	poidsActuelle integer,
	poidObjectif integer,
	dateDeDebut date,
	foreign key(idObjectif) references objectif(idObjectif),
	foreign key(idutilisateur) references utilisateur(id)
);

create table tranchePoids(
	idTranchePoids serial primary key,
	min double precision,
	max double precision
);

create table trancheTaille(
	idTranchetaille serial primary key,
	min double precision,
	max double precision
);

create table categorie(
	idCategorie serial primary key,
	nomCategorie varchar(35)
);

create table Aliment(
	idAliment serial  primary key, 
	nomAliment varchar(35)
);

create table categorieAliment(
	idCategorieAliment serial primary key,
	idCategorie integer,
	idAliment integer,
	foreign key(idCategorie) references categorie(idCategorie),
	foreign key(idAliment) references Aliment(idAliment)
);

create table regime(
	idRegime serial primary key,
	nomRegime varchar(35)	
);

create table journee(
	idJournee serial primary key,
	nomJournee varchar(35)
);

create table regimeAliment(
	idRegimeAliment serial primary key,
	idRegime integer,
	idCategorie integer,
	pourcentage double precision,
	idJournee integer,
	jour integer,
	foreign key(idRegime) references regime(idRegime),
	foreign key(idCategorie) references categorie(idCategorie),
	foreign key(idJournee) references journee(idJournee)
);

--jour delimite le dernier jour du regime

create table objectifRegime(
	idObjectifRegime serial primary key,
	idRegime integer,
	idTranchePoids integer,
	idTranchetaille integer,
	idObjectif integer,
	foreign key(idRegime) references regime(idRegime),
	foreign key(idTranchePoids) references tranchePoids(idTranchePoids),
	foreign key(idTrancheTaille) references trancheTaille(idTranchetaille),
	foreign key(idObjectif) references objectif(idObjectif)
); 



create table typeSport(
	idType serial primary key,
	nomType varchar(35)
);

create table excercice(
	idExercice serial primary key,
	nomExercice varchar(35),
	partieTravailler varchar(35),
	idType integer,
	foreign key(idType) references typeSport(idType)
);

create table activiteSportive(
	idActiviteSportive serial primary key,
	idExercice integer,
	repetition double precision,
	frequence double precision,
	foreign key(idExercice) references excercice(idExercice)
);


create table objectifSportive(
	idObjectifSportive serial primary key,
	idRegime integer,
	idActiviteSportive integer,
	idTranchePoids integer,
	idTranchetaille integer,
	idTrancheAge integer,
	idObjectif integer,
	foreign key(idTranchePoids) references tranchePoids(idTranchePoids),
	foreign key(idTrancheTaille) references trancheTaille(idTranchetaille),
	foreign key(idTrancheAge) references trancheAge(idTrancheAge),
	foreign key(idActiviteSportive) references activiteSportive(idActiviteSportive)
); 

create table regimePersonne(
	idRegimePersonne serial primary key,
	idRegime integer,
	idUtilisateur integer,
	dateDebut date,
	dateFin date,
	foreign key(idRegime) references regime(idRegime),
	foreign key(idUtilisateur) references utilisateur(id)
);

create view v_regime as select regimeAliment.idRegime , regimeAliment.jour , categorie.nomCategorie , regimeAliment.pourcentage , journee.nomJournee 
			from categorie join regimeAliment on categorie.idCategorie=regimeAliment.idCategorie join journee on 
			journee.idJournee=regimeAliment.idJournee;

insert into utilisateur values(default, 'henintsoa', 'henintsoa@gmail.com', 1, 'henintsoa', current_date);

-- Insertion de Genre
insert into genre values(default, 'Homme');
insert into genre values(default, 'Femme');


-- Insertion d'Objectif
insert into objectif values(default, 'Diminuer');
insert into objectif values(default, 'Augmenter');


-- Insertion de Aliment
-- Fruit
insert into Aliment values(default, 'Poire');
insert into Aliment values(default, 'Litchis');
insert into Aliment values(default, 'Pibasy');
insert into Aliment values(default, 'Avocat');
insert into Aliment values(default, 'Pasteque');
insert into Aliment values(default, 'Banane');
insert into Aliment values(default, 'Pomme');
insert into Aliment values(default, 'Citron');
insert into Aliment values(default, 'Peche');
insert into Aliment values(default, 'Goaiave');


-- Legume
insert into Aliment values(default, 'Carotte');
insert into Aliment values(default, 'Cocombre');
insert into Aliment values(default, 'Tomate');
insert into Aliment values(default, 'Patates');
insert into Aliment values(default, 'Courgette');
insert into Aliment values(default, 'Haricot Vert');
insert into Aliment values(default, 'Aubergine');
insert into Aliment values(default, 'Chou fleur');
insert into Aliment values(default, 'Brocoli');
insert into Aliment values(default, 'Epinard');


-- Accompagnement
insert into Aliment values(default, 'Patates Douces');
insert into Aliment values(default, 'Lentille');
insert into Aliment values(default, 'riz');
insert into Aliment values(default, 'Spagettis');
insert into Aliment values(default, 'Macaronies');
insert into Aliment values(default, 'Pain');
insert into Aliment values(default, 'Mais');
insert into Aliment values(default, 'Yaourt');


-- Proteine
insert into Aliment values(default, 'Poulet');
insert into Aliment values(default, 'Steak');
insert into Aliment values(default, 'Saumon');
insert into Aliment values(default, 'Canard');
insert into Aliment values(default, 'Dindon');
insert into Aliment values(default, 'Cochon');
insert into Aliment values(default, 'Thon');
insert into Aliment values(default, 'Crevettes');
insert into Aliment values(default, 'Chevre');
insert into Aliment values(default, 'Mouton');


-- Sucre
insert into Aliment values(default, 'Miel');
insert into Aliment values(default, 'Gateau');
insert into Aliment values(default, 'Biscuit');
insert into Aliment values(default, 'Bonbon');
insert into Aliment values(default, 'Jus');
insert into Aliment values(default, 'Chocolat');
insert into Aliment values(default, 'Glace');
insert into Aliment values(default, 'Cookies');
insert into Aliment values(default, 'Creme glace');
insert into Aliment values(default, 'Crepes sucree');


-- Insertion de Categorie
insert into categorie values(default, 'fruit');
insert into categorie values(default, 'legume');
insert into categorie values(default, 'proteine');
insert into categorie values(default, 'sucre');
insert into categorie values(default, 'accompagnement');

-- Insertion de Categorie Aliment
-- Fruit
insert into categorieAliment values(default, 5, 1);
insert into categorieAliment values(default, 5, 2);
insert into categorieAliment values(default, 5, 3);
insert into categorieAliment values(default, 5, 4);
insert into categorieAliment values(default, 5, 5);
insert into categorieAliment values(default, 5, 6);
insert into categorieAliment values(default, 5, 7);
insert into categorieAliment values(default, 5, 8);
insert into categorieAliment values(default, 5, 9);
insert into categorieAliment values(default, 5, 10);
-- Legume
insert into categorieAliment values(default, 2, 11);
insert into categorieAliment values(default, 2, 12);
insert into categorieAliment values(default, 2, 13);
insert into categorieAliment values(default, 2, 14);
insert into categorieAliment values(default, 2, 15);
insert into categorieAliment values(default, 2, 16);
insert into categorieAliment values(default, 2, 17);
insert into categorieAliment values(default, 2, 18);
insert into categorieAliment values(default, 2, 19);
insert into categorieAliment values(default, 2, 20);
-- Accompagnement
insert into categorieAliment values(default, 3, 21);
insert into categorieAliment values(default, 3, 22);
insert into categorieAliment values(default, 3, 23);
insert into categorieAliment values(default, 3, 24);
insert into categorieAliment values(default, 3, 25);
insert into categorieAliment values(default, 3, 26);
insert into categorieAliment values(default, 3, 27);
insert into categorieAliment values(default, 3, 28);
-- Proteine
insert into categorieAliment values(default, 4, 29);
insert into categorieAliment values(default, 4, 30);
insert into categorieAliment values(default, 4, 31);
insert into categorieAliment values(default, 4, 32);
insert into categorieAliment values(default, 4, 33);
insert into categorieAliment values(default, 4, 34);
insert into categorieAliment values(default, 4, 35);
insert into categorieAliment values(default, 4, 36);
insert into categorieAliment values(default, 4, 37);
insert into categorieAliment values(default, 4, 38);
-- Sucre
insert into categorieAliment values(default, 5, 39);
insert into categorieAliment values(default, 5, 40);
insert into categorieAliment values(default, 5, 41);
insert into categorieAliment values(default, 5, 42);
insert into categorieAliment values(default, 5, 43);
insert into categorieAliment values(default, 5, 44);
insert into categorieAliment values(default, 5, 45);
insert into categorieAliment values(default, 5, 46);
insert into categorieAliment values(default, 5, 47);
insert into categorieAliment values(default, 5, 48);

-- Regime (Combinaison Aliment ho ana Regime Iray)
-- Perte de poids
insert into regime values(default, 'Regime hypocalorique');
insert into regime values(default, 'Regime faible en glucides');
insert into regime values(default, 'Regime mediterraneen modifie pour la perte de poids');
insert into regime values(default, 'Regime vegetarien ou vegetarien pour la perte de poids');
insert into regime values(default, 'Regime cetogene');
insert into regime values(default, 'Regime Atkins');
insert into regime values(default, 'Regime de jeuene intermittent');
-- Augmentation de poids
insert into regime values(default, 'Regime')

insert into journee values(default,'Matin'),
						  (default,'Midi');

insert into tranchePoids values (default,1,5),
						(default,6,10),
						(default,6,20);

insert into trancheTaille values (default,80,120),
						 (default,121,170),
						 (default,171,220);


insert into regimeAliment values(default,1,3,40,1,3),
						 (default,1,2,30,1,3),
						 (default,1,5,30,1,3),
						 (default,1,4,0,1,3),
						 (default,1,1,0,1,3),
						 
						 (default,1,3,25,1,4),
						 (default,1,2,25,1,4),
						 (default,1,4,25,1,4),
						 (default,1,1,25,1,4),
						 (default,1,5,0,1,4),

						 (default,1,3,20,1,2),
						 (default,1,2,20,1,2),
						 (default,1,4,20,1,2),
						 (default,1,1,20,1,2),
						 (default,1,5,20,1,2),

						 (default,2,3,25,1,15),
						 (default,2,2,25,1,15),
						 (default,2,4,25,1,15),
						 (default,2,1,25,1,15),
						 (default,2,5,0,1,15),

						 (default,2,3,25,1,30),
						 (default,2,2,25,1,30),
						 (default,2,4,25,1,30),
						 (default,2,1,15,1,30),
						 (default,2,5,10,1,30),

						 (default,3,3,25,1,30),
						 (default,3,2,10,1,30),
						 (default,3,4,35,1,30),
						 (default,3,1,25,1,30),
						 (default,3,5,0,1,30),

						 (default,4,3,0,1,7),
						 (default,4,2,25,1,7),
						 (default,4,4,25,1,7),
						 (default,4,1,25,1,7),
						 (default,4,5,25,1,7);


insert into regime values(default, 'Regime hypocalorique');
insert into regime values(default, 'Regime faible en glucides');
insert into regime values(default, 'Regime mediterraneen modifie pour la perte de poids');
insert into regime values(default, 'Regime vegetarien ou vegetarien pour la perte de poids');
insert into regime values(default, 'Regime cetogene');
insert into regime values(default, 'Regime Atkins');
insert into regime values(default, 'Regime de jeuene intermittent');

create table objectifRegime(
	idObjectifRegime serial primary key,
	idRegime integer,
	idTranchePoids integer,
	idTranchetaille integer,
	idObjectif integer,
	foreign key(idRegime) references regime(idRegime),
	foreign key(idTranchePoids) references tranchePoids(idTranchePoids),
	foreign key(idTrancheTaille) references trancheTaille(idTranchetaille),
	foreign key(idObjectif) references objectif(idObjectif)
); 

insert into objectifRegime values (default , 1 , 1 , 1 , 2 ),
								  (default , 1 , 1 , 2 , 2 ),
								  (default , 1 , 1 , 3 , 2 ),
								  (default , 4 , 2 , 1 , 2 ),
								  (default , 4 , 2 , 2 , 2 ),
								  (default , 2 , 2 , 3 , 2 ),
								  (default , 1 , 3 , 1 , 2 ),
								  (default , 4 , 3 , 2 , 2 ),
								  (default , 1 , 3 , 3 , 2 ),

								  (default , 1 , 1 , 1 , 1 ),
								  (default , 2 , 1 , 2 , 1 ),
								  (default , 3 , 1 , 3 , 1 ),
								  (default , 1 , 2 , 1 , 1 ),
								  (default , 1 , 2 , 2 , 1 ),
								  (default , 2 , 2 , 3 , 1 ),
								  (default , 3 , 3 , 1 , 1 ),
								  (default , 2 , 3 , 2 , 1 ),
								  (default , 3 , 3 , 3 , 1 );
