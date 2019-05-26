<?php
  session_start();
  require_once '../model/tarefaDAO.php';

 	if (isset($_POST["cadastrar_tarefa"])){
    	$tarefaDAO = new tarefaDAO();
    	$tarefaDAO->persistirTarefa($_POST['nome'], $_GET['id'], $_GET['idProjeto']);
  	}
?>