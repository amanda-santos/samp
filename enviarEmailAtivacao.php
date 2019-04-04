<?php

header('Content-Type: text/html; charset=utf-8');

include("conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados

$email = utf8_decode (strip_tags(trim($_GET['email'])));

$sql = "SELECT * FROM tb_usuario WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
	while ($exibir = $result->fetch_assoc()){
		$nome = $exibir["nome"];
		$usuario = $exibir["usuario"];
		$senha = $exibir["senha"];
	} // fim while
} else { //se não achar nenhum registro
	echo "<script>alert('Não existe nenhuma conta cadastrada com o e-mail informado.');</script>";
	echo "<script>window.location = 'index.php';</script>";
	exit;
}
		
		
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = gethostbyname('smtp.gmail.com');
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "samp.ferramenta@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "samp2019";

//Set who the message is to be sent from
$mail->setFrom('samp.ferramenta@gmail.com', 'SAMP');

//Set an alternative reply-to address
//$mail->addReplyTo('damonsurvives@gmail.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($email, $nome);

//Set the subject line
$mail->Subject = 'SAMP: Ativação de conta';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
//$mail->Body = 'Ola ' . $nome . '! Seu nome de usuário no site www.contextodoenem.ourobranco.ifmg.edu.br e ' . $usuario . ' e sua senha é ' . $senha . '. Atenciosamente, Equipe do projeto ConTEXTO';

$mail->Body .= "Prezado (a) $nome,

para autenticar sua conta na ferramenta SAMP, favor clicar no link abaixo:
ativarConta.php?id='$usuario'

Atenciosamente,
				
Equipe SAMP";
		
//Attach an image file
//$mail->addAttachment('');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "<script>alert('Solicitação enviada com sucesso! Acesse seu e-mail para recuperar sua senha.');</script>";
	echo "<script>window.location = 'index.php';</script>";
}
?>