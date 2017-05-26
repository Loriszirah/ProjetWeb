<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/utilisateur.php');
  require_once('../model/personne.php');
  use \Firebase\JWT\JWT;


  //TODO: mettre dans un fichier .env
  $key = "vOlleYYBallzTournAm1ntOrgAN1SatAurE";
  $keyCryptage= "ProJa1TWeib";

   //On vérifie que l'utilisateur est déjà connecté
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la page d'accueil
            header('Location:pageAccueil.controller.php');
    }
    else{
      //On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;

      //On vérifie que c'est un token valide
      if (verificationToken($decoded_array)){
        if($decoded_array['role']==="joueur" || $decoded_array['role']==="organisateur"){
          //Recuperation des infos de l'utilisateur
          $id=$decoded_array['id'];
          $infos=getInfosUtilisateur($id);
          $pseudo=$infos['pseudo'];
          $nom=$infos['nom'];
          $prenom=$infos['prenom'];
          $email=$infos['email'];
          $age=$infos['age'];
          $telephone=$infos['telephone'];

          //Pour chaque champ on vérifie si l'utilisateur a voulu le changer, et si oui on le change dans la bd
          if(isset($_POST["pseudo"]) & !empty($_POST["pseudo"])){
            $newPseudo=htmlspecialchars($_POST['pseudo']);
            if(!existePersonnePseudo($newPseudo)){
              setPseudoPersonne($id,$newPseudo);
            }
            else{
              echo 'ERREUR : Le pseudo est déjà utilisé';
            }
          }
          if(isset($_POST["nom"]) & !empty($_POST["nom"])){
            $newNom=htmlspecialchars($_POST['nom']);
            setNomPersonne($id,$newNom);
          }
          if(isset($_POST["prenom"]) & !empty($_POST["prenom"])){
            $newPrenom=htmlspecialchars($_POST['prenom']);
            setPrenomPersonne($id,$newPrenom);
          }
          if(isset($_POST["email"]) & !empty($_POST["email"])){
            $newEmail=htmlspecialchars($_POST['email']);
            if(!existePersonneEmail($newEmail)){
              setEmailPersonne($id,$newEmail);
            }
            else{
              echo "ERREUR : L'email est déjà utilisé";
            }
          }
          if(isset($_POST["age"]) & !empty($_POST["age"])){
            $newAge=htmlspecialchars($_POST['age']);
            setAgeUtilisateur($id,$newAge);
          }
          if(isset($_POST["telephone"]) & !empty($_POST["telephone"])){
            $newTelephone=htmlspecialchars($_POST['telephone']);
            setTelephoneUtilisateur($id,$newTelephone);
          }
          if(isset($_POST["ville"]) & !empty($_POST["ville"])){
            $newVille=htmlspecialchars($_POST['ville']);
            setVilleUtilisateur($id,$newVille);
          }
          if(isset($_POST["passwd"]) & !empty($_POST["passwd"])){
            $newPassword=htmlspecialchars($_POST['passwd']);
            $newPasswordCrypt = crypt($newPassword,$keyCryptage);
            setPasswordPersonne($id,$newPasswordCrypt);
          }
          require_once('../view/profilUtilisateur.php');
        }
        else{
          // On le redirige vers la page admin
          header('Location:redirection.php');
        }
      }
      else {
        // On le redirige et on enlève le cookie.
        header('Location:redirection.php');
      }
    }
?>
