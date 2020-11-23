<?php
	require_once '../Dao/DaoUsuario.php';
	require_once '../Pojo/PojoUsuario.php';
	
	$senha  = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_SPECIAL_CHARS);
	$email  = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_SPECIAL_CHARS);
	
	if(isset($senha) && isset($email)){
		
		#criando pojo para receber do db
		$usuario = new PojoUsuario();
		
		#pesquisando usuario no db
		$usuario = DaoUsuario::buscarPorEmail($email);
		
		$salt = "algo_muito_secreto_aqui";
		
		if($usuario){
			$senha = md5($senha . $salt);
			if($senha == $usuario->getSenha()){
				session_start();

				$_SESSION["emailLogado"] = $usuario->getEmail();
				#redireciona pagina
				header('Location:../../index.php');
			}else{
				#se a senha estiver errada
				echo "senha errada";
				#header('Location:usuario_login.php?fail=1');
			}
		}
		else{
			#se o email estiver errado
			echo "email errado";
			#header('Location:usuario_login.php?fail=1');
		}
		
	}else{
		echo 'Verifique os dados digitados';
	}
?>