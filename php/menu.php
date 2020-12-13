<?php
	if(!isset($_SESSION)){
		session_start();
	}
?>
<div class="navbar-fixed" style="margin-bottom:25px">
	  <nav class="white">
		<div class="nav-wrapper container">
		  <a href="../Index/index.php" class="brand-logo indigo-text text-darken-4"><strong>Covid-info<strong></a>
		  <a href="#" data-target="mobile-demo" class="grey-text text-darken-1 sidenav-trigger"><i class="material-icons">menu</i></a>
		  <ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a class="grey-text text-darken-1" href="../Index/index.php">Início</a></li>
			<li><a class="grey-text text-darken-1" href="../Informacao/mostrar_informacoes.php">Informações</a></li>
			<li><a class="grey-text text-darken-1" href="../Artigo/artigo_listar.php">Artigos</a></li>
			<?php if (!isset($_SESSION["emailLogado"])) {?>
			<li><a class="grey-text text-darken-1" href="../Usuario/usuario_login.php">Login</a></li>
			<li><a class="grey-text text-darken-1" href="../Usuario/usuario_login.php?cadastro=1">Cadastrar</a></li>
			<?php } else {?>
			<li><a class="grey-text text-darken-1" href="../Usuario/usuario_logout.php">Logout</a></li>
			<?php } ?>
		  </ul>
		</div>
	  </nav>
	  <ul class="sidenav" id="mobile-demo">
		<li><a class="grey-text text-darken-1" href="../Index/index.php">Início</a></li>
		<li><a class="grey-text text-darken-1" href="">Informações</a></li>
		<li><a class="grey-text text-darken-1" href="">Artigos</a></li>
		<?php if (!isset($_SESSION["emailLogado"])) {?>
		<li><a class="grey-text text-darken-1" href="../Usuario/usuario_login.php">Login</a></li>
		<li><a class="grey-text text-darken-1" href="../Usuario/usuario_login.php?cadastro=1">Cadastrar</a></li>
		<?php } else {?>
		<li><a class="grey-text text-darken-1" href="../Usuario/usuario_logout.php">Logout</a></li>
		<?php } ?>
	  </ul>
  </div>