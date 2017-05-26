<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/competition.php');
  require_once('../model/equipe.php');
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
        if($decoded_array['role']==="organisateur"){
          if(isset($_GET['refCompet']) && !empty($_GET['refCompet'])){
            $idCompetition=htmlspecialchars($_GET['refCompet']);
            $competition=getInfosCompetition($idCompetition);
            $nbEquipesCompetitions=getNombreParticipartions($idCompetition);
            if(isset($_GET['refEquipeSupp']) && !empty($_GET['refEquipeSupp'])){
              $idEquipeSupp=htmlspecialchars($_GET['refEquipeSupp']);
              if(existeEquipeid($idEquipeSupp)){
                deleteEquipeCompetition($idCompetition,$idEquipeSupp);
              }
              else{
                header('Location:modifCompetition.controller.php?refCompetition='.$idCompetition);
              }
            }
            $equipes=getAllEquipesCompetition($idCompetition);
            require_once('../view/modifCompetition.php');
          }
          else{
            header('Location:gererCompetitions.controller.php');
          }
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
