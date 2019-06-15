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
		$senha = $exibir["senha"];
	} // fim while
} else { //se não achar nenhum registro
	echo "<script>alert('Não existe nenhuma conta cadastrada com o e-mail informado.');</script>";
	echo "<script>window.location = '../../view/usuario/criarConta.html';</script>";
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
$mailer->Subject = 'Ative sua conta no SAMP';
$mailer->Body = 'Prezado (a) ' . $nome . ',

para autenticar sua conta na ferramenta SAMP, favor clicar no link a seguir: https://localhost/samp/controller/usuario/ativarUsuario.php?usuario=' . $usuario . '

Atenciosamente,
				
Equipe SAMP';

if(!$mailer->Send()){
    echo "Mailer Error: " . $mailer->ErrorInfo;
} else {
    echo "<script>alert('Acesse seu e-mail e verifique a sua conta para começar a usar o SAMP.');</script>";
	echo "<script>window.location = '../../view/index.html';</script>";
}
?>
