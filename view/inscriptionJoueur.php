<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Inscription Joueur</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" !important/>
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>

	<body>
		<div id="wrapper">
			<div class="container">
					<div class="row">
							<div class="col-md-4 col-md-offset-4">
									<div class="login-panel panel panel-default">
											<div class="panel-heading">
													<h3 class="panel-title centrer">Inscription Joueur</h3>
											</div>
											<div class="panel-body">
													<form action="../controller/verifInscriptionJoueur.controller.php" method="post" onsubmit="return (verifInfoJoueur()   verifPassword());" role="form">
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
																			<label>Psoeudo : </label>
																			<input type="text" class="form-control" name="psoeudo" placeholder="psoeudo" required />
																	</div>
                                  <div class="form-group">
																			<label>Age : </label>
																			<input type="number" class="form-control" name="age" placeholder="21" required />
																	</div>
                                  <div class="form-group">
																			<label>Numéro de téléphone : </label>
																			<input type="tel" class="form-control" name="telephone" placeholder="06 34 34 34 34" required />
																	</div>
                                  <div class="form-group">
																			<label>Ville : </label>
																			<input type="text" class="form-control" name="ville" placeholder="Montpellier" required />
																	</div>
																	<div class="form-group">
																			<label>Mot de passe : </label>
																			<input type="password" class="form-control" name="passwd" required />
																	</div>
																	<div class="form-group">
																			<label>Confirmation mot de passe : </label>
																			<input type="password" class="form-control" name="passwdconf" />
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
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script type="text/javascript" src="../controller/js/inscriptionVerificationInfo.js"></script>
	</body>

</html>
