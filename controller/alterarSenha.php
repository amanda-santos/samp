<?php
session_start();
if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
	require '../libs/Smarty.class.php';
	$smarty = new Smarty;

	$smarty->display('../view/alterarSenha.html');

	//SE ATUALIZAR POST
	if (isset($_POST["alterar"])) {
	  	require_once '../model/usuarioDAO.php';

	    $usuarioDAO = new usuarioDAO();

	    $usuarioDAO->alterarSenha($_POST["atual"], $_POST["nova"]);
	        
	 } //fim se alterar senha
} else {
	echo "<script>window.location = '../view/index.html';</script>";
}
 ?>