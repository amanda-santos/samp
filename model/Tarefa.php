 <?php
	class Tarefa{
		private $id, $nome, $situacao_id;

		public function __construct($paramId='', $paramNome='', $paramSituacaoId=''){
			$this->id = $paramId;
		    $this->nome = $paramNome;
		    $this->situacao_id = $paramSituacaoId;
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

		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getSituacao(){
			return $this->situacao_id;
		}
	}
?>
