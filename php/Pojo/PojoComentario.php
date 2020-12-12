<?php
	class PojoComentario{
		
		private $id;
		private $texto;
		private $id_usuario;
		private $id_artigo;
		private $data_postagem;
		
		public function getId(){
			return $this->id;
		}
		
		public function getTexto(){
			return $this->texto;
		}
		
		public function getIdUsuario(){
			return $this->id_usuario;
		}
		
		public function getDataPostagem(){
			return $this->data_postagem;
		}
		
		public function getIdArtigo(){
			return $this->id_artigo;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function setTexto($texto){
			$this->texto = $texto;
		}
		
		public function setIdUsuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}
		
		public function setDataPostagem($data_postagem){
			$this->data_postagem = $data_postagem;
		}
		
		public function setIdArtigo($id_artigo){
			$this->id_artigo = $id_artigo;
		}
	}
?>