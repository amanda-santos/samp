<?php
/* Smarty version 3.1.33, created on 2019-05-16 02:47:42
  from 'C:\xampp\htdocs\samp\view\exibirSprintBacklog.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdcb32e82f111_72148974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e451f95e9092079be8ae64e69932a691c14b8288' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\exibirSprintBacklog.html',
      1 => 1557967651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5cdcb32e82f111_72148974 (Smarty_Internal_Template $_smarty_tpl) {
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

	<!--<div>
	    <a href="../controller/criarEstoriaSprintBacklog.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-align-justify"></i> Cadastrar Estória</a>
	</div>

	<?php if (($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster())) {?>-

	  	<div>
	      <a href="../controller/criarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-align-justify"></i> Cadastrar Estória</a>
	    </div>

    <?php }?>-->

    <div class="col-md-12">
		  <table class="table">
			  <thead>
				  <tr>
					<th>Nome da Estória</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($_smarty_tpl->tpl_vars['productBacklog']->value->getEstorias() != null) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productBacklog']->value->getEstorias(), 'estoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estoria']->value) {
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['estoria']->value->getNome();?>
</td>
								<td>
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
"><i class="fas fa-eye"></i></button>
									<button onclick="editar" type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
									<?php echo '<script'; ?>
 type="text/javascript">
										function editar(projeto) {												
											window.location = '../controller/.php?projeto=' + estoria;											
										}
									<?php echo '</script'; ?>
>		

								<?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>

								<button onclick="apagar('<?php echo $_smarty_tpl->tpl_vars['estoria']->value->getId();?>
');" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
								<?php echo '<script'; ?>
 type="text/javascript">
											function apagar(estoria) {
												if (window.confirm('Deseja realmente apagar esta estoria? Essa ação não poderá ser desfeita.')) {
													window.location = '../controller/excluirEstoria.php';
												}
											}

								<?php echo '</script'; ?>
>
								</td>
								<?php }?>
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
