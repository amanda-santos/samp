<?php
  session_start();
  require_once '../model/estoriaDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
    
    $idProjeto = $_GET["idProjeto"];
    $idEstoria = $_GET["id_estoria"];

    $estoriaDAO = new estoriaDAO();
    $nivel_dificuldade = $_POST['nivel_dificuldade'];
    $duracao = $_POST['duracao'];

    if(isset($_POST["responsavel"])){
      $responsaveis = $_POST['responsavel'];
    }

    $estoriaDAO->persistirEstoriaSprintBacklog($responsaveis, $idProjeto, $idEstoria, $nivel_dificuldade, $duracao);
    exit;
  }
?>
