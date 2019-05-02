<?php
include "usuarioModel.php";
	class Usuario{
		private $nome, $sobrenome, $usuario, $email, $senha, $ativo;

		public function __construct($paramNome='', $paramSobrenome='', $paramUsuario='', $paramEmail='',$paramSenha='', $paramAtivo=0){
		    $this->nome = $paramNome;
		    $this->sobrenome = $paramSobrenome;
		    $this->usuario = $paramUsuario;
		    $this->email = $paramEmail;
		    $this->senha = $paramSenha;
		    $this->ativo = $paramAtivo;
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

		public function inserirUsuario(){
			usuarioModel::persistirUsuario($this->nome, $this->sobrenome, $this->usuario, $this->email, $this->senha);
			
		}

		public function ativarUsuario($usuario){
			usuarioModel::ativarUsuario($usuario);
		}

		public function editarConta($usuarioAntigo, $emailAntigo){
			usuarioModel::editarConta($this->usuario, $this->nome, $this->sobrenome, $this->email, $usuarioAntigo, $emailAntigo);
		}
		public function inativarUsuario($usuario){
			usuarioModel::inativarUsuario($usuario);
		}
		
		public function validaLogin($usuario, $senhaCrip){
			usuarioModel::validaLogin($usuario, $senhaCrip);
		}

		public function altSenha($atual, $nova){
			usuarioModel::altSenha($atual, $nova);
		}

		public function recuperacaoSenha($email){
			usuarioModel::recuperacaoSenha($email);
		}
	}
	
?>
