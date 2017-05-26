<?php
//fonctions d'accès a la base de données du type Appartenir

function existeJoueurEquipeId($idEquipe,$idJoueur){
	//donnée : id de l'équipe, pseudo du joueur
	//résultat : true si le joueur appartient à l'équipe, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Appartenir WHERE idEquipe=? AND idPersonne=?');
		$req->execute(array($idEquipe,$idJoueur));
		$compteur=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die("ERREUR lors de la vérification de l'appartenance du joueur à l'équipe");
	}
	return $compteur[0]>0;
}

function ajouterJoueur($idEquipe,$idJoueurAjout){
	//donnée : id de l'équipe, pseudo du joueur
	//résultat : ajoute le joueur à l'équipe

	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO Appartenir (idEquipe,idPersonne) VALUES(?,?)');
		$req->execute(array($idEquipe,$idJoueurAjout));
	} catch(PDOException $e){
		echo($e->getMessage());
		die("ERREUR lors de l'ajout du joueur à l'équipe");
	}
}

function deleteJoueurEquipe($idJoueur,$idEquipe){
	//donnée : id du joueur à supprimer et id de l'équipe dans laquelle appartient le joueur
	//résultat : supprime le joueur passé en paramètre qui appartient à l'équipe passé en paramètre

	global $pdo;
	try{
  		$req=$pdo->prepare('DELETE FROM Appartenir WHERE idEquipe=? AND idPersonne=?');
  		$req->execute(array($idEquipe,$idJoueur));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors la suppréssion du joueur dans cette équipe" );
	}
}
?>
