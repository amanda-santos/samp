<?php

	class projetoModel{
	
		public static function persistirProjeto($nome, $descricao, $id){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "INSERT INTO projeto (nome, descricao, id) VALUES ('".$nome."','".$descricao."','".$id."');";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				$SQL = "INSERT INTO usuario_projeto (scrum_master, usuario_usuario, projeto_id) VALUES (1,'".$_SESSION['usuario']."','".$id."');";
				if ($conn->query($SQL) === TRUE){
					echo "<script>alert('Projeto cadastrado com sucesso! Código do projeto: $id');</script>";
					echo "<script>window.location = '../view/projetos.php';</script>";
				}
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao cadastrar projeto!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}
	function carregar_projeto(){
		$banco = new mysqli("nome","descricao");
		$sql="Select * From projeto";
		$resultadoConsulta=$banco->query($sql);
		$projeto = array();
		$i=0;
        while (!empty($resultadoConsulta[$i])) {
            $row = $resultadoConsulta[$i]=
            $projeto[] = $row;
            $i++;
        }

		return $resultadoConsulta;
	}

	function entrar_projeto($projeto_id){
	include 'conexao/conecta.php';
	  	$sql = "SELECT * FROM projeto WHERE id='".$projeto_id."'";
		  	$result = $conn->query($sql);
		  		if ($result->num_rows > 0) { // Se o codigo de verificação do projeto existir.
		  			$SQL = "INSERT INTO usuario_projeto (scrum_master, Usuario_usuario, Projeto_id) VALUES (0,'".$_SESSION['usuario']."','".$projeto_id."');";
		  			if ($conn->query($SQL) === TRUE){
					echo "<script>window.location = '../view/projetos.php';</script>";
					}else{
						//mensagem exibida caso ocorra algum erro na execução do comando sql
						echo "<script>alert('Erro ao entrar no projeto!');</script>";
						echo "Erro: ". $SQL. "<br>" . $conn->error;
					}
				  	else {
		  			echo "<script>alert('Id do projeto não foi encontrado!');</script>";
		    		echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
		  	}
		
		}
	}
}
?>


QUERO 2, 1 pode fazer com bife de 80 centavos e o outro faz com aquele bife que