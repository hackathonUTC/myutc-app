<!DOCTYPE html>
<html>
	<head>
		<title>Accueil MyUTC</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	</head>
	<body>
	
		<h1>Accueil MyUTC</h1>
		<h2>Vos tuiles:</h2>
		
		<?php
		$sql = "SELECT * FROM module";
		
		include "class/connection.php";
		
		$conn = new connection();
		$conn->Connect();
		
		
		$response = $conn->Conn->query($sql);
		
		while ($vResult = $response->fetch())
		{
		?>
			<pre>
				<?php print_r($vResult);?>
			</pre>
		<?php
		}
		?>
	
	</body>
</html>