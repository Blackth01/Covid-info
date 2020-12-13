<?php
	session_start();

	if(!isset($_SESSION["usuarioLogado"]) or (!$_SESSION["usuarioLogado"]->admin and !$_SESSION["usuarioLogado"]->medico)){
		header('Location:../../index.php');
	}

	require_once '../Pojo/PojoArtigo.php';
	require_once '../Dao/DaoArtigo.php';
    require_once '../../lib/htmlpurifier/HTMLPurifier.auto.php';

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
			$nome_imagem = "artigo.jpg";
		}
		
		//se não houver erros, continua o cadastro
		if(!$error_number){
			
			$endereco_imagem = $nome_imagem;
			$id_autor = $_SESSION["usuarioLogado"]->id;
			$data_cadastro = date("Y/m/d h:i:s");

			$config = HTMLPurifier_Config::createDefault();
			$purifier = new HTMLPurifier($config);
			$conteudo = $purifier->purify($conteudo);

			#Criando objeto Usuario 
			$artigo = new PojoArtigo();
			
			#Atribuindo informaçoes ao objeto
			$artigo->setTitulo($titulo);
			$artigo->setConteudo($conteudo);
			$artigo->setDataCadastro($data_cadastro);
			$artigo->setEnderecoImagem($endereco_imagem);
			$artigo->setAtivo(1);
			$artigo->setIdAutor($id_autor);

			#inserindo
			if(DaoArtigo::inserir($artigo)){
				#redireciona para a página do artigo
				header('Location:../../index.php');
			}else{
				//erro ao cadastrar artigo
				header('Location:artigo_cadastrar.php?erro=2');
			}
		}
		else{
			header('Location:artigo_cadastrar.php?erro='.$error_number);
		}
	}
?>