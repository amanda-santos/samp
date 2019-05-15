<?php
  session_start();
  require_once '../model/usuarioDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["atualizar"])){
    $usuarioDAO = new usuarioDAO();
    $usuarioDAO->editarUsuario($_POST['nome'], $_POST['sobrenome'], $_POST['usuario'], $_POST['email'], $_POST["usuarioAntigo"], $_POST["emailAntigo"]);
  }

?> 