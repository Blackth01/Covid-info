	<?php
	require_once '../Conexao.php';
	require_once '../Pojo/PojoArtigo.php';

	class DaoArtigo{
		public static $instance;

		public static function getInstance(){
			if(!isset(self::$instance))
					self::$instance = new DaoArtigo();
			return self::$instance;
		}

		public function inserir(PojoArtigo $artigo){
			try{
				$sql ="INSERT INTO artigo(
					titulo,
					endereco_imagem,
					conteudo,
					ativo,
					id_autor,
					data_cadastro)
					VALUES(
						:titulo,
						:endereco_imagem,
						:conteudo,
						:ativo,
						:id_autor,
						:data_cadastro
					);";

				$p_sql = Conexao::getInstance()->prepare($sql);

				$p_sql->bindValue(":titulo",    $artigo->getTitulo());
				$p_sql->bindValue(":endereco_imagem",   $artigo->getEnderecoImagem());
				$p_sql->bindValue(":conteudo",   $artigo->getConteudo());
				$p_sql->bindValue(":ativo",   $artigo->getAtivo());
				$p_sql->bindValue(":id_autor",   $artigo->getIdAutor());
				$p_sql->bindValue(":data_cadastro",   $artigo->getDataCadastro());

				return $p_sql->execute();
			}catch(PDOException $e){
				echo "erro...";
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
				
				return false;
			}
		}

		public function editar(PojoArtigo $artigo){
			try{
				$sql = 'UPDATE artigo set
							titulo   = :titulo,
							endereco_imagem  = :endereco_imagem,
							conteudo  = :conteudo,
							ativo  = :ativo
						WHERE artigo.id = :id';

				$p_sql = Conexao::getInstance()->prepare($sql);

				$p_sql->bindValue(":titulo",    $artigo->getTitulo());
				$p_sql->bindValue(":endereco_imagem",   $artigo->getEnderecoImagem());
				$p_sql->bindValue(":conteudo",   $artigo->getConteudo());
				$p_sql->bindValue(":ativo",   $artigo->getAtivo());
				$p_sql->bindValue(":id",   $artigo->getId());

				return $p_sql->execute();
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}

		public function buscarPorId($id){
			try{
				$sql = 'SELECT * FROM artigo
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

		public function buscarTodosAtivos(){
			try{
				$sql = 'SELECT a.id, a.titulo, a.conteudo, a.data_cadastro, a.endereco_imagem,
				a.ativo, a.id_autor, u.nome as nome_autor FROM artigo a,
				usuario u WHERE a.id_autor=u.id AND a.ativo != 0';

				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->execute();

				return $p_sql->fetch(PDO::FETCH_OBJ);
			}catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}			
		}

		public function desativar($id){
			try{
				$sql = 'UPDATE artigo SET ativo=0 WHERE artigo.id = :id ';

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
				$pojo = new PojoArtigo();
				$pojo->setId($row['id']);
				$pojo->setTitulo($row['titulo']);
				$pojo->setDataCadastro($row['data_cadastro']);
				$pojo->setEnderecoImagem($row['endereco_imagem']);
				$pojo->setConteudo($row['conteudo']);
				$pojo->setAtivo($row['ativo']);
				$pojo->setIdAutor($row['id_autor']);

				return $pojo;
			}
			else{
				return false;
			}
		}
	}

?>
