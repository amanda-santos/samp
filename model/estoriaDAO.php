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

		public static function persistirEstoriaSprintBacklog($id_estoria, $nivel_dificuldade, $duracao){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "UPDATE estoria SET duracao = '".$duracao."', niveldificuldade_id = ".$nivel_dificuldade.", situacao_id = 1, sprint_backlog = 1 WHERE id = ".$id_estoria.";";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				echo "<script>alert('Estória cadastrada no Sprint Backlog com sucesso!');</script>";
				echo "<script>window.location = '../controller/exibirSprintBacklog.php?id=$projeto_id';</script>";
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				//echo "<script>alert('". $SQL. "<br>" . $conn->error.");</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}

		public static function persistirEstoriaUsuario($id_usuario, $id_estoria){
			include 'conexao/conecta.php';
			$sql = "SELECT * FROM usuario_estoria WHERE usuario_usuario = '".$id_usuario."' and estoria_id = '".$id_estoria."';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { // se achar algum registro
				//echo "<script>alert('Esse usuário já é responsável por essa estória!.');</script>";
				echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
			}else{
				$SQL = "INSERT INTO usuario_estoria VALUES ('".$id_usuario."','".$id_estoria."')";
				if ($conn->query($SQL) === TRUE){
					//verifica se o comando foi executado com sucesso
					echo "<script>window.location = '../controller/exibirSprintBacklog.php?id=$projeto_id';</script>";
				}else{
					//mensagem exibida caso ocorra algum erro na execução do comando sql
					//echo "<script>alert('Erro ao cadastrar estória no Sprint Backlog!');</script>";
					echo "Erro: ". $SQL. "<br>" . $conn->error;
				}
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
