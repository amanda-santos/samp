<?php
	include("conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados

	if (isset($_POST["cadastrar"])) {

		$sql = "SELECT * FROM tb_usuario WHERE usuario='".$_POST["usuario"]."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { // se achar algum registro
			echo "<script>alert('Esse nome de usuário já existe.');</script>";
			echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
		} else {
			$SQL = "SELECT * FROM tb_usuario WHERE email='".$_POST["email"]."'";
			$result = $conn->query($SQL);
			if ($result->num_rows > 0) { // se achar algum registro
				echo "<script>alert('Já existe uma conta cadastrada com esse e-mail.');</script>";
				echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
			} else {
				$nome = $_POST["nome"];
				$sobrenome = $_POST["sobrenome"];
				$email = $_POST["email"];
				$usuario = $_POST["usuario"];
				$senhaDigitada = $_POST["senha"];
				$senha = base64_encode($senhaDigitada); //codifica a senha

				//define o comando sql para inserção do nome da imagem no banco de dados
				$SQL = "INSERT INTO tb_usuario (usuario, senha, nome, sobrenome, email, ativo) VALUES ('".$usuario."','".$senha."','".$nome."','".$sobrenome."','" . $email."',0)";

				if ($conn->query($SQL) === TRUE){
					//verifica se o comando foi executado com sucesso
					echo "<script>window.location = 'enviarEmailAtivacao.php?email=$email';</script>";
					//echo "<script>alert('Sua conta foi criada com sucesso! Faça a ativação para começar a usar a ferramenta.');</script>";

				}else{
					//mensagem exibida caso ocorra algum erro na execução do comando sql
					echo "<script>alert('Erro ao criar a conta!');</script>";
					echo "Erro: ". $SQL. "<br>" . $conn->error;
				}
			}	
		}
	}
?>
