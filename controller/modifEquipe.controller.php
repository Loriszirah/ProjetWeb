<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/equipe.php');
  require_once('../model/appartenir.php');
  require_once('../model/joueur.php');
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
        if($decoded_array['role']==="joueur"){
          $idJoueur=$decoded_array['id'];
          if(isset($_GET['refEquipe']) && !empty($_GET['refEquipe'])){
            $idEquipe=htmlspecialchars($_GET['refEquipe']);
            if(existeEquipeid($idEquipe)){
              $equipe=getInfosEquipe($idEquipe);
              if(isset($_POST['nom']) && !empty($_POST['nom'])){
                $nom=htmlspecialchars($_POST['nom']);
                if(!existeEquipe($nom)){
                  if($idJoueur=$equipe['idpersonne']){
                    setNomEquipe($idEquipe,$nom);
                    $equipe=getInfosEquipe($idEquipe);
                  }
                }
                else{
                  echo "ERREUR : Ce nom éxiste déjà";
                }
              }
              if(isset($_GET['refNewMembreCap']) && !empty($_GET['refNewMembreCap'])){
                $idNewJoueur=htmlspecialchars($_GET['refNewMembreCap']);
                if(existeJoueurEquipeId($idEquipe,$idNewJoueur)){
                  if($idNewJoueur!=$equipe['idpersonne']){
                    if($idJoueur==$equipe['idpersonne']){
                        deleguerCapitaine($idEquipe,$idNewJoueur);
                        header("Refresh:0");
                    }
                  }
                }
              }
              if(isset($_GET['refMembreSupp']) && !empty($_GET['refMembreSupp'])){
                $idMembre=htmlspecialchars($_GET['refMembreSupp']);
                if($idMembre==$idJoueur && $idMembre!=$equipe['idPersonne']){//Le joueur qui part n'est pas le capitaine
                  deleteJoueurEquipe($idMembre,$idEquipe);
                  header('Location:gererEquipes.controller.php');
                }
                else if($idJoueur==$equipe['idPersonne'] && $idMembre!=$idJoueur){
                  deleteJoueurEquipe($idMembre,$idEquipe);
                }
                /*else : Cas 1 : Capitaine et membre à supprimer :
                         Il faut d'abord deleguer son statut de capitaine. Si il est seul dans l'équipe, il faut revenir dans la gestion des équipes et la supprimer
                         Cas 2 : Non capitaine et membre à supprimer différend de lui-même :
                         Interdit */
              }
              if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
                $pseudo=htmlspecialchars($_POST['pseudo']);
                if(existeJoueurPseudo($pseudo)){
                  $idJoueurAjout=getIdJoueur($pseudo);
                  if(!existeJoueurEquipeId($idEquipe,$idJoueurAjout)){
                    ajouterJoueur($idEquipe,$idJoueurAjout);
                  }
                  else{
                    echo "ERREUR : joueur est déjà dans votre équipe";
                  }
                }
                else{
                  echo "ERREUR : le pseudo n'éxiste pas";
                }
              }
              $membres=getAllMembres($idEquipe);
              require_once('../view/modifEquipe.php');
            }
            else{
              header('Location:gererEquipes.controller.php');
            }
          }
          else{
            header('Location:gererEquipes.controller.php');
          }
        }
        else{
          // On le redirige vers la page admin ou utilisateur (si c'est un organisateur)
          header('Location:redirection.php');
        }
      }
      else{
        // On le redirige et on enlève le cookie.
        header('Location:redirection.php');
      }
    }
?>
