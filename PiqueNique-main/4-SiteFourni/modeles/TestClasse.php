<?php
//include ('Classe.php');
include ('Etudiant.php');

// test constructeur
echo "<br/>Création d'une Classe :";

$uneClasse = new Classe("SIO1","1");

var_dump($uneClasse);  

// test des accesseurs en écriture
echo "<br/>Modification appliquées sur la premiere Classe créé : <br/>";
echo " id <- 2 <br/>"; $uneClasse->setId(2);
echo " Libelle <- SIO2 <br/> "; $uneClasse->setLibelle("SIO2");

// test des accesseurs en lecture
echo "<br/>Affichage des informations de la premiere Classe ainsi modifié : <br/>";
echo " id: ".$uneClasse->getId()."<br/>";
echo " description: ".$uneClasse->getLibelle()."<br/>";


echo "<br/>Création d'un second Apport et son numéro de Classe  :";
$uneAutreClasse = new Classe("T11","4");

var_dump($uneAutreClasse);  

// test affichage de ses attributs
echo "<br/>Affichage des infos de la seconde Classe :";
echo $uneAutreClasse->toString();


//===================================================================================================

echo "<br/>Avec les étudiants  :";

$unObjEtudiant1 = new Etudiant('RENOULLEAU','Willem');
$unObjEtudiant2 = new Etudiant('MARLATS','Iban');
$unObjEtudiant3 = new Etudiant('DASTARAC','Louis');

$listeEtudiants = array($unObjEtudiant1,$unObjEtudiant2,$unObjEtudiant3);

var_dump($listeEtudiants);

$uneTroisiemeClasse = new Classe("SIO3");

$uneTroisiemeClasse->setSesEtudiants($listeEtudiants);

echo $uneTroisiemeClasse->toString();