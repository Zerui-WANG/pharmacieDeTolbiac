<?php
class panier{
	//envoyer la bd au panier lorsqu'on l'initialise 
	private $DB;
	//verif de l'existence du panier, sinon on le créer
	public function __construct($DB){
		if(!isset($_SESSION)){
			session_start();
		}
		
		if(!isset($_SESSION['panier'])){
			//initiation du panier
			$_SESSION['panier']=array();
		}
		$this->DB = $DB;
		
		if(isset($_POST['panier']['quantity'])){
			$this->recalc();
		}
	}
	//modification de quantité de produits
	public function recalc(){
		$_SESSION['panier'] = $_POST['panier']['quantity'];
	}
	
	//fonction d'ajout de produit dans le panier
	public function add($id_produit){
		if(isset($_SESSION['panier'][$id_produit])){
			$_SESSION['panier'][$id_produit]++;
		}else{
			$_SESSION['panier'][$id_produit] = 1;
		}
	}
	
	//fonction de suppression des produits dans le panier
	public function del($id_produit){
		unset($_SESSION['panier'][$id_produit]);
	}
	
	//fonction total
	public function total(){
		$total = 0;
		$ids = array_keys($_SESSION['panier']);
		if(empty($ids)){
			$produits = array();
		}else{
			//les ID et prix des produits avec les ID_obj de $ids
			$produits = $this->DB->query('SELECT ID_obj, prix_obj FROM objet WHERE ID_obj IN ('.implode(',',$ids).')');
		}
		foreach($produits as $produit){
			$total += ($produit->prix_obj)*($_SESSION['panier'][$produit->ID_obj]);
		}
		return $total;
	}
}
?>