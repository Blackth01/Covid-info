<?php
	session_start();

	if(isset($_SESSION["emailLogado"])){
		header('Location:../../index.php');
	}

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
				//cria um objeto vazio usuarioLogado e atribui ele à session usuarioLogado
				$usuarioLogado = new stdClass();
				$usuarioLogado->id = $usuario->getId();
				$usuarioLogado->nome = $usuario->getNome();
				$usuarioLogado->email = $usuario->getEmail();
				$usuarioLogado->admin = $usuario->getAdmin();
				$usuarioLogado->medico = $usuario->getMedico();

				$_SESSION["emailLogado"] = $usuario->getEmail();				
				$_SESSION["usuarioLogado"] = $usuarioLogado;
				#redireciona pagina
				header('Location:../../index.php');
			}else{
				#se a senha estiver errada
				header('Location:usuario_login.php?erro=6');
			}
		}
		else{
			#se o email estiver errado
			header('Location:usuario_login.php?erro=5');
		}
		
	}else{
		echo 'Verifique os dados digitados';
	}
?>