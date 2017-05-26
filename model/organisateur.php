<?php
//fonctions d'accès a la base de données du type organisateur

function ajoutOrganisateur($nom,$prenom,$email,$passwd,$pseudo,$age,$telephone){
	//donnée : informations de l'organisateur à ajouter
	//resultat : ajoute l'organisateur à la bd

	global $pdo;
	try{
		/* Ajout du joueur dans Personne */
		$req=$pdo->prepare('INSERT INTO Personne(nom,prenom,email,pseudo,password) VALUES (?,?,?,?,?)');
		$req->execute(array($nom,$prenom,$email,$pseudo,$passwd));

		/* Selection de l'id de l'organisateur ajouté */
		$req=$pdo->prepare('SELECT idPersonne FROM Personne WHERE pseudo=?');
		$req->execute(array($pseudo));
		$idPersonne=$req->fetch();

		/* Ajout de l'organisateur dans Utilisateur */
		$req=$pdo->prepare('INSERT INTO Utilisateur(idPersonne,age,telephone) VALUES (?,?,?,?)');
		$req->execute(array($idPersonne[0],$age,$telephone));

		/* Ajout de l'organisateur dans Organisateur */
		$req=$pdo->prepare('INSERT INTO Organisateur(idPersonne) VALUES (?)');
		$req->execute(array($idPersonne[0]));

	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de l'ajout d'un organisateur" );
		}
}

function existeOrganisateur($email, $password){
	//donnée : email et mot de passe de l'organisateur
	//resultat : true si un organisateur éxiste avec ce mail et mot de passe, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne p
																				INNER JOIN Utilisateur u ON u.idPersonne=p.idPersonne
																				INNER JOIN Organisateur o ON o.idPersonne=p.idPersonne
																				WHERE email=? AND password=?');
		$req->execute(array($email, $password));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence de l'organisateur" );
}
	return $compteur[0]>0;
}

function getOrganisateurId($email){
	//donnée : email de l'organisateur
	//resultat : l'id de l'organisateur correspondant à cet email

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT p.idPersonne FROM Personne p
																					INNER JOIN Utilisateur u ON u.idPersonne=p.idPersonne
																					INNER JOIN Organisateur o ON o.idPersonne=p.idPersonne
																					WHERE email=?');
		$req->execute(array($email));
		$idOrganisateur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la recherche de l'organisateur avec cet email" );
}
	return $idOrganisateur[0];
}

function existeOrganisateurId($idOrganisateur){
	//donnée : id de l'organisateur
	//resultat : true s'il éxiste un organisateur avec cet id, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Organisateur WHERE idOrganisateur=?');
		$req->execute(array($idOrganisateur));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la recherche de l'éxistence d'un organisateur avec cet id" );
		}
		return $compteur[0]>0;
}

function deleteOrganisateur($idOrganisateur){
	//donnée : id de l'organisateur
	//resultat : supprime l'organisateur ayant cet id

	global $pdo;
	try{
		$req=$pdo->prepare('DELETE FROM Participer p
												INNER JOIN Competition c ON c.idCompetition=p.idCompetition
												 WHERE idPersonne=?');
		$req->execute(array($idOrganisateur));

		$req=$pdo->prepare('DELETE FROM Competition WHERE idPersonne=?');
		$req->execute(array($idOrganisateur));

		$req=$pdo->prepare('DELETE FROM Organisateur WHERE idPersonne=?');
		$req->execute(array($idOrganisateur));

		$req=$pdo->prepare('DELETE FROM Utilisateur WHERE idPersonne=?');
		$req->execute(array($idOrganisateur));

		$req=$pdo->prepare('DELETE FROM Personne WHERE idPersonne=?');
		$req->execute(array($idOrganisateur));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression de l'organisateur" );
		}
}

function getAllOrganisateurs(){
	//resultat : retourne l'ensemble des organisateurs

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT u.telephone as telephone,p.pseudo as pseudo,p.email as email,o.idPersonne as idPersonne
			 									FROM Organisateur o
												INNER JOIN Utilisateur u ON o.idPersonne=u.idPersonne
												INNER JOIN Personne p ON p.idPersonne=o.idPersonne');
		$req->execute();
		$organisateurs=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de selection de l'ensemble des organisateurs" );
		}
		return $organisateurs;
}


function getNombreOrganisateurs(){
	//résultat : le nombre d'organisateur présent sur le site

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Organisateur');
		$req->execute();
		$nbOrganisateurs=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de récupération du nombre d'organisateurs sur le site" );
		}
		return $nbOrganisateurs[0];
}

?>
