<?php
	require_once '../Conexao.php';
	require_once '../Pojo/PojoComentario.php';

	class DaoComentario{
		public $conexao;

		public static function getInstance(){
			if(!isset(self::$instance))
					self::$instance = new DaoComentario();

			return self::$instance;
		}

		public function inserir(PojoComentario $comentario){
			try{
				$sql ="INSERT INTO comentario(
							texto,
							id_usuario,
							id_artigo,
							data_postagem
						)
						VALUES(
							:texto,
							:usuario,
							:artigo,
							:data_postagem
						)";

				$p_sql = Conexao::getInstance()->prepare($sql);

				$p_sql->bindValue(":texto", $comentario->getTexto());
				$p_sql->bindValue(":usuario", $comentario->getIdUsuario());
				$p_sql->bindValue(":artigo", $comentario->getIdArtigo());
				$p_sql->bindValue(":data_postagem", $comentario->getDataPostagem());


				return $p_sql->execute();
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}

		public function editar(PojoComentario $comentario){
			try{
				$sql = 'UPDATE comentario set
							texto    = :texto,
							usuario  = :usuario,
							artigo  = :artigo,
							data  	 = :data
						WHERE comentario.id = :id';

				$p_sql = Conexao::getInstance()->prepare($sql);

				$p_sql->bindValue(':id',$comentario->getId());
				$p_sql->bindValue(':texto',$comentario->getTexto());
				$p_sql->bindValue(':usuario',$comentario->getIdUsuario());
				$p_sql->bindValue(':artigo',$comentario->getIdArtigo());
				$p_sql->bindValue(':data',$comentario->getDataPostagem());

				return $p_sql->execute();
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}

		public function buscarPorId($id){
			try{
				$sql = 'SELECT * FROM comentario
							WHERE id = :id';

				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindParam(':id',$id);

				return self::toPojo($p_sql->fetch(PDO::FETCH_ASSOC));
			}catch(PDOException $e){
				file_get_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}

		public function buscarTodosPorId($id){
			try{
				$sql = 'SELECT * FROM comentario where id_artigo = :id AND ativo=1;';
				$rs =  Conexao::getInstance()->prepare($sql);
				$rs->bindParam(':id',$id);
				$rs->execute();

				return $rs->fetchAll(PDO::FETCH_OBJ);
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}

		public function deletar($id){
			try{
				$sql = 'DELETE FROM comentario WHERE comentario.id = :id ';

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
			$pojo = new PojoComentario();
			$pojo->setId($row['id']);
			$pojo->setTexto($row['texto']);
			$pojo->setIdUsuario($row['id_usuario']);
			$pojo->setIdArtigo($row['id_artigo']);
			$pojo->setDataPostagem($row['data_postagem']);
			return $pojo;
		}
	}

?>
