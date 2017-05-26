<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/utilisateur.php');
  require_once('../model/competition.php');
  require_once('../model/typeCompetition.php');
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
        if($decoded_array['role']==="organisateur"){
          $typesCompet=getTypes();
          if(isset($_POST['nomCompetition']) && isset($_POST['nbEquipes']) && isset($_POST['prix'])
              && isset($_POST['dateDebut']) && isset($_POST['description']) && isset($_POST['typeCompet'])
              && isset($_POST['adresse'])){
            $nomCompetition=htmlspecialchars($_POST['nomCompetition']);
            $nbEquipes=htmlspecialchars($_POST['nbEquipes']);
            $prix=htmlspecialchars($_POST['prix']);
            $dateDebut=htmlspecialchars($_POST['dateDebut']);
            $description=htmlspecialchars($_POST['description']);
            $libelleTypeCompetition=htmlspecialchars($_POST['typeCompet']);
            $adresse=htmlspecialchars($_POST['adresse']);

            if(!existeCompetitionNom($nomCompetition)){
              $idOrganisateur=$decoded_array['id'];
              $idTypeCompetition=getIdType($libelleTypeCompetition);
              ajoutCompetition($nomCompetition,$idTypeCompetition,$idOrganisateur,$nbEquipes,$prix,$dateDebut,$description,$adresse);
              echo "Compétition créée avec succès";
            }
            else{
              echo "ERREUR : nom de compétition déjà utilisé";
            }
          }
          require_once('../view/creationCompetition.php');
        }
        else if($decoded_array['role']==="joueur"){
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
