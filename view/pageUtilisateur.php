<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-ball Tournament Organisator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<script src="https://use.fontawesome.com/1ab5ac683d.js"></script>
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
    Bonjour <?php echo $pseudo ?>
    <a href="profil.controller.php" class="btb btn-primary btn-lg" role="button">Regarder son profil</a>
    <?php if($role=="joueur"){
      ?>
      <a href="creationEquipe.controller.php" class="btn btn-primary btn-lg" role="button">Créer une équipe</a>
      <a href="gererEquipes.controller.php" class="btn btn-primary btn-lg" role="button">Gérer ses équipes</a>
      <a href="participerCompetition.controller.php" class="btn btn-primary btn-lg" role="button">Pariciper à une compétition</a>
    <?php }
    else{?>
      <a href="creationCompetition.controller.php" class="btn btn-primary btn-lg" role="button">Créer une compétition</a>
      <a href="gererCompetitions.controller.php" class="btn btn-primary btn-lg" role="button">Gérer ses competitions</a>
    <?php } ?>
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
