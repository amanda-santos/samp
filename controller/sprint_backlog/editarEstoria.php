<?php
  session_start();
  require_once '../../model/sprint_backlog/sprintBacklogDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["atualizar"])){
    $sprintBacklogDAO = new sprintBacklogDAO();
    $sprintBacklogDAO->editarEstoria($_POST['nivel_dificuldade'], $_POST['duracao'], $_GET['idEstoria'], $_GET['idProjeto']);
  }

?>