<?php
	require_once 'sprintBacklog.php';
	require_once 'Estoria.php';
	require_once 'Usuario.php';

	class sprintBacklogDAO{

		function selecionarSprintBacklog($projeto_id){
			include 'conexao/conecta.php';
			$SQL = "SELECT e.id, e.nome, e.descricao, e.duracao, nd.nivel_dificuldade, s.situacao FROM estoria AS e JOIN nivel_dificuldade AS nd ON e.NivelDificuldade_id = nd.id JOIN situacao AS s ON e.Situacao_id = s.id WHERE Projeto_id = '".$projeto_id."' AND sprint_backlog = 1;";
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0){
				$estorias = new ArrayObject();

				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();

					$estoria->setId($exibir["id"]);
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estoria->setDuracao($exibir["duracao"]);
					$estoria->setNivelDificuldade($exibir["nivel_dificuldade"]);
					$estoria->setSituacao($exibir["situacao"]);
					
					$SQL2 = "SELECT * FROM usuario_estoria where Estoria_id = ".$exibir["id"].";";
					$result_responsaveis = $conn->query($SQL2);
					if ($result_responsaveis->num_rows > 0){
						while ($exibir_responsaveis = $result_responsaveis->fetch_assoc()){
							$estoria->setResponsaveis($exibir_responsaveis["Usuario_usuario"]);
						}
					}
					$estorias ->append($estoria);
				}
				$sprintBacklog = new sprintBacklog($estorias);
				return $sprintBacklog;
			}else{
				$sprintBacklog = new sprintBacklog();
				return $sprintBacklog;
			}
			$conn->close();
		}
	}
?>
