<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/competition.php');
  require_once('../model/participer.php');
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
        if($decoded_array['role']==="joueur"){
          $idJoueur=$decoded_array['id'];
          if(isset($_GET['refType']) && !empty($_GET['refType'])){
            $idType=htmlspecialchars($_GET['refType']);
            if(isset($_GET['refCompetition']) && !empty($_GET['refCompetition'])){
              $idCompetition=htmlspecialchars($_GET['refCompetition']);
              $competition=getInfosCompetition($idCompetition);
              $nbEquipesInscrites=getNombreParticipartions($idCompetition);
              require_once('../view/infosCompetition.php');
            }
            else{
              header('participerCompetitionType.controller.php?refType='.$type);
            }
          }
          else{
            header('participerCompetition.controller.php');
          }
        }
        else{
          // On le redirige vers la page admin ou utilisateur (si c'est un organisateur)
          header('Location:redirection.php');
        }
      }
      else{
        // On le redirige et on enlève le cookie.
        header('Location:redirection.php');
      }
    }
?>
