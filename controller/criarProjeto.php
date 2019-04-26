<?php
  require_once '../model/Projeto.php';
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
    $projeto = new Projeto($_POST['nome'], $_POST['descricao'], $id);
    $projeto->cadastrarProjeto();
    function exibir_projeto(){
	$model= new Model();
	$projeto = $model->carregar_projeto(); 
	$this->load->view("projeto.html", $projeto);  
	}
  }
?>
