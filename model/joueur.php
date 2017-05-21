<?php
//fonctions d'accès a la base de données du type joueur


function getAll(){
	//resultat : retourne l'ensemble des joueurs

	try{
		global $pdo;

		$req=$pdo->prepare('SELECT * FROM Joueur');
		$req->execute(array());
		$list=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
}
	return $list;
}


function existeJoueur($email, $password){
	//donnée : email et mot de passe du joueur
	//resultat : true si un joueur éxiste avec ce mail et mot de passe, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne
																				WHERE email=? AND password=?');
		$req->execute(array($email, $password));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
}
	if($compteur[0]>0){
		return true;
	}
	else{
		return false;
	}
}

function existeJoueurPseudo($pseudo){
	//donnée : pseudo du joueur
  //pre : pseudo String
	//resultat : true si un joueur éxiste avec ce pseudo, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Joueur j
																				INNER JOIN Utilisateur u ON j.idPersonne=u.idPersonne
																				INNER JOIN Personne p ON p.idPersonne=u.idPersonne
																				WHERE pseudo=?');
		$req->execute(array($pseudo));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
}
	return $compteur[0]>0;
}

function existeJoueurEmail($email){
	//donnée : email du joueur
  //pre : email String
	//resultat : true si un joueur éxiste avec ce mail, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Joueur j
																				INNER JOIN Utilisateur u ON j.idPersonne=u.idPersonne
																				INNER JOIN Personne p ON p.idPersonne=u.idPersonne
																				WHERE email=?');
		$req->execute(array($email));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
}
	return $compteur[0]>0;
}

function ajoutJoueur($nom,$prenom,$email,$passwd,$pseudo,$age,$telephone,$ville){
	//donnée : informations du joueur à ajouter
	//resultat : ajoute le joueur à la bd

	global $pdo;
	try{
		/* Ajout du joueur dans Personne */
		$req=$pdo->prepare('INSERT INTO Personne(nom,prenom,email,pseudo,password) VALUES (?,?,?,?,?)');
		$req->execute(array($nom,$prenom,$email,$pseudo,$passwd));

		/* Selection de l'id du joueur ajouté */
		$req=$pdo->prepare('SELECT idPersonne FROM Personne WHERE pseudo=?');
		$req->execute(array($pseudo));
		$idPersonne=(int)$req->fetch();

		/* Ajout du joueur dans Utilisateur */
		$req=$pdo->prepare('INSERT INTO Utilisateur(idPersonne,age,telephone,ville) VALUES (?,?,?,?)');
		$req->execute(array($idPersonne,$age,$telephone,$ville));

		/* Ajout du joueur dans Joueur */
		$req=$pdo->prepare('INSERT INTO Joueur(idPersonne) VALUES (?)');
		$req->execute(array($idPersonne));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de l'ajout d'un joueur" );
		}
}
