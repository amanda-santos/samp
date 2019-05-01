<?php
include "estoriaModel.php";
	class Estoria{
		private $nome, $descricao, $projeto_id;

		public function __construct($paramNome='', $paramDesc='', $paramProjetoId=''){
		    $this->nome = $paramNome;
		    $this->descricao = $paramDesc;
		    $this->projeto_id = $paramProjetoId;
		}

		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setDesc($descricao){
			$this->descricao=$descricao;
		}
		public function setProjetoId($projeto_id){
			$this->projeto_id=$projeto_id;
		}

		public function getNome(){
			return $this->nome;
		}
		public function getDesc(){
			return $this->descricao;
		}
		public function getProjetoId(){
			return $this->projeto_id;
		}

		public function cadastrarEstoria(){
			estoriaModel::persistirEstoria($this->nome, $this->descricao, $this->projeto_id);
			
		}
	}
?>