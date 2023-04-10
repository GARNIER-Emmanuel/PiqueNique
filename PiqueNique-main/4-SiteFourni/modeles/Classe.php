<?php
class Classe {    
    private $id;
    private $libelle;
    private $sesEtudiants;

          
    public function __construct(string $unLibelle, int $unId = null) { 
        $this->id=$unId;
        $this->libelle=$unLibelle;
        $this->sesEtudiants=array();
    }

    public function getId() {
        return $this->id;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setId(int $unId){
        $this->id = $unId;
    }

    public function setLibelle(string $unLibelle) {
        $this->libelle = $unLibelle;
    }
     
    public function getSesEtudiants() {
        return $this->sesEtudiants;
    }

    public function setSesEtudiants(array $desEtudiants){
        $this->sesEtudiants = $desEtudiants;
    }
    
    public function toString(){
        $texte ="<br/> Classe numero : ". $this->id ."<br/>" ;
        $texte = $texte . "Libelle : ". $this->libelle ."<br/>" ;
        if ($this->sesEtudiants){
            $texte = $texte . "ses Etudiants : "."<br/>";
            
            foreach ($this->sesEtudiants as $unEtudiant){
                $texte = $texte . $unEtudiant->toString() ."<br/>";
            }
        }
        
        return $texte;
    }
}