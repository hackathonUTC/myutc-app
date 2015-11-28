<?php

include "../class/connection.php";

$conn = new connection();
$conn->Connect();
$id = 1;

/* Code permettant d'ajouter un tuto dans la BD en 2 secondes
=============	NE PAS SUPPRIMER ==========================
$sql = "INSERT INTO tutoriels(
            titre, url, description, niveau)
    VALUES ('Faire un mille feuille', 
    'http://lemillefeuille.fr', 
    'Le mille feuillede vos reve', 
    'Utilisateur occasionnel')";
*/

$sql = "SELECT login FROM Utilisateur";
$Query=pg_query($conn->Conn, $sql);




while ($vResult = pg_fetch_array($Query, null, PGSQL_ASSOC)) {
    var_dump($vResult);
}


$conn->Close();