<?php
	require_once 'Tarefa.php';

	class tarefaDAO{

		public function persistirTarefa($nome, $estoria_id, $projeto_id){
			include("../../../model/conexao/conecta.php");

			$SQL = "INSERT INTO tarefa (nome, Situacao_id, Estoria_id) VALUES ('".$nome."',1,".$estoria_id.");";
			if ($conn->query($SQL) === TRUE){
				echo "<script>alert('Tarefa cadastrada com sucesso!');</script>";
				echo "<script>window.location = '../../../controller/projeto/dashboardProjeto.php?id=$projeto_id';</script>";
			}else{
				echo "<script>alert('Erro ao cadastrar tarefa!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}


		public function editarSituacao($situacao,$id,$projeto_id){
			include("../../../model/conexao/conecta.php");
			$sql = "UPDATE tarefa set Situacao_id= ".$situacao." WHERE id = ".$id;
			
			if ($conn->query($sql) === TRUE) {		      
		      echo "<script>window.location = '../../../controller/projeto/dashboardProjeto.php?id=".$projeto_id."';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		  
		}
		
		function editarTarefa($nome, $id, $projeto_id){
			include("../../../model/conexao/conecta.php");
			
		    $sql = "UPDATE tarefa SET nome= '".$nome."' WHERE id = '".$id."'";

		    if ($conn->query($sql) === TRUE) {
		      echo "<script>alert('A tarefa foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../../../controller/projeto/dashboardProjeto.php?id=".$projeto_id."';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		  
		}
	}
?>
