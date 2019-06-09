 <?php
	require_once '../model/ProductBacklog.php';
	class Estoria{
		private $id, $nome, $descricao, $duracao, $nivel_dificuldade, $situacao, $responsaveis, $sprint_backlog, $tarefas;

		public function __construct($paramId='', $paramNome='', $paramDesc='', $paramDuracao='', $paramNivelDificuldade='', $paramSituacao='', $paramSprintBacklog='', $paramTarefas=''){
			$this->id = $paramId;
		    $this->nome = $paramNome;
		    $this->descricao = $paramDesc;
		    $this->duracao = $paramDuracao;
		    $this->nivel_dificuldade = $paramNivelDificuldade;
		    $this->situacao = $paramSituacao;
		    $this->responsaveis = new ArrayObject();
		    $this->sprint_backlog = $paramSprintBacklog;
		    $this->tarefas = $paramTarefas;
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
		public function setResponsaveis($responsavel){
			$this->responsaveis->append($responsavel);
		}
		public function setSprintBacklog($sprint_backlog){
			$this->sprint_backlog = $sprint_backlog;
		}
		public function setTarefas($tarefas){
			$this->tarefas = $tarefas;
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
		public function getResponsaveis(){
			return $this->responsaveis;
		}
		public function getSprintBacklog(){
			return $this->sprint_backlog;
		}
		public function getTarefas(){
			return $this->tarefas;
		}
	}
?>
