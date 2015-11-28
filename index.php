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
		include "class/connection.php";
		
		$conn = new connection();
		$conn->Connect();
		
		$sql = "SELECT * FROM module";
		$Query=pg_query($conn->Conn, $sql);
		
		while ($vResult = pg_fetch_array($Query, null, PGSQL_ASSOC))
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