<?php
	session_start();

	$id_artigo = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

	if(!isset($_SESSION["usuarioLogado"])){
	    header('Location:../../index.php');
		exit;
	}

	require_once '../Pojo/PojoArtigo.php';
	require_once '../Dao/DaoArtigo.php';
    require_once '../../lib/htmlpurifier/HTMLPurifier.auto.php';

	$artigo = DaoArtigo::buscarPorId($id_artigo);

	if(!$artigo || !$artigo->getAtivo() || (!$_SESSION["usuarioLogado"]->admin && $_SESSION["usuarioLogado"]->id != $artigo->getIdAutor())){
	    header('Location:../../index.php');
		exit;
	}


	#mensagem de erro
	$error_number = 0;

	$titulo = filter_input(INPUT_POST,'titulo',FILTER_SANITIZE_STRING);
	$conteudo = filter_input(INPUT_POST,'conteudo');

	if(isset($titulo) && isset($conteudo)){

		if(strlen($titulo) > 100){
				//Número de caracteres do título acima do limite (100 caracteres)
				$error_number = 1;
		}
		else if(strlen($titulo) == 0){
			//O título não pode ficar vazio!
			$error_number = 3;
		}

		if(strlen($conteudo) == 0){
			//O conteúdo do artigo não pode ficar vazio!
			$error_number = 4;
		}

		if(isset($_FILES['imagem']['name']) && $_FILES['imagem']['name']){
			//inicia o tratamento da imagem
			$imagem_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
			$nome_imagem = $_FILES[ 'imagem' ][ 'name' ];

			//pega a extensão
			$extensao = pathinfo ( $nome_imagem, PATHINFO_EXTENSION );

			//deixa em minúsculo
			$extensao = strtolower($extensao );

			//verifica se é uma imagem
			if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
				//seta um nome único
				$nome_imagem = md5(substr(uniqid(time(), true), 16, 16)).".".$extensao;
				$destino = '../../images/'.$nome_imagem;

				if (!(move_uploaded_file ( $imagem_tmp, $destino ))) {
					$error_number = 6;
				}
			}
			else {
				$error_number = 5;
			}
		}
		else{
			$nome_imagem = null;
		}

		//se não houver erros, continua a edição
		if(!$error_number){
			$config = HTMLPurifier_Config::createDefault();
			$purifier = new HTMLPurifier($config);
			$conteudo = $purifier->purify($conteudo);

			#Atribuindo informaçoes ao objeto
			$artigo->setTitulo($titulo);
			$artigo->setConteudo($conteudo);
			if($nome_imagem){
				$artigo->setEnderecoImagem($nome_imagem);
			}

			#inserindo
			if(DaoArtigo::editar($artigo)){
				#redireciona para a página do artigo
				header('Location:artigo_ler.php?id='.$artigo->getId());
			}else{
				//erro ao cadastrar artigo
				header('Location:artigo_editar.php?id='.$artigo->getId().'&erro=2');
			}
		}
		else{
			header('Location:artigo_editar.php?id='.$artigo->getId().'&erro='.$error_number);
		}
	}
?>