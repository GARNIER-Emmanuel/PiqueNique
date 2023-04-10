<?php
//include 'Etudiant.php';
include 'EtudiantDAO.php';
include 'Apport.php';

/*
$unObjClasse = new Classe("SIO2","2");
*/
echo "Message avant la création d'un objet de la classe DAO nommée EtudiantDAO ";
$lEtudiantDAO= new EtudiantDAO();
echo "<br/>un objet de la classe EtudiantDAO a été créé";
/*
echo "<br/> <br/> Message avant la création d'un objet de la classe métier nommée Etudiant ";
$unEtudiant = new Etudiant("DASTARAC","Louis",$unObjClasse);
echo "<br/>un objet de la classe Etudiant a été créé";

$result = $lEtudiantDAO->ajouter($unEtudiant);

if ($result==false) { 
    echo "<br/> erreur dans l'insertion";
}
else {
    echo "<br/> le nouvel étudiant a été ajouté dans la base de données";
}


echo "<br/> appel de la méthode getLesEtudiants";
$lesEtudiants = $lEtudiantDAO->getLesEtudiants();
var_dump($lesEtudiants);

*/
echo "<br/> appel de la méthode getLesApportsDesEtudiants";
$lesApportsEtudiants = $lEtudiantDAO->getLesApportsDesEtudiants();
var_dump($lesApportsEtudiants);
