<?php
 class Pedidos{
 	private $pdo ;

 	public function __construct(){
 		$this->pdo = new PDO('mysql:dbname=contratov3;host=localhost;','root','');
 	}


 	public function cadastroPedidos($empresa , $idProduto, $pedido ){

 		$sql = "INSERT INTO pedidos SET empresa_qtd = :empresa_qtd, idProduto = :idProduto, pedidos = :pedidos, idUserCadastro = :idUserCadastro";
 		$sql = $this->pdo->prepare($sql);
 		$sql->bindValue(':empresa_qtd',$empresa);
 		$sql->bindValue(':idProduto',$idProduto);
 		$sql->bindValue(':pedidos',$pedido);
 		$sql->bindValue(':idUserCadastro',$_SESSION['cLogin']);
 		$sql->execute();
 		echo "Pedido Cadastrado";
 	}

 	public function selectPedidos(){
 		$sql = "SELECT * FROM pedidos as pdd
 		INNER JOIN produtos as prod ON pdd.idProduto = prod.id_Produto 
 		INNER JOIN usuarios as usser ON pdd.idUserCadastro = usser.id 
 	    WHERE executado <> TRUE";

 		$sql = $this->pdo->query($sql);

 		if($sql->rowCount() > 0){
 			$dados = $sql->fetchAll();
 			return $dados;
 		}else{
 			$retorno[]  = array(
				'empresa_qtd' => 'Nem um registro', 
				'pedidos' => 'Nem um registro',
				'descricao_produto' => 'Nem um registro',
				'nome' => 'Nem um registro',
				'dh_emisao' => 'Nem um registro',
				'executado' => 'Nem um registro',

				);

				return $retorno;
 		}
 	}

 	public function selectPedidosConcluidos($dataInicio, $dataFim){
 		$sql = "SELECT * FROM pedidos as pdd
 		INNER JOIN produtos as prod ON pdd.idProduto = prod.id_Produto 
 		INNER JOIN usuarios as usser ON pdd.idUserCadastro = usser.id 
 	    WHERE executado = TRUE AND dh_execucao BETWEEN '$dataInicio 00:00:00' AND '$dataFim 23:59:00'";

 		$sql = $this->pdo->query($sql);
 		
 		$sql->execute();
 		if($sql->rowCount() > 0){
 			$dados = $sql->fetchAll();
 			return $dados;
 		}else{
 			/*
 			$retorno[]  = array(
				'razao_social' => 'Nem um registro', 
				'nome_responsavel' => 'Nem um registro',
				'telefone_contato' => 'Nem um registro',
				'descricao' => 'Nem um registro',
				'dh_cadastro' => 'Nem um registro',

				);

				return $retorno;
				*/
 			return "Nem um Produto encontrado";
 		}
 	}

 	public function updateStatus($id){
 		$sql = "UPDATE pedidos SET executado = TRUE , dh_execucao = NOW(), idUserExecucao = :idUserExecucao WHERE idPedido = :idPedido";
		$sql = $this->pdo->prepare($sql);
 		$sql->bindValue(':idUserExecucao',$_SESSION['cLogin']);
 		$sql->bindValue(':idPedido',$id);
 		$sql->execute();
 	}


 }
