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

	echo 'Vous êtes connecté avec le login : '. phpCAS::getUser().'<br>';

	echo "<pre>";
	var_dump(get_user_modules(phpCAS::getUser()));

	?>




  <?php
	function get_user_modules($login) {
		$sql = "SELECT * 
				FROM module INNER JOIN menu_utilisateur 
					ON module.id = menu_utilisateur.module
				WHERE menu_utilisateur.utilisateur = '".phpCAS::getUser()."';";
		$conn = new connection();
		$conn->Connect();
		$response = $conn->Conn->query($sql);
		
		$retour = array();
		while ( $vResult = $response->fetch()) {
			$module = array();
			$module[titre] = $vResult['titre'];
			$module[description] = $vResult['description'];
			$module[lien] = $vResult['lien'];
			$module[id] = $vResult['id'];
			$retour[] = $module;
		}
		return $retour;

	}

?>
