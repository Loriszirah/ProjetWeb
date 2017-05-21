<?php
  require_once('../model/connexionBD.php');
  require_once('../model/joueur.php');

  $joueurs=getAll();
    //Si la personne n'est pas connecté
    //if (!isset($_COOKIE["token"])){
      include('../view/connexiontest.php');
  /*  }
    else{
      include('redirection.php');
    }*/
?>
