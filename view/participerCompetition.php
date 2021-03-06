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
					<h2 class="titrePage">Choisissez le type de compétition</h2>
			    <div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
			            <form name="listechoix" action="../controller/participerCompetitionType.controller.php" method="post" >
			              <select name='typeCompet' size='1'>
			                <?php
			                foreach ($typesCompet as $typeCompet) {?>
			                  <option value="<?php echo $typeCompet['libelle']?>"><?php echo $typeCompet['libelle']?></option>
			                <?php } ?>
			              </select>
			              <input type="submit" class="btn btn-success" value="Rechercher"/>
			            </form>
			          </div>
			        </div>
			      </div>
			    </div>
    			<a href="../controller/pageUtilisateur.controller.php" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
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
