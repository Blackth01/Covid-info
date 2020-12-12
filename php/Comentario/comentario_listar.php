<?php
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);
$comentarios = DaoComentario::buscarTodosPorId($id);


echo '<h4>Comentários</h4>';
//Para cada Usuario
if(!$comentarios){
	echo "<div>";
	echo "<p style='font-size:20px'><strong>Ainda não há comentários cadastrados para este artigo</strong></p>";
	echo "</div>";
}
else{
	foreach($comentarios as $c){
			$usuario = DaoUsuario::buscarPorId($c->id_usuario);
			echo '<div style="margin:auto; height:160px; margin-bottom:10px;">';
			echo '<div style="text-align:left">';
			echo '<p style="display:inline;clear:both"> '.$usuario->getNome().'</p><p style="margin-left:20px;display:inline">Data: '.$c->data_postagem.'</p>';
			echo '</div>';
			echo '<img style="float:left; margin-right:1%;width:50px; height:80px" src="../../images/perfil.png">';
			echo '<div class="indigo darken-1" style="text-align:center; border-radius:20px;float:left; height:80px; width:90%">';
			echo '<p>'.$c->texto.'</p><br>';
			echo '</div>';
			echo '</div>';
	}
}
