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
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<h2>joueur présent<h2>
		<?php foreach($joueur as $jou){?>
			<tr>
        <td><?php echo $jou["lastname"]?></td>
			</tr>
		<?php }?>
	</body>
</html>
