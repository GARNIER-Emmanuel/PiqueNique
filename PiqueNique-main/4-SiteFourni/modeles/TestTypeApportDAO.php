<?php
//include 'TypeApport.php';
include 'TypeApportDAO.php';

echo "Message avant la création d'un objet de la classe DAO nommée TypeApportDAO ";
$leTypeApportDAO= new TypeApportDAO();
echo "<br/>un objet de la classe TypeApportDAO a été créé";

echo "<br/> <br/> Message avant la création d'un objet de la classe métier nommée TypeApport ";
$unTypeApport = new TypeApport("7-Fruits");
echo "<br/>un objet de la classe TypeApport a été créé";

$result = $leTypeApportDAO->ajouter($unTypeApport);

if ($result==false) { 
    echo "<br/> erreur dans l'insertion";
}
else {
    echo "<br/> le nouveau type d'apport a été ajoutée dans la base de données";
}

echo "<br/> appel de la méthode getLesTypes";
$lesTypes = $leTypeApportDAO->getLesTypes();
var_dump($lesTypes);