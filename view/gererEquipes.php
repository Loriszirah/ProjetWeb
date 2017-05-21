<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Volley-ball Tournament Organisator</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
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
									<td><?php echo $equipe['name'] ?></td>
									<td><?php echo $equipe['idPerson'] ?></td>
                  <?php if($idJoueur==$equipe['idPerson']){//on affiche le bouton de modifier seulement si c'est le capitaine?>
                      <td><a class="btn btn-primary btn-block" href="../controller/modifEquipe.controller.php?refEquipe=<?php echo $equipe['idTeam'] ?>"><i class="fa fa-edit "></i></a></td>
                  <?php }?>
                  <td><a class="btn btn-danger btn-block" href="../controller/gererEquipes.controller.php?refEquipeSupp=<?php echo $equipe['id']?>"><i class="icon-remove-sign"></i></a></td>
                </tr>
              <?php }?>
          </table>
        </div>
      </div>
    </div>
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
  </body>
</html>
