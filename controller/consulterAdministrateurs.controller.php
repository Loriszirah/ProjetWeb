<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/administrateur.php');
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
          $idAdministrateur=$decoded_array['id'];
          if(isset($_GET['refAdminSupp']) && !empty($_GET['refAdminSupp'])){
            $idAdministrateurSup=htmlspecialchars($_GET['refAdminSupp']);
            if(existeAdministrateurId($idAdministrateur)){
                deleteAdministrateur($idAdministrateur);
            }
            else{
              header('Location:consulterAdministrateurs.controller.php');
            }
          }
          $administrateurs=getAllAdministrateurs($idAdministrateur);
          require_once('../view/consulterAdministrateurs.php');
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
