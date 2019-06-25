<?php
  session_start();
  require_once '../../model/sprint_backlog/sprintBacklogDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
    
    $idProjeto = $_GET["idProjeto"];
    $idEstoria = $_GET["id_estoria"];

    $sprintBacklogDAO = new sprintBacklogDAO();
    $nivel_dificuldade = $_POST['nivel_dificuldade'];
    $duracao = $_POST['duracao'];

    if(isset($_POST["responsavel"])){
      $responsaveis = $_POST['responsavel'];
    }

    $sprintBacklogDAO->persistirEstoria($responsaveis, $idProjeto, $idEstoria, $nivel_dificuldade, $duracao);
    exit;
  }
?>
