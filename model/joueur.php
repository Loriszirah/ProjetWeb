<?php
//fonctions d'accès a la base de données du type joueur


function getAllJoueurs(){
	//resultat : retourne l'ensemble des joueurs

	try{
		global $pdo;

		$req=$pdo->prepare('SELECT u.telephone as telephone, p.email as email, p.pseudo as pseudo, p.idPersonne as idPersonne
												FROM Joueur j
												INNER JOIN Utilisateur u ON u.idPersonne=j.idPersonne
												INNER JOIN Personne p ON p.idPersonne=j.idPersonne');
		$req->execute(array());
		$joueurs=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'ensemble des joueurs" );
}
	return $joueurs;
}


function existeJoueur($email, $password){
	//donnée : email et mot de passe du joueur
	//resultat : true si un joueur éxiste avec ce mail et mot de passe, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne p
																				INNER JOIN Utilisateur u ON u.idPersonne=p.idPersonne
																				INNER JOIN Joueur j ON j.idPersonne=p.idPersonne
																				WHERE email=? AND password=?');
		$req->execute(array($email, $password));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
}
	return $compteur[0]>0;
}

function existeJoueurPseudo($pseudo){
	//donnée : pseudo du joueur
	//resultat : true si un joueur éxiste avec ce pseudo, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne p
		 																		INNER JOIN Utilisateur u ON u.idPersonne=p.idPersonne
																				INNER JOIN Joueur j ON j.idPersonne=p.idPersonne
																				WHERE pseudo=?');
		$req->execute(array($pseudo));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur ce pseudo" );
}
	return $compteur[0]>0;
}

function existeJoueurEmail($email){
	//donnée : email du joueur
	//resultat : true si un joueur éxiste avec ce mail, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne WHERE email=?');
		$req->execute(array($email));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur avec cet email" );
}
	return $compteur[0]>0;
}

function existeJoueurId($idJoueur){
	//donnée : id du joueur
	//resultat : true si un joueur éxiste avec cet id, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne WHERE idPersonne=?');
		$req->execute(array($idJoueur));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur avec cet id" );
}
	return $compteur[0]>0;
}

function getJoueurId($email){
	//donnée : email du joueur
	//resultat : l'id du joueur correspondant à cet email

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT p.idPersonne FROM Personne p
																					INNER JOIN Utilisateur u ON u.idPersonne=p.idPersonne
																					INNER JOIN Joueur j ON j.idPersonne=p.idPersonne
																					WHERE email=?');
		$req->execute(array($email));
		$idJoueur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la recherche du joueur avec cet email" );
}
	return $idJoueur[0];
}

function ajoutJoueur($nom,$prenom,$email,$passwd,$pseudo,$age,$telephone){
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
		$idPersonne=$req->fetch();

		/* Ajout du joueur dans Utilisateur */
		$req=$pdo->prepare('INSERT INTO Utilisateur(idPersonne,age,telephone) VALUES (?,?,?)');
		$req->execute(array($idPersonne[0],$age,$telephone));

		/* Ajout du joueur dans Joueur */
		$req=$pdo->prepare('INSERT INTO Joueur(idPersonne) VALUES (?)');
		$req->execute(array($idPersonne[0]));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de l'ajout d'un joueur" );
		}
}

function getIdJoueur($pseudo){
	//donnée : pseudo du joueur
	//résultat : id du joueur ayant ce pseudo

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT p.idPersonne FROM Personne p
																						INNER JOIN Utilisateur u ON u.idPersonne=p.idPersonne
																						INNER JOIN Joueur j ON j.idPersonne=p.idPersonne
																						WHERE pseudo=?');
		$req->execute(array($pseudo));
		$idJoueur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la recherche du joueur avec ce pseudo");
}
	return $idJoueur[0];
}

function deleteJoueur($idJoueur){
	//donnée : id du joueur
	//résultat : supprime le joueur

	global $pdo;
	try{
		$req=$pdo->prepare('DELETE FROM Joueur WHERE idPersonne=?');
		$req->execute(array($idJoueur));

		$req=$pdo->prepare('DELETE FROM Utilisateur WHERE idPersonne=?');
		$req->execute(array($idJoueur));

		$req=$pdo->prepare('DELETE FROM Personne WHERE idPersonne=?');
		$req->execute(array($idJoueur));

		$req=$pdo->prepare('DELETE FROM Appartenir WHERE idPersonne=?');
		$req->execute(array($idJoueur));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la supprésion de joueur");
		}
}

function getNombreJoueurs(){
	//résultat : le nombre de joueurs présent sur le site

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Joueur');
		$req->execute();
		$nbJoueurs=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de récupération du nombre de joueurs sur le site" );
		}
		return $nbJoueurs[0];
}
?>
