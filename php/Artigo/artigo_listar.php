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
				    <form>
					    <div class="input-field">
					      <input id="search" type="search" placeholder="Pesquise por artigos aqui" required>
					      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
					      <i class="material-icons">close</i>
					    </div>
				     </form>
				  </div>
				  <div class="col s12 m12">
					<div class="card hoverable horizontal">
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
						  <a href="#" class="light-blue darken-4 waves-effect waves-light btn">Ler artigo</a>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col s12 m12">
					<div class="card hoverable horizontal">
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
						  <a href="#" class="light-blue darken-4 waves-effect waves-light btn">Ler artigo</a>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col s12 m12">
					<div class="card hoverable horizontal">
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
						  <a href="#" class="light-blue darken-4 waves-effect waves-light btn">Ler artigo</a>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col s12 m12">
					<div class="card hoverable horizontal">
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
						  <a href="#" class="light-blue darken-4 waves-effect waves-light btn">Ler artigo</a>
						</div>
					  </div>
					</div>
				  </div>
			  </div>
	    </div>
	</body>
</html>
