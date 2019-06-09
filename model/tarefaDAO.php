<?php
	require_once 'Tarefa.php';

	class tarefaDAO{

		public function persistirTarefa($nome, $estoria_id, $projeto_id){
			include 'conexao/conecta.php';

			$SQL = "INSERT INTO tarefa (nome, Situacao_id, Estoria_id) VALUES ('".$nome."',1,".$estoria_id.");";
			if ($conn->query($SQL) === TRUE){
				echo "<script>alert('Tarefa cadastrada com sucesso!');</script>";
				echo "<script>window.location = '../controller/dashboardProjeto.php?id=$projeto_id';</script>";
			}else{
				echo "<script>alert('Erro ao cadastrar tarefa!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}

	}
?>
