<?php
//Data access object mode
//Separating the database access layer as a public access interface is a common design pattern in PHP
class BaseDAO {
    private $db;
    
    public function __construct() {         
		try{
            $this->db = new PDO('mysql:host=localhost;dbname=ap.3pique-nique','root','root');
            $this->db->query("SET CHARACTER SET utf8");
           // echo "<br/>connexion réussie.<br/>";
		}
		catch ( PDOException $erreur){
            die("Erreur de connexion à la base de données ".$erreur->getMessage());
		}
    }
    //methode piblique définie pour pouvoir accéder à la méthode query() de la propriété $db qui est privée.
    public function query($sql) {
        return $this->db->query($sql);
    }
}
