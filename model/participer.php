<?php
//fonctions d'accès a la base de données du type Participer

function deleteEquipeCompetition($idCompetition,$idEquipeSupp){
  //donnée : id de la compétition et équipe à supprimer de cette compétition
  //résultat : supprime la participation de l'équipe à la compétition

  global $pdo;
	try{
    $req=$pdo->prepare('DELETE FROM Participer WHERE idEquipe=? AND idCompetition=?');
		$req->execute(array($idEquipeSupp,$idCompetition));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors la suppréssion de la participation de l'équipe à la compétition" );
  }
}
function getAllEquipesCompetition($idCompetition){
  //donnée : id de la compétition
	//resultat : l'ensemble des équipes qui participent à cette compétition

  global $pdo;
  try{
    $req=$pdo->prepare('SELECT e.idEquipe as idEquipe,p.pseudo as pseudo,p.email as email,e.nom as nom,e.idPersonne as idPersonne,u.telephone as telephone
												FROM Participer pa
												INNER JOIN Equipe e ON pa.idEquipe=e.idEquipe
												INNER JOIN Joueur j ON j.idPersonne=e.idPersonne
												INNER JOIN Utilisateur u ON u.idPersonne=e.idPersonne
												INNER JOIN Personne p ON p.idPersonne=e.idPersonne
                        WHERE pa.idCompetition=?');
    $req->execute(array($idCompetition));
    $list=$req->fetchAll();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de toutes les équipes de la compétition" );
    }
  return $list;
}

function getNombreParticipartions($idCompetition){
	//donnée : id de la compétition
	//résultat : nombre d'équipes participant à la compétition

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(idEquipe)
												FROM Participer p
												WHERE idCompetition=?');
		$req->execute(array($idCompetition));
		$nombre=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die("Erreur lors de la récupération du nombre d'équipes participant à la compétition" );
		}
	return $nombre[0];
}

function getAllCompetitionsJoueurParticipant($idJoueur){
    //donnée : id du joueur
    //résultat : l'ensemble des compétitions dont il éxiste une équipe, dans laquelle le joueur appartient, qui y participe

    global $pdo;
    try{
      $req=$pdo->prepare('SELECT c.nomCompetition as nom,c.dateDebutCompetition as dateDebut,v.libelle as ville,c.prixEntree as prix,
                          c.nbEquipes as nbEquipes,t.libelle as typeCompetition,c.idCompetition as idCompetition,e.idPersonne as idPersonne
                          FROM Participer p
                          INNER JOIN Competition c ON c.idCompetition=p.idCompetition
                          INNER JOIN Equipe e ON e.idEquipe=p.idEquipe
                          INNER JOIN Ville v ON v.idVille=c.idVille
                          INNER JOIN TypeCompetition t ON t.idTypeCompetition=c.idTypeCompetition
                          WHERE e.idEquipe IN (SELECT DISTINCT idEquipe FROM Appartenir WHERE idPersonne=?)');
      $req->execute(array($idJoueur));
      $competitions=$req->fetchAll();
    } catch(PDOException $e){
  			echo($e->getMessage());
  			die("Erreur lors de la récupération de l'ensemble des compétitions auquelles le joueur participe" );
  		}
  	return $competitions;
 }

 function addEquipeCompetition($idEquipe,$idCompetition){
   //donnée : id de l'équipe, id de la compétition
   //résultat : ajoute la participation de l'équipe à la compétition

   global $pdo;
   try{
     $req=$pdo->prepare('INSERT INTO Participer(idEquipe,idCompetition) VALUES(?,?)');
     $req->execute(array($idEquipe,$idCompetition));
   } catch(PDOException $e){
       echo($e->getMessage());
       die("Erreur lors l'ajout de la participation de l'équipe à la compétition" );
     }
 }
?>
