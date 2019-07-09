<?php
require '../classes/pedidos.class.php';

$pedidos = new Pedidos();

$dataInicio = $_POST['txtDataInicio'];
$dataFim = $_POST['txtDataFim'];

$ret = $pedidos->selectPedidosConcluidos($dataInicio,$dataFim);
echo json_encode($ret);