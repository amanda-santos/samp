<?php
	session_start();
	require_once '../../model/projeto/projetoDAO.php';
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		require '../../libs/Smarty.class.php';
		$smarty = new Smarty;
		$id = $_GET["id"];
		$projetoDAO = new projetoDAO();
		$projeto = $projetoDAO->selecionarProjeto($id);

		
		$smarty->assign("projeto", $projeto);
		$smarty->display('../../view/projeto/editarProjeto.html');
	} 
	else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>