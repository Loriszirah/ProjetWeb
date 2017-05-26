<?php
//fonctions d'accès a la base de données du type utilisateur

function getInfosUtilisateur($idUtilisateur){
  //donnée : id de l'utilisateur
	//pre : idUtilisateur : entier >0
	//resultat : l'ensemble des informations sur l'utilisateur

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT p.nom as nom,p.prenom as prenom,p.email as email,p.pseudo as pseudo,u.age as age,
			 									u.telephone as telephone,v.libelle as libelle
											 FROM Utilisateur u
										   INNER JOIN Personne p ON p.idPersonne=u.idPersonne
											 WHERE p.idPersonne=?');
		$req->execute(array($idUtilisateur));
		$infos=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des infos de l'utilisateur" );
}
	return $infos;
}

function getPseudoUtilisateur($idUtilisateur){
  //donnée : id de l'utilisateur
	//pre : idUtilisateur : entier >0
	//resultat : le pseudo de l'utilisateur

  global $pdo;
	try{
		$req=$pdo->prepare('SELECT pseudo FROM Personne p
																			INNER JOIN Utilisateur u ON u.idPersonne=p.idPersonne
																			WHERE p.idPersonne=?');
		$req->execute(array($idUtilisateur));
		$pseudo=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du pseudo de l'utilisateur" );
}
	return $pseudo[0];
}

function setAgeUtilisateur($idPersonne,$newAge){
	//donnée : id de la personne et nouveau age
  //resultat : change l'age de la personne et le remplace par le nouveau age

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Utilisateur SET age=? WHERE idPersonne=?');
		$req->execute(array($newAge,$idPersonne));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification de l'age de l'utilisateur" );
    }
}

function setTelephoneUtilisateur($idPersonne,$newTelephone){
	//donnée : id de la personne et nouveau téléphone
  //resultat : change le téléphone de la personne et le remplace par le nouveau téléphone

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Utilisateur SET telephone=? WHERE idPersonne=?');
		$req->execute(array($newTelephone,$idPersonne));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du téléphone de l'utilisateur" );
    }
}
