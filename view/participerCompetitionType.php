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
		<div id="wrapper">
			<?php include("menuTop.php"); ?>
			<!-- menu à gauche seulement si on est connecté -->
			<?php if (isset($_COOKIE["token"]) && verificationToken($decoded_array)){
				 include("side_menu.php");
			} ?>
			<div id="page-wrapper">
        <div id="page-inner">
					<h2 class="titrePage">Liste des compétitions en <?php echo $type ?></h2>
			    <div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<table width="100%" class="table table-striped table-bordered table-hover">
										<thead>
			                <tr>
			                  <th>Numéro</th>
												<th>Nom</th>
			                  <th>Ville</th>
			                  <th>Date</th>
			                  <th>nbEquipesMax</th>
												<th>Prix</th>
			                  <th></th>
			                  <th></th>
			                </tr>
			              </thead>
			              <?php
										$i=1;
										foreach ($competitions as $competition){//On affiche pour chaque competiton ses informations et les boutons d'actions
											?>
											<tr>
												<td><?php echo $i; $i+=1; ?></td>
												<td><?php echo $competition['nom'] ?></td>
												<td><?php echo $competition['ville'] ?></td>
												<td><?php echo $competition['dateDebut'] ?></td>
			                  <td><?php echo $competition['nbEquipes'] ?></td>
												<td><?php echo $competition['prix'] ?></td>
			                  <td><a class="btn btn-primary btn-block" href="../controller/infosCompetition.controller.php?refCompetition=<?php echo $competition['idCompetition'] ?>&refType=<?php echo $type ?>">Voir</a></td>
												<td><a class="btn btn-primary btn-block" href="../controller/inscriptionCompetition.controller.php?refCompetition=<?php echo $competition['idCompetition'] ?>">S'inscrire</a></td>
											</tr>
			              <?php }?>
				          </table>
				        </div>
				      </div>
				    </div>
			    </div>
					<a href="../controller/participerCompetition.controller.php" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
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
