<?php

header('Content-Type: text/html; charset=utf-8');

include("../../model/conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados

$email = utf8_decode (strip_tags(trim($_GET['email'])));
$sql = "SELECT * FROM usuario WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
	while ($exibir = $result->fetch_assoc()){
		$nome = $exibir["nome"];
		$usuario = $exibir["usuario"];
		$senha = base64_decode($exibir["senha"]);
	} // fim while
} else { //se não achar nenhum registro
	echo "<script>alert('Não existe nenhuma conta cadastrada com o e-mail informado.');</script>";
	echo "<script>window.location = '../../view/usuario/recuperarSenha.html';</script>";
	exit;
}

require_once("../../phpmailer/class.phpmailer.php");
require_once("../../phpmailer/class.smtp.php");

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 0;
$mailer->Port = 587; //Indica a porta de conexão 
$mailer->SMTPSecure = 'tls';
$mailer->Host = 'smtp.gmail.com';
$mailer->SMTPAuth = true; //define se haverá ou não autenticação 
$mailer->Username = 'samp.ferramenta@gmail.com'; //Login de autenticação do SMTP
$mailer->Password = 'samp2019'; //Senha de autenticação do SMTP
$mailer->FromName = 'SAMP (Scrum - Agile - Management - Planning)'; //Nome que será exibido
$mailer->From = 'samp.ferramenta@gmail.com'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
$mailer->AddAddress($email,$nome);
//Destinatários
$mailer->Subject = 'Recupere sua conta no SAMP';
$mailer->Body = 'Prezado (a) ' . $nome . ',

entre com o usuario e a senha abaixo para acessar sua conta na ferramenta SAMP:

Usuario: ' . $usuario . '
Senha: ' . $senha . '

Atenciosamente,
				
Equipe SAMP';

if(!$mailer->Send()){
    echo "Mailer Error: " . $mailer->ErrorInfo;
} else {
    echo "<script>alert('Acesse seu e-mail para recuperar a sua senha.');</script>";
	echo "<script>window.location = '../../view/usuario/login.html';</script>";
}
?>
