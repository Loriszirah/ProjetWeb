<?php

//On vérifie que l'utilisateur n'est pas déjà connecté
if(!isset($_COOKIE["token"])){
  include('../view/inscriptionJoueur.php');
}
else{
  header('Location:redirection.php');
}

?>
