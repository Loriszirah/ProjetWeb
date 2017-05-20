<?php
//fonctions d'accès a la base de données du type joueur
$pdo=new PDO("pgsql:dbname='dc73ovmdsu7c1o';host='ec2-46-137-97-169.eu-west-1.compute.amazonaws.com','feoilwsqqlyeaz','76f373700f07860ad6b2086111b0964b3ec05e40b2c2fd492f9c89c842804b5c'");

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

function existeJoueurPsoeudo($psoeudo){
	//donnée : psoeudo du joueur
  //pre : psoeudo String
	//resultat : true si un joueur éxiste avec ce psoeudo, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Player WHERE psoeudo=?');
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
