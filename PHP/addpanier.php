<?php
require "_header-panier.php";
?>
<?php
if(isset($_GET['ID_obj'])){
	//on récupère la donnée envoyée et on passe par query et pas directement select[...] pour éviter les erreurs si l'information reçu est erronée volontairement 
	$produit = $DB->query('SELECT ID_obj FROM objet WHERE ID_obj=:id',array('id'=>$_GET['ID_obj']));
	if(empty($produit)){
		die("Ce produit n'existe pas");
	}
	//ajout de produit dans le panier
	if(isset($_SESSION['auth'])){
		$panier->add($produit[0]->ID_obj);
		$retour = utf8_encode("Le produit a bien �t� ajout� au panier. <a href='javascript:history.back()'>Retourner</a>");
		die($retour);
	}else{
		die("Inscrivez-vous pour profiter pleinement des offres. <a href='javascript:history.back()'>Retourner</a>");
	}
}else{
	die("Erreur");
}
?>