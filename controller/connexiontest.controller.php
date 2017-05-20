<?php
require_once('../model/connexionBD.php');
require_once('../model/Joueur.php');

connexionBD();
$idPsoeudo=existeJoueur('Airkan');
include('../view/connexiontest.php');
?>
