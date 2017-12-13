<!DOCTYPE html>
<html>
<head>
	<?php
	require_once('include_and_style/header.php');
	?>
	<title>Liste des inscrits</title>
</head>
<BR/><BR/><BR/><BR/>
<body>

  <?php
    $select = $db->prepare("SELECT * FROM Inscrit");
    $select->execute();//Recupere les données de la base
    $i=0;
    /*$nom[12];
    $prenom[12];
    $age[12];
    $mail[12];*/
    while($s=$select->fetch(PDO::FETCH_OBJ)){
  
      $nom[$i]=$s->nom;
      $prenom[$i]=$s->prenom;
      $age[$i]=$s->age;
      $mail[$i]=$s->mail;
      $i++;
    }

    
  for ($v=0;$v<$i;$v=$v+3){   ?> 
    <table class="table table-responsive" style="background-color:#cccccc;">
      <tbody>
        <tr>
          <th scope="row">Nom</th>
          <td><?php echo $nom[$u]; ?></td>
          <td><?php echo $nom[$u+1]; ?></td>
          <td><?php echo $nom[$u+2]; ?></td>
        </tr>
        <tr>
          <th scope="row">Prenom</th>
          <td><?php echo $prenom[$u]; ?></td>
          <td><?php echo $prenom[$u+1]; ?></td>
          <td><?php echo $prenom[$u+2]; ?></td>
        </tr>
        <tr>
          <th scope="row">Age</th>
          <td><?php echo $age[$u]; ?></td>
          <td><?php echo $age[$u+1]; ?></td>
          <td><?php echo $age[$u+2]; ?></td>
        </tr>
        <tr>
          <th scope="row">Mail</th>
          <td><?php echo $mail[$u]; ?></td>
          <td><?php echo $mail[$u+1]; ?></td>
          <td><?php echo $mail[$u+2]; ?></td>
        </tr>
      </tbody>
    </table>
    <BR/><BR/>
  <?php } ?>
</body>
<BR/><BR/>
<footer>
	<?php
	require_once('include_and_style/footer.php');
	?>
</footer>
</html>