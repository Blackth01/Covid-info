<?php
	class Conexao extends PDO{
		
		private $banco   = 'site_covid';
		private $usuario = 'root';
		private $senha   = '';
		private $host    = 'localhost';
		
		private static $instance;
		
		public static function getInstance(){
			if(!isset(self::$instance))
				self::$instance = new Conexao();
			return self::$instance;
		}
		
		function __construct(){
			$dsn = 'mysql:host='.$this->host.';dbname=' .$this->banco.';charset=utf8';
			$options = [
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			];
			try{
				parent::__construct($dsn,$this ->usuario,$this ->senha,$options);
			}
			catch(PDOException $e){
				file_put_contents("erros.txt",
				$e->getMessage()."\r\n",
				FILE_APPEND);
			}
		}
	}
?>