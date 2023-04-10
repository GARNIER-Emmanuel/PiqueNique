<?php
include ('Apport.php');

// test constructeur
echo "<br/>Création d'un Type Apport :";

$unTypeApport = new TypeApport("1-Entrée","1");

var_dump($unTypeApport);  

// test des accesseurs en écriture
echo "<br/>Modification appliquées sur le premier Type Apport créé : <br/>";
echo " id <- 2 <br/>"; $unTypeApport->setId(2);
echo " Libelle <- 2-Plat <br/> "; $unTypeApport->setLibelle("2-Plat");

// test des accesseurs en lecture
echo "<br/>Affichage des informations du premier Type Apport ainsi modifié : <br/>";
echo " id: ".$unTypeApport->getId()."<br/>";
echo " description: ".$unTypeApport->getLibelle()."<br/>";


echo "<br/>Création d'un second Type Apport et son numéro de type  :";
$unAutreTypeApport = new TypeApport("3-Dessert","3");

var_dump($unAutreTypeApport); 

// test affichage de ses attributs
echo "<br/>Affichage des infos du second Type Apport :";
echo $unAutreTypeApport->toString();

//===================================================================================================

echo "<br/>Avec les Apports  :<br/>";

$unObjApport1 = new Apport('Fourchettes','4');
$unObjApport2 = new Apport('Couteaux','4');
$unObjApport3 = new Apport('Cuillières','4');

$listeApports = array($unObjApport1,$unObjApport2,$unObjApport3);

var_dump($listeApports);

$unTroisiemeType = new TypeApport("4-Couverts","4");

$unTroisiemeType->setSesApports($listeApports);

echo $unTroisiemeType->toString();