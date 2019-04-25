<?php 
  include("include/header.php"); //incluir arquivo com conexão ao banco de dados
  require_once '../model/projetoModel.php'; //não consegui fazer essa parte de outro jeito, arrumo depois caso for necessario
  $result_projeto = "SELECT * FROM projeto";
  $resultado_projeto = mysqli_query($conn, $result_projeto);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Projetos</h1>
</div>

<!-- Content Row -->
<div class="row">

  <div>
    <a href="criarProjeto.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle"></i> Criar Projeto</a>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sign-in-alt"></i> Participar de um Projeto</a>
  </div>

</div>
	<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Modal</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
		
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome do Projeto</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_projeto = mysqli_fetch_assoc($resultado_projeto)){ ?>
								<tr>
									<td><?php echo $rows_projeto['id']; ?></td>
									<td><?php echo $rows_projeto['nome']; ?></td>
									<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_projeto['id']; ?>">Visualizar</button>
									</td>
								</tr>
								<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $rows_projeto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class= "modal-header">
											<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_projeto['nome']; ?></h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
												<p><?php echo $rows_projeto['descricao']; ?></p>
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
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
  include("include/footer.php"); //incluir arquivo com conexão ao banco de dados
?>
