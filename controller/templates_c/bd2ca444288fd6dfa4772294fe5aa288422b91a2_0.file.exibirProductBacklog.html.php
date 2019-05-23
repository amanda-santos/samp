<?php
/* Smarty version 3.1.33, created on 2019-05-23 16:11:03
  from 'C:\xampp\htdocs\samp\view\exibirProductBacklog.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce6a9f7715e81_00920560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd2ca444288fd6dfa4772294fe5aa288422b91a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\exibirProductBacklog.html',
      1 => 1558620659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5ce6a9f7715e81_00920560 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Título da Página -->
<h1 class="h3 mb-1 text-gray-800"><?php echo $_smarty_tpl->tpl_vars['projeto']->value->getNome();?>
</h1>
<p class="mb-4"></p>

<!-- div - conteúdo horizontal -->
<div class="row">

	<?php if ((!($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster()))) {?>

	<!-- Primeira Coluna -->
	<div class="col-lg-3">

	  <!-- Título -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="font-weight-bold text-danger text-uppercase mb-1">Meu Trabalho</h6>
	    </div>

	    <div style="padding: 10px 10px;">

	    </div>

	  </div>

	</div>

	<?php }?>

	<!-- Segunda Coluna -->
	<div class="col-lg-3">

	  <!-- Título -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="font-weight-bold text-warning text-uppercase">Product Backlog</h6>
	    </div>

	    <div style="padding: 10px 10px;">

		    <?php if (($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster())) {?>

			  	<div style="padding-bottom: 10px;" class="col mr-2">
			      <a href="../controller/criarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" class="d-none d-sm-inline-block btn btn-warning shadow-sm"><i class="fas fa-plus"></i> Cadastrar nova estória</a>
			    </div>

	    	<?php }?>

		    <?php if ($_smarty_tpl->tpl_vars['productBacklog']->value->getEstorias() != null) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productBacklog']->value->getEstorias(), 'estoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estoria']->value) {
?>
		    
				    <div class="card border-left-warning shadow h-10 py-2">
				      <div class="card-body">
				        <div class="row no-gutters align-items-center">
				          <div class="col mr-2">
				            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</div>
				            <div class="text-secondary mb-1" style="text-align:justify;"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>
</div>

				            <?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>

								<a href="../controller/criarEstoriaSprintBacklog.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
&id_estoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" title="Adicionar estória ao Sprint Backlog" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i></a>

								<button title="Editar estória" onclick="editar('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
')" type="button" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></button>

								<?php echo '<script'; ?>
 type="text/javascript">
									function editar(estoria,projeto) {												
										window.location = '../controller/exibirEstoria.php?idEstoria=' + estoria + '&idProjeto=' + projeto;	
									}
								<?php echo '</script'; ?>
>		

								<button title="Excluir estória" onclick="apagar('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
								<?php echo '<script'; ?>
 type="text/javascript">
											function apagar(estoria,projeto) {
												if (window.confirm('Deseja realmente apagar esta estória? Essa ação não poderá ser desfeita.')) {
													window.location = '../controller/excluirEstoria.php?idEstoria=' + estoria + '&idProjeto=' + projeto;
												}
											}
								<?php echo '</script'; ?>
>

							<?php }?>
				          </div>
				        </div>
				      </div>
				    </div>

				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
		</div>
	  </div>

	</div>

	<!-- Terceira Coluna -->
	<div class="col-lg-3">

	  <!-- Título -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="font-weight-bold text-info text-uppercase mb-1">Sprint Backlog</h6>
	    </div>
	    <div style="padding: 10px 10px;">
		    <?php if ($_smarty_tpl->tpl_vars['productBacklog']->value->getEstorias() != null) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productBacklog']->value->getEstorias(), 'estoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estoria']->value) {
?>
		    		
				    <div class="card border-left-info shadow h-10 py-2">
				      <div class="card-body">
				        <div class="row no-gutters align-items-center">
				          <div class="col mr-2">
				            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</div>
				            <div class="text-secondary mb-1" style="text-align:justify;"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>
</div>

				            <?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>

								<a href="../controller/criarEstoriaSprintBacklog.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
&id_estoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" title="Adicionar estória ao Sprint Backlog" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i></a>

								<button title="Editar estória" onclick="editar('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
')" type="button" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></button>

								<?php echo '<script'; ?>
 type="text/javascript">
									function editar(estoria,projeto) {												
										window.location = '../controller/exibirEstoria.php?idEstoria=' + estoria + '&idProjeto=' + projeto;	
									}
								<?php echo '</script'; ?>
>		

								<button title="Excluir estória" onclick="apagar('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
								<?php echo '<script'; ?>
 type="text/javascript">
											function apagar(estoria,projeto) {
												if (window.confirm('Deseja realmente apagar esta estória? Essa ação não poderá ser desfeita.')) {
													window.location = '../controller/excluirEstoria.php?idEstoria=' + estoria + '&idProjeto=' + projeto;
												}
											}
								<?php echo '</script'; ?>
>

							<?php }?>
				          </div>
				        </div>
				      </div>
				    </div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
		</div>
	  </div>

	</div>

	<!-- Quarta Coluna -->
	<div class="col-lg-3">

	  <!-- Título -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="font-weight-bold text-success text-uppercase mb-1">Finalizado</h6>
	    </div>

	    <div style="padding: 10px 10px;">
	    </div>
	    
	  </div>

	</div>

</div>

<?php $_smarty_tpl->_subTemplateRender("file:../view/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
