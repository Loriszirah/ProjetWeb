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
    <h2>Profil</h2>
    <form action="../controller/profil.controller.php" method="post" onsubmit="return informationsCorrectes();">
      <label>Pseudo :</label>
  		<input type="text" value="<?php echo $pseudo ?>"  name="pseudo" required/>
      <br/>
      <label>Nom :</label>
  		<input type="text" value="<?php echo $nom ?>"  name="nom" required/>
  		<br/>
  		<label>Prénom :</label>
  		<input type="text" value="<?php echo $prenom ?>"  name="prenom" required/>
  		<br/>
      <label>Adresse mail :</label>
  		<input type="text" value="<?php echo $email ?>"  name="email" required/>
  		<br/>
      <label>Age :</label>
  		<input type="text" value="<?php echo $age ?>"  name="age" required/>
  		<br/>
      <label>Téléphone :</label>
  		<input type="text" value="<?php echo $telephone ?>"  name="telephone" required/>
  		<br/>
      <label>Ville :</label>
  		<input type="text" value="<?php echo $ville ?>"  name="ville" required/>
  		<br/>
  		<div class="form-group">
  			<label>Mot de passe : </label>

  			<div id="new">
  				<label>Nouveau :</label>
  				<input type="password" name="passwd" id="passwd" />
  				<label>Confirmer :</label>
  				<input type="password" name="futur" id="futur" />
  			</div>
  			<input type="button" value="Modifier" id="modifier" class="btn btn-primary" onclick="afficher();"/>
  		</div>
  		<input type="submit" value="Enregistrer" class="btn btn-success"/>
  	</form>
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="../assets/js/jquery-1.10.2.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="../assets/js/jquery.metisMenu.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="../assets/js/custom.js"></script>
	</body>
</html>
