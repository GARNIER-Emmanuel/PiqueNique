<!DOCTYPE html>
<?php
    include ('modeles/BaseDAO.php');
    include ('modeles/EtudiantDAO.php');
    include ('modeles/ApportDAO.php');
    include ('modeles/Apport.php');
    include ('modeles/Etudiant.php');
    include ('modeles/Classe.php');
    include ('modeles/TypeApport.php');

 //   $lApportDAO = new ApportDAO();
    $lEtudiantDAO = new EtudiantDAO();
    $lApportDAO = new ApportDAO();

?>

<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="style.css" />
        <title>BTS SIO - Journée d'intégration</title>
    </head>
    
    <body>
        <div id="bloc_page">
            <div id='enteteDePage'>
                <!-- Contient le logo, le titre, le menu et la banniere -->
                <?php include("enteteDePage.php"); ?>
            </div>
            <section>
                <!-- contenu alimenté par le controleur selon l'action demandée par l'utilisateur -->
                <?php  
                //récupérer les données après nettoyage
                if (isset($_GET['controleur']))
                    $controleur=filter_var($_GET['controleur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                else
                    $controleur= "accueil";
                
                


                
                switch ($controleur){
                    case 'accueil'      : include("accueil.html"); break;
                    case 'etudiants'    : include("controleurs/gestionEtudiants.php"); break;
                    case 'apports'      : include("controleurs/gestionApports.php"); break;
                }
              
                
                ?>
            </section>
            
            <footer>
                <?php include("piedDePage.html"); ?>
            </footer>
        </div>
    </body>
</html>
