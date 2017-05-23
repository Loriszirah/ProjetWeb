<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

		<title>Connexion Etudiant</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- MetisMenu CSS -->
		<link	href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.6.1/metisMenu.min.css" rel="stylesheet">
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
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
	                        <h3 class="panel-title">Connectez vous</h3>
	                    </div>
	                    <div class="panel-body">
	                        <form action="../controller/loginJoueur.controller.php" method="post" onsubmit="return verifInfo()" role="form">
	                            <fieldset>
	                                <div class="form-group">
																			<label>Email : </label>
	                                    <input class="form-control" placeholder="gunther@gmail.com" name="email" type="email" autofocus required>
	                                </div>
	                                <div class="form-group">
																			<label>Mot de passe : </label>
	                                    <input class="form-control" placeholder="password" name="password" type="password" required>
	                                </div>
																	<input type="submit" class="btn btn-lg btn-success btn-block" value="Connexion" />
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
	<!-- METISMENU SCRIPTS -->
	<script src="../assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="../assets/js/custom.js"></script>
	</body>

</html>
