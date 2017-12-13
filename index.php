<?php
	require_once('include_and_style/header.php');
	if(isset($_SESSION['nom'])){ 
	$nom=$_SESSION['nom'];  ?>
	<h5>Bonjour <?php echo "$nom" ?></h5>
	<h5>Si vous souhaiter retourner sur la page de modification clic Modifier</h5>
	<form action="" method="POST">
	<input type="submit" name="submit" value="Modifier" /><input type="submit" name="Deconnexion" value="Deconnexion"></form>
	<?php
	if(isset($_POST['submit'])){
		header('Location: admin/Connexion.php');
	}
	if(isset($_POST['Deconnexion'])){
		session_destroy();
	}
	}
?>

<!DOCTYPE html>
<html>
<head>

	
	<title>Site Presentation</title>
</head>
<BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/>
<body ALINK="#ff0000">
	
</body>
<BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/><BR/>
<footer>
	<?php
	require_once('include_and_style/footer.php');
	?>
</footer>
</html>