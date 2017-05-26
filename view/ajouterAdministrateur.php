<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-ball Tournament Organisator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" !important/>
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
			<div class="container">
					<div class="row">
							<div class="col-md-4 col-md-offset-4">
									<div class="login-panel panel panel-default">
											<div class="panel-heading">
													<h3 class="panel-title centrer">Ajout administrateur</h3>
											</div>
											<div class="panel-body">
													<form action="../controller/ajouterAdministrateur.controller.php" method="post" onsubmit="return verifPassword();" role="form">
															<fieldset>
																	<div class="form-group">
																			<label>Nom : </label>
																			<input type="text" class="form-control" name="nom" placeholder="Nom" autofocus required />
																	</div>
																	<div class="form-group">
																			<label>Prénom : </label>
																			<input type="text" class="form-control" name="prenom" placeholder="Prénom"required />
																	</div>
																	<div class="form-group">
																			<label>Email : </label>
																			<input type="email" class="form-control" name="email" placeholder="gunther@gmail.com" required />
																	</div>
                                  <div class="form-group">
																			<label>Pseudo : </label>
																			<input type="text" class="form-control" name="pseudo" placeholder="pseudo" required />
																	</div>
																	<div class="form-group">
																			<label>Mot de passe : </label>
																			<input type="password" class="form-control" name="passwd" id="passwd" required />
																	</div>
																	<div class="form-group">
																			<label>Confirmation mot de passe : </label>
																			<input type="password" class="form-control" id="passwdconf" name="passwdconf" />
																	</div>
																	<input type="submit" class="btn btn-lg btn-success btn-block" value="S'inscrire" />
															</fieldset>
													</form>
											</div>
									</div>
							</div>
					</div>
			</div>
		</div>
		<!-- /. WRAPPER  -->
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="../assets/js/jquery-3.2.1.min.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script type="text/javascript" src="../controller/js/inscriptionVerificationInfo.js"></script>
	</body>
</html>
