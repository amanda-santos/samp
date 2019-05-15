<?php
	session_start();
	require_once '../model/projetoDAO.php';
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		require '../libs/Smarty.class.php';
		$smarty = new Smarty;

		if (isset($_POST["atualizar"])){
		$projetoDAO = new projetoDAO();
		$projetos = $projetoDAO->editarProjeto($_POST['nome'], $_POST['descricao']);
		}
		$smarty->assign("projetos", $projetos);

		$smarty->display('../view/editarProjeto.html');
	} 
	else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>