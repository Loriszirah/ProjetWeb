<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/utilisateur.php');
  require_once('../model/equipe.php');
  use \Firebase\JWT\JWT;


  //TODO: mettre dans un fichier .env
  $key = "vOlleYYBallzTournAm1ntOrgAN1SatAurE";

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
          if(isset($_POST['nomEquipe']) && !empty($_POST['nomEquipe'])){
            $nomEquipe=htmlspecialchars($_POST['nomEquipe']);
            if(!existeEquipe($nomEquipe)){
              $idJoueur=$decoded_array['id'];
              ajoutEquipe($nomEquipe,$idJoueur);
              echo "Equipe créée avec succès";
            }
            else{
              echo "ERREUR : nom d'équipe déjà utilisé";            }
          }
          require_once('../view/creationEquipe.php');
        }
        else if($decoded_array['role']==="organisateur"){
          // On le redirige vers la page utilisateur
          header('Location:redirection.php');
        }
        else{
          // On le redirige vers la page admin
          header('Location:redirection.php');
        }
      }
      else {
        // On le redirige et on enlève le cookie.
        header('Location:redirection.php');
      }
  }
?>
