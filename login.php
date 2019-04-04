<?php 
include("conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados

//$conecta = mysqli_connect($servername, $username, $password) or die("Sem conexão com o servidor"); // isso já é feito pelo conexao/conecta
//$select=mysqli_select_db($conecta,$dbname) or die("Sem acesso ao DB, Entre em contato com o Administrador"); // isso já é feito pelo conexao/conecta

if (isset($_POST["entrar"])) {

	$usuario = trim(strip_tags($_POST['usuario'])); //trim remove espaços a mais e strip_tags remove tags html e outros códigos
	$senha = trim(strip_tags($_POST['senha']));
	$senhaCrip = base64_encode($senha);

	$sql = "SELECT * FROM tb_usuario WHERE usuario = '" . $usuario . "' AND senha = '" . $senhaCrip. "';";
	$resultado = $conn->query($sql);

	if ($resultado->num_rows > 0) { //SE O USUÁRIO E SENHA FOREM VÁLIDOS
		$_SESSION['usuario'] = $usuario;
		header('location:dashboard.php');
	}else{

		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		echo "<script>alert('Erro no login. Tente novamente.');</script>";
		echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";

	}

}
  
?>
