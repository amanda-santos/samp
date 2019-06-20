<?php
    session_start();
	require_once '../../model/product_backlog/productBacklogDAO.php';

	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$productBacklogDAO = new productBacklogDAO();
		$productBacklogDAO->excluirEstoria($_GET['idEstoria'],$_GET['idProjeto']);
	} else {
		echo "<script>window.location = '../../view/index.html';</script>";
	}
?>

