<?php
	require_once '../Pojo/PojoUsuario.php';
	require_once '../Dao/DaoUsuario.php';
	
	#mensagem de erro
	$error_msg = '';
	
	$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
	$idade = filter_input(INPUT_POST,'idade',FILTER_SANITIZE_NUMBER_INT);
	$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

	if(isset($nome) && isset($senha) && isset($email) && isset($idade)){
		/*
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo $error_msg = 'Email não valido';
		}else{
			$usuario = DaoUsuario::buscarPorEmail($email);
		}

		
		if(isset($usuario)){
			if($usuario->getEmail() ===  $email){
				echo $error_msg = 'usuario ja existe';
			}
		}
		*/
		#Se estiver vazio = nenhum erro, pode prosseguir
		if(empty($error_msg)){
			
			$salt = "algo_muito_secreto_aqui";
			
			#Criptografando senha do usuario
			$senha = md5($senha . $salt);
			
			#Criando objeto Usuario 
			$usuario = new PojoUsuario();
			
			#Atribuindo informaçoes ao objeto
			$usuario->setNome($nome);
			$usuario->setSenha($senha);
			$usuario->setEmail($email);
			$usuario->setIdade($idade);
			$usuario->setAdmin(0);
			$usuario->setMedico(0);

			#inserindo
			if(DaoUsuario::inserir($usuario)){
				#session_start();
				
				#$_SESSION['emailLogado'] = $usuario->getEmail();

				#redireciona para a página
				#header('Location:../../index.php');
				header('Location:usuario_login.php');
			}else{
				#header('Location:usuario_login.php');
				echo "Erro ao cadastrar usuário...";
			}
		}	
	}
?>