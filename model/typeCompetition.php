<?php
//fonctions d'accès a la base de données du type typeCompetition

function getTypes(){
	//resultat : retourne l'ensemble des types

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT * FROM typeCompetition');
		$req->execute();
		$types=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'ensemble des types de compétition" );
}
	return $types;
}

function getIdType($libelleType){
	//donnée : le libellé d'un type de compétition
	//résultat : retourne l'id du type passé en paramèThread

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT idTypeCompetition FROM typeCompetition WHERE libelle=?');
		$req->execute(array($libelleType));
		$id=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du type de compétition" );
}
	return $id[0];
}
