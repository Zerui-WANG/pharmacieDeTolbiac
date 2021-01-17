<?php
class DB {
	//données pour la connexion à la BD
	private $host="localhost";
	private $user="groupeS";
	private $password="bie5Ooqu";
	private $database="groupeS";
	private $db;

	//construction de connexion aux bd
	public function __construct($host=null, $user=null, $password=null, $database=null){
		//si non connecté
		if($host != null){
			$this->host = $host;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
		}
		try{
			//connexion à la BD
			$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->password, 
				array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
				));
			//permet l'existence des caractères spéciaux
			//signale les erreurs
		}catch(PDOException $e){
			//verif connexion
			die("Echec lors de la connexion");
		}
	}

	//recupération des données de la db
	public function query($sql, $data = array()){
		$req=$this->db->prepare($sql);
		$req->execute($data);
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function emptyquery($sql, $data = array()){
		$req=$this->db->prepare($sql);
		$req->execute($data);
	}
}
?>