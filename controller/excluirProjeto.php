<?php
	require_once '../model/Projeto.php';
	require_once '../model/conexao/conecta.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$projeto = new Projeto();
		$projeto->excluirProjeto($_GET['projeto']);
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>

