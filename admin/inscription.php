<?php 
session_start();

if($_SESSION['admin']==1234){

try
	{
		$db = new PDO('mysql:host=localhost;dbname=Mon_site', 'Mon_site_admin','2468');//accéder a la bdd
		$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //les nom de champs seront en caractère minuscules
		$db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); //les erreurs lanceront des exceptions
	}
catch(Exception $e){

		echo'une erreur est survenue';//message d'erreur si la connection ne marche pas
		die();

}

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
</head>
<body>
	<?php
	if(isset($_POST['submit'])){
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$mdp=$_POST['mdp'];
		$age=$_POST['age'];
		$mail=$_POST['mail'];
		$tel=$_POST['tel'];
		$Dat_n=$_POST['Date_n'];

		
		$insert = $db->prepare("INSERT INTO Inscrit VALUES('null','$nom','$prenom','$mdp','$age','$mail','$tel','$Dat_n')");//commande SQL
		$insert->execute();//faire executer par mysql
		session_destroy();
		header('Location: ../index.php');
	}else if(isset($_POST['Deco'])){
		session_destroy();
		header('Location: index.php');
	}
	?>


	<center>
	<h1>Inscription</h1>
	<form action="" method="post">
	<h3>Nom* :</h3><input type="text" name="nom" /><br/><br/>
	<h3>Prenom* :</h3><input type="text" name="prenom" /><br/><br/>
	<h3>Mot de Passe* :</h3><input type="password" name="mdp" /><br/><br/>
	<h3>Age :</h3><input type="number" name="age" min="16" max="100"/><br/><br/>
	<h3>Mail :</h3><input type="text" name="mail"/><br/><br/>
	<h3>Telephone :</h3><input type="tel" name="tel" id="tel" required/><br/><br/>
	<h3>Date de naissance :</h3><input type="Date" name="Date_n" /><br/><br/>
	<input type="submit" name="submit" value="Inscription" /><br/><br/>
	</form>
	</center>

	
</body>
<input type="submit" name="Deco" value="Deconnexion" method="POST">
</html>

<?php

}else{
	header('Location: ../index.php');
	$db=null;
}
?>