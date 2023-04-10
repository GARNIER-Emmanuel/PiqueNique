    <article id="listeEtudiants">
        <h1><img src="images/ico_epingle.png" alt="Intégration" class="ico_categorie" />Liste des étudiants du BTS SIO</h1>
        
        <table>
            <tr>
                <th class="nomClasse"> Classe </th><th class="nomEtudiant"> Nom-Prénom   </th>
            </tr>
            <tr>
            
             <?php
            //echo "on est dans la vue : ";
            //var_dump($lesEtudiants);
             $classeCourante="";
             $debut= true;
            
            foreach ($lesEtudiants as $unEtudiant) { 
                if ($debut)  {
                    ?>                
                     <td> <?php echo $unEtudiant->getSaClasse()->getLibelle(); ?></td>
                     <td> <?php echo $unEtudiant->getNom(). " ".$unEtudiant->getPrenom();                   
                
                    $debut=false;
                    
                }
                elseif ($classeCourante!=$unEtudiant->getSaClasse()->getLibelle()) { 
            ?>
                     </td></tr>
                    <tr> 
                     <td> <?php echo $unEtudiant->getSaClasse()->getLibelle(); ?></td>
                     <td> <?php echo $unEtudiant->getNom(). " ".$unEtudiant->getPrenom();                   
  
                }
                else {
                      echo "<br/>".$unEtudiant->getNom(). " ".$unEtudiant->getPrenom();                   
                
                }
                $classeCourante=$unEtudiant->getSaClasse()->getLibelle();
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

