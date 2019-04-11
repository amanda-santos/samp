<?php
	include 'conexao/conecta.php';
	require_once 'Usuario.php';

	$SQL = "SELECT FROM tb_usuario WHERE usuario = '".$_GET['usuario']."'";
	$result = $conn->query($sql);

	$usuario = new Usuario();

	$usuario = $result['usuario'];

	$usuario->ativarConta();
?>