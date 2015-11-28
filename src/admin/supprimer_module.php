<!DOCTYPE html>
<html>
	<head>
		<title>Suppression module</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	</head>
	<body>
		<?php
		if ( isset ($_GET['id'], $_GET['confirmer']) )
		{
			if ($_GET['confirmer'] == "false")
			{
			?>
				<p>Voulez-vous vraiment supprimer ce module ?
				<a href="gerer_module.php">Non</a> -
				<a href="supprimer_module.php?id=<?php echo $_GET['id'];?>&confirmer=true">Oui</a></p>
			<?php
			}
			if ($_GET['confirmer'] == "true")
			{
				$id = htmlspecialchars($_GET['id']);
				$SQL = "DELETE FROM module WHERE id = '" . $id . "'";
				echo $SQL;
				
				include "../../class/connection.php";
			
				$conn = new connection();
				$conn->Connect();
				
				
				$response = $conn->Conn->query($SQL);
				
				if ($response == false)
				{
					echo "<p>Problème lors de la suppression.</p>";
				}
			}
		}
		else 
		{
			echo "<p>Pas de requête à exécuter.</p>";
		}
		?>
		<p><a href="gerer_module.php">Retour</a></p>
	</body>
</html>
