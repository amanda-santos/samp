<?php

	class Situacao extends SplEnum{

		const __default = self::Não_iniciada;

		const Não_iniciada = 1;
		const Iniciada = 2;
		const Concluída = 3;
		const Rejeitada = 4;
		const Aceitada = 5;

	}

?>