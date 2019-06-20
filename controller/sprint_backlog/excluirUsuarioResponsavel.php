<?php
    session_start();
	require_once '../../model/sprint_backlog/sprintBacklogDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$sprintBacklogDAO = new sprintBacklogDAO();
		$sprintBacklogDAO->excluirUsuarioResponsavel($_GET['idProjeto'], $_GET['usuario'], $_GET['idEstoria']);
	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>

