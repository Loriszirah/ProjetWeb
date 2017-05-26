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
			<div id="page-wrapper">
        <div id="page-inner">
					<h2 class="titrePage">Nom de la compétition : <?php echo $competition['nom'] ?></h2>
			    <p>La competition se déroule à <?php echo $competition['libelleVille'] ?> le <?php echo $competition['dateDebut'] ?> à l'adresse <?php echo $competition['adresse'] ?>.</p>
					<p>Les matchs seront du <?php echo $competition['libelleType'] ?>. La compétition peut accueillir <?php echo $competition['nbEquipes'] ?> équipes et il y a actuellement <?php echo $nbEquipesCompetitions ?> équipes inscrites.</p>
			    <h3>Description de la compétition : </h3>
			    <p><?php echo $competition['description'] ?></p>
			    <div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<h3>Liste des équipes participant à la compétition</h3>
								<div class="panel-body">
									<table width="100%" class="table table-striped table-bordered table-hover">
										<thead>
			                <tr>
			                  <th>Numéro</th>
			                  <th>Nom Equipe</th>
			                  <th>Capitaine</th>
			                  <th>Email capitaine</th>
												<th>Téléphone capitaine</th>
			                  <th></th>
			                  <th></th>
			                </tr>
			              </thead>
			              <?php
										$i=1;
										foreach ($equipes as $equipe){//On affiche pour chaque équipe de la compétition ses informations et les boutons d'actions
											?>
											<tr>
												<td><?php echo $i; $i+=1 ?></td>
												<td><?php echo $equipe['nom'] ?></td>
												<td><?php echo $equipe['pseudo'] ?></td>
			                  <td><?php echo $equipe['email'] ?></td>
												<td><?php echo $equipe['telephone'] ?></td>
												<td><a class="btn btn-primary btn-block" href="../controller/infosEquipe.controller.php?refEquipe=<?php echo $equipe['idEquipe'] ?>">Détails</a></td>
												<td><a class="btn btn-danger btn-block" href="../controller/modifCompetition.controller.php?refEquipeSupp=<?php echo $equipe['idEquipe'] ?>">Supprimer</a></td>
			                </tr>
			              <?php } ?>
				          </table>
				        </div>
				      </div>
				    </div>
			    </div>
					<a href="../controller/gererCompetitions.controller.php" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
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
