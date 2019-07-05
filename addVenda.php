<?php
session_start();
require 'classes/vendas.class.php';
$venda = new Vendas();
 		$txtProduto = $_POST['txtProdudo'];
		$txtQuantidade = $_POST['txtQuantidade'];
		$txtEmpresa = $_POST['txtEmpresa'];
		$txtFrete = $_POST['txtFrete'];
		$ret = $venda->addVendas($txtProduto,$txtQuantidade,$txtEmpresa,$txtFrete);
        echo $ret;

