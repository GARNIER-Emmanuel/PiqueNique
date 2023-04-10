<?php
include ('Etudiant.php');

// test constructeur
echo "<br/>Création d'un étudiant :";

$unEtudiant = new Etudiant("COVER","Harry");

var_dump($unEtudiant);  

// test des accesseurs en écriture
echo "<br/>Modification appliquées sur le premier étudiant créé : <br/>";
echo " id <- 8 <br/>"; $unEtudiant->setId(8);
echo " nom <- TOUILLE <br/> "; $unEtudiant->setNom("TOUILLE");
echo " prenom <- Sacha <br/>"; $unEtudiant->setPrenom("Sacha");

// test des accesseurs en lecture
echo "<br/>Affichage des informations du premier étudiant ainsi modifié : <br/>";
echo " id: ".$unEtudiant->getId()."<br/>";
echo " nom: ".$unEtudiant->getNom()."<br/>";
echo " prenom: ".$unEtudiant->getPrenom()."<br/><br/>";

echo "<br/>Création d'un second étudiant et son numéro d'étudiant  :";
$unAutreEtudiant = new Etudiant("TINE","Clément",null,1);

var_dump($unAutreEtudiant);  

// test affichage de ses attributs
echo "<br/>Affichage des infos du second étudiant :";
echo $unAutreEtudiant->toString();

//===================================================================================================

echo "<br/>Avec une classe  :";

$unObjClasse = new Classe("SIO1","1");

echo "<br/>Création d'un second étudiant et son numéro d'étudiant  :";
$unTroisiemeEtudiant = new Etudiant("BLETON","Lorie",$unObjClasse);

var_dump($unTroisiemeEtudiant);  