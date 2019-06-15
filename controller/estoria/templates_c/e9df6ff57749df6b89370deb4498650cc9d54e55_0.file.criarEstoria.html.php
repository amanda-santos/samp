<?php
/* Smarty version 3.1.33, created on 2019-06-15 03:06:19
  from 'C:\xampp\htdocs\samp\view\estoria\criarEstoria.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d04448b8b3914_82435050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9df6ff57749df6b89370deb4498650cc9d54e55' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\estoria\\criarEstoria.html',
      1 => 1560558992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../view/dashboard/header.html' => 1,
    'file:../../view/dashboard/footer.html' => 1,
  ),
),false)) {
function content_5d04448b8b3914_82435050 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../view/dashboard/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Cadastrar Estória</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

  	<div class = "post">
      <form class="form-horizontal" method="POST" action="../../controller/estoria/cadastrarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['idProjeto']->value;?>
" enctype="multipart/form-data" data-toggle="validator">

      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-20" for="nome">Nome da Estória:</label>
        <div class="col-sm-30">
          <input type="text" class="form-control" id="nome" name="nome" value="" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->
      
      <!--início do campo do formulário-->
        <div class="form-group required">
          <label class="control-label" for="descricao">Descrição:</label>
          <div class="col-sm-30">
            <textarea rows="4" cols="50" class="form-control" id="descricao" name="descricao" required>
    		    </textarea>
          </div>
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->

      <div>
        <input type="submit" class="btn btn-success" name="cadastrar_estoria" value="Cadastrar Estória"></input>
      </div> <!--fim col-sm-8-->

      </form>
    </div> <!-- fim da div post -->
    <!-- fim do post -->  
</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../../view/dashboard/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
