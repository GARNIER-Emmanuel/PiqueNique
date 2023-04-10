<?php
//include 'Classe.php';
include 'ClasseDAO.php';

echo "Message avant la création d'un objet de la classe DAO nommée ClasseDAO ";
$laClasseDAO= new ClasseDAO();
echo "<br/>un objet de la classe ClasseDAO a été créé";

echo "<br/> <br/> Message avant la création d'un objet de la classe métier nommée Classe ";
$uneClasse = new Classe("SIO6");
echo "<br/>un objet de la classe Classe a été créé";

$result = $laClasseDAO->ajouter($uneClasse);

if ($result==false) { 
    echo "<br/> erreur dans l'insertion";
}
else {
    echo "<br/> la nouvelle Classe a été ajoutée dans la base de données";
}

echo "<br/> appel de la méthode getLesClasses";
$lesClasses = $laClasseDAO->getLesClasses();
var_dump($lesClasses);