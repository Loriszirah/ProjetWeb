<?php
  require("../model/connexionBD.php");
  // Suppression du cookie (pour cela on met son temps d'expiration négatif)
	setcookie('token', '', time()-10000000, '/');
	// Unset key
	unset($_COOKIE["token"]);
	header('Location:pageAccueil.controller.php');
?>
