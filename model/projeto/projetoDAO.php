<?php
	require_once 'Projeto.php';

	class projetoDAO{
	
		public static function persistirProjeto($nome, $descricao, $id){
			include("../../model/conexao/conecta.php");
			//define o comando sql para inserção
			$SQL = "INSERT INTO projeto (nome, descricao, id) VALUES ('".$nome."','".$descricao."','".$id."');";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				$SQL = "INSERT INTO usuario_projeto (scrum_master, usuario_usuario, projeto_id) VALUES (1,'".$_SESSION['usuario']."','".$id."');";
				if ($conn->query($SQL) === TRUE){
					echo "<script>alert('Projeto cadastrado com sucesso!);</script>";
					echo "<script>window.location = '../../controller/projeto/exibirProjetos.php';</script>";
				}
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao cadastrar projeto!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}

		function selecionarProjeto($id){
			include("../../model/conexao/conecta.php");
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
			require_once '../../model/usuario/Usuario.php';
			include("../../model/conexao/conecta.php");
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

					$SQL2 = "SELECT nome, sobrenome, usuario, email, scrum_master FROM usuario_projeto JOIN usuario ON usuario = Usuario_usuario where Projeto_id = '".$exibir["id"]."';";

					$result_participantes = $conn->query($SQL2);

					if ($result_participantes->num_rows > 0){

						$participantes = new ArrayObject();

						while ($exibir_participantes = $result_participantes->fetch_assoc()){

							$usuario = new Usuario();
							$usuario->setNome($exibir_participantes["nome"]);
					        $usuario->setSobrenome($exibir_participantes["sobrenome"]); 
					        $usuario->setEmail($exibir_participantes["email"]);
					        $usuario->setUsuario($exibir_participantes["usuario"]);
					        $usuario->setScrumMaster($exibir_participantes["scrum_master"]);

					        $participantes->append($usuario);
							
						}

						$projeto->setParticipantes($participantes);
					}

					$projetos -> append($projeto);
				}
				
				return $projetos;
			}else{
				$projetos = new ArrayObject();
				return $projetos;
			}
			$conn->close();
		}

		function selecionarIntegrantes($id){
			require_once '../../model/usuario/Usuario.php';
			include("../../model/conexao/conecta.php");
			//define o comando sql para inserção
			$SQL = "SELECT * FROM usuario JOIN usuario_projeto ON usuario = Usuario_usuario WHERE Projeto_id = '" . $id . "';";
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
    			$projeto = new Projeto();
    			$participantes = new ArrayObject();
				while ($exibir = $result->fetch_assoc()){
					$usuario = new Usuario();
					$usuario->setNome($exibir["nome"]);
			        $usuario->setSobrenome($exibir["sobrenome"]); 
			        $usuario->setEmail($exibir["email"]);
			        $usuario->setUsuario($exibir["usuario"]);
			        $usuario->setScrumMaster($exibir["scrum_master"]);
			        $participantes->append($usuario);
				}
				$projeto->setParticipantes($participantes);
				return $projeto;
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao selecionar integrantes!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}

		function entrarProjeto($projeto_id){
			include("../../model/conexao/conecta.php");
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
						echo "<script>window.location = '../../controller/projeto/exibirProjetos.php';</script>";
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
			include("../../model/conexao/conecta.php");
			$sql = " DELETE FROM projeto WHERE id = '".$projeto."';";
 			if ($conn->query($sql) === TRUE) { //se o comando funcionou
				echo "<script>alert('Seu projeto foi excluído com sucesso.');</script>";
				echo "<script>window.location = '../../controller/projeto/exibirProjetos.php';</script>";
			}
			else{ //se o comando não funcionou
				echo "<script>alert('Erro ao excluir projeto!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
		}

		public function editarProjeto($nome,$descricao,$projeto){
			include("../../model/conexao/conecta.php");		    
		    $sql = "UPDATE projeto SET nome= '".$nome."', descricao = '".$descricao."' WHERE id = '".$projeto."'";
		    if ($conn->query($sql) === TRUE) {

		      echo "<script>alert('Seu projeto foi atualizado com sucesso!');</script>";
		      echo "<script>window.location = '../../controller/projeto/exibirProjetos.php';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		  $conn->close();		  
		}
		
		function editarScrumMaster($projeto_id, $usuario_id){
			require_once '../../model/usuario/Usuario.php';
			include("../../model/conexao/conecta.php");

			$sql = "SELECT ua.Usuario_usuario, ua.Estoria_id, e.Situacao_id FROM samp.usuario_estoria as ua
					JOIN samp.estoria as e ON ua.Estoria_id = e.id WHERE Usuario_usuario = '".$usuario_id."' AND e.Projeto_id = '" . $projeto_id . "';";

			$entrou = false;
		  	$result = $conn->query($sql);
    		if ($result->num_rows > 0){
    			while ($exibir = $result->fetch_assoc()){
	    			$situacao = $exibir["Situacao_id"];
	    			if($situacao != 5){
	    				$entrou = true;
	    			} 
    			}
			}

			if($entrou){
				echo "<script>alert('ERRO: O usuário selecionado possui estórias pendentes! É preciso que elas sejam finalizadas para que ele(a) se torne Scrum Master.');</script>";
	    		echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
	    	}else{
			
				$SQL = "UPDATE usuario_projeto SET scrum_master = 1 WHERE Projeto_id = '".$projeto_id."' AND Usuario_usuario = '".$usuario_id."'";
				
				if ($conn->query($SQL) === TRUE) {

					$SQL2 = "UPDATE usuario_projeto SET scrum_master = 0 WHERE Projeto_id = '".$projeto_id."' AND Usuario_usuario = '".$_SESSION["usuario"]."'";

					if ($conn->query($SQL2) === TRUE) {
						echo "<script>alert('Scrum Master alterado com sucesso!');</script>";
					    echo "<script>window.location = '../../controller/projeto/exibirProjetos.php';</script>";
					}else{
					  echo "Erro: " . $SQL2 . "<br>" . $conn->error;
				    }

				}else{
				  echo "Erro: " . $SQL . "<br>" . $conn->error;
			    }
				$conn->close();
			}
		}
		
		function sairProjeto($projeto_id, $usuario_id){
			include("../../model/conexao/conecta.php");

		  	$sql = "SELECT ua.Usuario_usuario, ua.Estoria_id, e.Situacao_id FROM samp.usuario_estoria as ua
					JOIN samp.estoria as e ON ua.Estoria_id = e.id WHERE Usuario_usuario = '".$usuario_id."' AND e.Projeto_id = '" . $projeto_id . "';";

			$entrou = false;
		  	$result = $conn->query($sql);
    		if ($result->num_rows > 0){
    			while ($exibir = $result->fetch_assoc()){
	    			$situacao = $exibir["Situacao_id"];
	    			if($situacao != 5){
	    				$entrou = true;
	    			} 
    			}
			}
			if($entrou){
				echo "<script>alert('Você não pode sair do projeto pois possui estórias pendentes! Finalize-as para poder sair.');</script>";
	    		echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
	    	}else{
	    		$sql2 = "DELETE FROM samp.usuario_estoria WHERE samp.usuario_estoria.Usuario_usuario = '".$usuario_id."' AND Estoria_id NOT IN (SELECT id FROM samp.estoria Where Projeto_id != '".$projeto_id."');";
				if ($conn->query($sql2) === TRUE){
						$sql3 = "DELETE FROM samp.usuario_projeto WHERE Usuario_usuario = '".$usuario_id."' AND Projeto_id = '".$projeto_id."';";
						if ($conn->query($sql3) === TRUE){
							//echo "<script>alert('Sucesso ao sair do projeto!');</script>";
							echo "<script>window.location = '../../controller/projeto/exibirProjetos.php';</script>";
						}else{
							echo "<script>alert('Erro ao sair do projeto!');</script>";
							echo "Erro: ". $sql3. "<br>" . $conn->error;
						}
				}else{
					echo "<script>alert('Erro ao excluir estórias do usuário!');</script>";
					echo "Erro: ". $sql2. "<br>" . $conn->error;
				}
			}
		}

		function excluirIntegrante($projeto_id,$usuario_id){
			include("../../model/conexao/conecta.php");

			$sql = "SELECT ua.Usuario_usuario, ua.Estoria_id, e.Situacao_id FROM samp.usuario_estoria as ua
					JOIN samp.estoria as e ON ua.Estoria_id = e.id WHERE Usuario_usuario = '".$usuario_id."' AND e.Projeto_id = '" . $projeto_id . "';";

			$entrou = false;
		  	$result = $conn->query($sql);
    		if ($result->num_rows > 0){
    			while ($exibir = $result->fetch_assoc()){
	    			$situacao = $exibir["Situacao_id"];
	    			if($situacao != 5){
	    				$entrou = true;
	    			} 
    			}
			}

			if($entrou){
				echo "<script>alert('ERRO: O usuário possui estórias pendentes no projeto!');</script>";
	    		echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
	    	}else{
				$sql2 = "DELETE FROM samp.usuario_estoria WHERE samp.usuario_estoria.Usuario_usuario = '".$usuario_id."' AND Estoria_id NOT IN (SELECT id FROM samp.estoria Where Projeto_id != '".$projeto_id."');";
				if ($conn->query($sql2) === TRUE){
						$sql3 = "DELETE FROM samp.usuario_projeto WHERE Usuario_usuario = '".$usuario_id."' AND Projeto_id = '".$projeto_id."';";
						if ($conn->query($sql3) === TRUE){
							echo "<script>alert('Usuário removido com sucesso!');</script>";
							echo "<script>window.location = '../../controller/projeto/exibirProjetos.php';</script>";
						}else{
							echo "<script>alert('Erro ao remover usuário!');</script>";
							echo "Erro: ". $sql3. "<br>" . $conn->error;
						}
				}else{
					echo "<script>alert('Erro ao excluir estórias do usuário!');</script>";
					echo "Erro: ". $sql2. "<br>" . $conn->error;
				}
			}
		}
	}
?>
