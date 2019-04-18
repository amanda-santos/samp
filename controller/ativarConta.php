<?php
	require_once '../model/Usuario.php';

	$usuario = new Usuario();

	$usuario->ativarUsuario($_GET['usuario']);
?>