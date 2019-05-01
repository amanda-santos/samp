
<?php
if (isset($_POST["entrar_projeto"])){
	
	$projetoId = $_POST['Projeto_id'];
    $verifica_id = mysql_query("SELECT * FROM usuario_projeto WHERE Projeto_id = '$projetoId'");

	if(mysql_num_rows($verifica_id) == 1){    
 		echo "ID errado";
	}
	else{
 		echo "id correto";
	}
}
?>