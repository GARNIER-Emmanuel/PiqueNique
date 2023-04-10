<article id="listeApports">
        <h1><img src="images/ico_epingle.png" alt="Intégration" class="ico_categorie" />Apports enregistrés par les étudiants du BTS SIO</h1>
        <table>
            <tr>
                <th class="nomClasseApport"> Classe </th><th class="nomEtudiantApport"> Nom   </th><th class="prenomEtudiantApport"><th class="apport"> Description et nombre de parts</th>
                
            </tr>
            
            
             <?php
            //echo "on est dans la vue : ";
            //var_dump($lesEtudiantsEtLeursApports);
            foreach ($lesEtudiantsEtLeursApports as $unApport) { 
            ?>        
            <tr>
                <td> <?php echo $unApport->getSaClasse()->getLibelle(); ?></td>
                <td> <?php echo $unApport->getNom(); ?>   </td>
                <td> <?php echo $unApport->getPrenom(); ?> </td>
                <td> 
                    <?php foreach ($unApport->getSesApports() as $unApport){
                            echo $unApport->getDescription()." : ".$unApport->getNbParts()." personne.s <br/>"; 
                          }
                    ?> 
                </td>
            </tr>
            <?php
            }
             
            ?>
           
            
        </table>
    </article>

    <aside>
        <h1>Idée de Toto</h1>
        <img src="images/bulle.png" alt="" id="fleche_bulle" />
        <p id="photo_toto"><img src="images/toto_photo.png" alt="Avatar de l'auteur Toto" /></p>
        <p> C'est peut-être plus pratique de les visualiser <a href="index.php?controleur=apports&action=consulterApportsParType"> par type ... </a></p>
        <br/>
        <p><img src="images/facebook.png" alt="Facebook" /><img src="images/twitter.png" alt="Twitter" /><img src="images/vimeo.png" alt="Vimeo" /><img src="images/flickr.png" alt="Flickr" /><img src="images/rss.png" alt="RSS" /></p>
    </aside>

