<?php

require 'classes/vendas.class.php';
$venda = new Vendas();
 		//$txtProduto = $_POST['txtProdudo'];
$txtProduto = 5;
		$txtQuantidade = $_POST['txtQuantidade'];
		$txtEmpresa = $_POST['txtEmpresa'];
		$txtFrete = $_POST['txtFrete'];

		$venda->addVendas($txtProduto,$txtQuantidade,$txtEmpresa,$txtFrete);
	
	


echo $txtProduto.$txtEmpresa." ". $txtFrete." ".$txtQuantidade;

