<?php
	require_once '../model/ProductBacklog.php';
	class Estoria{
		private $id, $nome, $descricao, $duracao, $nivel_dificuldade, $situacao;

		public function __construct($paramId='', $paramNome='', $paramDesc='', $paramDuracao='', $paramNivelDificuldade='', $paramSituacao=''){
			$this->id = $paramId;
		    $this->nome = $paramNome;
		    $this->descricao = $paramDesc;
		    $this->duracao = $paramDuracao;
		    $this->nivel_dificuldade = $paramNivelDificuldade;
		    $this->situacao = $paramSituacao;
		}

		public function setId($id){
			$this->id=$id;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setDesc($descricao){
			$this->descricao=$descricao;
		}
		public function setDuracao($duracao){
			$this->duracao=$duracao;
		}
		public function setNivelDificuldade($nivel_dificuldade){
			$this->nivel_dificuldade=$nivel_dificuldade;
		}
		public function setSituacao($situacao){
			$this->situacao=$situacao;
		}

		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getDesc(){
			return $this->descricao;
		}
		public function getDuracao(){
			return $this->duracao;
		}
		public function getNivelDificuldade(){
			return $this->nivel_dificuldade;
		}
		public function getSituacao(){
			return $this->situacao;
		}
	}
?>