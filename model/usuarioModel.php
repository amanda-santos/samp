<?php

	class usuarioModel{
	
		public static function persistirUsuario($nome, $sobrenome, $usuario, $email, $senha){
			include 'conexao/conecta.php';
			$sql = "SELECT * FROM usuario WHERE usuario = '".$usuario."';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { // se achar algum registro
				echo "<script>alert('Esse nome de usuário já existe.');</script>";
				echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
			}else{
				$SQL = "SELECT * FROM usuario WHERE email = '". $email . "';";
				$result = $conn->query($SQL);
				if ($result->num_rows > 0) { // se achar algum registro
					echo "<script>alert('Já existe uma conta cadastrada com esse e-mail.');</script>";
					echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
				} else {
				//define o comando sql para inserção
					$SQL = "INSERT INTO usuario (usuario, senha, nome, sobrenome, email, ativo) VALUES ('".$usuario."','".$senha."','".$nome."','".$sobrenome."','".$email."',0)";
					if ($conn->query($SQL) === TRUE){
						//verifica se o comando foi executado com sucesso
						//$_SESSION['usuario'] = $this->$usuario;
						//$_SESSION['nome'] = $this->$nome;
						echo "<script>window.location = '../model/enviarEmailAtivacao.php?email=$email';</script>";
					}else{
						//mensagem exibida caso ocorra algum erro na execução do comando sql
						echo "<script>alert('Erro ao criar a conta!');</script>";
						echo "Erro: ". $SQL. "<br>" . $conn->error;
					}
				}
			}
			$conn->close();
		}

		public function ativarUsuario($usuario){
			include 'conexao/conecta.php';
			$sql = "UPDATE usuario SET ativo = 1 WHERE usuario = '".$usuario."';";
			$result = $conn->query($sql);

			if ($conn->query($sql) === TRUE){
				//verifica se o comando foi executado com sucesso
				echo "<script>alert('Sua conta foi ativada com sucesso!');</script>";
				echo "<script>window.location = '../entrar.php';</script>";
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao ativar a conta!');</script>";
				echo "Erro: ". $sql. "<br>" . $conn->error;
			}
		}

		public function editarConta($usuario, $nome, $sobrenome, $email, $senha, $usuarioAntigo, $emailAntigo){
			if ($usuarioAntigo != $usuario) {
		  	$sql = "SELECT * FROM usuario WHERE usuario='".$usuario."'";
		  	$result = $conn->query($sql);
		  		if ($result->num_rows > 0) { // se achar algum registro
		    	echo "<script>alert('Esse nome de usuário já existe.');</script>";
		    	echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
		    	exit;
		  		}
			}

			if ( $emailAntigo != $email) {
		  	$SQL = "SELECT * FROM usuario WHERE email='".$email."'";
		  	$result = $conn->query($SQL);
		  		if ($result->num_rows > 0) { // se achar algum registro
		    	echo "<script>alert('Já existe uma conta cadastrada com esse e-mail.');</script>";
		    	echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
		    	exit;
		  		}
			}
		    
		    $sql = "UPDATE usuario SET usuario= '".$usuario."', nome= '".$nome."', sobrenome= '".$sobrenome."', email = '".$email."', senha= '".$senha."' WHERE usuario = '".$usuario."'";
		    //echo "<script>alert(".$sql.");</script>";
		    if ($conn->query($sql) === TRUE) {
		   	  $_SESSION["usuario"] = $usuario;
		      $_SESSION["nome"] = $nome;
		      //$('.modal').modal('show')myModal
		      //echo '<script>$("#myModal").modal("show");</script>';
		      //echo "<script>$('#myModal').modal('show');</script>";
		      //echo '<script>alert("'.$sql.'");</script>';
		      //echo $sql;
		      echo "<script>alert('Sua conta foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../dashboard.php';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		  
		}

		public function inativarUsuario($usuario){
					$sql = "UPDATE usuario SET ativo = 0 WHERE usuario = '".$usuario."'";

		if ($conn->query($sql) === TRUE) { //se o comando funcionou
			echo "<script>alert('Sua conta foi desativada com sucesso.');</script>";
			echo "<script>window.location = 'index.php';</script>";
			session_destroy();
		}
		else{ //se o comando não funcionou
			echo "<script>alert('Erro ao desativar a conta!');</script>";
			//echo "<script>window.location = 'editarConta.php';</script>";
			echo "Erro: ". $SQL. "<br>" . $conn->error;
		}
			}
		}

	}
?>