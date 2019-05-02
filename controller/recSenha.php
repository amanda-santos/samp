<?php
//SE ATUALIZAR POST
  if (isset($_POST["resetarSenha"])) {
    require_once '../model/Usuario.php';
    //echo (ok );
    $usuario = new Usuario();

    $usuario->recuperacaoSenha($_POST["email"]);
    
  }
  ?>