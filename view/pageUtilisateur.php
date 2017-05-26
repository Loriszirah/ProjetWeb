<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-ball Tournament Organisator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<div id="wrapper">
			<?php include("menuTop.php"); ?>
			<!-- menu à gauche seulement si on est connecté -->
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
					<h3>Bonjour <?php echo $pseudo ?></h3>
					<?php if($role=="joueur"){
			      ?>
					<div class="row">
            <div class="col-md-6 col-sm-5 col-xs-6">
              <h5>Profil</h5>
                <div class="alert alert-info text-center">
                        <i class="fa fa-list-alt fa-5x"></i>
                        <h3>Accèder à votre profil</h3>
                    <div class="panel-footer">
                      <a href="profil.controller.php" class="btn btn-primary">Regarder son profil</a>
                    </div>
                </div>
              </div>

            <div class="col-md-6 col-sm-5 col-xs-6">
							<h5>Equipes</h5>
							<div class="alert alert-info text-center">
											<i class="fa fa-edit fa-5x"></i>
											<h3>Créer et Gèrer vos équipes</h3>
									<div class="panel-footer">
									<a href="creationEquipe.controller.php" class="btn btn-primary">Créer équipe</a>
									<a href="gererEquipes.controller.php" class="btn btn-primary">Gérer équipe</a>
									</div>
							</div>
            </div>
					</div>
					<!-- /. ROW  -->
					<hr />
					<div class="row">
            <div class="col-md-6 col-sm-5 col-xs-6">
              <h5>Compétitions</h5>
                <div class="alert alert-info text-center">
                        <i class="fa fa-list-alt fa-5x"></i>
                        <h3>Participer à des compétitions et consulter l'ensemble des compétitions dans lesquelles vous êtes inscrits</h3>
                    <div class="panel-footer">
                      <a href="participerCompetition.controller.php" class="btn btn-primary">Participer à une compétition</a>
											<a href="competitions.controller.php" class="btn btn-primary">Compétitions</a>
                    </div>
                </div>
              </div>
			    <?php }
			    else{?>
						<div class="row">
	            <div class="col-md-6 col-sm-5 col-xs-6">
	              <h5>Création</h5>
	                <div class="alert alert-info text-center">
	                        <i class="fa fa-list-alt fa-5x"></i>
	                        <h3>Créer toutes les compétitions que vous voulez</h3>
	                    <div class="panel-footer">
	                      <a href="creationCompetition.controller.php" class="btn btn-primary">Créer une compétition</a>
	                    </div>
	                </div>
	              </div>

	            <div class="col-md-6 col-sm-5 col-xs-6">
								<h5>Gérer</h5>
								<div class="alert alert-info text-center">
												<i class="fa fa-edit fa-5x"></i>
												<h3>Gèrer les compétitions que vous avez créé</h3>
										<div class="panel-footer">
										<a href="gererCompetitions.controller.php" class="btn btn-primary">Gérer ses compétitions</a>
										</div>
								</div>
	            </div>
						</div>
						<!-- /. ROW  -->
			    <?php } ?>
				</div>
			</div>
		</div>
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="../assets/js/jquery-3.2.1.min.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="../assets/js/jquery.metisMenu.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="../assets/js/custom.js"></script>
	</body>
</html>
