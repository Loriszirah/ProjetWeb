<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-ball Tournament Organisator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<link href="../assets/css/perso.css" rel="stylesheet" />
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
	        <h2 class="titrePage">Equipe <?php echo $equipe['nom'];?></h2>
	        <?php if($idJoueur==$equipe['idPersonne']){//on ne modifie le nom qu'en tant que capitaine?>
					<form action="../controller/modifEquipe.controller.php?refEquipe=<?php echo $idEquipe ?>" method="post" onsubmit="return verifNom();">
						<!-- Bouton qui va afficher la saisie d'un nouveau nom -->
						<input type="button" class="btn btn-primary" value="Modifier" id="modifierNom" onclick="afficherNom();"/>
						<!-- ce qui va être affiché lors de l'appuie sur le bouton Modifier -->
						<div id="newNom">
							<span>Nouveau :</span>
							<input type="text" name="nom" id="nom"/>
							<input type="submit" class="btn btn-success" value="Enregistrer"/>
							<input type="button" class="btn btn-primary" value="Annuler" id="annulerNom" onclick="cacherNom();"/>
						</div>
					</form>
					<form action="../controller/modifEquipe.controller.php?refEquipe=<?php echo $idEquipe ?>" method="post">
						<span>Pseudo du joueur</span>
						<input type="text" name="pseudo"/>
						<input type="submit" class="btn btn-primary" value="Ajouter"/>
					</form>
	        <?php }?>
					<br/>
	        <div class="row">
	    			<div class="col-lg-12">
	    				<div class="panel panel-default">
	    					<div class="panel-body">
	    						<table width="100%" class="table table-striped table-bordered table-hover">
	    							<thead>
	                    <tr>
	                      <th>Numéro</th>
	                      <th>Nom</th>
	                      <th>Prenom</th>
	                      <th>Age</th>
												<th>Pseudo</th>
	                      <th></th>
	                      <th></th>
	                    </tr>
	                  </thead>
	                  <?php
	    							$i=1;
	    							foreach ($membres as $membre){//On affiche pour chaque membre de l'équipe ses informations et les boutons d'actions
	    								?>
	    								<tr>
	    									<td><?php echo $i; $i+=1; ?></td>
	    									<td><?php echo $membre['nom'] ?></td>
	    									<td><?php echo $membre['prenom'] ?></td>
	                      <td><?php echo $membre['age'] ?></td>
												<td><?php echo $membre['pseudo'] ?></td>
	    									<?php if($idJoueur==$equipe['idPersonne']){ //on affiche le bouton d'exclusion seulement si c'est le capitaine
	                              if($idJoueur!=$membre['idPersonne']){//on affiche le bouton pour deleguer son statut de capitaine que s'il est capitaine et que ce n'est pas lui le membre de la boucle for ?>
		                              <td><a class="btn btn-danger btn-block" href="../controller/modifEquipe.controller.php?refEquipe=<?php echo $idEquipe ?> &refNewMembreCap=<?php echo $membre['idPersonne'] ?>">Elire capitaine</a></td>
																	<td><a class="btn btn-danger btn-block" href="../controller/modifEquipe.controller.php?refEquipe=<?php echo $idEquipe ?> &refMembreSupp=<?php echo $membre['idPersonne'] ?>">Exclure</a></td>
																<?php }
																else { ?>
																	<td></td>
																	<td></td>
																<?php }
															} else if($idJoueur==$membre['idPersonne']){ //on affiche le bouton pour quitter l'équipe seulement si ce joueur correspond au joueur connecté et qu'il n'est pas capitaine ?>
																	<td></td>
																	<td><a class="btn btn-danger btn-block" href="../controller/modifEquipe.controller.php?refEquipe=<?php echo $idEquipe ?> &refMembreSupp=<?php echo $membre['idPersonne'] ?>">Quitter</a></td>
	                      <?php } ?>
	                    </tr>
										<?php } ?>
	                </table>
	              </div>
	            </div>
							<a href="../controller/gererEquipes.controller.php" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
	          </div>
	        </div>
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
		<script src="../controller/js/modifNomEquipe.js"></script>
    <script src="../assets/js/custom.js"></script>
  </body>
</html>
