<?php
//SE ATUALIZAR POST
  if (isset($_POST["alterar"])) {
  	
  	require_once '../model/Usuario.php';

    $usuario = new Usuario();

    $usuario->altSenha($_POST["atual"], $_POST["nova"]);
        
  } //fim se alterar senha
  ?>