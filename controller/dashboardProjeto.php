<?php
	session_start();
	require_once '../model/projetoDAO.php';
	require_once '../model/productBacklogDAO.php';
	require_once '../model/sprintBacklogDAO.php';
	require_once '../model/meuTrabalhoDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		require '../libs/Smarty.class.php';
		$smarty = new Smarty;

		$idProjeto = $_GET["id"];

		$projetoDAO = new projetoDAO();
		$projeto = $projetoDAO->selecionarProjeto($idProjeto);
	
		$productBacklogDAO = new productBacklogDAO();
		$productBacklog = $productBacklogDAO->selecionarProductBacklog($idProjeto);

		$sprintBacklogDAO = new sprintBacklogDAO();
		$sprintBacklog = $sprintBacklogDAO->selecionarSprintBacklog($idProjeto);

		$meuTrabalhoDAO = new meuTrabalhoDAO();
		$meuTrabalho = $meuTrabalhoDAO->selecionarMeuTrabalho($idProjeto);
		
		$smarty->assign("projeto", $projeto);
		$smarty->assign("productBacklog", $productBacklog);
		$smarty->assign("sprintBacklog", $sprintBacklog);
		$smarty->assign("meuTrabalho", $meuTrabalho);

		$smarty->display('../view/dashboardProjeto.html');

	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>