<?php
  require_once '../model/Estoria.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
  	$id = utf8_decode (strip_tags(trim($_GET['id'])));
    $estoria = new Estoria($_POST['nome'], $_POST['descricao'], $id);
    $estoria->cadastrarEstoria();
  }
?>