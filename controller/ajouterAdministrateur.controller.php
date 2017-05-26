<?php
require_once('../model/connexionBD.php');
require_once('../model/administrateur.php');
require_once('../model/personne.php');

$keyCryptage= "ProJa1TWeib";

//On vérifie que l'utilisateur n'est pas déjà connecté
if(!isset($_COOKIE["token"])){
  header('Location:redirection.php');
}
else{
  //Sécurisation des données saisies
   $nom = htmlspecialchars ($_POST['nom']);
   $prenom = htmlspecialchars ($_POST['prenom']);
   $email = htmlspecialchars ($_POST['email']);
   $pseudo = htmlspecialchars ($_POST['pseudo']);
   $passwd = htmlspecialchars ($_POST['passwd']);
   $passwdconf = htmlspecialchars ($_POST['passwdconf']);

   //On crypte le mot de passe avec un "grain de sel"
   $passwd = crypt($passwd,$keyCryptage);
   $idPseudo=existePersonnePseudo($pseudo);
   $idEmail=existePersonneEmail($email);
   //On vérifie que l'administrateur n'est pas déjà dans la base de données
   if(!$idPseudo){
     if(!$idEmail){
      ajoutAdministrateur($nom,$prenom,$email,$passwd,$pseudo);
      header('Location:ajouterAdministrateur.controller.php');
     }
     else{
       echo 'ERREUR : ce mail est déjà utilisé';
     }
   }
    else{
   echo 'ERREUR : ce pseudo est déjà utilisé';
     }
     require_once('../view/ajouterAdministrateur.php');
   }
}
?>
