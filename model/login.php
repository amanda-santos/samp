<?php 
include("conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados

if (isset($_POST["entrar"])) {

	$usuario = trim(strip_tags($_POST['usuario'])); //trim remove espaços a mais e strip_tags remove tags html e outros códigos
	$senha = trim(strip_tags($_POST['senha']));
	$senhaCrip = base64_encode($senha);

	$sql = "SELECT * FROM usuario WHERE usuario = '" . $usuario . "' AND senha = '" . $senhaCrip. "';";
	$resultado = $conn->query($sql);

	if ($resultado->num_rows > 0) { //SE O USUÁRIO E SENHA FOREM VÁLIDOS

		$linha = $resultado->fetch_assoc();
		$ativo = $linha["ativo"];

		if($ativo == 1){ //se o status do usuário for ativo
			$_SESSION['usuario'] = $usuario;
			$_SESSION['nome'] = $nome;
			$_SESSION['sobrenome'] = $sobrenome;
			$_SESSION['email'] = $email;
			$_SESSION['senha'] = $senha;
			header('location:../view/dashboard.php');

		}else{
			//REDIRECIONA PARA A PAGINA INICIAL REPORTANDO O ERRO
			$_SESSION['erro']='Erro';
			echo "<script>alert('Erro no login. Tente novamente.');</script>";
			echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
		}

	}else{

		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		echo "<script>alert('Erro no login. Tente novamente.');</script>";
		echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
	}

}
  
?>