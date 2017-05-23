<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-ball Tournament Organisator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
    <?php
      if(isset($ajout)){
        if($ajout){?>
          Equipe créée avec succès !
        <?php }
        else{?>
          Nom d'équipe déjà utilisé
        <?php }
    }?>
		<div id="wrapper">
			<div class="container">
					<div class="row">
							<div class="col-md-4 col-md-offset-4">
									<div class="login-panel panel panel-default">
											<div class="panel-heading">
													<h3 class="panel-title centrer">Création Equipe</h3>
											</div>
											<div class="panel-body">
										    <form action="../controller/creationEquipeVerif.controller.php" method="post">
													<fieldset>
															<div class="form-group">
																<label>Nom de l'équipe</label>
													      <input type="text" name="nomEquipe" required/>
															</div>
															<div class="form-group">
																<input type="submit" class="btn btn-lg btn-success btn-block" value="Créer équipe" />
															</div>
													</fieldset>
										    </form>
											</div>
									</div>
							</div>
					</div>
			</div>
		</div>
		<!-- /. WRAPPER  -->
		<a href="../controller/pageUtilisateur.controller.php?" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="../assets/js/jquery-3.2.1.min.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
