<?php
  session_start();
  require_once '../model/estoriaDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
    $idProjeto = $_GET["idProjeto"];

    $estoriaDAO = new estoriaDAO();
    $nivel_dificuldade = $_POST['nivel_dificuldade'];

    $estoriaDAO->persistirEstoriaSprintBacklog($idProjeto, $_POST['id_estoria_cadastrada'], $nivel_dificuldade, $_POST['duracao']);
    $estoriaDAO->persistirEstoriaUsuario($idProjeto, $_POST['id_responsavel'], $_POST['id_estoria_cadastrada']);
    exit;
  }
?>