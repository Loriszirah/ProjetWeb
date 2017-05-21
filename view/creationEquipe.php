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
    <?php
      if(isset($ajout)){
        if($ajout){?>
          Equipe créée avec succès !
        <?php }
        else{?>
          Nom d'équipe déjà utilisé
        <?php}
    }?>
    <h2>Creation Equipe</h2>
    <form action="../controller/creationEquipeVerif.controller.php" method="post">
      <label>Nom de l'équipe</label>
      <input type="text" name="nomEquipe" required/>
    </form>
  </body>
</html>
