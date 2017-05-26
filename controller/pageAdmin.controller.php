<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/administrateur.php');
  require_once('../model/competition.php');
  require_once('../model/equipe.php');
  require_once('../model/joueur.php');
  require_once('../model/organisateur.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "vOlleYYBallzTournAm1ntOrgAN1SatAurE";

   //On vérifie que l'utilisateur est déjà connecté
   if(!isset($_COOKIE["token"])){

          // On le redirige vers la connexion admin
          header('Location:connexionAdmin.controller.php');
    }
    else{
      //On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;

      //On vérifie que c'est un token valide
      if (verificationToken($decoded_array)){
        if($decoded_array['role']==="administrateur"){
          //$prenom=getPrenomAdministrateur($decoded_array['id']);
          //$nom=getNomAdmin($decoded_array['id']);
          $nbOrganisateurs=getNombreOrganisateurs();
          $nbJoueurs=getNombreJoueurs();
          $nbEquipes=getNombreEquipes();
          $nbCompetitions=getNombreCompetitions();
          $nbAdministrateurs=getNombreAdministrateurs();
          include('../view/pageAdmin.php');
        }
        else{//La personne n'est pas un administrateur
          header('Location:../controller/redirection.php');
        }
      }
      else {//Mauvais token
        header('Location:../controller/redirection.php');
      }
    }
