<?php
require 'classes/quantidade.class.php';
$quantidade = new Quantidade();

$ret = $quantidade->getQuantidade();

echo json_encode($ret);

?>