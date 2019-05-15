<?php
/* Smarty version 3.1.33, created on 2019-05-15 15:45:24
  from 'C:\xampp\htdocs\samp\view\exibirProjetos.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdc17f4510b46_30913590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '445cebdfc5650f4a8ce70c166bb1f6cad95b43b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\exibirProjetos.html',
      1 => 1557927921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5cdc17f4510b46_30913590 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Projetos</h1>
</div> 

<div class="container theme-showcase" role="main">

	<!-- Content Row -->
	<div class="row">

	  <div>
	    <a href="../controller/criarProjeto.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle"></i> Criar Projeto</a>
	    <a href="../controller/entrarProjeto.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sign-in-alt"></i> Participar de um Projeto</a>
	  </div>
	  
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome do Projeto</th>
						<th>Ações</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projetos']->value, 'projeto', false, NULL, 'laco1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['projeto']->value) {
?>
						<tr>
							<?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>
								<td><?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
</td>
							<?php } else { ?>
								<td></td>
							<?php }?>
							<td><?php echo $_smarty_tpl->tpl_vars['projeto']->value->getNome();?>
</td>
							<td>
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
">Visualizar</button>
							
								<?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>
							
								<button onclick="editar('<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
									<?php echo '<script'; ?>
 type="text/javascript">
										function editar(projeto) {
											
												window.location = '../controller/editarProjeto.php?projeto=' + projeto;
											
										}

									<?php echo '</script'; ?>
>

								<button onclick="apagar('<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
								<?php echo '<script'; ?>
 type="text/javascript">
							        function apagar(projeto) {
							          if (window.confirm('Deseja realmente apagar este projeto? Essa ação não poderá ser desfeita.')) {
							            window.location = '../controller/excluirProjeto.php?projeto=' + projeto;
							          }
							        }

								<?php echo '</script'; ?>
>
							</td>
							<?php }?>
						</tr>
						<!-- Inicio Modal -->
						<div class="modal fade" id="myModal<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class= "modal-header">
									<h4 class="modal-title text-center" id="myModalLabel"><?php echo $_smarty_tpl->tpl_vars['projeto']->value->getNome();?>
</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<p><?php echo $_smarty_tpl->tpl_vars['projeto']->value->getDesc();?>
</p>
									</div>
									<div class="modal-footer">
										<button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
										<a class="btn btn-primary" href="../controller/exibirProductBacklog.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
">Ir para o Projeto</a>
									</div> 

								</div>
							</div>
						</div>
						<!-- Fim Modal -->
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</tbody>
			 </table>
		</div>
	</div>		
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../view/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
