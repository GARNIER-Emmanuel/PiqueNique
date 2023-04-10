    <article id="listeApports">
        <h1><img src="images/ico_epingle.png" alt="Intégration" class="ico_categorie" />Liste des Apports classés par types</h1>
        
        <table>
            <tr>
                <th class="nomClasse"> Type </th><th class="nomEtudiant"> Description et nombre de parts   </th>
            </tr>
            <tr>
            
             <?php
            //echo "on est dans la vue : ";
            //var_dump($lesApports);
             $typeCourant="";
             $debut= true;
            
            foreach ($lesApports as $unApport) { 
                if ($debut)  {
                    ?>                
                     <td> <?php echo $unApport->getSonTypeApport()->getLibelle(); ?></td>
                     <td> <?php echo $unApport->getDescription(). " - ".$unApport->getNbParts();
                    $debut=false;
                    
                }
                elseif ($typeCourant!=$unApport->getSonTypeApport()->getLibelle()) { 
            ?>
                     </td></tr>
                    <tr> 
                     <td> <?php echo $unApport->getSonTypeApport()->getLibelle(); ?></td>
                     <td> <?php echo $unApport->getDescription(). " - ".$unApport->getNbParts();  
                }
                else {
                      echo "<br/>".$unApport->getDescription(). " - ".$unApport->getNbParts();                   
                
                }
                $typeCourant=$unApport->getSonTypeApport()->getLibelle();
            }
            ?>
           
            </td></tr>   
        </table>
    </article>

    <aside>
        <h1>Conseil de Toto</h1>
        <img src="images/bulle.png" alt="" id="fleche_bulle" />
        <p id="photo_toto"><img src="images/toto_photo.png" alt="Avatar de l'auteur Toto" /></p>
        <p> Analysez bien le code fourni car vous devrez réaliser la suite ....</p>
  
        <p><img src="images/facebook.png" alt="Facebook" /><img src="images/twitter.png" alt="Twitter" /><img src="images/vimeo.png" alt="Vimeo" /><img src="images/flickr.png" alt="Flickr" /><img src="images/rss.png" alt="RSS" /></p>
    </aside>

