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
			    <p>La competition se déroule le <?php echo $competition['dateDebut'] ?> à l'adresse <?php echo $competition['adresse'] ?>.</p>
					<p>Les matchs seront du <?php echo $competition['libelleType'] ?>. La compétition peut accueillir <?php echo $competition['nbEquipes'] ?> équipes et il y a actuellement <?php echo $nbEquipesInscrites ?> équipes actuellement inscrites.</p>
			    <h3>Description de la compétition : </h3>
			    <p><?php echo $competition['description'] ?></p>
			    <a href="../controller/inscriptionCompetition.controller.php?refCompetition=<?php echo $competition['idCompetition'] ?>" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Participer</a>
					<a href="../controller/participerCompetitionType.controller.php?refType=<?php echo $idType ?>" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
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
