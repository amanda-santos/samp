<?php
include "projetoModel.php";
	class Projeto{
		private $nome, $descricao, $id;

		public function __construct($paramNome='', $paramDesc='', $paramId){
		    $this->nome = $paramNome;
		    $this->descricao = $paramDesc;
		    $this->id = $paramId;
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

		public function getNome(){
			return $this->nome;
		}
		public function getDesc(){
			return $this->descricao;
		}
		public function getId(){
			return $this->id;
		}

		public function cadastrarProjeto(){
			projetoModel::persistirProjeto($this->nome, $this->descricao, $this->id);
			
		}
		public function entrarProjeto($projeto_id){
			projetoModel::entrar_projeto($this->projeto_id);
			
		}
	}
?>
