<?php
	class Projeto{
		private $nome, $descricao, $id, $scrum_master;

		public function __construct($paramNome='', $paramDesc='', $paramId='', $paramScrumMaster=''){
		    $this->nome = $paramNome;
		    $this->descricao = $paramDesc;
		    $this->id = $paramId;
		    $this->scrum_master = $paramScrumMaster;
		}

		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setDesc($descricao){
			$this->descricao=$descricao;
		}
		public function setId($id){
			$this->id=$id;
		}

		public function setScrumMaster($scrum_master){
			$this->scrum_master=$scrum_master;
		}

		public function getNome(){
			return $this->nome;
		}
		public function getDesc(){
			return $this->descricao;
		}
		public function getId(){
			return $this->id;
		}
		public function getScrumMaster(){
			return $this->scrum_master;
		}
	}
?>
