<?php
  include("include/header.php");
  if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
?>

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Alterar Senha</h1>
  </div>

  <!--início grid do post-->
  <div class="row">
    <div class="col-md-8"> 

      <!-- início do post -->
      <div class = "post">
        <form class="form-horizontal" method="POST" action="../controller/altSenha.php" enctype="multipart/form-data" data-toggle="validator">

        <div class="form-group required">
          <label class="control-label col-sm-4" for="atual">Digite sua senha atual:</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" id="atual" name="atual" required>
          </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
        
        <div class="form-group required">
          <label class="control-label col-sm-4" for="nova">Digite sua nova senha:</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" id="nova" name="nova" data-minlength="6" required>
              <span class="help-block">Mínimo de seis (6) digitos</span>
          </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
        
        <div class="form-group required">
          <label class="control-label col-sm-4" for="confSenha">Confirme sua senha:</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" id="confSenha" name="senhaConfirma" data-match="#nova" data-match-error="Atenção! As senhas não estão iguais." required>
              <div class="help-block with-errors"></div>
          </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
        
        <div class="col-sm-5">
          <input type="submit" class="btn btn-success" name="alterar" value="Alterar senha"></input>
          <a href="javascript:window.history.go(-1)"><input type="button" class="btn btn-default" value="Cancelar"></input></a>
        </div> <!--fim col-sm-5-->
        
        </form>
        
      </div> <!-- fim da div post -->
      <!-- fim do post -->  
        
    </div><!--fim col-md-8-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/validator.min.js"></script>

<?php
  include("include/footer.php");
} else {
  echo "<script>window.location = 'index.html';</script>";
} 
?>
