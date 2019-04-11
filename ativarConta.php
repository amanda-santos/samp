<?php
	require_once 'Usuario.php';

	$usuario = new Usuario();

	$usuario->ativarUsuario($_GET['usuario'], $conn);
?>