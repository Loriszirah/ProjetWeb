<?php
//fonctions d'accès a la base de données du type Team

function existeEquipe($nomEquipe){
	//donnée : nomEquipe nom de l'équipe
	//resultat : true si une équipe éxiste avec ce nom, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Team WHERE name=?');
		$req->execute(array($nomEquipe));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence de l'équipe" );
}
	return $compteur[0]>0;
}

function ajoutEquipe($nomEquipe,$idCapitaine){
	//donnée : nom et l'équipe et id du capitaine de l'équipe
	//resultat : créer l'équipe avec ce nom et ce capitaine

	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO Team(nom,idPerson) VALUES (?,?)');
		$req->execute(array($nomEquipe,$idCapitaine));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors l'ajout de l'équipe" );
    }
}

function getAllEquipes($idJoueur){
  //donnée : id du joueur
	//resultat : l'ensemble des équipes dans lesquelles le joueur fait partit

  global $pdo;
  try{
    $req=$pdo->prepare('SELECT DISTINCT t.nom,t.idPerson FROM Team t
                        INNER JOIN Belong b ON b.idTeam=t.idTeam
                        WHERE b.idPerson=?');
    $req->execute(array($idJoueur));
    $list=$req->fecthAll();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence de l'équipe" );
    }
  return $list;
}

function getEquipe($idEquipe){
  //donnée : id de l'équipe
  //résultat : retourne les infos de l'équipe ayant cet id

  global $pdo;
	try{
		$req=$pdo->prepare('SELECT * FROM Team WHERE idTeam=?');
		$req->execute(array($idEquipe));
    $equipe=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors la recherche de l'équipe" );
  }
  return $equipe
}


function deleteEquipe($idEquipe){
  //donnée : id de l'équipe
  //résultat :supprime l'équipe ainsi que tous ces membres dans la table Belong

  global $pdo;
	try{
    //Suppréssion de tous les membres de l'équipe
		$req=$pdo->prepare('DELETE FROM Belong WHERE idTeam=?');
		$req->execute(array($idEquipe));

    //Suppréssion de l'équipe
    $req=$pdo->prepare('DELETE FROM Team WHERE idTeam=?');
		$req->execute(array($idEquipe));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors la suppréssion de l'équipe" );
  }
}
