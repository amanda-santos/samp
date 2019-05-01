<?php
//SE ATUALIZAR POST
  if (isset($_POST["email"])) {
    require_once '../model/Usuario.php';
    echo (ok );
    $usuario = new Usuario();

    $usuario->recuperacaoSenha($_GET["email"]);
    
  }
  ?>