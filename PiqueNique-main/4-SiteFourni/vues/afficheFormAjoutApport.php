<article id="AjoutApport">
        <h1><img src="images/ico_epingle.png" alt="Intégration" class="ico_categorie" />Enregistrement d'un nouvel apport</h1>
        <form action='index.php?controleur=apports&action=enregistrer' method='POST'>        
            <table>
            <tr><th>Description </th>         <td> <input type='text' name='description'/> </td>
            </tr>
            <tr> <th>Nombre de parts </th>      <td> <input type='number' name='nbParts'/> </td>
            </tr>
            <tr> <th>Type(1-Entrée,2-Plat,3-Dessert,4-Boisson)</th>  <td><input type='number' name='idT'/> </td>
            </tr>
            <tr> <th></th><td class='droite'> <input type='submit' value='Ajouter'/></td>         
            </tr>
            
        </table>
        </form>
    </article>

    <aside>
        <h1>Conseil de Toto</h1>
        <img src="images/bulle.png" alt="" id="fleche_bulle" />
        <p id="photo_toto"><img src="images/toto_photo.png" alt="Avatar de l'auteur Toto" /></p>
        <p> BONJOUR JE SUIS TOTO LE BOSS DES SIO</p>
  
        <p><img src="images/facebook.png" alt="Facebook" /><img src="images/twitter.png" alt="Twitter" /><img src="images/vimeo.png" alt="Vimeo" /><img src="images/flickr.png" alt="Flickr" /><img src="images/rss.png" alt="RSS" /></p>
    </aside>

