	<?php
	require_once '../Conexao.php';
	require_once '../Pojo/PojoGostei.php';

	class DaoGostei{
		public static $instance;

		public static function getInstance(){
			if(!isset(self::$instance))
					self::$instance = new DaoGostei();
			return self::$instance;
		}

		public function inserir(PojoGostei $gostei){
			try{
				$sql ="INSERT INTO gostei(
					id_usuario,
					id_artigo)
					VALUES(
						:id_usuario,
						:id_artigo
					);";

				$p_sql = Conexao::getInstance()->prepare($sql);

				$p_sql->bindValue(":id_usuario",    $gostei->GetIdUsuario());
				$p_sql->bindValue(":id_artigo",   $gostei->GetIdArtigo());

				return $p_sql->execute();
			}catch(PDOException $e){
				echo "erro...";
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
				
				return false;
			}
		}

		public function existeLike($id_usuario, $id_artigo){
			try{
				$sql = 'SELECT id FROM gostei
							WHERE id_usuario = :id_usuario AND id_artigo = :id_artigo LIMIT 1';

				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindParam(':id_usuario',$id_usuario);
				$p_sql->bindParam(':id_artigo',$id_artigo);
				$p_sql->execute();

				return $p_sql->fetch();
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}		
		}
		
		public function contaLikes($id_artigo){
			try{
				$sql = 'SELECT COUNT(*) FROM gostei WHERE id_artigo= :id_artigo';

				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindParam(':id_artigo',$id_artigo);
				$p_sql->execute();

				return $p_sql->fetch()[0];
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}			
		}

		public function deletar($id){
			try{
				$sql = 'DELETE FROM gostei WHERE id = :id ';

				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindParam(':id',$id);

				return $p_sql->execute();
			}catch(PDOException $e){
				file_get_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}
	}

?>