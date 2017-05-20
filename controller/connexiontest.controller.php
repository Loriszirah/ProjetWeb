<?php
  require_once('../model/connexionBD.php');
  require_once('../model/Joueur.php');

  $joueur=getAll();
  include('../view/connexiontest.php');
?>
