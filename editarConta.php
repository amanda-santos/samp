<?php
  include("include/header.php"); //incluir arquivo com conexão ao banco de dados
  if (isset($_SESSION["usuario"])) { //SE EXISTIR AUTENTICAÇÃO
  $usuario = $_SESSION["usuario"]; //usuário definido pela sessão atual

  //echo $usuario;
  
  //selecionando dados do banco para exibição nos campos de edição
  $sql = "SELECT * FROM tb_usuario WHERE usuario='$usuario'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
    while ($exibir = $result->fetch_assoc()){
      $nome = $exibir["nome"];
      $sobrenome = $exibir["sobrenome"];
      $email = $exibir["email"];
      $usuario = $exibir["usuario"];
      $senha = $exibir["senha"];

    } // fim while
  } else { //se não achar nenhum registro
    echo "Não há dados cadastrados com o usuário informado.";
    exit;
  }
  //SE ATUALIZAR POST
  if (isset($_POST["atualizar"])) {
    if ($_POST["usuario"] != $usuario) {
      $sql = "SELECT * FROM tb_usuario WHERE usuario='".$_POST["usuario"]."'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) { // se achar algum registro
        echo "<script>alert('Esse nome de usuário já existe.');</script>";
        echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
        exit;
      }
    }
    if ($_POST["email"] != $email) {
      $SQL = "SELECT * FROM tb_usuario WHERE email='".$_POST["email"]."'";
      $result = $conn->query($SQL);
      if ($result->num_rows > 0) { // se achar algum registro
        echo "<script>alert('Já existe uma conta cadastrada com esse e-mail.');</script>";
        echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
        exit;
      }
    }
        
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $usuario = $_POST["usuario"];

        $sql = "UPDATE tb_usuario SET usuario= '".$usuario."', nome= '".$nome."', sobrenome= '".$sobrenome."', email = '".$email."', senha= '".$senha."' WHERE usuario = '".$_SESSION["usuario"]."'";
        //echo "<script>alert(".$sql.");</script>";
        if ($conn->query($sql) === TRUE) {
          $_SESSION['usuario'] = $usuario;
          $_SESSION['nome'] = $nome;
          //$('.modal').modal('show')myModal
          //echo '<script>$("#myModal").modal("show");</script>';
          //echo "<script>$('#myModal').modal('show');</script>";
          //echo '<script>alert("'.$sql.'");</script>';
          //echo $sql;
          echo "<script>alert('Sua conta foi atualizada com sucesso!');</script>";
          echo "<script>window.location = 'editarConta.php';</script>";
        } else {
          echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      
  } //fim se atualizar perfil
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar conta</h1>
</div>

<!--início grid do post-->
<div class="row">
  <div class="col-md-8"> 

    <!-- início do post -->
    <div class = "post">
      <form class="form-horizontal" method="POST" action="editarConta.php" enctype="multipart/form-data" data-toggle="validator">

      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-3" for="nome">Nome:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome;?>" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->
      
      <!--início do campo do formulário-->
        <div class="form-group required">
        <label class="control-label col-sm-3" for="sobrenome">Sobrenome:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome;?>" required>
        </div> <!--fim col-sm-5-->
        </div> <!--fim form-group-->
      <!--fim do campo do formulário-->
      

      <div class="form-group required">
        <label class="control-label col-sm-3" for="email">E-mail:</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" data-error="Por favor, informe um e-mail correto." required>
            <div class="help-block with-errors"></div>
        </div> <!--fim col-sm-5-->
      </div> <!--fim form-group-->
      
      <div class="form-group has-feedback required">
        <label for="usuario" class="control-label col-sm-3">Nome de usuário:</label>
        <div class="col-sm-5">
          <div class="input-group">
            <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario;?>" required>
          </div> <!--fim input-group-->
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors">Seu nome de usuário só pode conter letras, números e '_'.</div>
        </div> <!--fim col-sm-5-->
      </div> <!--fim form-group-->
      
      
      <div class="col-sm-9">
        <p>
          <a href="#" onclick="apagar('<?php echo $usuario; ?>');" id="admButtons" class="btn btn-sm btn-danger" style="font-size: 14px;">
            <span class="glyphicon glyphicon-remove"></span> Desativar conta
          </a>
          <a href="altSenha.php"  id="admButtons" class="btn btn-sm btn-success" style="font-size: 14px;">
            <span class="glyphicon glyphicon-edit"></span> Alterar senha
          </a>
        </p>
      </div>
      
      <br>
      <div class="col-sm-8">
        <input type="submit" class="btn btn-success" name="atualizar" value="Atualizar"></input>
        <!--<input type="button" data-toggle="modal" data-target="#confirm-submit" class="btn btn-success" name="atualizar" value="Atualizar" id="myBtn"></input>-->
        
        <a href="javascript:window.history.go(-1)"><input type="button" class="btn btn-default" value="Cancelar"></input></a>
      </div> <!--fim col-sm-8-->
      
      
        <!--início função apagar usuário-->
                <script type="text/javascript">
                  function apagar(usuario) {
                    if (window.confirm('Deseja realmente desativar sua conta @' + usuario + '? Essa ação não poderá ser desfeita.')) {
                      window.location = 'inativarUsuario.php?usuario=' + usuario;
                    }
                  }

                </script>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
      
      </form>
      
    </div> <!-- fim da div post -->
    <!-- fim do post -->  
      
  </div><!--fim col-md-8-->


<?php 
  include("include/footer.php"); //incluir arquivo com conexão ao banco de dados
?>
<?php
  } else {
    echo "<script>window.location = 'index.php';</script>";
  }
?>  
