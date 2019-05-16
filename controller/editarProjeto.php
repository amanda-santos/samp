<?php
  session_start();
  require_once '../model/projetoDAO.php';

  //Criando e Instanciando o objeto
  if (isset($_POST["editar_projeto"])){
    $projetoDAO = new projetoDAO();
    $projetoDAO->editarProjeto($_POST['nome'], $_POST['descricao'], $_GET['id']);
  }

?> 