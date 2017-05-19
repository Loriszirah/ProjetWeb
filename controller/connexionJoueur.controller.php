<?php
    //Si la personne n'est pas connecté
    if (!isset($_COOKIE["token"])){
      include('../view/connexionJoueur.php');
    }
    else{
      include('redirection.php');
    }
  ?>
