<?php
//SE ATUALIZAR POST
  if (isset($_POST["resetarSenha"])) {
  	session_start();
    require_once '../../model/usuario/usuarioDAO.php';
    //echo (ok );
    $usuarioDAO = new usuarioDAO();

    $usuarioDAO->recuperarSenha($_POST["email"]);
    
  }
  ?>