<?php	
	class PojoArtigo{
			private $id;
			private $titulo;
			private $endereco_imagem;
			private $conteudo;
			private $ativo;
			private $id_autor;
			private $data_cadastro;

			//Get
			public function getId(){
				return $this->id;
			}
			
			public function getTitulo(){
				return $this->titulo;
			}
			
			public function getDataCadastro(){
				return $this->data_cadastro;
			}

			public function getEnderecoImagem(){
				return $this->endereco_imagem;
			}
			
			public function getConteudo(){
				return $this->conteudo;
			}
			
			public function getAtivo(){
				return $this->ativo;
			}

			public function getIdAutor(){
				return $this->id_autor;
			}
				
			//Set
			public function setId($id){
				$this->id = $id;
			}
			
			public function setTitulo($titulo){
				$this->titulo = $titulo;
			}
			
			public function setDataCadastro($data_cadastro){
				$this->data_cadastro = $data_cadastro;
			}
			
			public function setEnderecoImagem($endereco_imagem){
				$this->endereco_imagem = $endereco_imagem;
			}
			
			public function setConteudo($conteudo){
				$this->conteudo = $conteudo;
			}

			public function setAtivo($ativo){
				$this->ativo = $ativo;
			}

			public function setIdAutor($id_autor){
				$this->id_autor = $id_autor;
			}
	}
?>