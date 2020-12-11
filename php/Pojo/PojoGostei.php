<?php	
	class PojoGostei{
			
			private $id;
			private $id_usuario;
			private $id_artigo;
			
			//Get
			public function getId(){
				return $this->id;
			}
			
			public function getIdUsuario(){
				return $this->id_usuario;
			}
			
			public function getIdArtigo(){
				return $this->id_artigo;
			}
			
			//Set
			public function setId($id){
				$this->id = $id;
			}
			
			public function setIdUsuario($id_usuario){
				$this->id_usuario = $id_usuario;
			}
			
			public function setIdArtigo($id_artigo){
				$this->id_artigo = $id_artigo;
			}
	}
?>