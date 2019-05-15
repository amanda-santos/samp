<?php
    session_start();
	require_once '../model/usuarioDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$usuarioDAO = new usuarioDAO();
		$usuarioDAO->inativarUsuario($_GET['usuario']);
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>
