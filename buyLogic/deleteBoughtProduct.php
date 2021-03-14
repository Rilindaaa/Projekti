<?php

include_once 'buyProductMapper.php';

if(isset($_GET['id'])){
    $orderId = $_GET['id'];
    $mapper = new BuyProductMapper();
    $mapper -> deleteBoughtProduct($orderId);
    header('Location:../CONTENT/dashboard.php');
}


