<?php
include ('Apport.php');

// test constructeur
echo "<br/>Création d'un apport :";

$unApport = new Apport("Crêpes","24");

// ===================================================================
var_dump($unApport);  // affiche le contenu d'un objet pour débogage
//die(); // permet d'arrêter l'exécution sans avoir à commenter le reste du code
// ====================================================================

// test des accesseurs en écriture
echo "<br/>Modification appliquées sur le premier Apport créé : <br/>";
echo " id <- 3 <br/>"; $unApport->setId(3);
echo " description <- Pizza au chèvre <br/> "; $unApport->setDescription("Pizza au chèvre");
echo " nombre de parts <- 8 <br/>"; $unApport->setNbParts("8");

// test des accesseurs en lecture
echo "<br/>Affichage des informations du premier Apport ainsi modifié : <br/>";
echo " id: ".$unApport->getId()."<br/>";
echo " description: ".$unApport->getDescription()."<br/>";
echo " nombre de parts: ".$unApport->getNbParts()."<br/><br/>";


echo "<br/>Création d'un second Apport et son numéro d'Apport  :";
$unAutreApport = new Apport("Taboulé","6",null,2);

// ===================================================================
var_dump($unAutreApport);  // affiche le contenu d'un objet pour débogage
//die(); // permet d'arrêter l'exécution sans avoir à commenter le reste du code
// ====================================================================

// test affichage de ses attributs
echo "<br/>Affichage des infos du second apport :";
echo $unAutreApport->toString();


//===================================================================================================

echo "<br/>Avec le Type d'apport :";

$unObjetType = new TypeApport("PLAT","2");

echo "<br/>Création d'un second apport et son numéro d'apport  :<br/>";
$unTroisiemeApport = new Apport("Lazagnes","8",$unObjetType);

echo $unTroisiemeApport->toString();