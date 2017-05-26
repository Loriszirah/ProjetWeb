<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/joueur.php');
  use \Firebase\JWT\JWT;

  //TODO : mettre ces variables dans un fichier .env
  $key = "vOlleYYBallzTournAm1ntOrgAN1SatAurE";
  $keyCryptage= "ProJa1TWeib";
  $validity_time=86400; //1 jour

   //On vérifie que l'utilisateur n'est pas déjà connecté
   if(!isset($_COOKIE["token"])){
            //On vérifie que les champs ne soient pas vide et non null.
            if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']) ){

              //Sécurisation des données saisies
              $email = htmlspecialchars ($_POST['email']);
              $password = htmlspecialchars ($_POST['password']);

                //On crypte le mot de passe avec un "grain de sel"
                $password = crypt($password,$keyCryptage);

                if (existeJoueur($email, $password)){
                    $id=getJoueurId($email);
                    //On définit le token contenant les différentes informations.
                    $token = array(
                        "iss" => $_SERVER['HTTP_HOST'],
                        "exp" => time() + $validity_time,
                        "id" => $id,
                        "role" => "joueur"
                    );

                    //On encode le token en JWT
                    $jwt = JWT::encode($token, $key);
                    JWT::$leeway = 60; // $leeway in seconds

                    //On conserve le token dans un cookie pour que l'utilisateur reste connecté
                    setcookie("token", $jwt, time()+$validity_time,"/", null, false, true);
                    header('Location:pageUtilisateur.controller.php');
                }
                else{
                  echo ("ERREUR : tu as rentré un mauvais login/mot de passe");
                  include('../view/connexionJoueur.php');
                }
            }
            else {
              include('../view/connexionJoueur.php');
            }
    }
    else {
        // Cas où la personne est déjà connecté
        header('Location:redirection.php');
    }
?>
