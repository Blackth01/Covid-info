<?php
	if(!isset($_SESSION)){
		session_start();
	}
?>
<header>
	<nav style="margin:auto;width:100%;background-color:yellow">
		<div class="nav-header" style="float:left;height:80px;width:90%">
			<a href="../Index/index.php" style="text-decoration:none;margin-left:30px">Covid</a>
		</div>
		<div style="height:80px;float:left;background-color:red;width:10%;text-align:center">
			<a style="font-family:'Montserrat',Arial; font-weight:600; font-style:normal;text-decoration:none" href="../Usuario/usuario_login.php" style="display:block">Cadastrar</a>
			<p>ou</p>
			<a style="font-family:'Montserrat',Arial; font-weight:600; font-style:normal;text-decoration:none" href="../Usuario/usuario_login.php">Entrar</a>
		</div>
	</nav>
</header>