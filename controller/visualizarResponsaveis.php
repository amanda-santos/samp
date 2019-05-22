<?php
	require_once '../model/estoriaDAO.php';

	class visualizarResponsaveis{

		function visualizarResponsaveis($idEstoria){
			$estoriaDAO = new estoriaDAO();
			$responsaveis = $estoriaDAO->visualizarResponsaveis($idEstoria);
			return $responsaveis;
		}
	}
?>
