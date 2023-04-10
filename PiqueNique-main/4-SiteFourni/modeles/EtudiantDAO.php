<?php
//include 'BaseDAO.php';

class EtudiantDAO extends BaseDAO{
    
    public function ajouter($lEtudiant) {
        $sql = "INSERT INTO Etudiant (nom,prenom,idC) VALUES ('".$lEtudiant->getNom()."','".$lEtudiant->getPrenom()."','".$lEtudiant->getSaClasse()->getId()."')";
        return $this->query($sql);
    }
   
    public function getLesEtudiants() {
//        echo "Requête à exécuter sous Mysql :";
        $sql = "SELECT * FROM Etudiant INNER JOIN Classe ON Etudiant.idC = Classe.idC ORDER BY libelle;";
//       echo "sql = ".$sql."<br/>";
        
        $resultat = $this->query($sql);
        $lesLignes = $resultat->fetchall();
//        var_dump($lesLignes);
        
        // Transformation d'un tableau associatif lié à la structure de la table d'origine
        // en un tableau d'objets métiers de la classe Etudiant
        
        $tabEtudiants = array();
//        echo "tabEtudiants créé <br/>";
        foreach ($lesLignes as $uneLigne){
            $uneClasse = new Classe($uneLigne['libelle'],$uneLigne['idC']);
            $unEtudiant = new Etudiant($uneLigne['nom'], $uneLigne['prenom'], $uneClasse,$uneLigne['idC']);
//            echo "un objet Etudiant créé <br/>";
//            var_dump($unEtudiant);
            
            $tabEtudiants[]=$unEtudiant;
//            echo "un objet Etudiant ajouté à tabEtudiants <br/>";
//             var_dump($tabEtudiants);
        }
        return $tabEtudiants;
    }
    
    public function getLesApportsDesEtudiants() {
        $sql = "SELECT Etudiant.*, Classe.libelle as libelleC, Apport.idA, description, nbParts,Apport.idT, TypeApport.libelle as libelleT FROM Etudiant INNER JOIN Classe ON Etudiant.idC = Classe.idC "
                . "INNER JOIN Faire ON Etudiant.idE = FAIRE.idE "
                . "INNER JOIN Apport ON FAIRE.idA = APPORT.idA "
                . "INNER JOIN TypeApport ON Apport.idT = TYPEAPPORT.idT "
                . "ORDER BY Classe.libelle, nom, prenom, TypeApport.libelle;";
//       echo "<br/> sql = ".$sql."<br/>";
        
        $resultat = $this->query($sql);
        $lesLignes = $resultat->fetchall();
//        var_dump($lesLignes);
        
        // Transformation d'un tableau associatif lié à la structure de la table d'origine
        // en un tableau d'objets métiers de la classe Etudiant
        
        $tabEtudiants = array();
//        echo "tabEtudiants créé <br/>";
        $idEtudiantCourant = "";
        $unEtudiant = "";
        foreach ($lesLignes as $uneLigne){
//            echo "<br/>Pour l'instant, idEtudiantCourant vaut '".$idEtudiantCourant."'";
            
            if ($idEtudiantCourant !=$uneLigne['idE']){ // c'est le premier tour de boucle ou changement d'étudiant
                if ($unEtudiant){
                    $tabEtudiants[]=$unEtudiant;
                }
//             echo "un objet Etudiant ajouté à tabEtudiants <br/>";
                
//                echo "<br/>Nouvel étudiant rencontré ";
                $uneClasse = new Classe($uneLigne['libelleC'],$uneLigne['idC']);
//                var_dump($uneClasse);
                
                $unTypeApport = new TypeApport($uneLigne['libelleT'],$uneLigne['idT']);
//               var_dump($unTypeApport);
                
                $unApport = new Apport($uneLigne['description'],$uneLigne['nbParts'],$unTypeApport,$uneLigne['idT']);
//                var_dump($unApport);
                
                $sesApports = array($unApport);
//                var_dump($sesApports);
                
                $unEtudiant = new Etudiant($uneLigne['nom'], $uneLigne['prenom'], $uneClasse, $uneLigne['idE']);   
                
                $unEtudiant->setSesApports($sesApports);
                
                $idEtudiantCourant =$uneLigne['idE'];
            }
            else //ligne concerne le même étudiant 
            {
//                echo " Même étudiant que pour l'enregistrement précédent ";
                $unTypeApport = new TypeApport($uneLigne['libelleT'],$uneLigne['idT']);
//                var_dump($unTypeApport);
                
                $unApport = new Apport($uneLigne['description'],$uneLigne['nbParts'],$unTypeApport,$uneLigne['idT']);
//                var_dump($unApport);

                $unEtudiant->ajouterApport($unApport);
            }
//            echo '<br/> nouvelle ligne de la base de données traitée';
//            var_dump($unEtudiant);
        }
        $tabEtudiants[]=$unEtudiant;  //ajout du dernier étudiant
//        echo "un objet Etudiant ajouté à tabEtudiants <br/>";
        return $tabEtudiants;
    }
}

