<?php
try
	{
+		$pdo = new PDO('pgsql:host=ec2-46-137-97-169.eu-west-1.compute.amazonaws.com;port=5432;dbname=dc73ovmdsu7c1o','feoilwsqqlyeaz','76f373700f07860ad6b2086111b0964b3ec05e40b2c2fd492f9c89c842804b5c');
 +		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());

	}
?>
