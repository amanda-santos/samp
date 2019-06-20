<?php
  session_start();
  require_once '../../model/estoria/tarefa/tarefaDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["atualizarTarefa"])){
    $tarefaDAO = new tarefaDAO();
    $tarefaDAO->editarSituacao($_POST['situacao'], $_GET['idTarefa'], $_GET['idProjeto']);
  }

?>
