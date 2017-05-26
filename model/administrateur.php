<?php
//fonctions d'accès a la base de données du type Appartenir

function existeAdministrateurId($idAdministrateur){
	//donnée : id de l'administrateur
	//résultat : true s'il éxiste un administrateur avec cet id, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Administrateur WHERE idAdministrateur=?');
		$req->execute(array($idAdministrateur));
		$compteur=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die("ERREUR lors de la vérification de l'éxistence de l'administrateur");
	}
	return $compteur[0]>0;
}

function deleteAdministrateur($idAdministrateur){
	//donnée : id de l'administrateur
	//résultat : supprime l'administrateur

	global $pdo;
	try{
		$req=$pdo->prepare('DELETE FROM Administrateur WHERE idPersonne=?');
		$req->execute(array($idAdministrateur));

		$req=$pdo->prepare('DELETE FROM Personne WHERE idPersonne=?');
		$req->execute(array($idAdministrateur));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression de l'administrateur");
		}
}

function getAllAdministrateurs($idAdministrateur){
  //donnée : id de l'administrateur
	//résultat : l'ensemble des administrateurs excepté celui passé en paramètre

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT * FROM Personne WHERE idPersonne=? AND idPersonne IN (SELECT idPersonne FROM Administrateur)');
		$req->execute(array($idAdministrateur));
    $administrateurs=$req->fetchAll();

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'ensemble des administrateurs");
		}
    return $administrateurs;
}

function existeAdministrateur($email, $password){
	//donnée : email et mot de passe de l'administrateur
	//resultat : true si un administrateur éxiste avec ce mail et mot de passe, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne p
																				INNER JOIN Administrateur a ON a.idPersonne=p.idPersonne
																				WHERE email=? AND password=?');
		$req->execute(array($email, $password));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence de l'administrateur" );
}
	return $compteur[0]>0;
}

function getAdministrateurId($email){
	//donnée : email du joueur
	//resultat : l'id de l'administrateur correspondant à cet email

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT p.idPersonne FROM Personne p
																						INNER JOIN Administrateur a ON a.idPersonne=p.idPersonne
																						WHERE email=?');
		$req->execute(array($email));
		$idAdministrateur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la recherche de l'administrateur avec cet email" );
}
	return $idAdministrateur[0];
}

function getNombreAdministrateurs(){
	//résultat : le nombre d'administrateurs présent sur le site

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Administrateur');
		$req->execute();
		$nbAdministrateurs=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de récupération du nombre d'administrateurs sur le site" );
		}
		return $nbAdministrateurs[0];
}

function ajoutAdministrateur($nom,$prenom,$email,$passwd,$pseudo){
	//résultat : ajoute l'administrateur à la BD

	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO Personne(nom,prenom,email,passwd,pseudo) VALUES(?,?,?,?,?)');
		$req->execute(array($nom,$prenom,$email,$passwd,$pseudo));

		$req=$pdo->prepare('SELECT idPersonne FROM Personne WHERE pseudo=?');
		$req->execute(array($pseudo));
		$id=$req->fetch();

		$req=$pdo->prepare('INSERT INTO Administrateur VALUES(?)');
		$req->execute(array($id[0]));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de l'ajout de l'administrateur à la bd" );
		}
}
?>
