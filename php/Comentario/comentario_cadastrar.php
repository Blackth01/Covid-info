<?php
if(isset($_SESSION['usuarioLogado'])){
		echo '<form action="../Comentario/comentario_cadastrar_bd.php" method="POST">';//Inicio do Form
		echo '<table style="width:100%">';//Inicio da Tabela
		echo '<thead>';
		echo '<th>'.$_SESSION['usuarioLogado']->nome.'</th>';
		echo '</thead>';
		echo '<tbody>';
		echo '<tr>';
		echo '<td style="width:80%"><input type="text" placeholder="Comente algo aqui" name="texto"></td>';
		echo '<td style="width:20%"><input type="submit" name="submit" value="Comentar" id="submit" class="btn light-blue darken-4"></td>';
		echo '<input type="hidden" id="custId" name="id_artigo" value="'.$artigo->getId().'">';
		echo '</tr>';
		echo '</tbody>';
		echo '</table>';//Fim da Tabela
		echo '</form>';//Fim do Form
  }
  else{
			echo "<div>";
			echo '<p style="color:red">*Obrigatório o login para comentar</p>';
			echo "</div>";
}
