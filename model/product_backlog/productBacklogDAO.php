<?php
	require_once 'ProductBacklog.php';
	require_once '../../model/estoria/Estoria.php';

	class productBacklogDAO{

		public static function persistirEstoria($nome, $descricao, $projeto_id){

			include("../../model/conexao/conecta.php");

			//define o comando sql para inserção
			$SQL = "INSERT INTO estoria (nome, descricao, projeto_id) VALUES ('".$nome."','".$descricao."','".$projeto_id."');";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				echo "<script>alert('Estória cadastrada com sucesso!');</script>";
				echo "<script>window.location = '../../controller/projeto/dashboardProjeto.php?id=$projeto_id';</script>";
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao cadastrar estória!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}

		public function editarEstoria($nome,$descricao,$estoria_id,$projeto_id){
			include("../../model/conexao/conecta.php");
		    $sql = "UPDATE estoria SET nome= '".$nome."', descricao = '".$descricao."' WHERE id = '".$estoria_id."'";
		    //echo "<script>alert(".$sql.");</script>";
		    if ($conn->query($sql) === TRUE) {
		      echo "<script>alert('A estória foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../../controller/projeto/dashboardProjeto.php?id=".$projeto_id."';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		}

		function excluirEstoria($estoria,$projeto_id){
			include("../../model/conexao/conecta.php");
			$sql = " DELETE FROM estoria WHERE id = ".$estoria.";";
 			if ($conn->query($sql) === TRUE) { //se o comando funcionou
				echo "<script>alert('A estória foi excluída com sucesso.');</script>";
				echo "<script>window.location = '../../controller/projeto/dashboardProjeto.php?id=$projeto_id';</script>";
			}
			else{ //se o comando não funcionou
				echo "<script>alert('Erro ao excluir estória!');</script>";
				echo "Erro: ". $sql. "<br>" . $conn->error;
			}
		}

		function selecionarProductBacklog($projeto_id){
			include("../../model/conexao/conecta.php");
			//define o comando sql para seleção
			$SQL = "SELECT * FROM estoria WHERE Projeto_id = '".$projeto_id."' AND product_backlog = 1;";
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				$estorias = new ArrayObject();
				//verifica se o comando foi executado com sucesso
				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();
					$estoria->setId($exibir["id"]);
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estoria->setSprintBacklog($exibir["sprint_backlog"]);
					$estorias -> append($estoria);
				}
				$productBacklog = new ProductBacklog($estorias);
				return $productBacklog;
			}else{
				$productBacklog = new ProductBacklog();
				return $productBacklog;
			}
			$conn->close();
		}
	}
?>
