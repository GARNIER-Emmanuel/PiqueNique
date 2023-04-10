<?php
//echo "passage dans contrôleur gestionApports.php";

// var_dump($lApportDAO);

// echo "l'objet ApportDAO a été créé.";

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
else {
    $action= "consulter";
    //echo "if .... => action = consulter";
    }   


switch ($action){
    case 'consulter'  : // echo "case...=> action consulter";
                        $lesApports = $lApportDAO->getLesApports();
                        include("vues/afficheApports.php"); break;

    case 'consulterApportsParEtudiant'  : $lesEtudiantsEtLeursApports = $lEtudiantDAO->getLesApportsDesEtudiants();
										 include("vues/afficheApportsParEtudiant.php"); break;
                    
    case 'ajouter'    : include("vues/afficheFormAjoutApport.php"); break;

    case 'enregistrer': $description=filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $nbParts=filter_var($_POST['nbParts'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $idT=filter_var($_POST['idT'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//                        echo ($description. " ". $nbParts . " ". $idT );
                        if ($idT ==1) {
                            $leType = new TypeApport("1-Entrée",1);
                        
                        }
                        elseif ($idT ==2) {
                            $leType = new TypeApport("2-Plat",2);
                        
                        }
                        elseif ($idT ==3) {
                            $leType = new TypeApport("3-Dessert",3);
                        
                        }
                        elseif ($idT ==4) {
                            $leType = new TypeApport("4-Boisson",4);
                        }
                        else {
                            $leType = new TypeApport("1-Entrée",1);
                        }
                        
                        $nvApport = new Apport($description,$nbParts,$leType);
                        
                        $result = $lApportDAO->ajouter($nvApport);
                        
                        if (!$result) {
//                           echo "ajout nok";
                            $message = "L'apport n'a pas été ajouté.";
                            $statut = "erreur";                       
                        }
                        else {
                            // echo "ajout ok";
                            $message = "L'apport a bien été ajouté.";
                            $statut = "confirmation";
                        }
                        include("vues/afficheMessage.php"); break;

}

