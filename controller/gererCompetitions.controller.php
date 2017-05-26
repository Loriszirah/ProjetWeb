<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/competition.php');
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
        if($decoded_array['role']==="organisateur"){
          $idOrganisateur=$decoded_array['id'];
          if(isset($_GET['refCompetSupp']) && !empty($_GET['refCompetSupp'])){
            $idCompet=htmlspecialchars($_GET['refCompetSupp']);
            if(existeCompetitionId($idCompet)){
                deleteCompetition($idCompet);
            }
            else{
              header('Location:gererCompetitions.controller.php');
            }
          }
          $competitions=getAllCompetitionsOrga($idOrganisateur);
          require_once('../view/gererCompetitions.php');
        }
        else{
          // On le redirige vers la page admin ou utilisateur (si c'est un joueur)
          header('Location:redirection.php');
        }
      }
      else{
        // On le redirige et on enlève le cookie.
        header('Location:redirection.php');
      }
    }
?>
