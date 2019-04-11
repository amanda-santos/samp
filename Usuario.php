<?php
	include 'conexao/conecta.php';

	class Usuario{
		private $nome, $sobrenome, $usuario, $email, $senha, $ativo;

		public function __construct(){
			
		}

		public function Usuario(){
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->usuario = $usuario;
			$this->email = $email;
			$this->senha = $senha;
			$this->ativo = 0;
		}

		public function inserirUsuario($nome, $sobrenome, $usuario, $email, $senha, $conn){
			$sql = "SELECT * FROM tb_usuario WHERE usuario = '".$usuario."';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { // se achar algum registro
				echo "<script>alert('Esse nome de usuário já existe.');</script>";
				echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
			}else{
				$SQL = "SELECT * FROM tb_usuario WHERE email = '". $email . "';";
				$result = $conn->query($SQL);
				if ($result->num_rows > 0) { // se achar algum registro
					echo "<script>alert('Já existe uma conta cadastrada com esse e-mail.');</script>";
					echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
				} else {
				//define o comando sql para inserção
					$SQL = "INSERT INTO tb_usuario (usuario, senha, nome, sobrenome, email, ativo) VALUES ('".$usuario."','".$senha."','".$nome."','".$sobrenome."','".$email."',0)";

					if ($conn->query($SQL) === TRUE){
						//verifica se o comando foi executado com sucesso
						//$_SESSION['usuario'] = $this->$usuario;
						//$_SESSION['nome'] = $this->$nome;
						echo "<script>window.location = 'enviarEmailAtivacao.php?email=$email';</script>";
					}else{
						//mensagem exibida caso ocorra algum erro na execução do comando sql
						echo "<script>alert('Erro ao criar a conta!');</script>";
						echo "Erro: ". $SQL. "<br>" . $conn->error;
					}
				}
			}
		}

		public function ativarUsuario($usuario, $conn){
			$SQL = "UPDATE tb_usuario SET ativo = 1 WHERE usuario = '".$usuario."'";
			$result = $conn->query($sql);

			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				echo "<script>alert('Sua conta foi ativada com sucesso!');</script>";
				$_SESSION['usuario'] = $usuario;
				$_SESSION['nome'] = $nome;
				$_SESSION['sobrenome'] = $sobrenome;
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $senha;
				echo "<script>window.location = 'dashboard.php';</script>";
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao ativar a conta!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
		}
	}
?>
