<?php
	if(!isset($_SESSION)){
		session_start();
	}
	require_once '../Pojo/PojoArtigo.php';
	require_once '../Dao/DaoArtigo.php';
	require_once '../Dao/DaoGostei.php';
	require_once '../Dao/DaoComentario.php';
	require_once '../Dao/DaoUsuario.php';

	$id_artigo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	$artigo = DaoArtigo::buscarPorId($id_artigo);

	if(!$artigo || !$artigo->getAtivo()){
		header('Location:artigo_listar.php');
		exit;
	}

	$pode_modificar = false;

	if(isset($_SESSION["usuarioLogado"]) && ($_SESSION["usuarioLogado"]->admin || $_SESSION["usuarioLogado"]->id == $artigo->getIdAutor())){
		$pode_modificar = true;
	}

	$foi_gostado = false;

	if(isset($_SESSION["usuarioLogado"])){
		$id_usuario = $_SESSION["usuarioLogado"]->id;
		if(DaoGostei::existeLike($id_usuario, $id_artigo)){
			$foi_gostado = true;
		}
	}

	$likes = DaoGostei::contaLikes($id_artigo);
?>
<html>
	<head>
		<title><?php echo $artigo->getTitulo(); ?></title>
		<?php require '../main_imports.php'?>
		<style>
			.like:hover {
				color:blue !important;
			}
		</style>
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
				<div style="float:left">
					<input id="like_value" type="hidden" value="<?php echo $foi_gostado ? "1" : "0"?>">
					<i style="color:<?php echo $foi_gostado ? "blue" : "grey"?>" id="like" class="medium material-icons dp48 like">thumb_up</i>
				</div>
				<span id="num_likes" style="float:left;font-size:20px;margin-left:20px;margin-top:15px"><?php echo $likes ?> likes</span>
				<h3 class="indigo-text text-darken-4" style="text-align:center"><?php echo $artigo->getTitulo();?></h3>
			</div>
			<div style="height:70%; width:100%; overflow:auto; border: 2px solid black; border-radius:10px"> 
					<?php echo $artigo->getConteudo()?>
			</div>
			<div style="margin:auto;">
			<?php
				/*Seleciona todos os comentario deste produto*/
				include '../Comentario/comentario_listar.php';
			?>
			
			<?php
				/*Cadastro de comentarios*/
				include '../Comentario/comentario_cadastrar.php';
			?>
			</div>
		</div>
		<script>
			 $(document).ready(function(){
				$('.modal').modal();
			  });

			  likes = <?php echo $likes ?>;
			  $("#like").click(function (obj) {
					<?php if(isset($_SESSION["usuarioLogado"])) { ?>
					if($("#like_value").val() === "0"){
						var like = 0;
					}
					else{
						var like = 1;
					}
					
					$.ajax({
						method: "POST",
						url: "artigo_gostei.php",
						data: {"id_artigo":<?php echo $artigo->getId();?>},
						success: function(result){
								result = JSON.parse(result);

								console.log(result);
								if(result.sucesso){
									if(like){
										$("#like").css({"color":"grey"});
										
										$("#like_value").val("0");
										
										likes = likes-1;
										document.getElementById("num_likes").innerHTML = likes+" likes";
									}
									else{
										$("#like").css({"color":"blue"});
																		
										$("#like_value").val("1");
										
										likes = likes+1;
										document.getElementById("num_likes").innerHTML = likes+" likes";
									}
								}
								else{
									console.log(result);
								}
						},
						error: function (request, error) {
							console.log(error);
							alert("Ocorreu um erro ao realizar o like");
						}
					});
					<?php } else { ?>
					alert("É necessário fazer login para marcar \"Gostei\" em um artigo");
					<?php } ?>
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
					mostraMensagem("Comentário vazio! Insira um texto antes de comentar", erro=1)
					break;
				  case "2":
					mostraMensagem("O comentário ultrapassou o limite de caracteres! (200)", erro=1)
					break;
				  default:
				}
			}
		</script>
	</body>
</html>