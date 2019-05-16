<?php
	session_start();
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		$idProjeto = $_GET["id"];

		require '../libs/Smarty.class.php';
		$smarty = new Smarty;
		$smarty->assign("idProjeto", $idProjeto);
		$smarty->display('../view/criarEstoriaSprintBacklog.html');
		
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>