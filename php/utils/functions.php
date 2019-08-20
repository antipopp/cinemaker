<?php
	require_once __DIR__.'/../../config.php';
    function PathToUrl($path)
    {
        $force_fwd_slash = str_replace("\\", "/", $path);
        $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $force_fwd_slash);
        return $path;
    }

    function isLogged()
    {		
		if(isset($_SESSION['id']))
			return $_SESSION['id'];
		else
			return false;
    }

    function setSession($username, $userid){
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $userid;
    }
    
    //Ad ogni item dei filtri viene associato un nome, tipo(necessario per il bind_param sulla prepared statement), il valore del filtro e l'operatore della query assocciato.
	class filter_value {
		public $name;
		public $type;
		public $value;
		public $operator;

		function __construct($name, $type, $value, $operator) {
			$this->name		= $name;
			$this->type 	= $type;
			$this->value 	= $value;
			$this->operator = $operator;
		}
	}

	//La funzione bool mysqli_stmt::bind_result ( mixed &$var1 [, mixed &$... ] ) necessita di parametri riferimento
	function ref_values($arr){
		$refs = array();
		foreach($arr as $key => $value) 
			$refs[$key] = &$arr[$key];
		return $refs;
	}

	function upload_file() {
		// per prima cosa verifico che il file sia stato effettivamente caricato
		if (!isset($_FILES['file']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
			echo 'Non hai inviato nessun file...';
			exit;    
		}
	
		global $uploaddir, $cineDb;
		$size = $_FILES['file']['size'];
		$type = $_FILES['file']['type'];
		$tmp_name = $_FILES['file']['tmp_name'];
	
	
		//Recupero il percorso temporaneo del file
		$userfile_tmp = $_FILES['file']['tmp_name'];
	
		//recupero il nome originale del file caricato
		$userfile_name = $_FILES['file']['name'];
		
		// $target_file = $uploaddir . $userfile_name;

		$location = $uploaddir . uniqid() . basename($_FILES["file"]["name"]);

		//copio il file dalla sua posizione temporanea alla mia cartella upload
		if (move_uploaded_file($userfile_tmp, ROOT.$location)) {
		
			$uid_img = uniqid("img_");	
		
			$query = "INSERT INTO `upload` (uidimg, name, size, type, location) VALUES (?, ?, ?, ?, ?)";
		
			$params = array($uid_img, $userfile_name, $size, $type, $location);
			$result = $cineDb->performQueryWithParameters($query, "ssiss", $params);
			
			
		
			//Se l'operazione è andata a buon fine...
			return $uid_img;
		}else{
			//Se l'operazione è fallta...
			return null;
		}		
	}
?>