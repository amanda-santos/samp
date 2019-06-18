<?php
	require_once 'Finalizado.php';
	require_once '../../model/estoria/Estoria.php';
	require_once '../../model/estoria/Tarefa.php';

	class finalizadoDAO{

		function selecionarFinalizado($projeto_id){

			include("../../model/conexao/conecta.php");
			
			$SQL = "SELECT e.id, e.nome, e.descricao, e.duracao, nd.nivel_dificuldade 
					FROM estoria AS e 
					JOIN nivel_dificuldade AS nd ON e.NivelDificuldade_id = nd.id 
					JOIN situacao AS s ON e.Situacao_id = s.id
					WHERE Projeto_id = '" . $projeto_id . "' AND finalizado = 1;";
			$result = $conn->query($SQL);
    		if ($result->num_rows > 0) {
				$estorias = new ArrayObject();
				while ($exibir = $result->fetch_assoc()){
					$estoria = new Estoria();
					$estoria->setId($exibir["id"]);
					$estoria->setNome($exibir["nome"]);
					$estoria->setDesc($exibir["descricao"]);
					$estoria->setDuracao($exibir["duracao"]);
					$estoria->setNivelDificuldade($exibir["nivel_dificuldade"]);

					$SQL2 = "SELECT nome, sobrenome, email, usuario FROM usuario_estoria JOIN usuario ON usuario = Usuario_usuario where Estoria_id = ".$exibir["id"].";";
					$result_responsaveis = $conn->query($SQL2);
					if ($result_responsaveis->num_rows > 0){
						$responsaveis = new ArrayObject();
						while ($exibir_responsaveis = $result_responsaveis->fetch_assoc()){
							$usuario = new Usuario();
							$usuario->setNome($exibir_responsaveis["nome"]);
					        $usuario->setSobrenome($exibir_responsaveis["sobrenome"]); 
					        $usuario->setEmail($exibir_responsaveis["email"]);
					        $usuario->setUsuario($exibir_responsaveis["usuario"]);

					        $responsaveis->append($usuario);
						}
						$estoria->setResponsaveis($responsaveis);

						$SQL3 = "SELECT T.id, T.nome, S.situacao
								 FROM tarefa AS T 
								 JOIN estoria AS E ON E.id = T.Estoria_id
								 JOIN situacao AS S ON T.Situacao_id = S.id 
								 WHERE T.Estoria_id = " . $exibir["id"];
						$result_tarefa = $conn->query($SQL3);
						if ($result_tarefa->num_rows > 0){
							$tarefas = new ArrayObject();
							while ($exibir_tarefa = $result_tarefa->fetch_assoc()){
								$tarefa = new Tarefa(); 
								$tarefa->setId($exibir_tarefa["id"]);
						        $tarefa->setNome($exibir_tarefa["nome"]); 
						        $tarefa->setSituacao($exibir_tarefa["situacao"]);

						        $tarefas->append($tarefa);
							}
							$estoria->setTarefas($tarefas);
						}
					}
					$estorias->append($estoria);
				}
				$finalizado = new Finalizado($estorias);
				return $finalizado;
			}else{
				$finalizado = new finalizado();
				return $finalizado;
			}
			$conn->close();
		}
	}
?>