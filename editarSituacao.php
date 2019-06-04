<?php
  session_start();
  require_once '../model/estoriaDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["atualizar"])){
    $estoriaDAO = new estoriaDAO();
    $estoriaDAO->editarEstoria($_POST['situacao'], $_GET['idEstoria'], $_GET['idProjeto']);
  }

?>