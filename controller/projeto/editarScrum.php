<?php
    session_start();
	require_once '../../model/projeto/projetoDAO.php';
	require_once '../../model/usuario/usuarioDAO.php';

	
	if (isset($_POST["atualizar"])) { //SE EXISTIR AUTENTICAÇÃO
		$projetoDAO = new projetoDAO();
		$projetoDAO->editarScrumMaster($_POST['usuario'], $_GET['id_projeto']);
	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>