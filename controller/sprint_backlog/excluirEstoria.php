<?php
    session_start();
	require_once '../../model/sprint_backlog/sprintBacklogDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$sprintBacklogDAO = new sprintBacklogDAO();
		$sprintBacklogDAO->excluirEstoria($_GET['idEstoria'],$_GET['idProjeto']);
	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>

