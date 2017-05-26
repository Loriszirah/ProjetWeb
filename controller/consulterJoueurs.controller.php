<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/joueur.php');
  use \Firebase\JWT\JWT;


  //TODO: mettre dans un fichier .env
  $key = "vOlleYYBallzTournAm1ntOrgAN1SatAurE";
  $keyCryptage= "ProJa1TWeib";

   //On vérifie que l'utilisateur est déjà connecté
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la page d'accueil
            header('Location:pageAccueil.controller.php');
    }
    else{
      //On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;

      //On vérifie que c'est un token valide
      if (verificationToken($decoded_array)){
        if($decoded_array['role']==="administrateur"){
          if(isset($_GET['refJoueurSupp']) && !empty($_GET['refJoueurSupp'])){
            $idJoueur=htmlspecialchars($_GET['refJoueurSupp']);
            if(existeJoueurId($idJoueur)){
                deleteJoueur($idJoueur);
            }
            else{
              header('Location:consulterJoueurs.controller.php');
            }
          }
          $joueurs=getAllJoueurs();
          require_once('../view/consulterJoueurs.php');
        }
        else{
          // On le redirige vers la page utilisateur
          header('Location:redirection.php');
        }
      }
      else{
        // On le redirige et on enlève le cookie.
        header('Location:redirection.php');
      }
    }
?>
