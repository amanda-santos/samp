<?php
  session_start();
  require_once '../../model/estoria/estoriaDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["atualizar"])){
    $estoriaDAO = new estoriaDAO();
    $estoriaDAO->editarEstoriaSprintBacklog($_POST['nivel_dificuldade'], $_POST['duracao'], $_GET['idEstoria'], $_GET['idProjeto']);
  }

?>