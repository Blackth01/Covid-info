<?php

	require_once '../Dao/DaoArtigo.php';
	
	$artigo_mais_popular = DaoArtigo::buscarMaisPopular();
	
	if($artigo_mais_popular){
		$string = $artigo_mais_popular->conteudo;
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
		
		$artigo_mais_popular->conteudo = str_replace( '.', '. ', $filtered_result)."...";
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Início</title>
		<?php include '../main_imports.php'?>
		<style>
			.labelInfo{
				display:inline;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<?php include '../menu.php';?>
		<div class="container">
			<div class="row">
				  <div class="col s12 m8">
					<h4 class="header  indigo-text text-darken-3">Artigos</h4>
					<div class="card small hoverable horizontal">
					  <div class="card-image">
						<img style="height: 100%; width: 200px" src="../../images/<?php echo $artigo_mais_popular ? $artigo_mais_popular->endereco_imagem : "artigo.jpg" ?>">
					  </div>
					  <div class="card-stacked">
						<?php if($artigo_mais_popular){?>
						<div class="card-content">
						  <h6><?php echo $artigo_mais_popular->titulo; ?></h6>
						  <p style="font-size:10px"><?php echo $artigo_mais_popular->nome_autor; ?> - <?php echo $artigo_mais_popular->data_cadastro; ?></p>
						  <p><?php echo $artigo_mais_popular->conteudo; ?></p>
						</div>
						<?php } else {?>
						<div class="card-content valign-wrapper">
							<p>Ainda não há artigos cadastrados :/</p>
						</div>
						<?php } ?>
						<div class="card-action">
						  <a href="<?php echo $artigo_mais_popular ? "../Artigo/artigo_ler.php?id=".$artigo_mais_popular->id : "#" ?>" class="light-blue darken-4 waves-effect waves-light btn">Ler este artigo</a>
						  <a href="../Artigo/artigo_listar.php" class="light-blue darken-4 waves-effect waves-light btn">Mais artigos</a>
						</div>
					  </div>
					</div>
				  </div>
					<div class="col s12 m4">
					  <h4 class="header  indigo-text text-darken-3">Informações</h4>
					  <div class="card small hoverable">
						<div class="card-content">
							<h6>Dados do covid no Brasil:</h6>
							<br>
							<p class="labelInfo">Casos ativos: </p><span id="casos_pa" >0</span>
							<br>
							<p class="labelInfo">Casos confirmados: </p><span id="confirmados_pa" >0</span>
							<br>
							<p class="labelInfo">Mortes: </p><span id="mortes_pa" >0</span>
							<br>
							<p class="labelInfo">Recuperados: </p><span id="recuperados_pa" >0</span>
							<br>
							<p class="labelInfo">Atualizado em: </p><span id="data_pa" >0</span>
						</div>
						<div class="card-action">
						  <a href="../Informacao/mostrar_informacoes.php" class="light-blue darken-4 waves-effect waves-light btn">Mais informações</a>
						</div>
					  </div>
					</div>
					<div class="col s12 m12">
						<div class="card hoverable">
							<div class="card-content">
								<span class="card-title green-text text-darken-4" style="font-size:40px"><strong>Recomendações</strong></span>
								<p>Phasellus nec ipsum vitae sem commodo finibus. Phasellus varius id nibh a fringilla. Mauris lobortis ex volutpat, 
								porta turpis nec, venenatis nulla. Suspendisse a leo justo. Vivamus consequat ipsum lorem, 
								condimentum pharetra lacus maximus in. Nullam mollis mi in iaculis efficitur.
								Phasellus odio risus, porttitor nec tellus eget, volutpat posuere massa.</p>
							</div>
						</div>
					</div>
			  </div>
	    </div>
		<script>
			$.ajax({
				method: "GET",
				url: "https://covid19-brazil-api.now.sh/api/report/v1/brazil",
				success: function(result){
					document.getElementById("casos_pa").innerHTML = result.data["cases"]
					document.getElementById("confirmados_pa").innerHTML = result.data["confirmed"]
					document.getElementById("mortes_pa").innerHTML = result.data["deaths"]
					document.getElementById("recuperados_pa").innerHTML = result.data["recovered"]
					var d = new Date(result.data["updated_at"])
					var data_formatada = d.getDate()+"/"+(d.getMonth()+1)+"/"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds()
					document.getElementById("data_pa").innerHTML = data_formatada
				},
				error: function (request, error) {
					alert("Ocorreu um erro ao buscar os dados da API!");
			}});
		</script>
	</body>
</html>
