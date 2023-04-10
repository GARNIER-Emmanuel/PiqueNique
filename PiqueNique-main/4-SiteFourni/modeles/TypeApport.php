<?php
class TypeApport {    
    private $id;
    private $libelle;
    private $sesApports;

          
    public function __construct(string $unLibelle, int $unId = null) { 
        $this->id=$unId;
        $this->libelle=$unLibelle;
        $this->sesApports=array();

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
    
    public function getSesApports() {
        return $this->sesApports;
    }

    public function setSesApports(array $desApports){
        $this->sesApports = $desApports;
    }
     
    public function toString(){
        $texte ="<br/> Type Apport numero : ". $this->id ."<br/>" ;
        $texte = $texte . "Libelle : ". $this->libelle ."<br/>" ;
        if ($this->sesApports){
            $texte = $texte . "Ses Apports : ";
            
            foreach ($this->sesApports as $unApport){
                $texte = $texte . $unApport->toString() ."<br/>";
            }
        }
        
        return $texte;
                                                                                                                                                                                 
    }
}