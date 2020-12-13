<html>
	<head>
		<meta charset="UTF-8">
		<title>Artigos</title>
		<?php include '../main_imports.php'?>
	</head>
	<body>
		<?php include '../menu.php';?>
		<div class="container">
			<div class="row">
				  <?php if(isset($_SESSION["usuarioLogado"]) and ($_SESSION["usuarioLogado"]->admin or $_SESSION["usuarioLogado"]->medico)) { ?>
			      <div>
					 <h5>Adicione um artigo: <a href="artigo_cadastrar.php" class="btn-floating btn-large waves-effect waves-light light-blue darken-4"><i class="material-icons">add</i></a></h5>
				  </div>
				  <?php } ?>
				  <div class="nav-wrapper">
				    <form method="GET" id="pesquisar" action="artigo_listar.php">
					    <div class="input-field">
					      <input id="search" name="termo" type="search" placeholder="Pesquise por artigos aqui" required>
					      <label onClick="pesquisar()" class="label-icon" for="search"><i class="material-icons">search</i></label>
					      <i class="material-icons">close</i>
					    </div>
				     </form>
				  </div>
				  <?php 
				  require_once '../Dao/DaoArtigo.php';
				  
				  $termo = filter_input(INPUT_GET,'termo');
				  
				  if($termo){
					  $artigos = DaoArtigo::buscarPorTermo($termo);
				  }
				  else{
					$artigos = DaoArtigo::buscarTodosAtivos();
				  }

				  if($artigos){
					foreach($artigos as $artigo){
						$string = $artigo->conteudo;
						$string = str_replace( '<', '[&]<',$string );
						$string = strip_tags($string);
						$string = str_replace( '[&]', '.', $string );

						$result = substr(trim($string, "."), 0, 177);

						$filtered_result = "";
						for($i=0; $i<strlen($result)-1; $i++){
							 if(!($result[$i] == "." && $result[$i+1] == ".")){
								 $filtered_result.=$result[$i];
							 }
						}
						
						$artigo->conteudo = str_replace( '.', '. ', $filtered_result)."...";
					
				  ?>
				  <div class="col s12 m12">
					<div class="card hoverable horizontal">
					  <div class="card-image">
						<img style="height: 100%; width: 200px" src="../../images/<?php echo $artigo->endereco_imagem; ?>">
					  </div>
					  <div class="card-stacked">
						<div class="card-content">
						  <h6><?php echo $artigo->titulo; ?></h6>
						  <p style="font-size:10px"><?php echo $artigo->nome_autor; ?> - <?php echo $artigo->data_cadastro; ?></p>
						  <p><?php echo $artigo->conteudo; ?></p>
						</div>
						<div class="card-action">
						  <a href="<?php echo "../Artigo/artigo_ler.php?id=".$artigo->id; ?>" class="light-blue darken-4 waves-effect waves-light btn">Ler artigo</a>
						</div>
					  </div>
					</div>
				  </div>
				  <?php }} else {?>
				  <div>
						<p style="text-align:center;font-size:40px">Nenhum artigo encontrado!</p>
				  </div>
				  <?php }?>
			  </div>
	    </div>
		<script>
			function pesquisar(){
				$("#pesquisar").submit();
			}
		</script>
	</body>
</html>
