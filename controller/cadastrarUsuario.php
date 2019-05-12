<?php
  require_once '../model/usuarioDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar"])){
    $senha = base64_encode($_POST['senha']);
    $usuario = new usuarioDAO();
    $usuario->persistirUsuario($_POST['nome'], $_POST['sobrenome'], $_POST['usuario'], $_POST['email'], $senha);
  }
?>