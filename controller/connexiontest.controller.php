<?php
  require_once('../model/connexionBD.php');
  require_once('../model/test.php');

  $joueur=getAll();
  include('../view/connexiontest.php');
?>
