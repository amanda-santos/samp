<?php
/* Smarty version 3.1.33, created on 2019-05-15 15:50:06
  from 'C:\xampp\htdocs\samp\view\editarUsuario.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdc190e829610_50068061',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '319afeaa069b8980e744a4204e2ffd6f40604ccd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\editarUsuario.html',
      1 => 1557879151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5cdc190e829610_50068061 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar conta</h1>
</div>

<!--início grid do post-->
<div class="row">
  <div class="col-md-8"> 

    <!-- início do post -->
    <div class = "post">
      <form class="form-horizontal" method="POST" action="../controller/editarUsuario.php" enctype="multipart/form-data" data-toggle="validator">

        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getUsuario();?>
" name="usuarioAntigo">

        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getEmail();?>
" name="emailAntigo">

      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-3" for="nome">Nome:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getNome();?>
" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->
      
      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-3" for="sobrenome">Sobrenome:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getSobrenome();?>
" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->
      

      <div class="form-group required">
        <label class="control-label col-sm-3" for="email">E-mail:</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getEmail();?>
" data-error="Por favor, informe um e-mail correto." required>
            <div class="help-block with-errors"></div>
        </div> <!--fim col-sm-5-->
      </div> <!--fim form-group-->
      
      <div class="form-group has-feedback required">
        <label for="usuario" class="control-label col-sm-3">Nome de usuário:</label>
        <div class="col-sm-5">
          <div class="input-group">
            <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" name="usuario" id="usuario" required value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getUsuario();?>
">
          </div> <!--fim input-group-->
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors">Seu nome de usuário só pode conter letras, números e '_'.</div>
        </div> <!--fim col-sm-5-->
      </div> <!--fim form-group-->
      
      
      <div class="col-sm-9">
        <p>
          <a href="../controller/alterarSenha.php"  id="admButtons" class="btn btn-sm btn-success" style="font-size: 14px;">
            <span class="glyphicon glyphicon-edit"></span> Alterar senha
          </a>
          <a href="#" onclick="apagar('<?php echo $_smarty_tpl->tpl_vars['usuario']->value->getUsuario();?>
');" id="admButtons" class="btn btn-sm btn-danger" style="font-size: 14px;">
            <span class="glyphicon glyphicon-remove"></span> Desativar conta
          </a>
        </p>
      </div>
    
      <div class="col-sm-8">
        <input type="submit" class="btn btn-success" name="atualizar" value="Atualizar"></input>
        <!--<input type="button" data-toggle="modal" data-target="#confirm-submit" class="btn btn-success" name="atualizar" value="Atualizar" id="myBtn"></input>-->
        
        <a href="javascript:window.history.go(-1)"><input type="button" class="btn btn-default" value="Cancelar"></input></a>
      </div> <!--fim col-sm-8-->
      
      
      <!--início função apagar usuário-->
      <?php echo '<script'; ?>
 type="text/javascript">
        function apagar(usuario) {
          if (window.confirm('Deseja realmente desativar sua conta @' + usuario + '? Essa ação não poderá ser desfeita.')) {
            window.location = '../controller/inativarUsuario.php?usuario=' + usuario;
          }
        }

      <?php echo '</script'; ?>
>

      </form>
      
    </div> <!-- fim da div post -->
    <!-- fim do post -->  
      
  </div><!--fim col-md-8-->


<?php $_smarty_tpl->_subTemplateRender("file:../view/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>  
<?php }
}
