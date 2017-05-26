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
													<h3 class="panel-title centrer">Création Compétition</h3>
											</div>
											<div class="panel-body">
										    <form action="../controller/creationCompetition.controller.php" method="post" onsubmit="return verifDateValide()">
													<fieldset>
															<div class="form-group">
																<label>Nom de la compétition : </label>
													      <input type="text" name="nomCompetition" required/>
															</div>
                              <div class="form-group">
                                <label>Type de la compétition : </label>
                                <select name='typeCompet' size='1'>
                                  <?php
                                  foreach ($typesCompet as $typeCompet) {?>
                                    <option value="<?php echo $typeCompet['libelle']?>"><?php echo $typeCompet['libelle']?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
																<label>Nombre d'équipes : </label>
													      <input type="number" name="nbEquipes" required/>
															</div>
                              <div class="form-group">
																<label>Ville : </label>
													      <input type="text" name="ville" required/>
															</div>
                              <div class="form-group">
																<label>Prix : </label>
													      <input type="number" name="prix" required/>
															</div>
                              <div class="form-group">
																<label>Date début : </label>
													      <input type="date" name="dateDebut" id="dateDebut" required/>
															</div>
                              <div class="form-group">
																<label>Adresse : </label>
													      <input type="text" name="adresse" required/>
															</div>
                              <div class="form-group">
																<label>Description : </label>
													      <textarea rows="4" cols="43" name="description" required></textarea>
															</div>
															<div class="form-group">
																<input type="submit" class="btn btn-lg btn-success btn-block" value="Créer compétition" />
															</div>
													</fieldset>
										    </form>
												<a href="../controller/pageUtilisateur.controller.php?" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
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
    <!-- CUSTOM SCRIPT -->
    <script src="../controller/js/creationCompetition.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
