<?php
	session_start();

	if(isset($_SESSION["emailLogado"])){
		header('Location:../../index.php');
		exit;
	}

	require_once '../Pojo/PojoUsuario.php';
	require_once '../Dao/DaoUsuario.php';
	
	#mensagem de erro
	$error_number = 0;
	
	$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
	$idade = filter_input(INPUT_POST,'idade',FILTER_SANITIZE_NUMBER_INT);
	$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

	if(isset($nome) && isset($senha) && isset($email) && isset($idade)){
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			//email inválido
			$error_number = 3;
		}else{
			$usuario = DaoUsuario::buscarPorEmail($email);
		}

		
		if($usuario){
			if($usuario->getEmail() ===  $email){
				//já existe um usuário com este email
				$error_number = 4;
			}
		}

		if(strlen($senha) < 8){
				$error_number = 7;
		}

		//se não houver erros, continua o cadastro
		if(!$error_number){
			
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
				#redireciona para a página
				#header('Location:../../index.php');
				header('Location:usuario_login.php?mensagem=1');
			}else{
				header('Location:usuario_login.php?cadastro=1&erro=2');
				echo "Erro ao cadastrar usuário...";
			}
		}
		else{
			header('Location:usuario_login.php?cadastro=1&erro='.$error_number);
		}
	}
?>