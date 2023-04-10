<?php
//echo "passage dans contrôleur gestionEtudiants.php";

// var_dump($lEtudiantDAO);

// echo "l'objet EtudiantDAO a été créé.";

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
else {
    $action= "consulter";
    //echo "if .... => action = consulter";
    }   


switch ($action){
    case 'consulter'  : // echo "case...=> action consulter";
                        $lesEtudiants = $lEtudiantDAO->getLesEtudiants();
                        include("vues/afficheEtudiants.php"); break;

    case 'consulterApportsParEtudiant'  : $lesEtudiantsEtLeursApports = $lEtudiantDAO->getLesApportsDesEtudiants();
										 include("vues/afficheApportsParEtudiant.php"); break;
                    
    case 'ajouter'    : include("vues/afficheFormAjoutEtudiant.php"); break;

    case 'enregistrer': $nom=filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $prenom=filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $idClasse=filter_var($_POST['idC'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//                        echo ($nom. " ". $prenom . " ". $idC );
                        
                        if ($idClasse ==1) {
                            $laClasse = new Classe("SIO1",1);
                        
                        }
                        else {
                            $laClasse = new Classe("SIO2",2);
                        }
                        
                        $nvEtudiant = new Etudiant($nom,$prenom,$laClasse);
                        
                        $result = $lEtudiantDAO->ajouter($nvEtudiant);
                        
                        if (!$result) {
//                           echo "ajout nok";
                            $message = "L'étudiant n'a pas été ajouté.";
                            $statut = "erreur";                       
                        }
                        else {
                            // echo "ajout ok";
                            $message = "L'étudiant a bien été ajouté.";
                            $statut = "confirmation";
                        }
                        include("vues/afficheMessage.php"); break;
                        
    case 'modifier':    include("vues/afficheFormModifEtudiant.php"); break;
    
    case 'enregistrermodif':    $nom=filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                $prenom=filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                $idClasse=filter_var($_POST['idC'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//                                echo ($nom. " ". $prenom . " ". $idC );
                                    
                                if ($idClasse ==1) {
                                    $laClasse = new Classe("SIO1",1);
                                        
                                }
                                else {
                                    $laClasse = new Classe("SIO2",2);
                                }
                                    
                                $nvEtudiant = new Etudiant($nom,$prenom,$laClasse);
                                    
                                $result = $lEtudiantDAO->ajouter($nvEtudiant);
                        
                                if (!$result) {
//                                   echo "ajout nok";
                                    $message = "L'étudiant n'a pas été ajouté.";
                                    $statut = "erreur";                       
                                }
                                else {
                                    // echo "ajout ok";
                                    $message = "L'étudiant a bien été ajouté.";
                                    $statut = "confirmation";
                                }
                                include("vues/afficheMessage.php"); break;
}

