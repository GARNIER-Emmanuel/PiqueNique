<?php
//include 'BaseDAO.php';

class TypeApportDAO extends BaseDAO{
    
    public function ajouter($leTypeApport) {
        $sql = "INSERT INTO TypeApport (libelle) VALUES ('".$leTypeApport->getLibelle()."')";
        return $this->query($sql);
    }
    
    public function getLesTypes() {
//        echo "Requête à exécuter sous Mysql :";
        $sql = "SELECT * FROM TypeApport ORDER BY libelle;";
//       echo "sql = ".$sql."<br/>";
        
        $resultat = $this->query($sql);
        $lesLignes = $resultat->fetchall();
//        var_dump($lesLignes);
        
        // Transformation d'un tableau associatif lié à la structure de la table d'origine
        // en un tableau d'objets métiers de la classe TypeApport
        
        $tabTypes = array();
//        echo "tabTypes créé <br/>";
        foreach ($lesLignes as $uneLigne){
            $unTypeApport = new TypeApport($uneLigne['libelle'],$uneLigne['idT']);
//            echo "un objet TypeApport créé <br/>";
//            var_dump($unTypeApport);
            
            $tabTypes[]=$unTypeApport;
//            echo "un objet TypeApport ajouté à tabTypes <br/>";
//             var_dump($tabTypes);
        }
        return $tabTypes;
        }
}