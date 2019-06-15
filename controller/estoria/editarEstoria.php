<?php
  session_start();
  require_once '../../model/estoria/estoriaDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["atualizar"])){
    $estoriaDAO = new estoriaDAO();
    $estoriaDAO->editarEstoria($_POST['nome'], $_POST['descricao'], $_GET['idEstoria'], $_GET['idProjeto']);
  }

?> 