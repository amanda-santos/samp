<?php
/* Smarty version 3.1.33, created on 2019-05-12 05:05:34
  from 'C:\xampp\htdocs\samp\controller\header.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd78d7eef0bb2_76599467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97e47b3b17cfc69481cdb6c07c41c2359808a207' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\controller\\header.php',
      1 => 1557630330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd78d7eef0bb2_76599467 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
	';?>session_start();
	if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
		require '../libs/Smarty.class.php';
		$smarty = new Smarty;
		$smarty->assign("nome", $_SESSION["nome"]);
		$smarty->display('../view/header.html');
	} else {
		//echo "<?php echo '<script'; ?>
>window.location = '../view/index.html';<?php echo '</script'; ?>
>";
	}
<?php echo '?>';
}
}
