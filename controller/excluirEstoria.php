<?php
    session_start();
	require_once '../model/estoriaDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$estoriaDAO = new estoriaDAO();
		$estoriaDAO->excluirEstoria($_GET['estoria']);
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>

