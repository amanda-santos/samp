<?php
	require_once 'Projeto.php';

	class projetoDAO{
	
		public static function persistirProjeto($nome, $descricao, $id){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "INSERT INTO projeto (nome, descricao, id) VALUES ('".$nome."','".$descricao."','".$id."');";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				$SQL = "INSERT INTO usuario_projeto (scrum_master, usuario_usuario, projeto_id) VALUES (1,'".$_SESSION['usuario']."','".$id."');";
				if ($conn->query($SQL) === TRUE){
					echo "<script>alert('Projeto cadastrado com sucesso!);</script>";
					echo "<script>window.location = '../controller/exibirProjetos.php';</script>";
				}
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao cadastrar projeto!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}

		function selecionarProjeto($id){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "SELECT * FROM projeto JOIN usuario_projeto ON id = Projeto_id WHERE id = '" . $id . "' AND Usuario_usuario = '".$_SESSION['usuario']."';";
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				while ($exibir = $result->fetch_assoc()){
					$projeto = new Projeto();
					$projeto->setNome($exibir["nome"]);
					$projeto->setDesc($exibir["descricao"]);
					$projeto->setId($exibir["id"]);
					$projeto->setScrumMaster($exibir["scrum_master"]);
					return $projeto;
				}
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao selecionar projeto!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}

		function selecionarProjetos(){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "SELECT * FROM projeto JOIN usuario_projeto ON id = Projeto_id WHERE Usuario_usuario = '".$_SESSION['usuario']."';";
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				$projetos = new ArrayObject();
				//verifica se o comando foi executado com sucesso
				while ($exibir = $result->fetch_assoc()){
					$projeto = new Projeto();
					$projeto->setNome($exibir["nome"]);
					$projeto->setDesc($exibir["descricao"]);
					$projeto->setId($exibir["id"]);
					$projeto->setScrumMaster($exibir["scrum_master"]);
					$projetos -> append($projeto);
				}
				return $projetos;
			}else{
				$projetos = new ArrayObject();
				return $projetos;
			}
			$conn->close();
		}

		function entrarProjeto($projeto_id){
			include 'conexao/conecta.php';
		  	$sql = "SELECT * FROM projeto WHERE id='".$projeto_id."'";
		  	$result = $conn->query($sql);
	  		if ($result->num_rows > 0) { // Se o codigo de verificação do projeto existir.

	  			$SQL = "SELECT * FROM usuario_projeto WHERE Usuario_usuario = '".$_SESSION['usuario']."' AND Projeto_id='".$projeto_id."'";
			  	$result = $conn->query($SQL);
		  		if ($result->num_rows > 0) { // se o usuário já é integrante do projeto
		  			echo "<script>alert('ERRO: Você já é um integrante desse projeto.');</script>";
	    			echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
		  		}else{

		  			$SQL = "INSERT INTO usuario_projeto (scrum_master, Usuario_usuario, Projeto_id) VALUES (0,'".$_SESSION['usuario']."','".$projeto_id."');";
		  			if ($conn->query($SQL) === TRUE){
						echo "<script>window.location = '../controller/exibirProjetos.php';</script>";
					}else{
						//mensagem exibida caso ocorra algum erro na execução do comando sql
						echo "<script>alert('Erro ao entrar no projeto!');</script>";
						echo "Erro: ". $SQL. "<br>" . $conn->error;
					}
				}
		  	}else{
	  			echo "<script>alert('O código do projeto não foi encontrado!');</script>";
	    		echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
	  		}
		}

		function excluirProjeto($projeto){
			include("conexao/conecta.php");
			$sql = " DELETE FROM projeto WHERE id = '".$projeto."';";
 			if ($conn->query($sql) === TRUE) { //se o comando funcionou
				echo "<script>alert('Seu projeto foi excluído com sucesso.');</script>";
				echo "<script>window.location = '../controller/exibirProjetos.php';</script>";
			}
			else{ //se o comando não funcionou
				echo "<script>alert('Erro ao excluir projeto!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
		}

		public function editarProjeto($nome,$descricao,$projeto){
			include 'conexao/conecta.php';
		    
		    $sql = "UPDATE projeto SET nome= '".$nome."', descricao = '".$descricao."' WHERE id = '".$projeto."'";
		    //echo "<script>alert(".$sql.");</script>";
		    if ($conn->query($sql) === TRUE) {
		      
              $_SESSION['nome'] = $nome;
			  			$_SESSION['descricao'] = $descricao;
			  
		      echo "<script>alert('Seu projeto foi atualizado com sucesso!');</script>";
		      echo "<script>window.location = '../controller/exibirProjetos.php';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		  
		}
	}
?>