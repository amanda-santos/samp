<?php
/* Smarty version 3.1.33, created on 2019-06-10 00:03:45
  from 'C:\xampp\htdocs\samp\view\criarEstoriaSprintBacklog.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfd82411fd777_73998263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c68dbed7144ab2dbbb4a7a8fd8b37f82e623b02' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\criarEstoriaSprintBacklog.html',
      1 => 1560117821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5cfd82411fd777_73998263 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Cadastrar Estória Sprint Backlog</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

  	<div class = "post">
      <form class="form-horizontal" method="POST" action="../controller/cadastrarEstoriaSprintBacklog.php?idProjeto=<?php echo $_smarty_tpl->tpl_vars['idProjeto']->value;?>
&id_estoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value;?>
" enctype="multipart/form-data" data-toggle="validator">

      <div class="form-group required">
        <label class="control-label" for="nivel_dificuldade">Selecione o nível de dificuldade:</label>
          <select id=nivel_dificuldade name="nivel_dificuldade">
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
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="responsavel[]" id="responsavel" value="<?php echo $_smarty_tpl->tpl_vars['participante']->value->getUsuario();?>
">
              <label class="form-check-label" for="responsavel">
                <?php echo $_smarty_tpl->tpl_vars['participante']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['participante']->value->getSobrenome();?>

              </label>
            </div>
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

<?php $_smarty_tpl->_subTemplateRender("file:../view/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
