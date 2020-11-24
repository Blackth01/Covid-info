<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/script.css">
    <title>Login!</title>
  </head>
  
  <body  style="background-image: url(images/wallpaper.jpg);">
	<?php require '../menu.php'?>
  
	<p><br><br><br></p>
	<div class="container"">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h1>Registro</h1>
				<div class="panel panel-default">
					<div class="panel-body">
						
						<!-- Formulario -->
						<form method="post" action='usuario_cadastro_bd.php'>
							<div class="form-group">
								<label>Nome</label>
								<input type="text" class="form-control"    name="nome" required>
							</div>
							
							<div class="form-group">
								<label>Senha</label>
								<input type="password" class="form-control" name="senha" required>
							</div>
							
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control"    name="email" required>
							</div>
							
							<input type="submit" name="register" value="Registrar" class="btn btn-danger" style="background-color:#EE008C">
						</form>
						
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>