<?php
	require_once '../model/Usuario.php';
	require_once '../model/conexao/conecta.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$usuario = new Usuario();
		$usuario->inativarUsuario($_GET['usuario']);
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>
