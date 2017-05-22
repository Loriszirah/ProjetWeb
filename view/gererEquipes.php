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
    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
                <tr>
                  <th>Numéro</th>
                  <th>Nom Equipe</th>
                  <th>Capitaine</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <?php
							$i=1;
							foreach ($equipes as $equipe){//On affiche pour chaque équipe du joueur ses informations et les boutons d'actions
								?>
								<tr>
									<td><?php echo $i; $i+=1; ?></td>
									<td><?php echo $equipe['nom'] ?></td>
									<td><?php echo $equipe['idPersonne'] ?></td>
                  <?php if($idJoueur==$equipe['idPersonne']){//on affiche le bouton de modifier seulement si c'est le capitaine?>
                      <td><a class="btn btn-primary btn-block" href="../controller/modifEquipe.controller.php?refEquipe=<?php echo $equipe['idEquipe'] ?>"><i class="fa fa-edit "></i></a></td>
                  <?php }?>
                  <td><a class="btn btn-danger btn-block" href="../controller/gererEquipes.controller.php?refEquipeSupp=<?php echo $equipe['idEquipe']?>"><i class="icon-remove-sign"></i></a></td>
                </tr>
              <?php }?>
          </table>
        </div>
      </div>
    </div>
    </div>
		<a href="../controller/pageUtilisateur.controller.php?" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
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
