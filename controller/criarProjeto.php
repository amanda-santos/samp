<?php
	session_start();
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		require '../libs/Smarty.class.php';
		$smarty = new Smarty;

		$smarty->display('../view/criarProjeto.html');
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>