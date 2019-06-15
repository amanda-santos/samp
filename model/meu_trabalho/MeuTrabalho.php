<?php
	class meuTrabalho{
		// a classe meu trabalho não precisa ter os atributos que já estão em Estoria, ela irá guardar somente um array object (lista) de estórias
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
