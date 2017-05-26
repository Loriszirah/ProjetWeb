<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="adjust-nav">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
              <span class="icon-bar"></span>
              <?php
              // Si l'utilisateur n'est pas connecté on rajoute les boutons d'inscription et de connexion
              if(!isset($_COOKIE["token"])){
              ?>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              <?php
          		}
  		        ?>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="redirection.php"><i class="fa fa-square-o "></i>&nbsp;Volley-Ball Tournament Organisator</a>
      </div>
      <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php if(!isset($_COOKIE["token"])){ ?>
            <li><a href="redirection.php">Accueil</a></li> <?php } ?>
            <li><a href="deconnexion.controller.php">Deconnexion</a></li>
          </ul>
      </div>
  </div>
</div>
