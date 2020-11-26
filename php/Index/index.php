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
						<img style="height: 100%; width: 200px" src="../../images/artigo.jpg">
					  </div>
					  <div class="card-stacked">
						<div class="card-content">
						  <h6>Estudo brasileiro confirma o papel da vitamina D no combate ao coronavírus</h6>
						  <p style="font-size:10px">Autor aqui - 23/11/2020</p>
						  <p>Um estudo realizado no Brasil é o segundo nível mundial para associar a falta de vitamina D
						  no organismo aos casos graves da Covid-19. Conduzida apenas com pacientes...</p>
						</div>
						<div class="card-action">
						  <a href="#" class="light-blue darken-4 waves-effect waves-light btn">Ler este artigo</a>
						  <a href="#" class="light-blue darken-4 waves-effect waves-light btn">Mais artigos</a>
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
