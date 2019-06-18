<?php
	session_start();
	require_once '../../model/projeto/projetoDAO.php';
	require_once '../../model/product_backlog/productBacklogDAO.php';
	require_once '../../model/sprint_backlog/sprintBacklogDAO.php';
	require_once '../../model/meu_trabalho/meuTrabalhoDAO.php';
	require_once '../../model/finalizado/finalizadoDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		require '../../libs/Smarty.class.php';
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

		$finalizadoDAO = new FinalizadoDAO();
		$finalizado = $finalizadoDAO->selecionarFinalizado($idProjeto);
		
		$smarty->assign("projeto", $projeto);
		$smarty->assign("productBacklog", $productBacklog);
		$smarty->assign("sprintBacklog", $sprintBacklog);
		$smarty->assign("meuTrabalho", $meuTrabalho);
		$smarty->assign("finalizado", $finalizado);

		$smarty->display('../../view/projeto/dashboardProjeto.html');

	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>