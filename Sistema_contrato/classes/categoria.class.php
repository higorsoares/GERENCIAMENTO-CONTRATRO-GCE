<?php
	class Categoria{
		private $pdo;

		public function __construct(){
			$this->pdo = new PDO('mysql:dbname=sistema_contrato;host=localhost;','root','');
		}


		public function getCategoria(){
			$sql = "SELECT * FROM categoria";
			$sql = $this->pdo->query($sql);
			$sql->execute();

			if($sql->rowCount() >0 ){
				$dados = $sql->fetchAll();
				return $dados;
			}else{
				return false;
			}
		}


	}

?>