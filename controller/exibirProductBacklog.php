<?php
	session_start();
	require_once '../model/projetoDAO.php';
	require_once '../model/productBacklogDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		require '../libs/Smarty.class.php';
		$smarty = new Smarty;

		$idProjeto = $_GET["id"];

		$projetoDAO = new projetoDAO();
		$projeto = $projetoDAO->selecionarProjeto($idProjeto);
	
		$productBacklogDAO = new productBacklogDAO();
		$productBacklog = $productBacklogDAO->selecionarProductBacklog($idProjeto);
		
		$smarty->assign("projeto", $projeto);
		$smarty->assign("productBacklog", $productBacklog);

		$smarty->display('../view/exibirProductBacklog.html');

	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>