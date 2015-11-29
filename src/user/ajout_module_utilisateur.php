<?php
include "../../class/connection.php";
var_dump($_GET);

if ( isset ($_GET['utilisateur_id'], $_GET['module'], $_GET['new']) )
{
	$utilisateur = htmlspecialchars ( $_GET['utilisateur_id'] );
	$module = htmlspecialchars ( $_GET['module'] );
	
	$SQL = "INSERT INTO menu_utilisateur (utilisateur, module) VALUES ('".$utilisateur."', '".$module."');";
	
	echo $SQL;
	
	
	$conn = new connection();
	$conn->Connect();
	$response = $conn->Conn->query($sql);
}
if ( isset ($_GET['module'], $_GET['utilisateur'], $_GET['priorite']) && !isset ($_GET['new']) )
{
	$module = htmlspecialchars ( $_GET['module'] );
	$utilisateur = htmlspecialchars ( $_GET['utilisateur'] );
	$priorite = htmlspecialchars ( $_GET['priorite'] );
	
	$SQL = "UPDATE menu_utilisateur SET priorite = '" . $priorite . "' WHERE utilisateur = '".$utilisateur."' AND module = '". $module ."'";
	
	echo "<br />" . $SQL;
	
	$conn = new connection();
	$conn->Connect();
	$response = $conn->Conn->query($sql);
}
header('Location: http://codetrotter.fr/myutc/src/user/gestion_menu_utilisateur.php');
?>