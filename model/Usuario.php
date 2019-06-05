<?php
	class Usuario{
		private $nome, $sobrenome, $usuario, $email, $senha, $ativo, $scrum_master;

		public function __construct($paramNome='', $paramSobrenome='', $paramUsuario='', $paramEmail='',$paramSenha='', $paramAtivo=0, $paramScrum_Master=0){
		    $this->nome = $paramNome;
		    $this->sobrenome = $paramSobrenome;
		    $this->usuario = $paramUsuario;
		    $this->email = $paramEmail;
		    $this->senha = $paramSenha;
		    $this->ativo = $paramAtivo;
		    $this->scrum_master = $paramScrum_Master;
		}

		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setSobrenome($sobrenome){
			$this->sobrenome=$sobrenome;
		}
		public function setUsuario($usuario){
			$this->usuario=$usuario;
		}
		public function setEmail($email){
			$this->email=$email;
		}
		public function setSenha($senha){
			$this->senha=$senha;
		}
		public function setAtivo($ativo){
			$this->ativo=$ativo;
		}
		public function setScrumMaster($scrum_master){
			$this->scrum_master=$scrum_master;
		}

		public function getNome(){
			return $this->nome;
		}
		public function getSobrenome(){
			return $this->sobrenome;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function getAtivo(){
			return $this->ativo;
		}
		public function getScrumMaster(){
			return $this->scrum_master;
		}
	}
	
?>
