<?php

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
		$_SESSION['id'] = $userid;
		$_SESSION['username'] = $username;
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
?>