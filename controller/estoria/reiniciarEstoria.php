<?php
  session_start();
  require_once '../../model/estoria/estoriaDAO.php';

  //Criando e Instanciando o objeto
  
    $estoriaDAO = new estoriaDAO();
    $estoriaDAO->editarSituacao(2, $_GET['idEstoria'], $_GET['idProjeto']);
  

?>
