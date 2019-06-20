<?php
  session_start();
  require_once '../../model/estoria/estoriaDAO.php';
  require_once '../../model/projeto/projetoDAO.php';

  if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
	require '../../libs/Smarty.class.php';	
	
	$idEstoria = $_GET["idEstoria"];	
	$idProjeto = $_GET["idProjeto"];	
	
	$smarty = new Smarty;

	$projetoDAO = new projetoDAO();
	$projeto = $projetoDAO->selecionarProjeto($idProjeto);
	
    $estoriaDAO = new estoriaDAO();
	$estoria = $estoriaDAO->selecionarEstoria($idEstoria);
	
	$smarty->assign("estoria", $estoria);
	$smarty->assign("projeto", $projeto);
	$smarty->display('../../view/product_backlog/editarEstoria.html');
  }else {
	echo "<script>window.location = '../../view/index.html';</script>";
  }
  
?> 
