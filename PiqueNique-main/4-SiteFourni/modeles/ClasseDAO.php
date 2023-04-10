<?php
//include 'BaseDAO.php';

class ClasseDAO extends BaseDAO{
    
    public function ajouter($laClasse) {
        $sql = "INSERT INTO Classe (libelle) VALUES ('".$laClasse->getLibelle()."')";
        return $this->query($sql);
    }

    public function getLesClasses() {
//        echo "Requête à exécuter sous Mysql :";
        $sql = "SELECT * FROM Classe ORDER BY libelle;";
//       echo "sql = ".$sql."<br/>";
        
        $resultat = $this->query($sql);
        $lesLignes = $resultat->fetchall();
//        var_dump($lesLignes);
        
        // Transformation d'un tableau associatif lié à la structure de la table d'origine
        // en un tableau d'objets métiers de la classe Classe
        
        $tabClasses = array();
//        echo "tabClasses créé <br/>";
        foreach ($lesLignes as $uneLigne){
            $uneClasse = new Classe($uneLigne['libelle'],$uneLigne['idC']);
//            echo "un objet Classe créé <br/>";
//            var_dump($uneClasse);
            
            $tabClasses[]=$uneClasse;
//            echo "un objet Classe ajouté à tabClasses <br/>";
//             var_dump($tabClasses);
        }
        return $tabClasses;
        }
}