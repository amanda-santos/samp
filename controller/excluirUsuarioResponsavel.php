<?php
    session_start();
	require_once '../model/estoriaDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$estoriaDAO = new estoriaDAO();
		$estoriaDAO->excluirUsuarioResponsavel($_GET['idProjeto'], $_GET['usuario'], $_GET['idEstoria']);
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>

