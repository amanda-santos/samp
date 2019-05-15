<?php
  session_start();
  require_once '../model/projetoDAO.php';
  //Criando e Instanciando o objeto
  
  if (isset($_POST["criar_projeto"])){

  	function uniqueAlfa($length=6){
	    $salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$len = strlen($salt);
		$pass = '';
		mt_srand(10000000*(double)microtime());
 		for ($i = 0; $i < $length; $i++){
			$pass .= $salt[mt_rand(0,$len - 1)];
		}
 		return $pass;
	}

    $id = uniqueAlfa();
    $projetoDAO = new projetoDAO();
    $projetoDAO->persistirProjeto($_POST['nome'], $_POST['descricao'], $id);
  } else {
	echo "<script>window.location = '../view/index.html';</script>";
  }
?>
