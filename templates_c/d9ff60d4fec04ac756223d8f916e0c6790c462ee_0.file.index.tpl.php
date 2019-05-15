<?php
/* Smarty version 3.1.33, created on 2019-05-10 19:44:26
  from 'C:\xampp\htdocs\samp\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd5b87a273f92_31201944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9ff60d4fec04ac756223d8f916e0c6790c462ee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\index.tpl',
      1 => 1557510117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd5b87a273f92_31201944 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
	<?php echo $_smarty_tpl->tpl_vars['Contacts']->value['fax'];?>
<br>
<?php echo $_smarty_tpl->tpl_vars['Contacts']->value['email'];?>
<br>
<?php echo $_smarty_tpl->tpl_vars['Contacts']->value['phone']['home'];?>
<br>
<?php echo $_smarty_tpl->tpl_vars['Contacts']->value['phone']['cell'];?>
<br>
</html><?php }
}
