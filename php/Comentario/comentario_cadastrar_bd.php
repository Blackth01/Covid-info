<?php
  session_start();
  require_once '../Pojo/PojoComentario.php';
  require_once '../Dao/DaoComentario.php';

  if(isset($_SESSION['usuarioLogado'])){
    $id_user = $_SESSION['usuarioLogado']->id;
    $id_artigo = filter_input(INPUT_POST,'id_artigo',FILTER_SANITIZE_SPECIAL_CHARS);
    $texto = filter_input(INPUT_POST,'texto',FILTER_SANITIZE_SPECIAL_CHARS);
    $data =  date('y/m/d H:i:s');

	if($texto){
		if(strlen($texto) <= 200){
			$comentario = new PojoComentario();
			$comentario->setTexto($texto);
			$comentario->setIdArtigo($id_artigo);
			$comentario->setIdUsuario($id_user);
			$comentario->setDataPostagem($data);
			DaoComentario::inserir($comentario);
			header('Location:../Artigo/artigo_ler.php?id='.$id_artigo);			
		}
		else{
		  header('Location:../Artigo/artigo_ler.php?id='.$id_artigo.'&erro=2');
		}
	}
	else{
      header('Location:../Artigo/artigo_ler.php?id='.$id_artigo.'&erro=1');
    }

  }
?>
