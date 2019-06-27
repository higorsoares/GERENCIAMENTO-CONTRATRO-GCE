<?php
	class Situacao{
		private $pdo;

		public function __construct(){
			//$this->pdo = new PDO('mysql:dbname=sistema_contrato;host=localhost;','root','');
			$this->pdo = new PDO('mysql:dbname=id9889481_sistema_contrato;host=localhost;','igor','itr12909012');
		}


		public function getSituacao(){
			$sql = "SELECT * FROM situacoes";
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