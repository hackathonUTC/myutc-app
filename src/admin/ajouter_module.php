<!DOCTYPE html>
<html>
	<head>
		<title>Gérer les modules - Ajouter</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	</head>
	<body>
	
		<h1>Ajouter module</h1>
		
		<form action="ajouter_module.php" method="post">
				<p>
					Titre : <input type="text" name="titre"><br />
					Description<br />
					<textarea name="description" rows="2" cols="80"></textarea><br />
					Lien <input type="text" name="lien"><br />
				</p>
				<p>
					<input type="submit" value="Envoyer">				
				</p>
		
		</form>
		
		<?php
		if ( isset($_POST['titre'], $_POST['description'], $_POST['lien']) )
		{
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			
			$titre = htmlspecialchars($_POST['titre']);
			$description = htmlspecialchars($_POST['description']);
			$lien = htmlspecialchars($_POST['lien']);
			
			
			if (filter_var($lien, FILTER_VALIDATE_URL)) {
			  //lien est une URL
			  
				$SQL = "INSERT INTO module (titre, description, lien) VALUES ('" . $titre . "', '" . $description . "', '" . $lien . "')";			  
			
				include "../../class/connection.php";
				
				$conn = new connection();
				$conn->Connect();
				
				$response = $conn->Conn->query($SQL);
			}
		}
		?>
		
		<a href="./">Retour accueil</a>
	
	</body>
</html>