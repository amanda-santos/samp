<?php
	class estoriaModel{

		public static function persistirEstoria($nome, $descricao, $projeto_id){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "SELECT * FROM estoria WHERE nome = '".$nome."';";
			$result = $conn->query($SQL);
			if ($result->num_rows > 0) { // se achar algum registro
				echo "<script>alert('Essa estória já existe.');</script>";
				echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
			}else{
				$SQL = "INSERT INTO estoria (nome, descricao, projeto_id) VALUES ('".$nome."','".$descricao."','".$projeto_id."');";
				if ($conn->query($SQL) === TRUE){
					//verifica se o comando foi executado com sucesso
					$SQL = "SELECT id FROM estoria WHERE nome = '".$nome."';";
					$result = $conn->query($SQL);
					if ($result->num_rows > 0){
						while($exibir = $result->fetch_assoc()){
							$id = $exibir['id'];
						}
						$SQL = "INSERT INTO product_backlog (Estoria_id) VALUES ('".$id."');";
						if ($conn->query($SQL) === TRUE){
							echo "<script>alert('Estoria cadastrada com sucesso!);</script>";
							echo "<script>window.location = '../view/productBacklog.php';</script>";
						}
					}
				}else{
					//mensagem exibida caso ocorra algum erro na execução do comando sql
					echo "<script>alert('Erro ao cadastrar estória!');</script>";
					echo "Erro: ". $SQL. "<br>" . $conn->error;
				}
			}
			$conn->close();
		}
	}
?>
