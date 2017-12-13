<?php

session_start();

try
		{
			$db = new PDO('mysql:host=localhost;dbname=Mon_site', 'Mon_site','1234');
			$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //les nom de champs seront en caractère minuscules
			$db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); //les erreurs lanceront des exceptions
		}
		catch(Exception $e){

			echo'une erreur est survenue au niveau de la base';
			die();

		}

?>

<!DOCTYPE html>
<html>
	<head>
		<link href="include_and_style/bootstrap.css" type="text/css" rel="stylesheet"/>
	</head>
	<header>
		<center>
		<!--<br/><h1>Menu du Site</h1><br/>--><BR/>
		<ul class="menu">
			<li><a href="index.php">Presentation</a></li>
			<li><a href="Connexion.php">Connexion</a></li>
			<li><a href="Page_inscrit.php">Inscrit</a></li>
			<li><a href="Contact.php">Contact</a></li>
		</ul>
	</center>
	</header>
</html>