<?php
//fonctions d'accès a la base de données du type joueur

function getAll(){
	//resultat : retourne l'ensemble des joueurs

	try{

    global $pdo;

		$req=$pdo->prepare('SELECT * FROM Player');
		$req->execute(array());
		$list=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence du joueur" );
}
	return $list;
}
?>
