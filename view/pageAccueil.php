<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-Ball tournament organizator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/perso.css" rel="stylesheet" />
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<div id="wrapper">
      <div class="row">
        <div class="col-lg-push-1 col-lg-pull-1 col-lg-10">
          <div class="bg-color-info col-sm-12 centrer ">
            <h1>Volley-ball tournament organizator</h1>
            <p>Vous êtes un professionnel de volley ou vous êtes seulement un amateur? Envie de t'entrainer pour une compétition avec ton équipe ? Envie de t'amuser avec tes potes et passer un bon
              moment?  Ce site est fait pour vous. Ici tu peux créer et/ou participer à des tournois de volleys organisé dans toute la France.N'attendez plus et inscrivez-vous</p>
          </div>
          <!-- /.col-sm-12 -->
        </div>
        <!-- /.col-lg-10 -->
      </div>
      <!-- /. row  -->
      <div class="row">
        <div class="col-lg-push-1 col-lg-pull-1 col-lg-10">
          <div class="bg-color-info col-sm-12 centrer ">
            <a id="inscriptionBoutton" class="btn btn-primary btn-lg" role="button">Inscription</a>
            <a id="connexionBoutton" class="btn btn-primary btn-lg" role="button">Connexion</a>
          </div>
					<div id="connexion" class="row">
						<div class="bg-color-info col-sm-12 centrer ">
						<a href="../controller/connexionJoueur.controller.php" class="btn btn-primary btn-lg" role="button">Connexion Joueur</a>
						<a href="../controller/connexionOrganisateur.controller.php" class="btn btn-primary btn-lg" role="button">Connexion Organisateur</a>
						<a href="../controller/connexionAdmin.controller.php" class="btn btn-primary btn-lg" role="button">Connexion Admin</a>
					</div>
				</div>
					<div id="inscription">
						<a href="../controller/inscriptionJoueur.controller.php" class="btn btn-primary btn-lg" role="button">Inscription Joueur</a>
						<a href="../controller/inscriptionOrganisateur.controller.php" class="btn btn-primary btn-lg" role="button">Inscription Organisateur</a>
					</div>
          <!-- /.col-sm-12 -->
        </div>
        <!-- /.col-lg-10 -->
      </div>
      <!-- /. row  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME -->
	  <!-- JQUERY SCRIPTS -->
	  <script src="../assets/js/jquery-3.2.1.min.js"></script>
	  <!-- BOOTSTRAP SCRIPTS -->
	  <script src="../assets/js/bootstrap.min.js"></script>
	  <!-- METISMENU SCRIPTS -->
	  <script src="../assets/js/jquery.metisMenu.js"></script>
	  <!-- CUSTOM SCRIPTS -->
		<script src="../controller/js/connexion.js"></script>
	  <script src="../assets/js/custom.js"></script>
	</body>
</html>
