<?php
/* Smarty version 3.1.33, created on 2019-06-20 06:03:36
  from 'C:\xampp\htdocs\samp\view\sprint_backlog\criarEstoria.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0b0598a86bc8_58788754',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0880caa788feca35783b55f561ca3c5e1971a9dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\sprint_backlog\\criarEstoria.html',
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
function content_5d0b0598a86bc8_58788754 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../view/dashboard/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Cadastrar Estória no Sprint Backlog</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

  	<div class = "post">
      <form class="form-horizontal" method="POST" action="../../controller/sprint_backlog/cadastrarEstoria.php?idProjeto=<?php echo $_smarty_tpl->tpl_vars['idProjeto']->value;?>
&id_estoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value;?>
" enctype="multipart/form-data" data-toggle="validator">

      <div class="form-group required">
        <label class="control-label" for="nivel_dificuldade">Selecione o nível de dificuldade:</label>
          <select class="form-control" id=nivel_dificuldade name="nivel_dificuldade">
            <option value="1">Baixo</option>
            <option value="2">Médio</option>
            <option value="3">Alto</option>
            <option value="4">Muito Alto</option>
          </select>
      </div>

      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-20" for="nome">Informe a duração da estória:</label>
        <div class="col-sm-30">
          <input type="text" class="form-control" id="duracao" name="duracao" placeholder="Em horas" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->

      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-20" for="nome">Selecione o(s) responsável(eis) pela estória:</label>
        <div class="col-sm-30">

          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projeto']->value->getParticipantes(), 'participante');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['participante']->value) {
?>
            <?php if (($_smarty_tpl->tpl_vars['participante']->value->getScrumMaster() == 0)) {?>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="responsavel[]" id="responsavel" value="<?php echo $_smarty_tpl->tpl_vars['participante']->value->getUsuario();?>
">
              <label class="form-check-label" for="responsavel">
                <?php echo $_smarty_tpl->tpl_vars['participante']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['participante']->value->getSobrenome();?>

              </label>
            </div>
            <?php }?>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->

      <div>
        <input type="submit" class="btn btn-success" name="cadastrar_estoria" value="Cadastrar Estória no Sprint Backlog"></input>
      </div> <!--fim col-sm-8-->

      </form>
    </div> <!-- fim da div post -->
    <!-- fim do post -->  
</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../../view/dashboard/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
