<?php
    session_start();
	require_once '../../model/projeto/projetoDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$projetoDAO = new projetoDAO();
		$id_projeto = $_GET['id_projeto'];
		$projetoDAO->sairProjeto($id_projeto, $_SESSION["usuario"]);
	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>
