<?php
require 'classes/pedidos.class.php';

$pedidos = new Pedidos();
$ret = $pedidos->selectPedidos();


echo json_encode($ret);



