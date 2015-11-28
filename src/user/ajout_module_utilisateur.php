<?php
function ajouter_module_utilisateur ($utilisateur_id, $module, $priorite)
{
	include "../class/connection.php";
	
	$SQL = "INSERT INTO menu_utilisateur VALUES ('" . $priorite . "', '" . $utilisateur_id . "', '" . $module . "')";
	
	echo $SQL;	
	
	/*
	$conn = new connection();
	$conn->Connect();
	
	$Query = pg_query($conn->Conn, $SQL);
	
	$conn->Close();*/
}
?>