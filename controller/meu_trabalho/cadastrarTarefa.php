<?php
  session_start();
  require_once '../../model/estoria/tarefa/tarefaDAO.php';

 	if (isset($_POST["cadastrar_tarefa"])){
    	$tarefaDAO = new tarefaDAO();
    	$tarefaDAO->persistirTarefa($_POST['nome'], $_GET['idEstoria'], $_GET['idProjeto']);
  	}
?>