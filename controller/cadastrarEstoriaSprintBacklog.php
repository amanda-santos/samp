<?php
  session_start();
  require_once '../model/estoriaDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
    $estoriaDAO = new estoriaDAO();
    $nivel_dificuldade = $_POST['nivel_dificuldade'];

    $estoriaDAO->persistirEstoriaSprintBacklog($_POST['id_estoria_cadastrada'], $nivel_dificuldade, $_POST['duracao']);
    $estoriaDAO->persistirEstoriaUsuario($_POST['id_responsavel'], $_POST['id_estoria_cadastrada']);
    exit;
  }
?>