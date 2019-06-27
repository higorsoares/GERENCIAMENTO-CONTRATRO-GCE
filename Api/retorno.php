<?php
require 'api.class.php';


$retornor = new Api();



$rest = $retornor->Lista();

header('Content-Type: application/json');

echo json_encode($rest);

?>