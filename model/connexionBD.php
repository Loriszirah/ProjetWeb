<?php
try
	{
		$host_bd='ec2-46-137-97-169.eu-west-1.compute.amazonaws.com';
		$name_bd='dc73ovmdsu7c1o';
		$user_bd='feoilwsqqlyeaz';
		$pass_bd='76f373700f07860ad6b2086111b0964b3ec05e40b2c2fd492f9c89c842804b5c';
		$pdo = new PDO("pgsql:host=".$host_bd.";dbname=".$name_bd."", "".$user_bd."","".$pass_bd."");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
?>
