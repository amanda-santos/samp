<?php
/* Smarty version 3.1.33, created on 2019-06-15 02:02:27
  from 'C:\xampp\htdocs\samp\view\usuario\alterarSenha.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d043593ab01d8_55123375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b01d65d77db2d81f4022af7f2dd2ffe5a9055035' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\usuario\\alterarSenha.html',
      1 => 1560554915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../view/dashboard/header.html' => 1,
    'file:../../view/dashboard/footer.html' => 1,
  ),
),false)) {
function content_5d043593ab01d8_55123375 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php $_smarty_tpl->_subTemplateRender("file:../../view/dashboard/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
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
        <form class="form-horizontal" method="POST" action="../../controller/usuario/alterarSenha.php" enctype="multipart/form-data" data-toggle="validator">

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

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/validator.min.js"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:../../view/dashboard/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
