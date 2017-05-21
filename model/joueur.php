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


function existeJoueur($idJoueur){
	//donnée : id du joueur
	//pre : idJoueur : entier >0
	//resultat : true si un joueur éxiste avec cet id, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Player WHERE idPerson=?');
		$req->execute(array($idJoueur));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
}
	return $compteur[0]>0;
}

function existeJoueurPseudo($pseudo){
	//donnée : pseudo du joueur
  //pre : pseudo String
	//resultat : true si un joueur éxiste avec ce pseudo, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Player WHERE pseudo=?');
		$req->execute(array($idJoueur));
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
		$req=$pdo->prepare('SELECT COUNT(*) FROM Player WHERE email=?');
		$req->execute(array($idJoueur));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
}
	return $compteur[0]>0;
}

function ajoutJoueur($nom,$prenom,$email,$passwd,$psoeudo,$age,$telephone,$ville){
	//donnée : informations du joueur à ajouter
	//resultat : ajoute le joueur à la bd

	global $pdo;
	try{
		/* Ajout du joueur dans Person */
		$req=$pdo->prepare('INSERT INTO Person(nom,prenom,email,psoeudo) VALUES (?,?,?,?,?)');
		$req->execute(array($nom,$prenom,$email,$psoeudo,$passwd));

		/* Selection de l'id du joueur ajouté */
		$req=$pdo->prepare('SELECT idPerson FROM Person WHERE psoeudo=?');
		$req->execute(array($psoeudo));
		$idPerson=$req->fetch();

		/* Ajout du joueur dans User */
		$req=$pdo->prepare('INSERT INTO User(idPerson,age,number,ville) VALUES (?,?,?,?)');
		$req->execute(array($idPerson,$age,$number,$ville));

		/* Ajout du joueur dans Player */
		$req=$pdo->prepare('INSERT INTO Player(idPerson) VALUES (?)');
		$req->execute(array($idPerson));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
		}
}
