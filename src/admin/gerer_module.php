<!DOCTYPE html>
<html>
	<head>
		<title>Gérer les modules</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	</head>
	<body>
	
		<h1>Gérer les modules</h1>
		<ul>
			<li><a href="ajouter_module.php">Ajouter</a></li>
			<li><a href="supprimer_module.php">Supprimer</a></li>
			<li><a href="modifier_module.php">Modifier informations</a></li>
		</ul>
		
		
		<table>
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Lien</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		
			<?php
			$sql = "SELECT * FROM module";
			
			include "../../class/connection.php";
			
			$conn = new connection();
			$conn->Connect();
			
			
			$response = $conn->Conn->query($sql);
			
			while ($vResult = $response->fetch())
			{
			?>
				<tr>
					<td><?php echo $vResult['titre'];?></td>
					<td><?php echo $vResult['description'];?></td>
					<td><?php echo $vResult['lien'];?></td>
					<td><a href="modifier_module.php?id=<?php echo $vResult['id'];?>">&nabla;</a></td>
					<td><a href="supprimer_module.php?id=<?php echo $vResult['id'];?>&confirmer=false">&otimes;</a></td>
				</tr>
			<?php
			}
			?>
			
		</table>
	
	</body>
</html>