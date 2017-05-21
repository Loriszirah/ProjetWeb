<?php
//fonctions d'accès a la base de données du type utilisateur

function getInfosUtilisateur($idUtilisateur){
  //donnée : id de l'utilisateur
	//pre : idUtilisateur : entier >0
	//resultat : l'ensemble des informations sur l'utilisateur

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT * FROM Utilisateur u
															   INNER JOIN Personne p ON p.idPersonne=u.idPersonne
																 WHERE idPersonne=?');
		$req->execute(array($idUtilisateur));
		$infos=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des infos de l'utilisateur" );
}
	return $infos;
}

function getPsoeudoUtilisateur($idUtilisateur){
  //donnée : id de l'utilisateur
	//pre : idUtilisateur : entier >0
	//resultat : le pseudo de l'utilisateur

  global $pdo;
	try{
		$req=$pdo->prepare('SELECT pseudo FROM Personne WHERE idPersonne=?');
		$req->execute(array($idUtilisateur));
		$pseudo=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du pseudo de l'utilisateur" );
}
	return $pseudo;
}
