<?php
	session_start();
	//Parâmetros de conexão
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "samp";
	// Cria a conexão
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check a conexão
	if ($conn->connect_error) {
		die("Falha na conexão: " . $conn->connect_error);
	}
?>