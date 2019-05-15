<?php
/* Smarty version 3.1.33, created on 2019-05-16 01:17:56
  from 'C:\xampp\htdocs\samp\view\exibirSprintBacklog.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdc9e2452d5a1_94447527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e451f95e9092079be8ae64e69932a691c14b8288' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\exibirSprintBacklog.html',
      1 => 1557961769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../view/header.html' => 1,
    'file:../view/footer.html' => 1,
  ),
),false)) {
function content_5cdc9e2452d5a1_94447527 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div>
	<a href="../controller/exibirProductBacklog.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Product Backlog </a>
	<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Sprint Backlog</a>
</div>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Sprint Backlog</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

	<div>
	    <a href="../controller/criarEstoriaSprintBacklog.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-align-justify"></i> Cadastrar Estória</a>
	</div>

	<!--<?php if (($_smarty_tpl->tpl_vars['projeto']->value->getScrumMaster())) {?>-

	  	<div>
	      <a href="../controller/criarEstoria.php?id=<?php echo $_smarty_tpl->tpl_vars['projeto']->value->getId();?>
" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-align-justify"></i> Cadastrar Estória</a>
	    </div>

    <!--<?php }?>-->

  
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
