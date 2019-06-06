<?php
	require_once 'sprintBacklog.php';
	require_once 'Estoria.php';
	require_once 'Usuario.php';

	class meuTrabalhoDAO{

		function selecionarMeuTrabalho($projeto_id){
			include 'conexao/conecta.php';
			//define o comando sql para inserção
			$SQL = "SELECT * FROM estoria AS e JOIN usuario_estoria AS ue ON e.id = ue.Estoria_id WHERE ue.Usuario_usuario = '".$_SESSION["usuario"]."'";
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
				$estorias = new ArrayObject();
				//verifica se o comando foi executado com sucesso
				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();
					$estoria->setId($exibir["id"]);
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estoria->setDuracao($exibir["duracao"]);
					$estoria->setNivelDificuldade($exibir["nivel_dificuldade"]);
					$estoria->setSituacao($exibir["situacao"]);
					
					$SQL2 = "SELECT nome, sobrenome FROM usuario_estoria JOIN usuario ON usuario = Usuario_usuario where Estoria_id = ".$exibir["id"].";";
					$result_responsaveis = $conn->query($SQL2);
					if ($result_responsaveis->num_rows > 0){
						
						while ($exibir_responsaveis = $result_responsaveis->fetch_assoc()){
							$estoria->setResponsaveis($exibir_responsaveis["nome"] . " " . $exibir_responsaveis["sobrenome"] );
						}
					$SQL3 = "SELECT id, nome, situacao_id, estoria_id FROM tarefa JOIN estoria AS e ON e.id = Usuario_usuario where Estoria_id = ".$exibir["id"].";";
						$result_tarefa = $conn->query($SQL3);
						$tarefa = new ArrayObject();
						while ($exibir_tarefa = $result_tarefa->fetch_assoc()){
							$estoria = new Estoria();
							$estoria->setId($exibir_tarefa["id"]);
					        $estoria->setNome($exibir_tarefa["nome"]); 
					        $estoria->setSituacao($exibir_tarefa["situacao"]);
							
					        $estoria->append($estoria);
							
						}
						
							$estoria->setTarefa;
					}
					
					$estorias ->append($estoria);
			}else{
				$estorias = new ArrayObject();
				return $estorias;
			}
			$conn->close();
		}
	}
?>