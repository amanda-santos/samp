<?php 
  include("include/header.php"); //incluir arquivo com conexão ao banco de dados
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Participar de um projeto</h1>
</div>

<!-- Content Row -->
<div class="row">

  	<div class = "post">
      <form class="form-horizontal" method="POST" action="../controller/criarProjeto.php" enctype="multipart/form-data" data-toggle="validator">

      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-20" for="nome">Codigo do Projeto:</label>
        <div class="col-sm-30">
          <input type="text" class="form-control" id="nome" name="nome" value="" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->
      
      <div class="col-sm-8">
        <input type="submit" class="btn btn-success" name="entrar_projeto" value="Entrar"></input>
      </div> <!--fim col-sm-8-->

      </form>
    </div> <!-- fim da div post -->
    <!-- fim do post -->  

</div>

<?php 
  include("include/footer.php"); //incluir arquivo com conexão ao banco de dados
?>