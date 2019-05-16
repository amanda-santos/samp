<?php
	require_once 'sprintBacklog.php';
	require_once 'Estoria.php';

	class sprintBacklogDAO{

		function selecionarSprintBacklog($estoria_id){
			include 'conexao/conecta.php';
			//define o comando sql para seleção
			$SQL = "SELECT * FROM estoria AS e JOIN nivel_dificuldade AS nd ON e.NivelDificuldade_id = nd.id JOIN situacao AS s ON e.Situacao_id = s.id WHERE Projeto_id = '".$estoria_id."' AND sprint_backlog = 1;";
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
					$estorias -> append($estoria);
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
