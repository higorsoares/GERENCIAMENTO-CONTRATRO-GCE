<?php
	class Situacao{
		private $pdo;

		public function __construct(){
			//$this->pdo = new PDO('mysql:dbname=contratov3;host=localhost;','root','');
			$this->pdo = new PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');
			//$this->pdo = new PDO('mysql:dbname=contratov5;host=localhost;','root','');



			//$this->pdo = new PDO('mysql:dbname=contratov2;host=localhost;','root','');
			//$this->pdo = new PDO('mysql:dbname=contrato;host=localhost;','root','');
			//$this->pdo = new PDO('mysql:dbname=id9889481_sistema_contrato;host=localhost;','id9889481_igor','itr12909012');
			//$this->pdo = new PDO('mysql:dbname=id9889481_contratov3;host=localhost;','id9889481_igor','itr12909012');
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