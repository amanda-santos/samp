<?php
  session_start();
  require_once '../model/estoriaDAO.php';
  //Criando e Instanciando o objeto
  if (isset($_POST["cadastrar_estoria"])){
  	$id = utf8_decode (strip_tags(trim($_GET['id'])));
    $estoriaDAO = new estoriaDAO();
    $nivel_dificuldade = $_POST['nivel_dificuldade'];

    switch ($nivel_dificuldade){
    	case "Baixo":
    		$nivel_dificuldade = 1;
    		break;
    	case "Médio":
    		$nivel_dificuldade = 2;
    		break;
		case "Alto":
			$nivel_dificuldade = 3;
			break;
		case "Muito Alto":
    		$nivel_dificuldade = 4;
    		break;
    }
    $estoriaDAO->persistirEstoriaSprintBacklog($_POST['id_estoria_cadastrada'], $nivel_dificuldade, $_POST['duracao']);
    $estoriaDAO->persistirEstoriaUsuario($_POST['id_responsavel'], $_POST['id_estoria_cadastrada']);
  }
?>