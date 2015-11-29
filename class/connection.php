<?php

class connection
{

    public $Host;
    public $Port;
    public $Dbname;
    public $User;
    public $Password;
    public $Conn;

    function __construct () {
        $this->Host="tuxa.sme.utc";
        $this->Port="5432";
        $this->Dbname="dbnf17a044";
        $this->User="nf17a044";
        $this->Password="7YoUhLQs";
    }

    function Connect () {
        $this->Conn = pg_connect("host=".$this->Host." port=".$this->Port." dbname=".$this->Dbname." user=".$this->User." password=".$this->Password) or die('Échec de la connexion : ' . pg_last_error());
    }

    function Close () {
        pg_close($this->Conn);
    }

    /* Fonction permettant de supprimer un tutoriel de la BD en fonction de son titre
    public function deleteFromDB($titre){
        $sql = "DELETE FROM tutoriels WHERE titre = '".$titre."'";
        $Query=pg_query($this->Conn, $sql);

    }*/
}
