<?php
/* Smarty version 3.1.33, created on 2019-06-10 17:38:37
  from 'C:\xampp\htdocs\samp\view\dashboardProjeto.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfe797dcc6b99_60770061',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bd1f0b7fb4b6d25c3baf2568e7b7c9ebe188716' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\dashboardProjeto.html',
      1 => 1560180543,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5cfe797dcc6b99_60770061 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Título da Página -->
<b><h1 class="h3 mb-1 text-gray-800"><?php echo $_smarty_tpl->tpl_vars['projeto']->value->getNome();?>
</h1></b>
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
		
			<?php if ($_smarty_tpl->tpl_vars['meuTrabalho']->value->getEstorias() != null) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meuTrabalho']->value->getEstorias(), 'estoria');
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

					            	<a href="" style="color: red" data-toggle="modal" data-target="#situacao-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" title="Adicionar Situação" ><i class="fas fa-edit"></i> 
					            	</a>
					            	<br>
					            	<b>Nível de Dificuldade:</b> <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNivelDificuldade();?>

					            	<br>
					            	<b>Duração:</b> <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDuracao();?>
 horas
					            	<br>
					            	<b>Responsáveis:</b>
					            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getResponsaveis(), 'responsavel');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['responsavel']->value) {
?>
										<br>
										<?php echo $_smarty_tpl->tpl_vars['responsavel']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['responsavel']->value->getSobrenome();?>

									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					            	
									<br><br>

									<!-- Inicio Modal -->
									<div class="modal fade" id="adicionarTarefa-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class= "modal-header">
													<h4 class="modal-title text-center" id="myModalLabel">
														Adicionar Tarefa
													</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<div class="modal-body">
													<form class="form-horizontal" method="POST" action="../controller/cadastrarTarefa.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" enctype="multipart/form-data" data-toggle="validator">
														<label for="recipient-name" class="control-label">Informe o nome da tarefa:</label>
														<input name="nome" type="text" class="form-control" id="recipient-name">
												</div>
												<div class="modal-footer">
													<button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
													<input type="submit" class="btn btn-success" name="cadastrar_tarefa" value="Adicionar"></input>
													</form>
												</div> 
											</div>
										</div>
									</div>

									<div class = "post">
										<form class="form-horizontal" method="POST" action="../controller/editarSituacao.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" enctype="multipart/form-data" data-toggle="validator">
									
										<!-- Inicio Modal -->
										<div class="modal fade" id="situacao-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class= "modal-header">
														<h4 class="modal-title text-center" id="myModalLabel">	
															Editar Situação da Estória
														</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														
															<label class="control-label" for="situacao">Selecione a situação:</label>
															<select class="form-control" id=situacao name="situacao">
																<option value="1">Não Iniciada</option>
																<option value="2">Iniciada</option>
																<option value="3">Concluída</option> 
															</select>
													</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
														<input type="submit" class="btn btn-success" name="atualizar" value="Atualizar"></input>
														<!--<input type="button" data-toggle="modal" data-target="#confirm-submit" class="btn btn-success" name="atualizar" value="Atualizar" id="myBtn"></input>-->
														</form>
													</div> 
												</div>
											</div>
										</div>
										<!-- Fim Modal -->

									<div style="padding: 0px 0px;">
										<a href="#tarefas-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="tarefas-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">

			                  				<h6 style="color:red" class="font-weight-bold">Tarefas   
			                  					<i  class="fas fa-chevron-right"></i>
			                  				</h6>

			                			</a>
										<div class="collapse" id="tarefas-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">

											<?php if ($_smarty_tpl->tpl_vars['estoria']->value->getTarefas() != null) {?>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getTarefas(), 'tarefa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tarefa']->value) {
?>
													
													<br>
													<i style="color:red" class="fas fa-check"></i>
													<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getNome();?>

													<br>
													<b>Situação:</b> <?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getSituacao();?>

													<a href="" style="color: red" data-toggle="modal" data-target="#situacaoTarefa-<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
" title="Adicionar Situação" ><i class="fas fa-edit"></i> 
													</a>
									            	<br>
									            	
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											<?php }?>

											<div class = "post">
												<form class="form-horizontal" method="POST" action="../controller/editarTarefaSituacao.php?idTarefa=<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" enctype="multipart/form-data" data-toggle="validator">
												
											
													<!-- Inicio Modal Situação Tarefas -->
													<div class="modal fade" id="situacaoTarefa-<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class= "modal-header">
																	<h4 class="modal-title text-center" id="myModalLabel">	
																		Editar Situação da Tarefa
																	</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span></button>
																</div>
																<div class="modal-body">													
																		<label class="control-label" for="situacao">Selecione a situação:</label>
																		<select class="form-control" id=situacao name="situacao">								
																			<option value="1">Iniciada</option>
																			<option value="2">Concluída</option> 
																		</select>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
																	<input type="submit" class="btn btn-success" name="atualizarTarefa" value="Atualizar"></input>													
																	
																</div> 
															</div>
														</div>
													</div>
													<!-- Fim Modal -->
												</form>
											</div>		

											<br>

											<button data-toggle="modal" data-target="#adicionarTarefa-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" type="button" title="Adicionar Subtarefa" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-tasks"></i>  Adicionar Tarefa</button>

										</div>
									</div>
	                  			</div>
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

					            		<?php if ($_smarty_tpl->tpl_vars['estoria']->value->getSprintBacklog() == 0) {?>

											<a href="../controller/criarEstoriaSprintBacklog.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
&id_estoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" title="Adicionar estória ao Sprint Backlog" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i></a>

										<?php } else { ?>

											<a href="../controller/criarEstoriaSprintBacklog.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
&id_estoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" title="Adicionar estória ao Sprint Backlog" class="disabled d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i></a>

										<?php }?>

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
					            	<br>
					            	<b>Responsáveis:</b>
					            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getResponsaveis(), 'responsavel');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['responsavel']->value) {
?>
										<br>
										<?php echo $_smarty_tpl->tpl_vars['responsavel']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['responsavel']->value->getSobrenome();?>

									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

					            	<?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>
					            		<br>
						            	<br>
										<a href="../controller/exibirEstoriaSprintBacklog.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
">
											<button title="Editar estória" type="button" class="btn-sm btn btn-warning"><i class="fas fa-pencil-alt"></i>
											</button>
										</a>

										<button title="Excluir estória do Sprint Backlog" onclick="apagarEstoriaSprintBacklog('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn-sm btn btn-danger"><i class="fas fa-trash-alt"></i></button>

										<?php echo '<script'; ?>
 type="text/javascript">
											function apagarEstoriaSprintBacklog(estoria, idProjeto) {
												if (window.confirm('Deseja realmente excluir esta estória do Sprint Backlog?')) {
													window.location = '../controller/excluirEstoriaSprintBacklog.php?idEstoria=' + estoria + '&idProjeto=' + idProjeto;
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
