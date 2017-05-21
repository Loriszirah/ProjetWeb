<?php
require_once('../model/connexionBD.php');
require_once('../model/Joueur.php');


  //TODO : mettre ces variables dans un fichier .env
  $key = "vOlleYYBallzTournAm1ntOrgAN1SatAurE";
  $keyCryptage= "ProJa1TWeib";

//vérifie que l'utilisateur n'est pas connecté
 if(!isset($_COOKIE["token"])){
     //Sécurisation des données saisies
      $nom = htmlspecialchars ($_POST['nom']);
      $prenom = htmlspecialchars ($_POST['prenom']);
      $email = htmlspecialchars ($_POST['email']);
      $pseudo = htmlspecialchars ($_POST['pseudo']);
      $age = htmlspecialchars ($_POST['age']);
      $telephone = htmlspecialchars ($_POST['telephone']);
      $ville = htmlspecialchars ($_POST['ville']);
      $passwd = htmlspecialchars ($_POST['passwd']);
      $passwdconf = htmlspecialchars ($_POST['passwdconf']);

    	//On crypte le mot de passe avec un "grain de sel"
    	$passwd = crypt($passwd,$keyCryptage);
      $idPseudo=existeJoueurPseudo($pseudo);
    	$idEmail=existeJoueurEmail($email);
			//On vérifie que le joueur n'est pas déjà dans la base de données
	    if(!$idPseudo){
        if(!$idEmail){
         ajoutJoueur($nom,$prenom,$email,$passwd,$pseudo,$age,$telephone,$ville);
         header('Location:connexionJoueur.controller.php');
        }
        else{
          echo 'ERREUR : ce mail est déjà utilisé';
        }
      }
       else{
			echo 'ERREUR : ce psoeudo est déjà utilisé';
        }
      }
 else{
	header('Location:../controller/redirection.php');
	}
?>
