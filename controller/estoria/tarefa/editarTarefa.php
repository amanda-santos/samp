<?php
  session_start();
  require_once '../../../model/estoria/tarefa/tarefaDAO.php';

  if (isset($_POST["atualizar"])){
    $tarefaDAO = new tarefaDAO();
    $tarefaDAO->editarTarefa($_POST['nome'], $_GET['idTarefa'], $_GET['idProjeto']);
  }
?>