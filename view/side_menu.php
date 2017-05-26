<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
          <li class="text-center user-image-back">
              <img src="../assets/img/find_user.png" class="img-responsive" />
          </li>
          <li>
              <a href="redirection.php"><i class="fa fa-desktop "></i>Tableau de bord</a>
          </li>
          <?php
            if($decoded_array['role']==="administrateur"){
          			?>
          <li>
              <a href="#"><i class="fa fa-table "></i>Gérer les administrateurs<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li>
                      <a href="ajouterAdministrateur.controller.php">Ajouter un administrateur</a>
                  </li>
                  <li>
                      <a href="consulterAdministrateurs.controller.php">Consulter les administrateurs</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#"><i class="fa fa-table "></i>Administrer les joueurs<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                    <a href="consulterJoueurs.controller.php">Consulter les joueurs</a>
                </li>
              </ul>
          </li>
          <li>
              <a href="#"><i class="fa fa-table "></i>Administrer les organisateurs<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                    <a href="consulterOrganisateurs.controller.php">Consulter les organisateurs</a>
                </li>
              </ul>
          </li>
          <li>
              <a href="#"><i class="fa fa-table "></i>Administrer les compétitions<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                    <a href="consulterCompetitions.controller.php">Consulter les compétitions</a>
                </li>
              </ul>
          </li>
          <li>
              <a href="#"><i class="fa fa-table "></i>Administrer les équipes<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                    <a href="consulterEquipes.controller.php">Consulter les équipes</a>
                </li>
              </ul>
          </li>
          <?php
        } elseif($decoded_array['role']==="joueur"){ ?>
          <li>
              <a href="profil.controller.php"><i class="fa fa-table "></i>Regarder son profil<span class="fa arrow"></span></a>
          </li>
          <li>
              <a href="creationEquipe.controller.php"><i class="fa fa-table "></i>Créer une équipe<span class="fa arrow"></span></a>
          </li>
          <li>
              <a href="gererEquipes.controller.php"><i class="fa fa-table "></i>Gérer ses équipes<span class="fa arrow"></span></a>
          </li>
          <li>
              <a href="participerCompetition.controller.php"><i class="fa fa-table "></i>Participer à une compétition<span class="fa arrow"></span></a>
          </li>
          <li>
              <a href="competitions.controller.php"><i class="fa fa-table "></i>Compétitions<span class="fa arrow"></span></a>
          </li>
        <?php }
        elseif($decoded_array['role']==="organisateur"){ ?>
          <li>
              <a href="profil.controller.php"><i class="fa fa-table "></i>Regarder son profil<span class="fa arrow"></span></a>
          </li>
          <li>
              <a href="creationCompetition.controller.php"><i class="fa fa-table "></i>Créer une compétition<span class="fa arrow"></span></a>
          </li>
          <li>
              <a href="gererCompetitions.controller.php"><i class="fa fa-table "></i>Gérer ses compétitions<span class="fa arrow"></span></a>
          </li>
        <?php } ?>
    </ul>
  </div>
</nav>
<!-- /. NAV SIDE  -->
