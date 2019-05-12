<?php
  session_start();
  require_once '../model/projetoDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["entrar_projeto"])){
    
    $projetoDAO = new projetoDAO(); 

    $projetoDAO->entrarProjeto($_POST['projeto_id']);
  } else {
	echo "<script>window.location = '../view/index.html';</script>";
  }
?>