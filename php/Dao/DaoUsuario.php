	<?php
	require_once '../Conexao.php';
	require_once '../Pojo/PojoUsuario.php';

	class DaoUsuario{
		public static $instance;

		public static function getInstance(){
			if(!isset(self::$instance))
					self::$instance = new DaoUsuario();
			return self::$instance;
		}

		public function inserir(PojoUsuario $usuario){
			try{
				$sql ="INSERT INTO usuario(
					nome,
					senha,
					email,
					idade,
					admin,
					medico)
					VALUES(
						:nome,
						:senha,
						:email,
						:idade,
						:admin,
						:medico
					);";

				$p_sql = Conexao::getInstance()->prepare($sql);

				$p_sql->bindValue(":nome",    $usuario->getNome());
				$p_sql->bindValue(":senha",   $usuario->getSenha());
				$p_sql->bindValue(":email",   $usuario->getEmail());
				$p_sql->bindValue(":idade",   $usuario->getIdade());
				$p_sql->bindValue(":admin",   $usuario->getAdmin());
				$p_sql->bindValue(":medico",   $usuario->getMedico());

				return $p_sql->execute();
			}catch(PDOException $e){
				echo "erro...";
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
				
				return false;
			}
		}

		public function editar(PojoUsuario $usuario){
			try{
				$sql = 'UPDATE usuario set
							nome   = :nome,
							senha  = :senha,
							salt   = :salt,
							email  = :email,
							imagem = :imagem,
							tipo   = :tipo,
							descricao = :descricao
						WHERE usuario.id = :id';

				$p_sql = Conexao::getInstance()->prepare($sql);

				$p_sql->bindValue(':id',$usuario->getId());
				$p_sql->bindValue(':nome',$usuario->getNome());
				$p_sql->bindValue(':senha',$usuario->getSenha());
				$p_sql->bindValue(':salt',$usuario->getSalt());
				$p_sql->bindValue(':email',$usuario->getEmail());
				$p_sql->bindValue(':imagem',$usuario->getImagem());
				$p_sql->bindValue(':tipo',$usuario->getTipo());
				$p_sql->bindValue(':descricao', $usuario->getDescricao());

				return $p_sql->execute();
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}

		public function buscarPorId($id){
			try{
				$sql = 'SELECT * FROM usuario
							WHERE id = :id';

				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindParam(':id',$id);
				$p_sql->execute();

				return self::toPojo($p_sql->fetch(PDO::FETCH_ASSOC));
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}

		public function buscarPorEmail($email){
			try{
				#codigo a ser execultado
				$sql = 'SELECT * FROM usuario
							WHERE email = :email
							LIMIT 1';

				#requerindo Conexao
				$p_sql = Conexao::getInstance()->prepare($sql);

				#trocando parametros
				$p_sql->bindParam(':email',$email);

				#execultar
				$p_sql->execute();

				#retornar como um pojo
				return self::toPojo($p_sql->fetch(PDO::FETCH_ASSOC));
			}catch(PDOException $e){
				#em caso de erro registre num log
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}

		public function buscarComentarios($id) {
			try{

				$con = new Conexao();
				$sql = 'SELECT c.* FROM comentario c, usuario u WHERE c.id_usuario=u.id AND u.id='.$id;
				$rs = $con->query($sql);

				return $rs->fetchAll(PDO::FETCH_OBJ);
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}
		public function deletar($id){
			try{
				$sql = 'DELETE FROM usuario WHERE usuario.id = :id ';

				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindParam(':id',$id);

				return $p_sql->execute();
			}catch(PDOException $e){
				file_get_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}
		
		public function toPojo($row){
			if($row){
				$pojo = new PojoUsuario();
				$pojo->setId($row['id']);
				$pojo->setNome($row['nome']);
				$pojo->setSenha($row['senha']);
				$pojo->setEmail($row['email']);
				$pojo->setIdade($row['idade']);
				$pojo->setMedico($row['medico']);
				$pojo->setAdmin($row['admin']);

				return $pojo;
			}
			else{
				return false;
			}
		}
	}

?>
