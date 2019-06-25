<?php
	require_once 'MeuTrabalho.php';
	require_once '../../model/estoria/Estoria.php';
	require_once '../../model/usuario/Usuario.php';
	require_once '../../model/estoria/tarefa/Tarefa.php';

	class meuTrabalhoDAO{

		function selecionarMeuTrabalho($projeto_id){

			include("../../model/conexao/conecta.php");
			
			$SQL = "SELECT e.id, e.nome, e.descricao, e.duracao, nd.nivel_dificuldade, s.situacao 
					FROM estoria AS e 
					JOIN nivel_dificuldade AS nd ON e.NivelDificuldade_id = nd.id 
					JOIN situacao AS s ON e.Situacao_id = s.id
					JOIN usuario_estoria AS ue ON e.id = ue.Estoria_id 
					WHERE ue.Usuario_usuario = '".$_SESSION["usuario"]."' 
					AND Projeto_id = '" . $projeto_id . "'
                    AND Situacao_id != 5"; // aqui faltou selecionar somente as estórias que são do projeto que está sendo exibido no momento (AND Projeto_id = '" . $projeto_id . "'"), além de fazer JOIN com as outras tabelas (nível de dificuldade, situação)

			//echo $SQL;

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
					
					$SQL2 = "SELECT nome, sobrenome, email, usuario 
							 FROM usuario_estoria 
							 JOIN usuario ON usuario = Usuario_usuario 
							 WHERE Estoria_id = ".$exibir["id"]."
							 AND Usuario_usuario = '".$_SESSION["usuario"]."';";

					//echo $SQL2;

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
						} // fim while responsaveis

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

					} // fim if responsaveis
					
					$estorias->append($estoria); // adicionando a estória à lista de estórias

				} // fim while estorias

				$meuTrabalho = new MeuTrabalho($estorias); // instanciando o objeto meuTrabalho com a lista de estorias selecionadas
				return $meuTrabalho; // retornando o objeto meuTrabalho

			}else{ // fim if estorias

				// caso não exista nenhuma estória na seção meuTrabalho

				$meuTrabalho = new MeuTrabalho(); // instanciando o objeto meuTrabalho sem nenhuma estória
				return $meuTrabalho; // retornando o objeto meuTrabalho
			}

			$conn->close();
		}
	}
?>