<?php
	session_start();

	$id_artigo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	if(!isset($_SESSION["usuarioLogado"])){
	    header('Location:../../index.php');
	}

	require_once '../Dao/DaoArtigo.php';

	$artigo = DaoArtigo::buscarPorId($id_artigo);

	if(!$artigo || !$artigo->getAtivo() || (!$_SESSION["usuarioLogado"]->admin && $_SESSION["usuarioLogado"]->id != $artigo->getIdAutor())){
	    header('Location:../../index.php');
	}
	else{
		if(DaoArtigo::desativar($id_artigo)){
			header('Location:artigo_listar.php');
		}
		else{
			header('Location:../../index.php');
		}		
	}
