<?php
/* Smarty version 3.1.33, created on 2019-05-23 18:35:32
  from 'C:\xampp\htdocs\samp\view\dashboardProjeto.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce6cbd4112502_15503332',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bd1f0b7fb4b6d25c3baf2568e7b7c9ebe188716' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\dashboardProjeto.html',
      1 => 1558629321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5ce6cbd4112502_15503332 (Smarty_Internal_Template $_smarty_tpl) {
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
		    <?php if ($_smarty_tpl->tpl_vars['sprintBacklog']->value->getEstorias() != null) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sprintBacklog']->value->getEstorias(), 'estoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estoria']->value) {
?>
		    	
				    <div class="card border-left-danger h-10">

				        <!-- Collapsable Card Example -->
              			<div class="card">

	                		<!-- Card Header - Accordion -->
	            			<a href="#estoriaMeuTrabalho-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" class="d-block card-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="estoriaMeuTrabalho-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
	                  			<h6 class="font-weight-bold text-secondary"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</h6>
	                		</a>

	                		<!-- Card Content - Collapse -->
	                		<div class="collapse" id="estoriaMeuTrabalho-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
	                  			<div class="card-body">
	                    			<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>

					            	<br>
					            	<b>Situação:</b> <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getSituacao();?>

					            	<br>
					            	<b>Nível de Dificuldade:</b> <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNivelDificuldade();?>

					            	<br>
					            	<b>Duração:</b> <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDuracao();?>
 horas
					            	<b>Responsáveis:</b>
					            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getResponsaveis(), 'responsavel');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['responsavel']->value) {
?>
										<br>
										<?php echo $_smarty_tpl->tpl_vars['responsavel']->value;?>

									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

									<br><br>

									<button data-toggle="modal" data-target="#adicionarSubtarefa-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" type="button" title="Adicionar Subtarefa" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-plus"></i> Adicionar Subtarefa</button>

									<!-- Inicio Modal -->
									<div class="modal fade" id="adicionarSubtarefa-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class= "modal-header">
													<h4 class="modal-title text-center" id="myModalLabel">	
														Adicionar Subtarefa
													</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<div class="modal-body">
													<form>
													</form>
												</div>
												<div class="modal-footer">
													<button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
													<a class="btn btn-primary" href="../controller/cadastrarSubtarefa.php?id=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">Adicionar</a>
												</div> 

											</div>
										</div>
									</div>
									<!-- Fim Modal -->

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

	<?php }?>

	<!-- Segunda Coluna -->
	<div class="col-lg-3">

	  <!-- Título -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="font-weight-bold text-warning text-uppercase mb-1">Product Backlog</h6>
	    </div>
	    <div style="padding: 10px 10px;">

		    <?php if ($_smarty_tpl->tpl_vars['productBacklog']->value->getEstorias() != null) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productBacklog']->value->getEstorias(), 'estoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estoria']->value) {
?>
		    	
				    <div class="card border-left-warning h-10">

				        <!-- Collapsable Card Example -->
              			<div class="card">

	                		<!-- Card Header - Accordion -->
	            			<a href="#estoriaProductBacklog-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" class="d-block card-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="estoriaProductBacklog-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
	                  			<h6 class="font-weight-bold text-secondary"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</h6>
	                		</a>

	                		<!-- Card Content - Collapse -->
	                		<div class="collapse" id="estoriaProductBacklog-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
	                  			<div class="card-body">
	                    			<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>


	                    			<br><br>

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

										<button title="Excluir estória" onclick="apagarEstoriaProductBacklog('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>

										<?php echo '<script'; ?>
 type="text/javascript">
											function apagarEstoriaProductBacklog(estoria,projeto) {
												if (window.confirm('Deseja realmente excluir esta estória do projeto? Essa ação não poderá ser desfeita.')) {
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

			<?php if (($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster())) {?>

				<br>

			  	<div style="padding-bottom: 10px;" class="col mr-2">
			      <a href="../controller/criarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" class="d-none d-sm-inline-block btn btn-warning shadow-sm"><i class="fas fa-plus"></i> Cadastrar nova estória</a>
			    </div>

	    	<?php }?>

		</div>
	  </div>
	</div> <!-- fim coluna -->

	<!-- Terceira Coluna -->
	<div class="col-lg-3">

	  <!-- Título -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="font-weight-bold text-info text-uppercase mb-1">Sprint Backlog</h6>
	    </div>
	    <div style="padding: 10px 10px;">
		    <?php if ($_smarty_tpl->tpl_vars['sprintBacklog']->value->getEstorias() != null) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sprintBacklog']->value->getEstorias(), 'estoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estoria']->value) {
?>
		    	
				    <div class="card border-left-info h-10">

				        <!-- Collapsable Card Example -->
              			<div class="card">

	                		<!-- Card Header - Accordion -->
	            			<a href="#estoriaSprintBacklog-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" class="d-block card-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="estoriaSprintBacklog-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
	                  			<h6 class="font-weight-bold text-secondary"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</h6>
	                		</a>

	                		<!-- Card Content - Collapse -->
	                		<div class="collapse" id="estoriaSprintBacklog-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
	                  			<div class="card-body">
	                    			<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>

					            	<br>
					            	<b>Situação:</b> <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getSituacao();?>

					            	<br>
					            	<b>Nível de Dificuldade:</b> <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNivelDificuldade();?>

					            	<br>
					            	<b>Duração:</b> <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDuracao();?>
 horas
					            	<b>Responsáveis:</b>
					            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getResponsaveis(), 'responsavel');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['responsavel']->value) {
?>
										<br>
										<?php echo $_smarty_tpl->tpl_vars['responsavel']->value;?>

									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

					            	<?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>
					            		<br>
						            	<br>
										<a href="editarEstoriaSprintBacklog.php?id=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
"><button title="Editar estória" onclick="editar" type="button" class="btn-sm btn btn-warning"><i class="fas fa-pencil-alt"></i></button></a>

										<button title="Excluir estória do Sprint Backlog" onclick="apagarSprintProductBacklog('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn-sm btn btn-danger"><i class="fas fa-trash-alt"></i></button>

										<?php echo '<script'; ?>
 type="text/javascript">
											function apagar(estoria, idProjeto) {
												if (window.confirm('Deseja realmente excluir esta estória do Sprint Backlog?')) {
													window.location = '../controller/apagarSprintProductBacklog.php?idEstoria=' + estoria + '&idProjeto=' + idProjeto;
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
	</div> <!-- fim coluna -->

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