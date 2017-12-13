<?php
session_reset();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){

	$user='inscrit'; $password_c=1234;

	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username&&$password){

		if($username==$user&&$password==$password_c){
			?>
		<h1>Bonjour, veuillez choisir ce que vous souhaiter faire</h1>
		<BR/><BR/><BR/><BR/>
		<a href="../Connexion.php">Connexion</a><BR/>
		<a href="inscription.php">Inscription</a>
		<?php
		$_SESSION['admin']=$password;
		$_SESSION['id']='inscrit';
		}else{
			echo'Identifiants eronnes';
		}
	}
	else{
		echo'Veuillez remplir tous les champs !';
	}
}else{
?>

	<center>
	<h1>Administration - Connexion</h1>
	<form action="" method="POST">
	<h3>Pseudo :</h3><input type="text" name="username"/><br/><br/>
	<h3>Mot de Passe :</h3><input type="password" name="password"/><br/><br/>
	<input type="submit" name="submit"/><br/><br/>
	</center>
<?php } ?>
</form>
</body>
</html>