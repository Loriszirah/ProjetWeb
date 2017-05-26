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
	        <h2 class="titrePage">Equipe <?php echo $equipe['nom'];?></h2>
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
	                    </tr>
	                  </thead>
	                  <?php
	    							$i=1;
	    							foreach ($membres as $membre){//On affiche pour chaque membre de l'équipe ses informations
	    								?>
	    								<tr>
	    									<td><?php echo $i; $i+=1; ?></td>
	    									<td><?php echo $membre['nom'] ?></td>
	    									<td><?php echo $membre['prenom'] ?></td>
	                      <td><?php echo $membre['age'] ?></td>
												<td><?php echo $membre['pseudo'] ?></td>
											</tr>
										<?php } ?>
	                </table>
	              </div>
	            </div>
							<a href="../controller/gererCompetitions.controller.php" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
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
    <script src="../assets/js/custom.js"></script>
  </body>
</html>
