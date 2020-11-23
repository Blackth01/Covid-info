<?php	
	class PojoUsuario{
			
			private $id;
			private $admin;
			private $nome;
			private $idade;
			private $senha;
			private $email;
			private $medico;
			
			//Get
			public function getId(){
				return $this->id;
			}
			
			public function getNome(){
				return $this->nome;
			}
			
			public function getSenha(){
				return $this->senha;
			}
			
			public function getIdade(){
				return $this->idade;
			}

			public function getEmail(){
				return $this->email;
			}
			
			public function getMedico(){
				return $this->medico;
			}
			
			public function getAdmin(){
				return $this->admin;
			}
			
			//Set
			public function setId($id){
				$this->id = $id;
			}
			
			public function setNome($nome){
				$this->nome = $nome;
			}
			
			public function setIdade($idade){
				$this->idade = $idade;
			}
			
			public function setSenha($senha){
				$this->senha = $senha;
			}
			
			public function setEmail($email){
				$this->email = $email;
			}
			
			public function setMedico($medico){
				$this->medico = $medico;
			}
			
			public function setAdmin($admin){
				$this->admin = $admin;
			}
	}
?>