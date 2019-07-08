<?php

class Vendas{

	public function __construct(){
		//$this->pdo = new PDO('mysql:dbname=contratov5;host=localhost;','root','');
 		//$this->pdo = new PDO("mysql:dbname=contratov3;host=localhost","root","");
 		$this->pdo = new PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');
 	}



 	public function addVendas($id_produtos , $vendaQtd, $empresa, $frete){
			if(  $this->verificaQuantidade($id_produtos) > '0'){
 			// add a venda na tabela de vendas 
				
			

 			

			$sql4 = "SELECT quantidade FROM quantidade  WHERE id_produtos = :id_produtos ";
 			$sql4 = $this->pdo->prepare($sql4);
 			$sql4->bindValue(":id_produtos",$id_produtos);
 			$sql4->execute();

 			if($sql4->rowCount() > 0){

 				$dados = $sql4->fetch();
 				$tes = $dados['quantidade'];
 				if($tes > 0 && $tes >= $vendaQtd){

 					$sql = "INSERT INTO vendas SET id_produtos = :id_produtos , vendaQtd = :vendaQtd, empresa = :empresa , frete = :frete, id_user = :id_user";
					$sql = $this->pdo->prepare($sql);
					$sql->bindValue(":id_produtos",$id_produtos);
					$sql->bindValue(":vendaQtd",$vendaQtd);
					$sql->bindValue(":empresa",$empresa);
					$sql->bindValue(":frete",$frete);
					$sql->bindValue(":id_user",$_SESSION['cLogin']);
					$sql->execute();

					$ret = ( $tes - $vendaQtd );
	 				$sql3 = "UPDATE quantidade SET quantidade = :quantidade WHERE id_produtos = :id_produtos ";
	 				$sql3 = $this->pdo->prepare($sql3);
	 				$sql3->bindValue(":quantidade" ,$ret);
	 				$sql3->bindValue(":id_produtos",$id_produtos);
	 				$sql3->execute();
	 				echo "Venda Cadastradas";
 				}else{
 					echo "Voce não tem quantidade suficiente";
 				}
	
 			}else{
 				echo "Seu estoque esta abaixo de zero";
 			}
 				
	 		}else{


	 					echo "Verifique seu estoque";
	 			}

 	}

 	public function verificaQuantidade($id_produtos){

 		$sql2 = "SELECT quantidade FROM quantidade  WHERE id_produtos = :id_produtos ";
 			$sql2 = $this->pdo->prepare($sql2);
 			$sql2->bindValue(":id_produtos",$id_produtos);
 			$sql2->execute();

 			if($sql2->rowCount() > 0){

 				$dados = $sql2->fetch();
 				$ret = $dados['quantidade'];

 				return $ret;
 			}else{
 				$dados = "seus dados foram cadastrados";

 				return $dados;
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