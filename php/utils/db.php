<?php
	
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cinemaker";
	$db = new mysqli($server, $username, $password, $dbname);
	if ($db->connect_error) {
		die("Errore di connessione: " . $con->connect_error);
	};
?>