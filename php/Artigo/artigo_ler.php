<?php
	if(!isset($_SESSION)){
		session_start();
	}
	require_once '../Pojo/PojoArtigo.php';
	require_once '../Dao/DaoArtigo.php';

	$id_artigo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	$artigo = DaoArtigo::buscarPorId($id_artigo);

	if(!$artigo){
		header('Location:artigo_listar.php');
	}
?>
<html>
	<head>
		<title></title>
		<?php require '../main_imports.php'?>
	</head>
	<body>
		<?php require '../menu.php'?>
		<div class="container">
			<div style="width:100%; clear:both">
			<h3 class="indigo-text text-darken-4" style="text-align:center"><?php echo $artigo->getTitulo();?></h3>
			</div>
			<div style="height:70%; width:100%; overflow:auto; border: 2px solid black; border-radius:10px"> 
					<?php echo $artigo->getConteudo()?>
			</div>
		</div>
	</body>
</html>
