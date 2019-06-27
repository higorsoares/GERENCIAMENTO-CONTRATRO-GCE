<?php
require 'classes/vendas.class.php';


$vedas = new Vendas();

$ret = $vedas->getVendas();

echo json_encode($ret);





?>