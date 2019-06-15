<?php
	class SprintBacklog{
		private $estorias;

		public function __construct($paramEstorias=''){
		    $this->estorias = $paramEstorias;
		}

		public function setEstorias($estorias){
			$this->estorias=$estorias;
		}

		public function getEstorias(){
			return $this->estorias;
		}

	}
?>