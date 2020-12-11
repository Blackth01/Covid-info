<?php
	session_start();

	if(!isset($_SESSION["usuarioLogado"])){
		echo '{"msg":"Usuário não logado!"}';
		exit;
	}

	require_once '../Dao/DaoArtigo.php';
	require_once '../Dao/DaoGostei.php';

	$id_artigo = filter_input(INPUT_POST,'id_artigo',FILTER_SANITIZE_STRING);
	$id_usuario = $_SESSION["usuarioLogado"]->id;

	if($id_artigo && $id_usuario){
		$artigo = DaoArtigo::buscarPorId($id_artigo);

		if($artigo){			
			$id_gostei = DaoGostei::existeLike($id_usuario, $id_artigo);

			if(isset($id_gostei[0])){
				#removendo instância
				if(DaoGostei::deletar($id_gostei[0])){
					echo '{"sucesso":1}';
				}else{
					//erro ao cadastrar artigo
					echo "{'msg':'Erro ao realizar a operação!'}";
				}
			}
			else{
				$gostei = new PojoGostei();

				#Atribuindo informaçoes ao objeto
				$gostei->setIdUsuario($id_usuario);
				$gostei->setIdArtigo($id_artigo);

				#inserindo
				if(DaoGostei::inserir($gostei)){
					echo '{"sucesso":1}';
				}else{
					//erro ao cadastrar artigo
					echo '{"msg":"Erro ao realizar a operação!"}';
				}
			}
		}
		else{
			echo '{"msg":"Artigo inexistente!"}';
		}
	}
	else{
		echo '{"msg":"Parâmetro id_artigo não enviado!"}';
	}
?>