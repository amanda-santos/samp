<?php
/* Smarty version 3.1.33, created on 2019-06-10 05:36:56
  from 'C:\xampp\htdocs\samp\view\editarEstoriaSprintBacklog.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfdd058818544_86669379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88d122558ebaf7206bb9eb47790912828d4370e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\editarEstoriaSprintBacklog.html',
      1 => 1560137784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5cfdd058818544_86669379 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
  function apagar(estoria,projeto,usuario) {
    if (window.confirm('Deseja realmente remover esse usuário?')) {
      window.location = '../controller/excluirUsuarioResponsavel.php?idProjeto=' + projeto + '&usuario=' + usuario + '&idEstoria=' + estoria;
    }
  }
<?php echo '</script'; ?>
>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Estória</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

	<!-- início do post -->
	
  	<div class = "post">
      <form class="form-horizontal" method="POST" action="../controller/editarEstoriaSprintBacklog.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" enctype="multipart/form-data" data-toggle="validator">
        
		  <!--início do campo do formulário-->
      <div class="form-group row">
         <label for="staticEmail" class="col-sm-2 col-form-label control-label">Estória: </label>
         <div class="col-sm-10">
            <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
">
         </div>
      </div>
      <!--fim do campo do formulário-->

     <!--início do campo do formulário-->
      <div class="form-group required">
        <label class="control-label" for="nivel_dificuldade">Selecione o nível de dificuldade:</label>
          <select id=nivel_dificuldade name="nivel_dificuldade">

            <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getNivelDificuldade() == 1)) {?>
              <option value ="1" selected>Baixo</option>
            <?php } else { ?>
              <option value="1">Baixo</option>
            <?php }?>
           
            <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getNivelDificuldade() == 2)) {?>
              <option value ="2" selected>Médio</option>
            <?php } else { ?>
              <option value="2">Médio</option>
            <?php }?>

            <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getNivelDificuldade() == 3)) {?>
              <option value ="3" selected>Alto</option>
            <?php } else { ?>
              <option value="3">Alto</option>
            <?php }?>

            <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getNivelDificuldade() == 4)) {?>
              <option value ="4" selected>Muito Alto</option>
            <?php } else { ?>
              <option value="4">Muito Alto</option>
            <?php }?> 

          </select>
      </div>
      <!--fim do campo do formulário-->
      
      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-20" for="nome">Informe a duração da estória:</label>
        <div class="col-sm-30">
          <input type="text" class="form-control" id="duracao" name="duracao" value="<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDuracao();?>
" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->

      <b>Usuários Responsáveis pela Estória:</b>

      <br>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getResponsaveis(), 'responsavel');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['responsavel']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['responsavel']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['responsavel']->value->getSobrenome();?>


        <a title="Excluir Usuário" style="color:red" onclick="apagar('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['responsavel']->value->getUsuario();?>
');"><i class="fas fa-trash-alt"></i></a>

        <br>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

      <br>

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
