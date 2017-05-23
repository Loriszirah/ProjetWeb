<?php
  require_once('../vendor/autoload.php');
  use \Firebase\JWT\JWT;

  ini_set('display_errors',1);

   //On vérifie que l'utilisateur est déjà connecté
   if(!isset($_COOKIE["token"])){
          // On le redirige vers la page d'accueil
          include('../view/pageAccueil.php');
    }
    else{
      header('Location:redirection.php');
    }
?>
