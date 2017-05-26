<?php
  require("../model/ConnexionBD.php");
  // Suppression du cookie (pour cela on met son temps d'expiration négatif)
	setcookie('token', '', time()-10000000, '/');
	// Unset key
	unset($_COOKIE["token"]);
	header('Location:../index.php');
?>
