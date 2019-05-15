<?php
session_start();
require_once '../model/usuarioDAO.php';

if (isset($_POST["entrar"])){
		/* Pega o usuário e senha preenchidos no formulário de login da View */
		$usuario = trim(strip_tags($_POST['usuario'])); //trim remove espaços a mais e strip_tags remove tags html e outros códigos
		$senha = trim(strip_tags($_POST['senha']));
		$senhaCrip = base64_encode($senha);
		
		$usuarioDAO = new usuarioDAO();
		$usuarioDAO->login($_POST['usuario'], $senhaCrip);

		/* Encaminha os dados a Model para que seja realizado a validação 
		$model = new Model();
		$validacao = $model->validaLogin($usuario,$senhaCrip);
		
		/* Pega o resultado da validação realizada no Model e o encaminha para ser exibido pela View
		$view = new View();
		$view->login($validacao); */
}
?>
