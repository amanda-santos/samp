<?php
	require_once '../../model/usuario/usuarioDAO.php';
	session_start();
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		require '../../libs/Smarty.class.php';
		$smarty = new Smarty;

		$usuarioDAO = new usuarioDAO();
		$usuario = $usuarioDAO->selecionarUsuario($_SESSION['usuario']);
		
		$smarty->assign("usuario", $usuario);

		$smarty->display('../../view/usuario/editarUsuario.html');
	} else {
		echo "<script>window.location = '../view/index.html';</script>";
	}
?>