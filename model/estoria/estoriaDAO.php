<?php
	require_once 'Estoria.php';

	class estoriaDAO{

		public function editarSituacao($situacao,$estoria_id,$projeto_id){
			include("../../model/conexao/conecta.php");
			$sql = "UPDATE estoria set Situacao_id= ".$situacao." WHERE id = '".$estoria_id."'";
			//echo "<script>alert(".$sql.");</script>";
			if ($conn->query($sql) === TRUE) {
		      //echo "<script>alert('A situação foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../../controller/projeto/dashboardProjeto.php?id=".$projeto_id."';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		}
		
		function selecionarEstoria($id){
			include("../../model/conexao/conecta.php");
			require_once '../../model/usuario/Usuario.php';
			//define o comando sql para inserção
			$SQL = "SELECT * FROM estoria AS e WHERE e.id = " . $id;
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estoria->setId($exibir["id"]);
					$estoria->setNivelDificuldade($exibir["NivelDificuldade_id"]);
					$estoria->setDuracao($exibir["duracao"]);
					$SQL2 = "SELECT nome, sobrenome, email, usuario, scrum_master 
							 FROM usuario_estoria AS UE
							 JOIN usuario AS U ON U.usuario = UE.Usuario_usuario 
							 JOIN usuario_projeto AS UP ON UE.Usuario_usuario = UP.Usuario_usuario 
							 WHERE Estoria_id = ".$exibir["id"]."
							 GROUP BY usuario;";

					$result_responsaveis = $conn->query($SQL2);

					if ($result_responsaveis->num_rows > 0){

						$responsaveis = new ArrayObject();

						while ($exibir_responsaveis = $result_responsaveis->fetch_assoc()){
							$usuario = new Usuario();
							$usuario->setNome($exibir_responsaveis["nome"]);
					        $usuario->setSobrenome($exibir_responsaveis["sobrenome"]); 
					        $usuario->setEmail($exibir_responsaveis["email"]);
					        $usuario->setUsuario($exibir_responsaveis["usuario"]);
					        $usuario->setScrumMaster($exibir_responsaveis["scrum_master"]);
					        $responsaveis->append($usuario);
						} // fim while responsaveis

						$estoria->setResponsaveis($responsaveis);
					}
					return $estoria;
				}
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao selecionar estoria!');</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
			$conn->close();
		}
		
		function selecionarEstorias(){
			include("../../model/conexao/conecta.php");
			//define o comando sql para inserção
			$SQL = "SELECT * FROM estoria AS e JOIN usuario_estoria AS ue ON e.id = ue.Estoria_id WHERE e.id = " . $id;
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				$estorias = new ArrayObject();
				//verifica se o comando foi executado com sucesso
				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estorias -> append($estoria);
				}
				return $estorias;
			}else{
				$estorias = new ArrayObject();
				return $estorias;
			}
			$conn->close();
		}
		
	}	

?>
