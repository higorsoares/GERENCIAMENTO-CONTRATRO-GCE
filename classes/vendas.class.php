<?php

class Vendas{

	public function __construct(){
		$this->pdo = new PDO('mysql:dbname=contratov5;host=localhost;','root','');
 		//$this->pdo = new PDO("mysql:dbname=contratov3;host=localhost","root","");
 		//$this->pdo = new PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');
 	}



 	public function addVendas($id_produtos , $vendaQtd, $empresa, $frete){


 		$sql = "INSERT INTO vendas SET id_produtos = :id_produtos , vendaQtd = :vendaQtd, empresa = :empresa , frete = :frete, id_user = :id_user";
 		$sql = $this->pdo->prepare($sql);
 		$sql->bindValue(":id_produtos",$id_produtos);
 		$sql->bindValue(":vendaQtd",$vendaQtd);
 		$sql->bindValue(":empresa",$empresa);
 		$sql->bindValue(":frete",$frete);
 		$sql->bindValue(":id_user",$_SESSION['cLogin']);
 		$sql->execute();


 		
 			$sql2 = "SELECT quantidade FROM quantidade  WHERE id_produtos = :id_produtos";
 			$sql2 = $this->pdo->prepare($sql2);
 			$sql2->bindValue(":id_produtos",$id_produtos);
 			$sql2->execute();

 			if($sql2->rowCount() > 0){

 				$dados = $sql2->fetch();
 				$tes = $dados['quantidade'];
 				
 				$ret = ( $tes - $vendaQtd );
 				$sql3 = "UPDATE quantidade SET quantidade = :quantidade WHERE id_produtos = :id_produtos";
 				$sql3 = $this->pdo->prepare($sql3);
 				$sql3->bindValue(":quantidade" ,$ret);
 				$sql3->bindValue(":id_produtos",$id_produtos);
 				$sql3->execute();
 			}

 	}



 	public function getVendas(){
 		$sql = "SELECT pdt.descricao_produto , ved.vendaQtd, ved.empresa,ved.frete, ved.dh_cadastro, ved.id_venda FROM vendas as ved 
 		inner join produtos as pdt on ved.id_produtos = pdt.id_produto";

 		$sql = $this->pdo->query($sql);
 		$sql->execute();

 		if($sql->rowCount() > 0){
 			$dados = $sql->fetchAll();
 			return $dados;

 		}

 	}

}

?>