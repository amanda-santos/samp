<?php
    session_start();
	require_once '../../model/estoria/estoriaDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$estoriaDAO = new estoriaDAO();
		$estoriaDAO->excluirEstoria($_GET['idEstoria'],$_GET['idProjeto']);
	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>
