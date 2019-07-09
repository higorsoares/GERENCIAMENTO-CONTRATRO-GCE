<?php
session_start();
require 'classes/pedidos.class.php';
$pedidos = new Pedidos();


if(!empty($_GET['id'])){
	$id_pedido = $_GET['id'];
	$pedidos->updateStatus($id_pedido);
	echo $id_pedido;

	header('Location: cadastroPedidos.php');
}