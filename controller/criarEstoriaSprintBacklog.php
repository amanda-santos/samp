<?php
	require_once '../model/projetoDAO.php';
	session_start();
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		$idProjeto = $_GET["id"];

		require '../libs/Smarty.class.php';
		$smarty = new Smarty;

		$projetoDAO = new projetoDAO();
    	$projeto = $projetoDAO->selecionarIntegrantes($idProjeto);

		$smarty->assign("idProjeto", $idProjeto);
		$smarty->assign("projeto", $projeto);
		
		$idEstoria = $_GET["id_estoria"];
		$smarty->assign("estoria", $idEstoria);
		
		$smarty->display('../view/criarEstoriaSprintBacklog.html');
		
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>
