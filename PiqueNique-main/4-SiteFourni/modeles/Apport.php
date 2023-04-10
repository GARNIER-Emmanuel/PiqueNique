<?php

//include ('TypeApport.php');

class Apport {    
    private $id;
    private $description;
    private $nbParts;
    private $sonTypeApport;

          
    public function __construct(string $uneDescription, string $unNbParts, TypeApport $unTypeApport=null,int $unId = null) { 
        $this->id=$unId;
        $this->description=$uneDescription;
        $this->nbParts= $unNbParts;
        $this->sonTypeApport= $unTypeApport;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getNbParts() {
        return $this->nbParts;
    }

    public function setId(int $unId){
        $this->id = $unId;
    }

    public function setDescription(string $uneDescription) {
        $this->description = $uneDescription;
    }

    public function setNbParts(string $unNbParts){
        $this->nbParts = $unNbParts;
    }
    
    public function getSonTypeApport() {
        return $this->sonTypeApport;
    }

    public function setSonTypeApport(int $unTypeApport){
        $this->sonTypeApport = $unTypeApport;
    }
     
    public function toString(){
        $texte ="<br/> Apport numero : ". $this->id ."<br/>" ;
        $texte = $texte . "Description : ". $this->description ."<br/>" ;
        $texte = $texte . "Nombre de parts : ". $this->nbParts ."<br/>";
        if ($this->sonTypeApport){
            $texte = $texte . $this->sonTypeApport->toString() . "<br/>";
        }
        
        return $texte;
    }
}