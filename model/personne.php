<?php
//fonctions d'accès a la base de données du type personne

function existePersonnePseudo($pseudo){
	//donnée : pseudo de la personne
  //pre : pseudo String
	//resultat : true si une personne éxiste avec ce pseudo, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne WHERE pseudo=?');
		$req->execute(array($pseudo));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence de la personne avec ce pseudo" );
}
	return $compteur[0]>0;
}

function existePersonneEmail($email){
	//donnée : email de la personne
  //pre : email String
	//resultat : true si une personne éxiste avec ce mail, false sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM Personne WHERE email=?');
		$req->execute(array($email));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'éxistence de la personne avec cet email" );
}
	return $compteur[0]>0;
}

function setPseudoPersonne($idPersonne,$newPseudo){
	//donnée : id de la personne et nouveau pseudo
  //resultat : change le pseudo de la personne et le remplace par le nouveau pseudo

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Personne SET pseudo=? WHERE idPersonne=?');
		$req->execute(array($newPseudo,$idPersonne));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du pseudo de la personne" );
    }
}

function setNomPersonne($idPersonne,$newNom){
	//donnée : id de la personne et nouveau nom
  //resultat : change le nom de la personne et le remplace par le nouveau nom

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Personne SET nom=? WHERE idPersonne=?');
		$req->execute(array($newNom,$idPersonne));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du nom de la personne" );
    }
}

function setPrenomPersonne($idPersonne,$newPrenom){
	//donnée : id de la personne et nouveau prenom
  //resultat : change le prenom de la personne et le remplace par le nouveau prenom

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Personne SET prenom=? WHERE idPersonne=?');
		$req->execute(array($newPrenom,$idPersonne));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du prenom de la personne" );
    }
}

function setPasswordPersonne($idPersonne,$newPassword){
	//donnée : id de la personne et nouveau password
  //resultat : change le password de la personne et le remplace par le nouveau password

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Personne SET password=? WHERE idPersonne=?');
		$req->execute(array($newPassword,$idPersonne));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du password de la personne" );
    }
}

function setEmailPersonne($idPersonne,$newEmail){
	//donnée : id de la personne et nouveau email
  //resultat : change l'email de la personne et le remplace par le nouveau email

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Personne SET email=? WHERE idPersonne=?');
		$req->execute(array($newEmail,$idPersonne));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification de l'email de la personne" );
    }
}
