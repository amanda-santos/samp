<?php
/* Smarty version 3.1.33, created on 2019-06-27 15:59:52
  from 'C:\xampp\htdocs\samp\view\projeto\dashboardProjeto.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d14cbd85871c9_39621780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84e6497698c9e1910f83c59822fe7e20577ccf25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\projeto\\dashboardProjeto.html',
      1 => 1561643982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../view/dashboard/header.html' => 1,
    'file:../../view/dashboard/footer.html' => 1,
  ),
),false)) {
function content_5d14cbd85871c9_39621780 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../view/dashboard/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
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

                <?php if (($_smarty_tpl->tpl_vars['meuTrabalho']->value->getEstorias() != null)) {?>
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


                                <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getSituacao() != "Rejeitada")) {?>
                                    <a href="" style="color: red" data-toggle="modal" data-target="#situacao-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" title="Editar Situação">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                <?php }?>

                                <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getSituacao() == "Rejeitada")) {?>
                                    <a href="../../controller/estoria/reiniciarEstoria.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" class="btn btn-sm btn-danger">
                                       <i class="fas fa-undo"></i> Reiniciar
                                    </a>
                                <?php }?>

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
                                            <div class="modal-header">
                                                <h4 class="modal-title text-center" id="myModalLabel">
                                                    Adicionar Tarefa
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="POST" action="../../controller/estoria/tarefa/cadastrarTarefa.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
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

                                <div class="post">
                                    <form class="form-horizontal" method="POST" action="../../controller/estoria/editarSituacao.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" enctype="multipart/form-data" data-toggle="validator">

                                        <!-- Inicio Modal -->
                                        <div class="modal fade" id="situacao-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="myModalLabel">
                                                            Editar Situação da Estória
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
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

                            <h6 style="color:red" class="font-weight-bold">
                                Tarefas
                                <i class="fas fa-chevron-right"></i>
                            </h6>

                        </a>
                        <div class="collapse" id="tarefas-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">

                            <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getTarefas() != null)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getTarefas(), 'tarefa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tarefa']->value) {
?>

                                    <br>
                                    <i style="color:red" class="fas fa-check"></i>
									
                                    <?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getNome();?>


                                    <a href="" style="color: red" data-toggle="modal" data-target="#editarTarefa-<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
" title="Editar Tarefa">
                                        <i class="fas fa-edit"></i> 
                                    </a>

                                    <br>
                                    <b>Situação:</b> <?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getSituacao();?>

                                    <a href="" style="color: red" data-toggle="modal" data-target="#situacaoTarefa-<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
" title="Adicionar Situação">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <br>

                                    <!-- Inicio Modal Situação Tarefas -->
                                    <div class="modal fade" id="situacaoTarefa-<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-center" id="myModalLabel">
                                                        Editar Situação da Tarefa
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" method="POST" action="../../controller/estoria/tarefa/editarSituacao.php?idTarefa=<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" enctype="multipart/form-data" data-toggle="validator">
                                                        <label class="control-label" for="situacao">Selecione a situação:</label>
                                                        <select class="form-control" id=situacao name="situacao">
                                                            <option value="2">Iniciada</option>
                                                            <option value="3">Concluída</option>
                                                        </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
                                                    <input type="submit" class="btn btn-success" name="atualizarTarefa" value="Atualizar"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim Modal -->
									
									<!-- Inicio Modal Nome Tarefa -->
									<div class="modal fade" id="editarTarefa-<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												
												<div class= "modal-header">
													<h4 class="modal-title text-center" id="myModalLabel">
														Editar Tarefa
													</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												
												<div class="modal-body">
													<form class="form-horizontal" method="POST" action="../../controller/estoria/tarefa/editarTarefa.php?idTarefa=<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" enctype="multipart/form-data" data-toggle="validator">
														<label for="recipient-name" class="control-label">Informe o nome da tarefa:</label>
														<input value="<?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getNome();?>
" name="nome" type="text" class="form-control" id="recipient-name">
												</div>
												
												<div class="modal-footer">
													<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
													<input type="submit" class="btn btn-success" name="atualizar" value="Atualizar"></input>
													</form>
												</div>
												
											</div>
										</div>
									</div>
									<!-- Fim Modal -->
									
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>

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

                            <a href="../../controller/sprint_backlog/criarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
&id_estoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" title="Adicionar estória ao Sprint Backlog" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i></a>

                            <?php } else { ?>

                            <a href="../../controller/sprint_backlog/criarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
&id_estoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" title="Adicionar estória ao Sprint Backlog" class="disabled d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus"></i></a>

                            <?php }?>

                            <button title="Editar estória" onclick="editar('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
')" type="button" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></button>

                            <?php echo '<script'; ?>
 type="text/javascript">
                                function editar(estoria, projeto) {
                                    window.location = '../../controller/product_backlog/exibirEstoria.php?idEstoria=' + estoria + '&idProjeto=' + projeto;
                                }
                            <?php echo '</script'; ?>
>

                            <button title="Excluir estória" onclick="apagarEstoriaProductBacklog('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>

                            <?php echo '<script'; ?>
 type="text/javascript">
                                function apagarEstoriaProductBacklog(estoria, projeto) {
                                    if (window.confirm('Deseja realmente excluir esta estória do projeto? Essa ação não poderá ser desfeita.')) {
                                        window.location = '../../controller/product_backlog/excluirEstoria.php?idEstoria=' + estoria + '&idProjeto=' + projeto;
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
                <a href="../../controller/product_backlog/criarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
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
                            <?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>
                                <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getSituacao() == "Concluída")) {?>

                                     <a href="../../controller/estoria/aprovarEstoria.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i> Aceitar
                                    </a>

                                     <a href="../../controller/estoria/rejeitarEstoria.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i> Rejeitar
                                    </a>

                                     <br>

                                <?php }?>
                            <?php }?>
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

                            <div style="padding: 0px 0px;">
                                <a href="#tarefasSB-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="tarefasSB-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">

                                    <h6 style="color:#36B9CC" class="font-weight-bold">
                                        Tarefas
                                        <i class="fas fa-chevron-right"></i>
                                    </h6>

                                </a>

                                <div class="collapse" id="tarefasSB-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">

                                    <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getTarefas() != null)) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getTarefas(), 'tarefa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tarefa']->value) {
?>

                                            <br>
                                            <i style="color:#36B9CC" class="fas fa-check"></i>
                                            <?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getNome();?>

                                            <br>
                                            <b>Situação:</b> <?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getSituacao();?>

                                            <br>
                                            
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php }?>

                                </div>
                            </div>

                            <?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>

                                <br>
                                <a href="../../controller/sprint_backlog/exibirEstoria.php?idEstoria=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
&idProjeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
">
                                    <button title="Editar estória" type="button" class="btn-sm btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>

                                <button title="Excluir estória do Sprint Backlog" onclick="apagarEstoriaSprintBacklog('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn-sm btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                                <?php echo '<script'; ?>
 type="text/javascript">
                                    function apagarEstoriaSprintBacklog(estoria, idProjeto) {
                                        if (window.confirm('Deseja realmente excluir esta estória do Sprint Backlog?')) {
                                            window.location = '../../controller/sprint_backlog/excluirEstoria.php?idEstoria=' + estoria + '&idProjeto=' + idProjeto;
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

            <?php if (($_smarty_tpl->tpl_vars['finalizado']->value->getEstorias() != null)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['finalizado']->value->getEstorias(), 'estoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estoria']->value) {
?>

            <div  class="card border-left-success h-10">
                <!-- Collapsable Card Example -->
                <div class="card">

                    <!-- Card Header - Accordion -->
                    <a href="#estoriaFinalizado-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" class="d-block card-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="estoriaFinalizado-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
                        <h6 class="font-weight-bold text-secondary"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</h6>
                    </a>

                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="estoriaFinalizado-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
                        <div class="card-body">
                            <?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>

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

                            <div style="padding: 0px 0px;">
                                <a href="#tarefas-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="tarefas-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
                                    <h6 style="color:green" class="font-weight-bold">
                                        Tarefas
                                        <i class="fas fa-chevron-right"></i>
                                    </h6>
                                </a>
                                <div class="collapse" id="tarefas-<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
">
                                    <?php if (($_smarty_tpl->tpl_vars['estoria']->value->getTarefas() != null)) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estoria']->value->getTarefas(), 'tarefa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tarefa']->value) {
?>
                                            <i style="color:green" class="fas fa-check"></i>
                                            <?php echo $_smarty_tpl->tpl_vars['tarefa']->value->getNome();?>

                                            <br>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php }?>
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
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../../view/dashboard/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
