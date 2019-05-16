<?php
	session_start();

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		require '../libs/Smarty.class.php';
		$smarty = new Smarty;
		
		$idProjeto = $_GET["id"];

		$sprintBacklogDAO = new sprintBacklogDAO();
		$sprintBacklog = $sprintBacklogDAO->selecionarSprintBacklog($idProjeto);
	
		$smarty->assign("sprintBacklog", $sprintBacklog);
		$smarty->display('../view/exibirSprintBacklog.html');

	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>