<?php

//include 'Classe.php';

class Etudiant {    
    private $id;
    private $nom;
    private $prenom;
    private $saClasse;
    private $sesApports;

          
    public function __construct(string $unNom, string $unPrenom, Classe $uneClasse=null, int $unId = null) { 
        //ceci permet d'appeler le constructeur avec 2 ou 5 paramètres selon les besoins
        // il ne peut pas y avoir plusieurs constructeurs en PHP pour une classe
        $this->id=$unId;
        $this->nom=$unNom;
        $this->prenom= $unPrenom;
        $this->saClasse=$uneClasse;
        $this->sesApports=array();
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setId(int $unId){
        $this->id = $unId;
    }

    public function setNom(string $unNom) {
        $this->nom = $unNom;
    }

    public function setPrenom(string $unPrenom){
        $this->prenom = $unPrenom;
    }
    
    public function getSaClasse() {
        return $this->saClasse;
    }

    public function setSaClasse(Classe $uneClasse){
        $this->saClasse = $uneClasse;
    }
     
    public function getSesApports() {
        return $this->sesApports;
    }

    public function setSesApports(array $desApports){
        $this->sesApports = $desApports;
    }
    
    public function ajouterApport(Apport $unApport){
        $this->sesApports[]=$unApport;
    }
    
    
    public function toString(){
        $texte ="<br/> Etudiant numero : ". $this->id ."<br/>" ;
        $texte = $texte . "Nom : ". $this->nom ."<br/>" ;
        $texte = $texte . "Prénom : ". $this->prenom ."<br/>";
        if ($this->saClasse){
            $texte = $texte . $this->saClasse->toString() ."<br/>";
        }
        
        return $texte;
    }
    
}
