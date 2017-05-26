DROP TABLE IF EXISTS Personne CASCADE;
DROP TABLE IF EXISTS Administrateur CASCADE;
DROP TABLE IF EXISTS Utilisateur CASCADE;
DROP TABLE IF EXISTS TypeCompetition CASCADE;
DROP TABLE IF EXISTS Joueur CASCADE;
DROP TABLE IF EXISTS Organisateur CASCADE;
DROP TABLE IF EXISTS Equipe CASCADE;
DROP TABLE IF EXISTS Appartenir CASCADE;
DROP TABLE IF EXISTS Competition CASCADE;
DROP TABLE IF EXISTS Participer CASCADE;

Create table Personne(
	idPersonne SERIAL,
	nom Varchar(100),
	prenom Varchar(100),
	email Varchar(250),
	password Varchar(250),
	pseudo Varchar(250),
	CONSTRAINT pk_Person PRIMARY KEY(idPersonne)
);

Create table Administrateur(
	idPersonne Int,
	CONSTRAINT pk_adminSite PRIMARY KEY(idPersonne),
	CONSTRAINT fk_personne_adminSite FOREIGN KEY(idPersonne) REFERENCES Personne(idPersonne)
);

Create table Utilisateur(
	idPersonne int,
	age int,
	telephone Varchar(20),
	CONSTRAINT pk_utilisateur PRIMARY KEY(idPersonne),
	CONSTRAINT fk_personne_utilisateur FOREIGN KEY(idPersonne) REFERENCES Personne(idPersonne)
);

Create table TypeCompetition(
	idTypeCompetition SERIAL,
	libelle Varchar(100),
	nbJoueurs Int,
	CONSTRAINT pk_typecompetition PRIMARY KEY(idTypeCompetition )
);

Create table Joueur(
	idPersonne Int,
	CONSTRAINT pk_joueur PRIMARY KEY(idPersonne),
	CONSTRAINT fk_personne_joueur FOREIGN KEY(idPersonne) REFERENCES Utilisateur(idPersonne)	
);

Create table Organisateur(
	idPersonne Int,
	CONSTRAINT pk_organisateur PRIMARY KEY(idPersonne),
	CONSTRAINT fk_personne_organisateur FOREIGN KEY(idPersonne) REFERENCES Utilisateur(idPersonne)	
);

Create table Equipe(
	idEquipe SERIAL,
	idPersonne int,
	nom Varchar(100),
	Constraint pk_equipe PRIMARY KEY(idEquipe),
	Constraint fk_capitaine_equipe FOREIGN KEY(idPersonne) REFERENCES Joueur(idPersonne)
);

Create table Appartenir(
	idPersonne int,
	idEquipe int,
	CONSTRAINT pk_appartenir PRIMARY KEY(idPersonne,idEquipe),
	CONSTRAINT fk_appartenir_joueur FOREIGN KEY (idPersonne) REFERENCES Joueur(idPersonne),
	CONSTRAINT fk_appartenir_equipe FOREIGN KEY (idEquipe) REFERENCES Equipe(idEquipe)
);

Create table Competition(
	idCompetition SERIAL,
	idTypeCompetition int,
	idPersonne int,
	nomCompetition Varchar(100),
	dateDebutCompetition Date,
	nbEquipes int,
	prixEntree float,
	adresse Varchar(250),
	description Varchar(500),
	CONSTRAINT pk_competition PRIMARY KEY(idCompetition),
	CONSTRAINT fk_utilisateur_competition FOREIGN KEY(idPersonne) REFERENCES Utilisateur(idPersonne),
	CONSTRAINT fk_typecompetition_competition FOREIGN KEY(idTypeCompetition) REFERENCES TypeCompetition(idTypeCompetition)
);

Create table Participer(
	idEquipe int,
	idCompetition int,
	CONSTRAINT pk_participate PRIMARY KEY(idEquipe,idCompetition),
	CONSTRAINT fk_equipe_participer FOREIGN KEY(idEquipe) REFERENCES Equipe(idEquipe),
	CONSTRAINT fk_competition_participer FOREIGN KEY(idCompetition) REFERENCES Competition(idCompetition)
);
