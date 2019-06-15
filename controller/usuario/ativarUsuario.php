<?php
	session_start();
	
	require_once '../../model/usuario/usuarioDAO.php';

	$usuarioDAO = new usuarioDAO();

	$usuarioDAO->ativarUsuario($_GET['usuario']);
?>