<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-ball Tournament Organisator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
  	<div id="wrapper">
  		<!-- NAV SIDE only if we are connected -->
  		<?php if (isset($_COOKIE["token"]) && verificationToken($decoded_array)){
  			 include("side_menu.php");
  		} ?>
      <div id="page-wrapper">
        <div id="page-inner">
          <div class="row">
      			<div class="col-lg-12">
      				<div class="panel panel-default">
      					<div class="panel-body">
      						<table width="100%" class="table table-striped table-bordered table-hover">
      							<thead>
                      <tr>
                        <th>Numéro</th>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th></th>
                      </tr>
                    </thead>
                    <?php
      							$i=1;
      							foreach ($joueurs as $joueur){//On affiche pour chaque compétition de l'organisateur ses informations et les boutons d'actions
      								?>
      								<tr>
      									<td><?php echo $i; $i+=1 ?></td>
      									<td><?php echo $joueur['pseudo'] ?></td>
      									<td><?php echo $joueur['email'] ?></td>
                        <td><?php echo $joueur['telephone'] ?></td>
      									<td><a class="btn btn-danger btn-block" href="../controller/consulterJoueurs.controller.php?refJoueurSupp=<?php echo $joueur['idPersonne'] ?>">Supprimer</a></td>
                      </tr>
                    <?php } ?>
      	          </table>
      	        </div>
      	      </div>
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
