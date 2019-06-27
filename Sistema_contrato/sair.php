<?php
require 'config.php';

if(!empty($_SESSION['cLogin'])){
    session_destroy();
}


header("Location: login.php")
?>