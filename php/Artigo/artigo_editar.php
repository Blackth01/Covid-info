<?php
	session_start();

	require_once '../Dao/DaoArtigo.php';

	$id_artigo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	if(!isset($_SESSION["usuarioLogado"])){
	    header('Location:../../index.php');
		exit;
	}

	$artigo = DaoArtigo::buscarPorId($id_artigo);

	if(!$artigo || !$artigo->getAtivo() || (!$_SESSION["usuarioLogado"]->admin && $_SESSION["usuarioLogado"]->id != $artigo->getIdAutor())){
	    header('Location:../../index.php');
		exit;
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Editar artigo</title>
		<?php include '../main_imports.php'?>
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
	</head>
	<body>
		<?php include '../menu.php';?>
		<div class="container">
			<br>
			<form method="post" action="artigo_editar_bd.php" enctype="multipart/form-data">
			  <input type="hidden" name="id" value="<?php echo $artigo->getId();?>">
			  <label for="titulo">Título do artigo:</label><br>
			  <input type="text" id="titulo" name="titulo" placeholder="Insira o título do artigo aqui" value="<?php echo $artigo->getTitulo() ?>"><br>
			  <br>
			  <label for="imagem"> Imagem (Máximo 2MB) </label>
			  <br>
			  <input style="margin-bottom:10px" name="imagem" id="imagem" accept="image/x-png,image/gif,image/jpeg" type="file">
			  <textarea id="summernote" name="conteudo"><?php echo $artigo->getConteudo(); ?></textarea>
			  <br>
			  <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action">
				Editar artigo<i class="material-icons right">edit</i>
			  </button>
			</form>
			<script>
			  $('#summernote').summernote({
				placeholder: 'Escreva algo :)',
				tabsize: 2,
				height: 300,
				toolbar: [
				  ['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['color', ['color']],
				  ['para', ['ul', 'ol', 'paragraph']],
				  ['table', ['table']],
				  ['insert', ['link', 'picture', 'video']],
				  ['view', ['fullscreen', 'codeview', 'help']]
				]
			  });
			 
			var queryString = window.location.search;
			var urlParams = new URLSearchParams(queryString);
			
			function fecharToasts(){
				M.Toast.dismissAll();
			}

			function mostraMensagem(mensagem="",erro=0){
				var cor = "";
				if(erro){
					cor = "red accent-4";
				}
				else{
					cor = "indigo darken-3";
				}
				var toastHTML = '<span>'+mensagem+'</span><button class="btn-flat toast-action" onClick="fecharToasts()">Fechar</button>';
				M.toast({html: toastHTML, classes: cor, displayLength: 10000});
			}

			var erro = urlParams.get("erro");

			if(erro){
				switch (erro) {
				  case "1":
					mostraMensagem("Número de caracteres do título acima do limite! (100 caracteres)", erro=1)
					break;
				  case "2":
					mostraMensagem("Ocorreu um erro ao cadastrar o artigo :/", erro=1)
					break;
				  case "3":
					mostraMensagem("O título não pode ficar vazio!", erro=1)
					break;
				  case "4":
					mostraMensagem("O conteúdo do artigo não pode ficar vazio!", erro=1)
					break;
				  case "5":
					mostraMensagem("O arquivo a ser upado deve ser uma imagem!", erro=1)
					break;
				  case "6":
					mostraMensagem("Ocorreu um erro ao realizar o upload da imagem!", erro=1)
					break;
				  default:
				}
			}
			</script>
		</div>
	</body>
</html>
