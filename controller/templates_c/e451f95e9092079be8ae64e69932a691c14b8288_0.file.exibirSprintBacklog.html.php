<?php
/* Smarty version 3.1.33, created on 2019-05-22 18:32:49
  from 'C:\xampp\htdocs\samp\view\exibirSprintBacklog.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce579b10839d1_44614627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e451f95e9092079be8ae64e69932a691c14b8288' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\exibirSprintBacklog.html',
      1 => 1558542763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5ce579b10839d1_44614627 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!--<div>
	<a href="../controller/exibirProductBacklog.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Product Backlog </a>
	<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Sprint Backlog</a>
</div>-->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Sprint Backlog</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

    <div class="col-md-12">
		  <table class="table col-md-15">
			  <thead>
				  <tr>
					<th>Nome da Estória</th>
					<th>Situação</th>
					<th>Nível de dificuldade</th>
					<th>Duração (Em horas)</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($_smarty_tpl->tpl_vars['sprintBacklog']->value->getEstorias() != null) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sprintBacklog']->value->getEstorias(), 'estoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estoria']->value) {
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getSituacao();?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNivelDificuldade();?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDuracao();?>
</td>
								<td>
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
"><i class="fas fa-eye"></i></button>
									<?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>
										<a href="editarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
"><button onclick="editar" type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button></a>
										<button onclick="apagar('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
										<?php echo '<script'; ?>
 type="text/javascript">
													function apagar(estoria, idProjeto) {
														if (window.confirm('Deseja realmente excluir esta estória do Sprint Backlog?')) {
															window.location = '../controller/excluirEstoriaSprintBacklog.php?idEstoria=' + estoria + '&idProjeto=' + idProjeto;
														}
													}
										<?php echo '</script'; ?>
>
										<a href="../controller/visualizarResponsaveis.php?id=<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
"title="Visualizar Responsáveis" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
"class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-user-friends"></i></i></a>
									<?php }?>
									<!--<?php if ($_smarty_tpl->tpl_vars['responsaveis']->value) {?>
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ModalCadastrarSubtarefa"><i class="fas fa-tasks"></i></button>
									<?php }?>-->
								</td>
							</tr>
							<!-- Inicio Modal -->
							<div class="modal fade" id="myModal<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class= "modal-header">
										<h4 class="modal-title text-center" id="myModalLabel"><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body">
											<p><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getDesc();?>
</p>
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="ModalCadastrarSubtarefa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class= "modal-header">
										<h4 class="modal-title text-center" id="myModalLabel">Informe o nome da subtarefa</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body">
											<form>
									          <div class="form-group">
									            <input type="text" class="form-control" id="recipient-name">
									          </div>
									        </form>
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" type="button" data-dismiss="modal">
											Fechar</button>
											<button type="button" class="btn btn-primary">Cadastrar Subtarefa</button>
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
			</tbody>
		 	</table>
		</div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:../view/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
