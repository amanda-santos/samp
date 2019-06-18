<?php
	require_once 'SprintBacklog.php';
	require_once '../../model/estoria/Estoria.php';
	require_once '../../model/usuario/Usuario.php';

	class sprintBacklogDAO{

		function selecionarSprintBacklog($projeto_id){
			include("../../model/conexao/conecta.php");
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