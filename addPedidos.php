<?php
session_start();
require 'classes/pedidos.class.php';
$pedidos = new Pedidos();

$empresa = $_POST['txtNomeEmpresa'];
$idProduto = $_POST['txtProdutos'];
$pedido = $_POST['txtQuantidade'];



$ret = $pedidos->cadastroPedidos($empresa , $idProduto, $pedido);

echo $ret;


