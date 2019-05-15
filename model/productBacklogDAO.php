<?php
	require_once 'ProductBacklog.php';
	require_once 'Estoria.php';

	class productBacklogDAO{

		function selecionarProductBacklog($projeto_id){
			include 'conexao/conecta.php';
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
