<?php
	session_start();
	require_once '../../model/projeto/projetoDAO.php';
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		require '../../libs/Smarty.class.php';
		$smarty = new Smarty;

		
		$projetoDAO = new projetoDAO();
		$projetos = $projetoDAO->selecionarProjetos();
		
		$smarty->assign("projetos", $projetos);

		$smarty->display('../../view/projeto/exibirProjetos.html');
	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>