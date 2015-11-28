<?php

class connection
{

    public $Host;
    //public $Port;
    public $Dbname;
    public $User;
    public $Password;
    public $Conn;

    function __construct () {
        $this->Host="mutusql03.evxonline.net";
        //$this->Port="";
        $this->Dbname="myutc";
        $this->User="myutc";
        $this->Password="Hackathon2015";
    }

    function Connect () {
    	$this->Conn = new PDO("mysql:host=".$this->Host.";dbname=".$this->Dbname.";charset=utf8", $this->User, $this->Password);
    }

    /* Fonction permettant de supprimer un tutoriel de la BD en fonction de son titre
    public function deleteFromDB($titre){
        $sql = "DELETE FROM tutoriels WHERE titre = '".$titre."'";
        $Query=pg_query($this->Conn, $sql);

    }*/
}
