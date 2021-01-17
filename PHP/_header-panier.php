<?php
//accéder à la bd
require 'db.class.php';
//ouvrir une session
require 'panier.class.php';
$DB = new DB();
//initialise le panier on lui envoyant la bd
$panier = new panier($DB);
?>