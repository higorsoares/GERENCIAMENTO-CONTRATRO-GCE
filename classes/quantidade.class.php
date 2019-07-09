<?php
class Quantidade{

		public function __construct(){
		//$this->pdo = new	PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');
			$this->pdo = new PDO('mysql:dbname=contratov3;host=localhost;','root','');
 		//$this->pdo = new PDO("mysql:dbname=contratov3;host=localhost","root","");
			//$this->pdo = new 
			//$this->pdo = new PDO('mysql:dbname=contratov5;host=localhost;','root','');
 	}


 	public function addQuantidade($id_produtos,$quantidade){

 		$sql = "INSERT INTO quantidade SET  id_produtos = :id_produtos, quantidade = :quantidade , id_user = :id_user";
 		$sql = $this->pdo->prepare($sql);
 		$sql->bindValue(":id_produtos",$id_produtos);
 		$sql->bindValue(":quantidade",$quantidade);
 		
 		$sql->bindValue(":id_user",$_SESSION['cLogin']);
 		$sql->execute();


 	}	



 	public function getQuantidade(){
 		$sql = "SELECT * FROM produtos as pdt 
 		inner join usuarios as userr on pdt.id_user = userr.id
 		inner join quantidade as qt on qt.id_produtos = pdt.id_produto";

 		$sql = $this->pdo->query($sql);
 		if($sql->rowCount() > 0 ){

 			$dados = $sql->fetchAll();
 			return $dados;

 		}

 	}



 	public function getId($id){
 		$sql = "SELECT * FROM quantidade AS qtd 
 		inner join produtos AS pdt ON qtd.id_produtos = pdt.id_produto WHERE idQtd = :idQtd";
 		$sql = $this->pdo->prepare($sql);
 		$sql->bindValue(":idQtd",$id);
 		$sql->execute();

 		if($sql->rowCount() > 0){
 			$dad = $sql->fetch();

 		return $dad;	
 		}

 	}



 	public function AltQuantidade($txtIdquantidade,$txtQuantidade ){

 		

 		$sql = "SELECT * FROM quantidade WHERE idQtd = :idQtd ";
 		$sql = $this->pdo->prepare($sql);
 		$sql->bindValue(":idQtd",$txtIdquantidade);
 		$sql->execute();

 		if($sql->rowCount() > 0){
 			$dado = $sql->fetch();

 			$ret = ($dado['quantidade'] + $txtQuantidade );

 			$sql2 = "UPDATE quantidade SET quantidade = :quantidade WHERE idQtd = :idQtd";
 			$sql2 = $this->pdo->prepare($sql2);
 			$sql2->bindValue(":quantidade",$ret);
 			$sql2->bindValue(":idQtd",$txtIdquantidade);
 			$sql2->execute();
 		}

}


public function produtoDefeito($txtIdquantidade,$txtProdutoDefeito){

 		

 		$sql = "SELECT * FROM quantidade WHERE idQtd = :idQtd ";
 		$sql = $this->pdo->prepare($sql);
 		$sql->bindValue(":idQtd",$txtIdquantidade);
 		$sql->execute();

 		if($sql->rowCount() > 0){
 			$dado = $sql->fetch();

 			$ret = ($dado['quantidade'] - $txtProdutoDefeito );
 			$ret2 = ($dado['valor_produto'] + $txtProdutoDefeito );

 			$sql2 = "UPDATE quantidade SET quantidade = :quantidade, valor_produto = :valor_produto WHERE idQtd = :idQtd";
 			$sql2 = $this->pdo->prepare($sql2);
 			$sql2->bindValue(":quantidade",$ret);
 			$sql2->bindValue(":valor_produto",$ret2);
 			$sql2->bindValue(":idQtd",$txtIdquantidade);
 			$sql2->execute();

 			echo "Produtos com defeitos adicionados";
 		}else{
 			echo "Ouve um Erro";
 		}

 	}


 }
