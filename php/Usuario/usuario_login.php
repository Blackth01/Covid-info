<?php
	session_start();

	if(isset($_SESSION["emailLogado"])){
		header('Location:../../index.php');
	}
?>
<html>
	<head>
		<title>Login usuário</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<style>
		.main {
			margin:auto;
			width:600px;
		}
		
		.botao_menu {
			text-align:center;
			float:left;
			width:300px;
		}
	</style>
	<body>
		<?php include '../menu.php';?>
		<div class="main">
			<div style="width:600px;background-color:red">
				<div class="botao_menu" style="background-color:green" onclick="abreTela(1)">
					<h2>Login</h2>
				</div>
				<div class="botao_menu" style="background-color:yellow" onclick="abreTela(2)">
					<h2>Cadastrar</h2>
				</div>
				<div id="login">
					<div style="margin-left:30px">
						<form action="usuario_login_bd.php" method="post">
						  <label for="emailLogin">Email:</label><br>
						  <input type="text" id="emailLogin" name="email"><br>
						  <label for="senhaLogin">Senha:</label><br>
						  <input type="password" id="senhaLogin" name="senha"><br><br>
						  <input type="submit" value="Submit">
						</form>
					</div>
				</div>
				<div id="cadastro" style="display:none">
					<div style="margin-left:30px">
						<form action="usuario_cadastro_bd.php" method="post">
						  <label for="nome">Nome:</label><br>
						  <input type="text" id="nome" name="nome"><br>
						  <label for="senha">Senha:</label><br>
						  <input type="password" id="senha" name="senha"><br>
						  <label for="idade">Idade:</label><br>
						  <input type="number" id="idade" name="idade"><br>
						  <label for="email">Email:</label><br>
						  <input type="email" id="email" name="email"><br><br>				
						  <input type="submit" value="Cadastrar">
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			function abreTela(tela){
				if(tela == 1){
					$("#login").css({"display":"block"})
					$("#cadastro").css({"display":"none"})
				}
				else{
					$("#cadastro").css({"display":"block"})
					$("#login").css({"display":"none"})
				}
			}
		</script>
	</body>
</html>