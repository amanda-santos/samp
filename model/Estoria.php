<?php
	require_once '../model/ProductBacklog.php';
	class Estoria{
		private $id, $nome, $descricao;

		public function __construct($paramId='', $paramNome='', $paramDesc=''){
			$this->id = $paramId;
		    $this->nome = $paramNome;
		    $this->descricao = $paramDesc;
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

		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getDesc(){
			return $this->descricao;
		}
	}
?>