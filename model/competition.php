<?php
//fonctions d'accès a la base de données du type Team

function getInfosCompetition($idCompetition){
	//donnée : id de la competition
	//resultat : l'ensemble des informations de la competition

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT c.dateDebutCompetition as dateDebut, c.adresse as adresse,c.nomCompetition as nom, c.prixEntree as prix,
												c.description as description,v.libelle as libelleVille,c.nbEquipes as nbEquipes,u.telephone as telephone,
												t.libelle as libelleType,t.nbJoueurs as nbJoueurs,pe.pseudo as pseudo,pe.email as mail,c.idCompetition as idCompetition
                        FROM Competition c
                        INNER JOIN Utilisateur u ON c.idPersonne=u.idPersonne
                        INNER JOIN Personne pe ON pe.idPersonne=u.idPersonne
                        INNER JOIN TypeCompetition t ON t.idTypeCompetition=c.idTypeCompetition
                        INNER JOIN Ville v ON v.idVille=c.idVille');
		$req->execute(array($idCompetition));
		$infos=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die("Erreur lors de la récupération des infos de la compétition" );
}
	return $infos;
}

function getTypeCompetition($idCompetition){
  //donnée : id de la competition
	//resultat : l'id du type de la compétition
  global $pdo;
	try{
    $req=$pdo->prepare('SELECT idTypeCompetition FROM Competition WHERE idCompetition=?');
    $req->execute(array($idCompetition));
    $id=$req->fetch();
  }catch(PDOException $e){
  			echo($e->getMessage());
  			die("Erreur lors de la récupération de l'id du type de la compétition" );
  }
  return $id[0];
}

function getCompetitionsType($idTypeCompetition){
	//donnée : id d'un type de compétition
	//résultat : retourne l'ensemble des compétitions correspondant à ce type

	global $pdo;
	try{
    $req=$pdo->prepare('SELECT c.nomCompetition as nom,c.dateDebutCompetition as dateDebut,v.libelle as ville,c.prixEntree as prix,
												c.nbEquipes as nbEquipes,c.idCompetition as idCompetition
												FROM Competition c
												INNER JOIN Ville v ON v.idVille=c.idVille
												WHERE idTypeCompetition=? AND c.nbEquipes>(SELECT COUNT(*) FROM Participer WHERE idCompetition)');
    $req->execute(array($idTypeCompetition));
    $competitions=$req->fetchAll();
  }catch(PDOException $e){
  			echo($e->getMessage());
  			die("Erreur lors de la récupération de l'ensemble des compétitions correspondant à un type particulier" );
  }
  return $competitions;
}

function existeCompetitionNom($nomCompetition){
	//donnée : nom de la compétition
	//résultat: true s'il éxiste une compétition avec ce nom, false

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Competition WHERE nomCompetition=?');
		$req->execute(array($nomCompetition));
		$compteur=$req->fetch();
	}catch(PDOException $e){
  			echo($e->getMessage());
  			die("Erreur lors de la vérification de l'éxistence d'une compétition avec ce nom" );
  }
  return $compteur[0]>0;
}

function ajoutCompetition($nomCompetition,$idTypeCompetition,$idOrganisateur,$nbEquipes,$prix,$dateDebut,$description,$ville,$adresse){
	//donnée : nom de la compétition, id du type de la compétition, id de l'organisateur de la compétition, nombre d'équipes, prix d'entrée, date de début, description, libéllé de la ville et adresse de la compétition
	//résultat : ajoute la compétition

	global $pdo;
	try{
		/* Ajout de la ville si elle n'éxiste pas et récupération de l'id de la ville */
		$req=$pdo->prepare('SELECT COUNT(*) FROM Ville WHERE libelle=?');
		$req->execute(array($ville));
		$compteur=$req->fetch();

		if($compteur[0]<=0){
			$req=$pdo->prepare('INSERT INTO Ville(libelle) VALUES(?)');
			$req->execute(array($ville));
		}

		$req=$pdo->prepare('SELECT idVille FROM Ville WHERE libelle=?');
		$req->execute(array($ville));
		$idVille=$req->fetch();

		/* Ajout de la compétiton dans la table competition */
		$req=$pdo->prepare('INSERT INTO Competition (nomCompetition,idTypeCompetition,idPersonne,nbEquipes,prixEntree,dateDebutCompetition,description,idVille,adresse) VALUES(?,?,?,?,?,?,?,?,?)');
		$req->execute(array($nomCompetition,$idTypeCompetition,$idOrganisateur,$nbEquipes,$prix,$dateDebut,$description,$idVille[0],$adresse));
	}catch(PDOException $e){
  			echo($e->getMessage());
  			die("Erreur lors de l'ajout de la compétition" );
  }
}

function getAllCompetitionsOrga($idOrganisateur){
	//donnée : id de l'organisateur
	//résultat : l'ensemble des compétitions créées par l'organisateur avec l'ensemble des infos possibles

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT c.idCompetition as idCompetition,c.nbEquipes as nbEquipes, c.adresse as adresse, c.prixEntree as prix, c.description as description,c.nomCompetition as nomCompetition,
												v.libelle as libelleVille,t.libelle as libelleTypeCompetition,u.telephone as telephone,p.email as email,p.pseudo as pseudo, c.dateDebutCompetition as dateDebut
											 FROM Competition c
											 INNER JOIN Ville v on v.idVille=c.idVille
											 INNER JOIN Utilisateur u ON u.idPersonne=c.idPersonne
											 INNER JOIN Personne p ON p.idPersonne=c.idPersonne
											 INNER JOIN TypeCompetition t ON t.idTypeCompetition=c.idTypeCompetition
											 WHERE c.idPersonne=?');
		$req->execute(array($idOrganisateur));
		$competitions=$req->fetchAll();

	}catch(PDOException $e){
  			echo($e->getMessage());
  			die("Erreur lors de la récupération de l'ensemble des compétitions" );
  }
	return $competitions;
}

function getAllCompetitions(){
	//résultat : l'ensemble des compétitions avec l'ensemble des infos possibles

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT c.idCompetition as idCompetition,c.nbEquipes as nbEquipes, c.adresse as adresse, c.prixEntree as prix, c.description as description,c.nomCompetition as nom,
												v.libelle as libelleVille,t.libelle as libelleTypeCompetition,u.telephone as telephone,p.email as email,p.pseudo as pseudo, c.dateDebutCompetition as dateDebut
											 FROM Competition c
											 INNER JOIN Ville v on v.idVille=c.idVille
											 INNER JOIN Utilisateur u ON u.idPersonne=c.idPersonne
											 INNER JOIN Personne p ON p.idPersonne=c.idPersonne
											 INNER JOIN TypeCompetition t ON t.idTypeCompetition=c.idTypeCompetition');
		$req->execute();
		$competitions=$req->fetchAll();

	}catch(PDOException $e){
  			echo($e->getMessage());
  			die("Erreur lors de la récupération de l'ensemble des compétitions" );
  }
	return $competitions;
}

function existeCompetitionId($idCompetition){
	//donnée : id de la compétition
	//résultat: true s'il éxiste une compétition avec cet id, false

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Competition WHERE idCompetition=?');
		$req->execute(array($idCompetition));
		$compteur=$req->fetch();
	}catch(PDOException $e){
  			echo($e->getMessage());
  			die("Erreur lors de la vérification de l'éxistence d'une compétition avec cet id" );
  }
  return $compteur[0]>0;
}

function deleteCompetition($idCompetition){
  //donnée : id de la compétition
  //résultat : supprime la compétition ainsi que toutes les équipes y participant

  global $pdo;
	try{
    //Suppréssion de toutes les équipes participant à cette compétition
		$req=$pdo->prepare('DELETE FROM Participer WHERE idCompetition=?');
		$req->execute(array($idCompetition));

    //Suppréssion de l'équipe
    $req=$pdo->prepare('DELETE FROM Competition WHERE idCompetition=?');
		$req->execute(array($idCompetition));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors la suppréssion de la compétition" );
  }
}

function getNombreCompetitions(){
	//résultat : le nombre de compétitions présent sur le site

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Competition');
		$req->execute();
		$nbCompetitions=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de récupération du nombre de competitions sur le site" );
		}
		return $nbCompetitions[0];
}

?>
