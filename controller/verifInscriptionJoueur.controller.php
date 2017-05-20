<?php
require_once('../model/connexionBD.php');
require_once('../model/Joueur.php');


   //TODO : mettre ces variables dans un fichier .env
  $key = "vOlleYYBallzTournAm1ntOrgAN1SatAurE";
  $keyCryptage= "ProJa1TWeib";

//vérifie que l'utilisateur n'est pas connecté
 if(!isset($_COOKIE["token"])){
	 //vérifie que tous les champs sont non vides et non NULL
	 if (isset($nom) && isset($prenom) && isset($passwd) && isset($passwdconf) && isset($email) &&isset($clefPromo) &&
   !empty($nom) && !empty($prenom) && !empty($passwd) && !empty($passwdconf) && !empty($email) && !empty($clefPromo)){
     //Sécurisation des données saisies
      $nom = htmlspecialchars ($_POST['nom']);
      $prenom = htmlspecialchars ($_POST['prenom']);
      $email = htmlspecialchars ($_POST['email']);
      $psoeudo = htmlspecialchars ($_POST['psoeudo']);
      $age = htmlspecialchars ($_POST['age']);
      $telephone = htmlspecialchars ($_POST['telephone']);
      $ville = htmlspecialchars ($_POST['ville']);
      $passwd = htmlspecialchars ($_POST['passwd']);
      $passwdconf = htmlspecialchars ($_POST['passwdconf']);

    	//On crypte le mot de passe avec un "grain de sel"
    	$passwd = crypt($passwd,$keyCryptage);
      $idPsoeudo=existeJoueur($psoeudo);
    	$idEmail=existeJoueur($email);
			//On vérifie que le joueur n'est pas déjà dans la base de données
	    if(!$idPsoeudo>0 && !idEmail>0){
         ajoutJoueur($idPromo,$mail,$nom,$prenom,$passwd,$ville,$psuedo,);
         header('Location:connexionJoueur.controller.php');
      }
       else{
			echo 'ERREUR : un compte pour cet étudiant existe déjà';
        }
      }
    else {
		echo 'ERREUR : un des champs est vide';
    }
 }
 else{
	header('Location:../controller/redirection.php');
	}
?>
