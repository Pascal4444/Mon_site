<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<?php
	try
		{
			$db = new PDO('mysql:host=localhost;dbname=Mon_site', 'Mon_site_inscrit','1234');
			$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //les nom de champs seront en caractère minuscules
			$db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); //les erreurs lanceront des exceptions
		}
		catch(Exception $e){

			echo'une erreur est survenue';
			die();

		}

	?>
</head>
<body>

	<?php
		$id=$_SESSION['id'];

		$select = $db->prepare("SELECT * FROM Inscrit WHERE numuser=$id");
		$select->execute();

		$data = $select->fetch(PDO::FETCH_OBJ);

	?>

	<form action="" method="post">
	<h3>Nom :</h3><input value="<?php echo $data->nom; ?>" type="text" name="name"/>
	<h3>Prenom :</h3><input value="<?php echo $data->prenom; ?>" type="text" name="surname"/>
	<h3>password :</h3><input value="<?php echo $data->mdp; ?>" type="password" name="mdp"/>
	<h3>Age :</h3><input value="<?php echo $data->age; ?>" type="number" name="age"/>
	<h3>Mail :</h3><input value="<?php echo $data->mail; ?>" type="text" name="mail"/>
	<h3>téléphone :</h3><input value="<?php echo $data->tel; ?>" type="tel" name="tel"/>
	<h3>Date de Naissance :</h3><input value="<?php echo $data->Date_naiss; ?>" type="Date" name="date_n"/><BR/><BR/>
	<input type="submit" name="submit" value="Modifier"/>
	</form>

	<?php
		if(isset($_POST['submit'])){

			$nom=$_POST['name'];
			$prenom=$_POST['surname'];
			$mdp=$_POST['mdp'];
			$age=$_POST['age'];
			$mail=$_POST['mail'];
			$tel=$_POST['tel'];
			$dat_n=$_POST['date_n'];

			$update = $db->prepare("UPDATE Inscrit SET nom='$nom',prenom='$prenom',mdp='$mdp', age='$age', mail='$mail', tel='$tel', date_naiss='$dat_n' WHERE numuser=$id");
			$update->execute();
			
			$select1 = $db->prepare("SELECT * FROM Inscrit WHERE numuser='$id'");
			$select1->execute();//faire executer par mysql
			$s1 = $select1->fetch(PDO::FETCH_OBJ);
			$_SESSION['nom']=$s1->nom;
			header('Location: ../index.php');
		}
	?>

</body>
</html>

<?php
}else{
	header('Location: ../index.php');
}
?>