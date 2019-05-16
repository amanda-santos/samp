<?php
  session_start();
  require_once '../model/estoriaDAO.php';

  if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
	require '../libs/Smarty.class.php';
	
	
	$id = $_GET["id"];
	
	
	$smarty = new Smarty;
	
    $estoriaDAO = new estoriaDAO();
	$estoria = $estoriaDAO->selecionarEstoria($id);
	
	$smarty->assign("estoria", $estoria);
	$smarty->display('../view/editarEstoria.html');
  }
	else {
		echo "<script>window.location = '../view/exibirProductBacklog.html';</script>";
	}
  
?> 
