<?php 
include("conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados

$conecta = mysqli_connect($servername, $username, $password) or die
("Sem conexão com o servidor");
$select=mysqli_select_db($conecta,$dbname) or die("Sem acesso ao DB, Entre em 
contato com o Administrador");
session_start();

$login = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$senhacrip = base64_encode($senha);

$search = "SELECT * FROM `tb_usuario` WHERE `usuario` = '$login' AND `senha`= '$senhacrip'";
$result = mysqli_query($conecta,$search);


if(mysqli_num_rows ($result) > 0 )
{
	
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
header('location:dashboard.html');
}
else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  header('location:criarConta.php');
}
  
?>