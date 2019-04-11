<?php
	include 'conexao/conecta.php';

	class Usuario{
		private $nome, $sobrenome, $usuario, $email, $senha, $ativo;

		public function Usuario($nome, $sobrenome, $usuario, $email, $senha){
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->usuario = $usuario;
			$this->email = $email;
			$this->senha = $senha;
			$this->ativo = 0;
		}

		public function inserirUsuario($conn){
			$sql = "SELECT * FROM tb_usuario WHERE usuario = '".$this->usuario."';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { // se achar algum registro
				echo "<script>alert('Esse nome de usuário já existe.');</script>";
				echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
			}else{
				$SQL = "SELECT * FROM tb_usuario WHERE email = '". $this->email . "';";
				$result = $conn->query($SQL);
				if ($result->num_rows > 0) { // se achar algum registro
					echo "<script>alert('Já existe uma conta cadastrada com esse e-mail.');</script>";
					echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
				} else {
				//define o comando sql para inserção
					$SQL = "INSERT INTO tb_usuario (usuario, senha, nome, sobrenome, email, ativo) VALUES ('".$this->usuario."','".$this->senha."','".$this->nome."','".$this->sobrenome."','".$this->email."',".$this->ativo.")";

					if ($conn->query($SQL) === TRUE){
						//verifica se o comando foi executado com sucesso
						echo "<script>alert('Sua conta foi criada com sucesso, acesse o email para ativar!');</script>";
						//$_SESSION['usuario'] = $this->$usuario;
						//$_SESSION['nome'] = $this->$nome;
						echo "<script>window.location = 'enviarEmailAtivacao.php?email='". $this->email . "'';</script>";
						echo "<script>window.location = 'index.php'</script>";
					}else{
						//mensagem exibida caso ocorra algum erro na execução do comando sql
						echo "<script>alert('Erro ao criar a conta!');</script>";
						echo "Erro: ". $SQL. "<br>" . $conn->error;
					}
				}
			}
		}

		public function ativarUsuario(){
			$SQL = "UPDATE tb_usuario SET ativo = 1 WHERE usuario = '$this->$usuario'";
			$result = $conn->query($sql);

			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				echo "<script>alert('Sua conta foi ativada com sucesso!');</script>";
				$_SESSION['usuario'] = $this->usuario;
				$_SESSION['nome'] = $this->nome;
				echo "<script>window.location = 'dashboard.html';</script>";
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao ativar a conta!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
		}
	}
?>