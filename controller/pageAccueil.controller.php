<?php
  require_once('../vendor/autoload.php');
  //require_once('../model/connexionBD.php');
  //require_once('../model/Admin.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "vOlleYYBallzTournAm1ntOrgAN1SatAurE";

   //On vérifie que l'utilisateur est déjà connecté
   if(!isset($_COOKIE["token"])){
          // On le redirige vers la page d'accueil
          include('../view/pageAccueil.php');
    }
    else{
      header('Location:redirection.php');
    }
?>
