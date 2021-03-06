<?php
	require_once 'SprintBacklog.php';
	require_once '../../model/estoria/Estoria.php';
	require_once '../../model/usuario/Usuario.php';

	class sprintBacklogDAO{

		public static function persistirEstoria($responsaveis, $projeto_id, $id_estoria, $nivel_dificuldade, $duracao){
			include("../../model/conexao/conecta.php");
			//define o comando sql para inserção
			$SQL = "UPDATE estoria SET duracao = '".$duracao."', niveldificuldade_id = ".$nivel_dificuldade.", situacao_id = 1, sprint_backlog = 1 WHERE id = ".$id_estoria.";";
			if ($conn->query($SQL) === TRUE){
				//verifica se o comando foi executado com sucesso
				foreach($responsaveis as $responsavel){
					$SQL2 = "INSERT INTO usuario_estoria VALUES ('".$responsavel."',".$id_estoria.")";
					if ($conn->query($SQL2) === TRUE){
						//echo "<script>alert('Estória cadastrada no Sprint Backlog com sucesso!');</script>";
						echo "<script>window.location = '../../controller/projeto/dashboardProjeto.php?id=$projeto_id';</script>";
					}else{
						//mensagem exibida caso ocorra algum erro na execução do comando sql
						echo "<script>alert('Erro ao adicionar estória ao Sprint Backlog!');</script>";
						echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
					}
				}
			}
			$conn->close();
		}

		function editarEstoria($nivel_dificuldade, $duracao, $id_estoria, $projeto_id){
			include("../../model/conexao/conecta.php");
			$sql = "UPDATE estoria SET niveldificuldade_id = ".$nivel_dificuldade.", duracao = ".$duracao." WHERE id = ".$id_estoria.";";
		    //echo "<script>alert(".$sql.");</script>";
		    if ($conn->query($sql) === TRUE) {
		      echo "<script>alert('A estória foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../../controller/projeto/dashboardProjeto.php?id=".$projeto_id."';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		}

		function excluirUsuarioResponsavel($idProjeto, $usuario, $idEstoria){
			include("../../model/conexao/conecta.php");

			$SQL = "SELECT * FROM usuario_estoria 
				WHERE Estoria_id = ".$idEstoria.";";
				$result_responsaveis = $conn->query($SQL);
				if ($result_responsaveis->num_rows > 1){
					
					$sql = " DELETE FROM usuario_estoria WHERE Usuario_usuario = '".$usuario."' AND Estoria_id = ".$idEstoria.";";
					if ($conn->query($sql) === TRUE) { //se o comando funcionou
						echo "<script>alert('O usuário foi removido com sucesso.');</script>";
						echo "<script>window.location = '../../controller/projeto/dashboardProjeto.php?id=$idProjeto';</script>";
					}
					else{ //se o comando não funcionou
					echo "<script>alert('Erro ao remover usuário!');</script>";
					echo "Erro: ". $sql. "<br>" . $conn->error;
					}
				}else{
					echo "<script>alert('ERRO: A estória precisa conter ao menos um usuário como responsável.');</script>";
					echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
				}
			

		}	

		function excluirEstoria($id_estoria,$projeto_id){
			include("../../model/conexao/conecta.php");
			$sql = "UPDATE estoria SET duracao = null, niveldificuldade_id = null, situacao_id = null, sprint_backlog = 0 WHERE id = ".$id_estoria.";";
			if ($conn->query($sql) === TRUE) { //se o comando funcionou

				$sql2 = "DELETE FROM usuario_estoria WHERE Estoria_id = ".$id_estoria.";";

				if ($conn->query($sql2) === TRUE) { //se o comando funcionou
					echo "<script>window.location = '../../controller/projeto/dashboardProjeto.php?id=$projeto_id';</script>";
				}else{ //se o comando não funcionou
					echo "<script>alert('Erro ao excluir estória!');</script>";
					echo "Erro: ". $sql2. "<br>" . $conn->error;
				}

			}else{ //se o comando não funcionou
				echo "<script>alert('Erro ao excluir estória!');</script>";
				echo "Erro: ". $s1l. "<br>" . $conn->error;
			}
		}

		function selecionarSprintBacklog($projeto_id){
			include("../../model/conexao/conecta.php");
			$SQL = "SELECT e.id, e.nome, e.descricao, e.duracao, nd.nivel_dificuldade, s.situacao 
					FROM estoria AS e 
					JOIN nivel_dificuldade AS nd ON e.NivelDificuldade_id = nd.id 
					JOIN situacao AS s ON e.Situacao_id = s.id 
					WHERE Projeto_id = '".$projeto_id."' 
					AND sprint_backlog = 1 
					AND Situacao_id != 5;";
					
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

						$SQL3 = "SELECT T.id, T.nome, S.situacao
								 FROM tarefa AS T 
								 JOIN estoria AS E ON E.id = T.Estoria_id
								 JOIN situacao AS S ON T.Situacao_id = S.id 
								 WHERE T.Estoria_id = " . $exibir["id"]; // nesse select foi preciso pegar dados das tabelas estória, tarefa e situação, atenção às chaves estrangeiras entre as tabelas

						//echo $SQL3;

						$result_tarefa = $conn->query($SQL3);

						if ($result_tarefa->num_rows > 0){ // foi preciso adicionar esse if pra testar se houve algum resultado da consulta

							$tarefas = new ArrayObject(); // instanciando um arrayobject (lista) de tarefas

							while ($exibir_tarefa = $result_tarefa->fetch_assoc()){

								// aqui você não instancia um objeto da classe Estoria, e sim da classe Tarefa

								// instanciando uma Tarefa
								$tarefa = new Tarefa(); 

								// atribuindo valores do banco para a Tarefa
								$tarefa->setId($exibir_tarefa["id"]);
						        $tarefa->setNome($exibir_tarefa["nome"]); 
						        $tarefa->setSituacao($exibir_tarefa["situacao"]);

						        // adicionando a Tarefa selecionada à lista de tarefas
						        $tarefas->append($tarefa);
								
							} // fim while tarefas

							$estoria->setTarefas($tarefas); // adicionando a lista de tarefas à estória

						} // fim if tarefas

					} // fim if responsáveis

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
