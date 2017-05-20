<?php
require_once('../model/Joueur.php');
require_once('../model/connexionBD.php');

$joueur=getAll();
include('../view/connexiontest.php');
?>
