<?php
  session_start();
  require_once '../model/estoriaDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
  	$id = utf8_decode (strip_tags(trim($_GET['id'])));
    $estoriaDAO = new estoriaDAO();
    $estoriaDAO->persistirEstoria($_POST['nome'], $_POST['descricao'], $id);
  }
?>