<?php
	session_start();

	if(!isset($_SESSION["usuarioLogado"]) or (!$_SESSION["usuarioLogado"]->admin and !$_SESSION["usuarioLogado"]->medico)){
		header('Location:../../index.php');
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Criar artigo</title>
		<?php include '../main_imports.php'?>
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
	</head>
	<body>
		<?php include '../menu.php';?>
		<div class="container">
			<h2 style="text-align:center">Criação de artigos</h2>
			<br>
			<form method="post">
			  <label for="titulo">Título do artigo:</label><br>
			  <input type="text" id="titulo" name="titulo" placeholder="Insira o título do artigo aqui"><br>
			  <textarea id="summernote" name="editordata"></textarea>
			  <br>
			  <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action">
				Cadastrar artigo<i class="material-icons right">send</i>
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
			</script>
		</div>
	</body>
</html>
