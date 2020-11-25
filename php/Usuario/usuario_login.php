<?php
	session_start();

	if(isset($_SESSION["emailLogado"])){
		echo "daadadadad";
		header('Location:../../index.php');
	}
?>
<html>
	<head>
		<title>Login usuário</title>
		<?php include '../main_imports.php';?>
	</head>
	<body>
		<?php include '../menu.php';?>
		<div class="container">
			<div class="row">
				<div class="col s6 m6 light-blue darken-4" id="botao_login" style="border-radius:5px;text-align:center;background-color:green" onclick="abreTela(1)">
					<h4 class="white-text"><strong>Login<strong></h4>
				</div>
				<div class="col s6 m6 grey lighten-1" id="botao_cadastrar" style="border-radius:5px;text-align:center;background-color:yellow" onclick="abreTela(2)">
					<h4 class="white-text"><strong>Cadastrar<strong></h4>
				</div>
				<div id="login" class="col s12 m12">
					<div style="margin-left:30px;margin-top:30px">
						<form action="usuario_login_bd.php" method="post">
						  <label for="emailLogin">Email:</label><br>
						  <input type="text" id="emailLogin" name="email"><br>
						  <label for="senhaLogin">Senha:</label><br>
						  <input type="password" id="senhaLogin" name="senha"><br><br>
						  <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action">
							Entrar<i class="material-icons right">send</i>
						  </button>
						</form>
					</div>
				</div>
				<div id="cadastro" class="col s12 m12" style="display:none">
					<div style="margin-left:30px;margin-top:30px">
						<form action="usuario_cadastro_bd.php" method="post">
						  <label for="nome">Nome:</label><br>
						  <input type="text" id="nome" name="nome"><br>
						  <label for="senha">Senha:</label><br>
						  <input type="password" id="senha" name="senha"><br>
						  <label for="idade">Idade:</label><br>
						  <input type="number" id="idade" name="idade"><br>
						  <label for="email">Email:</label><br>
						  <input type="email" id="email" name="email"><br><br>				
						  <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action">
							Cadastrar<i class="material-icons right">send</i>
						  </button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			var queryString = window.location.search;
			var urlParams = new URLSearchParams(queryString);
			var cadastro = urlParams.get("cadastro");
			
			function abreTela(tela){
				if(tela == 1){
					$("#login").css({"display":"block"})
					$("#cadastro").css({"display":"none"})
					$( "#botao_login" ).removeClass("grey lighten-1").addClass( "light-blue darken-4" );
					$( "#botao_cadastrar" ).removeClass("light-blue darken-4").addClass("grey lighten-1");
				}
				else{
					$("#cadastro").css({"display":"block"})
					$("#login").css({"display":"none"})
					$( "#botao_login" ).removeClass("light-blue darken-4").addClass("grey lighten-1");
					$( "#botao_cadastrar" ).removeClass("grey lighten-1").addClass("light-blue darken-4");
				}
			}

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

			if(cadastro == "1"){
				abreTela(0);
			}
			
			var erro = urlParams.get("erro");
			
			if(erro){
				switch (erro) {
				  case "2":
					mostraMensagem("Erro ao cadastrar usuário!", erro=1)
					break;
				  case "3":
					mostraMensagem("Email inválido!", erro=1)
					break;
				  case "4":
					mostraMensagem("Já existe um usuário com este email!", erro=1)
					break;
				  default:
				}
			}
			else{
				var mensagem = urlParams.get("mensagem");
				if(mensagem && mensagem === "1"){
					mostraMensagem("Por favor, faça o login")
				}
			}
		</script>
	</body>
</html>