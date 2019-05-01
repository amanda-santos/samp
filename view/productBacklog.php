<?php 
  include("include/header.php"); //incluir arquivo com conexão ao banco de dados
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Product Backlog</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

  	<div>
      <a href="cadastrarEstoria.php?id=<?php echo utf8_decode (strip_tags(trim($_GET['id']))) ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-align-justify"></i> Cadastrar Estória</a>
    </div>

</div>
</div>

<?php 
  include("include/footer.php"); //incluir arquivo com conexão ao banco de dados
?>