<?php

include 'check-cas-connection.php';
include "class/connection.php";

// phpCAS::getUser();

// USER

	$sql = "SELECT * FROM utilisateur WHERE login = '".phpCAS::getUser()."';";
	$conn = new connection();
	$conn->Connect();
	$response = $conn->Conn->query($sql);

	if ($response->rowCount() == 0){
		// CREATE THE USER IN THE DATA BASE
		$sqlCreate = "INSERT INTO utilisateur VALUES ('".phpCAS::getUser()."');";
		$connCreate = new connection();
		$connCreate->Connect();
		$responseCreate = $connCreate->Conn->query($sqlCreate);
	}

	echo 'Vous êtes connecté avec le login : '. phpCAS::getUser();

?>
