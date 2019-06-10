<?php
	class meuTrabalho{
		private $id, $nome, $descricao, $duracao, $nivel_dificuldade, $situacao, $responsaveis, $tarefa;

		public function __construct($paramId='', $paramNome='', $paramDesc='', $paramDuracao='', $paramNivelDificuldade='', $paramSituacao=''){
			$this->id = $paramId;
		    $this->nome = $paramNome;
		    $this->situacao_id = $paramSituacaoId;
		    $this->estoria_id = $paramEstoriaId;
			
		}

		public function setId($id){
			$this->id=$id;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setSituacao($situacao){
			$this->situacao_id=$situacao;
		}
		public function setEstoria($estoria){
			$this->estoria_id=$estoria;
		}

		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getSituacao(){
			return $this->situacao_id;
		}
		public function getEstoria(){
			return $this->estoria_id;
		}
	}
?>
