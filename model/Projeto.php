<?php
	class Projeto{
		private $nome, $descricao, $id, $scrum_master, $product_backlog, $sprint_backlog, $data_fim, $data_inicio, $porcentagem_concluido, $total_horas, $participantes;

		public function __construct($paramNome='', $paramDesc='', $paramId='', $paramScrumMaster='', $paramProductBacklog='', $paramSprintBacklog='', $paramDataFim='', $paramDataInicio='', $paramTotalHoras='', $paramPorcentagemConcluido='', $paramParticipantes=''){
		    $this->nome = $paramNome;
		    $this->descricao = $paramDesc;
		    $this->id = $paramId;
		    $this->scrum_master = $paramScrumMaster;
		    $this->product_backlog = $paramProductBacklog;
		    $this->sprint_backlog = $paramSprintBacklog;
		    $this->data_fim = $paramDataFim;
		    $this->data_inicio = $paramDataFim;
		    $this->porcentagem_concluido = $paramPorcentagemConcluido;
		    $this->total_horas = $paramTotalHoras;
		    $this->participantes = $paramParticipantes;
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
		public function setProduct_Backlog($product_backlog){
			$this->product_backlog=$product_backlog;
		}
		public function setSprint_Backlog($sprint_backlog){
			$this->sprint_backlog=$sprint_backlog;
		}
		public function setDataFim($data_fim){
			$this->data_fim=$data_fim;
		}
		public function setDataInicio($data_inicio){
			$this->data_inicio=$data_inicio;
		}
		public function setPorcentagemConcluido($porcentagem_concluido){
			$this->porcentagem_concluido=$porcentagem_concluido;
		}
		public function setTotalHoras($total_horas){
			$this->total_horas=$total_horas;
		}
		public function setParticipantes($participantes){
			$this->participantes=$participantes;
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
		public function getProductBacklog(){
			return $this->product_backlog;
		}
		public function getSprintBacklog(){
			return $this->sprint_backlog;
		}
		public function getDataFim(){
			return $this->data_fim;
		}
		public function getDataInicio(){
			return $this->data_inicio;
		}
		public function getPorcentagemConcluido(){
			return $this->porcentagem_concluido;
		}
		public function getTotalHoras(){
			return $this->total_horas;
		}
		public function getParticipantes(){
			return $this->participantes;
		}

	}
?>
