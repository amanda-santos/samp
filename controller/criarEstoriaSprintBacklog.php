<?php
	session_start();
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

		$idProjeto = $_GET["id"];

		require '../libs/Smarty.class.php';
		$smarty = new Smarty;
		$smarty->assign("idProjeto", $idProjeto);

		$idEstoria = $_GET["id_estoria"];
		$smarty->assign("estoria", $idEstoria);

		$smarty->display('../view/criarEstoriaSprintBacklog.html');
		
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>