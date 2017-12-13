<!DOCTYPE html>
<?php
session_destroy();
?>

<html>
<link href="include_and_style/bootstrap.css" type="text/css" rel="stylesheet"/>
<head>
	<?php
	require_once('include_and_style/header.php');
	session_start();
	?>

	<title>Connexion</title>
</head>
<BR/><BR/><BR/><BR/>
<body>
	<?php
	
	if(isset($_POST['submit'])){

		if($_POST['username']!=''&&$_POST['password']!=''){

			$user=$_POST['username'];
			$password=$_POST['password'];

			
			$select1 = $db->prepare("SELECT * FROM Inscrit WHERE nom='$user'");
			$select1->execute();//faire executer par mysql
			$s1 = $select1->fetch(PDO::FETCH_OBJ);

			
			if($s1->nom==$user && $s1->mdp==$password){
			
				
				$_SESSION['id']=$s1->numuser;
				$_SESSION['nom']=$s1->nom;
				$a=$_SESSION['id'];
				header('Location: admin/Connexion.php');
				
			}
			else{
				echo'Identifiants eronnes';
			}
		}else{
			echo'Veuillez remplir tous les champs !';

		}
	}
	?>

<center>
<h1>Connexion</h1>
<form action="" method="POST">
<h3>Nom :</h3><input type="text" name="username"/><br/><br/>
<h3>Mot de Passe :</h3><input type="password" name="password"/><br/><br/>
<input type="submit" name="submit"/><br/><br/>
</form>
</center>
</body>
<BR/><BR/><BR/><BR/>
<footer>
	<?php
	require_once('include_and_style/footer.php');
	?>
</footer>
</html>