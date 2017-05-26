<?php
//fonctions d'accès a la base de données du type Equipe

function existeEquipe($nomEquipe){
	//donnée : nomEquipe nom de l'équipe
	//resultat : true si une équipe éxiste avec ce nom, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Equipe WHERE nom=?');
		$req->execute(array($nomEquipe));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die("Erreur lors de la vérification de l'éxistence de l'équipe" );
}
	return $compteur[0]>0;
}

function existeEquipeid($idEquipe){
	//donnée : id de l'équipe
	//resultat : true si une équipe éxiste avec ce nom, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Equipe WHERE idEquipe=?');
		$req->execute(array($idEquipe));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die("Erreur lors de la vérification de l'éxistence de l'équipe" );
}
	return $compteur[0]>0;
}

function ajoutEquipe($nomEquipe,$idCapitaine){
	//donnée : nom et l'équipe et id du capitaine de l'équipe
	//resultat : créer l'équipe avec ce nom et ce capitaine

	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO Equipe(nom,idPersonne) VALUES (?,?)');
		$req->execute(array($nomEquipe,$idCapitaine));

		$req=$pdo->prepare('SELECT idEquipe FROM Equipe WHERE nom=?');
		$req->execute(array($nomEquipe));
		$idEquipe=$req->fetch();

		$req=$pdo->prepare('INSERT INTO Appartenir(idPersonne,idEquipe) VALUES (?,?)');
		$req->execute(array($idCapitaine,$idEquipe[0]));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors l'ajout de l'équipe" );
    }
}

function getAllEquipesJoueur($idJoueur){
  //donnée : id du joueur
	//resultat : l'ensemble des équipes dans lesquelles le joueur fait partit

  global $pdo;
  try{
    $req=$pdo->prepare('SELECT e.idEquipe as idEquipe,p.pseudo as pseudo,e.nom as nom,a.idPersonne as idPersonne,u.telephone as telephone
												FROM Appartenir a
												INNER JOIN Joueur j ON j.idPersonne=a.idPersonne
												INNER JOIN Utilisateur u ON u.idPersonne=a.idPersonne
												INNER JOIN Personne p ON p.idPersonne=a.idPersonne
												INNER JOIN Equipe e ON e.idEquipe=a.idEquipe
												WHERE a.idPersonne=?');
    $req->execute(array($idJoueur));
    $equipes=$req->fetchAll();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de toutes les équipes du joueur" );
    }
  return $equipes;
}

function getTestIdPostgre(){
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT idEquipe FROM Equipe');
		$req->execute();
		$ids=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de tous les id des équipes" );
    }
  return $ids;
}

function getAllEquipes(){
	//resultat : l'ensemble des équipes

  global $pdo;
  try{
    $req=$pdo->prepare('SELECT e.idEquipe as idEquipe,p.pseudo as pseudo,e.nom as nom,e.idPersonne as idPersonne,u.telephone as telephone
												FROM Equipe e
												INNER JOIN Joueur j ON j.idPersonne=e.idPersonne
												INNER JOIN Utilisateur u ON u.idPersonne=e.idPersonne
												INNER JOIN Personne p ON p.idPersonne=e.idPersonne');
    $req->execute();
    $equipes=$req->fetchAll();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de toutes les équipes" );
    }
  return $equipes;
}

function getIdEquipe($nomEquipe){
	//donnée : nom de l'équipe
	//résultat : l'id de l'équipe ayant ce nomEquipe

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT idEquipe FROM Equipe WHERE nom=?');
		$req->execute(array($nomEquipe));
    $equipe=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors la recherche de l'équipe" );
  }
	return $equipe[0];
}
function getInfosEquipe($idEquipe){
  //donnée : id de l'équipe
  //résultat : retourne les infos de l'équipe ayant cet id

  global $pdo;
	try{
		$req=$pdo->prepare('SELECT e.nom as nom,p.pseudo as pseudo,e.idEquipe as idEquipe,COUNT(e.idEquipe) as nbJoueursEquipe,e.idPersonne as idPersonne
											  FROM Equipe e
												INNER JOIN Personne p ON e.idPersonne=p.idPersonne
												INNER JOIN Appartenir a ON a.idEquipe=e.idEquipe
												WHERE e.idEquipe=?
												GROUP BY e.idEquipe,e.nom,p.pseudo,e.idPersonne');
		$req->execute(array($idEquipe));
    $equipe=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors la recherche de l'équipe" );
  }
  return $equipe;
}


function deleteEquipe($idEquipe){
  //donnée : id de l'équipe
  //résultat :supprime l'équipe ainsi que tous ces membres dans la table Appartenir

  global $pdo;
	try{
    //Suppréssion de tous les membres de l'équipe
		$req=$pdo->prepare('DELETE FROM Appartenir WHERE idEquipe=?');
		$req->execute(array($idEquipe));

    //Suppréssion de l'équipe
    $req=$pdo->prepare('DELETE FROM Equipe WHERE idEquipe=?');
		$req->execute(array($idEquipe));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors la suppréssion de l'équipe" );
  }
}

function setNomEquipe($idEquipe,$nom){
	//donnée : id de l'équipe, et nom nouveau nom de l'équipe
	//résultat : remplace le nom de l'équipe par celui passé en paramètre

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Equipe SET nom=? WHERE idEquipe=?');
		$req->execute(array($nom,$idEquipe));
		} catch(PDOException $e){
				echo($e->getMessage());
				die(" Erreur lors de la modification du nom de cette équipe" );
		}
}

function deleguerCapitaine($idEquipe,$idNewJoueur){
	//donnée : id de l'équipe et l'id du nouveau capitaine
	//résultat : change le capitaine de l'équipe et le remplace par le joueur passé en paramètrue

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Equipe SET idPersonne=? WHERE idEquipe=?');
		$req->execute(array($idNewJoueur,$idEquipe));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors du changement de capitaine de l'équipe" );
	}
}

function getEquipes($idJoueur,$idCompetition){
	//donnée : id du joueur,id du type de competition et id de la compétition
	//résultat : l'ensemble des noms d'équipes dont le capitaine est le joueur passé en paramètre et dont
	//					 l'équipe ne doit pas déjà être inscrit dans cette compétition.

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT e.nom as nom,e.idEquipe as idEquipe
												FROM (SELECT * FROM Equipe WHERE idPersonne=? AND idEquipe NOT IN(SELECT idEquipe FROM Participer WHERE idCompetition=?)) e');
	  $req->execute(array($idJoueur,$idCompetition));
		$equipes=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'ensemble des équipes" );
	}
	return $equipes;
}

function getAllMembres($idEquipe){
	//donnée : id de l'équipe
	//résultat : l'ensemble des joueurs de cette équipe

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT a.idPersonne as idPersonne,nom,prenom,age,pseudo
												FROM Appartenir a
												INNER JOIN Utilisateur u ON u.idPersonne=a.idPersonne
												INNER JOIN Personne p ON p.idPersonne=a.idPersonne
												WHERE idEquipe=?');
	  $req->execute(array($idEquipe));
		$joueurs=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'ensemble des joueurs de l'équipe" );
	}
	return $joueurs;
}

function getInfosEquipeParticipantCompetition($idJoueur,$idCompetition){
	//donnée : id du joueur et id de la compétition
	//résultat : les infos de l'équipe dont le joueur est membre et qui participe à la compétition passé en paramètrue

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT e.nom as nom,e.idPersonne as idPersonne
												FROM Equipe e
												INNER JOIN Participer p ON p.idEquipe=e.idEquipe
												INNER JOIN Competition c ON c.idCompetiton=p.idCompetition
												WHERE c.idCompetiton=? AND
												e.idEquipe IN (SELECT idEquipe FROM Appartenir WHERE a.idPersonne=?)');
		$req->execute(array($idCompetition,$idJoueur));
		$infos=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des informations de l'équipe participant à cette compétition" );
	}
	return $infos;
}

function getNombreEquipes(){
	//résultat : le nombre d'équipes présente sur le site

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Equipe');
		$req->execute();
		$nbEquipes=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de récupération du nombre d'équipes sur le site" );
		}
		return $nbEquipes[0];
}

?>
