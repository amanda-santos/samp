<?php
  session_start();
  require_once '../model/estoriaDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
    
    $idProjeto = $_GET["idProjeto"];
    $idEstoria = $_GET["id_estoria"];

    $estoriaDAO = new estoriaDAO();
    $nivel_dificuldade = $_POST['nivel_dificuldade'];

    $estoriaDAO->persistirEstoriaSprintBacklog($_POST['id_responsavel'], $idProjeto, $idEstoria, $nivel_dificuldade, $_POST['duracao']);
    exit;
  }
?>
