<?php
	session_start();

	require_once '../model/projetoDAO.php';
	require_once '../model/sprintBacklogDAO.php';
	require_once '../model/estoriaDAO.php';
	require_once '../controller/visualizarResponsaveis.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		require '../libs/Smarty.class.php';
		$smarty = new Smarty;
		
		$idProjeto = $_GET["id"];
		$idEstoria = $_GET["idEstoria"];

		$projetoDAO = new projetoDAO();
		$projeto = $projetoDAO->selecionarProjeto($idProjeto);

		$sprintBacklogDAO = new sprintBacklogDAO();
		$sprintBacklog = $sprintBacklogDAO->selecionarSprintBacklog($idProjeto);

		$responsaveis = new visualizarResponsaveis();
		$responsaveis = $responsaveis->visualizarResponsaveis($idEstoria);
	
		$smarty->assign("projeto", $projeto);
		$smarty->assign("sprintBacklog", $sprintBacklog);
		$smarty->assign("responsaveis", $responsaveis);
		$smarty->display('../view/exibirSprintBacklog.html');

	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>