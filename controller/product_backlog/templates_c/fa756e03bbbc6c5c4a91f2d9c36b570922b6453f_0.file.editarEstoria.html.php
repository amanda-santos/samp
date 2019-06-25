<?php
/* Smarty version 3.1.33, created on 2019-06-20 06:03:00
  from 'C:\xampp\htdocs\samp\view\product_backlog\editarEstoria.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0b0574c4e607_76021585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa756e03bbbc6c5c4a91f2d9c36b570922b6453f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\product_backlog\\editarEstoria.html',
      1 => 1561003362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../view/dashboard/header.html' => 1,
    'file:../../view/dashboard/footer.html' => 1,
  ),
),false)) {
function content_5d0b0574c4e607_76021585 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../view/dashboard/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
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
      <form class="form-horizontal" method="POST" action="../../controller/product_backlog/editarEstoria.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" enctype="multipart/form-data" data-toggle="validator">
		
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
            <textarea rows="4" cols="50" maxlength="300" class="form-control" id="descricao" name="descricao" required>
              <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>

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

<?php $_smarty_tpl->_subTemplateRender("file:../../view/dashboard/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
