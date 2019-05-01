<?php
  require_once '../model/Projeto.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["entrar_projeto"])){
    
    $projeto = new Projeto(); 

    $projeto->entrarProjeto($_POST['projeto_id']);
  }
?>