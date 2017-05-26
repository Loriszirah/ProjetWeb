<?php

    require_once('../vendor/autoload.php');
    require_once('../model/token.php');
    use \Firebase\JWT\JWT;

    //Si l'utilisateur n'est pas connecté
    if(!isset($_COOKIE["token"])){

             // On le redirige vers la page d'accueil
             require_once('../view/pageAccueil.php');
     }
     else{
       //TODO: mettre dans un fichier .env
       $key="vOlleYYBallzTournAm1ntOrgAN1SatAurE";

       //On décode le token
       $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
       $decoded_array = (array) $decoded;

       //On vérifie que c'est un token valide
       if (verificationToken($decoded_array)){
         //Si c'est un joueur ou organisateur on le redirige sur la page pageUtilisateur.php
         if ($decoded_array["role"]==="joueur" || $decoded_array["role"]==="organisateur"){
           header('Location:pageUtilisateur.controller.php');
         }//endif
         //Sinon on le redirige sur la page pageAdmin.php
         else{
           header('Location:pageAdmin.controller.php');
         }//endelse

       }//endif
       //Cookie incorrect, on supprime le cookie et on renvoie l'utilisateur sur la page d'accueil
       else{
         // Suppression du cookie (pour cela on met son temps d'expiration négatif)
         setcookie('token', '', time()-10000000, '/');
         // Unset key
         unset($_COOKIE["token"]);
         header('Location:../view/pageAccueil.php');
       }
     }
?>
