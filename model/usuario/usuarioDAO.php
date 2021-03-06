<?php
	require_once 'Usuario.php';

	class usuarioDAO{
	
		public static function persistirUsuario($nome, $sobrenome, $usuario, $email, $senha){
			include("../../model/conexao/conecta.php");
			$sql = "SELECT * FROM usuario WHERE usuario = '".$usuario."';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { // se achar algum registro
				echo "<script>alert('Esse nome de usuário já existe.');</script>";
				echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
			}else{
				$SQL = "SELECT * FROM usuario WHERE email = '". $email . "';";
				$result = $conn->query($SQL);
				if ($result->num_rows > 0) { // se achar algum registro
					echo "<script>alert('Já existe uma conta cadastrada com esse e-mail.');</script>";
					echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
				} else {
				//define o comando sql para inserção
					$SQL = "INSERT INTO usuario (usuario, senha, nome, sobrenome, email, ativo) VALUES ('".$usuario."','".$senha."','".$nome."','".$sobrenome."','".$email."',0)";
					if ($conn->query($SQL) === TRUE){
						//verifica se o comando foi executado com sucesso
						//$_SESSION['usuario'] = $this->$usuario;
						//$_SESSION['nome'] = $this->$nome;
						echo "<script>window.location = '../../model/usuario/enviarEmailAtivacao.php?email=$email';</script>";
					}else{
						//mensagem exibida caso ocorra algum erro na execução do comando sql
						echo "<script>alert('Erro ao criar a conta!');</script>";
						echo "Erro: ". $SQL. "<br>" . $conn->error;
					}
				}
			}
			$conn->close();
		}

		public function selecionarUsuario($usuario){
			include("../../model/conexao/conecta.php");
			require_once 'Usuario.php'; 
			$sql = "SELECT * FROM usuario WHERE usuario='$usuario'";
		    $result = $conn->query($sql);
		    if ($result->num_rows > 0) { // Exibindo cada linha retornada com a consulta
		      while ($exibir = $result->fetch_assoc()){
		      	$usuario = new Usuario();
		        $usuario->setNome($exibir["nome"]);
		        $usuario->setSobrenome($exibir["sobrenome"]); 
		        $usuario->setEmail($exibir["email"]);
		        $usuario->setUsuario($exibir["usuario"]);
		        $usuario->setSenha($exibir["senha"]);
		        return $usuario;
		      } // fim while
		    } else { //se não achar nenhum registro
		      echo "Não há dados cadastrados com o usuário informado.";
		      exit;
		    }
		}

		public function ativarUsuario($usuario){
			include("../../model/conexao/conecta.php");
			$sql = "UPDATE usuario SET ativo = 1 WHERE usuario = '".$usuario."';";
			$result = $conn->query($sql);

			if ($conn->query($sql) === TRUE){
				//verifica se o comando foi executado com sucesso
				echo "<script>alert('Sua conta foi ativada com sucesso!');</script>";
				echo "<script>window.location = '../../view/usuario/login.html';</script>";
			}else{
				//mensagem exibida caso ocorra algum erro na execução do comando sql
				echo "<script>alert('Erro ao ativar a conta!');</script>";
				echo "Erro: ". $sql. "<br>" . $conn->error;
			}
		}

		public function editarUsuario($nome, $sobrenome, $usuario, $email, $usuarioAntigo, $emailAntigo){
			include("../../model/conexao/conecta.php");
			if ($usuarioAntigo != $usuario) {
		  	$sql = "SELECT * FROM usuario WHERE usuario='".$usuario."'";
		  	$result = $conn->query($sql);
		  		if ($result->num_rows > 0) { // se achar algum registro
		    	echo "<script>alert('Esse nome de usuário já existe.');</script>";
		    	echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
		    	exit;
		  		}
			}

			if ($emailAntigo != $email) {
		  	$SQL = "SELECT * FROM usuario WHERE email='".$email."'";
		  	$result = $conn->query($SQL);
		  		if ($result->num_rows > 0) { // se achar algum registro
		    	echo "<script>alert('Já existe uma conta cadastrada com esse e-mail.');</script>";
		    	echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
		    	exit;
		  		}
			}
		    
		    $sql = "UPDATE usuario SET usuario= '".$usuario."', nome= '".$nome."', sobrenome= '".$sobrenome."', email = '".$email."' WHERE usuario = '".$usuarioAntigo."'";
		    //echo "<script>alert(".$sql.");</script>";
		    if ($conn->query($sql) === TRUE) {

		      $_SESSION['usuario'] = $usuario;
              $_SESSION['nome'] = $nome;
              $_SESSION['sobrenome'] = $sobrenome;
              $_SESSION['email'] = $email;

		      echo "<script>alert('Sua conta foi atualizada com sucesso!');</script>";
		      echo "<script>window.location = '../../controller/usuario/exibirUsuario.php';</script>";
		    } else {
		      echo "Erro: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		  
		}

		public function inativarUsuario($usuario){
			include("../../model/conexao/conecta.php");
			$sql = "UPDATE usuario SET ativo = 0 WHERE usuario = '".$usuario."'";

			if ($conn->query($sql) === TRUE) { //se o comando funcionou
				echo "<script>alert('Sua conta foi desativada com sucesso.');</script>";
				echo "<script>window.location = '../../view/index.html';</script>";
				session_destroy();
			}
			else{ //se o comando não funcionou
				echo "<script>alert('Erro ao desativar a conta!');</script>";
				echo "<script>window.location = '../../controller/usuario/editarUsuario.php';</script>";
				echo "Erro: ". $SQL. "<br>" . $conn->error;
			}
		}

		
		public static function login($usuario, $senhaCrip){   
            include("../../model/conexao/conecta.php");
            $sql = "SELECT * FROM usuario WHERE usuario = '" . $usuario . "' AND senha = '" . $senhaCrip. "';";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) { //SE O USUÁRIO E SENHA FOREM VÁLIDOS

                $exibir = $resultado->fetch_assoc();
                $ativo = $exibir["ativo"];

                if($ativo == 1){ //se o status do usuário for ativo
                    $_SESSION['usuario'] = $usuario;
		            $_SESSION['nome'] = $nome;
		            $_SESSION['sobrenome'] = $sobrenome;
		            $_SESSION['email'] = $email;

			        header('location:../../controller/dashboard/dashboard.php');
                }else{
                    //REDIRECIONA PARA A PAGINA INICIAL REPORTANDO O ERRO
                    $_SESSION['erro']='Erro';
                    echo "<script>alert('Erro no login. Tente novamente.');</script>";
                    echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
                }

            }else{
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                echo "<script>alert('Erro no login. Tente novamente.');</script>";
                echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
            }
        }


        public function alterarSenha($atual, $nova){
        	include("../../model/conexao/conecta.php");

        	$sql = "SELECT senha FROM usuario WHERE usuario = '" . $_SESSION['usuario'] . "';";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) { //SE O USUÁRIO E SENHA FOREM VÁLIDOS
            	$linha = $resultado->fetch_assoc();
            	$atual = base64_encode($atual);
				if ($linha["senha"] == $atual) { //se a senha antiga (BD) e atual (passada pelo usuário no formulário) forem iguais, a alteração da senha pela nova é permitida
			    	$novaCodificada = base64_encode($nova);
			      	$sql = "UPDATE usuario SET senha= '".$novaCodificada."' WHERE usuario = '" . $_SESSION['usuario'] . "';";
			    
			      	if ($conn->query($sql) === TRUE) {
			        	echo "<script>alert('Sua senha foi atualizada com sucesso!');</script>";
			        } else {
			        	echo "Erro: " . $sql . "<br>" . $conn->error;
			        }
		      		$conn->close();
			    } else { //senão, o usuário não digitou a senha antiga correta e a senha não pode ser alterada
			      echo "<script>alert('Sua senha está incorreta!');</script>";
			      echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
			    }
			}
		}
		
		public function recuperarSenha($email){
			include("../../model/conexao/conecta.php");
			echo "<script>window.location = '../../model/usuario/enviarEmailRecuperacao.php?email=$email';</script>";
		}
	}
?>
