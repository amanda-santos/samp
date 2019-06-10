<?php
  session_start();
  require_once '../model/tarefaDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["atualizarTarefa"])){
    $tarefaDAO = new tarefaDAO();
    $tarefaDAO->editarSituacao($_POST['situacao'], $_GET['id'], $_GET['idProjeto']);
  }

?>
