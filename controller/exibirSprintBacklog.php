<?php
	session_start();

	require_once '../model/projetoDAO.php';
	require_once '../model/sprintBacklogDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		require '../libs/Smarty.class.php';
		$smarty = new Smarty;
		
		$idProjeto = $_GET["id"];

		$projetoDAO = new projetoDAO();
		$projeto = $projetoDAO->selecionarProjeto($idProjeto);

		$sprintBacklogDAO = new sprintBacklogDAO();
		$sprintBacklog = $sprintBacklogDAO->selecionarSprintBacklog($idProjeto);
	
		$smarty->assign("projeto", $projeto);
		$smarty->assign("sprintBacklog", $sprintBacklog);
		$smarty->display('../view/exibirSprintBacklog.html');

	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>