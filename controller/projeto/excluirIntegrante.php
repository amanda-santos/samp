<?php
    session_start();
	require_once '../../model/projeto/projetoDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$projetoDAO = new projetoDAO();
		$projetoDAO->excluirIntegrante($_GET['idProjeto'], $_GET['usuario']);
	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>
