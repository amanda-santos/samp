<?php
  session_start();
  require_once '../../model/product_backlog/productBacklogDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
  	$id = utf8_decode (strip_tags(trim($_GET['id'])));
    $productBacklogDAO = new productBacklogDAO();
    $productBacklogDAO->persistirEstoria($_POST['nome'], $_POST['descricao'], $id);
  }
?>