<?php
//include 'Apport.php';
include 'ApportDAO.php';

$unObjType = new TypeApport("libelle","6");

echo "Message avant la création d'un objet de la classe DAO nommée ApportDAO ";
$lApportDAO= new ApportDAO();
echo "<br/>un objet de la classe ApportDAO a été créé";

echo "<br/> <br/> Message avant la création d'un objet de la classe métier nommée Apport ";
$unApport = new Apport("Curry",1,$unObjType);
echo "<br/>un objet de la classe Apport a été créé";

$result = $lApportDAO->ajouter($unApport);

if ($result==false) { 
    echo "<br/> erreur dans l'insertion";
}
else {
    echo "<br/> le nouvel apport a été ajouté dans la base de données";
}

echo "<br/> appel de la méthode getLesApports";
$lesApports = $lApportDAO->getLesApports();
var_dump($lesApports);