<?php

//connexion à la BdD
$pdo = new pdo('mysql:dbname=groupeS;host=localhost', 'groupeS','bie5Ooqu');

//attribut de PDO : si erreur PDO renvoie erreur
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//attribut pour récupérer information sous forme d'objet
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>