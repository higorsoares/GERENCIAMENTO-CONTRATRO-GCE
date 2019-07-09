<?php 
 class Produtos{
 	private $pdo ;


 	public function __construct(){
 		$this->pdo = new PDO('mysql:dbname=contratov3;host=localhost;','root','');
 		//$this->pdo = new PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');
 		//$this->pdo = new PDO('mysql:dbname=contratov5;host=localhost;','root','');
 	}



 	public function addProdutos($descricaoProduto){
 		$sql = "INSERT INTO produtos SET descricao_produto = :descricao_produto , id_user = :id_user";
 		$sql = $this->pdo->prepare($sql);
 		$sql->bindValue(":descricao_produto",$descricaoProduto);
 		$sql->bindValue(":id_user",$_SESSION['cLogin']);
 		$sql->execute();
 	}



 	public function getProduto(){
 		$sql = "SELECT * FROM produtos as pdt 
 		inner join usuarios as userr on pdt.id_user = userr.id";

 		$sql = $this->pdo->query($sql);
 		if($sql->rowCount() > 0 ){

 			$dados = $sql->fetchAll();
 			return $dados;

 		}

 	}





 }


?>