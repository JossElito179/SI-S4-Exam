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

create table trancheAge(
	idTrancheAge serial primary key,
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
	idTrancheAge integer,
	idObjectif integer,
	foreign key(idRegime) references regime(idRegime),
	foreign key(idTranchePoids) references tranchePoids(idTranchePoids),
	foreign key(idTrancheTaille) references trancheTaille(idTranchetaille),
	foreign key(idTrancheAge) references trancheAge(idTrancheAge),
	foreign key(idObjectif) references objectif(idObjectif)
); 

create table objectifRegimePrix(
	idObjectifRegime serial primary key
)

create table typeSport(
	idType serial primary key,
	nomType varchar(35)
);

create table excercice(
	idExercice serial primary key,
	nomExercice varchar(35),
	partieTravailler varchar(35),
	idTypeSport integer,
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

create view v_regime as select regimeAliment.idRegime , regimeAliment.jour , categorie.nom , regimeAliment.pourcentage , journee.nomJournee 
			from categorie join regimeAliment on categorie.idCategorie=regimeAliment.idCategorie join journee on 
			journee.idJournee=regimeAliment.idJournee;
