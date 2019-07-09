<?php
session_start();
require 'classes/quantidade.class.php';
$quantidades = new Quantidade();

$idProduto = $_POST['txtIdQuantidade'];
$txtEqptDefeito = $_POST['txtEqptDefeito'];



$ret = $quantidades->produtoDefeito($idProduto , $txtEqptDefeito);

echo $ret;


