<?php
require 'classes/produtos.class.php';

$produto = new Produtos();


$ret = $produto->getProduto();

echo json_encode($ret);

?>