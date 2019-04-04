<?php
	include("conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		$sql = "UPDATE tb_usuario SET ativo = 0 WHERE usuario = '".$_GET["usuario"]."'";

		if ($conn->query($sql) === TRUE) { //se o comando funcionou
			echo "<script>alert('Sua conta foi desativada com sucesso.');</script>";
			echo "<script>window.location = 'index.php';</script>";
			session_destroy();
		}
		else{ //se o comando não funcionou
			echo "<script>alert('Erro ao desativar a conta!');</script>";
			//echo "<script>window.location = 'editarConta.php';</script>";
			echo "Erro: ". $SQL. "<br>" . $conn->error;
		}
	} else {
		echo "<script>window.location = 'index.php';</script>";
	}
?>
