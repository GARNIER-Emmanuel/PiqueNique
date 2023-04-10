<?php
//include 'BaseDAO.php';

class ApportDAO extends BaseDAO{
    
    public function ajouter($lApport) {
        $sql = "INSERT INTO Apport (description,nbParts,idT) VALUES ('".$lApport->getDescription()."','".$lApport->getNbParts()
                ."','".$lApport->getSonTypeApport()->getId()."')";
        return $this->query($sql);
    }
    
    public function getLesApports() {
//        echo "Requête à exécuter sous Mysql :";
        $sql = "SELECT * FROM Apport INNER JOIN TypeApport ON Apport.idT = TypeApport.idT ORDER BY libelle;";
//       echo "sql = ".$sql."<br/>";
        
        $resultat = $this->query($sql);
        $lesLignes = $resultat->fetchall();
//        var_dump($lesLignes);
        
        // Transformation d'un tableau associatif lié à la structure de la table d'origine
        // en un tableau d'objets métiers de la classe Apport
        
        $tabApports = array();
//        echo "tabApports créé <br/>";
        foreach ($lesLignes as $uneLigne){
            $unTypeApport = new TypeApport($uneLigne['libelle'],$uneLigne['idT']);
            $unApport = new Apport($uneLigne['description'], $uneLigne['nbParts'], $unTypeApport,$uneLigne['idT']);
//            echo "un objet Apport créé <br/>";
//            var_dump($unApport);
            
            $tabApports[]=$unApport;
//            echo "un objet Apport ajouté à tabApports <br/>";
//             var_dump($tabApports);
        }
        return $tabApports;
    }
}
