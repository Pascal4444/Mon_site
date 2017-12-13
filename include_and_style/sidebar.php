<div class="sidebar">
<h4>Derniers Articles</h4>

<?php
	
	$select = $db->prepare("SELECT * FROM produits ORDER BY id DESC LIMIT 0,2");
	$select->execute();

	while($s=$select->fetch(PDO::FETCH_OBJ)){

		?>

		<div style="text-align:center;"><h2 style="color:white;"><?php echo $s->title;?></h2>
		<h5 style="color:white;"><?php echo $s->description; ?></h5>
		<h4 style="color:white;"><?php echo $s->price; ?> Euros</h4></div>
		<br/><br/>

		<?php

	}

?>

</div>