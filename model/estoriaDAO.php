<?php
	class estoriaDAO{

		public static function persistirEstoria($nome, $descricao, $projeto_id){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "INSERT INTO estoria (nome, descricao, projeto_id) VALUES ('".$nome."','".$descricao."','".$projeto_id."');";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				echo "<script>alert('Estória cadastrada com sucesso!');</script>";
				echo "<script>window.location = '../controller/exibirProductBacklog.php?id=$projeto_id';</script>";
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao cadastrar estória!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}

		function excluirEstoria($estoria,$projeto_id){
			include("conexao/conecta.php");
			$sql = " DELETE FROM estoria WHERE id = '".$estoria."';";
 			if ($conn->query($sql) === TRUE) { //se o comando funcionou
				echo "<script>alert('Sua estoria foi excluída com sucesso.');</script>";
				echo "<script>window.location = '../controller/exibirProductBacklog.php?id=$projeto_id';</script>";
			}
			else{ //se o comando não funcionou
				echo "<script>alert('Erro ao excluir estoria!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
		}
	}
?>
