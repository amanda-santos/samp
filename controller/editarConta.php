<?php
  require_once '../model/Usuario.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["atualizar"])){
    $senha = base64_encode($_POST['senha']);
    $usuario = new Usuario($_POST['nome'], $_POST['sobrenome'], $_POST['usuario'], $_POST['email'], $senha);
    $usuario->editarConta($_POST["usuarioAntigo"], $_POST["emailAntigo"]);
  }
?>