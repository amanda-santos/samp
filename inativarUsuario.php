<?php
	include("conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO

	} else {
		echo "<script>window.location = 'index.php';</script>";
	}
?>
