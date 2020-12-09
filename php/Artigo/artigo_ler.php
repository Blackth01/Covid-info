<?php
	if(!isset($_SESSION)){
		session_start();
	}
	require_once '../Pojo/PojoArtigo.php';
	require_once '../Dao/DaoArtigo.php';

	$id_artigo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	$artigo = DaoArtigo::buscarPorId($id_artigo);

	if(!$artigo || !$artigo->getAtivo()){
		header('Location:artigo_listar.php');
	}

	$pode_modificar = false;

	if(isset($_SESSION["usuarioLogado"]) && ($_SESSION["usuarioLogado"]->admin || $_SESSION["usuarioLogado"]->id == $artigo->getIdAutor())){
		$pode_modificar = true;
	}
?>
<html>
	<head>
		<title><?php echo $artigo->getTitulo(); ?></title>
		<?php require '../main_imports.php'?>
	</head>
	<body>
		<?php require '../menu.php'?>
		<div class="container">
			<?php if($pode_modificar){ ?>
			<div style="text-align:right">
				<a href="artigo_editar.php?id=<?php echo $artigo->getId(); ?>">
					<button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action">
					Editar artigo<i class="material-icons right">edit</i>
					</button>
				</a>
				<a class="modal-trigger" href="#confirmacao">
					<button class="btn waves-effect waves-light red accent-4" type="submit" name="action">
					Remover artigo<i class="material-icons right">close</i>
					</button>
				</a>
			</div>
			  <div id="confirmacao" class="modal">
				<div class="modal-content">
				  <h4>Deseja realmente desativar este artigo?</h4>
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect btn-flat grey lighten-1">Cancelar</a>
					<a href="artigo_desativar.php?id=<?php echo $artigo->getId();?>" class="modal-close waves-effect waves-red btn-flat red">Remover</a>
				</div>
			  </div>
			<?php }; ?>
			<div style="width:100%; clear:both">
				<h3 class="indigo-text text-darken-4" style="text-align:center"><?php echo $artigo->getTitulo();?></h3>
			</div>
			<div style="height:70%; width:100%; overflow:auto; border: 2px solid black; border-radius:10px"> 
					<?php echo $artigo->getConteudo()?>
			</div>
		</div>
		<script>
			 $(document).ready(function(){
				$('.modal').modal();
			  });
		</script>
	</body>
</html>
