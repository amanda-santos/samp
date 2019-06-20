<?php
  session_start();
  require_once '../../model/product_backlog/productBacklogDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["atualizar"])){
    $productBacklogDAO = new productBacklogDAO();
    $productBacklogDAO->editarEstoria($_POST['nome'], $_POST['descricao'], $_GET['idEstoria'], $_GET['idProjeto']);
  }

?> 