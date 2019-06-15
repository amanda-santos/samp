<?php
/* Smarty version 3.1.33, created on 2019-06-15 01:01:34
  from 'C:\xampp\htdocs\samp\view\dashboard\dashboard.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d04274e94b9e9_81234495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '289adbe72b7af4d2cadf57f91130f87081c6e991' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samp\\view\\dashboard\\dashboard.html',
      1 => 1560553291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../view/dashboard/header.html' => 1,
    'file:../../view/dashboard/footer.html' => 1,
  ),
),false)) {
function content_5d04274e94b9e9_81234495 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../view/dashboard/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Projetos</h6>
      </div>
      <div class="card-body">
        <h4 class="small font-weight-bold">Projeto 1 <span class="float-right">20%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Projeto 2 <span class="float-right">40%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Projeto 3 <span class="float-right">60%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Projeto 4 <span class="float-right">80%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Projeto 5 <span class="float-right">Complete!</span></h4>
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../../view/dashboard/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
}
}
