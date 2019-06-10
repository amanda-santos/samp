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
				echo "<script>window.location = '../controller/dashboardProjeto.php?id=$projeto_id';</script>";
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao cadastrar estória!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}
		
		function selecionarEstoria($id){
			include 'conexao/conecta.php';
			require_once 'Usuario.php';
			//define o comando sql para inserção
			$SQL = "SELECT * FROM estoria AS e WHERE e.id = " . $id;
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estoria->setId($exibir["id"]);
					$estoria->setNivelDificuldade($exibir["NivelDificuldade_id"]);
					$estoria->setDuracao($exibir["duracao"]);
					$SQL2 = "SELECT nome, sobrenome, email, usuario 
							 FROM usuario_estoria 
							 JOIN usuario ON usuario = Usuario_usuario 
							 WHERE Estoria_id = ".$exibir["id"].";";

					$result_responsaveis = $conn->query($SQL2);

					if ($result_responsaveis->num_rows > 0){

						$responsaveis = new ArrayObject();

						while ($exibir_responsaveis = $result_responsaveis->fetch_assoc()){
							$usuario = new Usuario();
							$usuario->setNome($exibir_responsaveis["nome"]);
					        $usuario->setSobrenome($exibir_responsaveis["sobrenome"]); 
					        $usuario->setEmail($exibir_responsaveis["email"]);
					        $usuario->setUsuario($exibir_responsaveis["usuario"]);

					        $responsaveis->append($usuario);
						} // fim while responsaveis

						$estoria->setResponsaveis($responsaveis);
					}
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
		
		public static function persistirEstoriaSprintBacklog($responsaveis, $projeto_id, $id_estoria, $nivel_dificuldade, $duracao){
			include 'conexao/conecta.php';
			foreach($responsaveis as $responsavel){
				$sql = "SELECT * FROM usuario_estoria WHERE usuario_usuario = '".$responsavel."' and estoria_id = '".$id_estoria."';";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) { // se achar algum registro
					echo "<script>alert('O usuário " . $responsavel . " já é responsável por essa estória!');</script>";
					echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
				}
			}
			//define o comando sql para inserção
			$SQL = "UPDATE estoria SET duracao = '".$duracao."', niveldificuldade_id = ".$nivel_dificuldade.", situacao_id = 1, sprint_backlog = 1 WHERE id = ".$id_estoria.";";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				foreach($responsaveis as $responsavel){
					$SQL2 = "INSERT INTO usuario_estoria VALUES ('".$responsavel."','".$id_estoria."')";
					if ($conn->query($SQL2) === TRUE){
						//echo "<script>alert('Estória cadastrada no Sprint Backlog com sucesso!');</script>";
						echo "<script>window.location = '../controller/dashboardProjeto.php?id=$projeto_id';</script>";
					}else{
						//mensagem exibida caso ocorra algum erro na execução do comando sql
						echo "<script>alert('Erro ao adicionar estória ao Sprint Backlog!');</script>";
						echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
					}
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
		      echo "<script>window.location = '../controller/dashboardProjeto.php?id=".$projeto_id."';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		  
		}

		public function editarSituacao($situacao,$estoria_id,$projeto_id){
			include 'conexao/conecta.php';
			$sql = "UPDATE estoria set Situacao_id= '".$situacao."' WHERE id = '".$estoria_id."'";
			//echo "<script>alert(".$sql.");</script>";
			if ($conn->query($sql) === TRUE) {
		      echo "<script>alert('A situação foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../controller/dashboardProjeto.php?id=".$projeto_id."';</script>";
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
				echo "<script>window.location = '../controller/dashboardProjeto.php?id=$projeto_id';</script>";
			}
			else{ //se o comando não funcionou
				echo "<script>alert('Erro ao excluir estória!');</script>";
				echo "Erro: ". $sql. "<br>" . $conn->error;
			}
		}

		function excluirEstoriaSprintBacklog($id_estoria,$projeto_id){
			include("conexao/conecta.php");
			$sql = "UPDATE estoria SET duracao = null, niveldificuldade_id = null, situacao_id = null, sprint_backlog = 0 WHERE id = ".$id_estoria.";";
			if ($conn->query($sql) === TRUE) { //se o comando funcionou

				$sql2 = "DELETE FROM usuario_estoria WHERE Estoria_id = ".$id_estoria.";";

				if ($conn->query($sql2) === TRUE) { //se o comando funcionou
					echo "<script>window.location = '../controller/dashboardProjeto.php?id=$projeto_id';</script>";
				}else{ //se o comando não funcionou
					echo "<script>alert('Erro ao excluir estória!');</script>";
					echo "Erro: ". $sql2. "<br>" . $conn->error;
				}

			}else{ //se o comando não funcionou
				echo "<script>alert('Erro ao excluir estória!');</script>";
				echo "Erro: ". $s1l. "<br>" . $conn->error;
			}
		}

		function editarEstoriaSprintBacklog($nivel_dificuldade, $duracao, $id_estoria, $projeto_id){
			include 'conexao/conecta.php';
			$sql = "UPDATE estoria SET niveldificuldade_id = ".$nivel_dificuldade.", duracao = ".$duracao." WHERE id = ".$id_estoria.";";
		    //echo "<script>alert(".$sql.");</script>";
		    if ($conn->query($sql) === TRUE) {
		      echo "<script>alert('A estória foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../controller/dashboardProjeto.php?id=".$projeto_id."';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		}
		
		function excluirUsuarioResponsavel($idProjeto, $usuario, $idEstoria){
			include("conexao/conecta.php");
			$sql = " DELETE FROM usuario_estoria WHERE Usuario_usuario = '".$usuario."' AND Estoria_id = ".$idEstoria.";";
			if ($conn->query($sql) === TRUE) { //se o comando funcionou
				echo "<script>alert('O usuário foi removido com sucesso.');</script>";
				echo "<script>window.location = '../controller/exibirEstoriaSprintBacklog.php?idEstoria=44&idProjeto=$idProjeto';</script>";
			}
			else{ //se o comando não funcionou
			echo "<script>alert('Erro ao remover usuário!');</script>";
			echo "Erro: ". $sql. "<br>" . $conn->error;
			}
		}	
	}	

?>
