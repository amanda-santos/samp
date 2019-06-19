<?php
/* Smarty version 3.1.33, created on 2019-06-19 03:24:46
  from 'C:\xampp\htdocs\samp\view\projeto\exibirProjetos.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d098ede08c3e0_95678119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67f80424b01373f7c16a1b48568dda559515c572' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\projeto\\exibirProjetos.html',
      1 => 1560907484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../view/dashboard/header.html' => 1,
    'file:../../view/dashboard/footer.html' => 1,
  ),
),false)) {
function content_5d098ede08c3e0_95678119 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../view/dashboard/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Projetos</h1>
</div> 

<div class="container theme-showcase" role="main">

	<!-- Content Row -->
	<div class="row">

	  <div>
	    <a href="../../controller/projeto/criarProjeto.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle"></i> Criar Projeto</a>
	    <a href="../../controller/projeto/entrarProjeto.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sign-in-alt"></i> Participar de um Projeto</a>
	  </div>
	  
	</div>
	<br>
	<div class="row">

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projetos']->value, 'projeto', false, NULL, 'laco1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['projeto']->value) {
?>

		<!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                  	<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getNome();?>

                  </div>
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  	<?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>
                  		#<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>

                  	<?php }?>
                  </div>

                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
"><i class="fas fa-eye"></i></button>

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
									<a class="btn btn-primary" href="../../controller/projeto/dashboardProjeto.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
">Ir para o Projeto</a>
								</div> 

							</div>
						</div>
					</div>
					<!-- Fim Modal -->
								
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalUsers<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
"><i class="fa fa-user"></i></button>

					<!-- Inicio Modal integrantes -->
					<div class="modal fade" id="ModalUsers<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class= "modal-header">
								<h4 class="modal-title" id="myModalLabel"><?php echo $_smarty_tpl->tpl_vars['projeto']->value->getNome();?>
: Equipe</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<p>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projeto']->value->getParticipantes(), 'participante');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['participante']->value) {
?>
											
											<b><?php echo $_smarty_tpl->tpl_vars['participante']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['participante']->value->getSobrenome();?>
 </b>
											<br>
											<i class="fas fa-user"></i> <i><?php echo $_smarty_tpl->tpl_vars['participante']->value->getUsuario();?>
</i> 
											<br>
											<i class="fas fa-envelope"></i> <i><?php echo $_smarty_tpl->tpl_vars['participante']->value->getEmail();?>
</i>
											<br>
											<i class="fas fa-users"></i> 
											<?php if (($_smarty_tpl->tpl_vars['participante']->value->getScrumMaster() == 1)) {?> 
												Scrum Master 
											<?php } else { ?> 
												Membro da Equipe 
											<?php }?>
											<br><br>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</p>
								</div>
								<div class="modal-footer">
									<button class="btn btn-primary" type="button" data-dismiss="modal">Fechar</button>
									
								</div> 

							</div>
						</div>
					</div>
					<!-- Fim Modal -->

					<?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 0) {?>

					<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modalSairProjeto<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
"><i class="fas fa-sign-out-alt"></i></button>

                  	<!-- Inicio Modal -->
					<div class="modal fade" id="modalSairProjeto<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" tabindex="-1" role="dialog" aria-labelledby="modalSairProjeto">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class= "modal-header">
								<h4 class="modal-title text-center" id="myModalLabel">Sair do Projeto</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<p>Tem certeza que deseja realmente sair do projeto?</p>
									<p>Esta ação não poderá ser desfeita</p>
								</div>
								<div class="modal-footer">
									<a class="btn btn-primary" href="../../controller/projeto/sairProjeto.php?id_projeto=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
">Sair do Projeto</a>
									<button class="btn btn-danger" type="button btn-danger" data-dismiss="modal">Cancelar</button>
								</div> 
							</div>
						</div>
					</div>
					<!-- Fim Modal -->

					<?php }?>
				
		      	  <?php if ($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster() == 1) {?>
					
					<a href="../../controller/projeto/exibirProjeto.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
"><button type="button" class="btn-sm btn btn-warning"><i class="fas fa-pencil-alt"></i></button></a>

					<button onclick="apagar('<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
');" type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>

					<?php echo '<script'; ?>
 type="text/javascript">
						function apagar(projeto) {
							if (window.confirm('Deseja realmente apagar este projeto? Essa ação não poderá ser desfeita.')) {
								window.location = '../../controller/projeto/excluirProjeto.php?projeto=' + projeto;
							}
						}
					<?php echo '</script'; ?>
>

				  <?php }?>

                </div>
                <div class="col-auto">
                  <i class="fas fa-2x text-gray-300 fa-folder"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div> <!--row-->	
</div> <!--container-->	

<?php $_smarty_tpl->_subTemplateRender("file:../../view/dashboard/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
