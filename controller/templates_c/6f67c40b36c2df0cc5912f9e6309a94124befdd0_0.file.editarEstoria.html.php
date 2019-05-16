<?php
/* Smarty version 3.1.33, created on 2019-05-16 04:29:33
  from 'C:\xampp\htdocs\EngSoft\view\editarEstoria.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdccb0dc11e78_79201811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f67c40b36c2df0cc5912f9e6309a94124befdd0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\EngSoft\\view\\editarEstoria.html',
      1 => 1557955947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5cdccb0dc11e78_79201811 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Estória</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

	<!-- início do post -->
	
  	<div class = "post">
      <form class="form-horizontal" method="POST" action="../controller/editarEstoria.php" enctype="multipart/form-data" data-toggle="validator">
	  
		<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
" name="nome">

        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDescricao();?>
" name="descricao">
		
      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-20" for="nome">Nome da Estória:</label>
        <div class="col-sm-30">
          <input type="text" class="form-control" id="name" name="nome" value="<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->
      
      <!--início do campo do formulário-->
        <div class="form-group required">
          <label class="control-label" for="descricao">Descrição:</label>
          <div class="col-sm-30">
            <textarea rows="4" cols="50" class="form-control" id="descricao" name="descricao" required value="<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>
" required>
    		    </textarea>
          </div>
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->

      <div>
        <input type="submit" class="btn btn-success" name="atualizar" value="Atualizar"></input>
              <!--<input type="button" data-toggle="modal" data-target="#confirm-submit" class="btn btn-success" name="atualizar" value="Atualizar" id="myBtn"></input>-->
			  
	  <a href="javascript:window.history.go(-1)"><input type="button" class="btn btn-default" value="Cancelar"></input></a>
      </div> <!--fim col-sm-8-->

      </form>
    </div> <!-- fim da div post -->
    <!-- fim do post -->  
</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../view/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
