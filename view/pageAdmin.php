<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-ball Tournament Organisator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
  	<div id="wrapper">
			<?php include("menuTop.php"); ?>
  		<!-- NAV SIDE only if we are connected -->
  		<?php if (isset($_COOKIE["token"]) && verificationToken($decoded_array)){
  			 include("side_menu.php");
  		} ?>
  		<div id="page-wrapper">
        <div id="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <h1>Tableau de bord</h1>
              </div>
          </div>
  				<hr />
  				<div class="row">
            <div class="col-md-6 col-sm-5 col-xs-6">
              <h5>Organisateurs</h5>
                <div class="alert alert-info text-center">
                        <i class="fa fa-list-alt fa-5x"></i>
                        <h3><?php echo $nbOrganisateurs ?> organisateurs sont enregistrés sur le site </h3>
                    <div class="panel-footer">
                      Ici vous pouvez voir et supprimer l'ensemble des organisateurs<br>
                      <a href="consulterOrganisateurs.controller.php" class="btn btn-primary">Consulter les organisateurs</a>
                    </div>
                </div>
              </div>

            <div class="col-md-6 col-sm-5 col-xs-6">
							<h5>Joueurs</h5>
							<div class="alert alert-info text-center">
											<i class="fa fa-edit fa-5x"></i>
											<h3><?php echo $nbJoueurs ?> joueurs sont inscrits sur le site </h3>
									<div class="panel-footer">
									Ici vous pouvez consulter et supprimer l'ensemble des joueurs<br>
									<a href="consulterJoueurs.controller.php" class="btn btn-primary">Consulter les joueurs</a>
									</div>
							</div>
            </div>
					</div>
					<!-- /. ROW  -->
					<hr />

					<div class="row">
            <div class="col-md-6 col-sm-5 col-xs-6">
                <h5>Compétitions</h5>
                <div class="panel panel-primary text-center no-boder bg-color-blue">
                    <div class="panel-body">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                        <h3><?php echo $nbCompetitions ?> compétitions ont été créé </h3>
                    </div>
                    <div class="panel-footer back-footer-blue">
                    Ici vous pouvez voir et supprimer l'ensemble des compétitions <br>
                    <a href="consulterCompetitions.controller.php" class="btn btn-primary">Consulter les compétitions</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-5 col-xs-6">
                <h5>Equipes</h5>
                <div class="panel panel-primary text-center no-boder bg-color-blue">
                    <div class="panel-body">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                        <h3><?php echo $nbEquipes ?> équipes sont présentes sur le site</h3>
                    </div>
                    <div class="panel-footer back-footer-blue">
                    Ici vous pouvez consulter et supprimer l'ensemble des équipes<br>
                    <a href="consulterEquipes.controller.php" class="btn btn-primary">Consulter les équipes</a>
                    </div>
                </div>
            </div>
          </div>
          <!-- /. ROW  -->
					<hr />
          <div class="row">
              <div class="col-md-6 col-sm-5 col-xs-6">
                  <h5>Administrateurs</h5>
                  <div class="panel panel-primary text-center no-boder bg-color-blue">
										<div class="panel-body">
                      <i class="fa fa-list-alt fa-5x"></i>
                      <h3><?php echo $nbAdministrateurs-1 ?> personnes ont les mêmes droits que vous </h3>
										</div>
											<div class="panel-footer back-footer-blue">
											Ici vous pouvez voir les administrateurs existants, ajouter ou supprimer administrateur <br>
											<a href="consulterAdmininistrateurs.controller.php" class="btn btn-primary">Consulter les administrateurs</a>
                      </div>
                  </div>
              </div>
					</div>
          <!-- /. ROW  -->
      </div>
    </div>
	</div>
	<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="../assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="../assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="../assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="../assets/js/custom.js"></script>
	</body>
</html>
