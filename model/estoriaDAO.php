<?php
	require_once 'Estoria.php';
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
		
		function selecionarEstoria($id){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "SELECT * FROM estoria AS e JOIN usuario_estoria AS ue ON e.id = ue.Estoria_id WHERE e.id = " . $id;
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estoria->setId($exibir["id"]);
					return $estoria;
				}
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao selecionar estoria!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}
		
		function selecionarEstorias(){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "SELECT * FROM estoria AS e JOIN usuario_estoria AS ue ON e.id = ue.Estoria_id WHERE e.id = " . $id;
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				$estorias = new ArrayObject();
				//verifica se o comando foi executado com sucesso
				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estorias -> append($estoria);
				}
				return $estorias;
			}else{
				$estorias = new ArrayObject();
				return $estorias;
			}
			$conn->close();
		}
		
		public static function persistirEstoriaSprintBacklog($projeto_id, $id_estoria, $nivel_dificuldade, $duracao){
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
		public static function persistirEstoriaUsuario($projeto_id, $id_usuario, $id_estoria){
			include 'conexao/conecta.php';
			$sql = "SELECT * FROM usuario_estoria WHERE usuario_usuario = '".$id_usuario."' and estoria_id = '".$id_estoria."';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { // se achar algum registro
				echo "<script>alert('Esse usuário já é responsável por essa estória!.');</script>";
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
		
		public function editarEstoria($nome,$descricao,$estoria_id,$projeto_id){
			include 'conexao/conecta.php';
		    
		    $sql = "UPDATE estoria SET nome= '".$nome."', descricao = '".$descricao."' WHERE id = '".$estoria_id."'";
		    //echo "<script>alert(".$sql.");</script>";
		    if ($conn->query($sql) === TRUE) {
		      echo "<script>alert('A estória foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../controller/exibirProductBacklog.php?id=".$projeto_id."';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		  
		}
		
		function excluirEstoria($estoria,$projeto_id){
			include("conexao/conecta.php");
			$sql = " DELETE FROM estoria WHERE id = ".$estoria.";";
 			if ($conn->query($sql) === TRUE) { //se o comando funcionou
				echo "<script>alert('A estória foi excluída com sucesso.');</script>";
				echo "<script>window.location = '../controller/exibirProductBacklog.php?id=$projeto_id';</script>";
			}
			else{ //se o comando não funcionou
				echo "<script>alert('Erro ao excluir estória!');</script>";
				echo "Erro: ". $sql. "<br>" . $conn->error;
			}
		}
	}
?>