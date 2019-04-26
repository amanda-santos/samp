<?php

	class projetoModel{
	
		public static function persistirProjeto($nome, $descricao, $id){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "INSERT INTO projeto (nome, descricao, id) VALUES ('".$nome."','".$descricao."','".$id."');";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				$SQL = "INSERT INTO usuario_projeto (scrum_master, usuario_usuario, projeto_id) VALUES (1,'".$_SESSION['usuario']."','".$id."');";
				if ($conn->query($SQL) === TRUE){
					echo "<script>alert('Projeto cadastrado com sucesso! Código do projeto: $id');</script>";
					echo "<script>window.location = '../view/projetos.php';</script>";
				}
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao cadastrar projeto!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}
	}
?>