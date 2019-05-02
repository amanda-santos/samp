<?php 
  include("include/header.php"); //incluir arquivo com conexão ao banco de dados
  $result_estoria = "SELECT * FROM estoria WHERE Projeto_id = '".$_GET['id']."';";
  $resultado_estoria = mysqli_query($conn, $result_estoria);

  $result_scrum_master = "SELECT scrum_master FROM usuario_projeto WHERE Projeto_id = '".(strip_tags(trim($_GET['id'])))."';";
  $resultado_scrum_master = mysqli_query($conn, $result_scrum_master);
  while($rows_scrum_master = mysqli_fetch_assoc($resultado_scrum_master)){ 
  	$scrumMaster = $rows_scrum_master['scrum_master'];
  }
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Product Backlog</h1>
</div>

<!-- Content Row -->
<div class="col-md-8"> 
<div class="row">

	<?php
		if ($scrumMaster == 1) {
	?>

	  	<div>
	      <a href="cadastrarEstoria.php?id=<?php echo utf8_decode (strip_tags(trim($_GET['id']))) ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-align-justify"></i> Cadastrar Estória</a>
	    </div>

    <?php
		}
	?>

  </div>
  	<br>
	  <div class="row">
		  <div class="col-md-12">
			  <table class="table">
				  <thead>
					  <tr>
						<th>Nome da Estória</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($rows_estoria = mysqli_fetch_assoc($resultado_estoria)){ ?>
						<tr>
							<td><?php echo $rows_estoria['nome']; ?></td>
							<td>
							<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_estoria['id']; ?>">Visualizar</button>
							</td>
						</tr>
						<!-- Inicio Modal -->
						<div class="modal fade" id="myModal<?php echo $rows_estoria['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class= "modal-header">
									<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_estoria['nome']; ?></h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<p><?php echo $rows_estoria['descricao']; ?></p>
									</div>
									<div class="modal-footer">
										<button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Fim Modal -->
						<?php } ?>
				</tbody>
			 </table>
		</div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</div>
</div>

<?php 
  include("include/footer.php"); //incluir arquivo com conexão ao banco de dados
?>
